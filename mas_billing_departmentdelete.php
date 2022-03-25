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
$mas_billing_department_delete = new mas_billing_department_delete();

// Run the page
$mas_billing_department_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_billing_department_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_billing_departmentdelete = currentForm = new ew.Form("fmas_billing_departmentdelete", "delete");

// Form_CustomValidate event
fmas_billing_departmentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_billing_departmentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_billing_department_delete->showPageHeader(); ?>
<?php
$mas_billing_department_delete->showMessage();
?>
<form name="fmas_billing_departmentdelete" id="fmas_billing_departmentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_billing_department_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_billing_department_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_billing_department">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_billing_department_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_billing_department->id->Visible) { // id ?>
		<th class="<?php echo $mas_billing_department->id->headerCellClass() ?>"><span id="elh_mas_billing_department_id" class="mas_billing_department_id"><?php echo $mas_billing_department->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_billing_department->department->Visible) { // department ?>
		<th class="<?php echo $mas_billing_department->department->headerCellClass() ?>"><span id="elh_mas_billing_department_department" class="mas_billing_department_department"><?php echo $mas_billing_department->department->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_billing_department_delete->RecCnt = 0;
$i = 0;
while (!$mas_billing_department_delete->Recordset->EOF) {
	$mas_billing_department_delete->RecCnt++;
	$mas_billing_department_delete->RowCnt++;

	// Set row properties
	$mas_billing_department->resetAttributes();
	$mas_billing_department->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_billing_department_delete->loadRowValues($mas_billing_department_delete->Recordset);

	// Render row
	$mas_billing_department_delete->renderRow();
?>
	<tr<?php echo $mas_billing_department->rowAttributes() ?>>
<?php if ($mas_billing_department->id->Visible) { // id ?>
		<td<?php echo $mas_billing_department->id->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_delete->RowCnt ?>_mas_billing_department_id" class="mas_billing_department_id">
<span<?php echo $mas_billing_department->id->viewAttributes() ?>>
<?php echo $mas_billing_department->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_billing_department->department->Visible) { // department ?>
		<td<?php echo $mas_billing_department->department->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_delete->RowCnt ?>_mas_billing_department_department" class="mas_billing_department_department">
<span<?php echo $mas_billing_department->department->viewAttributes() ?>>
<?php echo $mas_billing_department->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_billing_department_delete->Recordset->moveNext();
}
$mas_billing_department_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_billing_department_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_billing_department_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_billing_department_delete->terminate();
?>