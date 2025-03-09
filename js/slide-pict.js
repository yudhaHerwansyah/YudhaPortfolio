let sliders = {};

function moveSlide(sliderId, step) {
  if (!sliders[sliderId]) {
    sliders[sliderId] = { index: 0 };
  }
  
  let slider = document.querySelector(`#${sliderId} .slider`);
  let slides = slider.querySelectorAll(".slide");
  let totalSlides = slides.length;

  sliders[sliderId].index = (sliders[sliderId].index + step + totalSlides) % totalSlides;
  slider.style.transform = `translateX(${-sliders[sliderId].index * 100}%)`;
}

function autoSlide() {
  Object.keys(sliders).forEach(sliderId => moveSlide(sliderId, 1));
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".slider-container").forEach(slider => {
    sliders[slider.id] = { index: 0 };
  });

  setInterval(autoSlide, 5000);
});