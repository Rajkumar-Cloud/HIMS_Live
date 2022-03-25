<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPharledList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_pharledlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_pharledlist = currentForm = new ew.Form("fpharmacy_pharledlist", "list");
    fpharmacy_pharledlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_pharled")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_pharled)
        ew.vars.tables.pharmacy_pharled = currentTable;
    fpharmacy_pharledlist.addFields([
        ["SiNo", [fields.SiNo.visible && fields.SiNo.required ? ew.Validators.required(fields.SiNo.caption) : null, ew.Validators.integer], fields.SiNo.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null, ew.Validators.integer], fields.SLNO.isInvalid],
        ["Product", [fields.Product.visible && fields.Product.required ? ew.Validators.required(fields.Product.caption) : null], fields.Product.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["DAMT", [fields.DAMT.visible && fields.DAMT.required ? ew.Validators.required(fields.DAMT.caption) : null, ew.Validators.float], fields.DAMT.isInvalid],
        ["Mfg", [fields.Mfg.visible && fields.Mfg.required ? ew.Validators.required(fields.Mfg.caption) : null], fields.Mfg.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["_USERID", [fields._USERID.visible && fields._USERID.required ? ew.Validators.required(fields._USERID.caption) : null], fields._USERID.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["HosoID", [fields.HosoID.visible && fields.HosoID.required ? ew.Validators.required(fields.HosoID.caption) : null], fields.HosoID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["baid", [fields.baid.visible && fields.baid.required ? ew.Validators.required(fields.baid.caption) : null, ew.Validators.integer], fields.baid.isInvalid],
        ["isdate", [fields.isdate.visible && fields.isdate.required ? ew.Validators.required(fields.isdate.caption) : null], fields.isdate.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [fields.PurRate.visible && fields.PurRate.required ? ew.Validators.required(fields.PurRate.caption) : null, ew.Validators.float], fields.PurRate.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["HSNCODE", [fields.HSNCODE.visible && fields.HSNCODE.required ? ew.Validators.required(fields.HSNCODE.caption) : null], fields.HSNCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_pharledlist,
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
    fpharmacy_pharledlist.validate = function () {
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
    fpharmacy_pharledlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "SiNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Product", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DAMT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mfg", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EXPDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BATCHNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UR", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "baid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurRate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HSNCODE", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_pharledlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_pharledlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_pharledlist.lists.SLNO = <?= $Page->SLNO->toClientList($Page) ?>;
    loadjs.done("fpharmacy_pharledlist");
});
var fpharmacy_pharledlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_pharledlistsrch = currentSearchForm = new ew.Form("fpharmacy_pharledlistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_pharledlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_pharledlistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_billing_voucher") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyBillingVoucherMaster.php";
    }
}
?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_billing_issue") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyBillingIssueMaster.php";
    }
}
?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ip_admission") {
    if ($Page->MasterRecordExists) {
        include_once "views/IpAdmissionMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_pharledlistsrch" id="fpharmacy_pharledlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_pharledlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_pharled">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_pharled">
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
<form name="fpharmacy_pharledlist" id="fpharmacy_pharledlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_billing_voucher" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_voucher">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->pbv->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "pharmacy_billing_issue" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_billing_issue">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->pbt->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatID->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pharmacy_pharled" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_pharledlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Page->SiNo->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SiNo" class="pharmacy_pharled_SiNo"><?= $Page->renderSort($Page->SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th data-name="SLNO" class="<?= $Page->SLNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SLNO" class="pharmacy_pharled_SLNO"><?= $Page->renderSort($Page->SLNO) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Product" class="pharmacy_pharled_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_RT" class="pharmacy_pharled_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_pharmacy_pharled_IQ" class="pharmacy_pharled_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Page->DAMT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_DAMT" class="pharmacy_pharled_DAMT"><?= $Page->renderSort($Page->DAMT) ?></div></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Page->Mfg->headerCellClass() ?>"><div id="elh_pharmacy_pharled_Mfg" class="pharmacy_pharled_Mfg"><?= $Page->renderSort($Page->Mfg) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_pharled_EXPDT" class="pharmacy_pharled_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BATCHNO" class="pharmacy_pharled_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRCODE" class="pharmacy_pharled_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PRC" class="pharmacy_pharled_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_pharmacy_pharled_UR" class="pharmacy_pharled_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th data-name="_USERID" class="<?= $Page->_USERID->headerCellClass() ?>"><div id="elh_pharmacy_pharled__USERID" class="pharmacy_pharled__USERID"><?= $Page->renderSort($Page->_USERID) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_pharled_id" class="pharmacy_pharled_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HosoID" class="pharmacy_pharled_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createdby" class="pharmacy_pharled_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_createddatetime" class="pharmacy_pharled_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifiedby" class="pharmacy_pharled_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_pharled_modifieddatetime" class="pharmacy_pharled_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Page->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_pharled_BRNAME" class="pharmacy_pharled_BRNAME"><?= $Page->renderSort($Page->BRNAME) ?></div></th>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <th data-name="baid" class="<?= $Page->baid->headerCellClass() ?>"><div id="elh_pharmacy_pharled_baid" class="pharmacy_pharled_baid"><?= $Page->renderSort($Page->baid) ?></div></th>
<?php } ?>
<?php if ($Page->isdate->Visible) { // isdate ?>
        <th data-name="isdate" class="<?= $Page->isdate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_isdate" class="pharmacy_pharled_isdate"><?= $Page->renderSort($Page->isdate) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PSGST" class="pharmacy_pharled_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PCGST" class="pharmacy_pharled_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SSGST" class="pharmacy_pharled_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SCGST" class="pharmacy_pharled_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurValue" class="pharmacy_pharled_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PurRate" class="pharmacy_pharled_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_PUnit" class="pharmacy_pharled_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Page->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_pharled_SUnit" class="pharmacy_pharled_SUnit"><?= $Page->renderSort($Page->SUnit) ?></div></th>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <th data-name="HSNCODE" class="<?= $Page->HSNCODE->headerCellClass() ?>"><div id="elh_pharmacy_pharled_HSNCODE" class="pharmacy_pharled_HSNCODE"><?= $Page->renderSort($Page->HSNCODE) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_pharled", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Page->SiNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SiNo" id="o<?= $Page->RowIndex ?>_SiNo" value="<?= HtmlEncode($Page->SiNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SiNo" class="form-group">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO" <?= $Page->SLNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
    fpharmacy_pharledlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_SLNO" id="o<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SLNO" class="form-group">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
    fpharmacy_pharledlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="o<?= $Page->RowIndex ?>_Product" id="o<?= $Page->RowIndex ?>_Product" value="<?= HtmlEncode($Page->Product->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Product" class="form-group">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DAMT" id="o<?= $Page->RowIndex ?>_DAMT" value="<?= HtmlEncode($Page->DAMT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DAMT" class="form-group">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Page->Mfg->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mfg" id="o<?= $Page->RowIndex ?>_Mfg" value="<?= HtmlEncode($Page->Mfg->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Mfg" class="form-group">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID" <?= $Page->_USERID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="o<?= $Page->RowIndex ?>__USERID" id="o<?= $Page->RowIndex ?>__USERID" value="<?= HtmlEncode($Page->_USERID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HosoID" id="o<?= $Page->RowIndex ?>_HosoID" value="<?= HtmlEncode($Page->HosoID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->baid->Visible) { // baid ?>
        <td data-name="baid" <?= $Page->baid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_baid" class="form-group">
<input type="<?= $Page->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Page->RowIndex ?>_baid" id="x<?= $Page->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Page->baid->getPlaceHolder()) ?>" value="<?= $Page->baid->EditValue ?>"<?= $Page->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->baid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="o<?= $Page->RowIndex ?>_baid" id="o<?= $Page->RowIndex ?>_baid" value="<?= HtmlEncode($Page->baid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_baid" class="form-group">
<input type="<?= $Page->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Page->RowIndex ?>_baid" id="x<?= $Page->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Page->baid->getPlaceHolder()) ?>" value="<?= $Page->baid->EditValue ?>"<?= $Page->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->baid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_baid">
<span<?= $Page->baid->viewAttributes() ?>>
<?= $Page->baid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->isdate->Visible) { // isdate ?>
        <td data-name="isdate" <?= $Page->isdate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="o<?= $Page->RowIndex ?>_isdate" id="o<?= $Page->RowIndex ?>_isdate" value="<?= HtmlEncode($Page->isdate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_isdate">
<span<?= $Page->isdate->viewAttributes() ?>>
<?= $Page->isdate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PSGST" class="form-group">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PSGST" id="o<?= $Page->RowIndex ?>_PSGST" value="<?= HtmlEncode($Page->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PSGST" class="form-group">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PCGST" class="form-group">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PCGST" id="o<?= $Page->RowIndex ?>_PCGST" value="<?= HtmlEncode($Page->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PCGST" class="form-group">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurRate" class="form-group">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurRate" id="o<?= $Page->RowIndex ?>_PurRate" value="<?= HtmlEncode($Page->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurRate" class="form-group">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PUnit" class="form-group">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_PUnit" id="o<?= $Page->RowIndex ?>_PUnit" value="<?= HtmlEncode($Page->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PUnit" class="form-group">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SUnit" class="form-group">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_SUnit" id="o<?= $Page->RowIndex ?>_SUnit" value="<?= HtmlEncode($Page->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SUnit" class="form-group">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <td data-name="HSNCODE" <?= $Page->HSNCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HSNCODE" class="form-group">
<input type="<?= $Page->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Page->RowIndex ?>_HSNCODE" id="x<?= $Page->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSNCODE->getPlaceHolder()) ?>" value="<?= $Page->HSNCODE->EditValue ?>"<?= $Page->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSNCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_HSNCODE" id="o<?= $Page->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Page->HSNCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HSNCODE" class="form-group">
<input type="<?= $Page->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Page->RowIndex ?>_HSNCODE" id="x<?= $Page->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSNCODE->getPlaceHolder()) ?>" value="<?= $Page->HSNCODE->EditValue ?>"<?= $Page->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSNCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_pharled_HSNCODE">
<span<?= $Page->HSNCODE->viewAttributes() ?>>
<?= $Page->HSNCODE->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_pharledlist","load"], function () {
    fpharmacy_pharledlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_pharled", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo">
<span id="el$rowindex$_pharmacy_pharled_SiNo" class="form-group pharmacy_pharled_SiNo">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SiNo" name="x<?= $Page->RowIndex ?>_SiNo" id="x<?= $Page->RowIndex ?>_SiNo" size="3" maxlength="3" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SiNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_SiNo" id="o<?= $Page->RowIndex ?>_SiNo" value="<?= HtmlEncode($Page->SiNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO">
<span id="el$rowindex$_pharmacy_pharled_SLNO" class="form-group pharmacy_pharled_SLNO">
<?php
$onchange = $Page->SLNO->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->SLNO->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_SLNO" class="ew-auto-suggest">
    <input type="<?= $Page->SLNO->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_SLNO" id="sv_x<?= $Page->RowIndex ?>_SLNO" value="<?= RemoveHtml($Page->SLNO->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>"<?= $Page->SLNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_pharled" data-field="x_SLNO" data-input="sv_x<?= $Page->RowIndex ?>_SLNO" data-value-separator="<?= $Page->SLNO->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_SLNO" id="x<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_pharledlist"], function() {
    fpharmacy_pharledlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_SLNO","forceSelect":true}, ew.vars.tables.pharmacy_pharled.fields.SLNO.autoSuggestOptions));
});
</script>
<?= $Page->SLNO->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SLNO") ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SLNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_SLNO" id="o<?= $Page->RowIndex ?>_SLNO" value="<?= HtmlEncode($Page->SLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product">
<span id="el$rowindex$_pharmacy_pharled_Product" class="form-group pharmacy_pharled_Product">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Product" name="x<?= $Page->RowIndex ?>_Product" id="x<?= $Page->RowIndex ?>_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Product" data-hidden="1" name="o<?= $Page->RowIndex ?>_Product" id="o<?= $Page->RowIndex ?>_Product" value="<?= HtmlEncode($Page->Product->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT">
<span id="el$rowindex$_pharmacy_pharled_RT" class="form-group pharmacy_pharled_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<span id="el$rowindex$_pharmacy_pharled_IQ" class="form-group pharmacy_pharled_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT">
<span id="el$rowindex$_pharmacy_pharled_DAMT" class="form-group pharmacy_pharled_DAMT">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_DAMT" name="x<?= $Page->RowIndex ?>_DAMT" id="x<?= $Page->RowIndex ?>_DAMT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_DAMT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DAMT" id="o<?= $Page->RowIndex ?>_DAMT" value="<?= HtmlEncode($Page->DAMT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg">
<span id="el$rowindex$_pharmacy_pharled_Mfg" class="form-group pharmacy_pharled_Mfg">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_Mfg" name="x<?= $Page->RowIndex ?>_Mfg" id="x<?= $Page->RowIndex ?>_Mfg" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_Mfg" data-hidden="1" name="o<?= $Page->RowIndex ?>_Mfg" id="o<?= $Page->RowIndex ?>_Mfg" value="<?= HtmlEncode($Page->Mfg->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_pharled_EXPDT" class="form-group pharmacy_pharled_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_pharledlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_pharledlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_pharled_BATCHNO" class="form-group pharmacy_pharled_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_pharmacy_pharled_PRC" class="form-group pharmacy_pharled_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR">
<span id="el$rowindex$_pharmacy_pharled_UR" class="form-group pharmacy_pharled_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x__USERID" data-hidden="1" name="o<?= $Page->RowIndex ?>__USERID" id="o<?= $Page->RowIndex ?>__USERID" value="<?= HtmlEncode($Page->_USERID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_pharmacy_pharled_id" class="form-group pharmacy_pharled_id"></span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HosoID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HosoID" id="o<?= $Page->RowIndex ?>_HosoID" value="<?= HtmlEncode($Page->HosoID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_createdby" id="o<?= $Page->RowIndex ?>_createdby" value="<?= HtmlEncode($Page->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifiedby" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifiedby" id="o<?= $Page->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Page->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_modifieddatetime" id="o<?= $Page->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->baid->Visible) { // baid ?>
        <td data-name="baid">
<span id="el$rowindex$_pharmacy_pharled_baid" class="form-group pharmacy_pharled_baid">
<input type="<?= $Page->baid->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_baid" name="x<?= $Page->RowIndex ?>_baid" id="x<?= $Page->RowIndex ?>_baid" size="30" placeholder="<?= HtmlEncode($Page->baid->getPlaceHolder()) ?>" value="<?= $Page->baid->EditValue ?>"<?= $Page->baid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->baid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_baid" data-hidden="1" name="o<?= $Page->RowIndex ?>_baid" id="o<?= $Page->RowIndex ?>_baid" value="<?= HtmlEncode($Page->baid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->isdate->Visible) { // isdate ?>
        <td data-name="isdate">
<input type="hidden" data-table="pharmacy_pharled" data-field="x_isdate" data-hidden="1" name="o<?= $Page->RowIndex ?>_isdate" id="o<?= $Page->RowIndex ?>_isdate" value="<?= HtmlEncode($Page->isdate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST">
<span id="el$rowindex$_pharmacy_pharled_PSGST" class="form-group pharmacy_pharled_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PSGST" id="o<?= $Page->RowIndex ?>_PSGST" value="<?= HtmlEncode($Page->PSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST">
<span id="el$rowindex$_pharmacy_pharled_PCGST" class="form-group pharmacy_pharled_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PCGST" id="o<?= $Page->RowIndex ?>_PCGST" value="<?= HtmlEncode($Page->PCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST">
<span id="el$rowindex$_pharmacy_pharled_SSGST" class="form-group pharmacy_pharled_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST">
<span id="el$rowindex$_pharmacy_pharled_SCGST" class="form-group pharmacy_pharled_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue">
<span id="el$rowindex$_pharmacy_pharled_PurValue" class="form-group pharmacy_pharled_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate">
<span id="el$rowindex$_pharmacy_pharled_PurRate" class="form-group pharmacy_pharled_PurRate">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PurRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurRate" id="o<?= $Page->RowIndex ?>_PurRate" value="<?= HtmlEncode($Page->PurRate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit">
<span id="el$rowindex$_pharmacy_pharled_PUnit" class="form-group pharmacy_pharled_PUnit">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_PUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_PUnit" id="o<?= $Page->RowIndex ?>_PUnit" value="<?= HtmlEncode($Page->PUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit">
<span id="el$rowindex$_pharmacy_pharled_SUnit" class="form-group pharmacy_pharled_SUnit">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_SUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_SUnit" id="o<?= $Page->RowIndex ?>_SUnit" value="<?= HtmlEncode($Page->SUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <td data-name="HSNCODE">
<span id="el$rowindex$_pharmacy_pharled_HSNCODE" class="form-group pharmacy_pharled_HSNCODE">
<input type="<?= $Page->HSNCODE->getInputTextType() ?>" data-table="pharmacy_pharled" data-field="x_HSNCODE" name="x<?= $Page->RowIndex ?>_HSNCODE" id="x<?= $Page->RowIndex ?>_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSNCODE->getPlaceHolder()) ?>" value="<?= $Page->HSNCODE->EditValue ?>"<?= $Page->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSNCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_pharled" data-field="x_HSNCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_HSNCODE" id="o<?= $Page->RowIndex ?>_HSNCODE" value="<?= HtmlEncode($Page->HSNCODE->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_pharledlist","load"], function() {
    fpharmacy_pharledlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_pharled");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
     $("[data-name='baid']").hide();
      $("[data-name='isdate']").hide();

    //$("[data-name='SiNo']").hide();
    $("[data-name='Product']").hide();
    //$("[data-name='Mfg']").hide();

     //$("[data-name='SLNO']").hide();
    		  $("[data-name='BRCODE']").hide();
    		  $("[data-name='TYPE']").hide();
    		  $("[data-name='DN']").hide();
    		  $("[data-name='RDN']").hide();
    		  $("[data-name='DT']").hide();
    		  $("[data-name='PRC']").hide();
    		  $("[data-name='OQ']").hide();
    		  $("[data-name='RQ']").hide();
    		  $("[data-name='MRQ']").hide();
    		//  $("[data-name='IQ']").hide();

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
        container: "gmp_pharmacy_pharled",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
