<?php

class Usuario
{
    private $db;

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $idTipo;

    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($value) {
        $v = new \Valitron\Validator(array('Id' => $value));
        $v->rule('required', 'Id');
        $v->rule('integer', 'Id');
        if($v->validate()) {
            $this->id = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($value)
    {
        $v = new \Valitron\Validator(array('Nombre' => $value));
        $v->rule('required', 'Nombre');
        $v->rule('alpha', 'Nombre');
        if($v->validate()) {
            $this->nombre = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getApellido()
    {
        return $this->apellido;
    }


    public function setApellido($value)
    {
        $v = new \Valitron\Validator(array('Apellido' => $value));
        $v->rule('required', 'Apellido');
        $v->rule('alpha', 'Apellido');
        if($v->validate()) {
            $this->apellido = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value, $isLogin = false)
    {
        $v = new \Valitron\Validator(array('Email' => $value));
        $v->rule('required', 'Email');
        $v->rule('email', 'Email');
        if($v->validate() && !$isLogin) {
            if(!$this->userExists('email', $value)){
                $this->email = $value;
                return true;
            }
            else {
                $errors = [];
                $errors['Email'] = ['Ya existe una cuenta con este correo'];
                return $errors;
            }
        } else {
            return $v->errors();
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value, $checkStrength = true)
    {
        $v = new \Valitron\Validator(array('Contraseña' => $value));
        $v->rule('required', 'Contraseña');
        if($checkStrength){
            $v->rule('lengthMin', 'Contraseña', 6);
        }
        if($v->validate()) {
            $this->password = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function setIdTipo($value)
    {
        $v = new \Valitron\Validator(array('Id' => $value));
        $v->rule('required', 'Id');
        $v->rule('integer', 'Id');
        if($v->validate()) {
            $this->idTipo = $value;
            return true;
        } else {
            return $v->errors();
        }
    }
    public function userExists($param, $value){
        $db = new \Common\Database;
        $db->query("SELECT * FROM usuario WHERE {$param}=:value");
        //$db->bind(':param', $param);
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }
    public function getUsers(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM usuario');
        return $db->resultSet();
    }
    public function userCount(){
        $db = new \Common\Database;
        $db->query('SELECT * FROM usuario');
        return $db->rowCount();
    }
    public function registerUser($user){
        $db = new \Common\Database;
        $db->query('INSERT into usuario (idUsuario, nombre, apellido, email, contrasena, idTipoUsuario) VALUES(DEFAULT, :nombre, :apellido, :email, :hash, :idTipo)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':idTipo', $user->idTipo);
        return $db->execute();
    }
    public function checkPassword($email){
        $db = new \Common\Database;
        $db->query('SELECT idUsuario, contrasena from usuario WHERE email = :email');
        $db->bind(':email', $email);
        return $db->getResult();
    }
    public function modifyUser($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE usuario SET nombre = :nombre, apellido = :apellido, email = :email, contrasena = :hash, idTipoUsuario = :idTipo WHERE idUsuario = :idUsuario)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':idTipo', $user->idTipo);
        $db->bind(':idUsuario', $user->idusario);
        return $db->execute();
    }
    public function deleteUser($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM usuario WHERE idUsuario = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
