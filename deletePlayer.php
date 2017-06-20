<?php
require_once 'bbdd.php';
if (isset($_POST['borrar'])) {
    $name = $_POST["name"];
    deletePlayer($name);
    
} else {
    echo "<form action='' method='post'>";
    echo "Seleciona el jugador a eliminar: ";
    echo "<select name='name'>";
    $nombres = selectPlayer();
    while ($fila = mysqli_fetch_array($nombres)) {
    extract($fila);
    echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' name='borrar' value='Borrar jugador'>";
    echo "</form>";
}

