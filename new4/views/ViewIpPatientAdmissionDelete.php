<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpPatientAdmissionDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ip_patient_admissiondelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_ip_patient_admissiondelete = currentForm = new ew.Form("fview_ip_patient_admissiondelete", "delete");
    loadjs.done("fview_ip_patient_admissiondelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_ip_patient_admission) ew.vars.tables.view_ip_patient_admission = <?= JsonEncode(GetClientVar("tables", "view_ip_patient_admission")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_ip_patient_admissiondelete" id="fview_ip_patient_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_id" class="view_ip_patient_admission_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th class="<?= $Page->mrnNo->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo"><?= $Page->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th class="<?= $Page->patient_name->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name"><?= $Page->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <th class="<?= $Page->mobileno->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno"><?= $Page->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th class="<?= $Page->admission_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date"><?= $Page->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th class="<?= $Page->release_date->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date"><?= $Page->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th class="<?= $Page->ReferedByDr->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <th class="<?= $Page->BillClosing->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing"><?= $Page->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <th class="<?= $Page->BillClosingDate->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th class="<?= $Page->Procedure->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure"><?= $Page->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th class="<?= $Page->Anesthetist->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <th class="<?= $Page->Amound->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound"><?= $Page->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <th class="<?= $Page->Cid->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid"><?= $Page->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <th class="<?= $Page->PartId->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId"><?= $Page->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <th class="<?= $Page->IDProof->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof"><?= $Page->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <th class="<?= $Page->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_id" class="view_ip_patient_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_mrnNo" class="view_ip_patient_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PatientID" class="view_ip_patient_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td <?= $Page->patient_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_patient_name" class="view_ip_patient_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <td <?= $Page->mobileno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_mobileno" class="view_ip_patient_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td <?= $Page->admission_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_admission_date" class="view_ip_patient_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <td <?= $Page->release_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_release_date" class="view_ip_patient_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_HospID" class="view_ip_patient_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <td <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillClosing" class="view_ip_patient_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <td <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_BillNumber" class="view_ip_patient_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Procedure" class="view_ip_patient_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Consultant" class="view_ip_patient_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <td <?= $Page->Amound->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Amound" class="view_ip_patient_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerID" class="view_ip_patient_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerName" class="view_ip_patient_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <td <?= $Page->Cid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_Cid" class="view_ip_patient_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <td <?= $Page->PartId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_PartId" class="view_ip_patient_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <td <?= $Page->IDProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_IDProof" class="view_ip_patient_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <td <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
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
