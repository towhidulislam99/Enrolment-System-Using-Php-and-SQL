<?php
require_once'./dbcon.php';
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Department Information</title>

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
    <h1 class="text-center" style="background: #660066; color: white;padding: 16px;"> New Model University College</h1>

    <h1 class="text-primary" style="background: #FFA500; height: 70px;padding: 14px; color: white"><i class="fa fa-user-plus"></i> Add Department Information <small style="color: #00FF00;"> Add Department</small></h1>
    <ol class="breadcrumb" style="background: #FFC3A0;">
        <li><a href="index.php?page=dashboard" style="color: white;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> Add Department</li>
    </ol>
    <?php
    if (isset($_POST['add-department'])) {
        $department_name = $_POST['department_name'];
        $location = $_POST['location'];

        $query = "INSERT INTO `department`( `department_name`, `location`) VALUES ('$department_name','$location')";


        $result = mysqli_query($link, $query);

        if ($result) {
            $success = "Data Insert Success";
        } else {
            $error = "Wrong";
        }
    }
    ?>



    <div class="row">
        <?php if (isset($success)) {
            echo '<p class="alert alert-success col-sm-6">' . $success . '</p>';
        } ?>
<?php if (isset($error)) {
    echo '<p class="alert alert-danger col-sm-6">' . $error . '</p>';
} ?>


    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-offset-3" style="background: #F5F5DC;padding: 22px;">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" >
                <div class="form-group">
                    <label for="department_name" class="control-label col-sm-3">Department Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="department_name" placeholder="Department Name" id="department_name" class="form-control" required=""/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="location" class="control-label col-sm-3">Department Locattion</label>
                    <div class="col-sm-9">
                        <input type="text" name="location" placeholder="Department Locattion" id="location" class="form-control" required=""/>
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-8">
                        <input type="submit" value="Add department" name="add-department" class="btn btn-primary pull-right "/>
                    </div>
                </div>

            </form>  
        </div> 

    </div>