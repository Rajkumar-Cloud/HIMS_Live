<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInsuranceEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_insuranceedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_insuranceedit = currentForm = new ew.Form("fpatient_insuranceedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_insurance")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_insurance)
        ew.vars.tables.patient_insurance = currentTable;
    fpatient_insuranceedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Company", [fields.Company.visible && fields.Company.required ? ew.Validators.required(fields.Company.caption) : null], fields.Company.isInvalid],
        ["AddressInsuranceCarierName", [fields.AddressInsuranceCarierName.visible && fields.AddressInsuranceCarierName.required ? ew.Validators.required(fields.AddressInsuranceCarierName.caption) : null], fields.AddressInsuranceCarierName.isInvalid],
        ["ContactName", [fields.ContactName.visible && fields.ContactName.required ? ew.Validators.required(fields.ContactName.caption) : null], fields.ContactName.isInvalid],
        ["ContactMobile", [fields.ContactMobile.visible && fields.ContactMobile.required ? ew.Validators.required(fields.ContactMobile.caption) : null], fields.ContactMobile.isInvalid],
        ["PolicyType", [fields.PolicyType.visible && fields.PolicyType.required ? ew.Validators.required(fields.PolicyType.caption) : null], fields.PolicyType.isInvalid],
        ["PolicyName", [fields.PolicyName.visible && fields.PolicyName.required ? ew.Validators.required(fields.PolicyName.caption) : null], fields.PolicyName.isInvalid],
        ["PolicyNo", [fields.PolicyNo.visible && fields.PolicyNo.required ? ew.Validators.required(fields.PolicyNo.caption) : null], fields.PolicyNo.isInvalid],
        ["PolicyAmount", [fields.PolicyAmount.visible && fields.PolicyAmount.required ? ew.Validators.required(fields.PolicyAmount.caption) : null], fields.PolicyAmount.isInvalid],
        ["RefLetterNo", [fields.RefLetterNo.visible && fields.RefLetterNo.required ? ew.Validators.required(fields.RefLetterNo.caption) : null], fields.RefLetterNo.isInvalid],
        ["ReferenceBy", [fields.ReferenceBy.visible && fields.ReferenceBy.required ? ew.Validators.required(fields.ReferenceBy.caption) : null], fields.ReferenceBy.isInvalid],
        ["ReferenceDate", [fields.ReferenceDate.visible && fields.ReferenceDate.required ? ew.Validators.required(fields.ReferenceDate.caption) : null, ew.Validators.datetime(0)], fields.ReferenceDate.isInvalid],
        ["DocumentAttatch", [fields.DocumentAttatch.visible && fields.DocumentAttatch.required ? ew.Validators.fileRequired(fields.DocumentAttatch.caption) : null], fields.DocumentAttatch.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_insuranceedit,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fpatient_insuranceedit.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fpatient_insuranceedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_insuranceedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_insuranceedit");
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
<form name="fpatient_insuranceedit" id="fpatient_insuranceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_insurance_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_insurance_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_insurance_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_insurance_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_insurance" data-field="x_PatientId" data-hidden="1" name="x_PatientId" id="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_insurance_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Company->Visible) { // Company ?>
    <div id="r_Company" class="form-group row">
        <label id="elh_patient_insurance_Company" for="x_Company" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Company->caption() ?><?= $Page->Company->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<input type="<?= $Page->Company->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Company" name="x_Company" id="x_Company" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Company->getPlaceHolder()) ?>" value="<?= $Page->Company->EditValue ?>"<?= $Page->Company->editAttributes() ?> aria-describedby="x_Company_help">
<?= $Page->Company->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Company->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
    <div id="r_AddressInsuranceCarierName" class="form-group row">
        <label id="elh_patient_insurance_AddressInsuranceCarierName" for="x_AddressInsuranceCarierName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AddressInsuranceCarierName->caption() ?><?= $Page->AddressInsuranceCarierName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<input type="<?= $Page->AddressInsuranceCarierName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_AddressInsuranceCarierName" name="x_AddressInsuranceCarierName" id="x_AddressInsuranceCarierName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AddressInsuranceCarierName->getPlaceHolder()) ?>" value="<?= $Page->AddressInsuranceCarierName->EditValue ?>"<?= $Page->AddressInsuranceCarierName->editAttributes() ?> aria-describedby="x_AddressInsuranceCarierName_help">
<?= $Page->AddressInsuranceCarierName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AddressInsuranceCarierName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
    <div id="r_ContactName" class="form-group row">
        <label id="elh_patient_insurance_ContactName" for="x_ContactName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ContactName->caption() ?><?= $Page->ContactName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<input type="<?= $Page->ContactName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactName" name="x_ContactName" id="x_ContactName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ContactName->getPlaceHolder()) ?>" value="<?= $Page->ContactName->EditValue ?>"<?= $Page->ContactName->editAttributes() ?> aria-describedby="x_ContactName_help">
<?= $Page->ContactName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ContactName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
    <div id="r_ContactMobile" class="form-group row">
        <label id="elh_patient_insurance_ContactMobile" for="x_ContactMobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ContactMobile->caption() ?><?= $Page->ContactMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<input type="<?= $Page->ContactMobile->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ContactMobile" name="x_ContactMobile" id="x_ContactMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ContactMobile->getPlaceHolder()) ?>" value="<?= $Page->ContactMobile->EditValue ?>"<?= $Page->ContactMobile->editAttributes() ?> aria-describedby="x_ContactMobile_help">
<?= $Page->ContactMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ContactMobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
    <div id="r_PolicyType" class="form-group row">
        <label id="elh_patient_insurance_PolicyType" for="x_PolicyType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PolicyType->caption() ?><?= $Page->PolicyType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<input type="<?= $Page->PolicyType->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyType" name="x_PolicyType" id="x_PolicyType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PolicyType->getPlaceHolder()) ?>" value="<?= $Page->PolicyType->EditValue ?>"<?= $Page->PolicyType->editAttributes() ?> aria-describedby="x_PolicyType_help">
<?= $Page->PolicyType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PolicyType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
    <div id="r_PolicyName" class="form-group row">
        <label id="elh_patient_insurance_PolicyName" for="x_PolicyName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PolicyName->caption() ?><?= $Page->PolicyName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<input type="<?= $Page->PolicyName->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyName" name="x_PolicyName" id="x_PolicyName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PolicyName->getPlaceHolder()) ?>" value="<?= $Page->PolicyName->EditValue ?>"<?= $Page->PolicyName->editAttributes() ?> aria-describedby="x_PolicyName_help">
<?= $Page->PolicyName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PolicyName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
    <div id="r_PolicyNo" class="form-group row">
        <label id="elh_patient_insurance_PolicyNo" for="x_PolicyNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PolicyNo->caption() ?><?= $Page->PolicyNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<input type="<?= $Page->PolicyNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyNo" name="x_PolicyNo" id="x_PolicyNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PolicyNo->getPlaceHolder()) ?>" value="<?= $Page->PolicyNo->EditValue ?>"<?= $Page->PolicyNo->editAttributes() ?> aria-describedby="x_PolicyNo_help">
<?= $Page->PolicyNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PolicyNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
    <div id="r_PolicyAmount" class="form-group row">
        <label id="elh_patient_insurance_PolicyAmount" for="x_PolicyAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PolicyAmount->caption() ?><?= $Page->PolicyAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<input type="<?= $Page->PolicyAmount->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PolicyAmount" name="x_PolicyAmount" id="x_PolicyAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PolicyAmount->getPlaceHolder()) ?>" value="<?= $Page->PolicyAmount->EditValue ?>"<?= $Page->PolicyAmount->editAttributes() ?> aria-describedby="x_PolicyAmount_help">
<?= $Page->PolicyAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PolicyAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
    <div id="r_RefLetterNo" class="form-group row">
        <label id="elh_patient_insurance_RefLetterNo" for="x_RefLetterNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefLetterNo->caption() ?><?= $Page->RefLetterNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<input type="<?= $Page->RefLetterNo->getInputTextType() ?>" data-table="patient_insurance" data-field="x_RefLetterNo" name="x_RefLetterNo" id="x_RefLetterNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefLetterNo->getPlaceHolder()) ?>" value="<?= $Page->RefLetterNo->EditValue ?>"<?= $Page->RefLetterNo->editAttributes() ?> aria-describedby="x_RefLetterNo_help">
<?= $Page->RefLetterNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefLetterNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
    <div id="r_ReferenceBy" class="form-group row">
        <label id="elh_patient_insurance_ReferenceBy" for="x_ReferenceBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferenceBy->caption() ?><?= $Page->ReferenceBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<input type="<?= $Page->ReferenceBy->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceBy" name="x_ReferenceBy" id="x_ReferenceBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferenceBy->getPlaceHolder()) ?>" value="<?= $Page->ReferenceBy->EditValue ?>"<?= $Page->ReferenceBy->editAttributes() ?> aria-describedby="x_ReferenceBy_help">
<?= $Page->ReferenceBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferenceBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
    <div id="r_ReferenceDate" class="form-group row">
        <label id="elh_patient_insurance_ReferenceDate" for="x_ReferenceDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferenceDate->caption() ?><?= $Page->ReferenceDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<input type="<?= $Page->ReferenceDate->getInputTextType() ?>" data-table="patient_insurance" data-field="x_ReferenceDate" name="x_ReferenceDate" id="x_ReferenceDate" placeholder="<?= HtmlEncode($Page->ReferenceDate->getPlaceHolder()) ?>" value="<?= $Page->ReferenceDate->EditValue ?>"<?= $Page->ReferenceDate->editAttributes() ?> aria-describedby="x_ReferenceDate_help">
<?= $Page->ReferenceDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferenceDate->getErrorMessage() ?></div>
<?php if (!$Page->ReferenceDate->ReadOnly && !$Page->ReferenceDate->Disabled && !isset($Page->ReferenceDate->EditAttrs["readonly"]) && !isset($Page->ReferenceDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insuranceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insuranceedit", "x_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentAttatch->Visible) { // DocumentAttatch ?>
    <div id="r_DocumentAttatch" class="form-group row">
        <label id="elh_patient_insurance_DocumentAttatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentAttatch->caption() ?><?= $Page->DocumentAttatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<div id="fd_x_DocumentAttatch">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->DocumentAttatch->title() ?>" data-table="patient_insurance" data-field="x_DocumentAttatch" name="x_DocumentAttatch" id="x_DocumentAttatch" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->DocumentAttatch->editAttributes() ?><?= ($Page->DocumentAttatch->ReadOnly || $Page->DocumentAttatch->Disabled) ? " disabled" : "" ?> aria-describedby="x_DocumentAttatch_help">
        <label class="custom-file-label ew-file-label" for="x_DocumentAttatch"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<?= $Page->DocumentAttatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentAttatch->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_DocumentAttatch" id= "fn_x_DocumentAttatch" value="<?= $Page->DocumentAttatch->Upload->FileName ?>">
<input type="hidden" name="fa_x_DocumentAttatch" id= "fa_x_DocumentAttatch" value="<?= (Post("fa_x_DocumentAttatch") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x_DocumentAttatch" id= "fs_x_DocumentAttatch" value="405">
<input type="hidden" name="fx_x_DocumentAttatch" id= "fx_x_DocumentAttatch" value="<?= $Page->DocumentAttatch->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_DocumentAttatch" id= "fm_x_DocumentAttatch" value="<?= $Page->DocumentAttatch->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_DocumentAttatch" id= "fc_x_DocumentAttatch" value="<?= $Page->DocumentAttatch->UploadMaxFileCount ?>">
</div>
<table id="ft_x_DocumentAttatch" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_insurance_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<span id="el_patient_insurance_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_patient_insurance_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_insurance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("patient_insurance");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
