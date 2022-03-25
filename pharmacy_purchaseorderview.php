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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_purchaseorderview = currentForm = new ew.Form("fpharmacy_purchaseorderview", "view");

// Form_CustomValidate event
fpharmacy_purchaseorderview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchaseorderview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchaseorderview.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_view->PRC->Lookup->toClientList() ?>;
fpharmacy_purchaseorderview.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_view->PRC->lookupOptions()) ?>;
fpharmacy_purchaseorderview.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpharmacy_purchaseorderview.lists["x_PC"] = <?php echo $pharmacy_purchaseorder_view->PC->Lookup->toClientList() ?>;
fpharmacy_purchaseorderview.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_view->PC->lookupOptions()) ?>;
fpharmacy_purchaseorderview.lists["x_Received[]"] = <?php echo $pharmacy_purchaseorder_view->Received->Lookup->toClientList() ?>;
fpharmacy_purchaseorderview.lists["x_Received[]"].options = <?php echo JsonEncode($pharmacy_purchaseorder_view->Received->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
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
<?php if ($pharmacy_purchaseorder_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchaseorder_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchaseorder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchaseorder->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ORDNO"><?php echo $pharmacy_purchaseorder->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $pharmacy_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<span<?php echo $pharmacy_purchaseorder->ORDNO->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PRC"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $pharmacy_purchaseorder->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_QTY"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $pharmacy_purchaseorder->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_DT"><?php echo $pharmacy_purchaseorder->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $pharmacy_purchaseorder->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<span<?php echo $pharmacy_purchaseorder->DT->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PC"><?php echo $pharmacy_purchaseorder->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $pharmacy_purchaseorder->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<span<?php echo $pharmacy_purchaseorder->PC->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_YM"><?php echo $pharmacy_purchaseorder->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $pharmacy_purchaseorder->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<span<?php echo $pharmacy_purchaseorder->YM->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_MFRCODE"><?php echo $pharmacy_purchaseorder->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $pharmacy_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<span<?php echo $pharmacy_purchaseorder->MFRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Stock"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $pharmacy_purchaseorder->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $pharmacy_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Printcheck"><?php echo $pharmacy_purchaseorder->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $pharmacy_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<span<?php echo $pharmacy_purchaseorder->Printcheck->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_id"><?php echo $pharmacy_purchaseorder->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_purchaseorder->id->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_id">
<span<?php echo $pharmacy_purchaseorder->id->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_poid"><?php echo $pharmacy_purchaseorder->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $pharmacy_purchaseorder->poid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_poid">
<span<?php echo $pharmacy_purchaseorder->poid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PSGST"><?php echo $pharmacy_purchaseorder->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $pharmacy_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<span<?php echo $pharmacy_purchaseorder->PSGST->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PCGST"><?php echo $pharmacy_purchaseorder->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $pharmacy_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<span<?php echo $pharmacy_purchaseorder->PCGST->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SSGST"><?php echo $pharmacy_purchaseorder->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $pharmacy_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<span<?php echo $pharmacy_purchaseorder->SSGST->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SCGST"><?php echo $pharmacy_purchaseorder->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $pharmacy_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<span<?php echo $pharmacy_purchaseorder->SCGST->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BRCODE"><?php echo $pharmacy_purchaseorder->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<span<?php echo $pharmacy_purchaseorder->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HSN"><?php echo $pharmacy_purchaseorder->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $pharmacy_purchaseorder->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<span<?php echo $pharmacy_purchaseorder->HSN->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Pack"><?php echo $pharmacy_purchaseorder->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $pharmacy_purchaseorder->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<span<?php echo $pharmacy_purchaseorder->Pack->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PUnit"><?php echo $pharmacy_purchaseorder->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $pharmacy_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<span<?php echo $pharmacy_purchaseorder->PUnit->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SUnit"><?php echo $pharmacy_purchaseorder->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $pharmacy_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<span<?php echo $pharmacy_purchaseorder->SUnit->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnQuantity"><?php echo $pharmacy_purchaseorder->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $pharmacy_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<span<?php echo $pharmacy_purchaseorder->GrnQuantity->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnMRP"><?php echo $pharmacy_purchaseorder->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $pharmacy_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<span<?php echo $pharmacy_purchaseorder->GrnMRP->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_trid"><?php echo $pharmacy_purchaseorder->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $pharmacy_purchaseorder->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<span<?php echo $pharmacy_purchaseorder->trid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HospID"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_purchaseorder->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $pharmacy_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $pharmacy_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $pharmacy_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $pharmacy_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedby"><?php echo $pharmacy_purchaseorder->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $pharmacy_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<span<?php echo $pharmacy_purchaseorder->grncreatedby->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedDateTime"><?php echo $pharmacy_purchaseorder->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $pharmacy_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<span<?php echo $pharmacy_purchaseorder->grncreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedby"><?php echo $pharmacy_purchaseorder->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $pharmacy_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<span<?php echo $pharmacy_purchaseorder->grnModifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedDateTime"><?php echo $pharmacy_purchaseorder->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Received"><?php echo $pharmacy_purchaseorder->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $pharmacy_purchaseorder->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<span<?php echo $pharmacy_purchaseorder->Received->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BillDate"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $pharmacy_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CurStock"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></span></td>
		<td data-name="CurStock"<?php echo $pharmacy_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
	<tr id="r_grndate">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grndate"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></span></td>
		<td data-name="grndate"<?php echo $pharmacy_purchaseorder->grndate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grndate">
<span<?php echo $pharmacy_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<tr id="r_grndatetime">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grndatetime"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></span></td>
		<td data-name="grndatetime"<?php echo $pharmacy_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grndatetime">
<span<?php echo $pharmacy_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
	<tr id="r_strid">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_strid"><?php echo $pharmacy_purchaseorder->strid->caption() ?></span></td>
		<td data-name="strid"<?php echo $pharmacy_purchaseorder->strid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_strid">
<span<?php echo $pharmacy_purchaseorder->strid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->strid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<tr id="r_GRNPer">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GRNPer"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></span></td>
		<td data-name="GRNPer"<?php echo $pharmacy_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GRNPer">
<span<?php echo $pharmacy_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<tr id="r_FreeQtyyy">
		<td class="<?php echo $pharmacy_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_FreeQtyyy"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></span></td>
		<td data-name="FreeQtyyy"<?php echo $pharmacy_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_FreeQtyyy">
<span<?php echo $pharmacy_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_purchaseorder_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchaseorder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchaseorder_view->terminate();
?>