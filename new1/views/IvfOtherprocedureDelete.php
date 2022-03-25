<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOtherprocedureDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_otherproceduredelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_otherproceduredelete = currentForm = new ew.Form("fivf_otherproceduredelete", "delete");
    loadjs.done("fivf_otherproceduredelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_otherproceduredelete" id="fivf_otherproceduredelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Age" class="ivf_otherprocedure_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <th class="<?= $Page->SEX->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_SEX" class="ivf_otherprocedure_SEX"><?= $Page->SEX->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <th class="<?= $Page->Address->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Address" class="ivf_otherprocedure_Address"><?= $Page->Address->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <th class="<?= $Page->DateofAdmission->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
        <th class="<?= $Page->DateofProcedure->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><?= $Page->DateofProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
        <th class="<?= $Page->DateofDischarge->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><?= $Page->DateofDischarge->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><?= $Page->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th class="<?= $Page->Anesthetist->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><?= $Page->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th class="<?= $Page->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
        <th class="<?= $Page->ProcedureDone->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><?= $Page->ProcedureDone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <th class="<?= $Page->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
        <th class="<?= $Page->Chiefcomplaints->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
        <th class="<?= $Page->MaritallHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><?= $Page->MaritallHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <th class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <th class="<?= $Page->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
        <th class="<?= $Page->PastHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><?= $Page->PastHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th class="<?= $Page->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <th class="<?= $Page->Temp->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><?= $Page->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th class="<?= $Page->Pulse->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><?= $Page->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><?= $Page->BP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <th class="<?= $Page->CNS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><?= $Page->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
        <th class="<?= $Page->_RS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><?= $Page->_RS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th class="<?= $Page->CVS->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><?= $Page->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th class="<?= $Page->PA->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><?= $Page->PA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><?= $Page->TidNo->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Age" class="ivf_otherprocedure_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <td <?= $Page->SEX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_SEX" class="ivf_otherprocedure_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <td <?= $Page->Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Address" class="ivf_otherprocedure_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <td <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
        <td <?= $Page->DateofProcedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
<span<?= $Page->DateofProcedure->viewAttributes() ?>>
<?= $Page->DateofProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
        <td <?= $Page->DateofDischarge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
<span<?= $Page->DateofDischarge->viewAttributes() ?>>
<?= $Page->DateofDischarge->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
        <td <?= $Page->ProcedureDone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
<span<?= $Page->ProcedureDone->viewAttributes() ?>>
<?= $Page->ProcedureDone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <td <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
        <td <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
        <td <?= $Page->MaritallHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
<span<?= $Page->MaritallHistory->viewAttributes() ?>>
<?= $Page->MaritallHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <td <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
        <td <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
<span<?= $Page->PastHistory->viewAttributes() ?>>
<?= $Page->PastHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <td <?= $Page->Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <td <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <td <?= $Page->CNS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
        <td <?= $Page->_RS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
<span<?= $Page->_RS->viewAttributes() ?>>
<?= $Page->_RS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <td <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <td <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
