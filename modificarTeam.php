<?php
require_once 'bbdd.php';
if (isset($_POST['modificar'])) {
    $name = $_POST["nombre"];
    $date = $_POST["fecha"];
    $city = $_POST["ciudad"];
    modifyTeam($name, $city, $date);
    
} else if (isset($_POST['escojer'])){
    $name = $_POST['name'];
    $datos = selectTeamByName($name);
    $fila = mysqli_fetch_array($datos);
    extract($fila);
    echo "<form action='' method='POST'>";
    echo "Modificar equipo: $name";
    echo "<input type='hidden' name='nombre' value=$name><br>";
    echo "Fecha: <input type='date' name='fecha' value=$creation><br>";
    echo "Numero de Canastas: <input type='text' name='ciudad' value=$city><br>";
    echo "<input type='submit' name='modificar' value='Modificar'>";
    echo "</form>";
    
} else {
    echo "<form action='' method='post'>";
    echo "Seleciona el equipo a modificar: ";
    echo "<select name='name'>";
    $nombres = selectTeam();
    while ($fila = mysqli_fetch_array($nombres)) {
    extract($fila);
    echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' name='escojer' value='Seleccionar'>";
    echo "</form>";
}