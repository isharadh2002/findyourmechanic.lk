    <?php

            if (isset($_POST['submitButton'])) {
                require_once("../shared/connect.php");
                require_once("function.php");
                $name = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $contactNumber = $_POST['contactNumber'];
                $address = $_POST['address'];
                $usertype = 'mechanic';
                $specification=$_POST['specification'];
                $isApproved=0;
                $description=$_POST['description'];
                $profilePicture=$_FILES['fileName'];
                $coverPhoto=$_FILES['fileNameOfCoverPhoto'];
                    
        if(!$profilePicture && !$coverPhoto){


            header('Location:../../msg.php?error=PhotoNotSet');
        }
        
        if (isInputsEmpty($name, $email, $password, $contactNumber, $address,  $specification, $description) !== false) {
            header("LOcation:Signin-mec.php?error=emptyInputs");
            exit();
        }
        if (inValidResponse($name, $email,  $contactNumber) !== false) {

            header("LOcation:Signin-mec.php?error=invalidInputs");
            exit();
        }

        if (emailExists($con, $email, $name)) {

            header("Location:Signin.mec.php?error=UseremailExisits");
            exit();
        }
        insertDataUserTable($con, $name, $password, $usertype, $email, $contactNumber, $address);
        
        
       
        
        $userId=getUserIDUserTable($con,$email);
        $qry = "INSERT INTO mechanic(UserID,WorkAddress,WorkPhoneNumber,Specification,IsApproved,ProfilePicture,CoverPhoto,Description) VALUES (?,?,?,?,?,?,?,?);";
       
        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $qry)) {
            header("Location: Signin-mec.php?error=dbsterrorMechanic");
            exit();
        }
        else{

        mysqli_stmt_bind_param($stmt, 'isssisss', $userId, $address, $contactNumber, $specification, $isApproved,$ProfilePicture,$CoverPhoto,$description);

        mysqli_stmt_execute($stmt);

        header("Location:Signin-mec.php?error=sucessentryMechanic");
        mysqli_stmt_close($stmt);
    
        exit();
        }
        
            
            session_start();
                
                // Check if the file was uploaded
                if (isset($_FILES['file'])) {
                    $file = $_FILES['file'];
                    
                    // Check for upload errors
                    if ($file['error'] === UPLOAD_ERR_OK) {
                        // Move the uploaded file to a directory (optional)
                        $uploadDir = 'uploads/'; // Make sure this directory exists and is writable
                        $uploadFilePath = $uploadDir . basename($file['name']);
                        
                        if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
                            // Store the filename in session
                            $_SESSION['uploaded_file'] = $file['name'];
                           header("Location:../msg.php?error=sucessFileUploading");
                        } else {
                            header("Location:../msg.php?error=FailedUploadingFile");
                        }
                    } else {
                        header("Location:../msg.php?error=ErrorDuringUpload");
                    }
                } else {
                    header("Location:../msg.php?error=Error");
                }
                mysqli_close($con);
            }
            

                



        









    
