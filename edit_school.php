<?php
  session_start();
  require 'connect.php';
  require 'admin_schoolsdb.php';
  require 'edit_schooldb.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ECMI-SDOFP</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/footable.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="stylessdofp.css">

    <style type="text/css">
    #dio_label{
      margin-right: 35px;
    }
    #edit_header{
      margin-bottom: 50px;
    }
    #coor_header{
      margin-top: 50px;
      margin-bottom: 30px;
    }
    </style>
    
  </head>
<body data-spy="scroll">
<!-- Navigation -->
    <nav class="navbar navbar-fixed-top navbar-default" style="padding:6px; font-family:mySecondFont; " role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_main.php">Administrator</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                      <a href="admin_students.php">Students</a>
                  </li>
                  <li>
                      <a href="admin_questions.php">Questions</a>
                  </li>
                  <li>
                      <a href="admin_report.php">Reports</a>
                  </li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li>
                  <p class="navbar-text" style="color: #f5f5f5;"></p>
                </li>
                  <li class="button">
                    <a href="index.php"><span class="glyphicon glyphicon-log-out"></span><b> Logout</b></a>
                  </li>
                </ul>
              </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <div class="container-fluid" id="cont-banner">
      <div class="row">
        <!--Banner Main-->
        <div class="col-md-offset-1 col-md-10">
          <div class="row">
            <div class="col-md-12" style="font-family:myFirstFont;">
                <br />
                  <div class="well" style="background-color: white;">
                  <div class="row">
                    <div class="col-lg-4" style="padding-top:15px;">
                      <a href="school_main.php"><img src="pictures/logo.jpg" class="img-responsive logo" alt="ECMI LOGO" /></a>
                    </div>
                    <div class="col-lg-8 text-center" style="padding-top: 15px;">
                        <h1>ECMI-Sons and Daughters of OFW Program Website</h1>               
                      <footer>
                        <p style="font-size:17px;">
                          The migrant is to be considered, not merely as an instrument of production but as a subject endowed with human dignity -Pope John Paul II
                        </p>
                      </footer>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          
        </div>
      </div>
    </div>
      
    <div class="container-fluid cont-body">
      <div class="col-md-offset-3 col-md-6">
        <div class="well">
          <h3 align="left" id="edit_header">Edit School</h3>
            <form class="form-horizontal" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-3" for="nsch">Name of School:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nsch" name="nsch" value="<?php echo $nsc ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2" for="diocese" id="dio_label">Diocese:</label>
                <div class="col-md-5" style="padding-left: 30px;">
                  <select name="cdio" id="diocese" class="form-control">
                    <option value="<?php echo $dioid ?>"> Diocese of <?php echo $dionm?></option>
                    <?php
                    $i=1;
                    while($dion=mysqli_fetch_row($dio)){
                    ?>
                    <option value="<?php echo $dion[0] ?>"> Diocese of <?php echo $dion[1]?></option>
                    <?php
                    $i=$i+1;
                    }
                    ?>
                  </select> 
                </div>
              </div>
              <h4 align="center" id="coor_header">Coordinator</h4>
              <div class="form-group">
                <label class="control-label col-sm-3" for="coor_fname">First Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="coor_fname" name="cfname" value="<?php echo $fname ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="coor_mname">Middle Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="coor_mname" name="cmname" value="<?php echo $mname ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="coor_lname">Last Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="coor_lname" name="clname" value="<?php echo $lname ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="username">Username:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="uname" name="cuname" value="<?php echo $usrnm ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pword">Password:</label>
                <div class="col-sm-9">
                  <input type="Password" class="form-control" id="pword" name="cpword" value="<?php echo $psswrd ?>">
                </div>
              </div>
              <div class="form-group">
                <br />
                <div class="col-md-2 submit_mid">
                <input type="submit" class="btn btn-primary btn-lg" align="center" name="submit" value = "Edit School">
                </div>
              </div>
            </form>   
        </div>
      </div>
    </div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
</body>
</html>