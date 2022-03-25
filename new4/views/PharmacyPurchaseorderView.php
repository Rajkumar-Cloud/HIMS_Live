<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseorderView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseorderview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_purchaseorderview = currentForm = new ew.Form("fpharmacy_purchaseorderview", "view");
    loadjs.done("fpharmacy_purchaseorderview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_purchaseorder) ew.vars.tables.pharmacy_purchaseorder = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchaseorder")) ?>;
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
<form name="fpharmacy_purchaseorderview" id="fpharmacy_purchaseorderview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <tr id="r_ORDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ORDNO"><?= $Page->ORDNO->caption() ?></span></td>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <tr id="r_QTY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_QTY"><?= $Page->QTY->caption() ?></span></td>
        <td data-name="QTY" <?= $Page->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <tr id="r_YM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_YM"><?= $Page->YM->caption() ?></span></td>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <tr id="r_MFRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></td>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <tr id="r_Stock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Stock"><?= $Page->Stock->caption() ?></span></td>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <tr id="r_LastMonthSale">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale"><?= $Page->LastMonthSale->caption() ?></span></td>
        <td data-name="LastMonthSale" <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <tr id="r_Printcheck">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Printcheck"><?= $Page->Printcheck->caption() ?></span></td>
        <td data-name="Printcheck" <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<span<?= $Page->Printcheck->viewAttributes() ?>>
<?= $Page->Printcheck->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <tr id="r_poid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_poid"><?= $Page->poid->caption() ?></span></td>
        <td data-name="poid" <?= $Page->poid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_poid">
<span<?= $Page->poid->viewAttributes() ?>>
<?= $Page->poid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <tr id="r_PSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PSGST"><?= $Page->PSGST->caption() ?></span></td>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <tr id="r_PCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PCGST"><?= $Page->PCGST->caption() ?></span></td>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <tr id="r_SSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SSGST"><?= $Page->SSGST->caption() ?></span></td>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <tr id="r_SCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SCGST"><?= $Page->SCGST->caption() ?></span></td>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <tr id="r_HSN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HSN"><?= $Page->HSN->caption() ?></span></td>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <tr id="r_Pack">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Pack"><?= $Page->Pack->caption() ?></span></td>
        <td data-name="Pack" <?= $Page->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<span<?= $Page->Pack->viewAttributes() ?>>
<?= $Page->Pack->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <tr id="r_PUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_PUnit"><?= $Page->PUnit->caption() ?></span></td>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <tr id="r_SUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_SUnit"><?= $Page->SUnit->caption() ?></span></td>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <tr id="r_GrnQuantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnQuantity"><?= $Page->GrnQuantity->caption() ?></span></td>
        <td data-name="GrnQuantity" <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <tr id="r_GrnMRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GrnMRP"><?= $Page->GrnMRP->caption() ?></span></td>
        <td data-name="GrnMRP" <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<span<?= $Page->GrnMRP->viewAttributes() ?>>
<?= $Page->GrnMRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <tr id="r_trid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_trid"><?= $Page->trid->caption() ?></span></td>
        <td data-name="trid" <?= $Page->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
    <tr id="r_grncreatedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedby"><?= $Page->grncreatedby->caption() ?></span></td>
        <td data-name="grncreatedby" <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
    <tr id="r_grncreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grncreatedDateTime"><?= $Page->grncreatedDateTime->caption() ?></span></td>
        <td data-name="grncreatedDateTime" <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
    <tr id="r_grnModifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedby"><?= $Page->grnModifiedby->caption() ?></span></td>
        <td data-name="grnModifiedby" <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
    <tr id="r_grnModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedDateTime"><?= $Page->grnModifiedDateTime->caption() ?></span></td>
        <td data-name="grnModifiedDateTime" <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <tr id="r_Received">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_Received"><?= $Page->Received->caption() ?></span></td>
        <td data-name="Received" <?= $Page->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <tr id="r_BillDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_BillDate"><?= $Page->BillDate->caption() ?></span></td>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <tr id="r_CurStock">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_CurStock"><?= $Page->CurStock->caption() ?></span></td>
        <td data-name="CurStock" <?= $Page->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
    <tr id="r_grndate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grndate"><?= $Page->grndate->caption() ?></span></td>
        <td data-name="grndate" <?= $Page->grndate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grndate">
<span<?= $Page->grndate->viewAttributes() ?>>
<?= $Page->grndate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
    <tr id="r_grndatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_grndatetime"><?= $Page->grndatetime->caption() ?></span></td>
        <td data-name="grndatetime" <?= $Page->grndatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grndatetime">
<span<?= $Page->grndatetime->viewAttributes() ?>>
<?= $Page->grndatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
    <tr id="r_strid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_strid"><?= $Page->strid->caption() ?></span></td>
        <td data-name="strid" <?= $Page->strid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_strid">
<span<?= $Page->strid->viewAttributes() ?>>
<?= $Page->strid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
    <tr id="r_GRNPer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_GRNPer"><?= $Page->GRNPer->caption() ?></span></td>
        <td data-name="GRNPer" <?= $Page->GRNPer->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GRNPer">
<span<?= $Page->GRNPer->viewAttributes() ?>>
<?= $Page->GRNPer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
    <tr id="r_FreeQtyyy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchaseorder_FreeQtyyy"><?= $Page->FreeQtyyy->caption() ?></span></td>
        <td data-name="FreeQtyyy" <?= $Page->FreeQtyyy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_FreeQtyyy">
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
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
