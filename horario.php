<!DOCTYPE html>
<html>
<head>
    <style>
        body {padding: 20px;}
        input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
        td {padding: 4px; border: 1px #CCC solid; width: 100px;}
    </style>
    <link rel="stylesheet" href="foundation.min.css"/>
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
    ?>
    <div class="row">

    <?php
    echo '<select class="large-offset-3 medium-offset-3 large-6 medium-6 end columns" id="hora">';
    while($row = mysql_fetch_assoc($result)){
        echo "<option value=' " . $row['horario']." '>".$row['horario']."</option>";
    }
    echo "</select>";
    ?>
    </div>

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
    ?>
    <div class="row">

    <?php
    echo '<select class="large-offset-3 medium-offset-3 large-6 medium-6 end columns" id="dia">';
    while($row = mysql_fetch_assoc($result)){
        echo "<option value=' " . $row['dias']." '>".$row['dias']."</option>";
    }
    echo "</select>";
    ?>
    </div>
<div class="row">
    <a class="button large-offset-3 medium-offset-3 large-6 medium-6 end columns" onclick="getExam()">&iquest;Cu&aacute;ndo presento?
    </a>
</div>

<br><br>
    <div class="row">
        <div data-alert class="alert-box alert round large-offset-3 medium-offset-3 large-6 medium-6 end columns"
             id="lblExamen">
        </div>
    </div>
    <script src="jquery.js"></script>
    <script src="foundation.min.js"></script>
    <script src="knockout-3.3.0.js"></script>
    <script type="text/javascript" src="ayudante.js"></script>
</body>
</html>