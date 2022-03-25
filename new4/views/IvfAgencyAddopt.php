<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfAgencyAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_agencyaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fivf_agencyaddopt = currentForm = new ew.Form("fivf_agencyaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_agency")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_agency)
        ew.vars.tables.ivf_agency = currentTable;
    fivf_agencyaddopt.addFields([
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Street", [fields.Street.visible && fields.Street.required ? ew.Validators.required(fields.Street.caption) : null], fields.Street.isInvalid],
        ["Town", [fields.Town.visible && fields.Town.required ? ew.Validators.required(fields.Town.caption) : null], fields.Town.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pin", [fields.Pin.visible && fields.Pin.required ? ew.Validators.required(fields.Pin.caption) : null], fields.Pin.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_agencyaddopt,
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
    fivf_agencyaddopt.validate = function () {
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
    fivf_agencyaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_agencyaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_agencyaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fivf_agencyaddopt" id="fivf_agencyaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="ivf_agency">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->Name->Visible) { // Name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_agency" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Street->Visible) { // Street ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Street"><?= $Page->Street->caption() ?><?= $Page->Street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Street->getInputTextType() ?>" data-table="ivf_agency" data-field="x_Street" name="x_Street" id="x_Street" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Street->getPlaceHolder()) ?>" value="<?= $Page->Street->EditValue ?>"<?= $Page->Street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Street->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Town->Visible) { // Town ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Town"><?= $Page->Town->caption() ?><?= $Page->Town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Town->getInputTextType() ?>" data-table="ivf_agency" data-field="x_Town" name="x_Town" id="x_Town" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Town->getPlaceHolder()) ?>" value="<?= $Page->Town->EditValue ?>"<?= $Page->Town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Town->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="ivf_agency" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Pin->Visible) { // Pin ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Pin"><?= $Page->Pin->caption() ?><?= $Page->Pin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Pin->getInputTextType() ?>" data-table="ivf_agency" data-field="x_Pin" name="x_Pin" id="x_Pin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pin->getPlaceHolder()) ?>" value="<?= $Page->Pin->EditValue ?>"<?= $Page->Pin->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pin->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_agency");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
