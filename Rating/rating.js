const slider = document.querySelector(".slider-section-slider");
const leftButton = document.querySelector(".button-icon:first-child"); // Targets the first button-icon element (left arrow)
const rightButton = document.querySelector(".button-icon:last-child"); // Targets the last button-icon element (right arrow)

const slideLeft = () => {
  slider.scrollLeft -= slider.offsetWidth; // Move the slider content by its own width to the left
};

const slideRight = () => {
  // Check if slider is at the end by comparing scrollLeft with scrollWidth minus offsetWidth
  if (slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth) {
    slider.scrollLeft = 0;
  } else {
    slider.scrollLeft += slider.offsetWidth;
  }
};

leftButton.addEventListener("click", slideLeft);
rightButton.addEventListener("click", slideRight);
