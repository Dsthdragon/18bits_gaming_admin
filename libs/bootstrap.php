<?php

class bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'errorPage.php';
    private $_defaultFile = 'index.php';
    private $_defaultModelFile = 'index_model.php';
    private $_generalModelFile = 'general_model.php';


    public function init()
    {

        $this->_getUrl();


        $this->_loadDefaultController();
        $this->_callControllerMethod();
    }

    public function setControllerPath($path)
    {
        $this->_controllerPath = trim($path, '/').'/';
    }


    public function setModelPath($path)
    {
        $this->_modelPath = trim($path, '/').'/';
    }

    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }


    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }


    public function setDefaultModelFile($path)
    {
        $this->_defaultModelFile = trim($path, '/');
    }

    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    private function _loadDefaultController()
    {
        require $this->_controllerPath.$this->_defaultFile;
        $this->_controller = new index();
        $this->_controller->generalModel($this->_modelPath);
        $this->_controller->defaultModel($this->_modelPath);
    }

    private function _loadExistingController()
    {
        $file = $this->_controllerPath. $this->_url[0] . '.php';

        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->generalModel($this->_modelPath);
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {
            $this->_error();
            return false;
        }

    }

    private function _callControllerMethod()
    {

        $length = count($this->_url);


        if($length > 0)
        {
            if (!method_exists($this->_controller, $this->_url[0]) && $this->_url[0] != "")
            {
                $this->_error();
            }
        }
        if( $this->_url[0] != ""){
            switch ($length)
            {
                case 5:
                $this->_controller->{$this->_url[0]}($this->_url[1], $this->_url[2], $this->_url[3], $this->_url[4]);
                break;

                case 4:
                $this->_controller->{$this->_url[0]}($this->_url[1], $this->_url[2], $this->_url[3]);
                break;

                case 3:
                $this->_controller->{$this->_url[0]}($this->_url[1], $this->_url[2]);
                break;

                case 2:
                $this->_controller->{$this->_url[0]}($this->_url[1]);
                break;

                case 1:
                $this->_controller->{$this->_url[0]}();
                break;

                default:
                $this->_controller->index();
                break;
            }
        } else {
            $this->_controller->index();
        }
    }
    private function _error() {
        require $this->_controllerPath.$this->_errorFile;
        $this->_controller = new errorPage();
        $this->_controller->index();
        exit;
    }

}
