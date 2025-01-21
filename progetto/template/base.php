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
            <img src="img/menu.png" alt="immagine" class="clickable-image" id="menu">
        </div>
        <div class="overlay" id="overlay">
            <div class=" side-window">
            <button class="close-button" id="closeBtn">&times;</button>
            <ul class="text-center">
                <li><a href="#">Home</a></li>
                <li><a href="#">Cartà fedeltà</a></li>
                <li><a href="#">I nostri prodotti</a></li>
                <li><a href="#">Contatti</a></li>
                <li><a href="#">Cosa dicono di noi</a></li>
                
            </ul>
            </div>
        </div>
    </header>
    <main>
        <section>
        <div class="position-relative">
            <img id="foto1" src="img/foto1.jpg" class="img-fluid mx-auto d-block" alt="primafoto">
            <button id="bottProdotti" type="button" class="btn custom-btn position-absolute top-50 start-50 translate-middle">
                    Scopri i nostri prodotti
            </button>
        </div>

                <h2>Benvenuti nel mondo di Nuvole di Gelato</h2>
                <p> 
                    <span class="d-block">Dal 1943, Nuvole di Gelato rappresenta una storia di tradizione, passione e qualità. 
                    Nata nel cuore di Fossombrone, una pittoresca cittadina in provincia di Pesaro Urbino, 
                    la nostra gelateria è più di un semplice luogo dove gustare il gelato: è un punto d’incontro, 
                    un’esperienza che abbraccia il sapore autentico di una tradizione che si tramanda di generazione in generazione.</span>
                    <span class="d-block">Ogni ingrediente usato nella creazione del nostro gelato è scelto con cura dai migliori produttori locali, 
                    per garantire freschezza, genuinità e un gusto inimitabile.</span>
                    <span class="d-block">Il nostro obiettivo è quello di regalare un momento di felicità a chi sceglie i nostri gelati.</span>
                    <span class="d-block">Venite a trovarci e lasciatevi conquistare dalla magia dei nostri gusti, dai classici intramontabili alle creazioni più innovative.
                    E per chi desidera godersi i nostri gelati comodamente a casa, 
                    offriamo anche la possibilità di acquistarli online: qualità artigianale direttamente alla vostra porta.</span>
                </p>

                <div class="container-fluid">
            <section>
            <div class="row align-items-center">
                <!-- Colonna Immagine -->
                <div class="col-sm-4 d-flex justify-content-center">
                    <img id="tessera" src="img/tessera.jpeg" class="custom-image p-3" alt="Tessera Fedeltà">
                </div>
                <!-- Colonna Testo -->
                <div class="col-sm-8 text-center">
                <h2>La tua carta fedeltà: Gelato, Sorrisi e Premi</h2>
                <p>
                    <span class="d-block">Registrati al nostro sito e scopri la dolcezza di premi esclusivi!</span>
                    <span class="d-block">Ogni acquisto accumula punti che ti avvicinano a vantaggi unici e irresistibili. Perché ogni momento con il nostro gelato merita di essere speciale, con un pizzico di gratitudine in più.</span>
                </p>
                <button id="scopriTessera" type="button" class="btn btn-primary">Scopri di più</button>
                </div>
            </div>
            </section>
</div>
        </section>
    </main>
   
    <script src="javascript/script.js"></script>
</body>
</html>