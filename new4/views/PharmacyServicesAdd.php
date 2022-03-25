<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyServicesAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_servicesadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_servicesadd = currentForm = new ew.Form("fpharmacy_servicesadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_services")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_services)
        ew.vars.tables.pharmacy_services = currentTable;
    fpharmacy_servicesadd.addFields([
        ["pharmacy_id", [fields.pharmacy_id.visible && fields.pharmacy_id.required ? ew.Validators.required(fields.pharmacy_id.caption) : null], fields.pharmacy_id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["description", [fields.description.visible && fields.description.required ? ew.Validators.required(fields.description.caption) : null], fields.description.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_servicesadd,
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
    fpharmacy_servicesadd.validate = function () {
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
    fpharmacy_servicesadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_servicesadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_servicesadd.lists.pharmacy_id = <?= $Page->pharmacy_id->toClientList($Page) ?>;
    fpharmacy_servicesadd.lists.name = <?= $Page->name->toClientList($Page) ?>;
    fpharmacy_servicesadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fpharmacy_servicesadd");
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
<form name="fpharmacy_servicesadd" id="fpharmacy_servicesadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_services">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "pharmacy") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->pharmacy_id->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->patient_id->getSessionValue()) ?>">
<?php } ?>
<?php if ($Page->getCurrentMasterTable() == "mas_pharmacy") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="mas_pharmacy">
<input type="hidden" name="fk_name" value="<?= HtmlEncode($Page->name->getSessionValue()) ?>">
<input type="hidden" name="fk_amount" value="<?= HtmlEncode($Page->amount->getSessionValue()) ?>">
<input type="hidden" name="fk_description" value="<?= HtmlEncode($Page->description->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
    <div id="r_pharmacy_id" class="form-group row">
        <label id="elh_pharmacy_services_pharmacy_id" for="x_pharmacy_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacy_id->caption() ?><?= $Page->pharmacy_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy_id->cellAttributes() ?>>
<?php if ($Page->pharmacy_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_pharmacy_id">
<span<?= $Page->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->pharmacy_id->getDisplayValue($Page->pharmacy_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_pharmacy_id" name="x_pharmacy_id" value="<?= HtmlEncode($Page->pharmacy_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_services_pharmacy_id">
    <select
        id="x_pharmacy_id"
        name="x_pharmacy_id"
        class="form-control ew-select<?= $Page->pharmacy_id->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x_pharmacy_id"
        data-table="pharmacy_services"
        data-field="x_pharmacy_id"
        data-value-separator="<?= $Page->pharmacy_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->pharmacy_id->getPlaceHolder()) ?>"
        <?= $Page->pharmacy_id->editAttributes() ?>>
        <?= $Page->pharmacy_id->selectOptionListHtml("x_pharmacy_id") ?>
    </select>
    <?= $Page->pharmacy_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->pharmacy_id->getErrorMessage() ?></div>
<?= $Page->pharmacy_id->Lookup->getParamTag($Page, "p_x_pharmacy_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x_pharmacy_id']"),
        options = { name: "x_pharmacy_id", selectId: "pharmacy_services_x_pharmacy_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.pharmacy_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_pharmacy_services_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<?php if ($Page->patient_id->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_id->getDisplayValue($Page->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_patient_id" name="x_patient_id" value="<?= HtmlEncode($Page->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_services_patient_id">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?> aria-describedby="x_patient_id_help">
<?= $Page->patient_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_pharmacy_services_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<?php if ($Page->name->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_name">
<span<?= $Page->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->name->getDisplayValue($Page->name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_name" name="x_name" value="<?= HtmlEncode($Page->name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_services_name">
<div class="input-group ew-lookup-list" aria-describedby="x_name_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_name"><?= EmptyValue(strval($Page->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->name->ReadOnly || $Page->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
<?= $Page->name->getCustomMessage() ?>
<?= $Page->name->Lookup->getParamTag($Page, "p_x_name") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_services" data-field="x_name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->name->displayValueSeparatorAttribute() ?>" name="x_name" id="x_name" value="<?= $Page->name->CurrentValue ?>"<?= $Page->name->editAttributes() ?>>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_pharmacy_services_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<?php if ($Page->amount->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->amount->getDisplayValue($Page->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_amount" name="x_amount" value="<?= HtmlEncode($Page->amount->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_services_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <div id="r_description" class="form-group row">
        <label id="elh_pharmacy_services_description" for="x_description" class="<?= $Page->LeftColumnClass ?>"><?= $Page->description->caption() ?><?= $Page->description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->description->cellAttributes() ?>>
<?php if ($Page->description->getSessionValue() != "") { ?>
<span id="el_pharmacy_services_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->ViewValue ?></span>
</span>
<input type="hidden" id="x_description" name="x_description" value="<?= HtmlEncode($Page->description->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_services_description">
<textarea data-table="pharmacy_services" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->description->getPlaceHolder()) ?>"<?= $Page->description->editAttributes() ?> aria-describedby="x_description_help"><?= $Page->description->EditValue ?></textarea>
<?= $Page->description->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->description->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_pharmacy_services_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_pharmacy_services_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x_status"
        data-table="pharmacy_services"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x_status']"),
        options = { name: "x_status", selectId: "pharmacy_services_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
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
    ew.addEventHandlers("pharmacy_services");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
