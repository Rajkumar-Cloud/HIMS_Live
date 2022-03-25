<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasPharmacyAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_pharmacyadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmas_pharmacyadd = currentForm = new ew.Form("fmas_pharmacyadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_pharmacy")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_pharmacy)
        ew.vars.tables.mas_pharmacy = currentTable;
    fmas_pharmacyadd.addFields([
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null, ew.Validators.datetime(0)], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_pharmacyadd,
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
    fmas_pharmacyadd.validate = function () {
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
    fmas_pharmacyadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_pharmacyadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_pharmacyadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fmas_pharmacyadd");
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
<form name="fmas_pharmacyadd" id="fmas_pharmacyadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_mas_pharmacy_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="mas_pharmacy" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_mas_pharmacy_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="mas_pharmacy" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_mas_pharmacy_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<span id="el_mas_pharmacy_description">
<textarea data-table="mas_pharmacy" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <div id="r_charged_date" class="form-group row">
        <label id="elh_mas_pharmacy_charged_date" for="x_charged_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->charged_date->caption() ?><?= $Page->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<input type="<?= $Page->charged_date->getInputTextType() ?>" data-table="mas_pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?= HtmlEncode($Page->charged_date->getPlaceHolder()) ?>" value="<?= $Page->charged_date->EditValue ?>"<?= $Page->charged_date->editAttributes() ?> aria-describedby="x_charged_date_help">
<?= $Page->charged_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->charged_date->getErrorMessage() ?></div>
<?php if (!$Page->charged_date->ReadOnly && !$Page->charged_date->Disabled && !isset($Page->charged_date->EditAttrs["readonly"]) && !isset($Page->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmas_pharmacyadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmas_pharmacyadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_mas_pharmacy_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="mas_pharmacy_x_status"
        data-table="mas_pharmacy"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_pharmacy_x_status']"),
        options = { name: "x_status", selectId: "mas_pharmacy_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_pharmacy.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("pharmacy_services", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_services->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyServicesGrid.php" ?>
<?php } ?>
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
    ew.addEventHandlers("mas_pharmacy");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
