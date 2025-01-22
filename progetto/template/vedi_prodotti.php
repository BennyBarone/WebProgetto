<section>
    <h2 class="text-center">I gusti più amati dai nostri clienti!</h2>
    <div class="container">
        <div class="row">
            <?php foreach($templateParams["gustiMigliori"] as $gustiMigliori): ?>
                <div class="col-sm-6 mb-3 text-center">
                    <div class="border border-4 p-2 border-brown border-background">
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
                <div class="col-sm-6 mb-3 text-center">
                    <div class="border border-4 p-2 border-brown border-background">
                        <h5><?php echo $gusti["Nome_gusto"]; ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 mb-3 text-center">
            <button type="button" class="bottone-prod border-4">Tutti</button>
        </div>
        <div class="col-sm-4 mb-3 text-center">
            <button type="button" class="bottone-prod border-4">Coni</button>
        </div>
        <div class="col-sm-4 mb-3 text-center">
            <button type="button" class="bottone-prod border-4">Coppette</button>
        </div>
    </div>
</div>

</section>