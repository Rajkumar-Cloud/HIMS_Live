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
$pharmacy_customers_delete = new pharmacy_customers_delete();

// Run the page
$pharmacy_customers_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_customersdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_customersdelete = currentForm = new ew.Form("fpharmacy_customersdelete", "delete");
	loadjs.done("fpharmacy_customersdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_customers_delete->showPageHeader(); ?>
<?php
$pharmacy_customers_delete->showMessage();
?>
<form name="fpharmacy_customersdelete" id="fpharmacy_customersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_customers_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_customers_delete->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_customers_delete->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><?php echo $pharmacy_customers_delete->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $pharmacy_customers_delete->Address1->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><?php echo $pharmacy_customers_delete->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $pharmacy_customers_delete->Address2->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><?php echo $pharmacy_customers_delete->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $pharmacy_customers_delete->Address3->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><?php echo $pharmacy_customers_delete->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_customers_delete->State->headerCellClass() ?>"><span id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><?php echo $pharmacy_customers_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_customers_delete->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><?php echo $pharmacy_customers_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_customers_delete->Phone->headerCellClass() ?>"><span id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><?php echo $pharmacy_customers_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_customers_delete->Fax->headerCellClass() ?>"><span id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><?php echo $pharmacy_customers_delete->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->_Email->Visible) { // Email ?>
		<th class="<?php echo $pharmacy_customers_delete->_Email->headerCellClass() ?>"><span id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><?php echo $pharmacy_customers_delete->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Ratetype->Visible) { // Ratetype ?>
		<th class="<?php echo $pharmacy_customers_delete->Ratetype->headerCellClass() ?>"><span id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><?php echo $pharmacy_customers_delete->Ratetype->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->Creationdate->Visible) { // Creationdate ?>
		<th class="<?php echo $pharmacy_customers_delete->Creationdate->headerCellClass() ?>"><span id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><?php echo $pharmacy_customers_delete->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->ContactPerson->Visible) { // ContactPerson ?>
		<th class="<?php echo $pharmacy_customers_delete->ContactPerson->headerCellClass() ?>"><span id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><?php echo $pharmacy_customers_delete->ContactPerson->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->CPPhone->Visible) { // CPPhone ?>
		<th class="<?php echo $pharmacy_customers_delete->CPPhone->headerCellClass() ?>"><span id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><?php echo $pharmacy_customers_delete->CPPhone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_customers_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><?php echo $pharmacy_customers_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_customers_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_customers_delete->Recordset->EOF) {
	$pharmacy_customers_delete->RecordCount++;
	$pharmacy_customers_delete->RowCount++;

	// Set row properties
	$pharmacy_customers->resetAttributes();
	$pharmacy_customers->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_customers_delete->loadRowValues($pharmacy_customers_delete->Recordset);

	// Render row
	$pharmacy_customers_delete->renderRow();
?>
	<tr <?php echo $pharmacy_customers->rowAttributes() ?>>
<?php if ($pharmacy_customers_delete->Customercode->Visible) { // Customercode ?>
		<td <?php echo $pharmacy_customers_delete->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers_delete->Customercode->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address1->Visible) { // Address1 ?>
		<td <?php echo $pharmacy_customers_delete->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers_delete->Address1->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address2->Visible) { // Address2 ?>
		<td <?php echo $pharmacy_customers_delete->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers_delete->Address2->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Address3->Visible) { // Address3 ?>
		<td <?php echo $pharmacy_customers_delete->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers_delete->Address3->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->State->Visible) { // State ?>
		<td <?php echo $pharmacy_customers_delete->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_State" class="pharmacy_customers_State">
<span<?php echo $pharmacy_customers_delete->State->viewAttributes() ?>><?php echo $pharmacy_customers_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $pharmacy_customers_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers_delete->Pincode->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $pharmacy_customers_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers_delete->Phone->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Fax->Visible) { // Fax ?>
		<td <?php echo $pharmacy_customers_delete->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers_delete->Fax->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->_Email->Visible) { // Email ?>
		<td <?php echo $pharmacy_customers_delete->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers__Email" class="pharmacy_customers__Email">
<span<?php echo $pharmacy_customers_delete->_Email->viewAttributes() ?>><?php echo $pharmacy_customers_delete->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Ratetype->Visible) { // Ratetype ?>
		<td <?php echo $pharmacy_customers_delete->Ratetype->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers_delete->Ratetype->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Ratetype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->Creationdate->Visible) { // Creationdate ?>
		<td <?php echo $pharmacy_customers_delete->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers_delete->Creationdate->viewAttributes() ?>><?php echo $pharmacy_customers_delete->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->ContactPerson->Visible) { // ContactPerson ?>
		<td <?php echo $pharmacy_customers_delete->ContactPerson->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers_delete->ContactPerson->viewAttributes() ?>><?php echo $pharmacy_customers_delete->ContactPerson->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->CPPhone->Visible) { // CPPhone ?>
		<td <?php echo $pharmacy_customers_delete->CPPhone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers_delete->CPPhone->viewAttributes() ?>><?php echo $pharmacy_customers_delete->CPPhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_customers_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCount ?>_pharmacy_customers_id" class="pharmacy_customers_id">
<span<?php echo $pharmacy_customers_delete->id->viewAttributes() ?>><?php echo $pharmacy_customers_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_customers_delete->Recordset->moveNext();
}
$pharmacy_customers_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_customers_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_customers_delete->showPageFooter();
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
$pharmacy_customers_delete->terminate();
?>