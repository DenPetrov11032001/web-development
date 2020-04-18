function sliderNext() {
  let slider = document.getElementById('slider_wrapper');
  let sliderLength = slider.children.length;
  let lastElement = slider.children[sliderLength - 1];

  lastElement.parentNode.removeChild(lastElement);
  slider.prepend(lastElement);
}

function sliderPrev() {
  let slider = document.getElementById('slider_wrapper');
  let firstElement = slider.children[0];

  firstElement.parentNode.removeChild(firstElement);
  slider.append(firstElement);
}

function run() {
  const prev = document.getElementById('prev');
  prev.addEventListener('click', sliderPrev);

  const next = document.getElementById('next');
  next.addEventListener('click', sliderNext);
}

window.onload = run;


