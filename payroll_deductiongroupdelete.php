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
$payroll_deductiongroup_delete = new payroll_deductiongroup_delete();

// Run the page
$payroll_deductiongroup_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$payroll_deductiongroup_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpayroll_deductiongroupdelete = currentForm = new ew.Form("fpayroll_deductiongroupdelete", "delete");

// Form_CustomValidate event
fpayroll_deductiongroupdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpayroll_deductiongroupdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $payroll_deductiongroup_delete->showPageHeader(); ?>
<?php
$payroll_deductiongroup_delete->showMessage();
?>
<form name="fpayroll_deductiongroupdelete" id="fpayroll_deductiongroupdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($payroll_deductiongroup_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $payroll_deductiongroup_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="payroll_deductiongroup">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($payroll_deductiongroup_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
		<th class="<?php echo $payroll_deductiongroup->id->headerCellClass() ?>"><span id="elh_payroll_deductiongroup_id" class="payroll_deductiongroup_id"><?php echo $payroll_deductiongroup->id->caption() ?></span></th>
<?php } ?>
<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
		<th class="<?php echo $payroll_deductiongroup->name->headerCellClass() ?>"><span id="elh_payroll_deductiongroup_name" class="payroll_deductiongroup_name"><?php echo $payroll_deductiongroup->name->caption() ?></span></th>
<?php } ?>
<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
		<th class="<?php echo $payroll_deductiongroup->description->headerCellClass() ?>"><span id="elh_payroll_deductiongroup_description" class="payroll_deductiongroup_description"><?php echo $payroll_deductiongroup->description->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$payroll_deductiongroup_delete->RecCnt = 0;
$i = 0;
while (!$payroll_deductiongroup_delete->Recordset->EOF) {
	$payroll_deductiongroup_delete->RecCnt++;
	$payroll_deductiongroup_delete->RowCnt++;

	// Set row properties
	$payroll_deductiongroup->resetAttributes();
	$payroll_deductiongroup->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$payroll_deductiongroup_delete->loadRowValues($payroll_deductiongroup_delete->Recordset);

	// Render row
	$payroll_deductiongroup_delete->renderRow();
?>
	<tr<?php echo $payroll_deductiongroup->rowAttributes() ?>>
<?php if ($payroll_deductiongroup->id->Visible) { // id ?>
		<td<?php echo $payroll_deductiongroup->id->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_delete->RowCnt ?>_payroll_deductiongroup_id" class="payroll_deductiongroup_id">
<span<?php echo $payroll_deductiongroup->id->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($payroll_deductiongroup->name->Visible) { // name ?>
		<td<?php echo $payroll_deductiongroup->name->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_delete->RowCnt ?>_payroll_deductiongroup_name" class="payroll_deductiongroup_name">
<span<?php echo $payroll_deductiongroup->name->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($payroll_deductiongroup->description->Visible) { // description ?>
		<td<?php echo $payroll_deductiongroup->description->cellAttributes() ?>>
<span id="el<?php echo $payroll_deductiongroup_delete->RowCnt ?>_payroll_deductiongroup_description" class="payroll_deductiongroup_description">
<span<?php echo $payroll_deductiongroup->description->viewAttributes() ?>>
<?php echo $payroll_deductiongroup->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$payroll_deductiongroup_delete->Recordset->moveNext();
}
$payroll_deductiongroup_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $payroll_deductiongroup_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$payroll_deductiongroup_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$payroll_deductiongroup_delete->terminate();
?>