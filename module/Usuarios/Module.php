<?php

namespace Usuarios;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Usuarios\Model\UsuarioTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new Model\UsuarioTable($dbAdapter);
                    return $table;
                },
              'Usuarios\Model\RolUsuarioTable' => function($sm) {
                  $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                  $table = new Model\RolUsuarioTable($dbAdapter);
                  return $table;
              },
            ),
        );
    }

}
