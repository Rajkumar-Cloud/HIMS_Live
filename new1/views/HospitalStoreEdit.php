<?php

namespace PHPMaker2021\project3;

// Page object
$HospitalStoreEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhospital_storeedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhospital_storeedit = currentForm = new ew.Form("fhospital_storeedit", "edit");

    // Add fields
    var fields = ew.vars.tables.hospital_store.fields;
    fhospital_storeedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["logo", [fields.logo.required ? ew.Validators.required(fields.logo.caption) : null], fields.logo.isInvalid],
        ["pharmacy", [fields.pharmacy.required ? ew.Validators.required(fields.pharmacy.caption) : null], fields.pharmacy.isInvalid],
        ["street", [fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["area", [fields.area.required ? ew.Validators.required(fields.area.caption) : null], fields.area.isInvalid],
        ["town", [fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["phone_no", [fields.phone_no.required ? ew.Validators.required(fields.phone_no.caption) : null], fields.phone_no.isInvalid],
        ["PreFixCode", [fields.PreFixCode.required ? ew.Validators.required(fields.PreFixCode.caption) : null], fields.PreFixCode.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["pharmacyGST", [fields.pharmacyGST.required ? ew.Validators.required(fields.pharmacyGST.caption) : null], fields.pharmacyGST.isInvalid],
        ["HospId", [fields.HospId.required ? ew.Validators.required(fields.HospId.caption) : null, ew.Validators.integer], fields.HospId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhospital_storeedit,
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
    fhospital_storeedit.validate = function () {
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
    fhospital_storeedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhospital_storeedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fhospital_storeedit");
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
<form name="fhospital_storeedit" id="fhospital_storeedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hospital_store_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_hospital_store_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="hospital_store" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->logo->Visible) { // logo ?>
    <div id="r_logo" class="form-group row">
        <label id="elh_hospital_store_logo" for="x_logo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->logo->caption() ?><?= $Page->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<textarea data-table="hospital_store" data-field="x_logo" name="x_logo" id="x_logo" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->logo->getPlaceHolder()) ?>"<?= $Page->logo->editAttributes() ?> aria-describedby="x_logo_help"><?= $Page->logo->EditValue ?></textarea>
<?= $Page->logo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->logo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
    <div id="r_pharmacy" class="form-group row">
        <label id="elh_hospital_store_pharmacy" for="x_pharmacy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacy->caption() ?><?= $Page->pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="hospital_store" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?> aria-describedby="x_pharmacy_help">
<?= $Page->pharmacy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label id="elh_hospital_store_street" for="x_street" class="<?= $Page->LeftColumnClass ?>"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="hospital_store" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?> aria-describedby="x_street_help">
<?= $Page->street->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <div id="r_area" class="form-group row">
        <label id="elh_hospital_store_area" for="x_area" class="<?= $Page->LeftColumnClass ?>"><?= $Page->area->caption() ?><?= $Page->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="hospital_store" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?> aria-describedby="x_area_help">
<?= $Page->area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label id="elh_hospital_store_town" for="x_town" class="<?= $Page->LeftColumnClass ?>"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="hospital_store" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?> aria-describedby="x_town_help">
<?= $Page->town->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_hospital_store_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="hospital_store" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_hospital_store_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="hospital_store" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <div id="r_phone_no" class="form-group row">
        <label id="elh_hospital_store_phone_no" for="x_phone_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_no->caption() ?><?= $Page->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="hospital_store" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?> aria-describedby="x_phone_no_help">
<?= $Page->phone_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
    <div id="r_PreFixCode" class="form-group row">
        <label id="elh_hospital_store_PreFixCode" for="x_PreFixCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreFixCode->caption() ?><?= $Page->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<input type="<?= $Page->PreFixCode->getInputTextType() ?>" data-table="hospital_store" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreFixCode->getPlaceHolder()) ?>" value="<?= $Page->PreFixCode->EditValue ?>"<?= $Page->PreFixCode->editAttributes() ?> aria-describedby="x_PreFixCode_help">
<?= $Page->PreFixCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreFixCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hospital_store_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="hospital_store" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_hospital_store_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_hospital_store_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="hospital_store" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_hospital_store_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_hospital_store_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="hospital_store" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhospital_storeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhospital_storeedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_hospital_store_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_hospital_store_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="hospital_store" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_hospital_store_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_hospital_store_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="hospital_store" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhospital_storeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fhospital_storeedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
    <div id="r_pharmacyGST" class="form-group row">
        <label id="elh_hospital_store_pharmacyGST" for="x_pharmacyGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacyGST->caption() ?><?= $Page->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<input type="<?= $Page->pharmacyGST->getInputTextType() ?>" data-table="hospital_store" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacyGST->getPlaceHolder()) ?>" value="<?= $Page->pharmacyGST->EditValue ?>"<?= $Page->pharmacyGST->editAttributes() ?> aria-describedby="x_pharmacyGST_help">
<?= $Page->pharmacyGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacyGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospId->Visible) { // HospId ?>
    <div id="r_HospId" class="form-group row">
        <label id="elh_hospital_store_HospId" for="x_HospId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospId->caption() ?><?= $Page->HospId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
<input type="<?= $Page->HospId->getInputTextType() ?>" data-table="hospital_store" data-field="x_HospId" name="x_HospId" id="x_HospId" size="30" placeholder="<?= HtmlEncode($Page->HospId->getPlaceHolder()) ?>" value="<?= $Page->HospId->EditValue ?>"<?= $Page->HospId->editAttributes() ?> aria-describedby="x_HospId_help">
<?= $Page->HospId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospId->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hospital_store");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
