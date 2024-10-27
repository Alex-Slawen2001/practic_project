let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function changeSlide(direction) {
    slides[currentSlide].classList.remove('active');
    currentSlide += direction;

    if (currentSlide < 0) {
        currentSlide = slides.length - 1; // Переход к последнему слайду
    } else if (currentSlide >= slides.length) {
        currentSlide = 0; // Переход к первому слайду
    }

    slides[currentSlide].classList.add('active');
    updateSlider();
}

function updateSlider() {
    const slider = document.querySelector('.slider');
    const offset = -currentSlide * 100;
    slider.style.transform = `translateX(${offset}%)`;
}

// Автоматическое переключение слайдов каждые 5 секунд
setInterval(() => changeSlide(1), 5000);