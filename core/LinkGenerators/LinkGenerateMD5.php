<?php
namespace ShortLink\LinkGenerators;

use ShortLink\LinkGenerator as LinkGenerator;

class LinkGenerateMD5 extends LinkGenerator  {
    
    public function generateLink($link){
        return md5($link);
    }
    
}