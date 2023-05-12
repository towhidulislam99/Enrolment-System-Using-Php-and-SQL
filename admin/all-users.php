<h1 class="text-primary" style="background: #660066; height: 70px;padding: 14px; color: white"><i class="fa fa-users"></i> All Users <small style="color:#FFD700;"> View all Users</small></h1>
<ol class="breadcrumb" style="background: #FFFF66;">
    <li><a href="index.php?page=dashboard" style="color: red; "><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> All Users</li>
</ol>


<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped  ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Photo</th>
            </tr> 
        </thead>
        <tbody>

            <?php
            $db_sinfo = mysqli_query($link, "SELECT * FROM `users`");
            while ($row = mysqli_fetch_assoc($db_sinfo)) {
                ?>


                <tr>
                    <td><?php echo ucwords($row['name']); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><img style="width: 100px;" src="images/<?php echo $row['photo'];?> " alt=""/></td>
                    <a href="http://localhost/mini_project/admin/editprofile.php?id=<?php echo base64_encode($row['id']); ?>"</a>
                        
                           
                           
                </tr> 

                <?php
            }
            ?>


        </tbody>
    </table>
</div>