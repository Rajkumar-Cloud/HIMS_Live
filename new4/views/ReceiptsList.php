<?php

namespace PHPMaker2021\HIMS;

// Page object
$ReceiptsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var freceiptslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    freceiptslist = currentForm = new ew.Form("freceiptslist", "list");
    freceiptslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("freceiptslist");
});
var freceiptslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    freceiptslistsrch = currentSearchForm = new ew.Form("freceiptslistsrch");

    // Dynamic selection lists

    // Filters
    freceiptslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("freceiptslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
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
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="freceiptslistsrch" id="freceiptslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="freceiptslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="receipts">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> receipts">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="freceiptslist" id="freceiptslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="receipts">
<div id="gmp_receipts" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_receiptslist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_receipts_id" class="receipts_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_receipts_Reception" class="receipts_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <th data-name="Aid" class="<?= $Page->Aid->headerCellClass() ?>"><div id="elh_receipts_Aid" class="receipts_Aid"><?= $Page->renderSort($Page->Aid) ?></div></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Page->Vid->headerCellClass() ?>"><div id="elh_receipts_Vid" class="receipts_Vid"><?= $Page->renderSort($Page->Vid) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_receipts_patient_id" class="receipts_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_receipts_mrnno" class="receipts_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_receipts_PatientName" class="receipts_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_receipts_amount" class="receipts_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Page->Discount->headerCellClass() ?>"><div id="elh_receipts_Discount" class="receipts_Discount"><?= $Page->renderSort($Page->Discount) ?></div></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Page->SubTotal->headerCellClass() ?>"><div id="elh_receipts_SubTotal" class="receipts_SubTotal"><?= $Page->renderSort($Page->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <th data-name="patient_type" class="<?= $Page->patient_type->headerCellClass() ?>"><div id="elh_receipts_patient_type" class="receipts_patient_type"><?= $Page->renderSort($Page->patient_type) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Page->invoiceId->headerCellClass() ?>"><div id="elh_receipts_invoiceId" class="receipts_invoiceId"><?= $Page->renderSort($Page->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <th data-name="invoiceAmount" class="<?= $Page->invoiceAmount->headerCellClass() ?>"><div id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><?= $Page->renderSort($Page->invoiceAmount) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <th data-name="invoiceStatus" class="<?= $Page->invoiceStatus->headerCellClass() ?>"><div id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><?= $Page->renderSort($Page->invoiceStatus) ?></div></th>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <th data-name="modeOfPayment" class="<?= $Page->modeOfPayment->headerCellClass() ?>"><div id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><?= $Page->renderSort($Page->modeOfPayment) ?></div></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Page->charged_date->headerCellClass() ?>"><div id="elh_receipts_charged_date" class="receipts_charged_date"><?= $Page->renderSort($Page->charged_date) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_receipts_status" class="receipts_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_receipts_createdby" class="receipts_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_receipts_createddatetime" class="receipts_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_receipts_modifiedby" class="receipts_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
        <th data-name="ChequeCardNo" class="<?= $Page->ChequeCardNo->headerCellClass() ?>"><div id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><?= $Page->renderSort($Page->ChequeCardNo) ?></div></th>
<?php } ?>
<?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
        <th data-name="CreditBankName" class="<?= $Page->CreditBankName->headerCellClass() ?>"><div id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><?= $Page->renderSort($Page->CreditBankName) ?></div></th>
<?php } ?>
<?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
        <th data-name="CreditCardHolder" class="<?= $Page->CreditCardHolder->headerCellClass() ?>"><div id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><?= $Page->renderSort($Page->CreditCardHolder) ?></div></th>
<?php } ?>
<?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
        <th data-name="CreditCardType" class="<?= $Page->CreditCardType->headerCellClass() ?>"><div id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><?= $Page->renderSort($Page->CreditCardType) ?></div></th>
<?php } ?>
<?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
        <th data-name="CreditCardMachine" class="<?= $Page->CreditCardMachine->headerCellClass() ?>"><div id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><?= $Page->renderSort($Page->CreditCardMachine) ?></div></th>
<?php } ?>
<?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
        <th data-name="CreditCardBatchNo" class="<?= $Page->CreditCardBatchNo->headerCellClass() ?>"><div id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><?= $Page->renderSort($Page->CreditCardBatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
        <th data-name="CreditCardTax" class="<?= $Page->CreditCardTax->headerCellClass() ?>"><div id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><?= $Page->renderSort($Page->CreditCardTax) ?></div></th>
<?php } ?>
<?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
        <th data-name="CreditDeductionAmount" class="<?= $Page->CreditDeductionAmount->headerCellClass() ?>"><div id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><?= $Page->renderSort($Page->CreditDeductionAmount) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th data-name="RealizationAmount" class="<?= $Page->RealizationAmount->headerCellClass() ?>"><div id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><?= $Page->renderSort($Page->RealizationAmount) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <th data-name="RealizationStatus" class="<?= $Page->RealizationStatus->headerCellClass() ?>"><div id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><?= $Page->renderSort($Page->RealizationStatus) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <th data-name="RealizationRemarks" class="<?= $Page->RealizationRemarks->headerCellClass() ?>"><div id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><?= $Page->renderSort($Page->RealizationRemarks) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <th data-name="RealizationBatchNo" class="<?= $Page->RealizationBatchNo->headerCellClass() ?>"><div id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><?= $Page->renderSort($Page->RealizationBatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <th data-name="RealizationDate" class="<?= $Page->RealizationDate->headerCellClass() ?>"><div id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><?= $Page->renderSort($Page->RealizationDate) ?></div></th>
<?php } ?>
<?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
        <th data-name="BankAccHolderMobileNumber" class="<?= $Page->BankAccHolderMobileNumber->headerCellClass() ?>"><div id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><?= $Page->renderSort($Page->BankAccHolderMobileNumber) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_receipts", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Aid->Visible) { // Aid ?>
        <td data-name="Aid" <?= $Page->Aid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td data-name="patient_type" <?= $Page->patient_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td data-name="invoiceAmount" <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td data-name="invoiceStatus" <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td data-name="modeOfPayment" <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
        <td data-name="ChequeCardNo" <?= $Page->ChequeCardNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_ChequeCardNo">
<span<?= $Page->ChequeCardNo->viewAttributes() ?>>
<?= $Page->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
        <td data-name="CreditBankName" <?= $Page->CreditBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditBankName">
<span<?= $Page->CreditBankName->viewAttributes() ?>>
<?= $Page->CreditBankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
        <td data-name="CreditCardHolder" <?= $Page->CreditCardHolder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardHolder">
<span<?= $Page->CreditCardHolder->viewAttributes() ?>>
<?= $Page->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
        <td data-name="CreditCardType" <?= $Page->CreditCardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardType">
<span<?= $Page->CreditCardType->viewAttributes() ?>>
<?= $Page->CreditCardType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
        <td data-name="CreditCardMachine" <?= $Page->CreditCardMachine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardMachine">
<span<?= $Page->CreditCardMachine->viewAttributes() ?>>
<?= $Page->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
        <td data-name="CreditCardBatchNo" <?= $Page->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardBatchNo">
<span<?= $Page->CreditCardBatchNo->viewAttributes() ?>>
<?= $Page->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
        <td data-name="CreditCardTax" <?= $Page->CreditCardTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardTax">
<span<?= $Page->CreditCardTax->viewAttributes() ?>>
<?= $Page->CreditCardTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
        <td data-name="CreditDeductionAmount" <?= $Page->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditDeductionAmount">
<span<?= $Page->CreditDeductionAmount->viewAttributes() ?>>
<?= $Page->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
        <td data-name="BankAccHolderMobileNumber" <?= $Page->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_BankAccHolderMobileNumber">
<span<?= $Page->BankAccHolderMobileNumber->viewAttributes() ?>>
<?= $Page->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("receipts");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_receipts",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
