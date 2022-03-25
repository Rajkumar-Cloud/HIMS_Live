<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfSemenanalysisreportDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_semenanalysisreportdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_semenanalysisreportdelete = currentForm = new ew.Form("fivf_semenanalysisreportdelete", "delete");
    loadjs.done("fivf_semenanalysisreportdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf_semenanalysisreport) ew.vars.tables.ivf_semenanalysisreport = <?= JsonEncode(GetClientVar("tables", "ivf_semenanalysisreport")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_semenanalysisreportdelete" id="fivf_semenanalysisreportdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <th class="<?= $Page->HusbandName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName"><?= $Page->HusbandName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <th class="<?= $Page->RequestDr->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr"><?= $Page->RequestDr->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <th class="<?= $Page->CollectionDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate"><?= $Page->CollectionDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate"><?= $Page->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <th class="<?= $Page->RequestSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample"><?= $Page->RequestSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
        <th class="<?= $Page->CollectionType->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType"><?= $Page->CollectionType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
        <th class="<?= $Page->CollectionMethod->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod"><?= $Page->CollectionMethod->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
        <th class="<?= $Page->Medicationused->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused"><?= $Page->Medicationused->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <th class="<?= $Page->DifficultiesinCollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection"><?= $Page->DifficultiesinCollection->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
        <th class="<?= $Page->pH->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH"><?= $Page->pH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
        <th class="<?= $Page->Timeofcollection->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection"><?= $Page->Timeofcollection->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
        <th class="<?= $Page->Timeofexamination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination"><?= $Page->Timeofexamination->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume"><?= $Page->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
        <th class="<?= $Page->Concentration->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration"><?= $Page->Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th class="<?= $Page->Total->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total"><?= $Page->Total->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <th class="<?= $Page->ProgressiveMotility->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility"><?= $Page->ProgressiveMotility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <th class="<?= $Page->NonProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile"><?= $Page->NonProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
        <th class="<?= $Page->Immotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile"><?= $Page->Immotile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <th class="<?= $Page->TotalProgrssiveMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile"><?= $Page->TotalProgrssiveMotile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
        <th class="<?= $Page->Appearance->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance"><?= $Page->Appearance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
        <th class="<?= $Page->Homogenosity->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity"><?= $Page->Homogenosity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
        <th class="<?= $Page->CompleteSample->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample"><?= $Page->CompleteSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <th class="<?= $Page->Liquefactiontime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime"><?= $Page->Liquefactiontime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
        <th class="<?= $Page->Normal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal"><?= $Page->Normal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th class="<?= $Page->Abnormal->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal"><?= $Page->Abnormal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
        <th class="<?= $Page->Headdefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects"><?= $Page->Headdefects->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <th class="<?= $Page->MidpieceDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects"><?= $Page->MidpieceDefects->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
        <th class="<?= $Page->TailDefects->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects"><?= $Page->TailDefects->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <th class="<?= $Page->NormalProgMotile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile"><?= $Page->NormalProgMotile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
        <th class="<?= $Page->ImmatureForms->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms"><?= $Page->ImmatureForms->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
        <th class="<?= $Page->Leucocytes->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes"><?= $Page->Leucocytes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
        <th class="<?= $Page->Agglutination->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination"><?= $Page->Agglutination->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
        <th class="<?= $Page->Debris->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris"><?= $Page->Debris->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
        <th class="<?= $Page->Diagnosis->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis"><?= $Page->Diagnosis->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
        <th class="<?= $Page->Observations->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations"><?= $Page->Observations->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
        <th class="<?= $Page->Signature->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature"><?= $Page->Signature->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
        <th class="<?= $Page->SemenOrgin->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin"><?= $Page->SemenOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
        <th class="<?= $Page->Donor->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor"><?= $Page->Donor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <th class="<?= $Page->DonorBloodgroup->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup"><?= $Page->DonorBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th class="<?= $Page->Tank->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank"><?= $Page->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
        <th class="<?= $Page->Location->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location"><?= $Page->Location->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <th class="<?= $Page->Volume1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1"><?= $Page->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
        <th class="<?= $Page->Concentration1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1"><?= $Page->Concentration1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <th class="<?= $Page->Total1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1"><?= $Page->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <th class="<?= $Page->ProgressiveMotility1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1"><?= $Page->ProgressiveMotility1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <th class="<?= $Page->NonProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1"><?= $Page->NonProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
        <th class="<?= $Page->Immotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1"><?= $Page->Immotile1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <th class="<?= $Page->TotalProgrssiveMotile1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1"><?= $Page->TotalProgrssiveMotile1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
        <th class="<?= $Page->Color->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color"><?= $Page->Color->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
        <th class="<?= $Page->DoneBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy"><?= $Page->DoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
        <th class="<?= $Page->Abstinence->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence"><?= $Page->Abstinence->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
        <th class="<?= $Page->ProcessedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy"><?= $Page->ProcessedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
        <th class="<?= $Page->InseminationTime->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime"><?= $Page->InseminationTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
        <th class="<?= $Page->InseminationBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy"><?= $Page->InseminationBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
        <th class="<?= $Page->Big->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big"><?= $Page->Big->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
        <th class="<?= $Page->Medium->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium"><?= $Page->Medium->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
        <th class="<?= $Page->Small->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small"><?= $Page->Small->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
        <th class="<?= $Page->NoHalo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo"><?= $Page->NoHalo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
        <th class="<?= $Page->Fragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented"><?= $Page->Fragmented->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
        <th class="<?= $Page->NonFragmented->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented"><?= $Page->NonFragmented->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
        <th class="<?= $Page->DFI->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI"><?= $Page->DFI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
        <th class="<?= $Page->IsueBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy"><?= $Page->IsueBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <th class="<?= $Page->Volume2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2"><?= $Page->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <th class="<?= $Page->Concentration2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2"><?= $Page->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <th class="<?= $Page->Total2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2"><?= $Page->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <th class="<?= $Page->ProgressiveMotility2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2"><?= $Page->ProgressiveMotility2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <th class="<?= $Page->NonProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2"><?= $Page->NonProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
        <th class="<?= $Page->Immotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2"><?= $Page->Immotile2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <th class="<?= $Page->TotalProgrssiveMotile2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2"><?= $Page->TotalProgrssiveMotile2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <th class="<?= $Page->IssuedBy->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy"><?= $Page->IssuedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <th class="<?= $Page->IssuedTo->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo"><?= $Page->IssuedTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <th class="<?= $Page->PaID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID"><?= $Page->PaID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <th class="<?= $Page->PaName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName"><?= $Page->PaName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <th class="<?= $Page->PaMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile"><?= $Page->PaMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <th class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <th class="<?= $Page->IMSC_1->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1"><?= $Page->IMSC_1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <th class="<?= $Page->IMSC_2->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2"><?= $Page->IMSC_2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <th class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <th class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <th class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <th class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <th class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_id" class="ivf_semenanalysisreport_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_RIDNo" class="ivf_semenanalysisreport_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PatientName" class="ivf_semenanalysisreport_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <td <?= $Page->HusbandName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_HusbandName" class="ivf_semenanalysisreport_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <td <?= $Page->RequestDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_RequestDr" class="ivf_semenanalysisreport_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <td <?= $Page->CollectionDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_CollectionDate" class="ivf_semenanalysisreport_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ResultDate" class="ivf_semenanalysisreport_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <td <?= $Page->RequestSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_RequestSample" class="ivf_semenanalysisreport_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
        <td <?= $Page->CollectionType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_CollectionType" class="ivf_semenanalysisreport_CollectionType">
<span<?= $Page->CollectionType->viewAttributes() ?>>
<?= $Page->CollectionType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
        <td <?= $Page->CollectionMethod->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_CollectionMethod" class="ivf_semenanalysisreport_CollectionMethod">
<span<?= $Page->CollectionMethod->viewAttributes() ?>>
<?= $Page->CollectionMethod->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
        <td <?= $Page->Medicationused->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Medicationused" class="ivf_semenanalysisreport_Medicationused">
<span<?= $Page->Medicationused->viewAttributes() ?>>
<?= $Page->Medicationused->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <td <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_DifficultiesinCollection" class="ivf_semenanalysisreport_DifficultiesinCollection">
<span<?= $Page->DifficultiesinCollection->viewAttributes() ?>>
<?= $Page->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
        <td <?= $Page->pH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_pH" class="ivf_semenanalysisreport_pH">
<span<?= $Page->pH->viewAttributes() ?>>
<?= $Page->pH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
        <td <?= $Page->Timeofcollection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Timeofcollection" class="ivf_semenanalysisreport_Timeofcollection">
<span<?= $Page->Timeofcollection->viewAttributes() ?>>
<?= $Page->Timeofcollection->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
        <td <?= $Page->Timeofexamination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Timeofexamination" class="ivf_semenanalysisreport_Timeofexamination">
<span<?= $Page->Timeofexamination->viewAttributes() ?>>
<?= $Page->Timeofexamination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <td <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Volume" class="ivf_semenanalysisreport_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
        <td <?= $Page->Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Concentration" class="ivf_semenanalysisreport_Concentration">
<span<?= $Page->Concentration->viewAttributes() ?>>
<?= $Page->Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <td <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Total" class="ivf_semenanalysisreport_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <td <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility" class="ivf_semenanalysisreport_ProgressiveMotility">
<span<?= $Page->ProgressiveMotility->viewAttributes() ?>>
<?= $Page->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <td <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile" class="ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?= $Page->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
        <td <?= $Page->Immotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Immotile" class="ivf_semenanalysisreport_Immotile">
<span<?= $Page->Immotile->viewAttributes() ?>>
<?= $Page->Immotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <td <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile" class="ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?= $Page->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
        <td <?= $Page->Appearance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Appearance" class="ivf_semenanalysisreport_Appearance">
<span<?= $Page->Appearance->viewAttributes() ?>>
<?= $Page->Appearance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
        <td <?= $Page->Homogenosity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Homogenosity" class="ivf_semenanalysisreport_Homogenosity">
<span<?= $Page->Homogenosity->viewAttributes() ?>>
<?= $Page->Homogenosity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
        <td <?= $Page->CompleteSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_CompleteSample" class="ivf_semenanalysisreport_CompleteSample">
<span<?= $Page->CompleteSample->viewAttributes() ?>>
<?= $Page->CompleteSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <td <?= $Page->Liquefactiontime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Liquefactiontime" class="ivf_semenanalysisreport_Liquefactiontime">
<span<?= $Page->Liquefactiontime->viewAttributes() ?>>
<?= $Page->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
        <td <?= $Page->Normal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Normal" class="ivf_semenanalysisreport_Normal">
<span<?= $Page->Normal->viewAttributes() ?>>
<?= $Page->Normal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Abnormal" class="ivf_semenanalysisreport_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
        <td <?= $Page->Headdefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Headdefects" class="ivf_semenanalysisreport_Headdefects">
<span<?= $Page->Headdefects->viewAttributes() ?>>
<?= $Page->Headdefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <td <?= $Page->MidpieceDefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_MidpieceDefects" class="ivf_semenanalysisreport_MidpieceDefects">
<span<?= $Page->MidpieceDefects->viewAttributes() ?>>
<?= $Page->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
        <td <?= $Page->TailDefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TailDefects" class="ivf_semenanalysisreport_TailDefects">
<span<?= $Page->TailDefects->viewAttributes() ?>>
<?= $Page->TailDefects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <td <?= $Page->NormalProgMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NormalProgMotile" class="ivf_semenanalysisreport_NormalProgMotile">
<span<?= $Page->NormalProgMotile->viewAttributes() ?>>
<?= $Page->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
        <td <?= $Page->ImmatureForms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ImmatureForms" class="ivf_semenanalysisreport_ImmatureForms">
<span<?= $Page->ImmatureForms->viewAttributes() ?>>
<?= $Page->ImmatureForms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
        <td <?= $Page->Leucocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Leucocytes" class="ivf_semenanalysisreport_Leucocytes">
<span<?= $Page->Leucocytes->viewAttributes() ?>>
<?= $Page->Leucocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
        <td <?= $Page->Agglutination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Agglutination" class="ivf_semenanalysisreport_Agglutination">
<span<?= $Page->Agglutination->viewAttributes() ?>>
<?= $Page->Agglutination->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
        <td <?= $Page->Debris->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Debris" class="ivf_semenanalysisreport_Debris">
<span<?= $Page->Debris->viewAttributes() ?>>
<?= $Page->Debris->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
        <td <?= $Page->Diagnosis->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Diagnosis" class="ivf_semenanalysisreport_Diagnosis">
<span<?= $Page->Diagnosis->viewAttributes() ?>>
<?= $Page->Diagnosis->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
        <td <?= $Page->Observations->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Observations" class="ivf_semenanalysisreport_Observations">
<span<?= $Page->Observations->viewAttributes() ?>>
<?= $Page->Observations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
        <td <?= $Page->Signature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Signature" class="ivf_semenanalysisreport_Signature">
<span<?= $Page->Signature->viewAttributes() ?>>
<?= $Page->Signature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
        <td <?= $Page->SemenOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_SemenOrgin" class="ivf_semenanalysisreport_SemenOrgin">
<span<?= $Page->SemenOrgin->viewAttributes() ?>>
<?= $Page->SemenOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
        <td <?= $Page->Donor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Donor" class="ivf_semenanalysisreport_Donor">
<span<?= $Page->Donor->viewAttributes() ?>>
<?= $Page->Donor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <td <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_DonorBloodgroup" class="ivf_semenanalysisreport_DonorBloodgroup">
<span<?= $Page->DonorBloodgroup->viewAttributes() ?>>
<?= $Page->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <td <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Tank" class="ivf_semenanalysisreport_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
        <td <?= $Page->Location->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Location" class="ivf_semenanalysisreport_Location">
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <td <?= $Page->Volume1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Volume1" class="ivf_semenanalysisreport_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
        <td <?= $Page->Concentration1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Concentration1" class="ivf_semenanalysisreport_Concentration1">
<span<?= $Page->Concentration1->viewAttributes() ?>>
<?= $Page->Concentration1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <td <?= $Page->Total1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Total1" class="ivf_semenanalysisreport_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <td <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility1" class="ivf_semenanalysisreport_ProgressiveMotility1">
<span<?= $Page->ProgressiveMotility1->viewAttributes() ?>>
<?= $Page->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <td <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile1" class="ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?= $Page->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
        <td <?= $Page->Immotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Immotile1" class="ivf_semenanalysisreport_Immotile1">
<span<?= $Page->Immotile1->viewAttributes() ?>>
<?= $Page->Immotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <td <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile1" class="ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?= $Page->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TidNo" class="ivf_semenanalysisreport_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
        <td <?= $Page->Color->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Color" class="ivf_semenanalysisreport_Color">
<span<?= $Page->Color->viewAttributes() ?>>
<?= $Page->Color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
        <td <?= $Page->DoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_DoneBy" class="ivf_semenanalysisreport_DoneBy">
<span<?= $Page->DoneBy->viewAttributes() ?>>
<?= $Page->DoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Method" class="ivf_semenanalysisreport_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
        <td <?= $Page->Abstinence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Abstinence" class="ivf_semenanalysisreport_Abstinence">
<span<?= $Page->Abstinence->viewAttributes() ?>>
<?= $Page->Abstinence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
        <td <?= $Page->ProcessedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ProcessedBy" class="ivf_semenanalysisreport_ProcessedBy">
<span<?= $Page->ProcessedBy->viewAttributes() ?>>
<?= $Page->ProcessedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
        <td <?= $Page->InseminationTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_InseminationTime" class="ivf_semenanalysisreport_InseminationTime">
<span<?= $Page->InseminationTime->viewAttributes() ?>>
<?= $Page->InseminationTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
        <td <?= $Page->InseminationBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_InseminationBy" class="ivf_semenanalysisreport_InseminationBy">
<span<?= $Page->InseminationBy->viewAttributes() ?>>
<?= $Page->InseminationBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
        <td <?= $Page->Big->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Big" class="ivf_semenanalysisreport_Big">
<span<?= $Page->Big->viewAttributes() ?>>
<?= $Page->Big->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
        <td <?= $Page->Medium->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Medium" class="ivf_semenanalysisreport_Medium">
<span<?= $Page->Medium->viewAttributes() ?>>
<?= $Page->Medium->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
        <td <?= $Page->Small->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Small" class="ivf_semenanalysisreport_Small">
<span<?= $Page->Small->viewAttributes() ?>>
<?= $Page->Small->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
        <td <?= $Page->NoHalo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NoHalo" class="ivf_semenanalysisreport_NoHalo">
<span<?= $Page->NoHalo->viewAttributes() ?>>
<?= $Page->NoHalo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
        <td <?= $Page->Fragmented->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Fragmented" class="ivf_semenanalysisreport_Fragmented">
<span<?= $Page->Fragmented->viewAttributes() ?>>
<?= $Page->Fragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
        <td <?= $Page->NonFragmented->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NonFragmented" class="ivf_semenanalysisreport_NonFragmented">
<span<?= $Page->NonFragmented->viewAttributes() ?>>
<?= $Page->NonFragmented->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
        <td <?= $Page->DFI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_DFI" class="ivf_semenanalysisreport_DFI">
<span<?= $Page->DFI->viewAttributes() ?>>
<?= $Page->DFI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
        <td <?= $Page->IsueBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IsueBy" class="ivf_semenanalysisreport_IsueBy">
<span<?= $Page->IsueBy->viewAttributes() ?>>
<?= $Page->IsueBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <td <?= $Page->Volume2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Volume2" class="ivf_semenanalysisreport_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <td <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Concentration2" class="ivf_semenanalysisreport_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <td <?= $Page->Total2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Total2" class="ivf_semenanalysisreport_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <td <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_ProgressiveMotility2" class="ivf_semenanalysisreport_ProgressiveMotility2">
<span<?= $Page->ProgressiveMotility2->viewAttributes() ?>>
<?= $Page->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <td <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_NonProgrssiveMotile2" class="ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?= $Page->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
        <td <?= $Page->Immotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_Immotile2" class="ivf_semenanalysisreport_Immotile2">
<span<?= $Page->Immotile2->viewAttributes() ?>>
<?= $Page->Immotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <td <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TotalProgrssiveMotile2" class="ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?= $Page->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <td <?= $Page->IssuedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IssuedBy" class="ivf_semenanalysisreport_IssuedBy">
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <td <?= $Page->IssuedTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IssuedTo" class="ivf_semenanalysisreport_IssuedTo">
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <td <?= $Page->PaID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PaID" class="ivf_semenanalysisreport_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <td <?= $Page->PaName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PaName" class="ivf_semenanalysisreport_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <td <?= $Page->PaMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PaMobile" class="ivf_semenanalysisreport_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PartnerID" class="ivf_semenanalysisreport_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PartnerName" class="ivf_semenanalysisreport_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PartnerMobile" class="ivf_semenanalysisreport_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_PREG_TEST_DATE" class="ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" class="ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <td <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IMSC_1" class="ivf_semenanalysisreport_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <td <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IMSC_2" class="ivf_semenanalysisreport_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" class="ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_IUI_PREP_METHOD" class="ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_TRIGGER" class="ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" class="ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" class="ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
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
