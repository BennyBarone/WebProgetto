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
                <div class="box">
                    <img src="img/foto.png" class="box-img-top" alt="Immagine prodotto">
                    <div class="box-body text-center">
                        <p class="box-title">Prodotto: <?php echo $prodotti["Tipologia_prodotto"]; ?> <?php echo $prodotti["Grandezza"]; ?></p>
                        <p class="box-text">Prezzo: €<?php echo $prodotti["Prezzo"]; ?></p>
                        <button class="btn btn-primary">Aggiungi al carrello</button>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</section>