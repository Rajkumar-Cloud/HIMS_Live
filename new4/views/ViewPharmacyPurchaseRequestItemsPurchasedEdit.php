<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestItemsPurchasedEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_items_purchasededit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_pharmacy_purchase_request_items_purchasededit = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasededit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_items_purchased")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_purchase_request_items_purchased)
        ew.vars.tables.view_pharmacy_purchase_request_items_purchased = currentTable;
    fview_pharmacy_purchase_request_items_purchasededit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["ApprovedStatus", [fields.ApprovedStatus.visible && fields.ApprovedStatus.required ? ew.Validators.required(fields.ApprovedStatus.caption) : null], fields.ApprovedStatus.isInvalid],
        ["PurchaseStatus", [fields.PurchaseStatus.visible && fields.PurchaseStatus.required ? ew.Validators.required(fields.PurchaseStatus.caption) : null], fields.PurchaseStatus.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["prid", [fields.prid.visible && fields.prid.required ? ew.Validators.required(fields.prid.caption) : null], fields.prid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_purchase_request_items_purchasededit,
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
    fview_pharmacy_purchase_request_items_purchasededit.validate = function () {
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
    fview_pharmacy_purchase_request_items_purchasededit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_purchase_request_items_purchasededit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_purchase_request_items_purchasededit.lists.PurchaseStatus = <?= $Page->PurchaseStatus->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_purchase_request_items_purchasededit");
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
<form name="fview_pharmacy_purchase_request_items_purchasededit" id="fview_pharmacy_purchase_request_items_purchasededit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "view_pharmacy_purchase_request_purchased") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->prid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PRC->getDisplayValue($Page->PRC->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="x_PRC" id="x_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_PrName" for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrName->caption() ?><?= $Page->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PrName->getDisplayValue($Page->PrName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="x_PrName" id="x_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quantity->caption() ?><?= $Page->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?> aria-describedby="x_Quantity_help">
<?= $Page->Quantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <div id="r_ApprovedStatus" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" for="x_ApprovedStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ApprovedStatus->caption() ?><?= $Page->ApprovedStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ApprovedStatus->getDisplayValue($Page->ApprovedStatus->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="x_ApprovedStatus" id="x_ApprovedStatus" value="<?= HtmlEncode($Page->ApprovedStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <div id="r_PurchaseStatus" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" for="x_PurchaseStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurchaseStatus->caption() ?><?= $Page->PurchaseStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
    <select
        id="x_PurchaseStatus"
        name="x_PurchaseStatus"
        class="form-control ew-select<?= $Page->PurchaseStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_purchased_x_PurchaseStatus"
        data-table="view_pharmacy_purchase_request_items_purchased"
        data-field="x_PurchaseStatus"
        data-value-separator="<?= $Page->PurchaseStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PurchaseStatus->getPlaceHolder()) ?>"
        <?= $Page->PurchaseStatus->editAttributes() ?>>
        <?= $Page->PurchaseStatus->selectOptionListHtml("x_PurchaseStatus") ?>
    </select>
    <?= $Page->PurchaseStatus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PurchaseStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_purchased_x_PurchaseStatus']"),
        options = { name: "x_PurchaseStatus", selectId: "view_pharmacy_purchase_request_items_purchased_x_PurchaseStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifiedby->getDisplayValue($Page->modifiedby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifiedby" data-hidden="1" name="x_modifiedby" id="x_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifieddatetime->getDisplayValue($Page->modifieddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_modifieddatetime" data-hidden="1" name="x_modifieddatetime" id="x_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BRCODE->getDisplayValue($Page->BRCODE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_BRCODE" data-hidden="1" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
    <div id="r_prid" class="form-group row">
        <label id="elh_view_pharmacy_purchase_request_items_purchased_prid" for="x_prid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->prid->caption() ?><?= $Page->prid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->prid->getDisplayValue($Page->prid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_prid" data-hidden="1" name="x_prid" id="x_prid" value="<?= HtmlEncode($Page->prid->CurrentValue) ?>">
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
    ew.addEventHandlers("view_pharmacy_purchase_request_items_purchased");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
