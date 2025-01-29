<section>
    <h2 class="ms-2 mt-2 title-iscrizione">Registrati in pochi passi</h2>
    <?php if(isset($templateParams["erroreRegister"])): ?>
        <p class="text-brown"><?php echo $templateParams["erroreRegister"]; ?></p>
    <?php endif; ?>
    <form class="contact-form  custom-input " action="iscrizione.php" method="POST">
        <div class="mx-2 mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="Nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-2 mx-2">
            <label for="name" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="Cognome" name="cognome" placeholder="Cognome" required>
        </div>
        <div class="mb-2 mx-2">
            <label for="telefono" class="form-label">Numero di telefono</label>
            <input type="number" class="form-control" id="Telefono" name="telefono" placeholder="Numero di telefono" required>
        </div>   
        <div class="mb-2 mx-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="email" placeholder="Indirizzo email" required>
        </div>
        <div class="mb-2 mx-2">
            <label for="password" class="form-label">Scegli password (max 8)</label>
            <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-2 mx-2">
            <label for="password" class="form-label">Conferma password</label>
            <input type="password" class="form-control" id="Conferma_password" name="conferma_password" placeholder="Conferma password" required>
        </div>

        <button type="submit" class="btn btn-primary float-end me-2 mt-4 mb-4" id="registrazione">Registrati</button>
    </form>
</section>
