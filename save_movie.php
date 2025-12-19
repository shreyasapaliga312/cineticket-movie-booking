<?php
include_once 'dbfun.php';

extract($_POST);

$link = connect();
$id = getMovieId();

$photoname = $_FILES["photo"]["tmp_name"];
$banner = $_FILES["banner"]["tmp_name"];
move_uploaded_file($photoname, "posters/$id.jpg");
$poster = "posters/$id.jpg";
move_uploaded_file($banner, "banners/$id.jpg");
$banner = "banners/$id.jpg";

// Retrieve the selected category from the form
$category = $_POST['category'];

$query = "INSERT INTO movie(mid,mname,reldate,director,actor,actress,trailer,poster,certificate,descr,banner,category) "
        . "VALUES('$id','$mname','$reldate','$director','$actor','$actress',"
        . "'$trailer','$poster','$certificate','$descr','$banner','$category')";

mysqli_query($link, $query) or die("Error " . mysqli_error($link));

$_SESSION["msg"] = "Movie saved successfully.";

header("location: movies.php");
?>
