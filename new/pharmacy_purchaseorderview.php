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
$pharmacy_purchaseorder_view = new pharmacy_purchaseorder_view();

// Run the page
$pharmacy_purchaseorder_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchaseorder_view->isExport()) { ?>
<script>
var fpharmacy_purchaseorderview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_purchaseorderview = currentForm = new ew.Form("fpharmacy_purchaseorderview", "view");
	loadjs.done("fpharmacy_purchaseorderview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_purchaseorder_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_purchaseorder_view->ExportOptions->render("body") ?>
<?php $pharmacy_purchaseorder_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_purchaseorder_view->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_view->showMessage();
?>
<form name="fpharmacy_purchaseorderview" id="fpharmacy_purchaseorderview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchaseorder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchaseorder_view->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ORDNO"><?php echo $pharmacy_purchaseorder_view->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO" <?php echo $pharmacy_purchaseorder_view->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<span<?php echo $pharmacy_purchaseorder_view->ORDNO->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PRC"><?php echo $pharmacy_purchaseorder_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_purchaseorder_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder_view->PRC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_QTY"><?php echo $pharmacy_purchaseorder_view->QTY->caption() ?></span></td>
		<td data-name="QTY" <?php echo $pharmacy_purchaseorder_view->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder_view->QTY->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_DT"><?php echo $pharmacy_purchaseorder_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $pharmacy_purchaseorder_view->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<span<?php echo $pharmacy_purchaseorder_view->DT->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PC"><?php echo $pharmacy_purchaseorder_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $pharmacy_purchaseorder_view->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<span<?php echo $pharmacy_purchaseorder_view->PC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_YM"><?php echo $pharmacy_purchaseorder_view->YM->caption() ?></span></td>
		<td data-name="YM" <?php echo $pharmacy_purchaseorder_view->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<span<?php echo $pharmacy_purchaseorder_view->YM->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_MFRCODE"><?php echo $pharmacy_purchaseorder_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $pharmacy_purchaseorder_view->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<span<?php echo $pharmacy_purchaseorder_view->MFRCODE->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Stock"><?php echo $pharmacy_purchaseorder_view->Stock->caption() ?></span></td>
		<td data-name="Stock" <?php echo $pharmacy_purchaseorder_view->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder_view->Stock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale"><?php echo $pharmacy_purchaseorder_view->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale" <?php echo $pharmacy_purchaseorder_view->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder_view->LastMonthSale->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Printcheck"><?php echo $pharmacy_purchaseorder_view->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck" <?php echo $pharmacy_purchaseorder_view->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<span<?php echo $pharmacy_purchaseorder_view->Printcheck->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_id"><?php echo $pharmacy_purchaseorder_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_purchaseorder_view->id->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_id">
<span<?php echo $pharmacy_purchaseorder_view->id->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_poid"><?php echo $pharmacy_purchaseorder_view->poid->caption() ?></span></td>
		<td data-name="poid" <?php echo $pharmacy_purchaseorder_view->poid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_poid">
<span<?php echo $pharmacy_purchaseorder_view->poid->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PSGST"><?php echo $pharmacy_purchaseorder_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $pharmacy_purchaseorder_view->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<span<?php echo $pharmacy_purchaseorder_view->PSGST->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PCGST"><?php echo $pharmacy_purchaseorder_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $pharmacy_purchaseorder_view->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<span<?php echo $pharmacy_purchaseorder_view->PCGST->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SSGST"><?php echo $pharmacy_purchaseorder_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $pharmacy_purchaseorder_view->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<span<?php echo $pharmacy_purchaseorder_view->SSGST->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SCGST"><?php echo $pharmacy_purchaseorder_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $pharmacy_purchaseorder_view->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<span<?php echo $pharmacy_purchaseorder_view->SCGST->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BRCODE"><?php echo $pharmacy_purchaseorder_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_purchaseorder_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<span<?php echo $pharmacy_purchaseorder_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HSN"><?php echo $pharmacy_purchaseorder_view->HSN->caption() ?></span></td>
		<td data-name="HSN" <?php echo $pharmacy_purchaseorder_view->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<span<?php echo $pharmacy_purchaseorder_view->HSN->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Pack"><?php echo $pharmacy_purchaseorder_view->Pack->caption() ?></span></td>
		<td data-name="Pack" <?php echo $pharmacy_purchaseorder_view->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<span<?php echo $pharmacy_purchaseorder_view->Pack->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PUnit"><?php echo $pharmacy_purchaseorder_view->PUnit->caption() ?></span></td>
		<td data-name="PUnit" <?php echo $pharmacy_purchaseorder_view->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<span<?php echo $pharmacy_purchaseorder_view->PUnit->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SUnit"><?php echo $pharmacy_purchaseorder_view->SUnit->caption() ?></span></td>
		<td data-name="SUnit" <?php echo $pharmacy_purchaseorder_view->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<span<?php echo $pharmacy_purchaseorder_view->SUnit->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnQuantity"><?php echo $pharmacy_purchaseorder_view->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity" <?php echo $pharmacy_purchaseorder_view->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<span<?php echo $pharmacy_purchaseorder_view->GrnQuantity->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnMRP"><?php echo $pharmacy_purchaseorder_view->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP" <?php echo $pharmacy_purchaseorder_view->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<span<?php echo $pharmacy_purchaseorder_view->GrnMRP->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_trid"><?php echo $pharmacy_purchaseorder_view->trid->caption() ?></span></td>
		<td data-name="trid" <?php echo $pharmacy_purchaseorder_view->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<span<?php echo $pharmacy_purchaseorder_view->trid->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HospID"><?php echo $pharmacy_purchaseorder_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_purchaseorder_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder_view->HospID->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy"><?php echo $pharmacy_purchaseorder_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $pharmacy_purchaseorder_view->CreatedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder_view->CreatedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime"><?php echo $pharmacy_purchaseorder_view->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime" <?php echo $pharmacy_purchaseorder_view->CreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_view->CreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy"><?php echo $pharmacy_purchaseorder_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $pharmacy_purchaseorder_view->ModifiedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder_view->ModifiedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime"><?php echo $pharmacy_purchaseorder_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $pharmacy_purchaseorder_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_view->ModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedby"><?php echo $pharmacy_purchaseorder_view->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby" <?php echo $pharmacy_purchaseorder_view->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<span<?php echo $pharmacy_purchaseorder_view->grncreatedby->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedDateTime"><?php echo $pharmacy_purchaseorder_view->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime" <?php echo $pharmacy_purchaseorder_view->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_view->grncreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedby"><?php echo $pharmacy_purchaseorder_view->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby" <?php echo $pharmacy_purchaseorder_view->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<span<?php echo $pharmacy_purchaseorder_view->grnModifiedby->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedDateTime"><?php echo $pharmacy_purchaseorder_view->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime" <?php echo $pharmacy_purchaseorder_view->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_view->grnModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Received"><?php echo $pharmacy_purchaseorder_view->Received->caption() ?></span></td>
		<td data-name="Received" <?php echo $pharmacy_purchaseorder_view->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<span<?php echo $pharmacy_purchaseorder_view->Received->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BillDate"><?php echo $pharmacy_purchaseorder_view->BillDate->caption() ?></span></td>
		<td data-name="BillDate" <?php echo $pharmacy_purchaseorder_view->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder_view->BillDate->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder_view->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CurStock"><?php echo $pharmacy_purchaseorder_view->CurStock->caption() ?></span></td>
		<td data-name="CurStock" <?php echo $pharmacy_purchaseorder_view->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder_view->CurStock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_view->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_purchaseorder_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchaseorder_view->isExport()) { ?>
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
$pharmacy_purchaseorder_view->terminate();
?>