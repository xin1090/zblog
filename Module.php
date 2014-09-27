<?php
namespace Blog;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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
    // 数据库操作配置
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Blog\Model\TestTable' =>  function($sm) {
                    $tableGateway = $sm->get('TestTableGateway');
                    $table = new TestTable($tableGateway);
                    return $table;
                },
                'TestTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Test());
                    return new TableGateway('test', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    // 控制器自动加载配置
    public function getControllerConfig()
    {
        return array(
             'abstract_factories'=>array('Blog\Services\CommonControlAppAbstractFactory'),
        );
    }

}
