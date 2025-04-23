<?php 
session_unset();
echo 'estas en registro';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TenniStats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <main  id="fomulario">
        <form class="text-white p-5 rounded-4 border border-black" >
            <img src="../favicon.ico" alt="tenniStats" width="250px" height="250px">
            <div class="card-header bg-white text-black fw-semibold rounded-2 py-4 mb-4" style="width: 100%">
                Registro
            </div>
            <div id="usuario" class="my-2">
                <label for="user" class="form-label fw-semibold text-white">Nombre de Usuario</label>
                <input type="text" name="nickname" class="rounded-3" id="nickname" required>
            </div>
            <div id="password" class="my-2">
                <label for="password" class="form-label fw-semibold text-white">Introduzca una clave</label>
                <input type="password" name="pass" class="rounded-3" id="pass" required>
            </div>
            <div id="password" class="my-2">
                <label for="password" class="form-label fw-semibold text-white">Introduzca un email</label>
                <input type="email" class="rounded-3" name="mail" id="mail" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-4 rounded-3">Registrar</button>
        </form>
    </main>
    
</body>
</html>
