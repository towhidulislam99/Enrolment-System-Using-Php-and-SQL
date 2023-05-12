<?php
require_once'./dbcon.php';
?>

<h1 class="text-primary" style="background: #CCFF00; height: 70px;padding: 14px; color: white;"><i class="fa fa-user"></i> Student Profile <small style="color: red">My Profile</small></h1>
<ol class="breadcrumb" style="background: #FFF68F;">
   <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user"></i> profile</li>
</ol>

<?php
$SESSION_stu = $_SESSION['student_login'];

$stu_data = mysqli_query($link,"SELECT * FROM `student` WHERE `username` = '$SESSION_stu'");
$stu_row = mysqli_fetch_assoc($stu_data);


?>

<div class="row">
    <div class="col-sm-6">
        <table class=" table table-bordered">
            <tr>
                <td>Student ID</td>
                <td><?= $stu_row['id']?></td>
                
            </tr> 
            
            <tr>
                <td> Name</td>
                <td><?= ucwords($stu_row['name']);?></td>
                
            </tr> 
            
            <tr>
                <td>User Name</td>
                <td><?= $stu_row['username'];?></td>
                
            </tr> 
            
            <tr>
                <td>Email</td>
                <td><?= $stu_row['email'];?></td>
                
            </tr> 
            
            <tr>
                <td>Status</td>
                <td><?= ucwords($stu_row['status']);?></td>
                
            </tr> 
            
            <tr>
                <td>Signup Date</td>
                <td><?= $stu_row['datetime'];?></td>
                
            </tr> 
            
        </table>
        <a href="editprofile.php?id=<?php echo base64_encode ($stu_row['id']);?>" class="btn btn-sm btn-info pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
            <img class="img-thumbnail" style="width:300px;" src="../student/images/<?php echo $stu_row['photo']; ?>" alt=""/>
        </a> 
        <br/>
        <br/>
        <?php
        if(isset($_POST['upload'])){
            $photo = explode('.', $_FILES['photo']['name']);
            $photo = end($photo);
            $photo_name = $SESSION_stu.'.'.$photo;
            
           $upload = mysqli_query($link,"UPDATE `student` SET `photo`='$photo_name' WHERE `username`='$SESSION_stu'");
            if($upload){
              move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name); 
            }
        }
        ?>
        <form action="" enctype="multipart/form-data" method="POST">
            <label for="photo">profile picture</label>
            <input type="file" name="photo" required="" id="photo"/>
            <br/>
            <input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info "/>
        </form>
    </div>
    
</div>