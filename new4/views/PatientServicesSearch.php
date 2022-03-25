<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientServicesSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_servicessearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatient_servicessearch = currentAdvancedSearchForm = new ew.Form("fpatient_servicessearch", "search");
    <?php } else { ?>
    fpatient_servicessearch = currentForm = new ew.Form("fpatient_servicessearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_services")) ?>,
        fields = currentTable.fields;
    fpatient_servicessearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["Reception", [ew.Validators.integer], fields.Reception.isInvalid],
        ["Services", [], fields.Services.isInvalid],
        ["amount", [ew.Validators.float], fields.amount.isInvalid],
        ["description", [], fields.description.isInvalid],
        ["patient_type", [ew.Validators.integer], fields.patient_type.isInvalid],
        ["charged_date", [ew.Validators.datetime(0)], fields.charged_date.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["Unit", [ew.Validators.integer], fields.Unit.isInvalid],
        ["Quantity", [ew.Validators.integer], fields.Quantity.isInvalid],
        ["Discount", [ew.Validators.float], fields.Discount.isInvalid],
        ["SubTotal", [ew.Validators.float], fields.SubTotal.isInvalid],
        ["ServiceSelect", [], fields.ServiceSelect.isInvalid],
        ["Aid", [ew.Validators.integer], fields.Aid.isInvalid],
        ["Vid", [ew.Validators.integer], fields.Vid.isInvalid],
        ["DrID", [ew.Validators.integer], fields.DrID.isInvalid],
        ["DrCODE", [], fields.DrCODE.isInvalid],
        ["DrName", [], fields.DrName.isInvalid],
        ["Department", [], fields.Department.isInvalid],
        ["DrSharePres", [ew.Validators.float], fields.DrSharePres.isInvalid],
        ["HospSharePres", [ew.Validators.float], fields.HospSharePres.isInvalid],
        ["DrShareAmount", [ew.Validators.float], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [ew.Validators.float], fields.HospShareAmount.isInvalid],
        ["DrShareSettiledAmount", [ew.Validators.float], fields.DrShareSettiledAmount.isInvalid],
        ["DrShareSettledId", [ew.Validators.integer], fields.DrShareSettledId.isInvalid],
        ["DrShareSettiledStatus", [ew.Validators.integer], fields.DrShareSettiledStatus.isInvalid],
        ["invoiceId", [ew.Validators.integer], fields.invoiceId.isInvalid],
        ["invoiceAmount", [ew.Validators.float], fields.invoiceAmount.isInvalid],
        ["invoiceStatus", [], fields.invoiceStatus.isInvalid],
        ["modeOfPayment", [], fields.modeOfPayment.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["RIDNO", [ew.Validators.integer], fields.RIDNO.isInvalid],
        ["TidNo", [ew.Validators.integer], fields.TidNo.isInvalid],
        ["DiscountCategory", [], fields.DiscountCategory.isInvalid],
        ["sid", [ew.Validators.integer], fields.sid.isInvalid],
        ["ItemCode", [], fields.ItemCode.isInvalid],
        ["TestSubCd", [], fields.TestSubCd.isInvalid],
        ["DEptCd", [], fields.DEptCd.isInvalid],
        ["ProfCd", [], fields.ProfCd.isInvalid],
        ["LabReport", [], fields.LabReport.isInvalid],
        ["Comments", [], fields.Comments.isInvalid],
        ["Method", [], fields.Method.isInvalid],
        ["Specimen", [], fields.Specimen.isInvalid],
        ["Abnormal", [], fields.Abnormal.isInvalid],
        ["RefValue", [], fields.RefValue.isInvalid],
        ["TestUnit", [], fields.TestUnit.isInvalid],
        ["LOWHIGH", [], fields.LOWHIGH.isInvalid],
        ["Branch", [], fields.Branch.isInvalid],
        ["Dispatch", [], fields.Dispatch.isInvalid],
        ["Pic1", [], fields.Pic1.isInvalid],
        ["Pic2", [], fields.Pic2.isInvalid],
        ["GraphPath", [], fields.GraphPath.isInvalid],
        ["MachineCD", [], fields.MachineCD.isInvalid],
        ["TestCancel", [], fields.TestCancel.isInvalid],
        ["OutSource", [], fields.OutSource.isInvalid],
        ["Printed", [], fields.Printed.isInvalid],
        ["PrintBy", [], fields.PrintBy.isInvalid],
        ["PrintDate", [ew.Validators.datetime(0)], fields.PrintDate.isInvalid],
        ["BillingDate", [ew.Validators.datetime(0)], fields.BillingDate.isInvalid],
        ["BilledBy", [], fields.BilledBy.isInvalid],
        ["Resulted", [], fields.Resulted.isInvalid],
        ["ResultDate", [ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["ResultedBy", [], fields.ResultedBy.isInvalid],
        ["SampleDate", [ew.Validators.datetime(0)], fields.SampleDate.isInvalid],
        ["SampleUser", [], fields.SampleUser.isInvalid],
        ["Sampled", [], fields.Sampled.isInvalid],
        ["ReceivedDate", [ew.Validators.datetime(0)], fields.ReceivedDate.isInvalid],
        ["ReceivedUser", [], fields.ReceivedUser.isInvalid],
        ["Recevied", [], fields.Recevied.isInvalid],
        ["DeptRecvDate", [ew.Validators.datetime(0)], fields.DeptRecvDate.isInvalid],
        ["DeptRecvUser", [], fields.DeptRecvUser.isInvalid],
        ["DeptRecived", [], fields.DeptRecived.isInvalid],
        ["SAuthDate", [ew.Validators.datetime(0)], fields.SAuthDate.isInvalid],
        ["SAuthBy", [], fields.SAuthBy.isInvalid],
        ["SAuthendicate", [], fields.SAuthendicate.isInvalid],
        ["AuthDate", [ew.Validators.datetime(0)], fields.AuthDate.isInvalid],
        ["AuthBy", [], fields.AuthBy.isInvalid],
        ["Authencate", [], fields.Authencate.isInvalid],
        ["EditDate", [ew.Validators.datetime(0)], fields.EditDate.isInvalid],
        ["EditBy", [], fields.EditBy.isInvalid],
        ["Editted", [], fields.Editted.isInvalid],
        ["PatID", [ew.Validators.integer], fields.PatID.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["CId", [ew.Validators.integer], fields.CId.isInvalid],
        ["Order", [ew.Validators.float], fields.Order.isInvalid],
        ["Form", [], fields.Form.isInvalid],
        ["ResType", [], fields.ResType.isInvalid],
        ["Sample", [], fields.Sample.isInvalid],
        ["NoD", [ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [], fields.Formula.isInvalid],
        ["Inactive", [], fields.Inactive.isInvalid],
        ["CollSample", [], fields.CollSample.isInvalid],
        ["TestType", [], fields.TestType.isInvalid],
        ["Repeated", [], fields.Repeated.isInvalid],
        ["RepeatedBy", [], fields.RepeatedBy.isInvalid],
        ["RepeatedDate", [ew.Validators.datetime(0)], fields.RepeatedDate.isInvalid],
        ["serviceID", [ew.Validators.integer], fields.serviceID.isInvalid],
        ["Service_Type", [], fields.Service_Type.isInvalid],
        ["Service_Department", [], fields.Service_Department.isInvalid],
        ["RequestNo", [ew.Validators.integer], fields.RequestNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_servicessearch.setInvalid();
    });

    // Validate form
    fpatient_servicessearch.validate = function () {
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
    fpatient_servicessearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_servicessearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_servicessearch.lists.Services = <?= $Page->Services->toClientList($Page) ?>;
    fpatient_servicessearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_servicessearch.lists.ServiceSelect = <?= $Page->ServiceSelect->toClientList($Page) ?>;
    loadjs.done("fpatient_servicessearch");
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
<form name="fpatient_servicessearch" id="fpatient_servicessearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_services">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_services_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient_services" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_patient_services_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <div id="r_Services" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Services"><?= $Page->Services->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Services->cellAttributes() ?>>
            <span id="el_patient_services_Services" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->Services->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Services->EditAttrs["onchange"] = "";
?>
<span id="as_x_Services" class="ew-auto-suggest">
    <input type="<?= $Page->Services->getInputTextType() ?>" class="form-control" name="sv_x_Services" id="sv_x_Services" value="<?= RemoveHtml($Page->Services->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>"<?= $Page->Services->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_services" data-field="x_Services" data-input="sv_x_Services" data-value-separator="<?= $Page->Services->displayValueSeparatorAttribute() ?>" name="x_Services" id="x_Services" value="<?= HtmlEncode($Page->Services->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_servicessearch"], function() {
    fpatient_servicessearch.createAutoSuggest(Object.assign({"id":"x_Services","forceSelect":true}, ew.vars.tables.patient_services.fields.Services.autoSuggestOptions));
});
</script>
<?= $Page->Services->Lookup->getParamTag($Page, "p_x_Services") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label for="x_amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_amount"><?= $Page->amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_amount" id="z_amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
            <span id="el_patient_services_amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="patient_services" data-field="x_amount" name="x_amount" id="x_amount" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label for="x_description" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_description"><?= $Page->description->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_description" id="z_description" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
            <span id="el_patient_services_description" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->description->getInputTextType() ?>" data-table="patient_services" data-field="x_description" name="x_description" id="x_description" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>" value="<?= $Page->description->EditValue ?>"<?= $Page->description->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <div id="r_patient_type" class="form-group row">
        <label for="x_patient_type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_patient_type"><?= $Page->patient_type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_patient_type" id="z_patient_type" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_type->cellAttributes() ?>>
            <span id="el_patient_services_patient_type" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->patient_type->getInputTextType() ?>" data-table="patient_services" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?= HtmlEncode($Page->patient_type->getPlaceHolder()) ?>" value="<?= $Page->patient_type->EditValue ?>"<?= $Page->patient_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_type->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <div id="r_charged_date" class="form-group row">
        <label for="x_charged_date" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_charged_date"><?= $Page->charged_date->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_charged_date" id="z_charged_date" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->charged_date->cellAttributes() ?>>
            <span id="el_patient_services_charged_date" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->charged_date->getInputTextType() ?>" data-table="patient_services" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?= HtmlEncode($Page->charged_date->getPlaceHolder()) ?>" value="<?= $Page->charged_date->EditValue ?>"<?= $Page->charged_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->charged_date->getErrorMessage(false) ?></div>
<?php if (!$Page->charged_date->ReadOnly && !$Page->charged_date->Disabled && !isset($Page->charged_date->EditAttrs["readonly"]) && !isset($Page->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_patient_services_status" class="ew-search-field ew-search-field-single">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_services_x_status"
        data-table="patient_services"
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
    var el = document.querySelector("select[data-select2-id='patient_services_x_status']"),
        options = { name: "x_status", selectId: "patient_services_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_patient_services_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_services" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_patient_services_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_services" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_patient_services_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_services" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_patient_services_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_services" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_patient_services_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_patient_services_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_services_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_patient_services_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_services_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Unit"><?= $Page->Unit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Unit" id="z_Unit" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
            <span id="el_patient_services_Unit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="patient_services" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Quantity"><?= $Page->Quantity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
            <span id="el_patient_services_Quantity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="patient_services" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="2" maxlength="4" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Discount"><?= $Page->Discount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Discount" id="z_Discount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
            <span id="el_patient_services_Discount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="patient_services" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <div id="r_SubTotal" class="form-group row">
        <label for="x_SubTotal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SubTotal"><?= $Page->SubTotal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SubTotal" id="z_SubTotal" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubTotal->cellAttributes() ?>>
            <span id="el_patient_services_SubTotal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="patient_services" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="8" maxlength="13" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ServiceSelect->Visible) { // ServiceSelect ?>
    <div id="r_ServiceSelect" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ServiceSelect"><?= $Page->ServiceSelect->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ServiceSelect" id="z_ServiceSelect" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ServiceSelect->cellAttributes() ?>>
            <span id="el_patient_services_ServiceSelect" class="ew-search-field ew-search-field-single">
<template id="tp_x_ServiceSelect">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_services" data-field="x_ServiceSelect" name="x_ServiceSelect" id="x_ServiceSelect"<?= $Page->ServiceSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ServiceSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ServiceSelect[]"
    name="x_ServiceSelect[]"
    value="<?= HtmlEncode($Page->ServiceSelect->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ServiceSelect"
    data-target="dsl_x_ServiceSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ServiceSelect->isInvalidClass() ?>"
    data-table="patient_services"
    data-field="x_ServiceSelect"
    data-value-separator="<?= $Page->ServiceSelect->displayValueSeparatorAttribute() ?>"
    <?= $Page->ServiceSelect->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ServiceSelect->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
    <div id="r_Aid" class="form-group row">
        <label for="x_Aid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Aid"><?= $Page->Aid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Aid" id="z_Aid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Aid->cellAttributes() ?>>
            <span id="el_patient_services_Aid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Aid->getInputTextType() ?>" data-table="patient_services" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?= HtmlEncode($Page->Aid->getPlaceHolder()) ?>" value="<?= $Page->Aid->EditValue ?>"<?= $Page->Aid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Aid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <div id="r_Vid" class="form-group row">
        <label for="x_Vid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Vid"><?= $Page->Vid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Vid" id="z_Vid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Vid->cellAttributes() ?>>
            <span id="el_patient_services_Vid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="patient_services" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrID"><?= $Page->DrID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
            <span id="el_patient_services_DrID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="patient_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
    <div id="r_DrCODE" class="form-group row">
        <label for="x_DrCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrCODE"><?= $Page->DrCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrCODE" id="z_DrCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrCODE->cellAttributes() ?>>
            <span id="el_patient_services_DrCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="patient_services" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrName"><?= $Page->DrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
            <span id="el_patient_services_DrName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="patient_services" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <div id="r_Department" class="form-group row">
        <label for="x_Department" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Department"><?= $Page->Department->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Department" id="z_Department" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Department->cellAttributes() ?>>
            <span id="el_patient_services_Department" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
    <div id="r_DrSharePres" class="form-group row">
        <label for="x_DrSharePres" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrSharePres"><?= $Page->DrSharePres->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrSharePres" id="z_DrSharePres" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrSharePres->cellAttributes() ?>>
            <span id="el_patient_services_DrSharePres" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_DrSharePres" name="x_DrSharePres" id="x_DrSharePres" size="30" placeholder="<?= HtmlEncode($Page->DrSharePres->getPlaceHolder()) ?>" value="<?= $Page->DrSharePres->EditValue ?>"<?= $Page->DrSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePres->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
    <div id="r_HospSharePres" class="form-group row">
        <label for="x_HospSharePres" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_HospSharePres"><?= $Page->HospSharePres->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospSharePres" id="z_HospSharePres" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospSharePres->cellAttributes() ?>>
            <span id="el_patient_services_HospSharePres" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospSharePres->getInputTextType() ?>" data-table="patient_services" data-field="x_HospSharePres" name="x_HospSharePres" id="x_HospSharePres" size="30" placeholder="<?= HtmlEncode($Page->HospSharePres->getPlaceHolder()) ?>" value="<?= $Page->HospSharePres->EditValue ?>"<?= $Page->HospSharePres->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePres->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <div id="r_DrShareAmount" class="form-group row">
        <label for="x_DrShareAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrShareAmount"><?= $Page->DrShareAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareAmount" id="z_DrShareAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareAmount->cellAttributes() ?>>
            <span id="el_patient_services_DrShareAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <div id="r_HospShareAmount" class="form-group row">
        <label for="x_HospShareAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_HospShareAmount"><?= $Page->HospShareAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospShareAmount" id="z_HospShareAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospShareAmount->cellAttributes() ?>>
            <span id="el_patient_services_HospShareAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
    <div id="r_DrShareSettiledAmount" class="form-group row">
        <label for="x_DrShareSettiledAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledAmount"><?= $Page->DrShareSettiledAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettiledAmount" id="z_DrShareSettiledAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
            <span id="el_patient_services_DrShareSettiledAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrShareSettiledAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledAmount" name="x_DrShareSettiledAmount" id="x_DrShareSettiledAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledAmount->EditValue ?>"<?= $Page->DrShareSettiledAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
    <div id="r_DrShareSettledId" class="form-group row">
        <label for="x_DrShareSettledId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettledId"><?= $Page->DrShareSettledId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettledId" id="z_DrShareSettledId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettledId->cellAttributes() ?>>
            <span id="el_patient_services_DrShareSettledId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrShareSettledId->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettledId" name="x_DrShareSettledId" id="x_DrShareSettledId" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettledId->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettledId->EditValue ?>"<?= $Page->DrShareSettledId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettledId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
    <div id="r_DrShareSettiledStatus" class="form-group row">
        <label for="x_DrShareSettiledStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DrShareSettiledStatus"><?= $Page->DrShareSettiledStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrShareSettiledStatus" id="z_DrShareSettiledStatus" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
            <span id="el_patient_services_DrShareSettiledStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrShareSettiledStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_DrShareSettiledStatus" name="x_DrShareSettiledStatus" id="x_DrShareSettiledStatus" size="30" placeholder="<?= HtmlEncode($Page->DrShareSettiledStatus->getPlaceHolder()) ?>" value="<?= $Page->DrShareSettiledStatus->EditValue ?>"<?= $Page->DrShareSettiledStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareSettiledStatus->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <div id="r_invoiceId" class="form-group row">
        <label for="x_invoiceId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_invoiceId"><?= $Page->invoiceId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_invoiceId" id="z_invoiceId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceId->cellAttributes() ?>>
            <span id="el_patient_services_invoiceId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <div id="r_invoiceAmount" class="form-group row">
        <label for="x_invoiceAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_invoiceAmount"><?= $Page->invoiceAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_invoiceAmount" id="z_invoiceAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceAmount->cellAttributes() ?>>
            <span id="el_patient_services_invoiceAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->invoiceAmount->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Page->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Page->invoiceAmount->EditValue ?>"<?= $Page->invoiceAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <div id="r_invoiceStatus" class="form-group row">
        <label for="x_invoiceStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_invoiceStatus"><?= $Page->invoiceStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_invoiceStatus" id="z_invoiceStatus" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceStatus->cellAttributes() ?>>
            <span id="el_patient_services_invoiceStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->invoiceStatus->getInputTextType() ?>" data-table="patient_services" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Page->invoiceStatus->EditValue ?>"<?= $Page->invoiceStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceStatus->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <div id="r_modeOfPayment" class="form-group row">
        <label for="x_modeOfPayment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_modeOfPayment"><?= $Page->modeOfPayment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modeOfPayment" id="z_modeOfPayment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modeOfPayment->cellAttributes() ?>>
            <span id="el_patient_services_modeOfPayment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modeOfPayment->getInputTextType() ?>" data-table="patient_services" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->modeOfPayment->EditValue ?>"<?= $Page->modeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modeOfPayment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_patient_services_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_services" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_RIDNO"><?= $Page->RIDNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
            <span id="el_patient_services_RIDNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="patient_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_TidNo"><?= $Page->TidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
            <span id="el_patient_services_TidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="patient_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
    <div id="r_DiscountCategory" class="form-group row">
        <label for="x_DiscountCategory" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DiscountCategory"><?= $Page->DiscountCategory->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountCategory" id="z_DiscountCategory" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountCategory->cellAttributes() ?>>
            <span id="el_patient_services_DiscountCategory" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DiscountCategory->getInputTextType() ?>" data-table="patient_services" data-field="x_DiscountCategory" name="x_DiscountCategory" id="x_DiscountCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountCategory->getPlaceHolder()) ?>" value="<?= $Page->DiscountCategory->EditValue ?>"<?= $Page->DiscountCategory->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountCategory->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <div id="r_sid" class="form-group row">
        <label for="x_sid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_sid"><?= $Page->sid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_sid" id="z_sid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sid->cellAttributes() ?>>
            <span id="el_patient_services_sid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="patient_services" data-field="x_sid" name="x_sid" id="x_sid" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <div id="r_ItemCode" class="form-group row">
        <label for="x_ItemCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ItemCode"><?= $Page->ItemCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemCode->cellAttributes() ?>>
            <span id="el_patient_services_ItemCode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="patient_services" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_TestSubCd"><?= $Page->TestSubCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
            <span id="el_patient_services_TestSubCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="patient_services" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <div id="r_DEptCd" class="form-group row">
        <label for="x_DEptCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DEptCd"><?= $Page->DEptCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEptCd->cellAttributes() ?>>
            <span id="el_patient_services_DEptCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="patient_services" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <div id="r_ProfCd" class="form-group row">
        <label for="x_ProfCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ProfCd"><?= $Page->ProfCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfCd->cellAttributes() ?>>
            <span id="el_patient_services_ProfCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProfCd->getInputTextType() ?>" data-table="patient_services" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProfCd->getPlaceHolder()) ?>" value="<?= $Page->ProfCd->EditValue ?>"<?= $Page->ProfCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
    <div id="r_LabReport" class="form-group row">
        <label for="x_LabReport" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_LabReport"><?= $Page->LabReport->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabReport->cellAttributes() ?>>
            <span id="el_patient_services_LabReport" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LabReport->getInputTextType() ?>" data-table="patient_services" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>" value="<?= $Page->LabReport->EditValue ?>"<?= $Page->LabReport->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <div id="r_Comments" class="form-group row">
        <label for="x_Comments" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Comments"><?= $Page->Comments->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Comments" id="z_Comments" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Comments->cellAttributes() ?>>
            <span id="el_patient_services_Comments" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Comments->getInputTextType() ?>" data-table="patient_services" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Comments->getPlaceHolder()) ?>" value="<?= $Page->Comments->EditValue ?>"<?= $Page->Comments->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Comments->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label for="x_Method" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Method"><?= $Page->Method->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Method" id="z_Method" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
            <span id="el_patient_services_Method" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="patient_services" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <div id="r_Specimen" class="form-group row">
        <label for="x_Specimen" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Specimen"><?= $Page->Specimen->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Specimen->cellAttributes() ?>>
            <span id="el_patient_services_Specimen" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Specimen->getInputTextType() ?>" data-table="patient_services" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Specimen->getPlaceHolder()) ?>" value="<?= $Page->Specimen->EditValue ?>"<?= $Page->Specimen->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Specimen->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Abnormal"><?= $Page->Abnormal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
            <span id="el_patient_services_Abnormal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="patient_services" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_RefValue"><?= $Page->RefValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
            <span id="el_patient_services_RefValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RefValue->getInputTextType() ?>" data-table="patient_services" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>" value="<?= $Page->RefValue->EditValue ?>"<?= $Page->RefValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
    <div id="r_TestUnit" class="form-group row">
        <label for="x_TestUnit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_TestUnit"><?= $Page->TestUnit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestUnit" id="z_TestUnit" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestUnit->cellAttributes() ?>>
            <span id="el_patient_services_TestUnit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestUnit->getInputTextType() ?>" data-table="patient_services" data-field="x_TestUnit" name="x_TestUnit" id="x_TestUnit" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" value="<?= $Page->TestUnit->EditValue ?>"<?= $Page->TestUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <div id="r_LOWHIGH" class="form-group row">
        <label for="x_LOWHIGH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_LOWHIGH"><?= $Page->LOWHIGH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LOWHIGH->cellAttributes() ?>>
            <span id="el_patient_services_LOWHIGH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LOWHIGH->getInputTextType() ?>" data-table="patient_services" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LOWHIGH->getPlaceHolder()) ?>" value="<?= $Page->LOWHIGH->EditValue ?>"<?= $Page->LOWHIGH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LOWHIGH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
    <div id="r_Branch" class="form-group row">
        <label for="x_Branch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Branch"><?= $Page->Branch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Branch" id="z_Branch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Branch->cellAttributes() ?>>
            <span id="el_patient_services_Branch" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Branch->getInputTextType() ?>" data-table="patient_services" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Branch->getPlaceHolder()) ?>" value="<?= $Page->Branch->EditValue ?>"<?= $Page->Branch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Branch->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <div id="r_Dispatch" class="form-group row">
        <label for="x_Dispatch" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Dispatch"><?= $Page->Dispatch->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dispatch->cellAttributes() ?>>
            <span id="el_patient_services_Dispatch" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Dispatch->getInputTextType() ?>" data-table="patient_services" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dispatch->getPlaceHolder()) ?>" value="<?= $Page->Dispatch->EditValue ?>"<?= $Page->Dispatch->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dispatch->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <div id="r_Pic1" class="form-group row">
        <label for="x_Pic1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Pic1"><?= $Page->Pic1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic1->cellAttributes() ?>>
            <span id="el_patient_services_Pic1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pic1->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic1->getPlaceHolder()) ?>" value="<?= $Page->Pic1->EditValue ?>"<?= $Page->Pic1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <div id="r_Pic2" class="form-group row">
        <label for="x_Pic2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Pic2"><?= $Page->Pic2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pic2->cellAttributes() ?>>
            <span id="el_patient_services_Pic2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pic2->getInputTextType() ?>" data-table="patient_services" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pic2->getPlaceHolder()) ?>" value="<?= $Page->Pic2->EditValue ?>"<?= $Page->Pic2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <div id="r_GraphPath" class="form-group row">
        <label for="x_GraphPath" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_GraphPath"><?= $Page->GraphPath->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GraphPath->cellAttributes() ?>>
            <span id="el_patient_services_GraphPath" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GraphPath->getInputTextType() ?>" data-table="patient_services" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GraphPath->getPlaceHolder()) ?>" value="<?= $Page->GraphPath->EditValue ?>"<?= $Page->GraphPath->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GraphPath->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <div id="r_MachineCD" class="form-group row">
        <label for="x_MachineCD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_MachineCD"><?= $Page->MachineCD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MachineCD->cellAttributes() ?>>
            <span id="el_patient_services_MachineCD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MachineCD->getInputTextType() ?>" data-table="patient_services" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MachineCD->getPlaceHolder()) ?>" value="<?= $Page->MachineCD->EditValue ?>"<?= $Page->MachineCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MachineCD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <div id="r_TestCancel" class="form-group row">
        <label for="x_TestCancel" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_TestCancel"><?= $Page->TestCancel->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestCancel->cellAttributes() ?>>
            <span id="el_patient_services_TestCancel" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestCancel->getInputTextType() ?>" data-table="patient_services" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestCancel->getPlaceHolder()) ?>" value="<?= $Page->TestCancel->EditValue ?>"<?= $Page->TestCancel->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestCancel->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <div id="r_OutSource" class="form-group row">
        <label for="x_OutSource" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_OutSource"><?= $Page->OutSource->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OutSource->cellAttributes() ?>>
            <span id="el_patient_services_OutSource" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OutSource->getInputTextType() ?>" data-table="patient_services" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OutSource->getPlaceHolder()) ?>" value="<?= $Page->OutSource->EditValue ?>"<?= $Page->OutSource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OutSource->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <div id="r_Printed" class="form-group row">
        <label for="x_Printed" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Printed"><?= $Page->Printed->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printed" id="z_Printed" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printed->cellAttributes() ?>>
            <span id="el_patient_services_Printed" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Printed->getInputTextType() ?>" data-table="patient_services" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Printed->getPlaceHolder()) ?>" value="<?= $Page->Printed->EditValue ?>"<?= $Page->Printed->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printed->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <div id="r_PrintBy" class="form-group row">
        <label for="x_PrintBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_PrintBy"><?= $Page->PrintBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintBy->cellAttributes() ?>>
            <span id="el_patient_services_PrintBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrintBy->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrintBy->getPlaceHolder()) ?>" value="<?= $Page->PrintBy->EditValue ?>"<?= $Page->PrintBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <div id="r_PrintDate" class="form-group row">
        <label for="x_PrintDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_PrintDate"><?= $Page->PrintDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PrintDate" id="z_PrintDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrintDate->cellAttributes() ?>>
            <span id="el_patient_services_PrintDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrintDate->getInputTextType() ?>" data-table="patient_services" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?= HtmlEncode($Page->PrintDate->getPlaceHolder()) ?>" value="<?= $Page->PrintDate->EditValue ?>"<?= $Page->PrintDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrintDate->getErrorMessage(false) ?></div>
<?php if (!$Page->PrintDate->ReadOnly && !$Page->PrintDate->Disabled && !isset($Page->PrintDate->EditAttrs["readonly"]) && !isset($Page->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
    <div id="r_BillingDate" class="form-group row">
        <label for="x_BillingDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_BillingDate"><?= $Page->BillingDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillingDate" id="z_BillingDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillingDate->cellAttributes() ?>>
            <span id="el_patient_services_BillingDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillingDate->getInputTextType() ?>" data-table="patient_services" data-field="x_BillingDate" name="x_BillingDate" id="x_BillingDate" placeholder="<?= HtmlEncode($Page->BillingDate->getPlaceHolder()) ?>" value="<?= $Page->BillingDate->EditValue ?>"<?= $Page->BillingDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillingDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillingDate->ReadOnly && !$Page->BillingDate->Disabled && !isset($Page->BillingDate->EditAttrs["readonly"]) && !isset($Page->BillingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_BillingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
    <div id="r_BilledBy" class="form-group row">
        <label for="x_BilledBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_BilledBy"><?= $Page->BilledBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BilledBy" id="z_BilledBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BilledBy->cellAttributes() ?>>
            <span id="el_patient_services_BilledBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BilledBy->getInputTextType() ?>" data-table="patient_services" data-field="x_BilledBy" name="x_BilledBy" id="x_BilledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BilledBy->getPlaceHolder()) ?>" value="<?= $Page->BilledBy->EditValue ?>"<?= $Page->BilledBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BilledBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
    <div id="r_Resulted" class="form-group row">
        <label for="x_Resulted" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Resulted"><?= $Page->Resulted->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Resulted" id="z_Resulted" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Resulted->cellAttributes() ?>>
            <span id="el_patient_services_Resulted" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Resulted->getInputTextType() ?>" data-table="patient_services" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resulted->getPlaceHolder()) ?>" value="<?= $Page->Resulted->EditValue ?>"<?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ResultDate"><?= $Page->ResultDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ResultDate" id="z_ResultDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
            <span id="el_patient_services_ResultDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <div id="r_ResultedBy" class="form-group row">
        <label for="x_ResultedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ResultedBy"><?= $Page->ResultedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResultedBy" id="z_ResultedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultedBy->cellAttributes() ?>>
            <span id="el_patient_services_ResultedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <div id="r_SampleDate" class="form-group row">
        <label for="x_SampleDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SampleDate"><?= $Page->SampleDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SampleDate" id="z_SampleDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleDate->cellAttributes() ?>>
            <span id="el_patient_services_SampleDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SampleDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?= HtmlEncode($Page->SampleDate->getPlaceHolder()) ?>" value="<?= $Page->SampleDate->EditValue ?>"<?= $Page->SampleDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SampleDate->ReadOnly && !$Page->SampleDate->Disabled && !isset($Page->SampleDate->EditAttrs["readonly"]) && !isset($Page->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <div id="r_SampleUser" class="form-group row">
        <label for="x_SampleUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SampleUser"><?= $Page->SampleUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleUser->cellAttributes() ?>>
            <span id="el_patient_services_SampleUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SampleUser->getInputTextType() ?>" data-table="patient_services" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleUser->getPlaceHolder()) ?>" value="<?= $Page->SampleUser->EditValue ?>"<?= $Page->SampleUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SampleUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
    <div id="r_Sampled" class="form-group row">
        <label for="x_Sampled" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Sampled"><?= $Page->Sampled->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Sampled" id="z_Sampled" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sampled->cellAttributes() ?>>
            <span id="el_patient_services_Sampled" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Sampled->getInputTextType() ?>" data-table="patient_services" data-field="x_Sampled" name="x_Sampled" id="x_Sampled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Sampled->getPlaceHolder()) ?>" value="<?= $Page->Sampled->EditValue ?>"<?= $Page->Sampled->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sampled->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <div id="r_ReceivedDate" class="form-group row">
        <label for="x_ReceivedDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedDate"><?= $Page->ReceivedDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedDate->cellAttributes() ?>>
            <span id="el_patient_services_ReceivedDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReceivedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?= HtmlEncode($Page->ReceivedDate->getPlaceHolder()) ?>" value="<?= $Page->ReceivedDate->EditValue ?>"<?= $Page->ReceivedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ReceivedDate->ReadOnly && !$Page->ReceivedDate->Disabled && !isset($Page->ReceivedDate->EditAttrs["readonly"]) && !isset($Page->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <div id="r_ReceivedUser" class="form-group row">
        <label for="x_ReceivedUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ReceivedUser"><?= $Page->ReceivedUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReceivedUser->cellAttributes() ?>>
            <span id="el_patient_services_ReceivedUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReceivedUser->getInputTextType() ?>" data-table="patient_services" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReceivedUser->getPlaceHolder()) ?>" value="<?= $Page->ReceivedUser->EditValue ?>"<?= $Page->ReceivedUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
    <div id="r_Recevied" class="form-group row">
        <label for="x_Recevied" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Recevied"><?= $Page->Recevied->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Recevied" id="z_Recevied" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Recevied->cellAttributes() ?>>
            <span id="el_patient_services_Recevied" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Recevied->getInputTextType() ?>" data-table="patient_services" data-field="x_Recevied" name="x_Recevied" id="x_Recevied" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Recevied->getPlaceHolder()) ?>" value="<?= $Page->Recevied->EditValue ?>"<?= $Page->Recevied->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Recevied->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <div id="r_DeptRecvDate" class="form-group row">
        <label for="x_DeptRecvDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvDate"><?= $Page->DeptRecvDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvDate->cellAttributes() ?>>
            <span id="el_patient_services_DeptRecvDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptRecvDate->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?= HtmlEncode($Page->DeptRecvDate->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvDate->EditValue ?>"<?= $Page->DeptRecvDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DeptRecvDate->ReadOnly && !$Page->DeptRecvDate->Disabled && !isset($Page->DeptRecvDate->EditAttrs["readonly"]) && !isset($Page->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <div id="r_DeptRecvUser" class="form-group row">
        <label for="x_DeptRecvUser" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecvUser"><?= $Page->DeptRecvUser->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecvUser->cellAttributes() ?>>
            <span id="el_patient_services_DeptRecvUser" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptRecvUser->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecvUser->getPlaceHolder()) ?>" value="<?= $Page->DeptRecvUser->EditValue ?>"<?= $Page->DeptRecvUser->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecvUser->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
    <div id="r_DeptRecived" class="form-group row">
        <label for="x_DeptRecived" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_DeptRecived"><?= $Page->DeptRecived->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecived" id="z_DeptRecived" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeptRecived->cellAttributes() ?>>
            <span id="el_patient_services_DeptRecived" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DeptRecived->getInputTextType() ?>" data-table="patient_services" data-field="x_DeptRecived" name="x_DeptRecived" id="x_DeptRecived" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeptRecived->getPlaceHolder()) ?>" value="<?= $Page->DeptRecived->EditValue ?>"<?= $Page->DeptRecived->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DeptRecived->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <div id="r_SAuthDate" class="form-group row">
        <label for="x_SAuthDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SAuthDate"><?= $Page->SAuthDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthDate->cellAttributes() ?>>
            <span id="el_patient_services_SAuthDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?= HtmlEncode($Page->SAuthDate->getPlaceHolder()) ?>" value="<?= $Page->SAuthDate->EditValue ?>"<?= $Page->SAuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthDate->getErrorMessage(false) ?></div>
<?php if (!$Page->SAuthDate->ReadOnly && !$Page->SAuthDate->Disabled && !isset($Page->SAuthDate->EditAttrs["readonly"]) && !isset($Page->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <div id="r_SAuthBy" class="form-group row">
        <label for="x_SAuthBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SAuthBy"><?= $Page->SAuthBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthBy->cellAttributes() ?>>
            <span id="el_patient_services_SAuthBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthBy->getPlaceHolder()) ?>" value="<?= $Page->SAuthBy->EditValue ?>"<?= $Page->SAuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
    <div id="r_SAuthendicate" class="form-group row">
        <label for="x_SAuthendicate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_SAuthendicate"><?= $Page->SAuthendicate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthendicate" id="z_SAuthendicate" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAuthendicate->cellAttributes() ?>>
            <span id="el_patient_services_SAuthendicate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAuthendicate->getInputTextType() ?>" data-table="patient_services" data-field="x_SAuthendicate" name="x_SAuthendicate" id="x_SAuthendicate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAuthendicate->getPlaceHolder()) ?>" value="<?= $Page->SAuthendicate->EditValue ?>"<?= $Page->SAuthendicate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAuthendicate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <div id="r_AuthDate" class="form-group row">
        <label for="x_AuthDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_AuthDate"><?= $Page->AuthDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_AuthDate" id="z_AuthDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthDate->cellAttributes() ?>>
            <span id="el_patient_services_AuthDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AuthDate->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?= HtmlEncode($Page->AuthDate->getPlaceHolder()) ?>" value="<?= $Page->AuthDate->EditValue ?>"<?= $Page->AuthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthDate->getErrorMessage(false) ?></div>
<?php if (!$Page->AuthDate->ReadOnly && !$Page->AuthDate->Disabled && !isset($Page->AuthDate->EditAttrs["readonly"]) && !isset($Page->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <div id="r_AuthBy" class="form-group row">
        <label for="x_AuthBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_AuthBy"><?= $Page->AuthBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AuthBy->cellAttributes() ?>>
            <span id="el_patient_services_AuthBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AuthBy->getInputTextType() ?>" data-table="patient_services" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AuthBy->getPlaceHolder()) ?>" value="<?= $Page->AuthBy->EditValue ?>"<?= $Page->AuthBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AuthBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
    <div id="r_Authencate" class="form-group row">
        <label for="x_Authencate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Authencate"><?= $Page->Authencate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Authencate" id="z_Authencate" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Authencate->cellAttributes() ?>>
            <span id="el_patient_services_Authencate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Authencate->getInputTextType() ?>" data-table="patient_services" data-field="x_Authencate" name="x_Authencate" id="x_Authencate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Authencate->getPlaceHolder()) ?>" value="<?= $Page->Authencate->EditValue ?>"<?= $Page->Authencate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Authencate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <div id="r_EditDate" class="form-group row">
        <label for="x_EditDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_EditDate"><?= $Page->EditDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_EditDate" id="z_EditDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditDate->cellAttributes() ?>>
            <span id="el_patient_services_EditDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EditDate->getInputTextType() ?>" data-table="patient_services" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?= HtmlEncode($Page->EditDate->getPlaceHolder()) ?>" value="<?= $Page->EditDate->EditValue ?>"<?= $Page->EditDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditDate->getErrorMessage(false) ?></div>
<?php if (!$Page->EditDate->ReadOnly && !$Page->EditDate->Disabled && !isset($Page->EditDate->EditAttrs["readonly"]) && !isset($Page->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
    <div id="r_EditBy" class="form-group row">
        <label for="x_EditBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_EditBy"><?= $Page->EditBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_EditBy" id="z_EditBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EditBy->cellAttributes() ?>>
            <span id="el_patient_services_EditBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EditBy->getInputTextType() ?>" data-table="patient_services" data-field="x_EditBy" name="x_EditBy" id="x_EditBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EditBy->getPlaceHolder()) ?>" value="<?= $Page->EditBy->EditValue ?>"<?= $Page->EditBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EditBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
    <div id="r_Editted" class="form-group row">
        <label for="x_Editted" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Editted"><?= $Page->Editted->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Editted" id="z_Editted" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Editted->cellAttributes() ?>>
            <span id="el_patient_services_Editted" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Editted->getInputTextType() ?>" data-table="patient_services" data-field="x_Editted" name="x_Editted" id="x_Editted" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Editted->getPlaceHolder()) ?>" value="<?= $Page->Editted->EditValue ?>"<?= $Page->Editted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Editted->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_PatID"><?= $Page->PatID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
            <span id="el_patient_services_PatID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_services" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_patient_services_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Mobile"><?= $Page->Mobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
            <span id="el_patient_services_Mobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="patient_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label for="x_CId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_CId"><?= $Page->CId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
            <span id="el_patient_services_CId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="patient_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label for="x_Order" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Order"><?= $Page->Order->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Order" id="z_Order" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
            <span id="el_patient_services_Order" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="patient_services" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label for="x_Form" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Form"><?= $Page->Form->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Form" id="z_Form" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
            <span id="el_patient_services_Form" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Form->getInputTextType() ?>" data-table="patient_services" data-field="x_Form" name="x_Form" id="x_Form" size="35" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>" value="<?= $Page->Form->EditValue ?>"<?= $Page->Form->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <div id="r_ResType" class="form-group row">
        <label for="x_ResType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_ResType"><?= $Page->ResType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResType" id="z_ResType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResType->cellAttributes() ?>>
            <span id="el_patient_services_ResType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="patient_services" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <div id="r_Sample" class="form-group row">
        <label for="x_Sample" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Sample"><?= $Page->Sample->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Sample" id="z_Sample" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sample->cellAttributes() ?>>
            <span id="el_patient_services_Sample" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="patient_services" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <div id="r_NoD" class="form-group row">
        <label for="x_NoD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_NoD"><?= $Page->NoD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NoD" id="z_NoD" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoD->cellAttributes() ?>>
            <span id="el_patient_services_NoD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="patient_services" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <div id="r_BillOrder" class="form-group row">
        <label for="x_BillOrder" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_BillOrder"><?= $Page->BillOrder->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillOrder" id="z_BillOrder" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillOrder->cellAttributes() ?>>
            <span id="el_patient_services_BillOrder" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="patient_services" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <div id="r_Formula" class="form-group row">
        <label for="x_Formula" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Formula"><?= $Page->Formula->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Formula" id="z_Formula" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Formula->cellAttributes() ?>>
            <span id="el_patient_services_Formula" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Formula->getInputTextType() ?>" data-table="patient_services" data-field="x_Formula" name="x_Formula" id="x_Formula" size="35" placeholder="<?= HtmlEncode($Page->Formula->getPlaceHolder()) ?>" value="<?= $Page->Formula->EditValue ?>"<?= $Page->Formula->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Formula->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <div id="r_Inactive" class="form-group row">
        <label for="x_Inactive" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Inactive"><?= $Page->Inactive->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Inactive" id="z_Inactive" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inactive->cellAttributes() ?>>
            <span id="el_patient_services_Inactive" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="patient_services" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <div id="r_CollSample" class="form-group row">
        <label for="x_CollSample" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_CollSample"><?= $Page->CollSample->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CollSample" id="z_CollSample" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollSample->cellAttributes() ?>>
            <span id="el_patient_services_CollSample" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="patient_services" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <div id="r_TestType" class="form-group row">
        <label for="x_TestType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_TestType"><?= $Page->TestType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestType" id="z_TestType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestType->cellAttributes() ?>>
            <span id="el_patient_services_TestType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="patient_services" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
    <div id="r_Repeated" class="form-group row">
        <label for="x_Repeated" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Repeated"><?= $Page->Repeated->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Repeated" id="z_Repeated" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Repeated->cellAttributes() ?>>
            <span id="el_patient_services_Repeated" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Repeated->getInputTextType() ?>" data-table="patient_services" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Repeated->getPlaceHolder()) ?>" value="<?= $Page->Repeated->EditValue ?>"<?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
    <div id="r_RepeatedBy" class="form-group row">
        <label for="x_RepeatedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedBy"><?= $Page->RepeatedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RepeatedBy" id="z_RepeatedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RepeatedBy->cellAttributes() ?>>
            <span id="el_patient_services_RepeatedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RepeatedBy->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedBy" name="x_RepeatedBy" id="x_RepeatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RepeatedBy->getPlaceHolder()) ?>" value="<?= $Page->RepeatedBy->EditValue ?>"<?= $Page->RepeatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
    <div id="r_RepeatedDate" class="form-group row">
        <label for="x_RepeatedDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_RepeatedDate"><?= $Page->RepeatedDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RepeatedDate" id="z_RepeatedDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RepeatedDate->cellAttributes() ?>>
            <span id="el_patient_services_RepeatedDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RepeatedDate->getInputTextType() ?>" data-table="patient_services" data-field="x_RepeatedDate" name="x_RepeatedDate" id="x_RepeatedDate" placeholder="<?= HtmlEncode($Page->RepeatedDate->getPlaceHolder()) ?>" value="<?= $Page->RepeatedDate->EditValue ?>"<?= $Page->RepeatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RepeatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->RepeatedDate->ReadOnly && !$Page->RepeatedDate->Disabled && !isset($Page->RepeatedDate->EditAttrs["readonly"]) && !isset($Page->RepeatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_servicessearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_servicessearch", "x_RepeatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
    <div id="r_serviceID" class="form-group row">
        <label for="x_serviceID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_serviceID"><?= $Page->serviceID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_serviceID" id="z_serviceID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->serviceID->cellAttributes() ?>>
            <span id="el_patient_services_serviceID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->serviceID->getInputTextType() ?>" data-table="patient_services" data-field="x_serviceID" name="x_serviceID" id="x_serviceID" size="30" placeholder="<?= HtmlEncode($Page->serviceID->getPlaceHolder()) ?>" value="<?= $Page->serviceID->EditValue ?>"<?= $Page->serviceID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->serviceID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
    <div id="r_Service_Type" class="form-group row">
        <label for="x_Service_Type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Service_Type"><?= $Page->Service_Type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Service_Type" id="z_Service_Type" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Service_Type->cellAttributes() ?>>
            <span id="el_patient_services_Service_Type" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Service_Type->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Type" name="x_Service_Type" id="x_Service_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Type->getPlaceHolder()) ?>" value="<?= $Page->Service_Type->EditValue ?>"<?= $Page->Service_Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Type->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
    <div id="r_Service_Department" class="form-group row">
        <label for="x_Service_Department" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_Service_Department"><?= $Page->Service_Department->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Service_Department" id="z_Service_Department" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Service_Department->cellAttributes() ?>>
            <span id="el_patient_services_Service_Department" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Service_Department->getInputTextType() ?>" data-table="patient_services" data-field="x_Service_Department" name="x_Service_Department" id="x_Service_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Service_Department->getPlaceHolder()) ?>" value="<?= $Page->Service_Department->EditValue ?>"<?= $Page->Service_Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Service_Department->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
    <div id="r_RequestNo" class="form-group row">
        <label for="x_RequestNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_services_RequestNo"><?= $Page->RequestNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RequestNo" id="z_RequestNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestNo->cellAttributes() ?>>
            <span id="el_patient_services_RequestNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RequestNo->getInputTextType() ?>" data-table="patient_services" data-field="x_RequestNo" name="x_RequestNo" id="x_RequestNo" size="30" placeholder="<?= HtmlEncode($Page->RequestNo->getPlaceHolder()) ?>" value="<?= $Page->RequestNo->EditValue ?>"<?= $Page->RequestNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestNo->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("patient_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
