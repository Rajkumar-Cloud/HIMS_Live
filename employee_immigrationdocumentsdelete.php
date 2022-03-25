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
$employee_immigrationdocuments_delete = new employee_immigrationdocuments_delete();

// Run the page
$employee_immigrationdocuments_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_immigrationdocuments_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_immigrationdocumentsdelete = currentForm = new ew.Form("femployee_immigrationdocumentsdelete", "delete");

// Form_CustomValidate event
femployee_immigrationdocumentsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_immigrationdocumentsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_immigrationdocumentsdelete.lists["x_required"] = <?php echo $employee_immigrationdocuments_delete->required->Lookup->toClientList() ?>;
femployee_immigrationdocumentsdelete.lists["x_required"].options = <?php echo JsonEncode($employee_immigrationdocuments_delete->required->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsdelete.lists["x_alert_on_missing"] = <?php echo $employee_immigrationdocuments_delete->alert_on_missing->Lookup->toClientList() ?>;
femployee_immigrationdocumentsdelete.lists["x_alert_on_missing"].options = <?php echo JsonEncode($employee_immigrationdocuments_delete->alert_on_missing->options(FALSE, TRUE)) ?>;
femployee_immigrationdocumentsdelete.lists["x_alert_before_expiry"] = <?php echo $employee_immigrationdocuments_delete->alert_before_expiry->Lookup->toClientList() ?>;
femployee_immigrationdocumentsdelete.lists["x_alert_before_expiry"].options = <?php echo JsonEncode($employee_immigrationdocuments_delete->alert_before_expiry->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_immigrationdocuments_delete->showPageHeader(); ?>
<?php
$employee_immigrationdocuments_delete->showMessage();
?>
<form name="femployee_immigrationdocumentsdelete" id="femployee_immigrationdocumentsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_immigrationdocuments_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_immigrationdocuments_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_immigrationdocuments_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
		<th class="<?php echo $employee_immigrationdocuments->id->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id"><?php echo $employee_immigrationdocuments->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
		<th class="<?php echo $employee_immigrationdocuments->name->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name"><?php echo $employee_immigrationdocuments->name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
		<th class="<?php echo $employee_immigrationdocuments->required->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required"><?php echo $employee_immigrationdocuments->required->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
		<th class="<?php echo $employee_immigrationdocuments->alert_on_missing->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing"><?php echo $employee_immigrationdocuments->alert_on_missing->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
		<th class="<?php echo $employee_immigrationdocuments->alert_before_expiry->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry"><?php echo $employee_immigrationdocuments->alert_before_expiry->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
		<th class="<?php echo $employee_immigrationdocuments->alert_before_day_number->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number"><?php echo $employee_immigrationdocuments->alert_before_day_number->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
		<th class="<?php echo $employee_immigrationdocuments->created->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created"><?php echo $employee_immigrationdocuments->created->caption() ?></span></th>
<?php } ?>
<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
		<th class="<?php echo $employee_immigrationdocuments->updated->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated"><?php echo $employee_immigrationdocuments->updated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_immigrationdocuments_delete->RecCnt = 0;
$i = 0;
while (!$employee_immigrationdocuments_delete->Recordset->EOF) {
	$employee_immigrationdocuments_delete->RecCnt++;
	$employee_immigrationdocuments_delete->RowCnt++;

	// Set row properties
	$employee_immigrationdocuments->resetAttributes();
	$employee_immigrationdocuments->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_immigrationdocuments_delete->loadRowValues($employee_immigrationdocuments_delete->Recordset);

	// Render row
	$employee_immigrationdocuments_delete->renderRow();
?>
	<tr<?php echo $employee_immigrationdocuments->rowAttributes() ?>>
<?php if ($employee_immigrationdocuments->id->Visible) { // id ?>
		<td<?php echo $employee_immigrationdocuments->id->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id">
<span<?php echo $employee_immigrationdocuments->id->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->name->Visible) { // name ?>
		<td<?php echo $employee_immigrationdocuments->name->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name">
<span<?php echo $employee_immigrationdocuments->name->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->required->Visible) { // required ?>
		<td<?php echo $employee_immigrationdocuments->required->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required">
<span<?php echo $employee_immigrationdocuments->required->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->required->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_on_missing->Visible) { // alert_on_missing ?>
		<td<?php echo $employee_immigrationdocuments->alert_on_missing->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing">
<span<?php echo $employee_immigrationdocuments->alert_on_missing->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_on_missing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_expiry->Visible) { // alert_before_expiry ?>
		<td<?php echo $employee_immigrationdocuments->alert_before_expiry->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry">
<span<?php echo $employee_immigrationdocuments->alert_before_expiry->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->alert_before_day_number->Visible) { // alert_before_day_number ?>
		<td<?php echo $employee_immigrationdocuments->alert_before_day_number->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number">
<span<?php echo $employee_immigrationdocuments->alert_before_day_number->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->created->Visible) { // created ?>
		<td<?php echo $employee_immigrationdocuments->created->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created">
<span<?php echo $employee_immigrationdocuments->created->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_immigrationdocuments->updated->Visible) { // updated ?>
		<td<?php echo $employee_immigrationdocuments->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_immigrationdocuments_delete->RowCnt ?>_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated">
<span<?php echo $employee_immigrationdocuments->updated->viewAttributes() ?>>
<?php echo $employee_immigrationdocuments->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_immigrationdocuments_delete->Recordset->moveNext();
}
$employee_immigrationdocuments_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_immigrationdocuments_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_immigrationdocuments_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_immigrationdocuments_delete->terminate();
?>