<?php
class Branch extends \Common\Controller
{
    public function __construct()
    {
        $this->branchModel = $this->loadModel('Sucursal');
    }

    public function branchCount($result)
    {
        if ($this->branchModel->getBranchesCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos una sucursal';
        } else {
            $result['exception'] = 'No hay ninguna sucursal registrada';
        }
        return $result;
    }
    public function showBranches($result)
    {
        if ($result['dataset'] = $this->branchModel->getBranches()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay sucursales registradas';
        }
        return $result;
    }
    public function create($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombre = $data['nombre'];
        $ubicacion = $data['ubicacion'];

        $sucursal = new Sucursal;
        $errors = [];
        $errors = $sucursal->setNombre($nombre) === true ? $errors : array_merge($errors, $sucursal->setNombre($nombre));
        $errors = $sucursal->setUbicacion($ubicacion) === true ? $errors : array_merge($errors, $sucursal->setUbicacion($ubicacion));

        if (!boolval($errors)) {
            if ($this->branchModel->insertBranch($sucursal)) {
                $result['status'] = 1;
                $result['message'] = 'Sucursal ingresada correctamente';
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
        $idSucursal = intval($data['idsucursal']);
        $sucursal = new Sucursal;

        if ($sucursal->setIdSucursal($idSucursal) && $sucursal->existBranch($idSucursal)) {
            if ($sucursal->deleteBranch($idSucursal)) {
                $result['status'] = 1;
                $result['message'] = 'Sucursal eliminada correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Sucursal inexistente';
        }
        return $result;
    }

    public function readOne($data, $result)
    {
        $idSucursal = intval($data['idsucursal']);
        $sucursal = new Sucursal;

        if ($sucursal->setIdSucursal($idSucursal) && $sucursal->existBranch($idSucursal)) {
            if ($result['dataset'] = $sucursal->getOneBranch($idSucursal)) {
                $result['status'] = 1;
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Sucursal inexistente';
        }
        return $result;
    }

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombre = $data['nombre'];
        $idsucursal = intval($data['id']);
        $ubicacion = $data['ubicacion'];

        $sucursal = new Sucursal;
        $errors = [];
        $errors = $sucursal->setNombre($nombre) === true ? $errors : array_merge($errors, $sucursal->setNombre($nombre));
        $errors = $sucursal->setUbicacion($ubicacion) === true ? $errors : array_merge($errors, $sucursal->setUbicacion($ubicacion));

        if (!boolval($errors)) {

            if ($this->branchModel->modifyBranch($sucursal, $idsucursal)) {
                $result['status'] = 1;
                $result['message'] = 'Sucursal modificada correctamente';
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
}
