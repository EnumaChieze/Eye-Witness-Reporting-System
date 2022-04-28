

<?php
$queryuser = " SELECT * FROM `members` WHERE `userid` = '$userid'";
$runuser = mysqli_query($connect,$queryuser);
while ( $data = mysqli_fetch_array($runuser)) {
  $currentusername = $data['fname'];
  $signature = $data['userid'];
}
?>

<?php
              if (isset($_POST['sendbtn'])) {
                if(isset($_POST['Addressedto']) && isset($_POST['campus']) && isset($_POST['districtname']) && isset($_POST['compdetails'])){
                  $recipient = ($_POST['Addressedto']);
                  $campus = ($_POST['campus']);
                  $district = ($_POST['districtname']);
                  $complaint_details = ($_POST['compdetails']);
                  $msgdate = (date('d M Y - H:i'));
                  $senderid = ($userid);
                 
                   @$uplimagetmpname = $_FILES['attach']['tmp_name'];
                  @$uplimagenamern = $_FILES['attach']['name'];
                  
                  if(!empty($uplimagetmpname) && !empty($uplimagenamern)){
                     $fileloc = 'file-assets/fileuploads/';
                    @$randnum = rand(0, 10000000);
                    @$uplimagename = $randnum.$uplimagenamern;
                    $attachext = strtolower(substr($uplimagename,strpos($uplimagename,'.') +1 ));
                      if (($attachext == 'jpg' || $attachext == 'jpeg' || $attachext == 'png' || $attachext == 'gif' || $attachext == 'mkv' || $attachext == 'mp4' || $attachext == '3gp' )) {
                        move_uploaded_file($uplimagetmpname, $fileloc.$uplimagename);
                      }else{
                       echo  '<div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-danger alert-dismissible">
                                          Please select an image file.
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';
                      }
                  } 
                  if (!empty($signature) || $signature != '0' || $signature == '0' || $signature == ' '  ) {
                    @$msgquery = "INSERT INTO `messages` VALUES('','$recipient','$campus','$district','$complaint_details','$msgdate','$nature_of_comp', '$uplimagename', '$currentusername','0','$signature','0')";
                          if(mysqli_query($connect,$msgquery)){
                            echo  '<div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-success alert-dismissible">
                                          Report Sent. Thank You..
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';
                          }else{
                            echo  '<div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-danger alert-dismissible">
                                          Message sending failed.. Kindly retry.
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-spinner"></span></button>
                                      </div>
                                </div>
                                </div>';
                          }
                  }else{
                    echo  '<div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-danger alert-dismissible">
                                          Please Kindly go to your profile and append your signature.                                          
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';
                  }
       
                }
              }
            ?>
             <form method="post" enctype="multipart/form-data" action="">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <label for="Addressedto">To be addressed to:</label>
                  
              
                    <select class="form-control" id="Addressedto" placeholder="Address to" name="Addressedto" required="">
                      <option></option>
                    <?php
                    $query = " SELECT * FROM `recipient`";
                      $run = mysqli_query($connect,$query);
                      while ( $data = mysqli_fetch_array($run)) {
                        $name = $data['Recipients'];
                        $recid = $data['id'];
                         echo '<option value="'.$recid.'">'.$name.'</option>';
                          }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label for="campus">State:</label>
                    <select class="form-control" id="rpfield" placeholder="Select state" name="districtname" required="">
                    <option>Abia</option>
                    <option>Abuja</option>
                    <option>Adamawa</option>
                    <option>Akwa-ibom</option>
                    <option>Anambra</option>
                    <option>Delta</option>
                    <option>Edo</option>
                    <option>Enugu</option>
                    <option>Lagos</option>
                    <option>Oyo</option>
                    <option>Plateau</option>
                    <option>Rivers</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                  <label for="campus">Location:</label>
                    <input type="text" type="email" class="form-control" id="campus" placeholder="Type Exact Location where crime was witnessed" name="campus" required="">
                  
                  </div>
                </div>
            </div>

                <div class="col-md-8">
                  <div class="form-group">
                  <label for="nop">Caption:</label>
                    <textarea type="text" class="form-control" id="nop" placeholder="Type crime witnessed caption" rows="8" name="compdetails" required=""></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4"></div>

                <div class="col-md-8"></div>
              </div>

              <div class="row" id="btnareaprnt">
                <div class="col-md-8"></div>
                <div class="col-md-8">
                  <div class="form-group">
                  <label for="nop">Upload File to support your complaint:</label>
                    <input rows="3" type="file" name="attach" placeholder="Attach image" class="form-control" required="">
                  </div>
                </div>
              </div>

                <div class="col-md-2" id="btnarea">
                  <button class="btn btn-block pull-right" id="resetbtn" type="reset">Clear</button>
                </div>
                <div class="col-md-2" id="btnarea">
                  <button class="btn btn-block pull-right" id="subbtn" type="submit" name="sendbtn">Send</button>
                </div>
              </div>
            </form>

        </div>