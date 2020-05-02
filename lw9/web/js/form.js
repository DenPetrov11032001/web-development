
function checkData(email, name) {
  let data = new FormData();
  data.append("email", email);
  data.append("name", name);

  let value;
  return value = fetch("../src/utils/emailCheck.php", {
    method: 'POST',
    body: data
  }).then(successResponse => successResponse.status === 200
    ? successResponse.json()
    : null
  );
}

function dataFn(isValid, elementId) {
  cell = document.getElementById(elementId);
  if (isValid) {
    cell.classList.remove('input_data_false');
    cell.classList.add('input_data_true');
  } else {
    cell.classList.remove('input_data_true');
    cell.classList.add('input_data_false');
  }
}

async function dataValidation() {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;
  const dataValid = await checkData(email, name);

  const isEmailValid = dataValid.email;
  const isNameValid = dataValid.name;
  const isMessageValid = (message !== '');

  dataFn(isNameValid, 'name');
  dataFn(isEmailValid, 'email');
  dataFn(isMessageValid, 'message');

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


