<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
if(!empty($_SESSION['currentuser'])){
   $userid= $_SESSION['currentuser'];
}else{
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>i-Witnez | User Report</title>
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

}

#wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  margin-top: 55px;
}

#wrapper.toggled {
  padding-left: 85px;
}

#sidebar-wrapper {
  z-index: 850;
  position: fixed;
  left: 85px;
  width: 0;
  height: 70%;
  margin-left: -85px;
  overflow-y: auto;
  background: #222;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  border-radius: 0px 5px 5px 0px;

}

#wrapper.toggled #sidebar-wrapper {
  width: 85px;
}

#page-content-wrapper {
  width: 85%;
  position: absolute;
  padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: -85px;
}


/* Sidebar Styles */

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 85px;
  margin: 0;
  padding: 0;
  list-style: none;
}
#sidetog{
  color: #222;
  font-size: 40px;
}
#sidetog:hover{
  color: #ff0000;
  transition: linear 0.3s;
}

.sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
  border-bottom: 2px solid #fff;
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
    padding-left: 85px;
  }
  #sidebar-wrapper {
    width: 0;
  }
  #wrapper.toggled #sidebar-wrapper {
    width: 85px;
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
  background-color: #ff0000;
  color: #fff;
  font-weight: bold;
  border-radius: 0px;
}
#subbtn{
  background-color: #00bfff;
  color: #fff;
  font-weight: bold;
  border-radius: 0px;
}
#btnarea{
  margin-top: 5px;
}
#btnareaprnt{
  padding: 10px;
}
#Addressedto, #campus, #rpfield, #nop{
  border-radius: 0px;
}
#logoutbtn{
  background-color: #111;
  border: 2px solid #999;
  color: #999;
}
#logoutbtn:hover{
  background-color: red;
}
#logoutbtn a{
  color: #999;
}
#logoutbtn:hover a{
  color: #fff;
}
#profileusericon{
  font-size: 70px;
}
#cpwaction{
  background-color: #ff0000;
  color: #fff;
  border-radius: 0px;
}
#cpwaction:hover{
  background-color: green;
  transition: linear 0.3s;
}
#cpwfield{
  border-radius: 0px;
}
#handlecpwaction{
  display: none;
  background-color: #f3f3f3;
  padding: 5px;
}

#displaymsg{
  background-color: #f3f3f3;
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
#handlesign{
  display: none;
}
#signaction{
  background-color: #ff0000;
  color: #fff;
  border-radius: 0px;
}
#signaction:hover{
  background-color: green;
  transition: linear 0.3s;
}
#countnotforrep{
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
      <a class="navbar-brand" href="index.php"><font color="white"> i-Witnezz Reporting System </font></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form" method="get" action="">
            <button class="btn" name="logmeout" id="logoutbtn"><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
if (isset($_GET['logmeout'])) {
  session_destroy();
  header('location:index.php');
}
?>
  <!--=========================================================rep form cdn=============================================================-->
 
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="report.php?compose">
                       <span class="fa fa-envelope"></span>
                    </a>
                </li>
                 
                <li class="sidebar-brand">
                    <a href="report.php?profile">
                       <span class="fa fa-user"></span>
                    </a>
                </li>
              
               
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <a href="#menu-toggle" class="btn" id="menu-toggle"><span class="fa fa-toggle-on" id="sidetog"></span></a>
            </div>

            <div class="container" id="thispart">
            <?php
            if(isset($_GET['compose'])){
             include('compose.php'); 
             }elseif (isset($_GET['profile'])) {
               include('profile.php');}
             else{
              include('compose.php'); 
             }
             ?>
            </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
     <!-- Menu Toggle Script -->

<script type="text/javascript">
  $('#cpwaction').click(function(){
      $('#handlecpwaction').slideToggle(700);
      $('#handlecpwaction').css('display','block');
  });

  $('#signaction').click(function(){
      $('#handlesign').slideToggle(700);
      $('#handlesign').css('display','block');
  });
</script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script type="text/javascript" src = "jqueryfiles/updaterep.js"></script>
</html>




