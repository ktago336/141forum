<?php
$link = mysqli_connect("localhost", "root", "root","university");
$username=($_POST["Username"]);
$password=($_POST["Password"]);
$ip=$_SERVER['REMOTE_ADDR'];
$passwordhash=md5($password);
$a=strlen($password);
//IP ANTISPAM CHECK
$sql=$link->prepare("SELECT Login FROM users WHERE Ip=?");
$sql->bind_param("s", $ip);
$sql->execute();
$result=$sql->get_result();



$nofLogins=0;
foreach ($result as $a) {
        $nofLogins++;
    }




if ($nofLogins>14) {
        echo "Слишком много пользователей с IP ".$ip." - <b>".$nofLogins."</b><br>";
        echo "<br><a href='index.php'>НА ГЛАВНУЮ</a><br><br><a href=delete.php>ПОДРОБНЕЕ</a>";
}
else{

//INPUT CHECKS
if (!trim($username))
{
        echo "Логин не может быть пустым<br><a href='index.php'>НА ГЛАВНУЮ</a><br><a href='register.php'>ЕЩЕ РАЗ</a>"; 
}
else if (strlen($username)>20||strlen(trim($username))<3 ){
        echo "invalid username (must be between 3 and 20 characters)";
        echo "<br><a href='index.php'>НА ГЛАВНУЮ</a><br><a href='register.php'>ЕЩЕ РАЗ</a>";
}
else if (!preg_match("/^[а-яА-ЯёЁa-zA-Z0-9\-_]+$/", $username))
{
        echo "Разрешено использовать только буквы и цифры<br><a href='index.php'>НА ГЛАВНУЮ</a><br><a href='register.php'>ЕЩЕ РАЗ</a>";
}
else if(!trim($password)){
        echo "invalid password";
        echo "<br><a href='index.php'>НА ГЛАВНУЮ</a><br><a href='register.php'>ЕЩЕ РАЗ</a>";

}
else if (strlen(trim($password))<6){
        echo "too short password ";
        echo "<br><a href='index.php'>НА ГЛАВНУЮ</a><br><a href='register.php'>ЕЩЕ РАЗ</a>";
}
else
//INSERTING NEW USER
{

$sql = "INSERT INTO users (Login, Password, Ip) VALUES ('$username', '$passwordhash', '$ip')";
$result = mysqli_query($link, $sql);
print_r($result);
if ($result == false) {
         echo("Произошла ошибка при выполнении запроса, вероятно имя <b>".$username."</b> уже занято<br><a href='index.php'>НА ГЛАВНУЮ</a>  <br><a href='register.php'>ЕЩЕ РАЗ</a>");

        }
else {header("Location: index.php");
exit();}
}
}