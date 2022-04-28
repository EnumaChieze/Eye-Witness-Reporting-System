<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
if(!empty($_SESSION['id'])){
   $userid =$_SESSION['id'];
}else{
    header('location: index.php');
}
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
  
body {
  overflow-x: hidden;
  font-family: palatino;
  background-color: #e3e3e3;
}
#logoutbtn{
  background-color: #ff0000;
}
#logoutbtn a{
  color: #fff;
}
#bodypart{
  margin-top: 80px;
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
}
#sndbtn{
  background-color: green;
  color: #fff;
  }
  #sndbtn:hover{
  background-color: #000;
  color: #fff;
  transition: linear 0.5s;
  }
  #dpconnlink{
  border-right: 1px solid #999;
  padding-left: 15px;
}
#informicon{
  color: red;
}
#informiconcheck{ 
  color: green;
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
      <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-caret-down"></span></a>
       
        <li><a href="stdreport.php?compose">Compose</a></li>
          <li><a href="stdreport.php?status">My message status</a></li>
          <li role="separator" class="divider"></li>
        </ul>
      </li>

        <li>
          <form class="navbar-form" method="get" action="">
            <button class="btn" name="logmeout" id="logoutbtn"><a href="loginstd.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--=========================================================body part=============================================================-->


  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" id="bodypart">
      <!--=========================================================processor=============================================================-->
<?php
  if(isset($_GET['compose'])){
    include('usercompose.php');
  }elseif(isset($_GET['status'])){
    include('usermsgstatus.php');
  }else{
   // include('usercompose.php');
  }
?>
</div>

            


        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
<!--=========================================================end body part=============================================================-->


<?php
if (isset($_GET['logmeout'])) {
  session_destroy();
  header('location:index.php');
}
?>
  <!--=========================================================rep form cdn=============================================================-->
 
    
       
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>




