<?php

namespace PHPMaker2021\HIMS;

// Page object
$StoreGrnList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_grnlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fstore_grnlist = currentForm = new ew.Form("fstore_grnlist", "list");
    fstore_grnlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fstore_grnlist");
});
var fstore_grnlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fstore_grnlistsrch = currentSearchForm = new ew.Form("fstore_grnlistsrch");

    // Dynamic selection lists

    // Filters
    fstore_grnlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fstore_grnlistsrch");
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
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "store_payment") {
    if ($Page->MasterRecordExists) {
        include_once "views/StorePaymentMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fstore_grnlistsrch" id="fstore_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fstore_grnlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_grn">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_grn">
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
<form name="fstore_grnlist" id="fstore_grnlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<?php if ($Page->getCurrentMasterTable() == "store_payment" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="store_payment">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Pid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_store_grn" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_store_grnlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_store_grn_id" class="store_grn_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <th data-name="GRNNO" class="<?= $Page->GRNNO->headerCellClass() ?>"><div id="elh_store_grn_GRNNO" class="store_grn_GRNNO"><?= $Page->renderSort($Page->GRNNO) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_store_grn_DT" class="store_grn_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_store_grn_Customername" class="store_grn_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_store_grn_State" class="store_grn_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_store_grn_Pincode" class="store_grn_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_store_grn_Phone" class="store_grn_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Page->BILLNO->headerCellClass() ?>"><div id="elh_store_grn_BILLNO" class="store_grn_BILLNO"><?= $Page->renderSort($Page->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Page->BILLDT->headerCellClass() ?>"><div id="elh_store_grn_BILLDT" class="store_grn_BILLDT"><?= $Page->renderSort($Page->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th data-name="BillTotalValue" class="<?= $Page->BillTotalValue->headerCellClass() ?>"><div id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue"><?= $Page->renderSort($Page->BillTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th data-name="GRNTotalValue" class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><div id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue"><?= $Page->renderSort($Page->GRNTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th data-name="BillDiscount" class="<?= $Page->BillDiscount->headerCellClass() ?>"><div id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount"><?= $Page->renderSort($Page->BillDiscount) ?></div></th>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <th data-name="GrnValue" class="<?= $Page->GrnValue->headerCellClass() ?>"><div id="elh_store_grn_GrnValue" class="store_grn_GrnValue"><?= $Page->renderSort($Page->GrnValue) ?></div></th>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <th data-name="Pid" class="<?= $Page->Pid->headerCellClass() ?>"><div id="elh_store_grn_Pid" class="store_grn_Pid"><?= $Page->renderSort($Page->Pid) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <th data-name="PaymentNo" class="<?= $Page->PaymentNo->headerCellClass() ?>"><div id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo"><?= $Page->renderSort($Page->PaymentNo) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Page->PaidAmount->headerCellClass() ?>"><div id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount"><?= $Page->renderSort($Page->PaidAmount) ?></div></th>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
        <th data-name="StoreID" class="<?= $Page->StoreID->headerCellClass() ?>"><div id="elh_store_grn_StoreID" class="store_grn_StoreID"><?= $Page->renderSort($Page->StoreID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_store_grn", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_store_grn_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" <?= $Page->GRNNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue" <?= $Page->GrnValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_GrnValue">
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pid->Visible) { // Pid ?>
        <td data-name="Pid" <?= $Page->Pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" <?= $Page->PaymentNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" <?= $Page->StoreID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_grn_StoreID">
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
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_store_grn_id" class="store_grn_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" class="<?= $Page->GRNNO->footerCellClass() ?>"><span id="elf_store_grn_GRNNO" class="store_grn_GRNNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" class="<?= $Page->DT->footerCellClass() ?>"><span id="elf_store_grn_DT" class="store_grn_DT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" class="<?= $Page->Customername->footerCellClass() ?>"><span id="elf_store_grn_Customername" class="store_grn_Customername">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" class="<?= $Page->State->footerCellClass() ?>"><span id="elf_store_grn_State" class="store_grn_State">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" class="<?= $Page->Pincode->footerCellClass() ?>"><span id="elf_store_grn_Pincode" class="store_grn_Pincode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" class="<?= $Page->Phone->footerCellClass() ?>"><span id="elf_store_grn_Phone" class="store_grn_Phone">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" class="<?= $Page->BILLNO->footerCellClass() ?>"><span id="elf_store_grn_BILLNO" class="store_grn_BILLNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" class="<?= $Page->BILLDT->footerCellClass() ?>"><span id="elf_store_grn_BILLDT" class="store_grn_BILLDT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" class="<?= $Page->BillTotalValue->footerCellClass() ?>"><span id="elf_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->BillTotalValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" class="<?= $Page->GRNTotalValue->footerCellClass() ?>"><span id="elf_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->GRNTotalValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" class="<?= $Page->BillDiscount->footerCellClass() ?>"><span id="elf_store_grn_BillDiscount" class="store_grn_BillDiscount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->BillDiscount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue" class="<?= $Page->GrnValue->footerCellClass() ?>"><span id="elf_store_grn_GrnValue" class="store_grn_GrnValue">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Pid->Visible) { // Pid ?>
        <td data-name="Pid" class="<?= $Page->Pid->footerCellClass() ?>"><span id="elf_store_grn_Pid" class="store_grn_Pid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" class="<?= $Page->PaymentNo->footerCellClass() ?>"><span id="elf_store_grn_PaymentNo" class="store_grn_PaymentNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" class="<?= $Page->PaymentStatus->footerCellClass() ?>"><span id="elf_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" class="<?= $Page->PaidAmount->footerCellClass() ?>"><span id="elf_store_grn_PaidAmount" class="store_grn_PaidAmount">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->StoreID->Visible) { // StoreID ?>
        <td data-name="StoreID" class="<?= $Page->StoreID->footerCellClass() ?>"><span id="elf_store_grn_StoreID" class="store_grn_StoreID">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
    ew.addEventHandlers("store_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: scroll;
    }
    </style>
    <script>
    $("[data-name='Quantity']").hide();
    $("[data-name='BillDate']").hide();
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_store_grn",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
