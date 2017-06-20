<?php
require_once 'bbdd.php';
if (isset($_POST['modificar'])) {
    $name = $_POST["name"];
    $fecha = $_POST["birth"];
    $canastas = $_POST["baskets"];
    $assists = $_POST["assists"];
    $rebounds = $_POST["rebounds"];
    $position = $_POST["position"];
    $team = $_POST["team"];
    modifyPlayer($name, $fecha, $canastas, $assists, $rebounds, $position, $team);
    
} else if (isset($_POST['escojer'])){
    $name = $_POST['name'];
    $datos = selectPlayerByName($name);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "<form action='' method='POST'>";
    echo "Modificar jugador: $name";
    echo "<input type='hidden' name='name' value=$name><br>";
    echo "Fecha Nacimiento: <input type='date' name='birth' value=$birth><br>";
    echo "Numero de Canastas: <input type='number' name='baskets' value=$nbaskets><br>";
    echo "Numero de Assistencias: <input type='number' name='assists' value=$nassists><br>";
    echo "Numero de Rebotes: <input type='number' name='rebounds' value=$nrebounds><br>";
    echo "Posicion Jugador: <input type='text' name='position' value=$position><br>";
    $equipo = selectTeam();
    echo "Equipo del Jugador:<select name='team'>";
        while ($fila = mysqli_fetch_array($equipo)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>';
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";
    
} else {
    echo "<form action='' method='post'>";
    echo "Seleciona el jugador a modificar: ";
    echo "<select name='name'>";
    $nombres = selectPlayer();
    while ($fila = mysqli_fetch_array($nombres)) {
    extract($fila);
    echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' name='escojer' value='Seleccionar'>";
    echo "</form>";
}

