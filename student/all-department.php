<h1 class="text-primary"style="background: #420420; height: 70px;padding: 14px; color: white"><i class="fa fa-users"></i> All Students <small style="color: #00FF00;"> View all Students</small></h1>
<ol class="breadcrumb" style="background: #00FF7F;">
    <li><a href="index.php?page=dashboard" style="color: #761c19;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> All Students</li>
</ol>

<h1 class="text-center" style="background: #660066; color: white;padding: 16px;"> New Model University College</h1>
<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped  ">
        <thead>
            <tr>
                <th>ID</th>
                <th> Department Name</th>
                <th>Location</th>
                
            </tr> 
        </thead>
        <tbody>

            <?php
            $db_sinfo = mysqli_query($link, "SELECT * FROM `department`");
            while ($row = mysqli_fetch_assoc($db_sinfo)) {
                ?>
  
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ucwords($row['department_name']); ?></td>
                    <td><?php echo ucwords($row['location']); ?></td>

                </tr> 

                <?php
            }
            ?>


        </tbody>
    </table>
</div>