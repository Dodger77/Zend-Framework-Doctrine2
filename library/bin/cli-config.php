<?php

require_once 'Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Application\Models', dirname(dirname(dirname(__FILE__))));
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Application\Models\Proxies', dirname(dirname(dirname(__FILE__))));
$classLoader->register();

$config = new \Doctrine\ORM\Configuration();
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$driverImpl = $config -> newDefaultAnnotationDriver(dirname(dirname(dirname(__FILE__))) . '/application/models');
$config->setMetadataDriverImpl($driverImpl);
$config->setProxyDir(dirname(dirname(dirname(__FILE__))) . '/application/models/proxies');
$config->setProxyNamespace('Application\Models\Proxies');

$connectionOptions = array(
    'driver' => 'pdo_sqlite',
    'path' => dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, array('data', 'db', 'database-dev.db'))
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));