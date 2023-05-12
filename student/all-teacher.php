
<h1 class="text-primary"style="background: #000000; height: 70px;padding: 14px; color: white"><i class="fa fa-users"></i> All Teacher <small style="color: #00FF00;"> View all Teacher</small></h1>
<ol class="breadcrumb" style="background: #00FF7F;">
    <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> All Teacher</li>
</ol>


<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped  ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Department</th>
                <th>Phone No</th>
                <th>Photo</th>
                
            </tr> 
        </thead>
        <tbody>

            <?php
            $db_tinfo = mysqli_query($link, "SELECT * FROM `teacher`");
            while ($row = mysqli_fetch_assoc($db_tinfo)) {
                ?>


                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ucwords($row['t_name']); ?></td>
                    <td><?php echo ucwords($row['t_department']); ?></td>
                    <td><?php echo ucwords($row['t_phone']); ?></td>
                   
                    <td><img style="width: 100px;" src="../admin/timages/<?php echo $row['photo']; ?> " alt=""/></td>
              
                </tr> 

                <?php
            }
            ?>


        </tbody>
    </table>
</div>