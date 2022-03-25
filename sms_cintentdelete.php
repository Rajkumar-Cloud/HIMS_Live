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
$sms_cintent_delete = new sms_cintent_delete();

// Run the page
$sms_cintent_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sms_cintent_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsms_cintentdelete = currentForm = new ew.Form("fsms_cintentdelete", "delete");

// Form_CustomValidate event
fsms_cintentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsms_cintentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsms_cintentdelete.lists["x_SMSType"] = <?php echo $sms_cintent_delete->SMSType->Lookup->toClientList() ?>;
fsms_cintentdelete.lists["x_SMSType"].options = <?php echo JsonEncode($sms_cintent_delete->SMSType->lookupOptions()) ?>;
fsms_cintentdelete.lists["x_Enabled[]"] = <?php echo $sms_cintent_delete->Enabled->Lookup->toClientList() ?>;
fsms_cintentdelete.lists["x_Enabled[]"].options = <?php echo JsonEncode($sms_cintent_delete->Enabled->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sms_cintent_delete->showPageHeader(); ?>
<?php
$sms_cintent_delete->showMessage();
?>
<form name="fsms_cintentdelete" id="fsms_cintentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sms_cintent_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sms_cintent_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sms_cintent_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sms_cintent->id->Visible) { // id ?>
		<th class="<?php echo $sms_cintent->id->headerCellClass() ?>"><span id="elh_sms_cintent_id" class="sms_cintent_id"><?php echo $sms_cintent->id->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
		<th class="<?php echo $sms_cintent->SMSType->headerCellClass() ?>"><span id="elh_sms_cintent_SMSType" class="sms_cintent_SMSType"><?php echo $sms_cintent->SMSType->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent->Content->Visible) { // Content ?>
		<th class="<?php echo $sms_cintent->Content->headerCellClass() ?>"><span id="elh_sms_cintent_Content" class="sms_cintent_Content"><?php echo $sms_cintent->Content->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
		<th class="<?php echo $sms_cintent->Enabled->headerCellClass() ?>"><span id="elh_sms_cintent_Enabled" class="sms_cintent_Enabled"><?php echo $sms_cintent->Enabled->caption() ?></span></th>
<?php } ?>
<?php if ($sms_cintent->HospID->Visible) { // HospID ?>
		<th class="<?php echo $sms_cintent->HospID->headerCellClass() ?>"><span id="elh_sms_cintent_HospID" class="sms_cintent_HospID"><?php echo $sms_cintent->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sms_cintent_delete->RecCnt = 0;
$i = 0;
while (!$sms_cintent_delete->Recordset->EOF) {
	$sms_cintent_delete->RecCnt++;
	$sms_cintent_delete->RowCnt++;

	// Set row properties
	$sms_cintent->resetAttributes();
	$sms_cintent->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sms_cintent_delete->loadRowValues($sms_cintent_delete->Recordset);

	// Render row
	$sms_cintent_delete->renderRow();
?>
	<tr<?php echo $sms_cintent->rowAttributes() ?>>
<?php if ($sms_cintent->id->Visible) { // id ?>
		<td<?php echo $sms_cintent->id->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCnt ?>_sms_cintent_id" class="sms_cintent_id">
<span<?php echo $sms_cintent->id->viewAttributes() ?>>
<?php echo $sms_cintent->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent->SMSType->Visible) { // SMSType ?>
		<td<?php echo $sms_cintent->SMSType->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCnt ?>_sms_cintent_SMSType" class="sms_cintent_SMSType">
<span<?php echo $sms_cintent->SMSType->viewAttributes() ?>>
<?php echo $sms_cintent->SMSType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent->Content->Visible) { // Content ?>
		<td<?php echo $sms_cintent->Content->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCnt ?>_sms_cintent_Content" class="sms_cintent_Content">
<span<?php echo $sms_cintent->Content->viewAttributes() ?>>
<?php echo $sms_cintent->Content->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent->Enabled->Visible) { // Enabled ?>
		<td<?php echo $sms_cintent->Enabled->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCnt ?>_sms_cintent_Enabled" class="sms_cintent_Enabled">
<span<?php echo $sms_cintent->Enabled->viewAttributes() ?>>
<?php echo $sms_cintent->Enabled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sms_cintent->HospID->Visible) { // HospID ?>
		<td<?php echo $sms_cintent->HospID->cellAttributes() ?>>
<span id="el<?php echo $sms_cintent_delete->RowCnt ?>_sms_cintent_HospID" class="sms_cintent_HospID">
<span<?php echo $sms_cintent->HospID->viewAttributes() ?>>
<?php echo $sms_cintent->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sms_cintent_delete->Recordset->moveNext();
}
$sms_cintent_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sms_cintent_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sms_cintent_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sms_cintent_delete->terminate();
?>