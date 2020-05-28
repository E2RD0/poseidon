<?php

class Cliente
{
    private $db;

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $telefono;
    private $direccion;

    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $v = new \Valitron\Validator(array('Id' => $value));
        $v->rule('required', 'Id');
        $v->rule('integer', 'Id');
        if ($v->validate()) {
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
        if ($v->validate()) {
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
        if ($v->validate()) {
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

    public function setEmail($value)
    {
        $v = new \Valitron\Validator(array('Email' => $value));
        $v->rule('required', 'Email');
        $v->rule('email', 'Email');
        if ($v->validate()) {
            if (!$this->clientExists('email', $value)) {
                $this->email = $value;
                return true;
            } else {
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

    public function setPassword($value)
    {
        $v = new \Valitron\Validator(array('Contraseña' => $value));
        $v->rule('required', 'Contraseña');
        $v->rule('lengthMin', 'Contraseña', 6);
        if ($v->validate()) {
            $this->password = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($value)
    {
        $v = new \Valitron\Validator(array('Teléfono' => $value));
        $v->rule('required', 'Teléfono');
        $v->rule('integer', 'Teléfono');
        if ($v->validate()) {
            $this->telefono = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($value)
    {
        $v = new \Valitron\Validator(array('Dirección' => $value));
        $v->rule('required', 'Dirección');
        $v->rule('integer', 'Dirección');
        if ($v->validate()){
            $this->direccion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function clientExists($param, $value)
    {
        $db = new \Common\Database;
        $db->query("SELECT * FROM cliente WHERE {$param}=:value");
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }
    public function getClient()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM cliente');
        return $db->resultSet();
    }
    public function clientCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM cliente');
        return $db->rowCount();
    }
    public function insertClient($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into cliente (idCliente, nombre, apellido, email, contrasena, telefono, direccion) VALUES(DEFAULT, :nombre, :apellido, :email, :hash, :telefono, :direccion)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':telefono', $user->telefono);
        $db->bind(':direccion', $user->direccion);
        return $db->execute();
    }
    public function modifyClient($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE cliente SET nombre = :nombre, apellido = :apellido, email = :email, contrasena = :hash, telefono = :telefono, direccion = :direccion WHERE idcliente = :idcliente)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        $db->bind(':telefono', $user->telefono);
        $db->bind(':direccion', $user->direccion);
        $db->bind(':idcliente', $user->idcliente);
        return $db->execute();
    }
    public function deleteClient($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM cliente WHERE idcliente = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}