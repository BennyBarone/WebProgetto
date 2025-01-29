<section>
    <h2 class="px-0 mt-2">🍦Registrati in pochi passi🍦</h2>
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

        <button type="submit" class="btn btn-primary float-end" id="registrazione">Registrati</button>
    </form>
</section>
