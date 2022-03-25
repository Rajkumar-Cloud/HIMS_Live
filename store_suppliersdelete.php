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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_suppliersdelete = currentForm = new ew.Form("fstore_suppliersdelete", "delete");

// Form_CustomValidate event
fstore_suppliersdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_suppliersdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_suppliers_delete->showPageHeader(); ?>
<?php
$store_suppliers_delete->showMessage();
?>
<form name="fstore_suppliersdelete" id="fstore_suppliersdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_suppliers_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_suppliers_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_suppliers_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
		<th class="<?php echo $store_suppliers->Suppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode"><?php echo $store_suppliers->Suppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
		<th class="<?php echo $store_suppliers->Suppliername->headerCellClass() ?>"><span id="elh_store_suppliers_Suppliername" class="store_suppliers_Suppliername"><?php echo $store_suppliers->Suppliername->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
		<th class="<?php echo $store_suppliers->Abbreviation->headerCellClass() ?>"><span id="elh_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation"><?php echo $store_suppliers->Abbreviation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
		<th class="<?php echo $store_suppliers->Creationdate->headerCellClass() ?>"><span id="elh_store_suppliers_Creationdate" class="store_suppliers_Creationdate"><?php echo $store_suppliers->Creationdate->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
		<th class="<?php echo $store_suppliers->Address1->headerCellClass() ?>"><span id="elh_store_suppliers_Address1" class="store_suppliers_Address1"><?php echo $store_suppliers->Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
		<th class="<?php echo $store_suppliers->Address2->headerCellClass() ?>"><span id="elh_store_suppliers_Address2" class="store_suppliers_Address2"><?php echo $store_suppliers->Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
		<th class="<?php echo $store_suppliers->Address3->headerCellClass() ?>"><span id="elh_store_suppliers_Address3" class="store_suppliers_Address3"><?php echo $store_suppliers->Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
		<th class="<?php echo $store_suppliers->Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_Citycode" class="store_suppliers_Citycode"><?php echo $store_suppliers->Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
		<th class="<?php echo $store_suppliers->State->headerCellClass() ?>"><span id="elh_store_suppliers_State" class="store_suppliers_State"><?php echo $store_suppliers->State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $store_suppliers->Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_Pincode" class="store_suppliers_Pincode"><?php echo $store_suppliers->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
		<th class="<?php echo $store_suppliers->Tngstnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber"><?php echo $store_suppliers->Tngstnumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
		<th class="<?php echo $store_suppliers->Phone->headerCellClass() ?>"><span id="elh_store_suppliers_Phone" class="store_suppliers_Phone"><?php echo $store_suppliers->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
		<th class="<?php echo $store_suppliers->Fax->headerCellClass() ?>"><span id="elh_store_suppliers_Fax" class="store_suppliers_Fax"><?php echo $store_suppliers->Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
		<th class="<?php echo $store_suppliers->_Email->headerCellClass() ?>"><span id="elh_store_suppliers__Email" class="store_suppliers__Email"><?php echo $store_suppliers->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
		<th class="<?php echo $store_suppliers->Paymentmode->headerCellClass() ?>"><span id="elh_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode"><?php echo $store_suppliers->Paymentmode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
		<th class="<?php echo $store_suppliers->Contactperson1->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1"><?php echo $store_suppliers->Contactperson1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
		<th class="<?php echo $store_suppliers->CP1Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1"><?php echo $store_suppliers->CP1Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
		<th class="<?php echo $store_suppliers->CP1Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2"><?php echo $store_suppliers->CP1Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
		<th class="<?php echo $store_suppliers->CP1Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3"><?php echo $store_suppliers->CP1Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
		<th class="<?php echo $store_suppliers->CP1Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode"><?php echo $store_suppliers->CP1Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
		<th class="<?php echo $store_suppliers->CP1State->headerCellClass() ?>"><span id="elh_store_suppliers_CP1State" class="store_suppliers_CP1State"><?php echo $store_suppliers->CP1State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
		<th class="<?php echo $store_suppliers->CP1Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode"><?php echo $store_suppliers->CP1Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
		<th class="<?php echo $store_suppliers->CP1Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation"><?php echo $store_suppliers->CP1Designation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
		<th class="<?php echo $store_suppliers->CP1Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone"><?php echo $store_suppliers->CP1Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<th class="<?php echo $store_suppliers->CP1MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo"><?php echo $store_suppliers->CP1MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
		<th class="<?php echo $store_suppliers->CP1Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax"><?php echo $store_suppliers->CP1Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
		<th class="<?php echo $store_suppliers->CP1Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP1Email" class="store_suppliers_CP1Email"><?php echo $store_suppliers->CP1Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
		<th class="<?php echo $store_suppliers->Contactperson2->headerCellClass() ?>"><span id="elh_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2"><?php echo $store_suppliers->Contactperson2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
		<th class="<?php echo $store_suppliers->CP2Address1->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1"><?php echo $store_suppliers->CP2Address1->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
		<th class="<?php echo $store_suppliers->CP2Address2->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2"><?php echo $store_suppliers->CP2Address2->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
		<th class="<?php echo $store_suppliers->CP2Address3->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3"><?php echo $store_suppliers->CP2Address3->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
		<th class="<?php echo $store_suppliers->CP2Citycode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode"><?php echo $store_suppliers->CP2Citycode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
		<th class="<?php echo $store_suppliers->CP2State->headerCellClass() ?>"><span id="elh_store_suppliers_CP2State" class="store_suppliers_CP2State"><?php echo $store_suppliers->CP2State->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
		<th class="<?php echo $store_suppliers->CP2Pincode->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode"><?php echo $store_suppliers->CP2Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
		<th class="<?php echo $store_suppliers->CP2Designation->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation"><?php echo $store_suppliers->CP2Designation->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
		<th class="<?php echo $store_suppliers->CP2Phone->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone"><?php echo $store_suppliers->CP2Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<th class="<?php echo $store_suppliers->CP2MobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo"><?php echo $store_suppliers->CP2MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
		<th class="<?php echo $store_suppliers->CP2Fax->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax"><?php echo $store_suppliers->CP2Fax->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
		<th class="<?php echo $store_suppliers->CP2Email->headerCellClass() ?>"><span id="elh_store_suppliers_CP2Email" class="store_suppliers_CP2Email"><?php echo $store_suppliers->CP2Email->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
		<th class="<?php echo $store_suppliers->Type->headerCellClass() ?>"><span id="elh_store_suppliers_Type" class="store_suppliers_Type"><?php echo $store_suppliers->Type->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
		<th class="<?php echo $store_suppliers->Creditterms->headerCellClass() ?>"><span id="elh_store_suppliers_Creditterms" class="store_suppliers_Creditterms"><?php echo $store_suppliers->Creditterms->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $store_suppliers->Remarks->headerCellClass() ?>"><span id="elh_store_suppliers_Remarks" class="store_suppliers_Remarks"><?php echo $store_suppliers->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
		<th class="<?php echo $store_suppliers->Tinnumber->headerCellClass() ?>"><span id="elh_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber"><?php echo $store_suppliers->Tinnumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<th class="<?php echo $store_suppliers->Universalsuppliercode->headerCellClass() ?>"><span id="elh_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode"><?php echo $store_suppliers->Universalsuppliercode->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
		<th class="<?php echo $store_suppliers->Mobilenumber->headerCellClass() ?>"><span id="elh_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber"><?php echo $store_suppliers->Mobilenumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
		<th class="<?php echo $store_suppliers->PANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_PANNumber" class="store_suppliers_PANNumber"><?php echo $store_suppliers->PANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<th class="<?php echo $store_suppliers->SalesRepMobileNo->headerCellClass() ?>"><span id="elh_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
		<th class="<?php echo $store_suppliers->GSTNumber->headerCellClass() ?>"><span id="elh_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber"><?php echo $store_suppliers->GSTNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
		<th class="<?php echo $store_suppliers->TANNumber->headerCellClass() ?>"><span id="elh_store_suppliers_TANNumber" class="store_suppliers_TANNumber"><?php echo $store_suppliers->TANNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->id->Visible) { // id ?>
		<th class="<?php echo $store_suppliers->id->headerCellClass() ?>"><span id="elh_store_suppliers_id" class="store_suppliers_id"><?php echo $store_suppliers->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_suppliers->HospID->headerCellClass() ?>"><span id="elh_store_suppliers_HospID" class="store_suppliers_HospID"><?php echo $store_suppliers->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
		<th class="<?php echo $store_suppliers->BranchID->headerCellClass() ?>"><span id="elh_store_suppliers_BranchID" class="store_suppliers_BranchID"><?php echo $store_suppliers->BranchID->caption() ?></span></th>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_suppliers->StoreID->headerCellClass() ?>"><span id="elh_store_suppliers_StoreID" class="store_suppliers_StoreID"><?php echo $store_suppliers->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_suppliers_delete->RecCnt = 0;
$i = 0;
while (!$store_suppliers_delete->Recordset->EOF) {
	$store_suppliers_delete->RecCnt++;
	$store_suppliers_delete->RowCnt++;

	// Set row properties
	$store_suppliers->resetAttributes();
	$store_suppliers->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_suppliers_delete->loadRowValues($store_suppliers_delete->Recordset);

	// Render row
	$store_suppliers_delete->renderRow();
?>
	<tr<?php echo $store_suppliers->rowAttributes() ?>>
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
		<td<?php echo $store_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Suppliercode" class="store_suppliers_Suppliercode">
<span<?php echo $store_suppliers->Suppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
		<td<?php echo $store_suppliers->Suppliername->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Suppliername" class="store_suppliers_Suppliername">
<span<?php echo $store_suppliers->Suppliername->viewAttributes() ?>>
<?php echo $store_suppliers->Suppliername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
		<td<?php echo $store_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Abbreviation" class="store_suppliers_Abbreviation">
<span<?php echo $store_suppliers->Abbreviation->viewAttributes() ?>>
<?php echo $store_suppliers->Abbreviation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
		<td<?php echo $store_suppliers->Creationdate->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Creationdate" class="store_suppliers_Creationdate">
<span<?php echo $store_suppliers->Creationdate->viewAttributes() ?>>
<?php echo $store_suppliers->Creationdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
		<td<?php echo $store_suppliers->Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Address1" class="store_suppliers_Address1">
<span<?php echo $store_suppliers->Address1->viewAttributes() ?>>
<?php echo $store_suppliers->Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
		<td<?php echo $store_suppliers->Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Address2" class="store_suppliers_Address2">
<span<?php echo $store_suppliers->Address2->viewAttributes() ?>>
<?php echo $store_suppliers->Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
		<td<?php echo $store_suppliers->Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Address3" class="store_suppliers_Address3">
<span<?php echo $store_suppliers->Address3->viewAttributes() ?>>
<?php echo $store_suppliers->Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
		<td<?php echo $store_suppliers->Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Citycode" class="store_suppliers_Citycode">
<span<?php echo $store_suppliers->Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
		<td<?php echo $store_suppliers->State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_State" class="store_suppliers_State">
<span<?php echo $store_suppliers->State->viewAttributes() ?>>
<?php echo $store_suppliers->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
		<td<?php echo $store_suppliers->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Pincode" class="store_suppliers_Pincode">
<span<?php echo $store_suppliers->Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
		<td<?php echo $store_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Tngstnumber" class="store_suppliers_Tngstnumber">
<span<?php echo $store_suppliers->Tngstnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tngstnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
		<td<?php echo $store_suppliers->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Phone" class="store_suppliers_Phone">
<span<?php echo $store_suppliers->Phone->viewAttributes() ?>>
<?php echo $store_suppliers->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
		<td<?php echo $store_suppliers->Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Fax" class="store_suppliers_Fax">
<span<?php echo $store_suppliers->Fax->viewAttributes() ?>>
<?php echo $store_suppliers->Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
		<td<?php echo $store_suppliers->_Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers__Email" class="store_suppliers__Email">
<span<?php echo $store_suppliers->_Email->viewAttributes() ?>>
<?php echo $store_suppliers->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
		<td<?php echo $store_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Paymentmode" class="store_suppliers_Paymentmode">
<span<?php echo $store_suppliers->Paymentmode->viewAttributes() ?>>
<?php echo $store_suppliers->Paymentmode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
		<td<?php echo $store_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Contactperson1" class="store_suppliers_Contactperson1">
<span<?php echo $store_suppliers->Contactperson1->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
		<td<?php echo $store_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Address1" class="store_suppliers_CP1Address1">
<span<?php echo $store_suppliers->CP1Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
		<td<?php echo $store_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Address2" class="store_suppliers_CP1Address2">
<span<?php echo $store_suppliers->CP1Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
		<td<?php echo $store_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Address3" class="store_suppliers_CP1Address3">
<span<?php echo $store_suppliers->CP1Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
		<td<?php echo $store_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Citycode" class="store_suppliers_CP1Citycode">
<span<?php echo $store_suppliers->CP1Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
		<td<?php echo $store_suppliers->CP1State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1State" class="store_suppliers_CP1State">
<span<?php echo $store_suppliers->CP1State->viewAttributes() ?>>
<?php echo $store_suppliers->CP1State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
		<td<?php echo $store_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Pincode" class="store_suppliers_CP1Pincode">
<span<?php echo $store_suppliers->CP1Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
		<td<?php echo $store_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Designation" class="store_suppliers_CP1Designation">
<span<?php echo $store_suppliers->CP1Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
		<td<?php echo $store_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Phone" class="store_suppliers_CP1Phone">
<span<?php echo $store_suppliers->CP1Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
		<td<?php echo $store_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1MobileNo" class="store_suppliers_CP1MobileNo">
<span<?php echo $store_suppliers->CP1MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
		<td<?php echo $store_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Fax" class="store_suppliers_CP1Fax">
<span<?php echo $store_suppliers->CP1Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
		<td<?php echo $store_suppliers->CP1Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP1Email" class="store_suppliers_CP1Email">
<span<?php echo $store_suppliers->CP1Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP1Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
		<td<?php echo $store_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Contactperson2" class="store_suppliers_Contactperson2">
<span<?php echo $store_suppliers->Contactperson2->viewAttributes() ?>>
<?php echo $store_suppliers->Contactperson2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
		<td<?php echo $store_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Address1" class="store_suppliers_CP2Address1">
<span<?php echo $store_suppliers->CP2Address1->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
		<td<?php echo $store_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Address2" class="store_suppliers_CP2Address2">
<span<?php echo $store_suppliers->CP2Address2->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
		<td<?php echo $store_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Address3" class="store_suppliers_CP2Address3">
<span<?php echo $store_suppliers->CP2Address3->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Address3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
		<td<?php echo $store_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Citycode" class="store_suppliers_CP2Citycode">
<span<?php echo $store_suppliers->CP2Citycode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Citycode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
		<td<?php echo $store_suppliers->CP2State->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2State" class="store_suppliers_CP2State">
<span<?php echo $store_suppliers->CP2State->viewAttributes() ?>>
<?php echo $store_suppliers->CP2State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
		<td<?php echo $store_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Pincode" class="store_suppliers_CP2Pincode">
<span<?php echo $store_suppliers->CP2Pincode->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
		<td<?php echo $store_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Designation" class="store_suppliers_CP2Designation">
<span<?php echo $store_suppliers->CP2Designation->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
		<td<?php echo $store_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Phone" class="store_suppliers_CP2Phone">
<span<?php echo $store_suppliers->CP2Phone->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
		<td<?php echo $store_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2MobileNo" class="store_suppliers_CP2MobileNo">
<span<?php echo $store_suppliers->CP2MobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
		<td<?php echo $store_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Fax" class="store_suppliers_CP2Fax">
<span<?php echo $store_suppliers->CP2Fax->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
		<td<?php echo $store_suppliers->CP2Email->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_CP2Email" class="store_suppliers_CP2Email">
<span<?php echo $store_suppliers->CP2Email->viewAttributes() ?>>
<?php echo $store_suppliers->CP2Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
		<td<?php echo $store_suppliers->Type->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Type" class="store_suppliers_Type">
<span<?php echo $store_suppliers->Type->viewAttributes() ?>>
<?php echo $store_suppliers->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
		<td<?php echo $store_suppliers->Creditterms->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Creditterms" class="store_suppliers_Creditterms">
<span<?php echo $store_suppliers->Creditterms->viewAttributes() ?>>
<?php echo $store_suppliers->Creditterms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
		<td<?php echo $store_suppliers->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Remarks" class="store_suppliers_Remarks">
<span<?php echo $store_suppliers->Remarks->viewAttributes() ?>>
<?php echo $store_suppliers->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
		<td<?php echo $store_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Tinnumber" class="store_suppliers_Tinnumber">
<span<?php echo $store_suppliers->Tinnumber->viewAttributes() ?>>
<?php echo $store_suppliers->Tinnumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
		<td<?php echo $store_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Universalsuppliercode" class="store_suppliers_Universalsuppliercode">
<span<?php echo $store_suppliers->Universalsuppliercode->viewAttributes() ?>>
<?php echo $store_suppliers->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
		<td<?php echo $store_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_Mobilenumber" class="store_suppliers_Mobilenumber">
<span<?php echo $store_suppliers->Mobilenumber->viewAttributes() ?>>
<?php echo $store_suppliers->Mobilenumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
		<td<?php echo $store_suppliers->PANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_PANNumber" class="store_suppliers_PANNumber">
<span<?php echo $store_suppliers->PANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->PANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
		<td<?php echo $store_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_SalesRepMobileNo" class="store_suppliers_SalesRepMobileNo">
<span<?php echo $store_suppliers->SalesRepMobileNo->viewAttributes() ?>>
<?php echo $store_suppliers->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
		<td<?php echo $store_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_GSTNumber" class="store_suppliers_GSTNumber">
<span<?php echo $store_suppliers->GSTNumber->viewAttributes() ?>>
<?php echo $store_suppliers->GSTNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
		<td<?php echo $store_suppliers->TANNumber->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_TANNumber" class="store_suppliers_TANNumber">
<span<?php echo $store_suppliers->TANNumber->viewAttributes() ?>>
<?php echo $store_suppliers->TANNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->id->Visible) { // id ?>
		<td<?php echo $store_suppliers->id->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_id" class="store_suppliers_id">
<span<?php echo $store_suppliers->id->viewAttributes() ?>>
<?php echo $store_suppliers->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
		<td<?php echo $store_suppliers->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_HospID" class="store_suppliers_HospID">
<span<?php echo $store_suppliers->HospID->viewAttributes() ?>>
<?php echo $store_suppliers->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
		<td<?php echo $store_suppliers->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_BranchID" class="store_suppliers_BranchID">
<span<?php echo $store_suppliers->BranchID->viewAttributes() ?>>
<?php echo $store_suppliers->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_suppliers->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_suppliers_delete->RowCnt ?>_store_suppliers_StoreID" class="store_suppliers_StoreID">
<span<?php echo $store_suppliers->StoreID->viewAttributes() ?>>
<?php echo $store_suppliers->StoreID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_suppliers_delete->terminate();
?>