
// Menu Hamburger
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
});

// Fermer le menu quand on clique sur un lien
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
    });
});

document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            alert("Message envoyé avec succès !");
            this.reset();
        } else {
            alert("Une erreur s'est produite.");
        }
    });
});

// Hero Slider
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
let currentSlide = 0;

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

// Auto-slide
let slideInterval = setInterval(nextSlide, 5000);

// Pause on hover
const slider = document.querySelector('.hero-slider');
slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
slider.addEventListener('mouseleave', () => {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 5000);
});

// Initialisation
showSlide(0);


