<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Student Information System</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

       


    </head>
    <body>
        <nav class="navbar navbar-default"style="height: 100px;background: #BF3EFF;margin-bottom: 0px;border-color: #68228B;">
            <div class="container">
                <br/>
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-4">

                        <button type="button" class="btn btn-primary" ><a  href="admin/login.php" style="color:white;font-size:20px;"> Admin Login </a></button>
                    </div>
                    <button type="button" class="btn btn-success" ><a  href="student/login.php" style="color:white;font-size:20px;"> Student Login </a></button>

                </div>
            </div>
        </nav>

        <h1 class="text-center" style="color:#000080;">New Model University college</h1>
        <img class="img-circle" style="width:3opx; height: 30px;" src="../student/images/2.png" alt=""/>
        <h1 class="text-center" style="color: white;background: #68228B;margin-top: 0px;height: 80px;padding: 12px;">Welcome to Enrollment System</h1>
            
      
        <br/>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="POST">
                    <table class="table-bordered ">
                        <tr>
                            <td colspan="2" class="text-center"><label>Student Information</label></td>

                        </tr>

                        <tr>
                            <td><label for="Choose">Choose semister</label></td>
                            <td>
                                <select class="form-control" id="Choose"name="Choose">
                                    <option value="">Select</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>


                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="roll">Roll</label></td>
                            <td><input class="form-control" type="text" name="roll" pat tern="[0-9]{6}" placeholder="Roll" /></td>
                        </tr>

                        <tr>
                            <td class="text-center" colspan="2"><input class="btn btn-default text-center" type="submit" value="show info" name="Show_Info"/></td>

                        </tr>
                    </table>


                </form>   
            </div>

        </div>
        <br/>
        <br/>
        <?php
        require_once './admin/dbcon.php';
        if (isset($_POST['Show_Info'])) {
            $choose = $_POST['Choose'];
            $roll = $_POST['roll'];
            $result = mysqli_query($link, "SELECT * FROM `student_info` WHERE `semister`='$choose' and `roll`='$roll'");
            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_assoc($result);
                ?>




                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <table class="table table-dark table-striped">
                            <tr>
                                <td rowspan="5">
                                    <img src="admin/student_images/<?= $row['photo'] ?>" class="img-thumbnail" style="width:150px; " alt=""/>   
                                </td>
                                <td>Name</td>
                                <td><?= ucwords($row['name']) ?></td>

                            </tr>


                            <tr>
                                <td>Father Name</td>
                                <td><?= $row['fathername'] ?></td>

                            </tr>


                            <tr>
                                <td>Mother Name</td>
                                <td><?= $row['mothername'] ?></td>

                            </tr>

                            <tr>
                                <td>Department</td>
                                <td><?= $row['department'] ?></td>

                            </tr>

                            <tr>
                                <td>Roll</td>
                                <td><?= $row['roll'] ?></td>

                            </tr>

                            <tr>
                                <td>Semister</td>
                                <td><?= $row['semister'] ?></td>

                            </tr>

                            <tr>
                                <td>Address</td>
                                <td><?= ucwords($row['address']) ?></td>

                            </tr>

                            <tr>
                                <td>Pcontact</td>
                                <td><?= $row['pcontact'] ?></td>

                            </tr>


                            <tr>
                                <td>Session</td>
                                <td><?= $row['session'] ?></td>

                            </tr>


                        </table>  

                    </div>


                </div> 

                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Data Not Found');
                </script>

                <?php
            }
        }
        ?>


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>