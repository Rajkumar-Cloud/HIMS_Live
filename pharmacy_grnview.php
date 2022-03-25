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
$pharmacy_grn_view = new pharmacy_grn_view();

// Run the page
$pharmacy_grn_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_grnview = currentForm = new ew.Form("fpharmacy_grnview", "view");

// Form_CustomValidate event
fpharmacy_grnview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_grnview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_grnview.lists["x_PC"] = <?php echo $pharmacy_grn_view->PC->Lookup->toClientList() ?>;
fpharmacy_grnview.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_grn_view->PC->lookupOptions()) ?>;
fpharmacy_grnview.lists["x_BRCODE"] = <?php echo $pharmacy_grn_view->BRCODE->Lookup->toClientList() ?>;
fpharmacy_grnview.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_grn_view->BRCODE->lookupOptions()) ?>;

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
<?php if (!$pharmacy_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_grn_view->ExportOptions->render("body") ?>
<?php $pharmacy_grn_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_grn_view->showPageHeader(); ?>
<?php
$pharmacy_grn_view->showMessage();
?>
<form name="fpharmacy_grnview" id="fpharmacy_grnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_grn_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_grn_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_grn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_grn->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_id"><script id="tpc_pharmacy_grn_id" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $pharmacy_grn->id->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_id" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<?php echo $pharmacy_grn->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
	<tr id="r_GRNNO">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GRNNO"><script id="tpc_pharmacy_grn_GRNNO" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->GRNNO->caption() ?></span></script></span></td>
		<td data-name="GRNNO"<?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNNO" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_DT"><script id="tpc_pharmacy_grn_DT" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->DT->caption() ?></span></script></span></td>
		<td data-name="DT"<?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_DT" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_YM"><script id="tpc_pharmacy_grn_YM" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->YM->caption() ?></span></script></span></td>
		<td data-name="YM"<?php echo $pharmacy_grn->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_YM" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_YM">
<span<?php echo $pharmacy_grn->YM->viewAttributes() ?>>
<?php echo $pharmacy_grn->YM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PC"><script id="tpc_pharmacy_grn_PC" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->PC->caption() ?></span></script></span></td>
		<td data-name="PC"<?php echo $pharmacy_grn->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PC" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_PC">
<span<?php echo $pharmacy_grn->PC->viewAttributes() ?>>
<?php echo $pharmacy_grn->PC->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Customercode"><script id="tpc_pharmacy_grn_Customercode" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Customercode->caption() ?></span></script></span></td>
		<td data-name="Customercode"<?php echo $pharmacy_grn->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customercode" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Customercode">
<span<?php echo $pharmacy_grn->Customercode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customercode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Customername"><script id="tpc_pharmacy_grn_Customername" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Customername->caption() ?></span></script></span></td>
		<td data-name="Customername"<?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customername" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_pharmacy_pocol"><script id="tpc_pharmacy_grn_pharmacy_pocol" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->pharmacy_pocol->caption() ?></span></script></span></td>
		<td data-name="pharmacy_pocol"<?php echo $pharmacy_grn->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_pharmacy_pocol" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_pharmacy_pocol">
<span<?php echo $pharmacy_grn->pharmacy_pocol->viewAttributes() ?>>
<?php echo $pharmacy_grn->pharmacy_pocol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address1"><script id="tpc_pharmacy_grn_Address1" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Address1->caption() ?></span></script></span></td>
		<td data-name="Address1"<?php echo $pharmacy_grn->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address1" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Address1">
<span<?php echo $pharmacy_grn->Address1->viewAttributes() ?>>
<?php echo $pharmacy_grn->Address1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address2"><script id="tpc_pharmacy_grn_Address2" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Address2->caption() ?></span></script></span></td>
		<td data-name="Address2"<?php echo $pharmacy_grn->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address2" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Address2">
<span<?php echo $pharmacy_grn->Address2->viewAttributes() ?>>
<?php echo $pharmacy_grn->Address2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address3"><script id="tpc_pharmacy_grn_Address3" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Address3->caption() ?></span></script></span></td>
		<td data-name="Address3"<?php echo $pharmacy_grn->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address3" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Address3">
<span<?php echo $pharmacy_grn->Address3->viewAttributes() ?>>
<?php echo $pharmacy_grn->Address3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_State"><script id="tpc_pharmacy_grn_State" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->State->caption() ?></span></script></span></td>
		<td data-name="State"<?php echo $pharmacy_grn->State->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_State" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<?php echo $pharmacy_grn->State->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Pincode"><script id="tpc_pharmacy_grn_Pincode" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Pincode->caption() ?></span></script></span></td>
		<td data-name="Pincode"<?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pincode" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Phone"><script id="tpc_pharmacy_grn_Phone" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Phone->caption() ?></span></script></span></td>
		<td data-name="Phone"<?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Phone" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Fax"><script id="tpc_pharmacy_grn_Fax" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Fax->caption() ?></span></script></span></td>
		<td data-name="Fax"<?php echo $pharmacy_grn->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Fax" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Fax">
<span<?php echo $pharmacy_grn->Fax->viewAttributes() ?>>
<?php echo $pharmacy_grn->Fax->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_EEmail"><script id="tpc_pharmacy_grn_EEmail" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->EEmail->caption() ?></span></script></span></td>
		<td data-name="EEmail"<?php echo $pharmacy_grn->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_EEmail" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_EEmail">
<span<?php echo $pharmacy_grn->EEmail->viewAttributes() ?>>
<?php echo $pharmacy_grn->EEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_HospID"><script id="tpc_pharmacy_grn_HospID" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $pharmacy_grn->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_HospID" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_HospID">
<span<?php echo $pharmacy_grn->HospID->viewAttributes() ?>>
<?php echo $pharmacy_grn->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_createdby"><script id="tpc_pharmacy_grn_createdby" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $pharmacy_grn->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_createdby" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_createdby">
<span<?php echo $pharmacy_grn->createdby->viewAttributes() ?>>
<?php echo $pharmacy_grn->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_createddatetime"><script id="tpc_pharmacy_grn_createddatetime" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_grn->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_createddatetime" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_createddatetime">
<span<?php echo $pharmacy_grn->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_grn->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_modifiedby"><script id="tpc_pharmacy_grn_modifiedby" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_grn->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_modifiedby" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_modifiedby">
<span<?php echo $pharmacy_grn->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_grn->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_modifieddatetime"><script id="tpc_pharmacy_grn_modifieddatetime" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_grn->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_modifieddatetime" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_modifieddatetime">
<span<?php echo $pharmacy_grn->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_grn->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BILLNO"><script id="tpc_pharmacy_grn_BILLNO" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BILLNO->caption() ?></span></script></span></td>
		<td data-name="BILLNO"<?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLNO" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BILLDT"><script id="tpc_pharmacy_grn_BILLDT" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BILLDT->caption() ?></span></script></span></td>
		<td data-name="BILLDT"<?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLDT" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BRCODE"><script id="tpc_pharmacy_grn_BRCODE" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BRCODE->caption() ?></span></script></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_grn->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BRCODE" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BRCODE">
<span<?php echo $pharmacy_grn->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_grn->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PharmacyID"><script id="tpc_pharmacy_grn_PharmacyID" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->PharmacyID->caption() ?></span></script></span></td>
		<td data-name="PharmacyID"<?php echo $pharmacy_grn->PharmacyID->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PharmacyID" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_PharmacyID">
<span<?php echo $pharmacy_grn->PharmacyID->viewAttributes() ?>>
<?php echo $pharmacy_grn->PharmacyID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillTotalValue"><script id="tpc_pharmacy_grn_BillTotalValue" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BillTotalValue->caption() ?></span></script></span></td>
		<td data-name="BillTotalValue"<?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillTotalValue" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GRNTotalValue"><script id="tpc_pharmacy_grn_GRNTotalValue" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></span></script></span></td>
		<td data-name="GRNTotalValue"<?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNTotalValue" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillDiscount"><script id="tpc_pharmacy_grn_BillDiscount" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BillDiscount->caption() ?></span></script></span></td>
		<td data-name="BillDiscount"<?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillDiscount" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillUpload"><script id="tpc_pharmacy_grn_BillUpload" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->BillUpload->caption() ?></span></script></span></td>
		<td data-name="BillUpload"<?php echo $pharmacy_grn->BillUpload->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillUpload" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_BillUpload">
<span>
<?php echo GetFileViewTag($pharmacy_grn->BillUpload, $pharmacy_grn->BillUpload->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_TransPort"><script id="tpc_pharmacy_grn_TransPort" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->TransPort->caption() ?></span></script></span></td>
		<td data-name="TransPort"<?php echo $pharmacy_grn->TransPort->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_TransPort" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_TransPort">
<span<?php echo $pharmacy_grn->TransPort->viewAttributes() ?>>
<?php echo $pharmacy_grn->TransPort->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_AnyOther"><script id="tpc_pharmacy_grn_AnyOther" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->AnyOther->caption() ?></span></script></span></td>
		<td data-name="AnyOther"<?php echo $pharmacy_grn->AnyOther->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_AnyOther" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_AnyOther">
<span<?php echo $pharmacy_grn->AnyOther->viewAttributes() ?>>
<?php echo $pharmacy_grn->AnyOther->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Remarks"><script id="tpc_pharmacy_grn_Remarks" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $pharmacy_grn->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Remarks" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Remarks">
<span<?php echo $pharmacy_grn->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_grn->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
	<tr id="r_GrnValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GrnValue"><script id="tpc_pharmacy_grn_GrnValue" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->GrnValue->caption() ?></span></script></span></td>
		<td data-name="GrnValue"<?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GrnValue" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
	<tr id="r_Pid">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Pid"><script id="tpc_pharmacy_grn_Pid" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->Pid->caption() ?></span></script></span></td>
		<td data-name="Pid"<?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pid" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
	<tr id="r_PaymentNo">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaymentNo"><script id="tpc_pharmacy_grn_PaymentNo" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->PaymentNo->caption() ?></span></script></span></td>
		<td data-name="PaymentNo"<?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentNo" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaymentStatus"><script id="tpc_pharmacy_grn_PaymentStatus" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentStatus" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaidAmount"><script id="tpc_pharmacy_grn_PaidAmount" class="pharmacy_grnview" type="text/html"><span><?php echo $pharmacy_grn->PaidAmount->caption() ?></span></script></span></td>
		<td data-name="PaidAmount"<?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaidAmount" class="pharmacy_grnview" type="text/html">
<span id="el_pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_grnview" class="ew-custom-template"></div>
<script id="tpm_pharmacy_grnview" type="text/html">
<div id="ct_pharmacy_grn_view"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_grn_GRNNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_GRNNO"/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_pharmacy_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_pharmacy_pocol"/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BRCODE"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_PC"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_DT"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_YM"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customercode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customername"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLDT"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BILLDT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLNO"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BILLNO"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillTotalValue"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BillTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillUpload"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BillUpload"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Remarks"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Remarks"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address1"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address2"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address3"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_State"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Pincode"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Fax"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Fax"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Phone"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_Phone"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GRNTotalValue"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_GRNTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_TransPort"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_TransPort"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_AnyOther"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_AnyOther"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillDiscount"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_BillDiscount"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GrnValue"/}}&nbsp;{{include tmpl="#tpx_pharmacy_grn_GrnValue"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_pharmacygrn", explode(",", $pharmacy_grn->getCurrentDetailTable())) && $view_pharmacygrn->DetailView) {
?>
<?php if ($pharmacy_grn->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_pharmacygrn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacygrngrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_grn->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_grnview", "tpm_pharmacy_grnview", "pharmacy_grnview", "<?php echo $pharmacy_grn->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_grnview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_grn_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_grn_view->terminate();
?>