
function checkData(email, name) {
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
  const dataValid = await checkData(email, name);

  const isEmailValid = dataValid.email;
  const isNameValid = dataValid.name;

  const message = document.getElementById('message').value;

  const cellName = document.getElementById('name');
  if (isNameValid) {
    cellName.classList.remove('input_data_false');
    cellName.classList.add('input_data_true');
  } else {
    cellName.classList.remove('input_data_true');
    cellName.classList.add('input_data_false');
  }

  const cellEmail = document.getElementById('email');
  if (isEmailValid) {
    cellEmail.classList.remove('input_data_false');
    cellEmail.classList.add('input_data_true');
  } else {
    cellEmail.classList.remove('input_data_true');
    cellEmail.classList.add('input_data_false');
  }

  const cellMessage = document.getElementById('message');
  if (message !== '') {
    cellMessage.classList.remove('input_data_false');
    cellMessage.classList.add('input_data_true');
  } else {
    cellMessage.classList.remove('input_data_true');
    cellMessage.classList.add('input_data_false');
  }

  const checkMark = document.getElementById('check_mark');
  const messageTrue = document.getElementById('you_message_true');
  if (isNameValid && isEmailValid && (message !== '')) {
    checkMark.classList.remove('data_visibility_false');
    checkMark.classList.add('data_visibility_true');

    messageTrue.classList.remove('data_visibility_false');
    messageTrue.classList.add('data_visibility_true');
  } else {
    checkMark.classList.remove('data_visibility_true');
    checkMark.classList.add('data_visibility_false');

    messageTrue.classList.remove('data_visibility_true');
    messageTrue.classList.add('data_visibility_false');
  }
}

function run() {
  const submit = document.getElementById('submit');
  submit.addEventListener('click', dataValidation);
}

window.onload = run;


