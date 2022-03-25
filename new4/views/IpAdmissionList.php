<?php

namespace PHPMaker2021\HIMS;

// Page object
$IpAdmissionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fip_admissionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fip_admissionlist = currentForm = new ew.Form("fip_admissionlist", "list");
    fip_admissionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fip_admissionlist");
});
var fip_admissionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fip_admissionlistsrch = currentSearchForm = new ew.Form("fip_admissionlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ip_admission")) ?>,
        fields = currentTable.fields;
    fip_admissionlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["mrnNo", [], fields.mrnNo.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["patient_name", [], fields.patient_name.isInvalid],
        ["mobileno", [], fields.mobileno.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["age", [], fields.age.isInvalid],
        ["typeRegsisteration", [], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [], fields.PaymentCategory.isInvalid],
        ["physician_id", [], fields.physician_id.isInvalid],
        ["admission_consultant_id", [], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [], fields.leading_consultant_id.isInvalid],
        ["admission_date", [], fields.admission_date.isInvalid],
        ["release_date", [], fields.release_date.isInvalid],
        ["PaymentStatus", [], fields.PaymentStatus.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["ReferedByDr", [], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [], fields.ReferClinicname.isInvalid],
        ["ReferCity", [], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [], fields.PurposreReferredfor.isInvalid],
        ["BillClosing", [], fields.BillClosing.isInvalid],
        ["BillClosingDate", [], fields.BillClosingDate.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["ClosingAmount", [], fields.ClosingAmount.isInvalid],
        ["ClosingType", [], fields.ClosingType.isInvalid],
        ["BillAmount", [], fields.BillAmount.isInvalid],
        ["billclosedBy", [], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [], fields.ReportHeader.isInvalid],
        ["Procedure", [], fields.Procedure.isInvalid],
        ["Consultant", [], fields.Consultant.isInvalid],
        ["Anesthetist", [], fields.Anesthetist.isInvalid],
        ["Amound", [], fields.Amound.isInvalid],
        ["Package", [], fields.Package.isInvalid],
        ["patient_id", [], fields.patient_id.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerMobile", [], fields.PartnerMobile.isInvalid],
        ["Cid", [], fields.Cid.isInvalid],
        ["PartId", [], fields.PartId.isInvalid],
        ["IDProof", [], fields.IDProof.isInvalid],
        ["AdviceToOtherHospital", [], fields.AdviceToOtherHospital.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fip_admissionlistsrch.setInvalid();
    });

    // Validate form
    fip_admissionlistsrch.validate = function () {
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
    fip_admissionlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fip_admissionlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fip_admissionlistsrch.lists.typeRegsisteration = <?= $Page->typeRegsisteration->toClientList($Page) ?>;
    fip_admissionlistsrch.lists.PaymentCategory = <?= $Page->PaymentCategory->toClientList($Page) ?>;
    fip_admissionlistsrch.lists.physician_id = <?= $Page->physician_id->toClientList($Page) ?>;
    fip_admissionlistsrch.lists.admission_consultant_id = <?= $Page->admission_consultant_id->toClientList($Page) ?>;
    fip_admissionlistsrch.lists.patient_id = <?= $Page->patient_id->toClientList($Page) ?>;

    // Filters
    fip_admissionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fip_admissionlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #DCD110; /* preview row color */
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
    ew.PREVIEW_SINGLE_ROW = true;
    ew.PREVIEW_OVERLAY = true;
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
<form name="fip_admissionlistsrch" id="fip_admissionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fip_admissionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ip_admission">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_mrnNo" class="ew-cell form-group">
        <label for="x_mrnNo" class="ew-search-caption ew-label"><?= $Page->mrnNo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
        <span id="el_ip_admission_mrnNo" class="ew-search-field">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patient_name" class="ew-cell form-group">
        <label for="x_patient_name" class="ew-search-caption ew-label"><?= $Page->patient_name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
        <span id="el_ip_admission_patient_name" class="ew-search-field">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_typeRegsisteration" class="ew-cell form-group">
        <label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?= $Page->typeRegsisteration->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
        <span id="el_ip_admission_typeRegsisteration" class="ew-search-field">
    <select
        id="x_typeRegsisteration"
        name="x_typeRegsisteration"
        class="form-control ew-select<?= $Page->typeRegsisteration->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_typeRegsisteration"
        data-table="ip_admission"
        data-field="x_typeRegsisteration"
        data-value-separator="<?= $Page->typeRegsisteration->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->typeRegsisteration->getPlaceHolder()) ?>"
        <?= $Page->typeRegsisteration->editAttributes() ?>>
        <?= $Page->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->typeRegsisteration->getErrorMessage(false) ?></div>
<?= $Page->typeRegsisteration->Lookup->getParamTag($Page, "p_x_typeRegsisteration") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_typeRegsisteration']"),
        options = { name: "x_typeRegsisteration", selectId: "ip_admission_x_typeRegsisteration", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.typeRegsisteration.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PaymentCategory" class="ew-cell form-group">
        <label for="x_PaymentCategory" class="ew-search-caption ew-label"><?= $Page->PaymentCategory->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE">
</span>
        <span id="el_ip_admission_PaymentCategory" class="ew-search-field">
    <select
        id="x_PaymentCategory"
        name="x_PaymentCategory"
        class="form-control ew-select<?= $Page->PaymentCategory->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_PaymentCategory"
        data-table="ip_admission"
        data-field="x_PaymentCategory"
        data-value-separator="<?= $Page->PaymentCategory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentCategory->getPlaceHolder()) ?>"
        <?= $Page->PaymentCategory->editAttributes() ?>>
        <?= $Page->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PaymentCategory->getErrorMessage(false) ?></div>
<?= $Page->PaymentCategory->Lookup->getParamTag($Page, "p_x_PaymentCategory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_PaymentCategory']"),
        options = { name: "x_PaymentCategory", selectId: "ip_admission_x_PaymentCategory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.PaymentCategory.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_physician_id" class="ew-cell form-group">
        <label for="x_physician_id" class="ew-search-caption ew-label"><?= $Page->physician_id->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
        <span id="el_ip_admission_physician_id" class="ew-search-field">
    <select
        id="x_physician_id"
        name="x_physician_id"
        class="form-control ew-select<?= $Page->physician_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_physician_id"
        data-table="ip_admission"
        data-field="x_physician_id"
        data-value-separator="<?= $Page->physician_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->physician_id->getPlaceHolder()) ?>"
        <?= $Page->physician_id->editAttributes() ?>>
        <?= $Page->physician_id->selectOptionListHtml("x_physician_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage(false) ?></div>
<?= $Page->physician_id->Lookup->getParamTag($Page, "p_x_physician_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_physician_id']"),
        options = { name: "x_physician_id", selectId: "ip_admission_x_physician_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.physician_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_admission_consultant_id" class="ew-cell form-group">
        <label for="x_admission_consultant_id" class="ew-search-caption ew-label"><?= $Page->admission_consultant_id->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="=">
</span>
        <span id="el_ip_admission_admission_consultant_id" class="ew-search-field">
    <select
        id="x_admission_consultant_id"
        name="x_admission_consultant_id"
        class="form-control ew-select<?= $Page->admission_consultant_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_admission_consultant_id"
        data-table="ip_admission"
        data-field="x_admission_consultant_id"
        data-value-separator="<?= $Page->admission_consultant_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->admission_consultant_id->getPlaceHolder()) ?>"
        <?= $Page->admission_consultant_id->editAttributes() ?>>
        <?= $Page->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->admission_consultant_id->getErrorMessage(false) ?></div>
<?= $Page->admission_consultant_id->Lookup->getParamTag($Page, "p_x_admission_consultant_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_admission_consultant_id']"),
        options = { name: "x_admission_consultant_id", selectId: "ip_admission_x_admission_consultant_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.admission_consultant_id.selectOptions);
    ew.createSelect(options);
});
</script>
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
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        <span id="el_ip_admission_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionlistsrch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patient_id" class="ew-cell form-group">
        <label for="x_patient_id" class="ew-search-caption ew-label"><?= $Page->patient_id->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_patient_id" id="z_patient_id" value="=">
</span>
        <span id="el_ip_admission_patient_id" class="ew-search-field">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage(false) ?></div>
<?= $Page->patient_id->Lookup->getParamTag($Page, "p_x_patient_id") ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ip_admission">
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
<form name="fip_admissionlist" id="fip_admissionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<div id="gmp_ip_admission" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ip_admissionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ip_admission_id" class="ip_admission_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th data-name="mrnNo" class="<?= $Page->mrnNo->headerCellClass() ?>"><div id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><?= $Page->renderSort($Page->mrnNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th data-name="patient_name" class="<?= $Page->patient_name->headerCellClass() ?>"><div id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><?= $Page->renderSort($Page->patient_name) ?></div></th>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <th data-name="mobileno" class="<?= $Page->mobileno->headerCellClass() ?>"><div id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><?= $Page->renderSort($Page->mobileno) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_ip_admission_gender" class="ip_admission_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th data-name="age" class="<?= $Page->age->headerCellClass() ?>"><div id="elh_ip_admission_age" class="ip_admission_age"><?= $Page->renderSort($Page->age) ?></div></th>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <th data-name="typeRegsisteration" class="<?= $Page->typeRegsisteration->headerCellClass() ?>"><div id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><?= $Page->renderSort($Page->typeRegsisteration) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <th data-name="PaymentCategory" class="<?= $Page->PaymentCategory->headerCellClass() ?>"><div id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><?= $Page->renderSort($Page->PaymentCategory) ?></div></th>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <th data-name="physician_id" class="<?= $Page->physician_id->headerCellClass() ?>"><div id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><?= $Page->renderSort($Page->physician_id) ?></div></th>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <th data-name="admission_consultant_id" class="<?= $Page->admission_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><?= $Page->renderSort($Page->admission_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <th data-name="leading_consultant_id" class="<?= $Page->leading_consultant_id->headerCellClass() ?>"><div id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><?= $Page->renderSort($Page->leading_consultant_id) ?></div></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th data-name="admission_date" class="<?= $Page->admission_date->headerCellClass() ?>"><div id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><?= $Page->renderSort($Page->admission_date) ?></div></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th data-name="release_date" class="<?= $Page->release_date->headerCellClass() ?>"><div id="elh_ip_admission_release_date" class="ip_admission_release_date"><?= $Page->renderSort($Page->release_date) ?></div></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><?= $Page->renderSort($Page->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_ip_admission_HospID" class="ip_admission_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th data-name="ReferClinicname" class="<?= $Page->ReferClinicname->headerCellClass() ?>"><div id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><?= $Page->renderSort($Page->ReferClinicname) ?></div></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th data-name="ReferCity" class="<?= $Page->ReferCity->headerCellClass() ?>"><div id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><?= $Page->renderSort($Page->ReferCity) ?></div></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th data-name="ReferMobileNo" class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><div id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><?= $Page->renderSort($Page->ReferMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><?= $Page->renderSort($Page->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th data-name="PurposreReferredfor" class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><div id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><?= $Page->renderSort($Page->PurposreReferredfor) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <th data-name="BillClosing" class="<?= $Page->BillClosing->headerCellClass() ?>"><div id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><?= $Page->renderSort($Page->BillClosing) ?></div></th>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <th data-name="BillClosingDate" class="<?= $Page->BillClosingDate->headerCellClass() ?>"><div id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><?= $Page->renderSort($Page->BillClosingDate) ?></div></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Page->BillNumber->headerCellClass() ?>"><div id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><?= $Page->renderSort($Page->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <th data-name="ClosingAmount" class="<?= $Page->ClosingAmount->headerCellClass() ?>"><div id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><?= $Page->renderSort($Page->ClosingAmount) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <th data-name="ClosingType" class="<?= $Page->ClosingType->headerCellClass() ?>"><div id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><?= $Page->renderSort($Page->ClosingType) ?></div></th>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <th data-name="BillAmount" class="<?= $Page->BillAmount->headerCellClass() ?>"><div id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><?= $Page->renderSort($Page->BillAmount) ?></div></th>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <th data-name="billclosedBy" class="<?= $Page->billclosedBy->headerCellClass() ?>"><div id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><?= $Page->renderSort($Page->billclosedBy) ?></div></th>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <th data-name="bllcloseByDate" class="<?= $Page->bllcloseByDate->headerCellClass() ?>"><div id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><?= $Page->renderSort($Page->bllcloseByDate) ?></div></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th data-name="ReportHeader" class="<?= $Page->ReportHeader->headerCellClass() ?>"><div id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><?= $Page->renderSort($Page->ReportHeader) ?></div></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th data-name="Procedure" class="<?= $Page->Procedure->headerCellClass() ?>"><div id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><?= $Page->renderSort($Page->Procedure) ?></div></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th data-name="Consultant" class="<?= $Page->Consultant->headerCellClass() ?>"><div id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><?= $Page->renderSort($Page->Consultant) ?></div></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th data-name="Anesthetist" class="<?= $Page->Anesthetist->headerCellClass() ?>"><div id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><?= $Page->renderSort($Page->Anesthetist) ?></div></th>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <th data-name="Amound" class="<?= $Page->Amound->headerCellClass() ?>"><div id="elh_ip_admission_Amound" class="ip_admission_Amound"><?= $Page->renderSort($Page->Amound) ?></div></th>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
        <th data-name="Package" class="<?= $Page->Package->headerCellClass() ?>"><div id="elh_ip_admission_Package" class="ip_admission_Package"><?= $Page->renderSort($Page->Package) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th data-name="PartnerMobile" class="<?= $Page->PartnerMobile->headerCellClass() ?>"><div id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><?= $Page->renderSort($Page->PartnerMobile) ?></div></th>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <th data-name="Cid" class="<?= $Page->Cid->headerCellClass() ?>"><div id="elh_ip_admission_Cid" class="ip_admission_Cid"><?= $Page->renderSort($Page->Cid) ?></div></th>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <th data-name="PartId" class="<?= $Page->PartId->headerCellClass() ?>"><div id="elh_ip_admission_PartId" class="ip_admission_PartId"><?= $Page->renderSort($Page->PartId) ?></div></th>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <th data-name="IDProof" class="<?= $Page->IDProof->headerCellClass() ?>"><div id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><?= $Page->renderSort($Page->IDProof) ?></div></th>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <th data-name="AdviceToOtherHospital" class="<?= $Page->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><?= $Page->renderSort($Page->AdviceToOtherHospital) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ip_admission", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobileno->Visible) { // mobileno ?>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->age->Visible) { // age ?>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->physician_id->Visible) { // physician_id ?>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->release_date->Visible) { // release_date ?>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Amound->Visible) { // Amound ?>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Package->Visible) { // Package ?>
        <td data-name="Package" <?= $Page->Package->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cid->Visible) { // Cid ?>
        <td data-name="Cid" <?= $Page->Cid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartId->Visible) { // PartId ?>
        <td data-name="PartId" <?= $Page->PartId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IDProof->Visible) { // IDProof ?>
        <td data-name="IDProof" <?= $Page->IDProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
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
    ew.addEventHandlers("ip_admission");
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
        container: "gmp_ip_admission",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
