<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesNewAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpres_tradenames_newadd = currentForm = new ew.Form("fpres_tradenames_newadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_tradenames_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_tradenames_new)
        ew.vars.tables.pres_tradenames_new = currentTable;
    fpres_tradenames_newadd.addFields([
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
        var f = fpres_tradenames_newadd,
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
    fpres_tradenames_newadd.validate = function () {
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
    fpres_tradenames_newadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_tradenames_newadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_tradenames_newadd.lists.Generic_Name = <?= $Page->Generic_Name->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Form = <?= $Page->Form->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit = <?= $Page->Unit->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.TypeOfDrug = <?= $Page->TypeOfDrug->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.ProductType = <?= $Page->ProductType->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Generic_Name1 = <?= $Page->Generic_Name1->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit1 = <?= $Page->Unit1->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Generic_Name2 = <?= $Page->Generic_Name2->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit2 = <?= $Page->Unit2->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Generic_Name3 = <?= $Page->Generic_Name3->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit3 = <?= $Page->Unit3->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Generic_Name4 = <?= $Page->Generic_Name4->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Generic_Name5 = <?= $Page->Generic_Name5->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit4 = <?= $Page->Unit4->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.Unit5 = <?= $Page->Unit5->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.AlterNative1 = <?= $Page->AlterNative1->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.AlterNative2 = <?= $Page->AlterNative2->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.AlterNative3 = <?= $Page->AlterNative3->toClientList($Page) ?>;
    fpres_tradenames_newadd.lists.AlterNative4 = <?= $Page->AlterNative4->toClientList($Page) ?>;
    loadjs.done("fpres_tradenames_newadd");
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
<form name="fpres_tradenames_newadd" id="fpres_tradenames_newadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <div id="r_Drug_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Drug_Name" for="x_Drug_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Drug_Name"><?= $Page->Drug_Name->caption() ?><?= $Page->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drug_Name->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Drug_Name"><span id="el_pres_tradenames_new_Drug_Name">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?> aria-describedby="x_Drug_Name_help">
<?= $Page->Drug_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <div id="r_Generic_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name" for="x_Generic_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name"><?= $Page->Generic_Name->caption() ?><?= $Page->Generic_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name"><span id="el_pres_tradenames_new_Generic_Name">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?= EmptyValue(strval($Page->Generic_Name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name->ReadOnly || $Page->Generic_Name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->getCustomMessage() ?>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x_Generic_Name") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?= $Page->Generic_Name->CurrentValue ?>"<?= $Page->Generic_Name->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <div id="r_Trade_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Trade_Name" for="x_Trade_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Trade_Name"><?= $Page->Trade_Name->caption() ?><?= $Page->Trade_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Trade_Name->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Trade_Name"><span id="el_pres_tradenames_new_Trade_Name">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?> aria-describedby="x_Trade_Name_help">
<?= $Page->Trade_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <div id="r_PR_CODE" class="form-group row">
        <label id="elh_pres_tradenames_new_PR_CODE" for="x_PR_CODE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_PR_CODE"><?= $Page->PR_CODE->caption() ?><?= $Page->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR_CODE->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_PR_CODE"><span id="el_pres_tradenames_new_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?> aria-describedby="x_PR_CODE_help">
<?= $Page->PR_CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_pres_tradenames_new_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Form"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Form"><span id="el_pres_tradenames_new_Form">
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
    <?= $Page->Form->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <div id="r_Strength" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength" for="x_Strength" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength"><?= $Page->Strength->caption() ?><?= $Page->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength"><span id="el_pres_tradenames_new_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength" name="x_Strength" id="x_Strength" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?> aria-describedby="x_Strength_help">
<?= $Page->Strength->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit" for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit"><span id="el_pres_tradenames_new_Unit">
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
    <?= $Page->Unit->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <div id="r_CONTAINER_TYPE" class="form-group row">
        <label id="elh_pres_tradenames_new_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_CONTAINER_TYPE"><?= $Page->CONTAINER_TYPE->caption() ?><?= $Page->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_CONTAINER_TYPE"><span id="el_pres_tradenames_new_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?> aria-describedby="x_CONTAINER_TYPE_help">
<?= $Page->CONTAINER_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <div id="r_CONTAINER_STRENGTH" class="form-group row">
        <label id="elh_pres_tradenames_new_CONTAINER_STRENGTH" for="x_CONTAINER_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_CONTAINER_STRENGTH"><?= $Page->CONTAINER_STRENGTH->caption() ?><?= $Page->CONTAINER_STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_CONTAINER_STRENGTH"><span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?> aria-describedby="x_CONTAINER_STRENGTH_help">
<?= $Page->CONTAINER_STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <div id="r_TypeOfDrug" class="form-group row">
        <label id="elh_pres_tradenames_new_TypeOfDrug" for="x_TypeOfDrug" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_TypeOfDrug"><?= $Page->TypeOfDrug->caption() ?><?= $Page->TypeOfDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfDrug->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_TypeOfDrug"><span id="el_pres_tradenames_new_TypeOfDrug">
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
    <?= $Page->TypeOfDrug->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <div id="r_ProductType" class="form-group row">
        <label id="elh_pres_tradenames_new_ProductType" for="x_ProductType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_ProductType"><?= $Page->ProductType->caption() ?><?= $Page->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductType->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_ProductType"><span id="el_pres_tradenames_new_ProductType">
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
    <?= $Page->ProductType->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
    <div id="r_Generic_Name1" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name1" for="x_Generic_Name1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name1"><?= $Page->Generic_Name1->caption() ?><?= $Page->Generic_Name1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name1->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name1"><span id="el_pres_tradenames_new_Generic_Name1">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name1_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name1"><?= EmptyValue(strval($Page->Generic_Name1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name1->ReadOnly || $Page->Generic_Name1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name1->getErrorMessage() ?></div>
<?= $Page->Generic_Name1->getCustomMessage() ?>
<?= $Page->Generic_Name1->Lookup->getParamTag($Page, "p_x_Generic_Name1") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name1->displayValueSeparatorAttribute() ?>" name="x_Generic_Name1" id="x_Generic_Name1" value="<?= $Page->Generic_Name1->CurrentValue ?>"<?= $Page->Generic_Name1->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <div id="r_Strength1" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength1" for="x_Strength1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength1"><?= $Page->Strength1->caption() ?><?= $Page->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength1->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength1"><span id="el_pres_tradenames_new_Strength1">
<input type="<?= $Page->Strength1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength1->getPlaceHolder()) ?>" value="<?= $Page->Strength1->EditValue ?>"<?= $Page->Strength1->editAttributes() ?> aria-describedby="x_Strength1_help">
<?= $Page->Strength1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
    <div id="r_Unit1" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit1" for="x_Unit1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit1"><?= $Page->Unit1->caption() ?><?= $Page->Unit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit1->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit1"><span id="el_pres_tradenames_new_Unit1">
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
    <?= $Page->Unit1->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
    <div id="r_Generic_Name2" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name2" for="x_Generic_Name2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name2"><?= $Page->Generic_Name2->caption() ?><?= $Page->Generic_Name2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name2->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name2"><span id="el_pres_tradenames_new_Generic_Name2">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name2_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name2"><?= EmptyValue(strval($Page->Generic_Name2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name2->ReadOnly || $Page->Generic_Name2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name2->getErrorMessage() ?></div>
<?= $Page->Generic_Name2->getCustomMessage() ?>
<?= $Page->Generic_Name2->Lookup->getParamTag($Page, "p_x_Generic_Name2") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name2" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name2->displayValueSeparatorAttribute() ?>" name="x_Generic_Name2" id="x_Generic_Name2" value="<?= $Page->Generic_Name2->CurrentValue ?>"<?= $Page->Generic_Name2->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <div id="r_Strength2" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength2" for="x_Strength2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength2"><?= $Page->Strength2->caption() ?><?= $Page->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength2->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength2"><span id="el_pres_tradenames_new_Strength2">
<input type="<?= $Page->Strength2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength2->getPlaceHolder()) ?>" value="<?= $Page->Strength2->EditValue ?>"<?= $Page->Strength2->editAttributes() ?> aria-describedby="x_Strength2_help">
<?= $Page->Strength2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
    <div id="r_Unit2" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit2" for="x_Unit2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit2"><?= $Page->Unit2->caption() ?><?= $Page->Unit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit2->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit2"><span id="el_pres_tradenames_new_Unit2">
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
    <?= $Page->Unit2->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
    <div id="r_Generic_Name3" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name3" for="x_Generic_Name3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name3"><?= $Page->Generic_Name3->caption() ?><?= $Page->Generic_Name3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name3->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name3"><span id="el_pres_tradenames_new_Generic_Name3">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name3_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name3"><?= EmptyValue(strval($Page->Generic_Name3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name3->ReadOnly || $Page->Generic_Name3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name3->getErrorMessage() ?></div>
<?= $Page->Generic_Name3->getCustomMessage() ?>
<?= $Page->Generic_Name3->Lookup->getParamTag($Page, "p_x_Generic_Name3") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name3->displayValueSeparatorAttribute() ?>" name="x_Generic_Name3" id="x_Generic_Name3" value="<?= $Page->Generic_Name3->CurrentValue ?>"<?= $Page->Generic_Name3->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <div id="r_Strength3" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength3" for="x_Strength3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength3"><?= $Page->Strength3->caption() ?><?= $Page->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength3->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength3"><span id="el_pres_tradenames_new_Strength3">
<input type="<?= $Page->Strength3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength3->getPlaceHolder()) ?>" value="<?= $Page->Strength3->EditValue ?>"<?= $Page->Strength3->editAttributes() ?> aria-describedby="x_Strength3_help">
<?= $Page->Strength3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
    <div id="r_Unit3" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit3" for="x_Unit3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit3"><?= $Page->Unit3->caption() ?><?= $Page->Unit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit3->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit3"><span id="el_pres_tradenames_new_Unit3">
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
    <?= $Page->Unit3->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
    <div id="r_Generic_Name4" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name4" for="x_Generic_Name4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name4"><?= $Page->Generic_Name4->caption() ?><?= $Page->Generic_Name4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name4->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name4"><span id="el_pres_tradenames_new_Generic_Name4">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name4_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name4"><?= EmptyValue(strval($Page->Generic_Name4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name4->ReadOnly || $Page->Generic_Name4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name4->getErrorMessage() ?></div>
<?= $Page->Generic_Name4->getCustomMessage() ?>
<?= $Page->Generic_Name4->Lookup->getParamTag($Page, "p_x_Generic_Name4") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name4->displayValueSeparatorAttribute() ?>" name="x_Generic_Name4" id="x_Generic_Name4" value="<?= $Page->Generic_Name4->CurrentValue ?>"<?= $Page->Generic_Name4->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
    <div id="r_Generic_Name5" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name5" for="x_Generic_Name5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Generic_Name5"><?= $Page->Generic_Name5->caption() ?><?= $Page->Generic_Name5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name5->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Generic_Name5"><span id="el_pres_tradenames_new_Generic_Name5">
<div class="input-group ew-lookup-list" aria-describedby="x_Generic_Name5_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name5"><?= EmptyValue(strval($Page->Generic_Name5->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name5->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name5->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name5->ReadOnly || $Page->Generic_Name5->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name5',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name5->getErrorMessage() ?></div>
<?= $Page->Generic_Name5->getCustomMessage() ?>
<?= $Page->Generic_Name5->Lookup->getParamTag($Page, "p_x_Generic_Name5") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name5" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name5->displayValueSeparatorAttribute() ?>" name="x_Generic_Name5" id="x_Generic_Name5" value="<?= $Page->Generic_Name5->CurrentValue ?>"<?= $Page->Generic_Name5->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <div id="r_Strength4" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength4" for="x_Strength4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength4"><?= $Page->Strength4->caption() ?><?= $Page->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength4->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength4"><span id="el_pres_tradenames_new_Strength4">
<input type="<?= $Page->Strength4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength4->getPlaceHolder()) ?>" value="<?= $Page->Strength4->EditValue ?>"<?= $Page->Strength4->editAttributes() ?> aria-describedby="x_Strength4_help">
<?= $Page->Strength4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <div id="r_Strength5" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength5" for="x_Strength5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Strength5"><?= $Page->Strength5->caption() ?><?= $Page->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength5->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Strength5"><span id="el_pres_tradenames_new_Strength5">
<input type="<?= $Page->Strength5->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength5->getPlaceHolder()) ?>" value="<?= $Page->Strength5->EditValue ?>"<?= $Page->Strength5->editAttributes() ?> aria-describedby="x_Strength5_help">
<?= $Page->Strength5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
    <div id="r_Unit4" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit4" for="x_Unit4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit4"><?= $Page->Unit4->caption() ?><?= $Page->Unit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit4->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit4"><span id="el_pres_tradenames_new_Unit4">
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
    <?= $Page->Unit4->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
    <div id="r_Unit5" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit5" for="x_Unit5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_Unit5"><?= $Page->Unit5->caption() ?><?= $Page->Unit5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit5->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_Unit5"><span id="el_pres_tradenames_new_Unit5">
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
    <?= $Page->Unit5->getCustomMessage() ?>
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
    <div id="r_AlterNative1" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative1" for="x_AlterNative1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_AlterNative1"><?= $Page->AlterNative1->caption() ?><?= $Page->AlterNative1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative1->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_AlterNative1"><span id="el_pres_tradenames_new_AlterNative1">
<div class="input-group ew-lookup-list" aria-describedby="x_AlterNative1_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative1"><?= EmptyValue(strval($Page->AlterNative1->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative1->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative1->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative1->ReadOnly || $Page->AlterNative1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative1->getErrorMessage() ?></div>
<?= $Page->AlterNative1->getCustomMessage() ?>
<?= $Page->AlterNative1->Lookup->getParamTag($Page, "p_x_AlterNative1") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative1" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative1->displayValueSeparatorAttribute() ?>" name="x_AlterNative1" id="x_AlterNative1" value="<?= $Page->AlterNative1->CurrentValue ?>"<?= $Page->AlterNative1->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
    <div id="r_AlterNative2" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative2" for="x_AlterNative2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_AlterNative2"><?= $Page->AlterNative2->caption() ?><?= $Page->AlterNative2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative2->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_AlterNative2"><span id="el_pres_tradenames_new_AlterNative2">
<div class="input-group ew-lookup-list" aria-describedby="x_AlterNative2_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative2"><?= EmptyValue(strval($Page->AlterNative2->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative2->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative2->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative2->ReadOnly || $Page->AlterNative2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative2->getErrorMessage() ?></div>
<?= $Page->AlterNative2->getCustomMessage() ?>
<?= $Page->AlterNative2->Lookup->getParamTag($Page, "p_x_AlterNative2") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative2" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative2->displayValueSeparatorAttribute() ?>" name="x_AlterNative2" id="x_AlterNative2" value="<?= $Page->AlterNative2->CurrentValue ?>"<?= $Page->AlterNative2->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
    <div id="r_AlterNative3" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative3" for="x_AlterNative3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_AlterNative3"><?= $Page->AlterNative3->caption() ?><?= $Page->AlterNative3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative3->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_AlterNative3"><span id="el_pres_tradenames_new_AlterNative3">
<div class="input-group ew-lookup-list" aria-describedby="x_AlterNative3_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative3"><?= EmptyValue(strval($Page->AlterNative3->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative3->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative3->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative3->ReadOnly || $Page->AlterNative3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative3->getErrorMessage() ?></div>
<?= $Page->AlterNative3->getCustomMessage() ?>
<?= $Page->AlterNative3->Lookup->getParamTag($Page, "p_x_AlterNative3") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative3" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative3->displayValueSeparatorAttribute() ?>" name="x_AlterNative3" id="x_AlterNative3" value="<?= $Page->AlterNative3->CurrentValue ?>"<?= $Page->AlterNative3->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
    <div id="r_AlterNative4" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative4" for="x_AlterNative4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pres_tradenames_new_AlterNative4"><?= $Page->AlterNative4->caption() ?><?= $Page->AlterNative4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative4->cellAttributes() ?>>
<template id="tpx_pres_tradenames_new_AlterNative4"><span id="el_pres_tradenames_new_AlterNative4">
<div class="input-group ew-lookup-list" aria-describedby="x_AlterNative4_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative4"><?= EmptyValue(strval($Page->AlterNative4->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->AlterNative4->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->AlterNative4->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->AlterNative4->ReadOnly || $Page->AlterNative4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->AlterNative4->getErrorMessage() ?></div>
<?= $Page->AlterNative4->getCustomMessage() ?>
<?= $Page->AlterNative4->Lookup->getParamTag($Page, "p_x_AlterNative4") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_AlterNative4" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->AlterNative4->displayValueSeparatorAttribute() ?>" name="x_AlterNative4" id="x_AlterNative4" value="<?= $Page->AlterNative4->CurrentValue ?>"<?= $Page->AlterNative4->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pres_tradenames_newadd" class="ew-custom-template"></div>
<template id="tpm_pres_tradenames_newadd">
<div id="ct_PresTradenamesNewAdd"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<h3 class="card-title">Products Entry Form</h3>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Products</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_ProductType"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_ProductType"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_PR_CODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_PR_CODE"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Trade_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Trade_Name"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_CONTAINER_TYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_CONTAINER_TYPE"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="DrugDetails" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Drug Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Drug_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Drug_Name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Form"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Form"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_TypeOfDrug"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_TypeOfDrug"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_CONTAINER_STRENGTH"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_CONTAINER_STRENGTH"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination1" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 1</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination2" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 2</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name1"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit1"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination3" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 3</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name2"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit2"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination4" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 4</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name3"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit3"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination5" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 5</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name4"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name4"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength4"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength4"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit4"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit4"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination6" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 6</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Generic_Name5"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Generic_Name5"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Strength5"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Strength5"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pres_tradenames_new_Unit5"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_Unit5"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Alter Native Items</h3>
			</div>
			<div class="card-body">
			<table class="ew-table">
				<tbody>
					<tr><td><slot class="ew-slot" name="tpc_pres_tradenames_new_AlterNative1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_AlterNative1"></slot></td><td><slot class="ew-slot" name="tpc_pres_tradenames_new_AlterNative2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_AlterNative2"></slot></td></tr>
					<tr><td><slot class="ew-slot" name="tpc_pres_tradenames_new_AlterNative3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_AlterNative3"></slot></td><td><slot class="ew-slot" name="tpc_pres_tradenames_new_AlterNative4"></slot>&nbsp;<slot class="ew-slot" name="tpx_pres_tradenames_new_AlterNative4"></slot></td></tr>
				</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("pres_trade_combination_names_new", explode(",", $Page->getCurrentDetailTable())) && $pres_trade_combination_names_new->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pres_trade_combination_names_new", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PresTradeCombinationNamesNewGrid.php" ?>
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
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_pres_tradenames_newadd", "tpm_pres_tradenames_newadd", "pres_tradenames_newadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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
    // Startup script
    document.getElementById("Combination1").style.display="none",document.getElementById("Combination2").style.display="none",document.getElementById("Combination3").style.display="none",document.getElementById("Combination4").style.display="none",document.getElementById("Combination5").style.display="none",document.getElementById("Combination6").style.display="none";
});
</script>
