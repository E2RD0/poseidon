<?php
class Clients extends \Common\Controller
{
    public function __construct()
    {
        $this->model = $this->loadModel('Cliente');
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

    public function create($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $nombreCategoria = $data['categoria'];

        $categoria = new CategoriaProducto;
        $errors = [];
        $errors = $categoria->setCategoria($nombreCategoria) === true ? $errors : array_merge($errors, $categoria->setCategoria($nombreCategoria));

        if (!boolval($errors)) {
            if ($this->categoriesModel->insertCategory($nombreCategoria)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría ingresada correctamente';
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

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $idCliente = $data['id'];
        $idEstadoCliente = $data['idEstadoCliente'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'] ;
        $telefono = $data['telefono'] ;
        $direccion = $data['direccion'] ;

        $clienteInfo= $this->model->getClient($idCliente);


        $cliente = new Cliente;
        $errors = [];
        $errors = $cliente->setId($idCliente) === true ? $errors : array_merge($errors, $cliente->setId($idCliente));
        $errors = $cliente->setNombre($nombre) === true ? $errors : array_merge($errors, $cliente->setNombre($nombre));
        $errors = $cliente->setApellido($apellido) === true ? $errors : array_merge($errors, $cliente->setApellido($apellido));
        if ($email != $clienteInfo->email) {
            $errors = $cliente->setEmail($email) === true ? $errors : array_merge($errors, $cliente->setEmail($email));
        } else {
            $errors = $cliente->setEmail($email, true) === true ? $errors : array_merge($errors, $cliente->setEmail($email, true));
        }
        $errors = $cliente->setIdEstado($idEstadoCliente) === true ? $errors : array_merge($errors, $cliente->setIdEstado($idEstadoCliente));
        $errors = $cliente->setTelefono($telefono) === true ? $errors : array_merge($errors, $cliente->setTelefono($telefono));
        $errors = $cliente->setDireccion($direccion) === true ? $errors : array_merge($errors, $cliente->setDireccion($direccion));

        if (!boolval($errors)) {
            if ($this->model->updateCliente($cliente)) {
                $result['status'] = 1;
                $result['message'] = 'Categoría modificada correctamente';
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

    public function changeState($data, $result)
    {
        $id= intval($data['idCliente']);
        $idEstado= intval($data['idEstado']);
        $cliente = new Cliente;

        if ($cliente->setId($id) && $cliente->clientExists('idCliente', $id)) {
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

        if ($cliente->setId($id) && $cliente->clientExists('idCliente', $id)) {
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
