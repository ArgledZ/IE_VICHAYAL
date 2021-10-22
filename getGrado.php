<?php
    require_once 'Conexion/dbcon.php';
	$id_nivel = $_POST['id_nivel'];
	if($id_nivel==1){
        $queryM = "SELECT * FROM GRADO";
    }else{
        $queryM = "SELECT * FROM GRADO LIMIT 5";
    }
	
	$resultadoM = $db_con->query($queryM);
	
	$html= "<option value='0'>Seleccionar Grado Escolar</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['GRADO_ID']."'>".$rowM['GRA_DESCRIPCION']."</option>";
	}
	
	echo $html;
?>