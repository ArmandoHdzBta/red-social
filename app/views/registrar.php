<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
</head>
<body>
<div id="registrarse">
    <h1>Registrarse</h1>
    <form action="index.php?controller=Usuario&action=registrar" method="POST">
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
</div>
</body>
</html>


