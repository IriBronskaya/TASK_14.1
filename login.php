<?php
session_start();
include 'functions.php';

if ( null !== getCurrentUser() ) {
    header('Location: actions.php');
    exit;
}

if ( isset( $_POST['login'] ) ) {
    if ( isset( $_POST['password'] ) ) { 
        if ( checkPassword( $_POST['login'], $_POST['password'] ) ) { 
            $_SESSION['username'] = $_POST['login']; 
            $_SESSION['timein'] = time(); 
            $_SESSION['timeendaction'] = strtotime('23:59:59'); 
            header('Location: index.php'); 
            exit;
        }
        else{
            $error="<h2 style=\"text-align:center;\">Не узнаем вас, зарегистрируйтесь пожалуйста.</h2>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Массаж</title>
</head>
<body>
<header>
    <div class="container">
        <?php
        $time1 = $_SESSION['timein']; 
        $time2 = $_SESSION['timeendaction'];
        $now=time();
        if($now>$time2){
            if ( null !== getCurrentUser() ) {
                echo "Акция закончилась";
            }
            
        }
        else{
            $diff = $time2 - $now; 
            echo 'До конца акции осталось '.gmdate('H:i:s', $diff); 
            
        }
        ?>
    </div>
</header>
    <nav>
        <div class="container">
        <ul class="menu">
            <li><a href="index.php">Главная</a></li>
            <li><a href="login.php">Зарегистрироваться</a></li>
            <li><a href="actions.php">Личный кабинет</a></li>
            <li><a href="#">Услуги</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </div>
    </nav>
<main>
    <div class="container">
        <h1 class="h1">Войти в личный кабинет</h1>
        
        <?php
            if(isset($error)){
                echo $error;
            }
            else{
        ?> 
            <form class="form" action="" method="post">
                <input name="login" type="text" placeholder=" Логин"><br>
                <input name="password" type="password" placeholder=" Пароль"><br>
                <input name="submit" type="submit" value="Войти">
            </form> 
        <?php   
            }
        ?>      
    </div>
</main>
</body>
</html>