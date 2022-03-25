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
$employee_immigrations_delete = new employee_immigrations_delete();

// Run the page
$employee_immigrations_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrations_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_immigrationsdelete = currentForm = new ew.Form("femployee_immigrationsdelete", "delete");

// Form_CustomValidate event
femployee_immigrationsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationsdelete.lists["x_status"] = <?php echo $employee_immigrations_delete->status->Lookup->toClientList() ?>;
femployee_immigrationsdelete.lists["x_status"].options = <?php echo JsonEncode($employee_immigrations_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_immigrations_delete->showPageHeader(); ?>
<?php
$employee_immigrations_delete->showMessage();
?>
<form name="femployee_immigrationsdelete" id="femployee_immigrationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrations_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrations_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_immigrations_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_immigrations->id->Visible) { // id ?>
		<th class="<?php echo $employee_immigrations->id->headerCellClass() ?>"><span id="elh_employee_immigrations_id" class="employee_immigrations_id"><?php echo $employee_immigrations->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_immigrations->employee->headerCellClass() ?>"><span id="elh_employee_immigrations_employee" class="employee_immigrations_employee"><?php echo $employee_immigrations->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->document->Visible) { // document ?>
		<th class="<?php echo $employee_immigrations->document->headerCellClass() ?>"><span id="elh_employee_immigrations_document" class="employee_immigrations_document"><?php echo $employee_immigrations->document->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
		<th class="<?php echo $employee_immigrations->documentname->headerCellClass() ?>"><span id="elh_employee_immigrations_documentname" class="employee_immigrations_documentname"><?php echo $employee_immigrations->documentname->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
		<th class="<?php echo $employee_immigrations->valid_until->headerCellClass() ?>"><span id="elh_employee_immigrations_valid_until" class="employee_immigrations_valid_until"><?php echo $employee_immigrations->valid_until->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->status->Visible) { // status ?>
		<th class="<?php echo $employee_immigrations->status->headerCellClass() ?>"><span id="elh_employee_immigrations_status" class="employee_immigrations_status"><?php echo $employee_immigrations->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
		<th class="<?php echo $employee_immigrations->attachment1->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment1" class="employee_immigrations_attachment1"><?php echo $employee_immigrations->attachment1->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
		<th class="<?php echo $employee_immigrations->attachment2->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment2" class="employee_immigrations_attachment2"><?php echo $employee_immigrations->attachment2->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
		<th class="<?php echo $employee_immigrations->attachment3->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment3" class="employee_immigrations_attachment3"><?php echo $employee_immigrations->attachment3->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->created->Visible) { // created ?>
		<th class="<?php echo $employee_immigrations->created->headerCellClass() ?>"><span id="elh_employee_immigrations_created" class="employee_immigrations_created"><?php echo $employee_immigrations->created->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrations->updated->Visible) { // updated ?>
		<th class="<?php echo $employee_immigrations->updated->headerCellClass() ?>"><span id="elh_employee_immigrations_updated" class="employee_immigrations_updated"><?php echo $employee_immigrations->updated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_immigrations_delete->RecCnt = 0;
$i = 0;
while (!$employee_immigrations_delete->Recordset->EOF) {
	$employee_immigrations_delete->RecCnt++;
	$employee_immigrations_delete->RowCnt++;

	// Set row properties
	$employee_immigrations->resetAttributes();
	$employee_immigrations->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_immigrations_delete->loadRowValues($employee_immigrations_delete->Recordset);

	// Render row
	$employee_immigrations_delete->renderRow();
?>
	<tr<?php echo $employee_immigrations->rowAttributes() ?>>
<?php if ($employee_immigrations->id->Visible) { // id ?>
		<td<?php echo $employee_immigrations->id->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_id" class="employee_immigrations_id">
<span<?php echo $employee_immigrations->id->viewAttributes() ?>>
<?php echo $employee_immigrations->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->employee->Visible) { // employee ?>
		<td<?php echo $employee_immigrations->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_employee" class="employee_immigrations_employee">
<span<?php echo $employee_immigrations->employee->viewAttributes() ?>>
<?php echo $employee_immigrations->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->document->Visible) { // document ?>
		<td<?php echo $employee_immigrations->document->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_document" class="employee_immigrations_document">
<span<?php echo $employee_immigrations->document->viewAttributes() ?>>
<?php echo $employee_immigrations->document->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->documentname->Visible) { // documentname ?>
		<td<?php echo $employee_immigrations->documentname->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_documentname" class="employee_immigrations_documentname">
<span<?php echo $employee_immigrations->documentname->viewAttributes() ?>>
<?php echo $employee_immigrations->documentname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->valid_until->Visible) { // valid_until ?>
		<td<?php echo $employee_immigrations->valid_until->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_valid_until" class="employee_immigrations_valid_until">
<span<?php echo $employee_immigrations->valid_until->viewAttributes() ?>>
<?php echo $employee_immigrations->valid_until->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->status->Visible) { // status ?>
		<td<?php echo $employee_immigrations->status->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_status" class="employee_immigrations_status">
<span<?php echo $employee_immigrations->status->viewAttributes() ?>>
<?php echo $employee_immigrations->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->attachment1->Visible) { // attachment1 ?>
		<td<?php echo $employee_immigrations->attachment1->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_attachment1" class="employee_immigrations_attachment1">
<span<?php echo $employee_immigrations->attachment1->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->attachment2->Visible) { // attachment2 ?>
		<td<?php echo $employee_immigrations->attachment2->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_attachment2" class="employee_immigrations_attachment2">
<span<?php echo $employee_immigrations->attachment2->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->attachment3->Visible) { // attachment3 ?>
		<td<?php echo $employee_immigrations->attachment3->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_attachment3" class="employee_immigrations_attachment3">
<span<?php echo $employee_immigrations->attachment3->viewAttributes() ?>>
<?php echo $employee_immigrations->attachment3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->created->Visible) { // created ?>
		<td<?php echo $employee_immigrations->created->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_created" class="employee_immigrations_created">
<span<?php echo $employee_immigrations->created->viewAttributes() ?>>
<?php echo $employee_immigrations->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrations->updated->Visible) { // updated ?>
		<td<?php echo $employee_immigrations->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrations_delete->RowCnt ?>_employee_immigrations_updated" class="employee_immigrations_updated">
<span<?php echo $employee_immigrations->updated->viewAttributes() ?>>
<?php echo $employee_immigrations->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_immigrations_delete->Recordset->moveNext();
}
$employee_immigrations_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_immigrations_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_immigrations_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_immigrations_delete->terminate();
?>