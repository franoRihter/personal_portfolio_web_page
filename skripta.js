const hamMenu = document.querySelector(".ham-menu");

const offScreenMenu = document.querySelector(".mobilni_izbornik");

hamMenu.addEventListener("click", () => {
  hamMenu.classList.toggle("active");
  offScreenMenu.classList.toggle("active");
});