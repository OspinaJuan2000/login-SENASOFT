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

        public function redirect () {
            if ($_SESSION == null) {
                header('Location: ../../index.php');
            }
        }

        public function accessIndex () {
            if (isset($_SESSION['user'])) {
                header('Location: http://localhost/login-SENASOFT/views/User/sesion.php');
            }
        }

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