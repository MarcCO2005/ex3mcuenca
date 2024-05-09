<?php
class Lighting extends Connection{

    public function importLamps()
    {
        $fichero = 'lighting.csv';
        $gestor = fopen($fichero, "r");
        $query = "INSERT INTO lamps (`lamp_id`, `lamp_name`, `lamp_model`, `lamp_zone`, `lamp_on`) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->conn->prepare($query);
        if (!$statement) {
            die("Error al preparar la consulta: " . $this->conn->error);
        }
        if ($gestor !== false)
        {
            while (($element = fgetcsv($gestor)) !== false) 
            {
                if (count($element) == 5)
                 {
                    $lamp_id = $element[0];
                    $lamp_name = $element[1];
                    $lamp_model = $this->getModelId($element[2]) ;
                    $lamp_zone = $this->getZoneId($element[3]);
                    $lamp_on = $element[4];

                    $statement->bind_param("isiii", $lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on);
                    $statement->execute();
                 } else {
                    echo "Error: No hay suficientes columnas en la fila del archivo CSV.";
                }
            }
            fclose($gestor);
        }
        else {
            echo "Error al abrir el archivo CSV.";
        }
    }
    function deleteLamps(){
        $conn = $this->getConn();
        $query = "DELETE FROM lamps";
        $conn->query($query);
    }
    function init (){

        $this->deleteLamps();
        $this->importLamps();
    }
    function getAllLamps(){
        $query ="SELECT * FROM lamps ";
        $result = $this->conn->query($query);

        $tareas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tareas[] = $row;
            }
        }
        return $tareas;

    }
    public function drawLampsList()
    

    {
        $tareas = $this->getAllLamps();
        echo "<table>";
                foreach ($tareas as $tarea) {
                    echo '<tr>';
                    echo '<td>' . $tarea['lamp_id'] . '</td>';
                    echo "<td>" . $tarea['lamp_name'] . "</td>";
                    echo '<td>' . $tarea['lamp_model'] . '</td>';
                   $consumo = 0; 

                   //IFS PARA CONSUMO 
                   if ($tarea['lamp_model'] == 1){
                        echo '<td> 600 </td>';
                        $consumo =+ 600;
                    }elseif($tarea['lamp_model'] == 2){
                        echo '<td> 400 </td>';
                        $consumo =+ 400;
                    }elseif($tarea['lamp_model'] == 3){
                        echo '<td> 500 </td>';
                        $consumo =+ 500;
                    }
                    echo '<td>' . $tarea['lamp_zone'] . '</td>';
                    //IF IMAGEN
                    if ($tarea['lamp_on'] == 1) {
                        echo  '<td><a href=changestatus.php?id=.' . $tarea['lamp_id'] .'&status=on ><img src=img/bulb-icon-off.png width= 20px></td>';
                    } else {
                        echo  '<td><a href=changestatus.php?id=.' . $tarea['lamp_id'] .'&status=off ><img src=img/bulb-icon-off.png width= 20px></td>';
                    }

                    echo '</tr>';
                }
                echo '</table>';
                $zonauno=0;
                $zonados=0;
                $zonatrex=0;
                $zonacuat=0;

                
                //IF INTENTO DE SUMA
                if ($tarea['lamp_on'] == 1 && $tarea['lamp_zone'] == 1 ){
                    $zonauno =+ $consumo;
                    echo '<h1>'. $zonauno.'</h1>';
                }elseif ($tarea['lamp_on'] == 1 && $tarea['lamp_zone'] == 2){
                    $zonados=+ $consumo;
                    echo '<h1>'. $zonados.'</h1>';
                }elseif($tarea['lamp_on'] == 1 && $tarea['lamp_zone'] == 3)
                {
                  $zonatrex=+$consumo;  
                  echo '<h1> '. $zonatrex.'</h1>';
                }
                elseif($tarea['lamp_on'] == 1 && $tarea['lamp_zone'] == 4)
                {
                  $zonacuat=+$consumo;  
                  echo '<h1> '. $zonacuat.'</h1>';
                }
        
    }
    function getModelId($id)
    {
        $sql = "SELECT lamp_model FROM lamp WHERE lamp_model = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['lamp_id'];
        } else {
            return null;
        }
    }
    function getZoneId($id){
        $sql = "SELECT lamp_zone FROM lamp WHERE lamp_zone = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['zone_id'];
        } else {
            return null;
        }
    }
    function getLampId($id){
        $sql = "SELECT lamp_id FROM lamps WHERE lamp_zone = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if ($result && $row = mysqli_fetch_assoc($result)) {
            return $row['lamp_id'];
        } else {
            return null;
        }
    }

    function filter(){}

}