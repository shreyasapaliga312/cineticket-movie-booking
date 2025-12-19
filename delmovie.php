<?php

include_once 'dbfun.php';

// Check if mid is set in the URL
if(isset($_GET["mid"])) {
    $mid = $_GET["mid"];

    // Get movie data to retrieve poster image path
    $movie = single("movie", "mid=$mid");
    $posterPath = $movie['poster'];

    // Delete the movie record from the database
    $link = connect();
    $query = "DELETE FROM movie WHERE mid=$mid";
    mysqli_query($link, $query);

    // Delete the movie poster image file
    if(file_exists($posterPath)) {
        unlink($posterPath); // Remove the file from the server
    }

    $_SESSION["msg"] = "Movie deleted successfully";
    header("location: movielist.php");
} else {
    $_SESSION["msg"] = "Invalid movie ID";
    header("location: movielist.php");
}
?>
