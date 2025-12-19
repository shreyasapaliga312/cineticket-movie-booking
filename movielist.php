<?php
// movielist.php — safe search/filter (detects available columns)
// Replace your existing movielist.php with this file

include_once 'newheader.php';
include_once 'dbfun.php'; // keeps your DB helper & connection

// Helper: get columns of movie table (returns array of field names)
function get_movie_columns(){
    // try to use the global DB connection variable used in your project
    // common names: $con, $conn, $db, $mysqli - we'll try a few
    $candidates = ['con','conn','mysqli','db','link','connection'];
    $db = null;
    foreach($candidates as $name){
        if(isset($GLOBALS[$name])){ $db = $GLOBALS[$name]; break; }
    }
    // fallback: try $GLOBALS['con'] specifically
    if(!$db && isset($GLOBALS['con'])) $db = $GLOBALS['con'];

    $cols = [];
    if($db && function_exists('mysqli_query')){
        // $db may be mysqli link resource/object
        $res = @mysqli_query($db, "SHOW COLUMNS FROM `movie`");
        if($res){
            while($r = mysqli_fetch_assoc($res)){
                if(isset($r['Field'])) $cols[] = $r['Field'];
            }
            mysqli_free_result($res);
            return $cols;
        }
    }

    // If we couldn't run SHOW COLUMNS (unknown DB var), attempt to use findall once and infer keys
    // (this is safe and non-destructive)
    try{
        $sample = allrecords("movie limit 1");
        if($sample && is_array($sample) && count($sample)>0){
            $first = $sample[0];
            if(is_array($first)) $cols = array_keys($first);
        }
    } catch(Exception $e){
        // ignore
    }
    return $cols;
}

$movie_columns = get_movie_columns();
// normalized columns (lowercase)
$movie_columns_lc = array_map('strtolower',$movie_columns);

// helper to test if a column exists
function col_exists($col, $cols_lc){
    return in_array(strtolower($col), $cols_lc);
}

/* ---------- Build safe query conditions ---------- */
$where_clause = ''; // passed to findall/allrecords as second arg where needed

// Handle category filter safely: prefer column names if present
if(isset($_GET['category']) && trim($_GET['category'])!==''){
    $cat_raw = trim($_GET['category']);
    $cat = addslashes($cat_raw);

    if(col_exists('category', $movie_columns_lc)){
        // movie table has category column
        $where_clause = "category = '$cat'";
    } elseif(col_exists('genre', $movie_columns_lc)){
        $where_clause = "genre LIKE '%$cat%'";
    } elseif(col_exists('language', $movie_columns_lc)){
        $where_clause = "language LIKE '%$cat%'";
    } else {
        // fallback: try searching in mname for the category text
        $where_clause = "mname LIKE '%$cat%'";
    }
}

// Handle search query safely
if(isset($_GET['search']) && trim($_GET['search'])!==''){
    $s_raw = trim($_GET['search']);
    $s = addslashes($s_raw);

    // decide which columns are safe to search
    $search_cols = [];
    if(col_exists('mname', $movie_columns_lc)) $search_cols[] = 'mname';
    if(col_exists('genre', $movie_columns_lc)) $search_cols[] = 'genre';
    if(col_exists('language', $movie_columns_lc)) $search_cols[] = 'language';
    if(col_exists('director', $movie_columns_lc)) $search_cols[] = 'director'; // optional

    // always have at least mname as fallback
    if(empty($search_cols)) $search_cols = ['mname'];

    $parts = [];
    foreach($search_cols as $c){
        $parts[] = "$c LIKE '%$s%'";
    }
    $search_where = implode(' OR ', $parts);

    // Combine with category filter if present
    if($where_clause){
        $where_clause = "($where_clause) AND ($search_where)";
    } else {
        $where_clause = "($search_where)";
    }
}

// If still empty, we'll fetch all (no WHERE)
$fetch_all = ($where_clause=='') ? true : false;

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>All Movies List</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
:root{
  --accent:#ff3b3b;
  --muted:#6c757d;
  --bg:#fbfcfd;
  --card-radius:12px;
  --poster-radius:12px;
  --shadow:0 10px 30px rgba(12,20,40,0.06);
}
body{background:var(--bg);font-family: "Segoe UI", Roboto, Arial, sans-serif;color:#111}

/* hero */
.hero{background:#2f3336;color:#fff;padding:36px 18px;margin-top:70px}
.hero .container{max-width:1200px}
.hero h1{font-size:36px;margin:0}
.hero p{margin-top:6px;color:rgba(255,255,255,0.85)}

/* controls */
.controls{max-width:1200px;margin:-28px auto 18px;display:flex;gap:18px;padding:0 18px;align-items:flex-start}
.filter-card{width:230px;background:#fff;border-radius:12px;padding:12px;box-shadow:var(--shadow);flex:0 0 230px}
.filter-btn{background:#36b37e;color:#fff;border:0;padding:10px 12px;border-radius:8px;font-weight:700}
.filter-list{margin-top:12px}

/* search */
.search-wrap{flex:1;display:flex;justify-content:center}
.search-box{width:100%;max-width:760px;background:#fff;border-radius:40px;padding:8px 12px;box-shadow:0 8px 30px rgba(2,6,23,0.06);display:flex;gap:12px}
.search-input{border:0;outline:0;padding:12px 18px;border-radius:28px;font-size:16px;flex:1;background:transparent}
.search-btn{background:var(--accent);border:0;color:#fff;padding:10px 18px;border-radius:28px;font-weight:800;}

/* grid */
.container-grid{max-width:1200px;margin:0 auto;padding:18px}
.section-title{font-size:20px;font-weight:700;margin:6px 0 18px}

/* cards */
.movie-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:20px}
.movie-card{background:#fff;border-radius:var(--card-radius);overflow:hidden;box-shadow:var(--shadow);position:relative;transition:transform .16s}
.movie-card:hover{transform:translateY(-8px)}
.poster-img{width:100%;height:300px;object-fit:cover;border-top-left-radius:var(--poster-radius);border-top-right-radius:var(--poster-radius)}
.poster-overlay{position:absolute;left:12px;top:12px;padding:6px 10px;border-radius:999px;background:rgba(0,0,0,0.6);color:#fff;font-weight:700}

.card-body{padding:14px 16px 48px}
.movie-name{font-size:16px;font-weight:700;margin-bottom:6px}
.movie-meta{color:var(--muted);font-size:13px}

/* footer / buttons */
.card-footer{position:relative;padding:12px 16px;border-top:1px solid #f1f1f1;background:transparent}
.btn-details{background:#fff;border:1px solid #e6e6e6;padding:8px 12px;border-radius:8px;font-weight:700}
.btn-book{position:absolute;right:16px;bottom:8px;background:var(--accent);color:#fff;border:0;padding:10px 14px;border-radius:10px;font-weight:800;box-shadow:0 10px 30px rgba(255,59,59,0.16)}

/* responsiveness */
@media(max-width:992px){
  .controls{flex-direction:column;gap:12px}
  .filter-card{width:100%;flex:unset}
  .poster-img{height:220px}
  .movie-grid{grid-template-columns:repeat(auto-fill,minmax(180px,1fr))}
}
@media(max-width:420px){
  .poster-img{height:160px}
  .btn-book{right:10px;bottom:6px;padding:8px 12px}
}
</style>
</head>
<body>

<!-- hero -->
<section class="hero" aria-label="Hero">
  <div class="container">
    <h1>All Movies List</h1>
    <p>Browse, check details and book tickets — updated style.</p>
  </div>
</section>

<!-- controls -->
<div class="controls" role="region" aria-label="Search and filters">
  <div class="filter-card">
    <button id="showOptionsBtn" class="filter-btn" type="button">Filter</button>
    <div id="languageOptions" class="filter-list" style="display:none;margin-top:12px">
      <ul style="list-style:none;padding:0;margin:0">
        <li style="margin-bottom:8px"><a href="movielist.php" style="text-decoration:none;color:#222">All Movies</a></li>
        <li style="margin-bottom:8px"><a href="movielist.php?category=english" style="text-decoration:none;color:#222">English</a></li>
        <li style="margin-bottom:8px"><a href="movielist.php?category=hindi" style="text-decoration:none;color:#222">Hindi</a></li>
        <li style="margin-bottom:8px"><a href="movielist.php?category=kannada" style="text-decoration:none;color:#222">Kannada</a></li>
      </ul>
    </div>
  </div>

  <div class="search-wrap">
    <form action="movielist.php" method="GET" class="search-box" role="search">
      <input name="search" class="search-input" type="search" placeholder="Search for movies, genres or actors..." aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search'],ENT_QUOTES) : '' ?>">
      <button class="search-btn" type="submit">Search</button>
    </form>
  </div>
</div>

<!-- grid -->
<div class="container-grid">
  <div class="section-title">Recommended Movies</div>

  <?php
  // fetch movies using safe where clause built above
  if($fetch_all){
      $movies = allrecords("movie order by mid desc");
  } else {
      // use findall with our computed where clause
      // findall(table, where) is part of your dbfun.php helpers
      $movies = findall("movie", $where_clause);
  }
  ?>

  <?php if(!$movies || count($movies)===0): ?>
    <div style="background:#fff;padding:24px;border-radius:12px;box-shadow:var(--shadow)">
      <h4>No movies found</h4>
      <p class="text-muted">Try clearing filters or change your search keywords.</p>
      <a href="movielist.php" class="btn btn-outline-secondary">Show all movies</a>
    </div>
  <?php else: ?>
    <div class="movie-grid" aria-live="polite">
      <?php foreach($movies as $row):
          if(!is_array($row)) continue;
          $mid = isset($row['mid'])?intval($row['mid']):0;
          $poster = (isset($row['poster']) && $row['poster']!=='') ? htmlspecialchars($row['poster'],ENT_QUOTES) : 'assets/images/placeholder.png';
          $mname = isset($row['mname'])?htmlspecialchars($row['mname'],ENT_QUOTES):'Untitled';
          $genre = isset($row['genre'])?htmlspecialchars($row['genre'],ENT_QUOTES):(isset($row['language'])?htmlspecialchars($row['language'],ENT_QUOTES):'');
          $rating = isset($row['rating']) && $row['rating']!=='' ? htmlspecialchars($row['rating'],ENT_QUOTES) : '';
      ?>
      <article class="movie-card" role="article" aria-labelledby="m-<?= $mid ?>">
        <div class="poster-wrap">
          <img class="poster-img" src="<?= $poster ?>" alt="<?= $mname ?>" loading="lazy" onerror="this.onerror=null;this.src='assets/images/placeholder.png'">
          <?php if($rating): ?><div class="poster-overlay"><?= $rating ?>★</div><?php endif; ?>
        </div>

        <div class="card-body">
          <div class="movie-name" id="m-<?= $mid ?>"><?= $mname ?></div>
          <div class="movie-meta"><?= $genre ?></div>
        </div>

        <div class="card-footer">
          <a class="btn-details" href="mdetails.php?mid=<?= $mid ?>">View Details</a>
          <a class="btn-book" href="bookticket.php?mid=<?= $mid ?>">Book</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>

<script>
document.getElementById('showOptionsBtn').addEventListener('click',function(){
  var el = document.getElementById('languageOptions');
  if(!el) return;
  if(el.style.display === 'none' || el.style.display === ''){ el.style.display='block'; el.setAttribute('aria-hidden','false'); }
  else { el.style.display='none'; el.setAttribute('aria-hidden','true'); }
});
</script>

<?php include_once 'register.php'; ?>
<?php include_once 'newfooter.php'; ?>

<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
