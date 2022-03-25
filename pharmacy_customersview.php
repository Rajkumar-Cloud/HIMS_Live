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
$pharmacy_customers_view = new pharmacy_customers_view();

// Run the page
$pharmacy_customers_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_customers_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_customersview = currentForm = new ew.Form("fpharmacy_customersview", "view");

// Form_CustomValidate event
fpharmacy_customersview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_customersview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_customers_view->ExportOptions->render("body") ?>
<?php $pharmacy_customers_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_customers_view->showPageHeader(); ?>
<?php
$pharmacy_customers_view->showMessage();
?>
<form name="fpharmacy_customersview" id="fpharmacy_customersview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_customers_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_customers_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_customers_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_customers->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customercode"><?php echo $pharmacy_customers->Customercode->caption() ?></span></td>
		<td data-name="Customercode"<?php echo $pharmacy_customers->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Customercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customername"><?php echo $pharmacy_customers->Customername->caption() ?></span></td>
		<td data-name="Customername"<?php echo $pharmacy_customers->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<span<?php echo $pharmacy_customers->Customername->viewAttributes() ?>>
<?php echo $pharmacy_customers->Customername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address1"><?php echo $pharmacy_customers->Address1->caption() ?></span></td>
		<td data-name="Address1"<?php echo $pharmacy_customers->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers->Address1->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address2"><?php echo $pharmacy_customers->Address2->caption() ?></span></td>
		<td data-name="Address2"<?php echo $pharmacy_customers->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers->Address2->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address3"><?php echo $pharmacy_customers->Address3->caption() ?></span></td>
		<td data-name="Address3"<?php echo $pharmacy_customers->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers->Address3->viewAttributes() ?>>
<?php echo $pharmacy_customers->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_State"><?php echo $pharmacy_customers->State->caption() ?></span></td>
		<td data-name="State"<?php echo $pharmacy_customers->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<span<?php echo $pharmacy_customers->State->viewAttributes() ?>>
<?php echo $pharmacy_customers->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Pincode"><?php echo $pharmacy_customers->Pincode->caption() ?></span></td>
		<td data-name="Pincode"<?php echo $pharmacy_customers->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_customers->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Phone"><?php echo $pharmacy_customers->Phone->caption() ?></span></td>
		<td data-name="Phone"<?php echo $pharmacy_customers->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers->Phone->viewAttributes() ?>>
<?php echo $pharmacy_customers->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Fax"><?php echo $pharmacy_customers->Fax->caption() ?></span></td>
		<td data-name="Fax"<?php echo $pharmacy_customers->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers->Fax->viewAttributes() ?>>
<?php echo $pharmacy_customers->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers__Email"><?php echo $pharmacy_customers->_Email->caption() ?></span></td>
		<td data-name="_Email"<?php echo $pharmacy_customers->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<span<?php echo $pharmacy_customers->_Email->viewAttributes() ?>>
<?php echo $pharmacy_customers->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Ratetype->Visible) { // Ratetype ?>
	<tr id="r_Ratetype">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Ratetype"><?php echo $pharmacy_customers->Ratetype->caption() ?></span></td>
		<td data-name="Ratetype"<?php echo $pharmacy_customers->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers->Ratetype->viewAttributes() ?>>
<?php echo $pharmacy_customers->Ratetype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->Creationdate->Visible) { // Creationdate ?>
	<tr id="r_Creationdate">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Creationdate"><?php echo $pharmacy_customers->Creationdate->caption() ?></span></td>
		<td data-name="Creationdate"<?php echo $pharmacy_customers->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers->Creationdate->viewAttributes() ?>>
<?php echo $pharmacy_customers->Creationdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->ContactPerson->Visible) { // ContactPerson ?>
	<tr id="r_ContactPerson">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_ContactPerson"><?php echo $pharmacy_customers->ContactPerson->caption() ?></span></td>
		<td data-name="ContactPerson"<?php echo $pharmacy_customers->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers->ContactPerson->viewAttributes() ?>>
<?php echo $pharmacy_customers->ContactPerson->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->CPPhone->Visible) { // CPPhone ?>
	<tr id="r_CPPhone">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_CPPhone"><?php echo $pharmacy_customers->CPPhone->caption() ?></span></td>
		<td data-name="CPPhone"<?php echo $pharmacy_customers->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers->CPPhone->viewAttributes() ?>>
<?php echo $pharmacy_customers->CPPhone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_id"><?php echo $pharmacy_customers->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_customers->id->cellAttributes() ?>>
<span id="el_pharmacy_customers_id">
<span<?php echo $pharmacy_customers->id->viewAttributes() ?>>
<?php echo $pharmacy_customers->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_customers_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_customers->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_customers_view->terminate();
?>