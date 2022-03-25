<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyMovementSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_movementsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_pharmacy_movementsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_movementsearch", "search");
    <?php } else { ?>
    fview_pharmacy_movementsearch = currentForm = new ew.Form("fview_pharmacy_movementsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_movement")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_movementsearch.addFields([
        ["prc", [], fields.prc.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["BatchNo", [], fields.BatchNo.isInvalid],
        ["ExpDate", [ew.Validators.datetime(7)], fields.ExpDate.isInvalid],
        ["y_ExpDate", [ew.Validators.between], false],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["hsn", [], fields.hsn.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_movementsearch.setInvalid();
    });

    // Validate form
    fview_pharmacy_movementsearch.validate = function () {
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
    fview_pharmacy_movementsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_movementsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fview_pharmacy_movementsearch");
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
<form name="fview_pharmacy_movementsearch" id="fview_pharmacy_movementsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->prc->Visible) { // prc ?>
    <div id="r_prc" class="form-group row">
        <label for="x_prc" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_prc"><?= $Page->prc->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->prc->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_prc" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->prc->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->prc->getPlaceHolder()) ?>" value="<?= $Page->prc->EditValue ?>"<?= $Page->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prc->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_PrName"><?= $Page->PrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_PrName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_BatchNo"><?= $Page->BatchNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_BatchNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <div id="r_ExpDate" class="form-group row">
        <label for="x_ExpDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_ExpDate"><?= $Page->ExpDate->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpDate->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_ExpDate" id="z_ExpDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->ExpDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->ExpDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_pharmacy_movement_ExpDate" class="ew-search-field">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movementsearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_movement_ExpDate" class="ew-search-field2 d-none">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue2 ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movementsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movementsearch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_MFRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->hsn->Visible) { // hsn ?>
    <div id="r_hsn" class="form-group row">
        <label for="x_hsn" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_hsn"><?= $Page->hsn->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_hsn" id="z_hsn" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->hsn->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_hsn" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->hsn->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_hsn" name="x_hsn" id="x_hsn" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->hsn->getPlaceHolder()) ?>" value="<?= $Page->hsn->EditValue ?>"<?= $Page->hsn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->hsn->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_pharmacy_movement" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_pharmacy_movement");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
