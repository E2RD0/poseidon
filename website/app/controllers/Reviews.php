<?php
class Reviews extends \Common\Controller
{
    public function __construct()
    {
        $this->reviewsModel = $this->loadModel('Review');
    }
    public function getProductReviews($data, $result)
    {
        $idAlquiler = intval($data['idproducto']);
        $alquiler = new Review;

        if ($alquiler->setIdReview($idAlquiler)) {
            if ($result['dataset'] = $alquiler->getProductReviews($idAlquiler)) {
                $result['status'] = 1;
                $result['message'] = 'Reseñas cargadas correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'No hay reseñas para este producto';
        }
        return $result;
    }
    public function getProductReviewData($data, $result)
    {
        $idAlquiler = intval($data['idproducto']);
        $alquiler = new Review;

        if ($alquiler->setIdReview($idAlquiler)) {
            if ($result['dataset'] = $alquiler->getProductReviewData($idAlquiler)) {
                $result['status'] = 1;
                $result['message'] = 'Reseñas cargadas correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'No hay reseñas para este producto';
        }
        return $result;
    }
    // public function delete($data, $result)
    // {
    //     $idProducto = intval($data['id_producto']);
    //     $producto = new Review;

    //     if ($producto->setId($idProducto) && $producto->existCategory($idProducto)) {
    //         if ($producto->deleteCategory($idProducto)) {
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
