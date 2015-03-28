<?php
/* Web Intersect Social Network Template System and CMS v1.34
 * Copyright (c) 2011 Adam Khoury
 * Licensed under the GNU General Public License version 3.0 (GPLv3)
 * http://www.webintersect.com/license.php
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Date: February 9, 2010
 *------------------------------------------------------------------------------------------------*/
// Force script errors and warnings to show on page in case php.ini file is set to not display them
error_reporting(E_ALL);
ini_set('display_errors', '1');
//-----------------------------------------------------------------------------------------------------------------------------------
include_once "conn.php"; // <<---- Connect to database here
$username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['username']); // filter
$sql_uname_check = mysql_query("SELECT Reg_No FROM student WHERE Reg_No='$username' LIMIT 1"); 
$uname_check = mysql_num_rows($sql_uname_check);

if (strlen($username) < 5) {
		echo '<p class="palette-paragraph">Your Registration Number must be five digit.</p>';

	exit();
}


if ($uname_check < 1) {
	echo '<p class="palette-paragraph">Sorry, but you are not part of our institution,  <strong> '. $username . '.</strong></p>';
	exit();
} else {
	echo '<p class="palette-paragraph">Hurray, you are part of our institution, now you can create account</p>';
	exit();
}
?>