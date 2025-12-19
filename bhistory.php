<?php 
include_once 'newheader.php'; 
include_once 'dbfun.php'; 
$cid = $_SESSION["userid"];
?>
<style>
    td {
        color: var(--theme-title);
    }
</style>
<div class="jumbotron bg-dark text-white rounded-0" style="margin-top: 70px;">
    <h2 class="heading">Booking History</h2>
</div>
<div class="container">
    <table class="table table-bordered table-sm">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Booking ID</th>
                <th>Movie Name</th>
                <th>Theatre Name</th>
                <th>No. of Tickets</th>
                <th>Seat Numbers</th>
                <th>Amount</th>
                <th>Booking Date</th> 
                <th>Action</th> <!-- Add this column for the delete button -->
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (findall("booking", "cid='$cid'") as $row) {
                $t = single("theatre", "tid='{$row["tid"]}'");
                $s = single("shows", "id='{$row["sid"]}'");
                $m = single("movie", "mid='{$row["mid"]}'");
                ?>
                <tr>
                    <td><?= $row["bid"] ?></td>
                    <td><?= $m["mname"] ?></td>
                    <td><?= $t["tname"] ?></td>
                    <td><?= $row["seat"] ?></td>
                    <td><?= $row["seatnums"] ?></td>
                    <td><?= $row["amount"] ?></td>
                    <td><?= date('d-M-Y', strtotime($row["bdate"])) ?></td>
                    <td>
                        <button onclick="confirmDeletion(<?= $row['bid'] ?>)" class="btn btn-danger btn-sm">Cancel</button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
function confirmDeletion(bid) {
    if (confirm('Do you really want to cancel your ticket? If you are canceling the ticket, it will be refunded only if it is canceled 24 hours before the movie show. Your amount will be refunded to your account. We will not notify you on our website.')) {
        window.location.href = 'delete_booking.php?bid=' + bid;
    }
}
</script>
<?php include_once 'newfooter.php'; ?>
