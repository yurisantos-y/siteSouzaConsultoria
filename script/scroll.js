document.addEventListener("DOMContentLoaded", function () {
    const scrollLinks = document.querySelectorAll(".scroll-link");

    scrollLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();

            const target = document.querySelector(link.getAttribute("href"));
            const targetTop = target.getBoundingClientRect().top;
            const offset = targetTop - window.innerHeight / 8; // Ajuste de deslocamento

            window.scrollTo({
                top: offset,
                behavior: "smooth"
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const animatedArrow = document.querySelector(".animated-arrow");

    animatedArrow.addEventListener("click", () => {
        animatedArrow.classList.toggle("up");
    });
});

