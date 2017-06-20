<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:100%" border="1">';
echo "<tr><th>Nombre</th><th>Ciudad</th><th>Fecha Creacion</th>";
$player = selectTeamCity();
while ($fila = mysqli_fetch_array($player)) {
    extract($fila);
    echo "<tr><td>$name</td><td>$city</td><td>$creation</td>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";