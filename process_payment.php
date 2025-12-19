 <?php
include_once 'dbfun.php';

session_start(); // Ensure the session is started

// Extract form data
$name_on_card = $_POST['name_on_card'];
$cvv = $_POST['cvv'];
$card_number = $_POST['card_number'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$bid = $_POST['bid'];

// Validate required fields
if (empty($name_on_card) || empty($cvv) || empty($card_number) || empty($exp_month) || empty($exp_year) || empty($bid)) {
    die('Error: All fields are required.');
}

$link = connect();
$userid = $_SESSION["userid"];
$amount = 100; // Assuming a fixed amount for simplicity

$paymentQuery = "INSERT INTO payment (bid, cid, amount, name_on_card, cvv, card_number) 
                 VALUES ('$bid', '$userid', '$amount', '$name_on_card', '$cvv', '$card_number')";

if (mysqli_query($link, $paymentQuery)) {
    $_SESSION["msg"] = "Payment successful.";
    header("location: showticket.php?id=$bid");
} else {
    die("Error " . mysqli_error($link));
}

mysqli_close($link);
?>