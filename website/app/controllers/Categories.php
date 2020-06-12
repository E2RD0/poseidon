<?php
class Categories extends \Common\Controller
{
    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('CategoriaProducto');
    }

    public function categoriesCount($result)
    {
        if ($this->categoriesModel->categoriesCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos una categoria';
        } else {
            $result['exception'] = 'No hay ninguna categoria registrada';
        }
        return $result;
    }
    public function showCategories($result)
    {
        if ($result['dataset'] = $this->categoriesModel->getCategories()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay categorías registradas';
        }
        return $result;
    }
    public function create($data, $result) {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['categoria'];

        $categoria = new CategoriaProducto;
        $errors = [];
        $errors = $categoria->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $categoria->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->categoriesModel->insertCategory($nombreCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría ingresada correctamente';
            }
            else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        }
        else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function update($data, $result) {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['categoria'];
        $idCategoria = intval($data['id']);

        $categoria = new CategoriaProducto;
        $errors = [];
        $errors = $categoria->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $categoria->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->categoriesModel->updateCategory($nombreCategoria, $idCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría modificada correctamente';
            }
            else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        }
        else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function delete($data, $result)
    {
        $idCategoria = intval($data['id_categoria']);
        $categoria = new CategoriaProducto;

        if ($categoria->setId($idCategoria) && $categoria->existCategory($idCategoria)) {
            if ($categoria->deleteCategory($idCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría eliminada correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Categoría inexistente';
        }
        return $result;
    }

    public function readOne($data, $result)
    {
        $idCategoria = intval($data['id_categoria']);
        $categoria = new CategoriaProducto;

        if ($categoria->setId($idCategoria) && $categoria->existCategory($idCategoria)) {
            if ($result['dataset'] = $categoria->getOneCategory($idCategoria)) {
                $result['status'] = 1;
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Categoría inexistente';
        }
        return $result;
    }
}
