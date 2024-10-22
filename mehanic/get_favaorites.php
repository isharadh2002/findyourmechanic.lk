<?php
$user_id = $_GET['user_id'];
$sql = "SELECT m.name, m.contact_info FROM favorites f JOIN mechanics m ON f.mechanic_id = m.id WHERE f.user_id = $user_id";
$result = $con->query($sql);
$favorites = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $favorites[] = $row;
    }
}

echo json_encode($favorites);
$con->close();

?>