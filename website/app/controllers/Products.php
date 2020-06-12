<?php
class Products extends \Common\Controller
{
    public function __construct()
    {
        $this->productsModel = $this->loadModel('Productos');
    }

    public function productsCount($result)
    {
        if ($this->productsModel->categoriesCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos un producto';
        } else {
            $result['exception'] = 'No hay ningun producto registrado';
        }
        return $result;
    }
    public function showProducts($result)
    {
        if ($result['dataset'] = $this->productsModel->getProducts()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function getProductQuantities($result)
    {
        if ($result['dataset'] = $this->productsModel->getProductQuantities()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function create($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['producto'];

        $producto = new Productos;
        $errors = [];
        //$errors = $producto->set($nombreCategoria) === true ? $errors : array_merge($errors, $producto->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->productsModel->insertCategory($nombreCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría ingresada correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['producto'];
        $idProducto = intval($data['id_producto']);

        $producto = new Productos;
        $errors = [];
        //$errors = $producto->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $producto->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->productsModel->updateCategory($nombreCategoria, $idProducto)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría modificada correctamente';
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function delete($data, $result)
    {
        $idProducto = intval($data['idproducto']);
        $producto = new Productos;

        if ($producto->setIdProducto($idProducto) && $producto->existProduct($idProducto)) {
            if ($producto->deleteProduct($idProducto)) {
                $result['status'] = 1;
                $result['message'] = 'Producto eliminado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Producto inexistente';
        }
        return $result;
    }

    public function readOne($data, $result)
    {
        $idProducto = intval($data['id_producto']);
        $producto = new Productos;

        if ($producto->setId($idProducto) && $producto->existCategory($idProducto)) {
            if ($result['dataset'] = $producto->getOneCategory($idProducto)) {
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
