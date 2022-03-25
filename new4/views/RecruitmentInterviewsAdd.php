<?php

namespace PHPMaker2021\HIMS;

// Page object
$RecruitmentInterviewsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var frecruitment_interviewsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    frecruitment_interviewsadd = currentForm = new ew.Form("frecruitment_interviewsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "recruitment_interviews")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.recruitment_interviews)
        ew.vars.tables.recruitment_interviews = currentTable;
    frecruitment_interviewsadd.addFields([
        ["job", [fields.job.visible && fields.job.required ? ew.Validators.required(fields.job.caption) : null, ew.Validators.integer], fields.job.isInvalid],
        ["candidate", [fields.candidate.visible && fields.candidate.required ? ew.Validators.required(fields.candidate.caption) : null, ew.Validators.integer], fields.candidate.isInvalid],
        ["level", [fields.level.visible && fields.level.required ? ew.Validators.required(fields.level.caption) : null], fields.level.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid],
        ["scheduled", [fields.scheduled.visible && fields.scheduled.required ? ew.Validators.required(fields.scheduled.caption) : null, ew.Validators.datetime(0)], fields.scheduled.isInvalid],
        ["location", [fields.location.visible && fields.location.required ? ew.Validators.required(fields.location.caption) : null], fields.location.isInvalid],
        ["mapId", [fields.mapId.visible && fields.mapId.required ? ew.Validators.required(fields.mapId.caption) : null, ew.Validators.integer], fields.mapId.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["notes", [fields.notes.visible && fields.notes.required ? ew.Validators.required(fields.notes.caption) : null], fields.notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = frecruitment_interviewsadd,
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
    frecruitment_interviewsadd.validate = function () {
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
    frecruitment_interviewsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    frecruitment_interviewsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("frecruitment_interviewsadd");
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
<form name="frecruitment_interviewsadd" id="frecruitment_interviewsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->job->Visible) { // job ?>
    <div id="r_job" class="form-group row">
        <label id="elh_recruitment_interviews_job" for="x_job" class="<?= $Page->LeftColumnClass ?>"><?= $Page->job->caption() ?><?= $Page->job->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->job->cellAttributes() ?>>
<span id="el_recruitment_interviews_job">
<input type="<?= $Page->job->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_job" name="x_job" id="x_job" size="30" placeholder="<?= HtmlEncode($Page->job->getPlaceHolder()) ?>" value="<?= $Page->job->EditValue ?>"<?= $Page->job->editAttributes() ?> aria-describedby="x_job_help">
<?= $Page->job->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->job->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->candidate->Visible) { // candidate ?>
    <div id="r_candidate" class="form-group row">
        <label id="elh_recruitment_interviews_candidate" for="x_candidate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->candidate->caption() ?><?= $Page->candidate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->candidate->cellAttributes() ?>>
<span id="el_recruitment_interviews_candidate">
<input type="<?= $Page->candidate->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_candidate" name="x_candidate" id="x_candidate" size="30" placeholder="<?= HtmlEncode($Page->candidate->getPlaceHolder()) ?>" value="<?= $Page->candidate->EditValue ?>"<?= $Page->candidate->editAttributes() ?> aria-describedby="x_candidate_help">
<?= $Page->candidate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->candidate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->level->Visible) { // level ?>
    <div id="r_level" class="form-group row">
        <label id="elh_recruitment_interviews_level" for="x_level" class="<?= $Page->LeftColumnClass ?>"><?= $Page->level->caption() ?><?= $Page->level->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->level->cellAttributes() ?>>
<span id="el_recruitment_interviews_level">
<input type="<?= $Page->level->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_level" name="x_level" id="x_level" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->level->getPlaceHolder()) ?>" value="<?= $Page->level->EditValue ?>"<?= $Page->level->editAttributes() ?> aria-describedby="x_level_help">
<?= $Page->level->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->level->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_recruitment_interviews_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_recruitment_interviews_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_interviewsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_interviewsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_recruitment_interviews_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_recruitment_interviews_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_interviewsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_interviewsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
    <div id="r_scheduled" class="form-group row">
        <label id="elh_recruitment_interviews_scheduled" for="x_scheduled" class="<?= $Page->LeftColumnClass ?>"><?= $Page->scheduled->caption() ?><?= $Page->scheduled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->scheduled->cellAttributes() ?>>
<span id="el_recruitment_interviews_scheduled">
<input type="<?= $Page->scheduled->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_scheduled" name="x_scheduled" id="x_scheduled" placeholder="<?= HtmlEncode($Page->scheduled->getPlaceHolder()) ?>" value="<?= $Page->scheduled->EditValue ?>"<?= $Page->scheduled->editAttributes() ?> aria-describedby="x_scheduled_help">
<?= $Page->scheduled->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->scheduled->getErrorMessage() ?></div>
<?php if (!$Page->scheduled->ReadOnly && !$Page->scheduled->Disabled && !isset($Page->scheduled->EditAttrs["readonly"]) && !isset($Page->scheduled->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["frecruitment_interviewsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("frecruitment_interviewsadd", "x_scheduled", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <div id="r_location" class="form-group row">
        <label id="elh_recruitment_interviews_location" for="x_location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->location->caption() ?><?= $Page->location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->location->cellAttributes() ?>>
<span id="el_recruitment_interviews_location">
<textarea data-table="recruitment_interviews" data-field="x_location" name="x_location" id="x_location" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->location->getPlaceHolder()) ?>"<?= $Page->location->editAttributes() ?> aria-describedby="x_location_help"><?= $Page->location->EditValue ?></textarea>
<?= $Page->location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mapId->Visible) { // mapId ?>
    <div id="r_mapId" class="form-group row">
        <label id="elh_recruitment_interviews_mapId" for="x_mapId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mapId->caption() ?><?= $Page->mapId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mapId->cellAttributes() ?>>
<span id="el_recruitment_interviews_mapId">
<input type="<?= $Page->mapId->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_mapId" name="x_mapId" id="x_mapId" size="30" placeholder="<?= HtmlEncode($Page->mapId->getPlaceHolder()) ?>" value="<?= $Page->mapId->EditValue ?>"<?= $Page->mapId->editAttributes() ?> aria-describedby="x_mapId_help">
<?= $Page->mapId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mapId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_recruitment_interviews_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_recruitment_interviews_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="recruitment_interviews" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <div id="r_notes" class="form-group row">
        <label id="elh_recruitment_interviews_notes" for="x_notes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notes->caption() ?><?= $Page->notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notes->cellAttributes() ?>>
<span id="el_recruitment_interviews_notes">
<textarea data-table="recruitment_interviews" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->notes->getPlaceHolder()) ?>"<?= $Page->notes->editAttributes() ?> aria-describedby="x_notes_help"><?= $Page->notes->EditValue ?></textarea>
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
    ew.addEventHandlers("recruitment_interviews");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
