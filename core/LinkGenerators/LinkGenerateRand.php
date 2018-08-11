<?php
namespace ShortLink\LinkGenerators;

use ShortLink\LinkGenerator as LinkGenerator;

class LinkGenerateRand extends LinkGenerator  {
    
    protected $rand_simbol = "1234567890QqWwEeRrTtYyUuIiOoPpAaSsDdFfGgHhJjKkLlZzXxCcVvBbNnMm";
    
    public function generateLink($link){
        return substr(str_shuffle($this->rand_simbol), 0, 5);
    }
    
}