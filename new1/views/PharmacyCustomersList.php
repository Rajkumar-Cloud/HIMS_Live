<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyCustomersList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_customerslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_customerslist = currentForm = new ew.Form("fpharmacy_customerslist", "list");
    fpharmacy_customerslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_customerslist");
});
var fpharmacy_customerslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_customerslistsrch = currentSearchForm = new ew.Form("fpharmacy_customerslistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_customerslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_customerslistsrch");
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
<form name="fpharmacy_customerslistsrch" id="fpharmacy_customerslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_customerslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_customers">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_customers">
<form name="fpharmacy_customerslist" id="fpharmacy_customerslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<div id="gmp_pharmacy_customers" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_customerslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Customercode->Visible) { // Customercode ?>
        <th data-name="Customercode" class="<?= $Page->Customercode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Customercode" class="pharmacy_customers_Customercode"><?= $Page->renderSort($Page->Customercode) ?></div></th>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <th data-name="Address1" class="<?= $Page->Address1->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address1" class="pharmacy_customers_Address1"><?= $Page->renderSort($Page->Address1) ?></div></th>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <th data-name="Address2" class="<?= $Page->Address2->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address2" class="pharmacy_customers_Address2"><?= $Page->renderSort($Page->Address2) ?></div></th>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <th data-name="Address3" class="<?= $Page->Address3->headerCellClass() ?>"><div id="elh_pharmacy_customers_Address3" class="pharmacy_customers_Address3"><?= $Page->renderSort($Page->Address3) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_pharmacy_customers_State" class="pharmacy_customers_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_customers_Pincode" class="pharmacy_customers_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_pharmacy_customers_Phone" class="pharmacy_customers_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th data-name="Fax" class="<?= $Page->Fax->headerCellClass() ?>"><div id="elh_pharmacy_customers_Fax" class="pharmacy_customers_Fax"><?= $Page->renderSort($Page->Fax) ?></div></th>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <th data-name="_Email" class="<?= $Page->_Email->headerCellClass() ?>"><div id="elh_pharmacy_customers__Email" class="pharmacy_customers__Email"><?= $Page->renderSort($Page->_Email) ?></div></th>
<?php } ?>
<?php if ($Page->Ratetype->Visible) { // Ratetype ?>
        <th data-name="Ratetype" class="<?= $Page->Ratetype->headerCellClass() ?>"><div id="elh_pharmacy_customers_Ratetype" class="pharmacy_customers_Ratetype"><?= $Page->renderSort($Page->Ratetype) ?></div></th>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <th data-name="Creationdate" class="<?= $Page->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_customers_Creationdate" class="pharmacy_customers_Creationdate"><?= $Page->renderSort($Page->Creationdate) ?></div></th>
<?php } ?>
<?php if ($Page->ContactPerson->Visible) { // ContactPerson ?>
        <th data-name="ContactPerson" class="<?= $Page->ContactPerson->headerCellClass() ?>"><div id="elh_pharmacy_customers_ContactPerson" class="pharmacy_customers_ContactPerson"><?= $Page->renderSort($Page->ContactPerson) ?></div></th>
<?php } ?>
<?php if ($Page->CPPhone->Visible) { // CPPhone ?>
        <th data-name="CPPhone" class="<?= $Page->CPPhone->headerCellClass() ?>"><div id="elh_pharmacy_customers_CPPhone" class="pharmacy_customers_CPPhone"><?= $Page->renderSort($Page->CPPhone) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_customers_id" class="pharmacy_customers_id"><?= $Page->renderSort($Page->id) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_customers", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Customercode->Visible) { // Customercode ?>
        <td data-name="Customercode" <?= $Page->Customercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Customercode">
<span<?= $Page->Customercode->viewAttributes() ?>>
<?= $Page->Customercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address1->Visible) { // Address1 ?>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address2->Visible) { // Address2 ?>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address3->Visible) { // Address3 ?>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fax->Visible) { // Fax ?>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Email->Visible) { // Email ?>
        <td data-name="_Email" <?= $Page->_Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Ratetype->Visible) { // Ratetype ?>
        <td data-name="Ratetype" <?= $Page->Ratetype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Ratetype">
<span<?= $Page->Ratetype->viewAttributes() ?>>
<?= $Page->Ratetype->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <td data-name="Creationdate" <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ContactPerson->Visible) { // ContactPerson ?>
        <td data-name="ContactPerson" <?= $Page->ContactPerson->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_ContactPerson">
<span<?= $Page->ContactPerson->viewAttributes() ?>>
<?= $Page->ContactPerson->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CPPhone->Visible) { // CPPhone ?>
        <td data-name="CPPhone" <?= $Page->CPPhone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_CPPhone">
<span<?= $Page->CPPhone->viewAttributes() ?>>
<?= $Page->CPPhone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_customers_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
    ew.addEventHandlers("pharmacy_customers");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
