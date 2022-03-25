<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewTemplateForOpuList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_template_for_opulist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_template_for_opulist = currentForm = new ew.Form("fview_template_for_opulist", "list");
    fview_template_for_opulist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_template_for_opulist");
});
var fview_template_for_opulistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_template_for_opulistsrch = currentSearchForm = new ew.Form("fview_template_for_opulistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_template_for_opu")) ?>,
        fields = currentTable.fields;
    fview_template_for_opulistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["RIDNO", [], fields.RIDNO.isInvalid],
        ["Treatment", [], fields.Treatment.isInvalid],
        ["Origin", [], fields.Origin.isInvalid],
        ["MaleIndications", [], fields.MaleIndications.isInvalid],
        ["FemaleIndications", [], fields.FemaleIndications.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["A4ICSICycle", [], fields.A4ICSICycle.isInvalid],
        ["TotalICSICycle", [], fields.TotalICSICycle.isInvalid],
        ["TypeOfInfertility", [], fields.TypeOfInfertility.isInvalid],
        ["RelevantHistory", [], fields.RelevantHistory.isInvalid],
        ["IUICycles", [], fields.IUICycles.isInvalid],
        ["AMH", [], fields.AMH.isInvalid],
        ["FBMI", [], fields.FBMI.isInvalid],
        ["ANTAGONISTSTARTDAY", [], fields.ANTAGONISTSTARTDAY.isInvalid],
        ["OvarianSurgery", [], fields.OvarianSurgery.isInvalid],
        ["OPUDATE", [], fields.OPUDATE.isInvalid],
        ["RFSH1", [], fields.RFSH1.isInvalid],
        ["RFSH2", [], fields.RFSH2.isInvalid],
        ["RFSH3", [], fields.RFSH3.isInvalid],
        ["E21", [], fields.E21.isInvalid],
        ["Hysteroscopy", [], fields.Hysteroscopy.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Fweight", [], fields.Fweight.isInvalid],
        ["AntiTPO", [], fields.AntiTPO.isInvalid],
        ["AntiTG", [], fields.AntiTG.isInvalid],
        ["PatientAge", [], fields.PatientAge.isInvalid],
        ["PartnerAge", [], fields.PartnerAge.isInvalid],
        ["ROVARY", [], fields.ROVARY.isInvalid],
        ["RAFC", [], fields.RAFC.isInvalid],
        ["LOVARY", [], fields.LOVARY.isInvalid],
        ["LAFC", [], fields.LAFC.isInvalid],
        ["E2", [], fields.E2.isInvalid],
        ["AMH1", [], fields.AMH1.isInvalid],
        ["BMIMALE", [], fields.BMIMALE.isInvalid],
        ["MaleMedicalConditions", [], fields.MaleMedicalConditions.isInvalid],
        ["CC100", [], fields.CC100.isInvalid],
        ["RFSH1A", [], fields.RFSH1A.isInvalid],
        ["HMG1", [], fields.HMG1.isInvalid],
        ["DAYSOFSTIMULATION", [], fields.DAYSOFSTIMULATION.isInvalid],
        ["TRIGGERR", [], fields.TRIGGERR.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_template_for_opulistsrch.setInvalid();
    });

    // Validate form
    fview_template_for_opulistsrch.validate = function () {
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
    fview_template_for_opulistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_template_for_opulistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_template_for_opulistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_template_for_opulistsrch");
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
<form name="fview_template_for_opulistsrch" id="fview_template_for_opulistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_template_for_opulistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_template_for_opu">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Treatment" class="ew-cell form-group">
        <label for="x_Treatment" class="ew-search-caption ew-label"><?= $Page->Treatment->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Treatment" id="z_Treatment" value="LIKE">
</span>
        <span id="el_view_template_for_opu_Treatment" class="ew-search-field">
<input type="<?= $Page->Treatment->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>" value="<?= $Page->Treatment->EditValue ?>"<?= $Page->Treatment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Origin" class="ew-cell form-group">
        <label for="x_Origin" class="ew-search-caption ew-label"><?= $Page->Origin->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Origin" id="z_Origin" value="LIKE">
</span>
        <span id="el_view_template_for_opu_Origin" class="ew-search-field">
<input type="<?= $Page->Origin->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Origin->getPlaceHolder()) ?>" value="<?= $Page->Origin->EditValue ?>"<?= $Page->Origin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Origin->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_FemaleIndications" class="ew-cell form-group">
        <label for="x_FemaleIndications" class="ew-search-caption ew-label"><?= $Page->FemaleIndications->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FemaleIndications" id="z_FemaleIndications" value="LIKE">
</span>
        <span id="el_view_template_for_opu_FemaleIndications" class="ew-search-field">
<input type="<?= $Page->FemaleIndications->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_FemaleIndications" name="x_FemaleIndications" id="x_FemaleIndications" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FemaleIndications->getPlaceHolder()) ?>" value="<?= $Page->FemaleIndications->EditValue ?>"<?= $Page->FemaleIndications->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FemaleIndications->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientName" class="ew-cell form-group">
        <label for="x_PatientName" class="ew-search-caption ew-label"><?= $Page->PatientName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        <span id="el_view_template_for_opu_PatientName" class="ew-search-field">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientID" class="ew-cell form-group">
        <label for="x_PatientID" class="ew-search-caption ew-label"><?= $Page->PatientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        <span id="el_view_template_for_opu_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PartnerName" class="ew-cell form-group">
        <label for="x_PartnerName" class="ew-search-caption ew-label"><?= $Page->PartnerName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        <span id="el_view_template_for_opu_PartnerName" class="ew-search-field">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PartnerID" class="ew-cell form-group">
        <label for="x_PartnerID" class="ew-search-caption ew-label"><?= $Page->PartnerID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
        <span id="el_view_template_for_opu_PartnerID" class="ew-search-field">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_A4ICSICycle" class="ew-cell form-group">
        <label for="x_A4ICSICycle" class="ew-search-caption ew-label"><?= $Page->A4ICSICycle->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_A4ICSICycle" id="z_A4ICSICycle" value="LIKE">
</span>
        <span id="el_view_template_for_opu_A4ICSICycle" class="ew-search-field">
<input type="<?= $Page->A4ICSICycle->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_A4ICSICycle" name="x_A4ICSICycle" id="x_A4ICSICycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A4ICSICycle->getPlaceHolder()) ?>" value="<?= $Page->A4ICSICycle->EditValue ?>"<?= $Page->A4ICSICycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A4ICSICycle->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TotalICSICycle" class="ew-cell form-group">
        <label for="x_TotalICSICycle" class="ew-search-caption ew-label"><?= $Page->TotalICSICycle->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TotalICSICycle" id="z_TotalICSICycle" value="LIKE">
</span>
        <span id="el_view_template_for_opu_TotalICSICycle" class="ew-search-field">
<input type="<?= $Page->TotalICSICycle->getInputTextType() ?>" data-table="view_template_for_opu" data-field="x_TotalICSICycle" name="x_TotalICSICycle" id="x_TotalICSICycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalICSICycle->getPlaceHolder()) ?>" value="<?= $Page->TotalICSICycle->EditValue ?>"<?= $Page->TotalICSICycle->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalICSICycle->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_template_for_opu">
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
<form name="fview_template_for_opulist" id="fview_template_for_opulist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_template_for_opu">
<div id="gmp_view_template_for_opu" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_template_for_opulist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_template_for_opu_id" class="view_template_for_opu_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_template_for_opu_RIDNO" class="view_template_for_opu_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_view_template_for_opu_Treatment" class="view_template_for_opu_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Page->Origin->headerCellClass() ?>"><div id="elh_view_template_for_opu_Origin" class="view_template_for_opu_Origin"><?= $Page->renderSort($Page->Origin) ?></div></th>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <th data-name="MaleIndications" class="<?= $Page->MaleIndications->headerCellClass() ?>"><div id="elh_view_template_for_opu_MaleIndications" class="view_template_for_opu_MaleIndications"><?= $Page->renderSort($Page->MaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <th data-name="FemaleIndications" class="<?= $Page->FemaleIndications->headerCellClass() ?>"><div id="elh_view_template_for_opu_FemaleIndications" class="view_template_for_opu_FemaleIndications"><?= $Page->renderSort($Page->FemaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientName" class="view_template_for_opu_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientID" class="view_template_for_opu_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerName" class="view_template_for_opu_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerID" class="view_template_for_opu_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <th data-name="A4ICSICycle" class="<?= $Page->A4ICSICycle->headerCellClass() ?>"><div id="elh_view_template_for_opu_A4ICSICycle" class="view_template_for_opu_A4ICSICycle"><?= $Page->renderSort($Page->A4ICSICycle) ?></div></th>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <th data-name="TotalICSICycle" class="<?= $Page->TotalICSICycle->headerCellClass() ?>"><div id="elh_view_template_for_opu_TotalICSICycle" class="view_template_for_opu_TotalICSICycle"><?= $Page->renderSort($Page->TotalICSICycle) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <th data-name="TypeOfInfertility" class="<?= $Page->TypeOfInfertility->headerCellClass() ?>"><div id="elh_view_template_for_opu_TypeOfInfertility" class="view_template_for_opu_TypeOfInfertility"><?= $Page->renderSort($Page->TypeOfInfertility) ?></div></th>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <th data-name="RelevantHistory" class="<?= $Page->RelevantHistory->headerCellClass() ?>"><div id="elh_view_template_for_opu_RelevantHistory" class="view_template_for_opu_RelevantHistory"><?= $Page->renderSort($Page->RelevantHistory) ?></div></th>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <th data-name="IUICycles" class="<?= $Page->IUICycles->headerCellClass() ?>"><div id="elh_view_template_for_opu_IUICycles" class="view_template_for_opu_IUICycles"><?= $Page->renderSort($Page->IUICycles) ?></div></th>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
        <th data-name="AMH" class="<?= $Page->AMH->headerCellClass() ?>"><div id="elh_view_template_for_opu_AMH" class="view_template_for_opu_AMH"><?= $Page->renderSort($Page->AMH) ?></div></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th data-name="FBMI" class="<?= $Page->FBMI->headerCellClass() ?>"><div id="elh_view_template_for_opu_FBMI" class="view_template_for_opu_FBMI"><?= $Page->renderSort($Page->FBMI) ?></div></th>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <th data-name="ANTAGONISTSTARTDAY" class="<?= $Page->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div id="elh_view_template_for_opu_ANTAGONISTSTARTDAY" class="view_template_for_opu_ANTAGONISTSTARTDAY"><?= $Page->renderSort($Page->ANTAGONISTSTARTDAY) ?></div></th>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <th data-name="OvarianSurgery" class="<?= $Page->OvarianSurgery->headerCellClass() ?>"><div id="elh_view_template_for_opu_OvarianSurgery" class="view_template_for_opu_OvarianSurgery"><?= $Page->renderSort($Page->OvarianSurgery) ?></div></th>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <th data-name="OPUDATE" class="<?= $Page->OPUDATE->headerCellClass() ?>"><div id="elh_view_template_for_opu_OPUDATE" class="view_template_for_opu_OPUDATE"><?= $Page->renderSort($Page->OPUDATE) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <th data-name="RFSH1" class="<?= $Page->RFSH1->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH1" class="view_template_for_opu_RFSH1"><?= $Page->renderSort($Page->RFSH1) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <th data-name="RFSH2" class="<?= $Page->RFSH2->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH2" class="view_template_for_opu_RFSH2"><?= $Page->renderSort($Page->RFSH2) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <th data-name="RFSH3" class="<?= $Page->RFSH3->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH3" class="view_template_for_opu_RFSH3"><?= $Page->renderSort($Page->RFSH3) ?></div></th>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
        <th data-name="E21" class="<?= $Page->E21->headerCellClass() ?>"><div id="elh_view_template_for_opu_E21" class="view_template_for_opu_E21"><?= $Page->renderSort($Page->E21) ?></div></th>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <th data-name="Hysteroscopy" class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><div id="elh_view_template_for_opu_Hysteroscopy" class="view_template_for_opu_Hysteroscopy"><?= $Page->renderSort($Page->Hysteroscopy) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_template_for_opu_HospID" class="view_template_for_opu_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
        <th data-name="Fweight" class="<?= $Page->Fweight->headerCellClass() ?>"><div id="elh_view_template_for_opu_Fweight" class="view_template_for_opu_Fweight"><?= $Page->renderSort($Page->Fweight) ?></div></th>
<?php } ?>
<?php if ($Page->AntiTPO->Visible) { // AntiTPO ?>
        <th data-name="AntiTPO" class="<?= $Page->AntiTPO->headerCellClass() ?>"><div id="elh_view_template_for_opu_AntiTPO" class="view_template_for_opu_AntiTPO"><?= $Page->renderSort($Page->AntiTPO) ?></div></th>
<?php } ?>
<?php if ($Page->AntiTG->Visible) { // AntiTG ?>
        <th data-name="AntiTG" class="<?= $Page->AntiTG->headerCellClass() ?>"><div id="elh_view_template_for_opu_AntiTG" class="view_template_for_opu_AntiTG"><?= $Page->renderSort($Page->AntiTG) ?></div></th>
<?php } ?>
<?php if ($Page->PatientAge->Visible) { // PatientAge ?>
        <th data-name="PatientAge" class="<?= $Page->PatientAge->headerCellClass() ?>"><div id="elh_view_template_for_opu_PatientAge" class="view_template_for_opu_PatientAge"><?= $Page->renderSort($Page->PatientAge) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerAge->Visible) { // PartnerAge ?>
        <th data-name="PartnerAge" class="<?= $Page->PartnerAge->headerCellClass() ?>"><div id="elh_view_template_for_opu_PartnerAge" class="view_template_for_opu_PartnerAge"><?= $Page->renderSort($Page->PartnerAge) ?></div></th>
<?php } ?>
<?php if ($Page->ROVARY->Visible) { // R.OVARY ?>
        <th data-name="ROVARY" class="<?= $Page->ROVARY->headerCellClass() ?>"><div id="elh_view_template_for_opu_ROVARY" class="view_template_for_opu_ROVARY"><?= $Page->renderSort($Page->ROVARY) ?></div></th>
<?php } ?>
<?php if ($Page->RAFC->Visible) { // R.AFC ?>
        <th data-name="RAFC" class="<?= $Page->RAFC->headerCellClass() ?>"><div id="elh_view_template_for_opu_RAFC" class="view_template_for_opu_RAFC"><?= $Page->renderSort($Page->RAFC) ?></div></th>
<?php } ?>
<?php if ($Page->LOVARY->Visible) { // L.OVARY ?>
        <th data-name="LOVARY" class="<?= $Page->LOVARY->headerCellClass() ?>"><div id="elh_view_template_for_opu_LOVARY" class="view_template_for_opu_LOVARY"><?= $Page->renderSort($Page->LOVARY) ?></div></th>
<?php } ?>
<?php if ($Page->LAFC->Visible) { // L.AFC ?>
        <th data-name="LAFC" class="<?= $Page->LAFC->headerCellClass() ?>"><div id="elh_view_template_for_opu_LAFC" class="view_template_for_opu_LAFC"><?= $Page->renderSort($Page->LAFC) ?></div></th>
<?php } ?>
<?php if ($Page->E2->Visible) { // E2 ?>
        <th data-name="E2" class="<?= $Page->E2->headerCellClass() ?>"><div id="elh_view_template_for_opu_E2" class="view_template_for_opu_E2"><?= $Page->renderSort($Page->E2) ?></div></th>
<?php } ?>
<?php if ($Page->AMH1->Visible) { // AMH1 ?>
        <th data-name="AMH1" class="<?= $Page->AMH1->headerCellClass() ?>"><div id="elh_view_template_for_opu_AMH1" class="view_template_for_opu_AMH1"><?= $Page->renderSort($Page->AMH1) ?></div></th>
<?php } ?>
<?php if ($Page->BMIMALE->Visible) { // BMI(MALE) ?>
        <th data-name="BMIMALE" class="<?= $Page->BMIMALE->headerCellClass() ?>"><div id="elh_view_template_for_opu_BMIMALE" class="view_template_for_opu_BMIMALE"><?= $Page->renderSort($Page->BMIMALE) ?></div></th>
<?php } ?>
<?php if ($Page->MaleMedicalConditions->Visible) { // MaleMedicalConditions ?>
        <th data-name="MaleMedicalConditions" class="<?= $Page->MaleMedicalConditions->headerCellClass() ?>"><div id="elh_view_template_for_opu_MaleMedicalConditions" class="view_template_for_opu_MaleMedicalConditions"><?= $Page->renderSort($Page->MaleMedicalConditions) ?></div></th>
<?php } ?>
<?php if ($Page->CC100->Visible) { // CC 100 ?>
        <th data-name="CC100" class="<?= $Page->CC100->headerCellClass() ?>"><div id="elh_view_template_for_opu_CC100" class="view_template_for_opu_CC100"><?= $Page->renderSort($Page->CC100) ?></div></th>
<?php } ?>
<?php if ($Page->RFSH1A->Visible) { // RFSH1A ?>
        <th data-name="RFSH1A" class="<?= $Page->RFSH1A->headerCellClass() ?>"><div id="elh_view_template_for_opu_RFSH1A" class="view_template_for_opu_RFSH1A"><?= $Page->renderSort($Page->RFSH1A) ?></div></th>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <th data-name="HMG1" class="<?= $Page->HMG1->headerCellClass() ?>"><div id="elh_view_template_for_opu_HMG1" class="view_template_for_opu_HMG1"><?= $Page->renderSort($Page->HMG1) ?></div></th>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <th data-name="DAYSOFSTIMULATION" class="<?= $Page->DAYSOFSTIMULATION->headerCellClass() ?>"><div id="elh_view_template_for_opu_DAYSOFSTIMULATION" class="view_template_for_opu_DAYSOFSTIMULATION"><?= $Page->renderSort($Page->DAYSOFSTIMULATION) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <th data-name="TRIGGERR" class="<?= $Page->TRIGGERR->headerCellClass() ?>"><div id="elh_view_template_for_opu_TRIGGERR" class="view_template_for_opu_TRIGGERR"><?= $Page->renderSort($Page->TRIGGERR) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_template_for_opu", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <td data-name="MaleIndications" <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <td data-name="FemaleIndications" <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <td data-name="A4ICSICycle" <?= $Page->A4ICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_A4ICSICycle">
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <td data-name="TotalICSICycle" <?= $Page->TotalICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_TotalICSICycle">
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <td data-name="TypeOfInfertility" <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_TypeOfInfertility">
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <td data-name="RelevantHistory" <?= $Page->RelevantHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RelevantHistory">
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <td data-name="IUICycles" <?= $Page->IUICycles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_IUICycles">
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMH->Visible) { // AMH ?>
        <td data-name="AMH" <?= $Page->AMH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_AMH">
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <td data-name="ANTAGONISTSTARTDAY" <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_ANTAGONISTSTARTDAY">
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <td data-name="OvarianSurgery" <?= $Page->OvarianSurgery->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_OvarianSurgery">
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <td data-name="OPUDATE" <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <td data-name="RFSH1" <?= $Page->RFSH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RFSH1">
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <td data-name="RFSH2" <?= $Page->RFSH2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RFSH2">
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <td data-name="RFSH3" <?= $Page->RFSH3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RFSH3">
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E21->Visible) { // E21 ?>
        <td data-name="E21" <?= $Page->E21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_E21">
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fweight->Visible) { // Fweight ?>
        <td data-name="Fweight" <?= $Page->Fweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AntiTPO->Visible) { // AntiTPO ?>
        <td data-name="AntiTPO" <?= $Page->AntiTPO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_AntiTPO">
<span<?= $Page->AntiTPO->viewAttributes() ?>>
<?= $Page->AntiTPO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AntiTG->Visible) { // AntiTG ?>
        <td data-name="AntiTG" <?= $Page->AntiTG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_AntiTG">
<span<?= $Page->AntiTG->viewAttributes() ?>>
<?= $Page->AntiTG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientAge->Visible) { // PatientAge ?>
        <td data-name="PatientAge" <?= $Page->PatientAge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PatientAge">
<span<?= $Page->PatientAge->viewAttributes() ?>>
<?= $Page->PatientAge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerAge->Visible) { // PartnerAge ?>
        <td data-name="PartnerAge" <?= $Page->PartnerAge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_PartnerAge">
<span<?= $Page->PartnerAge->viewAttributes() ?>>
<?= $Page->PartnerAge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ROVARY->Visible) { // R.OVARY ?>
        <td data-name="ROVARY" <?= $Page->ROVARY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_ROVARY">
<span<?= $Page->ROVARY->viewAttributes() ?>>
<?= $Page->ROVARY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RAFC->Visible) { // R.AFC ?>
        <td data-name="RAFC" <?= $Page->RAFC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RAFC">
<span<?= $Page->RAFC->viewAttributes() ?>>
<?= $Page->RAFC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LOVARY->Visible) { // L.OVARY ?>
        <td data-name="LOVARY" <?= $Page->LOVARY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_LOVARY">
<span<?= $Page->LOVARY->viewAttributes() ?>>
<?= $Page->LOVARY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LAFC->Visible) { // L.AFC ?>
        <td data-name="LAFC" <?= $Page->LAFC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_LAFC">
<span<?= $Page->LAFC->viewAttributes() ?>>
<?= $Page->LAFC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->E2->Visible) { // E2 ?>
        <td data-name="E2" <?= $Page->E2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_E2">
<span<?= $Page->E2->viewAttributes() ?>>
<?= $Page->E2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMH1->Visible) { // AMH1 ?>
        <td data-name="AMH1" <?= $Page->AMH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_AMH1">
<span<?= $Page->AMH1->viewAttributes() ?>>
<?= $Page->AMH1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BMIMALE->Visible) { // BMI(MALE) ?>
        <td data-name="BMIMALE" <?= $Page->BMIMALE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_BMIMALE">
<span<?= $Page->BMIMALE->viewAttributes() ?>>
<?= $Page->BMIMALE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleMedicalConditions->Visible) { // MaleMedicalConditions ?>
        <td data-name="MaleMedicalConditions" <?= $Page->MaleMedicalConditions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_MaleMedicalConditions">
<span<?= $Page->MaleMedicalConditions->viewAttributes() ?>>
<?= $Page->MaleMedicalConditions->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CC100->Visible) { // CC 100 ?>
        <td data-name="CC100" <?= $Page->CC100->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_CC100">
<span<?= $Page->CC100->viewAttributes() ?>>
<?= $Page->CC100->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RFSH1A->Visible) { // RFSH1A ?>
        <td data-name="RFSH1A" <?= $Page->RFSH1A->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_RFSH1A">
<span<?= $Page->RFSH1A->viewAttributes() ?>>
<?= $Page->RFSH1A->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <td data-name="HMG1" <?= $Page->HMG1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_HMG1">
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <td data-name="DAYSOFSTIMULATION" <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_DAYSOFSTIMULATION">
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_for_opu_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
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
    ew.addEventHandlers("view_template_for_opu");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
