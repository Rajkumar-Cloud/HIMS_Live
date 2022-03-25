<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesNewAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fpres_tradenames_newaddopt = currentForm = new ew.Form("fpres_tradenames_newaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_tradenames_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_tradenames_new)
        ew.vars.tables.pres_tradenames_new = currentTable;
    fpres_tradenames_newaddopt.addFields([
        ["Drug_Name", [fields.Drug_Name.visible && fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["Generic_Name", [fields.Generic_Name.visible && fields.Generic_Name.required ? ew.Validators.required(fields.Generic_Name.caption) : null], fields.Generic_Name.isInvalid],
        ["Trade_Name", [fields.Trade_Name.visible && fields.Trade_Name.required ? ew.Validators.required(fields.Trade_Name.caption) : null], fields.Trade_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.visible && fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Strength", [fields.Strength.visible && fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null], fields.Strength.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.visible && fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["CONTAINER_STRENGTH", [fields.CONTAINER_STRENGTH.visible && fields.CONTAINER_STRENGTH.required ? ew.Validators.required(fields.CONTAINER_STRENGTH.caption) : null], fields.CONTAINER_STRENGTH.isInvalid],
        ["TypeOfDrug", [fields.TypeOfDrug.visible && fields.TypeOfDrug.required ? ew.Validators.required(fields.TypeOfDrug.caption) : null], fields.TypeOfDrug.isInvalid],
        ["ProductType", [fields.ProductType.visible && fields.ProductType.required ? ew.Validators.required(fields.ProductType.caption) : null], fields.ProductType.isInvalid],
        ["Generic_Name1", [fields.Generic_Name1.visible && fields.Generic_Name1.required ? ew.Validators.required(fields.Generic_Name1.caption) : null], fields.Generic_Name1.isInvalid],
        ["Strength1", [fields.Strength1.visible && fields.Strength1.required ? ew.Validators.required(fields.Strength1.caption) : null], fields.Strength1.isInvalid],
        ["Unit1", [fields.Unit1.visible && fields.Unit1.required ? ew.Validators.required(fields.Unit1.caption) : null], fields.Unit1.isInvalid],
        ["Generic_Name2", [fields.Generic_Name2.visible && fields.Generic_Name2.required ? ew.Validators.required(fields.Generic_Name2.caption) : null], fields.Generic_Name2.isInvalid],
        ["Strength2", [fields.Strength2.visible && fields.Strength2.required ? ew.Validators.required(fields.Strength2.caption) : null], fields.Strength2.isInvalid],
        ["Unit2", [fields.Unit2.visible && fields.Unit2.required ? ew.Validators.required(fields.Unit2.caption) : null], fields.Unit2.isInvalid],
        ["Generic_Name3", [fields.Generic_Name3.visible && fields.Generic_Name3.required ? ew.Validators.required(fields.Generic_Name3.caption) : null], fields.Generic_Name3.isInvalid],
        ["Strength3", [fields.Strength3.visible && fields.Strength3.required ? ew.Validators.required(fields.Strength3.caption) : null], fields.Strength3.isInvalid],
        ["Unit3", [fields.Unit3.visible && fields.Unit3.required ? ew.Validators.required(fields.Unit3.caption) : null], fields.Unit3.isInvalid],
        ["Generic_Name4", [fields.Generic_Name4.visible && fields.Generic_Name4.required ? ew.Validators.required(fields.Generic_Name4.caption) : null], fields.Generic_Name4.isInvalid],
        ["Generic_Name5", [fields.Generic_Name5.visible && fields.Generic_Name5.required ? ew.Validators.required(fields.Generic_Name5.caption) : null], fields.Generic_Name5.isInvalid],
        ["Strength4", [fields.Strength4.visible && fields.Strength4.required ? ew.Validators.required(fields.Strength4.caption) : null], fields.Strength4.isInvalid],
        ["Strength5", [fields.Strength5.visible && fields.Strength5.required ? ew.Validators.required(fields.Strength5.caption) : null], fields.Strength5.isInvalid],
        ["Unit4", [fields.Unit4.visible && fields.Unit4.required ? ew.Validators.required(fields.Unit4.caption) : null], fields.Unit4.isInvalid],
        ["Unit5", [fields.Unit5.visible && fields.Unit5.required ? ew.Validators.required(fields.Unit5.caption) : null], fields.Unit5.isInvalid],
        ["AlterNative1", [fields.AlterNative1.visible && fields.AlterNative1.required ? ew.Validators.required(fields.AlterNative1.caption) : null], fields.AlterNative1.isInvalid],
        ["AlterNative2", [fields.AlterNative2.visible && fields.AlterNative2.required ? ew.Validators.required(fields.AlterNative2.caption) : null], fields.AlterNative2.isInvalid],
        ["AlterNative3", [fields.AlterNative3.visible && fields.AlterNative3.required ? ew.Validators.required(fields.AlterNative3.caption) : null], fields.AlterNative3.isInvalid],
        ["AlterNative4", [fields.AlterNative4.visible && fields.AlterNative4.required ? ew.Validators.required(fields.AlterNative4.caption) : null], fields.AlterNative4.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_tradenames_newaddopt,
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
    fpres_tradenames_newaddopt.validate = function () {
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
    fpres_tradenames_newaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_tradenames_newaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_tradenames_newaddopt.lists.Generic_Name = <?= $Page->Generic_Name->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Form = <?= $Page->Form->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit = <?= $Page->Unit->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.TypeOfDrug = <?= $Page->TypeOfDrug->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.ProductType = <?= $Page->ProductType->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Generic_Name1 = <?= $Page->Generic_Name1->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit1 = <?= $Page->Unit1->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Generic_Name2 = <?= $Page->Generic_Name2->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit2 = <?= $Page->Unit2->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Generic_Name3 = <?= $Page->Generic_Name3->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit3 = <?= $Page->Unit3->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Generic_Name4 = <?= $Page->Generic_Name4->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Generic_Name5 = <?= $Page->Generic_Name5->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit4 = <?= $Page->Unit4->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.Unit5 = <?= $Page->Unit5->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.AlterNative1 = <?= $Page->AlterNative1->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.AlterNative2 = <?= $Page->AlterNative2->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.AlterNative3 = <?= $Page->AlterNative3->toClientList($Page) ?>;
    fpres_tradenames_newaddopt.lists.AlterNative4 = <?= $Page->AlterNative4->toClientList($Page) ?>;
    loadjs.done("fpres_tradenames_newaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fpres_tradenames_newaddopt" id="fpres_tradenames_newaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="pres_tradenames_new">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Drug_Name"><?= $Page->Drug_Name->caption() ?><?= $Page->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name"><?= $Page->Generic_Name->caption() ?><?= $Page->Generic_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?= EmptyValue(strval($Page->Generic_Name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name->ReadOnly || $Page->Generic_Name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x_Generic_Name") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?= $Page->Generic_Name->CurrentValue ?>"<?= $Page->Generic_Name->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Trade_Name"><?= $Page->Trade_Name->caption() ?><?= $Page->Trade_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PR_CODE"><?= $Page->PR_CODE->caption() ?><?= $Page->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Form"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Form"
        name="x_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Form"
        data-table="pres_tradenames_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Form']"),
        options = { name: "x_Form", selectId: "pres_tradenames_new_x_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength"><?= $Page->Strength->caption() ?><?= $Page->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength" name="x_Strength" id="x_Strength" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit"
        name="x_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit"
        data-table="pres_tradenames_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit']"),
        options = { name: "x_Unit", selectId: "pres_tradenames_new_x_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?><?= $Page->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?><?= $Page->CONTAINER_STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?><?= $Page->TypeOfDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_TypeOfDrug"
        name="x_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_TypeOfDrug"
        data-table="pres_tradenames_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_TypeOfDrug']"),
        options = { name: "x_TypeOfDrug", selectId: "pres_tradenames_new_x_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_tradenames_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ProductType"><?= $Page->ProductType->caption() ?><?= $Page->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_ProductType"
        name="x_ProductType"
        class="form-control ew-select<?= $Page->ProductType->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_ProductType"
        data-table="pres_tradenames_new"
        data-field="x_ProductType"
        data-value-separator="<?= $Page->ProductType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ProductType->getPlaceHolder()) ?>"
        <?= $Page->ProductType->editAttributes() ?>>
        <?= $Page->ProductType->selectOptionListHtml("x_ProductType") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ProductType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_ProductType']"),
        options = { name: "x_ProductType", selectId: "pres_tradenames_new_x_ProductType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_tradenames_new.fields.ProductType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.ProductType.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name1"><?= $Page->Generic_Name1->caption() ?><?= $Page->Generic_Name1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name1"><?= EmptyValue(strval($Page->Generic_Name1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name1->ReadOnly || $Page->Generic_Name1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name1->getErrorMessage() ?></div>
<?= $Page->Generic_Name1->Lookup->getParamTag($Page, "p_x_Generic_Name1") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name1->displayValueSeparatorAttribute() ?>" name="x_Generic_Name1" id="x_Generic_Name1" value="<?= $Page->Generic_Name1->CurrentValue ?>"<?= $Page->Generic_Name1->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength1"><?= $Page->Strength1->caption() ?><?= $Page->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength1->getPlaceHolder()) ?>" value="<?= $Page->Strength1->EditValue ?>"<?= $Page->Strength1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength1->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit1"><?= $Page->Unit1->caption() ?><?= $Page->Unit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit1"
        name="x_Unit1"
        class="form-control ew-select<?= $Page->Unit1->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit1"
        data-table="pres_tradenames_new"
        data-field="x_Unit1"
        data-value-separator="<?= $Page->Unit1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit1->getPlaceHolder()) ?>"
        <?= $Page->Unit1->editAttributes() ?>>
        <?= $Page->Unit1->selectOptionListHtml("x_Unit1") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit1->getErrorMessage() ?></div>
<?= $Page->Unit1->Lookup->getParamTag($Page, "p_x_Unit1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit1']"),
        options = { name: "x_Unit1", selectId: "pres_tradenames_new_x_Unit1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit1.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name2"><?= $Page->Generic_Name2->caption() ?><?= $Page->Generic_Name2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name2"><?= EmptyValue(strval($Page->Generic_Name2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name2->ReadOnly || $Page->Generic_Name2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name2->getErrorMessage() ?></div>
<?= $Page->Generic_Name2->Lookup->getParamTag($Page, "p_x_Generic_Name2") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name2" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name2->displayValueSeparatorAttribute() ?>" name="x_Generic_Name2" id="x_Generic_Name2" value="<?= $Page->Generic_Name2->CurrentValue ?>"<?= $Page->Generic_Name2->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength2"><?= $Page->Strength2->caption() ?><?= $Page->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength2->getPlaceHolder()) ?>" value="<?= $Page->Strength2->EditValue ?>"<?= $Page->Strength2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength2->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit2"><?= $Page->Unit2->caption() ?><?= $Page->Unit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit2"
        name="x_Unit2"
        class="form-control ew-select<?= $Page->Unit2->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit2"
        data-table="pres_tradenames_new"
        data-field="x_Unit2"
        data-value-separator="<?= $Page->Unit2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit2->getPlaceHolder()) ?>"
        <?= $Page->Unit2->editAttributes() ?>>
        <?= $Page->Unit2->selectOptionListHtml("x_Unit2") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit2->getErrorMessage() ?></div>
<?= $Page->Unit2->Lookup->getParamTag($Page, "p_x_Unit2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit2']"),
        options = { name: "x_Unit2", selectId: "pres_tradenames_new_x_Unit2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit2.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name3"><?= $Page->Generic_Name3->caption() ?><?= $Page->Generic_Name3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name3"><?= EmptyValue(strval($Page->Generic_Name3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name3->ReadOnly || $Page->Generic_Name3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name3->getErrorMessage() ?></div>
<?= $Page->Generic_Name3->Lookup->getParamTag($Page, "p_x_Generic_Name3") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name3->displayValueSeparatorAttribute() ?>" name="x_Generic_Name3" id="x_Generic_Name3" value="<?= $Page->Generic_Name3->CurrentValue ?>"<?= $Page->Generic_Name3->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength3"><?= $Page->Strength3->caption() ?><?= $Page->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength3->getPlaceHolder()) ?>" value="<?= $Page->Strength3->EditValue ?>"<?= $Page->Strength3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength3->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit3"><?= $Page->Unit3->caption() ?><?= $Page->Unit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit3"
        name="x_Unit3"
        class="form-control ew-select<?= $Page->Unit3->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit3"
        data-table="pres_tradenames_new"
        data-field="x_Unit3"
        data-value-separator="<?= $Page->Unit3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit3->getPlaceHolder()) ?>"
        <?= $Page->Unit3->editAttributes() ?>>
        <?= $Page->Unit3->selectOptionListHtml("x_Unit3") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit3->getErrorMessage() ?></div>
<?= $Page->Unit3->Lookup->getParamTag($Page, "p_x_Unit3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit3']"),
        options = { name: "x_Unit3", selectId: "pres_tradenames_new_x_Unit3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit3.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name4"><?= $Page->Generic_Name4->caption() ?><?= $Page->Generic_Name4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name4"><?= EmptyValue(strval($Page->Generic_Name4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name4->ReadOnly || $Page->Generic_Name4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name4->getErrorMessage() ?></div>
<?= $Page->Generic_Name4->Lookup->getParamTag($Page, "p_x_Generic_Name4") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name4->displayValueSeparatorAttribute() ?>" name="x_Generic_Name4" id="x_Generic_Name4" value="<?= $Page->Generic_Name4->CurrentValue ?>"<?= $Page->Generic_Name4->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name5"><?= $Page->Generic_Name5->caption() ?><?= $Page->Generic_Name5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name5"><?= EmptyValue(strval($Page->Generic_Name5->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name5->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name5->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name5->ReadOnly || $Page->Generic_Name5->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name5',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name5->getErrorMessage() ?></div>
<?= $Page->Generic_Name5->Lookup->getParamTag($Page, "p_x_Generic_Name5") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name5" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name5->displayValueSeparatorAttribute() ?>" name="x_Generic_Name5" id="x_Generic_Name5" value="<?= $Page->Generic_Name5->CurrentValue ?>"<?= $Page->Generic_Name5->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength4"><?= $Page->Strength4->caption() ?><?= $Page->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength4->getPlaceHolder()) ?>" value="<?= $Page->Strength4->EditValue ?>"<?= $Page->Strength4->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength4->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Strength5"><?= $Page->Strength5->caption() ?><?= $Page->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Strength5->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength5->getPlaceHolder()) ?>" value="<?= $Page->Strength5->EditValue ?>"<?= $Page->Strength5->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength5->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit4"><?= $Page->Unit4->caption() ?><?= $Page->Unit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit4"
        name="x_Unit4"
        class="form-control ew-select<?= $Page->Unit4->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit4"
        data-table="pres_tradenames_new"
        data-field="x_Unit4"
        data-value-separator="<?= $Page->Unit4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit4->getPlaceHolder()) ?>"
        <?= $Page->Unit4->editAttributes() ?>>
        <?= $Page->Unit4->selectOptionListHtml("x_Unit4") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit4->getErrorMessage() ?></div>
<?= $Page->Unit4->Lookup->getParamTag($Page, "p_x_Unit4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit4']"),
        options = { name: "x_Unit4", selectId: "pres_tradenames_new_x_Unit4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit4.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Unit5"><?= $Page->Unit5->caption() ?><?= $Page->Unit5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
    <select
        id="x_Unit5"
        name="x_Unit5"
        class="form-control ew-select<?= $Page->Unit5->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_Unit5"
        data-table="pres_tradenames_new"
        data-field="x_Unit5"
        data-value-separator="<?= $Page->Unit5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit5->getPlaceHolder()) ?>"
        <?= $Page->Unit5->editAttributes() ?>>
        <?= $Page->Unit5->selectOptionListHtml("x_Unit5") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit5->getErrorMessage() ?></div>
<?= $Page->Unit5->Lookup->getParamTag($Page, "p_x_Unit5") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_Unit5']"),
        options = { name: "x_Unit5", selectId: "pres_tradenames_new_x_Unit5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.Unit5.selectOptions);
    ew.createSelect(options);
});
</script>
</div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AlterNative1"><?= $Page->AlterNative1->caption() ?><?= $Page->AlterNative1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative1"><?= EmptyValue(strval($Page->AlterNative1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative1->ReadOnly || $Page->AlterNative1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative1->getErrorMessage() ?></div>
<?= $Page->AlterNative1->Lookup->getParamTag($Page, "p_x_AlterNative1") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative1->displayValueSeparatorAttribute() ?>" name="x_AlterNative1" id="x_AlterNative1" value="<?= $Page->AlterNative1->CurrentValue ?>"<?= $Page->AlterNative1->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AlterNative2"><?= $Page->AlterNative2->caption() ?><?= $Page->AlterNative2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative2"><?= EmptyValue(strval($Page->AlterNative2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative2->ReadOnly || $Page->AlterNative2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative2->getErrorMessage() ?></div>
<?= $Page->AlterNative2->Lookup->getParamTag($Page, "p_x_AlterNative2") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative2" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative2->displayValueSeparatorAttribute() ?>" name="x_AlterNative2" id="x_AlterNative2" value="<?= $Page->AlterNative2->CurrentValue ?>"<?= $Page->AlterNative2->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AlterNative3"><?= $Page->AlterNative3->caption() ?><?= $Page->AlterNative3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative3"><?= EmptyValue(strval($Page->AlterNative3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative3->ReadOnly || $Page->AlterNative3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative3->getErrorMessage() ?></div>
<?= $Page->AlterNative3->Lookup->getParamTag($Page, "p_x_AlterNative3") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative3->displayValueSeparatorAttribute() ?>" name="x_AlterNative3" id="x_AlterNative3" value="<?= $Page->AlterNative3->CurrentValue ?>"<?= $Page->AlterNative3->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_AlterNative4"><?= $Page->AlterNative4->caption() ?><?= $Page->AlterNative4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative4"><?= EmptyValue(strval($Page->AlterNative4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative4->ReadOnly || $Page->AlterNative4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative4->getErrorMessage() ?></div>
<?= $Page->AlterNative4->Lookup->getParamTag($Page, "p_x_AlterNative4") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative4->displayValueSeparatorAttribute() ?>" name="x_AlterNative4" id="x_AlterNative4" value="<?= $Page->AlterNative4->CurrentValue ?>"<?= $Page->AlterNative4->editAttributes() ?>>
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
    ew.addEventHandlers("pres_tradenames_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
