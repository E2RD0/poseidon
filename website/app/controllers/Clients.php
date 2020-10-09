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
        $idEstadoCliente = isset($userData['idEstadoCliente']) ? $userData['idEstadoCliente'] : 1;

        $secret="6LcGpNUZAAAAADHUhpjnvTQdfDynx0FzGLEgz1ne";
        $response=isset($userData["captcha"]) ? $userData["captcha"] : false;

        $captchaResponse = null;

        $user = new Cliente;
        $errors = [];
        $errors = $user->setNombre($nombre) === true ? $errors : array_merge($errors, $user->setNombre($nombre));
        $errors = $user->setApellido($apellido) === true ? $errors : array_merge($errors, $user->setApellido($apellido));
        $errors = $user->setEmail($email) === true ? $errors : array_merge($errors, $user->setEmail($email));
        $errors = $user->setPassword($password) === true ? $errors : array_merge($errors, $user->setPassword($password));
        $errors = $user->setIdEstado($idEstadoCliente) === true ? $errors : array_merge($errors, $user->setIdEstado($idEstadoCliente));
        //If there aren't any errors
        if (!boolval($errors)) {
            if($response !==false){
                $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
                $captcha_success=json_decode($verify);
                if ($captcha_success->success==true) {
                    $captchaResponse = true;
                }
                else {
                    $captchaResponse = false;
                }
            }
            if($captchaResponse === null || $captchaResponse === true){
                if ($this->model->registerClient($user)) {
                    $result['status'] = 1;
                    $result['message'] = 'Usuario registrado correctamente';
                } else {
                    $result['status'] = -1;
                    $result['exception'] = \Common\Database::$exception;
                }
            }
            else{
                $result['status'] = -1;
                $result['exception'] = 'Debes comprobar que no eres un robot';
            }

        } else {
            $result['exception'] = 'Error en uno de los campos';
            $result['errors'] = $errors;
        }
        return $result;
    }
    public function checkIfOnline($email)
    {
        return $this->model->checkIfOnline($email)->enlinea;
    }
    public function forceLogout($userData)
    {
        $email = $userData['email'];
        if ($this->model->setOnline($email, false)) {
            $result['status'] = 1;
            $result['message'] = 'Se ha cerrado la sesión al usuario';
        } else {
            $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
        }
        return $result;
    }

    public function clientLogin($userData, $result)
    {
        date_default_timezone_set('America/El_Salvador');
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

                $isClientSuspended = $cliente->clientIsSuspended($userHash->idcliente);

                if ($isClientSuspended) {

                    if (!(((new DateTime($isClientSuspended->fechadesbloqueo))->format('Y-m-d H:i:s')) > ((new DateTime('now'))->format('Y-m-d H:i:s')))) {

                        if (!$cliente->removeSuspension($isClientSuspended->idclientesuspendido)) {
                            $_SESSION['client_lg_att'] = 0;
                        } else {
                            $result['status'] = -1;
                            $result['exception'] =
                                \Common\Database::$exception;
                            return $result;
                        }
                    } else {
                        $result['status'] = -1;
                        $result['exception'] = 'Tu cuenta está suspendida por demasiados intentos de sesión incorrectos, inténtalo más tarde.';
                        return $result;
                    }
                }

                if (!$cliente->checkIfOnline($email)->enlinea) {

                    if ($_SESSION['client_lg_att'] <= 2) {

                        if (password_verify($password, trim($userHash->contrasena))) {

                            if ($userHash->idestadocliente != 3) {
                                if($userHash->secret2fa==null){
                                    if ($cliente->setOnline($email, true)) {

                                        $_SESSION['client_pw_exp'] = (new DateTime('now'))->format('Y-m-d') > ((new DateTime($userHash->ultimocambiocontrasena))->add(new DateInterval('P3M')))->format('Y-m-d') ? 1 : 0;
                                        $_SESSION['client_id'] = $userHash->idcliente;
                                        $_SESSION['client_name'] = $userHash->nombre;
                                        $_SESSION['client_state'] = $userHash->idestadocliente;
                                        $_SESSION['client_email'] = $email;

                                        if (isset($_SESSION['client_lg_att'])) unset($_SESSION['client_lg_att']);

                                        $result['status'] = 1;
                                        $result['message'] = 'Autenticación correcta';
                                    } else {
                                        $result['status'] = -1;
                                        $result['exception'] = 'Ocurrió un error al iniciar sesión';
                                    }
                                }
                                else{
                                    $result['status'] = 2;
                                    $result['message'] = 'Verificación en 2 pasos.';
                                }


                            } else {
                                $result['status'] = -1;
                                $result['exception'] = 'Cuenta suspendida';
                            }
                        } else {
                            $_SESSION['client_lg_att'] += 1;
                            $result['status'] = -1;
                            $result['exception'] = 'Credenciales incorrectas';
                        }
                    } else {
                        if ($cliente->restrictAccount($userHash->idcliente)) {
                            unset($_SESSION['client_lg_att']);
                            $result['status'] = -1;
                            $result['exception'] = 'Credenciales incorrectas, se ha restringido el acceso a tu cuenta por 24 horas';
                        } else {
                            $result['status'] = -1;
                            $result['exception'] =
                                \Common\Database::$exception;
                        }
                    }
                } else {
                    $result['status'] = -1;
                    $result['exception'] = 'Ya estás conectado. Cierra tu sesión para abrir una nueva';
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
        if ($this->model->setOnline($_SESSION['client_email'], false)) {
            unset($_SESSION['client_pw_exp'], $_SESSION['client_id'], $_SESSION['client_name'], $_SESSION['client_state'], $_SESSION['client_email'], $_SESSION['client_lg_att']);
            if (!isset($_SESSION['client_pw_exp'], $_SESSION['client_id'], $_SESSION['client_name'], $_SESSION['client_state'], $_SESSION['client_email'], $_SESSION['client_lg_att'])) {
                $result['status'] = 9;
                $result['message'] = 'Se ha cerrado la sesión';
            } else {
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
            }
        } else {
            $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
        }
        return $result;
    }

    public function getClientInfo($id, $result)
    {
        if ($result['dataset'] = $this->model->getClient($id)) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'Hubo un error al cargar los datos';
        }
        return $result;
    }
    public function twoFactorAuth($data, $result, $isLogin=true)
    {
        $code = $data['code'];
        if($isLogin){
            $secret = '';
        }
        else{
            $secret = $data['secret'];
        }
        $tfa = new \RobThree\Auth\TwoFactorAuth('Poseidon');

        if($tfa->verifyCode($secret, $code) === true){
            $result['status'] = 1;
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'El código de autenticación es incorrecto';
        }
        return $result;
    }

    public function twoFactorAuthLogin($data, $result)
    {
        $code = $data['code'];
        $email = $data['email'];
        $userHash = $this->model->checkPassword($email);
        $secret = $userHash->secret2fa;

        $tfa = new \RobThree\Auth\TwoFactorAuth('Poseidon');

        if($tfa->verifyCode($secret, $code) === true){
            if ($this->model->setOnline($email, true)) {

                $_SESSION['client_pw_exp'] = (new DateTime('now'))->format('Y-m-d') > ((new DateTime($userHash->ultimocambiocontrasena))->add(new DateInterval('P3M')))->format('Y-m-d') ? 1 : 0;
                $_SESSION['client_id'] = $userHash->idcliente;
                $_SESSION['client_name'] = $userHash->nombre;
                $_SESSION['client_state'] = $userHash->idestadocliente;
                $_SESSION['client_email'] = $email;

                if (isset($_SESSION['client_lg_att'])) unset($_SESSION['client_lg_att']);

                $result['status'] = 1;
                $result['message'] = 'Autenticación correcta';
            } else {
                $result['status'] = -1;
                $result['exception'] = 'Ocurrió un error al iniciar sesión';
            }
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'El código de autenticación es incorrecto';
        }
        return $result;
    }

    public function save2fa($secret, $id, $result)
    {

        if($this->model->save2fa($secret, $id)){
            $result['status'] = 1;
        }
        else{
            $result['status'] = 0;
            $result['exception'] = 'Error al activar la verificación en 2 pasos.';
        }
        return $result;
    }

    public function update($data, $result)
    {
        $data = \Helpers\Validation::trimForm($data);
        $idCliente = isset($data['id']) ? $data['id'] : $_SESSION['client_id'];
        $idEstadoCliente = isset($data['idEstadoCliente']) ? $data['idEstadoCliente'] : $_SESSION['client_state'];

        $clienteInfo = $this->model->getClient($idCliente);

        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'];
        $telefono = $data['telefono'];
        $direccion = $data['direccion'];

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
        $id = intval($data['idCliente']);
        $idEstado = intval($data['idEstado']);
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
        $idOrden = intval($data['idorden']);
        //Se mandan a llamar dos archivos, factura.jrxml y factura.jasper (que será generado más adelante)
        $jrxml = __DIR__ . '/../reports/factura.jrxml';
        $input = __DIR__ . '/../reports/factura.jasper';
        $output = __DIR__ . '/../../public/reports';
        //Le mandamos la configuración de jasper, así como los parámetros.
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => [
                'id' => $idOrden
            ],
            'db_connection' => [
                'driver' => 'postgres',
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'host' => DB_HOST,
                'database' => DB_NAME,
                'port' => DB_PORT
            ]
        ];
        //Inicializamos un objeto PHPJasper
        $jasper = new \PHPJasper\PHPJasper;
        //Compilamos y creamos el archivo factura.jasper, a partir de factura.jrxml
        $jasper->compile($jrxml)->execute();
        //Procesamos la compilación, y le aplicamos la configuración. Así como le asignamos donde saldrá.
        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
        //Si el archivo se creó, entonces el reporte fue exitóso.
        if (file_exists(__DIR__ . '/../../public/reports/factura.pdf')) {
            $result['status'] = 1;
            $result['message'] = 'El pdf se ha generado correctamente';
        } else {
            $result['exception'] = 'No se pudo generar el reporte';
        }
        return $result;
    }

    public function reporteNuevosClientes($data, $result)
    {
        $jrxml = __DIR__ . '/../reports/clientes.jrxml';
        $input = __DIR__ . '/../reports/clientes.jasper';
        $output = __DIR__ . '/../../public/reports';
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => [
                'email' => $_SESSION['user_email']
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

        $jasper->compile($jrxml)->execute();

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        if (file_exists(__DIR__ . '/../../public/reports/clientes.pdf')) {
            $result['status'] = 1;
            $result['message'] = 'El pdf se ha generado correctamente';
        } else {
            $result['exception'] = 'No se pudo generar el reporte';
        }
        return $result;
    }

    public function reporteOrdenes($data, $result)
    {
        $idCliente = intval($data['idcliente']);
        $jrxml = __DIR__ . '/../reports/ordenescliente.jrxml';
        $input = __DIR__ . '/../reports/ordenescliente.jasper';
        $output = __DIR__ . '/../../public/reports';
        $options = [
            'format' => ['pdf'],
            'locale' => 'es',
            'params' => [
                'email' => $_SESSION['user_email'],
                'id'    => $idCliente
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

        $jasper->compile($jrxml)->execute();

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        if (file_exists(__DIR__ . '/../../public/reports/ordenescliente.pdf')) {
            $result['status'] = 1;
            $result['message'] = 'El pdf se ha generado correctamente';
        } else {
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
