<section>
    <h2 class="mt-2 ms-2">Le mie notifiche</h2>

    <div class="container container-notifica">
    <div class="row">
        <!-- Notifiche da leggere -->
        <h3 class="mb-2" >Da leggere:</h3>
        <?php $hasUnreadNotifications = false; // Flag per verificare notifiche da leggere ?>
        <?php foreach($templateParams["mostra_notifiche"] as $mostra_notifiche): ?>
            <?php if($mostra_notifiche["Stato_notifica"] == "da leggere"): ?>
                <?php $hasUnreadNotifications = true; ?>
                <div class="col-12  body-notifica border border-3 p-2 border-brown mb-2 d-flex align-items-center justify-content-between rounded">
                    <!-- Contenuto notifica -->
                    <div class="d-flex align-items-center">
                        <img src="img/<?php echo strtolower($mostra_notifiche['Titolo']); ?>.jpg" 
                             alt="Immagine notifica" 
                             class="img-fluid me-3 img-notifica">
                        <a href="#" class="text-notifica text-brown" data-bs-toggle="modal" data-bs-target="#notificheModal" 
                           data-titolo="<?php echo htmlspecialchars($mostra_notifiche['Titolo']); ?>" 
                           data-descrizione="<?php echo htmlspecialchars($mostra_notifiche['Descrizione']); ?>" 
                           data-id="<?php echo $mostra_notifiche['Id_notifica']; ?>">
                            <h5 class="mb-0"><?php echo htmlspecialchars($mostra_notifiche["Titolo"]); ?></h5>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php if(!$hasUnreadNotifications): ?>
            <p class="text-muted ms-1">Non hai nuove notifiche da leggere.</p>
        <?php endif; ?>
    </div>

    <!-- Modale unica -->
    <div class="modal fade" id="notificheModal" tabindex="-1" aria-labelledby="notificheModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header della modale -->
                <div class="modal-header">
                    <h5 class="modal-title" id="notificheModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Corpo della modale -->
                <div class="modal-body">
                    <p id="descrizioneNotifica"></p>
                    <form id="notificaForm" action="notifiche.php" method="POST">
                        <input type="hidden" name="id_notifica" id="id_notifica" value="">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success acquistaprod mb-2">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Notifiche lette -->
        <h3 class="mb-2">Lette:</h3>
        <?php foreach($templateParams["mostra_notifiche"] as $mostra_notifiche): ?>
            <?php if($mostra_notifiche["Stato_notifica"] == "letta"): ?>
                <div class="col-12 body-notifica border border-3 p-2 border-brown mb-2 d-flex align-items-center justify-content-between rounded">
                    <!-- Contenuto notifica -->
                    <div class="d-flex align-items-center">
                        <img src="img/<?php echo strtolower($mostra_notifiche['Titolo']); ?>.jpg" alt="Immagine notifica" class="img-fluid me-3 img-notifica">
                        <a href="#" class="text-notifica text-brown" data-bs-toggle="modal" data-bs-target="#notificheModal" 
                           data-titolo="<?php echo htmlspecialchars($mostra_notifiche['Titolo']); ?>" 
                           data-descrizione="<?php echo htmlspecialchars($mostra_notifiche['Descrizione']); ?>">
                            <h5 class="mb-0"><?php echo htmlspecialchars($mostra_notifiche["Titolo"]); ?></h5>
                        </a>
                    </div>
                    <div class="ms-auto">
                        <form action="notifiche.php" method="POST" class="d-inline">
                            <input type="hidden" name="id_notifica" value="<?php echo $mostra_notifiche['Id_notifica']; ?>">
                            <input type="hidden" name="azione" value="elimina">
                            <button type="submit" class="btn p-0 border-0 bg-transparent">
                                <img src="img/cestino.png" alt="Elimina notifica" class="img-fluid img-cestino" >
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

</section>