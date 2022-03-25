<?php

namespace PHPMaker2021\project3;

// Page object
$PresIndicationstableEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_indicationstableedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_indicationstableedit = currentForm = new ew.Form("fpres_indicationstableedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pres_indicationstable.fields;
    fpres_indicationstableedit.addFields([
        ["Sno", [fields.Sno.required ? ew.Validators.required(fields.Sno.caption) : null], fields.Sno.isInvalid],
        ["Genericname", [fields.Genericname.required ? ew.Validators.required(fields.Genericname.caption) : null], fields.Genericname.isInvalid],
        ["Indications", [fields.Indications.required ? ew.Validators.required(fields.Indications.caption) : null], fields.Indications.isInvalid],
        ["Category", [fields.Category.required ? ew.Validators.required(fields.Category.caption) : null], fields.Category.isInvalid],
        ["Min_Age", [fields.Min_Age.required ? ew.Validators.required(fields.Min_Age.caption) : null, ew.Validators.integer], fields.Min_Age.isInvalid],
        ["Min_Days", [fields.Min_Days.required ? ew.Validators.required(fields.Min_Days.caption) : null], fields.Min_Days.isInvalid],
        ["Max_Age", [fields.Max_Age.required ? ew.Validators.required(fields.Max_Age.caption) : null, ew.Validators.integer], fields.Max_Age.isInvalid],
        ["Max_Days", [fields.Max_Days.required ? ew.Validators.required(fields.Max_Days.caption) : null], fields.Max_Days.isInvalid],
        ["_Route", [fields._Route.required ? ew.Validators.required(fields._Route.caption) : null], fields._Route.isInvalid],
        ["Form", [fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Min_Dose_Val", [fields.Min_Dose_Val.required ? ew.Validators.required(fields.Min_Dose_Val.caption) : null, ew.Validators.float], fields.Min_Dose_Val.isInvalid],
        ["Min_Dose_Unit", [fields.Min_Dose_Unit.required ? ew.Validators.required(fields.Min_Dose_Unit.caption) : null], fields.Min_Dose_Unit.isInvalid],
        ["Max_Dose_Val", [fields.Max_Dose_Val.required ? ew.Validators.required(fields.Max_Dose_Val.caption) : null, ew.Validators.float], fields.Max_Dose_Val.isInvalid],
        ["Max_Dose_Unit", [fields.Max_Dose_Unit.required ? ew.Validators.required(fields.Max_Dose_Unit.caption) : null], fields.Max_Dose_Unit.isInvalid],
        ["Frequency", [fields.Frequency.required ? ew.Validators.required(fields.Frequency.caption) : null], fields.Frequency.isInvalid],
        ["Duration", [fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null, ew.Validators.integer], fields.Duration.isInvalid],
        ["DWMY", [fields.DWMY.required ? ew.Validators.required(fields.DWMY.caption) : null], fields.DWMY.isInvalid],
        ["Contraindications", [fields.Contraindications.required ? ew.Validators.required(fields.Contraindications.caption) : null], fields.Contraindications.isInvalid],
        ["RecStatus", [fields.RecStatus.required ? ew.Validators.required(fields.RecStatus.caption) : null], fields.RecStatus.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_indicationstableedit,
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
    fpres_indicationstableedit.validate = function () {
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
    fpres_indicationstableedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_indicationstableedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_indicationstableedit");
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
<form name="fpres_indicationstableedit" id="fpres_indicationstableedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->Sno->Visible) { // Sno ?>
    <div id="r_Sno" class="form-group row">
        <label id="elh_pres_indicationstable_Sno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Sno->caption() ?><?= $Page->Sno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?= $Page->Sno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Sno->getDisplayValue($Page->Sno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_indicationstable" data-field="x_Sno" data-hidden="1" name="x_Sno" id="x_Sno" value="<?= HtmlEncode($Page->Sno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <div id="r_Genericname" class="form-group row">
        <label id="elh_pres_indicationstable_Genericname" for="x_Genericname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Genericname->caption() ?><?= $Page->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<input type="<?= $Page->Genericname->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Genericname->getPlaceHolder()) ?>" value="<?= $Page->Genericname->EditValue ?>"<?= $Page->Genericname->editAttributes() ?> aria-describedby="x_Genericname_help">
<?= $Page->Genericname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Genericname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Indications->Visible) { // Indications ?>
    <div id="r_Indications" class="form-group row">
        <label id="elh_pres_indicationstable_Indications" for="x_Indications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Indications->caption() ?><?= $Page->Indications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<textarea data-table="pres_indicationstable" data-field="x_Indications" name="x_Indications" id="x_Indications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Indications->getPlaceHolder()) ?>"<?= $Page->Indications->editAttributes() ?> aria-describedby="x_Indications_help"><?= $Page->Indications->EditValue ?></textarea>
<?= $Page->Indications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Indications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Category->Visible) { // Category ?>
    <div id="r_Category" class="form-group row">
        <label id="elh_pres_indicationstable_Category" for="x_Category" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Category->caption() ?><?= $Page->Category->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<input type="<?= $Page->Category->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Category->getPlaceHolder()) ?>" value="<?= $Page->Category->EditValue ?>"<?= $Page->Category->editAttributes() ?> aria-describedby="x_Category_help">
<?= $Page->Category->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Category->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Min_Age->Visible) { // Min_Age ?>
    <div id="r_Min_Age" class="form-group row">
        <label id="elh_pres_indicationstable_Min_Age" for="x_Min_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Min_Age->caption() ?><?= $Page->Min_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<input type="<?= $Page->Min_Age->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Min_Age" name="x_Min_Age" id="x_Min_Age" size="30" placeholder="<?= HtmlEncode($Page->Min_Age->getPlaceHolder()) ?>" value="<?= $Page->Min_Age->EditValue ?>"<?= $Page->Min_Age->editAttributes() ?> aria-describedby="x_Min_Age_help">
<?= $Page->Min_Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Min_Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Min_Days->Visible) { // Min_Days ?>
    <div id="r_Min_Days" class="form-group row">
        <label id="elh_pres_indicationstable_Min_Days" for="x_Min_Days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Min_Days->caption() ?><?= $Page->Min_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<input type="<?= $Page->Min_Days->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Min_Days" name="x_Min_Days" id="x_Min_Days" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Min_Days->getPlaceHolder()) ?>" value="<?= $Page->Min_Days->EditValue ?>"<?= $Page->Min_Days->editAttributes() ?> aria-describedby="x_Min_Days_help">
<?= $Page->Min_Days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Min_Days->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Max_Age->Visible) { // Max_Age ?>
    <div id="r_Max_Age" class="form-group row">
        <label id="elh_pres_indicationstable_Max_Age" for="x_Max_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Max_Age->caption() ?><?= $Page->Max_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<input type="<?= $Page->Max_Age->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Max_Age" name="x_Max_Age" id="x_Max_Age" size="30" placeholder="<?= HtmlEncode($Page->Max_Age->getPlaceHolder()) ?>" value="<?= $Page->Max_Age->EditValue ?>"<?= $Page->Max_Age->editAttributes() ?> aria-describedby="x_Max_Age_help">
<?= $Page->Max_Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Max_Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Max_Days->Visible) { // Max_Days ?>
    <div id="r_Max_Days" class="form-group row">
        <label id="elh_pres_indicationstable_Max_Days" for="x_Max_Days" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Max_Days->caption() ?><?= $Page->Max_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<input type="<?= $Page->Max_Days->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Max_Days" name="x_Max_Days" id="x_Max_Days" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Max_Days->getPlaceHolder()) ?>" value="<?= $Page->Max_Days->EditValue ?>"<?= $Page->Max_Days->editAttributes() ?> aria-describedby="x_Max_Days_help">
<?= $Page->Max_Days->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Max_Days->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <div id="r__Route" class="form-group row">
        <label id="elh_pres_indicationstable__Route" for="x__Route" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Route->caption() ?><?= $Page->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<input type="<?= $Page->_Route->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->_Route->getPlaceHolder()) ?>" value="<?= $Page->_Route->EditValue ?>"<?= $Page->_Route->editAttributes() ?> aria-describedby="x__Route_help">
<?= $Page->_Route->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Route->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_pres_indicationstable_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<input type="<?= $Page->Form->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>" value="<?= $Page->Form->EditValue ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help">
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
    <div id="r_Min_Dose_Val" class="form-group row">
        <label id="elh_pres_indicationstable_Min_Dose_Val" for="x_Min_Dose_Val" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Min_Dose_Val->caption() ?><?= $Page->Min_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<input type="<?= $Page->Min_Dose_Val->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Min_Dose_Val" name="x_Min_Dose_Val" id="x_Min_Dose_Val" size="30" placeholder="<?= HtmlEncode($Page->Min_Dose_Val->getPlaceHolder()) ?>" value="<?= $Page->Min_Dose_Val->EditValue ?>"<?= $Page->Min_Dose_Val->editAttributes() ?> aria-describedby="x_Min_Dose_Val_help">
<?= $Page->Min_Dose_Val->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Min_Dose_Val->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
    <div id="r_Min_Dose_Unit" class="form-group row">
        <label id="elh_pres_indicationstable_Min_Dose_Unit" for="x_Min_Dose_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Min_Dose_Unit->caption() ?><?= $Page->Min_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<input type="<?= $Page->Min_Dose_Unit->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Min_Dose_Unit" name="x_Min_Dose_Unit" id="x_Min_Dose_Unit" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Min_Dose_Unit->getPlaceHolder()) ?>" value="<?= $Page->Min_Dose_Unit->EditValue ?>"<?= $Page->Min_Dose_Unit->editAttributes() ?> aria-describedby="x_Min_Dose_Unit_help">
<?= $Page->Min_Dose_Unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Min_Dose_Unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
    <div id="r_Max_Dose_Val" class="form-group row">
        <label id="elh_pres_indicationstable_Max_Dose_Val" for="x_Max_Dose_Val" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Max_Dose_Val->caption() ?><?= $Page->Max_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<input type="<?= $Page->Max_Dose_Val->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Max_Dose_Val" name="x_Max_Dose_Val" id="x_Max_Dose_Val" size="30" placeholder="<?= HtmlEncode($Page->Max_Dose_Val->getPlaceHolder()) ?>" value="<?= $Page->Max_Dose_Val->EditValue ?>"<?= $Page->Max_Dose_Val->editAttributes() ?> aria-describedby="x_Max_Dose_Val_help">
<?= $Page->Max_Dose_Val->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Max_Dose_Val->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
    <div id="r_Max_Dose_Unit" class="form-group row">
        <label id="elh_pres_indicationstable_Max_Dose_Unit" for="x_Max_Dose_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Max_Dose_Unit->caption() ?><?= $Page->Max_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<input type="<?= $Page->Max_Dose_Unit->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Max_Dose_Unit" name="x_Max_Dose_Unit" id="x_Max_Dose_Unit" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Max_Dose_Unit->getPlaceHolder()) ?>" value="<?= $Page->Max_Dose_Unit->EditValue ?>"<?= $Page->Max_Dose_Unit->editAttributes() ?> aria-describedby="x_Max_Dose_Unit_help">
<?= $Page->Max_Dose_Unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Max_Dose_Unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Frequency->Visible) { // Frequency ?>
    <div id="r_Frequency" class="form-group row">
        <label id="elh_pres_indicationstable_Frequency" for="x_Frequency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Frequency->caption() ?><?= $Page->Frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<input type="<?= $Page->Frequency->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Frequency->getPlaceHolder()) ?>" value="<?= $Page->Frequency->EditValue ?>"<?= $Page->Frequency->editAttributes() ?> aria-describedby="x_Frequency_help">
<?= $Page->Frequency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Frequency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_pres_indicationstable_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DWMY->Visible) { // DWMY ?>
    <div id="r_DWMY" class="form-group row">
        <label id="elh_pres_indicationstable_DWMY" for="x_DWMY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DWMY->caption() ?><?= $Page->DWMY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<input type="<?= $Page->DWMY->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_DWMY" name="x_DWMY" id="x_DWMY" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DWMY->getPlaceHolder()) ?>" value="<?= $Page->DWMY->EditValue ?>"<?= $Page->DWMY->editAttributes() ?> aria-describedby="x_DWMY_help">
<?= $Page->DWMY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DWMY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Contraindications->Visible) { // Contraindications ?>
    <div id="r_Contraindications" class="form-group row">
        <label id="elh_pres_indicationstable_Contraindications" for="x_Contraindications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Contraindications->caption() ?><?= $Page->Contraindications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<textarea data-table="pres_indicationstable" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Contraindications->getPlaceHolder()) ?>"<?= $Page->Contraindications->editAttributes() ?> aria-describedby="x_Contraindications_help"><?= $Page->Contraindications->EditValue ?></textarea>
<?= $Page->Contraindications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Contraindications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecStatus->Visible) { // RecStatus ?>
    <div id="r_RecStatus" class="form-group row">
        <label id="elh_pres_indicationstable_RecStatus" for="x_RecStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RecStatus->caption() ?><?= $Page->RecStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<input type="<?= $Page->RecStatus->getInputTextType() ?>" data-table="pres_indicationstable" data-field="x_RecStatus" name="x_RecStatus" id="x_RecStatus" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->RecStatus->getPlaceHolder()) ?>" value="<?= $Page->RecStatus->EditValue ?>"<?= $Page->RecStatus->editAttributes() ?> aria-describedby="x_RecStatus_help">
<?= $Page->RecStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecStatus->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_indicationstable");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
