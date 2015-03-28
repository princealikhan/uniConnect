<?php
session_start();
session_destroy(); 
$msg="You are log out";
?> 
<html>
<body>
<?php echo "$msg"; ?><br>
<p><a href="http://localhost/facebook/">Click here</a> to return to our home page </p>
</body>
</html>