<?php
?>
<!DOCTYPE html>
<html lang="es_ES">
	<head>
		<title>I.E. 10847 VICHAYAL - TUMAN</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/estilo.css"/>
		<script src="js/jquery.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
	</head>
	<body>
		<div id="contenedor">
			<div class="row">
				<div>
					<div class="col-2">
						<center><img src="img/logo.png" height="100px"/></center>			
					</div>
					<div class="col-10">
					<nav id="menu_h">			
						<ul>
							<li><a href="#">Sobre Nosotros</a></li>
							<li><a href="#">Recomendaciones</a></li>
							<li><a href="#">Nivel Primaria</a></li>
							<li><a href="#">Nivel Secundaria</a></li>
							<li><a href="#">Soporte</a></li>
							<li><a href="#">Matriculas 2022</a></li>			
							<li><a href="#">Bliblioteca</a></li>
							<li><a href="login.php"><strong>INTRANET</strong></a></li>
						</ul>
					</nav>
				</div>
		<div id="contenedor">			
			<div class="main">
				<div class="slides">
					<img src="img/imagen1.jpg" alt="">
					<img src="img/imagen2.jpg" alt="">
					<img src="img/imagen3.jpg" alt="">
					<img src="img/imagen4.jpg" alt="">			
				</div>
				<script src="js/jquery.slides.min.js"></script>
				<script src="js/jquery.slides.js"></script>
				<script>
					$(function(){
				  		$(".slides").slidesjs({
							play: {
								active: true,						
								effect: "slide",						
								interval: 3000,						
								auto: true,
								swap: true,						
								pauseOnHover: false,						
								restartDelay: 2500						
							}
						});
					});
				</script>
			</div>
			

			<div class="row">
				<footer class="row">
					<div class="interior">
						<div class="col-4">
							<h2>Nosotros</h2>
							<p>Somos un colegio ubicado Centro Poblado Vichayal, ubicado en el distrito de Tuman, provincia de Chiclayo. </p>
							<a href="#">>> Contáctanos</a>
						</div>
						<div class="col-4">
							<h2>Enlaces</h2>
							<div class="col-6">
								<ul>
									<li><a href="index.html">Inicio</a></li>
									<li><a href="#">Nosotros</a></li>
									<li><a href="#">Servicios</a></li>
								</ul>
							</div>
							<div class="col-6">
								<ul>
									<li><a href="#">Contáctanos</a></li>
									<li><a href="login.php">Intranet</a></li>
								</ul>
							</div>
						</div>
						<div class="col-4">
							<h2>Contáctanos</h2>
							<p>999-999-999</p>
							<p>direccion@vichayal.com</p>
							<p>Calle Santa Rosa S/N</p>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</body>
</html>