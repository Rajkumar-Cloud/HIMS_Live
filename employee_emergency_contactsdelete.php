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
$employee_emergency_contacts_delete = new employee_emergency_contacts_delete();

// Run the page
$employee_emergency_contacts_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_emergency_contacts_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_emergency_contactsdelete = currentForm = new ew.Form("femployee_emergency_contactsdelete", "delete");

// Form_CustomValidate event
femployee_emergency_contactsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emergency_contactsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_emergency_contacts_delete->showPageHeader(); ?>
<?php
$employee_emergency_contacts_delete->showMessage();
?>
<form name="femployee_emergency_contactsdelete" id="femployee_emergency_contactsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_emergency_contacts_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_emergency_contacts_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_emergency_contacts_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
		<th class="<?php echo $employee_emergency_contacts->id->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_id" class="employee_emergency_contacts_id"><?php echo $employee_emergency_contacts->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_emergency_contacts->employee->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee"><?php echo $employee_emergency_contacts->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
		<th class="<?php echo $employee_emergency_contacts->name->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_name" class="employee_emergency_contacts_name"><?php echo $employee_emergency_contacts->name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
		<th class="<?php echo $employee_emergency_contacts->relationship->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship"><?php echo $employee_emergency_contacts->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
		<th class="<?php echo $employee_emergency_contacts->home_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone"><?php echo $employee_emergency_contacts->home_phone->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
		<th class="<?php echo $employee_emergency_contacts->work_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone"><?php echo $employee_emergency_contacts->work_phone->caption() ?></span></th>
<?php } ?>
<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
		<th class="<?php echo $employee_emergency_contacts->mobile_phone->headerCellClass() ?>"><span id="elh_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone"><?php echo $employee_emergency_contacts->mobile_phone->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_emergency_contacts_delete->RecCnt = 0;
$i = 0;
while (!$employee_emergency_contacts_delete->Recordset->EOF) {
	$employee_emergency_contacts_delete->RecCnt++;
	$employee_emergency_contacts_delete->RowCnt++;

	// Set row properties
	$employee_emergency_contacts->resetAttributes();
	$employee_emergency_contacts->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_emergency_contacts_delete->loadRowValues($employee_emergency_contacts_delete->Recordset);

	// Render row
	$employee_emergency_contacts_delete->renderRow();
?>
	<tr<?php echo $employee_emergency_contacts->rowAttributes() ?>>
<?php if ($employee_emergency_contacts->id->Visible) { // id ?>
		<td<?php echo $employee_emergency_contacts->id->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_id" class="employee_emergency_contacts_id">
<span<?php echo $employee_emergency_contacts->id->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->employee->Visible) { // employee ?>
		<td<?php echo $employee_emergency_contacts->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_employee" class="employee_emergency_contacts_employee">
<span<?php echo $employee_emergency_contacts->employee->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->name->Visible) { // name ?>
		<td<?php echo $employee_emergency_contacts->name->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_name" class="employee_emergency_contacts_name">
<span<?php echo $employee_emergency_contacts->name->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->relationship->Visible) { // relationship ?>
		<td<?php echo $employee_emergency_contacts->relationship->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_relationship" class="employee_emergency_contacts_relationship">
<span<?php echo $employee_emergency_contacts->relationship->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->home_phone->Visible) { // home_phone ?>
		<td<?php echo $employee_emergency_contacts->home_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_home_phone" class="employee_emergency_contacts_home_phone">
<span<?php echo $employee_emergency_contacts->home_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->home_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->work_phone->Visible) { // work_phone ?>
		<td<?php echo $employee_emergency_contacts->work_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_work_phone" class="employee_emergency_contacts_work_phone">
<span<?php echo $employee_emergency_contacts->work_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->work_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_emergency_contacts->mobile_phone->Visible) { // mobile_phone ?>
		<td<?php echo $employee_emergency_contacts->mobile_phone->cellAttributes() ?>>
<span id="el<?php echo $employee_emergency_contacts_delete->RowCnt ?>_employee_emergency_contacts_mobile_phone" class="employee_emergency_contacts_mobile_phone">
<span<?php echo $employee_emergency_contacts->mobile_phone->viewAttributes() ?>>
<?php echo $employee_emergency_contacts->mobile_phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_emergency_contacts_delete->Recordset->moveNext();
}
$employee_emergency_contacts_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_emergency_contacts_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_emergency_contacts_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_emergency_contacts_delete->terminate();
?>