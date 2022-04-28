<?php
ob_start();
session_start();
require('admintools/dbconn.php');
if(isset($_GET['logout'])){
  session_destroy();
  header('location: index.php');
}
if(!empty($_SESSION['works'])){
}else{
  header('location: index.php');
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>i-Witnez | Admin</title>
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
  background-color: #666;
  font-family: palatino;
}

#wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  margin-top: 50px;
}

#wrapper.toggled {
  padding-left: 180px;
}

#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 180px;
  width: 0;
  height: 100%;
  margin-left: -180px;
  overflow-y: auto;
  background: #000;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
  width: 180px;
}

#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -180px;
}
/* Sidebar Styles */

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 180px;
  margin: 0;
  padding: 0;
  list-style: none;
}
#sidetog{
  color: #000;
  font-size: 40px;
}

.sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
  border-bottom: 1px solid #000;
}
.sidebar-nav li:hover {
  background-color: #ff0000;
  transition: linear 0.3s;
}
.sidebar-nav li a {
  display: block;
  text-decoration: none;
  color: #999999;
}

.sidebar-nav li a:hover {
  text-decoration: none;
  color: #fff;
  background: rgba(255, 255, 255, 0.2);
}

.sidebar-nav li a:active, .sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav>.sidebar-brand {
  height: 65px;
  font-size: 18px;
  line-height: 60px;
}

.sidebar-nav>.sidebar-brand a {
  color: #999999;
}

.sidebar-nav>.sidebar-brand a:hover {
  color: #fff;
  background: none;
}

@media(min-width:768px) {
  #wrapper {
    padding-left: 0;
  }
  #wrapper.toggled {
    padding-left: 180px;
  }
  #sidebar-wrapper {
    width: 0;
  }
  #wrapper.toggled #sidebar-wrapper {
    width: 180px;
  }
  #page-content-wrapper {
    padding: 20px;
    position: relative;
  }
  #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0;
  }
}
#resetbtn{
  background-color: #4db8ff;
  color: #fff;
  font-weight: bold;
}
#subbtn{
  background-color: #ff0000;
  color: #fff;
  font-weight: bold;
}
#displaymsg{
  background-color: #fff;
  margin-bottom: 10px;
  box-shadow: 0px 0px 10px 0px solid #000;
  padding: 10px;
}
#displaymsg div{
  float: left;
  padding-right: 20px; 
}
#displaymsg a{
  color: #000;
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
#countnot{
  border-radius: 20px;
  background-color: red;
  font-size: 10px;
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
      <a class="navbar-brand" href="#">i-Witnez | Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right">
        <li class="active">
          <a href="dow.php">
            Notification
            <sup><span id="countnot"class="label label-pill count"></span></sup>
          </a>
          <ul class="dropdown-menu"></ul>
        </li>
        <li><a href="dow.php?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <!--=========================================================rep form cdn=============================================================-->
 
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="dow.php?allmail">
                       <span class="fa fa-envelope"></span> All mails
                    </a>
                </li>
                <li class="sidebar-brand">
                    <a href="dow.php?notread">
                       <span class="fa fa-info-circle"></span> Not Read
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn" id="menu-toggle"><span class="fa fa-toggle-on" id="sidetog"></span></a>
            </div>
        <!-- /#page-content-wrapper -->
        <div class="container" id="thisportion">

<!--=================================handle messages here===========================================-->

<?php
  if (isset($_GET['allmail'])) {
    include('fetchworks.php');  
  }elseif(isset($_GET['notread'])){
    include('unreadworks.php');  
  }else{
    include('fetchworks.php');  
  }
 ?>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   


</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script type="text/javascript" src = "jqueryfiles/updatejs.js"></script>
      
</html>