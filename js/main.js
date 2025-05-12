/*document.getElementById('registrationForm').addEventListener('input', function () {
  validateForm();
});*/

  const email = document.getElementById('email').value;
  const password = document.getElementById('pwd').value;
  const confirmPassword = document.getElementById('pwd-rep').value;
  const firstName = document.getElementById('fName').value;
  const lastName = document.getElementById('lName').value;
  const dateofBirth = document.getElementById('dob').value;
  const itemName = document.getElementById('iName').value;
  const itemDesc = document.getElementById('iDesc').value;
  const itemCategory = document.getElementById('iCat').value;
  const itemPrice = document.getElementById('iPrice').value;
  const itemQuantity = document.getElementById('iAmt').value;
  const itemImage1 = document.getElementById('img1').value;
  const itemImage1_Alt = document.getElementById('img1_Alt').value;
  const submitBtn = document.getElementById('submitBtn');
  const errorElement = document.getElementById('passwordError');
  

//Password validation for registration form
function regValidation() {
  let isValid = true;
  const email = document.getElementById('email').value;
  const password = document.getElementById('pwd').value;
  const confirmPassword = document.getElementById('pwd-rep').value;
  const firstName = document.getElementById('fName').value;
  const lastName = document.getElementById('lName').value;
  const dateofBirth = document.getElementById('dob').value;
  

  if (!email || !password || !confirmPassword || !firstName || !lastName || !dateofBirth) {
      isValid = false;
  }

  if (password !== confirmPassword) {
      errorElement.textContent = 'Passwords do not match';
      errorElement.classList.remove('success');
      errorElement.classList.add('error');
      isValid = false;
  } else {
      errorElement.textContent = 'Passwords match';
      errorElement.classList.remove('error');
      errorElement.classList.add('success');
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}

//Password validation for logins
function loginValidation(){

  let isValid = true;

  if (!email || !password || !confirmPassword) {
      isValid = false;
  }

  if (password !== confirmPassword) {
      errorElement.textContent = 'Passwords do not match';
      errorElement.classList.remove('success');
      errorElement.classList.add('error');
      isValid = false;
  } else {
      errorElement.textContent = 'Passwords match';
      errorElement.classList.remove('error');
      errorElement.classList.add('success');
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}

//Password validation for item listings
function listingValidation(){
  let isValid = true;

  const itemName = document.getElementById('iName').value;
  const itemDesc = document.getElementById('iDesc').value;
  const itemCategory = document.getElementById('iCat').value;
  const itemPrice = document.getElementById('iPrice').value;
  const itemQuantity = document.getElementById('iAmt').value;
  const itemImage1 = document.getElementById('img1').value;
  const itemImage1_Alt = document.getElementById('img1_Alt').value;

  if (!itemName || !itemDesc || !itemCategory || !itemPrice || !itemQuantity || !itemImage1 || !itemImage1_Alt) {
      isValid = false;
  }

  if (isValid) {
      submitBtn.classList.add('enabled');
      submitBtn.disabled = false;
  } else {
      submitBtn.classList.remove('enabled');
      submitBtn.disabled = true;
  }
}

