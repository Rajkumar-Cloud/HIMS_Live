<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AppointmentSchedulerController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerList");
    }

    // add
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerAdd");
    }

    // view
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerView");
    }

    // edit
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerEdit");
    }

    // delete
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerDelete");
    }

    // preview
    public function preview(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "AppointmentSchedulerPreview", false);
    }
}
