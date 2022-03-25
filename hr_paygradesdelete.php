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
$hr_paygrades_delete = new hr_paygrades_delete();

// Run the page
$hr_paygrades_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_paygrades_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_paygradesdelete = currentForm = new ew.Form("fhr_paygradesdelete", "delete");

// Form_CustomValidate event
fhr_paygradesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_paygradesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_paygrades_delete->showPageHeader(); ?>
<?php
$hr_paygrades_delete->showMessage();
?>
<form name="fhr_paygradesdelete" id="fhr_paygradesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_paygrades_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_paygrades_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_paygrades_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_paygrades->id->Visible) { // id ?>
		<th class="<?php echo $hr_paygrades->id->headerCellClass() ?>"><span id="elh_hr_paygrades_id" class="hr_paygrades_id"><?php echo $hr_paygrades->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_paygrades->name->Visible) { // name ?>
		<th class="<?php echo $hr_paygrades->name->headerCellClass() ?>"><span id="elh_hr_paygrades_name" class="hr_paygrades_name"><?php echo $hr_paygrades->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_paygrades->currency->Visible) { // currency ?>
		<th class="<?php echo $hr_paygrades->currency->headerCellClass() ?>"><span id="elh_hr_paygrades_currency" class="hr_paygrades_currency"><?php echo $hr_paygrades->currency->caption() ?></span></th>
<?php } ?>
<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
		<th class="<?php echo $hr_paygrades->min_salary->headerCellClass() ?>"><span id="elh_hr_paygrades_min_salary" class="hr_paygrades_min_salary"><?php echo $hr_paygrades->min_salary->caption() ?></span></th>
<?php } ?>
<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
		<th class="<?php echo $hr_paygrades->max_salary->headerCellClass() ?>"><span id="elh_hr_paygrades_max_salary" class="hr_paygrades_max_salary"><?php echo $hr_paygrades->max_salary->caption() ?></span></th>
<?php } ?>
<?php if ($hr_paygrades->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_paygrades->HospID->headerCellClass() ?>"><span id="elh_hr_paygrades_HospID" class="hr_paygrades_HospID"><?php echo $hr_paygrades->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_paygrades_delete->RecCnt = 0;
$i = 0;
while (!$hr_paygrades_delete->Recordset->EOF) {
	$hr_paygrades_delete->RecCnt++;
	$hr_paygrades_delete->RowCnt++;

	// Set row properties
	$hr_paygrades->resetAttributes();
	$hr_paygrades->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_paygrades_delete->loadRowValues($hr_paygrades_delete->Recordset);

	// Render row
	$hr_paygrades_delete->renderRow();
?>
	<tr<?php echo $hr_paygrades->rowAttributes() ?>>
<?php if ($hr_paygrades->id->Visible) { // id ?>
		<td<?php echo $hr_paygrades->id->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_id" class="hr_paygrades_id">
<span<?php echo $hr_paygrades->id->viewAttributes() ?>>
<?php echo $hr_paygrades->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_paygrades->name->Visible) { // name ?>
		<td<?php echo $hr_paygrades->name->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_name" class="hr_paygrades_name">
<span<?php echo $hr_paygrades->name->viewAttributes() ?>>
<?php echo $hr_paygrades->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_paygrades->currency->Visible) { // currency ?>
		<td<?php echo $hr_paygrades->currency->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_currency" class="hr_paygrades_currency">
<span<?php echo $hr_paygrades->currency->viewAttributes() ?>>
<?php echo $hr_paygrades->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_paygrades->min_salary->Visible) { // min_salary ?>
		<td<?php echo $hr_paygrades->min_salary->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_min_salary" class="hr_paygrades_min_salary">
<span<?php echo $hr_paygrades->min_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->min_salary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_paygrades->max_salary->Visible) { // max_salary ?>
		<td<?php echo $hr_paygrades->max_salary->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_max_salary" class="hr_paygrades_max_salary">
<span<?php echo $hr_paygrades->max_salary->viewAttributes() ?>>
<?php echo $hr_paygrades->max_salary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_paygrades->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_paygrades->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_paygrades_delete->RowCnt ?>_hr_paygrades_HospID" class="hr_paygrades_HospID">
<span<?php echo $hr_paygrades->HospID->viewAttributes() ?>>
<?php echo $hr_paygrades->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_paygrades_delete->Recordset->moveNext();
}
$hr_paygrades_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_paygrades_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_paygrades_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_paygrades_delete->terminate();
?>