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
$sms_curl_delete = new sms_curl_delete();

// Run the page
$sms_curl_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_curl_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsms_curldelete = currentForm = new ew.Form("fsms_curldelete", "delete");

// Form_CustomValidate event
fsms_curldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_curldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sms_curl_delete->showPageHeader(); ?>
<?php
$sms_curl_delete->showMessage();
?>
<form name="fsms_curldelete" id="fsms_curldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_curl_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_curl_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_curl">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sms_curl_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sms_curl->id->Visible) { // id ?>
		<th class="<?php echo $sms_curl->id->headerCellClass() ?>"><span id="elh_sms_curl_id" class="sms_curl_id"><?php echo $sms_curl->id->caption() ?></span></th>
<?php } ?>
<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
		<th class="<?php echo $sms_curl->SMSType->headerCellClass() ?>"><span id="elh_sms_curl_SMSType" class="sms_curl_SMSType"><?php echo $sms_curl->SMSType->caption() ?></span></th>
<?php } ?>
<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
		<th class="<?php echo $sms_curl->Enabled->headerCellClass() ?>"><span id="elh_sms_curl_Enabled" class="sms_curl_Enabled"><?php echo $sms_curl->Enabled->caption() ?></span></th>
<?php } ?>
<?php if ($sms_curl->HospID->Visible) { // HospID ?>
		<th class="<?php echo $sms_curl->HospID->headerCellClass() ?>"><span id="elh_sms_curl_HospID" class="sms_curl_HospID"><?php echo $sms_curl->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sms_curl_delete->RecCnt = 0;
$i = 0;
while (!$sms_curl_delete->Recordset->EOF) {
	$sms_curl_delete->RecCnt++;
	$sms_curl_delete->RowCnt++;

	// Set row properties
	$sms_curl->resetAttributes();
	$sms_curl->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sms_curl_delete->loadRowValues($sms_curl_delete->Recordset);

	// Render row
	$sms_curl_delete->renderRow();
?>
	<tr<?php echo $sms_curl->rowAttributes() ?>>
<?php if ($sms_curl->id->Visible) { // id ?>
		<td<?php echo $sms_curl->id->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_delete->RowCnt ?>_sms_curl_id" class="sms_curl_id">
<span<?php echo $sms_curl->id->viewAttributes() ?>>
<?php echo $sms_curl->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_curl->SMSType->Visible) { // SMSType ?>
		<td<?php echo $sms_curl->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_delete->RowCnt ?>_sms_curl_SMSType" class="sms_curl_SMSType">
<span<?php echo $sms_curl->SMSType->viewAttributes() ?>>
<?php echo $sms_curl->SMSType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_curl->Enabled->Visible) { // Enabled ?>
		<td<?php echo $sms_curl->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_delete->RowCnt ?>_sms_curl_Enabled" class="sms_curl_Enabled">
<span<?php echo $sms_curl->Enabled->viewAttributes() ?>>
<?php echo $sms_curl->Enabled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_curl->HospID->Visible) { // HospID ?>
		<td<?php echo $sms_curl->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_curl_delete->RowCnt ?>_sms_curl_HospID" class="sms_curl_HospID">
<span<?php echo $sms_curl->HospID->viewAttributes() ?>>
<?php echo $sms_curl->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sms_curl_delete->Recordset->moveNext();
}
$sms_curl_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_curl_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sms_curl_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sms_curl_delete->terminate();
?>