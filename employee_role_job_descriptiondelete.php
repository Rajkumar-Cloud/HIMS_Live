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
$employee_role_job_description_delete = new employee_role_job_description_delete();

// Run the page
$employee_role_job_description_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_role_job_description_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_role_job_descriptiondelete = currentForm = new ew.Form("femployee_role_job_descriptiondelete", "delete");

// Form_CustomValidate event
femployee_role_job_descriptiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_role_job_descriptiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_role_job_description_delete->showPageHeader(); ?>
<?php
$employee_role_job_description_delete->showMessage();
?>
<form name="femployee_role_job_descriptiondelete" id="femployee_role_job_descriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_role_job_description_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_role_job_description_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_role_job_description">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_role_job_description_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_role_job_description->id->Visible) { // id ?>
		<th class="<?php echo $employee_role_job_description->id->headerCellClass() ?>"><span id="elh_employee_role_job_description_id" class="employee_role_job_description_id"><?php echo $employee_role_job_description->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->role->Visible) { // role ?>
		<th class="<?php echo $employee_role_job_description->role->headerCellClass() ?>"><span id="elh_employee_role_job_description_role" class="employee_role_job_description_role"><?php echo $employee_role_job_description->role->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->job_description->Visible) { // job_description ?>
		<th class="<?php echo $employee_role_job_description->job_description->headerCellClass() ?>"><span id="elh_employee_role_job_description_job_description" class="employee_role_job_description_job_description"><?php echo $employee_role_job_description->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->status->Visible) { // status ?>
		<th class="<?php echo $employee_role_job_description->status->headerCellClass() ?>"><span id="elh_employee_role_job_description_status" class="employee_role_job_description_status"><?php echo $employee_role_job_description->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->createdby->Visible) { // createdby ?>
		<th class="<?php echo $employee_role_job_description->createdby->headerCellClass() ?>"><span id="elh_employee_role_job_description_createdby" class="employee_role_job_description_createdby"><?php echo $employee_role_job_description->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $employee_role_job_description->createddatetime->headerCellClass() ?>"><span id="elh_employee_role_job_description_createddatetime" class="employee_role_job_description_createddatetime"><?php echo $employee_role_job_description->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $employee_role_job_description->modifiedby->headerCellClass() ?>"><span id="elh_employee_role_job_description_modifiedby" class="employee_role_job_description_modifiedby"><?php echo $employee_role_job_description->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $employee_role_job_description->modifieddatetime->headerCellClass() ?>"><span id="elh_employee_role_job_description_modifieddatetime" class="employee_role_job_description_modifieddatetime"><?php echo $employee_role_job_description->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_role_job_description_delete->RecCnt = 0;
$i = 0;
while (!$employee_role_job_description_delete->Recordset->EOF) {
	$employee_role_job_description_delete->RecCnt++;
	$employee_role_job_description_delete->RowCnt++;

	// Set row properties
	$employee_role_job_description->resetAttributes();
	$employee_role_job_description->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_role_job_description_delete->loadRowValues($employee_role_job_description_delete->Recordset);

	// Render row
	$employee_role_job_description_delete->renderRow();
?>
	<tr<?php echo $employee_role_job_description->rowAttributes() ?>>
<?php if ($employee_role_job_description->id->Visible) { // id ?>
		<td<?php echo $employee_role_job_description->id->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_id" class="employee_role_job_description_id">
<span<?php echo $employee_role_job_description->id->viewAttributes() ?>>
<?php echo $employee_role_job_description->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->role->Visible) { // role ?>
		<td<?php echo $employee_role_job_description->role->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_role" class="employee_role_job_description_role">
<span<?php echo $employee_role_job_description->role->viewAttributes() ?>>
<?php echo $employee_role_job_description->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->job_description->Visible) { // job_description ?>
		<td<?php echo $employee_role_job_description->job_description->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_job_description" class="employee_role_job_description_job_description">
<span<?php echo $employee_role_job_description->job_description->viewAttributes() ?>>
<?php echo $employee_role_job_description->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->status->Visible) { // status ?>
		<td<?php echo $employee_role_job_description->status->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_status" class="employee_role_job_description_status">
<span<?php echo $employee_role_job_description->status->viewAttributes() ?>>
<?php echo $employee_role_job_description->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->createdby->Visible) { // createdby ?>
		<td<?php echo $employee_role_job_description->createdby->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_createdby" class="employee_role_job_description_createdby">
<span<?php echo $employee_role_job_description->createdby->viewAttributes() ?>>
<?php echo $employee_role_job_description->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $employee_role_job_description->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_createddatetime" class="employee_role_job_description_createddatetime">
<span<?php echo $employee_role_job_description->createddatetime->viewAttributes() ?>>
<?php echo $employee_role_job_description->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $employee_role_job_description->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_modifiedby" class="employee_role_job_description_modifiedby">
<span<?php echo $employee_role_job_description->modifiedby->viewAttributes() ?>>
<?php echo $employee_role_job_description->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_role_job_description->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $employee_role_job_description->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $employee_role_job_description_delete->RowCnt ?>_employee_role_job_description_modifieddatetime" class="employee_role_job_description_modifieddatetime">
<span<?php echo $employee_role_job_description->modifieddatetime->viewAttributes() ?>>
<?php echo $employee_role_job_description->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_role_job_description_delete->Recordset->moveNext();
}
$employee_role_job_description_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_role_job_description_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_role_job_description_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_role_job_description_delete->terminate();
?>