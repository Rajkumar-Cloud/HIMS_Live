<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeEmergencyContactsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_emergency_contactsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_emergency_contactsadd = currentForm = new ew.Form("femployee_emergency_contactsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_emergency_contacts")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_emergency_contacts)
        ew.vars.tables.employee_emergency_contacts = currentTable;
    femployee_emergency_contactsadd.addFields([
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["relationship", [fields.relationship.visible && fields.relationship.required ? ew.Validators.required(fields.relationship.caption) : null], fields.relationship.isInvalid],
        ["home_phone", [fields.home_phone.visible && fields.home_phone.required ? ew.Validators.required(fields.home_phone.caption) : null], fields.home_phone.isInvalid],
        ["work_phone", [fields.work_phone.visible && fields.work_phone.required ? ew.Validators.required(fields.work_phone.caption) : null], fields.work_phone.isInvalid],
        ["mobile_phone", [fields.mobile_phone.visible && fields.mobile_phone.required ? ew.Validators.required(fields.mobile_phone.caption) : null], fields.mobile_phone.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_emergency_contactsadd,
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
    femployee_emergency_contactsadd.validate = function () {
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
    femployee_emergency_contactsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_emergency_contactsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_emergency_contactsadd");
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
<form name="femployee_emergency_contactsadd" id="femployee_emergency_contactsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_emergency_contacts">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_emergency_contacts_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_employee_emergency_contacts_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
    <div id="r_relationship" class="form-group row">
        <label id="elh_employee_emergency_contacts_relationship" for="x_relationship" class="<?= $Page->LeftColumnClass ?>"><?= $Page->relationship->caption() ?><?= $Page->relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->relationship->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_relationship">
<input type="<?= $Page->relationship->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_relationship" name="x_relationship" id="x_relationship" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->relationship->getPlaceHolder()) ?>" value="<?= $Page->relationship->EditValue ?>"<?= $Page->relationship->editAttributes() ?> aria-describedby="x_relationship_help">
<?= $Page->relationship->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->relationship->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->home_phone->Visible) { // home_phone ?>
    <div id="r_home_phone" class="form-group row">
        <label id="elh_employee_emergency_contacts_home_phone" for="x_home_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->home_phone->caption() ?><?= $Page->home_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->home_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_home_phone">
<input type="<?= $Page->home_phone->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_home_phone" name="x_home_phone" id="x_home_phone" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->home_phone->getPlaceHolder()) ?>" value="<?= $Page->home_phone->EditValue ?>"<?= $Page->home_phone->editAttributes() ?> aria-describedby="x_home_phone_help">
<?= $Page->home_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->home_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->work_phone->Visible) { // work_phone ?>
    <div id="r_work_phone" class="form-group row">
        <label id="elh_employee_emergency_contacts_work_phone" for="x_work_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->work_phone->caption() ?><?= $Page->work_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->work_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_work_phone">
<input type="<?= $Page->work_phone->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_work_phone" name="x_work_phone" id="x_work_phone" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->work_phone->getPlaceHolder()) ?>" value="<?= $Page->work_phone->EditValue ?>"<?= $Page->work_phone->editAttributes() ?> aria-describedby="x_work_phone_help">
<?= $Page->work_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->work_phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_phone->Visible) { // mobile_phone ?>
    <div id="r_mobile_phone" class="form-group row">
        <label id="elh_employee_emergency_contacts_mobile_phone" for="x_mobile_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_phone->caption() ?><?= $Page->mobile_phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_phone->cellAttributes() ?>>
<span id="el_employee_emergency_contacts_mobile_phone">
<input type="<?= $Page->mobile_phone->getInputTextType() ?>" data-table="employee_emergency_contacts" data-field="x_mobile_phone" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->mobile_phone->getPlaceHolder()) ?>" value="<?= $Page->mobile_phone->EditValue ?>"<?= $Page->mobile_phone->editAttributes() ?> aria-describedby="x_mobile_phone_help">
<?= $Page->mobile_phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_phone->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_emergency_contacts");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
