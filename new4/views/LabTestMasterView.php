<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabTestMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_test_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    flab_test_masterview = currentForm = new ew.Form("flab_test_masterview", "view");
    loadjs.done("flab_test_masterview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.lab_test_master) ew.vars.tables.lab_test_master = <?= JsonEncode(GetClientVar("tables", "lab_test_master")) ?>;
</script>
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
<form name="flab_test_masterview" id="flab_test_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_lab_test_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MainDeptCd->Visible) { // MainDeptCd ?>
    <tr id="r_MainDeptCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_MainDeptCd"><?= $Page->MainDeptCd->caption() ?></span></td>
        <td data-name="MainDeptCd" <?= $Page->MainDeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_MainDeptCd">
<span<?= $Page->MainDeptCd->viewAttributes() ?>>
<?= $Page->MainDeptCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeptCd->Visible) { // DeptCd ?>
    <tr id="r_DeptCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_DeptCd"><?= $Page->DeptCd->caption() ?></span></td>
        <td data-name="DeptCd" <?= $Page->DeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_DeptCd">
<span<?= $Page->DeptCd->viewAttributes() ?>>
<?= $Page->DeptCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestCd->Visible) { // TestCd ?>
    <tr id="r_TestCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestCd"><?= $Page->TestCd->caption() ?></span></td>
        <td data-name="TestCd" <?= $Page->TestCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestCd">
<span<?= $Page->TestCd->viewAttributes() ?>>
<?= $Page->TestCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <tr id="r_TestSubCd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestSubCd"><?= $Page->TestSubCd->caption() ?></span></td>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestName->Visible) { // TestName ?>
    <tr id="r_TestName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestName"><?= $Page->TestName->caption() ?></span></td>
        <td data-name="TestName" <?= $Page->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<span<?= $Page->TestName->viewAttributes() ?>>
<?= $Page->TestName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->XrayPart->Visible) { // XrayPart ?>
    <tr id="r_XrayPart">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_XrayPart"><?= $Page->XrayPart->caption() ?></span></td>
        <td data-name="XrayPart" <?= $Page->XrayPart->cellAttributes() ?>>
<span id="el_lab_test_master_XrayPart">
<span<?= $Page->XrayPart->viewAttributes() ?>>
<?= $Page->XrayPart->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Method"><?= $Page->Method->caption() ?></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el_lab_test_master_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <tr id="r_Order">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Order"><?= $Page->Order->caption() ?></span></td>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el_lab_test_master_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <tr id="r_Form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Form"><?= $Page->Form->caption() ?></span></td>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el_lab_test_master_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amt->Visible) { // Amt ?>
    <tr id="r_Amt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Amt"><?= $Page->Amt->caption() ?></span></td>
        <td data-name="Amt" <?= $Page->Amt->cellAttributes() ?>>
<span id="el_lab_test_master_Amt">
<span<?= $Page->Amt->viewAttributes() ?>>
<?= $Page->Amt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SplAmt->Visible) { // SplAmt ?>
    <tr id="r_SplAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_SplAmt"><?= $Page->SplAmt->caption() ?></span></td>
        <td data-name="SplAmt" <?= $Page->SplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_SplAmt">
<span<?= $Page->SplAmt->viewAttributes() ?>>
<?= $Page->SplAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <tr id="r_ResType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ResType"><?= $Page->ResType->caption() ?></span></td>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el_lab_test_master_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <tr id="r_UnitCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_UnitCD"><?= $Page->UnitCD->caption() ?></span></td>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el_lab_test_master_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <tr id="r_RefValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_RefValue"><?= $Page->RefValue->caption() ?></span></td>
        <td data-name="RefValue" <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_lab_test_master_RefValue">
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <tr id="r_Sample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sample"><?= $Page->Sample->caption() ?></span></td>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el_lab_test_master_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <tr id="r_NoD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_NoD"><?= $Page->NoD->caption() ?></span></td>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el_lab_test_master_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <tr id="r_BillOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_BillOrder"><?= $Page->BillOrder->caption() ?></span></td>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_lab_test_master_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <tr id="r_Formula">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Formula"><?= $Page->Formula->caption() ?></span></td>
        <td data-name="Formula" <?= $Page->Formula->cellAttributes() ?>>
<span id="el_lab_test_master_Formula">
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <tr id="r_Inactive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Inactive"><?= $Page->Inactive->caption() ?></span></td>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_lab_test_master_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
    <tr id="r_ReagentAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ReagentAmt"><?= $Page->ReagentAmt->caption() ?></span></td>
        <td data-name="ReagentAmt" <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
    <tr id="r_LabAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_LabAmt"><?= $Page->LabAmt->caption() ?></span></td>
        <td data-name="LabAmt" <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el_lab_test_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
    <tr id="r_RefAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_RefAmt"><?= $Page->RefAmt->caption() ?></span></td>
        <td data-name="RefAmt" <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el_lab_test_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreFrom->Visible) { // CreFrom ?>
    <tr id="r_CreFrom">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CreFrom"><?= $Page->CreFrom->caption() ?></span></td>
        <td data-name="CreFrom" <?= $Page->CreFrom->cellAttributes() ?>>
<span id="el_lab_test_master_CreFrom">
<span<?= $Page->CreFrom->viewAttributes() ?>>
<?= $Page->CreFrom->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreTo->Visible) { // CreTo ?>
    <tr id="r_CreTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CreTo"><?= $Page->CreTo->caption() ?></span></td>
        <td data-name="CreTo" <?= $Page->CreTo->cellAttributes() ?>>
<span id="el_lab_test_master_CreTo">
<span<?= $Page->CreTo->viewAttributes() ?>>
<?= $Page->CreTo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Note->Visible) { // Note ?>
    <tr id="r_Note">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Note"><?= $Page->Note->caption() ?></span></td>
        <td data-name="Note" <?= $Page->Note->cellAttributes() ?>>
<span id="el_lab_test_master_Note">
<span<?= $Page->Note->viewAttributes() ?>>
<?= $Page->Note->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sun->Visible) { // Sun ?>
    <tr id="r_Sun">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sun"><?= $Page->Sun->caption() ?></span></td>
        <td data-name="Sun" <?= $Page->Sun->cellAttributes() ?>>
<span id="el_lab_test_master_Sun">
<span<?= $Page->Sun->viewAttributes() ?>>
<?= $Page->Sun->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mon->Visible) { // Mon ?>
    <tr id="r_Mon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Mon"><?= $Page->Mon->caption() ?></span></td>
        <td data-name="Mon" <?= $Page->Mon->cellAttributes() ?>>
<span id="el_lab_test_master_Mon">
<span<?= $Page->Mon->viewAttributes() ?>>
<?= $Page->Mon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tue->Visible) { // Tue ?>
    <tr id="r_Tue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Tue"><?= $Page->Tue->caption() ?></span></td>
        <td data-name="Tue" <?= $Page->Tue->cellAttributes() ?>>
<span id="el_lab_test_master_Tue">
<span<?= $Page->Tue->viewAttributes() ?>>
<?= $Page->Tue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Wed->Visible) { // Wed ?>
    <tr id="r_Wed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Wed"><?= $Page->Wed->caption() ?></span></td>
        <td data-name="Wed" <?= $Page->Wed->cellAttributes() ?>>
<span id="el_lab_test_master_Wed">
<span<?= $Page->Wed->viewAttributes() ?>>
<?= $Page->Wed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Thi->Visible) { // Thi ?>
    <tr id="r_Thi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Thi"><?= $Page->Thi->caption() ?></span></td>
        <td data-name="Thi" <?= $Page->Thi->cellAttributes() ?>>
<span id="el_lab_test_master_Thi">
<span<?= $Page->Thi->viewAttributes() ?>>
<?= $Page->Thi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fri->Visible) { // Fri ?>
    <tr id="r_Fri">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Fri"><?= $Page->Fri->caption() ?></span></td>
        <td data-name="Fri" <?= $Page->Fri->cellAttributes() ?>>
<span id="el_lab_test_master_Fri">
<span<?= $Page->Fri->viewAttributes() ?>>
<?= $Page->Fri->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Sat->Visible) { // Sat ?>
    <tr id="r_Sat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Sat"><?= $Page->Sat->caption() ?></span></td>
        <td data-name="Sat" <?= $Page->Sat->cellAttributes() ?>>
<span id="el_lab_test_master_Sat">
<span<?= $Page->Sat->viewAttributes() ?>>
<?= $Page->Sat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
    <tr id="r_Days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Days"><?= $Page->Days->caption() ?></span></td>
        <td data-name="Days" <?= $Page->Days->cellAttributes() ?>>
<span id="el_lab_test_master_Days">
<span<?= $Page->Days->viewAttributes() ?>>
<?= $Page->Days->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cutoff->Visible) { // Cutoff ?>
    <tr id="r_Cutoff">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Cutoff"><?= $Page->Cutoff->caption() ?></span></td>
        <td data-name="Cutoff" <?= $Page->Cutoff->cellAttributes() ?>>
<span id="el_lab_test_master_Cutoff">
<span<?= $Page->Cutoff->viewAttributes() ?>>
<?= $Page->Cutoff->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FontBold->Visible) { // FontBold ?>
    <tr id="r_FontBold">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_FontBold"><?= $Page->FontBold->caption() ?></span></td>
        <td data-name="FontBold" <?= $Page->FontBold->cellAttributes() ?>>
<span id="el_lab_test_master_FontBold">
<span<?= $Page->FontBold->viewAttributes() ?>>
<?= $Page->FontBold->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TestHeading->Visible) { // TestHeading ?>
    <tr id="r_TestHeading">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TestHeading"><?= $Page->TestHeading->caption() ?></span></td>
        <td data-name="TestHeading" <?= $Page->TestHeading->cellAttributes() ?>>
<span id="el_lab_test_master_TestHeading">
<span<?= $Page->TestHeading->viewAttributes() ?>>
<?= $Page->TestHeading->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <tr id="r_Outsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Outsource"><?= $Page->Outsource->caption() ?></span></td>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<span id="el_lab_test_master_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoResult->Visible) { // NoResult ?>
    <tr id="r_NoResult">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_NoResult"><?= $Page->NoResult->caption() ?></span></td>
        <td data-name="NoResult" <?= $Page->NoResult->cellAttributes() ?>>
<span id="el_lab_test_master_NoResult">
<span<?= $Page->NoResult->viewAttributes() ?>>
<?= $Page->NoResult->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GraphLow->Visible) { // GraphLow ?>
    <tr id="r_GraphLow">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_GraphLow"><?= $Page->GraphLow->caption() ?></span></td>
        <td data-name="GraphLow" <?= $Page->GraphLow->cellAttributes() ?>>
<span id="el_lab_test_master_GraphLow">
<span<?= $Page->GraphLow->viewAttributes() ?>>
<?= $Page->GraphLow->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GraphHigh->Visible) { // GraphHigh ?>
    <tr id="r_GraphHigh">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_GraphHigh"><?= $Page->GraphHigh->caption() ?></span></td>
        <td data-name="GraphHigh" <?= $Page->GraphHigh->cellAttributes() ?>>
<span id="el_lab_test_master_GraphHigh">
<span<?= $Page->GraphHigh->viewAttributes() ?>>
<?= $Page->GraphHigh->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <tr id="r_CollSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_CollSample"><?= $Page->CollSample->caption() ?></span></td>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_lab_test_master_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcessTime->Visible) { // ProcessTime ?>
    <tr id="r_ProcessTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ProcessTime"><?= $Page->ProcessTime->caption() ?></span></td>
        <td data-name="ProcessTime" <?= $Page->ProcessTime->cellAttributes() ?>>
<span id="el_lab_test_master_ProcessTime">
<span<?= $Page->ProcessTime->viewAttributes() ?>>
<?= $Page->ProcessTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TamilName->Visible) { // TamilName ?>
    <tr id="r_TamilName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_TamilName"><?= $Page->TamilName->caption() ?></span></td>
        <td data-name="TamilName" <?= $Page->TamilName->cellAttributes() ?>>
<span id="el_lab_test_master_TamilName">
<span<?= $Page->TamilName->viewAttributes() ?>>
<?= $Page->TamilName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
    <tr id="r_ShortName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ShortName"><?= $Page->ShortName->caption() ?></span></td>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el_lab_test_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
    <tr id="r_Individual">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Individual"><?= $Page->Individual->caption() ?></span></td>
        <td data-name="Individual" <?= $Page->Individual->cellAttributes() ?>>
<span id="el_lab_test_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
    <tr id="r_PrevAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PrevAmt"><?= $Page->PrevAmt->caption() ?></span></td>
        <td data-name="PrevAmt" <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrevSplAmt->Visible) { // PrevSplAmt ?>
    <tr id="r_PrevSplAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PrevSplAmt"><?= $Page->PrevSplAmt->caption() ?></span></td>
        <td data-name="PrevSplAmt" <?= $Page->PrevSplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevSplAmt">
<span<?= $Page->PrevSplAmt->viewAttributes() ?>>
<?= $Page->PrevSplAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_lab_test_master_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <tr id="r_EditDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_EditDate"><?= $Page->EditDate->caption() ?></span></td>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el_lab_test_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
    <tr id="r_BillName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_BillName"><?= $Page->BillName->caption() ?></span></td>
        <td data-name="BillName" <?= $Page->BillName->cellAttributes() ?>>
<span id="el_lab_test_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
    <tr id="r_ActualAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ActualAmt"><?= $Page->ActualAmt->caption() ?></span></td>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
    <tr id="r_HISCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_HISCD"><?= $Page->HISCD->caption() ?></span></td>
        <td data-name="HISCD" <?= $Page->HISCD->cellAttributes() ?>>
<span id="el_lab_test_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
    <tr id="r_PriceList">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_PriceList"><?= $Page->PriceList->caption() ?></span></td>
        <td data-name="PriceList" <?= $Page->PriceList->cellAttributes() ?>>
<span id="el_lab_test_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
    <tr id="r_IPAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_IPAmt"><?= $Page->IPAmt->caption() ?></span></td>
        <td data-name="IPAmt" <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el_lab_test_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
    <tr id="r_InsAmt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_InsAmt"><?= $Page->InsAmt->caption() ?></span></td>
        <td data-name="InsAmt" <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el_lab_test_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
    <tr id="r_ManualCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ManualCD"><?= $Page->ManualCD->caption() ?></span></td>
        <td data-name="ManualCD" <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el_lab_test_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
    <tr id="r_Free">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Free"><?= $Page->Free->caption() ?></span></td>
        <td data-name="Free" <?= $Page->Free->cellAttributes() ?>>
<span id="el_lab_test_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AutoAuth->Visible) { // AutoAuth ?>
    <tr id="r_AutoAuth">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_AutoAuth"><?= $Page->AutoAuth->caption() ?></span></td>
        <td data-name="AutoAuth" <?= $Page->AutoAuth->cellAttributes() ?>>
<span id="el_lab_test_master_AutoAuth">
<span<?= $Page->AutoAuth->viewAttributes() ?>>
<?= $Page->AutoAuth->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProductCD->Visible) { // ProductCD ?>
    <tr id="r_ProductCD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_ProductCD"><?= $Page->ProductCD->caption() ?></span></td>
        <td data-name="ProductCD" <?= $Page->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_master_ProductCD">
<span<?= $Page->ProductCD->viewAttributes() ?>>
<?= $Page->ProductCD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Inventory->Visible) { // Inventory ?>
    <tr id="r_Inventory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Inventory"><?= $Page->Inventory->caption() ?></span></td>
        <td data-name="Inventory" <?= $Page->Inventory->cellAttributes() ?>>
<span id="el_lab_test_master_Inventory">
<span<?= $Page->Inventory->viewAttributes() ?>>
<?= $Page->Inventory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IntimateTest->Visible) { // IntimateTest ?>
    <tr id="r_IntimateTest">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_IntimateTest"><?= $Page->IntimateTest->caption() ?></span></td>
        <td data-name="IntimateTest" <?= $Page->IntimateTest->cellAttributes() ?>>
<span id="el_lab_test_master_IntimateTest">
<span<?= $Page->IntimateTest->viewAttributes() ?>>
<?= $Page->IntimateTest->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Manual->Visible) { // Manual ?>
    <tr id="r_Manual">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_lab_test_master_Manual"><?= $Page->Manual->caption() ?></span></td>
        <td data-name="Manual" <?= $Page->Manual->cellAttributes() ?>>
<span id="el_lab_test_master_Manual">
<span<?= $Page->Manual->viewAttributes() ?>>
<?= $Page->Manual->getViewValue() ?></span>
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
