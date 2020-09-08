import { sendDataUser } from './request.js';

const formLogin = document.querySelector('#formLogin');

const validateForm = () => {

    // Escuchamos un evento del formulario tipo submit, para cuando quiera enviar los datos.
    formLogin.addEventListener('submit', (e) => {
        e.preventDefault();

        const errores = {};
        const userData = new FormData(formLogin);

        // En caso de que envíen el formulario con campos vacios, insertar al objeto errores cada uno de los mensajes correspondientes.
        userData.get('email').trim() === '' ? errores.email = 'The email field is required' : '';
        userData.get('password').trim() === '' ? errores.password = 'The password field is required' : '';

        // Verificamos si el objeto de errores tiene los mensajes de errores o no por medio de su longitud.
        if(Object.values(errores).length > 0) {
            renderErrors(errores);
        } else {
            sendDataUser(userData);
        }
        
    });
}

const renderAlert = (data) => {
    const {msj} = data;

    if (msj === 'password_incorrect') {
        swal({
            title: 'Password incorrect',
            text: 'Your password is incorrect, remember your password and try again',
            icon: 'info'
        });

    } else if (msj === 'not_exist') {
        swal({
            title: 'Email does not exist',
            text: 'There is no user associated with this email, verify your information',
            icon: 'error'
        });

    } else if (msj === 'password_correct') {
        window.location.href = 'http://localhost/login-SENASOFT/views/User/sesion.php';
    }
}

const renderErrors = (errors) => {
    
    const emailInput = formLogin['email'];
    const passwordInput = formLogin['password'];

    errors.email ? emailInput.classList.add('errorInput') : emailInput.classList.remove('errorInput');
    errors.password ? passwordInput.classList.add('errorInput') : passwordInput.classList.remove('errorInput');
};

// Exportaciones al archivo principal login.js
export {
    validateForm,
    renderAlert
}