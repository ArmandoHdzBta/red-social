<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Red Social</title>
</head>
<body>
	<!-- CCONTENDOR PRINCIPAL -->
	<div class="content animate-color">
		<!-- CONTENIDO FORMULARIOS TAB -->
		<div class="content-form">
			<div id="iniciarSesion" class="iniciarSesion">
				<h1>Iniciar sesion</h1>
				<h2 id="error">jdj<?php echo isset($status) ? $status : "";?></h2>
				<form action="index.php?controller=Usuario&action=login" method="POST">
					<div class="form-group">
						<label for="">Correo <span class="req">*</span></label>
						<input type="email" required="" name="correo">
					</div>
					<div class="form-group">
						<label for="">Contraseña <span class="req">*</span></label>
						<input type="password" required="" name="password">
					</div>
					<input type="submit" class="btn-succes" value="Iniciar sesion">
				</form>
				<a href="#">¿Se te olvido tu contraeña?</a>
				<p>Registrate <a href="#">aqui</a></p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
	<script src="public/js/main.js"></script>
</body>
</html>