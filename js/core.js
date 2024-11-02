
document.addEventListener("DOMContentLoaded", () => {
    const backButton = document.getElementById("back");

    if (backButton) {
        backButton.addEventListener("click", () => {
            window.history.back(); // на попередню сторінку
        });
    } else {
        console.error("Кнопка 'Назад' не знайдена");
    }
});
document.querySelector('.main-heading').addEventListener('click', function() {
    this.style.color = 'Maroon'; // колір тексту на фіолетовий
 
    this.style.fontSize = '60px'; // розмір шрифту
});

const zodiacImage = document.querySelector('.zodiac-image');
zodiacImage.addEventListener('mouseover', function() {
    this.style.transform = 'scale(1.1)'; // збільшуємо зображення
    this.style.transition = 'transform 0.3s'; // плавний перехід
});

zodiacImage.addEventListener('mouseout', function() {
    this.style.transform = 'scale(1)'; // повертаємо зображення до початкового розміру
});

//фон тіла сторінки при натисканні клавіші "b"
document.addEventListener('keydown', function(event) {
    if (event.key === 'b') { //чи була натиснута клавіша "b"
        document.body.style.backgroundColor = 'pink';
    }
    if (event.key === 'n') { //чи була натиснута клавіша "n"
        document.body.style.backgroundColor = 'bisque';
    }

});
const zodiac = document.querySelector('.zodiac-image');

//для плавного появлення зображення
function showImage() {
    zodiacImage.classList.add('show'); //клас 'show' для запуску анімації
}

// Затримка перед показом зображення
window.addEventListener('load', function() {
    setTimeout(showImage, 550);
});