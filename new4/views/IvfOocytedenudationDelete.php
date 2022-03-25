<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_oocytedenudationdelete = currentForm = new ew.Form("fivf_oocytedenudationdelete", "delete");
    loadjs.done("fivf_oocytedenudationdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf_oocytedenudation) ew.vars.tables.ivf_oocytedenudation = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_oocytedenudationdelete" id="fivf_oocytedenudationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><?= $Page->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><?= $Page->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <th class="<?= $Page->AsstSurgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><?= $Page->AsstSurgeon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <th class="<?= $Page->Anaesthetist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <th class="<?= $Page->AnaestheiaType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><?= $Page->AnaestheiaType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <th class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <th class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <th class="<?= $Page->NoOfFolliclesRight->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><?= $Page->NoOfFolliclesRight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <th class="<?= $Page->NoOfFolliclesLeft->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Page->NoOfFolliclesLeft->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <th class="<?= $Page->NoOfOocytes->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><?= $Page->NoOfOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <th class="<?= $Page->RecordOocyteDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><?= $Page->RecordOocyteDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <th class="<?= $Page->DateOfDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><?= $Page->DateOfDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <th class="<?= $Page->DenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><?= $Page->DenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
        <th class="<?= $Page->ExpFollicles->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><?= $Page->ExpFollicles->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <th class="<?= $Page->SecondaryDenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Page->SecondaryDenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <th class="<?= $Page->OocyteOrgin->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><?= $Page->OocyteOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
        <th class="<?= $Page->patient1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><?= $Page->patient1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
        <th class="<?= $Page->OocyteType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><?= $Page->OocyteType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <th class="<?= $Page->MIOocytesDonate1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><?= $Page->MIOocytesDonate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <th class="<?= $Page->MIOocytesDonate2->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><?= $Page->MIOocytesDonate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
        <th class="<?= $Page->SelfMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><?= $Page->SelfMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
        <th class="<?= $Page->SelfMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><?= $Page->SelfMII->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
        <th class="<?= $Page->patient3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><?= $Page->patient3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
        <th class="<?= $Page->patient4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><?= $Page->patient4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <th class="<?= $Page->OocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><?= $Page->OocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <th class="<?= $Page->OocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><?= $Page->OocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <th class="<?= $Page->MIOocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><?= $Page->MIOocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <th class="<?= $Page->MIOocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><?= $Page->MIOocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <th class="<?= $Page->SelfOocytesMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><?= $Page->SelfOocytesMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <th class="<?= $Page->SelfOocytesMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><?= $Page->SelfOocytesMII->caption() ?></span></th>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
        <th class="<?= $Page->donor->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><?= $Page->donor->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <td <?= $Page->AsstSurgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
<span<?= $Page->AsstSurgeon->viewAttributes() ?>>
<?= $Page->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <td <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <td <?= $Page->AnaestheiaType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
<span<?= $Page->AnaestheiaType->viewAttributes() ?>>
<?= $Page->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <td <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <td <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <td <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Page->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Page->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <td <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Page->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Page->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <td <?= $Page->NoOfOocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
<span<?= $Page->NoOfOocytes->viewAttributes() ?>>
<?= $Page->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <td <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Page->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Page->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <td <?= $Page->DateOfDenudation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
<span<?= $Page->DateOfDenudation->viewAttributes() ?>>
<?= $Page->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <td <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Page->DenudationDoneBy->viewAttributes() ?>>
<?= $Page->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
        <td <?= $Page->ExpFollicles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
<span<?= $Page->ExpFollicles->viewAttributes() ?>>
<?= $Page->ExpFollicles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <td <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Page->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Page->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <td <?= $Page->OocyteOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
<span<?= $Page->OocyteOrgin->viewAttributes() ?>>
<?= $Page->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
        <td <?= $Page->patient1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
<span<?= $Page->patient1->viewAttributes() ?>>
<?= $Page->patient1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
        <td <?= $Page->OocyteType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
<span<?= $Page->OocyteType->viewAttributes() ?>>
<?= $Page->OocyteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <td <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Page->MIOocytesDonate1->viewAttributes() ?>>
<?= $Page->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <td <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Page->MIOocytesDonate2->viewAttributes() ?>>
<?= $Page->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
        <td <?= $Page->SelfMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
<span<?= $Page->SelfMI->viewAttributes() ?>>
<?= $Page->SelfMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
        <td <?= $Page->SelfMII->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
<span<?= $Page->SelfMII->viewAttributes() ?>>
<?= $Page->SelfMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
        <td <?= $Page->patient3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
<span<?= $Page->patient3->viewAttributes() ?>>
<?= $Page->patient3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
        <td <?= $Page->patient4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
<span<?= $Page->patient4->viewAttributes() ?>>
<?= $Page->patient4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <td <?= $Page->OocytesDonate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
<span<?= $Page->OocytesDonate3->viewAttributes() ?>>
<?= $Page->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <td <?= $Page->OocytesDonate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
<span<?= $Page->OocytesDonate4->viewAttributes() ?>>
<?= $Page->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <td <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Page->MIOocytesDonate3->viewAttributes() ?>>
<?= $Page->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <td <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Page->MIOocytesDonate4->viewAttributes() ?>>
<?= $Page->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <td <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Page->SelfOocytesMI->viewAttributes() ?>>
<?= $Page->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <td <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Page->SelfOocytesMII->viewAttributes() ?>>
<?= $Page->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
        <td <?= $Page->donor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
<span<?= $Page->donor->viewAttributes() ?>>
<?= $Page->donor->getViewValue() ?></span>
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
