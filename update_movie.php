<?php
include_once 'dbfun.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $mid = $_POST['mid'];
    $mname = $_POST['mname'];
    $reldate = $_POST['reldate'];
    $director = $_POST['director'];
    $actor = $_POST['actor'];
    $actress = $_POST['actress'];
    $trailer = $_POST['trailer'];
    $certificate = $_POST['certificate'];
    $descr = $_POST['descr'];
    $category = $_POST['category'];

    // Handle image uploads
    $poster = ""; // Initialize poster variable
    if ($_FILES["poster"]["error"] == UPLOAD_ERR_OK) {
        $posterTmpName = $_FILES["poster"]["tmp_name"];
        $posterName = basename($_FILES["poster"]["name"]);
        $posterPath = "posters/" . $posterName;
        if (move_uploaded_file($posterTmpName, $posterPath)) {
            $poster = $posterPath;
        } else {
            // Handle file upload error
            echo "Error uploading poster image.";
            exit;
        }
    }

    $banner = ""; // Initialize banner variable
    if ($_FILES["banner"]["error"] == UPLOAD_ERR_OK) {
        $bannerTmpName = $_FILES["banner"]["tmp_name"];
        $bannerName = basename($_FILES["banner"]["name"]);
        $bannerPath = "banners/" . $bannerName;
        if (move_uploaded_file($bannerTmpName, $bannerPath)) {
            $banner = $bannerPath;
        } else {
            // Handle file upload error
            echo "Error uploading banner image.";
            exit;
        }
    }

    // Update database with new movie details
    $link = connect();
    $query = "UPDATE `movie` SET `mname`='$mname', `reldate`='$reldate', `director`='$director', `actor`='$actor', `actress`='$actress', `trailer`='$trailer', `certificate`='$certificate', `descr`='$descr', `category`='$category'";
    
    // Append poster and banner paths if they are not empty
    if (!empty($poster)) {
        $query .= ", `poster`='$poster'";
    }
    if (!empty($banner)) {
        $query .= ", `banner`='$banner'";
    }

    $query .= " WHERE `mid`='$mid'";
    
    // Execute the query
    mysqli_query($link, $query) or die("Error: " . mysqli_error($link));
    mysqli_close($link);

    // Redirect to movies.php or any other page
    header("location: movies.php");
}
?>
