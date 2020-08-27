<?php

class Orden
{
    private $db;

    private $idorden;
    private $subtotal;
    private $ivaAplicado;
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

    public function getSubTotal()
    {
        return $this->subtotal;
    }

    public function setSubTotal($value)
    {
        $v = new \Valitron\Validator(array('SubTotal' => $value));
        $v->rule('required', 'SubTotal');
        $v->rule('numeric', 'SubTotal');
        if ($v->validate()) {
            $this->subtotal = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIvaAplicado()
    {
        return $this->ivaAplicado;
    }

    public function setIvaAplicado($value)
    {
        $v = new \Valitron\Validator(array('IvaAplicado' => $value));
        $v->rule('required', 'IvaAplicado');
        $v->rule('numeric', 'IvaAplicado');
        if ($v->validate()) {
            $this->ivaAplicado = $value;
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
            $this->fechaentrega = $value;
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
        $v = new \Valitron\Validator(array('Direccion' => $value));
        $v->rule('required', 'Direccion');
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
        $v = new \Valitron\Validator(array('IdCliente' => $value));
        $v->rule('required', 'IdCliente');
        $v->rule('integer', 'IdCliente');
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
        $v = new \Valitron\Validator(array('IdEstadoOrden' => $value));
        $v->rule('required', 'IdEstadoOrden');
        $v->rule('integer', 'IdEstadoOrden');
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
        $db->bind(':total', $user->subtotal);
        $db->bind(':fechaentrega', $user->fechaentrega);
        $db->bind(':direccion', $user->direccion);
        $db->bind(':idcliente', $user->idcliente);
        $db->bind(':idestadoorden', $user->idestadoorden);
        return $db->execute();
    }
    public function getOrdersByClient($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getOrdersByClient(' . $value . ')');
        return $db->resultSet();
    }
    public function getClientAddress($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT direccion FROM cliente WHERE idcliente = :idcliente');
        $db->bind(':idcliente', $value);
        return $db->getResult();
    }
    public function readOrder($value)
    {
        $db = new \Common\Database;

        $orden = ['idorden' => 0, 'status' => null, 'message' => null];

        $db->query('SELECT idorden FROM orden WHERE idestadoorden = 1 AND idcliente = :idcliente');
        $db->bind(':idcliente', $value);

        if (($result = $db->resultSet()) != null) {
            $orden['idorden'] = $result['0']->idorden;
            $orden['message'] = 'El carrito se ha encontrado, ';
        } else {
            $db = new \Common\Database();
            $db->query('INSERT into orden (idorden, fechacompra, idcliente, idestadoorden) VALUES (DEFAULT, DEFAULT, :idcliente, 1) RETURNING idorden');
            $db->bind(':idcliente', $value);
            $orden['idorden'] = $db->resultSet()['0']->idorden;
            $orden['message'] = 'El carrito se ha creado, ';
        }
        $orden['status'] = true;
        return $orden;
    }
    public function readCart($idorden){
        $db = new \Common\Database;
        $db->query('SELECT * FROM readCart(:idorden)');
        $db->bind(':idorden', $idorden);
        return $db->resultSet();
    }
    public function readCartTotal($idorden){
        $db = new \Common\Database;
        $db->query('SELECT SUM(detalleorden.preciounitario * detalleorden.cantidad) AS subtotal FROM detalleorden WHERE idorden = :idorden');
        $db->bind(':idorden', $idorden);
        return $db->resultSet();
    }
    public function updateOrderStatus()
    {
        $db = new \Common\Database;
        $db->query('SELECT valor FROM opcionesgenerales WHERE clave = \'IVA\'');

        $valorIVA = $db->getResult()->valor;
        $ivaAplicado = $this->subtotal * $valorIVA;
        $total = $this->subtotal + $ivaAplicado;

        $db->query('UPDATE orden SET subtotal = :subTotal, ivaAplicado = :ivaAplicado, total = :total, fechacompra = now(), fechaentrega = :fechaentrega, direccion = :direccion, idestadoorden = :idestadoorden WHERE idorden = :idorden');

        $db->bind(':subTotal', $this->subtotal);
        $db->bind(':ivaAplicado', $ivaAplicado);
        $db->bind(':total', $total);
        $db->bind(':fechaentrega', $this->fechaentrega);
        $db->bind(':direccion', $this->direccion);
        $db->bind(':idestadoorden', $this->idestadoorden);
        $db->bind(':idorden', $this->idorden);

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
