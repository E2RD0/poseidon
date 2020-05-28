<?php

class EstadoDetalleAlquiler
{
    private $db;

    private $idestadodetallealquiler;
    private $estado;

    public function __construct()
    {
    }
    public function getIdEstadoDetalleAlquiler()
    {
        return $this->idestadodetallealquiler;
    }

    public function setIdEstadoDetalleAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdEstadoDetalleAlquiler' => $value));
        $v->rule('required', 'IdEstadoDetalleAlquiler');
        $v->rule('integer', 'IdEstadoDetalleAlquiler');
        if ($v->validate()) {
            $this->idestadodetallealquiler = $value;
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

    public function getRentalDetailsStatus($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadodetallealquiler WHERE idestadodetallealquiler = :id');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getRentalDetailsStatusCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM estadodetallealquiler WHERE idestadodetallealquiler = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function insertRentalDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into estadodetallealquiler (idestadodetallealquiler, estado)
                    VALUES(DEFAULT, :estado)');
        $db->bind(':estado', $value->estado);
        return $db->execute();
    }
    public function modifyRentalDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE estadodetallealquiler SET estado = :estado WHERE idestadodetallealquiler = :idestadodetallealquiler');
        $db->bind(':estado', $value->estado);
        $db->bind(':idestadodetallealquiler', $value->idestadodetallealquiler);
        return $db->execute();
    }
    public function deleteRentalDetailStatus($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM estadodetallealquiler WHERE idestadodetallealquiler = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
