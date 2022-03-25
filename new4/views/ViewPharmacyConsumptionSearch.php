<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyConsumptionSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_consumptionsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_pharmacy_consumptionsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_consumptionsearch", "search");
    <?php } else { ?>
    fview_pharmacy_consumptionsearch = currentForm = new ew.Form("fview_pharmacy_consumptionsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_consumption")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_consumptionsearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["BATCH", [], fields.BATCH.isInvalid],
        ["OQ", [ew.Validators.float], fields.OQ.isInvalid],
        ["Stock", [ew.Validators.integer], fields.Stock.isInvalid],
        ["y_Stock", [ew.Validators.between], false],
        ["EXPDT", [ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["y_EXPDT", [ew.Validators.between], false],
        ["BILLDATE", [ew.Validators.datetime(0)], fields.BILLDATE.isInvalid],
        ["y_BILLDATE", [ew.Validators.between], false],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["UNIT", [], fields.UNIT.isInvalid],
        ["RT", [ew.Validators.float], fields.RT.isInvalid],
        ["SSGST", [ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [ew.Validators.float], fields.SCGST.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["BRCODE", [ew.Validators.integer], fields.BRCODE.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["Select", [], fields.Select.isInvalid],
        ["ConsQTY", [], fields.ConsQTY.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_consumptionsearch.setInvalid();
    });

    // Validate form
    fview_pharmacy_consumptionsearch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_consumptionsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_consumptionsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_consumptionsearch.lists.Select = <?= $Page->Select->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_consumptionsearch");
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
<form name="fview_pharmacy_consumptionsearch" id="fview_pharmacy_consumptionsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_consumption">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_PRC"><?= $Page->PRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_PRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
    <div id="r_DES" class="form-group row">
        <label for="x_DES" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_DES"><?= $Page->DES->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DES->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_DES" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
    <div id="r_BATCH" class="form-group row">
        <label for="x_BATCH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BATCH"><?= $Page->BATCH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCH->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_BATCH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BATCH->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCH->getPlaceHolder()) ?>" value="<?= $Page->BATCH->EditValue ?>"<?= $Page->BATCH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_OQ"><?= $Page->OQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_OQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <div id="r_Stock" class="form-group row">
        <label for="x_Stock" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_Stock"><?= $Page->Stock->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stock->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_Stock" id="z_Stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->Stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_pharmacy_consumption_Stock" class="ew-search-field">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_consumption_Stock" class="ew-search-field2 d-none">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue2 ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_EXPDT"><?= $Page->EXPDT->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_pharmacy_consumption_EXPDT" class="ew-search-field">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_consumption_EXPDT" class="ew-search-field2 d-none">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue2 ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
    <div id="r_BILLDATE" class="form-group row">
        <label for="x_BILLDATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BILLDATE"><?= $Page->BILLDATE->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDATE->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_BILLDATE" id="z_BILLDATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_pharmacy_consumption_BILLDATE" class="ew-search-field">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_consumption_BILLDATE" class="ew-search-field2 d-none">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue2 ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionsearch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label for="x_GENNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_GENNAME"><?= $Page->GENNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_GENNAME" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
    <div id="r_UNIT" class="form-group row">
        <label for="x_UNIT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_UNIT"><?= $Page->UNIT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UNIT->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_UNIT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UNIT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>" value="<?= $Page->UNIT->EditValue ?>"<?= $Page->UNIT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label for="x_RT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_RT"><?= $Page->RT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_RT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_SSGST"><?= $Page->SSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_SSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_SCGST"><?= $Page->SCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_SCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_MFRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_BRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Select->Visible) { // Select ?>
    <div id="r_Select" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_Select"><?= $Page->Select->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Select" id="z_Select" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Select->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_Select" class="ew-search-field ew-search-field-single">
<template id="tp_x_Select">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" name="x_Select" id="x_Select"<?= $Page->Select->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Select" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Select[]"
    name="x_Select[]"
    value="<?= HtmlEncode($Page->Select->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Select"
    data-target="dsl_x_Select"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Select->isInvalidClass() ?>"
    data-table="view_pharmacy_consumption"
    data-field="x_Select"
    data-value-separator="<?= $Page->Select->displayValueSeparatorAttribute() ?>"
    <?= $Page->Select->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Select->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ConsQTY->Visible) { // ConsQTY ?>
    <div id="r_ConsQTY" class="form-group row">
        <label for="x_ConsQTY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_consumption_ConsQTY"><?= $Page->ConsQTY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ConsQTY" id="z_ConsQTY" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConsQTY->cellAttributes() ?>>
            <span id="el_view_pharmacy_consumption_ConsQTY" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ConsQTY->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x_ConsQTY" id="x_ConsQTY" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ConsQTY->getPlaceHolder()) ?>" value="<?= $Page->ConsQTY->EditValue ?>"<?= $Page->ConsQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ConsQTY->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
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
    ew.addEventHandlers("view_pharmacy_consumption");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
