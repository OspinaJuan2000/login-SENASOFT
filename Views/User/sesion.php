<?php
    require_once('../../Controllers/SessionStarter.php');
    $sessionStart = new SessionStarter();
    $sessionStart->redirect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="login">
        <h1 class="login__heading">YOU'RE LOGIN with <?php echo $_SESSION['user']['email'] ?></h1>
        <a class="login__close" href="http://localhost/login-SENASOFT/controllers/SessionStarter.php?action=close">Close the session</a>
    </div>
</body>
</html>