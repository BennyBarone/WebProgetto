<section>
    <h2>Le mie notifiche</h2>

    <div class="container">
        <div class="row">
            <!-- Notifiche da leggere -->
            <h4 class="mt-4">Da leggere:</h4>
            <?php $hasUnreadNotifications = false; // Flag per verificare notifiche da leggere
                foreach($templateParams["mostra_notifiche"] as $mostra_notifiche): ?>
                <?php if($mostra_notifiche["Stato_notifica"] == "da leggere"): ?>
                    <?php $hasUnreadNotifications = true;?>
                    <div class="col-12 border border-3 p-2 border-brown mb-2 d-flex align-items-center justify-content-between rounded">
                        <!-- Contenuto notifica -->
                        <div class="d-flex align-items-center">
                            <img src="img/<?php echo strtolower($mostra_notifiche['Titolo']);?>.jpg" 
                                 alt="Immagine notifica" 
                                 class="img-fluid me-3" style="max-width: 40px; height: auto;">
                            <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#recensioneModal" 
                            data-titolo="<?php echo $mostra_notifiche['Titolo']; ?>" data-descrizione="<?php echo $mostra_notifiche['Descrizione']; ?>" data-id="<?php echo $mostra_notifiche['Id_notifica']; ?>">
                                <h5 class="mb-0"><?php echo $mostra_notifiche["Titolo"]; ?></h5>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if(!$hasUnreadNotifications): ?>
                <p class="text-muted">Non hai nuove notifiche da leggere.</p>
            <?php endif; ?>
        </div>

        <!-- Modale -->
        <div class="modal fade" id="recensioneModal" tabindex="-1" aria-labelledby="recensioneModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Header della modale -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="recensioneModalLabel"><?php echo $mostra_notifiche['Titolo']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Corpo della modale -->
                   <!-- Corpo della modale -->
                    <div class="modal-body">
                        <p id="descrizioneNotifica"><?php echo $mostra_notifiche['Descrizione']; ?></p>
                        <form id="notificaForm" action="notifiche.php" method="POST">
                            <!-- Campo nascosto per l'id_notifica -->
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
            <h4 class="mt-4">Lette:</h4>
            <?php foreach($templateParams["mostra_notifiche"] as $mostra_notifiche): ?>
                <?php if($mostra_notifiche["Stato_notifica"] == "letta"): ?>
                <div class="col-12 border border-3 p-2 border-brown mb-2 d-flex align-items-center justify-content-between rounded">
                    <!-- Contenuto notifica -->
                    <div class="d-flex align-items-center">
                        <img src="img/<?php echo strtolower($mostra_notifiche['Titolo']);?>.jpg" alt="Immagine notifica" class="img-fluid me-3" style="max-width: 40px; height: auto;">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#recensioneModal" 
                        data-titolo="<?php echo $mostra_notifiche['Titolo']; ?>" data-descrizione="<?php echo $mostra_notifiche['Descrizione']; ?>">
                            <h5 class="mb-0"><?php echo $mostra_notifiche["Titolo"]; ?></h5>
                        </a>
                    </div>
                    <div class="ms-auto">
                        <form action="notifiche.php" method="POST" class="d-inline">
                            <input type="hidden" name="id_notifica" value="<?php echo $mostra_notifiche['Id_notifica']; ?>">
                            <input type="hidden" name="azione" value="elimina">
                            <button type="submit" class="btn p-0 border-0 bg-transparent">
                                <img src="img/cestino.jpg" alt="Elimina notifica" class="img-fluid" style="max-width: 10vw; height: auto;">
                            </button>
                        </form>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div class="modal fade" id="recensioneModal" tabindex="-1" aria-labelledby="recensioneModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Header della modale -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="recensioneModalLabel"><?php echo $mostra_notifiche['Titolo']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Corpo della modale -->
                    <div class="modal-body">
                        <p id="descrizioneNotifica"><?php echo $mostra_notifiche['Descrizione']; ?></p>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
