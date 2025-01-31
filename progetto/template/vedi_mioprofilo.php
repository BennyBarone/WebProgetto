<section class="container mt-4">
    <h2 class="text-center">Il mio profilo</h2>
    <div class="row">
       
        <div class="col-3 px-0">
            <img class="mt-4 img-fluid" id="profilo" src="img/profilo1.png" alt="Profilo">
        </div>

       
        <div class="col-9">
            <?php foreach ($templateParams["mio_profilo"] as $mio_profilo): ?>
                <p class="mb-1 mt-3"><strong>Nome:</strong> <?php echo htmlspecialchars($mio_profilo["Nome"]); ?></p>
                <p class="mb-1"><strong>Cognome:</strong> <?php echo htmlspecialchars($mio_profilo["Cognome"]); ?></p>
                <p class="mb-1"><strong>Numero di telefono:</strong> <?php echo htmlspecialchars($mio_profilo["Numero_cell"]); ?></p>
                <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($mio_profilo["E_mail"]); ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</section>
