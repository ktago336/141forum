<?php
require "coockiecheck.php";

$pass=file_get_contents('pass.cfg');

$link = mysqli_connect("localhost", "Admin", $pass,"forum");
$date=date('Y/m/d  H:i:s');
$name1=$_COOKIE['Login'];
$msg2=trim($_POST["Msg"]);
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
$sql ="INSERT INTO Forum(Name, Time, Msg) VALUES ('$name1', '$date', '$msg2')";
$link->query($sql);
if ($link == false) {
         echo"Произошла ошибка при выполнении запроса";
        }

header("Location: index.php");
exit();
}
?>