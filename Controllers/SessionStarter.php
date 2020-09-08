<?php
    class SessionStarter {

        public function __construct () {
            session_start();
        }

        // Método para crear una sesión con el email del usuario.
        public function createSession ($data) {
            return $_SESSION['user'] = array(
                'email' => $data
            );
        }

        // Método para redirigir al index en caso de que no haya ninguna sesion.
        public function redirect () {
            if ($_SESSION == null) {
                header('Location: ../../index.php');
            }
        }

        // Método para comprobar si existe una sesion con los datos del usuario.
        public function userSession () {
            if (isset($_SESSION['user'])) {
                header('Location: ../User/sesion.php');
            }
        }

        // Método para cerrar la sesión.
        public function closeSession () {
            session_unset();
            session_destroy();
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'close') {
        $sessionStart = new SessionStarter();
        $sessionStart->closeSession();

        header('Location: ../index.php');
    }
?>