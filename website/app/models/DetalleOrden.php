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
    public function createDetail($orden)
    {
        $db = new \Common\Database;
        $db->query('INSERT INTO detalleorden VALUES (DEFAULT, :cantidad, :preciounitario, :idorden, :idproducto)');
        $db->bind(':cantidad', $orden->cantidad);
        $db->bind(':preciounitario', $orden->preciounitario);
        $db->bind(':idorden', $orden->idorden);
        $db->bind(':idproducto', $orden->idproducto);
        return $db->execute();
    }
    public function getIdOrderDetail($detalleorden){
        $db = new \Common\Database;
        $db->query('SELECT iddetalleorden, cantidad FROM detalleorden WHERE idorden = :idorden AND idproducto = :idproducto');
        $db->bind(':idorden', $detalleorden->idorden);
        $db->bind(':idproducto', $detalleorden->idproducto);
        return $db->resultSet();
    }
    public function getOrderDetails($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detalleorden WHERE idorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->resultSet();
    }
    public function getOrderDetailsCount($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM detalleorden WHERE idorden = :idorden');
        $db->bind(':idorden', $value);
        return $db->rowCount();
    }
    public function modifyOrderDetail($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE detalleorden SET cantidad = :cantidad WHERE iddetalleorden = :id');
        $db->bind(':cantidad', $value->cantidad);
        $db->bind(':id', $value->iddetalleorden);
        return $db->execute();
    }
    public function deleteDetail($value, $idOrden)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM detalleorden WHERE iddetalleorden = :id AND idorden = :idorden');
        $db->bind(':id', $value->iddetalleorden);
        $db->bind(':idorden', $idOrden);
        return $db->execute();
    }
}
