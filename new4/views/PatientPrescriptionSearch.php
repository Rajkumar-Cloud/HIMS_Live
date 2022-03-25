<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientPrescriptionSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptionsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpatient_prescriptionsearch = currentAdvancedSearchForm = new ew.Form("fpatient_prescriptionsearch", "search");
    <?php } else { ?>
    fpatient_prescriptionsearch = currentForm = new ew.Form("fpatient_prescriptionsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_prescription")) ?>,
        fields = currentTable.fields;
    fpatient_prescriptionsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["Reception", [ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [ew.Validators.integer], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Medicine", [], fields.Medicine.isInvalid],
        ["M", [], fields.M.isInvalid],
        ["A", [], fields.A.isInvalid],
        ["N", [], fields.N.isInvalid],
        ["NoOfDays", [], fields.NoOfDays.isInvalid],
        ["PreRoute", [], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [], fields.TimeOfTaking.isInvalid],
        ["Type", [], fields.Type.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["Status", [], fields.Status.isInvalid],
        ["CreatedBy", [], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpatient_prescriptionsearch.setInvalid();
    });

    // Validate form
    fpatient_prescriptionsearch.validate = function () {
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
    fpatient_prescriptionsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_prescriptionsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_prescriptionsearch.lists.Medicine = <?= $Page->Medicine->toClientList($Page) ?>;
    fpatient_prescriptionsearch.lists.PreRoute = <?= $Page->PreRoute->toClientList($Page) ?>;
    fpatient_prescriptionsearch.lists.TimeOfTaking = <?= $Page->TimeOfTaking->toClientList($Page) ?>;
    fpatient_prescriptionsearch.lists.Type = <?= $Page->Type->toClientList($Page) ?>;
    fpatient_prescriptionsearch.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    loadjs.done("fpatient_prescriptionsearch");
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
<form name="fpatient_prescriptionsearch" id="fpatient_prescriptionsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_patient_prescription_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="patient_prescription" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_patient_prescription_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_patient_prescription_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_patient_prescription_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <div id="r_Medicine" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Medicine"><?= $Page->Medicine->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Medicine" id="z_Medicine" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicine->cellAttributes() ?>>
            <span id="el_patient_prescription_Medicine" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?= HtmlEncode($Page->Medicine->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_prescriptionsearch"], function() {
    fpatient_prescriptionsearch.createAutoSuggest(Object.assign({"id":"x_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x_Medicine") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label for="x_M" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_M"><?= $Page->M->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_M" id="z_M" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
            <span id="el_patient_prescription_M" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label for="x_A" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_A"><?= $Page->A->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_A" id="z_A" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
            <span id="el_patient_prescription_A" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <div id="r_N" class="form-group row">
        <label for="x_N" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_N"><?= $Page->N->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_N" id="z_N" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->N->cellAttributes() ?>>
            <span id="el_patient_prescription_N" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <div id="r_NoOfDays" class="form-group row">
        <label for="x_NoOfDays" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_NoOfDays"><?= $Page->NoOfDays->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoOfDays" id="z_NoOfDays" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfDays->cellAttributes() ?>>
            <span id="el_patient_prescription_NoOfDays" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <div id="r_PreRoute" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_PreRoute"><?= $Page->PreRoute->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PreRoute" id="z_PreRoute" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreRoute->cellAttributes() ?>>
            <span id="el_patient_prescription_PreRoute" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute" class="ew-auto-suggest">
    <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x_PreRoute" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?= HtmlEncode($Page->PreRoute->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_prescriptionsearch"], function() {
    fpatient_prescriptionsearch.createAutoSuggest(Object.assign({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x_PreRoute") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <div id="r_TimeOfTaking" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TimeOfTaking" id="z_TimeOfTaking" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeOfTaking->cellAttributes() ?>>
            <span id="el_patient_prescription_TimeOfTaking" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking" class="ew-auto-suggest">
    <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpatient_prescriptionsearch"], function() {
    fpatient_prescriptionsearch.createAutoSuggest(Object.assign({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x_TimeOfTaking") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label for="x_Type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Type"><?= $Page->Type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Type" id="z_Type" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
            <span id="el_patient_prescription_Type" class="ew-search-field ew-search-field-single">
    <select
        id="x_Type"
        name="x_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x_Type']"),
        options = { name: "x_Type", selectId: "patient_prescription_x_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_patient_prescription_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_patient_prescription_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_patient_prescription_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_patient_prescription_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label for="x_Status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_Status"><?= $Page->Status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Status" id="z_Status" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
            <span id="el_patient_prescription_Status" class="ew-search-field ew-search-field-single">
    <select
        id="x_Status"
        name="x_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage(false) ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x_Status']"),
        options = { name: "x_Status", selectId: "patient_prescription_x_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_CreatedBy"><?= $Page->CreatedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
            <span id="el_patient_prescription_CreatedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <div id="r_CreateDateTime" class="form-group row">
        <label for="x_CreateDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_CreateDateTime"><?= $Page->CreateDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CreateDateTime" id="z_CreateDateTime" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreateDateTime->cellAttributes() ?>>
            <span id="el_patient_prescription_CreateDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
            <span id="el_patient_prescription_ModifiedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
            <span id="el_patient_prescription_ModifiedDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("patient_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
