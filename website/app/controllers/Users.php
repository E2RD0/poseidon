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
            if ($userHash) {
                if (password_verify($password, trim($userHash->contrasena))) {
                    $_SESSION['user_id'] = $userHash->idusuario;
                    $_SESSION['user_name'] = $userHash->nombre;
                    $_SESSION['user_type'] = $userHash->idtipousuario;
                    $_SESSION['user_email'] = $email;
                    $result['status'] = 1;
                    $result['message'] = 'Autenticación correcta';
                } else {
                    $result['status'] = -1;
                    $result['exception'] = 'Credenciales incorrectas';
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Credenciales incorrectas';
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function userLogout($result)
    {
        if (session_destroy()) {
            $result['status'] = 1;
            $result['message'] = 'Se ha cerrado la sesión';
        } else {
            $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
        }
        return $result;
    }

    public function getUserInfo($id, $result)
    {
        if ($result['dataset'] = $this->usersModel-> getUser($id)) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos';
        }
        return $result;
    }

    public function updateUser($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $idUsuario = isset($userData['id']) ? $userData['id']: $_SESSION['user_id'] ;
        $idTipoUsuario = isset($userData['idTipoUsuario']) ? $userData['idTipoUsuario']: $_SESSION['user_type'] ;

        $userInfo= $this->usersModel->getUser($idUsuario);

        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userInfo->email == $userData['email'] ?  $userInfo->email : $userData['email'] ;
        $currentPassword = $userData['password'];
        $newPassword = $userData['newPassword'];
        $newPasswordR = $userData['newPasswordR'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setId($idUsuario) === true ? $errors : array_merge($errors, $user->setId($idUsuario));
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        if($email != $userInfo->email)
        {
            $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        }
        else {
            $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        }
        $errors = $user->setIdTipo($idTipoUsuario) === true ? $errors : array_merge($errors, $user->setIdTipo($idTipoUsuario));

        if($currentPassword || $newPassword || $newPasswordR){
            if (password_verify($currentPassword, trim($userInfo->contrasena))) {
                $errors = $user->setPassword($newPassword,true, 'Nueva Contraseña') === true ? $errors : array_merge($errors, $user->setPassword($newPassword, true, 'Nueva Contraseña'));
                if($newPasswordR){
                    if($newPassword != $newPasswordR){
                        $errors['NewPasswordR'] = ['Las contraseñas no coinciden'];
                    }
                }
                else{
                    $errors['NewPasswordR'] = ['Este campo es obligatorio'];
                }
            }
            else{
                $errors['Contraseña'] = ['Contraseña incorrecta.'];
                $errors = $user->setPassword($currentPassword,false) === true ? $errors : array_merge($errors, $user->setPassword($currentPassword, false));
            }
        }
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->usersModel->updateUser($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario actualizado correctamente';
                if(!isset($userData['id'])){
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_name'] = $user->getNombre();
                    $_SESSION['user_type'] = $user->getIdTipo();
                    $_SESSION['user_email'] = $user->getEmail();
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

}
