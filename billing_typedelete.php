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
$billing_type_delete = new billing_type_delete();

// Run the page
$billing_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_type_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbilling_typedelete = currentForm = new ew.Form("fbilling_typedelete", "delete");

// Form_CustomValidate event
fbilling_typedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_typedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_type_delete->showPageHeader(); ?>
<?php
$billing_type_delete->showMessage();
?>
<form name="fbilling_typedelete" id="fbilling_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_type_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_type_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_type->id->Visible) { // id ?>
		<th class="<?php echo $billing_type->id->headerCellClass() ?>"><span id="elh_billing_type_id" class="billing_type_id"><?php echo $billing_type->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_type->Type->Visible) { // Type ?>
		<th class="<?php echo $billing_type->Type->headerCellClass() ?>"><span id="elh_billing_type_Type" class="billing_type_Type"><?php echo $billing_type->Type->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_type_delete->RecCnt = 0;
$i = 0;
while (!$billing_type_delete->Recordset->EOF) {
	$billing_type_delete->RecCnt++;
	$billing_type_delete->RowCnt++;

	// Set row properties
	$billing_type->resetAttributes();
	$billing_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_type_delete->loadRowValues($billing_type_delete->Recordset);

	// Render row
	$billing_type_delete->renderRow();
?>
	<tr<?php echo $billing_type->rowAttributes() ?>>
<?php if ($billing_type->id->Visible) { // id ?>
		<td<?php echo $billing_type->id->cellAttributes() ?>>
<span id="el<?php echo $billing_type_delete->RowCnt ?>_billing_type_id" class="billing_type_id">
<span<?php echo $billing_type->id->viewAttributes() ?>>
<?php echo $billing_type->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_type->Type->Visible) { // Type ?>
		<td<?php echo $billing_type->Type->cellAttributes() ?>>
<span id="el<?php echo $billing_type_delete->RowCnt ?>_billing_type_Type" class="billing_type_Type">
<span<?php echo $billing_type->Type->viewAttributes() ?>>
<?php echo $billing_type->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_type_delete->Recordset->moveNext();
}
$billing_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_type_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_type_delete->terminate();
?>