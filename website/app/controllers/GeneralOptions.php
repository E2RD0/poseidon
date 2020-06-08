<?php
class GeneralOptions extends \Common\Controller
{
    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('OpcionesGenerales');
    }

    public function generalOptionsCount($result)
    {
        if ($this->categoriesModel->getGeneralOptionsCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos un parámetro';
        } else {
            $result['exception'] = 'No hay ningún parámetro registrado';
        }
        return $result;
    }
    public function showGeneralOptions($result)
    {
        if ($result['dataset'] = $this->categoriesModel->getGeneralOptions()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay parámetros registrados';
        }
        return $result;
    }
    public function create($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombreParametro = $data['clave'];
        $valorParametro = $data['valor'];

        $parametro = new OpcionesGenerales;
        $errors = [];
        $errors = $parametro->setClave($nombreParametro) === true ? $errors : array_merge($errors, $parametro->setClave($nombreParametro));
        $errors = $parametro->setValor($valorParametro) === true ? $errors : array_merge($errors, $parametro->setValor($valorParametro));

        if (!boolval($errors)) {
            if ($this->categoriesModel->insertGeneralOption($parametro)) {
                $result['status'] = 1;
                $result['message'] = 'Parámetro ingresado correctamente';
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
        $idParametro = intval($data['id_opcion']);
        $parametro = new OpcionesGenerales;

        if ($parametro->setIdOpcion($idParametro) && $parametro->existCategory($idParametro)) {
            if ($parametro->deleteGeneralOption($idParametro)) {
                $result['status'] = 1;
                $result['message'] = 'Parámetro eliminado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Parámetro inexistente';
        }
        return $result;
    }
}
