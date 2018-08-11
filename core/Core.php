<?php

namespace ShortLink;

use \Fenom as Fenom;
use \Exception as Exception;
use \xPDO\xPDO as xPDO;

class Core {
	public $fenom;
	public $xpdo;
    public $ini_data = array();
    public $linkworker;

	function __construct($config = 'config') {
        
		if (is_string($config)) {
			$config = dirname(__FILE__) . "/Config/{$config}.inc.php";
			if (file_exists($config)) {
				require $config;
                try {
					$this->xpdo = new xPDO($database_dsn, $database_user, $database_password, $database_options);
					$this->xpdo->setPackage('Model', PROJECT_CORE_PATH);
					$this->xpdo->startTime = microtime(true);
				}
				catch (Exception $e) {
					exit($e->getMessage());
				}
			}
			else {
				exit('Не могу загрузить файл конфигурации');
			}
		}
		else {
			exit('Неправильное имя файла конфигурации');
		}
        
        $results = $this->xpdo->query("SELECT id FROM ex_shortlink");
        if(!$results){
            $manager = $this->xpdo->getManager();
            $manager->createObjectContainer('ShortLink\Model\ShortLinkDB');            
        }
         

	}

	public function handleRequest($uri, $link) {
        $linkworker = new LinkWorker($this);
        $request = explode('/', $uri);
        $ini_data = $request;
        if(!empty($link)) {
            $link_ = $linkworker->generateRun($link);
            $ini_data = array_merge($ini_data,$link_);
        }
        
        if(empty($uri))
        {
            $controller = new Controllers\Home($this);
           
        }
        else 
        {    
            $className = '\ShortLink\Controllers\\' . ucfirst(array_shift($request));

            if (!class_exists($className)) {
                $controller = new Controllers\Redirect($this);
            }
            else {
                $controller = new $className($this);
            }
        
        }

        $controller->isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
        
		$initialize = $controller->initialize($ini_data);
		
        if ($initialize === true) {
			$response = $controller->run();
		}
		elseif (is_string($initialize)) {
			$response = $initialize;
		}
		else {
			$response = 'Возникла неведомая ошибка при загрузке страницы';
		}

		echo $response;
	}

	public function getFenom() {
		if (!$this->fenom) {
			try {
				if (!file_exists(PROJECT_CACHE_PATH)) {
					mkdir(PROJECT_CACHE_PATH);
				}
				$this->fenom = Fenom::factory(PROJECT_TEMPLATES_PATH, PROJECT_CACHE_PATH, PROJECT_FENOM_OPTIONS);
			}
			catch (Exception $e) {
				exit($e->getMessage());
				return false;
			}
		}
		return $this->fenom;
	}
    
    public function ajaxResponse($success = true, $message = '', array $data = array()) {
		$response = array(
			'success' => $success,
			'message' => $message,
			'data' => $data,
		);
		exit(json_encode($response));
	}

	public function clearCache() {
		$this->rmDir($this->config['cachePath']);
		mkdir($this->config['cachePath']);
	}

	public function rmDir($dir) {
		$dir = rtrim($dir, '/');
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != '.' && $object != '..') {
					if (is_dir($dir . '/' . $object)) {
						$this->rmDir($dir . '/' . $object);
					}
					else {
						unlink($dir . '/' . $object);
					}
				}
			}
			rmdir($dir);
		}
	}
    
}
