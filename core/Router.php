<?php

namespace Core;

class Router
{

    private array $routes;
    public function post(string $url, array $action)
    {
        $http_method = 'POST';
        $this->add(compact('url', 'action', 'http_method'));
    }

    public function get(string $url, array $action)
    {
        $http_method = 'GET';
        $this->add(compact('url', 'action', 'http_method'));
    }

    public function add(array $route_info)
    {
        $this->routes[] = $route_info;
    }

    public function routeToController(string $path, string $http_method)
    {
        $route = array_values(array_filter(
            $this->routes,
            fn ($v, $k)
                => $path === $v['url'] && $http_method === $v['http_method']
            ,
            ARRAY_FILTER_USE_BOTH
        ));
        if (empty($route)) {
            Response::abort();
        }
        $route = $route[0];
        $controller = new $route['action'][0]();
        $controller->{$route['action'][1]}();
    }
}