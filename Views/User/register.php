<?php
    require_once('../../Controllers/SessionStarter.php');
    $sessionStart = new SessionStarter();
    $sessionStart->accessIndex();
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
        <form class="form" id="formRegister" method="POST">
            <h1 class="form__title">Create an account</h1>
            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fa fa-user"></i>
                </div>
                <input class="form__input form__input--firstname" type="text" placeholder="Enter your name" name="name" id="name">
            </div>

            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fa fa-user"></i>
                </div>
                <input class="form__input" type="text" placeholder="Enter your lastname" name="lastname" id="lastname">
            </div>


            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fas fa-at"></i>
                </div>
                <input class="form__input form__input--email" type="email" placeholder="Enter your email" name="email" id="email">
            </div>

            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fa fa-lock"></i>
                </div>
                <input class="form__input form__input--password" type="password" placeholder="Enter your password" name="password"
                    id="password">
            </div>

            <div class="form__group">
                <div class="form__icon-group">
                    <i class="form__icon fa fa-lock"></i>
                </div>
                <input class="form__input" type="password" placeholder="Confirm your password" name="passwordConfirm"
                    id="passwordConfirm">
                <p class="form__error-password">The password does not match</p>
            </div>

            <div class="form__group form__group--submit">
                <input class="btn btn--green btn--animated btn--round" type="submit" value="Create account" name="action">
                <input type="hidden" name="create">
            </div>

            <div class="form__login">
                <a class="btn btn--grey btn--large btn--round-3" href="../../index.php">I have an account</a>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../JS/Register/register.js" type="module"></script>
</body>

</html>