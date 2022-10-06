<?php 
setcookie ("Login", null, -1);
setcookie ("Hash", null, -1);
header("Location:index.php");
exit;
?>