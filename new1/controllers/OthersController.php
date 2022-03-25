<?php

namespace PHPMaker2021\project3;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class others controller
 */
class OthersController extends ControllerBase
{
    // error
    public function error(Request $request, Response $response, array $args): Response
    {
        global $Error;
        $Error = $this->container->get("flash")->getFirstMessage("error");
        return $this->runPage($request, $response, $args, "Error");
    }

    // Index
    public function index(Request $request, Response $response, array $args): Response
    {
        return $response->withHeader("Location", "AppointmentBlockSlotList")->withStatus(302);
    }
}
