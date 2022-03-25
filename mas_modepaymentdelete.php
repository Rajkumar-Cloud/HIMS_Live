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
$mas_modepayment_delete = new mas_modepayment_delete();

// Run the page
$mas_modepayment_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_modepayment_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_modepaymentdelete = currentForm = new ew.Form("fmas_modepaymentdelete", "delete");

// Form_CustomValidate event
fmas_modepaymentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_modepaymentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_modepaymentdelete.lists["x_BankingDatails"] = <?php echo $mas_modepayment_delete->BankingDatails->Lookup->toClientList() ?>;
fmas_modepaymentdelete.lists["x_BankingDatails"].options = <?php echo JsonEncode($mas_modepayment_delete->BankingDatails->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_modepayment_delete->showPageHeader(); ?>
<?php
$mas_modepayment_delete->showMessage();
?>
<form name="fmas_modepaymentdelete" id="fmas_modepaymentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_modepayment_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_modepayment_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_modepayment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_modepayment->id->Visible) { // id ?>
		<th class="<?php echo $mas_modepayment->id->headerCellClass() ?>"><span id="elh_mas_modepayment_id" class="mas_modepayment_id"><?php echo $mas_modepayment->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_modepayment->Mode->Visible) { // Mode ?>
		<th class="<?php echo $mas_modepayment->Mode->headerCellClass() ?>"><span id="elh_mas_modepayment_Mode" class="mas_modepayment_Mode"><?php echo $mas_modepayment->Mode->caption() ?></span></th>
<?php } ?>
<?php if ($mas_modepayment->BankingDatails->Visible) { // BankingDatails ?>
		<th class="<?php echo $mas_modepayment->BankingDatails->headerCellClass() ?>"><span id="elh_mas_modepayment_BankingDatails" class="mas_modepayment_BankingDatails"><?php echo $mas_modepayment->BankingDatails->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_modepayment_delete->RecCnt = 0;
$i = 0;
while (!$mas_modepayment_delete->Recordset->EOF) {
	$mas_modepayment_delete->RecCnt++;
	$mas_modepayment_delete->RowCnt++;

	// Set row properties
	$mas_modepayment->resetAttributes();
	$mas_modepayment->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_modepayment_delete->loadRowValues($mas_modepayment_delete->Recordset);

	// Render row
	$mas_modepayment_delete->renderRow();
?>
	<tr<?php echo $mas_modepayment->rowAttributes() ?>>
<?php if ($mas_modepayment->id->Visible) { // id ?>
		<td<?php echo $mas_modepayment->id->cellAttributes() ?>>
<span id="el<?php echo $mas_modepayment_delete->RowCnt ?>_mas_modepayment_id" class="mas_modepayment_id">
<span<?php echo $mas_modepayment->id->viewAttributes() ?>>
<?php echo $mas_modepayment->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_modepayment->Mode->Visible) { // Mode ?>
		<td<?php echo $mas_modepayment->Mode->cellAttributes() ?>>
<span id="el<?php echo $mas_modepayment_delete->RowCnt ?>_mas_modepayment_Mode" class="mas_modepayment_Mode">
<span<?php echo $mas_modepayment->Mode->viewAttributes() ?>>
<?php echo $mas_modepayment->Mode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_modepayment->BankingDatails->Visible) { // BankingDatails ?>
		<td<?php echo $mas_modepayment->BankingDatails->cellAttributes() ?>>
<span id="el<?php echo $mas_modepayment_delete->RowCnt ?>_mas_modepayment_BankingDatails" class="mas_modepayment_BankingDatails">
<span<?php echo $mas_modepayment->BankingDatails->viewAttributes() ?>>
<?php echo $mas_modepayment->BankingDatails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_modepayment_delete->Recordset->moveNext();
}
$mas_modepayment_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_modepayment_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_modepayment_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_modepayment_delete->terminate();
?>