	 
<?php
session_start();
if(!isset($_SESSION['aid'])){
 header("location:index.php"); 
}

include "conn.php";
$errorMsg=''; 
$succmsg=''; 
$thisRandNum='';
$user_pic = "";
	if (isset($_POST['Submit'])) {

 $b_name = $_POST['b_name']; // filter everything but letters and numbers
 $b_author = $_POST['b_author']; // filter everything but letters and numbers
 $b_publisher =$_POST['b_publisher']; // filter everything but letters and numbers

    
 $errorMsg="";
     // Error handling for missing data
     if ((!$b_name)  || (!$b_author) || (!$b_publisher)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
   
     if(!$b_name){ 
       $errorMsg .= ' * Please Enter Title<br />';
     } 
     if(!$b_author){ 
       $errorMsg .= ' * Please Enter Description<br />';
     } 	
	 if(!$b_publisher){ 
       $errorMsg .= ' * Please Select Date of submittion<br />';      
     }
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     // Add user info into the database table for the main site table

} else {

// ------- PARSING PICTURE UPLOAD ---------

mysql_query("INSERT INTO assignment VALUES('0','$b_name','$b_author','$b_publisher','$b_publisher')");
$id = mysql_insert_id();
mkdir("../assignment/$id", 0755);
if ($_POST['parse_var'] == "pic"){
	
	// If a file is posted with the form
	if ($_FILES['fileField']['tmp_name'] != "") { 
            $maxfilesize = 5120000; // 51200 bytes equals 50kb
            if($_FILES['fileField']['size'] > $maxfilesize ) { 

                        $error_msg = '<font color="#FF0000">ERROR: Your file was too large, please try again.</font>';
						 unlink($_FILES['fileField']['tmp_name']); 

            } else if (!preg_match("/\.(gif|jpg|png|pdf)$/i", $_FILES['fileField']['name'] ) ) {

                        $error_msg = '<font color="#FF0000">ERROR: Your file was not one of the accepted formats, please try again.</font>';
				      unlink($_FILES['fileField']['tmp_name']); 

            } else { 
                        $newname =$id.".pdf";
                        $place_file = move_uploaded_file( $_FILES['fileField']['tmp_name'], "../assignment/$id/".$newname);
            }
    } 
}

$succmsg="Data enter successfully";
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<me0ta name="Description" content="Register to yourdomain" />
<meta name="Keywords" content="register, yourdomain" />
<meta name="rating" content="General" />
<title>book</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style26 {color: #FF0000}
.style28 {font-size: 14px}
.brightRed {
	color: #F00;
}
.textSize_9px {
	font-size: 9px;
}
body {
  background: url('../img/bg.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
  margin-top: 0px;
}
#fortemp{
  background-color:#f5f5f5;
  padding:15px;
  
  -moz-border-radius:12px;
  -khtml-border-radius: 12px;
  -webkit-border-radius: 12px;
  border-radius:12px;
}

-->
</style>

</head>



<body>

<center>  <img src="../img/logo.png">
<h3>Add Assignment</h3>
<h4><?php echo $succmsg;?></h4>
</center>

<tabl0e class="mainBodyTable" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">
      <table id="fortemp" width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="assig.php" method="post" enctype="multipart/form-data">
          <tr>
            <td align="left" colspan="2"><?php print $errorMsg; ?>			</td>
          </tr>
   
          <tr>

            <td width="114" bgcolor="#FFFFFF"><div align="left"> Title:<span class="brightRed"> </span></div></td>
            <td width="452" bgcolor="#FFFFFF"><div align="left">
              <input name="b_name" type="text" class="formFields" id="b_name" value="" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Description:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="b_author" type="text" class="formFields" id="b_author" value="" size="32" maxlength="20" />
              <span id="nameresponse2"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left">Submittion Date:<span class="brightRed"> </span></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
              <input name="b_publisher" type="date" class="formFields" id="b_publisher"  size="32" maxlength="20" />
            </div></td>
          </tr>
          <tr>
    
              <input name="b_quantity" type="hidden" class="formFields" id="b_quantity" value="" size="32" maxlength="20" />
            </div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><div align="left"><?php echo $user_pic; ?></div></td>
            <td bgcolor="#FFFFFF"><div align="left">
             PDF File Select <input name="fileField" type="file" class="formFields" id="fileField" size="42" />
             <br>
  <input name="thisWipit" type="hidden" value="<?php echo $thisRandNum; ?>" />
              <input name="parse_var" type="hidden" value="pic" />
            </div></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="Submit" id="Submit" />
        </form>
      </table>
</td>
    <td width="160" valign="top"></td>
  </tr>
</table>
         <center>     <a href="admin.php">    <img height="x" src="../img/home.png"></a></center>
</body>
</html>