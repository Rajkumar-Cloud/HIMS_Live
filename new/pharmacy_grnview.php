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
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_grn_view->isExport()) { ?>
<script>
var fpharmacy_grnview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_grnview = currentForm = new ew.Form("fpharmacy_grnview", "view");
	loadjs.done("fpharmacy_grnview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
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
});
</script>
<?php } ?>
<?php if (!$pharmacy_grn_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_grn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_grn_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_id"><script id="tpc_pharmacy_grn_id" type="text/html"><?php echo $pharmacy_grn_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $pharmacy_grn_view->id->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_id" type="text/html"><span id="el_pharmacy_grn_id">
<span<?php echo $pharmacy_grn_view->id->viewAttributes() ?>><?php echo $pharmacy_grn_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->GRNNO->Visible) { // GRNNO ?>
	<tr id="r_GRNNO">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GRNNO"><script id="tpc_pharmacy_grn_GRNNO" type="text/html"><?php echo $pharmacy_grn_view->GRNNO->caption() ?></script></span></td>
		<td data-name="GRNNO" <?php echo $pharmacy_grn_view->GRNNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNNO" type="text/html"><span id="el_pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn_view->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn_view->GRNNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_DT"><script id="tpc_pharmacy_grn_DT" type="text/html"><?php echo $pharmacy_grn_view->DT->caption() ?></script></span></td>
		<td data-name="DT" <?php echo $pharmacy_grn_view->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_DT" type="text/html"><span id="el_pharmacy_grn_DT">
<span<?php echo $pharmacy_grn_view->DT->viewAttributes() ?>><?php echo $pharmacy_grn_view->DT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_YM"><script id="tpc_pharmacy_grn_YM" type="text/html"><?php echo $pharmacy_grn_view->YM->caption() ?></script></span></td>
		<td data-name="YM" <?php echo $pharmacy_grn_view->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_YM" type="text/html"><span id="el_pharmacy_grn_YM">
<span<?php echo $pharmacy_grn_view->YM->viewAttributes() ?>><?php echo $pharmacy_grn_view->YM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PC"><script id="tpc_pharmacy_grn_PC" type="text/html"><?php echo $pharmacy_grn_view->PC->caption() ?></script></span></td>
		<td data-name="PC" <?php echo $pharmacy_grn_view->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PC" type="text/html"><span id="el_pharmacy_grn_PC">
<span<?php echo $pharmacy_grn_view->PC->viewAttributes() ?>><?php echo $pharmacy_grn_view->PC->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Customercode->Visible) { // Customercode ?>
	<tr id="r_Customercode">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Customercode"><script id="tpc_pharmacy_grn_Customercode" type="text/html"><?php echo $pharmacy_grn_view->Customercode->caption() ?></script></span></td>
		<td data-name="Customercode" <?php echo $pharmacy_grn_view->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customercode" type="text/html"><span id="el_pharmacy_grn_Customercode">
<span<?php echo $pharmacy_grn_view->Customercode->viewAttributes() ?>><?php echo $pharmacy_grn_view->Customercode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Customername->Visible) { // Customername ?>
	<tr id="r_Customername">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Customername"><script id="tpc_pharmacy_grn_Customername" type="text/html"><?php echo $pharmacy_grn_view->Customername->caption() ?></script></span></td>
		<td data-name="Customername" <?php echo $pharmacy_grn_view->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customername" type="text/html"><span id="el_pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn_view->Customername->viewAttributes() ?>><?php echo $pharmacy_grn_view->Customername->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<tr id="r_pharmacy_pocol">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_pharmacy_pocol"><script id="tpc_pharmacy_grn_pharmacy_pocol" type="text/html"><?php echo $pharmacy_grn_view->pharmacy_pocol->caption() ?></script></span></td>
		<td data-name="pharmacy_pocol" <?php echo $pharmacy_grn_view->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_pharmacy_pocol" type="text/html"><span id="el_pharmacy_grn_pharmacy_pocol">
<span<?php echo $pharmacy_grn_view->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_grn_view->pharmacy_pocol->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Address1->Visible) { // Address1 ?>
	<tr id="r_Address1">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address1"><script id="tpc_pharmacy_grn_Address1" type="text/html"><?php echo $pharmacy_grn_view->Address1->caption() ?></script></span></td>
		<td data-name="Address1" <?php echo $pharmacy_grn_view->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address1" type="text/html"><span id="el_pharmacy_grn_Address1">
<span<?php echo $pharmacy_grn_view->Address1->viewAttributes() ?>><?php echo $pharmacy_grn_view->Address1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Address2->Visible) { // Address2 ?>
	<tr id="r_Address2">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address2"><script id="tpc_pharmacy_grn_Address2" type="text/html"><?php echo $pharmacy_grn_view->Address2->caption() ?></script></span></td>
		<td data-name="Address2" <?php echo $pharmacy_grn_view->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address2" type="text/html"><span id="el_pharmacy_grn_Address2">
<span<?php echo $pharmacy_grn_view->Address2->viewAttributes() ?>><?php echo $pharmacy_grn_view->Address2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Address3->Visible) { // Address3 ?>
	<tr id="r_Address3">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Address3"><script id="tpc_pharmacy_grn_Address3" type="text/html"><?php echo $pharmacy_grn_view->Address3->caption() ?></script></span></td>
		<td data-name="Address3" <?php echo $pharmacy_grn_view->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address3" type="text/html"><span id="el_pharmacy_grn_Address3">
<span<?php echo $pharmacy_grn_view->Address3->viewAttributes() ?>><?php echo $pharmacy_grn_view->Address3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_State"><script id="tpc_pharmacy_grn_State" type="text/html"><?php echo $pharmacy_grn_view->State->caption() ?></script></span></td>
		<td data-name="State" <?php echo $pharmacy_grn_view->State->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_State" type="text/html"><span id="el_pharmacy_grn_State">
<span<?php echo $pharmacy_grn_view->State->viewAttributes() ?>><?php echo $pharmacy_grn_view->State->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Pincode->Visible) { // Pincode ?>
	<tr id="r_Pincode">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Pincode"><script id="tpc_pharmacy_grn_Pincode" type="text/html"><?php echo $pharmacy_grn_view->Pincode->caption() ?></script></span></td>
		<td data-name="Pincode" <?php echo $pharmacy_grn_view->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pincode" type="text/html"><span id="el_pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn_view->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn_view->Pincode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Phone->Visible) { // Phone ?>
	<tr id="r_Phone">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Phone"><script id="tpc_pharmacy_grn_Phone" type="text/html"><?php echo $pharmacy_grn_view->Phone->caption() ?></script></span></td>
		<td data-name="Phone" <?php echo $pharmacy_grn_view->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Phone" type="text/html"><span id="el_pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn_view->Phone->viewAttributes() ?>><?php echo $pharmacy_grn_view->Phone->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Fax->Visible) { // Fax ?>
	<tr id="r_Fax">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Fax"><script id="tpc_pharmacy_grn_Fax" type="text/html"><?php echo $pharmacy_grn_view->Fax->caption() ?></script></span></td>
		<td data-name="Fax" <?php echo $pharmacy_grn_view->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Fax" type="text/html"><span id="el_pharmacy_grn_Fax">
<span<?php echo $pharmacy_grn_view->Fax->viewAttributes() ?>><?php echo $pharmacy_grn_view->Fax->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->EEmail->Visible) { // EEmail ?>
	<tr id="r_EEmail">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_EEmail"><script id="tpc_pharmacy_grn_EEmail" type="text/html"><?php echo $pharmacy_grn_view->EEmail->caption() ?></script></span></td>
		<td data-name="EEmail" <?php echo $pharmacy_grn_view->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_EEmail" type="text/html"><span id="el_pharmacy_grn_EEmail">
<span<?php echo $pharmacy_grn_view->EEmail->viewAttributes() ?>><?php echo $pharmacy_grn_view->EEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_HospID"><script id="tpc_pharmacy_grn_HospID" type="text/html"><?php echo $pharmacy_grn_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $pharmacy_grn_view->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_HospID" type="text/html"><span id="el_pharmacy_grn_HospID">
<span<?php echo $pharmacy_grn_view->HospID->viewAttributes() ?>><?php echo $pharmacy_grn_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_createdby"><script id="tpc_pharmacy_grn_createdby" type="text/html"><?php echo $pharmacy_grn_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $pharmacy_grn_view->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_createdby" type="text/html"><span id="el_pharmacy_grn_createdby">
<span<?php echo $pharmacy_grn_view->createdby->viewAttributes() ?>><?php echo $pharmacy_grn_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_createddatetime"><script id="tpc_pharmacy_grn_createddatetime" type="text/html"><?php echo $pharmacy_grn_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_grn_view->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_createddatetime" type="text/html"><span id="el_pharmacy_grn_createddatetime">
<span<?php echo $pharmacy_grn_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_grn_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_modifiedby"><script id="tpc_pharmacy_grn_modifiedby" type="text/html"><?php echo $pharmacy_grn_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_grn_view->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_modifiedby" type="text/html"><span id="el_pharmacy_grn_modifiedby">
<span<?php echo $pharmacy_grn_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_grn_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_modifieddatetime"><script id="tpc_pharmacy_grn_modifieddatetime" type="text/html"><?php echo $pharmacy_grn_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_grn_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_modifieddatetime" type="text/html"><span id="el_pharmacy_grn_modifieddatetime">
<span<?php echo $pharmacy_grn_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_grn_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BILLNO->Visible) { // BILLNO ?>
	<tr id="r_BILLNO">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BILLNO"><script id="tpc_pharmacy_grn_BILLNO" type="text/html"><?php echo $pharmacy_grn_view->BILLNO->caption() ?></script></span></td>
		<td data-name="BILLNO" <?php echo $pharmacy_grn_view->BILLNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLNO" type="text/html"><span id="el_pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn_view->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn_view->BILLNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BILLDT->Visible) { // BILLDT ?>
	<tr id="r_BILLDT">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BILLDT"><script id="tpc_pharmacy_grn_BILLDT" type="text/html"><?php echo $pharmacy_grn_view->BILLDT->caption() ?></script></span></td>
		<td data-name="BILLDT" <?php echo $pharmacy_grn_view->BILLDT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLDT" type="text/html"><span id="el_pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn_view->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn_view->BILLDT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BRCODE"><script id="tpc_pharmacy_grn_BRCODE" type="text/html"><?php echo $pharmacy_grn_view->BRCODE->caption() ?></script></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_grn_view->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BRCODE" type="text/html"><span id="el_pharmacy_grn_BRCODE">
<span<?php echo $pharmacy_grn_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_grn_view->BRCODE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->PharmacyID->Visible) { // PharmacyID ?>
	<tr id="r_PharmacyID">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PharmacyID"><script id="tpc_pharmacy_grn_PharmacyID" type="text/html"><?php echo $pharmacy_grn_view->PharmacyID->caption() ?></script></span></td>
		<td data-name="PharmacyID" <?php echo $pharmacy_grn_view->PharmacyID->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PharmacyID" type="text/html"><span id="el_pharmacy_grn_PharmacyID">
<span<?php echo $pharmacy_grn_view->PharmacyID->viewAttributes() ?>><?php echo $pharmacy_grn_view->PharmacyID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BillTotalValue->Visible) { // BillTotalValue ?>
	<tr id="r_BillTotalValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillTotalValue"><script id="tpc_pharmacy_grn_BillTotalValue" type="text/html"><?php echo $pharmacy_grn_view->BillTotalValue->caption() ?></script></span></td>
		<td data-name="BillTotalValue" <?php echo $pharmacy_grn_view->BillTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillTotalValue" type="text/html"><span id="el_pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn_view->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_view->BillTotalValue->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<tr id="r_GRNTotalValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GRNTotalValue"><script id="tpc_pharmacy_grn_GRNTotalValue" type="text/html"><?php echo $pharmacy_grn_view->GRNTotalValue->caption() ?></script></span></td>
		<td data-name="GRNTotalValue" <?php echo $pharmacy_grn_view->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNTotalValue" type="text/html"><span id="el_pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn_view->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_view->GRNTotalValue->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BillDiscount->Visible) { // BillDiscount ?>
	<tr id="r_BillDiscount">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillDiscount"><script id="tpc_pharmacy_grn_BillDiscount" type="text/html"><?php echo $pharmacy_grn_view->BillDiscount->caption() ?></script></span></td>
		<td data-name="BillDiscount" <?php echo $pharmacy_grn_view->BillDiscount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillDiscount" type="text/html"><span id="el_pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn_view->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn_view->BillDiscount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->BillUpload->Visible) { // BillUpload ?>
	<tr id="r_BillUpload">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_BillUpload"><script id="tpc_pharmacy_grn_BillUpload" type="text/html"><?php echo $pharmacy_grn_view->BillUpload->caption() ?></script></span></td>
		<td data-name="BillUpload" <?php echo $pharmacy_grn_view->BillUpload->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillUpload" type="text/html"><span id="el_pharmacy_grn_BillUpload">
<span><?php echo GetFileViewTag($pharmacy_grn_view->BillUpload, $pharmacy_grn_view->BillUpload->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->TransPort->Visible) { // TransPort ?>
	<tr id="r_TransPort">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_TransPort"><script id="tpc_pharmacy_grn_TransPort" type="text/html"><?php echo $pharmacy_grn_view->TransPort->caption() ?></script></span></td>
		<td data-name="TransPort" <?php echo $pharmacy_grn_view->TransPort->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_TransPort" type="text/html"><span id="el_pharmacy_grn_TransPort">
<span<?php echo $pharmacy_grn_view->TransPort->viewAttributes() ?>><?php echo $pharmacy_grn_view->TransPort->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->AnyOther->Visible) { // AnyOther ?>
	<tr id="r_AnyOther">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_AnyOther"><script id="tpc_pharmacy_grn_AnyOther" type="text/html"><?php echo $pharmacy_grn_view->AnyOther->caption() ?></script></span></td>
		<td data-name="AnyOther" <?php echo $pharmacy_grn_view->AnyOther->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_AnyOther" type="text/html"><span id="el_pharmacy_grn_AnyOther">
<span<?php echo $pharmacy_grn_view->AnyOther->viewAttributes() ?>><?php echo $pharmacy_grn_view->AnyOther->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Remarks"><script id="tpc_pharmacy_grn_Remarks" type="text/html"><?php echo $pharmacy_grn_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $pharmacy_grn_view->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Remarks" type="text/html"><span id="el_pharmacy_grn_Remarks">
<span<?php echo $pharmacy_grn_view->Remarks->viewAttributes() ?>><?php echo $pharmacy_grn_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->GrnValue->Visible) { // GrnValue ?>
	<tr id="r_GrnValue">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_GrnValue"><script id="tpc_pharmacy_grn_GrnValue" type="text/html"><?php echo $pharmacy_grn_view->GrnValue->caption() ?></script></span></td>
		<td data-name="GrnValue" <?php echo $pharmacy_grn_view->GrnValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GrnValue" type="text/html"><span id="el_pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn_view->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn_view->GrnValue->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->Pid->Visible) { // Pid ?>
	<tr id="r_Pid">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_Pid"><script id="tpc_pharmacy_grn_Pid" type="text/html"><?php echo $pharmacy_grn_view->Pid->caption() ?></script></span></td>
		<td data-name="Pid" <?php echo $pharmacy_grn_view->Pid->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pid" type="text/html"><span id="el_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_view->Pid->viewAttributes() ?>><?php echo $pharmacy_grn_view->Pid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->PaymentNo->Visible) { // PaymentNo ?>
	<tr id="r_PaymentNo">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaymentNo"><script id="tpc_pharmacy_grn_PaymentNo" type="text/html"><?php echo $pharmacy_grn_view->PaymentNo->caption() ?></script></span></td>
		<td data-name="PaymentNo" <?php echo $pharmacy_grn_view->PaymentNo->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentNo" type="text/html"><span id="el_pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn_view->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn_view->PaymentNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaymentStatus"><script id="tpc_pharmacy_grn_PaymentStatus" type="text/html"><?php echo $pharmacy_grn_view->PaymentStatus->caption() ?></script></span></td>
		<td data-name="PaymentStatus" <?php echo $pharmacy_grn_view->PaymentStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentStatus" type="text/html"><span id="el_pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn_view->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn_view->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_grn_view->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $pharmacy_grn_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_grn_PaidAmount"><script id="tpc_pharmacy_grn_PaidAmount" type="text/html"><?php echo $pharmacy_grn_view->PaidAmount->caption() ?></script></span></td>
		<td data-name="PaidAmount" <?php echo $pharmacy_grn_view->PaidAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaidAmount" type="text/html"><span id="el_pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn_view->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn_view->PaidAmount->getViewValue() ?></span>
</span></script>
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
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_grn_GRNNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNNO")/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_pharmacy_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_pharmacy_pocol")/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BRCODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BRCODE")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_YM")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLDT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLDT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLNO")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillUpload"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillUpload")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Remarks")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address2")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Fax")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Phone")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GRNTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_TransPort"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_TransPort")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_AnyOther"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_AnyOther")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillDiscount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillDiscount")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GrnValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GrnValue")/}}</span>
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
<?php if ($pharmacy_grn->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacygrn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacygrngrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_grn->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_grnview", "tpm_pharmacy_grnview", "pharmacy_grnview", "<?php echo $pharmacy_grn->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_grnview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_grn_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_grn_view->isExport()) { ?>
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
$pharmacy_grn_view->terminate();
?>