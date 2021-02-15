<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Registrarse</title>
</head>
<body>
    <div class="content">
        <div class="registrarse" id="registrarse">
            <h1>Registrarse</h1>
            <h2 id="success"><?php echo isset($status) ? $status : "ss";?></h2>
            <form action="index.php?controller=Usuario&action=register" method="POST">
                <div class="form-group">
                    <label for="">Nombre <span class="req">*</span></label>
                    <input type="text" name="nombre" required="">
                </div>
                <div class="form-group">
                    <label for="">Apellido paterno <span class="req">*</span></label>
                    <input type="text" name="app" required="">
                </div>
                <div class="form-group">
                    <label for="">Apellido materno <span class="req">*</span></label>
                    <input type="text" name="apm" required="">
                </div>
                <div class="form-group">
                    <label for="">Correo <span class="req">*</span></label>
                    <input type="email" name="correo" required="">
                </div>
                <div class="form-group">
                    <label for="">Usuario <span class="req">*</span></label>
                    <input type="text" name="usuario" required="">
                </div>
                <div class="form-group">
                    <label for="">Contraseña <span class="req">*</span></label>
                    <input type="password" name="password" required="">
                </div>
                <div class="form-group">
                    <label for="">Repetir contraseña <span class="req">*</span></label>
                    <input type="password" name="repPassword" required="">
                </div>
                <input type="submit" class="btn-succes" value="Registrarse">
            </form>
            <a href="index.php?controller=Usuario&action=iniciarsesion">¿Ya tienes cuenta?. Inicia sesion</a>
        </div>
    </div>

    <script src="public/js/jquery-3.5.1.min.js"></script>
    <script src="public/js/registrar.js"></script>
</body>
</html>


