const container = document.querySelector('.loginContainer');
const registerBtns = document.querySelectorAll('.register-btn');
const loginBtns = document.querySelectorAll('.login-btn');

// Attach event listener to ALL register buttons (desktop panel + mobile form)
registerBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        container.classList.add('active');
    });
});

// Attach event listener to ALL login buttons (desktop panel + mobile form)
loginBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        container.classList.remove('active');
    });
});