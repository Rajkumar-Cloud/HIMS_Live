<?php

namespace PHPMaker2021\HIMS;

// Page object
$StorePaymentList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_paymentlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fstore_paymentlist = currentForm = new ew.Form("fstore_paymentlist", "list");
    fstore_paymentlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fstore_paymentlist");
});
var fstore_paymentlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fstore_paymentlistsrch = currentSearchForm = new ew.Form("fstore_paymentlistsrch");

    // Dynamic selection lists

    // Filters
    fstore_paymentlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fstore_paymentlistsrch");
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
<form name="fstore_paymentlistsrch" id="fstore_paymentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fstore_paymentlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_payment">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_payment">
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
<form name="fstore_paymentlist" id="fstore_paymentlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_payment">
<div id="gmp_store_payment" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_store_paymentlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_store_payment_id" class="store_payment_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
        <th data-name="PAYNO" class="<?= $Page->PAYNO->headerCellClass() ?>"><div id="elh_store_payment_PAYNO" class="store_payment_PAYNO"><?= $Page->renderSort($Page->PAYNO) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_store_payment_DT" class="store_payment_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th data-name="YM" class="<?= $Page->YM->headerCellClass() ?>"><div id="elh_store_payment_YM" class="store_payment_YM"><?= $Page->renderSort($Page->YM) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_store_payment_PC" class="store_payment_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th data-name="Customercode" class="<?= $Page->Customercode->headerCellClass() ?>"><div id="elh_store_payment_Customercode" class="store_payment_Customercode"><?= $Page->renderSort($Page->Customercode) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_store_payment_Customername" class="store_payment_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th data-name="pharmacy_pocol" class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><div id="elh_store_payment_pharmacy_pocol" class="store_payment_pharmacy_pocol"><?= $Page->renderSort($Page->pharmacy_pocol) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_store_payment_State" class="store_payment_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_store_payment_Pincode" class="store_payment_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_store_payment_Phone" class="store_payment_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th data-name="Fax" class="<?= $Page->Fax->headerCellClass() ?>"><div id="elh_store_payment_Fax" class="store_payment_Fax"><?= $Page->renderSort($Page->Fax) ?></div></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th data-name="EEmail" class="<?= $Page->EEmail->headerCellClass() ?>"><div id="elh_store_payment_EEmail" class="store_payment_EEmail"><?= $Page->renderSort($Page->EEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_store_payment_HospID" class="store_payment_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_store_payment_createdby" class="store_payment_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_store_payment_createddatetime" class="store_payment_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_store_payment_modifiedby" class="store_payment_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_store_payment_modifieddatetime" class="store_payment_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <th data-name="PharmacyID" class="<?= $Page->PharmacyID->headerCellClass() ?>"><div id="elh_store_payment_PharmacyID" class="store_payment_PharmacyID"><?= $Page->renderSort($Page->PharmacyID) ?></div></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th data-name="BillTotalValue" class="<?= $Page->BillTotalValue->headerCellClass() ?>"><div id="elh_store_payment_BillTotalValue" class="store_payment_BillTotalValue"><?= $Page->renderSort($Page->BillTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th data-name="GRNTotalValue" class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><div id="elh_store_payment_GRNTotalValue" class="store_payment_GRNTotalValue"><?= $Page->renderSort($Page->GRNTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th data-name="BillDiscount" class="<?= $Page->BillDiscount->headerCellClass() ?>"><div id="elh_store_payment_BillDiscount" class="store_payment_BillDiscount"><?= $Page->renderSort($Page->BillDiscount) ?></div></th>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <th data-name="TransPort" class="<?= $Page->TransPort->headerCellClass() ?>"><div id="elh_store_payment_TransPort" class="store_payment_TransPort"><?= $Page->renderSort($Page->TransPort) ?></div></th>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <th data-name="AnyOther" class="<?= $Page->AnyOther->headerCellClass() ?>"><div id="elh_store_payment_AnyOther" class="store_payment_AnyOther"><?= $Page->renderSort($Page->AnyOther) ?></div></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th data-name="voucher_type" class="<?= $Page->voucher_type->headerCellClass() ?>"><div id="elh_store_payment_voucher_type" class="store_payment_voucher_type"><?= $Page->renderSort($Page->voucher_type) ?></div></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Page->Details->headerCellClass() ?>"><div id="elh_store_payment_Details" class="store_payment_Details"><?= $Page->renderSort($Page->Details) ?></div></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div id="elh_store_payment_ModeofPayment" class="store_payment_ModeofPayment"><?= $Page->renderSort($Page->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Page->Amount->headerCellClass() ?>"><div id="elh_store_payment_Amount" class="store_payment_Amount"><?= $Page->renderSort($Page->Amount) ?></div></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th data-name="BankName" class="<?= $Page->BankName->headerCellClass() ?>"><div id="elh_store_payment_BankName" class="store_payment_BankName"><?= $Page->renderSort($Page->BankName) ?></div></th>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
        <th data-name="AccountNumber" class="<?= $Page->AccountNumber->headerCellClass() ?>"><div id="elh_store_payment_AccountNumber" class="store_payment_AccountNumber"><?= $Page->renderSort($Page->AccountNumber) ?></div></th>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
        <th data-name="chequeNumber" class="<?= $Page->chequeNumber->headerCellClass() ?>"><div id="elh_store_payment_chequeNumber" class="store_payment_chequeNumber"><?= $Page->renderSort($Page->chequeNumber) ?></div></th>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <th data-name="SeectPaymentMode" class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><div id="elh_store_payment_SeectPaymentMode" class="store_payment_SeectPaymentMode"><?= $Page->renderSort($Page->SeectPaymentMode) ?></div></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Page->PaidAmount->headerCellClass() ?>"><div id="elh_store_payment_PaidAmount" class="store_payment_PaidAmount"><?= $Page->renderSort($Page->PaidAmount) ?></div></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th data-name="Currency" class="<?= $Page->Currency->headerCellClass() ?>"><div id="elh_store_payment_Currency" class="store_payment_Currency"><?= $Page->renderSort($Page->Currency) ?></div></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th data-name="CardNumber" class="<?= $Page->CardNumber->headerCellClass() ?>"><div id="elh_store_payment_CardNumber" class="store_payment_CardNumber"><?= $Page->renderSort($Page->CardNumber) ?></div></th>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
        <th data-name="BranchID" class="<?= $Page->BranchID->headerCellClass() ?>"><div id="elh_store_payment_BranchID" class="store_payment_BranchID"><?= $Page->renderSort($Page->BranchID) ?></div></th>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <th data-name="StoreID" class="<?= $Page->StoreID->headerCellClass() ?>"><div id="elh_store_payment_StoreID" class="store_payment_StoreID"><?= $Page->renderSort($Page->StoreID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_store_payment", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_store_payment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYNO->Visible) { // PAYNO ?>
        <td data-name="PAYNO" <?= $Page->PAYNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PAYNO">
<span<?= $Page->PAYNO->viewAttributes() ?>>
<?= $Page->PAYNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->YM->Visible) { // YM ?>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fax->Visible) { // Fax ?>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <td data-name="PharmacyID" <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransPort->Visible) { // TransPort ?>
        <td data-name="TransPort" <?= $Page->TransPort->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <td data-name="AnyOther" <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BankName->Visible) { // BankName ?>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
        <td data-name="AccountNumber" <?= $Page->AccountNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_AccountNumber">
<span<?= $Page->AccountNumber->viewAttributes() ?>>
<?= $Page->AccountNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
        <td data-name="chequeNumber" <?= $Page->chequeNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_chequeNumber">
<span<?= $Page->chequeNumber->viewAttributes() ?>>
<?= $Page->chequeNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <td data-name="SeectPaymentMode" <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Currency->Visible) { // Currency ?>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BranchID->Visible) { // BranchID ?>
        <td data-name="BranchID" <?= $Page->BranchID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_BranchID">
<span<?= $Page->BranchID->viewAttributes() ?>>
<?= $Page->BranchID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" <?= $Page->StoreID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_payment_StoreID">
<span<?= $Page->StoreID->viewAttributes() ?>>
<?= $Page->StoreID->getViewValue() ?></span>
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
    ew.addEventHandlers("store_payment");
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
        container: "gmp_store_payment",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
