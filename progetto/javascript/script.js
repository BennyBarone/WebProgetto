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

document.addEventListener("DOMContentLoaded", function () {
    // Aggiungi evento click a tutti i bottoni "Aggiungi al carrello"
    document.querySelectorAll(".acquistaprod").forEach(button => {
        button.addEventListener("click", function () {
            // Recupero i dati dal bottone stesso
            let tipologia = this.getAttribute("data-tipologia");
            let grandezza = this.getAttribute("data-grandezza");
            let numDropdown = parseInt(this.getAttribute("data-num-dropdown")); // Numero di gusti

            // Recupero la quantità
            let quantitaInput = this.closest(".box-body").querySelector("input[name='quantita']");
            let quantita = quantitaInput ? quantitaInput.value : 1;

            // Recupero i gusti selezionati
            let gusti = [];
            for (let i = 1; i <= numDropdown; i++) {
                let buttonGusto = this.closest(".box-body").querySelector(`#dropdownMenuButton_${tipologia}_${grandezza}_${i}`);
                if (buttonGusto) {
                    let selectedGusto = buttonGusto.getAttribute("data-selected-gusto") || "Nessun gusto"; // Recupero gusto selezionato
                    gusti.push(selectedGusto);
                } else {
                    gusti.push(""); // Se non esiste, lascio vuoto
                }
            }

            // Creazione dei dati da inviare
            let data = {
                tipologia: tipologia,
                grandezza: grandezza,
                gusto1: gusti[0] || "",
                pallina1: 1, // Personalizza se servono più palline
                gusto2: gusti[1] || "",
                pallina2: 1,
                gusto3: gusti[2] || "",
                pallina3: 1,
                quantita: quantita
            };

            // Invia i dati al server con AJAX
            fetch("ordine.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data) // Assicurati che `data` contenga i dati corretti
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Errore nella risposta del server");
                }
                return response.json(); // Assicura che venga restituito un oggetto JSON
            })
            .then(result => {
                if (result.success) {
                    alert("Prodotto aggiunto con successo!");
                } else {
                    alert("Errore: " + result.message);
                }
            })
            .catch(error => {
                console.error("Errore:", error);
                alert("Si è verificato un errore: " + error.message);
            });
        });
    });

    // Gestione della selezione del gusto
    document.querySelectorAll(".dropdown-item").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault();
            let gusto = this.getAttribute("data-gusto");
            let buttonId = this.closest(".dropdown-menu").getAttribute("aria-labelledby");
            let button = document.getElementById(buttonId);

            if (button) {
                button.textContent = gusto; // Cambia il testo del pulsante
                button.setAttribute("data-selected-gusto", gusto); // Salva il gusto selezionato
            }
        });
    });
});



function validaPassword() {
    var password = document.getElementById('Password').value;
    var confermaPassword = document.getElementById('Conferma_password').value;
    
    if (password !== confermaPassword) {
        document.getElementById('errore-password').style.display = 'block';
        return false; // Impedisce l'invio del modulo
    } else {
        document.getElementById('errore-password').style.display = 'none';
        return true; // Permette l'invio del modulo
    }
}