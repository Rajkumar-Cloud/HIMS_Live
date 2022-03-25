<?php

namespace PHPMaker2021\project3;

// Page object
$PresRoutesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_routesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_routesedit = currentForm = new ew.Form("fpres_routesedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pres_routes.fields;
    fpres_routesedit.addFields([
        ["SNo", [fields.SNo.required ? ew.Validators.required(fields.SNo.caption) : null], fields.SNo.isInvalid],
        ["_Route", [fields._Route.required ? ew.Validators.required(fields._Route.caption) : null], fields._Route.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_routesedit,
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
    fpres_routesedit.validate = function () {
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
    fpres_routesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_routesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_routesedit");
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
<form name="fpres_routesedit" id="fpres_routesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->SNo->Visible) { // S.No ?>
    <div id="r_SNo" class="form-group row">
        <label id="elh_pres_routes_SNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SNo->caption() ?><?= $Page->SNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SNo->cellAttributes() ?>>
<span id="el_pres_routes_SNo">
<span<?= $Page->SNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SNo->getDisplayValue($Page->SNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_routes" data-field="x_SNo" data-hidden="1" name="x_SNo" id="x_SNo" value="<?= HtmlEncode($Page->SNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <div id="r__Route" class="form-group row">
        <label id="elh_pres_routes__Route" for="x__Route" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Route->caption() ?><?= $Page->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_routes__Route">
<input type="<?= $Page->_Route->getInputTextType() ?>" data-table="pres_routes" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->_Route->getPlaceHolder()) ?>" value="<?= $Page->_Route->EditValue ?>"<?= $Page->_Route->editAttributes() ?> aria-describedby="x__Route_help">
<?= $Page->_Route->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Route->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("pres_routes");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
