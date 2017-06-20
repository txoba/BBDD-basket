<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $name = $_POST["nombre"];
    $city = $_POST["ciudad"];
    $date = $_POST["fecha"];   
    newTeam($name, $city, $date);
} else {
    echo ' 
        <form action = "" method = "POST">
        Nuevo Equipo: <input type = "text" name = "nombre" required><br>
        Ciudad: <input type = "text" name = "ciudad" required><br>
        Data: <input type = "date" name = "fecha" required><br>
        <input type = "submit" name = "enviar" value = "Alta equipo"><br>
        </form>';
}
?>
