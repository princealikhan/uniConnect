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

?>
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
  </head>
  <body>
    <br>  
<?php  include_once('Master/header.php');
?>
	<!-- /sdfds-->
	<div class="row">
		<!-- /Opening Friend Requests Div-->
	<div class="col-xs-10">
	<div class="row">

       
<?php


$sid=$_SESSION['Reg_No'];
$db_host="localhost";
$db_username="root";
$db_pass="";
$db_name="uniconnect";
mysql_connect("$db_host","$db_username","$db_pass")or die(mysql_error());
mysql_select_db("$db_name") or die("no database by that name");
$sql=mysql_query("SELECT * FROM friend WHERE uid=$sid"); 

while($row=mysql_fetch_array($sql)){
$fid=$row['fid'];
echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>'.$fid.'</h6>';
          echo '  <p><strong>Wants to be Your Friend</strong></p>';
          echo'<a href="profile.php?Reg_No='.$fid.'">View</a>'; 
                       echo'</div> </div>';


}
mysql_close();

?>




        
		</div>
	</div>
	<!-- /Closing Friend Requests Div-->
	<div class="col-xs-2">
    <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
           <?php
          
            include('scripts/conn.php');
$sql=mysql_query("SELECT * FROM notification  ORDER BY date DESC LIMIT 10 ");
while($row = mysql_fetch_array($sql)){
     echo'       <p class="palette-paragraph">';

$title=$row["title"];
$date=$row["date"];
$desc=$row["desc"];
$date = strftime("%d %b,", strtotime($date));

echo '<strong>'.$title.'</strong><br> Written on '.$date.'';
echo $desc;
echo '</p>';
}?> 
     			</marquee>
	</div>



	</div>
  <br>
	<!-- /sdfds-->
    <!-- /.container -->


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
  </body>
</html>