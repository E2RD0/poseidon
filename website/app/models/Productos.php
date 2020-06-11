<?php

class Productos
{
    private $db;

    private $idproducto;
    private $nombre;
    private $precio;
    private $descripcion;
    private $imgurl;
    private $existenciascompra;
    private $idcategoriaproducto;

    public function __construct()
    {
    }
    public function getIdProducto()
    {
        return $this->idproducto;
    }

    public function setIdProducto($value)
    {
        $v = new \Valitron\Validator(array('idproducto' => $value));
        $v->rule('required', 'idproducto');
        $v->rule('integer', 'idproducto');
        if ($v->validate()) {
            $this->idproducto = $value;
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
        $v->rule('alpha', 'Nombre');
        if ($v->validate()) {
            $this->nombre = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($value)
    {
        $v = new \Valitron\Validator(array('Precio' => $value));
        $v->rule('required', 'Precio');
        $v->rule('numeric', 'Precio');
        if ($v->validate()) {
            $this->precio = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($value)
    {
        $v = new \Valitron\Validator(array('Descripcion' => $value));
        $v->rule('required', 'Descripcion');
        $v->rule('alphaNum', 'Descripcion');
        if ($v->validate()) {
            $this->precio = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getImgURL()
    {
        return $this->imgurl;
    }

    public function setImgURL($value)
    {
        $v = new \Valitron\Validator(array('ImgURL' => $value));
        $v->rule('required', 'ImgURL');
        $v->rule('alphaNum', 'ImgURL');
        if ($v->validate()) {
            $this->imgurl = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getExistenciasCompra()
    {
        return $this->existenciascompra;
    }

    public function setExistenciasCompra($value)
    {
        $v = new \Valitron\Validator(array('Teléfono' => $value));
        $v->rule('required', 'Teléfono');
        $v->rule('integer', 'Teléfono');
        if ($v->validate()) {
            $this->existenciascompra = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getIdCategoriaProducto()
    {
        return $this->idcategoriaproducto;
    }

    public function setIdCategoriaProducto($value)
    {
        $v = new \Valitron\Validator(array('Dirección' => $value));
        $v->rule('required', 'Dirección');
        $v->rule('integer', 'Dirección');
        if ($v->validate()) {
            $this->idcategoriaproducto = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getProducts()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProducts()');
        return $db->resultSet();
    }
    public function productCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM producto');
        return $db->rowCount();
    }
    public function insertProduct($user)
    {
        $db = new \Common\Database;
        $db->query('INSERT into producto (idproducto, nombre, precio, descripcion, imgurl, existenciascompra, idcategoriaproducto) VALUES(DEFAULT, :nombre, :precio, :descripcion, :imgurl, :existenciascompra, :idcategoriaproducto)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':precio', $user->precio);
        $db->bind(':descripcion', $user->descripcion);
        $db->bind(':imgurl', $user->imgurl);
        $db->bind(':existenciascompra', $user->existenciascompra);
        $db->bind(':idcategoriaproducto', $user->idcategoriaproducto);
        return $db->execute();
    }
    public function modifyProduct($user)
    {
        $db = new \Common\Database;
        $db->query('UPDATE producto SET nombre = :nombre, precio = :precio, descripcion = :descripcion, imgurl = :imgurl, existenciascompra = :existenciascompra, idcategoriaproducto = :idcategoriaproducto WHERE idproducto = :idproducto)');
        $db->bind(':nombre', $user->nombre);
        $db->bind(':precio', $user->precio);
        $db->bind(':descripcion', $user->descripcion);
        $db->bind(':imgurl', $user->imgurl);
        $db->bind(':existenciascompra', $user->existenciascompra);
        $db->bind(':idcategoriaproducto', $user->idcategoriaproducto);
        $db->bind(':idproducto', $user->idproducto);
        return $db->execute();
    }
    public function deleteProduct($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM producto WHERE idproducto = :idproducto)');
        $db->bind(':idproducto', $value);
        return $db->execute();
    }
}
