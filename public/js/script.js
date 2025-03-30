const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

// Ensure the navigation is hidden by default (if active class exists at start, remove it)
document.addEventListener("DOMContentLoaded", () => {
    navigation.classList.remove("active");
    menuBtn.classList.remove("active");
});

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});

//script for video slider//
const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".video-slide");
const contents = document.querySelectorAll(".content");

/**
 * Navigation function for a slider component.
 *
 * This function takes a manual parameter to specify the slide to navigate to.
 * It removes the 'active' class from all buttons, slides, and contents, then adds the 'active' class to the specified slide's button, slide, and content.
 *
 * @param {number} manual The index of the slide to navigate to.
 * @returns {void}
 */
var sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    slides.forEach((slide) => {
        slide.classList.remove("active");
    });

    contents.forEach((content) => {
        content.classList.remove("active");
    });

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");
};

btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNav(i);
    });
});

// //script for tawk
// var Tawk_API = Tawk_API || {},
//     Tawk_LoadStart = new Date();
// (function () {
//     var s1 = document.createElement("script"),
//         s0 = document.getElementsByTagName("script")[0];
//     s1.async = true;
//     s1.src = "https://embed.tawk.to/66ddd9b4ea492f34bc0f8956/1i799kr5a";
//     s1.charset = "UTF-8";
//     s1.setAttribute("crossorigin", "*");
//     s0.parentNode.insertBefore(s1, s0);
// })();

//script for professionals
// let next = document.querySelector(".next");
// let prev = document.querySelector(".prev");

// next.addEventListener("click", function () {
//     let items = document.querySelectorAll(".item");
//     document.querySelector(".slide").appendChild(items[0]);
// });

// prev.addEventListener("click", function () {
//     let items = document.querySelectorAll(".item");
//     document.querySelector(".slide").prepend(items[items.length - 1]); // here the length of items = 6
// });


let currentSlide = 0;
const totalSlides = slides.length;
let autoPlayInterval;

// Function to advance to next slide
function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    sliderNav(currentSlide);
}

// Add event listeners for video ended
slides.forEach((video, index) => {
    video.addEventListener('ended', () => {
        nextSlide();
    });
});

// Start auto-play
function startAutoPlay() {
    autoPlayInterval = setInterval(nextSlide, 5000);
}

// Initial auto-play start
startAutoPlay();

// Pause auto-play when user clicks navigation
btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        currentSlide = i;
        sliderNav(currentSlide);
        clearInterval(autoPlayInterval);
        // Restart auto-play after 10 seconds of user inactivity
        setTimeout(startAutoPlay, 10000);
    });
});


