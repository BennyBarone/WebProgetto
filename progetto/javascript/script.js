// Seleziona gli elementi

// Seleziona gli elementi
const menuButton = document.getElementById("menu");
const overlay = document.getElementById("overlay");
const closeButton = document.getElementById("closeBtn");

// Mostra l'overlay al clic del menu
menuButton.addEventListener("click", () => {
    overlay.classList.add("active");
  
});

// Nascondi l'overlay al clic del pulsante di chiusura
closeButton.addEventListener("click", () => {
    
    overlay.classList.remove("active");
});

// Seleziona tutti i pulsanti con la classe 'bottone-prod'
document.querySelectorAll('.bottone-prod').forEach(button => {
    // Aggiunge un event listener 'click' a ciascun pulsante
    button.addEventListener('click', function() {
        // Rimuove la classe 'selected' da tutti i pulsanti
        document.querySelectorAll('.bottone-prod').forEach(btn => btn.classList.remove('selected'));
        // Aggiunge la classe 'selected' al pulsante cliccato
        this.classList.add('selected');
    });
});

document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function (event) {
        event.preventDefault();
        const gusto = this.getAttribute('data-gusto');
        const button = this.closest('.dropdown').querySelector('button');
        selectGusto(gusto, button);
    });
});

function selectGusto(gusto, button) {
    if (button) {
        button.innerText = gusto;
    }
}

//verifica se l'utente è loggato, in particolare per fare l'ordine, quindi per aggiungere i prodotti al carrello
document.addEventListener("DOMContentLoaded", function () {
    // Aggiunge l'evento click a tutti i pulsanti con classe "acquistaprod"
    document.querySelectorAll(".acquistaprod").forEach(button => {
        button.addEventListener("click", function (event) {
            // Verifica se l'utente è loggato
            if (!isUserLoggedIn) { 
                event.preventDefault(); // Previene l'azione predefinita
                const alertBox = this.closest(".box-body").querySelector("#loginAlert");
                if (alertBox) {
                    alertBox.style.display = "block"; // Mostra il messaggio di avviso
                }
                return;
            }
        });
    });
});

//se non sei loggato non puoi lasciare una recensione quindi in vedi_recensioni il bottone mostra l'alert
document.addEventListener("DOMContentLoaded", function () {
    const recensioneButton = document.getElementById("lascia_recensione");
    const alertBox = document.getElementById("campoAlert");

    if (recensioneButton && alertBox) {
        recensioneButton.addEventListener("click", function (event) {
            event.preventDefault(); 
            alertBox.style.display = "block"; 
        });
    }
});


//manda un messaggio di alert se tutti i campi di un prodotto non sono stati selezionati
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function (event) {
            let numDropdown = parseInt(form.querySelector(".acquistaprod").getAttribute("data-num-dropdown"));
            let allSelected = true;

            for (let i = 1; i <= numDropdown; i++) {
                let select = form.querySelector(`select[name="gusto${i}"]`);
                if (!select || select.value.trim() === "") {
                    allSelected = false;
                    break;
                }
            }
            let campoAlert = form.querySelector("#campoAlert");

            if (!allSelected) {
                event.preventDefault(); // Blocca l'invio del form
                campoAlert.style.display = "block"; // Mostra l'alert
            } else {
                campoAlert.style.display = "none"; // Nasconde l'alert
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            const allDropdownsFilled = Array.from(form.querySelectorAll('select')).every(select => select.value.trim() !== "");

            if (allDropdownsFilled) {
                // Incrementa il numero del carrello lato client
                const cartCountElement = document.getElementById("cart-count");
                let currentCount = parseInt(cartCountElement.textContent, 10) || 0;
                const quantityInput = form.querySelector('input[name="quantita"]');
                const quantity = parseInt(quantityInput.value, 10) || 1;

                cartCountElement.textContent = currentCount + quantity;
            } else {
                // Blocca l'invio se i campi non sono completi
                event.preventDefault();
            }
        });
    });
});

//quando clicco carta scende il menu per carta altrimenti "scompare" se la scelta è contanti
document.querySelectorAll('input[name="payment"]').forEach(radio => {
    radio.addEventListener('change', function() {
        let cardDetails = document.getElementById('card-details');
        let cashDetails = document.getElementById('cash-details');

        if (document.getElementById('radio-card').checked) {
            cardDetails.classList.remove('d-none');
            cashDetails.classList.add('d-none');
        } else if (document.getElementById('radio-cash').checked) {
            cardDetails.classList.add('d-none');
            cashDetails.classList.remove('d-none');
        }
    });
});

//previene lìinvio dei dati per il pagamento se tutti i campi non sono compilati correttamente
document.addEventListener("DOMContentLoaded", function () {
    // Aggiunge l'evento click a tutti i pulsanti con classe "confermaPagamento"
    document.querySelectorAll(".confermaPagamento").forEach(button => {
        button.addEventListener("click", function (event) {
           // Prendiamo i valori inseriti dall'utente

            let numeroCarta = document.getElementById("carta-number").value.trim();
            let scadenza = document.getElementById("expiry-date").value.trim();
            let cvv = document.getElementById("cvv").value.trim();

            let campoAlert = document.querySelector("#campoAlert");
            let campoNumCarta = document.querySelector("#campoNumCarta");
            let campoNumCvv = document.querySelector("#campoNumCvv");
            let campoSuccess = document.querySelector("#campoSuccess");

            let isValid=true;

            // Controlliamo se tutti i campi sono compilati
            if (!numeroCarta || !scadenza || !cvv) {
                event.preventDefault(); // Blocca l'invio del form
                campoAlert.style.display = "block"; // Mostra l'alert
                isValid=false;
            } else {
                campoAlert.style.display = "none"; // Nasconde l'alert
            }

            // Controllo numero carta: deve essere esattamente di 16 cifre
            if (numeroCarta.length !== 16 || isNaN(numeroCarta)) {
               event.preventDefault(); // Blocca l'invio del form
                campoNumCarta.style.display = "block"; // Mostra l'alert
                isValid=false;
            } else {
                campoNumCarta.style.display = "none"; // Nasconde l'alert
            }

            // Controllo CVV: deve essere esattamente di 3 cifre
            if (cvv.length !== 3 || isNaN(cvv)) {
                event.preventDefault(); // Blocca l'invio del form
                campoNumCvv.style.display = "block"; // Mostra l'alert
                isValid=false;
            } else {
                campoNumCvv.style.display = "none"; // Nasconde l'alert
            }
            if(isValid){
            campoSuccess.style.display="block";
            }else{
                campoSuccess.style.display="none";
            }

        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".conferma_password").forEach(button => {
        button.addEventListener("click", function (event) {
            let nuova_password = document.querySelector("input[name='nuova_password']").value.trim();
            let conf_nuova_password = document.querySelector("input[name='conferma_nuova_password']").value.trim();

            let campoAlert = document.getElementById("campoAlert");
            let campoPassword = document.getElementById("campoPassDiff");
            let campoSuccess = document.getElementById("campoSuccess");

            let isValid = true;

            if (!nuova_password || !conf_nuova_password) {
                event.preventDefault();
                campoAlert.style.display = "block";
                isValid = false;
            } else {
                campoAlert.style.display = "none";
            }

            if (nuova_password !== conf_nuova_password) {
                event.preventDefault();
                campoPassword.style.display = "block";
                isValid = false;
            } else {
                campoPassword.style.display = "none";
            }

            if (isValid) {
                event.preventDefault(); // Blocca l'invio inizialmente
                campoSuccess.style.display = "block";

                // Aspetta 3 secondi e poi invia il form
                setTimeout(() => {
                    event.target.closest("form").submit();
                }, 1000);
            } else {
                campoSuccess.style.display = "none";
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const recensioneModal = document.getElementById("recensioneModal");
    const modalTitle = recensioneModal.querySelector(".modal-title");
    const modalBody = recensioneModal.querySelector("#descrizioneNotifica");
    const hiddenInput = recensioneModal.querySelector("#id_notifica");

    document.querySelectorAll("[data-bs-toggle='modal']").forEach(element => {
        element.addEventListener("click", function () {
            const titolo = this.getAttribute("data-titolo");
            const descrizione = this.getAttribute("data-descrizione");
            const idNotifica = this.getAttribute("data-id");

            modalTitle.textContent = titolo; // Aggiorna il titolo della modale
            modalBody.textContent = descrizione; // Aggiorna la descrizione nella modale
            hiddenInput.value = idNotifica;
        });
    });
});

