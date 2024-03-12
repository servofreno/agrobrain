<?php
include 'conection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Administrador</title>
    <script src="https://kit.fontawesome.com/6e1bf200d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="icon" href="../img/icon.jpg" type="image/x-icon">
</head>

<body>
    <a id="retorn" href="../views/login.php">
        <i class="fa-solid fa-circle-arrow-left"></i>
    </a>
    <section id="admin">
        <article>
            <div>
                <h1>Bienvenido, admin</h1>
                <p>Aqui tienes todas tus opciones de trabajadores</p>
                <?php
                $sql = "SELECT * FROM datos_usuario";
                $mostrar = mysqli_query($conexion, $sql);

                echo "<table><tr><th>Nombre</th><th>Apellidos</th><th>Correo</th><th>Teléfono</th><th>Informacion</th><th>Cv</th></tr>";

                while ($info = mysqli_fetch_assoc($mostrar)) {
                    echo "<form method='post' action=''" . $_SERVER['PHP_SELF'] . "'>";
                    echo "<tr>";
                    echo "<td class='td-admin'>" . $info['nombre'] . "</td>";
                    echo "<td class='td-admin'>" . $info['apellido'] . "</td>";
                    echo "<td class='td-admin'>" . $info['correo'] . "</td>";
                    echo "<td class='td-admin'>" . $info['telefono'] . "</td>";
                    echo "<td class='td-admin'>" . $info['informacion'] . "</td>";
                    echo "<td id='descarga'><a href='download.php?file=" . urlencode($info['archivo']) . "'><i class='fa-solid fa-download'></i></a></td>";
                    echo "<td><button type='submit' class='btn' name='delete' value='" . $info['id'] . "'><i class='fa-solid fa-trash'></i></button></td>";
                    echo "</tr>";
                    echo "</form>";
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST['delete'];
                    $sql = "DELETE FROM datos_usuario WHERE id = $id ";
                    $eliminar = mysqli_query($conexion, $sql);
                    if ($eliminar) {
                        echo "
                        <script>
                        alert('Se han eliminado los datos del usuario');
                        document.reload();
                        </script>";
                    } else {
                        echo "<script>alert('No se han podido eliminar los datos del usuario');</script>";
                    }
                }
                ?>
            </div>
        </article>
    </section>
</body>

</html>