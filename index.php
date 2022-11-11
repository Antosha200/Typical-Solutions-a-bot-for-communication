<?php
/**
 * @author Anton Naumov
 */

echo 'index<br>';
require_once "vendor/autoload.php";
FrontController::getInstance()->makeRoute();