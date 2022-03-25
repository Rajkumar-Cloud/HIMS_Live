<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrPaygradesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_paygradesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhr_paygradesedit = currentForm = new ew.Form("fhr_paygradesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_paygrades")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_paygrades)
        ew.vars.tables.hr_paygrades = currentTable;
    fhr_paygradesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null], fields.currency.isInvalid],
        ["min_salary", [fields.min_salary.visible && fields.min_salary.required ? ew.Validators.required(fields.min_salary.caption) : null, ew.Validators.float], fields.min_salary.isInvalid],
        ["max_salary", [fields.max_salary.visible && fields.max_salary.required ? ew.Validators.required(fields.max_salary.caption) : null, ew.Validators.float], fields.max_salary.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_paygradesedit,
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
    fhr_paygradesedit.validate = function () {
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
    fhr_paygradesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_paygradesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fhr_paygradesedit");
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
<form name="fhr_paygradesedit" id="fhr_paygradesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_paygrades">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_hr_paygrades_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_paygrades_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="hr_paygrades" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_paygrades_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_paygrades_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="hr_paygrades" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_hr_paygrades_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_hr_paygrades_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="hr_paygrades" data-field="x_currency" name="x_currency" id="x_currency" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->min_salary->Visible) { // min_salary ?>
    <div id="r_min_salary" class="form-group row">
        <label id="elh_hr_paygrades_min_salary" for="x_min_salary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->min_salary->caption() ?><?= $Page->min_salary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->min_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_min_salary">
<input type="<?= $Page->min_salary->getInputTextType() ?>" data-table="hr_paygrades" data-field="x_min_salary" name="x_min_salary" id="x_min_salary" size="30" placeholder="<?= HtmlEncode($Page->min_salary->getPlaceHolder()) ?>" value="<?= $Page->min_salary->EditValue ?>"<?= $Page->min_salary->editAttributes() ?> aria-describedby="x_min_salary_help">
<?= $Page->min_salary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->min_salary->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->max_salary->Visible) { // max_salary ?>
    <div id="r_max_salary" class="form-group row">
        <label id="elh_hr_paygrades_max_salary" for="x_max_salary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->max_salary->caption() ?><?= $Page->max_salary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->max_salary->cellAttributes() ?>>
<span id="el_hr_paygrades_max_salary">
<input type="<?= $Page->max_salary->getInputTextType() ?>" data-table="hr_paygrades" data-field="x_max_salary" name="x_max_salary" id="x_max_salary" size="30" placeholder="<?= HtmlEncode($Page->max_salary->getPlaceHolder()) ?>" value="<?= $Page->max_salary->EditValue ?>"<?= $Page->max_salary->editAttributes() ?> aria-describedby="x_max_salary_help">
<?= $Page->max_salary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->max_salary->getErrorMessage() ?></div>
</span>
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
    ew.addEventHandlers("hr_paygrades");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
