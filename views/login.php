<?php
include '../files/conection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <script src="https://kit.fontawesome.com/6e1bf200d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="icon" href="../img/icon.jpg" type="image/x-icon">
</head>

<body>
    <a id="retorn" href="/index.php">
        <i class="fa-solid fa-circle-arrow-left"></i>
    </a>
    <section id="login">
        <article>
            <div>
                <h1>INICIA SESION</h1>
            </div>
            <form action="" method="post">
                <input type="text" name="user" placeholder="USUARIO*" required id="user">
                <input type="password" name="password" placeholder="PASSWORD*" required id="password">
                <input type="submit" name="iniciar" value="Iniciar sesión" id="iniciar">
            </form>
            <?php
            if (isset($_POST['iniciar'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];

                if ($user === 'admin' && $password === 'Proyecto2024*') {
                    $_SESSION['user'] = $user;
                    header("Location: ../files/admin.php");
                } else {
                    echo "<script>alert('Usuario o contraseña incorrectos');</script>";
                }
            }
            ?>
        </article>
    </section>
</body>

</html>