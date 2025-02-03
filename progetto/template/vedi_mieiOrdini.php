<section> 
    <h2 class="text-center mt-4">I miei ordini</h2>
    <div class="container">
        <div class="row">
            <h4>Ordini in preparazione:</h4>
            <?php 
            $ordine_corrente = null; 
            foreach ($templateParams['mostra_ordine'] as $mostra_ordine): 
                if ($mostra_ordine["Stato_ordine"] == "in corso"):
                    // Se cambia l'ID ordine, chiudo il div precedente (tranne per la prima iterazione)
                    if ($ordine_corrente !== $mostra_ordine['Id_ordine']): 
                        if ($ordine_corrente !== null): ?>
                            </ul>
                            </div>
                        <?php endif; ?>

                        <div class="box border border-4 p-3 border-brown mb-4">
                            <h4>Ordine n.<?php echo $mostra_ordine["Id_ordine"]; ?></h4>
                            <p>Ordine effettuato il: <?php echo $mostra_ordine["Data_effettuazione"]; ?></p>
                            <p>Totale: <?php echo $mostra_ordine["Prezzo_finale"]; ?> €</p>
                            <p>Metodo di pagamento scelto: <?php echo $mostra_ordine["Metodo_pagamento"]; ?></p>
                            <h5>Prodotti Ordinati:</h5>
                            <ul>
                        <?php $ordine_corrente = $mostra_ordine['Id_ordine']; ?>
                    <?php endif; ?>

                    <li>
                        <?php echo $mostra_ordine['Quantita']; ?>x 
                        <?php echo $mostra_ordine['Tipologia_prodotto']; ?> 
                        <?php echo $mostra_ordine['Grandezza']; ?>, 
                        (<?php echo $mostra_ordine['Gusto']; ?>)
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Chiudo l'ultimo blocco div e ul, se esiste -->
            <?php if ($ordine_corrente !== null): ?>
                </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <h4>Ordini completati:</h4>
            <?php 
            $ordine_corrente = null; 
            foreach ($templateParams['mostra_ordine'] as $mostra_ordine): 
                if ($mostra_ordine["Stato_ordine"] == "Completato"):
                    // Se cambia l'ID ordine, chiudo il div precedente (tranne per la prima iterazione)
                    if ($ordine_corrente !== $mostra_ordine['Id_ordine']): 
                        if ($ordine_corrente !== null): ?>
                            </ul>
                            </div>
                        <?php endif; ?>

                        <div class="box border border-4 p-3 border-brown mb-4">
                            <h4>Ordine n.<?php echo $mostra_ordine["Id_ordine"]; ?></h4>
                            <p>Ordine effettuato il: <?php echo $mostra_ordine["Data_effettuazione"]; ?></p>
                            <p>Ordine Consegnato il: <?php $data_effettuazione = new DateTime($mostra_ordine["Data_effettuazione"]);
                            $data_effettuazione->modify('+2 days'); echo $data_effettuazione->format('Y-m-d');?></p>
                            <p>Il pacco è stato consegnato presso: Università di Bologna-Cesena, Via dell'Università n.50</p>
                            <p>Totale: <?php echo $mostra_ordine["Prezzo_finale"]; ?> €</p>
                            <p>Metodo di pagamento scelto: <?php echo $mostra_ordine["Metodo_pagamento"]; ?></p>
                            <h5>Prodotti Ordinati:</h5>
                            <ul>
                        <?php $ordine_corrente = $mostra_ordine['Id_ordine']; ?>
                    <?php endif; ?>

                    <li>
                        <?php echo $mostra_ordine['Quantita']; ?>x 
                        <?php echo $mostra_ordine['Tipologia_prodotto']; ?> 
                        <?php echo $mostra_ordine['Grandezza']; ?>, 
                        (<?php echo $mostra_ordine['Gusto']; ?>)
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Chiudo l'ultimo blocco div e ul, se esiste -->
            <?php if ($ordine_corrente !== null): ?>
                </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
