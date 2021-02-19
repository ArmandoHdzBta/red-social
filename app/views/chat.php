<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="public/css/style.css">
	<title>Home</title>
	<script src="https://kit.fontawesome.com/a665ad6c22.js" crossorigin="anonymous"></script>
</head>
<body>
	<!-- CONTENEDOR PRINCIPAL -->
	<div class="content-home">
		<!-- CONTENEDOR DE LA CABECERA -->
		<div class="header">
			<h1>HOME</h1>
			<nav>
				<input type="hidden" id="idusuario" value="<?php echo $_SESSION['sesion'] ?>">
				<a href="index.php?controller=Usuario&action=home"><i class="fas fa-home"></i></a>
				<a href="#"><i class="fas fa-search"></i></a>
				<a href="#"><i class="fas fa-users"></i></a>
				<a href="index.php?controller=Usuario&action=perfil">perfil</a>
				<a href="index.php?controller=Usuario&action=logout">salir</a>
			</nav>
		</div>
		<div class="nav" id="nav">

		</div>
		<div class="contenido" id="contenido">
			<div class="chat">
				<div class="mensajes">
					<div class="mensaje1">
						<p>jhgsdjsgad</p>
					</div>
					<div class="mensaje2">
						<p>jddsjhgd</p>
					</div>
				</div>
				<div class="formChat" id="formChat">
					<form action="">
						<input type="text">
						<input type="submit">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- VENTANAS EMERJENTES -->
	<!-- <div class="box">
		<div class="box-content">
			<a href="" class="btn-cerrar-box" id="btn-cerrar"><i class="fas fa-">x</i></a>
			<div class="buscador">
				<input type="text" name="buscarUsuario" id="buscarUsuario">
			</div>
			<div class="pop-list" id="pop-list">

			</div>
		</div>
	</div> -->
	<!-- ENLACES A LOS SCRIPTS -->
	<script src="public/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="public/js/publicacion.js"></script>
	<script type="text/javascript" src="public/js/usuario.js"></script>
</body>
</html>