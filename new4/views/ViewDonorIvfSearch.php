<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDonorIvfSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_donor_ivfsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_donor_ivfsearch = currentAdvancedSearchForm = new ew.Form("fview_donor_ivfsearch", "search");
    <?php } else { ?>
    fview_donor_ivfsearch = currentForm = new ew.Form("fview_donor_ivfsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_donor_ivf")) ?>,
        fields = currentTable.fields;
    fview_donor_ivfsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["Male", [ew.Validators.integer], fields.Male.isInvalid],
        ["Female", [], fields.Female.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["createdby", [ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["malepropic", [], fields.malepropic.isInvalid],
        ["femalepropic", [], fields.femalepropic.isInvalid],
        ["HusbandEducation", [], fields.HusbandEducation.isInvalid],
        ["WifeEducation", [], fields.WifeEducation.isInvalid],
        ["HusbandWorkHours", [], fields.HusbandWorkHours.isInvalid],
        ["WifeWorkHours", [], fields.WifeWorkHours.isInvalid],
        ["PatientLanguage", [], fields.PatientLanguage.isInvalid],
        ["ReferedBy", [], fields.ReferedBy.isInvalid],
        ["ReferPhNo", [], fields.ReferPhNo.isInvalid],
        ["WifeCell", [], fields.WifeCell.isInvalid],
        ["HusbandCell", [], fields.HusbandCell.isInvalid],
        ["WifeEmail", [], fields.WifeEmail.isInvalid],
        ["HusbandEmail", [], fields.HusbandEmail.isInvalid],
        ["ARTCYCLE", [], fields.ARTCYCLE.isInvalid],
        ["RESULT", [], fields.RESULT.isInvalid],
        ["CoupleID", [], fields.CoupleID.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["DrID", [], fields.DrID.isInvalid],
        ["DrDepartment", [], fields.DrDepartment.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["femalepic", [], fields.femalepic.isInvalid],
        ["Fgender", [], fields.Fgender.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_donor_ivfsearch.setInvalid();
    });

    // Validate form
    fview_donor_ivfsearch.validate = function () {
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
    fview_donor_ivfsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_donor_ivfsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_donor_ivfsearch.lists.Female = <?= $Page->Female->toClientList($Page) ?>;
    fview_donor_ivfsearch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fview_donor_ivfsearch.lists.ReferedBy = <?= $Page->ReferedBy->toClientList($Page) ?>;
    fview_donor_ivfsearch.lists.DrID = <?= $Page->DrID->toClientList($Page) ?>;
    loadjs.done("fview_donor_ivfsearch");
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
<form name="fview_donor_ivfsearch" id="fview_donor_ivfsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_donor_ivf_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
    <div id="r_Male" class="form-group row">
        <label for="x_Male" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Male"><?= $Page->Male->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Male" id="z_Male" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Male->cellAttributes() ?>>
            <span id="el_view_donor_ivf_Male" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Male->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?= HtmlEncode($Page->Male->getPlaceHolder()) ?>" value="<?= $Page->Male->EditValue ?>"<?= $Page->Male->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Male->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
    <div id="r_Female" class="form-group row">
        <label for="x_Female" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Female"><?= $Page->Female->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Female" id="z_Female" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Female->cellAttributes() ?>>
            <span id="el_view_donor_ivf_Female" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Female->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?= HtmlEncode($Page->Female->getPlaceHolder()) ?>" value="<?= $Page->Female->EditValue ?>"<?= $Page->Female->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Female->getErrorMessage(false) ?></div>
<?= $Page->Female->Lookup->getParamTag($Page, "p_x_Female") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label for="x_status" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_status"><?= $Page->status->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
            <span id="el_view_donor_ivf_status" class="ew-search-field ew-search-field-single">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="view_donor_ivf_x_status"
        data-table="view_donor_ivf"
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
    var el = document.querySelector("select[data-select2-id='view_donor_ivf_x_status']"),
        options = { name: "x_status", selectId: "view_donor_ivf_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_donor_ivf.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_donor_ivf_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_view_donor_ivf_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_donor_ivfsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_donor_ivfsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_view_donor_ivf_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_view_donor_ivf_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_donor_ivfsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_donor_ivfsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
    <div id="r_malepropic" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_malepropic"><?= $Page->malepropic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_malepropic" id="z_malepropic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->malepropic->cellAttributes() ?>>
            <span id="el_view_donor_ivf_malepropic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->malepropic->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" placeholder="<?= HtmlEncode($Page->malepropic->getPlaceHolder()) ?>" value="<?= $Page->malepropic->EditValue ?>"<?= $Page->malepropic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->malepropic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
    <div id="r_femalepropic" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepropic"><?= $Page->femalepropic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_femalepropic" id="z_femalepropic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->femalepropic->cellAttributes() ?>>
            <span id="el_view_donor_ivf_femalepropic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->femalepropic->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" placeholder="<?= HtmlEncode($Page->femalepropic->getPlaceHolder()) ?>" value="<?= $Page->femalepropic->EditValue ?>"<?= $Page->femalepropic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->femalepropic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
    <div id="r_HusbandEducation" class="form-group row">
        <label for="x_HusbandEducation" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEducation"><?= $Page->HusbandEducation->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandEducation" id="z_HusbandEducation" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEducation->cellAttributes() ?>>
            <span id="el_view_donor_ivf_HusbandEducation" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HusbandEducation->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEducation->getPlaceHolder()) ?>" value="<?= $Page->HusbandEducation->EditValue ?>"<?= $Page->HusbandEducation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HusbandEducation->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
    <div id="r_WifeEducation" class="form-group row">
        <label for="x_WifeEducation" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEducation"><?= $Page->WifeEducation->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeEducation" id="z_WifeEducation" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEducation->cellAttributes() ?>>
            <span id="el_view_donor_ivf_WifeEducation" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WifeEducation->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEducation->getPlaceHolder()) ?>" value="<?= $Page->WifeEducation->EditValue ?>"<?= $Page->WifeEducation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WifeEducation->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
    <div id="r_HusbandWorkHours" class="form-group row">
        <label for="x_HusbandWorkHours" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandWorkHours"><?= $Page->HusbandWorkHours->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandWorkHours" id="z_HusbandWorkHours" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandWorkHours->cellAttributes() ?>>
            <span id="el_view_donor_ivf_HusbandWorkHours" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HusbandWorkHours->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandWorkHours->getPlaceHolder()) ?>" value="<?= $Page->HusbandWorkHours->EditValue ?>"<?= $Page->HusbandWorkHours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HusbandWorkHours->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
    <div id="r_WifeWorkHours" class="form-group row">
        <label for="x_WifeWorkHours" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeWorkHours"><?= $Page->WifeWorkHours->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeWorkHours" id="z_WifeWorkHours" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeWorkHours->cellAttributes() ?>>
            <span id="el_view_donor_ivf_WifeWorkHours" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WifeWorkHours->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeWorkHours->getPlaceHolder()) ?>" value="<?= $Page->WifeWorkHours->EditValue ?>"<?= $Page->WifeWorkHours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WifeWorkHours->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
    <div id="r_PatientLanguage" class="form-group row">
        <label for="x_PatientLanguage" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientLanguage"><?= $Page->PatientLanguage->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientLanguage" id="z_PatientLanguage" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientLanguage->cellAttributes() ?>>
            <span id="el_view_donor_ivf_PatientLanguage" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientLanguage->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientLanguage->getPlaceHolder()) ?>" value="<?= $Page->PatientLanguage->EditValue ?>"<?= $Page->PatientLanguage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientLanguage->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
    <div id="r_ReferedBy" class="form-group row">
        <label for="x_ReferedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferedBy"><?= $Page->ReferedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedBy" id="z_ReferedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedBy->cellAttributes() ?>>
            <span id="el_view_donor_ivf_ReferedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferedBy->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_ReferedBy" name="x_ReferedBy" id="x_ReferedBy" size="30" placeholder="<?= HtmlEncode($Page->ReferedBy->getPlaceHolder()) ?>" value="<?= $Page->ReferedBy->EditValue ?>"<?= $Page->ReferedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferedBy->getErrorMessage(false) ?></div>
<?= $Page->ReferedBy->Lookup->getParamTag($Page, "p_x_ReferedBy") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
    <div id="r_ReferPhNo" class="form-group row">
        <label for="x_ReferPhNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferPhNo"><?= $Page->ReferPhNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferPhNo" id="z_ReferPhNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferPhNo->cellAttributes() ?>>
            <span id="el_view_donor_ivf_ReferPhNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ReferPhNo->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferPhNo->getPlaceHolder()) ?>" value="<?= $Page->ReferPhNo->EditValue ?>"<?= $Page->ReferPhNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReferPhNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <div id="r_WifeCell" class="form-group row">
        <label for="x_WifeCell" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeCell"><?= $Page->WifeCell->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeCell->cellAttributes() ?>>
            <span id="el_view_donor_ivf_WifeCell" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WifeCell->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeCell->getPlaceHolder()) ?>" value="<?= $Page->WifeCell->EditValue ?>"<?= $Page->WifeCell->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WifeCell->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <div id="r_HusbandCell" class="form-group row">
        <label for="x_HusbandCell" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandCell"><?= $Page->HusbandCell->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandCell->cellAttributes() ?>>
            <span id="el_view_donor_ivf_HusbandCell" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HusbandCell->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandCell->getPlaceHolder()) ?>" value="<?= $Page->HusbandCell->EditValue ?>"<?= $Page->HusbandCell->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HusbandCell->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
    <div id="r_WifeEmail" class="form-group row">
        <label for="x_WifeEmail" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEmail"><?= $Page->WifeEmail->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeEmail" id="z_WifeEmail" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEmail->cellAttributes() ?>>
            <span id="el_view_donor_ivf_WifeEmail" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->WifeEmail->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEmail->getPlaceHolder()) ?>" value="<?= $Page->WifeEmail->EditValue ?>"<?= $Page->WifeEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->WifeEmail->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
    <div id="r_HusbandEmail" class="form-group row">
        <label for="x_HusbandEmail" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEmail"><?= $Page->HusbandEmail->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandEmail" id="z_HusbandEmail" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEmail->cellAttributes() ?>>
            <span id="el_view_donor_ivf_HusbandEmail" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HusbandEmail->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEmail->getPlaceHolder()) ?>" value="<?= $Page->HusbandEmail->EditValue ?>"<?= $Page->HusbandEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HusbandEmail->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ARTCYCLE" id="z_ARTCYCLE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
            <span id="el_view_donor_ivf_ARTCYCLE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ARTCYCLE->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->ARTCYCLE->EditValue ?>"<?= $Page->ARTCYCLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_RESULT"><?= $Page->RESULT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESULT" id="z_RESULT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
            <span id="el_view_donor_ivf_RESULT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RESULT->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>" value="<?= $Page->RESULT->EditValue ?>"<?= $Page->RESULT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_CoupleID"><?= $Page->CoupleID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
            <span id="el_view_donor_ivf_CoupleID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_donor_ivf_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_donor_ivf_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientID"><?= $Page->PatientID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
            <span id="el_view_donor_ivf_PatientID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerName"><?= $Page->PartnerName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
            <span id="el_view_donor_ivf_PartnerName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerID"><?= $Page->PartnerID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
            <span id="el_view_donor_ivf_PartnerID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_DrID"><?= $Page->DrID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
            <span id="el_view_donor_ivf_DrID" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?= EmptyValue(strval($Page->DrID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrID->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrID->ReadOnly || $Page->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage(false) ?></div>
<?= $Page->DrID->Lookup->getParamTag($Page, "p_x_DrID") ?>
<input type="hidden" is="selection-list" data-table="view_donor_ivf" data-field="x_DrID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?= $Page->DrID->AdvancedSearch->SearchValue ?>"<?= $Page->DrID->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_DrDepartment"><?= $Page->DrDepartment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
            <span id="el_view_donor_ivf_DrDepartment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Doctor"><?= $Page->Doctor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
            <span id="el_view_donor_ivf_Doctor" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->femalepic->Visible) { // femalepic ?>
    <div id="r_femalepic" class="form-group row">
        <label for="x_femalepic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepic"><?= $Page->femalepic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_femalepic" id="z_femalepic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->femalepic->cellAttributes() ?>>
            <span id="el_view_donor_ivf_femalepic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->femalepic->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" size="35" placeholder="<?= HtmlEncode($Page->femalepic->getPlaceHolder()) ?>" value="<?= $Page->femalepic->EditValue ?>"<?= $Page->femalepic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->femalepic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Fgender->Visible) { // Fgender ?>
    <div id="r_Fgender" class="form-group row">
        <label for="x_Fgender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Fgender"><?= $Page->Fgender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Fgender" id="z_Fgender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fgender->cellAttributes() ?>>
            <span id="el_view_donor_ivf_Fgender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Fgender->getInputTextType() ?>" data-table="view_donor_ivf" data-field="x_Fgender" name="x_Fgender" id="x_Fgender" size="35" placeholder="<?= HtmlEncode($Page->Fgender->getPlaceHolder()) ?>" value="<?= $Page->Fgender->EditValue ?>"<?= $Page->Fgender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Fgender->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_donor_ivf");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
