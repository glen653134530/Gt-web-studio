
let slides = document.querySelectorAll('.slide');
let dots = document.querySelectorAll('.dot');
let index = 0;

function showSlide(i) {
    slides.forEach((slide, j) => {
        slide.classList.remove('active');
        dots[j].classList.remove('active');
    });
    slides[i].classList.add('active');
    dots[i].classList.add('active');
}

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        index = i;
        showSlide(index);
    });
});

setInterval(() => {
    index = (index + 1) % slides.length;
    showSlide(index);
}, 5000);

gsap.from(".slide.active h1", { opacity: 0, y: -50, duration: 1 });
gsap.from(".slide.active p", { opacity: 0, y: 50, duration: 1, delay: 0.3 });

document.addEventListener("DOMContentLoaded", () => {
    let counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        let updateCount = () => {
            let target = +counter.getAttribute('data-count');
            let count = +counter.innerText;
            let speed = 10;

            if (count < target) {
                counter.innerText = Math.ceil(count + (target - count) / speed);
                setTimeout(updateCount, 40);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});

function toggleMenu() {
    const nav = document.getElementById('mobileNav');
    if (nav.style.right === '0%') {
        nav.style.right = '-100%';
        document.body.classList.remove('menu-open');
    } else {
        nav.style.right = '0%';
        document.body.classList.add('menu-open');
    }
}

document.querySelector('.hamburger').addEventListener('click', function () {
    this.classList.toggle('active');
});

document.addEventListener('DOMContentLoaded', () => {
    // Lightbox pour images projet
    const items = document.querySelectorAll('.portfolio-items .item img');
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100vw';
    overlay.style.height = '100vh';
    overlay.style.background = 'rgba(0,0,0,0.8)';
    overlay.style.display = 'none';
    overlay.style.justifyContent = 'center';
    overlay.style.alignItems = 'center';
    overlay.style.zIndex = '2000';

    const overlayImage = document.createElement('img');
    overlayImage.style.maxWidth = '90%';
    overlayImage.style.maxHeight = '90%';
    overlay.appendChild(overlayImage);
    document.body.appendChild(overlay);

    items.forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', () => {
            overlayImage.src = img.src;
            overlay.style.display = 'flex';
        });
    });

    overlay.addEventListener('click', () => {
        overlay.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.portfolio-items .item');
    const container = document.querySelector('.filter-buttons');

    // Récupère les catégories uniques
    const categories = Array.from(new Set([...items].map(el => el.dataset.category)));

    categories.forEach(cat => {
        const btn = document.createElement('button');
        btn.innerText = cat;
        btn.style.margin = '0 10px';
        btn.style.padding = '8px 20px';
        btn.style.border = 'none';
        btn.style.borderRadius = '5px';
        btn.style.backgroundColor = '#58A6FF';
        btn.style.color = '#0D1117';
        btn.style.cursor = 'pointer';
        btn.addEventListener('click', () => {
            items.forEach(el => {
                el.style.display = el.dataset.category === cat || cat === 'Tous' ? 'block' : 'none';
            });
        });
        container.appendChild(btn);
    });

    // Ajouter bouton "Tous"
    const allBtn = document.createElement('button');
    allBtn.innerText = 'Tous';
    allBtn.style.margin = '0 10px';
    allBtn.style.padding = '8px 20px';
    allBtn.style.border = 'none';
    allBtn.style.borderRadius = '5px';
    allBtn.style.backgroundColor = '#ffffff30';
    allBtn.style.color = '#ffffff';
    allBtn.style.cursor = 'pointer';
    allBtn.addEventListener('click', () => {
        items.forEach(el => el.style.display = 'block');
    });
    container.prepend(allBtn);
});

let currentSlide = 0;
const slides = document.querySelectorAll(".carousel-slide");
const dots = document.querySelectorAll(".dot");

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove("active");
        dots[i].classList.remove("active");
    });
    slides[index].classList.add("active");
    dots[index].classList.add("active");
    currentSlide = index;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function setSlide(index) {
    showSlide(index);
}

setInterval(nextSlide, 5000);

let currentTestimonial = 0;
const testimonialSlides = document.querySelectorAll(".testimonial-slide");
const testimonialDots = document.querySelectorAll(".tdot");

function showTestimonial(index) {
    testimonialSlides.forEach((slide, i) => {
        slide.classList.remove("active");
        testimonialDots[i].classList.remove("active");
    });
    testimonialSlides[index].classList.add("active");
    testimonialDots[index].classList.add("active");
    currentTestimonial = index;
}

setInterval(() => {
    currentTestimonial = (currentTestimonial + 1) % testimonialSlides.length;
    showTestimonial(currentTestimonial);
}, 6000);
