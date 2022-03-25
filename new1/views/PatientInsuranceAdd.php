<?php

namespace PHPMaker2021\project3;

// Page object
$PatientInsuranceAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_insuranceadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_insuranceadd = currentForm = new ew.Form("fpatient_insuranceadd", "add");

    // Add fields
    var fields = ew.vars.tables.patient_insurance.fields;
    fpatient_insuranceadd.addFields([
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Company", [fields.Company.required ? ew.Validators.required(fields.Company.caption) : null], fields.Company.isInvalid],
        ["AddressInsuranceCarierName", [fields.AddressInsuranceCarierName.required ? ew.Validators.required(fields.AddressInsuranceCarierName.caption) : null], fields.AddressInsuranceCarierName.isInvalid],
        ["ContactName", [fields.ContactName.required ? ew.Validators.required(fields.ContactName.caption) : null], fields.ContactName.isInvalid],
        ["ContactMobile", [fields.ContactMobile.required ? ew.Validators.required(fields.ContactMobile.caption) : null], fields.ContactMobile.isInvalid],
        ["PolicyType", [fields.PolicyType.required ? ew.Validators.required(fields.PolicyType.caption) : null], fields.PolicyType.isInvalid],
        ["PolicyName", [fields.PolicyName.required ? ew.Validators.required(fields.PolicyName.caption) : null], fields.PolicyName.isInvalid],
        ["PolicyNo", [fields.PolicyNo.required ? ew.Validators.required(fields.PolicyNo.caption) : null], fields.PolicyNo.isInvalid],
        ["PolicyAmount", [fields.PolicyAmount.required ? ew.Validators.required(fields.PolicyAmount.caption) : null], fields.PolicyAmount.isInvalid],
        ["RefLetterNo", [fields.RefLetterNo.required ? ew.Validators.required(fields.RefLetterNo.caption) : null], fields.RefLetterNo.isInvalid],
        ["ReferenceBy", [fields.ReferenceBy.required ? ew.Validators.required(fields.ReferenceBy.caption) : null], fields.ReferenceBy.isInvalid],
        ["ReferenceDate", [fields.ReferenceDate.required ? ew.Validators.required(fields.ReferenceDate.caption) : null, ew.Validators.datetime(0)], fields.ReferenceDate.isInvalid],
        ["DocumentAttatch", [fields.DocumentAttatch.required ? ew.Validators.required(fields.DocumentAttatch.caption) : null], fields.DocumentAttatch.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_insuranceadd,
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
    fpatient_insuranceadd.validate = function () {
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
    fpatient_insuranceadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_insuranceadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_insuranceadd");
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
<form name="fpatient_insuranceadd" id="fpatient_insuranceadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_insurance_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_insurance" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_insurance_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_insurance" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
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
loadjs.ready(["fpatient_insuranceadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insuranceadd", "x_ReferenceDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DocumentAttatch->Visible) { // DocumentAttatch ?>
    <div id="r_DocumentAttatch" class="form-group row">
        <label id="elh_patient_insurance_DocumentAttatch" for="x_DocumentAttatch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DocumentAttatch->caption() ?><?= $Page->DocumentAttatch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<textarea data-table="patient_insurance" data-field="x_DocumentAttatch" name="x_DocumentAttatch" id="x_DocumentAttatch" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DocumentAttatch->getPlaceHolder()) ?>"<?= $Page->DocumentAttatch->editAttributes() ?> aria-describedby="x_DocumentAttatch_help"><?= $Page->DocumentAttatch->EditValue ?></textarea>
<?= $Page->DocumentAttatch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DocumentAttatch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_insurance_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_insurance_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_insurance" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_insurance_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_insurance" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insuranceadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insuranceadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_insurance_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_insurance_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_insurance" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_insurance_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_insurance" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_insuranceadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_insuranceadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_insurance_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_insurance_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_insurance" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
