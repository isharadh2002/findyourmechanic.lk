<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FindYourMechanic</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        #dashboard {
            font-weight: bold;
            color: #b30000;
        }
    </style>
</head>

<body>
    <?php
    require "header.php";
    require "../shared/connect.php"
    ?>
    <h2>Recently Registered Users</h2>
    <?php
    $query = "SELECT  * FROM `user` ORDER BY `UserID` DESC LIMIT 10";
    $result = mysqli_query($con, $query);
    $recentUsers = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $recentUsers[] = $row;
            //print_r($row);
            //echo "<br>";
        }
    }

    if (count($recentUsers) == 0):
        echo "No recent user registrations";
    else:
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
            foreach ($recentUsers as $user):
            ?>
                <tr class="table-data-tr">
                    <td class="table-data"><?php echo $user['UserID'] ?></td>
                    <td class="table-data"><?php echo $user['Username'] ?></td>
                    <td class="table-data"><?php echo $user['Email'] ?></td>
                    <td class="table-data"><?php echo $user['PhoneNumber'] ?></td>
                    <td class="table-data"><?php echo $user['Address'] ?></td>
                    <td class="table-data"><?php echo $user['UserType'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    <?php
    endif;
    ?>
</body>

</html>