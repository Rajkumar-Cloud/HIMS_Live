<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeSkillsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_skillsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_skillsadd = currentForm = new ew.Form("femployee_skillsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_skills")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_skills)
        ew.vars.tables.employee_skills = currentTable;
    femployee_skillsadd.addFields([
        ["skill_id", [fields.skill_id.visible && fields.skill_id.required ? ew.Validators.required(fields.skill_id.caption) : null, ew.Validators.integer], fields.skill_id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_skillsadd,
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
    femployee_skillsadd.validate = function () {
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
    femployee_skillsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_skillsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_skillsadd");
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
<form name="femployee_skillsadd" id="femployee_skillsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_skills">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->skill_id->Visible) { // skill_id ?>
    <div id="r_skill_id" class="form-group row">
        <label id="elh_employee_skills_skill_id" for="x_skill_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->skill_id->caption() ?><?= $Page->skill_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->skill_id->cellAttributes() ?>>
<span id="el_employee_skills_skill_id">
<input type="<?= $Page->skill_id->getInputTextType() ?>" data-table="employee_skills" data-field="x_skill_id" name="x_skill_id" id="x_skill_id" size="30" placeholder="<?= HtmlEncode($Page->skill_id->getPlaceHolder()) ?>" value="<?= $Page->skill_id->EditValue ?>"<?= $Page->skill_id->editAttributes() ?> aria-describedby="x_skill_id_help">
<?= $Page->skill_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->skill_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_skills_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_skills_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_skills" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_skills_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_skills_details">
<textarea data-table="employee_skills" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_skills");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
