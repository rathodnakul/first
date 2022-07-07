<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from signup where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user'] = $row;
          }
        
         header("location: building_copy.html");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="loginmainstyle.css">
    <script src="loginmainscript.js"></script>
    <title>login</title>
</head>
    <body>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div style="background-color: rgba(19, 10, 153, 0.349);" class="form-items">
                        <h3 style="font-size:400%;">Log in</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="login.php" method="post">


                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address"
                                    required>

                            </div>


                            <br><br>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    required>

                            </div>






                            <div class="form-button mt-3">

                                <br><br>
                                <center><button id="submit" type="submit"
                                        style="border: none; border-radius: 4px; width: 70px; height: 40px;">Login</button>
                                </center>
                                <div class="new_account">
                                    <center> <a href="signup.php" id="new_account"
                                            style="text-decoration:none; color: rgb(255, 255, 255);">Create New
                                            Account</a> </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
