<?php
$from = ""; // Initialize the email from variable
// This code runs only if the username is posted
if (isset ($_POST['register'])){
$crea="";

    // Connect to database
     include_once "scripts/conn.php";
	      $regno = $_POST['username'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];

     $modded = mysql_query("SELECT Created FROM student WHERE Reg_No='$regno'");
	 while($row = mysql_fetch_array($modded)){
 $crea = $row["Created"];
if($crea=="1"){
header('location:login.php');
echo 'thanks.';
}
	 }
 

	 
   // Add MD5 Hash to the password variable
     $db_password = md5($pass); 
	 
     // GET USER IP ADDRESS
     $ipaddress = getenv('REMOTE_ADDR');
	 
	  $sql = mysql_query("UPDATE student SET Email='$email',Password='$db_password' ,Created='1' WHERE Reg_No='$regno'"); 
	  
	 // Create directory(folder) to hold each user's files(pics, MP3s, etc.)		
     mkdir("Students/$regno", 0755);	

   } // Close else after duplication checks

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <script language="javascript" type="text/javascript"> 
$(document).ready(function() {
	$("#username").blur(function() {
		$("#nameresponse").removeClass().text('Checking Student registration...').fadeIn(1000);
		$.post("scripts/checkingstudent.php",{ username:$(this).val() } ,function(data) {
		  	$("#nameresponse").fadeTo(200,0.1,function() { 
			  $(this).html(data).fadeTo(900,1);	
			});
        });
	});
});
function toggleSlideBox(x) {
		if ($('#'+x).is(":hidden")) {
			$('#'+x).slideDown(300);
		} else {
			$('#'+x).slideUp(300);
		}
}
</script>
    <div class="container">
     
<br>
      <div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img src="images/icons/png/Infinity-Loop.png" alt="Welcome to Mail App" />
            <h4>Welcome to <small>UniConnect</small></h4>
          </div>
Register Now!
          <div class="login-form">
		  			  <span id="nameresponse"></span>
	<form action="register.php" method="POST">
            <div class="form-group">
              <input type="text" name="username" class="form-control login-field" value="" placeholder="Enter your Registration No" id="username" />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>
			
			<div class="form-group">
              <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-name" />
              <label class="login-field-icon fui-mail" for="login-name"></label>
            </div>
			
		

            <div class="form-group">
              <input type="password" name="pass" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>
<input type="submit" name="register" class="btn btn-primary btn-lg btn-block" value="Register Now!">
            </form>
		  </div>
        </div>
      </div>

    </div> <!-- /container -->

    
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>
    <script src="http://vjs.zencdn.net/4.3/video.js"></script>
    <script src="js/application.js"></script>


	</body>
</html>
