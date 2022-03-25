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
$hr_companystructures_delete = new hr_companystructures_delete();

// Run the page
$hr_companystructures_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_companystructures_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_companystructuresdelete = currentForm = new ew.Form("fhr_companystructuresdelete", "delete");

// Form_CustomValidate event
fhr_companystructuresdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_companystructuresdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_companystructuresdelete.lists["x_type"] = <?php echo $hr_companystructures_delete->type->Lookup->toClientList() ?>;
fhr_companystructuresdelete.lists["x_type"].options = <?php echo JsonEncode($hr_companystructures_delete->type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_companystructures_delete->showPageHeader(); ?>
<?php
$hr_companystructures_delete->showMessage();
?>
<form name="fhr_companystructuresdelete" id="fhr_companystructuresdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_companystructures_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_companystructures_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_companystructures">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_companystructures_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_companystructures->id->Visible) { // id ?>
		<th class="<?php echo $hr_companystructures->id->headerCellClass() ?>"><span id="elh_hr_companystructures_id" class="hr_companystructures_id"><?php echo $hr_companystructures->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->title->Visible) { // title ?>
		<th class="<?php echo $hr_companystructures->title->headerCellClass() ?>"><span id="elh_hr_companystructures_title" class="hr_companystructures_title"><?php echo $hr_companystructures->title->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->type->Visible) { // type ?>
		<th class="<?php echo $hr_companystructures->type->headerCellClass() ?>"><span id="elh_hr_companystructures_type" class="hr_companystructures_type"><?php echo $hr_companystructures->type->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->country->Visible) { // country ?>
		<th class="<?php echo $hr_companystructures->country->headerCellClass() ?>"><span id="elh_hr_companystructures_country" class="hr_companystructures_country"><?php echo $hr_companystructures->country->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->parent->Visible) { // parent ?>
		<th class="<?php echo $hr_companystructures->parent->headerCellClass() ?>"><span id="elh_hr_companystructures_parent" class="hr_companystructures_parent"><?php echo $hr_companystructures->parent->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
		<th class="<?php echo $hr_companystructures->timezone->headerCellClass() ?>"><span id="elh_hr_companystructures_timezone" class="hr_companystructures_timezone"><?php echo $hr_companystructures->timezone->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->heads->Visible) { // heads ?>
		<th class="<?php echo $hr_companystructures->heads->headerCellClass() ?>"><span id="elh_hr_companystructures_heads" class="hr_companystructures_heads"><?php echo $hr_companystructures->heads->caption() ?></span></th>
<?php } ?>
<?php if ($hr_companystructures->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_companystructures->HospID->headerCellClass() ?>"><span id="elh_hr_companystructures_HospID" class="hr_companystructures_HospID"><?php echo $hr_companystructures->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_companystructures_delete->RecCnt = 0;
$i = 0;
while (!$hr_companystructures_delete->Recordset->EOF) {
	$hr_companystructures_delete->RecCnt++;
	$hr_companystructures_delete->RowCnt++;

	// Set row properties
	$hr_companystructures->resetAttributes();
	$hr_companystructures->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_companystructures_delete->loadRowValues($hr_companystructures_delete->Recordset);

	// Render row
	$hr_companystructures_delete->renderRow();
?>
	<tr<?php echo $hr_companystructures->rowAttributes() ?>>
<?php if ($hr_companystructures->id->Visible) { // id ?>
		<td<?php echo $hr_companystructures->id->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_id" class="hr_companystructures_id">
<span<?php echo $hr_companystructures->id->viewAttributes() ?>>
<?php echo $hr_companystructures->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->title->Visible) { // title ?>
		<td<?php echo $hr_companystructures->title->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_title" class="hr_companystructures_title">
<span<?php echo $hr_companystructures->title->viewAttributes() ?>>
<?php echo $hr_companystructures->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->type->Visible) { // type ?>
		<td<?php echo $hr_companystructures->type->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_type" class="hr_companystructures_type">
<span<?php echo $hr_companystructures->type->viewAttributes() ?>>
<?php echo $hr_companystructures->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->country->Visible) { // country ?>
		<td<?php echo $hr_companystructures->country->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_country" class="hr_companystructures_country">
<span<?php echo $hr_companystructures->country->viewAttributes() ?>>
<?php echo $hr_companystructures->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->parent->Visible) { // parent ?>
		<td<?php echo $hr_companystructures->parent->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_parent" class="hr_companystructures_parent">
<span<?php echo $hr_companystructures->parent->viewAttributes() ?>>
<?php echo $hr_companystructures->parent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->timezone->Visible) { // timezone ?>
		<td<?php echo $hr_companystructures->timezone->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_timezone" class="hr_companystructures_timezone">
<span<?php echo $hr_companystructures->timezone->viewAttributes() ?>>
<?php echo $hr_companystructures->timezone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->heads->Visible) { // heads ?>
		<td<?php echo $hr_companystructures->heads->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_heads" class="hr_companystructures_heads">
<span<?php echo $hr_companystructures->heads->viewAttributes() ?>>
<?php echo $hr_companystructures->heads->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_companystructures->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_companystructures->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_companystructures_delete->RowCnt ?>_hr_companystructures_HospID" class="hr_companystructures_HospID">
<span<?php echo $hr_companystructures->HospID->viewAttributes() ?>>
<?php echo $hr_companystructures->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_companystructures_delete->Recordset->moveNext();
}
$hr_companystructures_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_companystructures_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_companystructures_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_companystructures_delete->terminate();
?>