<?php

class Orden
{
    private $db;

    private $idorden;
    private $total;
    private $fechacompra;
    private $fechaentrega;
    private $direccion;
    private $idcliente;
    private $idestadoorden;

    public function __construct()
    {
    }
    public function getIdOrden()
    {
        return $this->idorden;
    }

    public function setIdOrden($value)
    {
        $v = new \Valitron\Validator(array('IdOrden' => $value));
        $v->rule('required', 'IdOrden');
        $v->rule('integer', 'IdOrden');
        if ($v->validate()) {
            $this->idorden = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($value)
    {
        $v = new \Valitron\Validator(array('Total' => $value));
        $v->rule('required', 'Total');
        $v->rule('numeric', 'Total');
        if ($v->validate()) {
            $this->total = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getFechaCompra()
    {
        return $this->fechacompra;
    }

    public function setFechaCompra($value)
    {
        $v = new \Valitron\Validator(array('FechaCompra' => $value));
        $v->rule('required', 'FechaCompra');
        $v->rule('date', 'FechaCompra');
        if ($v->validate()) {
            $this->fechacompra = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getFechaEntrega()
    {
        return $this->fechaentrega;
    }

    public function setFechaEntrega($value)
    {
        $v = new \Valitron\Validator(array('FechaEntrega' => $value));
        $v->rule('required', 'FechaEntrega');
        $v->rule('date', 'FechaEntrega');
        if ($v->validate()) {
            $this->fechacompra = $value;
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
        $v = new \Valitron\Validator(array('Contraseña' => $value));
        $v->rule('required', 'Contraseña');
        $v->rule('alphaNum', 'Contraseña', 6);
        if ($v->validate()) {
            $this->direccion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdCliente()
    {
        return $this->idcliente;
    }

    public function setIdCliente($value)
    {
        $v = new \Valitron\Validator(array('Teléfono' => $value));
        $v->rule('required', 'Teléfono');
        $v->rule('integer', 'Teléfono');
        if ($v->validate()) {
            $this->idcliente = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdEstadoOrden()
    {
        return $this->idestadoorden;
    }

    public function setIdEstadoOrden($value)
    {
        $v = new \Valitron\Validator(array('Dirección' => $value));
        $v->rule('required', 'Dirección');
        $v->rule('integer', 'Dirección');
        if ($v->validate()) {
            $this->idestadoorden = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getOrders()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrders()');
        return $db->resultSet();
    }
    public function getOrdersCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrders()');
        return $db->rowCount();
    }
    public function getOrderGeneralDetails($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrderGeneralDetails('.$value.')');
        return $db->resultSet();
    }
    public function getOrderDetails($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrderDetails(' . $value . ')');
        return $db->resultSet();
    }
    public function getRecentOrders()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrders() ORDER BY idorden DESC LIMIT 5');
        return $db->resultSet();
    }
    public function insertOrder($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into orden (idorden, total, fechacompra, fechaentrega, direccion, idcliente, idestadoorden) VALUES(DEFAULT, :total, DEFAULT, :fechaentrega, :direccion, :idcliente, :idestadoorden)');
        $db->bind(':total', $user->total);
        //$db->bind(':fechacompra', $user->fechacompra);
        $db->bind(':fechaentrega', $user->fechaentrega);
        $db->bind(':direccion', $user->direccion);
        $db->bind(':idcliente', $user->idcliente);
        $db->bind(':idestadoorden', $user->idestadoorden);
        return $db->execute();
    }
    public function modifyOrder($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE orden SET total = :total, fechacompra = :fechacompra, fechaentrega = :fechaentrega, direccion = :direccion, idcliente = :idcliente, idestadoorden = :idestadoorden WHERE idorden = :idorden)');
        $db->bind(':total', $user->total);
        $db->bind(':fechacompra', $user->fechacompra);
        $db->bind(':fechaentrega', $user->fechaentrega);
        $db->bind(':direccion', $user->direccion);
        $db->bind(':idcliente', $user->idcliente);
        $db->bind(':idestadoorden', $user->idestadoorden);
        $db->bind(':idorden', $user->idorden);
        return $db->execute();
    }
    public function deleteOrder($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM orden WHERE idorden = :idorden)');
        $db->bind(':idorden', $value);
        return $db->execute();
    }
}
