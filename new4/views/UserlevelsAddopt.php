<?php

namespace PHPMaker2021\HIMS;

// Page object
$UserlevelsAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fuserlevelsaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fuserlevelsaddopt = currentForm = new ew.Form("fuserlevelsaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "userlevels")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.userlevels)
        ew.vars.tables.userlevels = currentTable;
    fuserlevelsaddopt.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.userLevelId, ew.Validators.integer], fields.id.isInvalid],
        ["UserLevelsName", [fields.UserLevelsName.visible && fields.UserLevelsName.required ? ew.Validators.required(fields.UserLevelsName.caption) : null, ew.Validators.userLevelName('id')], fields.UserLevelsName.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fuserlevelsaddopt,
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
    fuserlevelsaddopt.validate = function () {
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
    fuserlevelsaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fuserlevelsaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fuserlevelsaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fuserlevelsaddopt" id="fuserlevelsaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="userlevels">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->id->Visible) { // id ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="userlevels" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->UserLevelsName->Visible) { // UserLevelsName ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_UserLevelsName"><?= $Page->UserLevelsName->caption() ?><?= $Page->UserLevelsName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->UserLevelsName->getInputTextType() ?>" data-table="userlevels" data-field="x_UserLevelsName" name="x_UserLevelsName" id="x_UserLevelsName" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->UserLevelsName->getPlaceHolder()) ?>" value="<?= $Page->UserLevelsName->EditValue ?>"<?= $Page->UserLevelsName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UserLevelsName->getErrorMessage() ?></div>
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
    ew.addEventHandlers("userlevels");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
