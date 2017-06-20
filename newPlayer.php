<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $name = $_POST["nombre"];
    $birth = $_POST["fecha"];
    $baskets = $_POST["canastas"];
    $assists = $_POST["assistencias"];
    $rebounds = $_POST["rebotes"];
    $position = $_POST["position"];
    $team = $_POST["team"];
    newPlayer($name, $birth, $baskets, $assists, $rebounds, $position, $team);
} else {
    echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "nombre" required><br>
        Fecha Nacimiento: <input type = "date" name = "fecha" required><br>
        Numero de Canastas: <input type = "number" name = "canastas" required><br>
        Numero de Assistencias: <input type = "number" name = "assistencias" required><br>
        Numero de Rebotes: <input type = "number" name = "rebotes" required><br>
        Posicion Jugador: <input type = "text" name = "position" required><br>';
    $datos = selectTeam();
    echo " 
        Equipo del Jugador:<select name='team'>";
        while ($fila = mysqli_fetch_array($datos)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
}
    echo' 
        </select>
        <input type = "submit" name = "enviar" value = "Alta"><br>
        </form>';
}
?>
