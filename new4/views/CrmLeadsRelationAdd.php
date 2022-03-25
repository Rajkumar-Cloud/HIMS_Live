<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsRelationAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leads_relationadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fcrm_leads_relationadd = currentForm = new ew.Form("fcrm_leads_relationadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leads_relation")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leads_relation)
        ew.vars.tables.crm_leads_relation = currentTable;
    fcrm_leads_relationadd.addFields([
        ["leads_relation", [fields.leads_relation.visible && fields.leads_relation.required ? ew.Validators.required(fields.leads_relation.caption) : null], fields.leads_relation.isInvalid],
        ["sortorderid", [fields.sortorderid.visible && fields.sortorderid.required ? ew.Validators.required(fields.sortorderid.caption) : null, ew.Validators.integer], fields.sortorderid.isInvalid],
        ["presence", [fields.presence.visible && fields.presence.required ? ew.Validators.required(fields.presence.caption) : null, ew.Validators.integer], fields.presence.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leads_relationadd,
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
    fcrm_leads_relationadd.validate = function () {
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
    fcrm_leads_relationadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leads_relationadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leads_relationadd");
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
<form name="fcrm_leads_relationadd" id="fcrm_leads_relationadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
    <div id="r_leads_relation" class="form-group row">
        <label id="elh_crm_leads_relation_leads_relation" for="x_leads_relation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leads_relation->caption() ?><?= $Page->leads_relation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el_crm_leads_relation_leads_relation">
<input type="<?= $Page->leads_relation->getInputTextType() ?>" data-table="crm_leads_relation" data-field="x_leads_relation" name="x_leads_relation" id="x_leads_relation" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->leads_relation->getPlaceHolder()) ?>" value="<?= $Page->leads_relation->EditValue ?>"<?= $Page->leads_relation->editAttributes() ?> aria-describedby="x_leads_relation_help">
<?= $Page->leads_relation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leads_relation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
    <div id="r_sortorderid" class="form-group row">
        <label id="elh_crm_leads_relation_sortorderid" for="x_sortorderid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sortorderid->caption() ?><?= $Page->sortorderid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el_crm_leads_relation_sortorderid">
<input type="<?= $Page->sortorderid->getInputTextType() ?>" data-table="crm_leads_relation" data-field="x_sortorderid" name="x_sortorderid" id="x_sortorderid" size="30" placeholder="<?= HtmlEncode($Page->sortorderid->getPlaceHolder()) ?>" value="<?= $Page->sortorderid->EditValue ?>"<?= $Page->sortorderid->editAttributes() ?> aria-describedby="x_sortorderid_help">
<?= $Page->sortorderid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sortorderid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
    <div id="r_presence" class="form-group row">
        <label id="elh_crm_leads_relation_presence" for="x_presence" class="<?= $Page->LeftColumnClass ?>"><?= $Page->presence->caption() ?><?= $Page->presence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->presence->cellAttributes() ?>>
<span id="el_crm_leads_relation_presence">
<input type="<?= $Page->presence->getInputTextType() ?>" data-table="crm_leads_relation" data-field="x_presence" name="x_presence" id="x_presence" size="30" placeholder="<?= HtmlEncode($Page->presence->getPlaceHolder()) ?>" value="<?= $Page->presence->EditValue ?>"<?= $Page->presence->editAttributes() ?> aria-describedby="x_presence_help">
<?= $Page->presence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->presence->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_leads_relation");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
