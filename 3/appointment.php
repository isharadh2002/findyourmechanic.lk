<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "/xampp/htdocs/findyourmechanic.lk/1/connect.php";
    ?>
    <h3>this shows not approval appointments</h3>
    <table class="user-table">
            <tr class="table-heading-tr">
                <th class="table-heading userid">UserID</th>
                <th class="table-heading username">Username</th>
                <th class="table-heading email">Email</th>
                <th class="table-heading phone">Phone Number</th>
                <th class="table-heading address">Address</th>
                <th class="table-heading usertype">UserType</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)):
                $users[] = $row;
            ?>
                <tr class="table-data-tr">
                    <td class="table-data"><?php echo $row['UserID'] ?></td>
                    <td class="table-data"><?php echo $row['Username'] ?></td>
                    <td class="table-data"><?php echo $row['Email'] ?></td>
                    <td class="table-data"><?php echo $row['PhoneNumber'] ?></td>
                    <td class="table-data"><?php echo $row['Address'] ?></td>
                    <td class="table-data"><?php echo $row['UserType'] ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </table>

    <h3>this shows  approval appointments</h3>


</body>
</html>