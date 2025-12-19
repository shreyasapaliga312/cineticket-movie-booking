<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="row">
    <div class="col-sm-10 mx-auto">
        <h3 class="text-center heading">All Users</h3>
        <table id="tbl" class="table table-bordered table-sm table-striped">
            <thead class='table-danger'>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Type</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (allrecords("users") as $row) {
                    //$r2 = single("pg", "pgid='{$row["pgid"]}'");
                    ?>
                    <tr>
                        <td><?= $row["userid"] ?></td>
                        <td><?= $row["uname"] ?></td>
                        <td><?= $row["role"] ?></td>
                        <td><?= $row["pwd"] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>