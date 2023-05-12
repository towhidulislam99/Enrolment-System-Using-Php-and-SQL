<?php
require_once'./dbcon.php';
session_start();
if(iSSet($_POST['registration'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Username = $_POST['Username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    
    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $Username.'.'.$photo;

  $input_error = array();

  if(empty($name)){
      $input_error['name'] ="The Name Field is Required";
  }
  
  if(empty($email)){
      $input_error['email'] ="The email Field is Required";
  }
  
  if(empty($Username)){
      $input_error['Username'] = "The Username Field is Required";
  }
  
  if(empty($password)){
      $input_error['password'] = "The password Field is Required";
  }
  
  if(empty($c_password)){
      $input_error['c_password'] = "The confirm password Field is Required";
  }
  if(count($input_error)== 0){
  $email_chack = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';");

  if(mysqli_num_rows($email_chack)== 0){
  $Username_chack = mysqli_query($link,"SELECT * FROM `users` WHERE `Username` = '$Username';");
  if(mysqli_num_rows($Username_chack)== 0){
      if(strlen($Username)> 7){
      if(strlen($password)> 7){
         if($password == $c_password){
             $password = md5($password);
           $query ="INSERT INTO users (name, email, Username, password, photo, status) VALUES ('$name','$email','$Username','$password','$photo_name','inactive')";  
          
                  
       $result = mysqli_query($link, $query) ;  
       if($result){
              $_SESSION['data_insert_success']= "Data Insert Success";
              move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
              header('location: registration.php');
          }else{
              $_SESSION['data_insert_error']="Data Insert Error"; 
          }   
          
          
         }else{
             $password_not_match = "Conform Password not match";
         } 
      }else{
          $password_l = "Password More than 8 Character";
      
      }
  }else{
  $Username_l = "Username More than 8 Character";    
  }
  }
  else{
     $Username_error ="Username Already Exists";  
  }
  }
  else{
   $email_error ="This Email Adress Already Exists";   
  }
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
    <title>User Registration Form</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="stylesheet" type="text/css" href="../css/style.css" media="all"/>
    
    
   
  </head>
  <body>
      <h1 style="background: #0000FF; height: 60px; padding: 8px; color: white;" class="text-center">User Registration Form</h1>
      <div class="container"style="background: #F5F5F5;" >
           <?php if(isset($_SESSION['data_insert_success'])){echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>'; }?>
          <?php if(isset($_SESSION['data_insert_error'])){echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';}?>
   
          <hr/>
         
        <div class="row">
              <div class="col-md-12 col-lg-offset-3">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                  <div class="form-group">
                      <label for="name" class="control-label col-sm-1" > Name</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="name" type="text" name="name" placeholder="Enter your Name" value="<?php if(iSSet($name))echo $name;?>"/>
                      </div>
                  
                      <label class="error">
                          <?php
                         if(iSSet($input_error['name'])){echo $input_error['name'];} 
                         ?>
                      </label>
                      </div>
                      <div class="form-group">
                      <label for="email" class="control-label col-sm-1"> email</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="email" type="email" name="email" placeholder="Enter your E-mail" value="<?php if(iSSet($email))echo $email;?>"/>
                      </div>
                  
                      <label class="error">
                          <?php
                         if(iSSet($input_error['email'])){echo $input_error['email'];} 
                         ?>
                      </label>
                      <label class="error">
                          <?php
                         if(iSSet($email_error)){echo $email_error;} 
                         ?>
                      </label>
                      </div>
                      
                      <div class="form-group">
                      <label for="username" class="control-label col-sm-1"> Username</label>
                      <div class="col-sm-4">
                        <input class="form-control" id="Username" type="text" name="Username" placeholder="Enter your Username" value="<?php if(iSSet($Username))echo $Username;?>"/>
                      </div>
                      <label class="error">
                          <?php
                         if(iSSet($input_error['Username'])){echo $input_error['Username'];} 
                         ?>
                      </label>
                      
                      <label class="error">
                          <?php
                         if(iSSet($Username_error)){echo $Username_error;} 
                         ?>
                      </label>
                      <label class="error">
                          <?php
                         if(iSSet($Username_l)){echo $Username_l;} 
                         ?>
                      </label>
                      
                        </div>

                      <div class="form-group">
                      <label for="password" class="control-label col-sm-1"> password</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="Password" type="password" name="password" placeholder="Enter your password" value="<?php if(iSSet($password))echo $password;?>"/>
                      </div>
                  
                      <label class="error">
                          <?php
                         if(iSSet($input_error['password'])){echo $input_error['password'];} 
                         ?>
                      </label>
                      <label class="error">
                          <?php
                         if(iSSet($password_l)){echo $password_l;} 
                         ?>
                      </label>
                      </div>
                      <div class="form-group">
                      <label for="c_password" class="control-label col-sm-1"> conform password</label>
                      <div class="col-sm-4">
                          <input class="form-control" id="c_password" type="password" name="c_password" placeholder="conform password" value="<?php if(iSSet($c_password))echo $c_password;?>"/>
                      </div>
                  
                      <label class="error">
                          <?php
                         if(iSSet($input_error['c_password'])){echo $input_error['c_password'];} 
                         ?>
                      </label>
                      <label class="error">
                          <?php
                         if(iSSet($password_not_match)){echo $password_not_match;} 
                         ?>
                      </label>
                      </div>
                      <div class="form-group">
                      <label for="photo" class="control-label col-sm-1"> photo</label>
                      <div class="col-sm-4">
                          <input id="photo" type="file" name="photo" />
                      </div>
                  </div>

                      <div class="col-sm-4 col-sm-offset-1">
                          <input type="submit" value="Registration" name="registration" class="btn btn-primary pull-right"/>
                      </div>
                      
                      
                      </form>
                  </div>
              </div>
          <br/>
          <br/>
          
          <p class="text-center">if you have an account? then please <a href="login.php"> Login</a> </p>
          <hr/>
          <footer>
              <p class="text-center">copyright &copy: 2016- <?= date('Y')?> All Rights Reserved</p>
          </footer>
      </div>  

    
  </body>
</html>