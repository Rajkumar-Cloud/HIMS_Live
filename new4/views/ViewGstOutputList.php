<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewGstOutputList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_gst_outputlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_gst_outputlist = currentForm = new ew.Form("fview_gst_outputlist", "list");
    fview_gst_outputlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_gst_outputlist");
});
var fview_gst_outputlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_gst_outputlistsrch = currentSearchForm = new ew.Form("fview_gst_outputlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_gst_output")) ?>,
        fields = currentTable.fields;
    fview_gst_outputlistsrch.addFields([
        ["BillDate", [ew.Validators.datetime(7)], fields.BillDate.isInvalid],
        ["y_BillDate", [ew.Validators.between], false],
        ["IP25SGST", [], fields.IP25SGST.isInvalid],
        ["IP25CGST", [], fields.IP25CGST.isInvalid],
        ["IP60SGST", [], fields.IP60SGST.isInvalid],
        ["IP60CGST", [], fields.IP60CGST.isInvalid],
        ["IP90SGST", [], fields.IP90SGST.isInvalid],
        ["IP90CGST", [], fields.IP90CGST.isInvalid],
        ["IP140SGST", [], fields.IP140SGST.isInvalid],
        ["IP140CGST", [], fields.IP140CGST.isInvalid],
        ["OP25SGST", [], fields.OP25SGST.isInvalid],
        ["OP25CGST", [], fields.OP25CGST.isInvalid],
        ["OP60SGST", [], fields.OP60SGST.isInvalid],
        ["OP60CGST", [], fields.OP60CGST.isInvalid],
        ["OP90SGST", [], fields.OP90SGST.isInvalid],
        ["OP90CGST", [], fields.OP90CGST.isInvalid],
        ["OP140SGST", [], fields.OP140SGST.isInvalid],
        ["OP140CGST", [], fields.OP140CGST.isInvalid],
        ["HosoID", [], fields.HosoID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_gst_outputlistsrch.setInvalid();
    });

    // Validate form
    fview_gst_outputlistsrch.validate = function () {
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
    fview_gst_outputlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_gst_outputlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_gst_outputlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_gst_outputlistsrch");
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
<form name="fview_gst_outputlistsrch" id="fview_gst_outputlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_gst_outputlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_gst_output">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BillDate" class="ew-cell form-group">
        <label for="x_BillDate" class="ew-search-caption ew-label"><?= $Page->BillDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_BillDate" id="z_BillDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_gst_output_BillDate" class="ew-search-field">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_gst_outputlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_gst_outputlistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_gst_output_BillDate" class="ew-search-field2 d-none">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_gst_output" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue2 ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_gst_outputlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_gst_outputlistsrch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
    <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_gst_output">
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
<form name="fview_gst_outputlist" id="fview_gst_outputlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_gst_output">
<div id="gmp_view_gst_output" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_gst_outputlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->IP25SGST->Visible) { // IP 2.5% SGST ?>
        <th data-name="IP25SGST" class="<?= $Page->IP25SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP25SGST" class="view_gst_output_IP25SGST"><?= $Page->renderSort($Page->IP25SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP25CGST->Visible) { // IP 2.5% CGST ?>
        <th data-name="IP25CGST" class="<?= $Page->IP25CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP25CGST" class="view_gst_output_IP25CGST"><?= $Page->renderSort($Page->IP25CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP60SGST->Visible) { // IP 6.0% SGST ?>
        <th data-name="IP60SGST" class="<?= $Page->IP60SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP60SGST" class="view_gst_output_IP60SGST"><?= $Page->renderSort($Page->IP60SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP60CGST->Visible) { // IP 6.0% CGST ?>
        <th data-name="IP60CGST" class="<?= $Page->IP60CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP60CGST" class="view_gst_output_IP60CGST"><?= $Page->renderSort($Page->IP60CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP90SGST->Visible) { // IP 9.0% SGST ?>
        <th data-name="IP90SGST" class="<?= $Page->IP90SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP90SGST" class="view_gst_output_IP90SGST"><?= $Page->renderSort($Page->IP90SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP90CGST->Visible) { // IP 9.0% CGST ?>
        <th data-name="IP90CGST" class="<?= $Page->IP90CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP90CGST" class="view_gst_output_IP90CGST"><?= $Page->renderSort($Page->IP90CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP140SGST->Visible) { // IP 14.0% SGST ?>
        <th data-name="IP140SGST" class="<?= $Page->IP140SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP140SGST" class="view_gst_output_IP140SGST"><?= $Page->renderSort($Page->IP140SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP140CGST->Visible) { // IP 14.0% CGST ?>
        <th data-name="IP140CGST" class="<?= $Page->IP140CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP140CGST" class="view_gst_output_IP140CGST"><?= $Page->renderSort($Page->IP140CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP25SGST->Visible) { // OP 2.5% SGST ?>
        <th data-name="OP25SGST" class="<?= $Page->OP25SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP25SGST" class="view_gst_output_OP25SGST"><?= $Page->renderSort($Page->OP25SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP25CGST->Visible) { // OP 2.5% CGST ?>
        <th data-name="OP25CGST" class="<?= $Page->OP25CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP25CGST" class="view_gst_output_OP25CGST"><?= $Page->renderSort($Page->OP25CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP60SGST->Visible) { // OP 6.0% SGST ?>
        <th data-name="OP60SGST" class="<?= $Page->OP60SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP60SGST" class="view_gst_output_OP60SGST"><?= $Page->renderSort($Page->OP60SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP60CGST->Visible) { // OP 6.0% CGST ?>
        <th data-name="OP60CGST" class="<?= $Page->OP60CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP60CGST" class="view_gst_output_OP60CGST"><?= $Page->renderSort($Page->OP60CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP90SGST->Visible) { // OP 9.0% SGST ?>
        <th data-name="OP90SGST" class="<?= $Page->OP90SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP90SGST" class="view_gst_output_OP90SGST"><?= $Page->renderSort($Page->OP90SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP90CGST->Visible) { // OP 9.0% CGST ?>
        <th data-name="OP90CGST" class="<?= $Page->OP90CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP90CGST" class="view_gst_output_OP90CGST"><?= $Page->renderSort($Page->OP90CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP140SGST->Visible) { // OP 14.0% SGST ?>
        <th data-name="OP140SGST" class="<?= $Page->OP140SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP140SGST" class="view_gst_output_OP140SGST"><?= $Page->renderSort($Page->OP140SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP140CGST->Visible) { // OP 14.0% CGST ?>
        <th data-name="OP140CGST" class="<?= $Page->OP140CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP140CGST" class="view_gst_output_OP140CGST"><?= $Page->renderSort($Page->OP140CGST) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_gst_output", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP25SGST->Visible) { // IP 2.5% SGST ?>
        <td data-name="IP25SGST" <?= $Page->IP25SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP25SGST">
<span<?= $Page->IP25SGST->viewAttributes() ?>>
<?= $Page->IP25SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP25CGST->Visible) { // IP 2.5% CGST ?>
        <td data-name="IP25CGST" <?= $Page->IP25CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP25CGST">
<span<?= $Page->IP25CGST->viewAttributes() ?>>
<?= $Page->IP25CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP60SGST->Visible) { // IP 6.0% SGST ?>
        <td data-name="IP60SGST" <?= $Page->IP60SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP60SGST">
<span<?= $Page->IP60SGST->viewAttributes() ?>>
<?= $Page->IP60SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP60CGST->Visible) { // IP 6.0% CGST ?>
        <td data-name="IP60CGST" <?= $Page->IP60CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP60CGST">
<span<?= $Page->IP60CGST->viewAttributes() ?>>
<?= $Page->IP60CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP90SGST->Visible) { // IP 9.0% SGST ?>
        <td data-name="IP90SGST" <?= $Page->IP90SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP90SGST">
<span<?= $Page->IP90SGST->viewAttributes() ?>>
<?= $Page->IP90SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP90CGST->Visible) { // IP 9.0% CGST ?>
        <td data-name="IP90CGST" <?= $Page->IP90CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP90CGST">
<span<?= $Page->IP90CGST->viewAttributes() ?>>
<?= $Page->IP90CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP140SGST->Visible) { // IP 14.0% SGST ?>
        <td data-name="IP140SGST" <?= $Page->IP140SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP140SGST">
<span<?= $Page->IP140SGST->viewAttributes() ?>>
<?= $Page->IP140SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP140CGST->Visible) { // IP 14.0% CGST ?>
        <td data-name="IP140CGST" <?= $Page->IP140CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP140CGST">
<span<?= $Page->IP140CGST->viewAttributes() ?>>
<?= $Page->IP140CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP25SGST->Visible) { // OP 2.5% SGST ?>
        <td data-name="OP25SGST" <?= $Page->OP25SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP25SGST">
<span<?= $Page->OP25SGST->viewAttributes() ?>>
<?= $Page->OP25SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP25CGST->Visible) { // OP 2.5% CGST ?>
        <td data-name="OP25CGST" <?= $Page->OP25CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP25CGST">
<span<?= $Page->OP25CGST->viewAttributes() ?>>
<?= $Page->OP25CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP60SGST->Visible) { // OP 6.0% SGST ?>
        <td data-name="OP60SGST" <?= $Page->OP60SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP60SGST">
<span<?= $Page->OP60SGST->viewAttributes() ?>>
<?= $Page->OP60SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP60CGST->Visible) { // OP 6.0% CGST ?>
        <td data-name="OP60CGST" <?= $Page->OP60CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP60CGST">
<span<?= $Page->OP60CGST->viewAttributes() ?>>
<?= $Page->OP60CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP90SGST->Visible) { // OP 9.0% SGST ?>
        <td data-name="OP90SGST" <?= $Page->OP90SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP90SGST">
<span<?= $Page->OP90SGST->viewAttributes() ?>>
<?= $Page->OP90SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP90CGST->Visible) { // OP 9.0% CGST ?>
        <td data-name="OP90CGST" <?= $Page->OP90CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP90CGST">
<span<?= $Page->OP90CGST->viewAttributes() ?>>
<?= $Page->OP90CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP140SGST->Visible) { // OP 14.0% SGST ?>
        <td data-name="OP140SGST" <?= $Page->OP140SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP140SGST">
<span<?= $Page->OP140SGST->viewAttributes() ?>>
<?= $Page->OP140SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP140CGST->Visible) { // OP 14.0% CGST ?>
        <td data-name="OP140CGST" <?= $Page->OP140CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP140CGST">
<span<?= $Page->OP140CGST->viewAttributes() ?>>
<?= $Page->OP140CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_gst_output");
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
        container: "gmp_view_gst_output",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
