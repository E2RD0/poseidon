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
        $v->rule('ascii', 'Nombre');
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
        $v->rule('ascii', 'Descripcion');
        if ($v->validate()) {
            $this->descripcion = $value;
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
        $v->rule('ascii', 'ImgURL');
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
        $v = new \Valitron\Validator(array('Existencias' => $value));
        $v->rule('required', 'Existencias');
        $v->rule('integer', 'Existencias');
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
        $v = new \Valitron\Validator(array('Categoria' => $value));
        $v->rule('required', 'Categoria');
        $v->rule('integer', 'Categoria');
        if ($v->validate()) {
            $this->idcategoriaproducto = $value;
            return true;
        } else {
            return $v->errors();
        }
    }
    public function existProduct($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM producto WHERE idProducto = :id');
        $db->bind(':id', $value);
        return boolval($db->rowCount());
    }
    public function getProductName($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT nombre FROM producto WHERE idproducto = :idproducto');
        $db->bind(':idproducto', $value);
        return $db->getResult();
    }
    public function getProducts()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProducts()');
        return $db->resultSet();
    }
    public function getFeaturedProducts()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getFeaturedProducts()');
        return $db->resultSet();
    }
    public function getReviews($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT r.idreview, comentario, calificacion, r.idproducto, r.idcliente, c.nombre, c.apellido FROM review r INNER JOIN cliente c ON c.idcliente = r.idcliente where idproducto=:id');
        $db->bind(':id', $id);
        return $db->resultSet();
    }
    public function getProduct($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT idProducto, nombre, precio, descripcion, imgUrl, existenciascompra, p.idCategoriaProducto, cp.categoria FROM producto p INNER JOIN categoriaProducto cp ON p.idCategoriaProducto = cp.idCategoriaProducto where idProducto = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }
    public function getProductInfo(){
        $db = new \Common\Database;
        $db->query('SELECT count(idproducto), max(precio), min(precio)  from producto');
        return $db->getResult();
    }
    public function getProductQuantities()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProductQuantities()');
        return $db->resultSet();
    }
    public function productCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM producto');
        return $db->rowCount();
    }
    public function insertProduct($producto)
    {
        $db = new \Common\Database;
        $db->query('INSERT into producto VALUES (DEFAULT, :nombre, :precio, :descripcion, :imgurl, :existenciascompra, :idcategoriaproducto) RETURNING idproducto');
        $db->bind(':nombre', $producto->nombre);
        $db->bind(':precio', $producto->precio);
        $db->bind(':descripcion', $producto->descripcion);
        $db->bind(':imgurl', 'default.png');
        $db->bind(':existenciascompra', $producto->existenciascompra);
        $db->bind(':idcategoriaproducto', $producto->idcategoriaproducto);
        return $db->getResult();
    }
    public function modifyProduct($producto)
    {
        $db = new \Common\Database;
        $db->query('UPDATE producto SET nombre = :nombre, precio = :precio, descripcion = :descripcion, imgurl = :imgurl, existenciascompra = :existenciascompra, idcategoriaproducto = :idcategoriaproducto WHERE idproducto = :idproducto)');
        $db->bind(':nombre', $producto->nombre);
        $db->bind(':precio', $producto->precio);
        $db->bind(':descripcion', $producto->getDescripcion());
        $db->bind(':imgurl', $producto->imgurl);
        $db->bind(':existenciascompra', $producto->existencias);
        $db->bind(':idcategoriaproducto', $producto->idcategoriaproducto);
        $db->bind(':idproducto', $producto->idproducto);
        return $db->execute();

    }
    public function deleteProduct($value)
    {
        $db = new \Common\Database;
        $db->query('UPDATE producto SET existe = FALSE WHERE idproducto = :idproducto');
        $db->bind(':idproducto', $value);
        return $db->execute();
    }
}
