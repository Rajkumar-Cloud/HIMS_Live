<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPharledReturnList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_pharled_returnlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_pharled_returnlist = currentForm = new ew.Form("fview_pharmacy_pharled_returnlist", "list");
    fview_pharmacy_pharled_returnlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_pharled_return")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_pharled_return)
        ew.vars.tables.view_pharmacy_pharled_return = currentTable;
    fview_pharmacy_pharled_returnlist.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["SiNo", [fields.SiNo.visible && fields.SiNo.required ? ew.Validators.required(fields.SiNo.caption) : null, ew.Validators.integer], fields.SiNo.isInvalid],
        ["Product", [fields.Product.visible && fields.Product.required ? ew.Validators.required(fields.Product.caption) : null], fields.Product.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null, ew.Validators.integer], fields.SLNO.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["DAMT", [fields.DAMT.visible && fields.DAMT.required ? ew.Validators.required(fields.DAMT.caption) : null, ew.Validators.float], fields.DAMT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["Mfg", [fields.Mfg.visible && fields.Mfg.required ? ew.Validators.required(fields.Mfg.caption) : null], fields.Mfg.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["_USERID", [fields._USERID.visible && fields._USERID.required ? ew.Validators.required(fields._USERID.caption) : null], fields._USERID.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["HosoID", [fields.HosoID.visible && fields.HosoID.required ? ew.Validators.required(fields.HosoID.caption) : null], fields.HosoID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_pharled_returnlist,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fview_pharmacy_pharled_returnlist.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    fview_pharmacy_pharled_returnlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Product", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DAMT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BATCHNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EXPDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mfg", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UR", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_pharled_returnlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_pharled_returnlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_pharled_returnlist.lists.SLNO = <?= $Page->SLNO->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_pharled_returnlist");
});
var fview_pharmacy_pharled_returnlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_pharled_returnlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_pharled_returnlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_pharled_returnlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_pharled_returnlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_billing_return") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyBillingReturnMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_pharmacy_pharled_returnlistsrch" id="fview_pharmacy_pharled_returnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_pharled_returnlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
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
<form name="fview_pharmacy_pharled_returnlist" id="fview_pharmacy_pharled_returnlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_billing_return" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_return">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->sretid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacy_pharled_return" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_pharled_returnlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Page->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?= $Page->renderSort($Page->SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th data-name="SLNO" class="<?= $Page->SLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><?= $Page->renderSort($Page->SLNO) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Page->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?= $Page->renderSort($Page->DAMT) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Page->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?= $Page->renderSort($Page->Mfg) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th data-name="_USERID" class="<?= $Page->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?= $Page->renderSort($Page->_USERID) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Page->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?= $Page->renderSort($Page->BRNAME) ?></div></th>
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

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
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
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_pharled_return", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Page->SiNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SiNo" id="o<?= $Page->RowIndex ?>_SiNo" value="<?= HtmlEncode($Page->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SiNo" class="form-group">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="o<?= $Page->RowIndex ?>_Product" id="o<?= $Page->RowIndex ?>_Product" value="<?= HtmlEncode($Page->Product->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Product" class="form-group">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO" <?= $Page->SLNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SLNO" class="form-group">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
    fview_pharmacy_pharled_returnlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_SLNO" id="o<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SLNO" class="form-group">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
    fview_pharmacy_pharled_returnlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRQ" id="o<?= $Page->RowIndex ?>_MRQ" value="<?= HtmlEncode($Page->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRQ" class="form-group">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DAMT" id="o<?= $Page->RowIndex ?>_DAMT" value="<?= HtmlEncode($Page->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DAMT" class="form-group">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Page->Mfg->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mfg" id="o<?= $Page->RowIndex ?>_Mfg" value="<?= HtmlEncode($Page->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Mfg" class="form-group">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID" <?= $Page->_USERID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="o<?= $Page->RowIndex ?>__USERID" id="o<?= $Page->RowIndex ?>__USERID" value="<?= HtmlEncode($Page->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HosoID" id="o<?= $Page->RowIndex ?>_HosoID" value="<?= HtmlEncode($Page->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist","load"], function () {
    fview_pharmacy_pharled_returnlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_pharmacy_pharled_return", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_pharled_return_PRC" class="form-group view_pharmacy_pharled_return_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo">
<span id="el$rowindex$_view_pharmacy_pharled_return_SiNo" class="form-group view_pharmacy_pharled_return_SiNo">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SiNo" id="o<?= $Page->RowIndex ?>_SiNo" value="<?= HtmlEncode($Page->SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product">
<span id="el$rowindex$_view_pharmacy_pharled_return_Product" class="form-group view_pharmacy_pharled_return_Product">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Product" data-hidden="1" name="o<?= $Page->RowIndex ?>_Product" id="o<?= $Page->RowIndex ?>_Product" value="<?= HtmlEncode($Page->Product->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO">
<span id="el$rowindex$_view_pharmacy_pharled_return_SLNO" class="form-group view_pharmacy_pharled_return_SLNO">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist"], function() {
    fview_pharmacy_pharled_returnlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.view_pharmacy_pharled_return.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_SLNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_SLNO" id="o<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT">
<span id="el$rowindex$_view_pharmacy_pharled_return_RT" class="form-group view_pharmacy_pharled_return_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_MRQ" class="form-group view_pharmacy_pharled_return_MRQ">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_MRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRQ" id="o<?= $Page->RowIndex ?>_MRQ" value="<?= HtmlEncode($Page->MRQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<span id="el$rowindex$_view_pharmacy_pharled_return_IQ" class="form-group view_pharmacy_pharled_return_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT">
<span id="el$rowindex$_view_pharmacy_pharled_return_DAMT" class="form-group view_pharmacy_pharled_return_DAMT">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_DAMT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DAMT" id="o<?= $Page->RowIndex ?>_DAMT" value="<?= HtmlEncode($Page->DAMT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<span id="el$rowindex$_view_pharmacy_pharled_return_BATCHNO" class="form-group view_pharmacy_pharled_return_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<span id="el$rowindex$_view_pharmacy_pharled_return_EXPDT" class="form-group view_pharmacy_pharled_return_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_pharled_returnlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg">
<span id="el$rowindex$_view_pharmacy_pharled_return_Mfg" class="form-group view_pharmacy_pharled_return_Mfg">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_Mfg" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mfg" id="o<?= $Page->RowIndex ?>_Mfg" value="<?= HtmlEncode($Page->Mfg->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR">
<span id="el$rowindex$_view_pharmacy_pharled_return_UR" class="form-group view_pharmacy_pharled_return_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="view_pharmacy_pharled_return" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x__USERID" data-hidden="1" name="o<?= $Page->RowIndex ?>__USERID" id="o<?= $Page->RowIndex ?>__USERID" value="<?= HtmlEncode($Page->_USERID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_view_pharmacy_pharled_return_id" class="form-group view_pharmacy_pharled_return_id"></span>
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_HosoID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HosoID" id="o<?= $Page->RowIndex ?>_HosoID" value="<?= HtmlEncode($Page->HosoID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME">
<input type="hidden" data-table="view_pharmacy_pharled_return" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_pharled_returnlist","load"], function() {
    fview_pharmacy_pharled_returnlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
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
    ew.addEventHandlers("view_pharmacy_pharled_return");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");

    //$("[data-name='SiNo']").hide();
    //$("[data-name='Product']").hide();
    //$("[data-name='Mfg']").hide();
    		  $("[data-name='BRCODE']").hide();
    		  $("[data-name='TYPE']").hide();
    		  $("[data-name='DN']").hide();
    		  $("[data-name='RDN']").hide();
    		  $("[data-name='DT']").hide();
    		  $("[data-name='UR']").hide();
    		  $("[data-name='PRC']").hide();
    		  $("[data-name='OQ']").hide();
    		  $("[data-name='RQ']").hide();
    		//  $("[data-name='MRQ']").hide();
    		  $("[data-name='IQ']").hide();

    	//	  $("[data-name='BATCHNO']").hide();
    	//	  $("[data-name='EXPDT']").hide();
    		  $("[data-name='BILLNO']").hide();
    		  $("[data-name='BILLDT']").hide();
    	//	  $("[data-name='RT']").hide();
    		  $("[data-name='VALUE']").hide();
    		  $("[data-name='DISC']").hide();
    		  $("[data-name='TAXP']").hide();
    		  $("[data-name='TAX']").hide();
    		  $("[data-name='TAXR']").hide();

    	//	  $("[data-name='DAMT']").hide();
    		  $("[data-name='EMPNO']").hide();
    		  $("[data-name='PC']").hide();
    		  $("[data-name='DRNAME']").hide();
    		  $("[data-name='BTIME']").hide();
    		  $("[data-name='ONO']").hide();
    		  $("[data-name='ODT']").hide();
    		  $("[data-name='PURRT']").hide();
    		  $("[data-name='GRP']").hide();
    		  $("[data-name='IBATCH']").hide();
    		  $("[data-name='IPNO']").hide();
    		  $("[data-name='OPNO']").hide();
    		  $("[data-name='RECID']").hide();
    		  $("[data-name='FQTY']").hide();
    		  $("[data-name='UR']").hide();		  
    		  $("[data-name='DCID']").hide();
    		  $("[data-name='USERID']").hide();
    		  $("[data-name='MODDT']").hide();
    		  $("[data-name='FYM']").hide();
    		  $("[data-name='PRCBATCH']").hide();
    		  $("[data-name='SLNO']").hide();
    		  $("[data-name='MRP']").hide();
    		  $("[data-name='BILLYM']").hide();
    		  $("[data-name='BILLGRP']").hide();
    		  $("[data-name='STAFF']").hide();
    		  $("[data-name='TEMPIPNO']").hide();
    		  $("[data-name='PRNTED']").hide();
    		  $("[data-name='PATNAME']").hide();
    		  $("[data-name='PJVNO']").hide();
    		  $("[data-name='PJVSLNO']").hide();
    		  $("[data-name='OTHDISC']").hide();
    		  $("[data-name='PJVYM']").hide();
    		  $("[data-name='PURDISCPER']").hide();
    		  $("[data-name='CASHIER']").hide();
    		  $("[data-name='CASHTIME']").hide();
    		  $("[data-name='CASHRECD']").hide();
    		  $("[data-name='CASHREFNO']").hide();
    		  $("[data-name='CASHIERSHIFT']").hide();
    		  $("[data-name='PRCODE']").hide();
    		  $("[data-name='RELEASEBY']").hide();
    		  $("[data-name='CRAUTHOR']").hide();
    		  $("[data-name='PAYMENT']").hide();
    		  $("[data-name='DRID']").hide();
    		  $("[data-name='WARD']").hide();
    		  $("[data-name='STAXTYPE']").hide();
    		  $("[data-name='PURDISCVAL']").hide();
    		  $("[data-name='RNDOFF']").hide();
    		  $("[data-name='DISCONMRP']").hide();
    		  $("[data-name='DELVDT']").hide();
    		  $("[data-name='DELVTIME']").hide();
    		  $("[data-name='DELVBY']").hide();
    		  $("[data-name='HOSPNO']").hide();
    		  $("[data-name='pbv']").hide();
    		  $("[data-name='pbt']").hide();
    		  $("[data-name='Reception']").hide();
    		  $("[data-name='PatID']").hide();
    		  $("[data-name='mrnno']").hide();

    function addtotalSum()
    {	
    	var totSum = 0;
    	for (var i = 1; i < 40; i++) {
    			try {
    				var amount = document.getElementById("x" + i + "_DAMT");
    				if (amount.value != '') {
    					totSum = parseInt(totSum) + parseInt(amount.value);
    				 var SiNo = document.getElementById("x" + i + "_SiNo");
    				 SiNo.value = i;
    				}
    				var RT = document.getElementById("x" + i + "_RT");
    				var Product = document.getElementById("sv_x" + i + "_Product").value;
    				if(Product!= '')
    				{
    				 var SiNo = document.getElementById("x" + i + "_SiNo");
    				 SiNo.value = i;
    				 }
    			}
    			catch(err) {
    			}
    	}
    		var BillAmount = document.getElementById("x_Amount");
    	//	BillAmount.value = totSum;
    }
    </script>
    <style>
    .input-group>.form-control {
    	width: 1%;
    	flex-grow: 1;
    }
    </style>
    <script>
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_pharmacy_pharled_return",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
