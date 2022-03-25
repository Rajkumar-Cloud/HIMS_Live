<?php

namespace PHPMaker2021\project3;

// Page object
$IvfVitalsHistoryDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_vitals_historydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_vitals_historydelete = currentForm = new ew.Form("fivf_vitals_historydelete", "delete");
    loadjs.done("fivf_vitals_historydelete");
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
<form name="fivf_vitals_historydelete" id="fivf_vitals_historydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <th class="<?= $Page->SEX->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><?= $Page->SEX->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th class="<?= $Page->Religion->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><?= $Page->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <th class="<?= $Page->Address->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><?= $Page->Address->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th class="<?= $Page->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <th class="<?= $Page->MedicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <th class="<?= $Page->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <th class="<?= $Page->Generalexaminationpallor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><?= $Page->Generalexaminationpallor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <th class="<?= $Page->PR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><?= $Page->PR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th class="<?= $Page->CVS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><?= $Page->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th class="<?= $Page->PA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><?= $Page->PA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <th class="<?= $Page->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
        <th class="<?= $Page->Investigations->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><?= $Page->Investigations->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
        <th class="<?= $Page->Fheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><?= $Page->Fheight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
        <th class="<?= $Page->Fweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><?= $Page->Fweight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th class="<?= $Page->FBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><?= $Page->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <th class="<?= $Page->FBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><?= $Page->FBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
        <th class="<?= $Page->Mheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><?= $Page->Mheight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
        <th class="<?= $Page->Mweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><?= $Page->Mweight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <th class="<?= $Page->MBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><?= $Page->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <th class="<?= $Page->MBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><?= $Page->MBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
        <th class="<?= $Page->FBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><?= $Page->FBuild->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
        <th class="<?= $Page->MBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><?= $Page->MBuild->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <th class="<?= $Page->FSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><?= $Page->FSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <th class="<?= $Page->MSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><?= $Page->MSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <th class="<?= $Page->FEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><?= $Page->FEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <th class="<?= $Page->MEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><?= $Page->MEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <th class="<?= $Page->FHairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><?= $Page->FHairColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <th class="<?= $Page->MhairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><?= $Page->MhairColor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <th class="<?= $Page->FhairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><?= $Page->FhairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <th class="<?= $Page->MHairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><?= $Page->MHairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
        <th class="<?= $Page->Fothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><?= $Page->Fothers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
        <th class="<?= $Page->Mothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><?= $Page->Mothers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
        <th class="<?= $Page->PGE->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><?= $Page->PGE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
        <th class="<?= $Page->PPR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><?= $Page->PPR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
        <th class="<?= $Page->PBP->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><?= $Page->PBP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
        <th class="<?= $Page->Breast->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><?= $Page->Breast->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
        <th class="<?= $Page->PPA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><?= $Page->PPA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
        <th class="<?= $Page->PPSV->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><?= $Page->PPSV->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <th class="<?= $Page->PPAPSMEAR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><?= $Page->PPAPSMEAR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <th class="<?= $Page->PTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><?= $Page->PTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <th class="<?= $Page->MTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><?= $Page->MTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <th class="<?= $Page->SecSexCharacters->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><?= $Page->SecSexCharacters->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <th class="<?= $Page->PenisUM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><?= $Page->PenisUM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
        <th class="<?= $Page->VAS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><?= $Page->VAS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <th class="<?= $Page->EPIDIDYMIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><?= $Page->EPIDIDYMIS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <th class="<?= $Page->Varicocele->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><?= $Page->Varicocele->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th class="<?= $Page->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
        <th class="<?= $Page->Addictions->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><?= $Page->Addictions->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
        <th class="<?= $Page->Medical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><?= $Page->Medical->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
        <th class="<?= $Page->Surgical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><?= $Page->Surgical->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <th class="<?= $Page->CoitalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><?= $Page->CoitalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <th class="<?= $Page->MariedFor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><?= $Page->MariedFor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <th class="<?= $Page->CMNCM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><?= $Page->CMNCM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <th class="<?= $Page->pFamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><?= $Page->pFamilyHistory->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_id" class="ivf_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <td <?= $Page->SEX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <td <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <td <?= $Page->Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <td <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <td <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <td <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
<span<?= $Page->Generalexaminationpallor->viewAttributes() ?>>
<?= $Page->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <td <?= $Page->PR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <td <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <td <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <td <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
        <td <?= $Page->Investigations->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
<span<?= $Page->Investigations->viewAttributes() ?>>
<?= $Page->Investigations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
        <td <?= $Page->Fheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
<span<?= $Page->Fheight->viewAttributes() ?>>
<?= $Page->Fheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
        <td <?= $Page->Fweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <td <?= $Page->FBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
<span<?= $Page->FBloodgroup->viewAttributes() ?>>
<?= $Page->FBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
        <td <?= $Page->Mheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
<span<?= $Page->Mheight->viewAttributes() ?>>
<?= $Page->Mheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
        <td <?= $Page->Mweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
<span<?= $Page->Mweight->viewAttributes() ?>>
<?= $Page->Mweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <td <?= $Page->MBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <td <?= $Page->MBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
<span<?= $Page->MBloodgroup->viewAttributes() ?>>
<?= $Page->MBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
        <td <?= $Page->FBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
<span<?= $Page->FBuild->viewAttributes() ?>>
<?= $Page->FBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
        <td <?= $Page->MBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
<span<?= $Page->MBuild->viewAttributes() ?>>
<?= $Page->MBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <td <?= $Page->FSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
<span<?= $Page->FSkinColor->viewAttributes() ?>>
<?= $Page->FSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <td <?= $Page->MSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
<span<?= $Page->MSkinColor->viewAttributes() ?>>
<?= $Page->MSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <td <?= $Page->FEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
<span<?= $Page->FEyesColor->viewAttributes() ?>>
<?= $Page->FEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <td <?= $Page->MEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
<span<?= $Page->MEyesColor->viewAttributes() ?>>
<?= $Page->MEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <td <?= $Page->FHairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
<span<?= $Page->FHairColor->viewAttributes() ?>>
<?= $Page->FHairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <td <?= $Page->MhairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
<span<?= $Page->MhairColor->viewAttributes() ?>>
<?= $Page->MhairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <td <?= $Page->FhairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
<span<?= $Page->FhairTexture->viewAttributes() ?>>
<?= $Page->FhairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <td <?= $Page->MHairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
<span<?= $Page->MHairTexture->viewAttributes() ?>>
<?= $Page->MHairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
        <td <?= $Page->Fothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
<span<?= $Page->Fothers->viewAttributes() ?>>
<?= $Page->Fothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
        <td <?= $Page->Mothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
<span<?= $Page->Mothers->viewAttributes() ?>>
<?= $Page->Mothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
        <td <?= $Page->PGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
<span<?= $Page->PGE->viewAttributes() ?>>
<?= $Page->PGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
        <td <?= $Page->PPR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
<span<?= $Page->PPR->viewAttributes() ?>>
<?= $Page->PPR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
        <td <?= $Page->PBP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
<span<?= $Page->PBP->viewAttributes() ?>>
<?= $Page->PBP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
        <td <?= $Page->Breast->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
<span<?= $Page->Breast->viewAttributes() ?>>
<?= $Page->Breast->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
        <td <?= $Page->PPA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
<span<?= $Page->PPA->viewAttributes() ?>>
<?= $Page->PPA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
        <td <?= $Page->PPSV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
<span<?= $Page->PPSV->viewAttributes() ?>>
<?= $Page->PPSV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <td <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
<span<?= $Page->PPAPSMEAR->viewAttributes() ?>>
<?= $Page->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <td <?= $Page->PTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
<span<?= $Page->PTHYROID->viewAttributes() ?>>
<?= $Page->PTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <td <?= $Page->MTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
<span<?= $Page->MTHYROID->viewAttributes() ?>>
<?= $Page->MTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <td <?= $Page->SecSexCharacters->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
<span<?= $Page->SecSexCharacters->viewAttributes() ?>>
<?= $Page->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <td <?= $Page->PenisUM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
<span<?= $Page->PenisUM->viewAttributes() ?>>
<?= $Page->PenisUM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
        <td <?= $Page->VAS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
<span<?= $Page->VAS->viewAttributes() ?>>
<?= $Page->VAS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <td <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
<span<?= $Page->EPIDIDYMIS->viewAttributes() ?>>
<?= $Page->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <td <?= $Page->Varicocele->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
<span<?= $Page->Varicocele->viewAttributes() ?>>
<?= $Page->Varicocele->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
        <td <?= $Page->Addictions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
<span<?= $Page->Addictions->viewAttributes() ?>>
<?= $Page->Addictions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
        <td <?= $Page->Medical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
<span<?= $Page->Medical->viewAttributes() ?>>
<?= $Page->Medical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
        <td <?= $Page->Surgical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
<span<?= $Page->Surgical->viewAttributes() ?>>
<?= $Page->Surgical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <td <?= $Page->CoitalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
<span<?= $Page->CoitalHistory->viewAttributes() ?>>
<?= $Page->CoitalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <td <?= $Page->MariedFor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
<span<?= $Page->MariedFor->viewAttributes() ?>>
<?= $Page->MariedFor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <td <?= $Page->CMNCM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
<span<?= $Page->CMNCM->viewAttributes() ?>>
<?= $Page->CMNCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <td <?= $Page->pFamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
<span<?= $Page->pFamilyHistory->viewAttributes() ?>>
<?= $Page->pFamilyHistory->getViewValue() ?></span>
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
