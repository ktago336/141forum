<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" >
    <title>FORUM</title>
    <style>
        p {
            margin-top: 0.5em;
            margin-bottom: 1em;
        }
        p.dline {
            line-height: 1.5;
        }
        P {
            line-height: 0.9em;
        }
        .col {
            word-wrap: break-word; /* Перенос слов */
        }
    </style>
    <!--    $userLogin is cookie user login
            $isLogged  is cookie check for logging
            $nofLogs number of logins in logcounter.php    -->
</head>
<body bgcolor="#062633">
<!---<div background="back.php">-->


<?php require 'coockiecheck.php' ?>
<h1 align='center'><u><font face='Impact' ><a href='index.php' style="color:#FAF2E4;">
                141301ФОРУМ<br>
        </font></a></u></h1>

<?php
if($isLogged==false){

    echo "
            <p align='right' style='color:#FAF2E4;'><a href='register.php' style='color:#FAF2E4;'>Регистрация</a> или:</p>";

    require "login.php";
}
else {
    echo "<h4 align='right' style='color:#FAF2E4;'>Вы зашли как <b>".$userLogin."</b>";
    echo "<br><a href='deauth.php' style='color:#FAF2E4;'>ВЫЙТИ</a>";
    echo "<br><br><a href='delete.php' style='color:#FAF2E4;'>УДАЛИТЬ АККАУНТ</a></h4>";
}
?>





<br>
<?php if ($isLogged==true){
    echo "

        <form action='action.php' method='post'>
        <p style='color:#FAF2E4;'>Введите сообщение:</p>
        <input style='height:50px;font-size:8pt;' type='text' name='Msg' size='50'/>
        <input type='submit' />
        </form>";}
else echo"
        
        <form action='action.php' method='post'>
        <p>
        Вы не залогинены.
</p>>
        "?>


<hr size="10" color='#2F3E44'></font></p>
<?php require 'forum.php'?>
<br><br><br><h6><?php echo "Time:"; echo(date("Y/m/d  H:i:s"));?></h6>
</body>
</html>

