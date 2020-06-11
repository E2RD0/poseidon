<?php
class Rentals extends \Common\Controller
{
    public function __construct()
    {
        $this->rentalsModel = $this->loadModel('OrdenAlquiler');
    }
    public function showRentals($result)
    {
        if ($result['dataset'] = $this->rentalsModel->getRentalOrders()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay alquileres registrados';
        }
        return $result;
    }
    public function getRentalDetails($data, $result)
    {
        $idAlquiler = intval($data['idorden']);
        $alquiler = new OrdenAlquiler;

        if ($alquiler->setIdOrdenAlquiler($idAlquiler)) {
            if ($result['dataset'] = $alquiler->getRentalDetails($idAlquiler)) {
                $result['status'] = 1;
                $result['message'] = 'Alquiler cargado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'El alquiler no existe';
        }
        return $result;
    }
    public function getRentalGeneralDetails($data, $result)
    {
        $idAlquiler = intval($data['idorden']);
        $alquiler = new OrdenAlquiler;

        if ($alquiler->setIdOrdenAlquiler($idAlquiler)) {
            if ($result['dataset'] = $alquiler->getRentalGeneralDetails($idAlquiler)) {
                $result['status'] = 1;
                $result['message'] = 'Alquiler cargado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'El alquiler no existe';
        }
        return $result;
    }
}
