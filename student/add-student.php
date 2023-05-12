<h1 class="text-primary " style="background: #008080; height: 70px;padding: 14px; color: white"><i class="fa fa-user-plus"></i> Add Student <small style="color: #F7347A;"> Add New Student</small></h1>
<ol class="breadcrumb" style="background: #00FFFF;">
    <li><a href="index.php?page=dashboard" style="color: red;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>
<?php
if(isset($_POST['add-student'])){
 $name = $_POST['name'];
 $fathername = $_POST['fathername'];
 $mothername = $_POST['mothername'];
 $roll = $_POST['roll'];
 $address = $_POST['address'];
 $pcontact = $_POST['pcontact'];
 $semister = $_POST['semister'];
  $department = $_POST['department'];
   $session = $_POST['session'];
 
 $picture = explode('.',$_FILES['picture']['name']);
 $picture_ex = end($picture);
 $picture_name = $roll.'.'.$picture_ex;
 
 
 $query ="INSERT INTO `student_info`(`name`, `fathername`, `mothername`, `department`, `roll`, `semister`, `address`, `pcontact`, `photo`, `session`) VALUES ('$name','$fathername','$mothername','$department','$roll','$semister','$address','$pcontact','$picture_name','$session')";
 
 
 $result = mysqli_query($link,$query);
 
 if($result){
    $success = "Data Insert Success"; 
    move_uploaded_file($_FILES['picture']['tmp_name'],'student_images/'.$picture_name);
 }else{
   $error = "Wrong"; 
 }
}
?>



<div class="row">
    <?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';}  ?>
    <?php if(isset($error)){echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';}  ?>
 
    
</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required=""/>
            </div>
            
             <div class="form-group">
                <label for="fathername">Father Name</label>
                <input type="text" name="fathername" placeholder="Father Name" id="fathername" class="form-control" required=""/>
            </div>
            
             <div class="form-group">
                <label for="mothername">Mother Name</label>
                <input type="text" name="mothername" placeholder="Mother Name" id="mothername" class="form-control" required=""/>
            </div>
            
             <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" placeholder="Department" id="department" class="form-control" required=""/>
            </div>
            
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" required=""/>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Address" id="address" class="form-control" required=""/>
            </div>
            
            <div class="form-group">
                <label for="pcontact">PContact</label>
                <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required=""/>
            </div>
            
            <div class="form-group">
                <label for="class">Semister</label>
                <select id="class" class="form-control" name="semister" required="">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>
            </div>
           
            <div class="form-group">
                <label for="picture">Picture</label> 
                <input type="file" name="picture" id="picture" required=""/>
            </div>
            
            <div class="form-group">
                <label for="session">Session</label>
                <input type="text" name="session" placeholder="Session" id="session" class="form-control" required=""/>
            </div>
                
            <div class="form-group">
                <input type="submit" value="Add student" name="add-student" class="btn btn-primary pull-right "/>
                
            </div>
                
        </form>  
    </div> 

</div>