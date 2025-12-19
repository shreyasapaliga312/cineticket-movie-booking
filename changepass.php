<?php

include_once 'dbfun.php';
$userid=$_SESSION["userid"];
$link= connect();
extract($_POST);
if(countifrecords("users", "userid='$userid' and pwd='$pwd'")==1){
    $query="update users  set pwd='$npwd' where userid='$userid'";
    mysqli_query($link, $query) or die("Error ". mysqli_error($link));
    $_SESSION["msg"]="Password changed successfully..!!";
}
else{
    $_SESSION["error"]="Invalid current password";
}

header('location: '.$_SERVER["HTTP_REFERER"]);


