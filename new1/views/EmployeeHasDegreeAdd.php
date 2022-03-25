<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasDegreeAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_has_degreeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_has_degreeadd = currentForm = new ew.Form("femployee_has_degreeadd", "add");

    // Add fields
    var fields = ew.vars.tables.employee_has_degree.fields;
    femployee_has_degreeadd.addFields([
        ["employee_id", [fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["degree_id", [fields.degree_id.required ? ew.Validators.required(fields.degree_id.caption) : null, ew.Validators.integer], fields.degree_id.isInvalid],
        ["college_or_school", [fields.college_or_school.required ? ew.Validators.required(fields.college_or_school.caption) : null], fields.college_or_school.isInvalid],
        ["university_or_board", [fields.university_or_board.required ? ew.Validators.required(fields.university_or_board.caption) : null], fields.university_or_board.isInvalid],
        ["year_of_passing", [fields.year_of_passing.required ? ew.Validators.required(fields.year_of_passing.caption) : null], fields.year_of_passing.isInvalid],
        ["scoring_marks", [fields.scoring_marks.required ? ew.Validators.required(fields.scoring_marks.caption) : null], fields.scoring_marks.isInvalid],
        ["certificates", [fields.certificates.required ? ew.Validators.required(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.required ? ew.Validators.required(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_degreeadd,
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
    femployee_has_degreeadd.validate = function () {
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
    femployee_has_degreeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_degreeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_has_degreeadd");
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
<form name="femployee_has_degreeadd" id="femployee_has_degreeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_has_degree_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<span id="el_employee_has_degree_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
    <div id="r_degree_id" class="form-group row">
        <label id="elh_employee_has_degree_degree_id" for="x_degree_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->degree_id->caption() ?><?= $Page->degree_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<input type="<?= $Page->degree_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_degree_id" name="x_degree_id" id="x_degree_id" size="30" placeholder="<?= HtmlEncode($Page->degree_id->getPlaceHolder()) ?>" value="<?= $Page->degree_id->EditValue ?>"<?= $Page->degree_id->editAttributes() ?> aria-describedby="x_degree_id_help">
<?= $Page->degree_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->degree_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
    <div id="r_college_or_school" class="form-group row">
        <label id="elh_employee_has_degree_college_or_school" for="x_college_or_school" class="<?= $Page->LeftColumnClass ?>"><?= $Page->college_or_school->caption() ?><?= $Page->college_or_school->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->college_or_school->cellAttributes() ?>>
<span id="el_employee_has_degree_college_or_school">
<input type="<?= $Page->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x_college_or_school" id="x_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->college_or_school->getPlaceHolder()) ?>" value="<?= $Page->college_or_school->EditValue ?>"<?= $Page->college_or_school->editAttributes() ?> aria-describedby="x_college_or_school_help">
<?= $Page->college_or_school->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->college_or_school->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
    <div id="r_university_or_board" class="form-group row">
        <label id="elh_employee_has_degree_university_or_board" for="x_university_or_board" class="<?= $Page->LeftColumnClass ?>"><?= $Page->university_or_board->caption() ?><?= $Page->university_or_board->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->university_or_board->cellAttributes() ?>>
<span id="el_employee_has_degree_university_or_board">
<input type="<?= $Page->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x_university_or_board" id="x_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->university_or_board->getPlaceHolder()) ?>" value="<?= $Page->university_or_board->EditValue ?>"<?= $Page->university_or_board->editAttributes() ?> aria-describedby="x_university_or_board_help">
<?= $Page->university_or_board->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->university_or_board->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
    <div id="r_year_of_passing" class="form-group row">
        <label id="elh_employee_has_degree_year_of_passing" for="x_year_of_passing" class="<?= $Page->LeftColumnClass ?>"><?= $Page->year_of_passing->caption() ?><?= $Page->year_of_passing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->year_of_passing->cellAttributes() ?>>
<span id="el_employee_has_degree_year_of_passing">
<input type="<?= $Page->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x_year_of_passing" id="x_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->year_of_passing->getPlaceHolder()) ?>" value="<?= $Page->year_of_passing->EditValue ?>"<?= $Page->year_of_passing->editAttributes() ?> aria-describedby="x_year_of_passing_help">
<?= $Page->year_of_passing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->year_of_passing->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
    <div id="r_scoring_marks" class="form-group row">
        <label id="elh_employee_has_degree_scoring_marks" for="x_scoring_marks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->scoring_marks->caption() ?><?= $Page->scoring_marks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scoring_marks->cellAttributes() ?>>
<span id="el_employee_has_degree_scoring_marks">
<input type="<?= $Page->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x_scoring_marks" id="x_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->scoring_marks->getPlaceHolder()) ?>" value="<?= $Page->scoring_marks->EditValue ?>"<?= $Page->scoring_marks->editAttributes() ?> aria-describedby="x_scoring_marks_help">
<?= $Page->scoring_marks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->scoring_marks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
    <div id="r_certificates" class="form-group row">
        <label id="elh_employee_has_degree_certificates" for="x_certificates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->certificates->caption() ?><?= $Page->certificates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<input type="<?= $Page->certificates->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x_certificates" id="x_certificates" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->certificates->getPlaceHolder()) ?>" value="<?= $Page->certificates->EditValue ?>"<?= $Page->certificates->editAttributes() ?> aria-describedby="x_certificates_help">
<?= $Page->certificates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <div id="r__others" class="form-group row">
        <label id="elh_employee_has_degree__others" for="x__others" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_others->caption() ?><?= $Page->_others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_degree__others">
<input type="<?= $Page->_others->getInputTextType() ?>" data-table="employee_has_degree" data-field="x__others" name="x__others" id="x__others" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->_others->getPlaceHolder()) ?>" value="<?= $Page->_others->EditValue ?>"<?= $Page->_others->editAttributes() ?> aria-describedby="x__others_help">
<?= $Page->_others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_has_degree_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_employee_has_degree_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_employee_has_degree_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_employee_has_degree_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_degreeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_degreeadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_employee_has_degree_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_employee_has_degree_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_employee_has_degree_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_employee_has_degree_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_degreeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_degreeadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
    ew.addEventHandlers("employee_has_degree");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
