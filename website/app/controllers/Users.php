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

    public function showTypes($result)
    {
        if ($result['dataset'] = $this->usersModel->getTypes()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay tipos de usuario registrados';
        }
        return $result;
    }

    public function showUsers($result)
    {
        if ($result['dataset'] = $this->usersModel->getUsers()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay usuarios registrados';
        }
        return $result;
    }

    public function readOne($data, $result)
    {
        $id = intval($data['id']);
        $user = new Usuario;

        if ($user->setId($id) && $user->userExists('idusuario',$id)) {
            if($_SESSION['user_id'] != $id){
                if ($result['dataset'] = $user->getUser($id)) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = \Common\Database::$exception;
                }
            } else {
                $result['exception'] = 'No se puede modificar a sí mismo.';
            }
        } else {
            $result['exception'] = 'Usuario inexistente';
        }
        return $result;
    }

    public function create($data, $result) {
        return $this->userRegister($data, $result);
    }
    public function update($data, $result){
         return $this->updateUser($data, $result);
    }

    public function delete($data, $result)
    {
        $id = intval($data['id']);
        $user = new Usuario;

        if ($user->setId($id) && $user->userExists('idusuario',$id)) {
            if($_SESSION['user_id'] != $id){
                if ($user->deleteUser($id)) {
                    $result['status'] = 1;
                    $result['message'] = 'Usuario eliminado correctamente';
                } else {
                    $result['exception'] = \Common\Database::$exception;
                }
            }
            else {
                $result['exception'] = 'No se puede eliminar a sí mismo.';
            }
        } else {
            $result['exception'] = 'Usuario inexistente';
        }
        return $result;
    }

    public function userRegister($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userData['email'];
        $password = $userData['password'];
        $idTipoUsuario = isset($userData['idTipoUsuario']) ? $userData['idTipoUsuario']: 1 ;

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
                    $_SESSION['sidebar_status'] = 'extended';
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

    public function getSidebarStatus($result)
    {
        if (isset($_SESSION['sidebar_status'])) {
            $result['dataset'] = array('status' => $_SESSION['sidebar_status']);
            $result['status'] = 1;
            $result['message'] = 'Se ha conseguido el estado correctamente';
        } else {
            $result['status'] = -1;
            $result['exception'] = 'Ocurrió un problema al conseguir el estado';
        }
        return $result;
    }

    public function setSidebarStatus($value ,$result)
    {
        if (isset($_SESSION['sidebar_status'])) {
            $_SESSION['sidebar_status'] = $value['status'];
            $result['status'] = 1;
            $result['message'] = 'Se ha cambiado el estado correctamente';
        } else {
            $result['status'] = -1;
            $result['exception'] = 'Ocurrió un problema al modificar el estado';
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
        $email = $userData['email'] ;
        $currentPassword = $userData['password'];
        $newPassword = "";
        $newPasswordR = "";
        if (isset($userData['newPassword']) && isset($userData['newPasswordR'])) {
            $newPassword = $userData['newPassword'];
            $newPasswordR = $userData['newPasswordR'];
        }

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
            if(!isset($userData['id'])) {
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
            else{
                    $errors = $user->setPassword($currentPassword,true) === true ? $errors : array_merge($errors, $user->setPassword($currentPassword, true));
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

    public function userRecoverPassword($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];

        $user = new Usuario;
        $errors = [];
        $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userInfo = $this->usersModel->checkPassword($email);
            if ($userInfo) {
                $pin = strtoupper($this->pin());
                if($this->usersModel->saveRecoveryCode($pin, $userInfo->idusuario)){
                    if(\Helpers\EmailSender::sendEmail('Código para recuperar contraseña', $email, "El código de recuperación es: $pin.\n")){
                        $result['status'] = 1;
                        $result['message'] = 'Se ha enviado el pin correctamente';
                    }
                    else{
                        $result['status'] = -1;
                        $result['exception'] = 'Error al enviar correo electrónico';
                    }
                }
                else{
                    $result['status'] = -1;
                    $result['exception'] = \Common\Database::$exception;
                }
            } else {
                $errors['Email'] = ['No existe ninguna cuenta con este email.'];
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
        }
        $result['errors'] = $errors;
        return $result;
    }

    public function userRecoverCode($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $pin = strtoupper($userData['pin']);
        $email = $userData['email'];
        $userInfo = $this->usersModel->checkPassword($email);
        $errors[] = '';

        if($userInfo){
            if(empty($pin)){
                $errors['Código'] = ['Este campo es obligatorio.'];
            }
            else{
                if($pin==($this->usersModel->getPasswordPin($userInfo->idusuario))->pin){
                    $result['status'] = 1;
                }
                else {
                    $errors['Código'] = ['El código es incorrecto.'];
                }
            }
        }
        else {
            $errors['Código'] = ['El código es incorrecto.'];
        }

        $result['errors'] = $errors;
        return $result;
    }

    private function pin($lenght = 6) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
