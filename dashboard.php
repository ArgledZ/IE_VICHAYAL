<?php
require_once 'Conexion/dbcon.php';
session_start();
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Panel de Control</title>  
    <script language="javascript" src="js/jquery-3.6.0.min.js"></script>
    <script language="javascript">
			$(document).ready(function(){
				$("#cbx_Departamento").change(function () {
					$("#cbx_Departamento option:selected").each(function () {
						id_depa = $(this).val();
						$.post("getProvincia.php", { id_depa : id_depa }, function(data){
							$("#cbx_Provincia").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#cbx_Provincia").change(function () {
					$("#cbx_Provincia option:selected").each(function () {
						id_prov = $(this).val();
						$.post("getDistrito.php", { id_prov : id_prov }, function(data){
							$("#cbx_Distrito").html(data);
						});            
					});
				})
			});    
            $(document).ready(function(){
				$("#cbx_Departamento2").change(function () {
					$("#cbx_Departamento2 option:selected").each(function () {
						id_depa = $(this).val();
						$.post("getProvincia.php", { id_depa : id_depa }, function(data){
							$("#cbx_Provincia2").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#cbx_Provincia2").change(function () {
					$("#cbx_Provincia2 option:selected").each(function () {
						id_prov = $(this).val();
						$.post("getDistrito.php", { id_prov : id_prov }, function(data){
							$("#cbx_Distrito2").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#cb_nivel").change(function () {
					$("#cb_nivel option:selected").each(function () {
						id_nivel = $(this).val();
						$.post("getGrado.php", { id_nivel : id_nivel }, function(data){
							$("#cb_grado").html(data);
						});            
					});
				})
			});   
		</script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-collapse collapse justify-content-end">
            <?php 
                $showuser = $_SESSION['user_login'];
                $log = mysqli_query($db_con,"SELECT ADM_NOMBRES , ADM_APELLIDOS FROM `ADMINISTRATIVO` WHERE `ADM_DNI` = '$showuser'");
                $showrow=mysqli_fetch_array($log);
            ?>
            <ul class="nav navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i></i> Hola <?php echo $showrow['ADM_NOMBRES'];echo ' ';echo $showrow['ADM_APELLIDOS']; ?>!
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=registrar-matricula">
                        <i></i> Registrar Matricula
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php?page=perfil">
                        <i></i> Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i></i> Cerrar Sesión
                    </a>
                </li>
            </ul>   
        </div>
    </nav>
    
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ol class="list-group">
                    <li class="list-group-item">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><strong>Datos Principales</strong></li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=perfil" class="list-group-item list-group-item-action">
                                    Perfil
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><strong>Administracion de Estudiantes</strong></li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=agregar-estudiante" class="list-group-item list-group-item-action">
                                    Agregar Estudiante
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=todos-estudiantes" class="list-group-item list-group-item-action">
                                    Listado de Estudiantes
                                </a>
                            </li>
                        </ul>                       
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><strong>Administracion del Año Escolar</strong></li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=perfil" class="list-group-item list-group-item-action">
                                    Agregar Año Escolar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><strong>Administracion de Matriculas</strong></li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=registrar-matricula" class="list-group-item list-group-item-action">
                                    Registrar Matricula
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary"><strong>Administracion de Usuarios</strong></li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=perfil" class="list-group-item list-group-item-action">
                                    Agregar Usuario
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="dashboard.php?page=todos-usuarios" class="list-group-item list-group-item-action">
                                    Listado de Usuarios
                                </a>
                            </li>

                        </ul>
                    </li>
                </ol>
            </div>
            <div class="col-md-9">
                    <?php 
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'].'.php';
                        }else{
                        $page = 'agregar-estudiante.php';
                        }

                        if (file_exists($page)) {
                        require_once $page;
                        }else{
                        require_once '404.php';
                        }
                    ?>
            </div> 
        </div> 
    </div>  
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
?>