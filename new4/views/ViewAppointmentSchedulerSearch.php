<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_appointment_schedulersearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_appointment_schedulersearch = currentAdvancedSearchForm = new ew.Form("fview_appointment_schedulersearch", "search");
    <?php } else { ?>
    fview_appointment_schedulersearch = currentForm = new ew.Form("fview_appointment_schedulersearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler")) ?>,
        fields = currentTable.fields;
    fview_appointment_schedulersearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["patientID", [], fields.patientID.isInvalid],
        ["patientName", [], fields.patientName.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["Purpose", [], fields.Purpose.isInvalid],
        ["PatientType", [], fields.PatientType.isInvalid],
        ["Referal", [], fields.Referal.isInvalid],
        ["start_date", [ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["DoctorName", [], fields.DoctorName.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["end_date", [ew.Validators.datetime(11)], fields.end_date.isInvalid],
        ["DoctorID", [], fields.DoctorID.isInvalid],
        ["DoctorCode", [], fields.DoctorCode.isInvalid],
        ["Department", [], fields.Department.isInvalid],
        ["AppointmentStatus", [], fields.AppointmentStatus.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["scheduler_id", [], fields.scheduler_id.isInvalid],
        ["text", [], fields.text.isInvalid],
        ["appointment_status", [], fields.appointment_status.isInvalid],
        ["PId", [ew.Validators.integer], fields.PId.isInvalid],
        ["SchEmail", [], fields.SchEmail.isInvalid],
        ["appointment_type", [], fields.appointment_type.isInvalid],
        ["Notified", [], fields.Notified.isInvalid],
        ["Notes", [], fields.Notes.isInvalid],
        ["paymentType", [], fields.paymentType.isInvalid],
        ["WhereDidYouHear", [], fields.WhereDidYouHear.isInvalid],
        ["createdBy", [], fields.createdBy.isInvalid],
        ["createdDateTime", [ew.Validators.datetime(0)], fields.createdDateTime.isInvalid],
        ["PatientTypee", [], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_appointment_schedulersearch.setInvalid();
    });

    // Validate form
    fview_appointment_schedulersearch.validate = function () {
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
    fview_appointment_schedulersearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_schedulersearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_schedulersearch.lists.patientID = <?= $Page->patientID->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.PatientType = <?= $Page->PatientType->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.appointment_type = <?= $Page->appointment_type->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.Notified = <?= $Page->Notified->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.WhereDidYouHear = <?= $Page->WhereDidYouHear->toClientList($Page) ?>;
    fview_appointment_schedulersearch.lists.PatientTypee = <?= $Page->PatientTypee->toClientList($Page) ?>;
    loadjs.done("fview_appointment_schedulersearch");
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
<form name="fview_appointment_schedulersearch" id="fview_appointment_schedulersearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_id" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_id"><?= $Page->id->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_id" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_id" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_id" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <div id="r_patientID" class="form-group row">
        <label for="x_patientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_patientID"><?= $Page->patientID->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientID->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_patientID" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patientID"><?= EmptyValue(strval($Page->patientID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patientID->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patientID->ReadOnly || $Page->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage(false) ?></div>
<?= $Page->patientID->Lookup->getParamTag($Page, "p_x_patientID") ?>
<input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patientID->displayValueSeparatorAttribute() ?>" name="x_patientID" id="x_patientID" value="<?= $Page->patientID->AdvancedSearch->SearchValue ?>"<?= $Page->patientID->editAttributes() ?>>
</span></template>
        <template id="tpv_view_appointment_scheduler_patientID" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <div id="r_patientName" class="form-group row">
        <label for="x_patientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_patientName"><?= $Page->patientName->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientName->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_patientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_patientName" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_MobileNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_Purpose"><?= $Page->Purpose->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_Purpose" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_Purpose" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <div id="r_PatientType" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_PatientType"><?= $Page->PatientType->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientType" id="z_PatientType" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientType->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_PatientType" class="ew-search-field ew-search-field-single">
<template id="tp_x_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_PatientType" name="x_PatientType" id="x_PatientType"<?= $Page->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PatientType" class="ew-item-list"></div>
<?php $Page->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x_PatientType"
    name="x_PatientType"
    value="<?= HtmlEncode($Page->PatientType->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_PatientType"
    data-target="dsl_x_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PatientType->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Page->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Page->PatientType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientType->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_PatientType" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label for="x_Referal" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_Referal"><?= $Page->Referal->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Referal->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_Referal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Referal->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" value="<?= $Page->Referal->EditValue ?>"<?= $Page->Referal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage(false) ?></div>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x_Referal") ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_Referal" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_start_date"><?= $Page->start_date->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_start_date" id="z_start_date" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_start_date" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage(false) ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_schedulersearch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_start_date" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <div id="r_DoctorName" class="form-group row">
        <label for="x_DoctorName" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_DoctorName"><?= $Page->DoctorName->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorName->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_DoctorName" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DoctorName"><?= EmptyValue(strval($Page->DoctorName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DoctorName->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DoctorName->ReadOnly || $Page->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage(false) ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="view_appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>" name="x_DoctorName" id="x_DoctorName" value="<?= $Page->DoctorName->AdvancedSearch->SearchValue ?>"<?= $Page->DoctorName->editAttributes() ?>>
</span></template>
        <template id="tpv_view_appointment_scheduler_DoctorName" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_HospID"><?= $Page->HospID->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_HospID" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <div id="r_end_date" class="form-group row">
        <label for="x_end_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_end_date"><?= $Page->end_date->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_end_date" id="z_end_date" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->end_date->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_end_date" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->end_date->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_end_date" data-format="11" name="x_end_date" id="x_end_date" placeholder="<?= HtmlEncode($Page->end_date->getPlaceHolder()) ?>" value="<?= $Page->end_date->EditValue ?>"<?= $Page->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->end_date->getErrorMessage(false) ?></div>
<?php if (!$Page->end_date->ReadOnly && !$Page->end_date->Disabled && !isset($Page->end_date->EditAttrs["readonly"]) && !isset($Page->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_schedulersearch", "x_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_end_date" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <div id="r_DoctorID" class="form-group row">
        <label for="x_DoctorID" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_DoctorID"><?= $Page->DoctorID->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorID" id="z_DoctorID" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorID->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_DoctorID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DoctorID->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorID" name="x_DoctorID" id="x_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Page->DoctorID->getPlaceHolder()) ?>" value="<?= $Page->DoctorID->EditValue ?>"<?= $Page->DoctorID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoctorID->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_DoctorID" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <div id="r_DoctorCode" class="form-group row">
        <label for="x_DoctorCode" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_DoctorCode"><?= $Page->DoctorCode->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorCode" id="z_DoctorCode" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorCode->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_DoctorCode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DoctorCode->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_DoctorCode" name="x_DoctorCode" id="x_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Page->DoctorCode->getPlaceHolder()) ?>" value="<?= $Page->DoctorCode->EditValue ?>"<?= $Page->DoctorCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoctorCode->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_DoctorCode" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label for="x_Department" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_Department" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_Department"><?= $Page->Department->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_Department" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Department" id="z_Department" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_Department" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_Department" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Department" name="x_Department" id="x_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_Department" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <div id="r_AppointmentStatus" class="form-group row">
        <label for="x_AppointmentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AppointmentStatus" id="z_AppointmentStatus" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AppointmentStatus->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_AppointmentStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AppointmentStatus->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_AppointmentStatus" name="x_AppointmentStatus" id="x_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Page->AppointmentStatus->EditValue ?>"<?= $Page->AppointmentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AppointmentStatus->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_AppointmentStatus" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_status" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_status"><?= $Page->status->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_status" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_status" id="z_status" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_status" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_status" class="ew-search-field ew-search-field-single">
<template id="tp_x_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status[]"
    name="x_status[]"
    value="<?= HtmlEncode($Page->status->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_status" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <div id="r_scheduler_id" class="form-group row">
        <label for="x_scheduler_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_scheduler_id"><?= $Page->scheduler_id->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_scheduler_id" id="z_scheduler_id" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduler_id->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_scheduler_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->scheduler_id->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_scheduler_id" name="x_scheduler_id" id="x_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->scheduler_id->getPlaceHolder()) ?>" value="<?= $Page->scheduler_id->EditValue ?>"<?= $Page->scheduler_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->scheduler_id->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_scheduler_id" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <div id="r_text" class="form-group row">
        <label for="x_text" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_text" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_text"><?= $Page->text->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_text" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_text" id="z_text" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->text->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_text" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_text" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->text->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_text" name="x_text" id="x_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->text->getPlaceHolder()) ?>" value="<?= $Page->text->EditValue ?>"<?= $Page->text->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->text->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_text" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <div id="r_appointment_status" class="form-group row">
        <label for="x_appointment_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_appointment_status"><?= $Page->appointment_status->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_appointment_status" id="z_appointment_status" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_status->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_appointment_status" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->appointment_status->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_appointment_status" name="x_appointment_status" id="x_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->appointment_status->getPlaceHolder()) ?>" value="<?= $Page->appointment_status->EditValue ?>"<?= $Page->appointment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->appointment_status->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_appointment_status" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label for="x_PId" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_PId" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_PId"><?= $Page->PId->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_PId" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PId" id="z_PId" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_PId" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_PId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_PId" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <div id="r_SchEmail" class="form-group row">
        <label for="x_SchEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_SchEmail"><?= $Page->SchEmail->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SchEmail" id="z_SchEmail" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SchEmail->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_SchEmail" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SchEmail->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_SchEmail" name="x_SchEmail" id="x_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SchEmail->getPlaceHolder()) ?>" value="<?= $Page->SchEmail->EditValue ?>"<?= $Page->SchEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SchEmail->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_SchEmail" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <div id="r_appointment_type" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_appointment_type"><?= $Page->appointment_type->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_appointment_type" id="z_appointment_type" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->appointment_type->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_appointment_type" class="ew-search-field ew-search-field-single">
<template id="tp_x_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_appointment_type" name="x_appointment_type" id="x_appointment_type"<?= $Page->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_appointment_type"
    name="x_appointment_type"
    value="<?= HtmlEncode($Page->appointment_type->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_appointment_type"
    data-target="dsl_x_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->appointment_type->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Page->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Page->appointment_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->appointment_type->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_appointment_type" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <div id="r_Notified" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_Notified"><?= $Page->Notified->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notified" id="z_Notified" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notified->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_Notified" class="ew-search-field ew-search-field-single">
<template id="tp_x_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_Notified" name="x_Notified" id="x_Notified"<?= $Page->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Notified[]"
    name="x_Notified[]"
    value="<?= HtmlEncode($Page->Notified->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Notified"
    data-target="dsl_x_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Notified->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Page->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Page->Notified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notified->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_Notified" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label for="x_Notes" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_Notes"><?= $Page->Notes->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notes" id="z_Notes" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notes->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_Notes" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_Notes" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <div id="r_paymentType" class="form-group row">
        <label for="x_paymentType" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_paymentType"><?= $Page->paymentType->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_paymentType" id="z_paymentType" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paymentType->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_paymentType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->paymentType->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_paymentType" name="x_paymentType" id="x_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->paymentType->getPlaceHolder()) ?>" value="<?= $Page->paymentType->EditValue ?>"<?= $Page->paymentType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->paymentType->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_paymentType" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <div id="r_WhereDidYouHear" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhereDidYouHear" id="z_WhereDidYouHear" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WhereDidYouHear->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_WhereDidYouHear" class="ew-search-field ew-search-field-single">
<template id="tp_x_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_appointment_scheduler" data-field="x_WhereDidYouHear" name="x_WhereDidYouHear" id="x_WhereDidYouHear"<?= $Page->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_WhereDidYouHear[]"
    name="x_WhereDidYouHear[]"
    value="<?= HtmlEncode($Page->WhereDidYouHear->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_WhereDidYouHear"
    data-target="dsl_x_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Page->WhereDidYouHear->isInvalidClass() ?>"
    data-table="view_appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Page->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Page->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WhereDidYouHear->getErrorMessage(false) ?></div>
<?= $Page->WhereDidYouHear->Lookup->getParamTag($Page, "p_x_WhereDidYouHear") ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_WhereDidYouHear" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
    <div id="r_createdBy" class="form-group row">
        <label for="x_createdBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_createdBy"><?= $Page->createdBy->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdBy" id="z_createdBy" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdBy->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_createdBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdBy->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_createdBy" name="x_createdBy" id="x_createdBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdBy->getPlaceHolder()) ?>" value="<?= $Page->createdBy->EditValue ?>"<?= $Page->createdBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdBy->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_createdBy" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
    <div id="r_createdDateTime" class="form-group row">
        <label for="x_createdDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_createdDateTime"><?= $Page->createdDateTime->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdDateTime" id="z_createdDateTime" value="=">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdDateTime->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_createdDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdDateTime->getInputTextType() ?>" data-table="view_appointment_scheduler" data-field="x_createdDateTime" name="x_createdDateTime" id="x_createdDateTime" placeholder="<?= HtmlEncode($Page->createdDateTime->getPlaceHolder()) ?>" value="<?= $Page->createdDateTime->EditValue ?>"<?= $Page->createdDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDateTime->ReadOnly && !$Page->createdDateTime->Disabled && !isset($Page->createdDateTime->EditAttrs["readonly"]) && !isset($Page->createdDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_schedulersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_schedulersearch", "x_createdDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_createdDateTime" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <div id="r_PatientTypee" class="form-group row">
        <label for="x_PatientTypee" class="<?= $Page->LeftColumnClass ?>"><template id="tpsc_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch"><span id="elh_view_appointment_scheduler_PatientTypee"><?= $Page->PatientTypee->caption() ?></span></template>
        <template id="tpz_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE">
</span></template>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientTypee->cellAttributes() ?>>
            <template id="tpx_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch"><span id="el_view_appointment_scheduler_PatientTypee" class="ew-search-field ew-search-field-single">
    <select
        id="x_PatientTypee"
        name="x_PatientTypee"
        class="form-control ew-select<?= $Page->PatientTypee->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_x_PatientTypee"
        data-table="view_appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Page->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>"
        <?= $Page->PatientTypee->editAttributes() ?>>
        <?= $Page->PatientTypee->selectOptionListHtml("x_PatientTypee") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage(false) ?></div>
<?= $Page->PatientTypee->Lookup->getParamTag($Page, "p_x_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_x_PatientTypee']"),
        options = { name: "x_PatientTypee", selectId: "view_appointment_scheduler_x_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
        <template id="tpv_view_appointment_scheduler_PatientTypee" class="view_appointment_schedulersearch">
        </template>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_appointment_schedulersearch" class="ew-custom-template"></div>
<template id="tpm_view_appointment_schedulersearch">
<div id="ct_ViewAppointmentSchedulerSearch"><table class="ew-table">
	 <tbody>
		<tr><td><?= $Page->patientName->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_patientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_patientName"></slot></td><td><?= $Page->MobileNumber->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_MobileNumber"></slot></td></tr>
		<tr><td><?= $Page->start_date->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_start_date"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpx_start_time"></slot></td></tr>
		<tr><td><?= $Page->DoctorName->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_DoctorName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_DoctorName"></slot></td></tr>
	</tbody>
</table>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_appointment_schedulersearch", "tpm_view_appointment_schedulersearch", "view_appointment_schedulersearch", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
