<?php

class EstadoDetalleOrden
{
    private $db;

    private $idestadodetalleorden;
    private $estado;

    public function __construct()
    {
    }
    public function getIdEstadoDetalleOrden()
    {
        return $this->idestadodetalleorden;
    }

    public function setIdEstadoDetalleOrden($value)
    {
        $v = new \Valitron\Validator(array('IdEstadoDetalleOrden' => $value));
        $v->rule('required', 'IdEstadoDetalleOrden');
        $v->rule('integer', 'IdEstadoDetalleOrden');
        if ($v->validate()) {
            $this->idestadodetalleorden = $value;
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

    public function getOrderDetailsStatus($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadodetalleorden WHERE idestadodetalleorden = :id');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getOrderDetailsStatusCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadodetalleorden WHERE idestadodetalleorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function insertOrderDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into estadodetalleorden (idestadodetalleorden, estado)
                    VALUES(DEFAULT, :estado)');
        $db->bind(':estado', $value->estado);
        return $db->execute();
    }
    public function modifyOrderDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE estadodetalleorden SET estado = :estado WHERE idestadodetalleorden = :idestadodetalleorden');
        $db->bind(':estado', $value->estado);
        $db->bind(':idestadodetalleorden', $value->idestadodetalleorden);
        return $db->execute();
    }
    public function deleteOrderDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM estadodetalleorden WHERE idestadodetalleorden = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
