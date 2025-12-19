<?php
include_once 'dbfun.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bid = $_POST['bid'];
    $action = $_POST['action'];

    $link = connect();

    if ($action == 'approve') {
        // Update booking status to Cancelled
        $update_booking_query = "UPDATE booking SET status='Cancelled' WHERE bid='$bid'";
        mysqli_query($link, $update_booking_query);

        // Update seat availability
        $booking = single("booking", "bid='$bid'");
        $seats = preg_split("[,]", $booking["seatnums"]);
        foreach ($seats as $seat) {
            // Implement the logic to mark the seat as available again
        }

        // Update notification status
        $update_notification_query = "UPDATE notifications SET status='Approved' WHERE message LIKE '%$bid%'";
        mysqli_query($link, $update_notification_query);
    } else {
        // Update notification status to Rejected
        $update_notification_query = "UPDATE notifications SET status='Rejected' WHERE message LIKE '%$bid%'";
        mysqli_query($link, $update_notification_query);
    }

    mysqli_close($link);
}

header("Location: admin_dashboard.php");
exit();
?>
