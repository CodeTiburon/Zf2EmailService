<?php

namespace Zf2EmailService;

use Zend\Mvc\ModuleRouteListener;
use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
    }

    public function layoutModuleNamespace(MvcEvent $e)
    {
        $moduleNamespace = $e->getRouteMatch()->getParam('__NAMESPACE__');
        $e->getTarget()->layout()->moduleNamespace = substr(
            $moduleNamespace,
            0,
            strpos($moduleNamespace, '\\')
        ) ? : 'Zf2EmailService';
    }

    public function getConfig()
    {
        $result = array();

        $configs = glob(__DIR__ . '/config/*.config.php');

        foreach ($configs as $config) {
            if (file_exists($config)) {
                $result = array_merge($result, include_once($config));
            }
        }

        return $result;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
