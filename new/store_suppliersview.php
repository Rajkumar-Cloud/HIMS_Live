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
$store_suppliers_view = new store_suppliers_view();

// Run the page
$store_suppliers_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_suppliers_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$store_suppliers_view->isExport()) { ?>
<script>
var fstore_suppliersview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstore_suppliersview = currentForm = new ew.Form("fstore_suppliersview", "view");
	loadjs.done("fstore_suppliersview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_suppliers_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_suppliers_view->ExportOptions->render("body") ?>
<?php $store_suppliers_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_suppliers_view->showPageHeader(); ?>
<?php
$store_suppliers_view->showMessage();
?>
<form name="fstore_suppliersview" id="fstore_suppliersview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="modal" value="<?php echo (int)$store_suppliers_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_suppliers_view->Suppliercode->Visible) { // Suppliercode ?>
	<tr id="r_Suppliercode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliercode"><?php echo $store_suppliers_view->Suppliercode->caption() ?></span></td>
		<td data-name="Suppliercode" <?php echo $store_suppliers_view->Suppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliercode">
<span<?php echo $store_suppliers_view->Suppliercode->viewAttributes() ?>><?php echo $store_suppliers_view->Suppliercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Suppliername->Visible) { // Suppliername ?>
	<tr id="r_Suppliername">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliername"><?php echo $store_suppliers_view->Suppliername->caption() ?></span></td>
		<td data-name="Suppliername" <?php echo $store_suppliers_view->Suppliername->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliername">
<span<?php echo $store_suppliers_view->Suppliername->viewAttributes() ?>><?php echo $store_suppliers_view->Suppliername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Abbreviation->Visible) { // Abbreviation ?>
	<tr id="r_Abbreviation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Abbreviation"><?php echo $store_suppliers_view->Abbreviation->caption() ?></span></td>
		<td data-name="Abbreviation" <?php echo $store_suppliers_view->Abbreviation->cellAttributes() ?>>
<span id="el_store_suppliers_Abbreviation">
<span<?php echo $store_suppliers_view->Abbreviation->viewAttributes() ?>><?php echo $store_suppliers_view->Abbreviation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Creationdate->Visible) { // Creationdate ?>
	<tr id="r_Creationdate">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creationdate"><?php echo $store_suppliers_view->Creationdate->caption() ?></span></td>
		<td data-name="Creationdate" <?php echo $store_suppliers_view->Creationdate->cellAttributes() ?>>
<span id="el_store_suppliers_Creationdate">
<span<?php echo $store_suppliers_view->Creationdate->viewAttributes() ?>><?php echo $store_suppliers_view->Creationdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address1"><?php echo $store_suppliers_view->Address1->caption() ?></span></td>
		<td data-name="Address1" <?php echo $store_suppliers_view->Address1->cellAttributes() ?>>
<span id="el_store_suppliers_Address1">
<span<?php echo $store_suppliers_view->Address1->viewAttributes() ?>><?php echo $store_suppliers_view->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address2"><?php echo $store_suppliers_view->Address2->caption() ?></span></td>
		<td data-name="Address2" <?php echo $store_suppliers_view->Address2->cellAttributes() ?>>
<span id="el_store_suppliers_Address2">
<span<?php echo $store_suppliers_view->Address2->viewAttributes() ?>><?php echo $store_suppliers_view->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address3"><?php echo $store_suppliers_view->Address3->caption() ?></span></td>
		<td data-name="Address3" <?php echo $store_suppliers_view->Address3->cellAttributes() ?>>
<span id="el_store_suppliers_Address3">
<span<?php echo $store_suppliers_view->Address3->viewAttributes() ?>><?php echo $store_suppliers_view->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Citycode->Visible) { // Citycode ?>
	<tr id="r_Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Citycode"><?php echo $store_suppliers_view->Citycode->caption() ?></span></td>
		<td data-name="Citycode" <?php echo $store_suppliers_view->Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_Citycode">
<span<?php echo $store_suppliers_view->Citycode->viewAttributes() ?>><?php echo $store_suppliers_view->Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_State"><?php echo $store_suppliers_view->State->caption() ?></span></td>
		<td data-name="State" <?php echo $store_suppliers_view->State->cellAttributes() ?>>
<span id="el_store_suppliers_State">
<span<?php echo $store_suppliers_view->State->viewAttributes() ?>><?php echo $store_suppliers_view->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Pincode"><?php echo $store_suppliers_view->Pincode->caption() ?></span></td>
		<td data-name="Pincode" <?php echo $store_suppliers_view->Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_Pincode">
<span<?php echo $store_suppliers_view->Pincode->viewAttributes() ?>><?php echo $store_suppliers_view->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Tngstnumber->Visible) { // Tngstnumber ?>
	<tr id="r_Tngstnumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tngstnumber"><?php echo $store_suppliers_view->Tngstnumber->caption() ?></span></td>
		<td data-name="Tngstnumber" <?php echo $store_suppliers_view->Tngstnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tngstnumber">
<span<?php echo $store_suppliers_view->Tngstnumber->viewAttributes() ?>><?php echo $store_suppliers_view->Tngstnumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Phone"><?php echo $store_suppliers_view->Phone->caption() ?></span></td>
		<td data-name="Phone" <?php echo $store_suppliers_view->Phone->cellAttributes() ?>>
<span id="el_store_suppliers_Phone">
<span<?php echo $store_suppliers_view->Phone->viewAttributes() ?>><?php echo $store_suppliers_view->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Fax"><?php echo $store_suppliers_view->Fax->caption() ?></span></td>
		<td data-name="Fax" <?php echo $store_suppliers_view->Fax->cellAttributes() ?>>
<span id="el_store_suppliers_Fax">
<span<?php echo $store_suppliers_view->Fax->viewAttributes() ?>><?php echo $store_suppliers_view->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers__Email"><?php echo $store_suppliers_view->_Email->caption() ?></span></td>
		<td data-name="_Email" <?php echo $store_suppliers_view->_Email->cellAttributes() ?>>
<span id="el_store_suppliers__Email">
<span<?php echo $store_suppliers_view->_Email->viewAttributes() ?>><?php echo $store_suppliers_view->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Paymentmode->Visible) { // Paymentmode ?>
	<tr id="r_Paymentmode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Paymentmode"><?php echo $store_suppliers_view->Paymentmode->caption() ?></span></td>
		<td data-name="Paymentmode" <?php echo $store_suppliers_view->Paymentmode->cellAttributes() ?>>
<span id="el_store_suppliers_Paymentmode">
<span<?php echo $store_suppliers_view->Paymentmode->viewAttributes() ?>><?php echo $store_suppliers_view->Paymentmode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Contactperson1->Visible) { // Contactperson1 ?>
	<tr id="r_Contactperson1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson1"><?php echo $store_suppliers_view->Contactperson1->caption() ?></span></td>
		<td data-name="Contactperson1" <?php echo $store_suppliers_view->Contactperson1->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson1">
<span<?php echo $store_suppliers_view->Contactperson1->viewAttributes() ?>><?php echo $store_suppliers_view->Contactperson1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Address1->Visible) { // CP1Address1 ?>
	<tr id="r_CP1Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address1"><?php echo $store_suppliers_view->CP1Address1->caption() ?></span></td>
		<td data-name="CP1Address1" <?php echo $store_suppliers_view->CP1Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address1">
<span<?php echo $store_suppliers_view->CP1Address1->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Address2->Visible) { // CP1Address2 ?>
	<tr id="r_CP1Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address2"><?php echo $store_suppliers_view->CP1Address2->caption() ?></span></td>
		<td data-name="CP1Address2" <?php echo $store_suppliers_view->CP1Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address2">
<span<?php echo $store_suppliers_view->CP1Address2->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Address3->Visible) { // CP1Address3 ?>
	<tr id="r_CP1Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address3"><?php echo $store_suppliers_view->CP1Address3->caption() ?></span></td>
		<td data-name="CP1Address3" <?php echo $store_suppliers_view->CP1Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address3">
<span<?php echo $store_suppliers_view->CP1Address3->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Citycode->Visible) { // CP1Citycode ?>
	<tr id="r_CP1Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Citycode"><?php echo $store_suppliers_view->CP1Citycode->caption() ?></span></td>
		<td data-name="CP1Citycode" <?php echo $store_suppliers_view->CP1Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Citycode">
<span<?php echo $store_suppliers_view->CP1Citycode->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1State->Visible) { // CP1State ?>
	<tr id="r_CP1State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1State"><?php echo $store_suppliers_view->CP1State->caption() ?></span></td>
		<td data-name="CP1State" <?php echo $store_suppliers_view->CP1State->cellAttributes() ?>>
<span id="el_store_suppliers_CP1State">
<span<?php echo $store_suppliers_view->CP1State->viewAttributes() ?>><?php echo $store_suppliers_view->CP1State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Pincode->Visible) { // CP1Pincode ?>
	<tr id="r_CP1Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Pincode"><?php echo $store_suppliers_view->CP1Pincode->caption() ?></span></td>
		<td data-name="CP1Pincode" <?php echo $store_suppliers_view->CP1Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Pincode">
<span<?php echo $store_suppliers_view->CP1Pincode->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Designation->Visible) { // CP1Designation ?>
	<tr id="r_CP1Designation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Designation"><?php echo $store_suppliers_view->CP1Designation->caption() ?></span></td>
		<td data-name="CP1Designation" <?php echo $store_suppliers_view->CP1Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Designation">
<span<?php echo $store_suppliers_view->CP1Designation->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Phone->Visible) { // CP1Phone ?>
	<tr id="r_CP1Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Phone"><?php echo $store_suppliers_view->CP1Phone->caption() ?></span></td>
		<td data-name="CP1Phone" <?php echo $store_suppliers_view->CP1Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Phone">
<span<?php echo $store_suppliers_view->CP1Phone->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<tr id="r_CP1MobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1MobileNo"><?php echo $store_suppliers_view->CP1MobileNo->caption() ?></span></td>
		<td data-name="CP1MobileNo" <?php echo $store_suppliers_view->CP1MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP1MobileNo">
<span<?php echo $store_suppliers_view->CP1MobileNo->viewAttributes() ?>><?php echo $store_suppliers_view->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Fax->Visible) { // CP1Fax ?>
	<tr id="r_CP1Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Fax"><?php echo $store_suppliers_view->CP1Fax->caption() ?></span></td>
		<td data-name="CP1Fax" <?php echo $store_suppliers_view->CP1Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Fax">
<span<?php echo $store_suppliers_view->CP1Fax->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP1Email->Visible) { // CP1Email ?>
	<tr id="r_CP1Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Email"><?php echo $store_suppliers_view->CP1Email->caption() ?></span></td>
		<td data-name="CP1Email" <?php echo $store_suppliers_view->CP1Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Email">
<span<?php echo $store_suppliers_view->CP1Email->viewAttributes() ?>><?php echo $store_suppliers_view->CP1Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Contactperson2->Visible) { // Contactperson2 ?>
	<tr id="r_Contactperson2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson2"><?php echo $store_suppliers_view->Contactperson2->caption() ?></span></td>
		<td data-name="Contactperson2" <?php echo $store_suppliers_view->Contactperson2->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson2">
<span<?php echo $store_suppliers_view->Contactperson2->viewAttributes() ?>><?php echo $store_suppliers_view->Contactperson2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Address1->Visible) { // CP2Address1 ?>
	<tr id="r_CP2Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address1"><?php echo $store_suppliers_view->CP2Address1->caption() ?></span></td>
		<td data-name="CP2Address1" <?php echo $store_suppliers_view->CP2Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address1">
<span<?php echo $store_suppliers_view->CP2Address1->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Address2->Visible) { // CP2Address2 ?>
	<tr id="r_CP2Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address2"><?php echo $store_suppliers_view->CP2Address2->caption() ?></span></td>
		<td data-name="CP2Address2" <?php echo $store_suppliers_view->CP2Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address2">
<span<?php echo $store_suppliers_view->CP2Address2->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Address3->Visible) { // CP2Address3 ?>
	<tr id="r_CP2Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address3"><?php echo $store_suppliers_view->CP2Address3->caption() ?></span></td>
		<td data-name="CP2Address3" <?php echo $store_suppliers_view->CP2Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address3">
<span<?php echo $store_suppliers_view->CP2Address3->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Citycode->Visible) { // CP2Citycode ?>
	<tr id="r_CP2Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Citycode"><?php echo $store_suppliers_view->CP2Citycode->caption() ?></span></td>
		<td data-name="CP2Citycode" <?php echo $store_suppliers_view->CP2Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Citycode">
<span<?php echo $store_suppliers_view->CP2Citycode->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2State->Visible) { // CP2State ?>
	<tr id="r_CP2State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2State"><?php echo $store_suppliers_view->CP2State->caption() ?></span></td>
		<td data-name="CP2State" <?php echo $store_suppliers_view->CP2State->cellAttributes() ?>>
<span id="el_store_suppliers_CP2State">
<span<?php echo $store_suppliers_view->CP2State->viewAttributes() ?>><?php echo $store_suppliers_view->CP2State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Pincode->Visible) { // CP2Pincode ?>
	<tr id="r_CP2Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Pincode"><?php echo $store_suppliers_view->CP2Pincode->caption() ?></span></td>
		<td data-name="CP2Pincode" <?php echo $store_suppliers_view->CP2Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Pincode">
<span<?php echo $store_suppliers_view->CP2Pincode->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Designation->Visible) { // CP2Designation ?>
	<tr id="r_CP2Designation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Designation"><?php echo $store_suppliers_view->CP2Designation->caption() ?></span></td>
		<td data-name="CP2Designation" <?php echo $store_suppliers_view->CP2Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Designation">
<span<?php echo $store_suppliers_view->CP2Designation->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Phone->Visible) { // CP2Phone ?>
	<tr id="r_CP2Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Phone"><?php echo $store_suppliers_view->CP2Phone->caption() ?></span></td>
		<td data-name="CP2Phone" <?php echo $store_suppliers_view->CP2Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Phone">
<span<?php echo $store_suppliers_view->CP2Phone->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<tr id="r_CP2MobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2MobileNo"><?php echo $store_suppliers_view->CP2MobileNo->caption() ?></span></td>
		<td data-name="CP2MobileNo" <?php echo $store_suppliers_view->CP2MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP2MobileNo">
<span<?php echo $store_suppliers_view->CP2MobileNo->viewAttributes() ?>><?php echo $store_suppliers_view->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Fax->Visible) { // CP2Fax ?>
	<tr id="r_CP2Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Fax"><?php echo $store_suppliers_view->CP2Fax->caption() ?></span></td>
		<td data-name="CP2Fax" <?php echo $store_suppliers_view->CP2Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Fax">
<span<?php echo $store_suppliers_view->CP2Fax->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->CP2Email->Visible) { // CP2Email ?>
	<tr id="r_CP2Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Email"><?php echo $store_suppliers_view->CP2Email->caption() ?></span></td>
		<td data-name="CP2Email" <?php echo $store_suppliers_view->CP2Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Email">
<span<?php echo $store_suppliers_view->CP2Email->viewAttributes() ?>><?php echo $store_suppliers_view->CP2Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Type"><?php echo $store_suppliers_view->Type->caption() ?></span></td>
		<td data-name="Type" <?php echo $store_suppliers_view->Type->cellAttributes() ?>>
<span id="el_store_suppliers_Type">
<span<?php echo $store_suppliers_view->Type->viewAttributes() ?>><?php echo $store_suppliers_view->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Creditterms->Visible) { // Creditterms ?>
	<tr id="r_Creditterms">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creditterms"><?php echo $store_suppliers_view->Creditterms->caption() ?></span></td>
		<td data-name="Creditterms" <?php echo $store_suppliers_view->Creditterms->cellAttributes() ?>>
<span id="el_store_suppliers_Creditterms">
<span<?php echo $store_suppliers_view->Creditterms->viewAttributes() ?>><?php echo $store_suppliers_view->Creditterms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Remarks"><?php echo $store_suppliers_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $store_suppliers_view->Remarks->cellAttributes() ?>>
<span id="el_store_suppliers_Remarks">
<span<?php echo $store_suppliers_view->Remarks->viewAttributes() ?>><?php echo $store_suppliers_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Tinnumber->Visible) { // Tinnumber ?>
	<tr id="r_Tinnumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tinnumber"><?php echo $store_suppliers_view->Tinnumber->caption() ?></span></td>
		<td data-name="Tinnumber" <?php echo $store_suppliers_view->Tinnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tinnumber">
<span<?php echo $store_suppliers_view->Tinnumber->viewAttributes() ?>><?php echo $store_suppliers_view->Tinnumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<tr id="r_Universalsuppliercode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Universalsuppliercode"><?php echo $store_suppliers_view->Universalsuppliercode->caption() ?></span></td>
		<td data-name="Universalsuppliercode" <?php echo $store_suppliers_view->Universalsuppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Universalsuppliercode">
<span<?php echo $store_suppliers_view->Universalsuppliercode->viewAttributes() ?>><?php echo $store_suppliers_view->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->Mobilenumber->Visible) { // Mobilenumber ?>
	<tr id="r_Mobilenumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Mobilenumber"><?php echo $store_suppliers_view->Mobilenumber->caption() ?></span></td>
		<td data-name="Mobilenumber" <?php echo $store_suppliers_view->Mobilenumber->cellAttributes() ?>>
<span id="el_store_suppliers_Mobilenumber">
<span<?php echo $store_suppliers_view->Mobilenumber->viewAttributes() ?>><?php echo $store_suppliers_view->Mobilenumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->PANNumber->Visible) { // PANNumber ?>
	<tr id="r_PANNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_PANNumber"><?php echo $store_suppliers_view->PANNumber->caption() ?></span></td>
		<td data-name="PANNumber" <?php echo $store_suppliers_view->PANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_PANNumber">
<span<?php echo $store_suppliers_view->PANNumber->viewAttributes() ?>><?php echo $store_suppliers_view->PANNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<tr id="r_SalesRepMobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_SalesRepMobileNo"><?php echo $store_suppliers_view->SalesRepMobileNo->caption() ?></span></td>
		<td data-name="SalesRepMobileNo" <?php echo $store_suppliers_view->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_SalesRepMobileNo">
<span<?php echo $store_suppliers_view->SalesRepMobileNo->viewAttributes() ?>><?php echo $store_suppliers_view->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->GSTNumber->Visible) { // GSTNumber ?>
	<tr id="r_GSTNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_GSTNumber"><?php echo $store_suppliers_view->GSTNumber->caption() ?></span></td>
		<td data-name="GSTNumber" <?php echo $store_suppliers_view->GSTNumber->cellAttributes() ?>>
<span id="el_store_suppliers_GSTNumber">
<span<?php echo $store_suppliers_view->GSTNumber->viewAttributes() ?>><?php echo $store_suppliers_view->GSTNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->TANNumber->Visible) { // TANNumber ?>
	<tr id="r_TANNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_TANNumber"><?php echo $store_suppliers_view->TANNumber->caption() ?></span></td>
		<td data-name="TANNumber" <?php echo $store_suppliers_view->TANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_TANNumber">
<span<?php echo $store_suppliers_view->TANNumber->viewAttributes() ?>><?php echo $store_suppliers_view->TANNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_id"><?php echo $store_suppliers_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $store_suppliers_view->id->cellAttributes() ?>>
<span id="el_store_suppliers_id">
<span<?php echo $store_suppliers_view->id->viewAttributes() ?>><?php echo $store_suppliers_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_suppliers_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_suppliers_view->isExport()) { ?>
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
$store_suppliers_view->terminate();
?>