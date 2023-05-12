<?php
require_once './dbcon.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Edit Student Profile</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet"type="text/css"href= "../css/style.css" >
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">

        <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>



    </head>
 

<h1 class="text-primary text-center" style="background: #008000; height:70px;padding: 14px; color: white;"><i class="fa fa-pencil-square"></i> Edit Profile <small style="color: red;"> Edit Student Info</small></h1>
<ol class="breadcrumb text-center" style="background: #B0E0E6;">
    <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=index.php?page=all-users" style="color: white;"><i class="fa fa-users"></i>All Users</a></li>
    <li class="active"><i class="fa fa-pencil-square"></i> Update Student Profile</li>
</ol>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `student` WHERE `id`= '$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['editprofile'])){
 $name = $_POST['name'];
 $username = $_POST['username'];
 $email = $_POST['email'];

 $query ="UPDATE `student` SET `name`='$name',`email`='$email',`username`='$username' WHERE `id`='$id'";
  $result = mysqli_query($link,$query);

 header('location: index.php?page=user-profile');
  
 
}

?>


<div class="row">
    <div class="col-sm-6 col-lg-offset-3" style="background: #F5F5F5;padding: 10px;">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" >
            <div class="form-group">
                <label for="name" class="control-label col-sm-3">User Name</label>
                <div class="col-sm-9">
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value="<?=$db_row['name'] ?>"/>
            </div>
            </div>
            
            <div class="form-group">
                <label for="username" class="control-label col-sm-3">Username</label>
                <div class="col-sm-9">
                <input type="text" name="username" placeholder="Username" id="username" class="form-control" required="" value="<?=$db_row['username'] ?>"/>
            </div>
            </div>
            
            <div class="form-group">
                <label for="city" class="control-label col-sm-3">Email</label>
                <div class="col-sm-9">
                <input type="text" name="email" placeholder="Email" id="email" class="form-control" required="" value="<?=$db_row['email'] ?>"/>
            </div>
            </div>
           
           
                
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-8">
                <input type="submit" value="Submit " name="editprofile" class="btn btn-primary pull-right "/>
                </div>
            </div>
                
        </form>  
    </div> 

</div>