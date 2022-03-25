<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardServiceDetailsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_service_detailslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_dashboard_service_detailslist = currentForm = new ew.Form("fview_dashboard_service_detailslist", "list");
    fview_dashboard_service_detailslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_dashboard_service_detailslist");
});
var fview_dashboard_service_detailslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_dashboard_service_detailslistsrch = currentSearchForm = new ew.Form("fview_dashboard_service_detailslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_service_details")) ?>,
        fields = currentTable.fields;
    fview_dashboard_service_detailslistsrch.addFields([
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Services", [], fields.Services.isInvalid],
        ["amount", [], fields.amount.isInvalid],
        ["SubTotal", [], fields.SubTotal.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [], fields.createddatetime.isInvalid],
        ["createdDate", [ew.Validators.datetime(7)], fields.createdDate.isInvalid],
        ["y_createdDate", [ew.Validators.between], false],
        ["DrName", [], fields.DrName.isInvalid],
        ["DRDepartment", [], fields.DRDepartment.isInvalid],
        ["ItemCode", [], fields.ItemCode.isInvalid],
        ["DEptCd", [], fields.DEptCd.isInvalid],
        ["CODE", [], fields.CODE.isInvalid],
        ["SERVICE", [], fields.SERVICE.isInvalid],
        ["SERVICE_TYPE", [], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [], fields.DEPARTMENT.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["vid", [], fields.vid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_dashboard_service_detailslistsrch.setInvalid();
    });

    // Validate form
    fview_dashboard_service_detailslistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_service_detailslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_service_detailslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_service_detailslistsrch.lists.DrName = <?= $Page->DrName->toClientList($Page) ?>;

    // Filters
    fview_dashboard_service_detailslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_dashboard_service_detailslistsrch");
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
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_dashboard_service_servicetype") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewDashboardServiceServicetypeMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_dashboard_service_detailslistsrch" id="fview_dashboard_service_detailslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_dashboard_service_detailslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_service_details">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Services->Visible) { // Services ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Services" class="ew-cell form-group">
        <label for="x_Services" class="ew-search-caption ew-label"><?= $Page->Services->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
        <span id="el_view_dashboard_service_details_Services" class="ew-search-field">
<input type="<?= $Page->Services->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" value="<?= $Page->Services->EditValue ?>"<?= $Page->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createdDate" class="ew-cell form-group">
        <label for="x_createdDate" class="ew-search-caption ew-label"><?= $Page->createdDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_createdDate" id="z_createdDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createdDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createdDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_dashboard_service_details_createdDate" class="ew-search-field">
<input type="<?= $Page->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?= HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?= $Page->createdDate->EditValue ?>"<?= $Page->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDate->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDate->ReadOnly && !$Page->createdDate->Disabled && !isset($Page->createdDate->EditAttrs["readonly"]) && !isset($Page->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_dashboard_service_details_createdDate" class="ew-search-field2 d-none">
<input type="<?= $Page->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?= HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?= $Page->createdDate->EditValue2 ?>"<?= $Page->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDate->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDate->ReadOnly && !$Page->createdDate->Disabled && !isset($Page->createdDate->EditAttrs["readonly"]) && !isset($Page->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailslistsrch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DrName" class="ew-cell form-group">
        <label for="x_DrName" class="ew-search-caption ew-label"><?= $Page->DrName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
        <span id="el_view_dashboard_service_details_DrName" class="ew-search-field">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?= EmptyValue(strval($Page->DrName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrName->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrName->ReadOnly || $Page->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage(false) ?></div>
<?= $Page->DrName->Lookup->getParamTag($Page, "p_x_DrName") ?>
<input type="hidden" is="selection-list" data-table="view_dashboard_service_details" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?= $Page->DrName->AdvancedSearch->SearchValue ?>"<?= $Page->DrName->editAttributes() ?>>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DRDepartment" class="ew-cell form-group">
        <label for="x_DRDepartment" class="ew-search-caption ew-label"><?= $Page->DRDepartment->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE">
</span>
        <span id="el_view_dashboard_service_details_DRDepartment" class="ew-search-field">
<input type="<?= $Page->DRDepartment->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DRDepartment->getPlaceHolder()) ?>" value="<?= $Page->DRDepartment->EditValue ?>"<?= $Page->DRDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DRDepartment->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DEPARTMENT" class="ew-cell form-group">
        <label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?= $Page->DEPARTMENT->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
        <span id="el_view_dashboard_service_details_DEPARTMENT" class="ew-search-field">
<input type="<?= $Page->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Page->DEPARTMENT->EditValue ?>"<?= $Page->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
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
<form name="fview_dashboard_service_detailslist" id="fview_dashboard_service_detailslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<?php if ($Page->getCurrentMasterTable() == "view_dashboard_service_servicetype" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_dashboard_service_servicetype">
<input type="hidden" name="fk_DEPARTMENT" value="<?= HtmlEncode($Page->DEPARTMENT->getSessionValue()) ?>">
<input type="hidden" name="fk_HospID" value="<?= HtmlEncode($Page->HospID->getSessionValue()) ?>">
<input type="hidden" name="fk_SERVICE_TYPE" value="<?= HtmlEncode($Page->SERVICE_TYPE->getSessionValue()) ?>">
<input type="hidden" name="fk_createdDate" value="<?= HtmlEncode($Page->createdDate->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_dashboard_service_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_dashboard_service_detailslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Page->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><?= $Page->renderSort($Page->Services) ?></div></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Page->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><?= $Page->renderSort($Page->amount) ?></div></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Page->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><?= $Page->renderSort($Page->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <th data-name="createdDate" class="<?= $Page->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><?= $Page->renderSort($Page->createdDate) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
        <th data-name="DRDepartment" class="<?= $Page->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><?= $Page->renderSort($Page->DRDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Page->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><?= $Page->renderSort($Page->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Page->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><?= $Page->renderSort($Page->CODE) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th data-name="SERVICE" class="<?= $Page->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><?= $Page->renderSort($Page->SERVICE) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th data-name="SERVICE_TYPE" class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><?= $Page->renderSort($Page->SERVICE_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><?= $Page->renderSort($Page->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
        <th data-name="vid" class="<?= $Page->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><?= $Page->renderSort($Page->vid) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_dashboard_service_details", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" <?= $Page->createdDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_createdDate">
<span<?= $Page->createdDate->viewAttributes() ?>>
<?= $Page->createdDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
        <td data-name="DRDepartment" <?= $Page->DRDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_DRDepartment">
<span<?= $Page->DRDepartment->viewAttributes() ?>>
<?= $Page->DRDepartment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->vid->Visible) { // vid ?>
        <td data-name="vid" <?= $Page->vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_service_details_vid">
<span<?= $Page->vid->viewAttributes() ?>>
<?= $Page->vid->getViewValue() ?></span>
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
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Page->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Page->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" class="<?= $Page->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
        <span class="ew-aggregate"><?= $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
        <?= $Page->Services->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->amount->Visible) { // amount ?>
        <td data-name="amount" class="<?= $Page->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" class="<?= $Page->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SubTotal->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" class="<?= $Page->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" class="<?= $Page->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" class="<?= $Page->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" class="<?= $Page->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
        <td data-name="DRDepartment" class="<?= $Page->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" class="<?= $Page->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" class="<?= $Page->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE" class="<?= $Page->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" class="<?= $Page->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" class="<?= $Page->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" class="<?= $Page->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->vid->Visible) { // vid ?>
        <td data-name="vid" class="<?= $Page->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
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
    ew.addEventHandlers("view_dashboard_service_details");
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
        container: "gmp_view_dashboard_service_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
