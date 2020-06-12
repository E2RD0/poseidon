<?php

class Sucursal
{
    private $db;

    private $idsucursal;
    private $nombre;
    private $ubicacion;

    public function __construct()
    {
    }
    public function getIdSucursal()
    {
        return $this->idsucursal;
    }

    public function setIdSucursal($value)
    {
        $v = new \Valitron\Validator(array('IdSucursal' => $value));
        $v->rule('required', 'IdSucursal');
        $v->rule('integer', 'IdSucursal');
        if ($v->validate()) {
            $this->idsucursal = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($value)
    {
        $v = new \Valitron\Validator(array('Nombre' => $value));
        $v->rule('required', 'Nombre');
        $v->rule('ascii', 'Nombre');
        if ($v->validate()) {
            $this->nombre = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicacion($value)
    {
        $v = new \Valitron\Validator(array('Ubicacion' => $value));
        $v->rule('required', 'Ubicacion');
        $v->rule('ascii', 'Ubicacion');
        if ($v->validate()) {
            $this->ubicacion = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getOneBranch($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM sucursal WHERE idsucursal = :idsucursal');
        $db->bind(':idsucursal', $value);
        return $db->getResult();
    }
    public function existBranch($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM sucursal WHERE idsucursal = :idsucursal');
        $db->bind(':idsucursal', $value);
        return boolval($db->rowCount());
    }
    public function getBranches()
    {
        $db = new \Common\Database;
        $db->query('SELECT idsucursal, nombre FROM sucursal');
        return $db->resultSet();
    }
    public function getBranchesCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM sucursal');
        return $db->rowCount();
    }
    public function insertBranch($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into sucursal (idsucursal, nombre, ubicacion)
                    VALUES(DEFAULT, :nombre, :ubicacion)');
        $db->bind(':nombre', $value->nombre);
        $db->bind(':ubicacion', $value->ubicacion);
        return $db->execute();
    }
    public function modifyBranch($value, $id)
    {
        $db = new \Common\Database;
        $db->query('UPDATE sucursal SET nombre = :nombre, ubicacion = :ubicacion WHERE idsucursal = :idsucursal');
        $db->bind(':nombre', $value->nombre);
        $db->bind(':ubicacion', $value->ubicacion);
        $db->bind(':idsucursal', $id);
        return $db->execute();
    }
    public function deleteBranch($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM sucursal WHERE idsucursal = :idsucursal');
        $db->bind(':idsucursal', $value);
        return $db->execute();
    }
}
