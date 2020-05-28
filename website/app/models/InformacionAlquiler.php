<?php

class InformacionAlquiler
{
    private $db;

    private $idinformacionalquiler;
    private $precioalquiler;
    private $poliza;
    private $existenciasalquiler;
    private $idproducto;


    public function __construct()
    {
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

    public function getExistenciasAlquiler()
    {
        return $this->existenciasalquiler;
    }

    public function setExistenciasAlquiler($value)
    {
        $v = new \Valitron\Validator(array('ExistenciasAlquiler' => $value));
        $v->rule('required', 'ExistenciasAlquiler');
        $v->rule('integer', 'ExistenciasAlquiler');
        if ($v->validate()) {
            $this->existenciasalquiler = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdProducto()
    {
        return $this->idproducto;
    }

    public function setIdProducto($value)
    {
        $v = new \Valitron\Validator(array('ExistenciasAlquiler' => $value));
        $v->rule('required', 'ExistenciasAlquiler');
        $v->rule('integer', 'ExistenciasAlquiler');
        if ($v->validate()) {
            $this->idproducto = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getRentalInformation($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM informacionalquiler WHERE idinformacionalquiler = :id');
        $db->bind(':id', $value);
        return $db->resultSet();
    }
    public function getRentalInformationCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM informacionalquiler');
        return $db->rowCount();
    }
    public function insertRentalInformation($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into informacionalquiler (idinformacionalquiler, precioalquiler, poliza, existenciasalquiler, idproducto)
                    VALUES(DEFAULT, :precioalquiler, :poliza, :existenciasalquiler, :idestadoalquiler)');
        $db->bind(':precioalquiler', $value->precioalquiler);
        $db->bind(':poliza', $value->poliza);
        $db->bind(':existenciasalquiler', $value->existenciasalquiler);
        $db->bind(':idproducto', $value->idproducto);
        return $db->execute();
    }
    public function modifyRentalInformation($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE informacionalquiler
        SET precioalquiler = :precioalquiler, poliza = :poliza, existenciasalquiler = :existenciasalquiler, idproducto = :idproducto
        WHERE idinformacionalquiler = :idinformacionalquiler');
        $db->bind(':precioalquiler', $value->precioalquiler);
        $db->bind(':poliza', $value->poliza);
        $db->bind(':existenciasalquiler', $value->existenciasalquiler);
        $db->bind(':idproducto', $value->idproducto);
        $db->bind(':idinformacionalquiler', $value->idinformacionalquiler);
        return $db->execute();
    }
    public function deleteRentalInformation($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM informacionalquiler WHERE idinformacionalquiler = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
