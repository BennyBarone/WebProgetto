<section class="container mt-4">
    <h2 class="text-center">Il mio profilo</h2>
    <div class="row"> 
        <div class="col-3 px-0">
            <img class="mt-4 img-fluid" id="profilo" src="img/profilo1.png" alt="Profilo">
        </div>
        <div class="col-9">
            <?php foreach ($templateParams["mio_profilo"] as $mio_profilo): ?>
                <p class="mb-1 mt-3"><strong>Nome:</strong> <?php echo ($mio_profilo["Nome"]); ?></p>
                <p class="mb-1"><strong>Cognome:</strong> <?php echo ($mio_profilo["Cognome"]); ?></p>
                <p class="mb-1"><strong>Numero di telefono:</strong> <?php echo ($mio_profilo["Numero_cell"]); ?></p>
                <p class="mb-1"><strong>Email:</strong> <?php echo ($mio_profilo["E_mail"]); ?></p>
                
        </div>
    </div>
    <div>
        <p> <strong>Punti accumulati:</strong> <?php echo ($mio_profilo["Punti_accumulati"]); ?></p>
        <?php endforeach; ?>
    </div>
    
    <p class="mt-5">Vuoi cambiare la tua password?</p>
   

    <div class="text-center">
        <a href="#" data-bs-toggle="collapse" data-bs-target="#demo"  class="btn btn-primary mb-0 cambia_password">Cambia password</a>
    </div>
    <div id="demo" class="collapse mt-3">
        <form class="contact-form iscrizione-form custom-input " action="mioprofilo.php" method="POST">
            <div class="mb-1">
                <label for="password" class="form-label mb-0"> Nuova password</label>
                <input type="password" class="form-control mb-1" name="nuova_password" placeholder="Nuova password">
                <label for="password" class="form-label mb-0"> Conferma nuova password</label>
                <input type="password" class="form-control" name="conferma_nuova_password" placeholder="Conferma">
            </div>
            <button type="submit" class="btn btn-primary mt-3 cambia_password">Conferma</button>
          </form>
    
    </div>
    <?php if(isset($templateParams["successo"])): ?>
        <p class="text-success"><?php echo $templateParams["successo"]; ?></p>
    <?php endif; ?>
    <?php if(isset($templateParams["erroreRegister"])): ?>
        <p class="text-brown"><?php echo $templateParams["erroreRegister"]; ?></p>
    <?php endif; ?>
    
</section>
