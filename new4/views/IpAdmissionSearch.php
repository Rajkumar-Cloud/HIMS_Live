<?php

namespace PHPMaker2021\HIMS;

// Page object
$IpAdmissionSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fip_admissionsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fip_admissionsearch = currentAdvancedSearchForm = new ew.Form("fip_admissionsearch", "search");
    <?php } else { ?>
    fip_admissionsearch = currentForm = new ew.Form("fip_admissionsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ip_admission")) ?>,
        fields = currentTable.fields;
    fip_admissionsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
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
        ["cause", [], fields.cause.isInvalid],
        ["admission_date", [ew.Validators.datetime(11)], fields.admission_date.isInvalid],
        ["release_date", [ew.Validators.datetime(17)], fields.release_date.isInvalid],
        ["PaymentStatus", [], fields.PaymentStatus.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["DOB", [], fields.DOB.isInvalid],
        ["ReferedByDr", [], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [], fields.ReferClinicname.isInvalid],
        ["ReferCity", [], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [], fields.PurposreReferredfor.isInvalid],
        ["BillClosing", [], fields.BillClosing.isInvalid],
        ["BillClosingDate", [ew.Validators.datetime(0)], fields.BillClosingDate.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["ClosingAmount", [], fields.ClosingAmount.isInvalid],
        ["ClosingType", [], fields.ClosingType.isInvalid],
        ["BillAmount", [], fields.BillAmount.isInvalid],
        ["billclosedBy", [], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [ew.Validators.datetime(0)], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [], fields.ReportHeader.isInvalid],
        ["Procedure", [], fields.Procedure.isInvalid],
        ["Consultant", [], fields.Consultant.isInvalid],
        ["Anesthetist", [], fields.Anesthetist.isInvalid],
        ["Amound", [ew.Validators.float], fields.Amound.isInvalid],
        ["Package", [], fields.Package.isInvalid],
        ["patient_id", [], fields.patient_id.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerMobile", [], fields.PartnerMobile.isInvalid],
        ["Cid", [ew.Validators.integer], fields.Cid.isInvalid],
        ["PartId", [ew.Validators.integer], fields.PartId.isInvalid],
        ["IDProof", [], fields.IDProof.isInvalid],
        ["AdviceToOtherHospital", [], fields.AdviceToOtherHospital.isInvalid],
        ["Reason", [], fields.Reason.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fip_admissionsearch.setInvalid();
    });

    // Validate form
    fip_admissionsearch.validate = function () {
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
    fip_admissionsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fip_admissionsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fip_admissionsearch.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    fip_admissionsearch.lists.typeRegsisteration = <?= $Page->typeRegsisteration->toClientList($Page) ?>;
    fip_admissionsearch.lists.PaymentCategory = <?= $Page->PaymentCategory->toClientList($Page) ?>;
    fip_admissionsearch.lists.physician_id = <?= $Page->physician_id->toClientList($Page) ?>;
    fip_admissionsearch.lists.admission_consultant_id = <?= $Page->admission_consultant_id->toClientList($Page) ?>;
    fip_admissionsearch.lists.leading_consultant_id = <?= $Page->leading_consultant_id->toClientList($Page) ?>;
    fip_admissionsearch.lists.PaymentStatus = <?= $Page->PaymentStatus->toClientList($Page) ?>;
    fip_admissionsearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fip_admissionsearch.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fip_admissionsearch.lists.ReferedByDr = <?= $Page->ReferedByDr->toClientList($Page) ?>;
    fip_admissionsearch.lists.ReferA4TreatingConsultant = <?= $Page->ReferA4TreatingConsultant->toClientList($Page) ?>;
    fip_admissionsearch.lists.patient_id = <?= $Page->patient_id->toClientList($Page) ?>;
    loadjs.done("fip_admissionsearch");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fip_admissionsearch" id="fip_admissionsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_ip_admission_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="ip_admission" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_mrnNo"><?= $Page->mrnNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
            <span id="el_ip_admission_mrnNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PatientID"><?= $Page->PatientID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
            <span id="el_ip_admission_PatientID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_patient_name"><?= $Page->patient_name->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
            <span id="el_ip_admission_patient_name" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_mobileno"><?= $Page->mobileno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
            <span id="el_ip_admission_mobileno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mobileno->getInputTextType() ?>" data-table="ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobileno->getPlaceHolder()) ?>" value="<?= $Page->mobileno->EditValue ?>"<?= $Page->mobileno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mobileno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_gender"><?= $Page->gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_gender" id="z_gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
            <span id="el_ip_admission_gender" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->gender->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->gender->EditAttrs["onchange"] = "";
?>
<span id="as_x_gender" class="ew-auto-suggest">
    <input type="<?= $Page->gender->getInputTextType() ?>" class="form-control" name="sv_x_gender" id="sv_x_gender" value="<?= RemoveHtml($Page->gender->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>"<?= $Page->gender->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ip_admission" data-field="x_gender" data-input="sv_x_gender" data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="<?= HtmlEncode($Page->gender->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fip_admissionsearch"], function() {
    fip_admissionsearch.createAutoSuggest(Object.assign({"id":"x_gender","forceSelect":false}, ew.vars.tables.ip_admission.fields.gender.autoSuggestOptions));
});
</script>
<?= $Page->gender->Lookup->getParamTag($Page, "p_x_gender") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label for="x_age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_age"><?= $Page->age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_age" id="z_age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
            <span id="el_ip_admission_age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="ip_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
            <span id="el_ip_admission_typeRegsisteration" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
            <span id="el_ip_admission_PaymentCategory" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_physician_id"><?= $Page->physician_id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
            <span id="el_ip_admission_physician_id" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
            <span id="el_ip_admission_admission_consultant_id" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_leading_consultant_id" id="z_leading_consultant_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
            <span id="el_ip_admission_leading_consultant_id" class="ew-search-field ew-search-field-single">
    <select
        id="x_leading_consultant_id"
        name="x_leading_consultant_id"
        class="form-control ew-select<?= $Page->leading_consultant_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_leading_consultant_id"
        data-table="ip_admission"
        data-field="x_leading_consultant_id"
        data-value-separator="<?= $Page->leading_consultant_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->leading_consultant_id->getPlaceHolder()) ?>"
        <?= $Page->leading_consultant_id->editAttributes() ?>>
        <?= $Page->leading_consultant_id->selectOptionListHtml("x_leading_consultant_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->leading_consultant_id->getErrorMessage(false) ?></div>
<?= $Page->leading_consultant_id->Lookup->getParamTag($Page, "p_x_leading_consultant_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_leading_consultant_id']"),
        options = { name: "x_leading_consultant_id", selectId: "ip_admission_x_leading_consultant_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.leading_consultant_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label for="x_cause" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_cause"><?= $Page->cause->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_cause" id="z_cause" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
            <span id="el_ip_admission_cause" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->cause->getInputTextType() ?>" data-table="ip_admission" data-field="x_cause" name="x_cause" id="x_cause" size="35" placeholder="<?= HtmlEncode($Page->cause->getPlaceHolder()) ?>" value="<?= $Page->cause->EditValue ?>"<?= $Page->cause->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->cause->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_admission_date"><?= $Page->admission_date->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_admission_date" id="z_admission_date" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
            <span id="el_ip_admission_admission_date" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage(false) ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_release_date"><?= $Page->release_date->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_release_date" id="z_release_date" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
            <span id="el_ip_admission_release_date" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_release_date" data-format="17" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage(false) ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":17});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PaymentStatus" id="z_PaymentStatus" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
            <span id="el_ip_admission_PaymentStatus" class="ew-search-field ew-search-field-single">
    <select
        id="x_PaymentStatus"
        name="x_PaymentStatus"
        class="form-control ew-select<?= $Page->PaymentStatus->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_PaymentStatus"
        data-table="ip_admission"
        data-field="x_PaymentStatus"
        data-value-separator="<?= $Page->PaymentStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>"
        <?= $Page->PaymentStatus->editAttributes() ?>>
        <?= $Page->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage(false) ?></div>
<?= $Page->PaymentStatus->Lookup->getParamTag($Page, "p_x_PaymentStatus") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_PaymentStatus']"),
        options = { name: "x_PaymentStatus", selectId: "ip_admission_x_PaymentStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.PaymentStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_ip_admission_status" class="ew-search-field ew-search-field-single">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_status"
        data-table="ip_admission"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage(false) ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_status']"),
        options = { name: "x_status", selectId: "ip_admission_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_ip_admission_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ip_admission" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_ip_admission_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_ip_admission_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ip_admission" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_ip_admission_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ip_admission" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_ip_admission_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="ip_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_ip_admission_HospID" class="ew-search-field ew-search-field-single">
    <select
        id="x_HospID"
        name="x_HospID"
        class="form-control ew-select<?= $Page->HospID->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_HospID"
        data-table="ip_admission"
        data-field="x_HospID"
        data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"
        <?= $Page->HospID->editAttributes() ?>>
        <?= $Page->HospID->selectOptionListHtml("x_HospID") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_HospID']"),
        options = { name: "x_HospID", selectId: "ip_admission_x_HospID", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.HospID.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DOB->Visible) { // DOB ?>
    <div id="r_DOB" class="form-group row">
        <label for="x_DOB" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_DOB"><?= $Page->DOB->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DOB" id="z_DOB" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOB->cellAttributes() ?>>
            <span id="el_ip_admission_DOB" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DOB->getInputTextType() ?>" data-table="ip_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?= HtmlEncode($Page->DOB->getPlaceHolder()) ?>" value="<?= $Page->DOB->EditValue ?>"<?= $Page->DOB->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DOB->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
            <span id="el_ip_admission_ReferedByDr" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferedByDr->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" placeholder="<?= HtmlEncode($Page->ReferedByDr->getPlaceHolder()) ?>" value="<?= $Page->ReferedByDr->EditValue ?>"<?= $Page->ReferedByDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage(false) ?></div>
<?= $Page->ReferedByDr->Lookup->getParamTag($Page, "p_x_ReferedByDr") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
            <span id="el_ip_admission_ReferClinicname" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReferCity"><?= $Page->ReferCity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
            <span id="el_ip_admission_ReferCity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
            <span id="el_ip_admission_ReferMobileNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
            <span id="el_ip_admission_ReferA4TreatingConsultant" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" placeholder="<?= HtmlEncode($Page->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Page->ReferA4TreatingConsultant->EditValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage(false) ?></div>
<?= $Page->ReferA4TreatingConsultant->Lookup->getParamTag($Page, "p_x_ReferA4TreatingConsultant") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
            <span id="el_ip_admission_PurposreReferredfor" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="ip_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label for="x_BillClosing" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_BillClosing"><?= $Page->BillClosing->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
            <span id="el_ip_admission_BillClosing" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillClosing->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillClosing->getPlaceHolder()) ?>" value="<?= $Page->BillClosing->EditValue ?>"<?= $Page->BillClosing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillClosingDate" id="z_BillClosingDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
            <span id="el_ip_admission_BillClosingDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillClosingDate->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?= HtmlEncode($Page->BillClosingDate->getPlaceHolder()) ?>" value="<?= $Page->BillClosingDate->EditValue ?>"<?= $Page->BillClosingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillClosingDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillClosingDate->ReadOnly && !$Page->BillClosingDate->Disabled && !isset($Page->BillClosingDate->EditAttrs["readonly"]) && !isset($Page->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_BillNumber"><?= $Page->BillNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
            <span id="el_ip_admission_BillNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClosingAmount" id="z_ClosingAmount" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
            <span id="el_ip_admission_ClosingAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ClosingType"><?= $Page->ClosingType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClosingType" id="z_ClosingType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
            <span id="el_ip_admission_ClosingType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_BillAmount"><?= $Page->BillAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillAmount" id="z_BillAmount" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
            <span id="el_ip_admission_BillAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <div id="r_billclosedBy" class="form-group row">
        <label for="x_billclosedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_billclosedBy" id="z_billclosedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billclosedBy->cellAttributes() ?>>
            <span id="el_ip_admission_billclosedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->billclosedBy->getInputTextType() ?>" data-table="ip_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billclosedBy->getPlaceHolder()) ?>" value="<?= $Page->billclosedBy->EditValue ?>"<?= $Page->billclosedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->billclosedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <div id="r_bllcloseByDate" class="form-group row">
        <label for="x_bllcloseByDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_bllcloseByDate" id="z_bllcloseByDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bllcloseByDate->cellAttributes() ?>>
            <span id="el_ip_admission_bllcloseByDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->bllcloseByDate->getInputTextType() ?>" data-table="ip_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?= HtmlEncode($Page->bllcloseByDate->getPlaceHolder()) ?>" value="<?= $Page->bllcloseByDate->EditValue ?>"<?= $Page->bllcloseByDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->bllcloseByDate->getErrorMessage(false) ?></div>
<?php if (!$Page->bllcloseByDate->ReadOnly && !$Page->bllcloseByDate->Disabled && !isset($Page->bllcloseByDate->EditAttrs["readonly"]) && !isset($Page->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionsearch", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label for="x_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
            <span id="el_ip_admission_ReportHeader" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReportHeader->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReportHeader->getPlaceHolder()) ?>" value="<?= $Page->ReportHeader->EditValue ?>"<?= $Page->ReportHeader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Procedure"><?= $Page->Procedure->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
            <span id="el_ip_admission_Procedure" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="ip_admission" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Consultant"><?= $Page->Consultant->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Consultant" id="z_Consultant" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
            <span id="el_ip_admission_Consultant" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ip_admission" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Anesthetist" id="z_Anesthetist" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
            <span id="el_ip_admission_Anesthetist" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Anesthetist->getInputTextType() ?>" data-table="ip_admission" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anesthetist->EditValue ?>"<?= $Page->Anesthetist->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <div id="r_Amound" class="form-group row">
        <label for="x_Amound" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Amound"><?= $Page->Amound->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Amound" id="z_Amound" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amound->cellAttributes() ?>>
            <span id="el_ip_admission_Amound" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Amound->getInputTextType() ?>" data-table="ip_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?= HtmlEncode($Page->Amound->getPlaceHolder()) ?>" value="<?= $Page->Amound->EditValue ?>"<?= $Page->Amound->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amound->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <div id="r_Package" class="form-group row">
        <label for="x_Package" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Package"><?= $Page->Package->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Package" id="z_Package" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Package->cellAttributes() ?>>
            <span id="el_ip_admission_Package" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Package->getInputTextType() ?>" data-table="ip_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Package->getPlaceHolder()) ?>" value="<?= $Page->Package->EditValue ?>"<?= $Page->Package->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Package->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_patient_id"><?= $Page->patient_id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_patient_id" id="z_patient_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
            <span id="el_ip_admission_patient_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage(false) ?></div>
<?= $Page->patient_id->Lookup->getParamTag($Page, "p_x_patient_id") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerID"><?= $Page->PartnerID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
            <span id="el_ip_admission_PartnerID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerName"><?= $Page->PartnerName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
            <span id="el_ip_admission_PartnerName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
            <span id="el_ip_admission_PartnerMobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <div id="r_Cid" class="form-group row">
        <label for="x_Cid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Cid"><?= $Page->Cid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Cid" id="z_Cid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cid->cellAttributes() ?>>
            <span id="el_ip_admission_Cid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Cid->getInputTextType() ?>" data-table="ip_admission" data-field="x_Cid" name="x_Cid" id="x_Cid" size="30" placeholder="<?= HtmlEncode($Page->Cid->getPlaceHolder()) ?>" value="<?= $Page->Cid->EditValue ?>"<?= $Page->Cid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Cid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <div id="r_PartId" class="form-group row">
        <label for="x_PartId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_PartId"><?= $Page->PartId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PartId" id="z_PartId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartId->cellAttributes() ?>>
            <span id="el_ip_admission_PartId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartId->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?= HtmlEncode($Page->PartId->getPlaceHolder()) ?>" value="<?= $Page->PartId->EditValue ?>"<?= $Page->PartId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <div id="r_IDProof" class="form-group row">
        <label for="x_IDProof" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_IDProof"><?= $Page->IDProof->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IDProof" id="z_IDProof" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IDProof->cellAttributes() ?>>
            <span id="el_ip_admission_IDProof" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IDProof->getInputTextType() ?>" data-table="ip_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?= HtmlEncode($Page->IDProof->getPlaceHolder()) ?>" value="<?= $Page->IDProof->EditValue ?>"<?= $Page->IDProof->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IDProof->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <div id="r_AdviceToOtherHospital" class="form-group row">
        <label for="x_AdviceToOtherHospital" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdviceToOtherHospital" id="z_AdviceToOtherHospital" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
            <span id="el_ip_admission_AdviceToOtherHospital" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AdviceToOtherHospital->getInputTextType() ?>" data-table="ip_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdviceToOtherHospital->getPlaceHolder()) ?>" value="<?= $Page->AdviceToOtherHospital->EditValue ?>"<?= $Page->AdviceToOtherHospital->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdviceToOtherHospital->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><span id="elh_ip_admission_Reason"><?= $Page->Reason->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Reason" id="z_Reason" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
            <span id="el_ip_admission_Reason" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reason->getInputTextType() ?>" data-table="ip_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" size="35" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>" value="<?= $Page->Reason->EditValue ?>"<?= $Page->Reason->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
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
