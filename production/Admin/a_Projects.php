<?php
require "init.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Projects</title>
   <!-- Bootstrap -->
   <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- Custom Theme Style -->
   <link href="../../build/css/custom.css" rel="stylesheet">


</head>
<body class="nav-md">
<div class="container body">
   <div class="main_container">
       <div class="col-md-3 left_col">
           <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                   <a href="../Home/Home_Page.html" class="site_title"><i class="fa fa-paw"></i> <span>ProjectoPro</span></a>
               </div>
               <div class="clearfix"></div>
               <!-- menu profile quick info -->
               <div class="profile clearfix">
                   <div class="profile_pic">
                       <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
                   </div>

               </div>
               <!-- /menu profile quick info -->
               <br />
               <!-- sidebar menu -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                   <div class="menu_section">
                       <h3>General</h3>
                       <ul class="nav side-menu">
                           <li><a href="Admin_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                           <li><a href="a_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                           <li><a href="a_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                           <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                           <li><a><i class="fa fa-book"></i> Knowledge Base </a></li>
                           <li><a href="a_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
      <div class="top_nav">
         <div class="nav_menu">
            <nav>
               <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
               </div>
               <ul class="nav navbar-nav navbar-right">
                  <li class="">
                     <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="../images/img.jpg" alt=""><span><?php echo $_SESSION["login_user"]; ?></span>
                           <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li>
                           <a href="javascript:;">
                              <span>Settings</span>
                           </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <li><a href="../Home/login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </div>




      <!-- page content -->
      <div class="right_col hideIt" role="main">
         <div class="row">
           <div class="cont">
            <div class="page-title">
               <div class="title_left">
                  <h3>Projects <small>Listing design</small></h3>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
               <div class="col-md-12 panel1">
                  <div class="x_panel" >
                     <div class="x_title">
                        <h2>Projects</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                           </li>


                        </ul>
                        <div class="clearfix"></div>
                     </div>
                     <div class="x_content">

                        <!-- start project list -->
                        <table class="table table-striped projects">
                           <thead>
                           <tr>
                              <th style="width: 1%">#</th>
                              <th style="width: 20%">Project Name</th>
                              <th>Team Members</th>
                              <th>Project Progress</th>
                              <th>Status</th>
                              <th style="width: 20%">#Edit</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                           $query="select * from projects";
                           $result=mysqli_query($con,$query);
                           if (mysqli_num_rows($result) > 0)
                           {
                               while ($row = mysqli_fetch_assoc($result))
                               {
                                   ?>
                                   <tr>
                                       <td><?php $Pid = $row["Pid"];
                                           echo $Pid; ?></td>
                                       <td>
                                           <a><?php echo $row["project_name"]; ?></a>
                                           <br/>

                                       </td>
                                       <td><?php
                                           $query1 = "select Team_members from project_members where Pid='$Pid';";
                                           $result1 = mysqli_query($con, $query1);
                                           if (mysqli_num_rows($result1) > 0) {
                                               while ($row1 = mysqli_fetch_assoc($result1)) {
                                                   ?>
                                                   <ul class="list">
                                                       <li>
                                                           <?php echo $row1["Team_members"]; ?>
                                                       </li>
                                                   </ul>
                                                   <?php
                                               }
                                           }
                                           ?>
                                       </td>
                                       <?php
                                       $progress = $row["progress"];
                                       ?>

                                       <td class="project_progress">
                                           <div class="progress progress_sm">
                                               <div class="progress-bar bg-green" role="progressbar"
                                                    data-transitiongoal="<?= $progress ?>"></div>
                                           </div>
                                           <small><?= $progress ?>% Complete</small>
                                       </td>
                                       <td>
                                           <button type="button"
                                                   class="btn btn-success btn-xs"><?php echo $row["status"]; ?></button>
                                       </td>
                                       <td>
                                           <a href="a_project_detail.php?Pid=<?= $row['Pid']?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i></a>

                                           <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                       </td>
                                   </tr>
                                   <?php
                               }
                           }

                     ?>


                           </tbody>
                        </table>
                        <!-- end project list -->


                     </div>
                  </div>
               </div>
                <div class="col-md-12"><div class="btn btn-success" id="CreateProject1">Create New Project</div>
                </div>
            </div>
         </div>





        <div class="container desc hidden" id="CreateProject" >

              <form class="well form-horizontal" id="create" >
                  <fieldset>
                      <!-- Form Name -->
                      <legend>
                          <center>
                              <h2><b>Create Project</b></h2>
                          </center>
                      </legend>
                      <br>
                      <section>
                          <div class="row">
                              <div class="col-md-12">

                                  <input type="hidden" id="sender" value="<?php echo $_SESSION["login_user"]; ?>" />

                                  <!-- Project ID-->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Project ID</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <input  name="Project_ID" placeholder="Project ID" class="form-control"  type="text" required>
                                          </div>
                                      </div>
                                  </div>
                                  <!--Project Title-->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label" >Project Title</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">

                                              <input name="Project_Title" placeholder="Project Title" class="form-control"  type="text" required>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Description-->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Description</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <textarea name="description" class="form-control" placeholder="description" rows="2" required></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Problem statement -->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Problem Statement</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <textarea  name="problem_statement" class="form-control" placeholder="Problem Statement" rows="1" required></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Project Goal-->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Project Goal</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <textarea name="project_Goal" class="form-control" placeholder="Project Goal" rows="1" required></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Objectives-->
                                  <div class="form-group obj">
                                      <label class="col-md-2 control-label" >Objectives</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                          <div class="row row1">
                                              <div class="col-md-11" style="padding-bottom: 10px;">
                                              <input name="objective[]" placeholder="Type Here" class="form-control name_list"  type="text" required></div>
                                              <div class="col-md-1">
                                                  <button type="button" class="fa fa-plus" id="obj"></button>
                                              </div>

                                          </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Modules-->
                                  <div class="form-group mod">
                                      <label class="col-md-2 control-label" >Modules</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <div class="row row2">
                                                  <div class="col-md-11" style="padding-bottom: 10px;">
                                                      <input name="module[]" placeholder="Type Here" class="form-control name_list"  type="text" required ></div>
                                                  <div class="col-md-1">
                                                      <button type="button" class="fa fa-plus" id="mod"></button>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>


                                  <!-- Requirements -->
                                  <div class="form-group req">
                                      <label class="col-md-2 control-label" >Requirements</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <div class="row row3">
                                                  <div class="col-md-11" style="padding-bottom: 10px;">
                                                      <input name="requirement[]" placeholder="Type Here" class="form-control name_list"  type="text" required ></div>
                                                  <div class="col-md-1">
                                                      <button type="button" class="fa fa-plus" id="req"></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- Scope-->
                                  <div class="form-group">
                                      <label class="col-md-2 control-label">Scope</label>
                                      <div class="col-md-10 selectContainer">
                                          <div class="input-group">
                                              <div class="row">
                                                  <div class="col-md-3">
                                                      <label>From</label>
                                                  </div>

                                                  <div class="col-md-3">
                                                      <input name="From" type="date" placeholder="From" required>
                                                  </div>
                                                  <div class="clearfix" style="padding-bottom: 10px;padding-top: 10px;"></div>
                                                  <div class="col-md-3">
                                                      <label>To</label>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <input name="To" type="date" placeholder="From" required>
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>


                                  <!--Budget-->
                                  <div class="form-group bud">
                                      <label class="col-md-2 control-label" >Budget</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <div class="row">
                                                  <div class="col-md-12" style="padding-bottom: 10px;">
                                                      <input name="Budget" placeholder="Budget" class="form-control"  type="text" required></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group bud">
                                      <label class="col-md-2 control-label" >Project Type</label>
                                      <div class="col-md-10 inputGroupContainer">
                                          <div class="input-group col-md-11">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                  <select name="Type" class="form-control selectpicker">
                                                      <option value="">---</option>
                                                      <option value="Android">Android</option>
                                                      <option value="Web">Web</option>
                                                      <option value="IOT">IOT</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                              </div>
                          </div>
                          <div class="form-group">
                                  <label class="col-md-12 control-label"></label>
                                  <div class="submit col-md-12"><br>
                                      <button  type="button" id="submit" name="submit_form" value="submit" class="btn btn-warning" >Create <span class="glyphicon glyphicon-send"></span></button>
                                  </div>

                          </div>


                      </section>


                  </fieldset>
              </form>

          </div>



             <div class="members hidden" id="members">
                 <div class="">
                     <div class="panel panel-default" >
                         <div class="panel-heading">
                             <h3 align="center" class="panel-title">Choose Members For The Project</h3>
                         </div>
                         <div class="panel-body">
                             <div class="panel-default">
                                 <div class="panel-heading"><h3>Admin</h3></div>
                                 <div class="panel-body">
                                     <div class="container">
                                         <table  class="table table-striped text-center" id="table">
                                             <thead>
                                             <tr>
                                                 <th class='col-md-2 text-center'>UID</th>
                                                 <th class='col-md-3 text-center'>Username</th>
                                                 <th class='col-md-2 text-center'>Gender</th>
                                                 <th class='col-md-3 text-center'>Department</th>
                                                 <th class='col-md-2 text-center'><input type="button" value="select all" id="selectall1"></th>
                                             </tr>
                                             </thead>
                                             <tbody id="tbody1">

                                             <?php
                                             require "init.php";
                                             $query="select UID,Gender,Uname,Department,Contact from user_info where Designation='admin'";
                                             $result=mysqli_query($con,$query);
                                             while( $row = mysqli_fetch_array($result) )
                                             {
                                                 echo "<tr>";
                                                 echo "<td class='col-md-2'>".$row['UID']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                                 echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Department']."</td>";
                                                 echo "<td class='col-md-2'><input type='checkbox' name='admin[]' value='".$row['Uname']."'></td>";
                                                 echo "</tr>\n";
                                             }
                                             ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>

                             <div class="panel-default">
                                 <div class="panel-heading"><h3>Manager</h3></div>
                                 <div class="panel-body">
                                     <div class="container">
                                         <table  class="table table-striped text-center" id="table2" >
                                             <thead>
                                             <tr>
                                                 <th class='col-md-2 text-center'>S.no</th>
                                                 <th class='col-md-3 text-center'>Username</th>
                                                 <th class='col-md-2 text-center'>Gender</th>
                                                 <th class='col-md-3 text-center'>Department</th>
                                                 <th class='col-md-2 text-center'><input type="button" value="select all" id="selectall2"></th>
                                             </tr>
                                             </thead>
                                             <tbody id="tbody2">

                                             <?php
                                             require "init.php";
                                             $query="select UID,Uname,Gender,Department,Contact from user_info where Designation='manager'";
                                             $result=mysqli_query($con,$query);
                                             while( $row = mysqli_fetch_array($result) )
                                             {
                                                 echo "<tr>";
                                                 echo "<td class='col-md-2'>".$row['UID']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                                 echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Department']."</td>";
                                                 echo "<td class='col-md-2'><input type='checkbox' name='manager[]' value='".$row['Uname']."'></td>";
                                                 echo "</tr>\n";
                                             }
                                             ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>



                             <div class="panel-default">
                                 <div class="panel-heading"><h3>Employee</h3></div>
                                 <div class="panel-body">
                                     <div class="container">
                                         <table  class="table table-striped text-center" id="table3 ">
                                             <thead>
                                             <tr>
                                                 <th class='col-md-2 text-center'>S.no</th>
                                                 <th class='col-md-3 text-center'>Username</th>
                                                 <th class='col-md-2 text-center'>Gender</th>
                                                 <th class='col-md-3 text-center'>Department</th>
                                                 <th class='col-md-2 text-center'><input type="button" value="select all" id="selectall3"></th>
                                             </tr>
                                             </thead>
                                             <tbody id="tbody3">

                                             <?php
                                             require "init.php";
                                             $query="select UID,Uname,Gender,Department,Contact from user_info where Designation='employee'";
                                             $result=mysqli_query($con,$query);
                                             while( $row = mysqli_fetch_array($result) )
                                             {
                                                 echo "<tr>";
                                                 echo "<td class='col-md-2'>".$row['UID']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                                 echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                                 echo "<td class='col-md-3'>".$row['Department']."</td>";
                                                 echo "<td class='col-md-2'><input type='checkbox' name='employee[]' value='".$row['Uname']."'></td>";
                                                 echo "</tr>\n";
                                             }
                                             ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div align="center">
                         <button  type="button" id="send" value="submit" name="send_members" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
                     </div>



                 </div>
             </div>
          </div>
      </div>
      <!-- /page content -->

       <!-- footer content -->
       <footer>
           <div class="pull-right">
               ProjectoPro
           </div>
           <div class="clearfix"></div>
       </footer>
       <!-- /footer content -->


   </div>
</div>
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="../../build/js/custom.min.js"></script>
<script src="../js/admin_dash.js"></script>
</body>
</html>