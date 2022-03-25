<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPharledReturnDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_pharled_returndelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_pharmacy_pharled_returndelete = currentForm = new ew.Form("fview_pharmacy_pharled_returndelete", "delete");
    loadjs.done("fview_pharmacy_pharled_returndelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_pharmacy_pharled_return) ew.vars.tables.view_pharmacy_pharled_return = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_pharled_return")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_pharmacy_pharled_returndelete" id="fview_pharmacy_pharled_returndelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?= $Page->SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?= $Page->Product->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><?= $Page->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?= $Page->DAMT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?= $Page->Mfg->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?= $Page->_USERID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?= $Page->HosoID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <td <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <td <?= $Page->_USERID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
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
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
