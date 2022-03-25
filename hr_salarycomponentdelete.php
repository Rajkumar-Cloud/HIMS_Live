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
$hr_salarycomponent_delete = new hr_salarycomponent_delete();

// Run the page
$hr_salarycomponent_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_salarycomponent_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_salarycomponentdelete = currentForm = new ew.Form("fhr_salarycomponentdelete", "delete");

// Form_CustomValidate event
fhr_salarycomponentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_salarycomponentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_salarycomponent_delete->showPageHeader(); ?>
<?php
$hr_salarycomponent_delete->showMessage();
?>
<form name="fhr_salarycomponentdelete" id="fhr_salarycomponentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_salarycomponent_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_salarycomponent_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_salarycomponent">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_salarycomponent_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_salarycomponent->id->Visible) { // id ?>
		<th class="<?php echo $hr_salarycomponent->id->headerCellClass() ?>"><span id="elh_hr_salarycomponent_id" class="hr_salarycomponent_id"><?php echo $hr_salarycomponent->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponent->name->Visible) { // name ?>
		<th class="<?php echo $hr_salarycomponent->name->headerCellClass() ?>"><span id="elh_hr_salarycomponent_name" class="hr_salarycomponent_name"><?php echo $hr_salarycomponent->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
		<th class="<?php echo $hr_salarycomponent->componentType->headerCellClass() ?>"><span id="elh_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType"><?php echo $hr_salarycomponent->componentType->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponent->details->Visible) { // details ?>
		<th class="<?php echo $hr_salarycomponent->details->headerCellClass() ?>"><span id="elh_hr_salarycomponent_details" class="hr_salarycomponent_details"><?php echo $hr_salarycomponent->details->caption() ?></span></th>
<?php } ?>
<?php if ($hr_salarycomponent->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_salarycomponent->HospID->headerCellClass() ?>"><span id="elh_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID"><?php echo $hr_salarycomponent->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_salarycomponent_delete->RecCnt = 0;
$i = 0;
while (!$hr_salarycomponent_delete->Recordset->EOF) {
	$hr_salarycomponent_delete->RecCnt++;
	$hr_salarycomponent_delete->RowCnt++;

	// Set row properties
	$hr_salarycomponent->resetAttributes();
	$hr_salarycomponent->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_salarycomponent_delete->loadRowValues($hr_salarycomponent_delete->Recordset);

	// Render row
	$hr_salarycomponent_delete->renderRow();
?>
	<tr<?php echo $hr_salarycomponent->rowAttributes() ?>>
<?php if ($hr_salarycomponent->id->Visible) { // id ?>
		<td<?php echo $hr_salarycomponent->id->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_delete->RowCnt ?>_hr_salarycomponent_id" class="hr_salarycomponent_id">
<span<?php echo $hr_salarycomponent->id->viewAttributes() ?>>
<?php echo $hr_salarycomponent->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponent->name->Visible) { // name ?>
		<td<?php echo $hr_salarycomponent->name->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_delete->RowCnt ?>_hr_salarycomponent_name" class="hr_salarycomponent_name">
<span<?php echo $hr_salarycomponent->name->viewAttributes() ?>>
<?php echo $hr_salarycomponent->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponent->componentType->Visible) { // componentType ?>
		<td<?php echo $hr_salarycomponent->componentType->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_delete->RowCnt ?>_hr_salarycomponent_componentType" class="hr_salarycomponent_componentType">
<span<?php echo $hr_salarycomponent->componentType->viewAttributes() ?>>
<?php echo $hr_salarycomponent->componentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponent->details->Visible) { // details ?>
		<td<?php echo $hr_salarycomponent->details->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_delete->RowCnt ?>_hr_salarycomponent_details" class="hr_salarycomponent_details">
<span<?php echo $hr_salarycomponent->details->viewAttributes() ?>>
<?php echo $hr_salarycomponent->details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_salarycomponent->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_salarycomponent->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_salarycomponent_delete->RowCnt ?>_hr_salarycomponent_HospID" class="hr_salarycomponent_HospID">
<span<?php echo $hr_salarycomponent->HospID->viewAttributes() ?>>
<?php echo $hr_salarycomponent->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_salarycomponent_delete->Recordset->moveNext();
}
$hr_salarycomponent_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_salarycomponent_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_salarycomponent_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_salarycomponent_delete->terminate();
?>