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
<?php include_once "header.php" ?>
<?php if (!$store_suppliers->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_suppliersview = currentForm = new ew.Form("fstore_suppliersview", "view");

// Form_CustomValidate event
fstore_suppliersview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_suppliersview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_suppliers->isExport()) { ?>
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
<?php if ($store_suppliers_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_suppliers_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="modal" value="<?php echo (int)$store_suppliers_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<tr id="r_Suppliercode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliercode"><?php echo $store_suppliers->Suppliercode->caption() ?></span></td>
		<td data-name="Suppliercode"<?php echo $store_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliercode">
<span<?php echo $store_suppliers->Suppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
	<tr id="r_Suppliername">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Suppliername"><?php echo $store_suppliers->Suppliername->caption() ?></span></td>
		<td data-name="Suppliername"<?php echo $store_suppliers->Suppliername->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliername">
<span<?php echo $store_suppliers->Suppliername->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliername->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<tr id="r_Abbreviation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Abbreviation"><?php echo $store_suppliers->Abbreviation->caption() ?></span></td>
		<td data-name="Abbreviation"<?php echo $store_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el_store_suppliers_Abbreviation">
<span<?php echo $store_suppliers->Abbreviation->viewAttributes() ?>>
<?php echo $store_suppliers->Abbreviation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
	<tr id="r_Creationdate">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creationdate"><?php echo $store_suppliers->Creationdate->caption() ?></span></td>
		<td data-name="Creationdate"<?php echo $store_suppliers->Creationdate->cellAttributes() ?>>
<span id="el_store_suppliers_Creationdate">
<span<?php echo $store_suppliers->Creationdate->viewAttributes() ?>>
<?php echo $store_suppliers->Creationdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address1"><?php echo $store_suppliers->Address1->caption() ?></span></td>
		<td data-name="Address1"<?php echo $store_suppliers->Address1->cellAttributes() ?>>
<span id="el_store_suppliers_Address1">
<span<?php echo $store_suppliers->Address1->viewAttributes() ?>>
<?php echo $store_suppliers->Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address2"><?php echo $store_suppliers->Address2->caption() ?></span></td>
		<td data-name="Address2"<?php echo $store_suppliers->Address2->cellAttributes() ?>>
<span id="el_store_suppliers_Address2">
<span<?php echo $store_suppliers->Address2->viewAttributes() ?>>
<?php echo $store_suppliers->Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Address3"><?php echo $store_suppliers->Address3->caption() ?></span></td>
		<td data-name="Address3"<?php echo $store_suppliers->Address3->cellAttributes() ?>>
<span id="el_store_suppliers_Address3">
<span<?php echo $store_suppliers->Address3->viewAttributes() ?>>
<?php echo $store_suppliers->Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
	<tr id="r_Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Citycode"><?php echo $store_suppliers->Citycode->caption() ?></span></td>
		<td data-name="Citycode"<?php echo $store_suppliers->Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_Citycode">
<span<?php echo $store_suppliers->Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_State"><?php echo $store_suppliers->State->caption() ?></span></td>
		<td data-name="State"<?php echo $store_suppliers->State->cellAttributes() ?>>
<span id="el_store_suppliers_State">
<span<?php echo $store_suppliers->State->viewAttributes() ?>>
<?php echo $store_suppliers->State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Pincode"><?php echo $store_suppliers->Pincode->caption() ?></span></td>
		<td data-name="Pincode"<?php echo $store_suppliers->Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_Pincode">
<span<?php echo $store_suppliers->Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<tr id="r_Tngstnumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tngstnumber"><?php echo $store_suppliers->Tngstnumber->caption() ?></span></td>
		<td data-name="Tngstnumber"<?php echo $store_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tngstnumber">
<span<?php echo $store_suppliers->Tngstnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tngstnumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Phone"><?php echo $store_suppliers->Phone->caption() ?></span></td>
		<td data-name="Phone"<?php echo $store_suppliers->Phone->cellAttributes() ?>>
<span id="el_store_suppliers_Phone">
<span<?php echo $store_suppliers->Phone->viewAttributes() ?>>
<?php echo $store_suppliers->Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Fax"><?php echo $store_suppliers->Fax->caption() ?></span></td>
		<td data-name="Fax"<?php echo $store_suppliers->Fax->cellAttributes() ?>>
<span id="el_store_suppliers_Fax">
<span<?php echo $store_suppliers->Fax->viewAttributes() ?>>
<?php echo $store_suppliers->Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers__Email"><?php echo $store_suppliers->_Email->caption() ?></span></td>
		<td data-name="_Email"<?php echo $store_suppliers->_Email->cellAttributes() ?>>
<span id="el_store_suppliers__Email">
<span<?php echo $store_suppliers->_Email->viewAttributes() ?>>
<?php echo $store_suppliers->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<tr id="r_Paymentmode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Paymentmode"><?php echo $store_suppliers->Paymentmode->caption() ?></span></td>
		<td data-name="Paymentmode"<?php echo $store_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el_store_suppliers_Paymentmode">
<span<?php echo $store_suppliers->Paymentmode->viewAttributes() ?>>
<?php echo $store_suppliers->Paymentmode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<tr id="r_Contactperson1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson1"><?php echo $store_suppliers->Contactperson1->caption() ?></span></td>
		<td data-name="Contactperson1"<?php echo $store_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson1">
<span<?php echo $store_suppliers->Contactperson1->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<tr id="r_CP1Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address1"><?php echo $store_suppliers->CP1Address1->caption() ?></span></td>
		<td data-name="CP1Address1"<?php echo $store_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address1">
<span<?php echo $store_suppliers->CP1Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<tr id="r_CP1Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address2"><?php echo $store_suppliers->CP1Address2->caption() ?></span></td>
		<td data-name="CP1Address2"<?php echo $store_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address2">
<span<?php echo $store_suppliers->CP1Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<tr id="r_CP1Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Address3"><?php echo $store_suppliers->CP1Address3->caption() ?></span></td>
		<td data-name="CP1Address3"<?php echo $store_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address3">
<span<?php echo $store_suppliers->CP1Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<tr id="r_CP1Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Citycode"><?php echo $store_suppliers->CP1Citycode->caption() ?></span></td>
		<td data-name="CP1Citycode"<?php echo $store_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Citycode">
<span<?php echo $store_suppliers->CP1Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
	<tr id="r_CP1State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1State"><?php echo $store_suppliers->CP1State->caption() ?></span></td>
		<td data-name="CP1State"<?php echo $store_suppliers->CP1State->cellAttributes() ?>>
<span id="el_store_suppliers_CP1State">
<span<?php echo $store_suppliers->CP1State->viewAttributes() ?>>
<?php echo $store_suppliers->CP1State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<tr id="r_CP1Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Pincode"><?php echo $store_suppliers->CP1Pincode->caption() ?></span></td>
		<td data-name="CP1Pincode"<?php echo $store_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Pincode">
<span<?php echo $store_suppliers->CP1Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<tr id="r_CP1Designation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Designation"><?php echo $store_suppliers->CP1Designation->caption() ?></span></td>
		<td data-name="CP1Designation"<?php echo $store_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Designation">
<span<?php echo $store_suppliers->CP1Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<tr id="r_CP1Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Phone"><?php echo $store_suppliers->CP1Phone->caption() ?></span></td>
		<td data-name="CP1Phone"<?php echo $store_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Phone">
<span<?php echo $store_suppliers->CP1Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<tr id="r_CP1MobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1MobileNo"><?php echo $store_suppliers->CP1MobileNo->caption() ?></span></td>
		<td data-name="CP1MobileNo"<?php echo $store_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP1MobileNo">
<span<?php echo $store_suppliers->CP1MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<tr id="r_CP1Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Fax"><?php echo $store_suppliers->CP1Fax->caption() ?></span></td>
		<td data-name="CP1Fax"<?php echo $store_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Fax">
<span<?php echo $store_suppliers->CP1Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
	<tr id="r_CP1Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP1Email"><?php echo $store_suppliers->CP1Email->caption() ?></span></td>
		<td data-name="CP1Email"<?php echo $store_suppliers->CP1Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Email">
<span<?php echo $store_suppliers->CP1Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<tr id="r_Contactperson2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Contactperson2"><?php echo $store_suppliers->Contactperson2->caption() ?></span></td>
		<td data-name="Contactperson2"<?php echo $store_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson2">
<span<?php echo $store_suppliers->Contactperson2->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<tr id="r_CP2Address1">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address1"><?php echo $store_suppliers->CP2Address1->caption() ?></span></td>
		<td data-name="CP2Address1"<?php echo $store_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address1">
<span<?php echo $store_suppliers->CP2Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<tr id="r_CP2Address2">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address2"><?php echo $store_suppliers->CP2Address2->caption() ?></span></td>
		<td data-name="CP2Address2"<?php echo $store_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address2">
<span<?php echo $store_suppliers->CP2Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<tr id="r_CP2Address3">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Address3"><?php echo $store_suppliers->CP2Address3->caption() ?></span></td>
		<td data-name="CP2Address3"<?php echo $store_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address3">
<span<?php echo $store_suppliers->CP2Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<tr id="r_CP2Citycode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Citycode"><?php echo $store_suppliers->CP2Citycode->caption() ?></span></td>
		<td data-name="CP2Citycode"<?php echo $store_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Citycode">
<span<?php echo $store_suppliers->CP2Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Citycode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
	<tr id="r_CP2State">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2State"><?php echo $store_suppliers->CP2State->caption() ?></span></td>
		<td data-name="CP2State"<?php echo $store_suppliers->CP2State->cellAttributes() ?>>
<span id="el_store_suppliers_CP2State">
<span<?php echo $store_suppliers->CP2State->viewAttributes() ?>>
<?php echo $store_suppliers->CP2State->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<tr id="r_CP2Pincode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Pincode"><?php echo $store_suppliers->CP2Pincode->caption() ?></span></td>
		<td data-name="CP2Pincode"<?php echo $store_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Pincode">
<span<?php echo $store_suppliers->CP2Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Pincode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<tr id="r_CP2Designation">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Designation"><?php echo $store_suppliers->CP2Designation->caption() ?></span></td>
		<td data-name="CP2Designation"<?php echo $store_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Designation">
<span<?php echo $store_suppliers->CP2Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Designation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<tr id="r_CP2Phone">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Phone"><?php echo $store_suppliers->CP2Phone->caption() ?></span></td>
		<td data-name="CP2Phone"<?php echo $store_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Phone">
<span<?php echo $store_suppliers->CP2Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<tr id="r_CP2MobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2MobileNo"><?php echo $store_suppliers->CP2MobileNo->caption() ?></span></td>
		<td data-name="CP2MobileNo"<?php echo $store_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP2MobileNo">
<span<?php echo $store_suppliers->CP2MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<tr id="r_CP2Fax">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Fax"><?php echo $store_suppliers->CP2Fax->caption() ?></span></td>
		<td data-name="CP2Fax"<?php echo $store_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Fax">
<span<?php echo $store_suppliers->CP2Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
	<tr id="r_CP2Email">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_CP2Email"><?php echo $store_suppliers->CP2Email->caption() ?></span></td>
		<td data-name="CP2Email"<?php echo $store_suppliers->CP2Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Email">
<span<?php echo $store_suppliers->CP2Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Type"><?php echo $store_suppliers->Type->caption() ?></span></td>
		<td data-name="Type"<?php echo $store_suppliers->Type->cellAttributes() ?>>
<span id="el_store_suppliers_Type">
<span<?php echo $store_suppliers->Type->viewAttributes() ?>>
<?php echo $store_suppliers->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
	<tr id="r_Creditterms">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Creditterms"><?php echo $store_suppliers->Creditterms->caption() ?></span></td>
		<td data-name="Creditterms"<?php echo $store_suppliers->Creditterms->cellAttributes() ?>>
<span id="el_store_suppliers_Creditterms">
<span<?php echo $store_suppliers->Creditterms->viewAttributes() ?>>
<?php echo $store_suppliers->Creditterms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Remarks"><?php echo $store_suppliers->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $store_suppliers->Remarks->cellAttributes() ?>>
<span id="el_store_suppliers_Remarks">
<span<?php echo $store_suppliers->Remarks->viewAttributes() ?>>
<?php echo $store_suppliers->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<tr id="r_Tinnumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Tinnumber"><?php echo $store_suppliers->Tinnumber->caption() ?></span></td>
		<td data-name="Tinnumber"<?php echo $store_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tinnumber">
<span<?php echo $store_suppliers->Tinnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tinnumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<tr id="r_Universalsuppliercode">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Universalsuppliercode"><?php echo $store_suppliers->Universalsuppliercode->caption() ?></span></td>
		<td data-name="Universalsuppliercode"<?php echo $store_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Universalsuppliercode">
<span<?php echo $store_suppliers->Universalsuppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<tr id="r_Mobilenumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_Mobilenumber"><?php echo $store_suppliers->Mobilenumber->caption() ?></span></td>
		<td data-name="Mobilenumber"<?php echo $store_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el_store_suppliers_Mobilenumber">
<span<?php echo $store_suppliers->Mobilenumber->viewAttributes() ?>>
<?php echo $store_suppliers->Mobilenumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
	<tr id="r_PANNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_PANNumber"><?php echo $store_suppliers->PANNumber->caption() ?></span></td>
		<td data-name="PANNumber"<?php echo $store_suppliers->PANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_PANNumber">
<span<?php echo $store_suppliers->PANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->PANNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<tr id="r_SalesRepMobileNo">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_SalesRepMobileNo"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?></span></td>
		<td data-name="SalesRepMobileNo"<?php echo $store_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_SalesRepMobileNo">
<span<?php echo $store_suppliers->SalesRepMobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<tr id="r_GSTNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_GSTNumber"><?php echo $store_suppliers->GSTNumber->caption() ?></span></td>
		<td data-name="GSTNumber"<?php echo $store_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el_store_suppliers_GSTNumber">
<span<?php echo $store_suppliers->GSTNumber->viewAttributes() ?>>
<?php echo $store_suppliers->GSTNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
	<tr id="r_TANNumber">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_TANNumber"><?php echo $store_suppliers->TANNumber->caption() ?></span></td>
		<td data-name="TANNumber"<?php echo $store_suppliers->TANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_TANNumber">
<span<?php echo $store_suppliers->TANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->TANNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_id"><?php echo $store_suppliers->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_suppliers->id->cellAttributes() ?>>
<span id="el_store_suppliers_id">
<span<?php echo $store_suppliers->id->viewAttributes() ?>>
<?php echo $store_suppliers->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_HospID"><?php echo $store_suppliers->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_suppliers->HospID->cellAttributes() ?>>
<span id="el_store_suppliers_HospID">
<span<?php echo $store_suppliers->HospID->viewAttributes() ?>>
<?php echo $store_suppliers->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
	<tr id="r_BranchID">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_BranchID"><?php echo $store_suppliers->BranchID->caption() ?></span></td>
		<td data-name="BranchID"<?php echo $store_suppliers->BranchID->cellAttributes() ?>>
<span id="el_store_suppliers_BranchID">
<span<?php echo $store_suppliers->BranchID->viewAttributes() ?>>
<?php echo $store_suppliers->BranchID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_suppliers_view->TableLeftColumnClass ?>"><span id="elh_store_suppliers_StoreID"><?php echo $store_suppliers->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_suppliers->StoreID->cellAttributes() ?>>
<span id="el_store_suppliers_StoreID">
<span<?php echo $store_suppliers->StoreID->viewAttributes() ?>>
<?php echo $store_suppliers->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_suppliers_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_suppliers->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_suppliers_view->terminate();
?>