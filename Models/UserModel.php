<?php
    require_once('../Models/Conexion.php');

    class UserModel {
        
        // Establecemos las propiedades para el modelo de Usuario.
        protected $name;
        protected $lastname;
        protected $email;
        protected $password;
        
        // Método para comprobar si en la base de datos existe ya un email asociado a el que nos llega del formulario.
        protected function validateEmail () {
            $statement = Conexion::connection()->prepare("SELECT email FROM usuarios WHERE email = :email");
            $statement->bindParam(':email', $this->email);
            $statement->execute();

            // Si afectó a 1 fila por lo menos, enviar un array como respuesta a la petición.
            if ($statement->rowCount()) {
                
                return 1;
            }
        }

        // Método para insertar los datos en la base de datos.
        protected function insertUser () {
            $statement = Conexion::connection()->prepare("INSERT INTO usuarios (nombre, apellido, email, password) VALUES (:nombre, :apellido, :email, :password)");
            $statement->bindParam(':nombre', $this->name);
            $statement->bindParam(':apellido', $this->lastname);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':password', $this->password);
            $statement->execute();


            // Si afectó a 1 fila por lo menos, enviar un array como respuesta a la petición.
            if ($statement->rowCount()) {
                
                return 1;
            }
        }

        // Método para verificar que la contraseña encriptada en la base de datos coincida con la que ingresa el usuario en el formulario de login.
        protected function verifyPassword ($email, $password) {
            $statement = Conexion::connection()->prepare("SELECT password FROM usuarios WHERE email = :email");

            $statement->bindParam(':email', $email);
            $statement->execute();

            $passwordHash = $statement->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $passwordHash['password'])) {
                return 1;
            } else {
                return 0;
            }
        }
    }
?>