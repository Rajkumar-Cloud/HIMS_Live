<?php

namespace PHPMaker2021\HIMS;

// Page object
$BanktransfertoAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbanktransfertoaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fbanktransfertoaddopt = currentForm = new ew.Form("fbanktransfertoaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "banktransferto")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.banktransferto)
        ew.vars.tables.banktransferto = currentTable;
    fbanktransfertoaddopt.addFields([
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Street_Address", [fields.Street_Address.visible && fields.Street_Address.required ? ew.Validators.required(fields.Street_Address.caption) : null], fields.Street_Address.isInvalid],
        ["City", [fields.City.visible && fields.City.required ? ew.Validators.required(fields.City.caption) : null], fields.City.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Zipcode", [fields.Zipcode.visible && fields.Zipcode.required ? ew.Validators.required(fields.Zipcode.caption) : null], fields.Zipcode.isInvalid],
        ["Mobile_Number", [fields.Mobile_Number.visible && fields.Mobile_Number.required ? ew.Validators.required(fields.Mobile_Number.caption) : null], fields.Mobile_Number.isInvalid],
        ["AccountNo", [fields.AccountNo.visible && fields.AccountNo.required ? ew.Validators.required(fields.AccountNo.caption) : null], fields.AccountNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbanktransfertoaddopt,
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
    fbanktransfertoaddopt.validate = function () {
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
    fbanktransfertoaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbanktransfertoaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fbanktransfertoaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fbanktransfertoaddopt" id="fbanktransfertoaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="banktransferto">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->Name->Visible) { // Name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="banktransferto" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Street_Address->Visible) { // Street_Address ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Street_Address"><?= $Page->Street_Address->caption() ?><?= $Page->Street_Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Street_Address->getInputTextType() ?>" data-table="banktransferto" data-field="x_Street_Address" name="x_Street_Address" id="x_Street_Address" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Street_Address->getPlaceHolder()) ?>" value="<?= $Page->Street_Address->EditValue ?>"<?= $Page->Street_Address->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Street_Address->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->City->Visible) { // City ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_City"><?= $Page->City->caption() ?><?= $Page->City->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->City->getInputTextType() ?>" data-table="banktransferto" data-field="x_City" name="x_City" id="x_City" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->City->getPlaceHolder()) ?>" value="<?= $Page->City->EditValue ?>"<?= $Page->City->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->City->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="banktransferto" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Zipcode->Visible) { // Zipcode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Zipcode"><?= $Page->Zipcode->caption() ?><?= $Page->Zipcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Zipcode->getInputTextType() ?>" data-table="banktransferto" data-field="x_Zipcode" name="x_Zipcode" id="x_Zipcode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Zipcode->getPlaceHolder()) ?>" value="<?= $Page->Zipcode->EditValue ?>"<?= $Page->Zipcode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Zipcode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Mobile_Number->Visible) { // Mobile_Number ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Mobile_Number"><?= $Page->Mobile_Number->caption() ?><?= $Page->Mobile_Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Mobile_Number->getInputTextType() ?>" data-table="banktransferto" data-field="x_Mobile_Number" name="x_Mobile_Number" id="x_Mobile_Number" size="30" maxlength="12" placeholder="<?= HtmlEncode($Page->Mobile_Number->getPlaceHolder()) ?>" value="<?= $Page->Mobile_Number->EditValue ?>"<?= $Page->Mobile_Number->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile_Number->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->AccountNo->Visible) { // AccountNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AccountNo"><?= $Page->AccountNo->caption() ?><?= $Page->AccountNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->AccountNo->getInputTextType() ?>" data-table="banktransferto" data-field="x_AccountNo" name="x_AccountNo" id="x_AccountNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AccountNo->getPlaceHolder()) ?>" value="<?= $Page->AccountNo->EditValue ?>"<?= $Page->AccountNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AccountNo->getErrorMessage() ?></div>
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
    ew.addEventHandlers("banktransferto");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
