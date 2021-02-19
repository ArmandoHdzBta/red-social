<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="public/css/style.css">
	<title><?php echo $_SESSION['usuario']; ?></title>
	<script src="https://kit.fontawesome.com/a665ad6c22.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="content-home">
		<!-- CONTENEDOR DE LA CABECERA -->
		<div class="header">
			<h1><?php echo $_SESSION['usuario']; ?></h1>
			<nav>
				<a href="index.php?controller=Usuario&action=home"><i class="fas fa-home"></i></a>
				<a href="#"><i class="fas fa-search"></i></a>
				<a href="#"><i class="fas fa-users"></i></a>
				<a href="#">perfil</a>
				<a href="index.php?controller=Usuario&action=logout">salir</a>
			</nav>
		</div>
		<div class="nav">
			<form action="" id="form">
				<input type="hidden" id="idusuario" value="<?php echo $_SESSION['sesion']; ?>">
			</form>
		</div>
		<div class="contenido" id="contenido pub">
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
		<div class="friends pub">
			<form action="index.php?controller=Usuario&action=actualizar" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="hidden" name="idusuario" value="<?php echo $_SESSION['sesion']; ?>">
					<input type="text" name="nombre" value="<?php echo $_SESSION['nombre'] ?>">
				</div>
				<div class="form-group">
					<label for="">Apellido paterno</label>
					<input type="text" name="app" value="<?php echo $_SESSION['app'] ?>">
				</div>
				<div class="form-group">
					<label for="">Apellido materno</label>
					<input type="text" name="apm" value="<?php echo $_SESSION['apm'] ?>">
				</div>
				<div class="form-group">
					<label for="">Usuario</label>
					<input type="text" name="usuario" value="<?php echo $_SESSION['usuario'] ?>">
				</div>
				<div class="form-group">
					<label for="">Correo</label>
					<input type="text" name="correo" value="<?php echo $_SESSION['correo'] ?>">
				</div>
				<div class="form-group">
					<label for="">Foto de perfil</label>
					<input type="file" name="foto">
				</div>
				<input type="submit" value="Actualizar perfil">
			</form>
		</div>
	</div>
	<script src="public/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="public/js/usuario.js"></script>
	<script type="text/javascript" src="public/js/publicacion.js"></script>
</body>
</html>