<?php

namespace PHPMaker2021\project3;

// Page object
$LabProfileMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_profile_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_profile_masterview = currentForm = new ew.Form("flab_profile_masterview", "view");
    loadjs.done("flab_profile_masterview");
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
<form name="flab_profile_masterview" id="flab_profile_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_profile_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <tr id="r_ProfileCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileCode"><?= $Page->ProfileCode->caption() ?></span></td>
        <td data-name="ProfileCode" <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileName->Visible) { // ProfileName ?>
    <tr id="r_ProfileName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileName"><?= $Page->ProfileName->caption() ?></span></td>
        <td data-name="ProfileName" <?= $Page->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<span<?= $Page->ProfileName->viewAttributes() ?>>
<?= $Page->ProfileName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
    <tr id="r_ProfileAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileAmount"><?= $Page->ProfileAmount->caption() ?></span></td>
        <td data-name="ProfileAmount" <?= $Page->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<span<?= $Page->ProfileAmount->viewAttributes() ?>>
<?= $Page->ProfileAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
    <tr id="r_ProfileSpecialAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount"><?= $Page->ProfileSpecialAmount->caption() ?></span></td>
        <td data-name="ProfileSpecialAmount" <?= $Page->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<span<?= $Page->ProfileSpecialAmount->viewAttributes() ?>>
<?= $Page->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
    <tr id="r_ProfileMasterInactive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileMasterInactive"><?= $Page->ProfileMasterInactive->caption() ?></span></td>
        <td data-name="ProfileMasterInactive" <?= $Page->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<span<?= $Page->ProfileMasterInactive->viewAttributes() ?>>
<?= $Page->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
    <tr id="r_ReagentAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ReagentAmt"><?= $Page->ReagentAmt->caption() ?></span></td>
        <td data-name="ReagentAmt" <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
    <tr id="r_LabAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_LabAmt"><?= $Page->LabAmt->caption() ?></span></td>
        <td data-name="LabAmt" <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
    <tr id="r_RefAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_RefAmt"><?= $Page->RefAmt->caption() ?></span></td>
        <td data-name="RefAmt" <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
    <tr id="r_MainDeptCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_MainDeptCD"><?= $Page->MainDeptCD->caption() ?></span></td>
        <td data-name="MainDeptCD" <?= $Page->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<span<?= $Page->MainDeptCD->viewAttributes() ?>>
<?= $Page->MainDeptCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
    <tr id="r_Individual">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Individual"><?= $Page->Individual->caption() ?></span></td>
        <td data-name="Individual" <?= $Page->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <tr id="r_ShortName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ShortName"><?= $Page->ShortName->caption() ?></span></td>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <tr id="r_Note">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Note"><?= $Page->Note->caption() ?></span></td>
        <td data-name="Note" <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<span<?= $Page->Note->viewAttributes() ?>>
<?= $Page->Note->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
    <tr id="r_PrevAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PrevAmt"><?= $Page->PrevAmt->caption() ?></span></td>
        <td data-name="PrevAmt" <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
    <tr id="r_BillName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_BillName"><?= $Page->BillName->caption() ?></span></td>
        <td data-name="BillName" <?= $Page->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <tr id="r_ActualAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ActualAmt"><?= $Page->ActualAmt->caption() ?></span></td>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <tr id="r_NoHeading">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_NoHeading"><?= $Page->NoHeading->caption() ?></span></td>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <tr id="r_EditDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditDate"><?= $Page->EditDate->caption() ?></span></td>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditUser->Visible) { // EditUser ?>
    <tr id="r_EditUser">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditUser"><?= $Page->EditUser->caption() ?></span></td>
        <td data-name="EditUser" <?= $Page->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<span<?= $Page->EditUser->viewAttributes() ?>>
<?= $Page->EditUser->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
    <tr id="r_HISCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_HISCD"><?= $Page->HISCD->caption() ?></span></td>
        <td data-name="HISCD" <?= $Page->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
    <tr id="r_PriceList">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PriceList"><?= $Page->PriceList->caption() ?></span></td>
        <td data-name="PriceList" <?= $Page->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
    <tr id="r_IPAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IPAmt"><?= $Page->IPAmt->caption() ?></span></td>
        <td data-name="IPAmt" <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
    <tr id="r_IInsAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IInsAmt"><?= $Page->IInsAmt->caption() ?></span></td>
        <td data-name="IInsAmt" <?= $Page->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<span<?= $Page->IInsAmt->viewAttributes() ?>>
<?= $Page->IInsAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
    <tr id="r_ManualCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ManualCD"><?= $Page->ManualCD->caption() ?></span></td>
        <td data-name="ManualCD" <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
    <tr id="r_Free">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Free"><?= $Page->Free->caption() ?></span></td>
        <td data-name="Free" <?= $Page->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
    <tr id="r_IIpAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IIpAmt"><?= $Page->IIpAmt->caption() ?></span></td>
        <td data-name="IIpAmt" <?= $Page->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<span<?= $Page->IIpAmt->viewAttributes() ?>>
<?= $Page->IIpAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
    <tr id="r_InsAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_InsAmt"><?= $Page->InsAmt->caption() ?></span></td>
        <td data-name="InsAmt" <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <tr id="r_OutSource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_OutSource"><?= $Page->OutSource->caption() ?></span></td>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
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
