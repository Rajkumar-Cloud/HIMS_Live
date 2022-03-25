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
$pharmacy_suppliers_delete = new pharmacy_suppliers_delete();

// Run the page
$pharmacy_suppliers_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_suppliers_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_suppliersdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_suppliersdelete = currentForm = new ew.Form("fpharmacy_suppliersdelete", "delete");
	loadjs.done("fpharmacy_suppliersdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_suppliers_delete->showPageHeader(); ?>
<?php
$pharmacy_suppliers_delete->showMessage();
?>
<form name="fpharmacy_suppliersdelete" id="fpharmacy_suppliersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_suppliers_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_suppliers_delete->Suppliercode->Visible) { // Suppliercode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Suppliercode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode"><?php echo $pharmacy_suppliers_delete->Suppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Suppliername->Visible) { // Suppliername ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Suppliername->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername"><?php echo $pharmacy_suppliers_delete->Suppliername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Abbreviation->Visible) { // Abbreviation ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Abbreviation->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation"><?php echo $pharmacy_suppliers_delete->Abbreviation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Creationdate->Visible) { // Creationdate ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Creationdate->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate"><?php echo $pharmacy_suppliers_delete->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Address1->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1"><?php echo $pharmacy_suppliers_delete->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Address2->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2"><?php echo $pharmacy_suppliers_delete->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Address3->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3"><?php echo $pharmacy_suppliers_delete->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Citycode->Visible) { // Citycode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Citycode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode"><?php echo $pharmacy_suppliers_delete->Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_suppliers_delete->State->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State"><?php echo $pharmacy_suppliers_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode"><?php echo $pharmacy_suppliers_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Tngstnumber->Visible) { // Tngstnumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Tngstnumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber"><?php echo $pharmacy_suppliers_delete->Tngstnumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Phone->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone"><?php echo $pharmacy_suppliers_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Fax->Visible) { // Fax ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Fax->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax"><?php echo $pharmacy_suppliers_delete->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->_Email->Visible) { // Email ?>
		<th class="<?php echo $pharmacy_suppliers_delete->_Email->headerCellClass() ?>"><span id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email"><?php echo $pharmacy_suppliers_delete->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Paymentmode->Visible) { // Paymentmode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Paymentmode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode"><?php echo $pharmacy_suppliers_delete->Paymentmode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Contactperson1->Visible) { // Contactperson1 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Contactperson1->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1"><?php echo $pharmacy_suppliers_delete->Contactperson1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address1->Visible) { // CP1Address1 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Address1->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1"><?php echo $pharmacy_suppliers_delete->CP1Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address2->Visible) { // CP1Address2 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Address2->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2"><?php echo $pharmacy_suppliers_delete->CP1Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address3->Visible) { // CP1Address3 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Address3->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3"><?php echo $pharmacy_suppliers_delete->CP1Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Citycode->Visible) { // CP1Citycode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Citycode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode"><?php echo $pharmacy_suppliers_delete->CP1Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1State->Visible) { // CP1State ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1State->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State"><?php echo $pharmacy_suppliers_delete->CP1State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Pincode->Visible) { // CP1Pincode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Pincode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode"><?php echo $pharmacy_suppliers_delete->CP1Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Designation->Visible) { // CP1Designation ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Designation->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation"><?php echo $pharmacy_suppliers_delete->CP1Designation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Phone->Visible) { // CP1Phone ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Phone->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone"><?php echo $pharmacy_suppliers_delete->CP1Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1MobileNo->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo"><?php echo $pharmacy_suppliers_delete->CP1MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Fax->Visible) { // CP1Fax ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Fax->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax"><?php echo $pharmacy_suppliers_delete->CP1Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Email->Visible) { // CP1Email ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP1Email->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email"><?php echo $pharmacy_suppliers_delete->CP1Email->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Contactperson2->Visible) { // Contactperson2 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Contactperson2->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2"><?php echo $pharmacy_suppliers_delete->Contactperson2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address1->Visible) { // CP2Address1 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Address1->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1"><?php echo $pharmacy_suppliers_delete->CP2Address1->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address2->Visible) { // CP2Address2 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Address2->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2"><?php echo $pharmacy_suppliers_delete->CP2Address2->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address3->Visible) { // CP2Address3 ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Address3->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3"><?php echo $pharmacy_suppliers_delete->CP2Address3->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Citycode->Visible) { // CP2Citycode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Citycode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode"><?php echo $pharmacy_suppliers_delete->CP2Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2State->Visible) { // CP2State ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2State->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State"><?php echo $pharmacy_suppliers_delete->CP2State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Pincode->Visible) { // CP2Pincode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Pincode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode"><?php echo $pharmacy_suppliers_delete->CP2Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Designation->Visible) { // CP2Designation ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Designation->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation"><?php echo $pharmacy_suppliers_delete->CP2Designation->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Phone->Visible) { // CP2Phone ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Phone->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone"><?php echo $pharmacy_suppliers_delete->CP2Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2MobileNo->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo"><?php echo $pharmacy_suppliers_delete->CP2MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Fax->Visible) { // CP2Fax ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Fax->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax"><?php echo $pharmacy_suppliers_delete->CP2Fax->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Email->Visible) { // CP2Email ?>
		<th class="<?php echo $pharmacy_suppliers_delete->CP2Email->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email"><?php echo $pharmacy_suppliers_delete->CP2Email->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Type->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type"><?php echo $pharmacy_suppliers_delete->Type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Creditterms->Visible) { // Creditterms ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Creditterms->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms"><?php echo $pharmacy_suppliers_delete->Creditterms->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Remarks->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks"><?php echo $pharmacy_suppliers_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Tinnumber->Visible) { // Tinnumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Tinnumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber"><?php echo $pharmacy_suppliers_delete->Tinnumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Universalsuppliercode->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode"><?php echo $pharmacy_suppliers_delete->Universalsuppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Mobilenumber->Visible) { // Mobilenumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->Mobilenumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber"><?php echo $pharmacy_suppliers_delete->Mobilenumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->PANNumber->Visible) { // PANNumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->PANNumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber"><?php echo $pharmacy_suppliers_delete->PANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<th class="<?php echo $pharmacy_suppliers_delete->SalesRepMobileNo->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo"><?php echo $pharmacy_suppliers_delete->SalesRepMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->GSTNumber->Visible) { // GSTNumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->GSTNumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber"><?php echo $pharmacy_suppliers_delete->GSTNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->TANNumber->Visible) { // TANNumber ?>
		<th class="<?php echo $pharmacy_suppliers_delete->TANNumber->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber"><?php echo $pharmacy_suppliers_delete->TANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_suppliers_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id"><?php echo $pharmacy_suppliers_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_suppliers_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_suppliers_delete->Recordset->EOF) {
	$pharmacy_suppliers_delete->RecordCount++;
	$pharmacy_suppliers_delete->RowCount++;

	// Set row properties
	$pharmacy_suppliers->resetAttributes();
	$pharmacy_suppliers->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_suppliers_delete->loadRowValues($pharmacy_suppliers_delete->Recordset);

	// Render row
	$pharmacy_suppliers_delete->renderRow();
?>
	<tr <?php echo $pharmacy_suppliers->rowAttributes() ?>>
<?php if ($pharmacy_suppliers_delete->Suppliercode->Visible) { // Suppliercode ?>
		<td <?php echo $pharmacy_suppliers_delete->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode">
<span<?php echo $pharmacy_suppliers_delete->Suppliercode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Suppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Suppliername->Visible) { // Suppliername ?>
		<td <?php echo $pharmacy_suppliers_delete->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername">
<span<?php echo $pharmacy_suppliers_delete->Suppliername->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Suppliername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Abbreviation->Visible) { // Abbreviation ?>
		<td <?php echo $pharmacy_suppliers_delete->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation">
<span<?php echo $pharmacy_suppliers_delete->Abbreviation->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Abbreviation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Creationdate->Visible) { // Creationdate ?>
		<td <?php echo $pharmacy_suppliers_delete->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate">
<span<?php echo $pharmacy_suppliers_delete->Creationdate->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address1->Visible) { // Address1 ?>
		<td <?php echo $pharmacy_suppliers_delete->Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1">
<span<?php echo $pharmacy_suppliers_delete->Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address2->Visible) { // Address2 ?>
		<td <?php echo $pharmacy_suppliers_delete->Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2">
<span<?php echo $pharmacy_suppliers_delete->Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Address3->Visible) { // Address3 ?>
		<td <?php echo $pharmacy_suppliers_delete->Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3">
<span<?php echo $pharmacy_suppliers_delete->Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Citycode->Visible) { // Citycode ?>
		<td <?php echo $pharmacy_suppliers_delete->Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode">
<span<?php echo $pharmacy_suppliers_delete->Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->State->Visible) { // State ?>
		<td <?php echo $pharmacy_suppliers_delete->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_State" class="pharmacy_suppliers_State">
<span<?php echo $pharmacy_suppliers_delete->State->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $pharmacy_suppliers_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode">
<span<?php echo $pharmacy_suppliers_delete->Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Tngstnumber->Visible) { // Tngstnumber ?>
		<td <?php echo $pharmacy_suppliers_delete->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber">
<span<?php echo $pharmacy_suppliers_delete->Tngstnumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Tngstnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $pharmacy_suppliers_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone">
<span<?php echo $pharmacy_suppliers_delete->Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Fax->Visible) { // Fax ?>
		<td <?php echo $pharmacy_suppliers_delete->Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax">
<span<?php echo $pharmacy_suppliers_delete->Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->_Email->Visible) { // Email ?>
		<td <?php echo $pharmacy_suppliers_delete->_Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email">
<span<?php echo $pharmacy_suppliers_delete->_Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Paymentmode->Visible) { // Paymentmode ?>
		<td <?php echo $pharmacy_suppliers_delete->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode">
<span<?php echo $pharmacy_suppliers_delete->Paymentmode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Paymentmode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Contactperson1->Visible) { // Contactperson1 ?>
		<td <?php echo $pharmacy_suppliers_delete->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1">
<span<?php echo $pharmacy_suppliers_delete->Contactperson1->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Contactperson1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address1->Visible) { // CP1Address1 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1">
<span<?php echo $pharmacy_suppliers_delete->CP1Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address2->Visible) { // CP1Address2 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2">
<span<?php echo $pharmacy_suppliers_delete->CP1Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Address3->Visible) { // CP1Address3 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3">
<span<?php echo $pharmacy_suppliers_delete->CP1Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Citycode->Visible) { // CP1Citycode ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode">
<span<?php echo $pharmacy_suppliers_delete->CP1Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1State->Visible) { // CP1State ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State">
<span<?php echo $pharmacy_suppliers_delete->CP1State->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Pincode->Visible) { // CP1Pincode ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode">
<span<?php echo $pharmacy_suppliers_delete->CP1Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Designation->Visible) { // CP1Designation ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation">
<span<?php echo $pharmacy_suppliers_delete->CP1Designation->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Phone->Visible) { // CP1Phone ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone">
<span<?php echo $pharmacy_suppliers_delete->CP1Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo">
<span<?php echo $pharmacy_suppliers_delete->CP1MobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Fax->Visible) { // CP1Fax ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax">
<span<?php echo $pharmacy_suppliers_delete->CP1Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP1Email->Visible) { // CP1Email ?>
		<td <?php echo $pharmacy_suppliers_delete->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email">
<span<?php echo $pharmacy_suppliers_delete->CP1Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP1Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Contactperson2->Visible) { // Contactperson2 ?>
		<td <?php echo $pharmacy_suppliers_delete->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2">
<span<?php echo $pharmacy_suppliers_delete->Contactperson2->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Contactperson2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address1->Visible) { // CP2Address1 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1">
<span<?php echo $pharmacy_suppliers_delete->CP2Address1->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address2->Visible) { // CP2Address2 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2">
<span<?php echo $pharmacy_suppliers_delete->CP2Address2->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Address3->Visible) { // CP2Address3 ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3">
<span<?php echo $pharmacy_suppliers_delete->CP2Address3->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Citycode->Visible) { // CP2Citycode ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode">
<span<?php echo $pharmacy_suppliers_delete->CP2Citycode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2State->Visible) { // CP2State ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State">
<span<?php echo $pharmacy_suppliers_delete->CP2State->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Pincode->Visible) { // CP2Pincode ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode">
<span<?php echo $pharmacy_suppliers_delete->CP2Pincode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Designation->Visible) { // CP2Designation ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation">
<span<?php echo $pharmacy_suppliers_delete->CP2Designation->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Phone->Visible) { // CP2Phone ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone">
<span<?php echo $pharmacy_suppliers_delete->CP2Phone->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo">
<span<?php echo $pharmacy_suppliers_delete->CP2MobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Fax->Visible) { // CP2Fax ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax">
<span<?php echo $pharmacy_suppliers_delete->CP2Fax->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->CP2Email->Visible) { // CP2Email ?>
		<td <?php echo $pharmacy_suppliers_delete->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email">
<span<?php echo $pharmacy_suppliers_delete->CP2Email->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->CP2Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Type->Visible) { // Type ?>
		<td <?php echo $pharmacy_suppliers_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type">
<span<?php echo $pharmacy_suppliers_delete->Type->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Creditterms->Visible) { // Creditterms ?>
		<td <?php echo $pharmacy_suppliers_delete->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms">
<span<?php echo $pharmacy_suppliers_delete->Creditterms->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Creditterms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $pharmacy_suppliers_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks">
<span<?php echo $pharmacy_suppliers_delete->Remarks->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Tinnumber->Visible) { // Tinnumber ?>
		<td <?php echo $pharmacy_suppliers_delete->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber">
<span<?php echo $pharmacy_suppliers_delete->Tinnumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Tinnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td <?php echo $pharmacy_suppliers_delete->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode">
<span<?php echo $pharmacy_suppliers_delete->Universalsuppliercode->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->Mobilenumber->Visible) { // Mobilenumber ?>
		<td <?php echo $pharmacy_suppliers_delete->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber">
<span<?php echo $pharmacy_suppliers_delete->Mobilenumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->Mobilenumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->PANNumber->Visible) { // PANNumber ?>
		<td <?php echo $pharmacy_suppliers_delete->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber">
<span<?php echo $pharmacy_suppliers_delete->PANNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->PANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td <?php echo $pharmacy_suppliers_delete->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo">
<span<?php echo $pharmacy_suppliers_delete->SalesRepMobileNo->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->GSTNumber->Visible) { // GSTNumber ?>
		<td <?php echo $pharmacy_suppliers_delete->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber">
<span<?php echo $pharmacy_suppliers_delete->GSTNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->GSTNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->TANNumber->Visible) { // TANNumber ?>
		<td <?php echo $pharmacy_suppliers_delete->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber">
<span<?php echo $pharmacy_suppliers_delete->TANNumber->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->TANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_suppliers_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_suppliers_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_suppliers_delete->RowCount ?>_pharmacy_suppliers_id" class="pharmacy_suppliers_id">
<span<?php echo $pharmacy_suppliers_delete->id->viewAttributes() ?>><?php echo $pharmacy_suppliers_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_suppliers_delete->Recordset->moveNext();
}
$pharmacy_suppliers_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_suppliers_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_suppliers_delete->showPageFooter();
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
$pharmacy_suppliers_delete->terminate();
?>