<?php
$login=$_COOKIE['Login'];
$pass=file_get_contents('pass.cfg');

$link=mysqli_connect("localhost", "Admin", $pass,"forum");
$sql=$link->prepare("DELETE FROM users WHERE Login=(?)");
$sql->bind_param("s",$login);
$sql->execute();
header('Location:index.php');
exit;




?>