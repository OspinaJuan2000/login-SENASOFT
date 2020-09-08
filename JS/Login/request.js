import {renderAlert} from './functions.js';

const sendDataUser = async (userData) => {
    
    // Hacemos una petición al servidor PHP utilizando async await.
    const response = await fetch('../../Controllers/UserController.php', {
        method: 'POST',
        body: userData
    });

    // Guardamos la respuesta que obtengamso en formato JSON.
    const data = await response.json();

    // Llamamos a la función que muestra una alerta.
    renderAlert(data);
}

// Exportaciones al archivo principal login.js
export {
    sendDataUser
}