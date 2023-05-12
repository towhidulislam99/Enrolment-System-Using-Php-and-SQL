<?php
require_once './dbcon.php';
?>
<?php 
ob_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Teacher Add Form</title>

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

<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Teacher <small> Edit Teacher  Info</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users"></i>All Teacher</a></li>
    <li class="active"><i class="fa fa-pencil-square"></i> Update Teacher</li>
</ol>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `teacher` WHERE `id`='$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-teacher'])){
 $t_name = $_POST['t_name'];
 $t_department = $_POST['t_department'];
 $t_phone = $_POST['t_phone'];
 
 
 
 
 
 
 $query ="UPDATE `teacher` SET `t_name`='$t_name',`t_department`='$t_department',`t_phone`='$t_phone' WHERE `id`='$id'";
  $result = mysqli_query($link,$query);
  
 
}

?>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="t_name">Teacher Name</label>
                <input type="text" name="t_name" placeholder="Teacher Name" id="t_name" class="form-control" required="" value="<?=$db_row['t_name'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="t_department">Department</label>
                <input type="text" name="t_department" placeholder="Father Name" id="t_department" class="form-control" required="" value="<?=$db_row['t_department'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="t_phone">Phone</label>
                <input type="text" name="t_phone" placeholder="Teacher Phone No" id="t_phone" class="form-control" required="" value="<?=$db_row['t_phone'] ?>"/>
            </div>
 
                
            <div class="form-group">
                <input type="submit" value="update-teacher" name="update-teacher" class="btn btn-primary pull-right "/>
                
            </div>
                
        </form>  
    </div> 

</div>