<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/style.css">
	<title>Document</title>
</head>
<body>
	<div class="content-home">
		<div class="nav">
			<label for="">
				<img src="public/imagenes/default.png" alt="">
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
				<form action="">
					<textarea name="textPost" id="" cols="30" rows="10"></textarea>
					<input type="submit" value="Publicar">
				</form>
			</div>
			<div class="post" id="idpost">
				<div class="datos">
					<p><a href="">Mando Hernandez</a></p>
					<span class="">:</span>
				</div>
				<div class="cont">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore!</p>
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