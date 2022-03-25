<?php

namespace PHPMaker2021\project3;

// Page object
$ReceptionEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var freceptionedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    freceptionedit = currentForm = new ew.Form("freceptionedit", "edit");

    // Add fields
    var fields = ew.vars.tables.reception.fields;
    freceptionedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["OorN", [fields.OorN.required ? ew.Validators.required(fields.OorN.caption) : null], fields.OorN.isInvalid],
        ["PRIMARY_CONSULTANT", [fields.PRIMARY_CONSULTANT.required ? ew.Validators.required(fields.PRIMARY_CONSULTANT.caption) : null], fields.PRIMARY_CONSULTANT.isInvalid],
        ["CATEGORY", [fields.CATEGORY.required ? ew.Validators.required(fields.CATEGORY.caption) : null], fields.CATEGORY.isInvalid],
        ["PROCEDURE", [fields.PROCEDURE.required ? ew.Validators.required(fields.PROCEDURE.caption) : null], fields.PROCEDURE.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null], fields.Amount.isInvalid],
        ["MODE_OF_PAYMENT", [fields.MODE_OF_PAYMENT.required ? ew.Validators.required(fields.MODE_OF_PAYMENT.caption) : null], fields.MODE_OF_PAYMENT.isInvalid],
        ["NEXT_REVIEW_DATE", [fields.NEXT_REVIEW_DATE.required ? ew.Validators.required(fields.NEXT_REVIEW_DATE.caption) : null, ew.Validators.datetime(0)], fields.NEXT_REVIEW_DATE.isInvalid],
        ["REMARKS", [fields.REMARKS.required ? ew.Validators.required(fields.REMARKS.caption) : null], fields.REMARKS.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = freceptionedit,
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
    freceptionedit.validate = function () {
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
    freceptionedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    freceptionedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("freceptionedit");
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
<form name="freceptionedit" id="freceptionedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="reception">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_reception_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_reception_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="reception" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_reception_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_reception_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="reception" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_reception_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_reception_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="reception" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OorN->Visible) { // OorN ?>
    <div id="r_OorN" class="form-group row">
        <label id="elh_reception_OorN" for="x_OorN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OorN->caption() ?><?= $Page->OorN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OorN->cellAttributes() ?>>
<span id="el_reception_OorN">
<input type="<?= $Page->OorN->getInputTextType() ?>" data-table="reception" data-field="x_OorN" name="x_OorN" id="x_OorN" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OorN->getPlaceHolder()) ?>" value="<?= $Page->OorN->EditValue ?>"<?= $Page->OorN->editAttributes() ?> aria-describedby="x_OorN_help">
<?= $Page->OorN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OorN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRIMARY_CONSULTANT->Visible) { // PRIMARY_CONSULTANT ?>
    <div id="r_PRIMARY_CONSULTANT" class="form-group row">
        <label id="elh_reception_PRIMARY_CONSULTANT" for="x_PRIMARY_CONSULTANT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRIMARY_CONSULTANT->caption() ?><?= $Page->PRIMARY_CONSULTANT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRIMARY_CONSULTANT->cellAttributes() ?>>
<span id="el_reception_PRIMARY_CONSULTANT">
<input type="<?= $Page->PRIMARY_CONSULTANT->getInputTextType() ?>" data-table="reception" data-field="x_PRIMARY_CONSULTANT" name="x_PRIMARY_CONSULTANT" id="x_PRIMARY_CONSULTANT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PRIMARY_CONSULTANT->getPlaceHolder()) ?>" value="<?= $Page->PRIMARY_CONSULTANT->EditValue ?>"<?= $Page->PRIMARY_CONSULTANT->editAttributes() ?> aria-describedby="x_PRIMARY_CONSULTANT_help">
<?= $Page->PRIMARY_CONSULTANT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRIMARY_CONSULTANT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CATEGORY->Visible) { // CATEGORY ?>
    <div id="r_CATEGORY" class="form-group row">
        <label id="elh_reception_CATEGORY" for="x_CATEGORY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CATEGORY->caption() ?><?= $Page->CATEGORY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CATEGORY->cellAttributes() ?>>
<span id="el_reception_CATEGORY">
<input type="<?= $Page->CATEGORY->getInputTextType() ?>" data-table="reception" data-field="x_CATEGORY" name="x_CATEGORY" id="x_CATEGORY" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CATEGORY->getPlaceHolder()) ?>" value="<?= $Page->CATEGORY->EditValue ?>"<?= $Page->CATEGORY->editAttributes() ?> aria-describedby="x_CATEGORY_help">
<?= $Page->CATEGORY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CATEGORY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <div id="r_PROCEDURE" class="form-group row">
        <label id="elh_reception_PROCEDURE" for="x_PROCEDURE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PROCEDURE->caption() ?><?= $Page->PROCEDURE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el_reception_PROCEDURE">
<input type="<?= $Page->PROCEDURE->getInputTextType() ?>" data-table="reception" data-field="x_PROCEDURE" name="x_PROCEDURE" id="x_PROCEDURE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROCEDURE->getPlaceHolder()) ?>" value="<?= $Page->PROCEDURE->EditValue ?>"<?= $Page->PROCEDURE->editAttributes() ?> aria-describedby="x_PROCEDURE_help">
<?= $Page->PROCEDURE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROCEDURE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_reception_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_reception_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="reception" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MODE_OF_PAYMENT->Visible) { // MODE OF PAYMENT ?>
    <div id="r_MODE_OF_PAYMENT" class="form-group row">
        <label id="elh_reception_MODE_OF_PAYMENT" for="x_MODE_OF_PAYMENT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MODE_OF_PAYMENT->caption() ?><?= $Page->MODE_OF_PAYMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MODE_OF_PAYMENT->cellAttributes() ?>>
<span id="el_reception_MODE_OF_PAYMENT">
<input type="<?= $Page->MODE_OF_PAYMENT->getInputTextType() ?>" data-table="reception" data-field="x_MODE_OF_PAYMENT" name="x_MODE_OF_PAYMENT" id="x_MODE_OF_PAYMENT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MODE_OF_PAYMENT->getPlaceHolder()) ?>" value="<?= $Page->MODE_OF_PAYMENT->EditValue ?>"<?= $Page->MODE_OF_PAYMENT->editAttributes() ?> aria-describedby="x_MODE_OF_PAYMENT_help">
<?= $Page->MODE_OF_PAYMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MODE_OF_PAYMENT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEXT_REVIEW_DATE->Visible) { // NEXT REVIEW DATE ?>
    <div id="r_NEXT_REVIEW_DATE" class="form-group row">
        <label id="elh_reception_NEXT_REVIEW_DATE" for="x_NEXT_REVIEW_DATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEXT_REVIEW_DATE->caption() ?><?= $Page->NEXT_REVIEW_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEXT_REVIEW_DATE->cellAttributes() ?>>
<span id="el_reception_NEXT_REVIEW_DATE">
<input type="<?= $Page->NEXT_REVIEW_DATE->getInputTextType() ?>" data-table="reception" data-field="x_NEXT_REVIEW_DATE" name="x_NEXT_REVIEW_DATE" id="x_NEXT_REVIEW_DATE" placeholder="<?= HtmlEncode($Page->NEXT_REVIEW_DATE->getPlaceHolder()) ?>" value="<?= $Page->NEXT_REVIEW_DATE->EditValue ?>"<?= $Page->NEXT_REVIEW_DATE->editAttributes() ?> aria-describedby="x_NEXT_REVIEW_DATE_help">
<?= $Page->NEXT_REVIEW_DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEXT_REVIEW_DATE->getErrorMessage() ?></div>
<?php if (!$Page->NEXT_REVIEW_DATE->ReadOnly && !$Page->NEXT_REVIEW_DATE->Disabled && !isset($Page->NEXT_REVIEW_DATE->EditAttrs["readonly"]) && !isset($Page->NEXT_REVIEW_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceptionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("freceptionedit", "x_NEXT_REVIEW_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REMARKS->Visible) { // REMARKS ?>
    <div id="r_REMARKS" class="form-group row">
        <label id="elh_reception_REMARKS" for="x_REMARKS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->REMARKS->caption() ?><?= $Page->REMARKS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REMARKS->cellAttributes() ?>>
<span id="el_reception_REMARKS">
<input type="<?= $Page->REMARKS->getInputTextType() ?>" data-table="reception" data-field="x_REMARKS" name="x_REMARKS" id="x_REMARKS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->REMARKS->getPlaceHolder()) ?>" value="<?= $Page->REMARKS->EditValue ?>"<?= $Page->REMARKS->editAttributes() ?> aria-describedby="x_REMARKS_help">
<?= $Page->REMARKS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->REMARKS->getErrorMessage() ?></div>
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
    ew.addEventHandlers("reception");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
