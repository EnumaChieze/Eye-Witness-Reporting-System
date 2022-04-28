<?php
require('admintools/dbconn.php');
?> 
<?php
  ///////////////////fetch reports

    $query = " SELECT * FROM `reports` WHERE `senderid` = '$userid' ORDER BY `id` DESC";
    $run = mysqli_query($connect,$query);
      while ( $thisdata = mysqli_fetch_array($run)) {
      $msgid = $thisdata['id'];
      $sender = $thisdata['senderid'];
      $getcomplaint = $thisdata['complaint'];
      $datesent = $thisdata['date']; 
      $msgstatus = $thisdata['status'];
      $complaint = substr($getcomplaint, 0,25);

  ///////////////select sender.
$retrievesql= "SELECT * FROM `students` WHERE `id`='$sender'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  while($data = mysqli_fetch_array($retrieverunsql)){
        $studentid = $data['student_id'];
        $fname = $data['firstname'];
        $lname = $data['lastname'];
        
  }
}
///////////////////////

?>


<div class="container">
<div class="row" id="displaymsg">
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
  <div class "col-md-3" id="dpconnlink"><h4><?php echo $complaint .'...'; ?></h4></div>
</div>
</div>
<?php } 
?>    
