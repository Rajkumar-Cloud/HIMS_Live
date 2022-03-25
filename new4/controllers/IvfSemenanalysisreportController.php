<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class IvfSemenanalysisreportController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportList");
    }

    // add
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportAdd");
    }

    // view
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportView");
    }

    // edit
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportEdit");
    }

    // delete
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportDelete");
    }

    // preview
    public function preview(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "IvfSemenanalysisreportPreview", false);
    }
}
