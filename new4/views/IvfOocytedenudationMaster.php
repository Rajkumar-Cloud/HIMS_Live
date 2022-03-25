<?php

namespace PHPMaker2021\HIMS;

// Table
$ivf_oocytedenudation = Container("ivf_oocytedenudation");
?>
<?php if ($ivf_oocytedenudation->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ivf_oocytedenudationmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_id"><?= $ivf_oocytedenudation->id->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->id->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_id"><span id="el_ivf_oocytedenudation_id">
<span<?= $ivf_oocytedenudation->id->viewAttributes() ?>>
<?= $ivf_oocytedenudation->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
        <tr id="r_RIDNo">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_RIDNo"><?= $ivf_oocytedenudation->RIDNo->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_RIDNo"><span id="el_ivf_oocytedenudation_RIDNo">
<span<?= $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?= $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
        <tr id="r_Name">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Name"><?= $ivf_oocytedenudation->Name->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->Name->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Name"><span id="el_ivf_oocytedenudation_Name">
<span<?= $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?= $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
        <tr id="r_ResultDate">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_ResultDate"><?= $ivf_oocytedenudation->ResultDate->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ResultDate"><span id="el_ivf_oocytedenudation_ResultDate">
<span<?= $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?= $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
        <tr id="r_Surgeon">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Surgeon"><?= $ivf_oocytedenudation->Surgeon->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Surgeon"><span id="el_ivf_oocytedenudation_Surgeon">
<span<?= $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?= $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <tr id="r_AsstSurgeon">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_AsstSurgeon"><?= $ivf_oocytedenudation->AsstSurgeon->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AsstSurgeon"><span id="el_ivf_oocytedenudation_AsstSurgeon">
<span<?= $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?= $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
        <tr id="r_Anaesthetist">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_Anaesthetist"><?= $ivf_oocytedenudation->Anaesthetist->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Anaesthetist"><span id="el_ivf_oocytedenudation_Anaesthetist">
<span<?= $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?= $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <tr id="r_AnaestheiaType">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_AnaestheiaType"><?= $ivf_oocytedenudation->AnaestheiaType->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AnaestheiaType"><span id="el_ivf_oocytedenudation_AnaestheiaType">
<span<?= $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?= $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <tr id="r_PrimaryEmbryologist">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_PrimaryEmbryologist"><?= $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_PrimaryEmbryologist"><span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?= $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <tr id="r_SecondaryEmbryologist">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SecondaryEmbryologist"><?= $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryEmbryologist"><span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <tr id="r_NoOfFolliclesRight">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesRight"><?= $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesRight"><span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?= $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <tr id="r_NoOfFolliclesLeft">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"><?= $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"><span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <tr id="r_NoOfOocytes">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_NoOfOocytes"><?= $ivf_oocytedenudation->NoOfOocytes->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfOocytes"><span id="el_ivf_oocytedenudation_NoOfOocytes">
<span<?= $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?= $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <tr id="r_RecordOocyteDenudation">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_RecordOocyteDenudation"><?= $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_RecordOocyteDenudation"><span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?= $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <tr id="r_DateOfDenudation">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_DateOfDenudation"><?= $ivf_oocytedenudation->DateOfDenudation->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DateOfDenudation"><span id="el_ivf_oocytedenudation_DateOfDenudation">
<span<?= $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?= $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <tr id="r_DenudationDoneBy">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_DenudationDoneBy"><?= $ivf_oocytedenudation->DenudationDoneBy->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DenudationDoneBy"><span id="el_ivf_oocytedenudation_DenudationDoneBy">
<span<?= $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?= $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_status"><?= $ivf_oocytedenudation->status->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->status->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_status"><span id="el_ivf_oocytedenudation_status">
<span<?= $ivf_oocytedenudation->status->viewAttributes() ?>>
<?= $ivf_oocytedenudation->status->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_createdby"><?= $ivf_oocytedenudation->createdby->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_createdby"><span id="el_ivf_oocytedenudation_createdby">
<span<?= $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?= $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_createddatetime"><?= $ivf_oocytedenudation->createddatetime->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_createddatetime"><span id="el_ivf_oocytedenudation_createddatetime">
<span<?= $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?= $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_modifiedby"><?= $ivf_oocytedenudation->modifiedby->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_modifiedby"><span id="el_ivf_oocytedenudation_modifiedby">
<span<?= $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?= $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_modifieddatetime"><?= $ivf_oocytedenudation->modifieddatetime->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_modifieddatetime"><span id="el_ivf_oocytedenudation_modifieddatetime">
<span<?= $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?= $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
        <tr id="r_TidNo">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_TidNo"><?= $ivf_oocytedenudation->TidNo->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_TidNo"><span id="el_ivf_oocytedenudation_TidNo">
<span<?= $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?= $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
        <tr id="r_ExpFollicles">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_ExpFollicles"><?= $ivf_oocytedenudation->ExpFollicles->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ExpFollicles"><span id="el_ivf_oocytedenudation_ExpFollicles">
<span<?= $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?= $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <tr id="r_SecondaryDenudationDoneBy">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"><span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <tr id="r_OocyteOrgin">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocyteOrgin"><?= $ivf_oocytedenudation->OocyteOrgin->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteOrgin"><span id="el_ivf_oocytedenudation_OocyteOrgin">
<span<?= $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?= $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
        <tr id="r_patient1">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient1"><?= $ivf_oocytedenudation->patient1->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient1"><span id="el_ivf_oocytedenudation_patient1">
<span<?= $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?= $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
        <tr id="r_OocyteType">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocyteType"><?= $ivf_oocytedenudation->OocyteType->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteType"><span id="el_ivf_oocytedenudation_OocyteType">
<span<?= $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?= $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <tr id="r_MIOocytesDonate1">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate1"><?= $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate1"><span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?= $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <tr id="r_MIOocytesDonate2">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate2"><?= $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate2"><span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?= $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
        <tr id="r_SelfMI">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfMI"><?= $ivf_oocytedenudation->SelfMI->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMI"><span id="el_ivf_oocytedenudation_SelfMI">
<span<?= $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
        <tr id="r_SelfMII">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfMII"><?= $ivf_oocytedenudation->SelfMII->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMII"><span id="el_ivf_oocytedenudation_SelfMII">
<span<?= $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
        <tr id="r_patient3">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient3"><?= $ivf_oocytedenudation->patient3->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient3"><span id="el_ivf_oocytedenudation_patient3">
<span<?= $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?= $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
        <tr id="r_patient4">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_patient4"><?= $ivf_oocytedenudation->patient4->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient4"><span id="el_ivf_oocytedenudation_patient4">
<span<?= $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?= $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <tr id="r_OocytesDonate3">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate3"><?= $ivf_oocytedenudation->OocytesDonate3->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate3"><span id="el_ivf_oocytedenudation_OocytesDonate3">
<span<?= $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?= $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <tr id="r_OocytesDonate4">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_OocytesDonate4"><?= $ivf_oocytedenudation->OocytesDonate4->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate4"><span id="el_ivf_oocytedenudation_OocytesDonate4">
<span<?= $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?= $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <tr id="r_MIOocytesDonate3">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate3"><?= $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate3"><span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?= $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <tr id="r_MIOocytesDonate4">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate4"><?= $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate4"><span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?= $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <tr id="r_SelfOocytesMI">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfOocytesMI"><?= $ivf_oocytedenudation->SelfOocytesMI->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMI"><span id="el_ivf_oocytedenudation_SelfOocytesMI">
<span<?= $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <tr id="r_SelfOocytesMII">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_SelfOocytesMII"><?= $ivf_oocytedenudation->SelfOocytesMII->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMII"><span id="el_ivf_oocytedenudation_SelfOocytesMII">
<span<?= $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?= $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
        <tr id="r_donor">
            <td class="<?= $ivf_oocytedenudation->TableLeftColumnClass ?>"><template id="tpc_ivf_oocytedenudation_donor"><?= $ivf_oocytedenudation->donor->caption() ?></template></td>
            <td <?= $ivf_oocytedenudation->donor->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_donor"><span id="el_ivf_oocytedenudation_donor">
<span<?= $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?= $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_ivf_oocytedenudationmaster" class="ew-custom-template"></div>
<template id="tpm_ivf_oocytedenudationmaster">
<div id="ct_IvfOocytedenudationMaster"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div id="OvumPickUpHide">
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_ResultDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_ResultDate"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Surgeon"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_AsstSurgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AsstSurgeon"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Anaesthetist"></slot></span>
						</td>
						<td style="width:50%">
						<slot class="ew-slot" name="tpc_ivf_oocytedenudation_AnaestheiaType"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AnaestheiaType"></slot>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_PrimaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_PrimaryEmbryologist"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SecondaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SecondaryEmbryologist"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">No Of Follicles</span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesRight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesRight"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"></slot></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfOocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfOocytes"></slot></span>
						</td>
						<td>
						</td>
												<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<script>

function ShowDenudationDoneBy()
{
	 document.getElementById("DateOfDenudationShow").style.visibility = "visible";
}
</script>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Record Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DateOfDenudation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DateOfDenudation"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DenudationDoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DenudationDoneBy"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>														  
			</div>
		</div>
	</div>
</div>
</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($ivf_oocytedenudation->Rows) ?> };
    ew.applyTemplate("tpd_ivf_oocytedenudationmaster", "tpm_ivf_oocytedenudationmaster", "ivf_oocytedenudationmaster", "<?= $ivf_oocytedenudation->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
