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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_customersdelete = currentForm = new ew.Form("fpharmacy_customersdelete", "delete");

// Form_CustomValidate event
fpharmacy_customersdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_customersdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_customers_delete->showPageHeader(); ?>
<?php
$pharmacy_customers_delete->showMessage();
?>
<form name="fpharmacy_customersdelete" id="fpharmacy_customersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_customers_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_customers_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_customers_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
		<th class="<?php echo $pharmacy_customers->Customercode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><?php echo $pharmacy_customers->Customercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $pharmacy_customers->Address1->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><?php echo $pharmacy_customers->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $pharmacy_customers->Address2->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><?php echo $pharmacy_customers->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $pharmacy_customers->Address3->headerCellClass() ?>"><span id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><?php echo $pharmacy_customers->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_customers->State->headerCellClass() ?>"><span id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><?php echo $pharmacy_customers->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_customers->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><?php echo $pharmacy_customers->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_customers->Phone->headerCellClass() ?>"><span id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><?php echo $pharmacy_customers->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_customers->Fax->headerCellClass() ?>"><span id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><?php echo $pharmacy_customers->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
		<th class="<?php echo $pharmacy_customers->_Email->headerCellClass() ?>"><span id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><?php echo $pharmacy_customers->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
		<th class="<?php echo $pharmacy_customers->Ratetype->headerCellClass() ?>"><span id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><?php echo $pharmacy_customers->Ratetype->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
		<th class="<?php echo $pharmacy_customers->Creationdate->headerCellClass() ?>"><span id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><?php echo $pharmacy_customers->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
		<th class="<?php echo $pharmacy_customers->ContactPerson->headerCellClass() ?>"><span id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><?php echo $pharmacy_customers->ContactPerson->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
		<th class="<?php echo $pharmacy_customers->CPPhone->headerCellClass() ?>"><span id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><?php echo $pharmacy_customers->CPPhone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_customers->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_customers->id->headerCellClass() ?>"><span id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><?php echo $pharmacy_customers->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_customers_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_customers_delete->Recordset->EOF) {
	$pharmacy_customers_delete->RecCnt++;
	$pharmacy_customers_delete->RowCnt++;

	// Set row properties
	$pharmacy_customers->resetAttributes();
	$pharmacy_customers->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_customers_delete->loadRowValues($pharmacy_customers_delete->Recordset);

	// Render row
	$pharmacy_customers_delete->renderRow();
?>
	<tr<?php echo $pharmacy_customers->rowAttributes() ?>>
<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
		<td<?php echo $pharmacy_customers->Customercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Customercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
		<td<?php echo $pharmacy_customers->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Address1" class="pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers->Address1->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
		<td<?php echo $pharmacy_customers->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Address2" class="pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers->Address2->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
		<td<?php echo $pharmacy_customers->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Address3" class="pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers->Address3->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->State->Visible) { // State ?>
		<td<?php echo $pharmacy_customers->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_State" class="pharmacy_customers_State">
<span<?php echo $pharmacy_customers->State->viewAttributes() ?>>
<?php echo $pharmacy_customers->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
		<td<?php echo $pharmacy_customers->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
		<td<?php echo $pharmacy_customers->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Phone" class="pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers->Phone->viewAttributes() ?>>
<?php echo $pharmacy_customers->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
		<td<?php echo $pharmacy_customers->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Fax" class="pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers->Fax->viewAttributes() ?>>
<?php echo $pharmacy_customers->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
		<td<?php echo $pharmacy_customers->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers__Email" class="pharmacy_customers__Email">
<span<?php echo $pharmacy_customers->_Email->viewAttributes() ?>>
<?php echo $pharmacy_customers->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
		<td<?php echo $pharmacy_customers->Ratetype->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers->Ratetype->viewAttributes() ?>>
<?php echo $pharmacy_customers->Ratetype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
		<td<?php echo $pharmacy_customers->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers->Creationdate->viewAttributes() ?>>
<?php echo $pharmacy_customers->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
		<td<?php echo $pharmacy_customers->ContactPerson->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers->ContactPerson->viewAttributes() ?>>
<?php echo $pharmacy_customers->ContactPerson->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
		<td<?php echo $pharmacy_customers->CPPhone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers->CPPhone->viewAttributes() ?>>
<?php echo $pharmacy_customers->CPPhone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_customers->id->Visible) { // id ?>
		<td<?php echo $pharmacy_customers->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_customers_delete->RowCnt ?>_pharmacy_customers_id" class="pharmacy_customers_id">
<span<?php echo $pharmacy_customers->id->viewAttributes() ?>>
<?php echo $pharmacy_customers->id->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_customers_delete->terminate();
?>