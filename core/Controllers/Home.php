<?php

namespace ShortLink\Controllers;

use ShortLink\Controller as Controller;

if (!class_exists('Controller')) {
	require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'Controller.php';
}
class Home extends Controller {
    protected $sub_info = array( 'md5link' => null, 'randlink' => null);
	public function initialize(array $params = array()) {        
        if (array_key_exists('randlink', $params) && array_key_exists('md5link', $params)) {
            $this->sub_info['randlink'] = $params['randlink'];
            $this->sub_info['md5link'] = $params['md5link'];
        }
        
		return true;
	}

	public function run() {
        if($this->isAjax) {
            $this->core->ajaxResponse(true, '', array(
                'md5link' => $this->sub_info['md5link'],
                'randlink' => $this->sub_info['randlink'],
			));
        }
        else {
                return $this->template('home', array(
                    'pagetitle' => 'Генератор сокращенных ссылок ShortLink',
                    'longtitle' => 'Генератор сокрощенных ссылок <br> ShortLink <br> спецаиально для it-solution.ru',
                    'content' => 'Данный проект выполнен программистом teremok995 <br> mail: teremok995@mail.ru',
                    'randlink' => $this->sub_info['randlink'],
                    'md5link' => $this->sub_info['md5link']
                ), $this);
            }
	}
	
}