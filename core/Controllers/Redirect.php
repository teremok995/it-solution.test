<?php

namespace ShortLink\Controllers;

use ShortLink\Controller as Controller;
use ShortLink\LinkWorker as LinkWorker;
class Redirect extends Controller {
	
    public function run() {
		
	}
    
    public function initialize(array $params = array()) {
		if (!empty($params)) {
            
            $linkworker = new LinkWorker($this->core);
            if($link = $linkworker->getLink($params[0])){
                header("Location:{$link}");
                exit;
            }
            else{
                header("Location: /Error404");
                exit;
            }
		}
		return true;
	}
}