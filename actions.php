<?php
    session_start();
    include 'functions.php';

    if ( isset( $_POST['dateofBirt'] ) ) {
                $array1=getUser($_SESSION['username']);
                $array1['dateb']=date('d-m-Y',strtotime($_POST['dateofBirt']));
                $_SESSION['dateb'] =$array1;
            }
    destroySession();
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
    <?php
        $time1 = $_SESSION['timein']; 
        $time2 = $_SESSION['timeendaction'];
        $now=time();
        if($now>$time2){
            if ( null !== getCurrentUser() ) {
                echo "<p class=\"p\">Ваша акция к сожалению закончилась</p>";
            }
        }
            else{
                $diff = $time2 - $now; 
                echo "<p class=\"p\">До конца акции осталось ".gmdate('H:i:s', $diff)."</p>";
                
        }
    ?>

        <div class="container">
            <h1 class="h1">Личный кабинет</h1>
                <div class="container">
                    <div>
                        <?php
                            if (null !== getCurrentUser()){
                        ?>
                            <p class="p"> <?php echo $_SESSION['username'];?>, воспользуйтесь вашим специаальным предложением.</p>
                            <p class="p">Персональная скидка действует до 00:00  с момента входа на сайт.</p>
                        <?php
                            }else{
                        ?>
                            <p class="p">Зарегистрируйся и получите специальные предложения.</p>
                            <p class="p">Скидка действует до 00:00</p>

                        <?php
                            }
                            if (null !== getCurrentUser()){
                        ?>

                            <center>
                            <form action="" method="post">  
                                <input type="text" name="logoff" hidden>
                                <input type="submit" name="submit" value="Выйти из личного кабинета">
                            </form>
                            </center>
                        <?php
                            }
                        ?>

                    </div>


                    <div>
                        <?php
                        if (null !== getCurrentUser()){

                        if(!isset($_SESSION['dateb'])){
                            ?>
                            <center>
                            <form class="signform" action="" method="post">
                            <p class="p">Что б получить скидку 50 % введите дату вашего рождения</p>
                            <input type="date" name="dateofBirt">
                            <input name="submit" type="submit" value="Отправить">
                            </form>
                            </center>

                        <?php
                            }
                            }
                            if(isset($_SESSION['dateb'])){
                            
                            $now1=round((time()/86400),0);
                            $dateb1=round(strtotime($_SESSION['dateb']['dateb'])/86400,0);
                            $dateb2=round(strtotime('2023-12-31')/86400,0);
                            $dateb3=round(strtotime('2023-01-01')/86400,0);
                            echo "<p class=\"p\">Ваш день рождение ".$_SESSION['dateb']['dateb']."</p>";

                            if($now1 == $dateb1){
                                echo "<p class=\"p\">Поздравляем с днем рождения, воспользуйтесь вашей скидкой 50%</p>";
                                }
                            elseif($now1>$dateb1){      
                                $dateb4=$dateb2-$dateb3;
                                $dateb5=$now1-$dateb1;
                                $days = $dateb4-$dateb5+1;
                            echo "<p class=\"p\">До вашего дня рожения осталось дней - ".$days."</p>";
                            }
                            else{
                                $days = ($dateb1-$now1);
                                echo "<p class=\"p\">До вашего дня рожддения осталось дней - ".$days."</p>";
                            
                            }
                        }
                        ?>
                    </div>
                </div>
                <br>
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

</body>
</html>