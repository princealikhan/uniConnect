<?php
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_start();
$admin="";
$password="";
if (isset($_POST['admin'])) {
//Connect to the database through our include 
include_once "conn.php";
	$admin = $_POST['adminname'];
	$pass = $_POST['pass'];
	$admin = stripslashes($_POST['adminname']);
$admin = strip_tags($admin);
$admin = mysql_real_escape_string($admin);
$pass = preg_replace("[^A-Za-z0-9]", "", $_POST['pass']); // filter everything but numbers and letters


$sql = mysql_query("SELECT * FROM admin WHERE admin='$admin' AND password='$pass'"); 
$login_check = mysql_num_rows($sql);
echo $login_check;
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
        // Get member ID into a session variable
        $aid = $row["aid"];   
        session_register('aid'); 
        $_SESSION['aid'] = $aid;

    			header("location:admin.php"); 
 
    } // close while
} else {
// Print login failure message to the user and link them back to your login page
  print '<br /><br /><font color="#FF0000">No match in our records, try again </font><br />
<br /><a href="index.php">Click here</a> to go back to the login page.';

}
}// close if post

?>