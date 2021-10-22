<?php
    require_once 'Conexion/dbcon.php';

	$est_dni = $_POST['est_dni'];
    $queryM = "SELECT * FROM ESTUDIANTE where EST_DNI='$est_dni'";		
	$resultadoM = $db_con->query($queryM);
    $rowM = $resultadoM->fetch_assoc();
    $html= $rowM['EST_APELLIDOS']." ".$rowM['EST_NOMBRES'];
    /*if($resultadoM==null){
        $html= $rowM['EST_APELLIDOS']." ".$rowM['EST_NOMBRES'];
    }else{
        $html="aqui";
        //$html= $rowM['EST_APELLIDOS']." ".$rowM['EST_NOMBRES'];
    }*/
    
	
	
	
	echo $html;
?>