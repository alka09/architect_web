<?php

declare(strict_types = 1);

use Framework\Registry;
use framework\Command\CommandInterface;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

use Framework\Command\RegisterConfigs;
use Framework\Command\Route;
use Framework\Command\Command;


class Kernel
{
    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    /**
     * @param array
     */

    public final function __construct(ContainerBuilder $containerBuilder)
    {
        $this->params = [
            'dir' => __DIR__,
            'containerBuilder' => $containerBuilder,
        ];
    }

    /**
     * @param Request $request
     * @return Response
     */
    public final function handle(Request $request): Response
    {
        $this->params['request'] = $request;

        $this->params = (new RegisterConfigs()) -> execute($this->params);
        $this->params = (new Route())->execute($this->params);
        $this->params = (new Command())->execute($this->params);

        return $this->params['response'];
    }
}
