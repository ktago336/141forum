<?php
$username=$_POST['Username'];
$pass=md5($_POST['Password']);
$pass=file_get_contents('pass.cfg');

$link = mysqli_connect("localhost", "Admin", $pass,"forum");
$sqlCheck = "SELECT * FROM users";

if ($result= $link->query($sqlCheck)){
	foreach ($result as $userCheck) 
	{

 		if ($userCheck['Login']==$username){
 			$nameExist=true;break;
 			}
 		}
 	}
if ($nameExist){
$sql = "SELECT Login, Password FROM users WHERE Login='$username'";
	if ($result= $link->query($sql)){
		foreach ($result as $row) 
		{
			if($pass==$row['Password'])
			{
				$isLogged=true;
				$hash=md5(rand());
				$sql="UPDATE users SET Hash='$hash' WHERE Login='$username'";
				$result = mysqli_query($link, $sql);

				setcookie('Login', $username);
				setcookie('Hash', $hash);
				#echo $_COOKIE["prev_addr"];
				#="Location:".$_COOKIE["prev_addr"];
				#echo $url;
				header("Location: index111.php");
 				exit;

			}

			else echo "Неверный пароль <br><a href='index111.php'>НА ГЛАВНУЮ</a><br";
 		
 		}
 	}
 }
else echo "Cannot find user <br><a href='index.php'>НА ГЛАВНУЮ</a><br>";

