<?php

class controller {

	function __construct() {
		//echo 'Main controller<br />';
		$this->view = new view();
	}

	public function loadModel($name, $modelPath) {

		$path = $modelPath.$name.'_model.php';

		if (file_exists($path)) {
			require $modelPath.$name.'_model.php';

      $modelName = $name . '_model';
		  $this->model = new $modelName();
		}
	}

  public function defaultModel($modelPath) {

		$path = $modelPath.'index_model.php';

		if (file_exists($path)) {
			require $modelPath.'index_model.php';

      $modelName = 'index_model';
		  $this->model = new $modelName();
		}
	}

    public function generalModel($modelPath)
  {
    $path = $modelPath.'general_model.php';

    if(file_exists($path)) {
      require $modelPath.'general_model.php';

      $modelName = 'general_model';
      $this->model = new $modelName();
    }

  }

    public function set($name, $value)
    {
        $this->view->set($name, $value);
    }

}