<?php

namespace PHPMaker2021\project3;

// Page object
$LabProfileMasterDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_profile_masterdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_profile_masterdelete = currentForm = new ew.Form("flab_profile_masterdelete", "delete");
    loadjs.done("flab_profile_masterdelete");
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
<form name="flab_profile_masterdelete" id="flab_profile_masterdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_profile_master_id" class="lab_profile_master_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <th class="<?= $Page->ProfileCode->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><?= $Page->ProfileCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileName->Visible) { // ProfileName ?>
        <th class="<?= $Page->ProfileName->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><?= $Page->ProfileName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
        <th class="<?= $Page->ProfileAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><?= $Page->ProfileAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
        <th class="<?= $Page->ProfileSpecialAmount->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><?= $Page->ProfileSpecialAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
        <th class="<?= $Page->ProfileMasterInactive->headerCellClass() ?>"><span id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><?= $Page->ProfileMasterInactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <th class="<?= $Page->ReagentAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><?= $Page->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <th class="<?= $Page->LabAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><?= $Page->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <th class="<?= $Page->RefAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><?= $Page->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
        <th class="<?= $Page->MainDeptCD->headerCellClass() ?>"><span id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><?= $Page->MainDeptCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <th class="<?= $Page->Individual->headerCellClass() ?>"><span id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><?= $Page->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th class="<?= $Page->ShortName->headerCellClass() ?>"><span id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><?= $Page->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <th class="<?= $Page->PrevAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><?= $Page->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <th class="<?= $Page->BillName->headerCellClass() ?>"><span id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><?= $Page->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th class="<?= $Page->ActualAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><?= $Page->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th class="<?= $Page->NoHeading->headerCellClass() ?>"><span id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><?= $Page->NoHeading->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><span id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><?= $Page->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditUser->Visible) { // EditUser ?>
        <th class="<?= $Page->EditUser->headerCellClass() ?>"><span id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><?= $Page->EditUser->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <th class="<?= $Page->HISCD->headerCellClass() ?>"><span id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><?= $Page->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <th class="<?= $Page->PriceList->headerCellClass() ?>"><span id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><?= $Page->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <th class="<?= $Page->IPAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><?= $Page->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
        <th class="<?= $Page->IInsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><?= $Page->IInsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <th class="<?= $Page->ManualCD->headerCellClass() ?>"><span id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><?= $Page->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <th class="<?= $Page->Free->headerCellClass() ?>"><span id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><?= $Page->Free->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
        <th class="<?= $Page->IIpAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><?= $Page->IIpAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <th class="<?= $Page->InsAmt->headerCellClass() ?>"><span id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><?= $Page->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th class="<?= $Page->OutSource->headerCellClass() ?>"><span id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><?= $Page->OutSource->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_lab_profile_master_id" class="lab_profile_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <td <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileName->Visible) { // ProfileName ?>
        <td <?= $Page->ProfileName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName">
<span<?= $Page->ProfileName->viewAttributes() ?>>
<?= $Page->ProfileName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
        <td <?= $Page->ProfileAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount">
<span<?= $Page->ProfileAmount->viewAttributes() ?>>
<?= $Page->ProfileAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
        <td <?= $Page->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount">
<span<?= $Page->ProfileSpecialAmount->viewAttributes() ?>>
<?= $Page->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
        <td <?= $Page->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive">
<span<?= $Page->ProfileMasterInactive->viewAttributes() ?>>
<?= $Page->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <td <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <td <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <td <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
        <td <?= $Page->MainDeptCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD">
<span<?= $Page->MainDeptCD->viewAttributes() ?>>
<?= $Page->MainDeptCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <td <?= $Page->Individual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_Individual" class="lab_profile_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ShortName" class="lab_profile_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <td <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <td <?= $Page->BillName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_BillName" class="lab_profile_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_EditDate" class="lab_profile_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditUser->Visible) { // EditUser ?>
        <td <?= $Page->EditUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_EditUser" class="lab_profile_master_EditUser">
<span<?= $Page->EditUser->viewAttributes() ?>>
<?= $Page->EditUser->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <td <?= $Page->HISCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_HISCD" class="lab_profile_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <td <?= $Page->PriceList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_PriceList" class="lab_profile_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <td <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
        <td <?= $Page->IInsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt">
<span<?= $Page->IInsAmt->viewAttributes() ?>>
<?= $Page->IInsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <td <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <td <?= $Page->Free->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_Free" class="lab_profile_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
        <td <?= $Page->IIpAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt">
<span<?= $Page->IIpAmt->viewAttributes() ?>>
<?= $Page->IIpAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <td <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td <?= $Page->OutSource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_OutSource" class="lab_profile_master_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
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
