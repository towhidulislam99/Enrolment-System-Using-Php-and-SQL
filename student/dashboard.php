 <h1 class="text-primary" style="background: #133337; height: 70px;padding: 14px; color: white"><i class="fa fa-dashboard"></i> Dashboard <small style="color: #00FF00;"> Statistics Overview</small></h1>
                        <ol class="breadcrumb" style="background: #CCFF00;">
                            <li class="active" style="color:window;"><i class="fa fa-dashboard"></i> Dashboard</li>
                        </ol>
 
       <?php
       $count_student = mysqli_query($link,"SELECT * FROM `student_info`");
       $total_student = mysqli_num_rows($count_student);
       
       $count_users = mysqli_query($link,"SELECT * FROM `users`");
       $total_users = mysqli_num_rows($count_users);

       ?>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background: #28006D; border-color:#28006D; ">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-4x"></i>  
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="pull-right" style="font-size: 30px"><?=$total_student;?></div>
                                                <div class="clearfix"></div>
                                                <div class="pull-right">All Students</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="index.php?page=all-students">
                                        <div class="panel-footer">
                                            <span class="pull-left">All Students</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div> 
                                    </a>
                                </div> 
                            </div>

                            <div class="col-sm-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background: #3366FF; border-color:#3366FF; ">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-4x"></i>  
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="pull-right" style="font-size: 30px"><?= $total_users;?></div>
                                                <div class="clearfix"></div>
                                                <div class="pull-right">All Users</div>
                                            </div>
                                        </div>
                                    </div>
                                   <a href="http://localhost/mini_project/admin/404.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">All Users</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div> 
                                    </a>
                                </div> 
                            </div>

                            <div class="col-sm-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"style="background: #FF000F; border-color:#FF000F; ">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-calculator fa-4x"></i>  
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="pull-right" style="font-size:30px"> 18000 tk</div>
                                                <div class="clearfix"></div>
                                                <div class="pull-right">Tusion Fee</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="http://localhost/mini_project/admin/404.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">Semister Fee</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div> 
                                    </a>
                                </div> 
                            </div>
                            
                            
                            <div class="col-sm-3">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"style="background: #101010; border-color:#101010; ">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                 
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="pull-right" style="font-size:22px"> Admission Going On</div>
                                                <div class="clearfix"></div>
                                                <div class="pull-right"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="http://app1.nu.edu.bd/">
                                        <div class="panel-footer">
                                            <span class="pull-left">Date:22 Sept-9th Oct</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div> 
                                    </a>
                                </div> 
                            </div>


                        </div> 

                        <hr/>
                        <h3>New Students</h3>
                        <div class="table-responsive">
                            <table id="data" class="table table-hover table-bordered table-striped  ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Photo</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    
                                    <?php
                                  $db_sinfo = mysqli_query($link,"SELECT * FROM `student_info`");
                                  while ($row = mysqli_fetch_assoc($db_sinfo)){?>
                                    
                                    
                                    <tr>
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo ucwords($row['name']);?></td>
                                        <td><?php echo $row['roll'];?></td>
                                        <td><?php echo ucwords($row['address']);?></td>
                                        <td><?php echo $row['pcontact'];?></td>
                                        <td><img style="width: 100px;" src="../admin/student_images/<?php echo $row['photo'];?> " alt=""/></td>
                                    </tr> 
                                     
                                    <?php
                                  }
                                    ?>
                                     

                                </tbody>
                            </table>
                        </div>
                    