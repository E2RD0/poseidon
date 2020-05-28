<?php

class DetalleOrden
{
    private $db;

    private $iddetalleorden;
    private $cantidad;
    private $preciounitario;
    private $idorden;
    private $idproducto;

    public function __construct()
    {
    }
    public function getIdDetalleOrden()
    {
        return $this->iddetalleorden;
    }

    public function setIdDetalleOrden($value)
    {
        $v = new \Valitron\Validator(array('IdDetalleOrden' => $value));
        $v->rule('required', 'IdDetalleOrden');
        $v->rule('integer', 'IdDetalleOrden');
        if ($v->validate()) {
            $this->iddetalleorden = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($value)
    {
        $v = new \Valitron\Validator(array('Cantidad' => $value));
        $v->rule('required', 'Cantidad');
        $v->rule('integer', 'Cantidad');
        if ($v->validate()) {
            $this->cantidad = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getPrecioUnitario()
    {
        return $this->preciounitario;
    }

    public function setPrecioUnitario($value)
    {
        $v = new \Valitron\Validator(array('PrecioUnitario' => $value));
        $v->rule('required', 'PrecioUnitario');
        $v->rule('numeric', 'PrecioUnitario');
        if ($v->validate()) {
            $this->preciounitario = $value;
            return true;
        } else {
            return $v->errors();
        }
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

    public function getIdProducto()
    {
        return $this->idproducto;
    }

    public function setIdProducto($value)
    {
        $v = new \Valitron\Validator(array('IdProducto' => $value));
        $v->rule('required', 'IdProducto');
        $v->rule('integer', 'IdProducto');
        if ($v->validate()) {
            $this->idproducto = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getOrderDetails($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detalleorden WHERE idorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getRentalDetailsCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detalleorden WHERE idorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function insertRentalDetail($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into detallealquiler (iddetalleorden, cantidad, preciounitario, idorden, idproducto)
                    VALUES(DEFAULT, :cantidad, :preciounitario, :idorden, :idproducto)');
        $db->bind(':cantidad', $value->cantidad);
        $db->bind(':preciounitario', $value->preciounitario);
        $db->bind(':idorden', $value->idorden);
        $db->bind(':idproducto', $value->idproducto);
        return $db->execute();
    }
    public function modifyOrderDetail($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE detallealquiler
        SET cantidad = :cantidad, preciounitario = :preciounitario, idorden = :idorden, idproducto = :idproducto
        WHERE iddetalleorden = :idinformacionalquiler');
        $db->bind(':cantidad', $value->cantidad);
        $db->bind(':preciounitario', $value->preciounitario);
        $db->bind(':idorden', $value->idorden);
        $db->bind(':idproducto', $value->idproducto);
        $db->bind(':iddetalleorden', $value->iddetalleorden);
        return $db->execute();
    }
    public function deleteOrderDetail($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM detalleorden WHERE iddetalleorden = :id)');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
