<?php

namespace PHPMaker2021\project3;

// Page object
$IvfFollowUpTrackingAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_follow_up_trackingadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_follow_up_trackingadd = currentForm = new ew.Form("fivf_follow_up_trackingadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_follow_up_tracking.fields;
    fivf_follow_up_trackingadd.addFields([
        ["RIDNO", [fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["MReadMore", [fields.MReadMore.required ? ew.Validators.required(fields.MReadMore.caption) : null], fields.MReadMore.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["createdUserName", [fields.createdUserName.required ? ew.Validators.required(fields.createdUserName.caption) : null], fields.createdUserName.isInvalid],
        ["FollowUpDate", [fields.FollowUpDate.required ? ew.Validators.required(fields.FollowUpDate.caption) : null, ew.Validators.datetime(0)], fields.FollowUpDate.isInvalid],
        ["NextVistDate", [fields.NextVistDate.required ? ew.Validators.required(fields.NextVistDate.caption) : null, ew.Validators.datetime(0)], fields.NextVistDate.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_follow_up_trackingadd,
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
    fivf_follow_up_trackingadd.validate = function () {
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
    fivf_follow_up_trackingadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_follow_up_trackingadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_follow_up_trackingadd");
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
<form name="fivf_follow_up_trackingadd" id="fivf_follow_up_trackingadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <div id="r_MReadMore" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_MReadMore" for="x_MReadMore" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MReadMore->caption() ?><?= $Page->MReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MReadMore->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_MReadMore">
<textarea data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MReadMore->getPlaceHolder()) ?>"<?= $Page->MReadMore->editAttributes() ?> aria-describedby="x_MReadMore_help"><?= $Page->MReadMore->EditValue ?></textarea>
<?= $Page->MReadMore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MReadMore->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_follow_up_trackingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_follow_up_trackingadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_follow_up_trackingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_follow_up_trackingadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <div id="r_createdUserName" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_createdUserName" for="x_createdUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdUserName->caption() ?><?= $Page->createdUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_createdUserName">
<input type="<?= $Page->createdUserName->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdUserName->getPlaceHolder()) ?>" value="<?= $Page->createdUserName->EditValue ?>"<?= $Page->createdUserName->editAttributes() ?> aria-describedby="x_createdUserName_help">
<?= $Page->createdUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpDate->Visible) { // FollowUpDate ?>
    <div id="r_FollowUpDate" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_FollowUpDate" for="x_FollowUpDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowUpDate->caption() ?><?= $Page->FollowUpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpDate->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_FollowUpDate">
<input type="<?= $Page->FollowUpDate->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_FollowUpDate" name="x_FollowUpDate" id="x_FollowUpDate" placeholder="<?= HtmlEncode($Page->FollowUpDate->getPlaceHolder()) ?>" value="<?= $Page->FollowUpDate->EditValue ?>"<?= $Page->FollowUpDate->editAttributes() ?> aria-describedby="x_FollowUpDate_help">
<?= $Page->FollowUpDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpDate->getErrorMessage() ?></div>
<?php if (!$Page->FollowUpDate->ReadOnly && !$Page->FollowUpDate->Disabled && !isset($Page->FollowUpDate->EditAttrs["readonly"]) && !isset($Page->FollowUpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_follow_up_trackingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_follow_up_trackingadd", "x_FollowUpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextVistDate->Visible) { // NextVistDate ?>
    <div id="r_NextVistDate" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_NextVistDate" for="x_NextVistDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NextVistDate->caption() ?><?= $Page->NextVistDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextVistDate->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_NextVistDate">
<input type="<?= $Page->NextVistDate->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_NextVistDate" name="x_NextVistDate" id="x_NextVistDate" placeholder="<?= HtmlEncode($Page->NextVistDate->getPlaceHolder()) ?>" value="<?= $Page->NextVistDate->EditValue ?>"<?= $Page->NextVistDate->editAttributes() ?> aria-describedby="x_NextVistDate_help">
<?= $Page->NextVistDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextVistDate->getErrorMessage() ?></div>
<?php if (!$Page->NextVistDate->ReadOnly && !$Page->NextVistDate->Disabled && !isset($Page->NextVistDate->EditAttrs["readonly"]) && !isset($Page->NextVistDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_follow_up_trackingadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_follow_up_trackingadd", "x_NextVistDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_ivf_follow_up_tracking_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_ivf_follow_up_tracking_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="ivf_follow_up_tracking" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
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
    ew.addEventHandlers("ivf_follow_up_tracking");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
