<?php

if (isset($_POST['submitButton'])) {

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contactNumber = $_POST['contactNumber'];
    $address = $_POST['address'];
    $usertype = 'customer';
    if (isset($_FILES['Qulifications'])) {
        $fileTmpPath = $_FILES['Qulification']['tmp_name'];
        $fileName = basename($_FILES['Qulification']['name']);
        $fileType = $_FILES['Qulifiaation']['type'];
        //there is some code lines to send the file to admin panel







    }

    $qry = 'INSERT INTO users (Username, Password, UserType, Email, PhoneNumber, Address) VALUES (?,?,?,?,?,?)';
    $stmt = mysqli_prepare($con, $qry);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $password, $usertype, $email, $contactNumber, $address);
    if (mysqli_stmt_execute($stmt)) {
        //LOcation
        echo "<h1>The SignIn is Sucess Full</h1>";
    } else {
        //location next page
        echo "<h1>The SignIn is Not Sucess</h1>";
        //location pre page
    }
}
mysqli_stmt_close($stmt);
mysqli_close($con);
