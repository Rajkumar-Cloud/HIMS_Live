<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtDeliveryRegisterList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registerlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_ot_delivery_registerlist = currentForm = new ew.Form("fpatient_ot_delivery_registerlist", "list");
    fpatient_ot_delivery_registerlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatient_ot_delivery_registerlist");
});
var fpatient_ot_delivery_registerlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_ot_delivery_registerlistsrch = currentSearchForm = new ew.Form("fpatient_ot_delivery_registerlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_ot_delivery_register")) ?>,
        fields = currentTable.fields;
    fpatient_ot_delivery_registerlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["ObstetricsHistryFeMale", [], fields.ObstetricsHistryFeMale.isInvalid],
        ["Abortion", [], fields.Abortion.isInvalid],
        ["ChildBirthDate", [], fields.ChildBirthDate.isInvalid],
        ["ChildBirthTime", [], fields.ChildBirthTime.isInvalid],
        ["ChildSex", [], fields.ChildSex.isInvalid],
        ["ChildWt", [], fields.ChildWt.isInvalid],
        ["ChildDay", [], fields.ChildDay.isInvalid],
        ["ChildOE", [], fields.ChildOE.isInvalid],
        ["ChildBlGrp", [], fields.ChildBlGrp.isInvalid],
        ["ApgarScore", [], fields.ApgarScore.isInvalid],
        ["birthnotification", [], fields.birthnotification.isInvalid],
        ["formno", [], fields.formno.isInvalid],
        ["dte", [ew.Validators.datetime(0)], fields.dte.isInvalid],
        ["y_dte", [ew.Validators.between], false],
        ["motherReligion", [], fields.motherReligion.isInvalid],
        ["bloodgroup", [], fields.bloodgroup.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [], fields.modifieddatetime.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["ChildBirthDate1", [], fields.ChildBirthDate1.isInvalid],
        ["ChildBirthTime1", [], fields.ChildBirthTime1.isInvalid],
        ["ChildSex1", [], fields.ChildSex1.isInvalid],
        ["ChildWt1", [], fields.ChildWt1.isInvalid],
        ["ChildDay1", [], fields.ChildDay1.isInvalid],
        ["ChildOE1", [], fields.ChildOE1.isInvalid],
        ["ChildBlGrp1", [], fields.ChildBlGrp1.isInvalid],
        ["ApgarScore1", [], fields.ApgarScore1.isInvalid],
        ["birthnotification1", [], fields.birthnotification1.isInvalid],
        ["formno1", [], fields.formno1.isInvalid],
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
        ["Reception", [], fields.Reception.isInvalid],
        ["PId", [], fields.PId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_ot_delivery_registerlistsrch.setInvalid();
    });

    // Validate form
    fpatient_ot_delivery_registerlistsrch.validate = function () {
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
    fpatient_ot_delivery_registerlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_delivery_registerlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fpatient_ot_delivery_registerlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_ot_delivery_registerlistsrch");
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
<form name="fpatient_ot_delivery_registerlistsrch" id="fpatient_ot_delivery_registerlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpatient_ot_delivery_registerlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_ot_delivery_register">
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
        <span id="el_patient_ot_delivery_register_mrnno" class="ew-search-field">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_dte" class="ew-cell form-group">
        <label for="x_dte" class="ew-search-caption ew-label"><?= $Page->dte->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_dte" id="z_dte" value="BETWEEN">
</span>
        <span id="el_patient_ot_delivery_register_dte" class="ew-search-field">
<input type="<?= $Page->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?= HtmlEncode($Page->dte->getPlaceHolder()) ?>" value="<?= $Page->dte->EditValue ?>"<?= $Page->dte->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->dte->getErrorMessage(false) ?></div>
<?php if (!$Page->dte->ReadOnly && !$Page->dte->Disabled && !isset($Page->dte->EditAttrs["readonly"]) && !isset($Page->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registerlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_patient_ot_delivery_register_dte" class="ew-search-field2">
<input type="<?= $Page->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="y_dte" id="y_dte" placeholder="<?= HtmlEncode($Page->dte->getPlaceHolder()) ?>" value="<?= $Page->dte->EditValue2 ?>"<?= $Page->dte->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->dte->getErrorMessage(false) ?></div>
<?php if (!$Page->dte->ReadOnly && !$Page->dte->Disabled && !isset($Page->dte->EditAttrs["readonly"]) && !isset($Page->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registerlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registerlistsrch", "y_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
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
<form name="fpatient_ot_delivery_registerlist" id="fpatient_ot_delivery_registerlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PId->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_ot_delivery_register" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patient_ot_delivery_registerlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <th data-name="ObstetricsHistryFeMale" class="<?= $Page->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><?= $Page->renderSort($Page->ObstetricsHistryFeMale) ?></div></th>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
        <th data-name="Abortion" class="<?= $Page->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><?= $Page->renderSort($Page->Abortion) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <th data-name="ChildBirthDate" class="<?= $Page->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><?= $Page->renderSort($Page->ChildBirthDate) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <th data-name="ChildBirthTime" class="<?= $Page->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><?= $Page->renderSort($Page->ChildBirthTime) ?></div></th>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
        <th data-name="ChildSex" class="<?= $Page->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><?= $Page->renderSort($Page->ChildSex) ?></div></th>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
        <th data-name="ChildWt" class="<?= $Page->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><?= $Page->renderSort($Page->ChildWt) ?></div></th>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
        <th data-name="ChildDay" class="<?= $Page->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><?= $Page->renderSort($Page->ChildDay) ?></div></th>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
        <th data-name="ChildOE" class="<?= $Page->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><?= $Page->renderSort($Page->ChildOE) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <th data-name="ChildBlGrp" class="<?= $Page->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><?= $Page->renderSort($Page->ChildBlGrp) ?></div></th>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
        <th data-name="ApgarScore" class="<?= $Page->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><?= $Page->renderSort($Page->ApgarScore) ?></div></th>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
        <th data-name="birthnotification" class="<?= $Page->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><?= $Page->renderSort($Page->birthnotification) ?></div></th>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
        <th data-name="formno" class="<?= $Page->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><?= $Page->renderSort($Page->formno) ?></div></th>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
        <th data-name="dte" class="<?= $Page->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><?= $Page->renderSort($Page->dte) ?></div></th>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
        <th data-name="motherReligion" class="<?= $Page->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><?= $Page->renderSort($Page->motherReligion) ?></div></th>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
        <th data-name="bloodgroup" class="<?= $Page->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><?= $Page->renderSort($Page->bloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <th data-name="ChildBirthDate1" class="<?= $Page->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><?= $Page->renderSort($Page->ChildBirthDate1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <th data-name="ChildBirthTime1" class="<?= $Page->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><?= $Page->renderSort($Page->ChildBirthTime1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
        <th data-name="ChildSex1" class="<?= $Page->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><?= $Page->renderSort($Page->ChildSex1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
        <th data-name="ChildWt1" class="<?= $Page->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><?= $Page->renderSort($Page->ChildWt1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
        <th data-name="ChildDay1" class="<?= $Page->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><?= $Page->renderSort($Page->ChildDay1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
        <th data-name="ChildOE1" class="<?= $Page->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><?= $Page->renderSort($Page->ChildOE1) ?></div></th>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <th data-name="ChildBlGrp1" class="<?= $Page->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><?= $Page->renderSort($Page->ChildBlGrp1) ?></div></th>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
        <th data-name="ApgarScore1" class="<?= $Page->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><?= $Page->renderSort($Page->ApgarScore1) ?></div></th>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
        <th data-name="birthnotification1" class="<?= $Page->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><?= $Page->renderSort($Page->birthnotification1) ?></div></th>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
        <th data-name="formno1" class="<?= $Page->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><?= $Page->renderSort($Page->formno1) ?></div></th>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <th data-name="RecievedTime" class="<?= $Page->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><?= $Page->renderSort($Page->RecievedTime) ?></div></th>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <th data-name="AnaesthesiaStarted" class="<?= $Page->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><?= $Page->renderSort($Page->AnaesthesiaStarted) ?></div></th>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <th data-name="AnaesthesiaEnded" class="<?= $Page->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><?= $Page->renderSort($Page->AnaesthesiaEnded) ?></div></th>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <th data-name="surgeryStarted" class="<?= $Page->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><?= $Page->renderSort($Page->surgeryStarted) ?></div></th>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <th data-name="surgeryEnded" class="<?= $Page->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><?= $Page->renderSort($Page->surgeryEnded) ?></div></th>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <th data-name="RecoveryTime" class="<?= $Page->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><?= $Page->renderSort($Page->RecoveryTime) ?></div></th>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <th data-name="ShiftedTime" class="<?= $Page->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><?= $Page->renderSort($Page->ShiftedTime) ?></div></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th data-name="Duration" class="<?= $Page->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><?= $Page->renderSort($Page->Duration) ?></div></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Page->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><?= $Page->renderSort($Page->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <th data-name="Anaesthetist" class="<?= $Page->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><?= $Page->renderSort($Page->Anaesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <th data-name="AsstSurgeon1" class="<?= $Page->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><?= $Page->renderSort($Page->AsstSurgeon1) ?></div></th>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <th data-name="AsstSurgeon2" class="<?= $Page->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><?= $Page->renderSort($Page->AsstSurgeon2) ?></div></th>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
        <th data-name="paediatric" class="<?= $Page->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><?= $Page->renderSort($Page->paediatric) ?></div></th>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <th data-name="ScrubNurse1" class="<?= $Page->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><?= $Page->renderSort($Page->ScrubNurse1) ?></div></th>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <th data-name="ScrubNurse2" class="<?= $Page->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><?= $Page->renderSort($Page->ScrubNurse2) ?></div></th>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <th data-name="FloorNurse" class="<?= $Page->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><?= $Page->renderSort($Page->FloorNurse) ?></div></th>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
        <th data-name="Technician" class="<?= $Page->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><?= $Page->renderSort($Page->Technician) ?></div></th>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <th data-name="HouseKeeping" class="<?= $Page->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><?= $Page->renderSort($Page->HouseKeeping) ?></div></th>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <th data-name="countsCheckedMops" class="<?= $Page->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><?= $Page->renderSort($Page->countsCheckedMops) ?></div></th>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
        <th data-name="gauze" class="<?= $Page->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><?= $Page->renderSort($Page->gauze) ?></div></th>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
        <th data-name="needles" class="<?= $Page->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><?= $Page->renderSort($Page->needles) ?></div></th>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <th data-name="bloodloss" class="<?= $Page->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><?= $Page->renderSort($Page->bloodloss) ?></div></th>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <th data-name="bloodtransfusion" class="<?= $Page->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><?= $Page->renderSort($Page->bloodtransfusion) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Page->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><?= $Page->renderSort($Page->PId) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_ot_delivery_register", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <td data-name="ObstetricsHistryFeMale" <?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?= $Page->ObstetricsHistryFeMale->viewAttributes() ?>>
<?= $Page->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abortion->Visible) { // Abortion ?>
        <td data-name="Abortion" <?= $Page->Abortion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Abortion">
<span<?= $Page->Abortion->viewAttributes() ?>>
<?= $Page->Abortion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <td data-name="ChildBirthDate" <?= $Page->ChildBirthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthDate">
<span<?= $Page->ChildBirthDate->viewAttributes() ?>>
<?= $Page->ChildBirthDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <td data-name="ChildBirthTime" <?= $Page->ChildBirthTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthTime">
<span<?= $Page->ChildBirthTime->viewAttributes() ?>>
<?= $Page->ChildBirthTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildSex->Visible) { // ChildSex ?>
        <td data-name="ChildSex" <?= $Page->ChildSex->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildSex">
<span<?= $Page->ChildSex->viewAttributes() ?>>
<?= $Page->ChildSex->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildWt->Visible) { // ChildWt ?>
        <td data-name="ChildWt" <?= $Page->ChildWt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildWt">
<span<?= $Page->ChildWt->viewAttributes() ?>>
<?= $Page->ChildWt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildDay->Visible) { // ChildDay ?>
        <td data-name="ChildDay" <?= $Page->ChildDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildDay">
<span<?= $Page->ChildDay->viewAttributes() ?>>
<?= $Page->ChildDay->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildOE->Visible) { // ChildOE ?>
        <td data-name="ChildOE" <?= $Page->ChildOE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildOE">
<span<?= $Page->ChildOE->viewAttributes() ?>>
<?= $Page->ChildOE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <td data-name="ChildBlGrp" <?= $Page->ChildBlGrp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBlGrp">
<span<?= $Page->ChildBlGrp->viewAttributes() ?>>
<?= $Page->ChildBlGrp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
        <td data-name="ApgarScore" <?= $Page->ApgarScore->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ApgarScore">
<span<?= $Page->ApgarScore->viewAttributes() ?>>
<?= $Page->ApgarScore->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->birthnotification->Visible) { // birthnotification ?>
        <td data-name="birthnotification" <?= $Page->birthnotification->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_birthnotification">
<span<?= $Page->birthnotification->viewAttributes() ?>>
<?= $Page->birthnotification->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->formno->Visible) { // formno ?>
        <td data-name="formno" <?= $Page->formno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_formno">
<span<?= $Page->formno->viewAttributes() ?>>
<?= $Page->formno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->dte->Visible) { // dte ?>
        <td data-name="dte" <?= $Page->dte->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_dte">
<span<?= $Page->dte->viewAttributes() ?>>
<?= $Page->dte->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->motherReligion->Visible) { // motherReligion ?>
        <td data-name="motherReligion" <?= $Page->motherReligion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_motherReligion">
<span<?= $Page->motherReligion->viewAttributes() ?>>
<?= $Page->motherReligion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
        <td data-name="bloodgroup" <?= $Page->bloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodgroup">
<span<?= $Page->bloodgroup->viewAttributes() ?>>
<?= $Page->bloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <td data-name="ChildBirthDate1" <?= $Page->ChildBirthDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1">
<span<?= $Page->ChildBirthDate1->viewAttributes() ?>>
<?= $Page->ChildBirthDate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <td data-name="ChildBirthTime1" <?= $Page->ChildBirthTime1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1">
<span<?= $Page->ChildBirthTime1->viewAttributes() ?>>
<?= $Page->ChildBirthTime1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
        <td data-name="ChildSex1" <?= $Page->ChildSex1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildSex1">
<span<?= $Page->ChildSex1->viewAttributes() ?>>
<?= $Page->ChildSex1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
        <td data-name="ChildWt1" <?= $Page->ChildWt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildWt1">
<span<?= $Page->ChildWt1->viewAttributes() ?>>
<?= $Page->ChildWt1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
        <td data-name="ChildDay1" <?= $Page->ChildDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildDay1">
<span<?= $Page->ChildDay1->viewAttributes() ?>>
<?= $Page->ChildDay1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
        <td data-name="ChildOE1" <?= $Page->ChildOE1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildOE1">
<span<?= $Page->ChildOE1->viewAttributes() ?>>
<?= $Page->ChildOE1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <td data-name="ChildBlGrp1" <?= $Page->ChildBlGrp1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1">
<span<?= $Page->ChildBlGrp1->viewAttributes() ?>>
<?= $Page->ChildBlGrp1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
        <td data-name="ApgarScore1" <?= $Page->ApgarScore1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ApgarScore1">
<span<?= $Page->ApgarScore1->viewAttributes() ?>>
<?= $Page->ApgarScore1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
        <td data-name="birthnotification1" <?= $Page->birthnotification1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_birthnotification1">
<span<?= $Page->birthnotification1->viewAttributes() ?>>
<?= $Page->birthnotification1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->formno1->Visible) { // formno1 ?>
        <td data-name="formno1" <?= $Page->formno1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_formno1">
<span<?= $Page->formno1->viewAttributes() ?>>
<?= $Page->formno1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <td data-name="RecievedTime" <?= $Page->RecievedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_RecievedTime">
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <td data-name="AnaesthesiaStarted" <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <td data-name="AnaesthesiaEnded" <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <td data-name="surgeryStarted" <?= $Page->surgeryStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_surgeryStarted">
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <td data-name="surgeryEnded" <?= $Page->surgeryEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_surgeryEnded">
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <td data-name="RecoveryTime" <?= $Page->RecoveryTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_RecoveryTime">
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <td data-name="ShiftedTime" <?= $Page->ShiftedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ShiftedTime">
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Duration->Visible) { // Duration ?>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <td data-name="AsstSurgeon1" <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1">
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <td data-name="AsstSurgeon2" <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2">
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->paediatric->Visible) { // paediatric ?>
        <td data-name="paediatric" <?= $Page->paediatric->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_paediatric">
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <td data-name="ScrubNurse1" <?= $Page->ScrubNurse1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ScrubNurse1">
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <td data-name="ScrubNurse2" <?= $Page->ScrubNurse2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ScrubNurse2">
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <td data-name="FloorNurse" <?= $Page->FloorNurse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_FloorNurse">
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Technician->Visible) { // Technician ?>
        <td data-name="Technician" <?= $Page->Technician->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Technician">
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <td data-name="HouseKeeping" <?= $Page->HouseKeeping->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_HouseKeeping">
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <td data-name="countsCheckedMops" <?= $Page->countsCheckedMops->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_countsCheckedMops">
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gauze->Visible) { // gauze ?>
        <td data-name="gauze" <?= $Page->gauze->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_gauze">
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->needles->Visible) { // needles ?>
        <td data-name="needles" <?= $Page->needles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_needles">
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <td data-name="bloodloss" <?= $Page->bloodloss->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodloss">
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <td data-name="bloodtransfusion" <?= $Page->bloodtransfusion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodtransfusion">
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PId">
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
    ew.addEventHandlers("patient_ot_delivery_register");
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
        container: "gmp_patient_ot_delivery_register",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
