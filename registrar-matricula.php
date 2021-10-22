<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage!=='dashboard.php') {
if ($corepage==$corepage) {
    $corepage = explode('.', $corepage);
header('Location: dashboard.php?page='.$corepage[0]);
}
}
if (isset($_POST['AgregarMatricula'])) {
    $dniM = $_POST['dniM'];
    $nivM = $_POST['nivM'];
    $graM = $_POST['graM'];
    $annM = $_POST['annM'];
    $SecM = $_POST['SecM'];
    $vacM = $_POST['vacM'];

    $log2 = mysqli_query($db_con,"SELECT * FROM `ESTUDIANTE` WHERE `EST_DNI` = '$dniM'");
    $showrow2=mysqli_fetch_array($log2);

    $DNI_EST=$showrow2['ESTUDIANTE_ID'];

    $query2 = "INSERT INTO `matricula`(`ESTUDIANTE_ID`, `ANNIO_ESCOLAR_ID`, `NIVEL_ID`, `GRADO_ID`, `SECCION_ID`, `VAC_ID`) VALUES ('$DNI_EST','$annM','$nivM','$graM','$SecM','$vacM')";
    if (mysqli_query($db_con,$query2)) {      
        if (mysqli_error($db_con)==null){
        ?>
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php
                echo "Matricula Registrada";
                ?>
            </div>
        <?php    
        }else{
        ?>
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php
                echo mysqli_error($db_con) . ": " . mysqli_error($db_con) . "\n";
            ?>
            </div>
        <?php
        }
    }else{
        ?>
            <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                <?php
                echo mysqli_error($db_con) . ": " . mysqli_error($db_con) . "\n";
            ?>
            </div>
            <?php 
    }
}
?>
<div class="container">
    <div class="row">
        <form method="POST" action="">
         
        <h2 class="text-primary mb-1 d-grid">
            <center>NUEVA MATRICULA</center>
        </h2>

        <div class="row">
            <div class="mb-3 d-grid">
                <label>DNI DEL ESTUDIANTE</label>            
                <input name="dniM" id="dniMat" type="number" class="form-control" placeholder="Ingrese DNI del estudiante">
            </div> 
        </div> 
        <?php
            /*<div class="mb-3 d-grid">
            <label>ESTUDIANTE</-label>    
            <input name="nomE" id="nomMat" class="form-control">
            </div>*/
        ?>
               
        <div class="mb-3 d-grid">
            <label>AÑO ESCOLAR</label>
            <?php   
                $query5 = "SELECT * FROM `ANNIO_ESCOLAR`";
                $resultado5=$db_con->query($query5);
            ?>
            <select name="annM" id="cb_annio" class="form-control" placeholder="Seleccione Año Escolar"> 
                <option value="0">Seleccionar Año Escolar</option>
                <?php while($row5 = $resultado5->fetch_assoc()) { ?>
                    <option value="<?php echo $row5['ANNIO_ESCOLAR_ID']; ?>"><?php echo $row5['ANN_DESCRIPCION']; ?></option>
                <?php } ?>
            </select>               
        </div> <div class="mb-3 d-grid">           
            <label>NIVEL</label>      
            <?php   
                $query6 = "SELECT * FROM `NIVEL`";
                $resultado6=$db_con->query($query6);
            ?>
            <select name="nivM" id="cb_nivel" class="form-control" placeholder="Seleccione nivel educativo"> 
                <option value="0">Seleccionar Nivel Escolar</option>
                <?php while($row6 = $resultado6->fetch_assoc()) { ?>
                    <option value="<?php echo $row6['NIVEL_ID']; ?>"><?php echo $row6['NIV_DESCRIPCION']; ?></option>
                <?php } ?>
            </select>
        </div> 
        </div> <div class="mb-3 d-grid">
            <label>GRADO</label>               
            <select name="graM" id="cb_grado" class="form-control" placeholder="Seleccione grado"> 
                <option value="0">Seleccionar Grado Escolar</option>               
            </select>
        </div>
        <div class="mb-3 d-grid">
            <label>SECCION</label>
            <?php   
                $query7 = "SELECT * FROM `SECCION`";
                $resultado7=$db_con->query($query7);
            ?>
            <select name="SecM" id="cb_seccion" class="form-control" placeholder="Seleccione seccion"> 
                <option value="0">Seleccionar seccion</option>  
                <?php while($row7 = $resultado7->fetch_assoc()) { ?>
                    <option value="<?php echo $row7['SECCION_ID']; ?>"><?php echo $row7['SEC_DESCRIPCION']; ?></option>
                <?php } ?>             
            </select>            
        </div> 
        <div class="row">
            <div class="mb-3 d-grid">
                    <label>VACANTE</label>
                    <?php   
                        $query8 = "SELECT * FROM `VACANTE` inner join `ESTUDIANTE` on `ESTUDIANTE`.`ESTUDIANTE_ID`=`VACANTE`.`EST_ID` inner join `ANNIO_ESCOLAR` on `ANNIO_ESCOLAR`.`ANNIO_ESCOLAR_ID`=`VACANTE`.`ANN_ID`";
                        $resultado8=$db_con->query($query8);
                    ?>    
                    <select name="vacM" id="cb_vacante" class="form-control" placeholder="Seleccione seccion"> 
                    <option value="0">Seleccionar vacante</option>
                    <?php while($row8 = $resultado8->fetch_assoc()) { ?>
                        <option value="<?php echo $row8['VACANTE_ID']; ?>"><?php echo $row8['EST_NOMBRES'];echo " ";echo $row8['EST_APELLIDOS'];echo " - ";echo $row8['ANN_DESCRIPCION']; ?></option>
                    <?php } ?> 
                                       
            </select>
            </div>
            <?php
            /*<div class="col-3 mb-3 d-grid">          
                <button name="btnV" type="number" class="btn btn-info"> <strong>NUEVA VACANTE</strong></button>
            </div>*/
        ?>
        </div>           
        <div class="mb-4 d-grid" >
                    <button name="AgregarMatricula" type="submit" class="btn btn-primary">Registrar Matricula</button>     
        </div>
        </form>       
    </div> 
</div> 

<?php
?>