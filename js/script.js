const track = document.querySelector('.carousel-track');
const slides = Array.from(track.children);
const prevBtn = document.querySelector('.carousel-prev');
const nextBtn = document.querySelector('.carousel-next');

let slideWidth = slides[0].getBoundingClientRect().width;
let slideIndex = 0;

function setSlidePosition(slide, index) {
    slide.style.left = slideWidth * index + 'px';
}

slides.forEach(setSlidePosition);

function moveToSlide(track, currentSlide, targetSlide) {
    track.style.transform = `translateX(-${targetSlide.style.left})`;
    currentSlide = targetSlide;
}

nextBtn.addEventListener('click', e => {
    slideIndex++;
    if (slideIndex === slides.length) {
        slideIndex = 0;
    }
    moveToSlide(track, slides[slideIndex - 1], slides[slideIndex]);
});

prevBtn.addEventListener('click', e => {
    slideIndex--;
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    moveToSlide(track, slides[slideIndex + 1], slides[slideIndex]);
});

// Add this to recalculate slideWidth on window resize
window.addEventListener('resize', () => {
    slideWidth = slides[0].getBoundingClientRect().width;
    slides.forEach(setSlidePosition);
    track.style.transform = `translateX(-${slides[slideIndex].style.left})`;
});