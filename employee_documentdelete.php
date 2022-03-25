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
$employee_document_delete = new employee_document_delete();

// Run the page
$employee_document_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_document_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_documentdelete = currentForm = new ew.Form("femployee_documentdelete", "delete");

// Form_CustomValidate event
femployee_documentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_documentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_documentdelete.lists["x_DocumentName"] = <?php echo $employee_document_delete->DocumentName->Lookup->toClientList() ?>;
femployee_documentdelete.lists["x_DocumentName"].options = <?php echo JsonEncode($employee_document_delete->DocumentName->lookupOptions()) ?>;
femployee_documentdelete.lists["x_status"] = <?php echo $employee_document_delete->status->Lookup->toClientList() ?>;
femployee_documentdelete.lists["x_status"].options = <?php echo JsonEncode($employee_document_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_document_delete->showPageHeader(); ?>
<?php
$employee_document_delete->showMessage();
?>
<form name="femployee_documentdelete" id="femployee_documentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_document_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_document_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_document_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_document->id->Visible) { // id ?>
		<th class="<?php echo $employee_document->id->headerCellClass() ?>"><span id="elh_employee_document_id" class="employee_document_id"><?php echo $employee_document->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_document->employee_id->headerCellClass() ?>"><span id="elh_employee_document_employee_id" class="employee_document_employee_id"><?php echo $employee_document->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<th class="<?php echo $employee_document->DocumentName->headerCellClass() ?>"><span id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><?php echo $employee_document->DocumentName->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<th class="<?php echo $employee_document->DocumentNumber->headerCellClass() ?>"><span id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><?php echo $employee_document->DocumentNumber->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
		<th class="<?php echo $employee_document->status->headerCellClass() ?>"><span id="elh_employee_document_status" class="employee_document_status"><?php echo $employee_document->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<th class="<?php echo $employee_document->createdby->headerCellClass() ?>"><span id="elh_employee_document_createdby" class="employee_document_createdby"><?php echo $employee_document->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $employee_document->createddatetime->headerCellClass() ?>"><span id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><?php echo $employee_document->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $employee_document->modifiedby->headerCellClass() ?>"><span id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><?php echo $employee_document->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $employee_document->modifieddatetime->headerCellClass() ?>"><span id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><?php echo $employee_document->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_document->HospID->headerCellClass() ?>"><span id="elh_employee_document_HospID" class="employee_document_HospID"><?php echo $employee_document->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_document_delete->RecCnt = 0;
$i = 0;
while (!$employee_document_delete->Recordset->EOF) {
	$employee_document_delete->RecCnt++;
	$employee_document_delete->RowCnt++;

	// Set row properties
	$employee_document->resetAttributes();
	$employee_document->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_document_delete->loadRowValues($employee_document_delete->Recordset);

	// Render row
	$employee_document_delete->renderRow();
?>
	<tr<?php echo $employee_document->rowAttributes() ?>>
<?php if ($employee_document->id->Visible) { // id ?>
		<td<?php echo $employee_document->id->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_id" class="employee_document_id">
<span<?php echo $employee_document->id->viewAttributes() ?>>
<?php echo $employee_document->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee_document->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_employee_id" class="employee_document_employee_id">
<span<?php echo $employee_document->employee_id->viewAttributes() ?>>
<?php echo $employee_document->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->DocumentName->Visible) { // DocumentName ?>
		<td<?php echo $employee_document->DocumentName->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_DocumentName" class="employee_document_DocumentName">
<span<?php echo $employee_document->DocumentName->viewAttributes() ?>>
<?php echo $employee_document->DocumentName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->DocumentNumber->Visible) { // DocumentNumber ?>
		<td<?php echo $employee_document->DocumentNumber->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
<span<?php echo $employee_document->DocumentNumber->viewAttributes() ?>>
<?php echo $employee_document->DocumentNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->status->Visible) { // status ?>
		<td<?php echo $employee_document->status->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_status" class="employee_document_status">
<span<?php echo $employee_document->status->viewAttributes() ?>>
<?php echo $employee_document->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->createdby->Visible) { // createdby ?>
		<td<?php echo $employee_document->createdby->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_createdby" class="employee_document_createdby">
<span<?php echo $employee_document->createdby->viewAttributes() ?>>
<?php echo $employee_document->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $employee_document->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_createddatetime" class="employee_document_createddatetime">
<span<?php echo $employee_document->createddatetime->viewAttributes() ?>>
<?php echo $employee_document->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $employee_document->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_modifiedby" class="employee_document_modifiedby">
<span<?php echo $employee_document->modifiedby->viewAttributes() ?>>
<?php echo $employee_document->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $employee_document->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
<span<?php echo $employee_document->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_document->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document->HospID->Visible) { // HospID ?>
		<td<?php echo $employee_document->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCnt ?>_employee_document_HospID" class="employee_document_HospID">
<span<?php echo $employee_document->HospID->viewAttributes() ?>>
<?php echo $employee_document->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_document_delete->Recordset->moveNext();
}
$employee_document_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_document_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_document_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_document_delete->terminate();
?>