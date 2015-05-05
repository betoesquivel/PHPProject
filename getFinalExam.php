<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "horarios";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$hora = $_GET['hora'];
$dia = $_GET['dia'];
$sql = "SELECT fechaexamen FROM examenes where horario='".$hora ."' and dias='".$dia."';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["fechaexamen"];
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>