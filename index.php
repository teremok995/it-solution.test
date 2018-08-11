<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR. 'autoload.php';

$req = !empty($_REQUEST['q'])
	? trim($_REQUEST['q'])
	: '';

$req_link = !empty($_POST['link_to'])
	? trim($_POST['link_to'])
	: '';

$Core = new \ShortLink\Core();

if (!defined('PROJECT_API_MODE') || !PROJECT_API_MODE) {
	$Core->handleRequest($req, $req_link);
}

?>

