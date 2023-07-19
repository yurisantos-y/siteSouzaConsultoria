document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger');
    const navlista = document.querySelector('.navlista');
  
    hamburger.addEventListener('click', function () {
      navlista.classList.toggle('active');
    });
  });
  