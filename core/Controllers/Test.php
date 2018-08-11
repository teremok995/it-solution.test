<?php

namespace ShortLink\Controllers;

use ShortLink\Controller as Controller;

class Test extends Controller {
	
    public function run() {
        //Здесь творились всякие непотребства 
        	
		return $this->template('test', array(
			'pagetitle' => 'Генератор сокращенных ссылок ShortLink',
			'longtitle' => 'Генератор сокрощенных ссылок <br> ShortLink <br> спецаиально для it-solution.ru',
			'content' => 'Данный проект выполнен программистом teremok995 <br> mail: teremok995@mail.ru'
		), $this);
	
	}
    
    public function initialize(array $params = array()) {
		if (!empty($params)) {
		}
		return true;
	}
}