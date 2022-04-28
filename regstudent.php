<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint MS</title>
  <!--=========================================================online cdn=============================================================-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--=========================================================online cdn end=============================================================-->
    <!--=========================================================local cdn=============================================================-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--local btstrp css link-->
    <link rel="stylesheet" href="file-assets/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <!--local btstrp theme link-->
    <link rel="stylesheet" href="file-assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" />
    <!--local font awesome link-->
    <link rel="stylesheet" href="file-assets/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <!--Custom page stylesheet-->
    <link rel="stylesheet" href=""/>    
  <!--=========================================================local cdn end=============================================================-->
  <style type="text/css">
  body{
    font-family: palatino;
    background-color: #e3e3e3;
  }
  #regbody{
    margin-top: 100px;
    background-color: #fff;
    border-radius: 5px;
    padding: 50px;
  }
  #stdlgbtn{
    background-color: #ff0000;
    color:#fff;
  }

    
  </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Complaint MS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Register</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--=========================================================lgin form=============================================================-->
<div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign In</h4>
        </div>
        <div class="modal-body">

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
<!--=========================================================lgin=============================================================-->


<!--=========================================================lgin=============================================================-->

     <form action="" method="post">
    <div class="form-group" method="post">
      <label for="email">Staff ID:</label>
      <input type="text" class="form-control" id="lgfield" placeholder="Enter Staff ID " name="logid">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="lgfield" placeholder="Enter password" name="logpwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" id="lgbtn" class="btn btn-block" name="loginbtn">Log In</button>
  </form>

  </div>
  <div class="col-md-1"></div>
</div>


        </div>
    
      </div>
    </div>
  </div>
<!--=========================================================lgin form end=============================================================-->

<!--=========================================================regstudent =============================================================-->
<div class="container" >
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4" id="regbody">
<!--=========================================================process lgin student======================================================-->
<?php
if (isset($_POST['stdlgbtn'])) {
    if (isset($_POST['studentid']) && isset($_POST['password'])) {
      $getstdid = $_POST['studentid'];
      $getpass = $_POST['password'];

      if(!empty($getstdid) && !empty($getpass)){
            $query= "SELECT `student_id`,`password`,`id` FROM `students` WHERE `student_id` ='$getstdid'";
            if($queryrun = mysqli_query($connect,$query)){
                $queryrow = mysqli_num_rows($queryrun);
                if($queryrow == 0){
                    echo  '<span id="errororsucc"><center>Incorrect login details</center></span>';
                }else if($queryrow == 1 ){

                  if($getdata = mysqli_fetch_assoc($queryrun)){
                    $password = $getdata['password'];
                    if(password_verify($getpass,$password)){
                      $userid = $getdata['id'];
                      $_SESSION['id'] = $userid;

                      $by= $userid;
                      $event = 'logged in';
                      $time = date('D M Y - H:i');
                      $sql = "INSERT INTO `log` VALUES('','$by','$event','$time')";
                      $run = mysqli_query($connect, $sql);
                      header('location: stdreport.php');
                    }
                  }
                }
            }else{
            }   
            }
  }
}

?>
<!--=========================================================end process here =========================================================-->
  <form action="" method="post">
    <div class="form-group">
    <label for="mat">Student ID:</label>
      <input type="text" name="studentid" required="" placeholder="Student ID" id="mat" class="form-control">
    </div>
    <br>
    <div class="form-group">
    <label for="mat">Password:</label>
      <input type="text" name="password" required="" placeholder="Password" id="mat" class="form-control">
    </div>
    <br>
    <button class="btn btn-block" type="submit" name="stdlgbtn" id="stdlgbtn">Log In</button>
      
   </form>
  </div>
  <div class="col-md-4"></div>
</div>

</div>


<!--=========================================================regstudent end=============================================================-->
</div>
</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
</html>