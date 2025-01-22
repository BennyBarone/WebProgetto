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

c

// Nascondi l'overlay quando si clicca su "Home"
const homeLink = document.getElementById("homeLink");

homeLink.addEventListener("click", (event) => {
    event.preventDefault(); // Impedisce il comportamento di default del link
    location.reload(); // Ricarica la stessa pagina
});
