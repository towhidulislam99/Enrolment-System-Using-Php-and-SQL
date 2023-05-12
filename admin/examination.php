<?php
require_once'./dbcon.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Examination Form Fillup</title>

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

    <h1 class="text-primary" style="background: #FF4040; height: 70px;padding: 14px; color: white"><i class="fa fa-user-plus"></i> Examination Details <small style="color: #00FF00;"> Add New Exam form</small></h1>
    <ol class="breadcrumb" style="background: #FFC0CB;">
        <li><a href="index.php?page=dashboard" style="color: white"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> Add New Exam Form</li>
    </ol>
    <?php
    if (isset($_POST['save'])) {
        $s_roll = $_POST['s_roll'];
        $ex_name = $_POST['ex_name'];
        $department = $_POST['department'];
        $ex_fee = $_POST['ex_fee'];
        $Tutionfee = $_POST['Tutionfee'];
        $due = $_POST['due'];
        $status = $_POST['status'];





        $query = "INSERT INTO `examination`(`s_roll`, `ex_name`, `department`, `Tutionfee`, `ex_fee`, `due`, `status`) VALUES ('$s_roll','$ex_name','$department','$Tutionfee','$ex_fee','$due','$status')";


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
        <div class="col-sm-6 col-lg-offset-3" style="background:#F5F5DC; padding: 12px; ">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal" >
                <div class="form-group">
                    <label for="s_roll" class="control-label col-sm-3">Student Roll</label>
                    <div class="col-sm-9">
                        <input type="text" name="s_roll" placeholder="Student Roll" id="s_roll" class="form-control" required=""/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ex_name" class="control-label col-sm-3">Examination Name</label>
                    <div class="col-sm-9">
                        <select id="ex_name" class="form-control" name="ex_name" required="">
                            <option value="">Select</option>
                            <option value="Incourse">Incourse</option>
                            <option value="Midterm">Midterm</option>
                            <option value="Board Exam">Board Exam</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="department" class="control-label col-sm-3">Student Department</label>
                    <div class="col-sm-9">
                        <input type="text" name="department" placeholder="Student Department" id="department" class="form-control" required=""/>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="Tutionfee" class="control-label col-sm-3"> Tution Fee</label>
                    <div class="col-sm-9">
                        <input type="text" name="Tutionfee" placeholder="Tutionfee Fee" id="Tutionfee" class="form-control" required=""/>
                    </div>
                </div>


                <div class="form-group">
                    <label for="ex_fee" class="control-label col-sm-3">Examination Fee</label>
                    <div class="col-sm-9">
                        <input type="text" name="ex_fee" placeholder="Examination Fee" id="ex_fee" class="form-control" required=""/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="due" class="control-label col-sm-3">Due Fee</label>
                    <div class="col-sm-9">
                    <input type="text" name="due" placeholder="Due Ex Fee" id="due" class="form-control" />
                    </div>
                    </div>

                <div class="form-group">
                    <label for="status" class="control-label col-sm-3">Status</label>
                    <div class="col-sm-9">
                    <select id="status" class="form-control" name="status" required="">
                        <option value="">Select</option>
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>

                    </select>
                    </div>
                </div>



                <div class="form-group">
                     <div class="col-sm-4 col-sm-offset-8">
                    <input type="submit" value="Save" name="save" class="btn btn-primary pull-right "/>
                     </div>
                </div>

            </form>  
        </div> 

    </div>