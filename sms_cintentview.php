<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$sms_cintent->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsms_cintentview = currentForm = new ew.Form("fsms_cintentview", "view");

// Form_CustomValidate event
fsms_cintentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_cintentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsms_cintentview.lists["x_SMSType"] = <?php echo $sms_cintent_view->SMSType->Lookup->toClientList() ?>;
fsms_cintentview.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_view->SMSType->lookupOptions()) ?>;
fsms_cintentview.lists["x_Enabled[]"] = <?php echo $sms_cintent_view->Enabled->Lookup->toClientList() ?>;
fsms_cintentview.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_view->Enabled->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sms_cintent->isExport()) { ?>
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
<?php if ($sms_cintent_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_cintent_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="modal" value="<?php echo (int)$sms_cintent_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sms_cintent->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_id"><?php echo $sms_cintent->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sms_cintent->id->cellAttributes() ?>>
<span id="el_sms_cintent_id">
<span<?php echo $sms_cintent->id->viewAttributes() ?>>
<?php echo $sms_cintent->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
	<tr id="r_SMSType">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_SMSType"><?php echo $sms_cintent->SMSType->caption() ?></span></td>
		<td data-name="SMSType"<?php echo $sms_cintent->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<span<?php echo $sms_cintent->SMSType->viewAttributes() ?>>
<?php echo $sms_cintent->SMSType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent->Content->Visible) { // Content ?>
	<tr id="r_Content">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_Content"><?php echo $sms_cintent->Content->caption() ?></span></td>
		<td data-name="Content"<?php echo $sms_cintent->Content->cellAttributes() ?>>
<span id="el_sms_cintent_Content">
<span<?php echo $sms_cintent->Content->viewAttributes() ?>>
<?php echo $sms_cintent->Content->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
	<tr id="r_Enabled">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_Enabled"><?php echo $sms_cintent->Enabled->caption() ?></span></td>
		<td data-name="Enabled"<?php echo $sms_cintent->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<span<?php echo $sms_cintent->Enabled->viewAttributes() ?>>
<?php echo $sms_cintent->Enabled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_cintent->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $sms_cintent_view->TableLeftColumnClass ?>"><span id="elh_sms_cintent_HospID"><?php echo $sms_cintent->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $sms_cintent->HospID->cellAttributes() ?>>
<span id="el_sms_cintent_HospID">
<span<?php echo $sms_cintent->HospID->viewAttributes() ?>>
<?php echo $sms_cintent->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sms_cintent_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sms_cintent->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sms_cintent_view->terminate();
?>