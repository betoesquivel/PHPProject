<!DOCTYPE html>
<html>
<head>
    <style>
        body {padding: 20px;}
        input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
        td {padding: 4px; border: 1px #CCC solid; width: 100px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var $rows = $('#table tr');
            $('#search').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        });
    </script>
</head>
<body>
<input type="text" id="search" placeholder="Type to search">
<table id="table">
    <?php
    $connection = mysql_connect('localhost', 'root', '');
    if (!$connection){
        die("Database Connection Failed" . mysql_error());
    }
    $select_db = mysql_select_db('horarios');
    if (!$select_db){
        die("Database Selection Failed" . mysql_error());
    }
    //3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `clases`  LIMIT 10";

    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    while($row = mysql_fetch_assoc($result)){

        //print("<p>". $row ."</p>");
        print("<tr><td class='celda' >". $row['Nombre']. "</td>");
        print("<td class='celda' >". $row['Profesor']. "</td>");
        print("<td class='celda'><input type='button' onclick='eliminar(". $row['Clave'] . ")' value='consultar'/></td></tr>");
    }


    ?>
</table>
</body>
</html>