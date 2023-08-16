// Swipper Card
var swiper = new Swiper(".slide-content", {
    slidesPerView: 5,
    spaceBetween: 25,
    loop: true,
    centerSlide: "true",
    fade: "true",
    grabCursor: "true",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 3,
        },
        950: {
            slidesPerView: 5,
        },
    },


});

// Dropdown Keranjang
const toggleBtn = document.querySelector('.toogle_btn');
const toggleBtnIcon = document.querySelector('.toogle_btn i');
const dropDownMenu = document.querySelector('.dropdown_menu');

toggleBtn.onclick = function () {
    dropDownMenu.classList.toggle('open');
    const isOpen = dropDownMenu.classList.contains('open');

    toggleBtnIcon.classList.toggle('fa-xmark', isOpen);
    toggleBtnIcon.classList.toggle('fa-bars', !isOpen);
};

// Scroll Navbar Keranjang
document.addEventListener("DOMContentLoaded", function() {
    const draggable = document.querySelector(".draggable");

    let isDragging = false;
    let startX, scrollLeft;

    draggable.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - draggable.offsetLeft;
        scrollLeft = draggable.scrollLeft;
    });

    draggable.addEventListener("mouseleave", () => {
        isDragging = false;
    });

    draggable.addEventListener("mouseup", () => {
        isDragging = false;
    });

    draggable.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - draggable.offsetLeft;
        const walk = (x - startX) * 1; // Adjust scrolling speed
        draggable.scrollLeft = scrollLeft - walk;
    });
});