<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$sms_type_view = new sms_type_view();

// Run the page
$sms_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sms_type_view->isExport()) { ?>
<script>
var fsms_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsms_typeview = currentForm = new ew.Form("fsms_typeview", "view");
	loadjs.done("fsms_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sms_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sms_type_view->ExportOptions->render("body") ?>
<?php $sms_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sms_type_view->showPageHeader(); ?>
<?php
$sms_type_view->showMessage();
?>
<form name="fsms_typeview" id="fsms_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_type">
<input type="hidden" name="modal" value="<?php echo (int)$sms_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sms_type_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sms_type_view->TableLeftColumnClass ?>"><span id="elh_sms_type_id"><?php echo $sms_type_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $sms_type_view->id->cellAttributes() ?>>
<span id="el_sms_type_id">
<span<?php echo $sms_type_view->id->viewAttributes() ?>><?php echo $sms_type_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_type_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sms_type_view->TableLeftColumnClass ?>"><span id="elh_sms_type_Name"><?php echo $sms_type_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $sms_type_view->Name->cellAttributes() ?>>
<span id="el_sms_type_Name">
<span<?php echo $sms_type_view->Name->viewAttributes() ?>><?php echo $sms_type_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sms_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sms_type_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sms_type_view->terminate();
?>