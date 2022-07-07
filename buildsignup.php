<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="loginstyle.css" />
    <script src="loginscript.js"></script>

    <title>signup</title>
</head>

<body>
<?php
 
 $statusMsg="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli('localhost','root','','civil_db');
    
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
    
    // File upload path
    $targetDir = "uploads/";
    $fileType = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    
    $fileName = uniqid(rand(), true).".". $fileType;
    $targetFilePath = $targetDir . $fileName;
    
    if(isset($_POST["signup"]) && !empty($_FILES["file"]["name"])){
    
        $fullname= $_POST['fullname'];
        $email= $_POST['email'];
        $gno= $_POST['gno'];
        $password= $_POST['password'];
        $gender= $_POST['gender'];  
        $contact= $_POST['contact'];  
    
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $stmt = $conn->prepare("INSERT INTO builder(fullname, email, gno, password, gender, photo, contact) VALUES(?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssi",$fullname, $email, $gno, $password, $gender, $fileName, $contact);
                $stmt->execute();
            
                $statusMsg = "Your registration successfully.";
              
            //    header("Location:building.html");
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    }
}
    ?>
    <div class="form-body">
        <div class="row">
            <div class="form-holder" style="background-image: url(bg4.jpeg); background-repeat:round;">
                <div class="form-content" style="background-color: rgba(69, 62, 110, 0.418);">
                    <div class="form-items" style="background-color: rgba(86, 81, 136, 0.699);">
                    <?php 
            if($statusMsg != "") { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success </strong> <?php echo $statusMsg ?> 
            </div>
            <?php
             }  ?> 
            
                        <h3>Builder Registration</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="buildsignup.php" method="post"
                            enctype="multipart/form-data">
                            <div class="col-md-12">
                                <label for="fullname">Enter your full name</label>
                                <input class="form-control" type="text" name="fullname" placeholder="Full Name" required />
                            </div>
                  <br>

                            <div class="col-md-12">
                                <label for="email">Enter your Email</label>
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required />
                            </div>
                            
                 <br>
            

                            <div  class="col-md-12">
                                <label for="g_no">GST No</label>
                                <input type="text" middle id="gno" name="gno" placeholder="Enter your GST No.">
                            </div>
                            
                <br>        
                            <div class="col-md-12">
                                <label for="password">Enter your Password</label>

                                <input class="form-control" type="password" name="password" placeholder="Password" required />
                            </div>
                <br>
            

                            <div class="col-md-12 mt-3">
                                <label class="mb-3 mr-1" for="gender">Gender </label>

                                <input type="radio" class="btn-check" name="gender" value="m" id="male" autocomplete="off" required />
                                <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" value="f" id="female" autocomplete="off" required />
                                <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                                <input type="radio" class="btn-check" name="gender" value="o" id="others" autocomplete="off" required />
                                <label class="btn btn-sm btn-outline-secondary" for="others">Others</label>
                    <br>
            <br>

                                <div class="profile">
                                    <label for="uploadfile">Profile picture</label>
                                    <input type="file" name="file">
                                </div>
                            </div>
                    <br>

                            <div class="col-md-12">
                                <label for="contact">Contact</label>

                                <input class="form-control" type="number" name="contact" placeholder="Enter contact number" required />
                            </div>

                    <br>
                           
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required >
                                <label class="form-check-label">I confirm that all data are correct</label>
                                <div class="invalid-feedback">
                                    Please confirm that the entered data are all correct!
                                </div>
                            </div>
                    
                    <br>
                           
                            <center>
                                <div class="form-button mt-3">
                                    <center><button id="submit" type="submit" name="signup"
                                            style="margin-right: 20px; border: none; border-radius: 4px; width: 70px; height: 40px;">Sign
                                            Up</button>
                                        <button id="submit" type="reset"
                                            style="border: none; border-radius: 4px; width: 70px; height: 40px;">Reset</button>
                                    </center>

                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>