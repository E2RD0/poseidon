<?php
class Users extends \Common\Controller{

  public function __construct(){
      $this->usersModel = $this->loadModel('Usuario');
  }

  public function userCount($result){
    if ($this->usersModel->userCount()) {
        $result['status'] = 1;
        $result['message'] = 'Existe al menos un usuario registrado';
    }
    else {
        $result['exception'] = 'No existen usuarios registrados';
    }
    return $result;
  }
  public function register($userData, $result, $idTipoUsuario=1){
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
      if(!boolval($errors)){
          if($this->usersModel->registerUser($user)){
              $result['status'] = 1;
              $result['message'] = 'Usuario registrado correctamente';
          }
          else{
              $result['status'] = -1;
              $result['exception'] = 'Error al ingresar los datos';
              $result['errors'] = $errors;
          }
      }
      else{
          $result['exception'] = 'Error en uno de los campos';
          $result['errors'] = $errors;
      }
    return $result;
  }

  private function login($user, $password){}
}
