<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacytransferView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacytransferview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_pharmacytransferview = currentForm = new ew.Form("fview_pharmacytransferview", "view");
    loadjs.done("fview_pharmacytransferview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_pharmacytransfer) ew.vars.tables.view_pharmacytransfer = <?= JsonEncode(GetClientVar("tables", "view_pharmacytransfer")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_pharmacytransferview" id="fview_pharmacytransferview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <tr id="r_ORDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ORDNO"><?= $Page->ORDNO->caption() ?></span></td>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <tr id="r_QTY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_QTY"><?= $Page->QTY->caption() ?></span></td>
        <td data-name="QTY" <?= $Page->QTY->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_YM"><?= $Page->YM->caption() ?></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <tr id="r_Stock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Stock"><?= $Page->Stock->caption() ?></span></td>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <tr id="r_Printcheck">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Printcheck"><?= $Page->Printcheck->caption() ?></span></td>
        <td data-name="Printcheck" <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Printcheck">
<span<?= $Page->Printcheck->viewAttributes() ?>>
<?= $Page->Printcheck->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
    <tr id="r_grnid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnid"><?= $Page->grnid->caption() ?></span></td>
        <td data-name="grnid" <?= $Page->grnid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnid">
<span<?= $Page->grnid->viewAttributes() ?>>
<?= $Page->grnid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <tr id="r_poid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_poid"><?= $Page->poid->caption() ?></span></td>
        <td data-name="poid" <?= $Page->poid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_poid">
<span<?= $Page->poid->viewAttributes() ?>>
<?= $Page->poid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <tr id="r_LastMonthSale">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_LastMonthSale"><?= $Page->LastMonthSale->caption() ?></span></td>
        <td data-name="LastMonthSale" <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <tr id="r_PrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PrName"><?= $Page->PrName->caption() ?></span></td>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <tr id="r_GrnQuantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnQuantity"><?= $Page->GrnQuantity->caption() ?></span></td>
        <td data-name="GrnQuantity" <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <tr id="r_Quantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Quantity"><?= $Page->Quantity->caption() ?></span></td>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <tr id="r_FreeQty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_FreeQty"><?= $Page->FreeQty->caption() ?></span></td>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <tr id="r_BatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BatchNo"><?= $Page->BatchNo->caption() ?></span></td>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <tr id="r_ExpDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ExpDate"><?= $Page->ExpDate->caption() ?></span></td>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <tr id="r_HSN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HSN"><?= $Page->HSN->caption() ?></span></td>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <tr id="r_MFRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></td>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <tr id="r_PUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PUnit"><?= $Page->PUnit->caption() ?></span></td>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <tr id="r_SUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SUnit"><?= $Page->SUnit->caption() ?></span></td>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <tr id="r_MRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MRP"><?= $Page->MRP->caption() ?></span></td>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <tr id="r_PurValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurValue"><?= $Page->PurValue->caption() ?></span></td>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
    <tr id="r_Disc">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Disc"><?= $Page->Disc->caption() ?></span></td>
        <td data-name="Disc" <?= $Page->Disc->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Disc">
<span<?= $Page->Disc->viewAttributes() ?>>
<?= $Page->Disc->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <tr id="r_PSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PSGST"><?= $Page->PSGST->caption() ?></span></td>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <tr id="r_PCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PCGST"><?= $Page->PCGST->caption() ?></span></td>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
    <tr id="r_PTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PTax"><?= $Page->PTax->caption() ?></span></td>
        <td data-name="PTax" <?= $Page->PTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PTax">
<span<?= $Page->PTax->viewAttributes() ?>>
<?= $Page->PTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
    <tr id="r_ItemValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ItemValue"><?= $Page->ItemValue->caption() ?></span></td>
        <td data-name="ItemValue" <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
    <tr id="r_SalTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalTax"><?= $Page->SalTax->caption() ?></span></td>
        <td data-name="SalTax" <?= $Page->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalTax">
<span<?= $Page->SalTax->viewAttributes() ?>>
<?= $Page->SalTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <tr id="r_PurRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurRate"><?= $Page->PurRate->caption() ?></span></td>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <tr id="r_SalRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalRate"><?= $Page->SalRate->caption() ?></span></td>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <tr id="r_Discount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Discount"><?= $Page->Discount->caption() ?></span></td>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <tr id="r_SSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SSGST"><?= $Page->SSGST->caption() ?></span></td>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <tr id="r_SCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SCGST"><?= $Page->SCGST->caption() ?></span></td>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <tr id="r_Pack">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Pack"><?= $Page->Pack->caption() ?></span></td>
        <td data-name="Pack" <?= $Page->Pack->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Pack">
<span<?= $Page->Pack->viewAttributes() ?>>
<?= $Page->Pack->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <tr id="r_GrnMRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnMRP"><?= $Page->GrnMRP->caption() ?></span></td>
        <td data-name="GrnMRP" <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnMRP">
<span<?= $Page->GrnMRP->viewAttributes() ?>>
<?= $Page->GrnMRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <tr id="r_trid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_trid"><?= $Page->trid->caption() ?></span></td>
        <td data-name="trid" <?= $Page->trid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
    <tr id="r_grncreatedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedby"><?= $Page->grncreatedby->caption() ?></span></td>
        <td data-name="grncreatedby" <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
    <tr id="r_grncreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedDateTime"><?= $Page->grncreatedDateTime->caption() ?></span></td>
        <td data-name="grncreatedDateTime" <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
    <tr id="r_grnModifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedby"><?= $Page->grnModifiedby->caption() ?></span></td>
        <td data-name="grnModifiedby" <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
    <tr id="r_grnModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedDateTime"><?= $Page->grnModifiedDateTime->caption() ?></span></td>
        <td data-name="grnModifiedDateTime" <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <tr id="r_Received">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Received"><?= $Page->Received->caption() ?></span></td>
        <td data-name="Received" <?= $Page->Received->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <tr id="r_BillDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BillDate"><?= $Page->BillDate->caption() ?></span></td>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <tr id="r_CurStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CurStock"><?= $Page->CurStock->caption() ?></span></td>
        <td data-name="CurStock" <?= $Page->CurStock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
