<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ViewAppointmentSchedulerController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewAppointmentSchedulerList");
    }

    // add
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewAppointmentSchedulerAdd");
    }

    // update
    public function update(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewAppointmentSchedulerUpdate");
    }

    // search
    public function search(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewAppointmentSchedulerSearch");
    }
}
