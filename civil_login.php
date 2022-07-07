<?php
    
$msg="fdgfg";
$conn = new mysqli('localhost','root','','civil_db');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{$fullname= $_POST['fullname'];
  $email= $_POST['email'];
  $password= $_POST['password'];
    $stmt = $conn->prepare("INSERT INTO signup(fullname, email, password) VALUES(?, ?, ?)");
    $stmt->bind_param("sss",$fullname, $email, $password);
    $stmt->execute();
    ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> This alert box could indicate a successful or positive action.
      </div>
      <?php 
    // header("Location:login.php");
    $msg = "registration successfully";
$stmt->close();
$conn->close();
}
?>
