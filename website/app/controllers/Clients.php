<?php
class Clients extends \Common\Controller
{
    public function __construct()
    {
        $this->model = $this->loadModel('Cliente');
        $this->modelOrden = $this->loadModel('Orden');
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
    public function clientsLastSevenChart($result)
    {
        if ($result['dataset'] = $this->model->clientsLastSevenChart()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function clientOrdersChart($result)
    {
        if ($result['dataset'] = $this->model->clientOrdersChart()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay productos registrados';
        }
        return $result;
    }
    public function clientRegister($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $nombre = $userData['nombre'];
        $apellido = $userData['apellido'];
        $email = $userData['email'];
        $password = $userData['password'];
        $idEstadoCliente = isset($userData['idEstadoCliente']) ? $userData['idEstadoCliente']: 1 ;

        $user = new Cliente;
        $errors = [];
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        $errors = $user->setPassword($password) === true ? $errors : array_merge($errors, $user->setPassword($password));
        $errors = $user->setIdEstado($idEstadoCliente) === true ? $errors : array_merge($errors, $user->setIdEstado($idEstadoCliente));
        //If there aren't any errors
        if (!boolval($errors)) {
            if ($this->model->registerClient($user)) {
                $result['status'] = 1;
                $result['message'] = 'Usuario registrado correctamente';
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

    public function clientLogin($userData, $result)
    {
        $userData = \Helpers\Validation::trimForm($userData);
        $email = $userData['email'];
        $password = $userData['password'];

        $cliente = new Cliente;
        $errors = [];
        $errors = $cliente->setEmail($email, true) === true ? $errors : array_merge($errors, $cliente->setEmail($email, true));
        $errors = $cliente->setPassword($password, false) === true ? $errors : array_merge($errors, $cliente->setPassword($password, false));
        //If there aren't any errors
        if (!boolval($errors)) {
            $userHash = $cliente->checkPassword($email);
            if ($userHash) {
                if (password_verify($password, trim($userHash->contrasena))) {
                    if($userHash->idestadocliente != 3){
                        $_SESSION['client_id'] = $userHash->idcliente;
                        $_SESSION['client_name'] = $userHash->nombre;
                        $_SESSION['client_state'] = $userHash->idestadocliente;
                        $_SESSION['client_email'] = $email;
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                    }
                    else {
                        $result['status'] = -1;
                        $result['exception'] = 'Cuenta suspendida';
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = 'Credenciales incorrectas';
                }
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Credenciales incorrectas';
            }
        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }

    public function clientLogout($result)
    {
        if (session_destroy()) {
            $result['status'] = 1;
            $result['message'] = 'Se ha cerrado la sesión';
        } else {
            $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
        }
        return $result;
    }

    public function getClientInfo($id, $result)
    {
        if ($result['dataset'] = $this->model-> getClient($id)) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos';
        }
        return $result;
    }

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $idCliente = isset($data['id']) ? $data['id']: $_SESSION['client_id'] ;
        $idEstadoCliente = isset($data['idEstadoCliente']) ? $data['idEstadoCliente'] : $_SESSION['client_state'];

        $clienteInfo= $this->model->getClient($idCliente);

        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'] ;
        $telefono = $data['telefono'] ;
        $direccion = $data['direccion'] ;

        $currentPassword = isset($data['password']) ? $data['password'] : '';
        $newPassword = "";
        $newPasswordR = "";
        if (isset($data['newPassword']) && isset($data['newPasswordR'])) {
            $newPassword = $data['newPassword'];
            $newPasswordR = $data['newPasswordR'];
        }

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

        if ($currentPassword || $newPassword || $newPasswordR) {
            if (password_verify($currentPassword, trim($clienteInfo->contrasena))) {
                $errors = $cliente->setPassword($newPassword, true, 'Nueva Contraseña') === true ? $errors : array_merge($errors, $cliente->setPassword($newPassword, true, 'Nueva Contraseña'));
                if ($newPasswordR) {
                    if ($newPassword != $newPasswordR) {
                        $errors['NewPasswordR'] = ['Las contraseñas no coinciden'];
                    }
                } else {
                    $errors['NewPasswordR'] = ['Este campo es obligatorio'];
                }
            } else {
                $errors['Contraseña'] = ['Contraseña incorrecta.'];
                $errors = $cliente->setPassword($currentPassword, false) === true ? $errors : array_merge($errors, $cliente->setPassword($currentPassword, false));
            }
        }

        if (!boolval($errors)) {
            if ($this->model->updateCliente($cliente)) {
                $result['status'] = 1;
                $result['message'] = 'Cliente actualizado correctamente';
                if (!isset($data['id'])) {
                    $_SESSION['client_id'] = $cliente->getId();
                    $_SESSION['client_name'] = $cliente->getNombre();
                    $_SESSION['client_state'] = $cliente->getIdEstado();
                    $_SESSION['client_email'] = $cliente->getEmail();
                }
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

    public function factura($data, $result)
    {
        $idOrden= intval($data['idorden']);
        $input = __DIR__ . '/../reports/productoscategoria.jasper';
        $output = __DIR__ .'/../../public/reports';
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => [
                'email' => 'prueba'
            ],
            'db_connection' => [
                'driver' => 'postgres', //mysql, ....
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'host' => DB_HOST,
                'database' => DB_NAME,
                'port' => DB_PORT
            ]
        ];

        $jasper = new \PHPJasper\PHPJasper;

        $jasper->process(
        $input,
        $output,
        $options
        )->execute();

        if(file_exists(__DIR__ .'/../../public/reports/productoscategoria.pdf')){
            $result['status'] = 1;
            $result['message'] = 'El pdf se ha generado correctamente';
        }
        else {
            $result['exception'] = 'No se pudo generar el reporte';
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

    public function getOrders($data, $result)
    {
        $cliente = new Cliente;
        $orden = new Orden;

        if ($cliente->setId($data) && $cliente->clientExists('idCliente', $data)) {
            if ($result['dataset'] = $orden->getOrdersByClient($data)) {
                $result['status'] = 1;
                $result['message'] = 'Ordenes cargadas correctamente';
            } else {
                $result['exception'] = \Common\Database::$exception;
            }
        } else {
            $result['exception'] = 'No existe el cliente';
        }
        return $result;
    }

}
