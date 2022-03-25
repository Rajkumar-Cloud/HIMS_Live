<?php

namespace PHPMaker2021\HIMS;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ViewDashboardServiceDetailsController extends ControllerBase
{
    // list
    public function list(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewDashboardServiceDetailsList");
    }

    // search
    public function search(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewDashboardServiceDetailsSearch");
    }

    // preview
    public function preview(Request $request, Response $response, array $args): Response
    {
        return $this->runPage($request, $response, $args, "ViewDashboardServiceDetailsPreview", false);
    }
}
