<?php
namespace Common;

class Core
{
    /*Map url /controller/method/parameter and set default values*/
    protected $currentController = 'Root';
    protected $currentMethod = "index" ;
    protected $parameters = [];

    public function __construct(){
        $url = $this -> getUrl();

        //verify if a file for the controller exists
        $urlController = ucwords($url[0]);
        if (file_exists(__DIR__ . '/../../routes/' . $urlController . '.php')) {
            $this->currentController= ucwords($urlController);
        }
        elseif (strtolower($urlController) != 'index.php') {
            self::http404();
        }
        unset($url[0]);
        require_once __DIR__ . '/../../routes/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        //verify if method exists
        if (isset($url[1])) {
            $urlMethod = $url[1];
            if (method_exists($this->currentController, $urlMethod)) {
                $this->currentMethod = $urlMethod;
                unset($url[1]);
            }
            else{
                self::http404();
            }
        }

        //Get the parameters
        $this->parameters = $url ? array_values($url) : [];

        //call method with the array of parameters
        //check if method can be invoked
         if(is_callable([$this->currentController, $this->currentMethod])){
             //check if # of parameters provided is equal to the # of parameters required
             if (count($this->parameters) == (new \ReflectionMethod($this->currentController, $this->currentMethod)) -> getNumberOfParameters()){
                 try {
                     $methodReturn = call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
                 } catch (\Throwable $e) {
                     //echo $e->getMessage();
                     self::http404();
                 }
             }
             else{
                 self::http404();
             }
         }
         else{
             self::http404();
         }
    }

    public function getUrl(){
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], ' /');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public static function http404(){
        http_response_code(404);
        echo "404 no encontrado";
        die();
    }
}
