<?php
class Products extends \Common\Controller
{
    public function __construct()
    {
        $this->productsModel = $this->loadModel('Productos');
        $this->alquilerModel = $this->loadModel('InformacionAlquiler');
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
    public function showFeaturedProducts($result)
    {
        if ($result['dataset'] = $this->productsModel->getFeaturedProducts()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function getProductInfo($result)
    {
        if ($result['dataset'] = $this->productsModel->getProductInfo()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function mostSoldChart($result)
    {
        if ($result['dataset'] = $this->productsModel->mostSoldProductsChart()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function productsByCategoryChart($result)
    {
        if ($result['dataset'] = $this->productsModel->productsByCategoryChart()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function getReviewsProduct($data, $result)
    {
        $idProducto = intval($data['id_producto']);
        $producto = new Productos;

        if ($producto->setIdProducto($idProducto) && $producto->existProduct($idProducto)) {
            if ($result['dataset'] = $producto->getReviews($idProducto)) {
                $result['status'] = 1;
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Producto inexistente';
        }
        return $result;
    }
    public function checkReview($data, $result)
    {
        $idProducto = intval($data['id_producto']);
        $idCliente = $_SESSION['client_id'];
        $producto = new Productos;

        if ($producto->existsOrden($idProducto, $idCliente) > 0) {
            $review = $producto->existsReview($idProducto, $idCliente);
            if ($review) {
                $result['dataset'] = $review;
                $result['status'] = 1;
            }
            else {
                $result['status'] = 0;
            }
        } else {
            $result['status'] = -1;
            $result['exception'] = 'Para poder hacer una reseña se debe haber comprado el producto.';
        }
        return $result;
    }
    public function newReview($data, $result)
    {
        $idProducto = intval($data['id_producto']);
        $calificacion = intval($data['calificacion']);
        $comentario = $data['review'];
        $idCliente = $_SESSION['client_id'];
        $producto = new Productos;

        if ($producto->existsOrden($idProducto, $idCliente) > 0) {
            $review = $producto->existsReview($idProducto, $idCliente);
            if ($review) {
                $result['exception'] = 'Ya existe una reseña.';
            }
            else {
                if($producto->newReview($idProducto, $calificacion, $comentario, $idCliente)){
                    $result['status'] = 1;
                }
                else{
                    $result['exception'] = 'Error al ingresar la reseña.';
                }
            }
        } else {
            $result['exception'] = 'Para poder hacer una reseña se debe haber comprado el producto.';
        }
        return $result;
    }
    public function getReviewsInfo($data, $result)
    {
        $idProducto = intval($data['id_producto']);
        $producto = new Productos;

        if ($producto->setIdProducto($idProducto) && $producto->existProduct($idProducto)) {
            if ($result['dataset'] = $producto->getReviewsInfo($idProducto)) {
                $result['status'] = 1;
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Producto inexistente';
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
    private function uploadImage($img){

    }

    public function create($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);

        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $existencias = $data['existenciascompra'];
        $idcategoria = $data['idcategoriaproducto'];
        $precio = $data['precio'];
        $poliza = $data['poliza'];
        $precioalquiler = $data['precioalquiler'];
        $existenciasalquiler = $data['existenciasalquiler'];
        $sepuedealquilar = ($data['sepuedealquilar'] == 'on') ? true : false;

        $producto = new Productos;
        $alquiler = new InformacionAlquiler;

        $errors = [];
        $errors = $producto->setNombre($nombre) === true ? $errors : array_merge($errors, $producto->setNombre($nombre));
        $errors = $producto->setDescripcion($descripcion) === true ? $errors : array_merge($errors, $producto->setDescripcion($descripcion));
        $errors = $producto->setExistenciasCompra($existencias) === true ? $errors : array_merge($errors, $producto->setExistenciasCompra($existencias));
        $errors = $producto->setIdCategoriaProducto($idcategoria) === true ? $errors : array_merge($errors, $producto->setIdCategoriaProducto($idcategoria));
        $errors = $producto->setPrecio($precio) === true ? $errors : array_merge($errors, $producto->setPrecio($precio));

        if ($sepuedealquilar === true) {
            $errors = $alquiler->setPoliza($poliza) === true ? $errors : array_merge($errors, $alquiler->setPoliza($poliza));
            $errors = $alquiler->setPrecioAlquiler($precioalquiler) === true ? $errors : array_merge($errors, $alquiler->setPrecioAlquiler($precioalquiler));
            $errors = $alquiler->setExistenciasAlquiler($existenciasalquiler) === true ? $errors : array_merge($errors, $alquiler->setExistenciasAlquiler($existenciasalquiler));
        }

        if (!boolval($errors) && !($producto->existProduct($nombre))) {
            if ($idProducto = $producto->insertProduct($producto)->idproducto) {
                if (!$alquiler->existRental($idProducto) && $sepuedealquilar === true) {
                    $alquiler->setIdProducto($idProducto) === true ? $errors : array_merge($errors, $alquiler->setIdProducto($idProducto));
                    if ($alquiler->insertRentalInformation($alquiler)) {
                        $result['status'] = 1;
                        $result['message'] = 'El alquiler del producto ha sido ingresado correctamente';
                    } else {
                        $result['status'] = -1;
                        $result['exception'] = \Common\Database::$exception;
                    }
                } else {
                    $result['status'] = 1;
                    $result['message'] = 'Producto ingresado correctamente';
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        }else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $existencias = $data['existenciascompra'];
        $idcategoria = $data['idcategoriaproducto'];
        $precio = $data['precio'];
        $idProducto = intval($data['idproducto']);
        $producto = new Productos;
        $errors = [];
        $errors = $producto->setNombre($nombre) === true ? $errors : array_merge($errors, $producto->setNombre($nombre));
        $errors = $producto->setDescripcion($descripcion) === true ? $errors : array_merge($errors, $producto->setDescripcion($descripcion));
        $errors = $producto->setExistenciasCompra($existencias) === true ? $errors : array_merge($errors, $producto->setExistenciasCompra($existencias));
        $errors = $producto->setIdCategoriaProducto($idcategoria) === true ? $errors : array_merge($errors, $producto->setIdCategoriaProducto($idcategoria));
        $errors = $producto->setPrecio($precio) === true ? $errors : array_merge($errors, $producto->setPrecio($precio));

        if (!boolval($errors)) {
            if ($this->productsModel->updateCategory($producto, $idProducto)) {
                $result['status'] = 1;
                $result['message'] = 'Producto modificado correctamente';
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

        $nombre = $producto->getProductName($idProducto)->nombre;

        if ($producto->setIdProducto($idProducto) && $producto->existProduct($nombre)) {
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

        if ($producto->setId($idProducto) && $producto->existProduct($idProducto)) {
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
