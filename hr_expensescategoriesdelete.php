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
$hr_expensescategories_delete = new hr_expensescategories_delete();

// Run the page
$hr_expensescategories_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_expensescategories_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_expensescategoriesdelete = currentForm = new ew.Form("fhr_expensescategoriesdelete", "delete");

// Form_CustomValidate event
fhr_expensescategoriesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_expensescategoriesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_expensescategoriesdelete.lists["x_pre_approve"] = <?php echo $hr_expensescategories_delete->pre_approve->Lookup->toClientList() ?>;
fhr_expensescategoriesdelete.lists["x_pre_approve"].options = <?php echo JsonEncode($hr_expensescategories_delete->pre_approve->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_expensescategories_delete->showPageHeader(); ?>
<?php
$hr_expensescategories_delete->showMessage();
?>
<form name="fhr_expensescategoriesdelete" id="fhr_expensescategoriesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_expensescategories_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_expensescategories_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_expensescategories">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_expensescategories_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_expensescategories->id->Visible) { // id ?>
		<th class="<?php echo $hr_expensescategories->id->headerCellClass() ?>"><span id="elh_hr_expensescategories_id" class="hr_expensescategories_id"><?php echo $hr_expensescategories->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensescategories->name->Visible) { // name ?>
		<th class="<?php echo $hr_expensescategories->name->headerCellClass() ?>"><span id="elh_hr_expensescategories_name" class="hr_expensescategories_name"><?php echo $hr_expensescategories->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensescategories->created->Visible) { // created ?>
		<th class="<?php echo $hr_expensescategories->created->headerCellClass() ?>"><span id="elh_hr_expensescategories_created" class="hr_expensescategories_created"><?php echo $hr_expensescategories->created->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
		<th class="<?php echo $hr_expensescategories->updated->headerCellClass() ?>"><span id="elh_hr_expensescategories_updated" class="hr_expensescategories_updated"><?php echo $hr_expensescategories->updated->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
		<th class="<?php echo $hr_expensescategories->pre_approve->headerCellClass() ?>"><span id="elh_hr_expensescategories_pre_approve" class="hr_expensescategories_pre_approve"><?php echo $hr_expensescategories->pre_approve->caption() ?></span></th>
<?php } ?>
<?php if ($hr_expensescategories->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_expensescategories->HospID->headerCellClass() ?>"><span id="elh_hr_expensescategories_HospID" class="hr_expensescategories_HospID"><?php echo $hr_expensescategories->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_expensescategories_delete->RecCnt = 0;
$i = 0;
while (!$hr_expensescategories_delete->Recordset->EOF) {
	$hr_expensescategories_delete->RecCnt++;
	$hr_expensescategories_delete->RowCnt++;

	// Set row properties
	$hr_expensescategories->resetAttributes();
	$hr_expensescategories->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_expensescategories_delete->loadRowValues($hr_expensescategories_delete->Recordset);

	// Render row
	$hr_expensescategories_delete->renderRow();
?>
	<tr<?php echo $hr_expensescategories->rowAttributes() ?>>
<?php if ($hr_expensescategories->id->Visible) { // id ?>
		<td<?php echo $hr_expensescategories->id->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_id" class="hr_expensescategories_id">
<span<?php echo $hr_expensescategories->id->viewAttributes() ?>>
<?php echo $hr_expensescategories->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensescategories->name->Visible) { // name ?>
		<td<?php echo $hr_expensescategories->name->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_name" class="hr_expensescategories_name">
<span<?php echo $hr_expensescategories->name->viewAttributes() ?>>
<?php echo $hr_expensescategories->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensescategories->created->Visible) { // created ?>
		<td<?php echo $hr_expensescategories->created->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_created" class="hr_expensescategories_created">
<span<?php echo $hr_expensescategories->created->viewAttributes() ?>>
<?php echo $hr_expensescategories->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensescategories->updated->Visible) { // updated ?>
		<td<?php echo $hr_expensescategories->updated->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_updated" class="hr_expensescategories_updated">
<span<?php echo $hr_expensescategories->updated->viewAttributes() ?>>
<?php echo $hr_expensescategories->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensescategories->pre_approve->Visible) { // pre_approve ?>
		<td<?php echo $hr_expensescategories->pre_approve->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_pre_approve" class="hr_expensescategories_pre_approve">
<span<?php echo $hr_expensescategories->pre_approve->viewAttributes() ?>>
<?php echo $hr_expensescategories->pre_approve->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_expensescategories->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_expensescategories->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_expensescategories_delete->RowCnt ?>_hr_expensescategories_HospID" class="hr_expensescategories_HospID">
<span<?php echo $hr_expensescategories->HospID->viewAttributes() ?>>
<?php echo $hr_expensescategories->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_expensescategories_delete->Recordset->moveNext();
}
$hr_expensescategories_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_expensescategories_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_expensescategories_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_expensescategories_delete->terminate();
?>