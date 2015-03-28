<?php
include 'script/conn.php';
$user_id=11111;
$friend_id=46407;
$result=mysql_query("SELECT * FROM friend WHERE (uid="$user_id" OR fid="$user_id") AND (uid="$friend_id" OR fid="$friend_id")");
$row=mysql_fetch_array($result,MYSQLI_ASSOC);
if($row['friend_one']=='$user_id' && $row['status']=='0')
{
	echo'cool';
}
else
{
}
?>