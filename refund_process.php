<?php
include_once 'dbfun.php';

session_start(); // Start the session

if (isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    // Update refund status in the database
    $link = connect();
    $updateQuery = "UPDATE admin_cancellations SET refund_status = 'Refunded' WHERE bid = '$bid'";
    mysqli_query($link, $updateQuery);

    // Retrieve user's email for notification
    $bookingInfo = single("booking", "bid='$bid'");
    $userEmail = $bookingInfo['cid'];

    // Send notification to the user
    if (isset($_SESSION['admin_email'])) {
        $adminEmail = $_SESSION['admin_email'];

        // Notify the user about refund status
        $notificationMessage = "Your amount is refunded for canceled ticket.";
        // Assuming you have a function to send email notifications
        sendNotification($userEmail, $notificationMessage);

        // Redirect back to acancellation.php
        header("location: acancellation.php");
    } else {
        // If admin session not found, redirect to login page or handle as needed
        header("location: acancellation.php");
    }
} else {
    // If bid is not set, redirect back to acancellation.php or handle as needed
    header("location: acancellation.php");
}
?>
