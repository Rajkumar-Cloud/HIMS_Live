<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPharledDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_pharleddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_pharleddelete = currentForm = new ew.Form("fpharmacy_pharleddelete", "delete");
    loadjs.done("fpharmacy_pharleddelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_pharled) ew.vars.tables.pharmacy_pharled = <?= JsonEncode(GetClientVar("tables", "pharmacy_pharled")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_pharleddelete" id="fpharmacy_pharleddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?= $Page->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?= $Page->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?= $Page->Product->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?= $Page->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><span id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?= $Page->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><span id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?= $Page->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?= $Page->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <th class="<?= $Page->baid->headerCellClass() ?>"><span id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><?= $Page->baid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->isdate->Visible) { // isdate ?>
        <th class="<?= $Page->isdate->headerCellClass() ?>"><span id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><?= $Page->isdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><?= $Page->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th class="<?= $Page->PurRate->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><?= $Page->PurRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th class="<?= $Page->PUnit->headerCellClass() ?>"><span id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><?= $Page->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th class="<?= $Page->SUnit->headerCellClass() ?>"><span id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><?= $Page->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <th class="<?= $Page->HSNCODE->headerCellClass() ?>"><span id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><?= $Page->HSNCODE->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <td <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Product" class="pharmacy_pharled_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RT" class="pharmacy_pharled_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_UR" class="pharmacy_pharled_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <td <?= $Page->_USERID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_id" class="pharmacy_pharled_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <td <?= $Page->baid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_baid" class="pharmacy_pharled_baid">
<span<?= $Page->baid->viewAttributes() ?>>
<?= $Page->baid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->isdate->Visible) { // isdate ?>
        <td <?= $Page->isdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate">
<span<?= $Page->isdate->viewAttributes() ?>>
<?= $Page->isdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td <?= $Page->SUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <td <?= $Page->HSNCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE">
<span<?= $Page->HSNCODE->viewAttributes() ?>>
<?= $Page->HSNCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("btn-action").innerText="Return Item";
});
</script>
