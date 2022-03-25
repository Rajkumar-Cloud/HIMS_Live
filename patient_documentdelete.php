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
$patient_document_delete = new patient_document_delete();

// Run the page
$patient_document_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_document_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_documentdelete = currentForm = new ew.Form("fpatient_documentdelete", "delete");

// Form_CustomValidate event
fpatient_documentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_documentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_documentdelete.lists["x_DocumentName"] = <?php echo $patient_document_delete->DocumentName->Lookup->toClientList() ?>;
fpatient_documentdelete.lists["x_DocumentName"].options = <?php echo JsonEncode($patient_document_delete->DocumentName->lookupOptions()) ?>;
fpatient_documentdelete.lists["x_status"] = <?php echo $patient_document_delete->status->Lookup->toClientList() ?>;
fpatient_documentdelete.lists["x_status"].options = <?php echo JsonEncode($patient_document_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_document_delete->showPageHeader(); ?>
<?php
$patient_document_delete->showMessage();
?>
<form name="fpatient_documentdelete" id="fpatient_documentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_document_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_document_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_document">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_document_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_document->id->Visible) { // id ?>
		<th class="<?php echo $patient_document->id->headerCellClass() ?>"><span id="elh_patient_document_id" class="patient_document_id"><?php echo $patient_document->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_document->patient_id->headerCellClass() ?>"><span id="elh_patient_document_patient_id" class="patient_document_patient_id"><?php echo $patient_document->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<th class="<?php echo $patient_document->DocumentName->headerCellClass() ?>"><span id="elh_patient_document_DocumentName" class="patient_document_DocumentName"><?php echo $patient_document->DocumentName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
		<th class="<?php echo $patient_document->status->headerCellClass() ?>"><span id="elh_patient_document_status" class="patient_document_status"><?php echo $patient_document->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_document->createdby->headerCellClass() ?>"><span id="elh_patient_document_createdby" class="patient_document_createdby"><?php echo $patient_document->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_document->createddatetime->headerCellClass() ?>"><span id="elh_patient_document_createddatetime" class="patient_document_createddatetime"><?php echo $patient_document->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_document->modifiedby->headerCellClass() ?>"><span id="elh_patient_document_modifiedby" class="patient_document_modifiedby"><?php echo $patient_document->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_document->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_document_modifieddatetime" class="patient_document_modifieddatetime"><?php echo $patient_document->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<th class="<?php echo $patient_document->DocumentNumber->headerCellClass() ?>"><span id="elh_patient_document_DocumentNumber" class="patient_document_DocumentNumber"><?php echo $patient_document->DocumentNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_document_delete->RecCnt = 0;
$i = 0;
while (!$patient_document_delete->Recordset->EOF) {
	$patient_document_delete->RecCnt++;
	$patient_document_delete->RowCnt++;

	// Set row properties
	$patient_document->resetAttributes();
	$patient_document->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_document_delete->loadRowValues($patient_document_delete->Recordset);

	// Render row
	$patient_document_delete->renderRow();
?>
	<tr<?php echo $patient_document->rowAttributes() ?>>
<?php if ($patient_document->id->Visible) { // id ?>
		<td<?php echo $patient_document->id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_id" class="patient_document_id">
<span<?php echo $patient_document->id->viewAttributes() ?>>
<?php echo $patient_document->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->patient_id->Visible) { // patient_id ?>
		<td<?php echo $patient_document->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_patient_id" class="patient_document_patient_id">
<span<?php echo $patient_document->patient_id->viewAttributes() ?>>
<?php echo $patient_document->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->DocumentName->Visible) { // DocumentName ?>
		<td<?php echo $patient_document->DocumentName->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_DocumentName" class="patient_document_DocumentName">
<span<?php echo $patient_document->DocumentName->viewAttributes() ?>>
<?php echo $patient_document->DocumentName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->status->Visible) { // status ?>
		<td<?php echo $patient_document->status->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_status" class="patient_document_status">
<span<?php echo $patient_document->status->viewAttributes() ?>>
<?php echo $patient_document->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_document->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_createdby" class="patient_document_createdby">
<span<?php echo $patient_document->createdby->viewAttributes() ?>>
<?php echo $patient_document->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_document->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_createddatetime" class="patient_document_createddatetime">
<span<?php echo $patient_document->createddatetime->viewAttributes() ?>>
<?php echo $patient_document->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_document->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_modifiedby" class="patient_document_modifiedby">
<span<?php echo $patient_document->modifiedby->viewAttributes() ?>>
<?php echo $patient_document->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_document->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_modifieddatetime" class="patient_document_modifieddatetime">
<span<?php echo $patient_document->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_document->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td<?php echo $patient_document->DocumentNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_document_delete->RowCnt ?>_patient_document_DocumentNumber" class="patient_document_DocumentNumber">
<span<?php echo $patient_document->DocumentNumber->viewAttributes() ?>>
<?php echo $patient_document->DocumentNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_document_delete->Recordset->moveNext();
}
$patient_document_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_document_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_document_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_document_delete->terminate();
?>