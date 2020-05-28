<?php

class TipoUsuario
{
    private $db;

    private $idtipousario;
    private $tipo;

    public function __construct()
    {
    }
    public function getIdTipoUsuario()
    {
        return $this->idtipousario;
    }

    public function setIdTipoUsuario($value)
    {
        $v = new \Valitron\Validator(array('IdTipoUsuario' => $value));
        $v->rule('required', 'IdTipoUsuario');
        $v->rule('integer', 'IdTipoUsuario');
        if ($v->validate()) {
            $this->idtipousario = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getTipoUsuario()
    {
        return $this->tipo;
    }

    public function setTipoUsuario($value)
    {
        $v = new \Valitron\Validator(array('Tipo' => $value));
        $v->rule('required', 'Tipo');
        $v->rule('alpha', 'Tipo');
        if ($v->validate()) {
            $this->tipo = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getUserTypes()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM tipousuario');
        return $db->resultSet();
    }
    public function getUserTypesCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM tipousuario');
        return $db->rowCount();
    }
    public function insertUserType($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into tipousuario (idtipousario, tipo) VALUES(DEFAULT, :tipo)');
        $db->bind(':tipo', $value->tipo);
        return $db->execute();
    }
    public function modifyUserType($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE tipousuario SET tipo = :tipo WHERE idtipousario = :idtipousario');
        $db->bind(':tipo', $value->tipo);
        $db->bind(':idtipousario', $value->idtipousario);
        return $db->execute();
    }
    public function deleteUserType($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM tipousuario WHERE idtipousario = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
