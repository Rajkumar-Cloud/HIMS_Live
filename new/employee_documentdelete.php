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
<?php include_once "header.php"; ?>
<script>
var femployee_documentdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	femployee_documentdelete = currentForm = new ew.Form("femployee_documentdelete", "delete");
	loadjs.done("femployee_documentdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_document_delete->showPageHeader(); ?>
<?php
$employee_document_delete->showMessage();
?>
<form name="femployee_documentdelete" id="femployee_documentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_document">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_document_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_document_delete->id->Visible) { // id ?>
		<th class="<?php echo $employee_document_delete->id->headerCellClass() ?>"><span id="elh_employee_document_id" class="employee_document_id"><?php echo $employee_document_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_document_delete->employee_id->headerCellClass() ?>"><span id="elh_employee_document_employee_id" class="employee_document_employee_id"><?php echo $employee_document_delete->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->DocumentName->Visible) { // DocumentName ?>
		<th class="<?php echo $employee_document_delete->DocumentName->headerCellClass() ?>"><span id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><?php echo $employee_document_delete->DocumentName->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->DocumentNumber->Visible) { // DocumentNumber ?>
		<th class="<?php echo $employee_document_delete->DocumentNumber->headerCellClass() ?>"><span id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><?php echo $employee_document_delete->DocumentNumber->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->status->Visible) { // status ?>
		<th class="<?php echo $employee_document_delete->status->headerCellClass() ?>"><span id="elh_employee_document_status" class="employee_document_status"><?php echo $employee_document_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $employee_document_delete->createdby->headerCellClass() ?>"><span id="elh_employee_document_createdby" class="employee_document_createdby"><?php echo $employee_document_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $employee_document_delete->createddatetime->headerCellClass() ?>"><span id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><?php echo $employee_document_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $employee_document_delete->modifiedby->headerCellClass() ?>"><span id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><?php echo $employee_document_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_document_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $employee_document_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><?php echo $employee_document_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_document_delete->RecordCount = 0;
$i = 0;
while (!$employee_document_delete->Recordset->EOF) {
	$employee_document_delete->RecordCount++;
	$employee_document_delete->RowCount++;

	// Set row properties
	$employee_document->resetAttributes();
	$employee_document->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_document_delete->loadRowValues($employee_document_delete->Recordset);

	// Render row
	$employee_document_delete->renderRow();
?>
	<tr <?php echo $employee_document->rowAttributes() ?>>
<?php if ($employee_document_delete->id->Visible) { // id ?>
		<td <?php echo $employee_document_delete->id->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_id" class="employee_document_id">
<span<?php echo $employee_document_delete->id->viewAttributes() ?>><?php echo $employee_document_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->employee_id->Visible) { // employee_id ?>
		<td <?php echo $employee_document_delete->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_employee_id" class="employee_document_employee_id">
<span<?php echo $employee_document_delete->employee_id->viewAttributes() ?>><?php echo $employee_document_delete->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->DocumentName->Visible) { // DocumentName ?>
		<td <?php echo $employee_document_delete->DocumentName->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_DocumentName" class="employee_document_DocumentName">
<span<?php echo $employee_document_delete->DocumentName->viewAttributes() ?>><?php echo $employee_document_delete->DocumentName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->DocumentNumber->Visible) { // DocumentNumber ?>
		<td <?php echo $employee_document_delete->DocumentNumber->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_DocumentNumber" class="employee_document_DocumentNumber">
<span<?php echo $employee_document_delete->DocumentNumber->viewAttributes() ?>><?php echo $employee_document_delete->DocumentNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->status->Visible) { // status ?>
		<td <?php echo $employee_document_delete->status->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_status" class="employee_document_status">
<span<?php echo $employee_document_delete->status->viewAttributes() ?>><?php echo $employee_document_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $employee_document_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_createdby" class="employee_document_createdby">
<span<?php echo $employee_document_delete->createdby->viewAttributes() ?>><?php echo $employee_document_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $employee_document_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_createddatetime" class="employee_document_createddatetime">
<span<?php echo $employee_document_delete->createddatetime->viewAttributes() ?>><?php echo $employee_document_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $employee_document_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_modifiedby" class="employee_document_modifiedby">
<span<?php echo $employee_document_delete->modifiedby->viewAttributes() ?>><?php echo $employee_document_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_document_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $employee_document_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_document_delete->RowCount ?>_employee_document_modifieddatetime" class="employee_document_modifieddatetime">
<span<?php echo $employee_document_delete->modifieddatetime->viewAttributes() ?>><?php echo $employee_document_delete->modifieddatetime->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$employee_document_delete->terminate();
?>