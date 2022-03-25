<?php

namespace PHPMaker2021\HIMS;

// Page object
$HelpEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhelpedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fhelpedit = currentForm = new ew.Form("fhelpedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "help")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.help)
        ew.vars.tables.help = currentTable;
    fhelpedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Tittle", [fields.Tittle.visible && fields.Tittle.required ? ew.Validators.required(fields.Tittle.caption) : null], fields.Tittle.isInvalid],
        ["Description", [fields.Description.visible && fields.Description.required ? ew.Validators.required(fields.Description.caption) : null], fields.Description.isInvalid],
        ["orderid", [fields.orderid.visible && fields.orderid.required ? ew.Validators.required(fields.orderid.caption) : null, ew.Validators.integer], fields.orderid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhelpedit,
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
    fhelpedit.validate = function () {
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
    fhelpedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhelpedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fhelpedit");
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
<form name="fhelpedit" id="fhelpedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_help_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_help_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_help_id"><span id="el_help_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="help" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tittle->Visible) { // Tittle ?>
    <div id="r_Tittle" class="form-group row">
        <label id="elh_help_Tittle" for="x_Tittle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_help_Tittle"><?= $Page->Tittle->caption() ?><?= $Page->Tittle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tittle->cellAttributes() ?>>
<template id="tpx_help_Tittle"><span id="el_help_Tittle">
<input type="<?= $Page->Tittle->getInputTextType() ?>" data-table="help" data-field="x_Tittle" name="x_Tittle" id="x_Tittle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tittle->getPlaceHolder()) ?>" value="<?= $Page->Tittle->EditValue ?>"<?= $Page->Tittle->editAttributes() ?> aria-describedby="x_Tittle_help">
<?= $Page->Tittle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tittle->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Description->Visible) { // Description ?>
    <div id="r_Description" class="form-group row">
        <label id="elh_help_Description" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_help_Description"><?= $Page->Description->caption() ?><?= $Page->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Description->cellAttributes() ?>>
<template id="tpx_help_Description"><span id="el_help_Description">
<?php $Page->Description->EditAttrs->appendClass("editor"); ?>
<textarea data-table="help" data-field="x_Description" name="x_Description" id="x_Description" cols="35" rows="400" placeholder="<?= HtmlEncode($Page->Description->getPlaceHolder()) ?>"<?= $Page->Description->editAttributes() ?> aria-describedby="x_Description_help"><?= $Page->Description->EditValue ?></textarea>
<?= $Page->Description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Description->getErrorMessage() ?></div>
<script>
loadjs.ready(["fhelpedit", "editor"], function() {
	ew.createEditor("fhelpedit", "x_Description", 35, 400, <?= $Page->Description->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->orderid->Visible) { // orderid ?>
    <div id="r_orderid" class="form-group row">
        <label id="elh_help_orderid" for="x_orderid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_help_orderid"><?= $Page->orderid->caption() ?><?= $Page->orderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->orderid->cellAttributes() ?>>
<template id="tpx_help_orderid"><span id="el_help_orderid">
<input type="<?= $Page->orderid->getInputTextType() ?>" data-table="help" data-field="x_orderid" name="x_orderid" id="x_orderid" size="30" placeholder="<?= HtmlEncode($Page->orderid->getPlaceHolder()) ?>" value="<?= $Page->orderid->EditValue ?>"<?= $Page->orderid->editAttributes() ?> aria-describedby="x_orderid_help">
<?= $Page->orderid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->orderid->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_helpedit" class="ew-custom-template"></div>
<template id="tpm_helpedit">
<div id="ct_HelpEdit">
<style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<slot class="ew-slot" name="tpc_help_Tittle"></slot>&nbsp;<slot class="ew-slot" name="tpx_help_Tittle"></slot>
<br>
<slot class="ew-slot" name="tpc_help_Description"></slot>&nbsp;<slot class="ew-slot" name="tpx_help_Description"></slot>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_helpedit", "tpm_helpedit", "helpedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("help");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
