<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfTreatmentPlanDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ivf_treatment_plandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_ivf_treatment_plandelete = currentForm = new ew.Form("fview_ivf_treatment_plandelete", "delete");
    loadjs.done("fview_ivf_treatment_plandelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_ivf_treatment_plan) ew.vars.tables.view_ivf_treatment_plan = <?= JsonEncode(GetClientVar("tables", "view_ivf_treatment_plan")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_ivf_treatment_plandelete" id="fview_ivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
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
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th class="<?= $Page->CoupleID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID"><?= $Page->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th class="<?= $Page->WifeCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell"><?= $Page->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th class="<?= $Page->HusbandCell->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell"><?= $Page->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th class="<?= $Page->treatment_status->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status"><?= $Page->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><span id="elh_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT"><?= $Page->RESULT->caption() ?></span></th>
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
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_plan_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_plan_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_plan_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_plan_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_plan_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_plan_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_plan_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_plan_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_plan_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_plan_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_plan_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
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
