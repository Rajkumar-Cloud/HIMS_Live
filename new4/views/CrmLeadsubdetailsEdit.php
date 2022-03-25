<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsubdetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadsubdetailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_leadsubdetailsedit = currentForm = new ew.Form("fcrm_leadsubdetailsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leadsubdetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leadsubdetails)
        ew.vars.tables.crm_leadsubdetails = currentTable;
    fcrm_leadsubdetailsedit.addFields([
        ["leadsubscriptionid", [fields.leadsubscriptionid.visible && fields.leadsubscriptionid.required ? ew.Validators.required(fields.leadsubscriptionid.caption) : null, ew.Validators.integer], fields.leadsubscriptionid.isInvalid],
        ["website", [fields.website.visible && fields.website.required ? ew.Validators.required(fields.website.caption) : null], fields.website.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leadsubdetailsedit,
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
    fcrm_leadsubdetailsedit.validate = function () {
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
    fcrm_leadsubdetailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leadsubdetailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leadsubdetailsedit");
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
<form name="fcrm_leadsubdetailsedit" id="fcrm_leadsubdetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsubdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->leadsubscriptionid->Visible) { // leadsubscriptionid ?>
    <div id="r_leadsubscriptionid" class="form-group row">
        <label id="elh_crm_leadsubdetails_leadsubscriptionid" for="x_leadsubscriptionid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadsubscriptionid->caption() ?><?= $Page->leadsubscriptionid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadsubscriptionid->cellAttributes() ?>>
<input type="<?= $Page->leadsubscriptionid->getInputTextType() ?>" data-table="crm_leadsubdetails" data-field="x_leadsubscriptionid" name="x_leadsubscriptionid" id="x_leadsubscriptionid" size="30" placeholder="<?= HtmlEncode($Page->leadsubscriptionid->getPlaceHolder()) ?>" value="<?= $Page->leadsubscriptionid->EditValue ?>"<?= $Page->leadsubscriptionid->editAttributes() ?> aria-describedby="x_leadsubscriptionid_help">
<?= $Page->leadsubscriptionid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadsubscriptionid->getErrorMessage() ?></div>
<input type="hidden" data-table="crm_leadsubdetails" data-field="x_leadsubscriptionid" data-hidden="1" name="o_leadsubscriptionid" id="o_leadsubscriptionid" value="<?= HtmlEncode($Page->leadsubscriptionid->OldValue ?? $Page->leadsubscriptionid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->website->Visible) { // website ?>
    <div id="r_website" class="form-group row">
        <label id="elh_crm_leadsubdetails_website" for="x_website" class="<?= $Page->LeftColumnClass ?>"><?= $Page->website->caption() ?><?= $Page->website->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->website->cellAttributes() ?>>
<span id="el_crm_leadsubdetails_website">
<input type="<?= $Page->website->getInputTextType() ?>" data-table="crm_leadsubdetails" data-field="x_website" name="x_website" id="x_website" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->website->getPlaceHolder()) ?>" value="<?= $Page->website->EditValue ?>"<?= $Page->website->editAttributes() ?> aria-describedby="x_website_help">
<?= $Page->website->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->website->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("crm_leadsubdetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
