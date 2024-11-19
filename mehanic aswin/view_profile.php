<?php
include 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']==="POST"){
    $userid=$_POST[''];
$sql="select Username,Email,PhoneNumber,Address from user where UserID=$userid";
$res=$con->query($sql);
if($res->num_rows>0){
    $row=$res->fetch_assoc();
 echo "Name:".$row['Username']."<br>";
 echo"Email:".$row['Email']."<br>";
 echo"Phone:".$row['PhoneNumber']."<br>";
 echo"Address:".$row['Address']."<br>";

}else{
    echo "Profile not found";
}
}
?>


