<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
?> 
<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>iWitnez</title>
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
  }
    #bodyone{
      margin-top: 70px;
    }
    #bodyone, #bodythree{
      background-color: #f3f3f3;
    }
    #anicon{
      font-size: 70px;
      color:#ff0000;
    }
    #lgbtn{
      color: #fff;
      background-color: #ff0000;
    }
    #lgfield{
      border-right: 1px solid #fff;
      border-left: 1px solid #fff;
      border-top: 2px solid #fff;
      border-bottom: 2px solid #555;
      border-radius: 0px;
    }
    #errororsucc{
      text-align: center;
      color: red;
      font-style: italic;
    }
    #myNavbar{
      background-color: 00bfff;
    }
    #font{
      color: white;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top ">
  <div class="container" id="myNavbar">
    <div class="navbar-header" id="myNavbar">
      <button type="button" class="navbar-toggle" data-toggle="collapse" id="myNavbar">                       
      </button>
      <a class="navbar-brand" href="index.php"> <font color="white"> i-Witnezz Reporting System </font></a>
    </div>
    <div class="collapse navbar-collapse" id="font">
      <ul class="nav navbar-nav navbar-right">
        <!--=============================-->
          <li><a href="login.php"><b>Login</b></a></li>
         
          
        </ul>
      </li>
        <!--=============================-->


      </ul>
    </div>
  </div>
</nav>
<div class="container" id="bodyone">
<br>
  <center><span class="fa fa-eye" id="anicon"></span></center><br>

  <center><h1>i-Witnez</h1><br>
  <p>The i-Witness reporting system help users send report instantly.</p>
  </center>
</div>
<div class="container" id="bodytwo">
<br><br>
  <div class="row">
    <div class="col-md-4">
    <center>
      <span class="fa fa-users" id="anicon"></span>
      <h3>Witness a crime?</h3><br>
    </center>
    </div>
    <div class="col-md-4">
    <center>
      <span class="fa fa-mobile-phone" id="anicon"></span>
      <h3>Log in - send report!</h3><br>
    </center>
    </div>
    <div class="col-md-4">
    <center>
      <span class="fa fa-desktop" id="anicon"></span>
<h3>Report will be received swiftly!</h3><br>    </center>
    </div>
</div>
<div class="container" id="bodythree">
<center>
<br>
  i-Witnez Report System &copy; 2018. 
  <br><br>
</center>
  
</div>
<!--=========================================================body form end=============================================================-->




</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
</html>