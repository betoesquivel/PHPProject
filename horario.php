<!DOCTYPE html>
<html>
<head>
    <style>
        body {padding: 20px;}
        input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
        td {padding: 4px; border: 1px #CCC solid; width: 100px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
    <?php
    $connection = mysql_connect('127.0.0.1', 'root', '');
    if (!$connection){
        die("Database Connection Failed" . mysql_error());
    }
    $select_db = mysql_select_db('horarios');
    if (!$select_db){
        die("Database Selection Failed" . mysql_error());
    }
    //3.1.2 Checking the values are existing in the database or not
    $query = "SELECT horario FROM `examenes` GROUP BY horario ";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    echo "<select>";
    while($row = mysql_fetch_assoc($result)){
        echo "<option value=' " . $row['horario']." '>".$row['horario']."</option>";
    }
    echo "</select>";


    ?>
    <?php
    $connection = mysql_connect('127.0.0.1', 'root', '');
    if (!$connection){
        die("Database Connection Failed" . mysql_error());
    }
    $select_db = mysql_select_db('horarios');
    if (!$select_db){
        die("Database Selection Failed" . mysql_error());
    }
    //3.1.2 Checking the values are existing in the database or not
    $query = "SELECT dias FROM `examenes` GROUP BY dias ";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    echo "<select>";
    while($row = mysql_fetch_assoc($result)){
        echo "<option value=' " . $row['dias']." '>".$row['dias']."</option>";
    }
    echo "</select>";


    ?>
<input type="button" value="¿Cuándo presento?" onclick="getExam()" />
</body>
</html>