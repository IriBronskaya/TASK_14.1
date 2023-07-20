<?php
function getUsersList(){
    return
    [
        ['login' => 'Александра', 'password' => '$2y$10$uYa/0Jyv/btDSVSQKJ3eg.YA1dSmYj3Mzf9LIh4rR.v3rCJGhrCBy'],//123 - пароль и хэш
        ['login' => 'Регина', 'password' => '$2y$10$Yd71HHyKqNV/1EJybM3kB.xYIlBPJ5vVGYDeTXT8MMjqfXP9hgiEq'],//345
        ['login' => 'Светлана', 'password' => '$2y$10$AzlC.eOJaZ5KGADoXTSvaeX1aZ/8P/WILYsHoiWRgRog3.ProOpnG'],//567
        ['login' => 'Анна', 'password' => '$2y$10$689N6dAPVsJ.0zG3klxZju7IBaOIGmMMf8XgA29pfrEHW6jFqsc2e'],//789
        ['login' => 'Линда', 'password' => '$2y$10$82MtEEUp78xnstnj0xEoGO4GGRGb4bvA324AQWFTYv8EUia/cN7fS'],//891
    ];
};

function existsUser($login){ 
    return in_array( $login, array_column( getUsersList(),'login' ) );
}

function getUser($login) { 
    $users = getUsersList();
    foreach ($users as $user) {
        if ($login == $user['login']) {
            return $user;
        }
    }
}

function checkPassword($login, $password) { 
    if ( true === existsUser($login) ) { 
        if ( password_verify( $password, getUser($login)['password'] ) ) { 
            return true;
        }
    }
    return false;
}

function getCurrentUser() {    
    if ( isset( $_SESSION['username'] ) ) {
        if ( existsUser( $_SESSION['username'] ) ) {  
            return $_SESSION['username'];
        }
    }
}

function destroySession(){
    if(isset($_POST['logoff'])){
    session_destroy();
    header('Location: login.php');
    }
}
?>
