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

    public function readCart($data, $result)
    {
        $idCliente = intval($data['idcliente']);
        $ordenController = new Orden;

        $orden = $ordenController->readOrder($idCliente);

        if ($orden['status']) {
            if ($result['dataset'] = $ordenController->readCart(intval($orden['idorden']))) {
                $result['status'] = 1;
                $result['message'] = $orden['message'].'carrito cargado correctamente';
            } else {
                if(!boolval($result['exception'] = \Common\Database::$exception))
                    $result['message'] = $orden['message'].'carrito cargado correctamente';
            }
        } else {
            $result['exception'] = 'No hay ningún carrito activo.';
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

        if (boolval($orden = $ordenController->readOrder($idCliente))){
            if ($orden['status']) {
                if ($detalleordenController->deleteDetail($iddetalleorden, $orden['idorden'])) {
                    $result['status'] = 1;
                    $result['message'] = 'Producto removido correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al remover el producto';
                }
            } else {
                $result['exception'] = 'No hay ningún carrito de compra activo.';
            }
        } else {
            $result['exception'] = 'No existe la orden.';
        }
        return $result;
    }
    public function finishOrder($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);

        $idCliente = intval($data['idcliente']);
        $direccion = $data['address'];
        $fechaentrega = $data['date'];
        $ordenController = new Orden;

        $orden = $ordenController->readOrder($idCliente);

        if ($orden['status']) {

            $errors = [];

            $errors = $ordenController->setIdOrden(intval($orden['idorden'])) === true ? $errors : array_merge($errors, $ordenController->setIdOrden(intval($orden['idorden'])));
            $errors = $ordenController->setDireccion($direccion) === true ? $errors : array_merge($errors, $ordenController->setDireccion($direccion));
            $errors = $ordenController->setFechaEntrega($fechaentrega) === true ? $errors : array_merge($errors, $ordenController->setFechaEntrega($fechaentrega));

            if (boolval($total = $ordenController->readCartTotal(intval($orden['idorden'])))) {

                $errors = $ordenController->setSubTotal($total['0']->subtotal) === true ? $errors : array_merge($errors, $ordenController->setSubTotal($total['0']->subtotal));

                if (!boolval($errors)){

                    if ($ordenController->setIdOrden($orden['idorden'])) {
                        if ($ordenController->setIdEstadoOrden(2)) {
                            if ($ordenController->updateOrderStatus()) {
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
                } else {
                    $result['exception'] = 'Error en uno de los campos';
                    $result['errors'] = $errors;
                }
            } else {
                $result['exception'] = 'Hubo un error al cargar el total de la orden';
            }
        } else {
            $result['exception'] = 'Hubo un error al cargar la orden actual';
        }
        return $result;
    }
    public function getAddress($data, $result)
    {
        $idCliente = intval($data['idcliente']);
        $orden = new Orden;

        if ($orden->setIdCliente($idCliente)) {
            $direccion = $orden->getClientAddress($idCliente)->direccion;
            if ($direccion != null) {
                $result['dataset'] = $direccion;
                $result['status'] = 1;
                $result['message'] = 'Dirección conseguida correctamente';
            } else {
                $result['message'] = 'No existe una dirección asignada';
            }
        } else {
            $result['exception'] = 'Hubo un problema al conseguir el identificador del cliente.';
        }
        return $result;
    }
}
