<?php 
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<style>
        body {
            background-color: lightcyan;
        }

        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            background-color: lightgreen;
        }

        .element {
            display: inline-block;
            width: 100px;
            height: 120px;
            font-size: .6em;
            text-align: center;
            margin: 10px;
        }

        .element,
        .center {
            -moz-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            -webkit-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            border-radius: 10px;
            /*supported by all latest Browser*/
            -moz-border-radius: 10px;
            /*For older Browser*/
            -webkit-border-radius: 10px;
            /*For older Browser*/
            border: 3px solid navy;
        }

        .element img {
            width: 3em;
            vertical-align: middle;
        }

        .on {
            background-color: lightyellow;
        }

        .off {
            background-color: lightslategray;
        }

        h1 {
            font-size: 1.5em;
            text-align: center;
            background-color: black;
            color: azure;
        }

        form {
            text-align: center;
        }
    </style>
     <script src="ev3.js"></script>
<table class="greenTable">
    <thead>
    <h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>
        <form action="" method="post">
            <select name="filter">
                <option value='all'>All</option>
                <option value='1'>Fondo Norte</option>
                <option value='2'>Fondo Sur</option>
                <option value='3'>Grada Este</option>
                <option value='4'>Grada Oeste</option>
            </select>
            <input type="submit" value="Filter by zone">
   
        <h1>FOOOOOOOK VICENT</h1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Model</th>
            <th>Consumo</th>
            <th>Zone</th>
            <th>Status</th> <!-- Nueva col+umna para acciones -->
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="5"> <!-- Modificado para que coincida con el número de columnas -->
                &nbsp;
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php 
                $lighting = new Lighting();
                $lighting->drawLampsList();
                $lighting->drawLampsList()
        
        ?>
        <tr>
            <td colspan="5"><a href='nueva.php'>Añadir tarea</a></td> <!-- Modificado para que coincida con el número de columnas -->
        </tr>
    </tbody>
</table>

</body>
</html>
