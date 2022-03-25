<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationStageAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudation_stageadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_oocytedenudation_stageadd = currentForm = new ew.Form("fivf_oocytedenudation_stageadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation_stage")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_oocytedenudation_stage)
        ew.vars.tables.ivf_oocytedenudation_stage = currentTable;
    fivf_oocytedenudation_stageadd.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["OidNo", [fields.OidNo.visible && fields.OidNo.required ? ew.Validators.required(fields.OidNo.caption) : null, ew.Validators.integer], fields.OidNo.isInvalid],
        ["OocyteNo", [fields.OocyteNo.visible && fields.OocyteNo.required ? ew.Validators.required(fields.OocyteNo.caption) : null], fields.OocyteNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["ReMarks", [fields.ReMarks.visible && fields.ReMarks.required ? ew.Validators.required(fields.ReMarks.caption) : null], fields.ReMarks.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_oocytedenudation_stageadd,
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
    fivf_oocytedenudation_stageadd.validate = function () {
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
    fivf_oocytedenudation_stageadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_oocytedenudation_stageadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_oocytedenudation_stageadd.lists.Stage = <?= $Page->Stage->toClientList($Page) ?>;
    loadjs.done("fivf_oocytedenudation_stageadd");
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
<form name="fivf_oocytedenudation_stageadd" id="fivf_oocytedenudation_stageadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation_stage">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OidNo->Visible) { // OidNo ?>
    <div id="r_OidNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_OidNo" for="x_OidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OidNo->caption() ?><?= $Page->OidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OidNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OidNo">
<input type="<?= $Page->OidNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_OidNo" name="x_OidNo" id="x_OidNo" size="30" placeholder="<?= HtmlEncode($Page->OidNo->getPlaceHolder()) ?>" value="<?= $Page->OidNo->EditValue ?>"<?= $Page->OidNo->editAttributes() ?> aria-describedby="x_OidNo_help">
<?= $Page->OidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
    <div id="r_OocyteNo" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_OocyteNo" for="x_OocyteNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocyteNo->caption() ?><?= $Page->OocyteNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?> aria-describedby="x_OocyteNo_help">
<?= $Page->OocyteNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <div id="r_Stage" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_Stage" for="x_Stage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stage->caption() ?><?= $Page->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stage->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_Stage">
    <select
        id="x_Stage"
        name="x_Stage"
        class="form-control ew-select<?= $Page->Stage->isInvalidClass() ?>"
        data-select2-id="ivf_oocytedenudation_stage_x_Stage"
        data-table="ivf_oocytedenudation_stage"
        data-field="x_Stage"
        data-value-separator="<?= $Page->Stage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>"
        <?= $Page->Stage->editAttributes() ?>>
        <?= $Page->Stage->selectOptionListHtml("x_Stage") ?>
    </select>
    <?= $Page->Stage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_oocytedenudation_stage_x_Stage']"),
        options = { name: "x_Stage", selectId: "ivf_oocytedenudation_stage_x_Stage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_oocytedenudation_stage.fields.Stage.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReMarks->Visible) { // ReMarks ?>
    <div id="r_ReMarks" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_ReMarks" for="x_ReMarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReMarks->caption() ?><?= $Page->ReMarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReMarks->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_ReMarks">
<input type="<?= $Page->ReMarks->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_ReMarks" name="x_ReMarks" id="x_ReMarks" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReMarks->getPlaceHolder()) ?>" value="<?= $Page->ReMarks->EditValue ?>"<?= $Page->ReMarks->editAttributes() ?> aria-describedby="x_ReMarks_help">
<?= $Page->ReMarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReMarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_oocytedenudation_stage_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_oocytedenudation_stage_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_oocytedenudation_stage" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_oocytedenudation_stage");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
