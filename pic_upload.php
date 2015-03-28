<?php
@session_start();
// Here we run a login check
if (!isset($_SESSION['Reg_No'])) { 
   echo 'Please <a href="login.php">log in</a> to access your account';
  exit(); 
} 
// Place Session variable 'id' into local variable
$id = $_SESSION['Reg_No'];
// Process the form if it is submitted
if(isset($_FILES['uploadedfile'])){
if ($_FILES['uploadedfile']['tmp_name'] != "") {
    // Run error handling on the file
    // Set Max file size limit to somewhere around 120kb
    $maxfilesize = 1200000;
    // Check file size, if too large exit and tell them why
    if($_FILES['uploadedfile']['size'] > $maxfilesize ) { 
        echo "<br /><br />Your image was too large. Must be 100kb or less, please<br /><br />
        <a href=\"edit_pic.php\">click here</a> to try again";
        unlink($_FILES['uploadedfile']['tmp_name']); 
        exit();
    // Check file extension to see if it is .jpg or .gif, if not exit and tell them why
    } else if (!preg_match("/\.(gif|jpg|png)$/i", $_FILES['uploadedfile']['name'] ) ) {
        echo "<br /><br />Your image was not .gif or .jpg and it must be one of those two formats, please<br />
        <a href=\"edit_pic.php\">click here</a> to try again";
        unlink($_FILES['uploadedfile']['tmp_name']);
        exit();
        // If no errors on the file process it and upload to server 
    } else { 
        // Rename the pic
        $newname = "pic1.jpg";
        // Set the direntory for where to upload it, use the member id to hit their folder
        // Upload the file
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "Students/$id/".$newname)) {
    header("location: edit.php?id=$id"); 
        } else {
            echo "There was an error uploading the file, please try again. If it continually fails, contact us by email. <br /><br />
            <a href=\"member_account.php\">Click here</a> to return to your profile edit area";
            exit();
        }
    } }// close else after file error checks
} // close if post the form
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Your Account Info</title>
<center>
     <div align="center">
<h3>       Upload or replace your profile image here <br />  
       </h3>
    
     </div>
      <form action="pic_upload.php" method="post" enctype="multipart/form-data" name="form" id="form" onsubmit="return validate_form ( );">
         <tr>
           <td colspan="2"><img src="Students/<?php echo "$id"; ?>/pic1.jpg" alt="Ad" width="150" /></td>
         </tr>
		 <tr>
           <td colspan="2"><br><input name="uploadedfile"class="btn btn-embossed btn-info" type="file" /></td>
         </tr>
         <tr>
           <td colspan="2"><div align="center">
            <br>
             <input class="btn btn-embossed btn-success" type="submit" name="Submit" value="Upload Image" />
           </div></td>
         </tr>
       </form>
<br>
</center>