<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseRequestItemsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchase_request_itemsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_purchase_request_itemsadd = currentForm = new ew.Form("fpharmacy_purchase_request_itemsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchase_request_items")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchase_request_items)
        ew.vars.tables.pharmacy_purchase_request_items = currentTable;
    fpharmacy_purchase_request_itemsadd.addFields([
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["prid", [fields.prid.visible && fields.prid.required ? ew.Validators.required(fields.prid.caption) : null, ew.Validators.integer], fields.prid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchase_request_itemsadd,
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
    fpharmacy_purchase_request_itemsadd.validate = function () {
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
    fpharmacy_purchase_request_itemsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchase_request_itemsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchase_request_itemsadd.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;
    loadjs.done("fpharmacy_purchase_request_itemsadd");
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
<form name="fpharmacy_purchase_request_itemsadd" id="fpharmacy_purchase_request_itemsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_purchase_request") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_purchase_request">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->prid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_pharmacy_purchase_request_items_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x_PRC" id="x_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label id="elh_pharmacy_purchase_request_items_PrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrName->caption() ?><?= $Page->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_PrName">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?> aria-describedby="x_PrName_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->PrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsadd"], function() {
    fpharmacy_purchase_request_itemsadd.createAutoSuggest(Object.assign({"id":"x_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x_PrName") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label id="elh_pharmacy_purchase_request_items_Quantity" for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quantity->caption() ?><?= $Page->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_items_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?> aria-describedby="x_Quantity_help">
<?= $Page->Quantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
    <div id="r_prid" class="form-group row">
        <label id="elh_pharmacy_purchase_request_items_prid" for="x_prid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->prid->caption() ?><?= $Page->prid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->prid->cellAttributes() ?>>
<?php if ($Page->prid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->prid->getDisplayValue($Page->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_prid" name="x_prid" value="<?= HtmlEncode($Page->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_purchase_request_items_prid">
<input type="<?= $Page->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x_prid" id="x_prid" size="30" placeholder="<?= HtmlEncode($Page->prid->getPlaceHolder()) ?>" value="<?= $Page->prid->EditValue ?>"<?= $Page->prid->editAttributes() ?> aria-describedby="x_prid_help">
<?= $Page->prid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
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
    ew.addEventHandlers("pharmacy_purchase_request_items");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
