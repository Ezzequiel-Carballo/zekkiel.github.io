<?php
    //Recoger los valores del formulario

    if(isset($_POST)){

        require_once 'includes/conexion.php';

        $name = isset($_POST['name']) ? $_POST['name'] : false;
        $username = isset($_POST['username']) ? $_POST['username'] :false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $message = isset($_POST['message']) ? $_POST['message'] : false;
    

        //Array de errores

        $errores = array();

        //Validacion de variables

        if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/",$name)){
            $name_valido = true;
        }else{
            $name_valido = false;
            $errores['nombre'] = "El nombre no es valido";
        }

        if (!empty($username) && !is_numeric($username) && !preg_match("/[0-9]/",$username)){
            $username_valido = true;
        }else{
            $username_valido = false;
            $errores['apellido'] = "El apellido no es valido";
        }

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_valido = true;
        }else{
            $email_valido = false;
            $errores['email'] = "El email es invalido";
        }

        if (!empty($message)){
            $message_valido = true;
        }else{
            $message_valido = false;
            $errores['message'] = "No hiciste ningun comentario";
        }

        $guardar_usuario = false;
        
        if(count($errores) == 0){
            $guardar_usuario = true;
                    
            // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
            $sql = "INSERT INTO users VALUES(null, '$name','$username','$email', '$message', CURDATE());";
            $guardar = mysqli_query($db, $sql);
            
 //           var_dump(mysqli_error($db));
 //           die();
            
            if($guardar){
                $_SESSION['register'] = "Complete";
            }else{
                $_SESSION['errores']['register'] = "Falled";
            }
            header('Location:index.php');
            
            //insertar usuarios
        }else{
            $_SESSION['errores'] = $errores;
            header('Location:index.php');
        }
    }
    
    
    

