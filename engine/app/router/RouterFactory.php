<?php

namespace App;

use Nette,
    Nette\Application\Routers\Route,
    Nette\Application\Routers\RouteList;

class RouterFactory
{
    use Nette\StaticClass;

    /**
     * @return \Nette\Application\IRouter
     */
    public static function createRouter()
    {
        $router = new RouteList();
        $router[] = new Route('<presenter>/<action>', [
            'module' => 'Frontend',
            'presenter' => 'Default',
            'action' => 'default',
        ]);
        return $router;
    }
}
