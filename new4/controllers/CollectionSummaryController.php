<?php

namespace PHPMaker2021\HIMS;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * CollectionSummary controller
 */
class CollectionSummaryController extends ControllerBase
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "CollectionSummary");
    }
}
