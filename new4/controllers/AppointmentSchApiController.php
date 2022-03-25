<?php

namespace PHPMaker2021\HIMS;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * appointment_sch_api controller
 */
class AppointmentSchApiController extends ControllerBase
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchApi");
    }
}
