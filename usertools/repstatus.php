
<?php
require('admintools/dbconn.php');
?> 
<?php
$queryuser = " SELECT * FROM `users` WHERE `User_id` = '$userid'";
$runuser = mysqli_query($connect,$queryuser);
$data = mysqli_fetch_array($runuser);
$represent = $data['repof'];
?>
<?php
  ///////////////////fetch reports

    $query = " SELECT * FROM `messages` WHERE `district` = '$represent' ORDER BY `id` DESC";
    $run = mysqli_query($connect,$query);
      while ( $thisdata = mysqli_fetch_array($run)) {
      $nop = $thisdata['nature_of_problem'];
      $msg = $thisdata['message'];
      $status = $thisdata['workstatus'];
      $complaint = substr($msg, 0,30);
}
///////////////////////

?>


<div class="container">
<div class="row" id="displaymsg">
  <div class "col-md-1" id="dpconnlink">
    <?php
        if($status == 0){
          echo '<h4><span class="fa fa-info-circle" id="informicon"></span> No Action taken yet!</h4>';
        }else{
          echo '<h4><span class="fa fa-check-circle" id="informiconcheck"></span> Work in progress! If No changes after 72hrs, Resend a complaint.</h4>';
        }
    ?>
    
  </div>
  <div class "col-md-2" id="dpconnlink"><h4><?php echo $nop; ?></h4></div>
  <div class "col-md-3" id="dpconnlink"><h4><?php echo $complaint .'...'; ?></h4></div>
</div>
</div>

<?php
require('admintools/dbconn.php');
?> 
<?php
/*

  ///////////////////fetch reports

    $query = " SELECT * FROM `messages` WHERE `district` = '$userid' ORDER BY `id` DESC";
    $run = mysqli_query($connect,$query);
      while ( $thisdata = mysqli_fetch_array($run)) {
      $nop = $thisdata['nature_of_problem'];
      $msg = $thisdata['message'];
      $status = $thisdata['workstatus'];
      $complaint = substr($msg, 0,30);

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
*/
?>
