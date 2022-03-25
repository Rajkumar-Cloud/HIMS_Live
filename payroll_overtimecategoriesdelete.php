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
$payroll_overtimecategories_delete = new payroll_overtimecategories_delete();

// Run the page
$payroll_overtimecategories_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_overtimecategories_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpayroll_overtimecategoriesdelete = currentForm = new ew.Form("fpayroll_overtimecategoriesdelete", "delete");

// Form_CustomValidate event
fpayroll_overtimecategoriesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_overtimecategoriesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $payroll_overtimecategories_delete->showPageHeader(); ?>
<?php
$payroll_overtimecategories_delete->showMessage();
?>
<form name="fpayroll_overtimecategoriesdelete" id="fpayroll_overtimecategoriesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_overtimecategories_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_overtimecategories_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_overtimecategories">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($payroll_overtimecategories_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
		<th class="<?php echo $payroll_overtimecategories->id->headerCellClass() ?>"><span id="elh_payroll_overtimecategories_id" class="payroll_overtimecategories_id"><?php echo $payroll_overtimecategories->id->caption() ?></span></th>
<?php } ?>
<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
		<th class="<?php echo $payroll_overtimecategories->created->headerCellClass() ?>"><span id="elh_payroll_overtimecategories_created" class="payroll_overtimecategories_created"><?php echo $payroll_overtimecategories->created->caption() ?></span></th>
<?php } ?>
<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
		<th class="<?php echo $payroll_overtimecategories->updated->headerCellClass() ?>"><span id="elh_payroll_overtimecategories_updated" class="payroll_overtimecategories_updated"><?php echo $payroll_overtimecategories->updated->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$payroll_overtimecategories_delete->RecCnt = 0;
$i = 0;
while (!$payroll_overtimecategories_delete->Recordset->EOF) {
	$payroll_overtimecategories_delete->RecCnt++;
	$payroll_overtimecategories_delete->RowCnt++;

	// Set row properties
	$payroll_overtimecategories->resetAttributes();
	$payroll_overtimecategories->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$payroll_overtimecategories_delete->loadRowValues($payroll_overtimecategories_delete->Recordset);

	// Render row
	$payroll_overtimecategories_delete->renderRow();
?>
	<tr<?php echo $payroll_overtimecategories->rowAttributes() ?>>
<?php if ($payroll_overtimecategories->id->Visible) { // id ?>
		<td<?php echo $payroll_overtimecategories->id->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_delete->RowCnt ?>_payroll_overtimecategories_id" class="payroll_overtimecategories_id">
<span<?php echo $payroll_overtimecategories->id->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($payroll_overtimecategories->created->Visible) { // created ?>
		<td<?php echo $payroll_overtimecategories->created->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_delete->RowCnt ?>_payroll_overtimecategories_created" class="payroll_overtimecategories_created">
<span<?php echo $payroll_overtimecategories->created->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($payroll_overtimecategories->updated->Visible) { // updated ?>
		<td<?php echo $payroll_overtimecategories->updated->cellAttributes() ?>>
<span id="el<?php echo $payroll_overtimecategories_delete->RowCnt ?>_payroll_overtimecategories_updated" class="payroll_overtimecategories_updated">
<span<?php echo $payroll_overtimecategories->updated->viewAttributes() ?>>
<?php echo $payroll_overtimecategories->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$payroll_overtimecategories_delete->Recordset->moveNext();
}
$payroll_overtimecategories_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $payroll_overtimecategories_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$payroll_overtimecategories_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$payroll_overtimecategories_delete->terminate();
?>