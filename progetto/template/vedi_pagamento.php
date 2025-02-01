<section>
    <h2 class="ms-2 mt-2">Pagamento</h2>
    <h3 class="ms-3">Seleziona il metodo di pagamento:</h3>

    <!-- Form per il pagamento -->
    <form action="pagamento.php" method="POST">
        <div class="row">
            <div class="col-lg-8">    
                <div class="container type-payment">
                    <div class="border border-2 border-brown p-2 rounded">
                        <div class="form-check border border-2 border-brown p-3">
                            <input class="form-check-input" type="radio" name="payment" id="radio-card" value="Carta" required>
                            <label class="form-check-label" for="radio-card">Carta di Credito</label>
                        </div>

                        <div class="form-check border border-2 border-brown p-3">
                            <input class="form-check-input" type="radio" name="payment" id="radio-cash" value="Contanti" required>
                            <label class="form-check-label" for="radio-cash">In Contanti alla Consegna</label>
                        </div>

                        <!-- Sezione per Carta di Credito -->
                        <div id="card-details" class="mt-3 p-3 border border-2 border-brown rounded d-none">
                            <h5>Dettagli Carta di Credito</h5>
                            <div class="mb-2">
                                <label for="carta-number" class="form-label">Numero Carta</label>
                                <input type="text" class="form-control" id="carta-number" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="expiry-date" class="form-label">Scadenza</label>
                                    <input type="month" class="form-control" id="expiry-date">
                                </div>
                                <div class="col">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="123">
                                </div>
                            </div>

                            <!-- ALERTS -->
                            <div id="campoAlert" class="alert alert-warning mt-3" style="display: none;" role="alert">
                                Compila tutti i campi correttamente per procedere con il pagamento.
                            </div>

                            <div id="campoNumCarta" class="alert alert-warning mt-3" style="display: none;" role="alert">
                                Il Numero della Carta deve essere di 16 cifre numeriche!
                            </div>

                            <div id="campoNumCvv" class="alert alert-warning mt-3" style="display: none;" role="alert">
                                Il CVV deve essere di 3 cifre numeriche!
                            </div>

                            <div id="campoSuccess" class="alert alert-success mt-3" style="display: none;" role="alert">
                                Dati inseriti correttamente
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-primary confermaPagamento">Conferma</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container type-payment distribution">
                    <div class="border border-2 border-brown mt-2 text-center">
                        <h3><strong>Consegna</strong></h3>
                        <p>Il tuo ordine verrà consegnato presso:</p>
                        <p><strong>Via dell'Università 50 - Campus Cesena</strong></p>
                        <p>Per portarti un po' di allegria nei tuoi giorni di studio</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="container mt-2 mb-2 type-payment">
                    <div class="border border-4 border-brown p-1">
                        <p class="mb-0">Prezzo totale: <strong><?php echo number_format($templateParams["mostra_prezzo"], 2, ',', '.'); ?>€</strong></p>
                        <p class="mb-0">Sconto: <strong><?php echo $templateParams["sconto"]; ?></strong></p>
                        <p class="mb-0">Spedizione: <strong>Gratis</strong></p>
                        <p class="mb-0">Prezzo Finale: <strong><?php echo number_format($templateParams["prezzo_finale"], 2, ',', '.'); ?>€</strong></p>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary acquistaprod mb-2">Paga</button>
                </div>
            </div>
        </div>
    </form>
</section>
