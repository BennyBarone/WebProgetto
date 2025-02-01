<section class="container mt-4">
    <h2 class="text-center">Il mio profilo</h2>
    <div class="row"> 
    <div class="col-3 col-lg-4 px-0">
        <img class="mt-4 img-fluid" id="profilo" src="img/profilo2.png" alt="Profilo">
    </div>
    <div class="col-9 col-lg-4 info_profilo">
        <?php foreach ($templateParams["mio_profilo"] as $mio_profilo): ?>
            <p class="mb-1 mt-3"><strong>Nome:</strong> <?php echo ($mio_profilo["Nome"]); ?></p>
            <p class="mb-1"><strong>Cognome:</strong> <?php echo ($mio_profilo["Cognome"]); ?></p>
            <p class="mb-1"><strong>Numero di telefono:</strong> <?php echo ($mio_profilo["Numero_cell"]); ?></p>
            <p class="mb-1"><strong>Email:</strong> <?php echo ($mio_profilo["E_mail"]); ?></p>
    </div>
    <div class="col-12 col-lg-4 position-relative mt-2">
        <img id="foto_tessera" src="img/foto_tessera.jpg" class="img-fluid ms-0 rounded" alt="primafoto">
        <p class="position-absolute top-0 start-0 position_punti translate-middle-y"> 
            <strong>Punti accumulati:</strong> <?php echo ($mio_profilo["Punti_accumulati"]); ?>
        </p>
    </div>
    <?php endforeach; ?>
</div>

    <button type="button" class=" mt-4 ms-3 btn btn-primary cambia_password lascia_recensione" data-bs-toggle="modal" data-bs-target="#recensioneModal">
        Lascia una recensione
    </button>
    
    <div class="modal fade" id="recensioneModal" tabindex="-1" aria-labelledby="recensioneModalLabel" aria-hidden="true">
        <!-- (contenitore della finestra) -->
        <div class="modal-dialog modal-dialog-centered">
               <!-- Contenuto della modale -->
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="recensioneModalLabel">Lascia una recensione</p>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <!-- Form per la recensione -->
                <form action="mioprofilo.php" method="POST">
                    <div class="mb-3">
                        <p for="valutazione" class="form-label">Valutazione</p>
                        <input type="tenumberxt" class="form-control" name="voto" placeholder="Da 1 a 10" >
                        </select>
                    </div>
                    <div class="mb-2">
                        <p for="commento" class="form-label">Commento</p>
                        <textarea class="form-control" name="commento" rows="3" placeholder="Scrivi la tua recensione..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success send-feed ">Invia recensione</button>
                </form>
            </div>
        </div>
    </div>
</div>
       

</section>


<article>  
<p class="mt-4 ms-4">Vuoi cambiare la tua password?</p>

<div class="container">
    <div class="text-center">
        <a href="#" data-bs-toggle="collapse" data-bs-target="#demo"  class="btn btn-primary mb-2 cambia_password">Cambia password</a>
    </div>
    <div id="demo" class="collapse mt-3">
        <form class="contact-form iscrizione-form custom-input " action="mioprofilo.php" method="POST">
            <div class="mb-1">
                <label for="password" class="form-label ms-1 mb-0"> Nuova password</label>
                <input type="password" class="form-control ms-1 mb-1" name="nuova_password" placeholder="Nuova password">
                <label for="password" class="form-label ms-1 mb-0"> Conferma nuova password</label>
                <input type="password" class="form-control ms-1" name="conferma_nuova_password" placeholder="Conferma">
            </div>

            <div id="campoAlert" class="alert alert-warning mt-3" style="display: none;" role="alert">
                Compila tutti i campi.
            </div>

            <div id="campoPassDiff" class="alert alert-warning mt-3" style="display: none;" role="alert">
                Le due Password non coincidono.
            </div>

            <div id="campoSuccess" class="alert alert-success mt-3" style="display: none;" role="alert">
                Password cambiata con successo.
            </div>

            <button type="submit" class="btn btn-primary mt-3 mb-3 ms-3 conferma_password">Conferma</button>
          </form>

    </div>
</div>
</article>