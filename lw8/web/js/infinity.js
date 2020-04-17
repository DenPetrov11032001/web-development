function changeNextDiv(id) {
  let curr = document.getElementById(id);
  let next = document.getElementById(++id);

  if (!curr || typeof(curr) == "undefined") return;
  let currClone = curr.cloneNode(true);
  if (!next || typeof(next) == "undefined") return;
  let nextClone = next.cloneNode(true);

  next.parentNode.insertBefore(currClone, next);
  curr.parentNode.insertBefore(nextClone, curr);
  curr.parentNode.removeChild(curr);
  next.parentNode.removeChild(next);
}

function changePrevDiv(id) {
  let curr = document.getElementById(id);
  let prev = document.getElementById(--id);

  if (!curr || typeof(curr) == "undefined") return;
  let currClone = curr.cloneNode(true);
  if (!prev || typeof(prev) == "undefined") return;
  let prevClone = prev.cloneNode(true);

  prev.parentNode.insertBefore(currClone, prev);
  curr.parentNode.insertBefore(prevClone, curr);
  curr.parentNode.removeChild(curr);
  prev.parentNode.removeChild(prev);
}

function sliderNext() {
  for (let i = 0; i <= 9; i++) {
    changeNextDiv(i);
  }
}

function sliderPrev() {
  for (let i = 9; i >= 0; i--) {
    changePrevDiv(i);
  }
}

document.getElementById('next').onclick = function () {
  sliderNext();
};

document.getElementById('prev').onclick = function () {
  sliderPrev();
};


