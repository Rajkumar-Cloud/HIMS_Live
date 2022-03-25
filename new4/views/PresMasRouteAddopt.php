<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresMasRouteAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_mas_routeaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fpres_mas_routeaddopt = currentForm = new ew.Form("fpres_mas_routeaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_mas_route")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_mas_route)
        ew.vars.tables.pres_mas_route = currentTable;
    fpres_mas_routeaddopt.addFields([
        ["_Route", [fields._Route.visible && fields._Route.required ? ew.Validators.required(fields._Route.caption) : null], fields._Route.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_mas_routeaddopt,
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
    fpres_mas_routeaddopt.validate = function () {
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
    fpres_mas_routeaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_mas_routeaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_mas_routeaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fpres_mas_routeaddopt" id="fpres_mas_routeaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="pres_mas_route">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->_Route->Visible) { // Route ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x__Route"><?= $Page->_Route->caption() ?><?= $Page->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->_Route->getInputTextType() ?>" data-table="pres_mas_route" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_Route->getPlaceHolder()) ?>" value="<?= $Page->_Route->EditValue ?>"<?= $Page->_Route->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_Route->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_mas_route");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
