<?php

include_once 'dbfun.php';

extract($_POST);

$link = connect();

if(countifrecords("users", "userid='$email'")==1){
    $_SESSION["msg"]="Email is already registered";
    header("location: registration.php");
}

$query = "insert into customers(uname,email,phone,gender) values('$uname','$email','$phone','$gender')";

mysqli_query($link, $query) or die("Error " . mysqli_error($link));

$query = "insert into users values('$email','$uname','$pwd','customer')";

mysqli_query($link, $query) or die("Error " . mysqli_error($link));

$_SESSION["userid"] = $email;
$_SESSION["uname"] = $uname;
$_SESSION["role"] = "customer";
header("location: index.php");
?>

