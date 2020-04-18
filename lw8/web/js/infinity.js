function changeNextDiv(id) {
  let curr = document.getElementById(id);
  let next = document.getElementById(++id);

  let currClone = curr.cloneNode(true);
  let nextClone = next.cloneNode(true);

  next.parentNode.insertBefore(currClone, next);
  curr.parentNode.insertBefore(nextClone, curr);
  curr.parentNode.removeChild(curr);
  next.parentNode.removeChild(next);
}

function changePrevDiv(id) {
  let curr = document.getElementById(id);
  let prev = document.getElementById(--id);

  let currClone = curr.cloneNode(true);
  let prevClone = prev.cloneNode(true);

  prev.parentNode.insertBefore(currClone, prev);
  curr.parentNode.insertBefore(prevClone, curr);
  curr.parentNode.removeChild(curr);
  prev.parentNode.removeChild(prev);
}

function sliderNext() {
  for (let i = 0; i < 9; i++) {
    changeNextDiv(i);
  }
}

function sliderPrev() {
  for (let i = 9; i > 0; i--) {
    changePrevDiv(i);
  }
}

function run() {
  const next = document.getElementById('next');
  next.addEventListener('click', sliderNext);

  const prev = document.getElementById('prev');
  prev.addEventListener('click', sliderPrev);
}

window.onload = run;


