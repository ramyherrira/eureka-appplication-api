<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'home', '_controller' => 'Application\\Controller\\Api\\Home\\HomeController::index'], null, ['GET' => 0], null, false, false, null]],
        '/liveness' => [[['_route' => 'liveness', '_controller' => 'Application\\Controller\\Api\\Health\\HealthController::liveness'], null, ['GET' => 0], null, false, false, null]],
        '/readiness' => [[['_route' => 'readiness', '_controller' => 'Application\\Controller\\Api\\Health\\HealthController::readiness'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
    ],
    [ // $dynamicRoutes
    ],
    null, // $checkCondition
];
