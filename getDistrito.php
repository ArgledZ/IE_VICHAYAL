
<?php
    require_once 'Conexion/dbcon.php';
	$id_Prov = $_POST['id_prov'];
	
	$queryM = "SELECT idDist, distrito FROM ubDistrito WHERE idProv = '$id_Prov' ORDER BY distrito";
	$resultadoM = $db_con->query($queryM);
	
	$html= "<option value='0'>Seleccionar Distrito</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idDist']."'>".$rowM['distrito']."</option>";
	}
	
	echo $html;
?>