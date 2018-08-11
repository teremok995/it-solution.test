<?php

namespace ShortLink;

use \Exception as Exception;

class Controller {
	public $core;
    public $isAjax = false;

	function __construct(Core $core) {
		$this->core = $core;
	}
    
    public function initialize(array $params = array()) {

		return true;
	}
    
	public function run() {
	}
    
    public function template($tpl, array $data = array(), $controller = null) {
		$output = '';
		if (!preg_match('#\.tpl$#', $tpl)) {
			$tpl .= '.tpl';
		}
		if ($fenom = $this->core->getFenom()) {
			try {
				$data['_core'] = $this->core;
				$data['_controller'] = !empty($controller) && $controller instanceof Controller
					? $controller
					: $this;
				$output = $fenom->fetch($tpl, $data);
			}
			catch (Exception $e) {
				$this->core->log($e->getMessage());
			}
		}
		return $output;
	}
    
}