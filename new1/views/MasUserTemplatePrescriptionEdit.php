<?php

namespace PHPMaker2021\project3;

// Page object
$MasUserTemplatePrescriptionEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_user_template_prescriptionedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fmas_user_template_prescriptionedit = currentForm = new ew.Form("fmas_user_template_prescriptionedit", "edit");

    // Add fields
    var fields = ew.vars.tables.mas_user_template_prescription.fields;
    fmas_user_template_prescriptionedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["TemplateName", [fields.TemplateName.required ? ew.Validators.required(fields.TemplateName.caption) : null], fields.TemplateName.isInvalid],
        ["Medicine", [fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["Type", [fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["Status", [fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["CreatedBy", [fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_user_template_prescriptionedit,
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
    fmas_user_template_prescriptionedit.validate = function () {
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
    fmas_user_template_prescriptionedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_user_template_prescriptionedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_user_template_prescriptionedit");
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
<form name="fmas_user_template_prescriptionedit" id="fmas_user_template_prescriptionedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_mas_user_template_prescription_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
    <div id="r_TemplateName" class="form-group row">
        <label id="elh_mas_user_template_prescription_TemplateName" for="x_TemplateName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TemplateName->caption() ?><?= $Page->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<input type="<?= $Page->TemplateName->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_TemplateName" name="x_TemplateName" id="x_TemplateName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TemplateName->getPlaceHolder()) ?>" value="<?= $Page->TemplateName->EditValue ?>"<?= $Page->TemplateName->editAttributes() ?> aria-describedby="x_TemplateName_help">
<?= $Page->TemplateName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <div id="r_Medicine" class="form-group row">
        <label id="elh_mas_user_template_prescription_Medicine" for="x_Medicine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medicine->caption() ?><?= $Page->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<input type="<?= $Page->Medicine->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_Medicine" name="x_Medicine" id="x_Medicine" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" value="<?= $Page->Medicine->EditValue ?>"<?= $Page->Medicine->editAttributes() ?> aria-describedby="x_Medicine_help">
<?= $Page->Medicine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label id="elh_mas_user_template_prescription_M" for="x_M" class="<?= $Page->LeftColumnClass ?>"><?= $Page->M->caption() ?><?= $Page->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_M" name="x_M" id="x_M" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?> aria-describedby="x_M_help">
<?= $Page->M->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label id="elh_mas_user_template_prescription_A" for="x_A" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A->caption() ?><?= $Page->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_A" name="x_A" id="x_A" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?> aria-describedby="x_A_help">
<?= $Page->A->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <div id="r_N" class="form-group row">
        <label id="elh_mas_user_template_prescription_N" for="x_N" class="<?= $Page->LeftColumnClass ?>"><?= $Page->N->caption() ?><?= $Page->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_N" name="x_N" id="x_N" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?> aria-describedby="x_N_help">
<?= $Page->N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <div id="r_NoOfDays" class="form-group row">
        <label id="elh_mas_user_template_prescription_NoOfDays" for="x_NoOfDays" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfDays->caption() ?><?= $Page->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?> aria-describedby="x_NoOfDays_help">
<?= $Page->NoOfDays->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <div id="r_PreRoute" class="form-group row">
        <label id="elh_mas_user_template_prescription_PreRoute" for="x_PreRoute" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreRoute->caption() ?><?= $Page->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<input type="<?= $Page->PreRoute->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_PreRoute" name="x_PreRoute" id="x_PreRoute" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" value="<?= $Page->PreRoute->EditValue ?>"<?= $Page->PreRoute->editAttributes() ?> aria-describedby="x_PreRoute_help">
<?= $Page->PreRoute->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <div id="r_TimeOfTaking" class="form-group row">
        <label id="elh_mas_user_template_prescription_TimeOfTaking" for="x_TimeOfTaking" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TimeOfTaking->caption() ?><?= $Page->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" name="x_TimeOfTaking" id="x_TimeOfTaking" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" value="<?= $Page->TimeOfTaking->EditValue ?>"<?= $Page->TimeOfTaking->editAttributes() ?> aria-describedby="x_TimeOfTaking_help">
<?= $Page->TimeOfTaking->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_mas_user_template_prescription_Type" for="x_Type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Type">
<input type="<?= $Page->Type->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>" value="<?= $Page->Type->EditValue ?>"<?= $Page->Type->editAttributes() ?> aria-describedby="x_Type_help">
<?= $Page->Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_mas_user_template_prescription_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?> aria-describedby="x_Status_help">
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_mas_user_template_prescription_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <div id="r_CreateDateTime" class="form-group row">
        <label id="elh_mas_user_template_prescription_CreateDateTime" for="x_CreateDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreateDateTime->caption() ?><?= $Page->CreateDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreateDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreateDateTime">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?> aria-describedby="x_CreateDateTime_help">
<?= $Page->CreateDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_mas_user_template_prescription_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_mas_user_template_prescription_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="mas_user_template_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
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
    ew.addEventHandlers("mas_user_template_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
