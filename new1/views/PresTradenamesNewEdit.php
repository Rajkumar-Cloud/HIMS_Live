<?php

namespace PHPMaker2021\project3;

// Page object
$PresTradenamesNewEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_tradenames_newedit = currentForm = new ew.Form("fpres_tradenames_newedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pres_tradenames_new.fields;
    fpres_tradenames_newedit.addFields([
        ["ID", [fields.ID.required ? ew.Validators.required(fields.ID.caption) : null], fields.ID.isInvalid],
        ["Drug_Name", [fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["Generic_Name", [fields.Generic_Name.required ? ew.Validators.required(fields.Generic_Name.caption) : null], fields.Generic_Name.isInvalid],
        ["Trade_Name", [fields.Trade_Name.required ? ew.Validators.required(fields.Trade_Name.caption) : null], fields.Trade_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["Form", [fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Strength", [fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null], fields.Strength.isInvalid],
        ["Unit", [fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["CONTAINER_STRENGTH", [fields.CONTAINER_STRENGTH.required ? ew.Validators.required(fields.CONTAINER_STRENGTH.caption) : null], fields.CONTAINER_STRENGTH.isInvalid],
        ["TypeOfDrug", [fields.TypeOfDrug.required ? ew.Validators.required(fields.TypeOfDrug.caption) : null], fields.TypeOfDrug.isInvalid],
        ["ProductType", [fields.ProductType.required ? ew.Validators.required(fields.ProductType.caption) : null], fields.ProductType.isInvalid],
        ["Generic_Name1", [fields.Generic_Name1.required ? ew.Validators.required(fields.Generic_Name1.caption) : null], fields.Generic_Name1.isInvalid],
        ["Strength1", [fields.Strength1.required ? ew.Validators.required(fields.Strength1.caption) : null], fields.Strength1.isInvalid],
        ["Unit1", [fields.Unit1.required ? ew.Validators.required(fields.Unit1.caption) : null], fields.Unit1.isInvalid],
        ["Generic_Name2", [fields.Generic_Name2.required ? ew.Validators.required(fields.Generic_Name2.caption) : null], fields.Generic_Name2.isInvalid],
        ["Strength2", [fields.Strength2.required ? ew.Validators.required(fields.Strength2.caption) : null], fields.Strength2.isInvalid],
        ["Unit2", [fields.Unit2.required ? ew.Validators.required(fields.Unit2.caption) : null], fields.Unit2.isInvalid],
        ["Generic_Name3", [fields.Generic_Name3.required ? ew.Validators.required(fields.Generic_Name3.caption) : null], fields.Generic_Name3.isInvalid],
        ["Strength3", [fields.Strength3.required ? ew.Validators.required(fields.Strength3.caption) : null], fields.Strength3.isInvalid],
        ["Unit3", [fields.Unit3.required ? ew.Validators.required(fields.Unit3.caption) : null], fields.Unit3.isInvalid],
        ["Generic_Name4", [fields.Generic_Name4.required ? ew.Validators.required(fields.Generic_Name4.caption) : null], fields.Generic_Name4.isInvalid],
        ["Generic_Name5", [fields.Generic_Name5.required ? ew.Validators.required(fields.Generic_Name5.caption) : null], fields.Generic_Name5.isInvalid],
        ["Strength4", [fields.Strength4.required ? ew.Validators.required(fields.Strength4.caption) : null], fields.Strength4.isInvalid],
        ["Strength5", [fields.Strength5.required ? ew.Validators.required(fields.Strength5.caption) : null], fields.Strength5.isInvalid],
        ["Unit4", [fields.Unit4.required ? ew.Validators.required(fields.Unit4.caption) : null], fields.Unit4.isInvalid],
        ["Unit5", [fields.Unit5.required ? ew.Validators.required(fields.Unit5.caption) : null], fields.Unit5.isInvalid],
        ["AlterNative1", [fields.AlterNative1.required ? ew.Validators.required(fields.AlterNative1.caption) : null], fields.AlterNative1.isInvalid],
        ["AlterNative2", [fields.AlterNative2.required ? ew.Validators.required(fields.AlterNative2.caption) : null], fields.AlterNative2.isInvalid],
        ["AlterNative3", [fields.AlterNative3.required ? ew.Validators.required(fields.AlterNative3.caption) : null], fields.AlterNative3.isInvalid],
        ["AlterNative4", [fields.AlterNative4.required ? ew.Validators.required(fields.AlterNative4.caption) : null], fields.AlterNative4.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_tradenames_newedit,
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
    fpres_tradenames_newedit.validate = function () {
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
    fpres_tradenames_newedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_tradenames_newedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_tradenames_newedit");
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
<form name="fpres_tradenames_newedit" id="fpres_tradenames_newedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->ID->Visible) { // ID ?>
    <div id="r_ID" class="form-group row">
        <label id="elh_pres_tradenames_new_ID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ID->caption() ?><?= $Page->ID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ID->getDisplayValue($Page->ID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_ID" data-hidden="1" name="x_ID" id="x_ID" value="<?= HtmlEncode($Page->ID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <div id="r_Drug_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Drug_Name" for="x_Drug_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Drug_Name->caption() ?><?= $Page->Drug_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Drug_Name">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?> aria-describedby="x_Drug_Name_help">
<?= $Page->Drug_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <div id="r_Generic_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name" for="x_Generic_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name->caption() ?><?= $Page->Generic_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name">
<input type="<?= $Page->Generic_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name" name="x_Generic_Name" id="x_Generic_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name->EditValue ?>"<?= $Page->Generic_Name->editAttributes() ?> aria-describedby="x_Generic_Name_help">
<?= $Page->Generic_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <div id="r_Trade_Name" class="form-group row">
        <label id="elh_pres_tradenames_new_Trade_Name" for="x_Trade_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Trade_Name->caption() ?><?= $Page->Trade_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Trade_Name">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?> aria-describedby="x_Trade_Name_help">
<?= $Page->Trade_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <div id="r_PR_CODE" class="form-group row">
        <label id="elh_pres_tradenames_new_PR_CODE" for="x_PR_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PR_CODE->caption() ?><?= $Page->PR_CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?> aria-describedby="x_PR_CODE_help">
<?= $Page->PR_CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <div id="r_Form" class="form-group row">
        <label id="elh_pres_tradenames_new_Form" for="x_Form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Form->caption() ?><?= $Page->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Form->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Form">
<input type="<?= $Page->Form->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>" value="<?= $Page->Form->EditValue ?>"<?= $Page->Form->editAttributes() ?> aria-describedby="x_Form_help">
<?= $Page->Form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <div id="r_Strength" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength" for="x_Strength" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength->caption() ?><?= $Page->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?> aria-describedby="x_Strength_help">
<?= $Page->Strength->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <div id="r_Unit" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit" for="x_Unit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit->caption() ?><?= $Page->Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit">
<input type="<?= $Page->Unit->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>" value="<?= $Page->Unit->EditValue ?>"<?= $Page->Unit->editAttributes() ?> aria-describedby="x_Unit_help">
<?= $Page->Unit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <div id="r_CONTAINER_TYPE" class="form-group row">
        <label id="elh_pres_tradenames_new_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CONTAINER_TYPE->caption() ?><?= $Page->CONTAINER_TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?> aria-describedby="x_CONTAINER_TYPE_help">
<?= $Page->CONTAINER_TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <div id="r_CONTAINER_STRENGTH" class="form-group row">
        <label id="elh_pres_tradenames_new_CONTAINER_STRENGTH" for="x_CONTAINER_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CONTAINER_STRENGTH->caption() ?><?= $Page->CONTAINER_STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?> aria-describedby="x_CONTAINER_STRENGTH_help">
<?= $Page->CONTAINER_STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <div id="r_TypeOfDrug" class="form-group row">
        <label id="elh_pres_tradenames_new_TypeOfDrug" for="x_TypeOfDrug" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeOfDrug->caption() ?><?= $Page->TypeOfDrug->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_tradenames_new_TypeOfDrug">
<input type="<?= $Page->TypeOfDrug->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_TypeOfDrug" name="x_TypeOfDrug" id="x_TypeOfDrug" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>" value="<?= $Page->TypeOfDrug->EditValue ?>"<?= $Page->TypeOfDrug->editAttributes() ?> aria-describedby="x_TypeOfDrug_help">
<?= $Page->TypeOfDrug->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
    <div id="r_ProductType" class="form-group row">
        <label id="elh_pres_tradenames_new_ProductType" for="x_ProductType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProductType->caption() ?><?= $Page->ProductType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductType->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ProductType">
<input type="<?= $Page->ProductType->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_ProductType" name="x_ProductType" id="x_ProductType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProductType->getPlaceHolder()) ?>" value="<?= $Page->ProductType->EditValue ?>"<?= $Page->ProductType->editAttributes() ?> aria-describedby="x_ProductType_help">
<?= $Page->ProductType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProductType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
    <div id="r_Generic_Name1" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name1" for="x_Generic_Name1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name1->caption() ?><?= $Page->Generic_Name1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name1">
<input type="<?= $Page->Generic_Name1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name1" name="x_Generic_Name1" id="x_Generic_Name1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Generic_Name1->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name1->EditValue ?>"<?= $Page->Generic_Name1->editAttributes() ?> aria-describedby="x_Generic_Name1_help">
<?= $Page->Generic_Name1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
    <div id="r_Strength1" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength1" for="x_Strength1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength1->caption() ?><?= $Page->Strength1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength1">
<input type="<?= $Page->Strength1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength1->getPlaceHolder()) ?>" value="<?= $Page->Strength1->EditValue ?>"<?= $Page->Strength1->editAttributes() ?> aria-describedby="x_Strength1_help">
<?= $Page->Strength1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
    <div id="r_Unit1" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit1" for="x_Unit1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit1->caption() ?><?= $Page->Unit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit1">
<input type="<?= $Page->Unit1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit1" name="x_Unit1" id="x_Unit1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Unit1->getPlaceHolder()) ?>" value="<?= $Page->Unit1->EditValue ?>"<?= $Page->Unit1->editAttributes() ?> aria-describedby="x_Unit1_help">
<?= $Page->Unit1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
    <div id="r_Generic_Name2" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name2" for="x_Generic_Name2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name2->caption() ?><?= $Page->Generic_Name2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name2">
<input type="<?= $Page->Generic_Name2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name2" name="x_Generic_Name2" id="x_Generic_Name2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Generic_Name2->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name2->EditValue ?>"<?= $Page->Generic_Name2->editAttributes() ?> aria-describedby="x_Generic_Name2_help">
<?= $Page->Generic_Name2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
    <div id="r_Strength2" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength2" for="x_Strength2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength2->caption() ?><?= $Page->Strength2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength2">
<input type="<?= $Page->Strength2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength2->getPlaceHolder()) ?>" value="<?= $Page->Strength2->EditValue ?>"<?= $Page->Strength2->editAttributes() ?> aria-describedby="x_Strength2_help">
<?= $Page->Strength2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
    <div id="r_Unit2" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit2" for="x_Unit2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit2->caption() ?><?= $Page->Unit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit2">
<input type="<?= $Page->Unit2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit2" name="x_Unit2" id="x_Unit2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Unit2->getPlaceHolder()) ?>" value="<?= $Page->Unit2->EditValue ?>"<?= $Page->Unit2->editAttributes() ?> aria-describedby="x_Unit2_help">
<?= $Page->Unit2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
    <div id="r_Generic_Name3" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name3" for="x_Generic_Name3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name3->caption() ?><?= $Page->Generic_Name3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name3">
<input type="<?= $Page->Generic_Name3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name3" name="x_Generic_Name3" id="x_Generic_Name3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Generic_Name3->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name3->EditValue ?>"<?= $Page->Generic_Name3->editAttributes() ?> aria-describedby="x_Generic_Name3_help">
<?= $Page->Generic_Name3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
    <div id="r_Strength3" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength3" for="x_Strength3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength3->caption() ?><?= $Page->Strength3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength3">
<input type="<?= $Page->Strength3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength3->getPlaceHolder()) ?>" value="<?= $Page->Strength3->EditValue ?>"<?= $Page->Strength3->editAttributes() ?> aria-describedby="x_Strength3_help">
<?= $Page->Strength3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
    <div id="r_Unit3" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit3" for="x_Unit3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit3->caption() ?><?= $Page->Unit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit3">
<input type="<?= $Page->Unit3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit3" name="x_Unit3" id="x_Unit3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Unit3->getPlaceHolder()) ?>" value="<?= $Page->Unit3->EditValue ?>"<?= $Page->Unit3->editAttributes() ?> aria-describedby="x_Unit3_help">
<?= $Page->Unit3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
    <div id="r_Generic_Name4" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name4" for="x_Generic_Name4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name4->caption() ?><?= $Page->Generic_Name4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name4">
<input type="<?= $Page->Generic_Name4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name4" name="x_Generic_Name4" id="x_Generic_Name4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Generic_Name4->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name4->EditValue ?>"<?= $Page->Generic_Name4->editAttributes() ?> aria-describedby="x_Generic_Name4_help">
<?= $Page->Generic_Name4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
    <div id="r_Generic_Name5" class="form-group row">
        <label id="elh_pres_tradenames_new_Generic_Name5" for="x_Generic_Name5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generic_Name5->caption() ?><?= $Page->Generic_Name5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generic_Name5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name5">
<input type="<?= $Page->Generic_Name5->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Generic_Name5" name="x_Generic_Name5" id="x_Generic_Name5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Generic_Name5->getPlaceHolder()) ?>" value="<?= $Page->Generic_Name5->EditValue ?>"<?= $Page->Generic_Name5->editAttributes() ?> aria-describedby="x_Generic_Name5_help">
<?= $Page->Generic_Name5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generic_Name5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
    <div id="r_Strength4" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength4" for="x_Strength4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength4->caption() ?><?= $Page->Strength4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength4">
<input type="<?= $Page->Strength4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength4->getPlaceHolder()) ?>" value="<?= $Page->Strength4->EditValue ?>"<?= $Page->Strength4->editAttributes() ?> aria-describedby="x_Strength4_help">
<?= $Page->Strength4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
    <div id="r_Strength5" class="form-group row">
        <label id="elh_pres_tradenames_new_Strength5" for="x_Strength5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength5->caption() ?><?= $Page->Strength5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength5">
<input type="<?= $Page->Strength5->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Strength5->getPlaceHolder()) ?>" value="<?= $Page->Strength5->EditValue ?>"<?= $Page->Strength5->editAttributes() ?> aria-describedby="x_Strength5_help">
<?= $Page->Strength5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
    <div id="r_Unit4" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit4" for="x_Unit4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit4->caption() ?><?= $Page->Unit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit4">
<input type="<?= $Page->Unit4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit4" name="x_Unit4" id="x_Unit4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Unit4->getPlaceHolder()) ?>" value="<?= $Page->Unit4->EditValue ?>"<?= $Page->Unit4->editAttributes() ?> aria-describedby="x_Unit4_help">
<?= $Page->Unit4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
    <div id="r_Unit5" class="form-group row">
        <label id="elh_pres_tradenames_new_Unit5" for="x_Unit5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Unit5->caption() ?><?= $Page->Unit5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Unit5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit5">
<input type="<?= $Page->Unit5->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Unit5" name="x_Unit5" id="x_Unit5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Unit5->getPlaceHolder()) ?>" value="<?= $Page->Unit5->EditValue ?>"<?= $Page->Unit5->editAttributes() ?> aria-describedby="x_Unit5_help">
<?= $Page->Unit5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Unit5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
    <div id="r_AlterNative1" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative1" for="x_AlterNative1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlterNative1->caption() ?><?= $Page->AlterNative1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative1">
<input type="<?= $Page->AlterNative1->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_AlterNative1" name="x_AlterNative1" id="x_AlterNative1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AlterNative1->getPlaceHolder()) ?>" value="<?= $Page->AlterNative1->EditValue ?>"<?= $Page->AlterNative1->editAttributes() ?> aria-describedby="x_AlterNative1_help">
<?= $Page->AlterNative1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlterNative1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
    <div id="r_AlterNative2" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative2" for="x_AlterNative2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlterNative2->caption() ?><?= $Page->AlterNative2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative2">
<input type="<?= $Page->AlterNative2->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_AlterNative2" name="x_AlterNative2" id="x_AlterNative2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AlterNative2->getPlaceHolder()) ?>" value="<?= $Page->AlterNative2->EditValue ?>"<?= $Page->AlterNative2->editAttributes() ?> aria-describedby="x_AlterNative2_help">
<?= $Page->AlterNative2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlterNative2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
    <div id="r_AlterNative3" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative3" for="x_AlterNative3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlterNative3->caption() ?><?= $Page->AlterNative3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative3">
<input type="<?= $Page->AlterNative3->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_AlterNative3" name="x_AlterNative3" id="x_AlterNative3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AlterNative3->getPlaceHolder()) ?>" value="<?= $Page->AlterNative3->EditValue ?>"<?= $Page->AlterNative3->editAttributes() ?> aria-describedby="x_AlterNative3_help">
<?= $Page->AlterNative3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlterNative3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
    <div id="r_AlterNative4" class="form-group row">
        <label id="elh_pres_tradenames_new_AlterNative4" for="x_AlterNative4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AlterNative4->caption() ?><?= $Page->AlterNative4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AlterNative4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative4">
<input type="<?= $Page->AlterNative4->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_AlterNative4" name="x_AlterNative4" id="x_AlterNative4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AlterNative4->getPlaceHolder()) ?>" value="<?= $Page->AlterNative4->EditValue ?>"<?= $Page->AlterNative4->editAttributes() ?> aria-describedby="x_AlterNative4_help">
<?= $Page->AlterNative4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AlterNative4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("pres_tradenames_new");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
