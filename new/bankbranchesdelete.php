<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fbankbranchesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbankbranchesdelete = currentForm = new ew.Form("fbankbranchesdelete", "delete");
	loadjs.done("fbankbranchesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bankbranches_delete->showPageHeader(); ?>
<?php
$bankbranches_delete->showMessage();
?>
<form name="fbankbranchesdelete" id="fbankbranchesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bankbranches">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bankbranches_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bankbranches_delete->id->Visible) { // id ?>
		<th class="<?php echo $bankbranches_delete->id->headerCellClass() ?>"><span id="elh_bankbranches_id" class="bankbranches_id"><?php echo $bankbranches_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->Branch_Name->Visible) { // Branch_Name ?>
		<th class="<?php echo $bankbranches_delete->Branch_Name->headerCellClass() ?>"><span id="elh_bankbranches_Branch_Name" class="bankbranches_Branch_Name"><?php echo $bankbranches_delete->Branch_Name->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->Street_Address->Visible) { // Street_Address ?>
		<th class="<?php echo $bankbranches_delete->Street_Address->headerCellClass() ?>"><span id="elh_bankbranches_Street_Address" class="bankbranches_Street_Address"><?php echo $bankbranches_delete->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->City->Visible) { // City ?>
		<th class="<?php echo $bankbranches_delete->City->headerCellClass() ?>"><span id="elh_bankbranches_City" class="bankbranches_City"><?php echo $bankbranches_delete->City->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->State->Visible) { // State ?>
		<th class="<?php echo $bankbranches_delete->State->headerCellClass() ?>"><span id="elh_bankbranches_State" class="bankbranches_State"><?php echo $bankbranches_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->Zipcode->Visible) { // Zipcode ?>
		<th class="<?php echo $bankbranches_delete->Zipcode->headerCellClass() ?>"><span id="elh_bankbranches_Zipcode" class="bankbranches_Zipcode"><?php echo $bankbranches_delete->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->Phone_Number->Visible) { // Phone_Number ?>
		<th class="<?php echo $bankbranches_delete->Phone_Number->headerCellClass() ?>"><span id="elh_bankbranches_Phone_Number" class="bankbranches_Phone_Number"><?php echo $bankbranches_delete->Phone_Number->caption() ?></span></th>
<?php } ?>
<?php if ($bankbranches_delete->AccountNo->Visible) { // AccountNo ?>
		<th class="<?php echo $bankbranches_delete->AccountNo->headerCellClass() ?>"><span id="elh_bankbranches_AccountNo" class="bankbranches_AccountNo"><?php echo $bankbranches_delete->AccountNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bankbranches_delete->RecordCount = 0;
$i = 0;
while (!$bankbranches_delete->Recordset->EOF) {
	$bankbranches_delete->RecordCount++;
	$bankbranches_delete->RowCount++;

	// Set row properties
	$bankbranches->resetAttributes();
	$bankbranches->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bankbranches_delete->loadRowValues($bankbranches_delete->Recordset);

	// Render row
	$bankbranches_delete->renderRow();
?>
	<tr <?php echo $bankbranches->rowAttributes() ?>>
<?php if ($bankbranches_delete->id->Visible) { // id ?>
		<td <?php echo $bankbranches_delete->id->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_id" class="bankbranches_id">
<span<?php echo $bankbranches_delete->id->viewAttributes() ?>><?php echo $bankbranches_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->Branch_Name->Visible) { // Branch_Name ?>
		<td <?php echo $bankbranches_delete->Branch_Name->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_Branch_Name" class="bankbranches_Branch_Name">
<span<?php echo $bankbranches_delete->Branch_Name->viewAttributes() ?>><?php echo $bankbranches_delete->Branch_Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->Street_Address->Visible) { // Street_Address ?>
		<td <?php echo $bankbranches_delete->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_Street_Address" class="bankbranches_Street_Address">
<span<?php echo $bankbranches_delete->Street_Address->viewAttributes() ?>><?php echo $bankbranches_delete->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->City->Visible) { // City ?>
		<td <?php echo $bankbranches_delete->City->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_City" class="bankbranches_City">
<span<?php echo $bankbranches_delete->City->viewAttributes() ?>><?php echo $bankbranches_delete->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->State->Visible) { // State ?>
		<td <?php echo $bankbranches_delete->State->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_State" class="bankbranches_State">
<span<?php echo $bankbranches_delete->State->viewAttributes() ?>><?php echo $bankbranches_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->Zipcode->Visible) { // Zipcode ?>
		<td <?php echo $bankbranches_delete->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_Zipcode" class="bankbranches_Zipcode">
<span<?php echo $bankbranches_delete->Zipcode->viewAttributes() ?>><?php echo $bankbranches_delete->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->Phone_Number->Visible) { // Phone_Number ?>
		<td <?php echo $bankbranches_delete->Phone_Number->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_Phone_Number" class="bankbranches_Phone_Number">
<span<?php echo $bankbranches_delete->Phone_Number->viewAttributes() ?>><?php echo $bankbranches_delete->Phone_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bankbranches_delete->AccountNo->Visible) { // AccountNo ?>
		<td <?php echo $bankbranches_delete->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $bankbranches_delete->RowCount ?>_bankbranches_AccountNo" class="bankbranches_AccountNo">
<span<?php echo $bankbranches_delete->AccountNo->viewAttributes() ?>><?php echo $bankbranches_delete->AccountNo->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$bankbranches_delete->terminate();
?>