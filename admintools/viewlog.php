<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint MS</title>
  <!--=========================================================online cdn=============================================================-->

  <meta charset="utf-8">
 
  <!--=========================================================local cdn end=============================================================-->
  <style type="text/css">
  body{
    font-family: palatino;
  }
   #dprow{
    background-color: #e3e3e3;
    padding:5px;
    color: #000;
    margin-bottom: 10px
  }
  </style>
</head>
<body>
  <!--=========================================================rep form cdn=============================================================-->
  <div class="container">
  <div class="row">
  <div class="col-md-8">
    <h2>Log</h2><hr>
    <?php
$query = " SELECT * FROM `log` ORDER BY `id` DESC";
$run = mysqli_query($connect,$query);
$counter = 1;
while ( $data = mysqli_fetch_array($run)) {
  $id = $data['id'];
  $by = $data['By'];
  $event = $data['event'];
  $time = $data['dateandtime'];

?>
   <div class="row" id="dprow">
      <div class="col-md-2"><h4><?php echo $by; ?></h4></div>
      <div class="col-md-7"><h4><?php echo $event; ?></h4></div>
      <div class="col-md-3"><h4><?php echo $time; ?></h4></div>
  </div>
<?php } ?>
  </div>
  <div class="col-md-4"></div>
</div>

</div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
    
</html>