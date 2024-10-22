<?php
    include 'dbconnect.php';
    $userid=$_GET['UserID'];
    $sql="select Service,AppiontmentDate,Location,Status from appiontment where UserID=$userid";
    $res=$con->query($sql)
    if($res->num_rows>0){
        while ($row=$res->fetch_assoc()){
            echo "Service:".$row['Service']."<br>";
            echo"Appiontment date:".$row['AppiontmentDate']."<br>";
            echo "Location".$row['Location']."<br>";
            echo "Status".$row['Status']."<br>";
        }
    }else{
        echo "No appiontments found";
    }
?>