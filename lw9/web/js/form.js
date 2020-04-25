
function checkEmail(email, name) {
  let data = new FormData();
  data.append("email", email);
  data.append("name", name);

  let value = fetch("../src/utils/emailCheck.php", {
    method: 'POST',
    body: data
  }).then(successResponse => successResponse.status === 200
     ? successResponse.json()
     : null
  );

  return Promise.resolve(value);
}

async function dataValidation() {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  let dataValid = await checkEmail(email, name);

  const isEmailValid = dataValid.email;
  const isNameValid = dataValid.name;

   const message = document.getElementById('message').value;

   let cellName = document.querySelector('.input_cell_name');
   if (isNameValid) {
     cellName.style.border = '2px solid #c4c4c4';
   } else {
     cellName.style.border = '2px solid #EE5252';
   }

   let cellEmail = document.querySelector('.input_cell_email');
   if (isEmailValid) {
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

   let checkMark = document.querySelector('.check_mark');
   let messageTrue = document.querySelector('.message_true_form');
   if (isNameValid && isEmailValid && (message !== '')) {
     checkMark.style.visibility = 'visible';
     messageTrue.style.visibility = 'visible';
   } else {
     checkMark.style.visibility = 'hidden';
     messageTrue.style.visibility = 'hidden';
   }
}

function run() {
  const submit = document.getElementById('submit');
  submit.addEventListener('click', dataValidation);
}

window.onload = run;


