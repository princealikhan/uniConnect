
<?php

if(isset($_GET['Reg_No']))
{
include_once "scripts/conn.php";
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
		$user_pic = "<img height="80px" width="80px"  src=\"$check_pic\">";
	} else {
	$user_pic = "<img height="80px" width="80px"  src=\"$default_pic\">";
			}
	//////  Mechanism to Display Location Info or not  //////////////////////////
	if ($country == "" && $statename == "" && $city == "" && $streetname=="") {
    $locationInfo = "";
	} else {
	$locationInfo = "$city &middot; $state<br />$country ".''; 
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
