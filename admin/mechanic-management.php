<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - FindYourMechanic</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        #manage-mechanic{
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
    $query = "SELECT * FROM `mechanic`";
    $result = mysqli_query($con,  $query);
    $mechanics = [];
    if (mysqli_num_rows($result) > 0):
    ?>
        <table class="user-table">
            <tr class="table-heading-tr">
                <th class="table-heading mechanicid">Mechanic ID</th>
                <th class="table-heading userid">UserID</th>
                <th class="table-heading username">Name</th>
                <th class="table-heading email">Work Address</th>
                <th class="table-heading phone">Work Phone Number</th>
                <th class="table-heading address">Specification</th>
                <th class="table-heading usertype">Is Approved</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)):
                $mechanics[] = $row;
                //print_r($row);
            ?>
                <tr class="table-data-tr">
                    <td class="table-data"><?php echo $row['MechanicID'] ?></td>
                    <td class="table-data"><?php echo $row['UserID'] ?></td>
                    <td class="table-data"><?php echo $row['Name'] ?></td>
                    <td class="table-data"><?php echo $row['WorkAddress'] ?></td>
                    <td class="table-data"><?php echo $row['WorkPhoneNumber'] ?></td>
                    <td class="table-data"><?php echo $row['Specification'] ?></td>
                    <td class="table-data"><?php echo ($row['IsApproved']) ? "Approved" : "Not Approved"; ?></td>

                </tr>
            <?php
            endwhile;
            ?>
        </table>
    <?php
    //print_r($mechanics);
    endif;
    ?>
</body>
</html>