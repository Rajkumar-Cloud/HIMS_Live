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
$hr_expensespaymentmethods_delete = new hr_expensespaymentmethods_delete();

// Run the page
$hr_expensespaymentmethods_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensespaymentmethods_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_expensespaymentmethodsdelete = currentForm = new ew.Form("fhr_expensespaymentmethodsdelete", "delete");

// Form_CustomValidate event
fhr_expensespaymentmethodsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensespaymentmethodsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_expensespaymentmethods_delete->showPageHeader(); ?>
<?php
$hr_expensespaymentmethods_delete->showMessage();
?>
<form name="fhr_expensespaymentmethodsdelete" id="fhr_expensespaymentmethodsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensespaymentmethods_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensespaymentmethods_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensespaymentmethods">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_expensespaymentmethods_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_expensespaymentmethods->id->Visible) { // id ?>
		<th class="<?php echo $hr_expensespaymentmethods->id->headerCellClass() ?>"><span id="elh_hr_expensespaymentmethods_id" class="hr_expensespaymentmethods_id"><?php echo $hr_expensespaymentmethods->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
		<th class="<?php echo $hr_expensespaymentmethods->name->headerCellClass() ?>"><span id="elh_hr_expensespaymentmethods_name" class="hr_expensespaymentmethods_name"><?php echo $hr_expensespaymentmethods->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
		<th class="<?php echo $hr_expensespaymentmethods->created->headerCellClass() ?>"><span id="elh_hr_expensespaymentmethods_created" class="hr_expensespaymentmethods_created"><?php echo $hr_expensespaymentmethods->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
		<th class="<?php echo $hr_expensespaymentmethods->updated->headerCellClass() ?>"><span id="elh_hr_expensespaymentmethods_updated" class="hr_expensespaymentmethods_updated"><?php echo $hr_expensespaymentmethods->updated->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensespaymentmethods->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_expensespaymentmethods->HospID->headerCellClass() ?>"><span id="elh_hr_expensespaymentmethods_HospID" class="hr_expensespaymentmethods_HospID"><?php echo $hr_expensespaymentmethods->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_expensespaymentmethods_delete->RecCnt = 0;
$i = 0;
while (!$hr_expensespaymentmethods_delete->Recordset->EOF) {
	$hr_expensespaymentmethods_delete->RecCnt++;
	$hr_expensespaymentmethods_delete->RowCnt++;

	// Set row properties
	$hr_expensespaymentmethods->resetAttributes();
	$hr_expensespaymentmethods->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_expensespaymentmethods_delete->loadRowValues($hr_expensespaymentmethods_delete->Recordset);

	// Render row
	$hr_expensespaymentmethods_delete->renderRow();
?>
	<tr<?php echo $hr_expensespaymentmethods->rowAttributes() ?>>
<?php if ($hr_expensespaymentmethods->id->Visible) { // id ?>
		<td<?php echo $hr_expensespaymentmethods->id->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_delete->RowCnt ?>_hr_expensespaymentmethods_id" class="hr_expensespaymentmethods_id">
<span<?php echo $hr_expensespaymentmethods->id->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensespaymentmethods->name->Visible) { // name ?>
		<td<?php echo $hr_expensespaymentmethods->name->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_delete->RowCnt ?>_hr_expensespaymentmethods_name" class="hr_expensespaymentmethods_name">
<span<?php echo $hr_expensespaymentmethods->name->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensespaymentmethods->created->Visible) { // created ?>
		<td<?php echo $hr_expensespaymentmethods->created->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_delete->RowCnt ?>_hr_expensespaymentmethods_created" class="hr_expensespaymentmethods_created">
<span<?php echo $hr_expensespaymentmethods->created->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensespaymentmethods->updated->Visible) { // updated ?>
		<td<?php echo $hr_expensespaymentmethods->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_delete->RowCnt ?>_hr_expensespaymentmethods_updated" class="hr_expensespaymentmethods_updated">
<span<?php echo $hr_expensespaymentmethods->updated->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensespaymentmethods->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_expensespaymentmethods->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_expensespaymentmethods_delete->RowCnt ?>_hr_expensespaymentmethods_HospID" class="hr_expensespaymentmethods_HospID">
<span<?php echo $hr_expensespaymentmethods->HospID->viewAttributes() ?>>
<?php echo $hr_expensespaymentmethods->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_expensespaymentmethods_delete->Recordset->moveNext();
}
$hr_expensespaymentmethods_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_expensespaymentmethods_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_expensespaymentmethods_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_expensespaymentmethods_delete->terminate();
?>