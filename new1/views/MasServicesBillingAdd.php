<?php

namespace PHPMaker2021\project3;

// Page object
$MasServicesBillingAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_services_billingadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_services_billingadd = currentForm = new ew.Form("fmas_services_billingadd", "add");

    // Add fields
    var fields = ew.vars.tables.mas_services_billing.fields;
    fmas_services_billingadd.addFields([
        ["CODE", [fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["SERVICE", [fields.SERVICE.required ? ew.Validators.required(fields.SERVICE.caption) : null], fields.SERVICE.isInvalid],
        ["UNITS", [fields.UNITS.required ? ew.Validators.required(fields.UNITS.caption) : null, ew.Validators.integer], fields.UNITS.isInvalid],
        ["AMOUNT", [fields.AMOUNT.required ? ew.Validators.required(fields.AMOUNT.caption) : null, ew.Validators.float], fields.AMOUNT.isInvalid],
        ["SERVICE_TYPE", [fields.SERVICE_TYPE.required ? ew.Validators.required(fields.SERVICE_TYPE.caption) : null], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["Created", [fields.Created.required ? ew.Validators.required(fields.Created.caption) : null], fields.Created.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["Modified", [fields.Modified.required ? ew.Validators.required(fields.Modified.caption) : null], fields.Modified.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null, ew.Validators.datetime(0)], fields.ModifiedDateTime.isInvalid],
        ["mas_services_billingcol", [fields.mas_services_billingcol.required ? ew.Validators.required(fields.mas_services_billingcol.caption) : null], fields.mas_services_billingcol.isInvalid],
        ["DrShareAmount", [fields.DrShareAmount.required ? ew.Validators.required(fields.DrShareAmount.caption) : null, ew.Validators.float], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [fields.HospShareAmount.required ? ew.Validators.required(fields.HospShareAmount.caption) : null, ew.Validators.float], fields.HospShareAmount.isInvalid],
        ["DrSharePer", [fields.DrSharePer.required ? ew.Validators.required(fields.DrSharePer.caption) : null, ew.Validators.integer], fields.DrSharePer.isInvalid],
        ["HospSharePer", [fields.HospSharePer.required ? ew.Validators.required(fields.HospSharePer.caption) : null, ew.Validators.integer], fields.HospSharePer.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["TestSubCd", [fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["Method", [fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Order", [fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["Form", [fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["ResType", [fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["UnitCD", [fields.UnitCD.required ? ew.Validators.required(fields.UnitCD.caption) : null], fields.UnitCD.isInvalid],
        ["RefValue", [fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
        ["Sample", [fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [fields.Formula.required ? ew.Validators.required(fields.Formula.caption) : null], fields.Formula.isInvalid],
        ["Inactive", [fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["Outsource", [fields.Outsource.required ? ew.Validators.required(fields.Outsource.caption) : null], fields.Outsource.isInvalid],
        ["CollSample", [fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid],
        ["TestType", [fields.TestType.required ? ew.Validators.required(fields.TestType.caption) : null], fields.TestType.isInvalid],
        ["NoHeading", [fields.NoHeading.required ? ew.Validators.required(fields.NoHeading.caption) : null], fields.NoHeading.isInvalid],
        ["ChemicalCode", [fields.ChemicalCode.required ? ew.Validators.required(fields.ChemicalCode.caption) : null], fields.ChemicalCode.isInvalid],
        ["ChemicalName", [fields.ChemicalName.required ? ew.Validators.required(fields.ChemicalName.caption) : null], fields.ChemicalName.isInvalid],
        ["Utilaization", [fields.Utilaization.required ? ew.Validators.required(fields.Utilaization.caption) : null], fields.Utilaization.isInvalid],
        ["Interpretation", [fields.Interpretation.required ? ew.Validators.required(fields.Interpretation.caption) : null], fields.Interpretation.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_services_billingadd,
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
    fmas_services_billingadd.validate = function () {
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
    fmas_services_billingadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_services_billingadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_services_billingadd");
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
<form name="fmas_services_billingadd" id="fmas_services_billingadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label id="elh_mas_services_billing_CODE" for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CODE->caption() ?><?= $Page->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
<span id="el_mas_services_billing_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?> aria-describedby="x_CODE_help">
<?= $Page->CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <div id="r_SERVICE" class="form-group row">
        <label id="elh_mas_services_billing_SERVICE" for="x_SERVICE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SERVICE->caption() ?><?= $Page->SERVICE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el_mas_services_billing_SERVICE">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?> aria-describedby="x_SERVICE_help">
<?= $Page->SERVICE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
    <div id="r_UNITS" class="form-group row">
        <label id="elh_mas_services_billing_UNITS" for="x_UNITS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UNITS->caption() ?><?= $Page->UNITS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UNITS->cellAttributes() ?>>
<span id="el_mas_services_billing_UNITS">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UNITS" name="x_UNITS" id="x_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?> aria-describedby="x_UNITS_help">
<?= $Page->UNITS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
    <div id="r_AMOUNT" class="form-group row">
        <label id="elh_mas_services_billing_AMOUNT" for="x_AMOUNT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AMOUNT->caption() ?><?= $Page->AMOUNT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AMOUNT->cellAttributes() ?>>
<span id="el_mas_services_billing_AMOUNT">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_AMOUNT" name="x_AMOUNT" id="x_AMOUNT" size="30" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?> aria-describedby="x_AMOUNT_help">
<?= $Page->AMOUNT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <div id="r_SERVICE_TYPE" class="form-group row">
        <label id="elh_mas_services_billing_SERVICE_TYPE" for="x_SERVICE_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SERVICE_TYPE->caption() ?><?= $Page->SERVICE_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_mas_services_billing_SERVICE_TYPE">
<input type="<?= $Page->SERVICE_TYPE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" name="x_SERVICE_TYPE" id="x_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE_TYPE->EditValue ?>"<?= $Page->SERVICE_TYPE->editAttributes() ?> aria-describedby="x_SERVICE_TYPE_help">
<?= $Page->SERVICE_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <div id="r_DEPARTMENT" class="form-group row">
        <label id="elh_mas_services_billing_DEPARTMENT" for="x_DEPARTMENT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DEPARTMENT->caption() ?><?= $Page->DEPARTMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el_mas_services_billing_DEPARTMENT">
<input type="<?= $Page->DEPARTMENT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Page->DEPARTMENT->EditValue ?>"<?= $Page->DEPARTMENT->editAttributes() ?> aria-describedby="x_DEPARTMENT_help">
<?= $Page->DEPARTMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
    <div id="r_Created" class="form-group row">
        <label id="elh_mas_services_billing_Created" for="x_Created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Created->caption() ?><?= $Page->Created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Created->cellAttributes() ?>>
<span id="el_mas_services_billing_Created">
<input type="<?= $Page->Created->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Created" name="x_Created" id="x_Created" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Created->getPlaceHolder()) ?>" value="<?= $Page->Created->EditValue ?>"<?= $Page->Created->editAttributes() ?> aria-describedby="x_Created_help">
<?= $Page->Created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Created->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_mas_services_billing_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_mas_services_billing_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_services_billingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmas_services_billingadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <div id="r_Modified" class="form-group row">
        <label id="elh_mas_services_billing_Modified" for="x_Modified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Modified->caption() ?><?= $Page->Modified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Modified->cellAttributes() ?>>
<span id="el_mas_services_billing_Modified">
<input type="<?= $Page->Modified->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Modified" name="x_Modified" id="x_Modified" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Modified->getPlaceHolder()) ?>" value="<?= $Page->Modified->EditValue ?>"<?= $Page->Modified->editAttributes() ?> aria-describedby="x_Modified_help">
<?= $Page->Modified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Modified->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_mas_services_billing_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_mas_services_billing_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_services_billingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmas_services_billingadd", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
    <div id="r_mas_services_billingcol" class="form-group row">
        <label id="elh_mas_services_billing_mas_services_billingcol" for="x_mas_services_billingcol" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mas_services_billingcol->caption() ?><?= $Page->mas_services_billingcol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<span id="el_mas_services_billing_mas_services_billingcol">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x_mas_services_billingcol" id="x_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?> aria-describedby="x_mas_services_billingcol_help">
<?= $Page->mas_services_billingcol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <div id="r_DrShareAmount" class="form-group row">
        <label id="elh_mas_services_billing_DrShareAmount" for="x_DrShareAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrShareAmount->caption() ?><?= $Page->DrShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el_mas_services_billing_DrShareAmount">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x_DrShareAmount" id="x_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?> aria-describedby="x_DrShareAmount_help">
<?= $Page->DrShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <div id="r_HospShareAmount" class="form-group row">
        <label id="elh_mas_services_billing_HospShareAmount" for="x_HospShareAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospShareAmount->caption() ?><?= $Page->HospShareAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el_mas_services_billing_HospShareAmount">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x_HospShareAmount" id="x_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?> aria-describedby="x_HospShareAmount_help">
<?= $Page->HospShareAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
    <div id="r_DrSharePer" class="form-group row">
        <label id="elh_mas_services_billing_DrSharePer" for="x_DrSharePer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrSharePer->caption() ?><?= $Page->DrSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrSharePer->cellAttributes() ?>>
<span id="el_mas_services_billing_DrSharePer">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrSharePer" name="x_DrSharePer" id="x_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?> aria-describedby="x_DrSharePer_help">
<?= $Page->DrSharePer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
    <div id="r_HospSharePer" class="form-group row">
        <label id="elh_mas_services_billing_HospSharePer" for="x_HospSharePer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospSharePer->caption() ?><?= $Page->HospSharePer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospSharePer->cellAttributes() ?>>
<span id="el_mas_services_billing_HospSharePer">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospSharePer" name="x_HospSharePer" id="x_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?> aria-describedby="x_HospSharePer_help">
<?= $Page->HospSharePer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_mas_services_billing_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_mas_services_billing_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <div id="r_TestSubCd" class="form-group row">
        <label id="elh_mas_services_billing_TestSubCd" for="x_TestSubCd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestSubCd->caption() ?><?= $Page->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el_mas_services_billing_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?> aria-describedby="x_TestSubCd_help">
<?= $Page->TestSubCd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_mas_services_billing_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_mas_services_billing_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <div id="r_Order" class="form-group row">
        <label id="elh_mas_services_billing_Order" for="x_Order" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Order->caption() ?><?= $Page->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Order->cellAttributes() ?>>
<span id="el_mas_services_billing_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?> aria-describedby="x_Order_help">
<?= $Page->Order->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_mas_services_billing_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_mas_services_billing_Form">
<textarea data-table="mas_services_billing" data-field="x_Form" name="x_Form" id="x_Form" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help"><?= $Page->Form->EditValue ?></textarea>
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <div id="r_ResType" class="form-group row">
        <label id="elh_mas_services_billing_ResType" for="x_ResType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResType->caption() ?><?= $Page->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResType->cellAttributes() ?>>
<span id="el_mas_services_billing_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?> aria-describedby="x_ResType_help">
<?= $Page->ResType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <div id="r_UnitCD" class="form-group row">
        <label id="elh_mas_services_billing_UnitCD" for="x_UnitCD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UnitCD->caption() ?><?= $Page->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el_mas_services_billing_UnitCD">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?> aria-describedby="x_UnitCD_help">
<?= $Page->UnitCD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
    <div id="r_RefValue" class="form-group row">
        <label id="elh_mas_services_billing_RefValue" for="x_RefValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefValue->caption() ?><?= $Page->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefValue->cellAttributes() ?>>
<span id="el_mas_services_billing_RefValue">
<textarea data-table="mas_services_billing" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?> aria-describedby="x_RefValue_help"><?= $Page->RefValue->EditValue ?></textarea>
<?= $Page->RefValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <div id="r_Sample" class="form-group row">
        <label id="elh_mas_services_billing_Sample" for="x_Sample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sample->caption() ?><?= $Page->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sample->cellAttributes() ?>>
<span id="el_mas_services_billing_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?> aria-describedby="x_Sample_help">
<?= $Page->Sample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <div id="r_NoD" class="form-group row">
        <label id="elh_mas_services_billing_NoD" for="x_NoD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoD->caption() ?><?= $Page->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoD->cellAttributes() ?>>
<span id="el_mas_services_billing_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?> aria-describedby="x_NoD_help">
<?= $Page->NoD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <div id="r_BillOrder" class="form-group row">
        <label id="elh_mas_services_billing_BillOrder" for="x_BillOrder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillOrder->caption() ?><?= $Page->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el_mas_services_billing_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?> aria-describedby="x_BillOrder_help">
<?= $Page->BillOrder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <div id="r_Formula" class="form-group row">
        <label id="elh_mas_services_billing_Formula" for="x_Formula" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Formula->caption() ?><?= $Page->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Formula->cellAttributes() ?>>
<span id="el_mas_services_billing_Formula">
<textarea data-table="mas_services_billing" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Formula->getPlaceHolder()) ?>"<?= $Page->Formula->editAttributes() ?> aria-describedby="x_Formula_help"><?= $Page->Formula->EditValue ?></textarea>
<?= $Page->Formula->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Formula->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <div id="r_Inactive" class="form-group row">
        <label id="elh_mas_services_billing_Inactive" for="x_Inactive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Inactive->caption() ?><?= $Page->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Inactive->cellAttributes() ?>>
<span id="el_mas_services_billing_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?> aria-describedby="x_Inactive_help">
<?= $Page->Inactive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <div id="r_Outsource" class="form-group row">
        <label id="elh_mas_services_billing_Outsource" for="x_Outsource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Outsource->caption() ?><?= $Page->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Outsource->cellAttributes() ?>>
<span id="el_mas_services_billing_Outsource">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?> aria-describedby="x_Outsource_help">
<?= $Page->Outsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <div id="r_CollSample" class="form-group row">
        <label id="elh_mas_services_billing_CollSample" for="x_CollSample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollSample->caption() ?><?= $Page->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollSample->cellAttributes() ?>>
<span id="el_mas_services_billing_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?> aria-describedby="x_CollSample_help">
<?= $Page->CollSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
    <div id="r_TestType" class="form-group row">
        <label id="elh_mas_services_billing_TestType" for="x_TestType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TestType->caption() ?><?= $Page->TestType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestType->cellAttributes() ?>>
<span id="el_mas_services_billing_TestType">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?> aria-describedby="x_TestType_help">
<?= $Page->TestType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
    <div id="r_NoHeading" class="form-group row">
        <label id="elh_mas_services_billing_NoHeading" for="x_NoHeading" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoHeading->caption() ?><?= $Page->NoHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el_mas_services_billing_NoHeading">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoHeading" name="x_NoHeading" id="x_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?> aria-describedby="x_NoHeading_help">
<?= $Page->NoHeading->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
    <div id="r_ChemicalCode" class="form-group row">
        <label id="elh_mas_services_billing_ChemicalCode" for="x_ChemicalCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChemicalCode->caption() ?><?= $Page->ChemicalCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChemicalCode->cellAttributes() ?>>
<span id="el_mas_services_billing_ChemicalCode">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x_ChemicalCode" id="x_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?> aria-describedby="x_ChemicalCode_help">
<?= $Page->ChemicalCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
    <div id="r_ChemicalName" class="form-group row">
        <label id="elh_mas_services_billing_ChemicalName" for="x_ChemicalName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChemicalName->caption() ?><?= $Page->ChemicalName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChemicalName->cellAttributes() ?>>
<span id="el_mas_services_billing_ChemicalName">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalName" name="x_ChemicalName" id="x_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?> aria-describedby="x_ChemicalName_help">
<?= $Page->ChemicalName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
    <div id="r_Utilaization" class="form-group row">
        <label id="elh_mas_services_billing_Utilaization" for="x_Utilaization" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Utilaization->caption() ?><?= $Page->Utilaization->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Utilaization->cellAttributes() ?>>
<span id="el_mas_services_billing_Utilaization">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Utilaization" name="x_Utilaization" id="x_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?> aria-describedby="x_Utilaization_help">
<?= $Page->Utilaization->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Interpretation->Visible) { // Interpretation ?>
    <div id="r_Interpretation" class="form-group row">
        <label id="elh_mas_services_billing_Interpretation" for="x_Interpretation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Interpretation->caption() ?><?= $Page->Interpretation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Interpretation->cellAttributes() ?>>
<span id="el_mas_services_billing_Interpretation">
<textarea data-table="mas_services_billing" data-field="x_Interpretation" name="x_Interpretation" id="x_Interpretation" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Interpretation->getPlaceHolder()) ?>"<?= $Page->Interpretation->editAttributes() ?> aria-describedby="x_Interpretation_help"><?= $Page->Interpretation->EditValue ?></textarea>
<?= $Page->Interpretation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Interpretation->getErrorMessage() ?></div>
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
    ew.addEventHandlers("mas_services_billing");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
