<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasBloodgroupAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_bloodgroupaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fmas_bloodgroupaddopt = currentForm = new ew.Form("fmas_bloodgroupaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_bloodgroup")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_bloodgroup)
        ew.vars.tables.mas_bloodgroup = currentTable;
    fmas_bloodgroupaddopt.addFields([
        ["BloodGroup", [fields.BloodGroup.visible && fields.BloodGroup.required ? ew.Validators.required(fields.BloodGroup.caption) : null], fields.BloodGroup.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_bloodgroupaddopt,
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
    fmas_bloodgroupaddopt.validate = function () {
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
        return true;
    }

    // Form_CustomValidate
    fmas_bloodgroupaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_bloodgroupaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_bloodgroupaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fmas_bloodgroupaddopt" id="fmas_bloodgroupaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="mas_bloodgroup">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->BloodGroup->Visible) { // BloodGroup ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_BloodGroup"><?= $Page->BloodGroup->caption() ?><?= $Page->BloodGroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->BloodGroup->getInputTextType() ?>" data-table="mas_bloodgroup" data-field="x_BloodGroup" name="x_BloodGroup" id="x_BloodGroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BloodGroup->getPlaceHolder()) ?>" value="<?= $Page->BloodGroup->EditValue ?>"<?= $Page->BloodGroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BloodGroup->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("mas_bloodgroup");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
