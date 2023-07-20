<?php
session_start();
include 'functions.php';
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
    <?php
    $time1 = $_SESSION['timein']; 
    $time2 = $_SESSION['timeendaction'];
    $now=time();
    if($now>$time2){
        if ( null !== getCurrentUser() ) {
            echo "Акция больше не действительна";
        }
    }
    else{
        $diff = $time2 - $now;
        echo 'До окончания вашей акции осталось '.gmdate('H:i:s', $diff); // к сожалению не умеет показывать разницу >=24 часа   
    }
    ?>
    <header>
        <div class="container">
                    <img src="img/icon.png" alt="" class="img">
                    <div class="btndiv">
                        <button onclick="location.href='login.php'" class="btn">Войти</button>
                        <button onclick="location.href='actions.php'" class="btn">Зарегистрироваться</button>
                    </div>
                    <h1 class="h1">Профессиональный массаж</h1>
                    <p class="p">Добро пожаловать в массажный салон! Для тех, кто предпочитает экзотичную атмосферу и уникальные методики массажа.</p>
                    <?php
                        if ( null !== getCurrentUser() ) { //Если пользователь вошёл, то редирект на главную страницу
                        echo  "<p class=\"p\">Приглашаем ".$_SESSION['username']." вас воспользоваться специальным предложением.</p>";
                        }
                        else{
                            echo "<p class=\"p\">Войдите или зарегистрируйтесь, что бы воспользоваться специальным предложением.</p>";
                        }
                    ?>
        </div>
    </header>
<main>
    <div class="container2">
        <div class="container">
            <div class="image">
                <img src="img/2.png" alt="2" class="im2">
                <h2 class="h2"><span>Акция!</span></h2>
                <p class="p2"><span>Учитывая широкий спектр<br>воздействия на тело человека,<br>Вы можете сами подобрать<br>оптимальное количество сеансов<br>и установить личный курс массажа.</span></p>
                <p class="p3"><span>Спешите!!! Aкция действует до конца лета!</span></p>
                <div class="btndiv2">
                        <button onclick="location.href='login.php'" class="btn">Зарегистрироваться</button>
                </div>      
            </div>
        </div>
        <div class="image">
            <img src="img/3.png" alt="3" class="im3">
            <h2 class="h3"><span>Услуги</span></h2>
            <p class="p4"><span>Предлагаем большой выбор<br>массажей для лица и тела,<br>а также восточные практики.</span></p>
        </div>
        <div class="container">
            <div class="image">
                <img src="img/4.png" alt="3" class="im3">
                <h2 class="h4"><span>Подарок на день рождения</span></h2>
                <p class="p5"><span>Зарегистрируйся и получи скидку!</span></p>
                <p class="p6"><span>50% в подарок</span></p>

                <div class="btndiv1">
                    <button onclick="location.href='login.php'" class="btn">Зарегистрироваться</button>
                </div>
            </div>    
        </div>
                               
</main>
    <nav>    
        <div class="container">
            <ul class="menu">
                <li><a href="login.php">Зарегистрироваться</a></li>
                <li><a href="actions.php">Личный кабинет</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
   
    <footer class="foo">
        <p> &copy; 2023 Professional massage, Inc </p>
    </footer>

</body>
</html>