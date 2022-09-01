<?php
 class errorPage extends controller{
 
 	public function __construct()
 	{
 		parent::__construct();
        auth::hangin();
 		$this->view->css = array('error/extra/css/default.css');
 		$this->view->js = array('error/extra/js/default.js');
 	}
 

 	public function index($admin = false)
 	{
 		$this->view->content = 'error/index';
 		$this->view->render('body');
 	}
 }
