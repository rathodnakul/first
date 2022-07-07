<?php
    
    $msg="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
$conn = new mysqli('localhost','root','','civil_db');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{

  $statusMsg = '';

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
        
            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
          
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
