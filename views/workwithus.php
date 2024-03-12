<?php
include '../files/conection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Trabaja con nosotros</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="https://kit.fontawesome.com/6e1bf200d6.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../img/icon.jpg" type="image/x-icon">
</head>

<body id="workwithus">
    <header>
        <img src="../img/index.JPG" alt="" class="logo">
        <nav>
            <ul>
                <li><a href="../index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="company.php"><i class="fa-solid fa-circle-info"></i>Nuestro producto</a></li>
                <li><a href="contact.php"><i class="fa-solid fa-id-badge"></i>Contacto</a></li>
                <li><a href="workwithus.php"><i class="fa-solid fa-person-chalkboard"></i>Trabaja con nosotros</a></li>
                <div id="loginbutton">
                    <a href="/views/login.php" class="loginicon"><i class="fa-solid fa-user-secret"
                            aria-hidden="true"></i></a>
                </div>
            </ul>
        </nav>
    </header>
    <article class="working">
        <h1 class="worktitle">Trabaja con nosotros</h1>
        <div class="infoworking">
            <h2>Queremos crecer junto a ti</h2>
            <p>Envianos tu currículum</p>
        </div>
        <div class="workform">
            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" id="nombre" name="name" placeholder="NOMBRE*" required><br>
                <input type="text" id="apellido" name="surname" required placeholder="APELLIDOS*"><br>
                <input type="email" id="correo" name="email" required placeholder="CORREO*"><br>
                <input type="tel" id="telefono" name="phone" required placeholder="TELÉFONO*"><br>
                <textarea id="about" name="about" rows="4" cols="50" placeholder="SOBRE TI"></textarea><br>
                <input type="file" name="file" id="file"><br>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $file_name = $_FILES['file']['name'];
                    $file_tmp = $_FILES['file']['tmp_name'];
                    $error = $_FILES['file']['error'];

                    if ($error == 0) {
                        $file = file_get_contents($file_tmp);
                    } else {
                        die("Error uploading file. Error code: " . $error);
                    }

                    $nombre = $_POST['name'];
                    $apellido = $_POST['surname'];
                    $correo = $_POST['email'];
                    $telefono = $_POST['phone'];
                    $about = $_POST['about'];
                    $route = "../uploads/" . $file_name;

                    move_uploaded_file($file_tmp, $route);

                    // Use prepared statement to prevent SQL injection
                    $sql = "INSERT INTO datos_usuario (nombre, apellido, correo, telefono, informacion, archivo) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bind_param("ssssss", $nombre, $apellido, $correo, $telefono, $about, $route);
                    $stmt->execute();
                }
                ?>
                <input type="submit" value="Enviar" name="submit" id="enviar">
                <?php
                echo "<script>
                            alert(Se han enviado los datos correctamente)
                        </script>
                    ";
                ?>
            </form>
        </div>
    </article>
    <footer>
        <img src="../img/index.JPG" alt="">
        <h4>Copyright © 2023 Agrobrain Analytics</h4>
        <ul>
            <li>
                <a href="avisolegal.php">Aviso Legal</a>
            </li>
            <li>
                <a href="politicaprivacidad.php">Política de privacidad</a>
            </li>
            <li>
                <a href="contact.php">Contacto</a>
            </li>
        </ul>
    </footer>
</body>

</html>