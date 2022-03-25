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
$vitals_delete = new vitals_delete();

// Run the page
$vitals_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$vitals_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fvitalsdelete = currentForm = new ew.Form("fvitalsdelete", "delete");

// Form_CustomValidate event
fvitalsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fvitalsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $vitals_delete->showPageHeader(); ?>
<?php
$vitals_delete->showMessage();
?>
<form name="fvitalsdelete" id="fvitalsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($vitals_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $vitals_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="vitals">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($vitals_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($vitals->id->Visible) { // id ?>
		<th class="<?php echo $vitals->id->headerCellClass() ?>"><span id="elh_vitals_id" class="vitals_id"><?php echo $vitals->id->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
		<th class="<?php echo $vitals->Reception->headerCellClass() ?>"><span id="elh_vitals_Reception" class="vitals_Reception"><?php echo $vitals->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $vitals->PatientId->headerCellClass() ?>"><span id="elh_vitals_PatientId" class="vitals_PatientId"><?php echo $vitals->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $vitals->PatientName->headerCellClass() ?>"><span id="elh_vitals_PatientName" class="vitals_PatientName"><?php echo $vitals->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
		<th class="<?php echo $vitals->HT->headerCellClass() ?>"><span id="elh_vitals_HT" class="vitals_HT"><?php echo $vitals->HT->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
		<th class="<?php echo $vitals->WT->headerCellClass() ?>"><span id="elh_vitals_WT" class="vitals_WT"><?php echo $vitals->WT->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
		<th class="<?php echo $vitals->BP->headerCellClass() ?>"><span id="elh_vitals_BP" class="vitals_BP"><?php echo $vitals->BP->caption() ?></span></th>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<th class="<?php echo $vitals->PULSE->headerCellClass() ?>"><span id="elh_vitals_PULSE" class="vitals_PULSE"><?php echo $vitals->PULSE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$vitals_delete->RecCnt = 0;
$i = 0;
while (!$vitals_delete->Recordset->EOF) {
	$vitals_delete->RecCnt++;
	$vitals_delete->RowCnt++;

	// Set row properties
	$vitals->resetAttributes();
	$vitals->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$vitals_delete->loadRowValues($vitals_delete->Recordset);

	// Render row
	$vitals_delete->renderRow();
?>
	<tr<?php echo $vitals->rowAttributes() ?>>
<?php if ($vitals->id->Visible) { // id ?>
		<td<?php echo $vitals->id->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_id" class="vitals_id">
<span<?php echo $vitals->id->viewAttributes() ?>>
<?php echo $vitals->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->Reception->Visible) { // Reception ?>
		<td<?php echo $vitals->Reception->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_Reception" class="vitals_Reception">
<span<?php echo $vitals->Reception->viewAttributes() ?>>
<?php echo $vitals->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->PatientId->Visible) { // PatientId ?>
		<td<?php echo $vitals->PatientId->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_PatientId" class="vitals_PatientId">
<span<?php echo $vitals->PatientId->viewAttributes() ?>>
<?php echo $vitals->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->PatientName->Visible) { // PatientName ?>
		<td<?php echo $vitals->PatientName->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_PatientName" class="vitals_PatientName">
<span<?php echo $vitals->PatientName->viewAttributes() ?>>
<?php echo $vitals->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->HT->Visible) { // HT ?>
		<td<?php echo $vitals->HT->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_HT" class="vitals_HT">
<span<?php echo $vitals->HT->viewAttributes() ?>>
<?php echo $vitals->HT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->WT->Visible) { // WT ?>
		<td<?php echo $vitals->WT->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_WT" class="vitals_WT">
<span<?php echo $vitals->WT->viewAttributes() ?>>
<?php echo $vitals->WT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->BP->Visible) { // BP ?>
		<td<?php echo $vitals->BP->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_BP" class="vitals_BP">
<span<?php echo $vitals->BP->viewAttributes() ?>>
<?php echo $vitals->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($vitals->PULSE->Visible) { // PULSE ?>
		<td<?php echo $vitals->PULSE->cellAttributes() ?>>
<span id="el<?php echo $vitals_delete->RowCnt ?>_vitals_PULSE" class="vitals_PULSE">
<span<?php echo $vitals->PULSE->viewAttributes() ?>>
<?php echo $vitals->PULSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$vitals_delete->Recordset->moveNext();
}
$vitals_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $vitals_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$vitals_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$vitals_delete->terminate();
?>