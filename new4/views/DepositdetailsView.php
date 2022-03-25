<?php

namespace PHPMaker2021\HIMS;

// Page object
$DepositdetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdepositdetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fdepositdetailsview = currentForm = new ew.Form("fdepositdetailsview", "view");
    loadjs.done("fdepositdetailsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.depositdetails) ew.vars.tables.depositdetails = <?= JsonEncode(GetClientVar("tables", "depositdetails")) ?>;
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
<form name="fdepositdetailsview" id="fdepositdetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_id"><template id="tpc_depositdetails_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_depositdetails_id"><span id="el_depositdetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
    <tr id="r_DepositDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositDate"><template id="tpc_depositdetails_DepositDate"><?= $Page->DepositDate->caption() ?></template></span></td>
        <td data-name="DepositDate" <?= $Page->DepositDate->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositDate"><span id="el_depositdetails_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
    <tr id="r_DepositToBankSelect">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBankSelect"><template id="tpc_depositdetails_DepositToBankSelect"><?= $Page->DepositToBankSelect->caption() ?></template></span></td>
        <td data-name="DepositToBankSelect" <?= $Page->DepositToBankSelect->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositToBankSelect"><span id="el_depositdetails_DepositToBankSelect">
<span<?= $Page->DepositToBankSelect->viewAttributes() ?>>
<?= $Page->DepositToBankSelect->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
    <tr id="r_DepositToBank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBank"><template id="tpc_depositdetails_DepositToBank"><?= $Page->DepositToBank->caption() ?></template></span></td>
        <td data-name="DepositToBank" <?= $Page->DepositToBank->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositToBank"><span id="el_depositdetails_DepositToBank">
<span<?= $Page->DepositToBank->viewAttributes() ?>>
<?= $Page->DepositToBank->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
    <tr id="r_TransferToSelect">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferToSelect"><template id="tpc_depositdetails_TransferToSelect"><?= $Page->TransferToSelect->caption() ?></template></span></td>
        <td data-name="TransferToSelect" <?= $Page->TransferToSelect->cellAttributes() ?>>
<template id="tpx_depositdetails_TransferToSelect"><span id="el_depositdetails_TransferToSelect">
<span<?= $Page->TransferToSelect->viewAttributes() ?>>
<?= $Page->TransferToSelect->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
    <tr id="r_TransferTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferTo"><template id="tpc_depositdetails_TransferTo"><?= $Page->TransferTo->caption() ?></template></span></td>
        <td data-name="TransferTo" <?= $Page->TransferTo->cellAttributes() ?>>
<template id="tpx_depositdetails_TransferTo"><span id="el_depositdetails_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
    <tr id="r_OpeningBalance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_OpeningBalance"><template id="tpc_depositdetails_OpeningBalance"><?= $Page->OpeningBalance->caption() ?></template></span></td>
        <td data-name="OpeningBalance" <?= $Page->OpeningBalance->cellAttributes() ?>>
<template id="tpx_depositdetails_OpeningBalance"><span id="el_depositdetails_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
    <tr id="r_Other">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_Other"><template id="tpc_depositdetails_Other"><?= $Page->Other->caption() ?></template></span></td>
        <td data-name="Other" <?= $Page->Other->cellAttributes() ?>>
<template id="tpx_depositdetails_Other"><span id="el_depositdetails_Other">
<span<?= $Page->Other->viewAttributes() ?>>
<?= $Page->Other->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
    <tr id="r_TotalCash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalCash"><template id="tpc_depositdetails_TotalCash"><?= $Page->TotalCash->caption() ?></template></span></td>
        <td data-name="TotalCash" <?= $Page->TotalCash->cellAttributes() ?>>
<template id="tpx_depositdetails_TotalCash"><span id="el_depositdetails_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
    <tr id="r_Cheque">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_Cheque"><template id="tpc_depositdetails_Cheque"><?= $Page->Cheque->caption() ?></template></span></td>
        <td data-name="Cheque" <?= $Page->Cheque->cellAttributes() ?>>
<template id="tpx_depositdetails_Cheque"><span id="el_depositdetails_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <tr id="r_Card">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_Card"><template id="tpc_depositdetails_Card"><?= $Page->Card->caption() ?></template></span></td>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_depositdetails_Card"><span id="el_depositdetails_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
    <tr id="r_NEFTRTGS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_NEFTRTGS"><template id="tpc_depositdetails_NEFTRTGS"><?= $Page->NEFTRTGS->caption() ?></template></span></td>
        <td data-name="NEFTRTGS" <?= $Page->NEFTRTGS->cellAttributes() ?>>
<template id="tpx_depositdetails_NEFTRTGS"><span id="el_depositdetails_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
    <tr id="r_TotalTransferDepositAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalTransferDepositAmount"><template id="tpc_depositdetails_TotalTransferDepositAmount"><?= $Page->TotalTransferDepositAmount->caption() ?></template></span></td>
        <td data-name="TotalTransferDepositAmount" <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<template id="tpx_depositdetails_TotalTransferDepositAmount"><span id="el_depositdetails_TotalTransferDepositAmount">
<span<?= $Page->TotalTransferDepositAmount->viewAttributes() ?>>
<?= $Page->TotalTransferDepositAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedBy"><template id="tpc_depositdetails_CreatedBy"><?= $Page->CreatedBy->caption() ?></template></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<template id="tpx_depositdetails_CreatedBy"><span id="el_depositdetails_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <tr id="r_CreatedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedDateTime"><template id="tpc_depositdetails_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></template></span></td>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<template id="tpx_depositdetails_CreatedDateTime"><span id="el_depositdetails_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedBy"><template id="tpc_depositdetails_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></template></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<template id="tpx_depositdetails_ModifiedBy"><span id="el_depositdetails_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedDateTime"><template id="tpc_depositdetails_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></template></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<template id="tpx_depositdetails_ModifiedDateTime"><span id="el_depositdetails_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
    <tr id="r_CreatedUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedUserName"><template id="tpc_depositdetails_CreatedUserName"><?= $Page->CreatedUserName->caption() ?></template></span></td>
        <td data-name="CreatedUserName" <?= $Page->CreatedUserName->cellAttributes() ?>>
<template id="tpx_depositdetails_CreatedUserName"><span id="el_depositdetails_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
    <tr id="r_ModifiedUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedUserName"><template id="tpc_depositdetails_ModifiedUserName"><?= $Page->ModifiedUserName->caption() ?></template></span></td>
        <td data-name="ModifiedUserName" <?= $Page->ModifiedUserName->cellAttributes() ?>>
<template id="tpx_depositdetails_ModifiedUserName"><span id="el_depositdetails_ModifiedUserName">
<span<?= $Page->ModifiedUserName->viewAttributes() ?>>
<?= $Page->ModifiedUserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
    <tr id="r_A2000Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Count"><template id="tpc_depositdetails_A2000Count"><?= $Page->A2000Count->caption() ?></template></span></td>
        <td data-name="A2000Count" <?= $Page->A2000Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A2000Count"><span id="el_depositdetails_A2000Count">
<span<?= $Page->A2000Count->viewAttributes() ?>>
<?= $Page->A2000Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
    <tr id="r_A2000Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Amount"><template id="tpc_depositdetails_A2000Amount"><?= $Page->A2000Amount->caption() ?></template></span></td>
        <td data-name="A2000Amount" <?= $Page->A2000Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A2000Amount"><span id="el_depositdetails_A2000Amount">
<span<?= $Page->A2000Amount->viewAttributes() ?>>
<?= $Page->A2000Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
    <tr id="r_A1000Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Count"><template id="tpc_depositdetails_A1000Count"><?= $Page->A1000Count->caption() ?></template></span></td>
        <td data-name="A1000Count" <?= $Page->A1000Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A1000Count"><span id="el_depositdetails_A1000Count">
<span<?= $Page->A1000Count->viewAttributes() ?>>
<?= $Page->A1000Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
    <tr id="r_A1000Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Amount"><template id="tpc_depositdetails_A1000Amount"><?= $Page->A1000Amount->caption() ?></template></span></td>
        <td data-name="A1000Amount" <?= $Page->A1000Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A1000Amount"><span id="el_depositdetails_A1000Amount">
<span<?= $Page->A1000Amount->viewAttributes() ?>>
<?= $Page->A1000Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
    <tr id="r_A500Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Count"><template id="tpc_depositdetails_A500Count"><?= $Page->A500Count->caption() ?></template></span></td>
        <td data-name="A500Count" <?= $Page->A500Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A500Count"><span id="el_depositdetails_A500Count">
<span<?= $Page->A500Count->viewAttributes() ?>>
<?= $Page->A500Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
    <tr id="r_A500Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Amount"><template id="tpc_depositdetails_A500Amount"><?= $Page->A500Amount->caption() ?></template></span></td>
        <td data-name="A500Amount" <?= $Page->A500Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A500Amount"><span id="el_depositdetails_A500Amount">
<span<?= $Page->A500Amount->viewAttributes() ?>>
<?= $Page->A500Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
    <tr id="r_A200Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Count"><template id="tpc_depositdetails_A200Count"><?= $Page->A200Count->caption() ?></template></span></td>
        <td data-name="A200Count" <?= $Page->A200Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A200Count"><span id="el_depositdetails_A200Count">
<span<?= $Page->A200Count->viewAttributes() ?>>
<?= $Page->A200Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
    <tr id="r_A200Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Amount"><template id="tpc_depositdetails_A200Amount"><?= $Page->A200Amount->caption() ?></template></span></td>
        <td data-name="A200Amount" <?= $Page->A200Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A200Amount"><span id="el_depositdetails_A200Amount">
<span<?= $Page->A200Amount->viewAttributes() ?>>
<?= $Page->A200Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
    <tr id="r_A100Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Count"><template id="tpc_depositdetails_A100Count"><?= $Page->A100Count->caption() ?></template></span></td>
        <td data-name="A100Count" <?= $Page->A100Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A100Count"><span id="el_depositdetails_A100Count">
<span<?= $Page->A100Count->viewAttributes() ?>>
<?= $Page->A100Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
    <tr id="r_A100Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Amount"><template id="tpc_depositdetails_A100Amount"><?= $Page->A100Amount->caption() ?></template></span></td>
        <td data-name="A100Amount" <?= $Page->A100Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A100Amount"><span id="el_depositdetails_A100Amount">
<span<?= $Page->A100Amount->viewAttributes() ?>>
<?= $Page->A100Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
    <tr id="r_A50Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Count"><template id="tpc_depositdetails_A50Count"><?= $Page->A50Count->caption() ?></template></span></td>
        <td data-name="A50Count" <?= $Page->A50Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A50Count"><span id="el_depositdetails_A50Count">
<span<?= $Page->A50Count->viewAttributes() ?>>
<?= $Page->A50Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
    <tr id="r_A50Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Amount"><template id="tpc_depositdetails_A50Amount"><?= $Page->A50Amount->caption() ?></template></span></td>
        <td data-name="A50Amount" <?= $Page->A50Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A50Amount"><span id="el_depositdetails_A50Amount">
<span<?= $Page->A50Amount->viewAttributes() ?>>
<?= $Page->A50Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
    <tr id="r_A20Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Count"><template id="tpc_depositdetails_A20Count"><?= $Page->A20Count->caption() ?></template></span></td>
        <td data-name="A20Count" <?= $Page->A20Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A20Count"><span id="el_depositdetails_A20Count">
<span<?= $Page->A20Count->viewAttributes() ?>>
<?= $Page->A20Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
    <tr id="r_A20Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Amount"><template id="tpc_depositdetails_A20Amount"><?= $Page->A20Amount->caption() ?></template></span></td>
        <td data-name="A20Amount" <?= $Page->A20Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A20Amount"><span id="el_depositdetails_A20Amount">
<span<?= $Page->A20Amount->viewAttributes() ?>>
<?= $Page->A20Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
    <tr id="r_A10Count">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Count"><template id="tpc_depositdetails_A10Count"><?= $Page->A10Count->caption() ?></template></span></td>
        <td data-name="A10Count" <?= $Page->A10Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A10Count"><span id="el_depositdetails_A10Count">
<span<?= $Page->A10Count->viewAttributes() ?>>
<?= $Page->A10Count->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
    <tr id="r_A10Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Amount"><template id="tpc_depositdetails_A10Amount"><?= $Page->A10Amount->caption() ?></template></span></td>
        <td data-name="A10Amount" <?= $Page->A10Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A10Amount"><span id="el_depositdetails_A10Amount">
<span<?= $Page->A10Amount->viewAttributes() ?>>
<?= $Page->A10Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
    <tr id="r_BalanceAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_BalanceAmount"><template id="tpc_depositdetails_BalanceAmount"><?= $Page->BalanceAmount->caption() ?></template></span></td>
        <td data-name="BalanceAmount" <?= $Page->BalanceAmount->cellAttributes() ?>>
<template id="tpx_depositdetails_BalanceAmount"><span id="el_depositdetails_BalanceAmount">
<span<?= $Page->BalanceAmount->viewAttributes() ?>>
<?= $Page->BalanceAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
    <tr id="r_CashCollected">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_CashCollected"><template id="tpc_depositdetails_CashCollected"><?= $Page->CashCollected->caption() ?></template></span></td>
        <td data-name="CashCollected" <?= $Page->CashCollected->cellAttributes() ?>>
<template id="tpx_depositdetails_CashCollected"><span id="el_depositdetails_CashCollected">
<span<?= $Page->CashCollected->viewAttributes() ?>>
<?= $Page->CashCollected->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
    <tr id="r_RTGS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_RTGS"><template id="tpc_depositdetails_RTGS"><?= $Page->RTGS->caption() ?></template></span></td>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<template id="tpx_depositdetails_RTGS"><span id="el_depositdetails_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
    <tr id="r_PAYTM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_PAYTM"><template id="tpc_depositdetails_PAYTM"><?= $Page->PAYTM->caption() ?></template></span></td>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<template id="tpx_depositdetails_PAYTM"><span id="el_depositdetails_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_HospID"><template id="tpc_depositdetails_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_depositdetails_HospID"><span id="el_depositdetails_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
    <tr id="r_ManualCash">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_ManualCash"><template id="tpc_depositdetails_ManualCash"><?= $Page->ManualCash->caption() ?></template></span></td>
        <td data-name="ManualCash" <?= $Page->ManualCash->cellAttributes() ?>>
<template id="tpx_depositdetails_ManualCash"><span id="el_depositdetails_ManualCash">
<span<?= $Page->ManualCash->viewAttributes() ?>>
<?= $Page->ManualCash->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
    <tr id="r_ManualCard">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_depositdetails_ManualCard"><template id="tpc_depositdetails_ManualCard"><?= $Page->ManualCard->caption() ?></template></span></td>
        <td data-name="ManualCard" <?= $Page->ManualCard->cellAttributes() ?>>
<template id="tpx_depositdetails_ManualCard"><span id="el_depositdetails_ManualCard">
<span<?= $Page->ManualCard->viewAttributes() ?>>
<?= $Page->ManualCard->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_depositdetailsview" class="ew-custom-template"></div>
<template id="tpm_depositdetailsview">
<div id="ct_DepositdetailsView"><style>
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
.form-control:not(textarea) {
	width: auto;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
				 <div><slot class="ew-slot" name="tpc_depositdetails_DepositToBankSelect"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositToBankSelect"></slot></div>
				 <div id="DepositToBankid"><slot class="ew-slot" name="tpc_depositdetails_DepositToBank"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositToBank"></slot></div>
				 <div id="TransferToid"><slot class="ew-slot" name="tpc_depositdetails_TransferTo"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TransferTo"></slot></div>
				 <div><slot class="ew-slot" name="tpc_depositdetails_DepositDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositDate"></slot></div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
			  <!-- /.card-body -->
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td  align="right" style="width: 40px">Opening Balance</td><td  align="right" style="width: 40px"></td><td  align="right" style="width: 40px"><slot class="ew-slot" name="tpc_depositdetails_OpeningBalance"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_OpeningBalance"></slot></td></tr>
				</tbody>
</table>			
<table class="table table-condensed">
<thead align="right">
					<tr>
					  <th align="right" style="width: 40px">Denomination</th>
					  <th align="right" style="width: 40px">Count</th>
					  <th align="right" style="width: 40px">Amount</th>
					</tr>
				  </thead>
	 <tbody align="right">
		<tr><td>2000</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A2000Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A2000Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A2000Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A2000Amount"></slot></td></tr>
		<tr><td>1000</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A1000Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A1000Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A1000Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A1000Amount"></slot></td></tr>
		<tr><td>500</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A500Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A500Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A500Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A500Amount"></slot></td></tr>
		<tr><td>200</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A200Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A200Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A200Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A200Amount"></slot></td></tr>
		<tr><td>100</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A100Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A100Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A100Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A100Amount"></slot></td></tr>
		<tr><td>50</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A50Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A50Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A50Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A50Amount"></slot></td></tr>
		<tr><td>20</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A20Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A20Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A20Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A20Amount"></slot></td></tr>
		<tr><td>10</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A10Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A10Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A10Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A10Amount"></slot></td></tr>
		<tr><td>Other</td><td></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_Other"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Other"></slot></td></tr>
	</tbody>
</table>
<hr>
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td>Total Cash</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_TotalCash"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TotalCash"></slot></td></tr>
				 				<tr><td>Cash Collected</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_CashCollected"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_CashCollected"></slot></td></tr>
				 			<tr><td>Cheque</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_Cheque"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Cheque"></slot></td></tr>
				 			<tr><td>Card</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_Card"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Card"></slot></td></tr>
				 					<tr><td>PAYTM</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_PAYTM"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_PAYTM"></slot></td></tr>
				 			<tr><td>NEFT</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_NEFTRTGS"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_NEFTRTGS"></slot></td></tr>
				 				<tr><td>RTGS</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_RTGS"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_RTGS"></slot></td></tr>
				 					<tr><td>Manual Cash</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_ManualCash"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_ManualCash"></slot></td></tr>
				 						<tr><td>Manual Card </td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_ManualCard"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_ManualCard"></slot></td></tr>
				 			<tr><td>Total Transfer / Deposit Amount</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_TotalTransferDepositAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TotalTransferDepositAmount"></slot></td></tr>
				 			<tr><td>Balance Amount</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_BalanceAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_BalanceAmount"></slot></td></tr>
				</tbody>
</table>			
			</div>
		</div>
	</div>
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_depositdetailsview", "tpm_depositdetailsview", "depositdetailsview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Startup script
    function calculateAmount(){var e=+document.getElementById("x_A2000Count").value;document.getElementById("x_A2000Amount").value=2e3*e;var t=+document.getElementById("x_A1000Count").value;document.getElementById("x_A1000Amount").value=1e3*t;var n=+document.getElementById("x_A500Count").value;document.getElementById("x_A500Amount").value=500*n;var u=+document.getElementById("x_A200Count").value;document.getElementById("x_A200Amount").value=200*u;var m=+document.getElementById("x_A100Count").value;document.getElementById("x_A100Amount").value=100*m;var l=+document.getElementById("x_A50Count").value;document.getElementById("x_A50Amount").value=50*l;var d=+document.getElementById("x_A20Count").value;document.getElementById("x_A20Amount").value=20*d;var o=+document.getElementById("x_A10Count").value;document.getElementById("x_A10Amount").value=10*o;var a=+document.getElementById("x_A2000Amount").value,A=+document.getElementById("x_A1000Amount").value,v=+document.getElementById("x_A500Amount").value,c=+document.getElementById("x_A200Amount").value,y=+document.getElementById("x_A100Amount").value,B=+document.getElementById("x_A50Amount").value,g=+document.getElementById("x_A20Amount").value,E=+document.getElementById("x_A10Amount").value,I=+document.getElementById("x_OpeningBalance").value,x=+document.getElementById("x_Other").value;document.getElementById("x_TotalCash").value=a+A+v+c+y+B+g+E+I+x;var _=+document.getElementById("x_TotalCash").value,i=+document.getElementById("x_TotalTransferDepositAmount").value;document.getElementById("x_BalanceAmount").value=_-i}document.getElementById("DepositToBankid").style.visibility="hidden",document.getElementById("TransferToid").style.visibility="hidden";
});
</script>
<?php } ?>
