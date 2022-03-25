<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOpdFollowUpSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatient_opd_follow_upsearch = currentAdvancedSearchForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
    <?php } else { ?>
    fpatient_opd_follow_upsearch = currentForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_opd_follow_up")) ?>,
        fields = currentTable.fields;
    fpatient_opd_follow_upsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["Reception", [], fields.Reception.isInvalid],
        ["PatID", [], fields.PatID.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["Telephone", [], fields.Telephone.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["procedurenotes", [], fields.procedurenotes.isInvalid],
        ["NextReviewDate", [ew.Validators.datetime(7)], fields.NextReviewDate.isInvalid],
        ["ICSIAdvised", [], fields.ICSIAdvised.isInvalid],
        ["DeliveryRegistered", [], fields.DeliveryRegistered.isInvalid],
        ["EDD", [ew.Validators.datetime(7)], fields.EDD.isInvalid],
        ["SerologyPositive", [], fields.SerologyPositive.isInvalid],
        ["Allergy", [], fields.Allergy.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["modifiedby", [ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["LMP", [ew.Validators.datetime(7)], fields.LMP.isInvalid],
        ["Procedure", [], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [ew.Validators.datetime(7)], fields.ICSIDate.isInvalid],
        ["PatientSearch", [], fields.PatientSearch.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["createdUserName", [], fields.createdUserName.isInvalid],
        ["TemplateDrNotes", [], fields.TemplateDrNotes.isInvalid],
        ["reportheader", [], fields.reportheader.isInvalid],
        ["Purpose", [], fields.Purpose.isInvalid],
        ["DrName", [], fields.DrName.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_opd_follow_upsearch.setInvalid();
    });

    // Validate form
    fpatient_opd_follow_upsearch.validate = function () {
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
    fpatient_opd_follow_upsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_opd_follow_upsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_opd_follow_upsearch.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.DeliveryRegistered = <?= $Page->DeliveryRegistered->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.SerologyPositive = <?= $Page->SerologyPositive->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.Allergy = <?= $Page->Allergy->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.TemplateDrNotes = <?= $Page->TemplateDrNotes->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.reportheader = <?= $Page->reportheader->toClientList($Page) ?>;
    fpatient_opd_follow_upsearch.lists.DrName = <?= $Page->DrName->toClientList($Page) ?>;
    loadjs.done("fpatient_opd_follow_upsearch");
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
<form name="fpatient_opd_follow_upsearch" id="fpatient_opd_follow_upsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><?= $Page->PatID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_PatID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_MobileNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <div id="r_Telephone" class="form-group row">
        <label for="x_Telephone" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Telephone" id="z_Telephone" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Telephone->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Telephone" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Telephone->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Telephone->getPlaceHolder()) ?>" value="<?= $Page->Telephone->EditValue ?>"<?= $Page->Telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Telephone->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_procedurenotes" id="z_procedurenotes" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_procedurenotes" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->procedurenotes->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" size="35" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>" value="<?= $Page->procedurenotes->EditValue ?>"<?= $Page->procedurenotes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NextReviewDate" id="z_NextReviewDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_NextReviewDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage(false) ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ICSIAdvised" id="z_ICSIAdvised" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_ICSIAdvised" class="ew-search-field ew-search-field-single">
<template id="tp_x_ICSIAdvised">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised"<?= $Page->ICSIAdvised->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ICSIAdvised" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ICSIAdvised[]"
    name="x_ICSIAdvised[]"
    value="<?= HtmlEncode($Page->ICSIAdvised->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ICSIAdvised"
    data-target="dsl_x_ICSIAdvised"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ICSIAdvised->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_ICSIAdvised"
    data-value-separator="<?= $Page->ICSIAdvised->displayValueSeparatorAttribute() ?>"
    <?= $Page->ICSIAdvised->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeliveryRegistered" id="z_DeliveryRegistered" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_DeliveryRegistered" class="ew-search-field ew-search-field-single">
<template id="tp_x_DeliveryRegistered">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x_DeliveryRegistered" id="x_DeliveryRegistered"<?= $Page->DeliveryRegistered->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_DeliveryRegistered" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_DeliveryRegistered[]"
    name="x_DeliveryRegistered[]"
    value="<?= HtmlEncode($Page->DeliveryRegistered->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_DeliveryRegistered"
    data-target="dsl_x_DeliveryRegistered"
    data-repeatcolumn="5"
    class="form-control<?= $Page->DeliveryRegistered->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_DeliveryRegistered"
    data-value-separator="<?= $Page->DeliveryRegistered->displayValueSeparatorAttribute() ?>"
    <?= $Page->DeliveryRegistered->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeliveryRegistered->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_EDD" id="z_EDD" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_EDD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SerologyPositive" id="z_SerologyPositive" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_SerologyPositive" class="ew-search-field ew-search-field-single">
<template id="tp_x_SerologyPositive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x_SerologyPositive" id="x_SerologyPositive"<?= $Page->SerologyPositive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_SerologyPositive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_SerologyPositive[]"
    name="x_SerologyPositive[]"
    value="<?= HtmlEncode($Page->SerologyPositive->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_SerologyPositive"
    data-target="dsl_x_SerologyPositive"
    data-repeatcolumn="5"
    class="form-control<?= $Page->SerologyPositive->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_SerologyPositive"
    data-value-separator="<?= $Page->SerologyPositive->displayValueSeparatorAttribute() ?>"
    <?= $Page->SerologyPositive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SerologyPositive->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Allergy" id="z_Allergy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Allergy" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->Allergy->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Allergy->getInputTextType() ?>" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?= RemoveHtml($Page->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>"<?= $Page->Allergy->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Allergy->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Allergy->ReadOnly || $Page->Allergy->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_opd_follow_up" data-field="x_Allergy" data-input="sv_x_Allergy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?= HtmlEncode($Page->Allergy->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Allergy->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch"], function() {
    fpatient_opd_follow_upsearch.createAutoSuggest(Object.assign({"id":"x_Allergy","forceSelect":false}, ew.vars.tables.patient_opd_follow_up.fields.Allergy.autoSuggestOptions));
});
</script>
<?= $Page->Allergy->Lookup->getParamTag($Page, "p_x_Allergy") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_status" class="ew-search-field ew-search-field-single">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_status"
        data-table="patient_opd_follow_up"
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
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_status']"),
        options = { name: "x_status", selectId: "patient_opd_follow_up_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
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
            <span id="el_patient_opd_follow_up_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_patient_opd_follow_up_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LMP" id="z_LMP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_LMP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage(false) ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Procedure" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="35" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProcedureDateTime" id="z_ProcedureDateTime" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_ProcedureDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ICSIDate" id="z_ICSIDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_ICSIDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_PatientSearch" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage(false) ?></div>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->AdvancedSearch->SearchValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <div id="r_createdUserName" class="form-group row">
        <label for="x_createdUserName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><?= $Page->createdUserName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdUserName" id="z_createdUserName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdUserName->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_createdUserName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdUserName->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdUserName->getPlaceHolder()) ?>" value="<?= $Page->createdUserName->EditValue ?>"<?= $Page->createdUserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdUserName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
    <div id="r_TemplateDrNotes" class="form-group row">
        <label for="x_TemplateDrNotes" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><?= $Page->TemplateDrNotes->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TemplateDrNotes" id="z_TemplateDrNotes" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateDrNotes->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_TemplateDrNotes" class="ew-search-field ew-search-field-single">
    <select
        id="x_TemplateDrNotes"
        name="x_TemplateDrNotes"
        class="form-control ew-select<?= $Page->TemplateDrNotes->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_TemplateDrNotes"
        data-table="patient_opd_follow_up"
        data-field="x_TemplateDrNotes"
        data-value-separator="<?= $Page->TemplateDrNotes->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateDrNotes->getPlaceHolder()) ?>"
        <?= $Page->TemplateDrNotes->editAttributes() ?>>
        <?= $Page->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TemplateDrNotes->getErrorMessage(false) ?></div>
<?= $Page->TemplateDrNotes->Lookup->getParamTag($Page, "p_x_TemplateDrNotes") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_TemplateDrNotes']"),
        options = { name: "x_TemplateDrNotes", selectId: "patient_opd_follow_up_x_TemplateDrNotes", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.TemplateDrNotes.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <div id="r_reportheader" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_reportheader" id="z_reportheader" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reportheader->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_reportheader" class="ew-search-field ew-search-field-single">
<template id="tp_x_reportheader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_reportheader" name="x_reportheader" id="x_reportheader"<?= $Page->reportheader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_reportheader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_reportheader[]"
    name="x_reportheader[]"
    value="<?= HtmlEncode($Page->reportheader->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_reportheader"
    data-target="dsl_x_reportheader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->reportheader->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_reportheader"
    data-value-separator="<?= $Page->reportheader->displayValueSeparatorAttribute() ?>"
    <?= $Page->reportheader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->reportheader->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Purpose"><?= $Page->Purpose->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_Purpose" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="35" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DrName"><?= $Page->DrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
            <span id="el_patient_opd_follow_up_DrName" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?= EmptyValue(strval($Page->DrName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrName->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrName->ReadOnly || $Page->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage(false) ?></div>
<?= $Page->DrName->Lookup->getParamTag($Page, "p_x_DrName") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?= $Page->DrName->AdvancedSearch->SearchValue ?>"<?= $Page->DrName->editAttributes() ?>>
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
    ew.addEventHandlers("patient_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
