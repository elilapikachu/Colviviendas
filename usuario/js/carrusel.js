let slideIndex = 0;
const slides = document.querySelector('.slides');
const totalSlides = slides.children.length;

document.getElementById('next').addEventListener('click', () => {
    slideIndex = (slideIndex + 1) % totalSlides;
    updateSlidePosition();
});

document.getElementById('prev').addEventListener('click', () => {
    slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
});

function updateSlidePosition() {
    const slideWidth = slides.children[0].clientWidth;
    slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
}