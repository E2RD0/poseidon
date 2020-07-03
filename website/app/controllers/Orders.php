<?php
class Orders extends \Common\Controller
{
    public function __construct()
    {
        $this->ordersModel = $this->loadModel('Orden');
        $this->ordersDetailModel = $this->loadModel('DetalleOrden');
        $this->productsModel = $this->loadModel('Productos');
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

    public function createDetail($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);

        $idCliente = intval($data['idcliente']);
        $idProducto = intval($data['idproducto']);
        $cantidad = intval($data['cantidad']);

        $ordenController = new Orden;
        $detalleordenController = new DetalleOrden;
        $productoController = new Productos;

        $orden = $ordenController->readOrder($idCliente);
        if ($orden['status']) {
            $preerrors = [];

            $preerrors = $detalleordenController->setIdProducto($idProducto) === true ? $preerrors : array_merge($preerrors, $detalleordenController->setPrecioUnitario($idProducto));
            $preerrors = $detalleordenController->setIdOrden(intval($orden['idorden'])) === true ? $preerrors : array_merge($preerrors, $detalleordenController->setIdOrden(intval($orden['idorden'])));

            if (!boolval($preerrors)) {
                if (!boolval($detalleorden = $detalleordenController->getIdOrderDetail($detalleordenController))) {
                    if ($productoController->setIdProducto($idProducto) && $precio = $productoController->getProductPrice($idProducto)->precio) {
                        $errors = [];

                        $errors = $detalleordenController->setCantidad($cantidad) === true ? $errors : array_merge($errors, $detalleordenController->setCantidad($cantidad));
                        $errors = $detalleordenController->setIdProducto($idProducto) === true ? $errors : array_merge($errors, $detalleordenController->setIdProducto($idProducto));
                        $errors = $detalleordenController->setPrecioUnitario($precio) === true ? $errors : array_merge($errors, $detalleordenController->setPrecioUnitario($precio));
                        $errors = $detalleordenController->setIdOrden(intval($orden['idorden'])) === true ? $errors : array_merge($errors, $detalleordenController->setIdOrden(intval($orden['idorden'])));

                        if (!boolval($errors)) {
                            if ($detalleordenController->createDetail($detalleordenController)) {
                                $result['status'] = 1;
                                $result['message'] = 'Producto agregado al carrito exitosamente';
                            } else {
                                $result['exception'] = \Common\Database::$exception;
                            }
                        } else {
                            $result['exception'] = 'Error en uno de los campos';
                            $result['errors'] = $errors;
                        }
                    } else {
                        $result['exception'] = \Common\Database::$exception;
                    }
                } else {
                    $data['cantidad'] += $detalleorden['0']->cantidad;
                    return $this->updateDetail(array_merge($data, array('iddetalleorden'=>$detalleorden['0']->iddetalleorden)), $result);
                }
            }
            return $result;
        }
    }

    public function readCart($data, $result)
    {
        $idCliente = intval($data['idcliente']);
        $ordenController = new Orden;

        $orden = $ordenController->readOrder($idCliente);

        if ($orden['status']) {
            if ($result['dataset'] = $ordenController->readCart(intval($orden['idorden']))) {
                $result['status'] = 1;
                $result['message'] = 'Carrito cargado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'No hay ningún carrito activo.';
        }
        return $result;
    }

    public function updateDetail($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);

        $cantidad = intval($data['cantidad']);
        $iddetalleorden = intval($data['iddetalleorden']);

        $detalleordenController = new DetalleOrden;

        $errors = [];

        $errors = $detalleordenController->setIdDetalleOrden($iddetalleorden) === true ? $errors : array_merge($errors, $detalleordenController->setIdDetalleOrden($iddetalleorden));
        $errors = $detalleordenController->setCantidad($cantidad) === true ? $errors : array_merge($errors, $detalleordenController->setCantidad($cantidad));

        if (!boolval($errors)) {
            if ($detalleordenController->modifyOrderDetail($detalleordenController)) {
                $result['status'] = 1;
                $result['message'] = 'Cantidad modificada correctamente';
            } else {
                $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
            }
        } else {
            $result['exception'] = 'Detalle incorrecto';
            $result['errors'] = $errors;
        }
        return $result;
    }
    public function deleteDetail($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);

        $idCliente = intval($data['idcliente']);
        $iddetalleorden = intval($data['iddetalleorden']);

        $detalleordenController = new DetalleOrden;
        $ordenController = new Orden;

        $orden = $ordenController->readOrder($idCliente);
        if ($orden['status']) {
            $errors = [];

            $errors = $detalleordenController->setIdDetalleOrden($iddetalleorden) === true ? $errors : array_merge($errors, $detalleordenController->setIdDetalleOrden($iddetalleorden));

            if (!boolval($errors)) {
                if ($detalleordenController->deleteDetail($detalleordenController, $orden['idorden'])) {
                    $result['status'] = 1;
                    $result['message'] = 'Producto removido correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al remover el producto';
                }
            } else {
                $result['exception'] = 'Detalle incorrecto';
            }
        } else {
            $result['exception'] = 'No hay ningún carrito de compra activo.';
        }
        return $result;
    }
    public function finishOrder()
    {
        if ($pedido->setIdPedido($_SESSION['id_pedido'])) {
            if ($pedido->setEstado(1)) {
                if ($pedido->updateOrderStatus()) {
                    $result['status'] = 1;
                    $result['message'] = 'Pedido finalizado correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                }
            } else {
                $result['exception'] = 'Estado incorrecto';
            }
        } else {
            $result['exception'] = 'Pedido incorrecto';
        }
        return $result;
    }
}
