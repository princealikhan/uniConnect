<?php
session_start();
  $sid=$_SESSION['Reg_No'];
  $fid=$_SESSION['sid'];
if (isset($_POST['request'])) {
include 'scripts/conn.php';
		$sql = mysql_query("INSERT INTO friend (id, uid, fid, accept) VALUE('0','$sid','$fid','0')") or die(mysql_errno());

$sql = mysql_query("INSERT INTO friend ");
}?>
<br><br>
<br>
<center>

<h3>
Your friend request send successfully to <?php echo $fid;?>
</h3>
<a href="profile.php">Home</a>
</center>