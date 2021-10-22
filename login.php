<?php require_once 'Conexion/dbcon.php'; 
session_start();
$color="#2595AB";
if (isset($_POST['login'])) {
    $usuario= $_POST['usuario'];
    $input_arr = array();
    $contrasena= $_POST['contrasena'];
    $query = "SELECT * FROM `usuario` WHERE `usuario` = '$usuario'";
			$result = mysqli_query($db_con, $query);
			if (mysqli_num_rows($result)==1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['CONTRASENA']==($contrasena)) {
                    if ($row['TIPODEUSUARIO']=='1') {
						$_SESSION['user_login']=$usuario;
						header('Location: dashboard.php');
					}else{
						$status_inactive = "No administrativo!";
					}
                    
				}else{
					$error_ingreso= "Usuario o Contraseña Incorrecta!!";	
				}
			}else{
				$error_usuario= "Usuario no Registrado!!!";
			}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background: <?php echo $color?>;    
        }
        .bg{
            background-image: url(img/fachada.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    
    
    
    <title>Iniciar Sesion</title>
</head>
<body>

<div class="container w-75 bg-primary mt-5">
        <div class="row align-items-stretch" style="background: <?php echo $color?>;">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded-end" style="border-radius: 50px;">
            </div>
            <div class="col bg-white p-5 rounded-start" style="border-radius: 50px;" >           
                <div class="row ">
                    <div class="col-3 rounded">
                        <center>
                            <img src="img/fachada2.jpg" height="60" alt="" />
                        </center>
                    </div>
                    <div class="col-3 rounded">
                        <center><img src="img/fachada2.jpg" height="60" alt="" /></center>
                    </div>
                    <div class="col-3 rounded">
                        <center><img src="img/fachada2.jpg" height="60" alt="" /></center>
                    </div>
                    <div class="col text-end">                   
                        <img src="img/logo.png" height="60" alt="" />
                    </div>
                </div>
                <h4 class="fs-bold text-center p-1" style="color:<?php echo $color?>; font-size:300%;">
                    <strong>Portal Intranet</strong> 
                    <br>
                </h4>
                
                <?php include 'alertalogin.php'?>
                
                <center>INICIAR SESION</center>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="user" class="form-label">Usuario</label>
                        <input type="user" class="form-control" name="usuario" placeholder="Ingrese su usuario" required />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="Ingrese su contraseña" required/>
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" name="connected" class="form-check-input">                       
                        <Label for="connected" class="form-check-label">Mantenerme conectado</-Label>
                    </div>
                    <div class="mb-4 d-grid">    
                        <button type="submit" name="login" class="btn btn btn-primary">Iniciar sesión</button>  
                    </div>
                    <div class="mb-4 d-grid">
                        <button href="#" class="btn btn-outline-primary">
                            Recuperar contraseña
                        </button>
                        </span>
                    </div>
                </form>             
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
?>