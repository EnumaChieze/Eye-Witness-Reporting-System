<?php
require('admintools/dbconn.php');
if(isset($_POST['update'])){
  $countunread = "SELECT * FROM `messages` WHERE `recipient`= '6' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);
  echo $thecount;
} 

 
?>