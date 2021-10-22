<?php
    $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='dashboard.php') {
    if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
    header('Location: dashboard.php?page='.$corepage[0]);
    }
    }

    if (isset($_POST['AgregarEstudiante'])) {
        $dniA = $_POST['dniA'];
        $nomA = $_POST['nomA'];
        $apeA = $_POST['apeA'];
        $telA = $_POST['telA'];
        $emailA = $_POST['emailA'];
        $disA = '1';
        $dirA = $_POST['dirA'];
        $dniE = $_POST['dniE'];
        $nomE = $_POST['nomE'];
        $apeE = $_POST['apeE'];
        $fecE = $_POST['fecE'];
        $disE = '1';
        $dirE = $_POST['dirE'];
        
        $query = "INSERT INTO `apoderado` (`APO_DNI`, `APO_NOMBRES`, `APO_APELLIDOS`, `APO_TELEFONO`, `APO_CORREO`, `APO_DISTRITO`, `APO_DIRECCION`) VALUES ('$dniA','$nomA','$apeA','$telA','$emailA','$disA','$dirA');";
        $query2 = "INSERT INTO `estudiante`(`EST_DNI`, `EST_NOMBRES`, `EST_APELLIDOS`, `EST_FECHA`, `EST_DISTRITO`, `EST_DIRECCION`, `APODERADO_ID`) VALUES ('$dniE','$nomE','$apeE','$fecE','$disE','$dirE','1');";
        if (mysqli_query($db_con,$query)) {      
            if (mysqli_error($db_con)==null){
                if (mysqli_query($db_con,$query2)){
                    if (mysqli_error($db_con)==null){
                        ?>
                        <div class="alert alert-primary" role="alert" align="center" data-delay="2000">
                            <?php
                            echo "Estudiante Registrado";
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
        //INSERT INTO `apoderado`(`APO_DNI`, `APO_NOMBRES`, `APO_APELLIDOS`, `APO_TELEFONO`, `APO_CORREO`, `APO_DISTRITO`, `APO_DIRECCION`) VALUES ('$dniA','$nomA','$apeA','$telA','$email','$disA','$dirA')



        //INSERT INTO `estudiante`(`EST_DNI`, `EST_NOMBRES`, `EST_APELLIDOS`, `EST_FECHA`, `EST_DEPARTAMENTO`, `EST_PROVINCIA`, `EST_DISTRITO`, `EST_DIRECCION`, `APODERADO_ID`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
    }
?>
<div class="container">
    <div class="row">
        <h2 class="text-primary mb-1 d-grid">
            <center>NUEVO ESTUDIANTE</center>
        </h2>
        
        <div class="col-md-6"> 
        <form method="POST" action="">

                <h3 class="text-warning mb-2 d-grid">
                    <center>DATOS ESTUDIANTE</center>
                </h3>           
                <div class="mb-3 d-grid">
                    <label>DNI</label>    
                    <input name="dniE" type="number" class="form-control" placeholder="Ingrese DNI del estudiante">
                </div>
                <div class="mb-3 d-grid">
                    <label>NOMBRES</label>    
                    <input name="nomE" class="form-control" placeholder="Ingrese nombre del Estudiante">
                </div>
                <div class="mb-3 d-grid">
                    <label>APELLIDOS</label>    
                    <input name="apeE" class="form-control" placeholder="Ingrese apellidos del Estudiante">            
                </div>
                <div class="mb-3 d-grid">
                    <label>FECHA DE NACIMIENTO</label>    
                    <input name="fecE" class="form-control" type="date" placeholder="Ingrese fecha de nacimiento del Estudiante">
                </div>
                <div class="mb-3 d-grid" >
                    <label>DIRECCION</label>    
                    <input name="dirE" class="form-control" placeholder="Ingrese dirección del Estudiante">      
                </div>
                <div class="mb-3 d-grid" >
                    <label>DEPARTAMENTO</label>                 
                    <?php   
                        $query3 = "SELECT * FROM `ubDepartamento` ORDER BY `departamento`";
                        $resultado3=$db_con->query($query3);
                    ?>
                    <select name="cbx_Departamento" id="cbx_Departamento" class="form-control" placeholder="Seleccione Departamento"> 
                        <option value="0">Seleccionar Departamento</option>
                        <?php while($row3 = $resultado3->fetch_assoc()) { ?>
                            <option value="<?php echo $row3['idDepa']; ?>"><?php echo $row3['departamento']; ?></option>
                        <?php } ?>
                    </select>                  
                </div>
                <div class="mb-3 d-grid" >
                    <label>PROVINCIA</label>                 
                    <select name="cbx_Provincia" id="cbx_Provincia" class="form-control" placeholder="Seleccione Provincia"> 
                        <option value="0">Seleccionar Provincia</option>
                    </select>                  
                </div>
                <div class="mb-3 d-grid" >
                    <label>DISTRITO</label>                  
                    <select name="cbx_Distrito" id="cbx_Distrito" class="form-control" placeholder="Seleccione Distrito"> 
                        <option value="0">Seleccionar Distrito</option>
                    </select>                  
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="text-warning mb-2 d-grid">
                    <center>DATOS APODERADO</center>
                </h3>
                <div class="mb-3 d-grid">
                    <label>DNI</label>    
                    <input name="dniA" class="form-control" type="number" placeholder="Ingrese DNI del apoderado" required="">
                </div>
                <div class="mb-3 d-grid">
                    <label>NOMBRES</label>    
                    <input name="nomA" class="form-control" placeholder="Ingrese Nombre del Apoderado" required="">
                </div>
                <div class="mb-3 d-grid">
                    <label>APELLIDOS</label>    
                    <input name="apeA" class="form-control" placeholder="Ingrese apellidos del Apoderado" required="">    
                </div>
                <div class="mb-3 d-grid">
                    <label>TELEFONO DE CONTACTO</label>    
                    <input type="number" name="telA" class="form-control" placeholder="Ingrese telefono del Apoderado" required="">
                </div>
                <div class="mb-3 d-grid" >
                    <label>CORREO DE CONTACTO</label>    
                    <input name="emailA" type="email" class="form-control" placeholder="Ingrese correo del Apoderado" required="">      
                </div>
                <div class="mb-3 d-grid" >
                    <label>DEPARTAMENTO</label>                 
                    <?php   
                        $query4 = "SELECT * FROM `ubDepartamento` ORDER BY `departamento`";
                        $resultado4=$db_con->query($query4);
                    ?>
                    <select name="cbx_Departamento2" id="cbx_Departamento2" class="form-control" placeholder="Seleccione Distrito"> 
                        <option value="0">Seleccionar Departamento</option>
                        <?php while($row4 = $resultado4->fetch_assoc()) { ?>
                            <option value="<?php echo $row4['idDepa']; ?>"><?php echo $row4['departamento']; ?></option>
                        <?php } ?>        
                    </select>                  
                </div>
                <div class="mb-3 d-grid" >
                    <label>PROVINCIA</label>                 
                    <select name="cbx_Provincia2" id="cbx_Provincia2" class="form-control" placeholder="Seleccione Provincia"> 
                        <option value="0">Seleccionar Provincia</option>
                    </select>                  
                </div>
                <div class="mb-3 d-grid" >
                    <label>DISTRITO</label>                  
                    <select name="cbx_Distrito2" id="cbx_Distrito2" class="form-control" placeholder="Seleccione Distrito"> 
                        <option value="0">Seleccionar Distrito</option>
                    </select>                  
                </div>
                <div class="mb-3 d-grid" >
                    <label>DIRECCION</label>    
                    <input name="dirA" class="form-control" placeholder="Ingrese dirección del Apoderado" required="">      
                </div>                    
                       
        </div>
        <div class="mb-4 d-grid" >
                    <button name="AgregarEstudiante" type="submit" class="btn btn-primary">Registrar Estudiante</button>     
        </div>
        </form>         
    </div> 
</div> 

<?php
?>