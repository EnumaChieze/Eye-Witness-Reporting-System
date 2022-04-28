<?php
require('admintools/dbconn.php');
?> 
<?php
/////////////////////////

$queryuser = " SELECT * FROM `users` WHERE `User_id` = '$userid'";
$runuser = mysqli_query($connect,$queryuser);
$data = mysqli_fetch_array($runuser);
$rep = $data['repof'];

  ///////////////////fetch reports

    $query = " SELECT * FROM `reports` WHERE `rep`='$rep' ORDER BY `id` DESC";
    $run = mysqli_query($connect,$query);
      while ( $thisdata = mysqli_fetch_array($run)) {
      $msgid = $thisdata['id'];
      $sender = $thisdata['senderid'];
      $getcomplaint = $thisdata['complaint'];
      $datesent = $thisdata['date']; 
      $msgstatus = $thisdata['status'];
      $complaint = substr($getcomplaint, 0,25);

  ///////////////select sender.
$retrievesql= "SELECT * FROM `members` WHERE `id`='$sender'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  while($data = mysqli_fetch_array($retrieverunsql)){
        $studentid = $data['id'];
        $fname = $data['fname'];
        $lname = $data['lastname'];
        
  }
}
///////////////////////

?>


<div class="container">
<div class="row" id="displaymsg">
  <a href="msgfr.php?readthismsg=<?php echo $msgid?>">
  <div class "col-md-1" id="dpconnlink">
    <?php
        if($msgstatus == 0){
          echo '<h4><span class="fa fa-info-circle" id="informicon"></span></h4>';
        }else{
          echo '<h4><span class="fa fa-check-circle" id="informiconcheck"></span></h4>';
        }
    ?>
    
  </div>
  <div class "col-md-2" id="dpconnlink"><h4><?php echo $datesent; ?></h4></div>
  <div class "col-md-5" id="dpconnlink"><h4>From: <?php echo $fname.' '.$lname.' -ID- '.$studentid; ?></h4></div>
  <div class "col-md-3" id="dpconnlink"><h4><?php echo $complaint .'...'; ?></h4></div>
  </a>
</div>
</div>
<?php } 
?>    
