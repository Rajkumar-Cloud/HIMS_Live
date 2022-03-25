<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentApplicationsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_applicationsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    frecruitment_applicationsadd = currentForm = new ew.Form("frecruitment_applicationsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "recruitment_applications")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.recruitment_applications)
        ew.vars.tables.recruitment_applications = currentTable;
    frecruitment_applicationsadd.addFields([
        ["job", [fields.job.visible && fields.job.required ? ew.Validators.required(fields.job.caption) : null, ew.Validators.integer], fields.job.isInvalid],
        ["candidate", [fields.candidate.visible && fields.candidate.required ? ew.Validators.required(fields.candidate.caption) : null, ew.Validators.integer], fields.candidate.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["referredByEmail", [fields.referredByEmail.visible && fields.referredByEmail.required ? ew.Validators.required(fields.referredByEmail.caption) : null], fields.referredByEmail.isInvalid],
        ["notes", [fields.notes.visible && fields.notes.required ? ew.Validators.required(fields.notes.caption) : null], fields.notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frecruitment_applicationsadd,
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
    frecruitment_applicationsadd.validate = function () {
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
    frecruitment_applicationsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frecruitment_applicationsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("frecruitment_applicationsadd");
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
<form name="frecruitment_applicationsadd" id="frecruitment_applicationsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->job->Visible) { // job ?>
    <div id="r_job" class="form-group row">
        <label id="elh_recruitment_applications_job" for="x_job" class="<?= $Page->LeftColumnClass ?>"><?= $Page->job->caption() ?><?= $Page->job->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->job->cellAttributes() ?>>
<span id="el_recruitment_applications_job">
<input type="<?= $Page->job->getInputTextType() ?>" data-table="recruitment_applications" data-field="x_job" name="x_job" id="x_job" size="30" placeholder="<?= HtmlEncode($Page->job->getPlaceHolder()) ?>" value="<?= $Page->job->EditValue ?>"<?= $Page->job->editAttributes() ?> aria-describedby="x_job_help">
<?= $Page->job->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->job->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
    <div id="r_candidate" class="form-group row">
        <label id="elh_recruitment_applications_candidate" for="x_candidate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->candidate->caption() ?><?= $Page->candidate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->candidate->cellAttributes() ?>>
<span id="el_recruitment_applications_candidate">
<input type="<?= $Page->candidate->getInputTextType() ?>" data-table="recruitment_applications" data-field="x_candidate" name="x_candidate" id="x_candidate" size="30" placeholder="<?= HtmlEncode($Page->candidate->getPlaceHolder()) ?>" value="<?= $Page->candidate->EditValue ?>"<?= $Page->candidate->editAttributes() ?> aria-describedby="x_candidate_help">
<?= $Page->candidate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->candidate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_recruitment_applications_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_applications_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="recruitment_applications" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_applicationsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_applicationsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->referredByEmail->Visible) { // referredByEmail ?>
    <div id="r_referredByEmail" class="form-group row">
        <label id="elh_recruitment_applications_referredByEmail" for="x_referredByEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->referredByEmail->caption() ?><?= $Page->referredByEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->referredByEmail->cellAttributes() ?>>
<span id="el_recruitment_applications_referredByEmail">
<input type="<?= $Page->referredByEmail->getInputTextType() ?>" data-table="recruitment_applications" data-field="x_referredByEmail" name="x_referredByEmail" id="x_referredByEmail" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->referredByEmail->getPlaceHolder()) ?>" value="<?= $Page->referredByEmail->EditValue ?>"<?= $Page->referredByEmail->editAttributes() ?> aria-describedby="x_referredByEmail_help">
<?= $Page->referredByEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->referredByEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <div id="r_notes" class="form-group row">
        <label id="elh_recruitment_applications_notes" for="x_notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notes->caption() ?><?= $Page->notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_applications_notes">
<textarea data-table="recruitment_applications" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->notes->getPlaceHolder()) ?>"<?= $Page->notes->editAttributes() ?> aria-describedby="x_notes_help"><?= $Page->notes->EditValue ?></textarea>
<?= $Page->notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->notes->getErrorMessage() ?></div>
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
    ew.addEventHandlers("recruitment_applications");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
