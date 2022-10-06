<?php
require "coockiecheck.php";

$pass=file_get_contents('pass.cfg');

$link = mysqli_connect("localhost", "Admin", $pass,"forum");
$date=date('Y/m/d  H:i:s');
if(($_COOKIE['Login'])) $name1=$_COOKIE['Login'];
if($_POST['Username']) $name1=$_POST['Username']."(Не залогинен)";
$msg2=trim($_POST["Msg"]);
//non logged user nick acessability check
$sql=$link->prepare("SELECT Login FROM users WHERE Login=?");
$sql->bind_param("s", $ip);
$sql->execute();
$result=$sql->get_result();



if (!$name1||!$msg2)
{
        echo "WRONG INPUT";
        echo "<br><a href='index.php'>НА ГЛАВНУЮ</a>";
}

else if($result&&!$isLogged){
        echo "К сожалению имя занято, войдите в аккаунт или выберите другое <br><a href='index.php'>НА ГЛАВНУЮ</a>";

}

else
{
$sql = "INSERT INTO students VALUES ('$name1', '$date', '$msg2')";
$result = mysqli_query($link, $sql);
if ($result == false) {
         echo"Произошла ошибка при выполнении запроса";
        }

header("Location: index.php");
exit();
}
?>