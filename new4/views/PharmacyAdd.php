<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacyadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacyadd = currentForm = new ew.Form("fpharmacyadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy)
        ew.vars.tables.pharmacy = currentTable;
    fpharmacyadd.addFields([
        ["op_id", [fields.op_id.visible && fields.op_id.required ? ew.Validators.required(fields.op_id.caption) : null, ew.Validators.integer], fields.op_id.isInvalid],
        ["ip_id", [fields.ip_id.visible && fields.ip_id.required ? ew.Validators.required(fields.ip_id.caption) : null], fields.ip_id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null, ew.Validators.datetime(0)], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacyadd,
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
    fpharmacyadd.validate = function () {
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
    fpharmacyadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacyadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacyadd.lists.ip_id = <?= $Page->ip_id->toClientList($Page) ?>;
    fpharmacyadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fpharmacyadd");
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
<form name="fpharmacyadd" id="fpharmacyadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->op_id->Visible) { // op_id ?>
    <div id="r_op_id" class="form-group row">
        <label id="elh_pharmacy_op_id" for="x_op_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->op_id->caption() ?><?= $Page->op_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<input type="<?= $Page->op_id->getInputTextType() ?>" data-table="pharmacy" data-field="x_op_id" name="x_op_id" id="x_op_id" size="30" placeholder="<?= HtmlEncode($Page->op_id->getPlaceHolder()) ?>" value="<?= $Page->op_id->EditValue ?>"<?= $Page->op_id->editAttributes() ?> aria-describedby="x_op_id_help">
<?= $Page->op_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->op_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ip_id->Visible) { // ip_id ?>
    <div id="r_ip_id" class="form-group row">
        <label id="elh_pharmacy_ip_id" for="x_ip_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ip_id->caption() ?><?= $Page->ip_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
    <select
        id="x_ip_id"
        name="x_ip_id"
        class="form-control ew-select<?= $Page->ip_id->isInvalidClass() ?>"
        data-select2-id="pharmacy_x_ip_id"
        data-table="pharmacy"
        data-field="x_ip_id"
        data-value-separator="<?= $Page->ip_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ip_id->getPlaceHolder()) ?>"
        <?= $Page->ip_id->editAttributes() ?>>
        <?= $Page->ip_id->selectOptionListHtml("x_ip_id") ?>
    </select>
    <?= $Page->ip_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ip_id->getErrorMessage() ?></div>
<?= $Page->ip_id->Lookup->getParamTag($Page, "p_x_ip_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_x_ip_id']"),
        options = { name: "x_ip_id", selectId: "pharmacy_x_ip_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy.fields.ip_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_pharmacy_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="pharmacy" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?> aria-describedby="x_patient_id_help">
<?= $Page->patient_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <div id="r_charged_date" class="form-group row">
        <label id="elh_pharmacy_charged_date" for="x_charged_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->charged_date->caption() ?><?= $Page->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<input type="<?= $Page->charged_date->getInputTextType() ?>" data-table="pharmacy" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?= HtmlEncode($Page->charged_date->getPlaceHolder()) ?>" value="<?= $Page->charged_date->EditValue ?>"<?= $Page->charged_date->editAttributes() ?> aria-describedby="x_charged_date_help">
<?= $Page->charged_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->charged_date->getErrorMessage() ?></div>
<?php if (!$Page->charged_date->ReadOnly && !$Page->charged_date->Disabled && !isset($Page->charged_date->EditAttrs["readonly"]) && !isset($Page->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacyadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacyadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_pharmacy_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="pharmacy_x_status"
        data-table="pharmacy"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_x_status']"),
        options = { name: "x_status", selectId: "pharmacy_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy.fields.status.selectOptions);
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
    ew.addEventHandlers("pharmacy");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
