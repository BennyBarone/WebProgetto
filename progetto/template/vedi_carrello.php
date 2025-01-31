<section>
    <h2 class="text-center">Il mio Carrello</h2>

    <div class="container mt-4">
        <div class="row">
        <?php foreach ($templateParams["riepilogo_ordine"] as $riepilogo_ordine): ?>
            <div class="col-md-4 mb-4">
                <div class="box border border-4 p-3 border-brown">
                    <img src="img/<?php echo strtolower($riepilogo_ordine['Tipologia_prodotto']). '_' . strtolower($riepilogo_ordine['Grandezza']); ?>.png" class="box-img-top" alt="Immagine Prodotto">
                    <p class="box-title mb-0"><strong><?php echo $riepilogo_ordine["Tipologia_prodotto"]; ?> <?php echo $riepilogo_ordine["Grandezza"]; ?></strong></p>
                    <p class="box-tex mb-0">Gusti: <strong><?php echo $riepilogo_ordine["Gusto"]; ?></strong></p>
                    <p class="box-text mb-0">Quantità Selezionata: <strong><?php echo $riepilogo_ordine["Quantita"]; ?></strong></p>
                    <p class="box-text mb-0">Prezzo Unitario: <strong><?php echo $riepilogo_ordine["PrezzoUnitario"]; ?>€</strong></p>
                    <p class="box-text mb-0">Prezzo Totale: <strong><?php echo $riepilogo_ordine["PrezzoTotale"]; ?>€</strong></p>

                    <div class="text-center">
                        <button class="btn btn-primary acquistaprod" data-tipologia="<?php echo $riepilogo_ordine["Tipologia_prodotto"]; ?>"
                        data-grandezza="<?php echo $riepilogo_ordine["Grandezza"]; ?>">Rimuovi</button>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>  
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-6 text-center">
                <a href="prodotti.php" role="button" class="btn btn-primary acquistaprod"> Continua gli Acquisti </a>
            </div>
            <div class="col-6 text-center">
                <button class="btn btn-primary acquistaprod"> Procedi al Pagamento </button>
            </div>
        </div>
    </div>

</section>
