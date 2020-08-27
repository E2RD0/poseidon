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
    private $idEstadoCliente;

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
    public function setIdEstado($value)
    {
        $v = new \Valitron\Validator(array('Estado' => $value));
        $v->rule('required', 'Estado');
        $v->rule('integer', 'Estado');
        if ($v->validate()) {
            $this->idEstadoCliente = $value;
            return true;
        } else {
            return $v->errors();
        }
    }
    public function getIdEstado()
    {
        return $this->idEstadoCliente;
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

    public function setEmail($value, $isLogin = false)
    {
        $v = new \Valitron\Validator(array('Email' => $value));
        $v->rule('required', 'Email');
        $v->rule('email', 'Email');
        if ($v->validate()) {
            if ($isLogin) {
                $this->email = $value;
                return true;
            } else {
                if (!$this->clientExists('email', $value)) {
                    $this->email = $value;
                    return true;
                } else {
                    $errors = [];
                    $errors['Email'] = ['Ya existe una cuenta con este correo'];
                    return $errors;
                }
            }
        } else {
            return $v->errors();
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value, $checkStrength = true, $name='Contraseña')
    {
        $v = new \Valitron\Validator(array( $name => $value));
        $v->rule('required', $name );
        if($checkStrength){
            $v->rule('lengthMin', $name , 6);
        }
        if($v->validate()) {
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
        if ($v->validate()) {
            $this->direccion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function clientsLastSevenChart()
    {
        $db = new \Common\Database();
        $db->query('SELECT
                        to_char( fechaingreso, \'DD Mon YY\' ) AS fecha,
                        COUNT( fechaingreso ) AS cantidad
                    FROM
                        cliente
                    WHERE
                        fechaingreso BETWEEN (CURRENT_TIMESTAMP - interval \'7 days\') AND (CURRENT_TIMESTAMP)
                    GROUP BY
                        fechaingreso
                    ORDER BY
                        fechaingreso');
        return $db->resultSet();
    }

    public function clientOrdersChart()
    {
        $db = new \Common\Database();
        $db->query('SELECT
                        nombre || \' \' || apellido AS cliente,
                        COUNT (idorden) AS cantidad
                    FROM
                        cliente
                        JOIN orden USING (idcliente)
                    GROUP BY
                        cliente
                    ORDER BY
                        cantidad DESC
                        LIMIT 5');
        return $db->resultSet();
    }
    public function clientExists($param, $value)
    {
        $db = new \Common\Database;
        $db->query("SELECT * FROM cliente WHERE {$param}=:value");
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }

    public function getClients()
    {
        $db = new \Common\Database;
        $db->query('SELECT idCliente, nombre, apellido, email, direccion, telefono, contrasena, c.idEstadoCliente, e.estado FROM cliente c INNER JOIN estadoCliente e ON c.idEstadoCliente = e.idEstadoCliente ');
        return $db->resultSet();
    }

    public function getClient($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT idCliente, nombre, apellido, email, direccion, telefono, contrasena, c.idEstadoCliente, e.estado FROM cliente c INNER JOIN estadoCliente e ON c.idEstadoCliente = e.idEstadoCliente WHERE idCliente = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }

    public function clientCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM cliente');
        return $db->rowCount();
    }
    public function checkPassword($email){
        $db = new \Common\Database;
        $db->query('SELECT idCliente, idEstadoCliente, nombre, contrasena from cliente WHERE email = :email');
        $db->bind(':email', $email);
        return $db->getResult();
    }
    public function registerClient($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into cliente (idCliente, nombre, apellido, email, contrasena) VALUES(DEFAULT, :nombre, :apellido, :email, :hash)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':hash', password_hash($user->password, PASSWORD_ARGON2ID));
        return $db->execute();
    }
    public function updateCliente($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE cliente SET nombre = :nombre, apellido = :apellido, email = :email, telefono = :telefono, direccion = :direccion, idEstadoCliente = :idEstado WHERE idcliente = :idcliente');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':apellido', $user->apellido);
        $db->bind(':email', $user->email);
        $db->bind(':telefono', $user->telefono);
        $db->bind(':direccion', $user->direccion);
        $db->bind(':idcliente', $user->id);
        $db->bind(':idEstado', $user->idEstadoCliente);
        return $db->execute();
    }
    public function changeStateClient($value, $idEstado)
    {
        $db = new \Common\Database;
        $db->query('UPDATE cliente SET idEstadoCliente = :idEstado WHERE idcliente = :id');
        $db->bind(':idEstado', $idEstado);
        $db->bind(':id', $value);
        return $db->execute();
    }
    public function getTypes()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadoCliente');
        return $db->resultSet();
    }
}
