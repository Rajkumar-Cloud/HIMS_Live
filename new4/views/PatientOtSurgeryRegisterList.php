<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtSurgeryRegisterList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_ot_surgery_registerlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_ot_surgery_registerlist = currentForm = new ew.Form("fpatient_ot_surgery_registerlist", "list");
    fpatient_ot_surgery_registerlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatient_ot_surgery_registerlist");
});
var fpatient_ot_surgery_registerlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_ot_surgery_registerlistsrch = currentSearchForm = new ew.Form("fpatient_ot_surgery_registerlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_ot_surgery_register")) ?>,
        fields = currentTable.fields;
    fpatient_ot_surgery_registerlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["RecievedTime", [], fields.RecievedTime.isInvalid],
        ["AnaesthesiaStarted", [], fields.AnaesthesiaStarted.isInvalid],
        ["AnaesthesiaEnded", [], fields.AnaesthesiaEnded.isInvalid],
        ["surgeryStarted", [], fields.surgeryStarted.isInvalid],
        ["surgeryEnded", [], fields.surgeryEnded.isInvalid],
        ["RecoveryTime", [], fields.RecoveryTime.isInvalid],
        ["ShiftedTime", [], fields.ShiftedTime.isInvalid],
        ["Duration", [], fields.Duration.isInvalid],
        ["Surgeon", [], fields.Surgeon.isInvalid],
        ["Anaesthetist", [], fields.Anaesthetist.isInvalid],
        ["AsstSurgeon1", [], fields.AsstSurgeon1.isInvalid],
        ["AsstSurgeon2", [], fields.AsstSurgeon2.isInvalid],
        ["paediatric", [], fields.paediatric.isInvalid],
        ["ScrubNurse1", [], fields.ScrubNurse1.isInvalid],
        ["ScrubNurse2", [], fields.ScrubNurse2.isInvalid],
        ["FloorNurse", [], fields.FloorNurse.isInvalid],
        ["Technician", [], fields.Technician.isInvalid],
        ["HouseKeeping", [], fields.HouseKeeping.isInvalid],
        ["countsCheckedMops", [], fields.countsCheckedMops.isInvalid],
        ["gauze", [], fields.gauze.isInvalid],
        ["needles", [], fields.needles.isInvalid],
        ["bloodloss", [], fields.bloodloss.isInvalid],
        ["bloodtransfusion", [], fields.bloodtransfusion.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Reception", [], fields.Reception.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PId", [], fields.PId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_ot_surgery_registerlistsrch.setInvalid();
    });

    // Validate form
    fpatient_ot_surgery_registerlistsrch.validate = function () {
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
    fpatient_ot_surgery_registerlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_surgery_registerlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fpatient_ot_surgery_registerlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_ot_surgery_registerlistsrch");
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
<form name="fpatient_ot_surgery_registerlistsrch" id="fpatient_ot_surgery_registerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpatient_ot_surgery_registerlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_ot_surgery_register">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_mrnno" class="ew-cell form-group">
        <label for="x_mrnno" class="ew-search-caption ew-label"><?= $Page->mrnno->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        <span id="el_patient_ot_surgery_register_mrnno" class="ew-search-field">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createddatetime" class="ew-cell form-group">
        <label for="x_createddatetime" class="ew-search-caption ew-label"><?= $Page->createddatetime->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_patient_ot_surgery_register_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registerlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registerlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_patient_ot_surgery_register_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registerlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registerlistsrch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_surgery_register">
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
<form name="fpatient_ot_surgery_registerlist" id="fpatient_ot_surgery_registerlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PId->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_ot_surgery_register" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_ot_surgery_registerlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_id" class="patient_ot_surgery_register_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_PatID" class="patient_ot_surgery_register_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_register_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_register_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_register_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Age" class="patient_ot_surgery_register_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Gender" class="patient_ot_surgery_register_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <th data-name="RecievedTime" class="<?= $Page->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_register_RecievedTime"><?= $Page->renderSort($Page->RecievedTime) ?></div></th>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <th data-name="AnaesthesiaStarted" class="<?= $Page->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_register_AnaesthesiaStarted"><?= $Page->renderSort($Page->AnaesthesiaStarted) ?></div></th>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <th data-name="AnaesthesiaEnded" class="<?= $Page->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_register_AnaesthesiaEnded"><?= $Page->renderSort($Page->AnaesthesiaEnded) ?></div></th>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <th data-name="surgeryStarted" class="<?= $Page->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_register_surgeryStarted"><?= $Page->renderSort($Page->surgeryStarted) ?></div></th>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <th data-name="surgeryEnded" class="<?= $Page->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_register_surgeryEnded"><?= $Page->renderSort($Page->surgeryEnded) ?></div></th>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <th data-name="RecoveryTime" class="<?= $Page->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_register_RecoveryTime"><?= $Page->renderSort($Page->RecoveryTime) ?></div></th>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <th data-name="ShiftedTime" class="<?= $Page->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_register_ShiftedTime"><?= $Page->renderSort($Page->ShiftedTime) ?></div></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th data-name="Duration" class="<?= $Page->Duration->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Duration" class="patient_ot_surgery_register_Duration"><?= $Page->renderSort($Page->Duration) ?></div></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Page->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_register_Surgeon"><?= $Page->renderSort($Page->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <th data-name="Anaesthetist" class="<?= $Page->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_register_Anaesthetist"><?= $Page->renderSort($Page->Anaesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <th data-name="AsstSurgeon1" class="<?= $Page->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_register_AsstSurgeon1"><?= $Page->renderSort($Page->AsstSurgeon1) ?></div></th>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <th data-name="AsstSurgeon2" class="<?= $Page->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_register_AsstSurgeon2"><?= $Page->renderSort($Page->AsstSurgeon2) ?></div></th>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
        <th data-name="paediatric" class="<?= $Page->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_register_paediatric"><?= $Page->renderSort($Page->paediatric) ?></div></th>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <th data-name="ScrubNurse1" class="<?= $Page->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_register_ScrubNurse1"><?= $Page->renderSort($Page->ScrubNurse1) ?></div></th>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <th data-name="ScrubNurse2" class="<?= $Page->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_register_ScrubNurse2"><?= $Page->renderSort($Page->ScrubNurse2) ?></div></th>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <th data-name="FloorNurse" class="<?= $Page->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_register_FloorNurse"><?= $Page->renderSort($Page->FloorNurse) ?></div></th>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
        <th data-name="Technician" class="<?= $Page->Technician->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Technician" class="patient_ot_surgery_register_Technician"><?= $Page->renderSort($Page->Technician) ?></div></th>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <th data-name="HouseKeeping" class="<?= $Page->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_register_HouseKeeping"><?= $Page->renderSort($Page->HouseKeeping) ?></div></th>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <th data-name="countsCheckedMops" class="<?= $Page->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_register_countsCheckedMops"><?= $Page->renderSort($Page->countsCheckedMops) ?></div></th>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
        <th data-name="gauze" class="<?= $Page->gauze->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_gauze" class="patient_ot_surgery_register_gauze"><?= $Page->renderSort($Page->gauze) ?></div></th>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
        <th data-name="needles" class="<?= $Page->needles->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_needles" class="patient_ot_surgery_register_needles"><?= $Page->renderSort($Page->needles) ?></div></th>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <th data-name="bloodloss" class="<?= $Page->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_register_bloodloss"><?= $Page->renderSort($Page->bloodloss) ?></div></th>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <th data-name="bloodtransfusion" class="<?= $Page->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_register_bloodtransfusion"><?= $Page->renderSort($Page->bloodtransfusion) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_status" class="patient_ot_surgery_register_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_createdby" class="patient_ot_surgery_register_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_register_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_register_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_register_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_HospID" class="patient_ot_surgery_register_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_Reception" class="patient_ot_surgery_register_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_register_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Page->PId->headerCellClass() ?>"><div id="elh_patient_ot_surgery_register_PId" class="patient_ot_surgery_register_PId"><?= $Page->renderSort($Page->PId) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_ot_surgery_register", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <td data-name="RecievedTime" <?= $Page->RecievedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_RecievedTime">
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <td data-name="AnaesthesiaStarted" <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_AnaesthesiaStarted">
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <td data-name="AnaesthesiaEnded" <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_AnaesthesiaEnded">
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <td data-name="surgeryStarted" <?= $Page->surgeryStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_surgeryStarted">
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <td data-name="surgeryEnded" <?= $Page->surgeryEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_surgeryEnded">
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <td data-name="RecoveryTime" <?= $Page->RecoveryTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_RecoveryTime">
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <td data-name="ShiftedTime" <?= $Page->ShiftedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_ShiftedTime">
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Duration->Visible) { // Duration ?>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <td data-name="AsstSurgeon1" <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_AsstSurgeon1">
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <td data-name="AsstSurgeon2" <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_AsstSurgeon2">
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->paediatric->Visible) { // paediatric ?>
        <td data-name="paediatric" <?= $Page->paediatric->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_paediatric">
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <td data-name="ScrubNurse1" <?= $Page->ScrubNurse1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_ScrubNurse1">
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <td data-name="ScrubNurse2" <?= $Page->ScrubNurse2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_ScrubNurse2">
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <td data-name="FloorNurse" <?= $Page->FloorNurse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_FloorNurse">
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Technician->Visible) { // Technician ?>
        <td data-name="Technician" <?= $Page->Technician->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Technician">
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <td data-name="HouseKeeping" <?= $Page->HouseKeeping->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_HouseKeeping">
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <td data-name="countsCheckedMops" <?= $Page->countsCheckedMops->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_countsCheckedMops">
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gauze->Visible) { // gauze ?>
        <td data-name="gauze" <?= $Page->gauze->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_gauze">
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->needles->Visible) { // needles ?>
        <td data-name="needles" <?= $Page->needles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_needles">
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <td data-name="bloodloss" <?= $Page->bloodloss->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_bloodloss">
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <td data-name="bloodtransfusion" <?= $Page->bloodtransfusion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_bloodtransfusion">
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_surgery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
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
    ew.addEventHandlers("patient_ot_surgery_register");
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
        container: "gmp_patient_ot_surgery_register",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
