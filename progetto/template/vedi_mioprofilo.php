<section>
    <?php 
    $profilo = $templateParams["profilo"]; // Recupera i dati del profilo

    if (!empty($profilo)) { // Controlla se ci sono dati
        echo htmlspecialchars($profilo[0]['Nome']); 
        echo " "; 
        echo htmlspecialchars($profilo[0]['Cognome']); // CORRETTO: [1] -> [0]
    } else { 
        echo "Profilo non trovato."; 
    } 
    ?>
</section>
