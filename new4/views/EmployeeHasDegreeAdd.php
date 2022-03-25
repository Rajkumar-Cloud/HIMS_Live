<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_degree")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_degree)
        ew.vars.tables.employee_has_degree = currentTable;
    femployee_has_degreeadd.addFields([
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["degree_id", [fields.degree_id.visible && fields.degree_id.required ? ew.Validators.required(fields.degree_id.caption) : null], fields.degree_id.isInvalid],
        ["college_or_school", [fields.college_or_school.visible && fields.college_or_school.required ? ew.Validators.required(fields.college_or_school.caption) : null], fields.college_or_school.isInvalid],
        ["university_or_board", [fields.university_or_board.visible && fields.university_or_board.required ? ew.Validators.required(fields.university_or_board.caption) : null], fields.university_or_board.isInvalid],
        ["year_of_passing", [fields.year_of_passing.visible && fields.year_of_passing.required ? ew.Validators.required(fields.year_of_passing.caption) : null], fields.year_of_passing.isInvalid],
        ["scoring_marks", [fields.scoring_marks.visible && fields.scoring_marks.required ? ew.Validators.required(fields.scoring_marks.caption) : null], fields.scoring_marks.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
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
    femployee_has_degreeadd.lists.degree_id = <?= $Page->degree_id->toClientList($Page) ?>;
    femployee_has_degreeadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
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
<form name="femployee_has_degreeadd" id="femployee_has_degreeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "employee") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="employee">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->employee_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <div id="r_employee_id" class="form-group row">
        <label id="elh_employee_has_degree_employee_id" for="x_employee_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_id->caption() ?><?= $Page->employee_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_id->cellAttributes() ?>>
<?php if ($Page->employee_id->getSessionValue() != "") { ?>
<span id="el_employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->employee_id->getDisplayValue($Page->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_employee_id" name="x_employee_id" value="<?= HtmlEncode($Page->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_employee_has_degree_employee_id">
<input type="<?= $Page->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x_employee_id" id="x_employee_id" size="30" placeholder="<?= HtmlEncode($Page->employee_id->getPlaceHolder()) ?>" value="<?= $Page->employee_id->EditValue ?>"<?= $Page->employee_id->editAttributes() ?> aria-describedby="x_employee_id_help">
<?= $Page->employee_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
    <div id="r_degree_id" class="form-group row">
        <label id="elh_employee_has_degree_degree_id" for="x_degree_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->degree_id->caption() ?><?= $Page->degree_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->degree_id->cellAttributes() ?>>
<span id="el_employee_has_degree_degree_id">
<div class="input-group flex-nowrap">
    <select
        id="x_degree_id"
        name="x_degree_id"
        class="form-control ew-select<?= $Page->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Page->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->degree_id->getPlaceHolder()) ?>"
        <?= $Page->degree_id->editAttributes() ?>>
        <?= $Page->degree_id->selectOptionListHtml("x_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Page->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->degree_id->caption() ?>" data-title="<?= $Page->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->degree_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->degree_id->getErrorMessage() ?></div>
<?= $Page->degree_id->Lookup->getParamTag($Page, "p_x_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x_degree_id']"),
        options = { name: "x_degree_id", selectId: "employee_has_degree_x_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
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
        <label id="elh_employee_has_degree_certificates" class="<?= $Page->LeftColumnClass ?>"><?= $Page->certificates->caption() ?><?= $Page->certificates->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->certificates->cellAttributes() ?>>
<span id="el_employee_has_degree_certificates">
<div id="fd_x_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x_certificates" id="x_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->certificates->editAttributes() ?><?= ($Page->certificates->ReadOnly || $Page->certificates->Disabled) ? " disabled" : "" ?> aria-describedby="x_certificates_help">
        <label class="custom-file-label ew-file-label" for="x_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<?= $Page->certificates->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_certificates" id= "fn_x_certificates" value="<?= $Page->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x_certificates" id= "fa_x_certificates" value="0">
<input type="hidden" name="fs_x_certificates" id= "fs_x_certificates" value="100">
<input type="hidden" name="fx_x_certificates" id= "fx_x_certificates" value="<?= $Page->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_certificates" id= "fm_x_certificates" value="<?= $Page->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x_certificates" id= "fc_x_certificates" value="<?= $Page->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <div id="r__others" class="form-group row">
        <label id="elh_employee_has_degree__others" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_others->caption() ?><?= $Page->_others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_others->cellAttributes() ?>>
<span id="el_employee_has_degree__others">
<div id="fd_x__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x__others" id="x__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Page->_others->editAttributes() ?><?= ($Page->_others->ReadOnly || $Page->_others->Disabled) ? " disabled" : "" ?> aria-describedby="x__others_help">
        <label class="custom-file-label ew-file-label" for="x__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<?= $Page->_others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x__others" id= "fn_x__others" value="<?= $Page->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x__others" id= "fa_x__others" value="0">
<input type="hidden" name="fs_x__others" id= "fs_x__others" value="100">
<input type="hidden" name="fx_x__others" id= "fx_x__others" value="<?= $Page->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x__others" id= "fm_x__others" value="<?= $Page->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x__others" id= "fc_x__others" value="<?= $Page->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_has_degree_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_has_degree_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x_status"
        data-table="employee_has_degree"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x_status']"),
        options = { name: "x_status", selectId: "employee_has_degree_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_employee_has_degree_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_employee_has_degree_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_has_degree");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
