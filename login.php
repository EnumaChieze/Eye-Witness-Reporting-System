<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>i-Witnez | Login</title>
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
    color:#fff;
  }
  #usericon{
    color: #333;
    font-size: 75px;
  }
  #reglink{
    color: green;
    background-color: #fff;
    font-style: italic;
    border-radius: 20px;
    border:1px solid green;
  }
  #reglink:hover{
    background-color: #ff0000;
    color: #fff;
    transition: linear 0.3s;
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
 <a class="navbar-brand" href="index.php"> <font color="white"> i-Witnezz Reporting System </font></a>
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
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $getstdid = $_POST['username'];
      $getpass = $_POST['password'];

      if(!empty($getstdid) && !empty($getpass)){
            $query= "SELECT * FROM `members` WHERE `userid` ='$getstdid'";
            if($queryrun = mysqli_query($connect,$query)){
                $queryrow = mysqli_num_rows($queryrun);
                if($queryrow == 0){
                    echo  '<span id="errororsucc"><center>Incorrect login details</center></span>';
                }elseif($queryrow == 1 ){

                  if($getdata = mysqli_fetch_assoc($queryrun)){
                    $password = $getdata['password'];
                    if(password_verify($getpass,$password)){
                      $userid = $getdata['userid'];
                      $_SESSION['currentuser'] = $userid;
                      $by= $userid;
                      $event = 'logged in';
                      $time = date('D M Y - H:i');
                      $sql = "INSERT INTO `log` VALUES('','$by','$event','$time')";
                      $run = mysqli_query($connect, $sql);
                      header('location:report.php');
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
  <center><span id="usericon" class="fa fa-user-circle"></span></center>
    <div class="form-group">
    <label for="mat">Email Address:</label>
      <input type="email" name="username" required="" placeholder="Username" id="mat" class="form-control">
    </div>
    <br>
    <div class="form-group">
    <label for="mat">Password:</label>
      <input type="password" name="password" required="" placeholder="Password" id="mat" class="form-control">
    </div>
    <br>
    <button class="btn btn-block" type="submit" name="stdlgbtn" id="stdlgbtn">Log In</button>
      
   </form>
   <br>
   <center><a href="regmembers.php"><button id="reglink" class="btn">Register</button></a></center>
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