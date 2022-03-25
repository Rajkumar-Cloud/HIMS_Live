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
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_customers_view->isExport()) { ?>
<script>
var fpharmacy_customersview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_customersview = currentForm = new ew.Form("fpharmacy_customersview", "view");
	loadjs.done("fpharmacy_customersview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_customers_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_customers_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_customers_view->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customercode"><?php echo $pharmacy_customers_view->Customercode->caption() ?></span></td>
		<td data-name="Customercode" <?php echo $pharmacy_customers_view->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customercode">
<span<?php echo $pharmacy_customers_view->Customercode->viewAttributes() ?>><?php echo $pharmacy_customers_view->Customercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Customername"><?php echo $pharmacy_customers_view->Customername->caption() ?></span></td>
		<td data-name="Customername" <?php echo $pharmacy_customers_view->Customername->cellAttributes() ?>>
<span id="el_pharmacy_customers_Customername">
<span<?php echo $pharmacy_customers_view->Customername->viewAttributes() ?>><?php echo $pharmacy_customers_view->Customername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address1"><?php echo $pharmacy_customers_view->Address1->caption() ?></span></td>
		<td data-name="Address1" <?php echo $pharmacy_customers_view->Address1->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address1">
<span<?php echo $pharmacy_customers_view->Address1->viewAttributes() ?>><?php echo $pharmacy_customers_view->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address2"><?php echo $pharmacy_customers_view->Address2->caption() ?></span></td>
		<td data-name="Address2" <?php echo $pharmacy_customers_view->Address2->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address2">
<span<?php echo $pharmacy_customers_view->Address2->viewAttributes() ?>><?php echo $pharmacy_customers_view->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Address3"><?php echo $pharmacy_customers_view->Address3->caption() ?></span></td>
		<td data-name="Address3" <?php echo $pharmacy_customers_view->Address3->cellAttributes() ?>>
<span id="el_pharmacy_customers_Address3">
<span<?php echo $pharmacy_customers_view->Address3->viewAttributes() ?>><?php echo $pharmacy_customers_view->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_State"><?php echo $pharmacy_customers_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $pharmacy_customers_view->State->cellAttributes() ?>>
<span id="el_pharmacy_customers_State">
<span<?php echo $pharmacy_customers_view->State->viewAttributes() ?>><?php echo $pharmacy_customers_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Pincode"><?php echo $pharmacy_customers_view->Pincode->caption() ?></span></td>
		<td data-name="Pincode" <?php echo $pharmacy_customers_view->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_customers_Pincode">
<span<?php echo $pharmacy_customers_view->Pincode->viewAttributes() ?>><?php echo $pharmacy_customers_view->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Phone"><?php echo $pharmacy_customers_view->Phone->caption() ?></span></td>
		<td data-name="Phone" <?php echo $pharmacy_customers_view->Phone->cellAttributes() ?>>
<span id="el_pharmacy_customers_Phone">
<span<?php echo $pharmacy_customers_view->Phone->viewAttributes() ?>><?php echo $pharmacy_customers_view->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Fax"><?php echo $pharmacy_customers_view->Fax->caption() ?></span></td>
		<td data-name="Fax" <?php echo $pharmacy_customers_view->Fax->cellAttributes() ?>>
<span id="el_pharmacy_customers_Fax">
<span<?php echo $pharmacy_customers_view->Fax->viewAttributes() ?>><?php echo $pharmacy_customers_view->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers__Email"><?php echo $pharmacy_customers_view->_Email->caption() ?></span></td>
		<td data-name="_Email" <?php echo $pharmacy_customers_view->_Email->cellAttributes() ?>>
<span id="el_pharmacy_customers__Email">
<span<?php echo $pharmacy_customers_view->_Email->viewAttributes() ?>><?php echo $pharmacy_customers_view->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Ratetype->Visible) { // Ratetype ?>
	<tr id="r_Ratetype">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Ratetype"><?php echo $pharmacy_customers_view->Ratetype->caption() ?></span></td>
		<td data-name="Ratetype" <?php echo $pharmacy_customers_view->Ratetype->cellAttributes() ?>>
<span id="el_pharmacy_customers_Ratetype">
<span<?php echo $pharmacy_customers_view->Ratetype->viewAttributes() ?>><?php echo $pharmacy_customers_view->Ratetype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->Creationdate->Visible) { // Creationdate ?>
	<tr id="r_Creationdate">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_Creationdate"><?php echo $pharmacy_customers_view->Creationdate->caption() ?></span></td>
		<td data-name="Creationdate" <?php echo $pharmacy_customers_view->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_customers_Creationdate">
<span<?php echo $pharmacy_customers_view->Creationdate->viewAttributes() ?>><?php echo $pharmacy_customers_view->Creationdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->ContactPerson->Visible) { // ContactPerson ?>
	<tr id="r_ContactPerson">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_ContactPerson"><?php echo $pharmacy_customers_view->ContactPerson->caption() ?></span></td>
		<td data-name="ContactPerson" <?php echo $pharmacy_customers_view->ContactPerson->cellAttributes() ?>>
<span id="el_pharmacy_customers_ContactPerson">
<span<?php echo $pharmacy_customers_view->ContactPerson->viewAttributes() ?>><?php echo $pharmacy_customers_view->ContactPerson->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->CPPhone->Visible) { // CPPhone ?>
	<tr id="r_CPPhone">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_CPPhone"><?php echo $pharmacy_customers_view->CPPhone->caption() ?></span></td>
		<td data-name="CPPhone" <?php echo $pharmacy_customers_view->CPPhone->cellAttributes() ?>>
<span id="el_pharmacy_customers_CPPhone">
<span<?php echo $pharmacy_customers_view->CPPhone->viewAttributes() ?>><?php echo $pharmacy_customers_view->CPPhone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_customers_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_customers_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_customers_id"><?php echo $pharmacy_customers_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_customers_view->id->cellAttributes() ?>>
<span id="el_pharmacy_customers_id">
<span<?php echo $pharmacy_customers_view->id->viewAttributes() ?>><?php echo $pharmacy_customers_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_customers_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_customers_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_customers_view->terminate();
?>