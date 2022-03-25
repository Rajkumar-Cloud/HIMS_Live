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
$employee_skills_delete = new employee_skills_delete();

// Run the page
$employee_skills_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_skills_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_skillsdelete = currentForm = new ew.Form("femployee_skillsdelete", "delete");

// Form_CustomValidate event
femployee_skillsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_skillsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_skills_delete->showPageHeader(); ?>
<?php
$employee_skills_delete->showMessage();
?>
<form name="femployee_skillsdelete" id="femployee_skillsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_skills_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_skills_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_skills">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_skills_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_skills->id->Visible) { // id ?>
		<th class="<?php echo $employee_skills->id->headerCellClass() ?>"><span id="elh_employee_skills_id" class="employee_skills_id"><?php echo $employee_skills->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
		<th class="<?php echo $employee_skills->skill_id->headerCellClass() ?>"><span id="elh_employee_skills_skill_id" class="employee_skills_skill_id"><?php echo $employee_skills->skill_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_skills->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_skills->employee->headerCellClass() ?>"><span id="elh_employee_skills_employee" class="employee_skills_employee"><?php echo $employee_skills->employee->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_skills_delete->RecCnt = 0;
$i = 0;
while (!$employee_skills_delete->Recordset->EOF) {
	$employee_skills_delete->RecCnt++;
	$employee_skills_delete->RowCnt++;

	// Set row properties
	$employee_skills->resetAttributes();
	$employee_skills->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_skills_delete->loadRowValues($employee_skills_delete->Recordset);

	// Render row
	$employee_skills_delete->renderRow();
?>
	<tr<?php echo $employee_skills->rowAttributes() ?>>
<?php if ($employee_skills->id->Visible) { // id ?>
		<td<?php echo $employee_skills->id->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_delete->RowCnt ?>_employee_skills_id" class="employee_skills_id">
<span<?php echo $employee_skills->id->viewAttributes() ?>>
<?php echo $employee_skills->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_skills->skill_id->Visible) { // skill_id ?>
		<td<?php echo $employee_skills->skill_id->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_delete->RowCnt ?>_employee_skills_skill_id" class="employee_skills_skill_id">
<span<?php echo $employee_skills->skill_id->viewAttributes() ?>>
<?php echo $employee_skills->skill_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_skills->employee->Visible) { // employee ?>
		<td<?php echo $employee_skills->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_skills_delete->RowCnt ?>_employee_skills_employee" class="employee_skills_employee">
<span<?php echo $employee_skills->employee->viewAttributes() ?>>
<?php echo $employee_skills->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_skills_delete->Recordset->moveNext();
}
$employee_skills_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_skills_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_skills_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_skills_delete->terminate();
?>