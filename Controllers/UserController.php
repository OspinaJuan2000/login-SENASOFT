<?php
    require_once('../Models/UserModel.php');
    require_once('../Controllers/SessionStarter.php');
    class UserController extends UserModel{

        // Método para obtener los datos que llegan por POST en el formulario de registro y posteriormente insertarlos a la base de datos.
        public function getDataUserRegister ($name, $lastname, $email, $password) {
            $userModel = new UserModel();
            $userModel->name = $name;
            $userModel->lastname = $lastname;
            $userModel->email = $email;
            $userModel->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

            // Si encuentra un email ya asociado en la base de datos decirle al usuario que ya existe.
            if ($userModel->validateEmail() == 1) {
                $response = [
                    'msj' => 'exist'
                ];

                // Convertir array a JSON.
                echo json_encode($response);

            } else if ($userModel->insertUser() == 1) {
                $response = [
                    'msj' => 'created'
                ];

                // Convertir array a JSON.
                echo json_encode($response);
            }
        }

        // Método para obtener los datos que llegan por POST en el formulario de inicio de sesión y posteriormente validar que sean correctos para dar SESION.
        public function getDataUserLogin ($email, $password) {
            $userModel = new UserModel();
            $userModel->email = $email;
            $userModel->password = $password;

            // Si encuentra un email en la base de datos, proseguir con las validaciones.
            if ($userModel->validateEmail() == 1) {
                $verify = $userModel->verifyPassword($email, $password);

                if ($verify == 1) {
                    $response = [
                        'msj' => 'password_correct'
                    ];

                    //Manejo de las sesiones.
                    $sessionStart = new SessionStarter();
                    $sessionStart->createSession($email);

                } else {
                    $response = [
                        'msj' => 'password_incorrect'
                    ]; 
                }

            } else {
                $response = [
                    'msj' => 'not_exist'
                ]; 
            }

            // Convertir array a JSON.
            echo json_encode($response);
        }
    }

    // Si nos llega un POST desde el formulario de registro a esta vista, creamos el controlador y ejecutamos el método para recibir los datos.
    if (isset($_POST) && isset($_POST['create'])) {
        $userController = new UserController();

        $userController->getDataUserRegister(
        $_POST['name'],
        $_POST['lastname'],
        $_POST['email'],
        $_POST['password']);

    } 

    // Si nos llega un POST a esta vista desde el formulario de inicio desesión, creamos el controlador y ejecutamos el método para recibir los datos.
    if (isset($_POST) && isset($_POST['login'])) {
        $userController = new UserController();

        $userController->getDataUserLogin(
        $_POST['email'],
        $_POST['password']);
    }
?>