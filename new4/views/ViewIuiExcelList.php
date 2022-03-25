<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIuiExcelList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_iui_excellist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_iui_excellist = currentForm = new ew.Form("fview_iui_excellist", "list");
    fview_iui_excellist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_iui_excellist");
});
var fview_iui_excellistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_iui_excellistsrch = currentSearchForm = new ew.Form("fview_iui_excellistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_iui_excel")) ?>,
        fields = currentTable.fields;
    fview_iui_excellistsrch.addFields([
        ["NAME", [], fields.NAME.isInvalid],
        ["HUSBANDNAME", [], fields.HUSBANDNAME.isInvalid],
        ["CoupleID", [], fields.CoupleID.isInvalid],
        ["AGEWIFE", [], fields.AGEWIFE.isInvalid],
        ["AGEHUSBAND", [], fields.AGEHUSBAND.isInvalid],
        ["ANXIOUSTOCONCEIVEFOR", [], fields.ANXIOUSTOCONCEIVEFOR.isInvalid],
        ["AMHNGML", [], fields.AMHNGML.isInvalid],
        ["TUBAL_PATENCY", [], fields.TUBAL_PATENCY.isInvalid],
        ["HSG", [], fields.HSG.isInvalid],
        ["DHL", [], fields.DHL.isInvalid],
        ["UTERINE_PROBLEMS", [], fields.UTERINE_PROBLEMS.isInvalid],
        ["W_COMORBIDS", [], fields.W_COMORBIDS.isInvalid],
        ["H_COMORBIDS", [], fields.H_COMORBIDS.isInvalid],
        ["SEXUAL_DYSFUNCTION", [], fields.SEXUAL_DYSFUNCTION.isInvalid],
        ["PREVIUI", [], fields.PREVIUI.isInvalid],
        ["PREV_IVF", [], fields.PREV_IVF.isInvalid],
        ["TABLETS", [], fields.TABLETS.isInvalid],
        ["INJTYPE", [], fields.INJTYPE.isInvalid],
        ["LMP", [], fields.LMP.isInvalid],
        ["TRIGGERR", [], fields.TRIGGERR.isInvalid],
        ["TRIGGERDATE", [], fields.TRIGGERDATE.isInvalid],
        ["FOLLICLE_STATUS", [], fields.FOLLICLE_STATUS.isInvalid],
        ["NUMBER_OF_IUI", [], fields.NUMBER_OF_IUI.isInvalid],
        ["PROCEDURE", [], fields.PROCEDURE.isInvalid],
        ["LUTEAL_SUPPORT", [], fields.LUTEAL_SUPPORT.isInvalid],
        ["HDSAMPLE", [], fields.HDSAMPLE.isInvalid],
        ["DONORID", [], fields.DONORID.isInvalid],
        ["PREG_TEST_DATE", [ew.Validators.datetime(7)], fields.PREG_TEST_DATE.isInvalid],
        ["y_PREG_TEST_DATE", [ew.Validators.between], false],
        ["COLLECTIONMETHOD", [], fields.COLLECTIONMETHOD.isInvalid],
        ["SAMPLESOURCE", [], fields.SAMPLESOURCE.isInvalid],
        ["SPECIFIC_PROBLEMS", [], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [], fields.IMSC_1.isInvalid],
        ["IMSC_2", [], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [], fields.TIME_FROM_PREP_TO_INSEM.isInvalid],
        ["SPECIFIC_MATERNAL_PROBLEMS", [], fields.SPECIFIC_MATERNAL_PROBLEMS.isInvalid],
        ["RESULTS", [], fields.RESULTS.isInvalid],
        ["ONGOING_PREG", [], fields.ONGOING_PREG.isInvalid],
        ["EDD_Date", [ew.Validators.datetime(0)], fields.EDD_Date.isInvalid],
        ["y_EDD_Date", [ew.Validators.between], false]
    ]);

    // Set invalid fields
    $(function() {
        fview_iui_excellistsrch.setInvalid();
    });

    // Validate form
    fview_iui_excellistsrch.validate = function () {
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
    fview_iui_excellistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_iui_excellistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_iui_excellistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_iui_excellistsrch");
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
<form name="fview_iui_excellistsrch" id="fview_iui_excellistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_iui_excellistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_iui_excel">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_NAME" class="ew-cell form-group">
        <label for="x_NAME" class="ew-search-caption ew-label"><?= $Page->NAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NAME" id="z_NAME" value="LIKE">
</span>
        <span id="el_view_iui_excel_NAME" class="ew-search-field">
<input type="<?= $Page->NAME->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NAME->getPlaceHolder()) ?>" value="<?= $Page->NAME->EditValue ?>"<?= $Page->NAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NAME->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->HUSBANDNAME->Visible) { // HUSBAND NAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_HUSBANDNAME" class="ew-cell form-group">
        <label for="x_HUSBANDNAME" class="ew-search-caption ew-label"><?= $Page->HUSBANDNAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HUSBANDNAME" id="z_HUSBANDNAME" value="LIKE">
</span>
        <span id="el_view_iui_excel_HUSBANDNAME" class="ew-search-field">
<input type="<?= $Page->HUSBANDNAME->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_HUSBANDNAME" name="x_HUSBANDNAME" id="x_HUSBANDNAME" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HUSBANDNAME->getPlaceHolder()) ?>" value="<?= $Page->HUSBANDNAME->EditValue ?>"<?= $Page->HUSBANDNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HUSBANDNAME->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CoupleID" class="ew-cell form-group">
        <label for="x_CoupleID" class="ew-search-caption ew-label"><?= $Page->CoupleID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
        <span id="el_view_iui_excel_CoupleID" class="ew-search-field">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PREG_TEST_DATE" class="ew-cell form-group">
        <label for="x_PREG_TEST_DATE" class="ew-search-caption ew-label"><?= $Page->PREG_TEST_DATE->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_iui_excel_PREG_TEST_DATE" class="ew-search-field">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excellistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excellistsrch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_iui_excel_PREG_TEST_DATE" class="ew-search-field2 d-none">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue2 ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excellistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excellistsrch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->RESULTS->Visible) { // RESULTS ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_RESULTS" class="ew-cell form-group">
        <label for="x_RESULTS" class="ew-search-caption ew-label"><?= $Page->RESULTS->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESULTS" id="z_RESULTS" value="LIKE">
</span>
        <span id="el_view_iui_excel_RESULTS" class="ew-search-field">
<input type="<?= $Page->RESULTS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_RESULTS" name="x_RESULTS" id="x_RESULTS" size="35" placeholder="<?= HtmlEncode($Page->RESULTS->getPlaceHolder()) ?>" value="<?= $Page->RESULTS->EditValue ?>"<?= $Page->RESULTS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RESULTS->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ONGOING_PREG" class="ew-cell form-group">
        <label for="x_ONGOING_PREG" class="ew-search-caption ew-label"><?= $Page->ONGOING_PREG->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ONGOING_PREG" id="z_ONGOING_PREG" value="LIKE">
</span>
        <span id="el_view_iui_excel_ONGOING_PREG" class="ew-search-field">
<input type="<?= $Page->ONGOING_PREG->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ONGOING_PREG->getPlaceHolder()) ?>" value="<?= $Page->ONGOING_PREG->EditValue ?>"<?= $Page->ONGOING_PREG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ONGOING_PREG->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_EDD_Date" class="ew-cell form-group">
        <label for="x_EDD_Date" class="ew-search-caption ew-label"><?= $Page->EDD_Date->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_EDD_Date" id="z_EDD_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_iui_excel_EDD_Date" class="ew-search-field">
<input type="<?= $Page->EDD_Date->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?= HtmlEncode($Page->EDD_Date->getPlaceHolder()) ?>" value="<?= $Page->EDD_Date->EditValue ?>"<?= $Page->EDD_Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD_Date->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD_Date->ReadOnly && !$Page->EDD_Date->Disabled && !isset($Page->EDD_Date->EditAttrs["readonly"]) && !isset($Page->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excellistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excellistsrch", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_iui_excel_EDD_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->EDD_Date->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_EDD_Date" name="y_EDD_Date" id="y_EDD_Date" placeholder="<?= HtmlEncode($Page->EDD_Date->getPlaceHolder()) ?>" value="<?= $Page->EDD_Date->EditValue2 ?>"<?= $Page->EDD_Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD_Date->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD_Date->ReadOnly && !$Page->EDD_Date->Disabled && !isset($Page->EDD_Date->EditAttrs["readonly"]) && !isset($Page->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excellistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excellistsrch", "y_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_iui_excel">
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
<form name="fview_iui_excellist" id="fview_iui_excellist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_iui_excel">
<div id="gmp_view_iui_excel" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_iui_excellist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->NAME->Visible) { // NAME ?>
        <th data-name="NAME" class="<?= $Page->NAME->headerCellClass() ?>"><div id="elh_view_iui_excel_NAME" class="view_iui_excel_NAME"><?= $Page->renderSort($Page->NAME) ?></div></th>
<?php } ?>
<?php if ($Page->HUSBANDNAME->Visible) { // HUSBAND NAME ?>
        <th data-name="HUSBANDNAME" class="<?= $Page->HUSBANDNAME->headerCellClass() ?>"><div id="elh_view_iui_excel_HUSBANDNAME" class="view_iui_excel_HUSBANDNAME"><?= $Page->renderSort($Page->HUSBANDNAME) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_iui_excel_CoupleID" class="view_iui_excel_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->AGEWIFE->Visible) { // AGE  - WIFE ?>
        <th data-name="AGEWIFE" class="<?= $Page->AGEWIFE->headerCellClass() ?>"><div id="elh_view_iui_excel_AGEWIFE" class="view_iui_excel_AGEWIFE"><?= $Page->renderSort($Page->AGEWIFE) ?></div></th>
<?php } ?>
<?php if ($Page->AGEHUSBAND->Visible) { // AGE- HUSBAND ?>
        <th data-name="AGEHUSBAND" class="<?= $Page->AGEHUSBAND->headerCellClass() ?>"><div id="elh_view_iui_excel_AGEHUSBAND" class="view_iui_excel_AGEHUSBAND"><?= $Page->renderSort($Page->AGEHUSBAND) ?></div></th>
<?php } ?>
<?php if ($Page->ANXIOUSTOCONCEIVEFOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
        <th data-name="ANXIOUSTOCONCEIVEFOR" class="<?= $Page->ANXIOUSTOCONCEIVEFOR->headerCellClass() ?>"><div id="elh_view_iui_excel_ANXIOUSTOCONCEIVEFOR" class="view_iui_excel_ANXIOUSTOCONCEIVEFOR"><?= $Page->renderSort($Page->ANXIOUSTOCONCEIVEFOR) ?></div></th>
<?php } ?>
<?php if ($Page->AMHNGML->Visible) { // AMH ( NG/ML) ?>
        <th data-name="AMHNGML" class="<?= $Page->AMHNGML->headerCellClass() ?>"><div id="elh_view_iui_excel_AMHNGML" class="view_iui_excel_AMHNGML"><?= $Page->renderSort($Page->AMHNGML) ?></div></th>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <th data-name="TUBAL_PATENCY" class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><div id="elh_view_iui_excel_TUBAL_PATENCY" class="view_iui_excel_TUBAL_PATENCY"><?= $Page->renderSort($Page->TUBAL_PATENCY) ?></div></th>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <th data-name="HSG" class="<?= $Page->HSG->headerCellClass() ?>"><div id="elh_view_iui_excel_HSG" class="view_iui_excel_HSG"><?= $Page->renderSort($Page->HSG) ?></div></th>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <th data-name="DHL" class="<?= $Page->DHL->headerCellClass() ?>"><div id="elh_view_iui_excel_DHL" class="view_iui_excel_DHL"><?= $Page->renderSort($Page->DHL) ?></div></th>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <th data-name="UTERINE_PROBLEMS" class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_UTERINE_PROBLEMS" class="view_iui_excel_UTERINE_PROBLEMS"><?= $Page->renderSort($Page->UTERINE_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <th data-name="W_COMORBIDS" class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_W_COMORBIDS" class="view_iui_excel_W_COMORBIDS"><?= $Page->renderSort($Page->W_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <th data-name="H_COMORBIDS" class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_H_COMORBIDS" class="view_iui_excel_H_COMORBIDS"><?= $Page->renderSort($Page->H_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <th data-name="SEXUAL_DYSFUNCTION" class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div id="elh_view_iui_excel_SEXUAL_DYSFUNCTION" class="view_iui_excel_SEXUAL_DYSFUNCTION"><?= $Page->renderSort($Page->SEXUAL_DYSFUNCTION) ?></div></th>
<?php } ?>
<?php if ($Page->PREVIUI->Visible) { // PREV IUI ?>
        <th data-name="PREVIUI" class="<?= $Page->PREVIUI->headerCellClass() ?>"><div id="elh_view_iui_excel_PREVIUI" class="view_iui_excel_PREVIUI"><?= $Page->renderSort($Page->PREVIUI) ?></div></th>
<?php } ?>
<?php if ($Page->PREV_IVF->Visible) { // PREV_IVF ?>
        <th data-name="PREV_IVF" class="<?= $Page->PREV_IVF->headerCellClass() ?>"><div id="elh_view_iui_excel_PREV_IVF" class="view_iui_excel_PREV_IVF"><?= $Page->renderSort($Page->PREV_IVF) ?></div></th>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <th data-name="TABLETS" class="<?= $Page->TABLETS->headerCellClass() ?>"><div id="elh_view_iui_excel_TABLETS" class="view_iui_excel_TABLETS"><?= $Page->renderSort($Page->TABLETS) ?></div></th>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <th data-name="INJTYPE" class="<?= $Page->INJTYPE->headerCellClass() ?>"><div id="elh_view_iui_excel_INJTYPE" class="view_iui_excel_INJTYPE"><?= $Page->renderSort($Page->INJTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Page->LMP->headerCellClass() ?>"><div id="elh_view_iui_excel_LMP" class="view_iui_excel_LMP"><?= $Page->renderSort($Page->LMP) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <th data-name="TRIGGERR" class="<?= $Page->TRIGGERR->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERR" class="view_iui_excel_TRIGGERR"><?= $Page->renderSort($Page->TRIGGERR) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <th data-name="TRIGGERDATE" class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERDATE" class="view_iui_excel_TRIGGERDATE"><?= $Page->renderSort($Page->TRIGGERDATE) ?></div></th>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <th data-name="FOLLICLE_STATUS" class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><div id="elh_view_iui_excel_FOLLICLE_STATUS" class="view_iui_excel_FOLLICLE_STATUS"><?= $Page->renderSort($Page->FOLLICLE_STATUS) ?></div></th>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <th data-name="NUMBER_OF_IUI" class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><div id="elh_view_iui_excel_NUMBER_OF_IUI" class="view_iui_excel_NUMBER_OF_IUI"><?= $Page->renderSort($Page->NUMBER_OF_IUI) ?></div></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th data-name="PROCEDURE" class="<?= $Page->PROCEDURE->headerCellClass() ?>"><div id="elh_view_iui_excel_PROCEDURE" class="view_iui_excel_PROCEDURE"><?= $Page->renderSort($Page->PROCEDURE) ?></div></th>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <th data-name="LUTEAL_SUPPORT" class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><div id="elh_view_iui_excel_LUTEAL_SUPPORT" class="view_iui_excel_LUTEAL_SUPPORT"><?= $Page->renderSort($Page->LUTEAL_SUPPORT) ?></div></th>
<?php } ?>
<?php if ($Page->HDSAMPLE->Visible) { // H/D SAMPLE ?>
        <th data-name="HDSAMPLE" class="<?= $Page->HDSAMPLE->headerCellClass() ?>"><div id="elh_view_iui_excel_HDSAMPLE" class="view_iui_excel_HDSAMPLE"><?= $Page->renderSort($Page->HDSAMPLE) ?></div></th>
<?php } ?>
<?php if ($Page->DONORID->Visible) { // DONOR - I.D ?>
        <th data-name="DONORID" class="<?= $Page->DONORID->headerCellClass() ?>"><div id="elh_view_iui_excel_DONORID" class="view_iui_excel_DONORID"><?= $Page->renderSort($Page->DONORID) ?></div></th>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th data-name="PREG_TEST_DATE" class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_iui_excel_PREG_TEST_DATE" class="view_iui_excel_PREG_TEST_DATE"><?= $Page->renderSort($Page->PREG_TEST_DATE) ?></div></th>
<?php } ?>
<?php if ($Page->COLLECTIONMETHOD->Visible) { // COLLECTION  METHOD ?>
        <th data-name="COLLECTIONMETHOD" class="<?= $Page->COLLECTIONMETHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTIONMETHOD" class="view_iui_excel_COLLECTIONMETHOD"><?= $Page->renderSort($Page->COLLECTIONMETHOD) ?></div></th>
<?php } ?>
<?php if ($Page->SAMPLESOURCE->Visible) { // SAMPLE SOURCE ?>
        <th data-name="SAMPLESOURCE" class="<?= $Page->SAMPLESOURCE->headerCellClass() ?>"><div id="elh_view_iui_excel_SAMPLESOURCE" class="view_iui_excel_SAMPLESOURCE"><?= $Page->renderSort($Page->SAMPLESOURCE) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <th data-name="SPECIFIC_PROBLEMS" class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_PROBLEMS" class="view_iui_excel_SPECIFIC_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <th data-name="IMSC_1" class="<?= $Page->IMSC_1->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_1" class="view_iui_excel_IMSC_1"><?= $Page->renderSort($Page->IMSC_1) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <th data-name="IMSC_2" class="<?= $Page->IMSC_2->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_2" class="view_iui_excel_IMSC_2"><?= $Page->renderSort($Page->IMSC_2) ?></div></th>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <th data-name="LIQUIFACTION_STORAGE" class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_view_iui_excel_LIQUIFACTION_STORAGE" class="view_iui_excel_LIQUIFACTION_STORAGE"><?= $Page->renderSort($Page->LIQUIFACTION_STORAGE) ?></div></th>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <th data-name="IUI_PREP_METHOD" class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_IUI_PREP_METHOD" class="view_iui_excel_IUI_PREP_METHOD"><?= $Page->renderSort($Page->IUI_PREP_METHOD) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <th data-name="TIME_FROM_TRIGGER" class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_TRIGGER" class="view_iui_excel_TIME_FROM_TRIGGER"><?= $Page->renderSort($Page->TIME_FROM_TRIGGER) ?></div></th>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <th data-name="COLLECTION_TO_PREPARATION" class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTION_TO_PREPARATION" class="view_iui_excel_COLLECTION_TO_PREPARATION"><?= $Page->renderSort($Page->COLLECTION_TO_PREPARATION) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <th data-name="TIME_FROM_PREP_TO_INSEM" class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="view_iui_excel_TIME_FROM_PREP_TO_INSEM"><?= $Page->renderSort($Page->TIME_FROM_PREP_TO_INSEM) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_MATERNAL_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->RESULTS->Visible) { // RESULTS ?>
        <th data-name="RESULTS" class="<?= $Page->RESULTS->headerCellClass() ?>"><div id="elh_view_iui_excel_RESULTS" class="view_iui_excel_RESULTS"><?= $Page->renderSort($Page->RESULTS) ?></div></th>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <th data-name="ONGOING_PREG" class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><div id="elh_view_iui_excel_ONGOING_PREG" class="view_iui_excel_ONGOING_PREG"><?= $Page->renderSort($Page->ONGOING_PREG) ?></div></th>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <th data-name="EDD_Date" class="<?= $Page->EDD_Date->headerCellClass() ?>"><div id="elh_view_iui_excel_EDD_Date" class="view_iui_excel_EDD_Date"><?= $Page->renderSort($Page->EDD_Date) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_iui_excel", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->NAME->Visible) { // NAME ?>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HUSBANDNAME->Visible) { // HUSBAND NAME ?>
        <td data-name="HUSBANDNAME" <?= $Page->HUSBANDNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HUSBANDNAME">
<span<?= $Page->HUSBANDNAME->viewAttributes() ?>>
<?= $Page->HUSBANDNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AGEWIFE->Visible) { // AGE  - WIFE ?>
        <td data-name="AGEWIFE" <?= $Page->AGEWIFE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AGEWIFE">
<span<?= $Page->AGEWIFE->viewAttributes() ?>>
<?= $Page->AGEWIFE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AGEHUSBAND->Visible) { // AGE- HUSBAND ?>
        <td data-name="AGEHUSBAND" <?= $Page->AGEHUSBAND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AGEHUSBAND">
<span<?= $Page->AGEHUSBAND->viewAttributes() ?>>
<?= $Page->AGEHUSBAND->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANXIOUSTOCONCEIVEFOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
        <td data-name="ANXIOUSTOCONCEIVEFOR" <?= $Page->ANXIOUSTOCONCEIVEFOR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_ANXIOUSTOCONCEIVEFOR">
<span<?= $Page->ANXIOUSTOCONCEIVEFOR->viewAttributes() ?>>
<?= $Page->ANXIOUSTOCONCEIVEFOR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMHNGML->Visible) { // AMH ( NG/ML) ?>
        <td data-name="AMHNGML" <?= $Page->AMHNGML->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AMHNGML">
<span<?= $Page->AMHNGML->viewAttributes() ?>>
<?= $Page->AMHNGML->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <td data-name="TUBAL_PATENCY" <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSG->Visible) { // HSG ?>
        <td data-name="HSG" <?= $Page->HSG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DHL->Visible) { // DHL ?>
        <td data-name="DHL" <?= $Page->DHL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <td data-name="UTERINE_PROBLEMS" <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <td data-name="W_COMORBIDS" <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <td data-name="H_COMORBIDS" <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <td data-name="SEXUAL_DYSFUNCTION" <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREVIUI->Visible) { // PREV IUI ?>
        <td data-name="PREVIUI" <?= $Page->PREVIUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PREVIUI">
<span<?= $Page->PREVIUI->viewAttributes() ?>>
<?= $Page->PREVIUI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREV_IVF->Visible) { // PREV_IVF ?>
        <td data-name="PREV_IVF" <?= $Page->PREV_IVF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PREV_IVF">
<span<?= $Page->PREV_IVF->viewAttributes() ?>>
<?= $Page->PREV_IVF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <td data-name="TABLETS" <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <td data-name="INJTYPE" <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <td data-name="TRIGGERDATE" <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <td data-name="FOLLICLE_STATUS" <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <td data-name="NUMBER_OF_IUI" <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <td data-name="LUTEAL_SUPPORT" <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HDSAMPLE->Visible) { // H/D SAMPLE ?>
        <td data-name="HDSAMPLE" <?= $Page->HDSAMPLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HDSAMPLE">
<span<?= $Page->HDSAMPLE->viewAttributes() ?>>
<?= $Page->HDSAMPLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DONORID->Visible) { // DONOR - I.D ?>
        <td data-name="DONORID" <?= $Page->DONORID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_DONORID">
<span<?= $Page->DONORID->viewAttributes() ?>>
<?= $Page->DONORID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td data-name="PREG_TEST_DATE" <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COLLECTIONMETHOD->Visible) { // COLLECTION  METHOD ?>
        <td data-name="COLLECTIONMETHOD" <?= $Page->COLLECTIONMETHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_COLLECTIONMETHOD">
<span<?= $Page->COLLECTIONMETHOD->viewAttributes() ?>>
<?= $Page->COLLECTIONMETHOD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAMPLESOURCE->Visible) { // SAMPLE SOURCE ?>
        <td data-name="SAMPLESOURCE" <?= $Page->SAMPLESOURCE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SAMPLESOURCE">
<span<?= $Page->SAMPLESOURCE->viewAttributes() ?>>
<?= $Page->SAMPLESOURCE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <td data-name="IMSC_1" <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <td data-name="IMSC_2" <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td data-name="IUI_PREP_METHOD" <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td data-name="TIME_FROM_TRIGGER" <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULTS->Visible) { // RESULTS ?>
        <td data-name="RESULTS" <?= $Page->RESULTS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_RESULTS">
<span<?= $Page->RESULTS->viewAttributes() ?>>
<?= $Page->RESULTS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <td data-name="ONGOING_PREG" <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <td data-name="EDD_Date" <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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
    ew.addEventHandlers("view_iui_excel");
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
        container: "gmp_view_iui_excel",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
