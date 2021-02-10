<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Red Social</title>
</head>
<body>
	<!-- CCONTENDOR PRINCIPAL -->
	<div class="content">
		<!-- TABS -->
		<ul class="content-tabs">
			<li class="tab"><a href="#iniciarSesion">Iniciar secion</a></li>
			<li class="tab"><a href="#registrarse">Registrarse</a></li>
		</ul>
		<!-- CONTENIDO FORMULARIOS TAB -->
		<div class="content-tab-form">
			<div id="iniciarSesion" class="iniciarSesion">
				<h1>Iniciar sesion</h1>
				<h2><?php echo isset($datos) ? $datos: "";?></h2>
				<form action="index.php?controller=Usuario&action=login" method="POST">
					<div class="form-group">
						<label for="">Usuario <span class="req">*</span></label>
						<input type="text" required="" name="usuario">
					</div>
					<div class="form-group">
						<label for="">Contraseña <span class="req">*</span></label>
						<input type="password" required="" name="password">
					</div>
					<input type="submit" class="btn-succes" value="Iniciar sesion">
				</form>
				<p class="forgot-password"><a href="#">¿Se te olvido tu contraeña?</a></p>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
</body>
</html>