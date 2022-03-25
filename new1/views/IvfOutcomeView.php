<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOutcomeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_outcomeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_outcomeview = currentForm = new ew.Form("fivf_outcomeview", "view");
    loadjs.done("fivf_outcomeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="fivf_outcomeview" id="fivf_outcomeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_outcome_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_outcome_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_outcome_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_outcome_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <tr id="r_treatment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_treatment_status"><?= $Page->treatment_status->caption() ?></span></td>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el_ivf_outcome_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_outcome_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RESULT"><?= $Page->RESULT->caption() ?></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el_ivf_outcome_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_outcome_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_outcome_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_outcome_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_outcome_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_outcome_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
    <tr id="r_outcomeDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDate"><?= $Page->outcomeDate->caption() ?></span></td>
        <td data-name="outcomeDate" <?= $Page->outcomeDate->cellAttributes() ?>>
<span id="el_ivf_outcome_outcomeDate">
<span<?= $Page->outcomeDate->viewAttributes() ?>>
<?= $Page->outcomeDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
    <tr id="r_outcomeDay">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDay"><?= $Page->outcomeDay->caption() ?></span></td>
        <td data-name="outcomeDay" <?= $Page->outcomeDay->cellAttributes() ?>>
<span id="el_ivf_outcome_outcomeDay">
<span<?= $Page->outcomeDay->viewAttributes() ?>>
<?= $Page->outcomeDay->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
    <tr id="r_OPResult">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_OPResult"><?= $Page->OPResult->caption() ?></span></td>
        <td data-name="OPResult" <?= $Page->OPResult->cellAttributes() ?>>
<span id="el_ivf_outcome_OPResult">
<span<?= $Page->OPResult->viewAttributes() ?>>
<?= $Page->OPResult->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
    <tr id="r_Gestation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Gestation"><?= $Page->Gestation->caption() ?></span></td>
        <td data-name="Gestation" <?= $Page->Gestation->cellAttributes() ?>>
<span id="el_ivf_outcome_Gestation">
<span<?= $Page->Gestation->viewAttributes() ?>>
<?= $Page->Gestation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
    <tr id="r_TransferdEmbryos">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TransferdEmbryos"><?= $Page->TransferdEmbryos->caption() ?></span></td>
        <td data-name="TransferdEmbryos" <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<span id="el_ivf_outcome_TransferdEmbryos">
<span<?= $Page->TransferdEmbryos->viewAttributes() ?>>
<?= $Page->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
    <tr id="r_InitalOfSacs">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_InitalOfSacs"><?= $Page->InitalOfSacs->caption() ?></span></td>
        <td data-name="InitalOfSacs" <?= $Page->InitalOfSacs->cellAttributes() ?>>
<span id="el_ivf_outcome_InitalOfSacs">
<span<?= $Page->InitalOfSacs->viewAttributes() ?>>
<?= $Page->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
    <tr id="r_ImplimentationRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ImplimentationRate"><?= $Page->ImplimentationRate->caption() ?></span></td>
        <td data-name="ImplimentationRate" <?= $Page->ImplimentationRate->cellAttributes() ?>>
<span id="el_ivf_outcome_ImplimentationRate">
<span<?= $Page->ImplimentationRate->viewAttributes() ?>>
<?= $Page->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <tr id="r_EmbryoNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_EmbryoNo"><?= $Page->EmbryoNo->caption() ?></span></td>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_outcome_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
    <tr id="r_ExtrauterineSac">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ExtrauterineSac"><?= $Page->ExtrauterineSac->caption() ?></span></td>
        <td data-name="ExtrauterineSac" <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<span id="el_ivf_outcome_ExtrauterineSac">
<span<?= $Page->ExtrauterineSac->viewAttributes() ?>>
<?= $Page->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
    <tr id="r_PregnancyMonozygotic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic"><?= $Page->PregnancyMonozygotic->caption() ?></span></td>
        <td data-name="PregnancyMonozygotic" <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el_ivf_outcome_PregnancyMonozygotic">
<span<?= $Page->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Page->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
    <tr id="r_TypeGestation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TypeGestation"><?= $Page->TypeGestation->caption() ?></span></td>
        <td data-name="TypeGestation" <?= $Page->TypeGestation->cellAttributes() ?>>
<span id="el_ivf_outcome_TypeGestation">
<span<?= $Page->TypeGestation->viewAttributes() ?>>
<?= $Page->TypeGestation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
    <tr id="r_Urine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Urine"><?= $Page->Urine->caption() ?></span></td>
        <td data-name="Urine" <?= $Page->Urine->cellAttributes() ?>>
<span id="el_ivf_outcome_Urine">
<span<?= $Page->Urine->viewAttributes() ?>>
<?= $Page->Urine->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
    <tr id="r_PTdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PTdate"><?= $Page->PTdate->caption() ?></span></td>
        <td data-name="PTdate" <?= $Page->PTdate->cellAttributes() ?>>
<span id="el_ivf_outcome_PTdate">
<span<?= $Page->PTdate->viewAttributes() ?>>
<?= $Page->PTdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
    <tr id="r_Reduced">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Reduced"><?= $Page->Reduced->caption() ?></span></td>
        <td data-name="Reduced" <?= $Page->Reduced->cellAttributes() ?>>
<span id="el_ivf_outcome_Reduced">
<span<?= $Page->Reduced->viewAttributes() ?>>
<?= $Page->Reduced->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
    <tr id="r_INduced">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INduced"><?= $Page->INduced->caption() ?></span></td>
        <td data-name="INduced" <?= $Page->INduced->cellAttributes() ?>>
<span id="el_ivf_outcome_INduced">
<span<?= $Page->INduced->viewAttributes() ?>>
<?= $Page->INduced->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
    <tr id="r_INducedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INducedDate"><?= $Page->INducedDate->caption() ?></span></td>
        <td data-name="INducedDate" <?= $Page->INducedDate->cellAttributes() ?>>
<span id="el_ivf_outcome_INducedDate">
<span<?= $Page->INducedDate->viewAttributes() ?>>
<?= $Page->INducedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <tr id="r_Miscarriage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Miscarriage"><?= $Page->Miscarriage->caption() ?></span></td>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el_ivf_outcome_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
    <tr id="r_Induced1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Induced1"><?= $Page->Induced1->caption() ?></span></td>
        <td data-name="Induced1" <?= $Page->Induced1->cellAttributes() ?>>
<span id="el_ivf_outcome_Induced1">
<span<?= $Page->Induced1->viewAttributes() ?>>
<?= $Page->Induced1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Type"><?= $Page->Type->caption() ?></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el_ivf_outcome_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
    <tr id="r_IfClinical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_IfClinical"><?= $Page->IfClinical->caption() ?></span></td>
        <td data-name="IfClinical" <?= $Page->IfClinical->cellAttributes() ?>>
<span id="el_ivf_outcome_IfClinical">
<span<?= $Page->IfClinical->viewAttributes() ?>>
<?= $Page->IfClinical->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
    <tr id="r_GADate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GADate"><?= $Page->GADate->caption() ?></span></td>
        <td data-name="GADate" <?= $Page->GADate->cellAttributes() ?>>
<span id="el_ivf_outcome_GADate">
<span<?= $Page->GADate->viewAttributes() ?>>
<?= $Page->GADate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
    <tr id="r_GA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GA"><?= $Page->GA->caption() ?></span></td>
        <td data-name="GA" <?= $Page->GA->cellAttributes() ?>>
<span id="el_ivf_outcome_GA">
<span<?= $Page->GA->viewAttributes() ?>>
<?= $Page->GA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
    <tr id="r_FoetalDeath">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FoetalDeath"><?= $Page->FoetalDeath->caption() ?></span></td>
        <td data-name="FoetalDeath" <?= $Page->FoetalDeath->cellAttributes() ?>>
<span id="el_ivf_outcome_FoetalDeath">
<span<?= $Page->FoetalDeath->viewAttributes() ?>>
<?= $Page->FoetalDeath->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
    <tr id="r_FerinatalDeath">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FerinatalDeath"><?= $Page->FerinatalDeath->caption() ?></span></td>
        <td data-name="FerinatalDeath" <?= $Page->FerinatalDeath->cellAttributes() ?>>
<span id="el_ivf_outcome_FerinatalDeath">
<span<?= $Page->FerinatalDeath->viewAttributes() ?>>
<?= $Page->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_outcome_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <tr id="r_Ectopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Ectopic"><?= $Page->Ectopic->caption() ?></span></td>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el_ivf_outcome_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
    <tr id="r_Extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Extra"><?= $Page->Extra->caption() ?></span></td>
        <td data-name="Extra" <?= $Page->Extra->cellAttributes() ?>>
<span id="el_ivf_outcome_Extra">
<span<?= $Page->Extra->viewAttributes() ?>>
<?= $Page->Extra->getViewValue() ?></span>
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
