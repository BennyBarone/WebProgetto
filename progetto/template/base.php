<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo $templateParams["titolo"]; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container-fluid border p-2 border-3 border-brown text-brown d-flex align-items-center">
            <div class="logo-container">
                <img id="logo" src="img/logo.png" alt="Gelato">
            </div>
            <h1 class="text-center flex-grow-1">Nuvole di Gelato</h1>
            <img src="img/profilo.png" alt="account">
            <img src="img/menu.png" alt="menu">
        </div>
    </header>
    <main>
        <section>
            <div>
                <img src="img/foto1.jpg" class="mx-auto d-block" alt="primafoto">
            </div>
        </section>

    </main>
</body>
</html>