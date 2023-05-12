<h1 class="text-primary"style="background: #696969; height: 70px;padding: 14px; color: white"><i class="fa fa-pencil-square"></i> Update Student <small style="color: #F7347A"> Edit Student Info</small></h1>
<ol class="breadcrumb" style="background: #DCEDC1;">
    <li><a href="index.php?page=dashboard"style="color: white;"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users"></i>All Students</a></li>
    <li class="active"><i class="fa fa-pencil-square"></i> Update Student</li>
</ol>
<?php
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link,"SELECT * FROM `student_info` WHERE `id` = '$id'");
$db_row = mysqli_fetch_assoc($db_data);

if(isset($_POST['update-student'])){
 $name = $_POST['name'];
 $fathername = $_POST['fathername'];
 $mothername = $_POST['mothername'];
 $department = $_POST['department'];
 $roll = $_POST['roll'];
 $address = $_POST['address'];
 $pcontact = $_POST['pcontact'];
 $semister = $_POST['semister'];
 $session = $_POST['session'];

 
 $photo = explode('.',$_FILES['photo']['name']);
 $photo_ex = end($photo);
 $photo_name = $roll.'.'.$photo_ex;
 
 
 $query ="UPDATE `student_info` SET `name`='$name',`fathername`='$fathername',`mothername`='$mothername',`department`='$department',`roll`='$roll',`semister`='$semister',`address`='$address',`pcontact`='$pcontact',`photo`='$photo_name',`session`='$session'  WHERE `id`='$id'";
  $result = mysqli_query($link,$query);
  if($result){
      move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
      header('location: index.php?page=all-students');
  }
 
}

?>


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required="" value="<?=$db_row['name'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="fathername">father Name</label>
                <input type="text" name="fathername" placeholder="Father Name" id="fathername" class="form-control" required="" value="<?=$db_row['fathername'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="mothername">Mother Name</label>
                <input type="text" name="mothername" placeholder="Mother Name" id="mothername" class="form-control" required="" value="<?=$db_row['mothername'] ?>"/>
            </div>
            
             <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" placeholder="Department" id="department" class="form-control" required="" value="<?=$db_row['department'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="roll">Student Roll</label>
                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" required="" value="<?=$db_row['roll'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Address" id="address" class="form-control" required="" value="<?=$db_row['address'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="pcontact">PContact</label>
                <input type="text" name="pcontact" placeholder="01*********" id="pcontact" class="form-control" pattern="01[1|5|6|7|8|9][0-9]{8}" required="" value="<?=$db_row['pcontact'] ?>"/>
            </div>
            
            <div class="form-group">
                <label for="semister">Semister</label>
                <select id="semister" class="form-control" name="semister" required="" >
                    <option  value="">Select</option>
                    <option <?php echo $db_row['semister']=='1st'?'selected=""':'';  ?> value="1st">1st</option>
                    <option <?php echo $db_row['semister']=='2nd'?'selected=""':'';  ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['semister']=='3rd'?'selected=""':'';  ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['semister']=='4th'?'selected=""':'';  ?> value="4th">4th</option>
                    <option <?php echo $db_row['semister']=='5th'?'selected=""':'';  ?> value="5th">5th</option>
                </select>
            </div>
           
            <div class="form-group">
                <label for="photo">Photo</label> 
                <img class="img-thumbnail" style="width: 50px;" src="../admin/student_images/<?php echo $db_row['photo'];?>" alt=""/>
                <input type="file" name="photo" id="photo"  class="form-control"required="" value="<? $db_row['photo']?>"/>
                
            </div>
            
             <div class="form-group">
                <label for="session">Session</label>
                <input type="text" name="session" placeholder="Session" id="session" class="form-control" required="" value="<?=$db_row['session'] ?>"/>
            </div>
            
           
                
            <div class="form-group">
                <input type="submit" value="update Student" name="update-student" class="btn btn-primary pull-right "/>
                
            </div>
                
        </form>  
    </div> 

</div>