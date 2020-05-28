<?php

class EstadoOrden
{
    private $db;

    private $idestadoorden;
    private $estado;

    public function __construct()
    {
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

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($value)
    {
        $v = new \Valitron\Validator(array('Estado' => $value));
        $v->rule('required', 'Estado');
        $v->rule('alpha', 'Estado');
        if ($v->validate()) {
            $this->estado = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getOrderStatus($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadoorden WHERE idestadoorden = :id');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getOrderStatusCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadoorden WHERE idestadoorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function insertOrderStatus($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into estadoorden (idestadoorden, estado)
                    VALUES(DEFAULT, :estado)');
        $db->bind(':estado', $value->estado);
        return $db->execute();
    }
    public function modifyOrderStatus($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE estadoorden SET estado = :estado WHERE idestadoorden = :idestadoorden');
        $db->bind(':estado', $value->estado);
        $db->bind(':idestadoorden', $value->idestadoorden);
        return $db->execute();
    }
    public function deleteOrderStatus($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM estadoorden WHERE idestadoorden = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
