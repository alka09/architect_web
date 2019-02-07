<?php

declare(strict_types = 1);

namespace Framework\Command;

class Route implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function execute(array $params): array
    {
        $params['routeCollection'] = require $params['dir'] . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $params['containerBuilder']->set('route_collection', $params['routeCollection']);

        return $params;
    }
}