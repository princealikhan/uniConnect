<?php
$errorMSG="";
if (isset($_POST['submit'])) {
//Connect to the database through our include 
include_once "scripts/conn.php";
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
// Make query and then register all database data that -
// cannot be changed by member into SESSION variables.
// Data that you want member to be able to change -
// should never be set into a SESSION variable.
$sql = mysql_query("SELECT * FROM student WHERE Email='$email' AND Password='$password' AND Created='1'"); 
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
        // Get member ID into a session variable
        $id = $row["Reg_No"];  
        $username=$row['Name'];
        session_register('Name') ;
        $_SESSION['Name']=$username;
        session_register('Reg_No'); 
        $_SESSION['Reg_No'] = $id;
        // Get member username into a session variable
      $email = $row["Email"];   
        session_register('Email'); 
        $_SESSION['Email'] = $email;
        // Update last_log_date field for this member now
        // Print success message here if all went well then exit the script
        
        //First time user
$name=$row['Name'];
$dob=$row['DOB'];
       
if (($name=="" OR $name==NULL) &&($dob=="" OR $dob==NULL))
        {
        $_SESSION['abc'] = "cool";
          header("location: edit.php?id=$id"); 
          exit();
        }


    header("location: home.php?Reg_No=$id"); 
    exit();
    } // close while
} else {
// Print login failure message to the user and link them back to your login page
$errorMSG="<br>Oops, No match in our record try again";
}
}// close if post
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
     
<br>
      <div class="login" background="1.jpeg">
        <div class="login-screen">
          <div class="login-icon">
            <img src="images/icons/png/Infinity-Loop.png" alt="Welcome to Mail App" />
            <h4>Welcome to <small>UniConnect</small></h4>
          </div>
Login Here!
<?php echo $errorMSG;?>
<form action="login.php" method="POST">
          <div class="login-form">
            <div class="form-group">
              <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-name" />
              <label class="login-field-icon fui-mail" for="login-name"></label>
            </div>
       
            <div class="form-group">
              <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" href="#" value="Login In!">
                        <a class="login-link" href="register.php">Create an account now!</a>
          </div>
        </form>
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
