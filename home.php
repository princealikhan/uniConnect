
<?php
session_start();
if(!isset($_SESSION['Reg_No'])){
 header("location:index.php"); 
}

if(isset($_GET['Reg_No']))
{
include "scripts/conn.php";
$aid = preg_replace('#[^0-9]#i', '', $_GET['Reg_No']);
$sql=mysql_query("SELECT * FROM student WHERE Reg_No=$aid LIMIT 1");

$USER=mysql_num_rows($sql);
if($USER>0){
while($row=mysql_fetch_array($sql)){
  $reg=$row['Reg_No'];
    $username=$row['Name'];
    $batch = $row['Batch'];
    $streetname =$row['Street'];
    $city = $row['City'];
    $statename = $row['State'];
    $country = $row['Country'];
    $contact = $row['Contact_No'];
///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$aid/pic1.jpg";
  $default_pic ="images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = '<img height="80px" width="80px"  src="'.$check_pic.'">';
  } else {
    $user_pic = '<img class="" height="80px" width="80px"  src="'.$default_pic.'">';
      }
  //////  Mechanism to Display Location Info or not  //////////////////////////
  if ($country == "" && $statename == "" && $city == "" && $streetname=="") {
    $locationInfo = "";
  } else {
  $locationInfo = "$city &middot; $statename<br />$country ".''; 
  }

}
}
else{
echo "Article is not present";
exit();
}
}
else{
echo "Data Render is Missing";
exit();
}
mysql_close();
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

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <!-- BEGIN TimelineJS -->
        <link rel="stylesheet" type="text/css" href="http://cdn.knightlab.com/libs/timeline/latest/css/timeline.css">

        <script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>
        <script>
            $(document).ready(function() {
                createStoryJS({
                    type:       'timeline',
                    width:      '100%',
                    height:     '600',
                    source:     'https://docs.google.com/spreadsheet/pub?key=0AsAkV_lJnmq4dDdXLTRYcTZqQXU4MG5EUlFIRHJ4eEE&output=html',
                    embed_id:   'my-timeline'
                });
            });
        </script>
  </head>
  <body>
    <br>  
<?php  include_once('Master/header.php');
?>
	<!-- /sdfds-->
	<div class="row">
		<!-- /Opening Friend Requests Div-->
	<div class="col-xs-10">
	<h4>Welcome back <?php echo $username;?></h4>
	<div class="row">

       
<?php
$db_host="localhost";
$db_username="root";
$db_pass="";
$db_name="uniconnect";
mysql_connect("$db_host","$db_username","$db_pass")or die(mysql_error());
mysql_select_db("$db_name") or die("no database by that name");
$sql=mysql_query("SELECT * FROM assignment ORDER BY doc DESC LIMIT 4"); 

while($row=mysql_fetch_array($sql)){
  $aid=$row['aid'];
$title=$row['title'];
$desc=$row['desc'];
$doc=$row['doc'];
$doc = strftime("%d %b, %Y", strtotime($doc));

echo ' <div class="col-xs-3">';
              echo '<div class="tile">';
             echo'  <h6>Assignment</h6>';
          echo '  <p><strong>'.$title.'</strong> on '.$doc.'</p>  ' 
          ;
          echo '<p>'.$desc.'</p>';
echo'<a href="assignment/'.$aid.'/'.$aid.'.pdf">Download</a>'; 
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


  <div class="row">
  <div class="col-xs-12">
      <h4>HIET Academic Timeline</h4>
      <div class="timelineborder">
        <div id="my-timeline"></div>
</div>
  </div>
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