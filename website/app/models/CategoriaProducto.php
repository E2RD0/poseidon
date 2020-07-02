<?php

class CategoriaProducto
{
    private $db;

    private $id;
    private $categoria;

    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $v = new \Valitron\Validator(array('Id' => $value));
        $v->rule('required', 'Id');
        $v->rule('integer', 'Id');
        if ($v->validate()) {
            $this->id = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($value)
    {
        $v = new \Valitron\Validator(array('Categoría' => $value));
        $v->rule('required', 'Categoría');
        $v->rule('alpha', 'Categoría');
        if ($v->validate()) {
            $this->categoria = $value;
            return true;
        } else {
            return $v->errors();
        }
    }

    public function existCategory($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM categoriaproducto WHERE idcategoriaproducto = :value');
        $db->bind(':value', $value);
        return boolval($db->rowCount());
    }
    public function getCategories()
    {
        $db = new \Common\Database;
        $db->query('SELECT cp.idcategoriaproducto, categoria, COUNT(p.idcategoriaproducto) AS numProductos FROM categoriaproducto cp INNER JOIN producto p on p.idcategoriaproducto = cp.idcategoriaproducto GROUP BY cp.idcategoriaproducto ORDER BY idcategoriaproducto');
        return $db->resultSet();
    }
    public function getOneCategory($value)
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM categoriaproducto WHERE idcategoriaproducto = :value');
        $db->bind(':value', $value);
        return $db->getResult();
    }
    public function categoriesCount()
    {
        $db = new \Common\Database;
        $db->query('SELECT * FROM categoriaproducto');
        return $db->rowCount();
    }
    public function insertCategory($value)
    {
        $db = new \Common\Database;
        $db->query('INSERT into categoriaproducto(idcategoriaproducto, categoria) VALUES(DEFAULT, :categoria)');
        $db->bind(':categoria', $value);
        return $db->execute();
    }
    public function updateCategory($value, $id)
    {
        $db = new \Common\Database;
        $db->query('UPDATE categoriaproducto SET categoria = :categoria WHERE idcategoriaproducto = :id');
        $db->bind(':categoria', $value);
        $db->bind(':id', $id);
        return $db->execute();
    }
    public function deleteCategory($value)
    {
        $db = new \Common\Database;
        $db->query('DELETE FROM categoriaproducto WHERE idcategoriaproducto = :id');
        $db->bind(':id', $value);
        return $db->execute();
    }
}
