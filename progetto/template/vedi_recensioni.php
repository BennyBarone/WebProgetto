

<section>
    <h2 class="mt-3 text-center">Cosa dicono di noi i nostri clienti </h2>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner py-5 text-center">
            <?php foreach($templateParams["tutte_recensioni"] as $index => $recensione): ?>
            <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">  <!-- Solo la prima slide ha la classe active, così il carosello inizia da lì -->
                <p class="fs-3"><?php echo $recensione["Suggerimenti"]; ?></p>
                <p class="fs-3">Voto: <?php echo $recensione["Voto"]; ?></p>
            </div>
            <?php endforeach; ?>
            </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
         </button>
        </div>
</section>

<article class="mt-4 ms-2">
    
    <p class="fs-4 ms-2">Vuoi lasciarci anche tu una recensione?<p>
    <?php if (isUserLoggedIn()): ?>
    <div class="text-center">
      <a href="mioprofilo.php" class="btn btn-primary lasciaRecensione" id="lascia_recensione">Lascia una recensione</a>
    </div>
<?php else: ?> 
    <div class="text-center">
      <button class="btn btn-primary lasciaRecensione" id="lascia_recensione">Lascia una recensione</button>
    </div>
    <div id="campoAlert" class="alert alert-warning mt-0" style="display:none" role="alert">
        Per lasciare una recensione devi aver effettuato l'accesso.
    </div>
<?php endif; ?>  


</article>