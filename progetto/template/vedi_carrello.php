<section>
    <h2 class="text-center">Il mio Carrello</h2>

    <?php if ($_SESSION['cart_count'] <= 0): ?>
        <p class="text-center">Il tuo carrello è <strong>vuoto</strong>, continua a fare acquisti</p>
        <div class="text-center">
            <a href="prodotti.php" role="button" class="btn btn-primary acquistaprod"> Continua a fare Acquisti </a>
        </div>

    <?php else: ?>
    <div class="container mt-4">
        <div class="row">
        <?php foreach ($templateParams["riepilogo_ordine"] as $riepilogo_ordine): ?>
            <div class="col-md-4 mb-4">
                <div class="box border border-4 p-3 border-brown">
                    <img src="img/<?php echo strtolower($riepilogo_ordine['Tipologia_prodotto']). '_' . strtolower($riepilogo_ordine['Grandezza']); ?>.png" class="box-img-top" alt="Immagine Prodotto">

                    <form action="carrello.php" method="POST">
                    <p class="box-title mb-0"><strong><?php echo $riepilogo_ordine["Tipologia_prodotto"]; ?> <?php echo $riepilogo_ordine["Grandezza"]; ?></strong></p>
                    <p class="box-tex mb-0">Gusti: <strong><?php echo $riepilogo_ordine["Gusto"]; ?></strong></p>
                    <p class="box-text mb-0">Quantità Selezionata: <strong><?php echo $riepilogo_ordine["Quantita"]; ?></strong></p>
                    <p class="box-text mb-0">Prezzo Unitario: <strong><?php echo $riepilogo_ordine["PrezzoUnitario"]; ?>€</strong></p>
                    <p class="box-text mb-0">Prezzo Totale: <strong><?php echo $riepilogo_ordine["PrezzoTotale"]; ?>€</strong></p>

                    <!--Dati da inviare con Post a carrello.php-->
                    <input type="hidden" name="tipologia" value="<?php echo $riepilogo_ordine["Tipologia_prodotto"]; ?>">
                    <input type="hidden" name="grandezza" value="<?php echo $riepilogo_ordine["Grandezza"]; ?>">
                    <input type="hidden" name="gusto" value="<?php echo $riepilogo_ordine["Gusto"]; ?>">
                    <input type="hidden" name="quantita" value="<?php echo $riepilogo_ordine["Quantita"]; ?>">

                    <div class="text-center">
                        <button type= "submit" class="btn btn-primary acquistaprod">Rimuovi</button>
                    </div>
                    </form>
                </div>
        </div>
        <?php endforeach; ?> 

        <div class="container text-center">
        <div class="text-center">
            <div class="border border-4 border-brown d-inline-block p-1">
                <p><strong>Prezzo Totale: <?php echo number_format($templateParams["mostra_prezzo"], 2, ',', '.'); ?>€</strong></p>
            </div>
        </div>
        </div>

        
    <div class="container mb-5">
        <div class="row p-3">
            <div class="col-6 text-center">
                <a href="prodotti.php" role="button" class="btn btn-primary acquistaprod"> Continua a fare Acquisti </a>
            </div>
            <div class="col-6 text-center">
                <a href="pagamento.php" role="button" class="btn btn-primary acquistaprod"> Procedi al Pagamento </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
