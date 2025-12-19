<?php
include_once 'dbfun.php';
include_once 'newheader.php';
$id = $_GET["id"];
$info = single("booking", "bid=$id");
extract($info);
$t=single("theatre","tid=$tid");
$s=single("shows","id=$sid");

//print_r($info);
?>
<style>
    th,h4{
        color:var(--theme-title);
    }
</style>
<div class="container" style="margin-top: 80px;">
    <button id="print" class="btn btn-primary btn-sm my-2 px-3" onclick="print()">Print</button>
    <div class="row">
        <div class="col-sm-6">
            <div class="border p-2">
                <h4>Booking Ticket</h4>
                <table class="table table-sm">
                    <tr>
                        <th>Booking Id</th>
                        <th><?= $bid ?></th>
                    </tr>
                    <tr>
                        <th>Customer Id</th>
                        <th><?= $cid ?></th>
                    </tr>
                    <tr>
                        <th>Theatre Name</th>
                        <th><?= $t["tname"] ?></th>
                    </tr>
                    <tr>
                        <th>Show Name</th>
                        <th><?= $s["showname"] ?></th>
                    </tr>
                    <tr>
                        <th>Show Time</th>
                        <th><?= $s["showtime"] ?></th>
                    </tr>
                    <tr>
                    <tr>
                        <th>Seat Number</th> <!-- Added this row for seat number -->
                        <th><?= $seatnums ?></th>
                    </tr>
                    <tr>
                        <th>Booking Date</th>
                        <th><?= $bdate ?></th>
                    </tr>
                    <tr>
                        <th>No of Seats</th>
                        <th><?= $seat ?></th>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <th>$<?= $amount ?></th>
                    </tr>
                </table>            
            </div>
        </div>
    </div>

</div>
<?php include_once 'newfooter.php'; ?>