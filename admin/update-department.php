<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Student <small> Edit Student Info</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users"></i>All Students</a></li>
    <li class="active"><i class="fa fa-pencil-square"></i> Update Student</li>
</ol>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `department` WHERE `id`='$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-department'])){
 $department_name = $_POST['department_name'];
 $location = $_POST['location'];
 
 
 
 $query ="UPDATE `department` SET `department_name`='$department_name',`location`='$location' WHERE `id`='$id'";
  $result = mysqli_query($link,$query);
 
     
 }

?>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="department_name">Department Name</label>
                <input type="text" name="department_name" placeholder="Department Name" id="department_name" class="form-control" required="" value="<?=$db_row['department_name'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="location">Department Location</label>
                <input type="text" name="location" placeholder="Department Location" id="location" class="form-control" required="" value="<?=$db_row['location'] ?>"/>
            </div>
       
            <div class="form-group">
                <a href="http://localhost/mini_project/admin/index.php?page=all-department"> <input type="submit" value="update-department" name="update-department" class="btn btn-primary pull-right "/></a>
                
            </div>
                
        </form>  
    </div> 

</div>