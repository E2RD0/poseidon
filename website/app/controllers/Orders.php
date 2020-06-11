<?php
class Orders extends \Common\Controller
{
    public function __construct()
    {
        $this->ordersModel = $this->loadModel('Orden');
    }

    public function ordersCount($result)
    {
        if ($this->ordersModel->getOrdersCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos una orden';
        } else {
            $result['exception'] = 'No hay ninguna orden registrada';
        }
        return $result;
    }
    public function showOrders($result)
    {
        if ($result['dataset'] = $this->ordersModel->getOrders()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay ordenes registradas';
        }
        return $result;
    }
    public function getOrderDetails($data, $result)
    {
        $idOrden = intval($data['idorden']);
        $orden = new Orden;

        if ($orden->setIdOrden($idOrden)) {
            if ($result['dataset'] = $orden->getOrderDetails($idOrden)) {
                $result['status'] = 1;
                $result['message'] = 'Orden cargada correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'La orden no existe';
        }
        return $result;
    }
    public function getOrderGeneralDetails($data, $result)
    {
        $idOrden = intval($data['idorden']);
        $orden = new Orden;

        if ($orden->setIdOrden($idOrden)) {
            if ($result['dataset'] = $orden->getOrderGeneralDetails($idOrden)) {
                $result['status'] = 1;
                $result['message'] = 'Orden cargada correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'La orden no existe';
        }
        return $result;
    }
    public function getRecentOrders($result)
    {
        if ($result['dataset'] = $this->ordersModel->getRecentOrders()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay ordenes registradas';
        }
        return $result;
    }
    public function getOrdersCount($result)
    {
        if ($result['dataset'] = $this->ordersModel->getOrdersCount()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay ordenes registradas';
        }
        return $result;
    }
    // public function create($data, $result) {
    //     $data = \Helpers\Validation::trimForm($data);
    //     $nombreCategoria = $data['categoria'];

    //     $categoria = new CategoriaProducto;
    //     $errors = [];
    //     $errors = $categoria->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $categoria->setCategoria($nombreCategoria));

    //     if (!boolval($errors)) {
    //         if ($this->ordersModel->insertCategory($nombreCategoria)) {
    //             $result['status'] = 1;
    //             $result['message'] = 'Categoría ingresada correctamente';
    //         }
    //         else {
    //             $result['status'] = -1;
    //             $result['exception'] = \Common\Database::$exception;
    //         }
    //     }
    //     else {
    //         $result['exception'] = 'Error en uno de los campos';
    //         $result['errors'] = $errors;
    //     }
    //     return $result;
    // }
    // public function delete($data, $result)
    // {
    //     $idCategoria = intval($data['id_categoria']);
    //     $categoria = new CategoriaProducto;

    //     if ($categoria->setId($idCategoria) && $categoria->existCategory($idCategoria)) {
    //         if ($categoria->deleteCategory($idCategoria)) {
    //             $result['status'] = 1;
    //             $result['message'] = 'Categoría eliminada correctamente';
    //         } else {
    //             $result['exception'] = \Common\Database::$exception;
    //         }
    //     } else {
    //         $result['exception'] = 'Categoría inexistente';
    //     }
    //     return $result;
    // }
}
