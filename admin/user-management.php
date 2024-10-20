<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - FindYourMechanic</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="user-management.css">
    <style>
        #manage-user {
            font-weight: bold;
            color: #b30000;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    require "../shared/connect.php";
    ?>
    <?php
    $query = "SELECT * FROM `user`";
    $result = mysqli_query($con,  $query);
    $users = [];
    if (mysqli_num_rows($result) > 0):
    ?>
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
    <?php
    //print_r($users);
    endif;
    ?>
</body>

</html>