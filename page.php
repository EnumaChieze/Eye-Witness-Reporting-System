<?php
 ob_start();
session_start();
require('admintools/dbconn.php');
?> 
<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>Complaint MS</title>
  <!--=========================================================online cdn=============================================================-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--=========================================================online cdn end=============================================================-->
    <!--=========================================================local cdn=============================================================-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--local btstrp css link-->
    <link rel="stylesheet" href="file-assets/bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <!--local btstrp theme link-->
    <link rel="stylesheet" href="file-assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" />
    <!--local font awesome link-->
    <link rel="stylesheet" href="file-assets/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <!--Custom page stylesheet-->
    <link rel="stylesheet" href=""/>    
  <!--=========================================================local cdn end=============================================================-->
  <style type="text/css">
  body{
    font-family: palatino;
  }
    #bodyone{
      margin-top: 70px;
    }
    #bodyone, #bodythree{
      background-color: #f3f3f3;
    }
    #anicon{
      font-size: 70px;
      color:#ff0000;
    }
    #lgbtn{
      color: #fff;
      background-color: #ff0000;
    }
    #lgfield{
      border-right: 1px solid #fff;
      border-left: 1px solid #fff;
      border-top: 2px solid #fff;
      border-bottom: 2px solid #555;
      border-radius: 0px;
    }
    #errororsucc{
      text-align: center;
      color: red;
      font-style: italic;
    }
  </style>
</head>

<body>


<div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  Sign In</h4>
        </div>
        <div class="modal-body">

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
<!--=========================================================lgin=============================================================-->

<!--=========================================================lgin=============================================================-->


<?php
if (isset($_POST['loginbtn'])) {
    if (isset($_POST['logid']) && isset($_POST['logpwd'])) {
      $getid = ($_POST['logid']);
      $getpass =($_POST['logpwd']);

      if(!empty($getid) && !empty($getpass)){
            $query= "SELECT * FROM `users` WHERE `User_id` ='$getid'";
            if($queryrun = mysqli_query($connect,$query)){
                $queryrow = mysqli_num_rows($queryrun);
                if($queryrow == 0){
                    echo  '<span id="errororsucc"><center>Incorrect login details</center></span>';
                }else if($queryrow == 1 ){
                  if($getdata = mysqli_fetch_assoc($queryrun)){
                    $password = $getdata['password'];
                    if(password_verify($getpass,$password)){
                      $userid = $getdata['User_id'];
                      $_SESSION['currentuser'] = $userid;
                      $by= $userid;
                      $event = 'logged in';
                      $time = date('D M Y - H:i');
                      $sql = "INSERT INTO `log` VALUES('','$by','$event','$time')";
                      $run = mysqli_query($connect, $sql);
                      header('location: reportproblem.php');
                    }
                  }
                }
            }else{
            }   
            }
  }
}

?>



     <form action="" method="post">
    <div class="form-group" method="post">
      <label for="email">Dean ID:</label>
      <input type="text" class="form-control" id="lgfield" placeholder="Enter Staff ID " name="logid">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="lgfield" placeholder="Enter password" name="logpwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" id="lgbtn" class="btn btn-block" name="loginbtn">Log In</button>
  </form>

  </div>
  <div class="col-md-1"></div>
</div>


        </div>
    
      </div>
    </div>
  </div>
</div>
<!--=========================================================lgin form end=============================================================-->

<!--=========================================================body =============================================================-->
<div class="container" id="bodyone">
<br>
  
<div class="container" id="bodythree">
<center>
<br>
  Complaint management system &copy; 2018. 
  <br><br>
</center>
  
</div>
<!--=========================================================body form end=============================================================-->




</body>
 <script type="text/javascript" src="file-assets/javascript/jquery.js">
    </script>  
</html>