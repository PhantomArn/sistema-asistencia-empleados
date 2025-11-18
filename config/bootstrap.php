<?php
define('ROOT_PATH', dirname(__DIR__));

// CARGAR .env (DESPUÉS DE COMPOSER)
require_once ROOT_PATH . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();