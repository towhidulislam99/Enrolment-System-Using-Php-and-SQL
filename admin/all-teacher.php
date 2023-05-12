
        <?php
        require_once './dbcon.php';
        ?>

        <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>Enrollment System</title>

            <!-- Bootstrap -->
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet"type="text/css"href= "../css/style.css" >
            <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
            <link href="../style.css" rel="stylesheet">

            <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="../js/script.js"></script>

        </head>

        <h1 class="text-primary"style="background: #000000; height: 70px;padding: 14px; color: white"><i class="fa fa-users"></i> All Teacher <small style="color: #00FF00;"> View all Teacher</small></h1>
        <ol class="breadcrumb" style="background: #00FF7F;">
            <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-user-plus"></i> All Teacher</li>
        </ol>


        <div class="table-responsive">
            <table id="data"class="table table-hover table-bordered table-striped  ">
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
                            <td><img style="width: 100px;" src="timages/<?php echo $row['photo']; ?> " alt=""/></td>
                            <td>
                                <a href="index.php?page=update-teacher&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>

                                <a href="delete-teacher.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr> 

                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>