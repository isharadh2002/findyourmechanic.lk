<?php
require "../shared/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['mechanicid'])) {
        $mechanicID = $_GET['mechanicid'];
        echo "Mechanic ID: " . $mechanicID;

        if ($_GET['function'] == 'approve') {
            $query = "SELECT * FROM `mechanic` WHERE  `mechanicid` = '" . $mechanicID . "'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 1) {
                $updateQuery = "UPDATE `mechanic` SET `IsApproved` = 1 WHERE `MechanicID` = '" . $mechanicID . "'";
                $result = mysqli_query($con, $updateQuery);
                echo "<script>window.alert(\"Updated Successfully. \");
                window.location.href=\"mechanic-management.php\";</script>";
            } else {
                echo "<script>window.alert(\"Invalid Request\");
                window.location.href=\"mechanic-management.php\";</script>";
                echo "<script>window.alert(\"mechanic-management.php\");</script>";
            }
        } else if ($_GET['function'] == 'disqualify') {
            $query = "SELECT * FROM `mechanic` WHERE  `mechanicid` = '" . $mechanicID . "'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 1) {
                $updateQuery = "UPDATE `mechanic` SET `IsApproved` = 0 WHERE `MechanicID` = '" . $mechanicID . "'";
                $result = mysqli_query($con, $updateQuery);
                echo "<script>window.alert(\"Updated Successfully\");
                window.location.href=\"mechanic-management.php\";</script>";
            } else {
                echo "<script>window.alert(\"Invalid Request\");
                window.location.href=\"mechanic-management.php\";</script>";
            }
        } else {
            echo "<script>window.alert(\"Invalid Request\");
            window.location.href=\"mechanic-management.php\";</script>";
        }
    } else {
        echo "<script>window.prompt(\"Invalid Request\");</script>";
    }
}
?>
<script>
    //window.alert("Invalid Request");
</script>