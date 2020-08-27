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
    public function productsReviewCountChart($result)
    {
        if ($result['dataset'] = $this->reviewsModel->productsReviewCountChart()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
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
    public function delete($data, $result)
    {
        $idReview = intval($data['idreview']);
        $categoria = new Review;

        if ($categoria->setIdReview($idReview)) {
            if ($categoria->deleteReview($idReview)) {
                $result['status'] = 1;
                $result['message'] = 'Review eliminada correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Review inexistente';
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
