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
$store_grn_view = new store_grn_view();

// Run the page
$store_grn_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_grn_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_grnview = currentForm = new ew.Form("fstore_grnview", "view");

// Form_CustomValidate event
fstore_grnview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_grnview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_grnview.lists["x_PC"] = <?php echo $store_grn_view->PC->Lookup->toClientList() ?>;
fstore_grnview.lists["x_PC"].options = <?php echo JsonEncode($store_grn_view->PC->lookupOptions()) ?>;
fstore_grnview.lists["x_BRCODE"] = <?php echo $store_grn_view->BRCODE->Lookup->toClientList() ?>;
fstore_grnview.lists["x_BRCODE"].options = <?php echo JsonEncode($store_grn_view->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

</script>
<style>
.input-group>.form-control.ew-lookup-text {
	width: 35em;
}
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
	border: 0;
	padding: 0;
	margin-bottom: 0;
	overflow-x: scroll;
}
</style>
<script>
$("[data-name='Quantity']").hide();
$("[data-name='BillDate']").hide();
</script>
<?php } ?>
<?php if (!$store_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_grn_view->ExportOptions->render("body") ?>
<?php $store_grn_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_grn_view->showPageHeader(); ?>
<?php
$store_grn_view->showMessage();
?>
<form name="fstore_grnview" id="fstore_grnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_grn_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_grn_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<input type="hidden" name="modal" value="<?php echo (int)$store_grn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($store_grn->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_id"><script id="tpc_store_grn_id" class="store_grnview" type="text/html"><span><?php echo $store_grn->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $store_grn->id->cellAttributes() ?>>
<script id="tpx_store_grn_id" class="store_grnview" type="text/html">
<span id="el_store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<?php echo $store_grn->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
	<tr id="r_GRNNO">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_GRNNO"><script id="tpc_store_grn_GRNNO" class="store_grnview" type="text/html"><span><?php echo $store_grn->GRNNO->caption() ?></span></script></span></td>
		<td data-name="GRNNO"<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<script id="tpx_store_grn_GRNNO" class="store_grnview" type="text/html">
<span id="el_store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<?php echo $store_grn->GRNNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_DT"><script id="tpc_store_grn_DT" class="store_grnview" type="text/html"><span><?php echo $store_grn->DT->caption() ?></span></script></span></td>
		<td data-name="DT"<?php echo $store_grn->DT->cellAttributes() ?>>
<script id="tpx_store_grn_DT" class="store_grnview" type="text/html">
<span id="el_store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<?php echo $store_grn->DT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_YM"><script id="tpc_store_grn_YM" class="store_grnview" type="text/html"><span><?php echo $store_grn->YM->caption() ?></span></script></span></td>
		<td data-name="YM"<?php echo $store_grn->YM->cellAttributes() ?>>
<script id="tpx_store_grn_YM" class="store_grnview" type="text/html">
<span id="el_store_grn_YM">
<span<?php echo $store_grn->YM->viewAttributes() ?>>
<?php echo $store_grn->YM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_PC"><script id="tpc_store_grn_PC" class="store_grnview" type="text/html"><span><?php echo $store_grn->PC->caption() ?></span></script></span></td>
		<td data-name="PC"<?php echo $store_grn->PC->cellAttributes() ?>>
<script id="tpx_store_grn_PC" class="store_grnview" type="text/html">
<span id="el_store_grn_PC">
<span<?php echo $store_grn->PC->viewAttributes() ?>>
<?php echo $store_grn->PC->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Customercode"><script id="tpc_store_grn_Customercode" class="store_grnview" type="text/html"><span><?php echo $store_grn->Customercode->caption() ?></span></script></span></td>
		<td data-name="Customercode"<?php echo $store_grn->Customercode->cellAttributes() ?>>
<script id="tpx_store_grn_Customercode" class="store_grnview" type="text/html">
<span id="el_store_grn_Customercode">
<span<?php echo $store_grn->Customercode->viewAttributes() ?>>
<?php echo $store_grn->Customercode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Customername"><script id="tpc_store_grn_Customername" class="store_grnview" type="text/html"><span><?php echo $store_grn->Customername->caption() ?></span></script></span></td>
		<td data-name="Customername"<?php echo $store_grn->Customername->cellAttributes() ?>>
<script id="tpx_store_grn_Customername" class="store_grnview" type="text/html">
<span id="el_store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<?php echo $store_grn->Customername->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_pharmacy_pocol"><script id="tpc_store_grn_pharmacy_pocol" class="store_grnview" type="text/html"><span><?php echo $store_grn->pharmacy_pocol->caption() ?></span></script></span></td>
		<td data-name="pharmacy_pocol"<?php echo $store_grn->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_store_grn_pharmacy_pocol" class="store_grnview" type="text/html">
<span id="el_store_grn_pharmacy_pocol">
<span<?php echo $store_grn->pharmacy_pocol->viewAttributes() ?>>
<?php echo $store_grn->pharmacy_pocol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Address1"><script id="tpc_store_grn_Address1" class="store_grnview" type="text/html"><span><?php echo $store_grn->Address1->caption() ?></span></script></span></td>
		<td data-name="Address1"<?php echo $store_grn->Address1->cellAttributes() ?>>
<script id="tpx_store_grn_Address1" class="store_grnview" type="text/html">
<span id="el_store_grn_Address1">
<span<?php echo $store_grn->Address1->viewAttributes() ?>>
<?php echo $store_grn->Address1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Address2"><script id="tpc_store_grn_Address2" class="store_grnview" type="text/html"><span><?php echo $store_grn->Address2->caption() ?></span></script></span></td>
		<td data-name="Address2"<?php echo $store_grn->Address2->cellAttributes() ?>>
<script id="tpx_store_grn_Address2" class="store_grnview" type="text/html">
<span id="el_store_grn_Address2">
<span<?php echo $store_grn->Address2->viewAttributes() ?>>
<?php echo $store_grn->Address2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Address3"><script id="tpc_store_grn_Address3" class="store_grnview" type="text/html"><span><?php echo $store_grn->Address3->caption() ?></span></script></span></td>
		<td data-name="Address3"<?php echo $store_grn->Address3->cellAttributes() ?>>
<script id="tpx_store_grn_Address3" class="store_grnview" type="text/html">
<span id="el_store_grn_Address3">
<span<?php echo $store_grn->Address3->viewAttributes() ?>>
<?php echo $store_grn->Address3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_State"><script id="tpc_store_grn_State" class="store_grnview" type="text/html"><span><?php echo $store_grn->State->caption() ?></span></script></span></td>
		<td data-name="State"<?php echo $store_grn->State->cellAttributes() ?>>
<script id="tpx_store_grn_State" class="store_grnview" type="text/html">
<span id="el_store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<?php echo $store_grn->State->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Pincode"><script id="tpc_store_grn_Pincode" class="store_grnview" type="text/html"><span><?php echo $store_grn->Pincode->caption() ?></span></script></span></td>
		<td data-name="Pincode"<?php echo $store_grn->Pincode->cellAttributes() ?>>
<script id="tpx_store_grn_Pincode" class="store_grnview" type="text/html">
<span id="el_store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<?php echo $store_grn->Pincode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Phone"><script id="tpc_store_grn_Phone" class="store_grnview" type="text/html"><span><?php echo $store_grn->Phone->caption() ?></span></script></span></td>
		<td data-name="Phone"<?php echo $store_grn->Phone->cellAttributes() ?>>
<script id="tpx_store_grn_Phone" class="store_grnview" type="text/html">
<span id="el_store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<?php echo $store_grn->Phone->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Fax"><script id="tpc_store_grn_Fax" class="store_grnview" type="text/html"><span><?php echo $store_grn->Fax->caption() ?></span></script></span></td>
		<td data-name="Fax"<?php echo $store_grn->Fax->cellAttributes() ?>>
<script id="tpx_store_grn_Fax" class="store_grnview" type="text/html">
<span id="el_store_grn_Fax">
<span<?php echo $store_grn->Fax->viewAttributes() ?>>
<?php echo $store_grn->Fax->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_EEmail"><script id="tpc_store_grn_EEmail" class="store_grnview" type="text/html"><span><?php echo $store_grn->EEmail->caption() ?></span></script></span></td>
		<td data-name="EEmail"<?php echo $store_grn->EEmail->cellAttributes() ?>>
<script id="tpx_store_grn_EEmail" class="store_grnview" type="text/html">
<span id="el_store_grn_EEmail">
<span<?php echo $store_grn->EEmail->viewAttributes() ?>>
<?php echo $store_grn->EEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_HospID"><script id="tpc_store_grn_HospID" class="store_grnview" type="text/html"><span><?php echo $store_grn->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $store_grn->HospID->cellAttributes() ?>>
<script id="tpx_store_grn_HospID" class="store_grnview" type="text/html">
<span id="el_store_grn_HospID">
<span<?php echo $store_grn->HospID->viewAttributes() ?>>
<?php echo $store_grn->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_createdby"><script id="tpc_store_grn_createdby" class="store_grnview" type="text/html"><span><?php echo $store_grn->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $store_grn->createdby->cellAttributes() ?>>
<script id="tpx_store_grn_createdby" class="store_grnview" type="text/html">
<span id="el_store_grn_createdby">
<span<?php echo $store_grn->createdby->viewAttributes() ?>>
<?php echo $store_grn->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_createddatetime"><script id="tpc_store_grn_createddatetime" class="store_grnview" type="text/html"><span><?php echo $store_grn->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $store_grn->createddatetime->cellAttributes() ?>>
<script id="tpx_store_grn_createddatetime" class="store_grnview" type="text/html">
<span id="el_store_grn_createddatetime">
<span<?php echo $store_grn->createddatetime->viewAttributes() ?>>
<?php echo $store_grn->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_modifiedby"><script id="tpc_store_grn_modifiedby" class="store_grnview" type="text/html"><span><?php echo $store_grn->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $store_grn->modifiedby->cellAttributes() ?>>
<script id="tpx_store_grn_modifiedby" class="store_grnview" type="text/html">
<span id="el_store_grn_modifiedby">
<span<?php echo $store_grn->modifiedby->viewAttributes() ?>>
<?php echo $store_grn->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_modifieddatetime"><script id="tpc_store_grn_modifieddatetime" class="store_grnview" type="text/html"><span><?php echo $store_grn->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $store_grn->modifieddatetime->cellAttributes() ?>>
<script id="tpx_store_grn_modifieddatetime" class="store_grnview" type="text/html">
<span id="el_store_grn_modifieddatetime">
<span<?php echo $store_grn->modifieddatetime->viewAttributes() ?>>
<?php echo $store_grn->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BILLNO"><script id="tpc_store_grn_BILLNO" class="store_grnview" type="text/html"><span><?php echo $store_grn->BILLNO->caption() ?></span></script></span></td>
		<td data-name="BILLNO"<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<script id="tpx_store_grn_BILLNO" class="store_grnview" type="text/html">
<span id="el_store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<?php echo $store_grn->BILLNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BILLDT"><script id="tpc_store_grn_BILLDT" class="store_grnview" type="text/html"><span><?php echo $store_grn->BILLDT->caption() ?></span></script></span></td>
		<td data-name="BILLDT"<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<script id="tpx_store_grn_BILLDT" class="store_grnview" type="text/html">
<span id="el_store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<?php echo $store_grn->BILLDT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BRCODE"><script id="tpc_store_grn_BRCODE" class="store_grnview" type="text/html"><span><?php echo $store_grn->BRCODE->caption() ?></span></script></span></td>
		<td data-name="BRCODE"<?php echo $store_grn->BRCODE->cellAttributes() ?>>
<script id="tpx_store_grn_BRCODE" class="store_grnview" type="text/html">
<span id="el_store_grn_BRCODE">
<span<?php echo $store_grn->BRCODE->viewAttributes() ?>>
<?php echo $store_grn->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_PharmacyID"><script id="tpc_store_grn_PharmacyID" class="store_grnview" type="text/html"><span><?php echo $store_grn->PharmacyID->caption() ?></span></script></span></td>
		<td data-name="PharmacyID"<?php echo $store_grn->PharmacyID->cellAttributes() ?>>
<script id="tpx_store_grn_PharmacyID" class="store_grnview" type="text/html">
<span id="el_store_grn_PharmacyID">
<span<?php echo $store_grn->PharmacyID->viewAttributes() ?>>
<?php echo $store_grn->PharmacyID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BillTotalValue"><script id="tpc_store_grn_BillTotalValue" class="store_grnview" type="text/html"><span><?php echo $store_grn->BillTotalValue->caption() ?></span></script></span></td>
		<td data-name="BillTotalValue"<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_BillTotalValue" class="store_grnview" type="text/html">
<span id="el_store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $store_grn->BillTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_GRNTotalValue"><script id="tpc_store_grn_GRNTotalValue" class="store_grnview" type="text/html"><span><?php echo $store_grn->GRNTotalValue->caption() ?></span></script></span></td>
		<td data-name="GRNTotalValue"<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_GRNTotalValue" class="store_grnview" type="text/html">
<span id="el_store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BillDiscount"><script id="tpc_store_grn_BillDiscount" class="store_grnview" type="text/html"><span><?php echo $store_grn->BillDiscount->caption() ?></span></script></span></td>
		<td data-name="BillDiscount"<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<script id="tpx_store_grn_BillDiscount" class="store_grnview" type="text/html">
<span id="el_store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<?php echo $store_grn->BillDiscount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_BillUpload"><script id="tpc_store_grn_BillUpload" class="store_grnview" type="text/html"><span><?php echo $store_grn->BillUpload->caption() ?></span></script></span></td>
		<td data-name="BillUpload"<?php echo $store_grn->BillUpload->cellAttributes() ?>>
<script id="tpx_store_grn_BillUpload" class="store_grnview" type="text/html">
<span id="el_store_grn_BillUpload">
<span>
<?php echo GetFileViewTag($store_grn->BillUpload, $store_grn->BillUpload->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_TransPort"><script id="tpc_store_grn_TransPort" class="store_grnview" type="text/html"><span><?php echo $store_grn->TransPort->caption() ?></span></script></span></td>
		<td data-name="TransPort"<?php echo $store_grn->TransPort->cellAttributes() ?>>
<script id="tpx_store_grn_TransPort" class="store_grnview" type="text/html">
<span id="el_store_grn_TransPort">
<span<?php echo $store_grn->TransPort->viewAttributes() ?>>
<?php echo $store_grn->TransPort->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_AnyOther"><script id="tpc_store_grn_AnyOther" class="store_grnview" type="text/html"><span><?php echo $store_grn->AnyOther->caption() ?></span></script></span></td>
		<td data-name="AnyOther"<?php echo $store_grn->AnyOther->cellAttributes() ?>>
<script id="tpx_store_grn_AnyOther" class="store_grnview" type="text/html">
<span id="el_store_grn_AnyOther">
<span<?php echo $store_grn->AnyOther->viewAttributes() ?>>
<?php echo $store_grn->AnyOther->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Remarks"><script id="tpc_store_grn_Remarks" class="store_grnview" type="text/html"><span><?php echo $store_grn->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $store_grn->Remarks->cellAttributes() ?>>
<script id="tpx_store_grn_Remarks" class="store_grnview" type="text/html">
<span id="el_store_grn_Remarks">
<span<?php echo $store_grn->Remarks->viewAttributes() ?>>
<?php echo $store_grn->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
	<tr id="r_GrnValue">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_GrnValue"><script id="tpc_store_grn_GrnValue" class="store_grnview" type="text/html"><span><?php echo $store_grn->GrnValue->caption() ?></span></script></span></td>
		<td data-name="GrnValue"<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<script id="tpx_store_grn_GrnValue" class="store_grnview" type="text/html">
<span id="el_store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<?php echo $store_grn->GrnValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
	<tr id="r_Pid">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_Pid"><script id="tpc_store_grn_Pid" class="store_grnview" type="text/html"><span><?php echo $store_grn->Pid->caption() ?></span></script></span></td>
		<td data-name="Pid"<?php echo $store_grn->Pid->cellAttributes() ?>>
<script id="tpx_store_grn_Pid" class="store_grnview" type="text/html">
<span id="el_store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<?php echo $store_grn->Pid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
	<tr id="r_PaymentNo">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_PaymentNo"><script id="tpc_store_grn_PaymentNo" class="store_grnview" type="text/html"><span><?php echo $store_grn->PaymentNo->caption() ?></span></script></span></td>
		<td data-name="PaymentNo"<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentNo" class="store_grnview" type="text/html">
<span id="el_store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<?php echo $store_grn->PaymentNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_PaymentStatus"><script id="tpc_store_grn_PaymentStatus" class="store_grnview" type="text/html"><span><?php echo $store_grn->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentStatus" class="store_grnview" type="text/html">
<span id="el_store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $store_grn->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_PaidAmount"><script id="tpc_store_grn_PaidAmount" class="store_grnview" type="text/html"><span><?php echo $store_grn->PaidAmount->caption() ?></span></script></span></td>
		<td data-name="PaidAmount"<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<script id="tpx_store_grn_PaidAmount" class="store_grnview" type="text/html">
<span id="el_store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<?php echo $store_grn->PaidAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_grn_view->TableLeftColumnClass ?>"><span id="elh_store_grn_StoreID"><script id="tpc_store_grn_StoreID" class="store_grnview" type="text/html"><span><?php echo $store_grn->StoreID->caption() ?></span></script></span></td>
		<td data-name="StoreID"<?php echo $store_grn->StoreID->cellAttributes() ?>>
<script id="tpx_store_grn_StoreID" class="store_grnview" type="text/html">
<span id="el_store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<?php echo $store_grn->StoreID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_store_grnview" class="ew-custom-template"></div>
<script id="tpm_store_grnview" type="text/html">
<div id="ct_store_grn_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_grn_GRNNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNNO"/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_store_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_store_grn_pharmacy_pocol"/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BRCODE"/}}&nbsp;{{include tmpl="#tpx_store_grn_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_PC"/}}&nbsp;{{include tmpl="#tpx_store_grn_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_DT"/}}&nbsp;{{include tmpl="#tpx_store_grn_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_YM"/}}&nbsp;{{include tmpl="#tpx_store_grn_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customercode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customername"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLDT"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLDT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLNO"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillUpload"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillUpload"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Remarks"/}}&nbsp;{{include tmpl="#tpx_store_grn_Remarks"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address1"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address2"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address3"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_State"/}}&nbsp;{{include tmpl="#tpx_store_grn_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Pincode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Fax"/}}&nbsp;{{include tmpl="#tpx_store_grn_Fax"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Phone"/}}&nbsp;{{include tmpl="#tpx_store_grn_Phone"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GRNTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_TransPort"/}}&nbsp;{{include tmpl="#tpx_store_grn_TransPort"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_AnyOther"/}}&nbsp;{{include tmpl="#tpx_store_grn_AnyOther"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillDiscount"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillDiscount"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GrnValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GrnValue"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_store_grn", explode(",", $store_grn->getCurrentDetailTable())) && $view_store_grn->DetailView) {
?>
<?php if ($store_grn->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_store_grngrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($store_grn->Rows) ?> };
ew.applyTemplate("tpd_store_grnview", "tpm_store_grnview", "store_grnview", "<?php echo $store_grn->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.store_grnview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$store_grn_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_grn_view->terminate();
?>