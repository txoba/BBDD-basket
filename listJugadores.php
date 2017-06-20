<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:100%" border="1">';
echo "<tr><th>Nombre</th><th>Fecha creacion</th><th>Canastas</th>"
   . "<th>Asistencias</th><th>Rebotes</th><th>Posicion</th><th>Equipo</th></tr>";
$player = selectPlayer();
while ($fila = mysqli_fetch_array($player)) {
    extract($fila);
    echo "<tr><td>$name</td><td>$birth</td><td>$nbaskets</td>"
       . "<td>$nassists</td><td>$nrebounds</td><td>$position</td><td>$team</td></tr>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";