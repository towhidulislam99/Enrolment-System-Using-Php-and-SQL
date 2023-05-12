<?php 
require_once './dbcon.php';
session_start();

if(isset($_SESSION['user_login'])){
 header('location: index.php');  
}

if(isset($_POST['login'])){
    $Username = $_POST['Username'];
    $password = $_POST['password'];
  
   $Username_check = mysqli_query($link, " SELECT * FROM `users` WHERE `Username` = '$Username'");
   if(mysqli_num_rows($Username_check)>0){
    $row = mysqli_fetch_assoc($Username_check);
    
  if($row['password']== md5($password)){
    if($row['status']== 'active'){
        $_SESSION['user_login']= $Username;
        header('location:index.php');
    } else{
        $status_inactive = "Your Status Inactive";
    }
  }else{
      $wrong_password = "This Password doesn't Match";
  }
   }
    else{
        $Username_not_found = "This Username not Found";
    }
    
    
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Enrollment System</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">

   
  </head>
  <body>
      <div class="container animated shake" style="background: #F0F8FF; height:500px;">
          <h1  class="text-center"style="background: #00CED1;padding: 16px; color: white;">New Model University College</h1>
          <h1 style="font-family: Lucida console; color: #FF0000; "  class="text-center">Enrollment System</h1>
          
          <br/>
          <div class="row" >
              <div class="col-sm-4 col-sm-offset-4">
                  <form name="form1" action="login.php" method="POST" class="animated shake">
                      <h2 class="text-center" style="color: #000080;">Admin Login</h2>
                  
                      <div>
                          <input type="text" name="Username" class="form-control" placeholder="Username"  required="" value="<?php if(isset($Username)){echo $Username;}?>" />
                      </div>
                  </br>
                      <div>
                          <input type="password" name="password" class="form-control" placeholder="password"  required=""  value="<?php if(isset($password)){echo $password;}?>"/>
                      </div>
                      <br/>
                      <div>
                        <input class="btn btn-default pull-right btn-primary" type="submit" name="login" value="Login" > 
                      </div> <a herf="../">Back</a>
                      </br>
                      </br>
                       </br>
                      
                      <p class="text-center">Haven't any Account? <a href="registration.php">SignUp</a></p>
                      
                  </form>
              </div>
          </div>
          <br/>
          <?php if(isset($Username_not_found)){
              echo '<div class="alert alert-danger col-sm-3 col-sm-offset-4">'.$Username_not_found.'</div>';} ?>
          <?php if(isset($wrong_password)){
              echo '<div class="alert alert-danger col-sm-3 col-sm-offset-4">'.$wrong_password.'</div>';} ?>
          <?php if(isset($status_inactive)){
              echo '<div class="alert alert-danger col-sm-3 col-sm-offset-4">'.$status_inactive.'</div>';} ?>
          
      </div>

    
  </body>
 </html>