<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $templateParams["titolo"]; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css?v=254">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <div class="container-fluid border p-2 border-3 border-brown text-brown d-flex align-items-center">
            <div class="logo-container">
                <img id="logo" src="img/logo.png" alt="Gelato">
            </div>
            <h1 class="text-center flex-grow-1">Nuvole di Gelato</h1>
            <img src="img/profilo.png" alt="account">
            <img src="img/menu.png" alt="immagine" class="clickable-image" id="menu">
        </div>
        <div class="overlay" id="overlay">
            <div class=" side-window ">
            <button class="close-button" id="closeBtn">&times;</button>
            <ul class="text-center">
                <li><a href="index.php">Home</a></li>
                <li><a href="tessera.php">Cartà fedeltà</a></li>
                <li><a href="prodotti.php">I nostri prodotti</a></li>
                <li><a href="contatti.php">Contatti</a></li>
                <li><a href="#">Cosa dicono di noi</a></li>  
            </ul>
            <button id="acquista" type="button" class="btn btn-primary btn-lg">Acquista</button>
            </div>
        </div>
        <script src="javascript/script.js" defer></script>
    </header>
    <main>
    <?php
    // Controlla se è stato definito il template da caricare
    if (isset($templateParams["nome"])) {
        require $templateParams["nome"];
    } else {
        echo "<p>Errore: nessun contenuto da mostrare.</p>";
    }
    ?>
    </main>
    <footer>
        <h2 >🍦Nuvole di gelato🍦</h2>
            <p class="mt-3 mb-1">Via Corso Giuseppe Garibaldi, 159, 61034 Fossombrone PU- Tel: 06 12345678</a></p>
            <div >
                <p  class="mb-1" >Aperti tutti i giorni dalle 10:00 alle 22:00</p>
                <p  class="mb-1">
                    <a  href="prodotti.php">Menu</a> | 
                    <a href="contatti.php">Contatti</a>
                </p>
                
                <p class="mb-0 pb-4">&copy; 2025 Nuvole di gelato. Tutti i diritti riservati.</p>
            </div>
    </footer> 
</body>
</html>