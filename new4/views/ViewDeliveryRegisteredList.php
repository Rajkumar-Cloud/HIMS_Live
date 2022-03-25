<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDeliveryRegisteredList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_delivery_registeredlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_delivery_registeredlist = currentForm = new ew.Form("fview_delivery_registeredlist", "list");
    fview_delivery_registeredlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_delivery_registeredlist");
});
var fview_delivery_registeredlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_delivery_registeredlistsrch = currentSearchForm = new ew.Form("fview_delivery_registeredlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_delivery_registered")) ?>,
        fields = currentTable.fields;
    fview_delivery_registeredlistsrch.addFields([
        ["first_name", [], fields.first_name.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["mobile_no", [], fields.mobile_no.isInvalid],
        ["street", [], fields.street.isInvalid],
        ["town", [], fields.town.isInvalid],
        ["DeliveryRegistered", [], fields.DeliveryRegistered.isInvalid],
        ["LMP", [ew.Validators.datetime(7)], fields.LMP.isInvalid],
        ["y_LMP", [ew.Validators.between], false],
        ["EDD", [ew.Validators.datetime(7)], fields.EDD.isInvalid],
        ["y_EDD", [ew.Validators.between], false],
        ["createdUserName", [], fields.createdUserName.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_delivery_registeredlistsrch.setInvalid();
    });

    // Validate form
    fview_delivery_registeredlistsrch.validate = function () {
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
    fview_delivery_registeredlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_delivery_registeredlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_delivery_registeredlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_delivery_registeredlistsrch");
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
<form name="fview_delivery_registeredlistsrch" id="fview_delivery_registeredlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_delivery_registeredlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_delivery_registered">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_LMP" class="ew-cell form-group">
        <label for="x_LMP" class="ew-search-caption ew-label"><?= $Page->LMP->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_LMP" id="z_LMP" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->LMP->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->LMP->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->LMP->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->LMP->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->LMP->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->LMP->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->LMP->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->LMP->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->LMP->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_delivery_registered_LMP" class="ew-search-field">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="view_delivery_registered" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage(false) ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_delivery_registeredlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_delivery_registeredlistsrch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_delivery_registered_LMP" class="ew-search-field2 d-none">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="view_delivery_registered" data-field="x_LMP" data-format="7" name="y_LMP" id="y_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue2 ?>"<?= $Page->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage(false) ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_delivery_registeredlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_delivery_registeredlistsrch", "y_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_EDD" class="ew-cell form-group">
        <label for="x_EDD" class="ew-search-caption ew-label"><?= $Page->EDD->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_EDD" id="z_EDD" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->EDD->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->EDD->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->EDD->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->EDD->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->EDD->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->EDD->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->EDD->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->EDD->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->EDD->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_delivery_registered_EDD" class="ew-search-field">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="view_delivery_registered" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_delivery_registeredlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_delivery_registeredlistsrch", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_delivery_registered_EDD" class="ew-search-field2 d-none">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="view_delivery_registered" data-field="x_EDD" data-format="7" name="y_EDD" id="y_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue2 ?>"<?= $Page->EDD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_delivery_registeredlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_delivery_registeredlistsrch", "y_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_delivery_registered">
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
<form name="fview_delivery_registeredlist" id="fview_delivery_registeredlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_delivery_registered">
<div id="gmp_view_delivery_registered" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_delivery_registeredlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_view_delivery_registered_first_name" class="view_delivery_registered_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_delivery_registered_PatientID" class="view_delivery_registered_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_view_delivery_registered_mobile_no" class="view_delivery_registered_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_view_delivery_registered_street" class="view_delivery_registered_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_view_delivery_registered_town" class="view_delivery_registered_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <th data-name="DeliveryRegistered" class="<?= $Page->DeliveryRegistered->headerCellClass() ?>"><div id="elh_view_delivery_registered_DeliveryRegistered" class="view_delivery_registered_DeliveryRegistered"><?= $Page->renderSort($Page->DeliveryRegistered) ?></div></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Page->LMP->headerCellClass() ?>"><div id="elh_view_delivery_registered_LMP" class="view_delivery_registered_LMP"><?= $Page->renderSort($Page->LMP) ?></div></th>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
        <th data-name="EDD" class="<?= $Page->EDD->headerCellClass() ?>"><div id="elh_view_delivery_registered_EDD" class="view_delivery_registered_EDD"><?= $Page->renderSort($Page->EDD) ?></div></th>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <th data-name="createdUserName" class="<?= $Page->createdUserName->headerCellClass() ?>"><div id="elh_view_delivery_registered_createdUserName" class="view_delivery_registered_createdUserName"><?= $Page->renderSort($Page->createdUserName) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_delivery_registered_HospID" class="view_delivery_registered_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_delivery_registered", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <td data-name="DeliveryRegistered" <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_DeliveryRegistered">
<span<?= $Page->DeliveryRegistered->viewAttributes() ?>>
<?= $Page->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDD->Visible) { // EDD ?>
        <td data-name="EDD" <?= $Page->EDD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_EDD">
<span<?= $Page->EDD->viewAttributes() ?>>
<?= $Page->EDD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <td data-name="createdUserName" <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_delivery_registered_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_delivery_registered");
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
        container: "gmp_view_delivery_registered",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
