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
$billing_discount_delete = new billing_discount_delete();

// Run the page
$billing_discount_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbilling_discountdelete = currentForm = new ew.Form("fbilling_discountdelete", "delete");

// Form_CustomValidate event
fbilling_discountdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_discountdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_discount_delete->showPageHeader(); ?>
<?php
$billing_discount_delete->showMessage();
?>
<form name="fbilling_discountdelete" id="fbilling_discountdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_discount_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_discount_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_discount_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_discount->id->Visible) { // id ?>
		<th class="<?php echo $billing_discount->id->headerCellClass() ?>"><span id="elh_billing_discount_id" class="billing_discount_id"><?php echo $billing_discount->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
		<th class="<?php echo $billing_discount->Particulars->headerCellClass() ?>"><span id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><?php echo $billing_discount->Particulars->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $billing_discount->Procedure->headerCellClass() ?>"><span id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><?php echo $billing_discount->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
		<th class="<?php echo $billing_discount->Pharmacy->headerCellClass() ?>"><span id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><?php echo $billing_discount->Pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount->Investication->Visible) { // Investication ?>
		<th class="<?php echo $billing_discount->Investication->headerCellClass() ?>"><span id="elh_billing_discount_Investication" class="billing_discount_Investication"><?php echo $billing_discount->Investication->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_discount_delete->RecCnt = 0;
$i = 0;
while (!$billing_discount_delete->Recordset->EOF) {
	$billing_discount_delete->RecCnt++;
	$billing_discount_delete->RowCnt++;

	// Set row properties
	$billing_discount->resetAttributes();
	$billing_discount->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_discount_delete->loadRowValues($billing_discount_delete->Recordset);

	// Render row
	$billing_discount_delete->renderRow();
?>
	<tr<?php echo $billing_discount->rowAttributes() ?>>
<?php if ($billing_discount->id->Visible) { // id ?>
		<td<?php echo $billing_discount->id->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCnt ?>_billing_discount_id" class="billing_discount_id">
<span<?php echo $billing_discount->id->viewAttributes() ?>>
<?php echo $billing_discount->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount->Particulars->Visible) { // Particulars ?>
		<td<?php echo $billing_discount->Particulars->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCnt ?>_billing_discount_Particulars" class="billing_discount_Particulars">
<span<?php echo $billing_discount->Particulars->viewAttributes() ?>>
<?php echo $billing_discount->Particulars->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount->Procedure->Visible) { // Procedure ?>
		<td<?php echo $billing_discount->Procedure->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCnt ?>_billing_discount_Procedure" class="billing_discount_Procedure">
<span<?php echo $billing_discount->Procedure->viewAttributes() ?>>
<?php echo $billing_discount->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount->Pharmacy->Visible) { // Pharmacy ?>
		<td<?php echo $billing_discount->Pharmacy->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCnt ?>_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
<span<?php echo $billing_discount->Pharmacy->viewAttributes() ?>>
<?php echo $billing_discount->Pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount->Investication->Visible) { // Investication ?>
		<td<?php echo $billing_discount->Investication->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCnt ?>_billing_discount_Investication" class="billing_discount_Investication">
<span<?php echo $billing_discount->Investication->viewAttributes() ?>>
<?php echo $billing_discount->Investication->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_discount_delete->Recordset->moveNext();
}
$billing_discount_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_discount_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_discount_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_discount_delete->terminate();
?>