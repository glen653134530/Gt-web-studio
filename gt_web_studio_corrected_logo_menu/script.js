
document.addEventListener("DOMContentLoaded", () => {
    const burger = document.querySelector(".burger");
    const navMenu = document.querySelector(".nav-links");

    burger.addEventListener("click", () => {
        burger.classList.toggle("active");
        navMenu.classList.toggle("active");
    });

    // Animation GSAP (si disponible)
    if (typeof gsap !== "undefined") {
        gsap.from(".hero-block", {opacity: 0, y: -30, duration: 1, stagger: 0.3});
        gsap.from(".card", {opacity: 0, y: 30, duration: 1, stagger: 0.2});
    }
});
