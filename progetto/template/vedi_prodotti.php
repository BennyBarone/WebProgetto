<section>
    <h2 class="text-center">I gusti più amati dai nostri clienti!</h2>
    <div class="container">
        <div class="row">
            <?php foreach($templateParams["gustiMigliori"] as $gustiMigliori): ?>
                <div class=" col-6 col-sm-3 mb-3 text-center">
                    <div class="border border-4 p-3 border-brown border-background">
                        <h5 ><?php echo $gustiMigliori["Nome_gusto"]; ?></h5>
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
        <?php foreach($templateParams["prodotti"] as $prodotti): ?>
            <div class="col-md-4 mb-4">
                <div class="box border border-4 p-3 border-brown">
                    <img src="img/<?php echo strtolower($prodotti['Tipologia_prodotto']) . '_' . strtolower($prodotti['Grandezza']); ?>.png" class="box-img-top" alt="Immagine Prodotto">
                    <div class="box-body text-center">
                        <p class="box-title"><strong><?php echo $prodotti["Tipologia_prodotto"]; ?> <?php echo $prodotti["Grandezza"]; ?></strong></p>
                        <p class="box-text">Prezzo: <strong><?php echo $prodotti["Prezzo"]; ?>€</strong></p>

                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <?php 
                        $numDropdown=($prodotti["Grandezza"]=== "Piccolo" || $prodotti["Grandezza"] === "Piccola") ? 2 : 3;
                        for($i=1; $i <= $numDropdown; $i++): ?>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle border-2 scegliGusto" type="button" id="dropdownMenuButton_<?php echo $prodotti['Tipologia_prodotto'] . '_' . $prodotti['Grandezza']. '_' . $i; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                Gusto <?php echo $i; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-scrollable" aria-labelledby="dropdownMenuButton_<?php echo $prodotti['Tipologia_prodotto'] . '_' . $prodotti['Grandezza'] . '_' . $i; ?>">
                                <?php foreach($templateParams["listaGusti"] as $listaGusti): ?>
                                    <li>
                                        <a class="dropdown-item" href="#" data-gusto="<?php echo htmlspecialchars($listaGusti["Nome_gusto"], ENT_QUOTES); ?>" onclick="selectGusto('<?php echo $listaGusti['Nome_gusto']; ?>', 'dropdownMenuButton_<?php echo $prodotti['Tipologia_prodotto'] . '_' . $prodotti['Grandezza'] . '_' . $i; ?>')">
                                            <?php echo htmlspecialchars($listaGusti["Nome_gusto"]); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endfor; ?>
                    </div>

                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <p class="mb-0 me-2 p-3">Quantità:</p>
                            <input type="number" name="quantita" id="quantita" min="1" max="10" value="1" class="form-control w-auto"/>
                        </div>
                        <button id="acquistaprod" class="btn btn-primary">Aggiungi al carrello</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</section>