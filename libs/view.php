<?php

class view {

	function __construct() {
		//echo 'this is the view';
	}

	public function render($name, $noInclude = false)
	{
			require 'views/' . $name . '.php';
	}
  public function set($name, $value)
  {
    $this->vars[$name]=$value;
  }

}