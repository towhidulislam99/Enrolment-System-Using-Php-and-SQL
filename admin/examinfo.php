<h1 class="text-primary"style="background: #420420; height: 70px;padding: 14px; color: white"><i class="fa fa-users"></i> All Exam Info <small style="color: #00FF00;"> View all Information</small></h1>
<ol class="breadcrumb" style="background: #00FF7F;">
    <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard" ></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user-plus"></i> Exam Information</li>
</ol>


<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped  ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Roll</th>
                <th>Examination name</th>
                <th>Student Department</th>
                <th>Tution Fee</th>
                <th>Examination Fee</th>
                <th>Due</th>
                <th>Status</th>
                
            </tr> 
        </thead>
        <tbody>

            <?php
            $db_sinfo = mysqli_query($link, "SELECT * FROM `examination` ");
            while ($row = mysqli_fetch_assoc($db_sinfo)) {
                ?>


                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['s_roll']; ?></td>
                    <td><?php echo ucwords($row['ex_name']); ?></td>
                    <td><?php echo ucwords($row['department']); ?></td>
                    <td><?php echo ucwords($row['Tutionfee']); ?></td>
                    <td><?php echo ucwords($row['ex_fee']); ?></td>
                    <td><?php echo $row['due']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                  
                    <td>
                        <a href="index.php?page=update-examination&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                        
                        <a href="delete_examinfo.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        
                    </td>
                </tr> 

                <?php
            }
            ?>


        </tbody>
    </table>
</div>