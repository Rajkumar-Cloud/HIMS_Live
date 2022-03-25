<?php

namespace PHPMaker2021\project3;

// Page object
$HospitalEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhospitaledit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhospitaledit = currentForm = new ew.Form("fhospitaledit", "edit");

    // Add fields
    var fields = ew.vars.tables.hospital.fields;
    fhospitaledit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
        ["logo", [fields.logo.required ? ew.Validators.required(fields.logo.caption) : null], fields.logo.isInvalid],
        ["hospital", [fields.hospital.required ? ew.Validators.required(fields.hospital.caption) : null], fields.hospital.isInvalid],
        ["street", [fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["area", [fields.area.required ? ew.Validators.required(fields.area.caption) : null], fields.area.isInvalid],
        ["town", [fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["phone_no", [fields.phone_no.required ? ew.Validators.required(fields.phone_no.caption) : null], fields.phone_no.isInvalid],
        ["PreFixCode", [fields.PreFixCode.required ? ew.Validators.required(fields.PreFixCode.caption) : null], fields.PreFixCode.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["BillingGST", [fields.BillingGST.required ? ew.Validators.required(fields.BillingGST.caption) : null], fields.BillingGST.isInvalid],
        ["pharmacyGST", [fields.pharmacyGST.required ? ew.Validators.required(fields.pharmacyGST.caption) : null], fields.pharmacyGST.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhospitaledit,
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
    fhospitaledit.validate = function () {
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
    fhospitaledit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhospitaledit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fhospitaledit");
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
<form name="fhospitaledit" id="fhospitaledit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hospital_id" for="x_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<input type="<?= $Page->id->getInputTextType() ?>" data-table="hospital" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?> aria-describedby="x_id_help">
<?= $Page->id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage() ?></div>
<input type="hidden" data-table="hospital" data-field="x_id" data-hidden="1" name="o_id" id="o_id" value="<?= HtmlEncode($Page->id->OldValue ?? $Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <div id="r_logo" class="form-group row">
        <label id="elh_hospital_logo" for="x_logo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->logo->caption() ?><?= $Page->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->logo->cellAttributes() ?>>
<span id="el_hospital_logo">
<textarea data-table="hospital" data-field="x_logo" name="x_logo" id="x_logo" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->logo->getPlaceHolder()) ?>"<?= $Page->logo->editAttributes() ?> aria-describedby="x_logo_help"><?= $Page->logo->EditValue ?></textarea>
<?= $Page->logo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->logo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->hospital->Visible) { // hospital ?>
    <div id="r_hospital" class="form-group row">
        <label id="elh_hospital_hospital" for="x_hospital" class="<?= $Page->LeftColumnClass ?>"><?= $Page->hospital->caption() ?><?= $Page->hospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->hospital->cellAttributes() ?>>
<span id="el_hospital_hospital">
<input type="<?= $Page->hospital->getInputTextType() ?>" data-table="hospital" data-field="x_hospital" name="x_hospital" id="x_hospital" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->hospital->getPlaceHolder()) ?>" value="<?= $Page->hospital->EditValue ?>"<?= $Page->hospital->editAttributes() ?> aria-describedby="x_hospital_help">
<?= $Page->hospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->hospital->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label id="elh_hospital_street" for="x_street" class="<?= $Page->LeftColumnClass ?>"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
<span id="el_hospital_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="hospital" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?> aria-describedby="x_street_help">
<?= $Page->street->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <div id="r_area" class="form-group row">
        <label id="elh_hospital_area" for="x_area" class="<?= $Page->LeftColumnClass ?>"><?= $Page->area->caption() ?><?= $Page->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->area->cellAttributes() ?>>
<span id="el_hospital_area">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="hospital" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?> aria-describedby="x_area_help">
<?= $Page->area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label id="elh_hospital_town" for="x_town" class="<?= $Page->LeftColumnClass ?>"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
<span id="el_hospital_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="hospital" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?> aria-describedby="x_town_help">
<?= $Page->town->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_hospital_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_hospital_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="hospital" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_hospital_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_hospital_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="hospital" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <div id="r_phone_no" class="form-group row">
        <label id="elh_hospital_phone_no" for="x_phone_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_no->caption() ?><?= $Page->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_hospital_phone_no">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="hospital" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?> aria-describedby="x_phone_no_help">
<?= $Page->phone_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
    <div id="r_PreFixCode" class="form-group row">
        <label id="elh_hospital_PreFixCode" for="x_PreFixCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreFixCode->caption() ?><?= $Page->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_PreFixCode">
<input type="<?= $Page->PreFixCode->getInputTextType() ?>" data-table="hospital" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreFixCode->getPlaceHolder()) ?>" value="<?= $Page->PreFixCode->EditValue ?>"<?= $Page->PreFixCode->editAttributes() ?> aria-describedby="x_PreFixCode_help">
<?= $Page->PreFixCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreFixCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hospital_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hospital_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="hospital" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_hospital_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_hospital_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="hospital" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_hospital_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_hospital_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="hospital" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhospitaledit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhospitaledit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_hospital_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_hospital_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="hospital" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_hospital_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="hospital" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhospitaledit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhospitaledit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillingGST->Visible) { // BillingGST ?>
    <div id="r_BillingGST" class="form-group row">
        <label id="elh_hospital_BillingGST" for="x_BillingGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillingGST->caption() ?><?= $Page->BillingGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillingGST->cellAttributes() ?>>
<span id="el_hospital_BillingGST">
<input type="<?= $Page->BillingGST->getInputTextType() ?>" data-table="hospital" data-field="x_BillingGST" name="x_BillingGST" id="x_BillingGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillingGST->getPlaceHolder()) ?>" value="<?= $Page->BillingGST->EditValue ?>"<?= $Page->BillingGST->editAttributes() ?> aria-describedby="x_BillingGST_help">
<?= $Page->BillingGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillingGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
    <div id="r_pharmacyGST" class="form-group row">
        <label id="elh_hospital_pharmacyGST" for="x_pharmacyGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacyGST->caption() ?><?= $Page->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_pharmacyGST">
<input type="<?= $Page->pharmacyGST->getInputTextType() ?>" data-table="hospital" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacyGST->getPlaceHolder()) ?>" value="<?= $Page->pharmacyGST->EditValue ?>"<?= $Page->pharmacyGST->editAttributes() ?> aria-describedby="x_pharmacyGST_help">
<?= $Page->pharmacyGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacyGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("hospital");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
