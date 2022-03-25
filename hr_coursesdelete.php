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
$hr_courses_delete = new hr_courses_delete();

// Run the page
$hr_courses_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_courses_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_coursesdelete = currentForm = new ew.Form("fhr_coursesdelete", "delete");

// Form_CustomValidate event
fhr_coursesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_coursesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_coursesdelete.lists["x_paymentType"] = <?php echo $hr_courses_delete->paymentType->Lookup->toClientList() ?>;
fhr_coursesdelete.lists["x_paymentType"].options = <?php echo JsonEncode($hr_courses_delete->paymentType->options(FALSE, TRUE)) ?>;
fhr_coursesdelete.lists["x_status"] = <?php echo $hr_courses_delete->status->Lookup->toClientList() ?>;
fhr_coursesdelete.lists["x_status"].options = <?php echo JsonEncode($hr_courses_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_courses_delete->showPageHeader(); ?>
<?php
$hr_courses_delete->showMessage();
?>
<form name="fhr_coursesdelete" id="fhr_coursesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_courses_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_courses_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_courses">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_courses_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_courses->id->Visible) { // id ?>
		<th class="<?php echo $hr_courses->id->headerCellClass() ?>"><span id="elh_hr_courses_id" class="hr_courses_id"><?php echo $hr_courses->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
		<th class="<?php echo $hr_courses->coordinator->headerCellClass() ?>"><span id="elh_hr_courses_coordinator" class="hr_courses_coordinator"><?php echo $hr_courses->coordinator->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
		<th class="<?php echo $hr_courses->paymentType->headerCellClass() ?>"><span id="elh_hr_courses_paymentType" class="hr_courses_paymentType"><?php echo $hr_courses->paymentType->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->currency->Visible) { // currency ?>
		<th class="<?php echo $hr_courses->currency->headerCellClass() ?>"><span id="elh_hr_courses_currency" class="hr_courses_currency"><?php echo $hr_courses->currency->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->cost->Visible) { // cost ?>
		<th class="<?php echo $hr_courses->cost->headerCellClass() ?>"><span id="elh_hr_courses_cost" class="hr_courses_cost"><?php echo $hr_courses->cost->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->status->Visible) { // status ?>
		<th class="<?php echo $hr_courses->status->headerCellClass() ?>"><span id="elh_hr_courses_status" class="hr_courses_status"><?php echo $hr_courses->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->created->Visible) { // created ?>
		<th class="<?php echo $hr_courses->created->headerCellClass() ?>"><span id="elh_hr_courses_created" class="hr_courses_created"><?php echo $hr_courses->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_courses->updated->Visible) { // updated ?>
		<th class="<?php echo $hr_courses->updated->headerCellClass() ?>"><span id="elh_hr_courses_updated" class="hr_courses_updated"><?php echo $hr_courses->updated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_courses_delete->RecCnt = 0;
$i = 0;
while (!$hr_courses_delete->Recordset->EOF) {
	$hr_courses_delete->RecCnt++;
	$hr_courses_delete->RowCnt++;

	// Set row properties
	$hr_courses->resetAttributes();
	$hr_courses->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_courses_delete->loadRowValues($hr_courses_delete->Recordset);

	// Render row
	$hr_courses_delete->renderRow();
?>
	<tr<?php echo $hr_courses->rowAttributes() ?>>
<?php if ($hr_courses->id->Visible) { // id ?>
		<td<?php echo $hr_courses->id->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_id" class="hr_courses_id">
<span<?php echo $hr_courses->id->viewAttributes() ?>>
<?php echo $hr_courses->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->coordinator->Visible) { // coordinator ?>
		<td<?php echo $hr_courses->coordinator->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_coordinator" class="hr_courses_coordinator">
<span<?php echo $hr_courses->coordinator->viewAttributes() ?>>
<?php echo $hr_courses->coordinator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->paymentType->Visible) { // paymentType ?>
		<td<?php echo $hr_courses->paymentType->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_paymentType" class="hr_courses_paymentType">
<span<?php echo $hr_courses->paymentType->viewAttributes() ?>>
<?php echo $hr_courses->paymentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->currency->Visible) { // currency ?>
		<td<?php echo $hr_courses->currency->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_currency" class="hr_courses_currency">
<span<?php echo $hr_courses->currency->viewAttributes() ?>>
<?php echo $hr_courses->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->cost->Visible) { // cost ?>
		<td<?php echo $hr_courses->cost->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_cost" class="hr_courses_cost">
<span<?php echo $hr_courses->cost->viewAttributes() ?>>
<?php echo $hr_courses->cost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->status->Visible) { // status ?>
		<td<?php echo $hr_courses->status->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_status" class="hr_courses_status">
<span<?php echo $hr_courses->status->viewAttributes() ?>>
<?php echo $hr_courses->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->created->Visible) { // created ?>
		<td<?php echo $hr_courses->created->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_created" class="hr_courses_created">
<span<?php echo $hr_courses->created->viewAttributes() ?>>
<?php echo $hr_courses->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_courses->updated->Visible) { // updated ?>
		<td<?php echo $hr_courses->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_courses_delete->RowCnt ?>_hr_courses_updated" class="hr_courses_updated">
<span<?php echo $hr_courses->updated->viewAttributes() ?>>
<?php echo $hr_courses->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_courses_delete->Recordset->moveNext();
}
$hr_courses_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_courses_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_courses_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_courses_delete->terminate();
?>