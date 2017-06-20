<?php

//CONECTAR

function conectar($database) {
    $conexion = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $conexion;
}

//DESCONECTAR

function desconectar($conexion) {
    mysqli_close($conexion);
}

//SELECTS TEAM

function selectTeam() {
    $con = conectar("basket");
    $query = "select * from team;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectTeamByName($name) {
    $con = conectar("basket");
    $query = "select * from team where name='$name';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectTeamCity() {
    $con = conectar("basket");
    $query = "select * from team order by city;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//SELECTS PLAYER

function selectPlayer() {
    $con = conectar("basket");
    $query = "select * from player;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPlayerByName($name) {
    $con = conectar("basket");
    $query = "select * from player where name='$name';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPlayerBaskets() {
    $con = conectar("basket");
    $query = "select * from player order by nbaskets desc;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectPlayerTeam() {
    $con = conectar("basket");
    $query = "select * from player order by team asc;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

//INSERTS

function newTeam($name, $city, $date) {
    $conexion = conectar("basket");
    $newDate = date("Y-m-d", strtotime($date) );
    $insert = "insert into team values('$name', '$city', '$newDate')";
    if (mysqli_query($conexion, $insert)) {
        echo "Equipo dado de alta<br>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}
function newPlayer($name, $birth, $baskets, $assists, $rebounds, $position, $team) {
    $conexion = conectar("basket");
    $newDate = date("Y-m-d", strtotime($birth) );
    $insert = "insert into player values('$name', '$newDate', $baskets, $assists, $rebounds, '$position', '$team')";
    if (mysqli_query($conexion, $insert)) {
        echo "Jugador dado de alta<br>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($conexion);
}

// UPDATES

function modifyTeam($name, $city, $date) {
    $con = conectar("basket");
    $newDate = date("Y-m-d", strtotime($date) );
    $update = "update team set city='$city', creation='$newDate' where name='$name'";
    if (mysqli_query($con, $update)) {
        echo "Equipo modificado";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}
function modifyPlayer($name, $birth, $canastas, $assists, $rebounds, $position, $team) {
    $con = conectar("basket");
    $newDate = date("Y-m-d", strtotime($birth));
    $update = "update player set nbaskets='$canastas', birth='$newDate', nassists='$assists', nrebounds='$rebounds', position='$position', team='$team' where name='$name'";
    if (mysqli_query($con, $update)) {
        echo "Jugador modificado";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//DELETE PLAYER

function deletePlayer($name){
    $con= conectar("basket");
    $delete = "delete from player where name='$name'";
    if (mysqli_query($con, $delete)) {
        echo "Jugador eliminado!";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Volver a la home'>";
        echo "</form>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}