<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivfdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivfdelete = currentForm = new ew.Form("fivfdelete", "delete");
    loadjs.done("fivfdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf) ew.vars.tables.ivf = <?= JsonEncode(GetClientVar("tables", "ivf")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivfdelete" id="fivfdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_id" class="ivf_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <th class="<?= $Page->Male->headerCellClass() ?>"><span id="elh_ivf_Male" class="ivf_Male"><?= $Page->Male->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <th class="<?= $Page->Female->headerCellClass() ?>"><span id="elh_ivf_Female" class="ivf_Female"><?= $Page->Female->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_status" class="ivf_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
        <th class="<?= $Page->malepropic->headerCellClass() ?>"><span id="elh_ivf_malepropic" class="ivf_malepropic"><?= $Page->malepropic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
        <th class="<?= $Page->femalepropic->headerCellClass() ?>"><span id="elh_ivf_femalepropic" class="ivf_femalepropic"><?= $Page->femalepropic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <th class="<?= $Page->HusbandEducation->headerCellClass() ?>"><span id="elh_ivf_HusbandEducation" class="ivf_HusbandEducation"><?= $Page->HusbandEducation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <th class="<?= $Page->WifeEducation->headerCellClass() ?>"><span id="elh_ivf_WifeEducation" class="ivf_WifeEducation"><?= $Page->WifeEducation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <th class="<?= $Page->HusbandWorkHours->headerCellClass() ?>"><span id="elh_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours"><?= $Page->HusbandWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <th class="<?= $Page->WifeWorkHours->headerCellClass() ?>"><span id="elh_ivf_WifeWorkHours" class="ivf_WifeWorkHours"><?= $Page->WifeWorkHours->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <th class="<?= $Page->PatientLanguage->headerCellClass() ?>"><span id="elh_ivf_PatientLanguage" class="ivf_PatientLanguage"><?= $Page->PatientLanguage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <th class="<?= $Page->ReferedBy->headerCellClass() ?>"><span id="elh_ivf_ReferedBy" class="ivf_ReferedBy"><?= $Page->ReferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <th class="<?= $Page->ReferPhNo->headerCellClass() ?>"><span id="elh_ivf_ReferPhNo" class="ivf_ReferPhNo"><?= $Page->ReferPhNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th class="<?= $Page->WifeCell->headerCellClass() ?>"><span id="elh_ivf_WifeCell" class="ivf_WifeCell"><?= $Page->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th class="<?= $Page->HusbandCell->headerCellClass() ?>"><span id="elh_ivf_HusbandCell" class="ivf_HusbandCell"><?= $Page->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <th class="<?= $Page->WifeEmail->headerCellClass() ?>"><span id="elh_ivf_WifeEmail" class="ivf_WifeEmail"><?= $Page->WifeEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <th class="<?= $Page->HusbandEmail->headerCellClass() ?>"><span id="elh_ivf_HusbandEmail" class="ivf_HusbandEmail"><?= $Page->HusbandEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_ARTCYCLE" class="ivf_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><span id="elh_ivf_RESULT" class="ivf_RESULT"><?= $Page->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th class="<?= $Page->CoupleID->headerCellClass() ?>"><span id="elh_ivf_CoupleID" class="ivf_CoupleID"><?= $Page->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_ivf_HospID" class="ivf_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_ivf_PatientName" class="ivf_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_ivf_PatientID" class="ivf_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_ivf_PartnerName" class="ivf_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_ivf_PartnerID" class="ivf_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><span id="elh_ivf_DrID" class="ivf_DrID"><?= $Page->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th class="<?= $Page->DrDepartment->headerCellClass() ?>"><span id="elh_ivf_DrDepartment" class="ivf_DrDepartment"><?= $Page->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_ivf_Doctor" class="ivf_Doctor"><?= $Page->Doctor->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_id" class="ivf_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <td <?= $Page->Male->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_Male" class="ivf_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <td <?= $Page->Female->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_Female" class="ivf_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_status" class="ivf_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
        <td <?= $Page->malepropic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_malepropic" class="ivf_malepropic">
<span>
<?= GetFileViewTag($Page->malepropic, $Page->malepropic->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
        <td <?= $Page->femalepropic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_femalepropic" class="ivf_femalepropic">
<span>
<?= GetFileViewTag($Page->femalepropic, $Page->femalepropic->getViewValue(), false) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <td <?= $Page->HusbandEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_HusbandEducation" class="ivf_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <td <?= $Page->WifeEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_WifeEducation" class="ivf_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <td <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_HusbandWorkHours" class="ivf_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <td <?= $Page->WifeWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_WifeWorkHours" class="ivf_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <td <?= $Page->PatientLanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_PatientLanguage" class="ivf_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <td <?= $Page->ReferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ReferedBy" class="ivf_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <td <?= $Page->ReferPhNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ReferPhNo" class="ivf_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_WifeCell" class="ivf_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_HusbandCell" class="ivf_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <td <?= $Page->WifeEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_WifeEmail" class="ivf_WifeEmail">
<span<?= $Page->WifeEmail->viewAttributes() ?>>
<?= $Page->WifeEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <td <?= $Page->HusbandEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_HusbandEmail" class="ivf_HusbandEmail">
<span<?= $Page->HusbandEmail->viewAttributes() ?>>
<?= $Page->HusbandEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ARTCYCLE" class="ivf_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_RESULT" class="ivf_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_CoupleID" class="ivf_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_HospID" class="ivf_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_PatientName" class="ivf_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_PatientID" class="ivf_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_PartnerName" class="ivf_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_PartnerID" class="ivf_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <td <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_DrID" class="ivf_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_DrDepartment" class="ivf_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_Doctor" class="ivf_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
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
