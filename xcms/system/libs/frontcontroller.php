<?php

class FrontController {
	var $controller = null;
	var $action = null;
	var $newAction = null;
	var $lang;
	
	#var $cView;

	function run() {

		$this->lang = $_SESSION['xcms']['lang'];
		if(file_exists(CONTROLLERS.DS.$this->controller.'.php')) {
			if ($this->newAction) $this->action = $this->newAction;

			require(CONTROLLERS.DS.$this->controller.'.php');
			$controllerName = ucfirst($this->controller);
			$controller = new $controllerName();		
			if($data = @call_user_func_array(array(&$controller, $this->action), array())){}
			else $data = array();
			if(isset($data)) {
				if(is_string($data)) {
					$content = $data;
				} elseif(is_array($data)) {
					#$nView = $controller->getView();
					
					$this->cView = (isset($nView)) ? SYSTEM.DS.$nView : VIEWS.DS.$this->controller.DS; 				
					$view = new Template();
                         $view->setFile($this->cView.DS.$this->lang.DS.$this->action.'.tpl.php');
					$view->setData($data);
					$content = $view->render();
				}
				$layoutFile = $controller->getLayout();
			} else {
				$content = NULL;
				$layoutFile = NULL;
			}	
			$layout = new Template();
			
			if(isset($layoutFile)) {
				$layout->setFile(LAYOUTS.DS.$controller->getLayout().'.tpl.php');
			} else {
				$layout->setFile(LAYOUTS.DS.LAYOUT.'.tpl.php');
			}
			$layout->setData(array('content' => $content));
			$result = $layout->render();
			echo $result;

			
		} else {
			echo 'Controller Not Found!';	
		}
	}
	
	function setAction($action) {
		$this->action = $action;	
	}
	
	function setController($controller) {
		$this->controller = $controller;
	}
	
}
