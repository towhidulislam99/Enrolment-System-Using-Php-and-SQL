
<h1 class="text-primary" style="background: #CCFF00; height: 70px;padding: 14px; color: white;"><i class="fa fa-user"></i> User Profile <small style="color: red">My Profile</small></h1>
<ol class="breadcrumb" style="background: #FFF68F;">
    <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user"></i> profile</li>
</ol>

<?php
$session_user = $_SESSION['user_login'];

$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `Username`='$session_user'");
$user_row = mysqli_fetch_assoc($user_data);

?>

<div class="row">
    <div class="col-sm-6">
        <table class=" table table-bordered">
            <tr>
                <td>User ID</td>
                <td><?= $user_row['id']?></td>
                
            </tr> 
            
            <tr>
                <td>Name</td>
                <td><?= ucwords($user_row['name']);?></td>
                
            </tr> 
            
            <tr>
                <td>User Name</td>
                <td><?= $user_row['Username'];?></td>
                
            </tr> 
            
            <tr>
                <td>Email</td>
                <td><?= $user_row['email'];?></td>
                
            </tr> 
            
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_row['status']);?></td>
                
            </tr> 
            
            <tr>
                <td>Signup Date</td>
                <td><?= $user_row['datetime'];?></td>
                
            </tr> 
            
        </table>
        <a href="editprofile.php?id=<?php echo base64_encode ($user_row['id']);?>" class="btn btn-sm btn-info pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="">
            <img class="img-thumbnail" style="width: 300px;" src="images/<?php echo $user_row['photo']; ?>" alt=""/>
        </a> 
        <br/>
        <br/>
        <?php
        if(isset($_POST['upload'])){
            $photo = explode('.', $_FILES['photo']['name']);
            $photo = end($photo);
            $photo_name = $session_user.'.'.$photo;
            
           $upload = mysqli_query($link,"UPDATE `users` SET `photo`='$photo_name' WHERE `Username`='$session_user'");
            if($upload){
              move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name); 
            }
        }
        ?>
        <form action="" enctype="multipart/form-data" method="POST">
            <label for="photo">profile picture</label>
            <input type="file" name="photo" required="" id="photo"/>
            <br/>
            <a href=""><input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info "/></a>
        </form>
    </div>
    
</div>