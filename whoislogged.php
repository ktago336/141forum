<?php
$link = mysqli_connect("localhost", "root", "root","university");
$sql=$link->prepare("SELECT * FROM users WHERE Hash IS NOT NULL");
    $sql->execute();
    $result=$sql->get_result();
echo "НА САЙТЕ:<br>";
    foreach ($result as $Login) {
        echo $Login['Login']."<br>";
    }

	echo "<br><a href='index.php'>
	НА ГЛАВНУЮ</a>"

?>