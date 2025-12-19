
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Movies List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .search-form {
            max-width: 400px; /* Adjust width as needed */
            /* margin: auto; */
           
        }

        .search-input {
            border: 2px solid #dc3545; /* Red border */
            border-radius: 20px; /* Rounded corners */
        }

        .search-button {
            border-radius: 20px; /* Rounded corners */
            background-color: #dc3545; /* Red button color */
            color: #fff; /* Text color */
        }

        .search-button:hover {
            background-color: #c82333; /* Darker red button color on hover */
        }
        .search-input {
    border: 2px solid #dc3545; /* Red border */
    border-radius: 20px; /* Rounded corners */
    /* box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);  */
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

        /* Category */
        #container {
            width: 200px;
            margin: 20px; /* Added margin to position the box */
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            /* box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); */
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        #languageOptions {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
        }

        #languageOptions.visible {
            opacity: 1;
            max-height: 200px; /* Adjust height as needed */
        }

        #languageOptions ul {
            list-style-type: none;
            padding: 0;
        }

        #languageOptions ul li {
            margin-bottom: 10px;
        }

        #languageOptions ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        #languageOptions ul li a:hover {
            color: #4CAF50;
        }

        /* Button style */
        #showOptionsBtn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        #showOptionsBtn:hover {
            background-color: #45a049;
        }
        .flexbox{
            display:flex;
            align-items: center;
            justify-content: center;
        }
        
 /* movie images */
 .image-container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
  }
  
  .image-item {
    text-align: center;
  }
  
  .image-item img {
    width: 200px; /* Adjust the width as needed */
    height: auto;
    border-radius: 5px;
  }
  
  .image-item span {
    display: block;
    margin-top: 5px;
  }
    </style>
</head>
<body>
<?php include_once 'newheader.php'; ?>

<div class="jumbotron bg-dark text-white rounded-0" style="margin-top: 70px;">
    <h2 class="heading">All Movies List</h2>
</div>

<!-- Category -->
<div class="flexbox">
<div id="container">
    <button id="showOptionsBtn">Category</button>
    <div id="languageOptions">
        <ul>
            <li><a href="movielist.php">All Movies</a></li>
            <li><a href="movielist.php?category=english">English</a></li>
            <li><a href="movielist.php?category=hindi">Hindi</a></li>
            <li><a href="movielist.php?category=kannada">Kannada</a></li>
        </ul>
    </div>
</div>

<!-- Search form -->
<div class="container mt-4">
    <form action="movielist.php" method="GET" class="search-form">
        <div class="input-group">
            <input type="text" class="form-control search-input" placeholder="Search for movies..." name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <div class="input-group-append">
                <button class="btn btn-danger search-button" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php 
        include_once 'dbfun.php'; // Include database functions

        // Check if category is set in URL
        if(isset($_GET['category'])) {
            $category = $_GET['category'];
            // Perform SQL query to fetch movies based on category
            $movies = findall("movie", "category = '$category'");
        } elseif(isset($_GET['search']) && !empty($_GET['search'])) {
            // Check if search query is set
            $search = $_GET['search'];
            // Perform SQL query to search for movies
            $movies = findall("movie", "mname LIKE '%$search%'");
        } else {
            // If neither category nor search query is set, fetch all movies
            $movies = allrecords("movie");
        }

        // Loop through the movies and display them
        foreach ($movies as $row) { ?>
            <div class="image-container">
                <div class="image">
  <div class="image-item">
                    <img style="height:350px;"  src="<?= $row["poster"] ?>">
        </div>
                    <div class="card-body">                                  
                        <h6 style="color:black; font-weight:bold;"><?= $row["mname"] ?></h6>                    
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary btn-sm" href="mdetails.php?mid=<?= $row["mid"] ?>">View Details</a>        
                    </div>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    // JavaScript code for toggling category options
    document.getElementById("showOptionsBtn").addEventListener("click", function() {
        var languageOptions = document.getElementById("languageOptions");
        languageOptions.classList.toggle("visible");
    });
</script>
<div class="image-container">
  <div class="image-item">
    <img src="./movie images/et00379050-nncvqtgwdr-portrait.avif" alt="Image 1">
    <span class="spann">Image </span>
  </div>

<?php include_once 'register.php'; ?>
<?php include_once 'newfooter.php'; ?>
</body>
</html>