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
				<a href="#"><i class="fas fa-home"></i></a>
				<a href="#" id="btn-abrir-box"><i class="fas fa-search"></i></a>
				<a href="#"><i class="fas fa-users"></i></a>
				<a href="index.php?controller=Usuario&action=perfil">perfil</a>
				<a href="index.php?controller=Usuario&action=logout">salir</a>
			</nav>
		</div>
		<div class="nav">
			<label for="">
				<img src="public/imagenes/imgperfil/<?php echo $_SESSION['foto']; ?>" alt="">
			</label>
			<a href="index.php?controller=Usuario&action=perfil"><?php echo $_SESSION['usuario']; ?></a>
		</div>
		<div class="contenido" id="contenido">
			<div class="cont-post" id="cont-post">
				<p>publica</p>
				<form action="index.php?controller=Publicacion&action=registrarPublicacion" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="idusuario" value="<?php echo $res->idusuario ?>">
					<textarea name="textoPost"></textarea>
					<input type="file" name="fotoPost">
					<input type="submit" value="Publicar">
				</form>
			</div>
		</div>
		<div class="friends" id="friends">
			<ul class="listAmigos" id="listAmigos">

			</ul>
		</div>
	</div>
	<!-- VENTANAS EMERJENTES -->
	<!-- <div class="box">
		<div class="box-content">
			<a href="" class="btn-cerrar-box" id="btn-cerrar-box"><i class="fas fa-">x</i></a>
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
	<!-- <script type="text/javascript" src="public/js/popup.js"></script> -->
</body>
</html>