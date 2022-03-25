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
$sms_cintent_view = new sms_cintent_view();

// Run the page
$sms_cintent_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sms_cintent_view->isExport()) { ?>
<script>
var fsms_cintentview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsms_cintentview = currentForm = new ew.Form("fsms_cintentview", "view");
	loadjs.done("fsms_cintentview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sms_cintent_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sms_cintent_view->ExportOptions->render("body") ?>
<?php $sms_cintent_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sms_cintent_view->showPageHeader(); ?>
<?php
$sms_cintent_view->showMessage();
?>
<form name="fsms_cintentview" id="fsms_cintentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="modal" value="<?php echo (int)$sms_cintent_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sms_cintent_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_id"><?php echo $sms_cintent_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $sms_cintent_view->id->cellAttributes() ?>>
<span id="el_sms_cintent_id">
<span<?php echo $sms_cintent_view->id->viewAttributes() ?>><?php echo $sms_cintent_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent_view->SMSType->Visible) { // SMSType ?>
	<tr id="r_SMSType">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_SMSType"><?php echo $sms_cintent_view->SMSType->caption() ?></span></td>
		<td data-name="SMSType" <?php echo $sms_cintent_view->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<span<?php echo $sms_cintent_view->SMSType->viewAttributes() ?>><?php echo $sms_cintent_view->SMSType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent_view->Content->Visible) { // Content ?>
	<tr id="r_Content">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_Content"><?php echo $sms_cintent_view->Content->caption() ?></span></td>
		<td data-name="Content" <?php echo $sms_cintent_view->Content->cellAttributes() ?>>
<span id="el_sms_cintent_Content">
<span<?php echo $sms_cintent_view->Content->viewAttributes() ?>><?php echo $sms_cintent_view->Content->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent_view->Enabled->Visible) { // Enabled ?>
	<tr id="r_Enabled">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_Enabled"><?php echo $sms_cintent_view->Enabled->caption() ?></span></td>
		<td data-name="Enabled" <?php echo $sms_cintent_view->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<span<?php echo $sms_cintent_view->Enabled->viewAttributes() ?>><?php echo $sms_cintent_view->Enabled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_HospID"><?php echo $sms_cintent_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $sms_cintent_view->HospID->cellAttributes() ?>>
<span id="el_sms_cintent_HospID">
<span<?php echo $sms_cintent_view->HospID->viewAttributes() ?>><?php echo $sms_cintent_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sms_cintent_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sms_cintent_view->isExport()) { ?>
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
$sms_cintent_view->terminate();
?>