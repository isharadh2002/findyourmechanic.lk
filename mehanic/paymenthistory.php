<?php
include 'dbconnect.php';
$userid=$_GET['UserID'];
$sql="select ServiceID,Amount,PaymentDatefrom payment where UserID=$userid  ";
$res=$con->query($sql);
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        echo "".."";
        echo "Amount:".$row['Amount']."<br>";
        echo "Paymentdate: ".$row['PaymentDate']."<br>";
        echo "Status:".$row['Status']."<br>";
    }
    
}else{
   echo "No payment history found."; 
}
?>