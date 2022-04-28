
<?php

$retrievesql= "SELECT * FROM `members` WHERE `id`='$userid'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  if($data = mysqli_fetch_array($retrieverunsql)){
        $by = $data['id'];
  }
}
              if (isset($_POST['sndbtn'])) {
                if(isset($_POST['Addressedto']) && isset($_POST['mycomplaint'])){
                  $rep = $_POST['Addressedto'];
                  $mycomplaint = $_POST['mycomplaint'];
                  $moneyReceived=
                  $msgdate = date('d M Y - H:i');
                  $senderid = $userid;
                  

                  //handle uploaded image
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
                  @$msgquery = "INSERT INTO `reports` VALUES('','$rep','$senderid','$uplimagename','$mycomplaint','$msgdate','0')";
                          if(mysqli_query($connect,$msgquery)){
                            echo  '<div class="row">
                                <div class="col-md-12">
                                      <div class="alert alert-success alert-dismissible">
                                          Message sent! We\'ll be in touch..
                                          <button class="btn btn-sm pull-right" class="close" data-dismiss="alert"><span class="fa fa-check"></span></button>
                                      </div>
                                </div>
                                </div>';

///////////////// collect rep
$retrievesql= "SELECT * FROM `district` WHERE `id`='$rep'";
if($retrieverunsql = mysqli_query($connect,$retrievesql)){
  if($data = mysqli_fetch_array($retrieverunsql)){
        $to = $data['districts'];
  }
}
///////////////////////
                                $event = 'Made complaint to Rep of '.$to ;
                                $time = date('D M Y - H:i');
                                $sql = "INSERT INTO `log` VALUES('','$by','$event','$time')";
                                $run = mysqli_query($connect, $sql);
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
                }
              }
            ?>
<!--=========================================================end processor======================================================-->
        <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="textarea" name="InitaiteValueforPersonalFactor">{
                    
                  }
                  <label for="Addressedto">Send to Representative Of:</label>
                    <select class="form-control" id="Addressedto" placeholder="Address to" name="Addressedto" required="">
                      <option></option>
                    <?php
                    $query = " SELECT * FROM `district`";
                      $run = mysqli_query($connect,$query);
                      while ( $data = mysqli_fetch_array($run)) {
                        $name = $data['districts'];
                        $id= $data['id'];
                         echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="textfield">Make complaint:</label>
                    <textarea rows="10" placeholder="My complaint" class="form-control" name="mycomplaint" required=""></textarea>
                  </div>

                  <div class="form-group">
                  <label for="textfield">Attachment:</label>
                    <input rows="10" type="file" name="attach" placeholder="Attach image" class="form-control">
                  </div>

                  <button type="submit" name="sndbtn" class="btn pull-right btn-block" id="sndbtn">Send</button>
                  <br><br>