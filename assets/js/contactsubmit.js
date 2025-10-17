const contactForm = document.getElementById('contact-form'),
    contactName = document.getElementById('contact-name'),
    contactEmail = document.getElementById('contact-email'),
    contactSubject = document.getElementById('contact-subject'),
    contactMessage = document.getElementById('contact-message'),
    message = document.getElementById('message');

const sendEmail = (e) =>{
    e.preventDefault();

    if(contactName.value == '' || contactEmail.value == '' || contactSubject.value == '' || contactMessage.value == ''){
        message.classList.remove('color-first');
        message.classList.add('color-red');
        message.textContent = 'Write all the input fields';

        setTimeout(() =>{ message.textContent='';}, 3000);
    }
    else{
        emailjs.sendForm('service_tstkmrq', 'template_bth4en9', '#contact-form', 'kFLVeJozpOp4mI2oM').then(
        () => {
            message.classList.add('color-first');
            message.textContent = 'Message Sent';

            setTimeout(() =>{ message.textContent='';}, 5000);
        },
        (error) => {
            alert('OOPs! SOMETHING WENT WRONG...', error);
        }
        );
        contactName.value = '';
        contactEmail.value = '';
        contactSubject.value = '';
        contactMessage.value = '';
    }
};

contactForm.addEventListener('submit', sendEmail);
