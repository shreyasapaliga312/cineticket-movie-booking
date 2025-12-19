<?php

include_once 'dbfun.php';
$userid = $_POST["userid"];
$pwd = $_POST["pwd"];
$link = connect();
$query = "SELECT * FROM users WHERE userid='$userid' AND pwd='$pwd'";
$result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION["userid"] = $row["userid"];
    $_SESSION["uname"] = $row["uname"];
    $_SESSION["role"] = $row["role"];
    if ($row["role"] == "admin") {
        header("location: dashboard.php");
    } elseif ($row["role"] == "customer") {
        header("location: index.php");
    }
} 
else {
    $_SESSION["msg"]="Invalid username or password";
    header("location: login.php");
}
?>



