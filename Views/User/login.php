<?php
    require_once('../../Controllers/SessionStarter.php');
    $sessionStart = new SessionStarter();
    $sessionStart->userSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="form" id="formLogin" action="#" method="POST">
            <h1 class="form__title">Sign in</h1>

            <div class="form__group separator">
                <div class="form__icon-group">
                    <i class="form__icon fas fa-at"></i>
                </div>
                <input class="form__input form__input--email" type="email" placeholder="Enter your email" name="email"
                    id="email">
            </div>

            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fa fa-lock"></i>
                </div>
                <input class="form__input form__input--password" type="password" placeholder="Enter your password"
                    name="password" id="password">
            </div>

            <div class="form__group form__group--submit">
                <input class="btn btn--green btn--animated btn--large btn--round-3" type="submit" value="Sign in">
                <input type="hidden" name="login">
            </div>

            <div class="form__register">
                <a class="btn btn--grey btn--large btn--round-3 btn--hover" href="../../Views/User/register.php">Create an account</a>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../JS/Login/login.js" type="module"></script>

</body>

</html>