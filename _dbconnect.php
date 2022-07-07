<?php
$server = "localhost";
$email = "root";
$password = "";
$database = "civil_db";

$conn = mysqli_connect($server, $email, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>
