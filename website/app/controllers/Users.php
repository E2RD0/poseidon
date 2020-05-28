<?php
class Users extends \Common\Controller
{
    public function __construct()
    {
        $this->usersModel = $this->loadModel('Usuario');
    }

    public function userCount($result)
    {
        if ($this->usersModel->userCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos un usuario registrado';
        } else {
            $result['exception'] = 'No existen usuarios registrados';
        }
        return $result;
    }

    public function userRegister($userData, $result, $idTipoUsuario=1)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userData['email'];
        $password = $userData['password'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        $errors = $user->setPassword($password) === true ? $errors : array_merge($errors, $user->setPassword($password));
        $errors = $user->setIdTipo($idTipoUsuario) === true ? $errors : array_merge($errors, $user->setIdTipo($idTipoUsuario));
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->registerUser($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario registrado correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Error al ingresar los datos';
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function userLogin($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        $errors = $user->setPassword($password, false) === true ? $errors : array_merge($errors, $user->setPassword($password, false));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userHash = $this->usersModel->checkPassword($email);
            if($userHash){
                if ( password_verify($password, trim($userHash->contrasena)) ) {
                    $_SESSION['user_id'] = $userHash->idusuario;
                    $_SESSION['user_email'] = $email;
                    $result['status'] = 1;
                    $result['message'] = 'Autenticación correcta';
                }
                else {
                   $result['status'] = -1;
                   $result['exception'] = 'Credenciales incorrectas';
               }
            }
            else {
                $result['status'] = -1;
                $result['exception'] = 'Credenciales incorrectas';
            }
        }
        else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    private function login($user, $password)
    {
    }
}
