document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll('input');
    const form = document.querySelector('form');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            input.placeholder = 'Fill out the field';
          input.style.borderColor = 'red';
        }
      });
      const isFormValid = Array.from(inputs).every((input) => input.value.trim() !== '');
      if (isFormValid) {
        form.submit();
      }
    });
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const passwordError = document.getElementById('password-error');
const confirmPasswordError = document.getElementById('confirm-password-error');
const myform = document.querySelector('form');

myform.addEventListener('submit', function(event) {
  if (passwordInput.value.length < 8) {
    passwordError.textContent = 'Password must be at least 8 characters';
    confirmPasswordError.textContent = '';
    event.preventDefault();
    return;
  }

  if (passwordInput.value !== confirmPasswordInput.value) {
    confirmPasswordError.textContent = 'Password does not match';
    passwordError.textContent = '';
    event.preventDefault();
    return;
  }

  confirmPasswordError.textContent = '';
  passwordError.textContent = '';
});

});

  
