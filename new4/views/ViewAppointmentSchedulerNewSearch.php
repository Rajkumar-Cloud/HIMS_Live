<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerNewSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_appointment_scheduler_newsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_appointment_scheduler_newsearch = currentAdvancedSearchForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
    <?php } else { ?>
    fview_appointment_scheduler_newsearch = currentForm = new ew.Form("fview_appointment_scheduler_newsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>,
        fields = currentTable.fields;
    fview_appointment_scheduler_newsearch.addFields([
        ["patientID", [], fields.patientID.isInvalid],
        ["patientName", [], fields.patientName.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["start_time", [ew.Validators.datetime(3)], fields.start_time.isInvalid],
        ["Purpose", [], fields.Purpose.isInvalid],
        ["patienttype", [], fields.patienttype.isInvalid],
        ["Referal", [], fields.Referal.isInvalid],
        ["start_date", [ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["y_start_date", [ew.Validators.between], false],
        ["DoctorName", [], fields.DoctorName.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["Id", [ew.Validators.integer], fields.Id.isInvalid],
        ["PatientTypee", [], fields.PatientTypee.isInvalid],
        ["Notes", [], fields.Notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_appointment_scheduler_newsearch.setInvalid();
    });

    // Validate form
    fview_appointment_scheduler_newsearch.validate = function () {
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
    fview_appointment_scheduler_newsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_scheduler_newsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_scheduler_newsearch.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_scheduler_newsearch.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    loadjs.done("fview_appointment_scheduler_newsearch");
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
<form name="fview_appointment_scheduler_newsearch" id="fview_appointment_scheduler_newsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->patientID->Visible) { // patientID ?>
    <div id="r_patientID" class="form-group row">
        <label for="x_patientID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?= $Page->patientID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientID->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_patientID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patientID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <div id="r_patientName" class="form-group row">
        <label for="x_patientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?= $Page->patientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patientName->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_patientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?= $Page->MobileNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_MobileNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
    <div id="r_start_time" class="form-group row">
        <label for="x_start_time" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?= $Page->start_time->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("<=") ?>
<input type="hidden" name="z_start_time" id="z_start_time" value="&lt;=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_time->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_start_time" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->start_time->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x_start_time" id="x_start_time" placeholder="<?= HtmlEncode($Page->start_time->getPlaceHolder()) ?>" value="<?= $Page->start_time->EditValue ?>"<?= $Page->start_time->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_time->getErrorMessage(false) ?></div>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "timepicker"], function() {
    ew.createTimePicker("fview_appointment_scheduler_newsearch", "x_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?= $Page->Purpose->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_Purpose" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patienttype->Visible) { // patienttype ?>
    <div id="r_patienttype" class="form-group row">
        <label for="x_patienttype" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?= $Page->patienttype->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patienttype" id="z_patienttype" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patienttype->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_patienttype" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patienttype->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x_patienttype" id="x_patienttype" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patienttype->getPlaceHolder()) ?>" value="<?= $Page->patienttype->EditValue ?>"<?= $Page->patienttype->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patienttype->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <div id="r_Referal" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?= $Page->Referal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Referal->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_Referal" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x_Referal" class="ew-auto-suggest">
    <input type="<?= $Page->Referal->getInputTextType() ?>" class="form-control" name="sv_x_Referal" id="sv_x_Referal" value="<?= RemoveHtml($Page->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>"<?= $Page->Referal->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-input="sv_x_Referal" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x_Referal" id="x_Referal" value="<?= HtmlEncode($Page->Referal->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch"], function() {
    fview_appointment_scheduler_newsearch.createAutoSuggest(Object.assign({"id":"x_Referal","forceSelect":false}, ew.vars.tables.view_appointment_scheduler_new.fields.Referal.autoSuggestOptions));
});
</script>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x_Referal") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?= $Page->start_date->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_start_date" id="z_start_date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->start_date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->start_date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->start_date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->start_date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->start_date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_appointment_scheduler_new_start_date" class="ew-search-field">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage(false) ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_appointment_scheduler_new_start_date" class="ew-search-field2 d-none">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue2 ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage(false) ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newsearch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <div id="r_DoctorName" class="form-group row">
        <label for="x_DoctorName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?= $Page->DoctorName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoctorName->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_DoctorName" class="ew-search-field ew-search-field-single">
    <select
        id="x_DoctorName"
        name="x_DoctorName"
        class="form-control ew-select<?= $Page->DoctorName->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_new_x_DoctorName"
        data-table="view_appointment_scheduler_new"
        data-field="x_DoctorName"
        data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>"
        <?= $Page->DoctorName->editAttributes() ?>>
        <?= $Page->DoctorName->selectOptionListHtml("x_DoctorName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage(false) ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x_DoctorName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_new_x_DoctorName']"),
        options = { name: "x_DoctorName", selectId: "view_appointment_scheduler_new_x_DoctorName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler_new.fields.DoctorName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Id->Visible) { // Id ?>
    <div id="r_Id" class="form-group row">
        <label for="x_Id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?= $Page->Id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Id" id="z_Id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Id->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_Id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Id->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Id" name="x_Id" id="x_Id" placeholder="<?= HtmlEncode($Page->Id->getPlaceHolder()) ?>" value="<?= $Page->Id->EditValue ?>"<?= $Page->Id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <div id="r_PatientTypee" class="form-group row">
        <label for="x_PatientTypee" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?= $Page->PatientTypee->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientTypee" id="z_PatientTypee" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientTypee->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_PatientTypee" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientTypee->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x_PatientTypee" id="x_PatientTypee" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>" value="<?= $Page->PatientTypee->EditValue ?>"<?= $Page->PatientTypee->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label for="x_Notes" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?= $Page->Notes->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Notes" id="z_Notes" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notes->cellAttributes() ?>>
            <span id="el_view_appointment_scheduler_new_Notes" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x_Notes" id="x_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_appointment_scheduler_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
