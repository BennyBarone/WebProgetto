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