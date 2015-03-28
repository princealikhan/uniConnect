<?php 
include "adminconfig.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <script type="text/javascript" src="js/mootools-1.2.1-core-yc.js"></script>
  <script type="text/javascript" src="js/process.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
<title>Log In</title>

<style type="text/css">
<!--
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
</style></head>
<body>
<p>&nbsp;</p>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <img height="" width="" src="../img/logo.png">
<table id="fortemp" width="400" align="center" cellpadding="6" style="background-color:#FFF; border:#666 1px solid;">
  <form action="index.php" method="post" enctype="multipart/form-data" name="signinform" id="signinform">
    <tr>
    </tr>
    <tr>
      <td width="21%"><strong>admin:</strong></td>
      <td width="51%"><input name="adminname" type="text" id="" style="width:60%;" /></td>
    </tr>
    <tr>
      <td><strong>Password:</strong></td>
      <td><input name="pass" type="password" id="pass" maxlength="24" style="width:60%;"/></td>
    </tr>
   <td>
   <input id="myButton" type="submit" name="myButton" value="Login">
   <input type="hidden" name="admin">
   
    <tr>
        <br /></td>
    </tr>
    <tr>
      <td colspan="2">

    </tr>
  </form>
</table>
</fieldset>
</center><p><br />
  <br />
</p>
</body>
</html>