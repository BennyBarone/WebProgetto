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
