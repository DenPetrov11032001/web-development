function checkName(str)
{
  const chars = /^[\wА-я]+$/;
  const digits = /\d/;
  return chars.test(str) && !digits.test(str) && str.length >= 3;
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

    // .then((data) => {
    //   console.log(data);
    //   console.log(typeof(data));
    //   if (data === true) {
    //     console.log();
    //     console.log('lol');
    //     return true;
    //   } else {
    //     console.log('lmao');
    //     return false;
    //   }
    // })
}


async function dataValidation() {
  const name = document.getElementById('name').value;
  const isNameValidation = checkName(name);

  const email = document.getElementById('email').value;
  let isEmailValidation = await checkEmail(email);

  const message = document.getElementById('message').value;

  let cellName = document.querySelector('.input_cell_name');
  if (isNameValidation) {
    cellName.style.border = '2px solid #c4c4c4';
  } else {
    cellName.style.border = '2px solid #EE5252';
  }

  let emailElem = document.querySelector('.input_cell_email');
  if (isEmailValidation[0] === true) {
    emailElem.style.border = '2px solid #c4c4c4';
  } else {
    emailElem.style.border = '2px solid #EE5252';
  }

  let messageElem = document.querySelector('.input_cell_text');
  if (message === '') {
    messageElem.style.border = '2px solid #EE5252';
  } else {
    messageElem.style.border = '2px solid #c4c4c4';
  }

  let galochka = document.querySelector('.galochka');
  let messageTrue = document.querySelector('.message_true_form');
  if (isNameValidation && (isEmailValidation[0] === true) && (message !== '')) {
    galochka.style.visibility = 'visible';
    messageTrue.style.visibility = 'visible';
  } else {
    galochka.style.visibility = 'hidden';
    messageTrue.style.visibility = 'hidden';
  }
}

async function run() {
  const submit = await document.getElementById('submit');
  submit.addEventListener('click', dataValidation);
}

window.onload = run;


