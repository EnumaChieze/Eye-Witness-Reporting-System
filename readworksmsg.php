<?php
ob_start();
require('admintools/dbconn.php');
  $countunread = "SELECT * FROM `messages` WHERE `recipient`= '18' AND `status`= '0'";
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
  <title>i-Witnez Admin</title>
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
  background-color: #e3e3e3;
}
#mybodyfordisplay{
  background-color: #fff;
  box-shadow: 0px 0px 10px 0px solid #111;
  padding: 20px;
  padding-left: 50px;
  padding-right: 50px;
  border-radius: 5px;
  word-break: break-all;
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
  margin-top: 285px;
}

#editmessage{
  float: left;
  font-size: 20px;
}
#det{
  font-size: 17px;
}
#forwardbtn{
  color: #fff;
  background-color: green;
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
      <a class="navbar-brand" href="#">i-Witnezz Reporting System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
   
    </div>
  </div>
</nav>
<br><br><br>
  <!--=========================================================rep form cdn=============================================================-->
 
   <body>
      <div class="container">
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
      $signature = $displayrow['signature'];
      $image=$displayrow['fileloc'];

      @$attimg = $displayrow['img_loc'];


    
    echo '
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" id="mybodyfordisplay">
    <br><br>
    <b id="det">Witness Location :</b><br>
    <target id="det">'.$thecampus.'</target><br><br>
    <b id="det">Caption :</b><br>
    <target id="det">'.$receivedmsg.'</target><br><br>
    <b id="det">Date Received</b><br>
    <target id="det">'.$datereceived.'</target><br><br>
    <b id="det">By</b><br>
    <target id="det">'.$sender.'</target><br><br>
    <br><br>

    <span class="pull-right">
    <a href="progwork.php?forwardata='.$id.'"><button class="btn" id="forwardbtn" name="forwardbtn">Confirm!</button></a>
    </div>
    </span>
    <div class="col-md-2"></div>

    </div>

    ';}

    if(!empty($image)){
  $thisimg = strtolower(substr($image,strpos($image,'.') +1 ));
  if($thisimg == 'mp4' || $thisimg == '3gp' || $thisimg == 'mkv'){
     echo '
  <a href="file-assets/fileuploads/'.$image.'" type="video/mp4"> <center> <h1> View Witness Video </a>
          </video></div><br>
  ';
}
else {
  echo '  
  <a href="file-assets/fileuploads/'.$image.'"> <center> <h1> View Witness Image </center> </a>
  ';

  
  }
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