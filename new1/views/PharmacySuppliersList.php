<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacySuppliersList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_supplierslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_supplierslist = currentForm = new ew.Form("fpharmacy_supplierslist", "list");
    fpharmacy_supplierslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_supplierslist");
});
var fpharmacy_supplierslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_supplierslistsrch = currentSearchForm = new ew.Form("fpharmacy_supplierslistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_supplierslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_supplierslistsrch");
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
<form name="fpharmacy_supplierslistsrch" id="fpharmacy_supplierslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_supplierslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_suppliers">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_suppliers">
<form name="fpharmacy_supplierslist" id="fpharmacy_supplierslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<div id="gmp_pharmacy_suppliers" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_supplierslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
        <th data-name="Suppliercode" class="<?= $Page->Suppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliercode" class="pharmacy_suppliers_Suppliercode"><?= $Page->renderSort($Page->Suppliercode) ?></div></th>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
        <th data-name="Suppliername" class="<?= $Page->Suppliername->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Suppliername" class="pharmacy_suppliers_Suppliername"><?= $Page->renderSort($Page->Suppliername) ?></div></th>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
        <th data-name="Abbreviation" class="<?= $Page->Abbreviation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Abbreviation" class="pharmacy_suppliers_Abbreviation"><?= $Page->renderSort($Page->Abbreviation) ?></div></th>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <th data-name="Creationdate" class="<?= $Page->Creationdate->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creationdate" class="pharmacy_suppliers_Creationdate"><?= $Page->renderSort($Page->Creationdate) ?></div></th>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
        <th data-name="Address1" class="<?= $Page->Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address1" class="pharmacy_suppliers_Address1"><?= $Page->renderSort($Page->Address1) ?></div></th>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
        <th data-name="Address2" class="<?= $Page->Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address2" class="pharmacy_suppliers_Address2"><?= $Page->renderSort($Page->Address2) ?></div></th>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
        <th data-name="Address3" class="<?= $Page->Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Address3" class="pharmacy_suppliers_Address3"><?= $Page->renderSort($Page->Address3) ?></div></th>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
        <th data-name="Citycode" class="<?= $Page->Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Citycode" class="pharmacy_suppliers_Citycode"><?= $Page->renderSort($Page->Citycode) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_State" class="pharmacy_suppliers_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Page->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Pincode" class="pharmacy_suppliers_Pincode"><?= $Page->renderSort($Page->Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
        <th data-name="Tngstnumber" class="<?= $Page->Tngstnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tngstnumber" class="pharmacy_suppliers_Tngstnumber"><?= $Page->renderSort($Page->Tngstnumber) ?></div></th>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Page->Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Phone" class="pharmacy_suppliers_Phone"><?= $Page->renderSort($Page->Phone) ?></div></th>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
        <th data-name="Fax" class="<?= $Page->Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Fax" class="pharmacy_suppliers_Fax"><?= $Page->renderSort($Page->Fax) ?></div></th>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
        <th data-name="_Email" class="<?= $Page->_Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers__Email" class="pharmacy_suppliers__Email"><?= $Page->renderSort($Page->_Email) ?></div></th>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
        <th data-name="Paymentmode" class="<?= $Page->Paymentmode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Paymentmode" class="pharmacy_suppliers_Paymentmode"><?= $Page->renderSort($Page->Paymentmode) ?></div></th>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
        <th data-name="Contactperson1" class="<?= $Page->Contactperson1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson1" class="pharmacy_suppliers_Contactperson1"><?= $Page->renderSort($Page->Contactperson1) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
        <th data-name="CP1Address1" class="<?= $Page->CP1Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address1" class="pharmacy_suppliers_CP1Address1"><?= $Page->renderSort($Page->CP1Address1) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
        <th data-name="CP1Address2" class="<?= $Page->CP1Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address2" class="pharmacy_suppliers_CP1Address2"><?= $Page->renderSort($Page->CP1Address2) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
        <th data-name="CP1Address3" class="<?= $Page->CP1Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Address3" class="pharmacy_suppliers_CP1Address3"><?= $Page->renderSort($Page->CP1Address3) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
        <th data-name="CP1Citycode" class="<?= $Page->CP1Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Citycode" class="pharmacy_suppliers_CP1Citycode"><?= $Page->renderSort($Page->CP1Citycode) ?></div></th>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
        <th data-name="CP1State" class="<?= $Page->CP1State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1State" class="pharmacy_suppliers_CP1State"><?= $Page->renderSort($Page->CP1State) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
        <th data-name="CP1Pincode" class="<?= $Page->CP1Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Pincode" class="pharmacy_suppliers_CP1Pincode"><?= $Page->renderSort($Page->CP1Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
        <th data-name="CP1Designation" class="<?= $Page->CP1Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Designation" class="pharmacy_suppliers_CP1Designation"><?= $Page->renderSort($Page->CP1Designation) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
        <th data-name="CP1Phone" class="<?= $Page->CP1Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Phone" class="pharmacy_suppliers_CP1Phone"><?= $Page->renderSort($Page->CP1Phone) ?></div></th>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
        <th data-name="CP1MobileNo" class="<?= $Page->CP1MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1MobileNo" class="pharmacy_suppliers_CP1MobileNo"><?= $Page->renderSort($Page->CP1MobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
        <th data-name="CP1Fax" class="<?= $Page->CP1Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Fax" class="pharmacy_suppliers_CP1Fax"><?= $Page->renderSort($Page->CP1Fax) ?></div></th>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
        <th data-name="CP1Email" class="<?= $Page->CP1Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP1Email" class="pharmacy_suppliers_CP1Email"><?= $Page->renderSort($Page->CP1Email) ?></div></th>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
        <th data-name="Contactperson2" class="<?= $Page->Contactperson2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Contactperson2" class="pharmacy_suppliers_Contactperson2"><?= $Page->renderSort($Page->Contactperson2) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
        <th data-name="CP2Address1" class="<?= $Page->CP2Address1->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address1" class="pharmacy_suppliers_CP2Address1"><?= $Page->renderSort($Page->CP2Address1) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
        <th data-name="CP2Address2" class="<?= $Page->CP2Address2->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address2" class="pharmacy_suppliers_CP2Address2"><?= $Page->renderSort($Page->CP2Address2) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
        <th data-name="CP2Address3" class="<?= $Page->CP2Address3->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Address3" class="pharmacy_suppliers_CP2Address3"><?= $Page->renderSort($Page->CP2Address3) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
        <th data-name="CP2Citycode" class="<?= $Page->CP2Citycode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Citycode" class="pharmacy_suppliers_CP2Citycode"><?= $Page->renderSort($Page->CP2Citycode) ?></div></th>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
        <th data-name="CP2State" class="<?= $Page->CP2State->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2State" class="pharmacy_suppliers_CP2State"><?= $Page->renderSort($Page->CP2State) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
        <th data-name="CP2Pincode" class="<?= $Page->CP2Pincode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Pincode" class="pharmacy_suppliers_CP2Pincode"><?= $Page->renderSort($Page->CP2Pincode) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
        <th data-name="CP2Designation" class="<?= $Page->CP2Designation->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Designation" class="pharmacy_suppliers_CP2Designation"><?= $Page->renderSort($Page->CP2Designation) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
        <th data-name="CP2Phone" class="<?= $Page->CP2Phone->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Phone" class="pharmacy_suppliers_CP2Phone"><?= $Page->renderSort($Page->CP2Phone) ?></div></th>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
        <th data-name="CP2MobileNo" class="<?= $Page->CP2MobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2MobileNo" class="pharmacy_suppliers_CP2MobileNo"><?= $Page->renderSort($Page->CP2MobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
        <th data-name="CP2Fax" class="<?= $Page->CP2Fax->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Fax" class="pharmacy_suppliers_CP2Fax"><?= $Page->renderSort($Page->CP2Fax) ?></div></th>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
        <th data-name="CP2Email" class="<?= $Page->CP2Email->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_CP2Email" class="pharmacy_suppliers_CP2Email"><?= $Page->renderSort($Page->CP2Email) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Type" class="pharmacy_suppliers_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
        <th data-name="Creditterms" class="<?= $Page->Creditterms->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Creditterms" class="pharmacy_suppliers_Creditterms"><?= $Page->renderSort($Page->Creditterms) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Remarks" class="pharmacy_suppliers_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
        <th data-name="Tinnumber" class="<?= $Page->Tinnumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Tinnumber" class="pharmacy_suppliers_Tinnumber"><?= $Page->renderSort($Page->Tinnumber) ?></div></th>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
        <th data-name="Universalsuppliercode" class="<?= $Page->Universalsuppliercode->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Universalsuppliercode" class="pharmacy_suppliers_Universalsuppliercode"><?= $Page->renderSort($Page->Universalsuppliercode) ?></div></th>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
        <th data-name="Mobilenumber" class="<?= $Page->Mobilenumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_Mobilenumber" class="pharmacy_suppliers_Mobilenumber"><?= $Page->renderSort($Page->Mobilenumber) ?></div></th>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
        <th data-name="PANNumber" class="<?= $Page->PANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_PANNumber" class="pharmacy_suppliers_PANNumber"><?= $Page->renderSort($Page->PANNumber) ?></div></th>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
        <th data-name="SalesRepMobileNo" class="<?= $Page->SalesRepMobileNo->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_SalesRepMobileNo" class="pharmacy_suppliers_SalesRepMobileNo"><?= $Page->renderSort($Page->SalesRepMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
        <th data-name="GSTNumber" class="<?= $Page->GSTNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_GSTNumber" class="pharmacy_suppliers_GSTNumber"><?= $Page->renderSort($Page->GSTNumber) ?></div></th>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
        <th data-name="TANNumber" class="<?= $Page->TANNumber->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_TANNumber" class="pharmacy_suppliers_TANNumber"><?= $Page->renderSort($Page->TANNumber) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_suppliers_id" class="pharmacy_suppliers_id"><?= $Page->renderSort($Page->id) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_suppliers", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
        <td data-name="Suppliercode" <?= $Page->Suppliercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Suppliercode">
<span<?= $Page->Suppliercode->viewAttributes() ?>>
<?= $Page->Suppliercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Suppliername->Visible) { // Suppliername ?>
        <td data-name="Suppliername" <?= $Page->Suppliername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Suppliername">
<span<?= $Page->Suppliername->viewAttributes() ?>>
<?= $Page->Suppliername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
        <td data-name="Abbreviation" <?= $Page->Abbreviation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Abbreviation">
<span<?= $Page->Abbreviation->viewAttributes() ?>>
<?= $Page->Abbreviation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Creationdate->Visible) { // Creationdate ?>
        <td data-name="Creationdate" <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Creationdate">
<span<?= $Page->Creationdate->viewAttributes() ?>>
<?= $Page->Creationdate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address1->Visible) { // Address1 ?>
        <td data-name="Address1" <?= $Page->Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Address1">
<span<?= $Page->Address1->viewAttributes() ?>>
<?= $Page->Address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address2->Visible) { // Address2 ?>
        <td data-name="Address2" <?= $Page->Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Address2">
<span<?= $Page->Address2->viewAttributes() ?>>
<?= $Page->Address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address3->Visible) { // Address3 ?>
        <td data-name="Address3" <?= $Page->Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Address3">
<span<?= $Page->Address3->viewAttributes() ?>>
<?= $Page->Address3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Citycode->Visible) { // Citycode ?>
        <td data-name="Citycode" <?= $Page->Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Citycode">
<span<?= $Page->Citycode->viewAttributes() ?>>
<?= $Page->Citycode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Page->Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Pincode">
<span<?= $Page->Pincode->viewAttributes() ?>>
<?= $Page->Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
        <td data-name="Tngstnumber" <?= $Page->Tngstnumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Tngstnumber">
<span<?= $Page->Tngstnumber->viewAttributes() ?>>
<?= $Page->Tngstnumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Page->Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Phone">
<span<?= $Page->Phone->viewAttributes() ?>>
<?= $Page->Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fax->Visible) { // Fax ?>
        <td data-name="Fax" <?= $Page->Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Fax">
<span<?= $Page->Fax->viewAttributes() ?>>
<?= $Page->Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Email->Visible) { // Email ?>
        <td data-name="_Email" <?= $Page->_Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers__Email">
<span<?= $Page->_Email->viewAttributes() ?>>
<?= $Page->_Email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
        <td data-name="Paymentmode" <?= $Page->Paymentmode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Paymentmode">
<span<?= $Page->Paymentmode->viewAttributes() ?>>
<?= $Page->Paymentmode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
        <td data-name="Contactperson1" <?= $Page->Contactperson1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Contactperson1">
<span<?= $Page->Contactperson1->viewAttributes() ?>>
<?= $Page->Contactperson1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
        <td data-name="CP1Address1" <?= $Page->CP1Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Address1">
<span<?= $Page->CP1Address1->viewAttributes() ?>>
<?= $Page->CP1Address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
        <td data-name="CP1Address2" <?= $Page->CP1Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Address2">
<span<?= $Page->CP1Address2->viewAttributes() ?>>
<?= $Page->CP1Address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
        <td data-name="CP1Address3" <?= $Page->CP1Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Address3">
<span<?= $Page->CP1Address3->viewAttributes() ?>>
<?= $Page->CP1Address3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
        <td data-name="CP1Citycode" <?= $Page->CP1Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Citycode">
<span<?= $Page->CP1Citycode->viewAttributes() ?>>
<?= $Page->CP1Citycode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1State->Visible) { // CP1State ?>
        <td data-name="CP1State" <?= $Page->CP1State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1State">
<span<?= $Page->CP1State->viewAttributes() ?>>
<?= $Page->CP1State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
        <td data-name="CP1Pincode" <?= $Page->CP1Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Pincode">
<span<?= $Page->CP1Pincode->viewAttributes() ?>>
<?= $Page->CP1Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
        <td data-name="CP1Designation" <?= $Page->CP1Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Designation">
<span<?= $Page->CP1Designation->viewAttributes() ?>>
<?= $Page->CP1Designation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
        <td data-name="CP1Phone" <?= $Page->CP1Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Phone">
<span<?= $Page->CP1Phone->viewAttributes() ?>>
<?= $Page->CP1Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
        <td data-name="CP1MobileNo" <?= $Page->CP1MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1MobileNo">
<span<?= $Page->CP1MobileNo->viewAttributes() ?>>
<?= $Page->CP1MobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
        <td data-name="CP1Fax" <?= $Page->CP1Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Fax">
<span<?= $Page->CP1Fax->viewAttributes() ?>>
<?= $Page->CP1Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP1Email->Visible) { // CP1Email ?>
        <td data-name="CP1Email" <?= $Page->CP1Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP1Email">
<span<?= $Page->CP1Email->viewAttributes() ?>>
<?= $Page->CP1Email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
        <td data-name="Contactperson2" <?= $Page->Contactperson2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Contactperson2">
<span<?= $Page->Contactperson2->viewAttributes() ?>>
<?= $Page->Contactperson2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
        <td data-name="CP2Address1" <?= $Page->CP2Address1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Address1">
<span<?= $Page->CP2Address1->viewAttributes() ?>>
<?= $Page->CP2Address1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
        <td data-name="CP2Address2" <?= $Page->CP2Address2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Address2">
<span<?= $Page->CP2Address2->viewAttributes() ?>>
<?= $Page->CP2Address2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
        <td data-name="CP2Address3" <?= $Page->CP2Address3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Address3">
<span<?= $Page->CP2Address3->viewAttributes() ?>>
<?= $Page->CP2Address3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
        <td data-name="CP2Citycode" <?= $Page->CP2Citycode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Citycode">
<span<?= $Page->CP2Citycode->viewAttributes() ?>>
<?= $Page->CP2Citycode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2State->Visible) { // CP2State ?>
        <td data-name="CP2State" <?= $Page->CP2State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2State">
<span<?= $Page->CP2State->viewAttributes() ?>>
<?= $Page->CP2State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
        <td data-name="CP2Pincode" <?= $Page->CP2Pincode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Pincode">
<span<?= $Page->CP2Pincode->viewAttributes() ?>>
<?= $Page->CP2Pincode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
        <td data-name="CP2Designation" <?= $Page->CP2Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Designation">
<span<?= $Page->CP2Designation->viewAttributes() ?>>
<?= $Page->CP2Designation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
        <td data-name="CP2Phone" <?= $Page->CP2Phone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Phone">
<span<?= $Page->CP2Phone->viewAttributes() ?>>
<?= $Page->CP2Phone->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
        <td data-name="CP2MobileNo" <?= $Page->CP2MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2MobileNo">
<span<?= $Page->CP2MobileNo->viewAttributes() ?>>
<?= $Page->CP2MobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
        <td data-name="CP2Fax" <?= $Page->CP2Fax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Fax">
<span<?= $Page->CP2Fax->viewAttributes() ?>>
<?= $Page->CP2Fax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CP2Email->Visible) { // CP2Email ?>
        <td data-name="CP2Email" <?= $Page->CP2Email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_CP2Email">
<span<?= $Page->CP2Email->viewAttributes() ?>>
<?= $Page->CP2Email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Creditterms->Visible) { // Creditterms ?>
        <td data-name="Creditterms" <?= $Page->Creditterms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Creditterms">
<span<?= $Page->Creditterms->viewAttributes() ?>>
<?= $Page->Creditterms->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
        <td data-name="Tinnumber" <?= $Page->Tinnumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Tinnumber">
<span<?= $Page->Tinnumber->viewAttributes() ?>>
<?= $Page->Tinnumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
        <td data-name="Universalsuppliercode" <?= $Page->Universalsuppliercode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Universalsuppliercode">
<span<?= $Page->Universalsuppliercode->viewAttributes() ?>>
<?= $Page->Universalsuppliercode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
        <td data-name="Mobilenumber" <?= $Page->Mobilenumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_Mobilenumber">
<span<?= $Page->Mobilenumber->viewAttributes() ?>>
<?= $Page->Mobilenumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PANNumber->Visible) { // PANNumber ?>
        <td data-name="PANNumber" <?= $Page->PANNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_PANNumber">
<span<?= $Page->PANNumber->viewAttributes() ?>>
<?= $Page->PANNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
        <td data-name="SalesRepMobileNo" <?= $Page->SalesRepMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_SalesRepMobileNo">
<span<?= $Page->SalesRepMobileNo->viewAttributes() ?>>
<?= $Page->SalesRepMobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
        <td data-name="GSTNumber" <?= $Page->GSTNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_GSTNumber">
<span<?= $Page->GSTNumber->viewAttributes() ?>>
<?= $Page->GSTNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TANNumber->Visible) { // TANNumber ?>
        <td data-name="TANNumber" <?= $Page->TANNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_TANNumber">
<span<?= $Page->TANNumber->viewAttributes() ?>>
<?= $Page->TANNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_suppliers_id">
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
    ew.addEventHandlers("pharmacy_suppliers");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
