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


let stars = 
    document.getElementsByClassName("star");
let output = 
    document.getElementById("output");
 
// Funtion to update rating
function gfg(n) {
    remove();
    for (let i = 0; i < n; i++) {
        if (n == 1) cls = "one";
        else if (n == 2) cls = "two";
        else if (n == 3) cls = "three";
        else if (n == 4) cls = "four";
        else if (n == 5) cls = "five";
        stars[i].className = "star " + cls;
    }
    output.innerText = "Rating is: " + n + "/5";
}
 
// To remove the pre-applied styling
function remove() {
    let i = 0;
    while (i < 5) {
        stars[i].className = "star";
        i++;
    }
}
