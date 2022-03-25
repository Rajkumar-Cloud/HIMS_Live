<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPoList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_polist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_polist = currentForm = new ew.Form("fpharmacy_polist", "list");
    fpharmacy_polist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_polist");
});
var fpharmacy_polistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_polistsrch = currentSearchForm = new ew.Form("fpharmacy_polistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_polistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_polistsrch");
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
<form name="fpharmacy_polistsrch" id="fpharmacy_polistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_polistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_po">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_po">
<form name="fpharmacy_polist" id="fpharmacy_polist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<div id="gmp_pharmacy_po" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_polist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_po_id" class="pharmacy_po_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <th data-name="ORDNO" class="<?= $Page->ORDNO->headerCellClass() ?>"><div id="elh_pharmacy_po_ORDNO" class="pharmacy_po_ORDNO"><?= $Page->renderSort($Page->ORDNO) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_pharmacy_po_DT" class="pharmacy_po_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th data-name="YM" class="<?= $Page->YM->headerCellClass() ?>"><div id="elh_pharmacy_po_YM" class="pharmacy_po_YM"><?= $Page->renderSort($Page->YM) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_pharmacy_po_PC" class="pharmacy_po_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th data-name="Customercode" class="<?= $Page->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_po_Customercode" class="pharmacy_po_Customercode"><?= $Page->renderSort($Page->Customercode) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_pharmacy_po_Customername" class="pharmacy_po_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <th data-name="pharmacy_pocol" class="<?= $Page->pharmacy_pocol->headerCellClass() ?>"><div id="elh_pharmacy_po_pharmacy_pocol" class="pharmacy_po_pharmacy_pocol"><?= $Page->renderSort($Page->pharmacy_pocol) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_pharmacy_po_State" class="pharmacy_po_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_po_Pincode" class="pharmacy_po_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_pharmacy_po_Phone" class="pharmacy_po_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th data-name="Fax" class="<?= $Page->Fax->headerCellClass() ?>"><div id="elh_pharmacy_po_Fax" class="pharmacy_po_Fax"><?= $Page->renderSort($Page->Fax) ?></div></th>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
        <th data-name="EEmail" class="<?= $Page->EEmail->headerCellClass() ?>"><div id="elh_pharmacy_po_EEmail" class="pharmacy_po_EEmail"><?= $Page->renderSort($Page->EEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_po_HospID" class="pharmacy_po_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_po_createdby" class="pharmacy_po_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_createddatetime" class="pharmacy_po_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_po_modifiedby" class="pharmacy_po_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_po_modifieddatetime" class="pharmacy_po_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_po_BRCODE" class="pharmacy_po_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_po", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_pharmacy_po_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->YM->Visible) { // YM ?>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <td data-name="pharmacy_pocol" <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_pharmacy_pocol">
<span<?= $Page->pharmacy_pocol->viewAttributes() ?>>
<?= $Page->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fax->Visible) { // Fax ?>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EEmail->Visible) { // EEmail ?>
        <td data-name="EEmail" <?= $Page->EEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_EEmail">
<span<?= $Page->EEmail->viewAttributes() ?>>
<?= $Page->EEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_po_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
    ew.addEventHandlers("pharmacy_po");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
