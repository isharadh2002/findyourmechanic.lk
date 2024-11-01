<?php
include 'dbconnect.php';
$sql="select Model,RegistrationNumber,Brand from vehicle where UserID=$userid";
$res=$con->query($sql);
if($res->num_rows>0)
{
    while($row=$res->fetch_assoc){
echo "Model:".$row['Model']."<br>";
echo "Registrationnumber:".$row['RegistrationNumber']."<br>";
echo "Brand:".$row['Brand']."<br>";
    }
}else{
echo "No vehicle found";
}
?>