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
$store_suppliers_delete = new store_suppliers_delete();

// Run the page
$store_suppliers_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_suppliers_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fstore_suppliersdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstore_suppliersdelete = currentForm = new ew.Form("fstore_suppliersdelete", "delete");
	loadjs.done("fstore_suppliersdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_suppliers_delete->showPageHeader(); ?>
<?php
$store_suppliers_delete->showMessage();
?>
<form name="fstore_suppliersdelete" id="fstore_suppliersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_suppliers_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_suppliers_delete->Suppliercode->Visible) { // Suppliercode ?>
		<th class="<?php echo $store_suppliers_delete->Suppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode"><?php echo $store_suppliers_delete->Suppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Suppliername->Visible) { // Suppliername ?>
		<th class="<?php echo $store_suppliers_delete->Suppliername->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliername" class="store_suppliers_Suppliername"><?php echo $store_suppliers_delete->Suppliername->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Abbreviation->Visible) { // Abbreviation ?>
		<th class="<?php echo $store_suppliers_delete->Abbreviation->headerCellClass() ?>"><span id="elh_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation"><?php echo $store_suppliers_delete->Abbreviation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Creationdate->Visible) { // Creationdate ?>
		<th class="<?php echo $store_suppliers_delete->Creationdate->headerCellClass() ?>"><span id="elh_store_suppliers_Creationdate" class="store_suppliers_Creationdate"><?php echo $store_suppliers_delete->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $store_suppliers_delete->Address1->headerCellClass() ?>"><span id="elh_store_suppliers_Address1" class="store_suppliers_Address1"><?php echo $store_suppliers_delete->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $store_suppliers_delete->Address2->headerCellClass() ?>"><span id="elh_store_suppliers_Address2" class="store_suppliers_Address2"><?php echo $store_suppliers_delete->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $store_suppliers_delete->Address3->headerCellClass() ?>"><span id="elh_store_suppliers_Address3" class="store_suppliers_Address3"><?php echo $store_suppliers_delete->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Citycode->Visible) { // Citycode ?>
		<th class="<?php echo $store_suppliers_delete->Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_Citycode" class="store_suppliers_Citycode"><?php echo $store_suppliers_delete->Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->State->Visible) { // State ?>
		<th class="<?php echo $store_suppliers_delete->State->headerCellClass() ?>"><span id="elh_store_suppliers_State" class="store_suppliers_State"><?php echo $store_suppliers_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $store_suppliers_delete->Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_Pincode" class="store_suppliers_Pincode"><?php echo $store_suppliers_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Tngstnumber->Visible) { // Tngstnumber ?>
		<th class="<?php echo $store_suppliers_delete->Tngstnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber"><?php echo $store_suppliers_delete->Tngstnumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $store_suppliers_delete->Phone->headerCellClass() ?>"><span id="elh_store_suppliers_Phone" class="store_suppliers_Phone"><?php echo $store_suppliers_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Fax->Visible) { // Fax ?>
		<th class="<?php echo $store_suppliers_delete->Fax->headerCellClass() ?>"><span id="elh_store_suppliers_Fax" class="store_suppliers_Fax"><?php echo $store_suppliers_delete->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->_Email->Visible) { // Email ?>
		<th class="<?php echo $store_suppliers_delete->_Email->headerCellClass() ?>"><span id="elh_store_suppliers__Email" class="store_suppliers__Email"><?php echo $store_suppliers_delete->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Paymentmode->Visible) { // Paymentmode ?>
		<th class="<?php echo $store_suppliers_delete->Paymentmode->headerCellClass() ?>"><span id="elh_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode"><?php echo $store_suppliers_delete->Paymentmode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Contactperson1->Visible) { // Contactperson1 ?>
		<th class="<?php echo $store_suppliers_delete->Contactperson1->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1"><?php echo $store_suppliers_delete->Contactperson1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address1->Visible) { // CP1Address1 ?>
		<th class="<?php echo $store_suppliers_delete->CP1Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1"><?php echo $store_suppliers_delete->CP1Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address2->Visible) { // CP1Address2 ?>
		<th class="<?php echo $store_suppliers_delete->CP1Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2"><?php echo $store_suppliers_delete->CP1Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address3->Visible) { // CP1Address3 ?>
		<th class="<?php echo $store_suppliers_delete->CP1Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3"><?php echo $store_suppliers_delete->CP1Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Citycode->Visible) { // CP1Citycode ?>
		<th class="<?php echo $store_suppliers_delete->CP1Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode"><?php echo $store_suppliers_delete->CP1Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1State->Visible) { // CP1State ?>
		<th class="<?php echo $store_suppliers_delete->CP1State->headerCellClass() ?>"><span id="elh_store_suppliers_CP1State" class="store_suppliers_CP1State"><?php echo $store_suppliers_delete->CP1State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Pincode->Visible) { // CP1Pincode ?>
		<th class="<?php echo $store_suppliers_delete->CP1Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode"><?php echo $store_suppliers_delete->CP1Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Designation->Visible) { // CP1Designation ?>
		<th class="<?php echo $store_suppliers_delete->CP1Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation"><?php echo $store_suppliers_delete->CP1Designation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Phone->Visible) { // CP1Phone ?>
		<th class="<?php echo $store_suppliers_delete->CP1Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone"><?php echo $store_suppliers_delete->CP1Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<th class="<?php echo $store_suppliers_delete->CP1MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo"><?php echo $store_suppliers_delete->CP1MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Fax->Visible) { // CP1Fax ?>
		<th class="<?php echo $store_suppliers_delete->CP1Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax"><?php echo $store_suppliers_delete->CP1Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Email->Visible) { // CP1Email ?>
		<th class="<?php echo $store_suppliers_delete->CP1Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Email" class="store_suppliers_CP1Email"><?php echo $store_suppliers_delete->CP1Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Contactperson2->Visible) { // Contactperson2 ?>
		<th class="<?php echo $store_suppliers_delete->Contactperson2->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2"><?php echo $store_suppliers_delete->Contactperson2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address1->Visible) { // CP2Address1 ?>
		<th class="<?php echo $store_suppliers_delete->CP2Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1"><?php echo $store_suppliers_delete->CP2Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address2->Visible) { // CP2Address2 ?>
		<th class="<?php echo $store_suppliers_delete->CP2Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2"><?php echo $store_suppliers_delete->CP2Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address3->Visible) { // CP2Address3 ?>
		<th class="<?php echo $store_suppliers_delete->CP2Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3"><?php echo $store_suppliers_delete->CP2Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Citycode->Visible) { // CP2Citycode ?>
		<th class="<?php echo $store_suppliers_delete->CP2Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode"><?php echo $store_suppliers_delete->CP2Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2State->Visible) { // CP2State ?>
		<th class="<?php echo $store_suppliers_delete->CP2State->headerCellClass() ?>"><span id="elh_store_suppliers_CP2State" class="store_suppliers_CP2State"><?php echo $store_suppliers_delete->CP2State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Pincode->Visible) { // CP2Pincode ?>
		<th class="<?php echo $store_suppliers_delete->CP2Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode"><?php echo $store_suppliers_delete->CP2Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Designation->Visible) { // CP2Designation ?>
		<th class="<?php echo $store_suppliers_delete->CP2Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation"><?php echo $store_suppliers_delete->CP2Designation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Phone->Visible) { // CP2Phone ?>
		<th class="<?php echo $store_suppliers_delete->CP2Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone"><?php echo $store_suppliers_delete->CP2Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<th class="<?php echo $store_suppliers_delete->CP2MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo"><?php echo $store_suppliers_delete->CP2MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Fax->Visible) { // CP2Fax ?>
		<th class="<?php echo $store_suppliers_delete->CP2Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax"><?php echo $store_suppliers_delete->CP2Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Email->Visible) { // CP2Email ?>
		<th class="<?php echo $store_suppliers_delete->CP2Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Email" class="store_suppliers_CP2Email"><?php echo $store_suppliers_delete->CP2Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $store_suppliers_delete->Type->headerCellClass() ?>"><span id="elh_store_suppliers_Type" class="store_suppliers_Type"><?php echo $store_suppliers_delete->Type->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Creditterms->Visible) { // Creditterms ?>
		<th class="<?php echo $store_suppliers_delete->Creditterms->headerCellClass() ?>"><span id="elh_store_suppliers_Creditterms" class="store_suppliers_Creditterms"><?php echo $store_suppliers_delete->Creditterms->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $store_suppliers_delete->Remarks->headerCellClass() ?>"><span id="elh_store_suppliers_Remarks" class="store_suppliers_Remarks"><?php echo $store_suppliers_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Tinnumber->Visible) { // Tinnumber ?>
		<th class="<?php echo $store_suppliers_delete->Tinnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber"><?php echo $store_suppliers_delete->Tinnumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<th class="<?php echo $store_suppliers_delete->Universalsuppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode"><?php echo $store_suppliers_delete->Universalsuppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->Mobilenumber->Visible) { // Mobilenumber ?>
		<th class="<?php echo $store_suppliers_delete->Mobilenumber->headerCellClass() ?>"><span id="elh_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber"><?php echo $store_suppliers_delete->Mobilenumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->PANNumber->Visible) { // PANNumber ?>
		<th class="<?php echo $store_suppliers_delete->PANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_PANNumber" class="store_suppliers_PANNumber"><?php echo $store_suppliers_delete->PANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<th class="<?php echo $store_suppliers_delete->SalesRepMobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo"><?php echo $store_suppliers_delete->SalesRepMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->GSTNumber->Visible) { // GSTNumber ?>
		<th class="<?php echo $store_suppliers_delete->GSTNumber->headerCellClass() ?>"><span id="elh_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber"><?php echo $store_suppliers_delete->GSTNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->TANNumber->Visible) { // TANNumber ?>
		<th class="<?php echo $store_suppliers_delete->TANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_TANNumber" class="store_suppliers_TANNumber"><?php echo $store_suppliers_delete->TANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers_delete->id->Visible) { // id ?>
		<th class="<?php echo $store_suppliers_delete->id->headerCellClass() ?>"><span id="elh_store_suppliers_id" class="store_suppliers_id"><?php echo $store_suppliers_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_suppliers_delete->RecordCount = 0;
$i = 0;
while (!$store_suppliers_delete->Recordset->EOF) {
	$store_suppliers_delete->RecordCount++;
	$store_suppliers_delete->RowCount++;

	// Set row properties
	$store_suppliers->resetAttributes();
	$store_suppliers->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_suppliers_delete->loadRowValues($store_suppliers_delete->Recordset);

	// Render row
	$store_suppliers_delete->renderRow();
?>
	<tr <?php echo $store_suppliers->rowAttributes() ?>>
<?php if ($store_suppliers_delete->Suppliercode->Visible) { // Suppliercode ?>
		<td <?php echo $store_suppliers_delete->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode">
<span<?php echo $store_suppliers_delete->Suppliercode->viewAttributes() ?>><?php echo $store_suppliers_delete->Suppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Suppliername->Visible) { // Suppliername ?>
		<td <?php echo $store_suppliers_delete->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Suppliername" class="store_suppliers_Suppliername">
<span<?php echo $store_suppliers_delete->Suppliername->viewAttributes() ?>><?php echo $store_suppliers_delete->Suppliername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Abbreviation->Visible) { // Abbreviation ?>
		<td <?php echo $store_suppliers_delete->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation">
<span<?php echo $store_suppliers_delete->Abbreviation->viewAttributes() ?>><?php echo $store_suppliers_delete->Abbreviation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Creationdate->Visible) { // Creationdate ?>
		<td <?php echo $store_suppliers_delete->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Creationdate" class="store_suppliers_Creationdate">
<span<?php echo $store_suppliers_delete->Creationdate->viewAttributes() ?>><?php echo $store_suppliers_delete->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Address1->Visible) { // Address1 ?>
		<td <?php echo $store_suppliers_delete->Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Address1" class="store_suppliers_Address1">
<span<?php echo $store_suppliers_delete->Address1->viewAttributes() ?>><?php echo $store_suppliers_delete->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Address2->Visible) { // Address2 ?>
		<td <?php echo $store_suppliers_delete->Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Address2" class="store_suppliers_Address2">
<span<?php echo $store_suppliers_delete->Address2->viewAttributes() ?>><?php echo $store_suppliers_delete->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Address3->Visible) { // Address3 ?>
		<td <?php echo $store_suppliers_delete->Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Address3" class="store_suppliers_Address3">
<span<?php echo $store_suppliers_delete->Address3->viewAttributes() ?>><?php echo $store_suppliers_delete->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Citycode->Visible) { // Citycode ?>
		<td <?php echo $store_suppliers_delete->Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Citycode" class="store_suppliers_Citycode">
<span<?php echo $store_suppliers_delete->Citycode->viewAttributes() ?>><?php echo $store_suppliers_delete->Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->State->Visible) { // State ?>
		<td <?php echo $store_suppliers_delete->State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_State" class="store_suppliers_State">
<span<?php echo $store_suppliers_delete->State->viewAttributes() ?>><?php echo $store_suppliers_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $store_suppliers_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Pincode" class="store_suppliers_Pincode">
<span<?php echo $store_suppliers_delete->Pincode->viewAttributes() ?>><?php echo $store_suppliers_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Tngstnumber->Visible) { // Tngstnumber ?>
		<td <?php echo $store_suppliers_delete->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber">
<span<?php echo $store_suppliers_delete->Tngstnumber->viewAttributes() ?>><?php echo $store_suppliers_delete->Tngstnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $store_suppliers_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Phone" class="store_suppliers_Phone">
<span<?php echo $store_suppliers_delete->Phone->viewAttributes() ?>><?php echo $store_suppliers_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Fax->Visible) { // Fax ?>
		<td <?php echo $store_suppliers_delete->Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Fax" class="store_suppliers_Fax">
<span<?php echo $store_suppliers_delete->Fax->viewAttributes() ?>><?php echo $store_suppliers_delete->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->_Email->Visible) { // Email ?>
		<td <?php echo $store_suppliers_delete->_Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers__Email" class="store_suppliers__Email">
<span<?php echo $store_suppliers_delete->_Email->viewAttributes() ?>><?php echo $store_suppliers_delete->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Paymentmode->Visible) { // Paymentmode ?>
		<td <?php echo $store_suppliers_delete->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode">
<span<?php echo $store_suppliers_delete->Paymentmode->viewAttributes() ?>><?php echo $store_suppliers_delete->Paymentmode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Contactperson1->Visible) { // Contactperson1 ?>
		<td <?php echo $store_suppliers_delete->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1">
<span<?php echo $store_suppliers_delete->Contactperson1->viewAttributes() ?>><?php echo $store_suppliers_delete->Contactperson1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address1->Visible) { // CP1Address1 ?>
		<td <?php echo $store_suppliers_delete->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1">
<span<?php echo $store_suppliers_delete->CP1Address1->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address2->Visible) { // CP1Address2 ?>
		<td <?php echo $store_suppliers_delete->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2">
<span<?php echo $store_suppliers_delete->CP1Address2->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Address3->Visible) { // CP1Address3 ?>
		<td <?php echo $store_suppliers_delete->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3">
<span<?php echo $store_suppliers_delete->CP1Address3->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Citycode->Visible) { // CP1Citycode ?>
		<td <?php echo $store_suppliers_delete->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode">
<span<?php echo $store_suppliers_delete->CP1Citycode->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1State->Visible) { // CP1State ?>
		<td <?php echo $store_suppliers_delete->CP1State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1State" class="store_suppliers_CP1State">
<span<?php echo $store_suppliers_delete->CP1State->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Pincode->Visible) { // CP1Pincode ?>
		<td <?php echo $store_suppliers_delete->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode">
<span<?php echo $store_suppliers_delete->CP1Pincode->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Designation->Visible) { // CP1Designation ?>
		<td <?php echo $store_suppliers_delete->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation">
<span<?php echo $store_suppliers_delete->CP1Designation->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Phone->Visible) { // CP1Phone ?>
		<td <?php echo $store_suppliers_delete->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone">
<span<?php echo $store_suppliers_delete->CP1Phone->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td <?php echo $store_suppliers_delete->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo">
<span<?php echo $store_suppliers_delete->CP1MobileNo->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Fax->Visible) { // CP1Fax ?>
		<td <?php echo $store_suppliers_delete->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax">
<span<?php echo $store_suppliers_delete->CP1Fax->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP1Email->Visible) { // CP1Email ?>
		<td <?php echo $store_suppliers_delete->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP1Email" class="store_suppliers_CP1Email">
<span<?php echo $store_suppliers_delete->CP1Email->viewAttributes() ?>><?php echo $store_suppliers_delete->CP1Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Contactperson2->Visible) { // Contactperson2 ?>
		<td <?php echo $store_suppliers_delete->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2">
<span<?php echo $store_suppliers_delete->Contactperson2->viewAttributes() ?>><?php echo $store_suppliers_delete->Contactperson2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address1->Visible) { // CP2Address1 ?>
		<td <?php echo $store_suppliers_delete->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1">
<span<?php echo $store_suppliers_delete->CP2Address1->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address2->Visible) { // CP2Address2 ?>
		<td <?php echo $store_suppliers_delete->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2">
<span<?php echo $store_suppliers_delete->CP2Address2->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Address3->Visible) { // CP2Address3 ?>
		<td <?php echo $store_suppliers_delete->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3">
<span<?php echo $store_suppliers_delete->CP2Address3->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Citycode->Visible) { // CP2Citycode ?>
		<td <?php echo $store_suppliers_delete->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode">
<span<?php echo $store_suppliers_delete->CP2Citycode->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2State->Visible) { // CP2State ?>
		<td <?php echo $store_suppliers_delete->CP2State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2State" class="store_suppliers_CP2State">
<span<?php echo $store_suppliers_delete->CP2State->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Pincode->Visible) { // CP2Pincode ?>
		<td <?php echo $store_suppliers_delete->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode">
<span<?php echo $store_suppliers_delete->CP2Pincode->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Designation->Visible) { // CP2Designation ?>
		<td <?php echo $store_suppliers_delete->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation">
<span<?php echo $store_suppliers_delete->CP2Designation->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Phone->Visible) { // CP2Phone ?>
		<td <?php echo $store_suppliers_delete->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone">
<span<?php echo $store_suppliers_delete->CP2Phone->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td <?php echo $store_suppliers_delete->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo">
<span<?php echo $store_suppliers_delete->CP2MobileNo->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Fax->Visible) { // CP2Fax ?>
		<td <?php echo $store_suppliers_delete->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax">
<span<?php echo $store_suppliers_delete->CP2Fax->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->CP2Email->Visible) { // CP2Email ?>
		<td <?php echo $store_suppliers_delete->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_CP2Email" class="store_suppliers_CP2Email">
<span<?php echo $store_suppliers_delete->CP2Email->viewAttributes() ?>><?php echo $store_suppliers_delete->CP2Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Type->Visible) { // Type ?>
		<td <?php echo $store_suppliers_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Type" class="store_suppliers_Type">
<span<?php echo $store_suppliers_delete->Type->viewAttributes() ?>><?php echo $store_suppliers_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Creditterms->Visible) { // Creditterms ?>
		<td <?php echo $store_suppliers_delete->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Creditterms" class="store_suppliers_Creditterms">
<span<?php echo $store_suppliers_delete->Creditterms->viewAttributes() ?>><?php echo $store_suppliers_delete->Creditterms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $store_suppliers_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Remarks" class="store_suppliers_Remarks">
<span<?php echo $store_suppliers_delete->Remarks->viewAttributes() ?>><?php echo $store_suppliers_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Tinnumber->Visible) { // Tinnumber ?>
		<td <?php echo $store_suppliers_delete->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber">
<span<?php echo $store_suppliers_delete->Tinnumber->viewAttributes() ?>><?php echo $store_suppliers_delete->Tinnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td <?php echo $store_suppliers_delete->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode">
<span<?php echo $store_suppliers_delete->Universalsuppliercode->viewAttributes() ?>><?php echo $store_suppliers_delete->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->Mobilenumber->Visible) { // Mobilenumber ?>
		<td <?php echo $store_suppliers_delete->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber">
<span<?php echo $store_suppliers_delete->Mobilenumber->viewAttributes() ?>><?php echo $store_suppliers_delete->Mobilenumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->PANNumber->Visible) { // PANNumber ?>
		<td <?php echo $store_suppliers_delete->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_PANNumber" class="store_suppliers_PANNumber">
<span<?php echo $store_suppliers_delete->PANNumber->viewAttributes() ?>><?php echo $store_suppliers_delete->PANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td <?php echo $store_suppliers_delete->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo">
<span<?php echo $store_suppliers_delete->SalesRepMobileNo->viewAttributes() ?>><?php echo $store_suppliers_delete->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->GSTNumber->Visible) { // GSTNumber ?>
		<td <?php echo $store_suppliers_delete->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber">
<span<?php echo $store_suppliers_delete->GSTNumber->viewAttributes() ?>><?php echo $store_suppliers_delete->GSTNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->TANNumber->Visible) { // TANNumber ?>
		<td <?php echo $store_suppliers_delete->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_TANNumber" class="store_suppliers_TANNumber">
<span<?php echo $store_suppliers_delete->TANNumber->viewAttributes() ?>><?php echo $store_suppliers_delete->TANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers_delete->id->Visible) { // id ?>
		<td <?php echo $store_suppliers_delete->id->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCount ?>_store_suppliers_id" class="store_suppliers_id">
<span<?php echo $store_suppliers_delete->id->viewAttributes() ?>><?php echo $store_suppliers_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_suppliers_delete->Recordset->moveNext();
}
$store_suppliers_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_suppliers_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_suppliers_delete->showPageFooter();
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
$store_suppliers_delete->terminate();
?>