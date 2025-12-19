<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <h2 class="heading">Messages</h2>
    <?php include_once 'msg.php'; ?>
    <table class="table table-bordered table-sm table-striped">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Name</th>
                <th>Subject</th>
                <th>Email ID</th>
                <th>Phone No</th> 
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (allrecords("contact") as $row) {                                
                ?>
                <tr>
                    <td><?= $row["Name"] ?></td>                    
                    <td><?= $row["Subject"] ?></td>
                    <td><?= $row["Email"] ?></td>
                    <td><?= $row["Phone"] ?></td> 
                    <td><?= $row["Message"] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php include_once 'dfooter.php'; ?>