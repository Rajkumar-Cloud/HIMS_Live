<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOutcomeDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_outcomedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_outcomedelete = currentForm = new ew.Form("fivf_outcomedelete", "delete");
    loadjs.done("fivf_outcomedelete");
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
<form name="fivf_outcomedelete" id="fivf_outcomedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_outcome_id" class="ivf_outcome_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th class="<?= $Page->treatment_status->headerCellClass() ?>"><span id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><?= $Page->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><span id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><?= $Page->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_outcome_status" class="ivf_outcome_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
        <th class="<?= $Page->outcomeDate->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><?= $Page->outcomeDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
        <th class="<?= $Page->outcomeDay->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><?= $Page->outcomeDay->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
        <th class="<?= $Page->OPResult->headerCellClass() ?>"><span id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><?= $Page->OPResult->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
        <th class="<?= $Page->Gestation->headerCellClass() ?>"><span id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><?= $Page->Gestation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <th class="<?= $Page->TransferdEmbryos->headerCellClass() ?>"><span id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><?= $Page->TransferdEmbryos->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <th class="<?= $Page->InitalOfSacs->headerCellClass() ?>"><span id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><?= $Page->InitalOfSacs->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <th class="<?= $Page->ImplimentationRate->headerCellClass() ?>"><span id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><?= $Page->ImplimentationRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <th class="<?= $Page->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><?= $Page->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <th class="<?= $Page->ExtrauterineSac->headerCellClass() ?>"><span id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><?= $Page->ExtrauterineSac->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <th class="<?= $Page->PregnancyMonozygotic->headerCellClass() ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><?= $Page->PregnancyMonozygotic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
        <th class="<?= $Page->TypeGestation->headerCellClass() ?>"><span id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><?= $Page->TypeGestation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
        <th class="<?= $Page->Urine->headerCellClass() ?>"><span id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><?= $Page->Urine->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
        <th class="<?= $Page->PTdate->headerCellClass() ?>"><span id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><?= $Page->PTdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
        <th class="<?= $Page->Reduced->headerCellClass() ?>"><span id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><?= $Page->Reduced->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
        <th class="<?= $Page->INduced->headerCellClass() ?>"><span id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><?= $Page->INduced->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
        <th class="<?= $Page->INducedDate->headerCellClass() ?>"><span id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><?= $Page->INducedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <th class="<?= $Page->Miscarriage->headerCellClass() ?>"><span id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><?= $Page->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
        <th class="<?= $Page->Induced1->headerCellClass() ?>"><span id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><?= $Page->Induced1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><span id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><?= $Page->Type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
        <th class="<?= $Page->IfClinical->headerCellClass() ?>"><span id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><?= $Page->IfClinical->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
        <th class="<?= $Page->GADate->headerCellClass() ?>"><span id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><?= $Page->GADate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
        <th class="<?= $Page->GA->headerCellClass() ?>"><span id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><?= $Page->GA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
        <th class="<?= $Page->FoetalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><?= $Page->FoetalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <th class="<?= $Page->FerinatalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><?= $Page->FerinatalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <th class="<?= $Page->Ectopic->headerCellClass() ?>"><span id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><?= $Page->Ectopic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
        <th class="<?= $Page->Extra->headerCellClass() ?>"><span id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><?= $Page->Extra->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_outcome_id" class="ivf_outcome_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Name" class="ivf_outcome_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Age" class="ivf_outcome_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_status" class="ivf_outcome_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_createdby" class="ivf_outcome_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
        <td <?= $Page->outcomeDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
<span<?= $Page->outcomeDate->viewAttributes() ?>>
<?= $Page->outcomeDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
        <td <?= $Page->outcomeDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
<span<?= $Page->outcomeDay->viewAttributes() ?>>
<?= $Page->outcomeDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
        <td <?= $Page->OPResult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
<span<?= $Page->OPResult->viewAttributes() ?>>
<?= $Page->OPResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
        <td <?= $Page->Gestation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
<span<?= $Page->Gestation->viewAttributes() ?>>
<?= $Page->Gestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <td <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
<span<?= $Page->TransferdEmbryos->viewAttributes() ?>>
<?= $Page->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <td <?= $Page->InitalOfSacs->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
<span<?= $Page->InitalOfSacs->viewAttributes() ?>>
<?= $Page->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <td <?= $Page->ImplimentationRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
<span<?= $Page->ImplimentationRate->viewAttributes() ?>>
<?= $Page->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <td <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <td <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
<span<?= $Page->ExtrauterineSac->viewAttributes() ?>>
<?= $Page->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <td <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
<span<?= $Page->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Page->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
        <td <?= $Page->TypeGestation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
<span<?= $Page->TypeGestation->viewAttributes() ?>>
<?= $Page->TypeGestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
        <td <?= $Page->Urine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Urine" class="ivf_outcome_Urine">
<span<?= $Page->Urine->viewAttributes() ?>>
<?= $Page->Urine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
        <td <?= $Page->PTdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
<span<?= $Page->PTdate->viewAttributes() ?>>
<?= $Page->PTdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
        <td <?= $Page->Reduced->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
<span<?= $Page->Reduced->viewAttributes() ?>>
<?= $Page->Reduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
        <td <?= $Page->INduced->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_INduced" class="ivf_outcome_INduced">
<span<?= $Page->INduced->viewAttributes() ?>>
<?= $Page->INduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
        <td <?= $Page->INducedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
<span<?= $Page->INducedDate->viewAttributes() ?>>
<?= $Page->INducedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <td <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
        <td <?= $Page->Induced1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
<span<?= $Page->Induced1->viewAttributes() ?>>
<?= $Page->Induced1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <td <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Type" class="ivf_outcome_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
        <td <?= $Page->IfClinical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
<span<?= $Page->IfClinical->viewAttributes() ?>>
<?= $Page->IfClinical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
        <td <?= $Page->GADate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_GADate" class="ivf_outcome_GADate">
<span<?= $Page->GADate->viewAttributes() ?>>
<?= $Page->GADate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
        <td <?= $Page->GA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_GA" class="ivf_outcome_GA">
<span<?= $Page->GA->viewAttributes() ?>>
<?= $Page->GA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
        <td <?= $Page->FoetalDeath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
<span<?= $Page->FoetalDeath->viewAttributes() ?>>
<?= $Page->FoetalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <td <?= $Page->FerinatalDeath->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
<span<?= $Page->FerinatalDeath->viewAttributes() ?>>
<?= $Page->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <td <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
        <td <?= $Page->Extra->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_outcome_Extra" class="ivf_outcome_Extra">
<span<?= $Page->Extra->viewAttributes() ?>>
<?= $Page->Extra->getViewValue() ?></span>
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
