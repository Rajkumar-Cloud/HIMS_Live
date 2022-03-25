<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE"));

// Captcha
$_SESSION[SESSION_CAPTCHA_CODE] = Captcha()->show();
?>