<?php

class Controller {
	
	var $layout = Null;
	var $nView = Null;
	
	function setLayout($layout) {
		$this->layout = $layout;
	}

	function getLayout() {
		return($this->layout);
	}

	function setView($layout) {
		echo $this->nView = $layout;
	}

	function getView() {
		return($this->nView);
	}
	
	function redirect($location, $code = 301) {
		header('Location: '.$location, $code);
		die();
	}

}
