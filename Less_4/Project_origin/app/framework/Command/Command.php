<?php
declare(strict_types = 1);

namespace Framework\Command;

use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

class Command implements CommandInterface
{
    /**
     * @inheritdoc
     */

    public function execute(array $params): array
    {
        $matcher = new UrlMatcher($params['routeCollection'], new RequestContext());
        $matcher->getContext()->fromRequest($params['request']);

        try {
            $params['request']->attributes->add($matcher->match($params['request']->getPathInfo()));
            $params['request']->setSession(new Session());

            $controller = (new ControllerResolver())->getController($params['request']);
            $arguments = (new ArgumentResolver())->getArguments($params['request'], $controller);

            $params['response'] = call_user_func_array($controller, $arguments);

        } catch (ResourceNotFoundException $e) {
            $params['response'] = new Response('Page not found. 404', Response::HTTP_NOT_FOUND);
        } catch (\Throwable $e) {
            $params['response'] = new Response('Server error occurred. 500', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $params;
    }
}