<h1 class="text-primary"><i class="fa fa-pencil-square"></i> Update Student <small> Edit Student Info</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users"></i>All Students</a></li>
    <li class="active"><i class="fa fa-pencil-square"></i> Update Student</li>
</ol>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `examination` WHERE `id`='$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-Examinfo'])){
 $s_roll = $_POST['s_roll'];
 $ex_name = $_POST['ex_name'];
 $department = $_POST['department'];
 $Tutionfee = $_POST['Tutionfee'];
 $ex_fee = $_POST['ex_fee'];
 $due = $_POST['due'];
 $status = $_POST['status'];
 
 
 
 
 
 
 $query ="UPDATE `examination` SET `s_roll`='$s_roll',`ex_name`='$ex_name',`department`='$department',`Tutionfee`='$Tutionfee',`ex_fee`='$ex_fee',`due`='$due',`status`='$status' WHERE `id`='$id'";
  $result = mysqli_query($link,$query);
  
}

?>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name">Student Roll</label>
                <input type="text" name="s_roll" placeholder="Student Roll" id="s_roll" class="form-control" required="" value="<?=$db_row['s_roll'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="ex_name">Exam Name</label>
                <select id="ex_name" class="form-control" name="ex_name" required="" >
                    <option  value="">Select</option>
                    <option <?php echo $db_row['ex_name']=='Incourse'?'selected=""':'';  ?> value="Incourse">Incourse</option>
                    <option <?php echo $db_row['ex_name']=='Midterm'?'selected=""':'';  ?> value="Midterm">Midterm</option>
                    <option <?php echo $db_row['ex_name']=='Board Exam'?'selected=""':'';  ?> value="Board Exam">Board Exam</option>
                   
                </select>
            </div>

             <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" placeholder="Department" id="department" class="form-control" required="" value="<?=$db_row['department'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="Tutionfee">Tution Fee</label>
                <input type="text" name="Tutionfee" placeholder="Tution Fee" id="Tutionfee" class="form-control" required="" value="<?=$db_row['Tutionfee'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="ex_fee">Examination Fee</label>
                <input type="text" name="ex_fee" placeholder="Examination Fee" id="ex_fee" class="form-control" required="" value="<?=$db_row['ex_fee'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="due">Due</label>
                <input type="text" name="due" placeholder="Due" id="due" class="form-control" required="" value="<?=$db_row['due'] ?>"/>
            </div>
            
            
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required="" >
                    <option  value="">Select</option>
                    <option <?php echo $db_row['status']=='Paid'?'selected=""':'';  ?> value="Paid">Paid</option>
                    <option <?php echo $db_row['status']=='Unpaid'?'selected=""':'';  ?> value="Unpaid">Unpaid</option>
    
                </select>
            </div>
 
            <div class="form-group">
                <input type="submit" value="update-Examinfo" name="update-Examinfo" class="btn btn-primary pull-right "/>
                
            </div>
                
        </form>  
    </div> 

</div>