<?php
include 'dbconnect.php';
if($_server['REQUEST_METHOD']==="POST"){
    $userid=$_POST['userid'];
$service=$_POST['service'];
$mechanicid=$_POST['mechanicid'];
$date=$_POST['appiontmentdate'];

$location=$_POST['location'];
$sql="insert into Appiontment(UserID,MechanicID,AppiontmentDate,Location,status)values('$userid','$service','$mechanicid','$appointmentdate',$location','$status') ";
}
