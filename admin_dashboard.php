<?php
include_once 'newheader.php'; 
include_once 'dbfun.php'; 
?>
<div class="container">
    <h2 class="heading">Cancellation Requests</h2>
    <table class="table table-bordered table-sm">
        <thead class='table-danger'>
            <tr>
                <th>Notification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (findall("notifications", "status='Pending'") as $row) {
                $bid = preg_replace('/[^0-9]/', '', $row['message']);
                ?>
                <tr>
                    <td><?= htmlspecialchars($row["message"], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <form method="post" action="admin_approve.php">
                            <input type="hidden" name="bid" value="<?= $bid ?>">
                            <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once 'newfooter.php'; ?>
