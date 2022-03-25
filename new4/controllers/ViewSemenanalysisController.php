<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ViewSemenanalysisController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisList");
    }

    // add
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisAdd");
    }

    // view
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisView");
    }

    // edit
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisEdit");
    }

    // delete
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisDelete");
    }

    // search
    public function search(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewSemenanalysisSearch");
    }
}
