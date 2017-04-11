<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 09:14
 */
global $config;
require_once("application/config/config.php");
require_once("core/loader/SplClassLoader.php");
$autoload = new SplClassLoader();
$autoload->register();
new core\model\Model();
new core\controller\Controller();
require_once("core/config/routes.php");