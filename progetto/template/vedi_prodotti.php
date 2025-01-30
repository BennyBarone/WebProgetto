<section>
    <h2 class="text-center">I gusti più amati dai nostri clienti!</h2>
    <div class="container">
        <div class="row">
            <?php foreach($templateParams["gustiMigliori"] as $gustiMigliori): ?>
                <div class="col-6 col-sm-3 mb-3 text-center">
                    <div class="border border-4 p-3 border-brown border-background">
                        <h5><?php echo $gustiMigliori["Nome_gusto"]; ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!--se clicco sopra scorpili tutti devono apparire tutti i gusti presenti in gelateria-->
    <div class="text-center">
        <a href="#" data-bs-toggle="collapse" data-bs-target="#demo" class="text-decoration-underline link-black">
            Scoprili tutti
        </a>
    </div>
    <div id="demo" class="collapse mt-3">
        <div class="container">
            <div class="row">
                <?php foreach($templateParams["gusti"] as $gusti): ?>
                    <div class="col-6 col-sm-3 mb-3 text-center">
                        <div class="border border-4 p-2 border-brown border-background">
                            <h5><?php echo $gusti["Nome_gusto"]; ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container"> 
        <!-- Form per i bottoni di filtro, faccio una mappa per i bottoni -->
        <form method="GET" action="prodotti.php" class="d-flex flex-wrap">
            <?php
            $bottoni = ["Tutti"=> "Tutti", "Coni" =>"Cono", "Coppette"=>"Coppetta", "Brioches"=>"Brioches", "Vaschette"=>"Vaschetta", "Torte"=>"Torta"];
            $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'Tutti';

            foreach ($bottoni as $nomeBottone => $valoreDB) {
                $selectedClass = ($filtro === $valoreDB) ? 'selected' : '';
                echo '<div class="col-4 col-sm-2 mb-3 text-center">
                        <button type="submit" name="filtro" value="'.$valoreDB.'" class="bottone-prod border-4 '.$selectedClass.'">'.$nomeBottone.'</button>
                      </div>';
            }
            ?>
        </form>
    </div>

    <div class="container mt-4">
    <div class="row">
        <?php foreach ($templateParams["prodotti"] as $prodotti): ?>
            <div class="col-md-4 mb-4">
                <div class="box border border-4 p-3 border-brown">
                    <img src="img/<?php echo strtolower($prodotti['Tipologia_prodotto']) . '_' . strtolower($prodotti['Grandezza']); ?>.png" class="box-img-top" alt="Immagine Prodotto">
                    <div class="box-body text-center">
                        <p class="box-title"><strong><?php echo $prodotti["Tipologia_prodotto"]; ?> <?php echo $prodotti["Grandezza"]; ?></strong></p>
                        <p class="box-text">Prezzo: <strong><?php echo $prodotti["Prezzo"]; ?>€</strong></p>

                        <!-- Inizio del form -->
                        <form action="ordine.php" method="POST">
                        <input type="hidden" name="tipologia" value="<?php echo $prodotti['Tipologia_prodotto']; ?>">
                        <input type="hidden" name="grandezza" value="<?php echo $prodotti['Grandezza']; ?>">

                        <div class="d-flex justify-content-center gap-2 mb-3">
                        <?php
                        $numDropdown = ($prodotti["Grandezza"] === "Piccolo" || $prodotti["Grandezza"] === "Piccola") ? 2 : 3;
                        for ($i = 1; $i <= $numDropdown; $i++): ?>
                        <div class=" dropdown">
                                 <select name="gusto<?php echo $i; ?>" class="form-select form-select-sm scegliGusto">

                                <option value="">Gusto <?php echo $i; ?></option>
                                    <?php foreach ($templateParams["listaGusti"] as $listaGusti): ?>
                                <option value="<?php echo htmlspecialchars($listaGusti["Nome_gusto"], ENT_QUOTES); ?>">
                             <?php echo htmlspecialchars($listaGusti["Nome_gusto"]); ?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                         <?php endfor; ?>
                        </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <label for="quantita_<?php echo $prodotti['Tipologia_prodotto'] . '_' . $prodotti['Grandezza']; ?>" class="me-2">Quantità:</label>
        <input type="number" name="quantita" id="quantita_<?php echo $prodotti['Tipologia_prodotto'] . '_' . $prodotti['Grandezza']; ?>" min="1" max="10" value="1" class="form-control w-auto">
    </div>
    <!-- Messaggio di avviso -->
    <div id="loginAlert" class="alert alert-warning" style="display: none;" role="alert">
        Per acquistare i nostri prodotti devi aver effettuato l'accesso.
    </div>
    <!-- Messaggio di avviso per campi non selezionati -->
    <div id="campoAlert" class="alert alert-warning" style="display: none;" role="alert">
        Seleziona tutti i gusti prima di aggiungere al carrello.
    </div>


    <button type="submit" class="btn btn-primary acquistaprod" 
        data-tipologia="<?php echo $prodotti['Tipologia_prodotto']; ?>" 
        data-grandezza="<?php echo $prodotti['Grandezza']; ?>" 
        data-num-dropdown="<?php echo $numDropdown; ?>">
        Aggiungi al carrello
        </button>
        </form>
    <!-- Fine del form -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>
