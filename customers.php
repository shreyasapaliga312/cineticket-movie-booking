<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <h2 class="heading">Customers</h2>
    <?php include_once 'msg.php'; ?>
    <table class="table table-bordered table-sm table-striped">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Cust ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Email ID</th> 
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (allrecords("customers") as $row) {                                
                ?>
                <tr>
                    <td><?= $row["id"] ?></td>                    
                    <td><?= $row["uname"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= $row["email"] ?></td> 
                    <td><?= $row["gender"] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once 'dfooter.php'; ?>