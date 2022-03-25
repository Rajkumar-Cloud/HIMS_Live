<?php
namespace PHPMaker2019\HIMS___2019;

// Session
session_start();

// Autoload
include_once "rautoload.php";

// Captcha
$captcha = new Captcha("aftershock");
$_SESSION[SESSION_CAPTCHA_CODE] = $captcha->show();
?>