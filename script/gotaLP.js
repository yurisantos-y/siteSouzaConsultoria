document.querySelector('.scroll-arrow').addEventListener('click', function() {
    window.scroll({
        top: window.innerHeight,
        behavior: 'smooth'
    });
});
