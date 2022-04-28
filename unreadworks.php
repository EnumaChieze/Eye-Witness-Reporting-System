<?php
require('admintools/dbconn.php');
?> 

<?php
    $query = " SELECT * FROM `messages` WHERE `recipient`='18' AND `status` = '0' ORDER BY `id` DESC";
    $run = mysqli_query($connect,$query);

      while ( $data = mysqli_fetch_array($run)) {
      $id = $data['id'];
      $recid = $data['recipient'];
      $probnature = $data['nature_of_problem'];
      $receivedmsg = $data['message']; 
      $datereceived = $data['date'];
      $probdistrict = $data['district'];
      $thecampus = $data['campus'];
      $sender = $data['sent_by'];
      $msgstatus = $data['status'];
      $signature = $data['signature'];

      $nop = substr($probnature, 0,15);


///////////////select recipient.
$retrievesql= "SELECT * FROM `district` WHERE `id`='$probdistrict'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  while($data = mysqli_fetch_array($retrieverunsql)){
        $thedistrict = $data['districts'];
        $district = substr($thedistrict, 0 , 25);
  }
}
///////////////////////

///////////////select campus.
$campussql= "SELECT * FROM `campus` WHERE `id`='$thecampus'";
if($campusrunsql = mysqli_query($connect,$campussql)){
  while($data = mysqli_fetch_array($campusrunsql)){
        $getcampus = $data['campus'];
  }
}
///////////////////////
?>



<div class="row" id="displaymsg">
  <a href="readworksmsg.php?readthismsg=<?php echo $id?>">
  <div class "col-md-1" id="dpconnlink">
    <?php
        if($msgstatus == 0){
          echo '<h4><span class="fa fa-info-circle" id="informicon"></span></h4>';
        }else{
          echo '<h4><span class="fa fa-check-circle" id="informiconcheck"></span></h4>';
        }
    ?>
    
  </div>
  <div class "col-md-2" id="dpconnlink"><h4><?php echo $datereceived; ?></h4></div>
  <div class "col-md-2" id="dpconnlink"><h4>From: <?php echo $sender; ?></h4></div>
  <div class "col-md-3" id="dpconnlink"><h4><?php echo $nop .'...'; ?></h4></div>
  <div class "col-md-3" id="dpconnlink"><h4><?php echo $district.'...'; ?></h4></div>
  <div class "col-md-1" id="dpconnlink"><h4><?php echo $getcampus; ?></h4></div>
  
  </a>
</div>
<?php } 
?>    
