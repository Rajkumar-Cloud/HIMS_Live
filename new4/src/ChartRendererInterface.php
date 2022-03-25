<?php

namespace PHPMaker2021\HIMS;

/**
 * Chart renderer interface
 */
interface ChartRendererInterface
{

    public function getContainer($width, $height);

    public function getScript($width, $height);
}
