<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOocytedenudationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_oocytedenudationview = currentForm = new ew.Form("fivf_oocytedenudationview", "view");
    loadjs.done("fivf_oocytedenudationview");
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
<form name="fivf_oocytedenudationview" id="fivf_oocytedenudationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <tr id="r_ResultDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ResultDate"><?= $Page->ResultDate->caption() ?></span></td>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Surgeon"><?= $Page->Surgeon->caption() ?></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
    <tr id="r_AsstSurgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon"><?= $Page->AsstSurgeon->caption() ?></span></td>
        <td data-name="AsstSurgeon" <?= $Page->AsstSurgeon->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_AsstSurgeon">
<span<?= $Page->AsstSurgeon->viewAttributes() ?>>
<?= $Page->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <tr id="r_Anaesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></span></td>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
    <tr id="r_AnaestheiaType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType"><?= $Page->AnaestheiaType->caption() ?></span></td>
        <td data-name="AnaestheiaType" <?= $Page->AnaestheiaType->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_AnaestheiaType">
<span<?= $Page->AnaestheiaType->viewAttributes() ?>>
<?= $Page->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <tr id="r_PrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?></span></td>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <tr id="r_SecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?></span></td>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUNotes->Visible) { // OPUNotes ?>
    <tr id="r_OPUNotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OPUNotes"><?= $Page->OPUNotes->caption() ?></span></td>
        <td data-name="OPUNotes" <?= $Page->OPUNotes->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OPUNotes">
<span<?= $Page->OPUNotes->viewAttributes() ?>>
<?= $Page->OPUNotes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
    <tr id="r_NoOfFolliclesRight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight"><?= $Page->NoOfFolliclesRight->caption() ?></span></td>
        <td data-name="NoOfFolliclesRight" <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Page->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Page->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
    <tr id="r_NoOfFolliclesLeft">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Page->NoOfFolliclesLeft->caption() ?></span></td>
        <td data-name="NoOfFolliclesLeft" <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Page->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Page->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
    <tr id="r_NoOfOocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes"><?= $Page->NoOfOocytes->caption() ?></span></td>
        <td data-name="NoOfOocytes" <?= $Page->NoOfOocytes->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_NoOfOocytes">
<span<?= $Page->NoOfOocytes->viewAttributes() ?>>
<?= $Page->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
    <tr id="r_RecordOocyteDenudation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation"><?= $Page->RecordOocyteDenudation->caption() ?></span></td>
        <td data-name="RecordOocyteDenudation" <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Page->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Page->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
    <tr id="r_DateOfDenudation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation"><?= $Page->DateOfDenudation->caption() ?></span></td>
        <td data-name="DateOfDenudation" <?= $Page->DateOfDenudation->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_DateOfDenudation">
<span<?= $Page->DateOfDenudation->viewAttributes() ?>>
<?= $Page->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
    <tr id="r_DenudationDoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy"><?= $Page->DenudationDoneBy->caption() ?></span></td>
        <td data-name="DenudationDoneBy" <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Page->DenudationDoneBy->viewAttributes() ?>>
<?= $Page->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
    <tr id="r_ExpFollicles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles"><?= $Page->ExpFollicles->caption() ?></span></td>
        <td data-name="ExpFollicles" <?= $Page->ExpFollicles->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ExpFollicles">
<span<?= $Page->ExpFollicles->viewAttributes() ?>>
<?= $Page->ExpFollicles->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
    <tr id="r_SecondaryDenudationDoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Page->SecondaryDenudationDoneBy->caption() ?></span></td>
        <td data-name="SecondaryDenudationDoneBy" <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Page->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Page->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
    <tr id="r_OocyteOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin"><?= $Page->OocyteOrgin->caption() ?></span></td>
        <td data-name="OocyteOrgin" <?= $Page->OocyteOrgin->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocyteOrgin">
<span<?= $Page->OocyteOrgin->viewAttributes() ?>>
<?= $Page->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
    <tr id="r_patient1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient1"><?= $Page->patient1->caption() ?></span></td>
        <td data-name="patient1" <?= $Page->patient1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient1">
<span<?= $Page->patient1->viewAttributes() ?>>
<?= $Page->patient1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient2->Visible) { // patient2 ?>
    <tr id="r_patient2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient2"><?= $Page->patient2->caption() ?></span></td>
        <td data-name="patient2" <?= $Page->patient2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient2">
<span<?= $Page->patient2->viewAttributes() ?>>
<?= $Page->patient2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate1->Visible) { // OocytesDonate1 ?>
    <tr id="r_OocytesDonate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate1"><?= $Page->OocytesDonate1->caption() ?></span></td>
        <td data-name="OocytesDonate1" <?= $Page->OocytesDonate1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate1">
<span<?= $Page->OocytesDonate1->viewAttributes() ?>>
<?= $Page->OocytesDonate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate2->Visible) { // OocytesDonate2 ?>
    <tr id="r_OocytesDonate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate2"><?= $Page->OocytesDonate2->caption() ?></span></td>
        <td data-name="OocytesDonate2" <?= $Page->OocytesDonate2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate2">
<span<?= $Page->OocytesDonate2->viewAttributes() ?>>
<?= $Page->OocytesDonate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDonate->Visible) { // ETDonate ?>
    <tr id="r_ETDonate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ETDonate"><?= $Page->ETDonate->caption() ?></span></td>
        <td data-name="ETDonate" <?= $Page->ETDonate->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_ETDonate">
<span<?= $Page->ETDonate->viewAttributes() ?>>
<?= $Page->ETDonate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
    <tr id="r_OocyteType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteType"><?= $Page->OocyteType->caption() ?></span></td>
        <td data-name="OocyteType" <?= $Page->OocyteType->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocyteType">
<span<?= $Page->OocyteType->viewAttributes() ?>>
<?= $Page->OocyteType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
    <tr id="r_MIOocytesDonate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1"><?= $Page->MIOocytesDonate1->caption() ?></span></td>
        <td data-name="MIOocytesDonate1" <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Page->MIOocytesDonate1->viewAttributes() ?>>
<?= $Page->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
    <tr id="r_MIOocytesDonate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2"><?= $Page->MIOocytesDonate2->caption() ?></span></td>
        <td data-name="MIOocytesDonate2" <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Page->MIOocytesDonate2->viewAttributes() ?>>
<?= $Page->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
    <tr id="r_SelfMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMI"><?= $Page->SelfMI->caption() ?></span></td>
        <td data-name="SelfMI" <?= $Page->SelfMI->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfMI">
<span<?= $Page->SelfMI->viewAttributes() ?>>
<?= $Page->SelfMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
    <tr id="r_SelfMII">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMII"><?= $Page->SelfMII->caption() ?></span></td>
        <td data-name="SelfMII" <?= $Page->SelfMII->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfMII">
<span<?= $Page->SelfMII->viewAttributes() ?>>
<?= $Page->SelfMII->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
    <tr id="r_patient3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient3"><?= $Page->patient3->caption() ?></span></td>
        <td data-name="patient3" <?= $Page->patient3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient3">
<span<?= $Page->patient3->viewAttributes() ?>>
<?= $Page->patient3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
    <tr id="r_patient4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient4"><?= $Page->patient4->caption() ?></span></td>
        <td data-name="patient4" <?= $Page->patient4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_patient4">
<span<?= $Page->patient4->viewAttributes() ?>>
<?= $Page->patient4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
    <tr id="r_OocytesDonate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3"><?= $Page->OocytesDonate3->caption() ?></span></td>
        <td data-name="OocytesDonate3" <?= $Page->OocytesDonate3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate3">
<span<?= $Page->OocytesDonate3->viewAttributes() ?>>
<?= $Page->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
    <tr id="r_OocytesDonate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4"><?= $Page->OocytesDonate4->caption() ?></span></td>
        <td data-name="OocytesDonate4" <?= $Page->OocytesDonate4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_OocytesDonate4">
<span<?= $Page->OocytesDonate4->viewAttributes() ?>>
<?= $Page->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
    <tr id="r_MIOocytesDonate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3"><?= $Page->MIOocytesDonate3->caption() ?></span></td>
        <td data-name="MIOocytesDonate3" <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Page->MIOocytesDonate3->viewAttributes() ?>>
<?= $Page->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
    <tr id="r_MIOocytesDonate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4"><?= $Page->MIOocytesDonate4->caption() ?></span></td>
        <td data-name="MIOocytesDonate4" <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Page->MIOocytesDonate4->viewAttributes() ?>>
<?= $Page->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
    <tr id="r_SelfOocytesMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI"><?= $Page->SelfOocytesMI->caption() ?></span></td>
        <td data-name="SelfOocytesMI" <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Page->SelfOocytesMI->viewAttributes() ?>>
<?= $Page->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
    <tr id="r_SelfOocytesMII">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII"><?= $Page->SelfOocytesMII->caption() ?></span></td>
        <td data-name="SelfOocytesMII" <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Page->SelfOocytesMII->viewAttributes() ?>>
<?= $Page->SelfOocytesMII->getViewValue() ?></span>
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
