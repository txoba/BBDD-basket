<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:100%" border="1">';
echo "<tr><th>Nombre</th><th>Fecha creacion</th><th>Canastas</th>"
   . "<th>Asistencias</th><th>Rebotes</th><th>Posicion</th><th>Equipo</th></tr>";
$player = selectPlayerTeam();
while ($fila = mysqli_fetch_array($player)) {
    extract($fila);
    echo "<tr><th>$name</th><th>$birth</th><th>$nbaskets</th>"
       . "<th>$nassists</th><th>$nrebounds</th><th>$position</th><th>$team</th></tr>";
}
echo'</table>';
echo "</form>";
echo "<form action='index.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";