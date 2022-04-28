<?php
require('admintools/dbconn.php');
$queryuser = " SELECT * FROM `users` WHERE `User_id` = '$userid'";
$runuser = mysqli_query($connect,$queryuser);
$data = mysqli_fetch_array($runuser);
  $currentusername = $data['Name'];
  $thisuserid = $data['User_id'];
  $number = $data['phone_number'];
  $mail = $data['user_email'];
  $myoldpass = $data['password'];
?>

<div class="container">
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <center><span class="fa fa-user-circle" id="profileusericon"></span></center>

    <?php
  if (isset($_POST['cpwbtn'])) {
    if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['cnewpass'])) {
      $pass1 = $_POST['oldpass'];
      $pass2 = $_POST['newpass'];
      $pass3 = $_POST['cnewpass'];

      $sqlchanger = "SELECT * FROM `users` WHERE `User_id` = '$userid'";
      $runsqlchanger = mysqli_query($connect,$sqlchanger);
      $datagrabbed = mysqli_fetch_assoc($runsqlchanger);
      $prevpass = $datagrabbed['password'];
        if(password_verify($pass1,$prevpass)){
          if($pass2 == $pass3){
            $thenewpass = mysql_real_escape_string($pass3);
            $hashpass = password_hash($thenewpass,PASSWORD_DEFAULT);
            $cpwquery = "UPDATE `users` SET `password` = '$hashpass' WHERE `User_id` = '$userid'";
            if(mysqli_query($connect,$cpwquery)){
            echo '<br><div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-success alert-dismissible">
                                          Password changed Successfully
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';

          }else{
            echo '<br><div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-danger alert-dismissible">
                                          Password changed Unsuccessful.
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';
          }
          }
        }else{
          echo '<br><div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-success alert-dismissible">
                                          Current password Incorrect.
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';

        }

    }
  }
?>

<?php
  if (isset($_POST['signbtn'])) {
      //handle uploaded image
      @$uplimagetmpname = $_FILES['sign']['tmp_name'];
      @$uplimagenamern = $_FILES['sign']['name'];

       if(!empty($uplimagetmpname) && !empty($uplimagenamern)){
          $fileloc = 'file-assets/allsignature/';
          @$randnum = rand(0, 10000000);
          @$uplimagename = $randnum.$uplimagenamern;
          $attachext = strtolower(substr($uplimagename,strpos($uplimagename,'.') +1 ));

          if (($attachext == 'jpg' || $attachext == 'jpeg' || $attachext == 'png' || $attachext == 'gif' )) {
             if(move_uploaded_file($uplimagetmpname, $fileloc.$uplimagename)){
                echo  '<br><div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                          Signature Successfully Appended.
                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                        </div>
                                </div>
                                </div>';
          //handle signature appending to letter.
          $uplsign = "UPDATE `users` SET `signature` = '$uplimagename' WHERE `User_id` = '$userid'";
          $runuplsign = mysqli_query($connect,$uplsign);
              }
          }else{
              echo  '<div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                          Please an image file with your signature on it.
                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                        </div>
                                </div>
                                </div>';
                     } 

                  }
    }
?>
      <center>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>My Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h4>My Name</h4></td>
        <td><?php echo '<h4>'.$currentusername.'</h4>'; ?></td>
      </tr>
      <tr>
        <td><h4>My User ID</h4></td>
        <td><?php echo '<h4>'.$thisuserid.'</h4>'; ?></td>
      </tr>
      <tr>
        <td><h4>My Email Address</h4></td>
        <td><?php echo '<h4>'.$mail.'</h4>'; ?></td>
      </tr>
      <tr>
        <td><h4>My Phone Number</h4></td>
        <td><?php echo '<h4>0'.$number.'</h4>'; ?></td>
      </tr>
       <tr>
        <td></td>
        <td><a href="#handlesign"><button class="btn" id="signaction">Add signature</button></a></td>
      </tr>
      <tr>
        <td></td>
        <td><a href="#handlecpwaction"><button class="btn" id="cpwaction">Change Password</button></a></td>
      </tr>
    </tbody>
  </table>

  <div id="handlesign">
<br>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="sign" class="form-control" id="cpwfield" placeholder="Current Password" required="" />
  </div>
  <div class="form-group">
    <button class="btn" name="signbtn" id="cpwaction">Append signature</button>
  </div>
</form>
</div>



<div id="handlecpwaction">
<br>
<form action="" method="post">
  <div class="form-group">
    <input type="text" name="oldpass" class="form-control" id="cpwfield" placeholder="Current Password" required="" />
  </div>
  <div class="form-group">
    <input type="text" name="newpass" class="form-control" id="cpwfield" placeholder="New Password" required="" />
  </div>
  <div class="form-group">
    <input type="text" name="cnewpass" class="form-control" id="cpwfield" placeholder="Confirm New Password" required="" />
  </div>
  <div class="form-group">
    <button class="btn" name="cpwbtn" id="cpwaction">Change</button>
  </div>
</form>
</div>

</center>
    </div>
    <div class="col-md-3"></div>
</div>

</div>





