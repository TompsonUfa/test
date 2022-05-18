let toggle = document.querySelector('.toggle-password');
let eye = document.querySelector('.bi');
let input = document.querySelector('.form-control-password');
toggle.addEventListener('click', function () {
    if (input.getAttribute('type') == 'password') {
        input.setAttribute('type', 'text');
        eye.classList.remove('bi-eye');
        eye.classList.add('bi-eye-slash');
    } else {
        input.setAttribute('type', 'password');
        eye.classList.remove('bi-eye-slash');
        eye.classList.add('bi-eye');
    }
});