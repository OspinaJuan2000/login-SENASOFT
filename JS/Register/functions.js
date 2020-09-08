import { sendDataUser } from './request.js';

const formRegister = document.querySelector('#formRegister');

const validateForm = () => {

    // Escuchamos un evento del formulario tipo submit, para cuando quiera enviar los datos.
    formRegister.addEventListener('submit', (e) => {
        e.preventDefault();

        const errores = {};
        const userData = new FormData(formRegister);

        // En caso de que envíen el formulario con campos vacios, insertar al objeto errores cada uno de los mensajes correspondientes.
        userData.get('name').trim() === '' ? errores.name = 'The name field is required' : '';
        userData.get('lastname').trim() === '' ? errores.lastname = 'The lastname field is required' : '';
        userData.get('email').trim() === '' ? errores.email = 'The email field is required' : '';
        userData.get('password').trim() === '' ? errores.password = 'The password field is required' : '';
        userData.get('passwordConfirm').trim() === '' ? errores.passwordConfirmEmpty = 'Confirm your password' : '';
        userData.get('passwordConfirm').trim() !== userData.get('password').trim() ? errores.passwordConfirmMatch = 'The password does not match' : '';

        // Verificamos si el objeto de errores tiene los mensajes de errores o no por medio de su longitud.
        if(Object.values(errores).length > 0) {
            renderErrors(errores);
        } else {
            sendDataUser(userData);
        }
    });
};

const renderAlert = (data) => {
    const {msj} = data;

    let alertTitle;
    let alertText;
    let alertIcon;

    if (msj === 'created') {
        alertTitle = 'Account created successfully';
        alertText = `Okey, your account has been created, please sing up`;
        alertIcon = 'success';
        formRegister.reset();
    } else if (msj === 'exist') {
        alertTitle = 'Email already exists';
        alertText = 'A user with that email already exists, change the email';
        alertIcon = 'error';
    }

    swal({
        title: alertTitle,
        text: alertText,
        icon: alertIcon
    });
};

const renderErrors = (errors) => {

    console.log(errors);
    
    const nameInput = formRegister['name'];
    const lastNameInput = formRegister['lastname'];
    const emailInput = formRegister['email'];
    const passwordInput = formRegister['password'];
    const confirmPasswordInput = formRegister['passwordConfirm'];

    errors.name ? nameInput.classList.add('errorInput') : nameInput.classList.remove('errorInput');
    errors.lastname ? lastNameInput.classList.add('errorInput') : lastNameInput.classList.remove('errorInput');
    errors.email ? emailInput.classList.add('errorInput') : emailInput.classList.remove('errorInput');
    errors.password ? passwordInput.classList.add('errorInput') : passwordInput.classList.remove('errorInput');
    errors.passwordConfirmEmpty ? confirmPasswordInput.classList.add('errorInput') : confirmPasswordInput.classList.remove('errorInput') ;

    if (errors.passwordConfirmMatch) {
        formRegister.querySelector('.form__error-password').style.display = 'block';
    } else {
        formRegister.querySelector('.form__error-password').style.display = 'none';
    }
};

// Exportaciones al archivo principal register.js
export {
    validateForm,
    renderAlert
};