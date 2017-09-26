<?php

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
    <title>Registration</title>
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
<form class="well form-horizontal" action="validation.php" method="POST" id="contact_form">
    <fieldset>
        <!-- Form Name -->
        <legend>
            <center>
                <h2><b>Registration Form</b></h2>
            </center>
        </legend>
        <br>
    </fieldset>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="First Name <space> Last Name" required="required" type="text">
                    <span class="error"><?php if(isset($_SESSION["uname_error"])){ echo $_SESSION["uname_error"];}?></span>
                </div>
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" id="email" placeholder="Email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
        </div>

    <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <p>
            M &nbsp
            <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required />&nbsp&nbsp&nbsp&nbsp&nbsp F &nbsp
            <input type="radio" class="flat" name="gender" id="genderF" value="F" />
        </p>
        </div>
    </div>


        <div class="item form-group">
            <label for="password" class="control-label col-md-3">Password *</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password"  type="password"  name="password" placeholder="Password" data-validate-length-range="6,12" class="form-control col-md-7 col-xs-12" required="required">
                </div>
                <div class="tooltip help"><span><i>?</i></span></div>
            </div>
        </div>

        <div class="item form-group">
            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password *</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input id="password2" type="password" name="password2" placeholder="Confirm Password" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                </div>
            </div>
        </div>

        <div class="item form-group">
            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">D.O.B *</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                    <input type='date' name="date" placeholder="Date of Birth" class="form-control" />
                </div>
            </div>
        </div>

    <div class="item form-group">
        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Designation *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
                <select name="designation" class="form-control selectpicker">
                    <option value="">---</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
        </div>
    </div>

    <div class="item form-group">
        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Department *</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                <select name="department" class="form-control selectpicker">
                    <option value="">---</option>
                    <option value="Front End">Front End</option>
                    <option value="Back End">Back End</option>
                    <option value="Testing">Testing</option>
                </select>
            </div>
        </div>
    </div>






        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="tel" id="telephone" name="phone" placeholder="Phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-5">

                <button id="send" type="submit" class="btn btn-success">Submit&nbsp&nbsp<span class="glyphicon glyphicon-send"></span></button>
            </div>
        </div>

</form>
</div>


<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- validator -->
<script src="../../vendors/validator/validator.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../../vendors/moment/min/moment.min.js"></script>
<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="../../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script src="../../build/js/custom.min.js"></script>

<script>
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
</script>

</body>
</html>

<?php
  session_unset();
    session_destroy();
    ?>