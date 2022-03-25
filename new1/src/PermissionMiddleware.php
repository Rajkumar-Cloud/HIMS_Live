<?php

namespace PHPMaker2021\project3;

use Slim\Routing\RouteContext;
use Slim\Exception\HttpBadRequestException;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Nyholm\Psr7\Factory\Psr17Factory;

/**
 * Permission middleware
 */
class PermissionMiddleware
{
    // Invoke
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        global $Language, $UserProfile, $Security, $ResponseFactory;

        // Non-API call
        $GLOBALS["IsApi"] = false;

        // Set up request
        $GLOBALS["Request"] = $request;
        $response = $ResponseFactory->createResponse();
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
        $basePath = $routeContext->getBasePath();
        $routeParser = $routeContext->getRouteParser();
        $pageAction = $route->getName();
        $ar = explode("-", $pageAction);
        $currentPageName = @$ar[0]; // Get current page name
        $GLOBALS["RouteValues"] = [$currentPageName];
        if (count($ar) > 2) {
            list(, $table, $pageAction) = $ar;
        }

        // Set up Page ID
        if (!defined(PROJECT_NAMESPACE . "PAGE_ID")) {
            define(PROJECT_NAMESPACE . "PAGE_ID", $pageAction);
        }

        // Set up language
        $Language = Container("language");

        // Load Security
        $UserProfile = Container("profile");
        $Security = Container("security");

        // Validate CSRF
        if (Config("CHECK_TOKEN") && IsPost() && !ValidateCsrf()) {
            throw new HttpBadRequestException($request, $Language->phrase("InvalidPostRequest"));
        }

        // Handle request
        return $handler->handle($request);
    }
}
