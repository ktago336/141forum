<?php
$login=$_COOKIE['Login'];

$link=mysqli_connect("localhost", "root", "root","university");
$sql=$link->prepare("DELETE FROM users WHERE Login=(?)");
$sql->bind_param("s",$login);
$sql->execute();
header('Location:index.php');
exit;




?>