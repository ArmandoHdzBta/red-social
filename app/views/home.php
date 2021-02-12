<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="public/css/style.css">
	<title>Document</title>
</head>
<body>
	<div class="content-home">
		<div class="nav">
			<label for="">
				<img src="public/imagenes/imgperfil/<?php echo $res->foto_perfil; ?>" alt="">
			</label>
			<a href=""><?php echo $res->usuario; ?></a>
			<ul>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li><a href="">5</a></li>
			</ul>
		</div>
		<div class="contenido">
			<div class="cont-post">
				<p>publica</p>
				<form action="index.php?controller=Publicacion&action=registrarPublicacion" method="POST">
					<input type="hidden" name="idusuario" value="<?php echo $res->idusuario ?>">
					<textarea name="textoPost" cols="30" rows="10"></textarea>
					<input type="file" name="fotoPost">
					<input type="submit" value="Publicar">
				</form>
			</div>
			<div class="post" id="idpost">
				<div class="datos">
					<p><a href=""><?php echo $res->usuario; ?></a></p>
					<span class="">:</span>
				</div>
				<div class="cont">
					<p></p>
					<img src="" alt="">
				</div>
				<div class="like-comment">
					<button>like</button>
					<button>coment</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>