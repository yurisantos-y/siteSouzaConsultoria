document.addEventListener("DOMContentLoaded", function () {
    const mobileMenuIcon = document.querySelector(".mobile-menu-icon");
    const navLista = document.querySelector(".navlista");
  
    mobileMenuIcon.addEventListener("click", function () {
      navLista.classList.toggle("active");
    });
  });