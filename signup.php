<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="loginstyle.css" />
  <script src="loginscript.js"></script>

  <title>signup</title>
</head>

<body>
<?php
    
    $msg="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost','root','','civil_db');
    
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
      $fullname= $_POST['fullname'];
      $email= $_POST['email'];
      $password= $_POST['password'];
        $stmt = $conn->prepare("INSERT INTO signup(fullname, email, password) VALUES(?, ?, ?)");
        $stmt->bind_param("sss",$fullname, $email, $password);
        $stmt->execute();
        // header("Location:login.php");
        $msg = "registration successfully";
      $stmt->close();
      $conn->close();
    }
  }
    ?>
  <div class="form-body">
    <div class="row">
      <div class="form-holder" style="background-image: url(bg4.jpeg); background-repeat:round;">
        <div class="form-content" style="background-color: rgba(143, 105, 160, 0.438);">
          <div class="form-items" style="background-color: rgba(100, 75, 121, 0.699);">
             <?php 
            if($msg != "") { ?>
            <div class="alert alert-success alert-dismissible">
              <a href="login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Your</strong> <?php echo $msg ?> 
            </div>
            <?php
            //  header("Location:login.php"); 
             }  ?> 
            <h3>Sign up</h3>
            <p>Fill in the data below.</p>
            <form class="requires-validation" action="signup.php" method="post">
              <div class="col-md-12">
                <label for="g_no">Enter your full name</label>
                <input class="form-control" type="text" name="fullname" placeholder="Full Name" required />
              </div>
              <br />
              <div class="col-md-12">
                <label for="g_no">Enter your Email</label>

                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required />
              </div>
              <br />

              <div class="col-md-12">
                <label for="g_no">Enter your Password</label>

                <input class="form-control" type="password" name="password" placeholder="Password" required />
              </div>

              <br />
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
                <label class="form-check-label">I confirm that all data are correct</label>
                <div class="invalid-feedback">
                  Please confirm that the entered data are all correct!
                </div>
              </div>

              <br /><br />
              <center>
                <div class="form-button mt-3">
                  <center><button id="submit" type="submit"
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