<?php

include_once 'dbfun.php';
$userid = $_GET["userid"];
$link = connect();

$result = mysqli_query($link, "SELECT * from users where userid='$userid'")
        or die("Error " . mysqli_error($link));

if ($row = mysqli_fetch_assoc($result)) {
    echo "no";
} else {
    echo "yes";
}
