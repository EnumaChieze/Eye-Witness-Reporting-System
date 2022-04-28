<?php
ob_start();
require('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint MS</title>
  <!--=========================================================online cdn=============================================================-->
  <meta charset="utf-8">
  <!--=========================================================local cdn end=============================================================-->
  <style type="text/css">
  h2{
    font-family: palatino;
  }
  #addbtn{
    background-color: #ff0000;
    color: #fff;
    border-radius: 0px;
  }
  #addbtn:hover{
    background-color: green;
    transition: linear 0.3s;
  }
   #Addresstoname{
    border-radius: 0px;
  }
  #actbtn{
    color: red;
    border-radius: 50px;
    font-size: 20px;
    margin-top: 5px;
  }
   #actbtn:hover{
    color: green;
    transition: linear 0.3s;
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
  <div class="container" >
<h2>New Campus</h2><hr>
<?php
if(isset($_POST['go'])){
  if(isset($_POST['add_field'])){
  $add_data = mysql_real_escape_string($_POST['add_field']);
  $query = "INSERT INTO `Campus` VALUES ('','$add_data')";
  if(mysqli_query($connect,$query)){
  echo ' 
  <div class="row">
  <div class="col-md-8">
        <div class="alert alert-success alert-dismissible">
            New recipient '.$add_data.' successful inserted.
            <button class="btn btn-sm pull-right" class="close" data-dismiss="alert">OK</button>
        </div>
  </div>
  <div class="col-md-4"></div>
  </div>';
  }else{
  echo ' <div class="row">
  <div class="col-md-8">
        <div class="alert alert-danger alert-dismissible">
            New recipient insertion unsuccessful.
            <button class="btn btn-sm pull-right" class="close" data-dismiss="alert">&times;</button>
        </div>
  </div>
  <div class="col-md-4"></div>
  </div>';
  }
}
}
?>
<form method="post">
<div class="row">
  <div class="col-md-8">
    <div class="form-group">
  <label for="Addresstoname">Campus Name:</label>
    <input type="text" name="add_field" class="form-control" placeholder="Enter new campus name" id="Addresstoname" required="">
  </div>
  </div>
  <div class="col-md-4">
    
  </div>
</div>
<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-2">
    <button class="btn btn-block" type="submit" id="addbtn" name="go">Add</button>
  </div>
  <div class="col-md-4"></div>
</div>
</form>
<br><hr>
<h2>Campus</h2><hr>
<div class="row">
  <div class="col-md-8">
    <?php
$query = " SELECT * FROM `campus`";
$run = mysqli_query($connect,$query);
$counter = 1;
while ( $data = mysqli_fetch_array($run)) {
  $id = $data['id'];
  $name = $data['campus'];
?>
   <div class="row" id="dprow">
      <div class="col-md-1"><h4><?php echo $counter++; ?></h4></div>
      <div class="col-md-9"><h4><?php echo $name; ?></h4></div>
      <div class="col-md-2"><a href="admintools/add_campus.php?this=<?php echo $id;?>"<h4><span class= "fa fa-trash" id="actbtn"></span></h4></a></div>
  </div>
<?php } ?>
  </div>
  <div class="col-md-4"></div>
</div>
<?php
if (isset($_GET['this'])) {
    $del_id = $_GET['this'];
          $delete_query = "DELETE FROM `campus` WHERE id = '$del_id'";
       if (mysqli_query($connect,$delete_query)){
        header('location: ../adminpage.php?add_campus');
        $by= 'Administrator';
                    $event = 'Removed Campus '.$del_id;
                    $time = date('D M Y - H:i');
                    $sql = "INSERT INTO `log` VALUES('','$by','$event','$time')";
                    $run = mysqli_query($connect, $sql);
       }else{
        echo '<div class="row">
  <div class="col-md-8">
        <div class="alert alert-danger alert-dismissible">
            Recipient delete Unsucessful.
            <button class="btn btn-sm pull-right" class="close" data-dismiss="alert">OK</button>
        </div>
  </div>
  <div class="col-md-4"></div>
  </div>';
       }
  }
?>
   </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
</html>
