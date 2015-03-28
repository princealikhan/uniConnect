<?php
session_start();
// Connect to database
  $sid=$_SESSION['Reg_No'];

  ///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $check_pic = "Students/$sid/pic1.jpg";
  $default_pic = "images/icons/png/user.png";
  if (file_exists($check_pic)) {
    $user_pic = "<img src=\"$check_pic\" width=\"80px\" border=\"0\" />"; // forces picture to be 120px wide and no more
  } else {
  $user_pic = "<img src=\"$default_pic\" width=\"80px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
  }
include_once "scripts/conn.php";
// DEAFAULT QUERY STRING
if(!(isset($_POST['listByq']))){
$queryString =  "ORDER BY id DESC";
// DEFAULT MESSAGE ON TOP OF RESULT DISPLAY
$queryMsg = "Showing Senior to Newest members by Default";
}else{
// SET UP FOR SEARCH CRITERIA QUERY SWITCH MECHANISMS
if (($_POST['listByq'] == "newest_members")) {
  
    $queryString = "ORDER BY id DESC";
  $queryMsg = "Showing Newest to Oldest Members";
  
}  else if ($_POST['listByq'] == "by_firstname") {
  
  
    $fname = $_POST['fname'];
    $fname = stripslashes($fname); 
    $fname = strip_tags($fname);
    $fname = preg_replace("''", "", $fname);
    $fname = mysql_real_escape_string($fname);
    $queryString = "WHERE Name LIKE '%$fname%'";
    $queryMsg = "Showing Students with the name you searched for";
   
}  
}
// END SET UP FOR SEARCH CRITERIA QUERY SWITCH MECHANISMS
//  QUERY THE MEMBER DATA USING THE $queryString variable's value
$sql = mysql_query("SELECT * FROM student $queryString"); 
$search_test = mysql_num_rows($sql);
if($search_test == 0){
$outputList="Sorry, There's no people with respestive name.";
} else{




// Build the Output Section Here
$outputList = '';
while($row = mysql_fetch_array($sql)){ 

  $id = $row["Reg_No"];
  $username = $row["Name"];
  $email = $row["Email"];
  $batch = $row["Batch"];
  $city = $row["City"];


  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
///////  Mechanism to Display Pic. See if they have uploaded a pic or not  //////////////////////////
  $scheck_pic = "Students/$id/pic1.jpg";
  $default_pic = "images/icons/png/user.png";
  if (file_exists($scheck_pic)) {
    $suser_pic = "<img src=\"$scheck_pic\" width=\"120px\" border=\"0\" />"; // forces picture to be 120px wide and no more
  } else {
  $suser_pic = "<img src=\"$default_pic\" width=\"120px\"  border=\"0\" />"; // forces default picture to be 120px wide and no more
  }
  
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  $outputList .= '
  <table width="100%">
                  <tr>
                    <td width="23%" rowspan="3"><div style=" height:120px; overflow:hidden;"><a href="profile.php?Reg_No=' . $id . '" target="_blank">' . $suser_pic . '</a></div></td>
                    <td width="14%" class="style7"><div align="right">Name: </div></td>
                    <td width="63%"><a href="profile.php?Reg_No=' . $id . ' ">' . $username . '</a> </td>
                  </tr>

                  <tr>
                    <td class="style7"><div align="right">Batch:</div></td>
                    <td>' . $batch . ' </td>
                  </tr>
                

                  <tr>
                    <td class="style7"><div align="right">City:</div></td>
                    <td>' . $city . ' </td>
                  </tr>

                  </table>
          <hr />
';
  
  
} // close while //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////// END QUERY THE MEMBER DATA & Build the Output Section ////////////////////////////
}//close if
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
   <div class="row">
        <div class="col-md-12">
          <table width="100%" align="center">
  <tr>
    <td width="758" valign="top"><br />
      

      <table width="70%" align="center" cellpadding="6">
        <tr>
          <td><?php print "$queryMsg"; ?><br /><br />
<?php print "$outputList"; ?></td>
        </tr>
      </table>
    <br />
    <br /></td>
    </tr>
</table>
        </div>
    </div>

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