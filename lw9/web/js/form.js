function checkName(str)
{
  const chars = /^[\wА-я]+$/;
  const digits = /\d/;
  return chars.test(str) && !digits.test(str) && (str.length >= 3);
}

function checkEmail(email) {
  const solution = [];

  let myData = {
    email: email
  };
  let data = new FormData();
  data.append("json", JSON.stringify(myData));

  let value = fetch("../src/utils/emailCheck.php", {
    method: 'POST',
    body: data
  }).then(successResponse => successResponse.status === 200
     ? successResponse.json()
     : null
  );

  solution.push(value)
  return Promise.all(solution);
}


async function dataValidation() {
  const name = document.getElementById('name').value;
  const isNameValid = checkName(name);

  const email = document.getElementById('email').value;
  let isEmailValid = await checkEmail(email);

  const message = document.getElementById('message').value;

  let cellName = document.querySelector('.input_cell_name');
  if (isNameValid) {
    cellName.style.border = '2px solid #c4c4c4';
  } else {
    cellName.style.border = '2px solid #EE5252';
  }

  let cellEmail = document.querySelector('.input_cell_email');
  if (isEmailValid[0] === true) {
    cellEmail.style.border = '2px solid #c4c4c4';
  } else {
    cellEmail.style.border = '2px solid #EE5252';
  }

  let cellMessage = document.querySelector('.input_cell_text');
  if (message === '') {
    cellMessage.style.border = '2px solid #EE5252';
  } else {
    cellMessage.style.border = '2px solid #c4c4c4';
  }

  let checkMark = document.querySelector('.checkMark');
  let messageTrue = document.querySelector('.message_true_form');
  if (isNameValid && (isEmailValid[0] === true) && (message !== '')) {
    checkMark.style.visibility = 'visible';
    messageTrue.style.visibility = 'visible';
  } else {
    checkMark.style.visibility = 'hidden';
    messageTrue.style.visibility = 'hidden';
  }
}

async function run() {
  const submit = await document.getElementById('submit');
  submit.addEventListener('click', dataValidation);
}

window.onload = run;


