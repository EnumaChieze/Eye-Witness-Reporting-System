<?php
ob_start();
require('admintools/dbconn.php');
  //handle this page
  if(isset($_GET['readthismsg'])){
     $thismsgid = $_GET['readthismsg'];
     //update notification
     $updatenotification = "UPDATE `reports` SET `status` = '1' WHERE `id`='$thismsgid'";
     $runnotupdate = mysqli_query($connect,$updatenotification);

     $displaymsg = "SELECT * FROM `reports` WHERE `id`='$thismsgid'";
     $runmsg = mysqli_query($connect,$displaymsg);
}else{
  header('location:reportproblem.php');
}
//notification
  $countunread = "SELECT * FROM `reports` WHERE `id`= '$thismsgid' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);
  //notification.

/*
  $countunread = "SELECT * FROM `reports` WHERE `id`= '$thismsgid' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);

*/
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
  background-image: url('file-assets/img/mymsgbg.png');
  background-size: cover;
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
#mybodyfordisplay{
}
#receivedmsg{
  border-radius: 20px 0px 0px 20px;
  padding: 20px;
  border :1px solid #999;
  background-color: green;
  color: #fff;
  float: right;
}
#imgdiv{
  background-color: #fff;
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
   
      
    </div>
  </div>
</nav>
<br><br><br>
  <!--=========================================================rep form cdn=============================================================-->
 
   <body>
      <div class="container" id="mybodyfordisplay">
      <?php
while($dpthismsg = mysqli_fetch_array($runmsg)){
      $sender = $dpthismsg['senderid'];
      $sndcmp = $dpthismsg['complaint'];
      $datentime = $dpthismsg['date'];
      $image = $dpthismsg['fileloc'];

///////////////select rec.
$sndstdsql = "SELECT * FROM `members` WHERE `id`='$sender'";
if($sndr = mysqli_query($connect,$sndstdsql)){
  while($data = mysqli_fetch_array($sndr)){
        $fname = $data['fname'];
        $lname = $data['lastname'];
        $name = $fname.' '.$lname;
  }
}

echo '
    <div class="container">
      <div id="receivedmsg">
        <div id="sndaddr">'.$name.'</div><br>
        <div id="sntmsg">'.$sndcmp.'</div><br>
        <span class="pull-right">'.$datentime.'</span>
      </div><br>
    </div>
';

if(!empty($image)){
  $thisimg = strtolower(substr($image,strpos($image,'.') +1 ));
  if($thisimg == 'mp4' || $thisimg == '3gp' || $thisimg == 'mkv'){
     echo '
  <br>
  <div id="imgdiv" class="container"><video width="100%" height="100%" controls>
            <source src="file-assets/fileuploads/'.$image.'" type="video/mp4">
          </video></div><br>
  ';
}else{
  echo '  <div id="imgdiv" class="container"><img class="img-responsive" src="file-assets/fileuploads/'.$image.'"></div><br>
';
} 
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