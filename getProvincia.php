
<?php
	require_once 'Conexion/dbcon.php';
    
    $id_Departamento = $_POST['id_depa'];
	
	$queryP = "SELECT idProv, provincia FROM `ubProvincia` WHERE `idDepa` = '$id_Departamento' ORDER BY `provincia`";


	$resultadoP = $db_con->query($queryP);
	
	$html= "<option value='0'>Seleccionar Provincia</option>";
	
	while($rowP = $resultadoP->fetch_assoc())
	{
		$html.= "<option value='".$rowP['idProv']."'>".$rowP['provincia']."</option>";
	}
	
	echo $html;
?>