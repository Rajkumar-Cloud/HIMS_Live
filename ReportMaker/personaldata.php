<?php
namespace PHPReportMaker12\HIMS___2019;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($personaldata))
	$personaldata = new personaldata();
if (isset($Page))
	$OldPage = $Page;
$Page = &$personaldata;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();
?>
<?php include_once "rheader.php" ?>
<?php $Page->showMessage(); ?>
<?php if (SameText(Get("cmd"), "Delete")) { ?>
	<div class="alert alert-danger d-inline-block">
		<i class="icon fa fa-ban"></i><?php echo $Language->phrase("PersonalDataWarning") ?>
	</div>
	<?php if (!EmptyString($personaldata->getFailureMessage())) { ?>
	<div class="text-danger">
		<ul>
			<li><?php echo $personaldata->getFailureMessage() ?></li>
		</ul>
	</div>
	<?php } ?>
	<div>
		<form id="delete-user" method="post" class="form-group">
<?php if ($personaldata->CheckToken) { ?>
			<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $personaldata->Token ?>">
<?php } ?>
			<div class="text-danger"></div>
			<div class="form-group">
				<label id="label" class="control-label ew-label"><?php echo $Language->phrase("Password") ?></label>
				<input type="password" name="password" id="password" class="form-control ew-control" placeholder="<?php echo $Language->phrase("Password") ?>">
			</div>
			<button class="btn btn-primary" type="submit"><?php echo $Language->phrase("CloseAccountBtn") ?></button>
		</form>
	</div>
<?php } else { ?>
	<div class="row">
		<div class="col">
			<p><?php echo $Language->phrase("PersonalDataContent") ?></p>
			<div class="alert alert-danger d-inline-block">
				<i class="icon fa fa-ban"></i><?php echo $Language->phrase("PersonalDataWarning") ?>
			</div>
			<p>
				<a id="download" href="<?php echo CurrentPageName() . "?cmd=download" ?>" class="btn btn-default"><?php echo $Language->phrase("DownloadBtn") ?></a>
				<a id="delete" href="<?php echo CurrentPageName() . "?cmd=delete" ?>" class="btn btn-default"><?php echo $Language->phrase("DeleteBtn") ?></a>
			</p>
		</div>
	</div>
<?php } ?>
<?php $personaldata->clearFailureMessage(); ?>
<?php include_once "rfooter.php" ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>