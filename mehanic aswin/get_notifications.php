<?php
include 'dbconnect.php';
$userid=$_GET['UserID'];
$sql="select message,type,notificaton_date from notification where UserID=$userid ORDER BY Notificationdate DESC";
$res=$con->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        echo "<div>";
        echo "<strong>Type:</strong>".$row['type']."<br>";
        echo "<strong></strong>Date:".$row['notification_date']."<br>";
        echo "<strong></strong>Message:".$row['message']."<br>";
        echo "</div><hr>";
    }
}else{
    echo "No notifications found.";
}
?>