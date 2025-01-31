<section>
    <h2 class="text-center">Il mio Carrello</h2>

    <div class= "container mt-4">
        <?php foreach ($templateParams["riepilogo_ordine"] as $riepilogo_ordine): ?>
            <div class="box border border-4 p-3 border-brown">
                <img src= "img/<?php echo strtolower($riepilogo_ordine['Tipologia_prodotto']). '_' . strtolower($riepilogo_ordine['Grandezza']); ?>.png " class="box-img-top" alt="Immagine Prodotto">
                <p class="box-title"><strong><?php echo $riepilogo_ordine["Tipologia_prodotto"]; ?> <?php echo $riepilogo_ordine["Grandezza"]; ?></strong></p>
                <p class="box-text">Gusti Selezionati: <strong><?php echo $riepilogo_ordine["Gusto"]; ?></strong></p>
                <p class= "box-text">Quantità Selezionata: <?php echo $riepilogo_ordine["Quantita"]; ?></p>
                <p class= "box-text"> Prezzo Unitario: <?php echo $riepilogo_ordine["PrezzoUnitario"]; ?>€  Prezzo Totale: <?php echo $riepilogo_ordine["PrezzoTotale"]; ?>€ </p>

                <button class="btn btn-primary acquistaprod"> Rimuovi </button>
            <? endforeach; ?>    
</section>