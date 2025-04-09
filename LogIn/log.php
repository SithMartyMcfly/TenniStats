<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TenniStats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main  id="fomulario">
        <form action="" class="card text-white p-5">
            <img src="../logoApp.png" alt="tenniStats" width="250px" height="250px">
            <div class="card-header bg-white text-black fw-semibold rounded-2" style="width: 100%">
                Login
            </div>
            <div id="usuario" class="my-2">
                <label for="user" class="form-label fw-semibold text-white">Usuario</label>
                <input type="text" name="nickname" class="rounded-3" required>
            </div>
            <div id="password" class="my-2">
                <label for="password" class="form-label fw-semibold text-white">Password</label>
                <input type="password" name="pass" class="rounded-3" required>
            </div>
        </form>
    </main>
</body>
</html>