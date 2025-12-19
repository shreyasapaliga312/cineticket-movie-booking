<?php
include_once 'dbfun.php';

if (isset($_GET['bid'])) {
    $bid = intval($_GET['bid']);
    
    // Delete associated payment records
    deletePayments($bid);
    
    // Store cancellation details
    storeCancellationDetails($bid);
    
    // Delete the booking
    deleteBooking($bid);
    
    header('Location: bhistory.php');
}

function deletePayments($bid) {
    $link = connect();
    
    // Delete payment records associated with the booking
    $query = "DELETE FROM payment WHERE bid = $bid";
    mysqli_query($link, $query) or die("Error deleting payments: " . mysqli_error($link));
    
    mysqli_close($link);
}

function storeCancellationDetails($bid) {
    $link = connect();
    
    // Fetch booking details
    $result = mysqli_query($link, "SELECT * FROM booking WHERE bid = $bid");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        // Insert cancellation details into admin_cancellations table
        $sql = "INSERT INTO admin_cancellations (bid, cid, mid, tid, seat, seatnums, amount, bdate, cdate) VALUES (
            '{$row['bid']}', 
            '{$row['cid']}', 
            '{$row['mid']}', 
            '{$row['tid']}', 
            '{$row['seat']}', 
            '{$row['seatnums']}', 
            '{$row['amount']}', 
            '{$row['bdate']}', 
            NOW()
        )";

        mysqli_query($link, $sql) or die("Error storing cancellation details: " . mysqli_error($link));
    }
    
    mysqli_close($link);
}

function deleteBooking($bid) {
    $link = connect();
    
    // Remove the booking record from the database
    $query = "DELETE FROM booking WHERE bid = $bid";
    mysqli_query($link, $query) or die("Error deleting booking: " . mysqli_error($link));
    
    mysqli_close($link);
}
?>
