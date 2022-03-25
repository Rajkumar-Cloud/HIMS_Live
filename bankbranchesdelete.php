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
$bankbranches_delete = new bankbranches_delete();

// Run the page
$bankbranches_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bankbranches_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbankbranchesdelete = currentForm = new ew.Form("fbankbranchesdelete", "delete");

// Form_CustomValidate event
fbankbranchesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbankbranchesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $bankbranches_delete->showPageHeader(); ?>
<?php
$bankbranches_delete->showMessage();
?>
<form name="fbankbranchesdelete" id="fbankbranchesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($bankbranches_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $bankbranches_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bankbranches_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bankbranches->id->Visible) { // id ?>
		<th class="<?php echo $bankbranches->id->headerCellClass() ?>"><span id="elh_bankbranches_id" class="bankbranches_id"><?php echo $bankbranches->id->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
		<th class="<?php echo $bankbranches->Branch_Name->headerCellClass() ?>"><span id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><?php echo $bankbranches->Branch_Name->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
		<th class="<?php echo $bankbranches->Street_Address->headerCellClass() ?>"><span id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><?php echo $bankbranches->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
		<th class="<?php echo $bankbranches->City->headerCellClass() ?>"><span id="elh_bankbranches_City" class="bankbranches_City"><?php echo $bankbranches->City->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
		<th class="<?php echo $bankbranches->State->headerCellClass() ?>"><span id="elh_bankbranches_State" class="bankbranches_State"><?php echo $bankbranches->State->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
		<th class="<?php echo $bankbranches->Zipcode->headerCellClass() ?>"><span id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><?php echo $bankbranches->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
		<th class="<?php echo $bankbranches->Phone_Number->headerCellClass() ?>"><span id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><?php echo $bankbranches->Phone_Number->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
		<th class="<?php echo $bankbranches->AccountNo->headerCellClass() ?>"><span id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><?php echo $bankbranches->AccountNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bankbranches_delete->RecCnt = 0;
$i = 0;
while (!$bankbranches_delete->Recordset->EOF) {
	$bankbranches_delete->RecCnt++;
	$bankbranches_delete->RowCnt++;

	// Set row properties
	$bankbranches->resetAttributes();
	$bankbranches->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bankbranches_delete->loadRowValues($bankbranches_delete->Recordset);

	// Render row
	$bankbranches_delete->renderRow();
?>
	<tr<?php echo $bankbranches->rowAttributes() ?>>
<?php if ($bankbranches->id->Visible) { // id ?>
		<td<?php echo $bankbranches->id->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_id" class="bankbranches_id">
<span<?php echo $bankbranches->id->viewAttributes() ?>>
<?php echo $bankbranches->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->Branch_Name->Visible) { // Branch_Name ?>
		<td<?php echo $bankbranches->Branch_Name->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
<span<?php echo $bankbranches->Branch_Name->viewAttributes() ?>>
<?php echo $bankbranches->Branch_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->Street_Address->Visible) { // Street_Address ?>
		<td<?php echo $bankbranches->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_Street_Address" class="bankbranches_Street_Address">
<span<?php echo $bankbranches->Street_Address->viewAttributes() ?>>
<?php echo $bankbranches->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->City->Visible) { // City ?>
		<td<?php echo $bankbranches->City->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_City" class="bankbranches_City">
<span<?php echo $bankbranches->City->viewAttributes() ?>>
<?php echo $bankbranches->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->State->Visible) { // State ?>
		<td<?php echo $bankbranches->State->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_State" class="bankbranches_State">
<span<?php echo $bankbranches->State->viewAttributes() ?>>
<?php echo $bankbranches->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->Zipcode->Visible) { // Zipcode ?>
		<td<?php echo $bankbranches->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_Zipcode" class="bankbranches_Zipcode">
<span<?php echo $bankbranches->Zipcode->viewAttributes() ?>>
<?php echo $bankbranches->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->Phone_Number->Visible) { // Phone_Number ?>
		<td<?php echo $bankbranches->Phone_Number->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
<span<?php echo $bankbranches->Phone_Number->viewAttributes() ?>>
<?php echo $bankbranches->Phone_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches->AccountNo->Visible) { // AccountNo ?>
		<td<?php echo $bankbranches->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCnt ?>_bankbranches_AccountNo" class="bankbranches_AccountNo">
<span<?php echo $bankbranches->AccountNo->viewAttributes() ?>>
<?php echo $bankbranches->AccountNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bankbranches_delete->Recordset->moveNext();
}
$bankbranches_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bankbranches_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bankbranches_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$bankbranches_delete->terminate();
?>