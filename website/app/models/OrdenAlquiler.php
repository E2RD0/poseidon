<?php

class OrdenAlquiler
{
    private $db;

    private $idordenalquiler;
    private $fechadespacho;
    private $fechaentrega;
    private $fechaordenalquiler;
    private $total;
    private $idsucursal;
    private $idcliente;
    private $idestadoordenalquiler;

    public function __construct()
    {
    }
    public function getIdOrdenAlquiler()
    {
        return $this->idordenalquiler;
    }

    public function setIdOrdenAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdOrdenAlquiler' => $value));
        $v->rule('required', 'IdOrdenAlquiler');
        $v->rule('integer', 'IdOrdenAlquiler');
        if ($v->validate()) {
            $this->idordenalquiler = $value;
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
            $this->fechadespacho = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getFechaDespacho()
    {
        return $this->fechadespacho;
    }

    public function setFechaDespacho($value)
    {
        $v = new \Valitron\Validator(array('FechaDespacho' => $value));
        $v->rule('required', 'FechaDespacho');
        $v->rule('date', 'FechaDespacho');
        if ($v->validate()) {
            $this->fechadespacho = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getFechaOrdenAlquiler()
    {
        return $this->fechaordenalquiler;
    }

    public function setFechaOrdenAlquiler($value)
    {
        $v = new \Valitron\Validator(array('FechaOrdenAlquiler' => $value));
        $v->rule('required', 'FechaOrdenAlquiler');
        $v->rule('date', 'FechaOrdenAlquiler');
        if ($v->validate()) {
            $this->fechaordenalquiler = $value;
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

    public function getIdSucursal()
    {
        return $this->idsucursal;
    }

    public function setIdSucursal($value)
    {
        $v = new \Valitron\Validator(array('Sucursal' => $value));
        $v->rule('required', 'Sucursal');
        $v->rule('integer', 'Sucursal');
        if ($v->validate()) {
            $this->idsucursal = $value;
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

    public function getIdEstadoOrdenAlquiler()
    {
        return $this->idestadoordenalquiler;
    }

    public function setIdEstadoOrdenAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdEstadoOrdenAlquiler' => $value));
        $v->rule('required', 'IdEstadoOrdenAlquiler');
        $v->rule('integer', 'IdEstadoOrdenAlquiler');
        if ($v->validate()) {
            $this->idestadoordenalquiler = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getRentalOrders()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM ordenalquiler');
        return $db->resultSet();
    }
    public function getRentalOrdersCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM ordenalquiler');
        return $db->rowCount();
    }
    public function insertRentalOrder($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into ordenalquiler (idordenalquiler, fechaentrega, fechadespacho, fechaordenalquiler, total, idsucursal, idcliente, idestadoordenalquiler) VALUES(DEFAULT, :total, DEFAULT, :fechaentrega, :fechaordenalquiler, :idcliente, :idestadoordenalquiler)');
        $db->bind(':fechadespacho', $user->fechadespacho);
        $db->bind(':fechaentrega', $user->fechaentrega);
        $db->bind(':fechaordenalquiler', $user->fechaordenalquiler);
        $db->bind(':total', $user->total);
        $db->bind(':idsucursal', $user->idsucursal);
        $db->bind(':idcliente', $user->idcliente);
        $db->bind(':idestadoordenalquiler', $user->idestadoordenalquiler);
        return $db->execute();
    }
    public function modifyRentalOrder($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE ordenalquiler SET fechaentrega = :fechaentrega, fechadespacho = :fechadespacho, fechaordenalquiler = :fechaordenalquiler, total = :total, idcliente = :idcliente, idestadoordenalquiler = :idestadoordenalquiler WHERE idordenalquiler = :idordenalquiler)');
        $db->bind(':fechadespacho', $user->fechadespacho);
        $db->bind(':fechaentrega', $user->fechaentrega);
        $db->bind(':fechaordenalquiler', $user->fechaordenalquiler);
        $db->bind(':total', $user->total);
        $db->bind(':idcliente', $user->idcliente);
        $db->bind(':idestadoordenalquiler', $user->idestadoordenalquiler);
        $db->bind(':idordenalquiler', $user->idordenalquiler);
        return $db->execute();
    }
    public function deleteRentalOrder($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM ordenalquiler WHERE idordenalquiler = :idordenalquiler)');
        $db->bind(':idordenalquiler', $value);
        return $db->execute();
    }
}
