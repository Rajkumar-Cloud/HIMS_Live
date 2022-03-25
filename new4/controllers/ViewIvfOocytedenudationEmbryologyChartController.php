<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ViewIvfOocytedenudationEmbryologyChartController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartList");
    }

    // add
    public function add(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartAdd");
    }

    // view
    public function view(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartView");
    }

    // edit
    public function edit(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartEdit");
    }

    // update
    public function update(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartUpdate");
    }

    // delete
    public function delete(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewIvfOocytedenudationEmbryologyChartDelete");
    }
}
