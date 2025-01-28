<section> 
        <div class="position-relative">
            <img id="foto1" src="img/foto1.jpg" class="img-fluid mx-auto d-block" alt="primafoto">
            <a href="prodotti.php" id="bottProdotti" role="button" class="btn custom-btn position-absolute top-50 start-50 translate-middle">
                Scopri i nostri prodotti
            </a>
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

        <div class=" grid-layout container-fluid">
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
                <button id="scopri" type="button" class="btn btn-primary">Scopri di più</button>
                </div>
            </div>
            </section>
        </div>
        <div class="grid-layout">
            <section>
                <h2 class="mb-2">Cosa dicono di noi?</h2>
                <!--si prendono in maniera random i commenti effettuati dai clienti-->
                <ul class="list-unstyled">
                    <?php foreach($templateParams["recensioni"] as $recensioni): ?>
                        <li class="d-flex align-items-center mb-2">
                            <img id="UtenteRecensione" src="img/profilo.png" alt="account" class="me-2">
                            <?php echo $recensioni["Voto"];?>
                            <?php echo $recensioni["Suggerimenti"]; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="text-center">
                    <button id="scopri" type="button" class="btn btn-primary">Scopri di più</button>
                </div>
            </section>
        </div>

</section>
<article>
    <h2 class="mb-3"> La nostra essenza</h2>
    <div class="container-fluid ">
        <div class="row">
            <!-- Colonna 1 -->
            <div class="col-md-6">
                <div class="image-container d-flex mb-3">
                    <img src="img/latte.png" alt="Immagine 1" class="img-fluid ">
                    <div>
                        <p class="fw-bold ms-3 mb-1 mt-2">Latte fresco</p>
                        <p class=" ms-3">Utilizziamo solo latte fresco di alta qualità per garantire un gelato cremoso e genuino.</p>
                    </div>
                </div>
                <div class="image-container d-flex mb-3 ">
                    <img src="img/glutenfree.png" alt="Immagine 2" class="img-fluid me-3">
                    <div>
                        <p class="fw-bold mb-1 mt-3">Gluten free</p>
                        <p class="mb-0">Offriamo una vasta gamma di gelati e dolci senza glutine, adatti a tutti.</p>
                    </div>
                </div>
                <div class="image-container d-flex mb-3">
                    <img src="img/location.png" alt="Immagine 3" class="img-fluid me-3">
                    <div>
                        <p class="fw-bold mb-1 mt-4">Il nostro negozio</p>
                        <p class="mb-0">Un ambiente accogliente dove il gusto incontra la qualità, pronto ad accoglierti.</p>
                    </div>
                </div>
            </div>
            <!-- Colonna 2 -->
            <div class="col-md-6">
                <div class="image-container d-flex mb-3">
                    <img src="img/consegna.png" alt="Immagine 4"  class="img-fluid me-3">
                    <div>
                        <p class="fw-bold ms-2 mb-1 mt-2">Consegna</p>
                        <p class="mb-0 ms-2">Portiamo il nostro gelato direttamente a casa tua, sempre fresco e delizioso.</p>
                    </div>
                    
                </div>
                <div class="image-container d-flex mb-3">
                    <img src="img/prodotti.png" alt="Immagine 5" class="ms-2">
                    <div>
                        <p class="fw-bold ms-3 mb-1 mt-3">Prodotti freschi</p>
                        <p class="mb-0 ms-3">Frutta di stagione e ingredienti naturali per un'esperienza unica di freschezza.</p>
                    </div>
                </div>
                <div class="image-container d-flex mb-3">
                    <img src="img/tantoaltro.png" alt="Immagine 6" class="ms-2">
                    <div>
                        <p class="fw-bold ms-3 mb-1 mt-4">Molto altro da scoprire</p>
                        <p class="mb-0 ms-3">Gelati, dolci, e sorprese tutte da scoprire: c'è sempre qualcosa di nuovo ad aspettarti!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
