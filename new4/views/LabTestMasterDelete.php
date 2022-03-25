<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestMasterDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_test_masterdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    flab_test_masterdelete = currentForm = new ew.Form("flab_test_masterdelete", "delete");
    loadjs.done("flab_test_masterdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.lab_test_master) ew.vars.tables.lab_test_master = <?= JsonEncode(GetClientVar("tables", "lab_test_master")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="flab_test_masterdelete" id="flab_test_masterdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_lab_test_master_id" class="lab_test_master_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
        <th class="<?= $Page->MainDeptCd->headerCellClass() ?>"><span id="elh_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd"><?= $Page->MainDeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeptCd->Visible) { // DeptCd ?>
        <th class="<?= $Page->DeptCd->headerCellClass() ?>"><span id="elh_lab_test_master_DeptCd" class="lab_test_master_DeptCd"><?= $Page->DeptCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
        <th class="<?= $Page->TestCd->headerCellClass() ?>"><span id="elh_lab_test_master_TestCd" class="lab_test_master_TestCd"><?= $Page->TestCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><span id="elh_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestName->Visible) { // TestName ?>
        <th class="<?= $Page->TestName->headerCellClass() ?>"><span id="elh_lab_test_master_TestName" class="lab_test_master_TestName"><?= $Page->TestName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->XrayPart->Visible) { // XrayPart ?>
        <th class="<?= $Page->XrayPart->headerCellClass() ?>"><span id="elh_lab_test_master_XrayPart" class="lab_test_master_XrayPart"><?= $Page->XrayPart->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_lab_test_master_Method" class="lab_test_master_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><span id="elh_lab_test_master_Order" class="lab_test_master_Order"><?= $Page->Order->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><span id="elh_lab_test_master_Form" class="lab_test_master_Form"><?= $Page->Form->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amt->Visible) { // Amt ?>
        <th class="<?= $Page->Amt->headerCellClass() ?>"><span id="elh_lab_test_master_Amt" class="lab_test_master_Amt"><?= $Page->Amt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SplAmt->Visible) { // SplAmt ?>
        <th class="<?= $Page->SplAmt->headerCellClass() ?>"><span id="elh_lab_test_master_SplAmt" class="lab_test_master_SplAmt"><?= $Page->SplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><span id="elh_lab_test_master_ResType" class="lab_test_master_ResType"><?= $Page->ResType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><span id="elh_lab_test_master_UnitCD" class="lab_test_master_UnitCD"><?= $Page->UnitCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><span id="elh_lab_test_master_Sample" class="lab_test_master_Sample"><?= $Page->Sample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><span id="elh_lab_test_master_NoD" class="lab_test_master_NoD"><?= $Page->NoD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><span id="elh_lab_test_master_BillOrder" class="lab_test_master_BillOrder"><?= $Page->BillOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><span id="elh_lab_test_master_Inactive" class="lab_test_master_Inactive"><?= $Page->Inactive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <th class="<?= $Page->ReagentAmt->headerCellClass() ?>"><span id="elh_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt"><?= $Page->ReagentAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <th class="<?= $Page->LabAmt->headerCellClass() ?>"><span id="elh_lab_test_master_LabAmt" class="lab_test_master_LabAmt"><?= $Page->LabAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <th class="<?= $Page->RefAmt->headerCellClass() ?>"><span id="elh_lab_test_master_RefAmt" class="lab_test_master_RefAmt"><?= $Page->RefAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreFrom->Visible) { // CreFrom ?>
        <th class="<?= $Page->CreFrom->headerCellClass() ?>"><span id="elh_lab_test_master_CreFrom" class="lab_test_master_CreFrom"><?= $Page->CreFrom->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreTo->Visible) { // CreTo ?>
        <th class="<?= $Page->CreTo->headerCellClass() ?>"><span id="elh_lab_test_master_CreTo" class="lab_test_master_CreTo"><?= $Page->CreTo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sun->Visible) { // Sun ?>
        <th class="<?= $Page->Sun->headerCellClass() ?>"><span id="elh_lab_test_master_Sun" class="lab_test_master_Sun"><?= $Page->Sun->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mon->Visible) { // Mon ?>
        <th class="<?= $Page->Mon->headerCellClass() ?>"><span id="elh_lab_test_master_Mon" class="lab_test_master_Mon"><?= $Page->Mon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tue->Visible) { // Tue ?>
        <th class="<?= $Page->Tue->headerCellClass() ?>"><span id="elh_lab_test_master_Tue" class="lab_test_master_Tue"><?= $Page->Tue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Wed->Visible) { // Wed ?>
        <th class="<?= $Page->Wed->headerCellClass() ?>"><span id="elh_lab_test_master_Wed" class="lab_test_master_Wed"><?= $Page->Wed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Thi->Visible) { // Thi ?>
        <th class="<?= $Page->Thi->headerCellClass() ?>"><span id="elh_lab_test_master_Thi" class="lab_test_master_Thi"><?= $Page->Thi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Fri->Visible) { // Fri ?>
        <th class="<?= $Page->Fri->headerCellClass() ?>"><span id="elh_lab_test_master_Fri" class="lab_test_master_Fri"><?= $Page->Fri->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Sat->Visible) { // Sat ?>
        <th class="<?= $Page->Sat->headerCellClass() ?>"><span id="elh_lab_test_master_Sat" class="lab_test_master_Sat"><?= $Page->Sat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
        <th class="<?= $Page->Days->headerCellClass() ?>"><span id="elh_lab_test_master_Days" class="lab_test_master_Days"><?= $Page->Days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cutoff->Visible) { // Cutoff ?>
        <th class="<?= $Page->Cutoff->headerCellClass() ?>"><span id="elh_lab_test_master_Cutoff" class="lab_test_master_Cutoff"><?= $Page->Cutoff->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FontBold->Visible) { // FontBold ?>
        <th class="<?= $Page->FontBold->headerCellClass() ?>"><span id="elh_lab_test_master_FontBold" class="lab_test_master_FontBold"><?= $Page->FontBold->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TestHeading->Visible) { // TestHeading ?>
        <th class="<?= $Page->TestHeading->headerCellClass() ?>"><span id="elh_lab_test_master_TestHeading" class="lab_test_master_TestHeading"><?= $Page->TestHeading->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><span id="elh_lab_test_master_Outsource" class="lab_test_master_Outsource"><?= $Page->Outsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoResult->Visible) { // NoResult ?>
        <th class="<?= $Page->NoResult->headerCellClass() ?>"><span id="elh_lab_test_master_NoResult" class="lab_test_master_NoResult"><?= $Page->NoResult->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GraphLow->Visible) { // GraphLow ?>
        <th class="<?= $Page->GraphLow->headerCellClass() ?>"><span id="elh_lab_test_master_GraphLow" class="lab_test_master_GraphLow"><?= $Page->GraphLow->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
        <th class="<?= $Page->GraphHigh->headerCellClass() ?>"><span id="elh_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh"><?= $Page->GraphHigh->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><span id="elh_lab_test_master_CollSample" class="lab_test_master_CollSample"><?= $Page->CollSample->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
        <th class="<?= $Page->ProcessTime->headerCellClass() ?>"><span id="elh_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime"><?= $Page->ProcessTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TamilName->Visible) { // TamilName ?>
        <th class="<?= $Page->TamilName->headerCellClass() ?>"><span id="elh_lab_test_master_TamilName" class="lab_test_master_TamilName"><?= $Page->TamilName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th class="<?= $Page->ShortName->headerCellClass() ?>"><span id="elh_lab_test_master_ShortName" class="lab_test_master_ShortName"><?= $Page->ShortName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <th class="<?= $Page->Individual->headerCellClass() ?>"><span id="elh_lab_test_master_Individual" class="lab_test_master_Individual"><?= $Page->Individual->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <th class="<?= $Page->PrevAmt->headerCellClass() ?>"><span id="elh_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt"><?= $Page->PrevAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
        <th class="<?= $Page->PrevSplAmt->headerCellClass() ?>"><span id="elh_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt"><?= $Page->PrevSplAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><span id="elh_lab_test_master_EditDate" class="lab_test_master_EditDate"><?= $Page->EditDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <th class="<?= $Page->BillName->headerCellClass() ?>"><span id="elh_lab_test_master_BillName" class="lab_test_master_BillName"><?= $Page->BillName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th class="<?= $Page->ActualAmt->headerCellClass() ?>"><span id="elh_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt"><?= $Page->ActualAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <th class="<?= $Page->HISCD->headerCellClass() ?>"><span id="elh_lab_test_master_HISCD" class="lab_test_master_HISCD"><?= $Page->HISCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <th class="<?= $Page->PriceList->headerCellClass() ?>"><span id="elh_lab_test_master_PriceList" class="lab_test_master_PriceList"><?= $Page->PriceList->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <th class="<?= $Page->IPAmt->headerCellClass() ?>"><span id="elh_lab_test_master_IPAmt" class="lab_test_master_IPAmt"><?= $Page->IPAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <th class="<?= $Page->InsAmt->headerCellClass() ?>"><span id="elh_lab_test_master_InsAmt" class="lab_test_master_InsAmt"><?= $Page->InsAmt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <th class="<?= $Page->ManualCD->headerCellClass() ?>"><span id="elh_lab_test_master_ManualCD" class="lab_test_master_ManualCD"><?= $Page->ManualCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <th class="<?= $Page->Free->headerCellClass() ?>"><span id="elh_lab_test_master_Free" class="lab_test_master_Free"><?= $Page->Free->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
        <th class="<?= $Page->AutoAuth->headerCellClass() ?>"><span id="elh_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth"><?= $Page->AutoAuth->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <th class="<?= $Page->ProductCD->headerCellClass() ?>"><span id="elh_lab_test_master_ProductCD" class="lab_test_master_ProductCD"><?= $Page->ProductCD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Inventory->Visible) { // Inventory ?>
        <th class="<?= $Page->Inventory->headerCellClass() ?>"><span id="elh_lab_test_master_Inventory" class="lab_test_master_Inventory"><?= $Page->Inventory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
        <th class="<?= $Page->IntimateTest->headerCellClass() ?>"><span id="elh_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest"><?= $Page->IntimateTest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Manual->Visible) { // Manual ?>
        <th class="<?= $Page->Manual->headerCellClass() ?>"><span id="elh_lab_test_master_Manual" class="lab_test_master_Manual"><?= $Page->Manual->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_lab_test_master_id" class="lab_test_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
        <td <?= $Page->MainDeptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_MainDeptCd" class="lab_test_master_MainDeptCd">
<span<?= $Page->MainDeptCd->viewAttributes() ?>>
<?= $Page->MainDeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeptCd->Visible) { // DeptCd ?>
        <td <?= $Page->DeptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_DeptCd" class="lab_test_master_DeptCd">
<span<?= $Page->DeptCd->viewAttributes() ?>>
<?= $Page->DeptCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
        <td <?= $Page->TestCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestCd" class="lab_test_master_TestCd">
<span<?= $Page->TestCd->viewAttributes() ?>>
<?= $Page->TestCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestSubCd" class="lab_test_master_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestName->Visible) { // TestName ?>
        <td <?= $Page->TestName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestName" class="lab_test_master_TestName">
<span<?= $Page->TestName->viewAttributes() ?>>
<?= $Page->TestName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->XrayPart->Visible) { // XrayPart ?>
        <td <?= $Page->XrayPart->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_XrayPart" class="lab_test_master_XrayPart">
<span<?= $Page->XrayPart->viewAttributes() ?>>
<?= $Page->XrayPart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Method" class="lab_test_master_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <td <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Order" class="lab_test_master_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <td <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Form" class="lab_test_master_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amt->Visible) { // Amt ?>
        <td <?= $Page->Amt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Amt" class="lab_test_master_Amt">
<span<?= $Page->Amt->viewAttributes() ?>>
<?= $Page->Amt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SplAmt->Visible) { // SplAmt ?>
        <td <?= $Page->SplAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_SplAmt" class="lab_test_master_SplAmt">
<span<?= $Page->SplAmt->viewAttributes() ?>>
<?= $Page->SplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <td <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ResType" class="lab_test_master_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_UnitCD" class="lab_test_master_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <td <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sample" class="lab_test_master_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <td <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_NoD" class="lab_test_master_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_BillOrder" class="lab_test_master_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Inactive" class="lab_test_master_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <td <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ReagentAmt" class="lab_test_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <td <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_LabAmt" class="lab_test_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <td <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_RefAmt" class="lab_test_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreFrom->Visible) { // CreFrom ?>
        <td <?= $Page->CreFrom->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CreFrom" class="lab_test_master_CreFrom">
<span<?= $Page->CreFrom->viewAttributes() ?>>
<?= $Page->CreFrom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreTo->Visible) { // CreTo ?>
        <td <?= $Page->CreTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CreTo" class="lab_test_master_CreTo">
<span<?= $Page->CreTo->viewAttributes() ?>>
<?= $Page->CreTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sun->Visible) { // Sun ?>
        <td <?= $Page->Sun->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sun" class="lab_test_master_Sun">
<span<?= $Page->Sun->viewAttributes() ?>>
<?= $Page->Sun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mon->Visible) { // Mon ?>
        <td <?= $Page->Mon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Mon" class="lab_test_master_Mon">
<span<?= $Page->Mon->viewAttributes() ?>>
<?= $Page->Mon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tue->Visible) { // Tue ?>
        <td <?= $Page->Tue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Tue" class="lab_test_master_Tue">
<span<?= $Page->Tue->viewAttributes() ?>>
<?= $Page->Tue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Wed->Visible) { // Wed ?>
        <td <?= $Page->Wed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Wed" class="lab_test_master_Wed">
<span<?= $Page->Wed->viewAttributes() ?>>
<?= $Page->Wed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Thi->Visible) { // Thi ?>
        <td <?= $Page->Thi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Thi" class="lab_test_master_Thi">
<span<?= $Page->Thi->viewAttributes() ?>>
<?= $Page->Thi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Fri->Visible) { // Fri ?>
        <td <?= $Page->Fri->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Fri" class="lab_test_master_Fri">
<span<?= $Page->Fri->viewAttributes() ?>>
<?= $Page->Fri->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Sat->Visible) { // Sat ?>
        <td <?= $Page->Sat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Sat" class="lab_test_master_Sat">
<span<?= $Page->Sat->viewAttributes() ?>>
<?= $Page->Sat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
        <td <?= $Page->Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Days" class="lab_test_master_Days">
<span<?= $Page->Days->viewAttributes() ?>>
<?= $Page->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cutoff->Visible) { // Cutoff ?>
        <td <?= $Page->Cutoff->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Cutoff" class="lab_test_master_Cutoff">
<span<?= $Page->Cutoff->viewAttributes() ?>>
<?= $Page->Cutoff->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FontBold->Visible) { // FontBold ?>
        <td <?= $Page->FontBold->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_FontBold" class="lab_test_master_FontBold">
<span<?= $Page->FontBold->viewAttributes() ?>>
<?= $Page->FontBold->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TestHeading->Visible) { // TestHeading ?>
        <td <?= $Page->TestHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TestHeading" class="lab_test_master_TestHeading">
<span<?= $Page->TestHeading->viewAttributes() ?>>
<?= $Page->TestHeading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Outsource" class="lab_test_master_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoResult->Visible) { // NoResult ?>
        <td <?= $Page->NoResult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_NoResult" class="lab_test_master_NoResult">
<span<?= $Page->NoResult->viewAttributes() ?>>
<?= $Page->NoResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GraphLow->Visible) { // GraphLow ?>
        <td <?= $Page->GraphLow->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_GraphLow" class="lab_test_master_GraphLow">
<span<?= $Page->GraphLow->viewAttributes() ?>>
<?= $Page->GraphLow->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
        <td <?= $Page->GraphHigh->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_GraphHigh" class="lab_test_master_GraphHigh">
<span<?= $Page->GraphHigh->viewAttributes() ?>>
<?= $Page->GraphHigh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_CollSample" class="lab_test_master_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
        <td <?= $Page->ProcessTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ProcessTime" class="lab_test_master_ProcessTime">
<span<?= $Page->ProcessTime->viewAttributes() ?>>
<?= $Page->ProcessTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TamilName->Visible) { // TamilName ?>
        <td <?= $Page->TamilName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_TamilName" class="lab_test_master_TamilName">
<span<?= $Page->TamilName->viewAttributes() ?>>
<?= $Page->TamilName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ShortName" class="lab_test_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <td <?= $Page->Individual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Individual" class="lab_test_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <td <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PrevAmt" class="lab_test_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
        <td <?= $Page->PrevSplAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PrevSplAmt" class="lab_test_master_PrevSplAmt">
<span<?= $Page->PrevSplAmt->viewAttributes() ?>>
<?= $Page->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_EditDate" class="lab_test_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <td <?= $Page->BillName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_BillName" class="lab_test_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ActualAmt" class="lab_test_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <td <?= $Page->HISCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_HISCD" class="lab_test_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <td <?= $Page->PriceList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_PriceList" class="lab_test_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <td <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_IPAmt" class="lab_test_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <td <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_InsAmt" class="lab_test_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <td <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ManualCD" class="lab_test_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <td <?= $Page->Free->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Free" class="lab_test_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
        <td <?= $Page->AutoAuth->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_AutoAuth" class="lab_test_master_AutoAuth">
<span<?= $Page->AutoAuth->viewAttributes() ?>>
<?= $Page->AutoAuth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
        <td <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_ProductCD" class="lab_test_master_ProductCD">
<span<?= $Page->ProductCD->viewAttributes() ?>>
<?= $Page->ProductCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Inventory->Visible) { // Inventory ?>
        <td <?= $Page->Inventory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Inventory" class="lab_test_master_Inventory">
<span<?= $Page->Inventory->viewAttributes() ?>>
<?= $Page->Inventory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
        <td <?= $Page->IntimateTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_IntimateTest" class="lab_test_master_IntimateTest">
<span<?= $Page->IntimateTest->viewAttributes() ?>>
<?= $Page->IntimateTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Manual->Visible) { // Manual ?>
        <td <?= $Page->Manual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_test_master_Manual" class="lab_test_master_Manual">
<span<?= $Page->Manual->viewAttributes() ?>>
<?= $Page->Manual->getViewValue() ?></span>
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
