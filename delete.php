<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" >
        <title>DELETE</title>

        <!--    $userLogin is coockie user login
                $isLogged  is coockie check for logging    -->
    </head>
    <body >
    <p>
        Для одного IP адреса разрешено создать не более 15 аккаунтов, для вашего
        IP существуют следующие логины:
    </p>
    <?php
    $ip=$_SERVER['REMOTE_ADDR'];
    echo $ip."<br>";
    $link = mysqli_connect("localhost", "root", "root","university");

    $sql=$link->prepare("SELECT Login FROM users WHERE Ip=(?)");
    $sql->bind_param('s',$ip);
    $sql->execute();
    $result=$sql->get_result();

    foreach ($result as $Login) {
        echo $Login['Login']."<br>";
    }
    if ($_COOKIE['Login']){
    echo "Вы :<b>".$_COOKIE['Login']."</b>. Вы можете удалить <b>".$_COOKIE['Login']."</b><br><br>";
    echo "<a href=deleteback.php> УДАЛИТЬ ".$_COOKIE['Login']."</a>";}

    else {
    echo "Вы не можете удалять пользователей, нужно <a href='index.php'>ВОЙТИ В АККАУНТ</a>";

    }

    ?>

    <p>
        Для восстановления доступа или удаления аккаунта свяжитесь с администратором.
    </p>

    <br><a href='index.php'>НА ГЛАВНУЮ</a>
    </body>
</html>
