<?php
require('admintools/dbconn.php');

if(isset($_POST['update'])){
  $countunread = "SELECT * FROM `messages` WHERE `recipient`= '18' AND `status`= '0'";
  $runcount = mysqli_query($connect,$countunread);
  $thecount = mysqli_num_rows($runcount);
  echo $thecount;

 if ($thecount >= 1) {?>
  	
  	<audio controls autoplay style="display:none;">
  	<source src="notsound.mp3" type="audio/mpeg">
  	</audio>
  	
 <?php }


}


?>