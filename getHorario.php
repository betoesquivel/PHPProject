<?php
/**
 * Created by PhpStorm.
 * User: betoesquivel
 * Date: 5/4/15
 * Time: 2:11 AM
 */

$classId = $_GET['id'];
$group = $_GET['group'];

$connection = mysql_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('horarios');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
//3.1.2 Checking the values are existing in the database or not
$query = "select Hora1 where Clave='$classId' and Grupo=$group";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if($row = mysql_fetch_assoc($result)) {
    $horario = $result['Hora1'];
}



