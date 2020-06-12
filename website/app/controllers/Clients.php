<?php
class Clients extends \Common\Controller
{
    public function __construct()
    {
        $this->model = $this->loadModel('Cliente');
    }

    public function categoriesCount($result)
    {
        if ($this->categoriesModel->categoriesCount()) {
            $result['status'] = 1;
            $result['message'] = 'Existe al menos una categoria';
        } else {
            $result['exception'] = 'No hay ninguna categoria registrada';
        }
        return $result;
    }
    public function show($result)
    {
        if ($result['dataset'] = $this->model->getClients()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay clientes registrados';
        }
        return $result;
    }

    public function showTypes($result)
    {
        if ($result['dataset'] = $this->model->getTypes()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay estados de cliente registrados';
        }
        return $result;
    }

    public function create($data, $result) {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['categoria'];

        $categoria = new CategoriaProducto;
        $errors = [];
        $errors = $categoria->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $categoria->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->categoriesModel->insertCategory($nombreCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría ingresada correctamente';
            }
            else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        }
        else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function update($data, $result) {
        $data = \Helpers\Validation::trimForm($data);
        $idCliente = intval($data['id']);
        $idEstadoCliente = intval($data['idEstadoCliente']);
        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userData['email'] ;
        $telefono = $userData['telefono'] ;
        $direccion = $userData['direccion'] ;

        $userInfo= $this->model->getClient($idCliente);


        $user = new Cliente;
        $errors = [];
        $errors = $user->setId($idCliente) === true ? $errors : array_merge($errors, $user->setId($idCliente));
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        if($email != $userInfo->email)
        {
            $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        }
        else {
            $errors = $user->setEmail($email, true) === true ? $errors : array_merge($errors, $user->setEmail($email, true));
        }
        $errors = $user->setIdEstado($idEstadoCliente) === true ? $errors : array_merge($errors, $user->setIdEstado($idEstadoCliente));
        $errors = $user->setTelefono($telefono) === true ? $errors : array_merge($errors, $user->setTelefono($telefono));
        $errors = $user->setDireccion($direccion) === true ? $errors : array_merge($errors, $user->setTelefono($direccion));
/*
        if (!boolval($errors)) {
            if ($this->model->updateCategory($nombreCategoria, $idCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría modificada correctamente';
            }
            else {
                $result['status'] = -1;
                $result['exception'] = \Common\Database::$exception;
            }
        }
        else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }*/
        return $result;
    }

    public function changeState($data, $result)
    {
        $id= intval($data['idCliente']);
        $idEstado= intval($data['idEstado']);
        $cliente = new Cliente;

        if ($cliente->setId($id) && $cliente->clientExists('idCliente',$id)) {
            if ($cliente->changeStateClient($id, $idEstado)) {
                $result['status'] = 1;
                $result['message'] = 'Estado actualizado correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Cliente inexistente';
        }
        return $result;
    }

    public function readOne($data, $result)
    {
        $id = intval($data['id']);
        $cliente = new Cliente;

        if ($cliente->setId($id) && $cliente->clientExists('idCliente',$id)) {
            if ($result['dataset'] = $cliente->getClient($id)) {
                $result['status'] = 1;
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'Cliente inexistente';
        }
        return $result;
    }
}
