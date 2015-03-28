<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>UniConnect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

<?php
session_start(); // Must start session first thing
  $sid=$_SESSION['Reg_No'];

  ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$sid/pic1.jpg";
  $default_pic = "images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = "<img src=\"$check_pic\" width=\"80px\" border=\"0\" />"; // forces picture to be 120px wide and no more
  } else {
  $user_pic = "<img src=\"$default_pic\" width=\"80px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
  }
// See if they are a logged in member by checking Session data
$toplinks = "";
if (isset($_SESSION['Reg_No'])) {
	// Put stored session variables into local php variable
    $userid = $_SESSION['Reg_No'];
  } else {
	$toplinks = '<a href="register.php">Register</a> &bull; <a href="login.php">Login</a>';
}
?>
<?php
// Use the URL 'id' variable to set who we want to query info about
$id = preg_replace("[^0-9]", "", $_GET['Reg_No']); // filter everything but numbers for security
if ($id == "") {
	echo "Missing Data to Run";
	exit();
}
//Connect to the database through our include 
include_once "scripts/conn.php";
// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM student WHERE Reg_No='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
	echo "There is no user with that id here.";
	exit();	
}
while($row = mysql_fetch_array($sql)){
    $id=$row['Reg_No'];
    $_SESSION['sid']=$id;
    $username=$row['Name'];
    $batch = $row['Batch'];
    $email = $row['Email'];
    $streetname =$row['Street'];
    $city = $row['City'];
    $statename = $row['State'];
    $country = $row['Country'];
    $contact = $row['Contact_No'];
}
 ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic2 = "Students/$id/pic1.jpg";
  $default_pic = "images/icons/png/user.png";
  if (file_exists($check_pic2)) {
    $user_pic2 = "<img class=\"timelineborder\" src=\"$check_pic2\" width=\"200px\" border=\"0\" />"; // forces picture to be 120px wide and no more
  } else {
  $user_pic2 = "<img class=\"timelineborder\" src=\"$default_pic\" width=\"200px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
  }
// See if they are a logged in member by checking Session data

?>


  </head>
  <body>

  <br>  
   <?php  include_once('Master/header.php');
?>
    <!-- /sdfds-->
<div class="row">
        <div class="col-md-4">
                    <?php echo $user_pic2;?>
          
        </div>
        <div class="col-md-4">
<h3><?php echo $username;?></h3>
<h4>Batch: <?php echo $batch;?></h4>
<h4>Email: <?php echo $email;?></h4>

        </div>
        <div class="col-md-4">
<h3><?php echo $streetname;?></h3>
<h6>City: <?php echo $city;?></h6>
<h6>State: <?php echo $statename;?></h6>   
<h6>Phone: <?php echo $contact;?></h6>     </div>
      </div>  <!-- /Closing Friend Requests Div-->
<br>
<form action="request.php" method="POST">
<input type="hidden" name="request"/>
<div class="row">
<div class="col-md-6">
<input type="submit" href="" class="btn btn-lg btn-info btn-block input-icon fui-user" value="Add Friend">
</div>

</div>
</form>
<!-- /.container -->
<br><br>

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