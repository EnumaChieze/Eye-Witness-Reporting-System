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
  body{
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
  #userfield{
    border-radius: 0px;
  }
    #actbtn{
    color: red;
    border-radius: 50px;
    font-size: 10px;
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
 <div class="container">
  <h2>Add new user</h2><hr>
  <?php
if(isset($_POST['go'])){
  if(isset($_POST['add_name']) && isset($_POST['add_id']) && isset($_POST['add_number']) && isset($_POST['add_email']) && isset($_POST['add_rep'])){
  $add_name = ($_POST['add_name']);
  $add_id = ($_POST['add_id']);
  $add_email = ($_POST['add_email']);
  $add_number = ($_POST['add_number']);
  $add_rep =  ($_POST['add_rep']);

  $default_pass = '0000';
  $hashed_password = password_hash($default_pass, PASSWORD_DEFAULT);


  $query = "INSERT INTO `users` VALUES ('$add_name','$add_id','$add_email','$add_number','$hashed_password','$add_rep','0')";
  if(mysqli_query($connect,$query)){
  echo ' 
  <div class="row">
  <div class="col-md-8">
        <div class="alert alert-success alert-dismissible">
            New user '.$add_name.' successful inserted.
            <button class="btn btn-sm pull-right" class="close" data-dismiss="alert">OK</button>
        </div>
  </div>
  <div class="col-md-4"></div>
  </div>';
  }else{
  echo ' <div class="row">
  <div class="col-md-8">
        <div class="alert alert-danger alert-dismissible">
            Representative for district already exists.
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
  <div class="row">
   <!--=========================================================form start=============================================================-->
    <div class="col-md-6">
          <div class="form-group">
  <label for="Districtname">User Name:</label>
    <input type="text" name="add_name" class="form-control" placeholder="Enter new user's name" id="userfield" required="" maxlength="50">
  </div>
    </div>
    <div class="col-md-6">
          <div class="form-group">
  <label for="Districtname">User ID:</label>
    <input type="text" name="add_id" class="form-control" placeholder="Enter new user's id" id="userfield" required="" maxlength="10">
  </div>
    </div>
  </div>

  <div class="row">
   <!--=========================================================form start=============================================================-->
    <div class="col-md-6">
          <div class="form-group">
  <label for="Districtname">Email Address:</label>
    <input type="email" name="add_email" class="form-control" placeholder="Enter new user's e-mail address" id="userfield" required="" maxlength="50">
  </div>
    </div>
    <div class="col-md-6">
          <div class="form-group">
  <label for="Districtname">Phone Number:</label>
    <input type="phone" name="add_number" class="form-control" placeholder="Enter new user's phone number" id="userfield" required="" minlength="11" maxlength="11">
  </div>
    </div>
  </div>

    <div class="row">
   <!--=========================================================form start=============================================================-->
    <div class="col-md-6">
          <div class="form-group">
  <label for="Districtname">Representative Of:</label>
    <select name="add_rep" class="form-control"  id="userfield" required="" >
    <option></option>
                      <?php
                    $query = " SELECT * FROM `district`";
                      $run = mysqli_query($connect,$query);
                      while ( $data = mysqli_fetch_array($run)) {
                        $district = $data['districts'];
                        $districtid = $data['id'];
                         echo '<option value="'.$districtid.'">'.$district.'</option>';
                          }
                    ?>
    </select>
  </div>
    </div>
    <div class="col-md-6"></div>
  </div>



  </div>

   <!--=========================================================form end=============================================================-->
  <div class="col-md-4"></div>
</div>
<div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-2">
    <button class="btn btn-block" type="submit" id="addbtn" name="go">Save</button>
  </div>
  <div class="col-md-4"></div>
</div>
</form><hr>
<br>
<h2>All users</h2><hr>
<div class="row">
  <div class="col-md-8">
    <?php
$query = " SELECT * FROM `users`";
$run = mysqli_query($connect,$query);
$counter = 1;
while ( $data = mysqli_fetch_array($run)) {
  $user_name = $data['Name'];
  $user_id = $data['User_id'];
  $user_email = $data['user_email'];
  $user_phnum = $data['phone_number'];
  $rep = $data['repof'];

  $retrep = " SELECT * FROM `district` WHERE `id`='$rep'";
  $runrep = mysqli_query($connect,$retrep);
  $info = mysqli_fetch_array($runrep);
  $thisdistrict = $info['districts'];
  $district = substr($thisdistrict, 10,20);

?>
   <div class="row" id="dprow">
      <div class="col-md-1"><h5><?php echo $counter++; ?></h5></div>
      <div class="col-md-2"><h5><?php echo $user_name; ?></h5></div>
      <div class="col-md-2"><h5><?php echo $district; ?></h5></div>
      <div class="col-md-3"><h5><?php echo $user_email; ?></h5></div>
      <div class="col-md-2"><h5><?php echo '0'.$user_phnum; ?></h5></div>
      <div class="col-md-1"><a href="admintools/users.php?this=<?php echo $user_id;?>"<h2><span id="actbtn">REMOVE</span></h2></a></div>
  </div>
<?php } ?>
  </div>
  <div class="col-md-4"></div>
</div>
<?php
if (isset($_GET['this'])) {
    $del_id = $_GET['this'];
          $delete_query = "DELETE FROM `users` WHERE User_id = '$user_id'";
       if (mysqli_query($connect,$delete_query)){
                    header('location: ../adminpage.php?mng_users');
                    $by= 'Administrator';
                    $event = 'Removed '.$user_id;
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
<br>
</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
    
</html>