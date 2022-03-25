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
$hr_trainingsessions_delete = new hr_trainingsessions_delete();

// Run the page
$hr_trainingsessions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_trainingsessions_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_trainingsessionsdelete = currentForm = new ew.Form("fhr_trainingsessionsdelete", "delete");

// Form_CustomValidate event
fhr_trainingsessionsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_trainingsessionsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_trainingsessionsdelete.lists["x_deliveryMethod"] = <?php echo $hr_trainingsessions_delete->deliveryMethod->Lookup->toClientList() ?>;
fhr_trainingsessionsdelete.lists["x_deliveryMethod"].options = <?php echo JsonEncode($hr_trainingsessions_delete->deliveryMethod->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsdelete.lists["x_status"] = <?php echo $hr_trainingsessions_delete->status->Lookup->toClientList() ?>;
fhr_trainingsessionsdelete.lists["x_status"].options = <?php echo JsonEncode($hr_trainingsessions_delete->status->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsdelete.lists["x_attendanceType"] = <?php echo $hr_trainingsessions_delete->attendanceType->Lookup->toClientList() ?>;
fhr_trainingsessionsdelete.lists["x_attendanceType"].options = <?php echo JsonEncode($hr_trainingsessions_delete->attendanceType->options(FALSE, TRUE)) ?>;
fhr_trainingsessionsdelete.lists["x_requireProof"] = <?php echo $hr_trainingsessions_delete->requireProof->Lookup->toClientList() ?>;
fhr_trainingsessionsdelete.lists["x_requireProof"].options = <?php echo JsonEncode($hr_trainingsessions_delete->requireProof->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_trainingsessions_delete->showPageHeader(); ?>
<?php
$hr_trainingsessions_delete->showMessage();
?>
<form name="fhr_trainingsessionsdelete" id="fhr_trainingsessionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_trainingsessions_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_trainingsessions_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_trainingsessions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_trainingsessions->id->Visible) { // id ?>
		<th class="<?php echo $hr_trainingsessions->id->headerCellClass() ?>"><span id="elh_hr_trainingsessions_id" class="hr_trainingsessions_id"><?php echo $hr_trainingsessions->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->course->Visible) { // course ?>
		<th class="<?php echo $hr_trainingsessions->course->headerCellClass() ?>"><span id="elh_hr_trainingsessions_course" class="hr_trainingsessions_course"><?php echo $hr_trainingsessions->course->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
		<th class="<?php echo $hr_trainingsessions->scheduled->headerCellClass() ?>"><span id="elh_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled"><?php echo $hr_trainingsessions->scheduled->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
		<th class="<?php echo $hr_trainingsessions->dueDate->headerCellClass() ?>"><span id="elh_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate"><?php echo $hr_trainingsessions->dueDate->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
		<th class="<?php echo $hr_trainingsessions->deliveryMethod->headerCellClass() ?>"><span id="elh_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod"><?php echo $hr_trainingsessions->deliveryMethod->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
		<th class="<?php echo $hr_trainingsessions->status->headerCellClass() ?>"><span id="elh_hr_trainingsessions_status" class="hr_trainingsessions_status"><?php echo $hr_trainingsessions->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
		<th class="<?php echo $hr_trainingsessions->attendanceType->headerCellClass() ?>"><span id="elh_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType"><?php echo $hr_trainingsessions->attendanceType->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->created->Visible) { // created ?>
		<th class="<?php echo $hr_trainingsessions->created->headerCellClass() ?>"><span id="elh_hr_trainingsessions_created" class="hr_trainingsessions_created"><?php echo $hr_trainingsessions->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
		<th class="<?php echo $hr_trainingsessions->updated->headerCellClass() ?>"><span id="elh_hr_trainingsessions_updated" class="hr_trainingsessions_updated"><?php echo $hr_trainingsessions->updated->caption() ?></span></th>
<?php } ?>
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
		<th class="<?php echo $hr_trainingsessions->requireProof->headerCellClass() ?>"><span id="elh_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof"><?php echo $hr_trainingsessions->requireProof->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_trainingsessions_delete->RecCnt = 0;
$i = 0;
while (!$hr_trainingsessions_delete->Recordset->EOF) {
	$hr_trainingsessions_delete->RecCnt++;
	$hr_trainingsessions_delete->RowCnt++;

	// Set row properties
	$hr_trainingsessions->resetAttributes();
	$hr_trainingsessions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_trainingsessions_delete->loadRowValues($hr_trainingsessions_delete->Recordset);

	// Render row
	$hr_trainingsessions_delete->renderRow();
?>
	<tr<?php echo $hr_trainingsessions->rowAttributes() ?>>
<?php if ($hr_trainingsessions->id->Visible) { // id ?>
		<td<?php echo $hr_trainingsessions->id->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_id" class="hr_trainingsessions_id">
<span<?php echo $hr_trainingsessions->id->viewAttributes() ?>>
<?php echo $hr_trainingsessions->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->course->Visible) { // course ?>
		<td<?php echo $hr_trainingsessions->course->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_course" class="hr_trainingsessions_course">
<span<?php echo $hr_trainingsessions->course->viewAttributes() ?>>
<?php echo $hr_trainingsessions->course->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->scheduled->Visible) { // scheduled ?>
		<td<?php echo $hr_trainingsessions->scheduled->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled">
<span<?php echo $hr_trainingsessions->scheduled->viewAttributes() ?>>
<?php echo $hr_trainingsessions->scheduled->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->dueDate->Visible) { // dueDate ?>
		<td<?php echo $hr_trainingsessions->dueDate->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate">
<span<?php echo $hr_trainingsessions->dueDate->viewAttributes() ?>>
<?php echo $hr_trainingsessions->dueDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->deliveryMethod->Visible) { // deliveryMethod ?>
		<td<?php echo $hr_trainingsessions->deliveryMethod->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod">
<span<?php echo $hr_trainingsessions->deliveryMethod->viewAttributes() ?>>
<?php echo $hr_trainingsessions->deliveryMethod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->status->Visible) { // status ?>
		<td<?php echo $hr_trainingsessions->status->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_status" class="hr_trainingsessions_status">
<span<?php echo $hr_trainingsessions->status->viewAttributes() ?>>
<?php echo $hr_trainingsessions->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->attendanceType->Visible) { // attendanceType ?>
		<td<?php echo $hr_trainingsessions->attendanceType->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType">
<span<?php echo $hr_trainingsessions->attendanceType->viewAttributes() ?>>
<?php echo $hr_trainingsessions->attendanceType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->created->Visible) { // created ?>
		<td<?php echo $hr_trainingsessions->created->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_created" class="hr_trainingsessions_created">
<span<?php echo $hr_trainingsessions->created->viewAttributes() ?>>
<?php echo $hr_trainingsessions->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->updated->Visible) { // updated ?>
		<td<?php echo $hr_trainingsessions->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_updated" class="hr_trainingsessions_updated">
<span<?php echo $hr_trainingsessions->updated->viewAttributes() ?>>
<?php echo $hr_trainingsessions->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_trainingsessions->requireProof->Visible) { // requireProof ?>
		<td<?php echo $hr_trainingsessions->requireProof->cellAttributes() ?>>
<span id="el<?php echo $hr_trainingsessions_delete->RowCnt ?>_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof">
<span<?php echo $hr_trainingsessions->requireProof->viewAttributes() ?>>
<?php echo $hr_trainingsessions->requireProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_trainingsessions_delete->Recordset->moveNext();
}
$hr_trainingsessions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_trainingsessions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_trainingsessions_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_trainingsessions_delete->terminate();
?>