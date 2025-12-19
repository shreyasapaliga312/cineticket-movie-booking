<?php include_once 'newheader.php'; ?>

<?php function esc($v){ return htmlspecialchars($v ?? '', ENT_QUOTES); } ?>

<!-- BookMyShow-like homepage (no extra navigation added) -->
<style>
/* Scoped styles for this homepage only */
.home-wrap{margin-top:26px;margin-bottom:48px;max-width:1200px}

/* Hero - large banner with rounded corners like the reference */
.hero{border-radius:12px;overflow:hidden;box-shadow:0 10px 30px rgba(18,24,30,0.06);position:relative;background:#f5f6f7}
.hero .carousel-inner{border-radius:12px}
.hero-slide{height:58vh;min-height:300px;background-position:center;background-size:cover;display:flex;align-items:center}
.hero-overlay{position:absolute;left:20px;bottom:26px;z-index:5;color:#fff;padding:18px 22px;border-radius:8px;background:linear-gradient(90deg, rgba(0,0,0,0.55), rgba(0,0,0,0.12));max-width:52%}
.hero-title{font-size:28px;font-weight:700;margin:0 0 6px}
.hero-cta{display:inline-block;margin-top:8px;padding:8px 14px;border-radius:8px;background:#ff3b3b;color:#fff;font-weight:700;text-decoration:none}

/* carousel controls - subtle square buttons vertically centered */
.carousel-control-prev,
.carousel-control-next{
  width:44px;height:44px;border-radius:8px;background:rgba(7,10,13,0.6);border:none;top:50%;transform:translateY(-50%);opacity:0.95;
}
.carousel-control-prev-icon,
.carousel-control-next-icon{background-size:18px 18px;filter:invert(1)}

/* centered small indicators */
.carousel-indicators{bottom:14px}
.carousel-indicators button{width:10px;height:10px;border-radius:50%;opacity:.85}
.carousel-indicators .active{opacity:1}

/* strip under hero (like empty gutter) */
.hero-gutter{height:24px}

/* section headings */
.section-title{font-weight:700;margin:28px 0 14px;font-size:20px;color:#212529}

/* movie grid like bookmyshow cards */
.movie-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:18px}
.movie-card{background:#fff;border-radius:10px;overflow:hidden;text-align:left;box-shadow:0 8px 20px rgba(18,24,30,0.04);transition:transform .16s}
.movie-card:hover{transform:translateY(-6px)}
.movie-poster{width:100%;height:230px;object-fit:cover;display:block;border-bottom:1px solid #f1f1f1}
.movie-body{padding:10px 12px}
.movie-name{font-size:15px;font-weight:600;margin:0 0 6px;color:#111}
.movie-sub{font-size:13px;color:#6c757d;margin-bottom:8px}
.movie-actions{display:flex;justify-content:space-between;align-items:center}

/* small booking button */
.btn-book{background:#ff3b3b;color:#fff;padding:6px 10px;border-radius:6px;text-decoration:none;font-weight:700}

/* responsive */
@media(max-width:768px){
  .hero-overlay{max-width:80%;left:14px;bottom:18px;padding:12px}
  .hero-title{font-size:20px}
  .movie-poster{height:180px}
}
@media(max-width:420px){
  .movie-poster{height:150px}
}
</style>

<div class="container home-wrap">

  <!-- HERO / LARGE BANNER -->
  <div id="bmsHero" class="hero carousel slide" data-bs-ride="carousel" aria-label="Featured banners">
    <!-- indicators -->
    <div class="carousel-indicators">
      <?php $slides = allrecords("movie order by mid desc limit 4"); $si=0; foreach($slides as $s){ ?>
        <button type="button" data-bs-target="#bmsHero" data-bs-slide-to="<?= $si ?>" class="<?= $si==0 ? 'active' : '' ?>" aria-label="Slide <?= $si+1 ?>"></button>
      <?php $si++; } ?>
    </div>

    <div class="carousel-inner">
      <?php $i=0; foreach($slides as $m): $active = $i==0 ? 'active' : ''; ?>
        <div class="carousel-item <?= $active ?>">
          <div class="hero-slide" style="background-image:url('<?= esc($m['banner']) ?>')">
            <!-- overlay content placed bottom-left -->
            <div class="hero-overlay" role="region" aria-label="<?= esc($m['mname']) ?>">
              <div class="hero-title"><?= esc($m['mname']) ?></div>
              <div style="color:rgba(255,255,255,0.92);font-size:14px;margin-top:6px">
                <?= esc(strlen($m['shortdesc'] ?? '')? (strlen($m['shortdesc'])>140?substr($m['shortdesc'],0,140).'...':$m['shortdesc']) : '') ?>
              </div>
              <div style="margin-top:12px">
                <a class="hero-cta" href="bookticket.php?mid=<?= $m['mid'] ?>">Book Tickets</a>
                <a class="btn" href="mdetails.php?mid=<?= $m['mid'] ?>" style="margin-left:10px;background:rgba(255,255,255,0.12);color:#fff;padding:8px 12px;border-radius:8px;text-decoration:none;font-weight:600">Details</a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endforeach; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#bmsHero" data-bs-slide="prev" aria-label="Previous">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bmsHero" data-bs-slide="next" aria-label="Next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- small gap so hero visually floats like reference -->
  <div class="hero-gutter"></div>

  <!-- Recommended / Now Showing section (no extra navigation added) -->
  <h3 class="section-title">Recommended Movies</h3>
  <div class="movie-grid" aria-live="polite">
    <?php foreach(allrecords("movie order by mid desc limit 12") as $mv): ?>
      <div class="movie-card" role="article">
        <img class="movie-poster" src="<?= esc($mv['poster']) ?>" alt="<?= esc($mv['mname']) ?>" loading="lazy" onerror="this.onerror=null;this.src='assets/images/placeholder.png'">
        <div class="movie-body">
          <div class="movie-name"><?= esc($mv['mname']) ?></div>
          <div class="movie-sub"><?= esc($mv['genre'] ?? '') ?></div>
          <div class="movie-actions">
            <div>
              <a href="mdetails.php?mid=<?= $mv['mid'] ?>" style="text-decoration:none;color:#3b3b3b;font-weight:600;font-size:13px">Details</a>
            </div>
            <div>
              <a class="btn-book" href="bookticket.php?mid=<?= $mv['mid'] ?>">Book</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div style="text-align:center;margin-top:26px">
    <a href="bookings.php" class="btn" style="padding:10px 16px;border-radius:8px;border:1px solid #e9ecef;background:#fff;font-weight:600">View All Movies &amp; Shows</a>
  </div>

</div>

<script>
document.addEventListener('DOMContentLoaded',function(){
  var hero = document.querySelector('#bmsHero');
  if(hero && typeof bootstrap !== 'undefined'){
    new bootstrap.Carousel(hero,{interval:4500});
  }
});
</script>

<?php include_once 'newfooter.php'; ?>
