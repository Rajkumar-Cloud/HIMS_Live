<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyGrnList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_grnlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_grnlist = currentForm = new ew.Form("fpharmacy_grnlist", "list");
    fpharmacy_grnlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_grnlist");
});
var fpharmacy_grnlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_grnlistsrch = currentSearchForm = new ew.Form("fpharmacy_grnlistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_grnlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_grnlistsrch");
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
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_grnlistsrch" id="fpharmacy_grnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_grnlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_grn">
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<form name="fpharmacy_grnlist" id="fpharmacy_grnlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<div id="gmp_pharmacy_grn" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_grnlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <th data-name="GRNNO" class="<?= $Page->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?= $Page->renderSort($Page->GRNNO) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th data-name="YM" class="<?= $Page->YM->headerCellClass() ?>"><div id="elh_pharmacy_grn_YM" class="pharmacy_grn_YM"><?= $Page->renderSort($Page->YM) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_pharmacy_grn_PC" class="pharmacy_grn_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th data-name="Customercode" class="<?= $Page->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customercode" class="pharmacy_grn_Customercode"><?= $Page->renderSort($Page->Customercode) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th data-name="pharmacy_pocol" class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_grn_pharmacy_pocol" class="pharmacy_grn_pharmacy_pocol"><?= $Page->renderSort($Page->pharmacy_pocol) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th data-name="Fax" class="<?= $Page->Fax->headerCellClass() ?>"><div id="elh_pharmacy_grn_Fax" class="pharmacy_grn_Fax"><?= $Page->renderSort($Page->Fax) ?></div></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th data-name="EEmail" class="<?= $Page->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_grn_EEmail" class="pharmacy_grn_EEmail"><?= $Page->renderSort($Page->EEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_grn_HospID" class="pharmacy_grn_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_grn_createdby" class="pharmacy_grn_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_grn_createddatetime" class="pharmacy_grn_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_grn_modifiedby" class="pharmacy_grn_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_grn_modifieddatetime" class="pharmacy_grn_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Page->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?= $Page->renderSort($Page->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Page->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?= $Page->renderSort($Page->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_grn_BRCODE" class="pharmacy_grn_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <th data-name="PharmacyID" class="<?= $Page->PharmacyID->headerCellClass() ?>"><div id="elh_pharmacy_grn_PharmacyID" class="pharmacy_grn_PharmacyID"><?= $Page->renderSort($Page->PharmacyID) ?></div></th>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <th data-name="BillTotalValue" class="<?= $Page->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?= $Page->renderSort($Page->BillTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th data-name="GRNTotalValue" class="<?= $Page->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?= $Page->renderSort($Page->GRNTotalValue) ?></div></th>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <th data-name="BillDiscount" class="<?= $Page->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?= $Page->renderSort($Page->BillDiscount) ?></div></th>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
        <th data-name="TransPort" class="<?= $Page->TransPort->headerCellClass() ?>"><div id="elh_pharmacy_grn_TransPort" class="pharmacy_grn_TransPort"><?= $Page->renderSort($Page->TransPort) ?></div></th>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <th data-name="AnyOther" class="<?= $Page->AnyOther->headerCellClass() ?>"><div id="elh_pharmacy_grn_AnyOther" class="pharmacy_grn_AnyOther"><?= $Page->renderSort($Page->AnyOther) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_grn_Remarks" class="pharmacy_grn_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <th data-name="GrnValue" class="<?= $Page->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?= $Page->renderSort($Page->GrnValue) ?></div></th>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
        <th data-name="Pid" class="<?= $Page->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?= $Page->renderSort($Page->Pid) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <th data-name="PaymentNo" class="<?= $Page->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?= $Page->renderSort($Page->PaymentNo) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Page->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?= $Page->renderSort($Page->PaidAmount) ?></div></th>
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
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_grn", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" <?= $Page->GRNNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->YM->Visible) { // YM ?>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fax->Visible) { // Fax ?>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
        <td data-name="PharmacyID" <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PharmacyID">
<span<?= $Page->PharmacyID->viewAttributes() ?>>
<?= $Page->PharmacyID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillTotalValue">
<span<?= $Page->BillTotalValue->viewAttributes() ?>>
<?= $Page->BillTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GRNTotalValue">
<span<?= $Page->GRNTotalValue->viewAttributes() ?>>
<?= $Page->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_BillDiscount">
<span<?= $Page->BillDiscount->viewAttributes() ?>>
<?= $Page->BillDiscount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransPort->Visible) { // TransPort ?>
        <td data-name="TransPort" <?= $Page->TransPort->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_TransPort">
<span<?= $Page->TransPort->viewAttributes() ?>>
<?= $Page->TransPort->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnyOther->Visible) { // AnyOther ?>
        <td data-name="AnyOther" <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_AnyOther">
<span<?= $Page->AnyOther->viewAttributes() ?>>
<?= $Page->AnyOther->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue" <?= $Page->GrnValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_GrnValue">
<span<?= $Page->GrnValue->viewAttributes() ?>>
<?= $Page->GrnValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pid->Visible) { // Pid ?>
        <td data-name="Pid" <?= $Page->Pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<?= $Page->Pid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" <?= $Page->PaymentNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentNo">
<span<?= $Page->PaymentNo->viewAttributes() ?>>
<?= $Page->PaymentNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_grn_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
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
    ew.addEventHandlers("pharmacy_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
