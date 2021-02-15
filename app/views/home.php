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
				<a href="#"><i class="fas fa-search"></i></a>
				<a href="#"><i class="fas fa-users"></i></a>
				<a href="#">perfil</a>
				<a href="#">salir</a>
			</nav>
		</div>
		<div class="nav">
			<label for="">
				<img src="public/imagenes/imgperfil/<?php echo $res->foto_perfil; ?>" alt="">
			</label>
			<a href=""><?php echo $res->usuario; ?></a>
			<ul>
				<li><a href="">Mensajes</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
			</ul>
		</div>
		<div class="contenido">
			<div class="cont-post">
				<p>publica</p>
				<form action="index.php?controller=Publicacion&action=registrarPublicacion" method="POST" enctype="">
					<input type="hidden" name="idusuario" value="<?php echo $res->idusuario ?>">
					<textarea name="textoPost"></textarea>
					<input type="file" name="fotoPost">
					<input type="submit" value="Publicar">
				</form>
			</div>
			<div class="post" id="idpost">

			</div>
			<div class="post" id="idpost">
				<div class="datos">
					<p><a href="#">usuario</a></p>
					<a href="#"><i class="fas fa-ellipsis-v"></i></a>
				</div>
				<div class="cont">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, reiciendis.</p>
					<img src="public/imagenes/imgperfil/default.png" alt="">
				</div>
				<div class="like">
					<button><i class="fas fa-heart"></i> 11000</button>
				</div>
				<div class="coment">
					<button><i class="fas fa-comment"></i> 20000</button>
				</div>
			</div>
		</div>
		<div class="friends">
			<ul>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
				<li><a href="">6</a></li>
			</ul>
		</div>
	</div>
	<!-- ENLACES A LOS SCRIPTS -->
	<script src="public/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="public/js/publicacion.js"></script>
</body>
</html>