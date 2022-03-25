<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesNewEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_trade_combination_names_newedit = currentForm = new ew.Form("fpres_trade_combination_names_newedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_trade_combination_names_new)
        ew.vars.tables.pres_trade_combination_names_new = currentTable;
    fpres_trade_combination_names_newedit.addFields([
        ["ID", [fields.ID.visible && fields.ID.required ? ew.Validators.required(fields.ID.caption) : null], fields.ID.isInvalid],
        ["tradenames_id", [fields.tradenames_id.visible && fields.tradenames_id.required ? ew.Validators.required(fields.tradenames_id.caption) : null, ew.Validators.integer], fields.tradenames_id.isInvalid],
        ["Drug_Name", [fields.Drug_Name.visible && fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["Generic_Name", [fields.Generic_Name.visible && fields.Generic_Name.required ? ew.Validators.required(fields.Generic_Name.caption) : null], fields.Generic_Name.isInvalid],
        ["Trade_Name", [fields.Trade_Name.visible && fields.Trade_Name.required ? ew.Validators.required(fields.Trade_Name.caption) : null], fields.Trade_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.visible && fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Strength", [fields.Strength.visible && fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null], fields.Strength.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.visible && fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["CONTAINER_STRENGTH", [fields.CONTAINER_STRENGTH.visible && fields.CONTAINER_STRENGTH.required ? ew.Validators.required(fields.CONTAINER_STRENGTH.caption) : null], fields.CONTAINER_STRENGTH.isInvalid],
        ["TypeOfDrug", [fields.TypeOfDrug.visible && fields.TypeOfDrug.required ? ew.Validators.required(fields.TypeOfDrug.caption) : null], fields.TypeOfDrug.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_trade_combination_names_newedit,
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
    fpres_trade_combination_names_newedit.validate = function () {
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
    fpres_trade_combination_names_newedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_trade_combination_names_newedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_trade_combination_names_newedit.lists.Generic_Name = <?= $Page->Generic_Name->toClientList($Page) ?>;
    fpres_trade_combination_names_newedit.lists.Form = <?= $Page->Form->toClientList($Page) ?>;
    fpres_trade_combination_names_newedit.lists.Unit = <?= $Page->Unit->toClientList($Page) ?>;
    fpres_trade_combination_names_newedit.lists.TypeOfDrug = <?= $Page->TypeOfDrug->toClientList($Page) ?>;
    loadjs.done("fpres_trade_combination_names_newedit");
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
<form name="fpres_trade_combination_names_newedit" id="fpres_trade_combination_names_newedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "pres_tradenames_new") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pres_tradenames_new">
<input type="hidden" name="fk_ID" value="<?= HtmlEncode($Page->tradenames_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->ID->Visible) { // ID ?>
    <div id="r_ID" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_ID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ID->caption() ?><?= $Page->ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ID->getDisplayValue($Page->ID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x_ID" id="x_ID" value="<?= HtmlEncode($Page->ID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
    <div id="r_tradenames_id" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_tradenames_id" for="x_tradenames_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tradenames_id->caption() ?><?= $Page->tradenames_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tradenames_id->cellAttributes() ?>>
<?php if ($Page->tradenames_id->getSessionValue() != "") { ?>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tradenames_id->getDisplayValue($Page->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_tradenames_id" name="x_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<input type="<?= $Page->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x_tradenames_id" id="x_tradenames_id" size="30" placeholder="<?= HtmlEncode($Page->tradenames_id->getPlaceHolder()) ?>" value="<?= $Page->tradenames_id->EditValue ?>"<?= $Page->tradenames_id->editAttributes() ?> aria-describedby="x_tradenames_id_help">
<?= $Page->tradenames_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <div id="r_Drug_Name" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Drug_Name" for="x_Drug_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Drug_Name->caption() ?><?= $Page->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Drug_Name">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?> aria-describedby="x_Drug_Name_help">
<?= $Page->Drug_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <div id="r_Generic_Name" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Generic_Name" for="x_Generic_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name->caption() ?><?= $Page->Generic_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Generic_Name">
    <select
        id="x_Generic_Name"
        name="x_Generic_Name"
        class="form-control ew-select<?= $Page->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>"
        <?= $Page->Generic_Name->editAttributes() ?>>
        <?= $Page->Generic_Name->selectOptionListHtml("x_Generic_Name") ?>
    </select>
    <?= $Page->Generic_Name->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x_Generic_Name']"),
        options = { name: "x_Generic_Name", selectId: "pres_trade_combination_names_new_x_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <div id="r_Trade_Name" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Trade_Name" for="x_Trade_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Trade_Name->caption() ?><?= $Page->Trade_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Trade_Name">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?> aria-describedby="x_Trade_Name_help">
<?= $Page->Trade_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <div id="r_PR_CODE" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_PR_CODE" for="x_PR_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PR_CODE->caption() ?><?= $Page->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?> aria-describedby="x_PR_CODE_help">
<?= $Page->PR_CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Form">
    <select
        id="x_Form"
        name="x_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x_Form") ?>
    </select>
    <?= $Page->Form->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x_Form']"),
        options = { name: "x_Form", selectId: "pres_trade_combination_names_new_x_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <div id="r_Strength" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Strength" for="x_Strength" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength->caption() ?><?= $Page->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?> aria-describedby="x_Strength_help">
<?= $Page->Strength->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_Unit" for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Unit">
    <select
        id="x_Unit"
        name="x_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x_Unit") ?>
    </select>
    <?= $Page->Unit->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x_Unit']"),
        options = { name: "x_Unit", selectId: "pres_trade_combination_names_new_x_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <div id="r_CONTAINER_TYPE" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CONTAINER_TYPE->caption() ?><?= $Page->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?> aria-describedby="x_CONTAINER_TYPE_help">
<?= $Page->CONTAINER_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <div id="r_CONTAINER_STRENGTH" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" for="x_CONTAINER_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CONTAINER_STRENGTH->caption() ?><?= $Page->CONTAINER_STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?> aria-describedby="x_CONTAINER_STRENGTH_help">
<?= $Page->CONTAINER_STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <div id="r_TypeOfDrug" class="form-group row">
        <label id="elh_pres_trade_combination_names_new_TypeOfDrug" for="x_TypeOfDrug" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeOfDrug->caption() ?><?= $Page->TypeOfDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_TypeOfDrug">
    <select
        id="x_TypeOfDrug"
        name="x_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
    </select>
    <?= $Page->TypeOfDrug->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x_TypeOfDrug']"),
        options = { name: "x_TypeOfDrug", selectId: "pres_trade_combination_names_new_x_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
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
    ew.addEventHandlers("pres_trade_combination_names_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
