<section>
    <h2 class="px-0 mt-2">🍦Registrati in pochi passi🍦</h2>
<<<<<<< HEAD
    <form class="contact-form" method="POST" action="iscrizione.php">

        <div class="mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="Nome" placeholder="Nome" required>
        </div>
        <div class="mb-2">
            <label for="name" class="form-label">Cognome</label>
            <input type="text" class="form-control" name="Cognome" placeholder="Cognome" required>
        </div>
        <div class="mb-2">
            <label for="telefono" class="form-label">Numero di telefono</label>
            <input type="number" class="form-control" name="Telefono" placeholder="Numero di telefono" required>
        </div>   
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="Email" placeholder="Indirizzo email" required>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Scegli password (max 8)</label>
            <input type="password" class="form-control" name="Password" placeholder="Password" required>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Conferma password</label>
            <input type="password" class="form-control" name="Conferma_password" placeholder="Conferma password" required>
        </div>

        <?php if (isset($_GET['errore']) && $_GET['errore'] == 'passwords_non_corrispondono') { ?>
            <div class="text-danger">Le password non corrispondono. Riprova.</div>
        <?php } ?>
=======
    <?php if(isset($templateParams["erroreRegister"])): ?>
        <p class="text-danger"><?php echo $templateParams["erroreRegister"]; ?></p>
    <?php endif; ?>
    <form class="contact-form" action="iscrizione.php" method="POST">
        <div class="mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="Nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-2">
            <label for="name" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="Cognome" name="cognome" placeholder="Cognome" required>
        </div>
        <div class="mb-2">
            <label for="telefono" class="form-label">Numero di telefono</label>
            <input type="number" class="form-control" id="Telefono" name="telefono" placeholder="Numero di telefono" required>
        </div>   
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="email" placeholder="Indirizzo email" required>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Scegli password (max 8)</label>
            <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Conferma password</label>
            <input type="password" class="form-control" id="Conferma_password" name="conferma_password" placeholder="Conferma password" required>
        </div>

>>>>>>> aab927a0b32737cabe27948e7edf0cf1be34d349
        <button type="submit" class="btn btn-primary float-end" id="registrazione">Registrati</button>
    </form>
</section>
