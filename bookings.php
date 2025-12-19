<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <h2 class="heading">Bookings</h2>
    <table class="table table-bordered table-sm">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Booking ID</th>
                <th>Customer Id</th>
                <th>Movie Id</th>
                <th>Theatre Id</th>
                <th>Seats</th>
                <th>Seat Numbers</th>
                <th>Amount</th>
                <th>Booking Date</th>                         
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (allrecords("booking") as $row) {
                ?>
                <tr>
                    <td><?= $row["bid"] ?></td>
                    <td><?= $row["cid"] ?></td>
                    <td><?= $row["mid"] ?></td>
                    <td><?= $row["tid"] ?></td>
                    <td><?= $row["seat"] ?></td>
                    <td><?= $row["seatnums"] ?></td>
                    <td><?= $row["amount"] ?></td>
                    <td><?= date('d-M-Y', strtotime($row["bdate"])) ?></td>
                </tr>
                <?php
            }
            ?>
            
        </tbody>
    </table>
</div>
<?php include_once 'dfooter.php'; ?>