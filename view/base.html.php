<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TodoList</title>
    <meta name="viewport" content="width=device-width,
  user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
<header>
    <a href="/?c=home">Home</a>
    <?php
        if (!isset($_SESSION['user'])) {?>
            <a href="/?c=user&a=register">Register</a>
            <a href="/?c=user&a=login">Login</a><?php
        }
        else{?>
            <a href="/?c=user&a=profil">Profil</a>
            <a href="/?c=user&a=logout">Log out</a>
            <?php
        }
    ?>
</header>

<main><?= $html ?></main>


</body>
</html>