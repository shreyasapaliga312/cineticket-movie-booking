<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <h2 class="heading">Cancelled Bookings</h2>
    <table class="table table-bordered table-sm">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Booking ID</th>
                <th>Customer ID</th>
                <th>Movie ID</th>
                <th>Theatre ID</th>
                <th>Seats</th>
                <th>Seat Numbers</th>
                <th>Amount</th>
                <th>Booking Date</th>
                <th>Cancellation Date</th>
                <th>Action</th>
                <th>Refund Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (allrecords("admin_cancellations") as $row) {
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
                    <td><?= date('d-M-Y', strtotime($row["cdate"])) ?></td>
                    <td>
                        <?php if ($row['refund_status'] == 'Refunded') : ?>
                            <button class="btn btn-secondary btn-sm" disabled>Refunded</button>
                        <?php else : ?>
                            <button onclick="confirmRefund(<?= $row['bid'] ?>)" class="btn btn-danger btn-sm">Refund</button>
                        <?php endif; ?>
                    </td>
                    <td><?= $row["refund_status"] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
function confirmRefund(bid) {
    if (confirm('Do you want to refund this ticket?')) {
        window.location.href = 'refund_process.php?bid=' + bid;
    }
}
</script>
<?php include_once 'dfooter.php'; ?>
