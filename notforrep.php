<?php
session_start();
require('admintools/dbconn.php');
   $userid= $_SESSION['currentuser'];

$findnotsql = "SELECT * FROM `users` WHERE `User_id`='$userid'";
if($runfindnotsql = mysqli_query($connect,$findnotsql)){
	$thisdata = mysqli_fetch_assoc($runfindnotsql);
	$guyrep = $thisdata['repof'];

}

if(isset($_POST['update'])){
  $countunread = "SELECT * FROM `reports` WHERE `rep`= '$guyrep' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);
  echo $thecount;
}


?>