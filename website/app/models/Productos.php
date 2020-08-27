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
    public function mostSoldProductsChart()
    {
        $db = new \Common\Database;
        $db->query('SELECT
                        nombre,
                        COUNT ( iddetalleorden ) as cantidad
                    FROM
                        detalleorden
                        JOIN orden USING ( idorden )
                        JOIN producto USING ( idproducto )
                    GROUP BY
                        idproducto,
                        nombre
                    ORDER BY
                        cantidad DESC
                        LIMIT 5');
        return $db->resultSet();
    }
    public function productsByCategoryChart()
    {
        $db = new \Common\Database;
        $db->query('SELECT
                        categoria,
                        COUNT ( idproducto ) as cantidad
                    FROM
                        producto
                        JOIN categoriaproducto USING ( idcategoriaproducto )
                    GROUP BY
                        idcategoriaproducto,
                        categoria
                    ORDER BY
                        cantidad DESC
                        LIMIT 5');
        return $db->resultSet();
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
    public function getReviewsInfo($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT count(idreview), calificacion from review WHERE idproducto = :id GROUP BY calificacion ORDER BY calificacion DESC');
        $db->bind(':id', $id);
        return $db->resultSet();
    }
    public function existsOrden($idProducto, $idCliente)
    {
        $db = new \Common\Database;
        $db->query('SELECT o.idcliente, d.idproducto FROM orden o INNER JOIN detalleorden d ON d.idorden = o.idorden WHERE idcliente =:idcliente AND idproducto=:idproducto AND idestadoorden != 1');
        $db->bind(':idcliente', $idCliente);
        $db->bind(':idproducto', $idProducto);
        return $db->rowCount();
    }
    public function existsReview($idProducto, $idCliente)
    {
        $db = new \Common\Database;
        $db->query('SELECT * from review where idcliente=:idcliente AND idproducto=:idproducto');
        $db->bind(':idcliente', $idCliente);
        $db->bind(':idproducto', $idProducto);
        return $db->getResult();
    }
    public function newReview($idProducto, $calificacion, $comentario, $idCliente)
    {
        $db = new \Common\Database;
        $db->query('INSERT into review VALUES (DEFAULT, :comentario, :calificacion, :idProducto, :idCliente)');
        $db->bind(':comentario', $comentario);
        $db->bind(':calificacion', $calificacion);
        $db->bind(':idProducto', $idProducto);
        $db->bind(':idCliente', $idCliente);
        return $db->execute();
    }
    public function getProduct($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT p.idProducto, nombre, precio, descripcion, imgUrl, existenciascompra, p.idCategoriaProducto, cp.categoria, AVG(r.calificacion) AS calificacion, count(r.idreview) AS numReviews
        FROM producto p INNER JOIN categoriaProducto cp ON p.idCategoriaProducto = cp.idCategoriaProducto LEFT JOIN review r ON r.idproducto = p.idproducto where p.idProducto = :id
        GROUP BY p.idproducto, cp.categoria');
        $db->bind(':id', $id);
        return $db->getResult();
    }
    public function getProductInfo(){
        $db = new \Common\Database;
        $db->query('SELECT count(idproducto), max(precio), min(precio)  from producto');
        return $db->getResult();
    }
    public function getProductPrice($id)
    {
        $db = new \Common\Database;
        $db->query('SELECT precio FROM producto WHERE idProducto = :id');
        $db->bind(':id', $id);
        return $db->getResult();
    }
    public function getProductQuantities()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM getProductQuantities(5)');
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
