<?php
require_once './dbcon.php';
session_start();


if (!isset($_SESSION['user_login'])) {
    header('location: login.php');
}
?>

<?php
$SESSION_stu = $_SESSION['student_login'];

$stu_data = mysqli_query($link,"SELECT * FROM `student` WHERE `username` = '$SESSION_stu'");
$stu_row = mysqli_fetch_assoc($stu_data);


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
    <body>
        <nav class="navbar navbar-default" style="background: #420420;border: 1px solid #420420;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header navbar-left">
                    <a class="navbar-brand " style="font-size: 30px; color:white;" href="index.php"> Enrollment System</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" style="color:white; font-size: 18px;"><i class="fa fa-user" ></i> Welcome: <?php echo ucwords($stu_row['name']);?></a></li>
                        <li><a href="index.php?page=user-profile" style="color:white; font-size: 18px;"><img class="img-circle" style="width:3opx; height: 30px;" src="../student/images/<?php echo $stu_row['photo']; ?>" alt=""/> Profile</a></li>
                        <li><a href="logout.php" style="color:#FF000F; font-size: 18px;"><i class="fa fa-power-off"></i> Logout</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-3">
                    </br>

                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item active" style="background: #133337;">
                            <i class="fa fa-dashboard"></i>  Dashboard
                        </a>
                        <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Student Registration</a>
                        <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users"></i> Student Information</a>
                        <a href="index.php?page=all-department" class="list-group-item"><i class="fa fa-users"></i> All Department</a>
                        <a href="index.php?page=all-teacher" class="list-group-item"><i class="fa fa-users"></i> All Teacher</a>
                    </div> 
                </div>
                <div class="col-sm-9">
                    <div class="content">

                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'] . '.php';
                        } else {
                            $page = "dashboard.php";
                        }

                        if (file_exists($page)) {
                            require_once $page;
                        } else {
                            require_once '404.php';
                        }
                        ?>       

                    </div>
                </div>
            </div>
            <footer style="margin-top: 20px; background: #000080;" class="footer-area">
                <p> Copyright &COPY; 2019. Enrollment System. All Rights Are Reserved </p>   
            </footer>

    </body>
</html>