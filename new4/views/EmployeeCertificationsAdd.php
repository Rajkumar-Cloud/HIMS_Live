<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCertificationsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_certificationsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_certificationsadd = currentForm = new ew.Form("femployee_certificationsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_certifications")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_certifications)
        ew.vars.tables.employee_certifications = currentTable;
    femployee_certificationsadd.addFields([
        ["certification_id", [fields.certification_id.visible && fields.certification_id.required ? ew.Validators.required(fields.certification_id.caption) : null, ew.Validators.integer], fields.certification_id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["institute", [fields.institute.visible && fields.institute.required ? ew.Validators.required(fields.institute.caption) : null], fields.institute.isInvalid],
        ["date_start", [fields.date_start.visible && fields.date_start.required ? ew.Validators.required(fields.date_start.caption) : null, ew.Validators.datetime(0)], fields.date_start.isInvalid],
        ["date_end", [fields.date_end.visible && fields.date_end.required ? ew.Validators.required(fields.date_end.caption) : null, ew.Validators.datetime(0)], fields.date_end.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_certificationsadd,
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
    femployee_certificationsadd.validate = function () {
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
    femployee_certificationsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_certificationsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_certificationsadd");
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
<form name="femployee_certificationsadd" id="femployee_certificationsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->certification_id->Visible) { // certification_id ?>
    <div id="r_certification_id" class="form-group row">
        <label id="elh_employee_certifications_certification_id" for="x_certification_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->certification_id->caption() ?><?= $Page->certification_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->certification_id->cellAttributes() ?>>
<span id="el_employee_certifications_certification_id">
<input type="<?= $Page->certification_id->getInputTextType() ?>" data-table="employee_certifications" data-field="x_certification_id" name="x_certification_id" id="x_certification_id" size="30" placeholder="<?= HtmlEncode($Page->certification_id->getPlaceHolder()) ?>" value="<?= $Page->certification_id->EditValue ?>"<?= $Page->certification_id->editAttributes() ?> aria-describedby="x_certification_id_help">
<?= $Page->certification_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->certification_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_certifications_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_certifications_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_certifications" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->institute->Visible) { // institute ?>
    <div id="r_institute" class="form-group row">
        <label id="elh_employee_certifications_institute" for="x_institute" class="<?= $Page->LeftColumnClass ?>"><?= $Page->institute->caption() ?><?= $Page->institute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->institute->cellAttributes() ?>>
<span id="el_employee_certifications_institute">
<textarea data-table="employee_certifications" data-field="x_institute" name="x_institute" id="x_institute" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->institute->getPlaceHolder()) ?>"<?= $Page->institute->editAttributes() ?> aria-describedby="x_institute_help"><?= $Page->institute->EditValue ?></textarea>
<?= $Page->institute->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->institute->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <div id="r_date_start" class="form-group row">
        <label id="elh_employee_certifications_date_start" for="x_date_start" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_start->caption() ?><?= $Page->date_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_certifications_date_start">
<input type="<?= $Page->date_start->getInputTextType() ?>" data-table="employee_certifications" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?= HtmlEncode($Page->date_start->getPlaceHolder()) ?>" value="<?= $Page->date_start->EditValue ?>"<?= $Page->date_start->editAttributes() ?> aria-describedby="x_date_start_help">
<?= $Page->date_start->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_start->getErrorMessage() ?></div>
<?php if (!$Page->date_start->ReadOnly && !$Page->date_start->Disabled && !isset($Page->date_start->EditAttrs["readonly"]) && !isset($Page->date_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_certificationsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_certificationsadd", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <div id="r_date_end" class="form-group row">
        <label id="elh_employee_certifications_date_end" for="x_date_end" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_end->caption() ?><?= $Page->date_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_certifications_date_end">
<input type="<?= $Page->date_end->getInputTextType() ?>" data-table="employee_certifications" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?= HtmlEncode($Page->date_end->getPlaceHolder()) ?>" value="<?= $Page->date_end->EditValue ?>"<?= $Page->date_end->editAttributes() ?> aria-describedby="x_date_end_help">
<?= $Page->date_end->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_end->getErrorMessage() ?></div>
<?php if (!$Page->date_end->ReadOnly && !$Page->date_end->Disabled && !isset($Page->date_end->EditAttrs["readonly"]) && !isset($Page->date_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_certificationsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_certificationsadd", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("employee_certifications");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
