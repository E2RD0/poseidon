<?php

class OpcionesGenerales
{
    private $db;

    private $idopcion;
    private $clave;
    private $valor;

    public function __construct()
    {
    }
    public function getIdOpcion()
    {
        return $this->idopcion;
    }

    public function setIdOpcion($value)
    {
        $v = new \Valitron\Validator(array('IdOpcion' => $value));
        $v->rule('required', 'IdOpcion');
        $v->rule('integer', 'IdOpcion');
        if ($v->validate()) {
            $this->idopcion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($value)
    {
        $v = new \Valitron\Validator(array('Clave' => $value));
        $v->rule('required', 'Clave');
        $v->rule('alphaNum', 'Clave');
        if ($v->validate()) {
            $this->clave = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($value)
    {
        $v = new \Valitron\Validator(array('Valor' => $value));
        $v->rule('required', 'Valor');
        if ($v->validate()) {
            $this->valor = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function existCategory($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM opcionesgenerales WHERE idopcion = :value');
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }
    public function getGeneralOptions()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM opcionesgenerales');
        return $db->resultSet();
    }
    public function getGeneralOptionsCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM opcionesgenerales');
        return $db->rowCount();
    }
    public function insertGeneralOption($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into opcionesgenerales (idopcion, clave, valor)
                    VALUES(DEFAULT, :clave, :valor)');
        $db->bind(':clave', $value->clave);
        $db->bind(':valor', $value->valor);
        return $db->execute();
    }
    public function modifyGeneralOption($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE opcionesgenerales SET clave = :clave, valor = :valor WHERE idopcion = :idopcion');
        $db->bind(':clave', $value->clave);
        $db->bind(':valor', $value->valor);
        $db->bind(':idopcion', $value->idopcion);
        return $db->execute();
    }
    public function deleteGeneralOption($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM opcionesgenerales WHERE idopcion = :id');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
