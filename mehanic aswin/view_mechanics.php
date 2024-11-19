<?php
include 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']==="POST"){
$serviceid=$_POST['serviceid'];

$sql="SELECT * FROM mechanics WHERE ServiceID=$serviceid";
$res=$con->query($sql);
if($res->num_rows>0)
{
while($row=$res->fetch_assoc()){
echo "Name:".$row['name']."<br>";
echo "Qualifications:".$row['Specification']."<br>";
echo "Phonenumber:".$row['WorkPhoneNumber']."<br>";
echo "Workplace:".$row['WorkAddress']."<br>";
}
}else{
    echo "No mechanics found";
}
}
?>