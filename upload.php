<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> builder details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
  <body>
      <div class="container">
          <h1 class="text-center text-white bg-dark" >Builder list</h1>
          <br>
          <div class="table-responsiv">
          <table class="table table-bordered table-striped table-hover">
              <thead>
                  <th>Id</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Gst No</th>
                  <!-- <th>Password</th> -->
                  <th>Gender</th>
                  <th>Photo</th>
                  <th>Contact</th>
              </thead>
              <tbody>
                <?php  

                   $con = mysqli_connect('localhost','root');
                   mysqli_select_db($con,'civil_db');

                   

                         $displayquery = "select * from builder";
                         $querydisplay = mysqli_query($con,$displayquery);
                         


                         while($result = mysqli_fetch_array($querydisplay)){

                            ?>
                             <tr>
                                 <td> <?php  echo $result['id']; ?> </td>
                                 <td> <?php  echo $result['fullname']; ?> </td>
                                 <td> <?php  echo $result['email']; ?> </td>
                                 <td> <?php  echo $result['gno']; ?> </td>
                                 <!-- <td> <?php  echo $result['password']; ?> </td> -->
                                 <td> <?php  echo $result['gender']; ?> </td>
                                 <td> <img src="./uploads/<?php  echo $result['photo']; ?>" height="160px" width="150px"> </td>
                                 <td> <?php  echo $result['contact']; ?> </td>
                                 
                             </tr>

                         <?php
                         }


//                      }
     
                
      
// } 
      
?>
              </tbody>
              
       
          </table>
          </div>
      </div>
    
   
  </body>
</html>