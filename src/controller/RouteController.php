<?php
namespace controller;

use util\common\Message;

class RouteController
{

    protected static $routeMapping;

    protected $actionName;

    protected $actionClassName;

    public function __construct()
    {
        self::$routeMapping = $_SESSION['ROUTE_MAPPING'];
    }

    private static function findController(string $param): array
    {
        $paths = $param === '' ? [] : explode('/', $param);
        $mapping = self::$routeMapping;
        $route = NULL;

        if (count($paths) === 0) {
            $route = $mapping['_default'];
        }

        foreach ($paths as $index => $path) {
            $default = $mapping['_default'];
            if ($path === '') {
                $route = $default;
                break;
            }

            if (isset($mapping[$path])) {
                $mapping = $mapping[$path];
                if (is_string($mapping)) {
                    $route = $mapping;
                }
                else {
                    if ($index === count($paths) - 1) {
                        $route = $mapping['_default'];
                    }
                    continue;
                }
            }
            else {
                break;
            }
        }

        $actionMapping = array();
        if (isset($route)) {
            $action = explode(":", $route);
            $actionMapping['controller'] = $action[0];
            $actionMapping['action'] = $action[1];
            $actionMapping['args'] = [];
        }
        else {
            $actionMapping['controller'] = 'controller\ErrorController';
            $actionMapping['action'] = 'controll';
            $actionMapping['args'] = [
                Message::INVALID_URL
            ];
        }

        return $actionMapping;
    }

    private static function newController(string $controllerName, array $args): ControllerBase
    {
        if (class_exists($controllerName)) {
            $refrect = new \ReflectionClass($controllerName);
            return $refrect->newInstanceArgs($args);
        }
        else {
            $refrect = new \ReflectionClass('controller\ErrorController');
            return $refrect->newInstanceArgs([Message::INTERNAL_ERROR]);
        }
    }

    public function controll()
    {
        $param = $_GET['action'] ?? '';
        $actionMapping = self::findController($param);
        $controllerName = $actionMapping['controller'];
        $action = $actionMapping['action'];
        $args = $actionMapping['args'];
        $controller = self::newController($controllerName, $args);
        $controller->$action();
    }
}