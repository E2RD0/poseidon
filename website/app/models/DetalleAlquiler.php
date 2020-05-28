<?php

class DetalleAlquiler
{
    private $db;

    private $iddetallealquiler;
    private $precioalquiler;
    private $poliza;
    private $idordenalquiler;
    private $idestadodetallealquier;
    private $idinformacionalquiler;

    public function __construct()
    {
    }
    public function getIdDetalleAlquiler()
    {
        return $this->iddetallealquiler;
    }

    public function setIdDetalleAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdDetalleAlquiler' => $value));
        $v->rule('required', 'IdDetalleAlquiler');
        $v->rule('integer', 'IdDetalleAlquiler');
        if ($v->validate()) {
            $this->iddetallealquiler = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getPrecioAlquiler()
    {
        return $this->precioalquiler;
    }

    public function setPrecioAlquiler($value)
    {
        $v = new \Valitron\Validator(array('PrecioAlquiler' => $value));
        $v->rule('required', 'PrecioAlquiler');
        $v->rule('numeric', 'PrecioAlquiler');
        if ($v->validate()) {
            $this->precioalquiler = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getPoliza()
    {
        return $this->poliza;
    }

    public function setPoliza($value)
    {
        $v = new \Valitron\Validator(array('Poliza' => $value));
        $v->rule('required', 'Poliza');
        $v->rule('numeric', 'Poliza');
        if ($v->validate()) {
            $this->poliza = $value;
            return true;
        } else {
            return $v->errors();
        }
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

    public function getIdEstadoDetalleAlquiler()
    {
        return $this->idestadodetallealquier;
    }

    public function setIdEstadoDetalleAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdEstadoDetalleAlquiler' => $value));
        $v->rule('required', 'IdEstadoDetalleAlquiler');
        $v->rule('integer', 'IdEstadoDetalleAlquiler');
        if ($v->validate()) {
            $this->idestadodetallealquier = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdInformacionAlquiler()
    {
        return $this->idinformacionalquiler;
    }

    public function setIdInformacionAlquiler($value)
    {
        $v = new \Valitron\Validator(array('IdInformacionAlquiler' => $value));
        $v->rule('required', 'IdInformacionAlquiler');
        $v->rule('integer', 'IdInformacionAlquiler');
        if ($v->validate()) {
            $this->idinformacionalquiler = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getRentalDetails($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detallealquiler WHERE idordenalquiler = :idorden');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getRentalDetailsCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detallealquiler WHERE idordenalquiler = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function insertRentalDetail($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into detallealquiler (iddetallealquiler, precioalquiler, poliza, idordenalquiler, idestadoalquiler, idinformacionalquiler)
                    VALUES(DEFAULT, :precioalquiler, :poliza, :idordenalquiler, :idestadoalquiler, :idinformacionalquiler)');
        $db->bind(':precioalquiler', $value->precioalquiler);
        $db->bind(':poliza', $value->poliza);
        $db->bind(':idordenalquiler', $value->idordenalquiler);
        $db->bind(':idestadoalquiler', $value->idestadoalquiler);
        $db->bind(':idinformacionalquiler', $value->idinformacionalquiler);
        return $db->execute();
    }
    public function modifyRentalDetail($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE detallealquiler
        SET precioalquiler = :precioalquiler, poliza = :poliza, idordenalquiler = :idordenalquiler, idestadoalquiler = :idestadoalquiler, idinformacionalquiler = :idinformacionalquiler
        WHERE iddetallealquiler = :idinformacionalquiler');
        $db->bind(':precioalquiler', $value->precioalquiler);
        $db->bind(':poliza', $value->poliza);
        $db->bind(':idordenalquiler', $value->idordenalquiler);
        $db->bind(':idestadoalquiler', $value->idestadoalquiler);
        $db->bind(':idinformacionalquiler', $value->idinformacionalquiler);
        $db->bind(':iddetallealquiler', $value->iddetallealquiler);
        return $db->execute();
    }
    public function deleteRentalDetail($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM detallealquiler WHERE iddetallealquiler = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
