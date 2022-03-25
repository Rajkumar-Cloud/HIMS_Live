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
$sms_curl_view = new sms_curl_view();

// Run the page
$sms_curl_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_curl_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sms_curl->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsms_curlview = currentForm = new ew.Form("fsms_curlview", "view");

// Form_CustomValidate event
fsms_curlview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_curlview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sms_curl->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sms_curl_view->ExportOptions->render("body") ?>
<?php $sms_curl_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sms_curl_view->showPageHeader(); ?>
<?php
$sms_curl_view->showMessage();
?>
<form name="fsms_curlview" id="fsms_curlview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_curl_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_curl_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_curl">
<input type="hidden" name="modal" value="<?php echo (int)$sms_curl_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sms_curl->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sms_curl_view->TableLeftColumnClass ?>"><span id="elh_sms_curl_id"><?php echo $sms_curl->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sms_curl->id->cellAttributes() ?>>
<span id="el_sms_curl_id">
<span<?php echo $sms_curl->id->viewAttributes() ?>>
<?php echo $sms_curl->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
	<tr id="r_SMSType">
		<td class="<?php echo $sms_curl_view->TableLeftColumnClass ?>"><span id="elh_sms_curl_SMSType"><?php echo $sms_curl->SMSType->caption() ?></span></td>
		<td data-name="SMSType"<?php echo $sms_curl->SMSType->cellAttributes() ?>>
<span id="el_sms_curl_SMSType">
<span<?php echo $sms_curl->SMSType->viewAttributes() ?>>
<?php echo $sms_curl->SMSType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_curl->Content->Visible) { // Content ?>
	<tr id="r_Content">
		<td class="<?php echo $sms_curl_view->TableLeftColumnClass ?>"><span id="elh_sms_curl_Content"><?php echo $sms_curl->Content->caption() ?></span></td>
		<td data-name="Content"<?php echo $sms_curl->Content->cellAttributes() ?>>
<span id="el_sms_curl_Content">
<span<?php echo $sms_curl->Content->viewAttributes() ?>>
<?php echo $sms_curl->Content->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
	<tr id="r_Enabled">
		<td class="<?php echo $sms_curl_view->TableLeftColumnClass ?>"><span id="elh_sms_curl_Enabled"><?php echo $sms_curl->Enabled->caption() ?></span></td>
		<td data-name="Enabled"<?php echo $sms_curl->Enabled->cellAttributes() ?>>
<span id="el_sms_curl_Enabled">
<span<?php echo $sms_curl->Enabled->viewAttributes() ?>>
<?php echo $sms_curl->Enabled->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sms_curl->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $sms_curl_view->TableLeftColumnClass ?>"><span id="elh_sms_curl_HospID"><?php echo $sms_curl->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $sms_curl->HospID->cellAttributes() ?>>
<span id="el_sms_curl_HospID">
<span<?php echo $sms_curl->HospID->viewAttributes() ?>>
<?php echo $sms_curl->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sms_curl_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sms_curl->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sms_curl_view->terminate();
?>