<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>i-Witnez | Register</title>
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
    background-color: #999;
  }   
  #regbody{
    margin-top: 100px;
    background-color: #fff;
    border-radius: 5px;
    padding: 30px;
  } 
  #stdlgbtn{
    background-color: #00bfff;
    color: #fff;
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
      <a class="navbar-brand" href="index.php"><font color="white"> i-Witnezz Reporting System </font> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    </div>
  </div>
</nav>
<!--=========================================================lgin form=============================================================-->

<!--=========================================================regstudent =============================================================-->
<div class="container" >
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4" id="regbody">
<!--=========================================================process lgin student======================================================-->
<?php
if (isset($_POST['stdlgbtn'])) {
  if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['userid']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $userid = $_POST['userid'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if($pass1 == $pass2){
      $password = password_hash($pass2, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `members` VALUES('','$fname','$lname','$userid','$password')";
      if($runsql = mysqli_query($connect,$sql)){
        header('location:login.php');
      }
    }else{
      echo 'Password mismatch!';
    }
  }
}
  
?>

<!--=========================================================end process here =========================================================-->
  <form action="" method="post">
    <div class="form-group">
      <input type="text" name="fname" required="" placeholder="First Name" id="mat" class="form-control" maxlength="30">
    </div>
    <div class="form-group">
      <input type="text" name="lname" required="" placeholder="Last Name" id="mat" class="form-control" maxlength="30">
    </div>
    <div class="form-group">
      <input type="email" name="userid" required="" placeholder="User ID" id="mat" class="form-control" maxlength="50">
    </div>
    <div class="form-group">
      <input type="password" name="pass1" required="" placeholder="Password" id="mat" class="form-control">
    </div>
    <div class="form-group">
      <input type="password" name="pass2" required="" placeholder="Confirm Password" id="mat" class="form-control">
    </div>
    <button class="btn btn-block" type="submit" name="stdlgbtn" id="stdlgbtn">Register</button>
      
   </form>
   <br>
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