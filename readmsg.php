<?php
ob_start();
require('admintools/dbconn.php');
  $countunread = "SELECT * FROM `messages` WHERE `recipient`= '6' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);


  //handle this page
  if(isset($_GET['readthismsg'])){
     $thismsgid = $_GET['readthismsg'];
     //update notification
     $updatenotification = "UPDATE `messages` SET `status` = '1' WHERE `id`='$thismsgid'";
     $runnotupdate = mysqli_query($connect,$updatenotification);


     $displaymsg = "SELECT * FROM `messages` WHERE `id`='$thismsgid'";
     $runmsg = mysqli_query($connect,$displaymsg);
}else{
  header('location:DOW.php');
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
  font-family: palatino;
  background-color: #666;
}
#mybodyfordisplay{
  background-color: #fff;
  box-shadow: 0px 0px 10px 0px solid #111;
  padding: 20px;
  padding-left: 50px;
  padding-right: 50px;
}
#senderaddr{
  float: right;
}
#receiveraddr{
  float: left;
  margin-top: 50px;
}
#countnot{
  border-radius: 20px;
  background-color: red;
  font-size: 10px;
}
#letterbody{
  margin-top: 250px;
}

#editmessage{
  float: left;
  font-size: 20px;

}
</style>
</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Complaint MS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
   
      <ul class="nav navbar-nav navbar-right">
        <li class="active">
          <a href="#">
            Notification
            <sup><span id="countnot"class="label label-pill count"><?php if($thecount > 0){ echo $thecount;} ?></span></sup>
          </a>
          <ul class="dropdown-menu"></ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
  <!--=========================================================rep form cdn=============================================================-->
 
   <body>
      <div class="container" id="mybodyfordisplay">
      <?php
  
while($displayrow = mysqli_fetch_array($runmsg)){
      $id = $displayrow['id'];
      $recipientreceiver = $displayrow['recipient'];
      $probnature = $displayrow['nature_of_problem'];
      $receivedmsg = $displayrow['message']; 
      $datereceived = $displayrow['date'];
      $probdistrict = $displayrow['district'];
      $thecampus = $displayrow['campus'];
      $sender = $displayrow['sent_by'];
      $msgstatus = $displayrow['status'];
      $sign = $displayrow['signature'];
      @$attimg = $displayrow['img_loc'];

      ///////////////select district.
$retrievesql= "SELECT * FROM `district` WHERE `id`='$probdistrict'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  while($data = mysqli_fetch_array($retrieverunsql)){
        $thedistrict = $data['districts'];
  }
}
///////////////////////
///////////////select rec.
$retrieverecsql= "SELECT * FROM `recipient` WHERE `id`='$recipientreceiver'";
if($recrunsql = mysqli_query($connect,$retrieverecsql)){
  while($data = mysqli_fetch_array($recrunsql)){
        $therec = $data['Recipients'];
  }
}
///////////////////////

    
    echo '<br><br>
    <center><h2><strong>FEDERAL UNIVERSITY OF TECHNOLOGY MINNA</strong></h2></center><br>
    <div>
          <div id="senderaddr"><h4>'.$thedistrict.'<br>'.$datereceived.'<br><br></h4></div>
          <div id="receiveraddr">
          <h4>The Director,<br>'.$therec.',
          <br>
          Federal University of Technology Minna,
          <br>
          Minna,
          <br>
          Niger State.
          <br><br>
          Dear Sir/Madam,
          </h4><br><br>
          </div>
    </div>
    <div id="letterbody">
          <center><h3><strong>LETTER OF COMPLAINT</strong></h3></center><br>
          <h3><strong>Nature of complaint:</strong></h3>
          <div><target id="editmessage">'.$probnature.'</target></div>
          
          <br><br>
          <h3><strong>Complaint in details:</strong></h3>
          <div><target id="editmessage">'.$receivedmsg.'</target></div>
          <br><br><br><br>
          <h3><strong>Sent by:</strong></h3>
          <div><target id="editmessage"><img class="img-responsive" width="40%" height="40%" src="file-assets/allsignature/'.$sign.'"><br>'.$sender.'</target></div>
    </div>
    <br><br><br><br><br><br>
          
    ';
    
   }
 
 ?>
 
    </div>
   </body>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
     <!-- Menu Toggle Script -->
</html>