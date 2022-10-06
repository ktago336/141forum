<?php
$pass=file_get_contents('pass.cfg');
$isLogged=false;

if (isset($_COOKIE["Login"])&&isset($_COOKIE["Hash"])){
	$userLogin=$_COOKIE["Login"];
	$userHash=$_COOKIE["Hash"];

	$link = mysqli_connect("localhost", "Admin", $pass,"forum");
	$sql = "SELECT Login, Hash FROM users WHERE Login='$userLogin'";
	if ($result= $link->query($sql)){
		foreach ($result as $row){
			if ($row['Login']==$userLogin&&$row['Hash']==$userHash)
				$isLogged=true;
		}
	}


}
else $isLogged=false;


?>