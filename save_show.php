<?php

include_once 'dbfun.php';

extract($_POST);

$link= connect();

$query="insert into shows(showname,showtime,endtime,tid,amount) "
        . "values('$showname','$showtime','$endtime','$tid','$amount')";

mysqli_query($link, $query) or die("Error ".mysqli_error($link));

$_SESSION["msg"]="Show Saved successfully..";

header("location: shows.php");



