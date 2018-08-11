<?php

namespace ShortLink;

use \Exception as Exception;

abstract class LinkGenerator {    
    abstract public function generateLink($link);
}