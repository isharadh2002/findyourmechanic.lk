<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - FindYourMechanic</title>
    <link rel="icon" href="../assets/FindYourMechanic_Circle.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="mechanic-management.css">
    <style>
        #manage-mechanic {
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
    $mechanics = array();
    $approved = 0;
    $nonapproved = 0;
    $disqualified = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mechanics[] = $row;
            //print_r($row);
            if ($row['IsApproved'] == 1) {
                $approved++;
            } else if ($row['IsApproved'] == 0) {
                $nonapproved++;
            } else if ($row['IsApproved'] == 2) {
                $disqualified++;
            }
        }
    }
    echo "<h1>Approved Mechanics : $approved</h1>";
    echo "<h1>Non Approved Mechanics : $nonapproved</h1>";
    ?>
    <h2>Pending Mechanic Approvals</h2>
    <?php
    if ($nonapproved == 0):
        echo "<h3>No pending mechanic approvals.</h3>";
    else:
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
            foreach ($mechanics as $mechanic):
                if ($mechanic['IsApproved'] == 0):
            ?>
                    <tr class="table-data-tr">
                        <td class="table-data"><?php echo $mechanic['MechanicID']; ?></td>
                        <td class="table-data"><?php echo $mechanic['UserID']; ?></td>
                        <td class="table-data"><?php echo $mechanic['Name']; ?></td>
                        <td class="table-data"><?php echo $mechanic['WorkAddress']; ?></td>
                        <td class="table-data"><?php echo $mechanic['WorkPhoneNumber']; ?></td>
                        <td class="table-data"><?php echo $mechanic['Specification']; ?></td>
                        <td class="table-data"><?php echo ($mechanic['IsApproved']) ? "Approved" : "Not Approved"; ?></td>
                        <td class="table-data approve-btn"><a href="approve-mechanic.php?mechanicid=<?php echo $mechanic['MechanicID']; ?>&function=approve">Approve</a></td>
                        <td class="table-data disapprove-btn"><a href="approve-mechanic.php?mechanicid=<?php echo $mechanic['MechanicID']; ?>&function=disqualify">Disqualify</a></td>
                    </tr>
            <?php
                endif;
            endforeach;
            ?>
        </table>
    <?php
    endif;
    ?>

    <h2>Approved Mechanics</h2>
    <?php
    if ($approved == 0):
        echo "<h3>No approved mechanics exist.</h3>";
    else:
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
            foreach ($mechanics as $mechanic):
                if ($mechanic['IsApproved'] == 1):
            ?>
                    <tr class="table-data-tr">
                        <td class="table-data"><?php echo $mechanic['MechanicID']; ?></td>
                        <td class="table-data"><?php echo $mechanic['UserID']; ?></td>
                        <td class="table-data"><?php echo $mechanic['Name']; ?></td>
                        <td class="table-data"><?php echo $mechanic['WorkAddress']; ?></td>
                        <td class="table-data"><?php echo $mechanic['WorkPhoneNumber']; ?></td>
                        <td class="table-data"><?php echo $mechanic['Specification']; ?></td>
                        <td class="table-data"><?php echo ($mechanic['IsApproved']) ? "Approved" : "Not Approved"; ?></td>
                        <td class="table-data approve-btn"><a href="approve-mechanic.php?mechanicid=<?php echo $mechanic['MechanicID']; ?>&function=disqualify">Disqualify</a></td>
                    </tr>
            <?php
                endif;
            endforeach;
            ?>
        </table>
    <?php
    endif;
    ?>
</body>

</html>