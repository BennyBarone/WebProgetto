// Seleziona gli elementi necessari
const menu = document.getElementById("menu");
const overlay = document.getElementById("overlay");
const closeBtn = document.getElementById("closeBtn");

// Mostra l'overlay quando clicchi sull'immagine
menu.addEventListener("click", () => {
  overlay.classList.add("active"); // Aggiunge la classe "active" per mostrare l'overlay
});

// Nasconde l'overlay quando clicchi sul pulsante di chiusura
closeBtn.addEventListener("click", () => {
  overlay.classList.remove("active"); // Rimuove la classe "active" per nascondere l'overlay
});