<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewSemenanalysisDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_semenanalysisdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_semenanalysisdelete = currentForm = new ew.Form("fview_semenanalysisdelete", "delete");
    loadjs.done("fview_semenanalysisdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_semenanalysis) ew.vars.tables.view_semenanalysis = <?= JsonEncode(GetClientVar("tables", "view_semenanalysis")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_semenanalysisdelete" id="fview_semenanalysisdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
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
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <th class="<?= $Page->PaID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><?= $Page->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <th class="<?= $Page->PaName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><?= $Page->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <th class="<?= $Page->PaMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><?= $Page->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><span id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <th class="<?= $Page->RequestDr->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><?= $Page->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <th class="<?= $Page->CollectionDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><?= $Page->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><span id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><?= $Page->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <th class="<?= $Page->RequestSample->headerCellClass() ?>"><span id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><?= $Page->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></span></th>
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
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_id" class="view_semenanalysis_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <td <?= $Page->PaID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaID" class="view_semenanalysis_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <td <?= $Page->PaName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaName" class="view_semenanalysis_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <td <?= $Page->PaMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <td <?= $Page->RequestDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <td <?= $Page->CollectionDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <td <?= $Page->RequestSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
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
