<?php

session_start(); // Start session if not already started

include_once 'dbfun.php';

extract($_POST);

$link = connect();
$userid = $_SESSION["userid"];
$amount = $seats * 100;

$query = "INSERT INTO booking (cid, mid, tid, sid, bdate, seat, seatnums, amount) 
          VALUES ('$userid', '$mid', '$tid', '$sid', '$bdate', '$seats', '$seatnums', '$amount')";

if (mysqli_query($link, $query)) {
    $bid = mysqli_insert_id($link); // Get the last inserted booking ID

    // Insert payment data
    $name_on_card = $_POST['name_on_card']; // Assuming these values are coming from a form
    $cvv = $_POST['cvv'];
    $card_number = $_POST['card_number'];

    $paymentQuery = "INSERT INTO payment (bid, cid, amount, name_on_card, cvv, card_number) 
                     VALUES ('$bid', '$userid', '$amount', '$name_on_card', '$cvv', '$card_number')";
    mysqli_query($link, $paymentQuery) or die("Error " . mysqli_error($link));

    $_SESSION["msg"] = "Booking successful..";
    header("location: payment.php?id=$bid");
} else {
    die("Error " . mysqli_error($link));
}

mysqli_close($link);
?>
