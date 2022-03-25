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
$employee_travel_records_delete = new employee_travel_records_delete();

// Run the page
$employee_travel_records_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_travel_records_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_travel_recordsdelete = currentForm = new ew.Form("femployee_travel_recordsdelete", "delete");

// Form_CustomValidate event
femployee_travel_recordsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_travel_recordsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_travel_recordsdelete.lists["x_type"] = <?php echo $employee_travel_records_delete->type->Lookup->toClientList() ?>;
femployee_travel_recordsdelete.lists["x_type"].options = <?php echo JsonEncode($employee_travel_records_delete->type->options(FALSE, TRUE)) ?>;
femployee_travel_recordsdelete.lists["x_status"] = <?php echo $employee_travel_records_delete->status->Lookup->toClientList() ?>;
femployee_travel_recordsdelete.lists["x_status"].options = <?php echo JsonEncode($employee_travel_records_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_travel_records_delete->showPageHeader(); ?>
<?php
$employee_travel_records_delete->showMessage();
?>
<form name="femployee_travel_recordsdelete" id="femployee_travel_recordsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_travel_records_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_travel_records_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_travel_records_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_travel_records->id->Visible) { // id ?>
		<th class="<?php echo $employee_travel_records->id->headerCellClass() ?>"><span id="elh_employee_travel_records_id" class="employee_travel_records_id"><?php echo $employee_travel_records->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_travel_records->employee->headerCellClass() ?>"><span id="elh_employee_travel_records_employee" class="employee_travel_records_employee"><?php echo $employee_travel_records->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->type->Visible) { // type ?>
		<th class="<?php echo $employee_travel_records->type->headerCellClass() ?>"><span id="elh_employee_travel_records_type" class="employee_travel_records_type"><?php echo $employee_travel_records->type->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
		<th class="<?php echo $employee_travel_records->purpose->headerCellClass() ?>"><span id="elh_employee_travel_records_purpose" class="employee_travel_records_purpose"><?php echo $employee_travel_records->purpose->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
		<th class="<?php echo $employee_travel_records->travel_from->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_from" class="employee_travel_records_travel_from"><?php echo $employee_travel_records->travel_from->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
		<th class="<?php echo $employee_travel_records->travel_to->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_to" class="employee_travel_records_travel_to"><?php echo $employee_travel_records->travel_to->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
		<th class="<?php echo $employee_travel_records->travel_date->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_date" class="employee_travel_records_travel_date"><?php echo $employee_travel_records->travel_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
		<th class="<?php echo $employee_travel_records->return_date->headerCellClass() ?>"><span id="elh_employee_travel_records_return_date" class="employee_travel_records_return_date"><?php echo $employee_travel_records->return_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->funding->Visible) { // funding ?>
		<th class="<?php echo $employee_travel_records->funding->headerCellClass() ?>"><span id="elh_employee_travel_records_funding" class="employee_travel_records_funding"><?php echo $employee_travel_records->funding->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->currency->Visible) { // currency ?>
		<th class="<?php echo $employee_travel_records->currency->headerCellClass() ?>"><span id="elh_employee_travel_records_currency" class="employee_travel_records_currency"><?php echo $employee_travel_records->currency->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
		<th class="<?php echo $employee_travel_records->attachment1->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment1" class="employee_travel_records_attachment1"><?php echo $employee_travel_records->attachment1->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
		<th class="<?php echo $employee_travel_records->attachment2->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment2" class="employee_travel_records_attachment2"><?php echo $employee_travel_records->attachment2->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
		<th class="<?php echo $employee_travel_records->attachment3->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment3" class="employee_travel_records_attachment3"><?php echo $employee_travel_records->attachment3->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->created->Visible) { // created ?>
		<th class="<?php echo $employee_travel_records->created->headerCellClass() ?>"><span id="elh_employee_travel_records_created" class="employee_travel_records_created"><?php echo $employee_travel_records->created->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->updated->Visible) { // updated ?>
		<th class="<?php echo $employee_travel_records->updated->headerCellClass() ?>"><span id="elh_employee_travel_records_updated" class="employee_travel_records_updated"><?php echo $employee_travel_records->updated->caption() ?></span></th>
<?php } ?>
<?php if ($employee_travel_records->status->Visible) { // status ?>
		<th class="<?php echo $employee_travel_records->status->headerCellClass() ?>"><span id="elh_employee_travel_records_status" class="employee_travel_records_status"><?php echo $employee_travel_records->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_travel_records_delete->RecCnt = 0;
$i = 0;
while (!$employee_travel_records_delete->Recordset->EOF) {
	$employee_travel_records_delete->RecCnt++;
	$employee_travel_records_delete->RowCnt++;

	// Set row properties
	$employee_travel_records->resetAttributes();
	$employee_travel_records->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_travel_records_delete->loadRowValues($employee_travel_records_delete->Recordset);

	// Render row
	$employee_travel_records_delete->renderRow();
?>
	<tr<?php echo $employee_travel_records->rowAttributes() ?>>
<?php if ($employee_travel_records->id->Visible) { // id ?>
		<td<?php echo $employee_travel_records->id->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_id" class="employee_travel_records_id">
<span<?php echo $employee_travel_records->id->viewAttributes() ?>>
<?php echo $employee_travel_records->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->employee->Visible) { // employee ?>
		<td<?php echo $employee_travel_records->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_employee" class="employee_travel_records_employee">
<span<?php echo $employee_travel_records->employee->viewAttributes() ?>>
<?php echo $employee_travel_records->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->type->Visible) { // type ?>
		<td<?php echo $employee_travel_records->type->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_type" class="employee_travel_records_type">
<span<?php echo $employee_travel_records->type->viewAttributes() ?>>
<?php echo $employee_travel_records->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->purpose->Visible) { // purpose ?>
		<td<?php echo $employee_travel_records->purpose->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_purpose" class="employee_travel_records_purpose">
<span<?php echo $employee_travel_records->purpose->viewAttributes() ?>>
<?php echo $employee_travel_records->purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->travel_from->Visible) { // travel_from ?>
		<td<?php echo $employee_travel_records->travel_from->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_travel_from" class="employee_travel_records_travel_from">
<span<?php echo $employee_travel_records->travel_from->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_from->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->travel_to->Visible) { // travel_to ?>
		<td<?php echo $employee_travel_records->travel_to->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_travel_to" class="employee_travel_records_travel_to">
<span<?php echo $employee_travel_records->travel_to->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_to->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->travel_date->Visible) { // travel_date ?>
		<td<?php echo $employee_travel_records->travel_date->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_travel_date" class="employee_travel_records_travel_date">
<span<?php echo $employee_travel_records->travel_date->viewAttributes() ?>>
<?php echo $employee_travel_records->travel_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->return_date->Visible) { // return_date ?>
		<td<?php echo $employee_travel_records->return_date->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_return_date" class="employee_travel_records_return_date">
<span<?php echo $employee_travel_records->return_date->viewAttributes() ?>>
<?php echo $employee_travel_records->return_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->funding->Visible) { // funding ?>
		<td<?php echo $employee_travel_records->funding->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_funding" class="employee_travel_records_funding">
<span<?php echo $employee_travel_records->funding->viewAttributes() ?>>
<?php echo $employee_travel_records->funding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->currency->Visible) { // currency ?>
		<td<?php echo $employee_travel_records->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_currency" class="employee_travel_records_currency">
<span<?php echo $employee_travel_records->currency->viewAttributes() ?>>
<?php echo $employee_travel_records->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->attachment1->Visible) { // attachment1 ?>
		<td<?php echo $employee_travel_records->attachment1->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_attachment1" class="employee_travel_records_attachment1">
<span<?php echo $employee_travel_records->attachment1->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->attachment2->Visible) { // attachment2 ?>
		<td<?php echo $employee_travel_records->attachment2->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_attachment2" class="employee_travel_records_attachment2">
<span<?php echo $employee_travel_records->attachment2->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->attachment3->Visible) { // attachment3 ?>
		<td<?php echo $employee_travel_records->attachment3->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_attachment3" class="employee_travel_records_attachment3">
<span<?php echo $employee_travel_records->attachment3->viewAttributes() ?>>
<?php echo $employee_travel_records->attachment3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->created->Visible) { // created ?>
		<td<?php echo $employee_travel_records->created->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_created" class="employee_travel_records_created">
<span<?php echo $employee_travel_records->created->viewAttributes() ?>>
<?php echo $employee_travel_records->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->updated->Visible) { // updated ?>
		<td<?php echo $employee_travel_records->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_updated" class="employee_travel_records_updated">
<span<?php echo $employee_travel_records->updated->viewAttributes() ?>>
<?php echo $employee_travel_records->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_travel_records->status->Visible) { // status ?>
		<td<?php echo $employee_travel_records->status->cellAttributes() ?>>
<span id="el<?php echo $employee_travel_records_delete->RowCnt ?>_employee_travel_records_status" class="employee_travel_records_status">
<span<?php echo $employee_travel_records->status->viewAttributes() ?>>
<?php echo $employee_travel_records->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_travel_records_delete->Recordset->moveNext();
}
$employee_travel_records_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_travel_records_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_travel_records_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_travel_records_delete->terminate();
?>