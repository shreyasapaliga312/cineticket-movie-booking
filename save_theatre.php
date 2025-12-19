<?php
include_once 'dbfun.php';

extract($_POST);

$link= connect();

$query="insert into theatre(tname,location,seats) values('$tname','$location','$seats')";

mysqli_query($link, $query) or die("Error ".mysqli_error($link));

$_SESSION["msg"]="Theatre registered successfully..";

header("location: theatres.php");

