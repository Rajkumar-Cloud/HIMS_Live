<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyMovementItemSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_movement_itemsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_pharmacy_movement_itemsearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
    <?php } else { ?>
    fview_pharmacy_movement_itemsearch = currentForm = new ew.Form("fview_pharmacy_movement_itemsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_movement_item")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_movement_itemsearch.addFields([
        ["ProductFrom", [], fields.ProductFrom.isInvalid],
        ["Quantity", [], fields.Quantity.isInvalid],
        ["FreeQty", [], fields.FreeQty.isInvalid],
        ["IQ", [], fields.IQ.isInvalid],
        ["MRQ", [], fields.MRQ.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["OPNO", [], fields.OPNO.isInvalid],
        ["IPNO", [], fields.IPNO.isInvalid],
        ["PatientBILLNO", [], fields.PatientBILLNO.isInvalid],
        ["BILLDT", [], fields.BILLDT.isInvalid],
        ["GRNNO", [], fields.GRNNO.isInvalid],
        ["DT", [], fields.DT.isInvalid],
        ["Customername", [], fields.Customername.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(11)], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(11)], fields.modifieddatetime.isInvalid],
        ["BILLNO", [], fields.BILLNO.isInvalid],
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
        fview_pharmacy_movement_itemsearch.setInvalid();
    });

    // Validate form
    fview_pharmacy_movement_itemsearch.validate = function () {
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
    fview_pharmacy_movement_itemsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_movement_itemsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_movement_itemsearch.lists.ProductFrom = <?= $Page->ProductFrom->toClientList($Page) ?>;
    fview_pharmacy_movement_itemsearch.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_movement_itemsearch");
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
<form name="fview_pharmacy_movement_itemsearch" id="fview_pharmacy_movement_itemsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->ProductFrom->Visible) { // ProductFrom ?>
    <div id="r_ProductFrom" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ProductFrom"><?= $Page->ProductFrom->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductFrom" id="z_ProductFrom" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProductFrom->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_ProductFrom" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->ProductFrom->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->ProductFrom->EditAttrs["onchange"] = "";
?>
<span id="as_x_ProductFrom" class="ew-auto-suggest">
    <input type="<?= $Page->ProductFrom->getInputTextType() ?>" class="form-control" name="sv_x_ProductFrom" id="sv_x_ProductFrom" value="<?= RemoveHtml($Page->ProductFrom->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->ProductFrom->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->ProductFrom->getPlaceHolder()) ?>"<?= $Page->ProductFrom->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_ProductFrom" data-input="sv_x_ProductFrom" data-value-separator="<?= $Page->ProductFrom->displayValueSeparatorAttribute() ?>" name="x_ProductFrom" id="x_ProductFrom" value="<?= HtmlEncode($Page->ProductFrom->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->ProductFrom->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch"], function() {
    fview_pharmacy_movement_itemsearch.createAutoSuggest(Object.assign({"id":"x_ProductFrom","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.ProductFrom.autoSuggestOptions));
});
</script>
<?= $Page->ProductFrom->Lookup->getParamTag($Page, "p_x_ProductFrom") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Quantity"><?= $Page->Quantity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_Quantity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <div id="r_FreeQty" class="form-group row">
        <label for="x_FreeQty" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_FreeQty"><?= $Page->FreeQty->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FreeQty" id="z_FreeQty" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQty->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_FreeQty" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IQ"><?= $Page->IQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_IQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MRQ"><?= $Page->MRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_MRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_BRCODE" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacy_movement_item" data-field="x_BRCODE" data-input="sv_x_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch"], function() {
    fview_pharmacy_movement_itemsearch.createAutoSuggest(Object.assign({"id":"x_BRCODE","forceSelect":true}, ew.vars.tables.view_pharmacy_movement_item.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <div id="r_OPNO" class="form-group row">
        <label for="x_OPNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_OPNO"><?= $Page->OPNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_OPNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPNO->getPlaceHolder()) ?>" value="<?= $Page->OPNO->EditValue ?>"<?= $Page->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OPNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
    <div id="r_IPNO" class="form-group row">
        <label for="x_IPNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_IPNO"><?= $Page->IPNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IPNO" id="z_IPNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IPNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_IPNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IPNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IPNO->getPlaceHolder()) ?>" value="<?= $Page->IPNO->EditValue ?>"<?= $Page->IPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IPNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientBILLNO->Visible) { // PatientBILLNO ?>
    <div id="r_PatientBILLNO" class="form-group row">
        <label for="x_PatientBILLNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PatientBILLNO"><?= $Page->PatientBILLNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientBILLNO" id="z_PatientBILLNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientBILLNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_PatientBILLNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientBILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PatientBILLNO" name="x_PatientBILLNO" id="x_PatientBILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PatientBILLNO->getPlaceHolder()) ?>" value="<?= $Page->PatientBILLNO->EditValue ?>"<?= $Page->PatientBILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientBILLNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <div id="r_BILLDT" class="form-group row">
        <label for="x_BILLDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLDT"><?= $Page->BILLDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BILLDT" id="z_BILLDT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDT->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_BILLDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BILLDT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Page->BILLDT->getPlaceHolder()) ?>" value="<?= $Page->BILLDT->EditValue ?>"<?= $Page->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
    <div id="r_GRNNO" class="form-group row">
        <label for="x_GRNNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_GRNNO"><?= $Page->GRNNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GRNNO" id="z_GRNNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_GRNNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GRNNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GRNNO->getPlaceHolder()) ?>" value="<?= $Page->GRNNO->EditValue ?>"<?= $Page->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GRNNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label for="x_DT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_DT"><?= $Page->DT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DT" id="z_DT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_DT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_DT" name="x_DT" id="x_DT" size="30" maxlength="19" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label for="x_Customername" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_Customername"><?= $Page->Customername->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Customername" id="z_Customername" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customername->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_Customername" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Customername->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>" value="<?= $Page->Customername->EditValue ?>"<?= $Page->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_createddatetime" data-format="11" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_modifieddatetime" data-format="11" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <div id="r_BILLNO" class="form-group row">
        <label for="x_BILLNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BILLNO"><?= $Page->BILLNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BILLNO" id="z_BILLNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLNO->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_BILLNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BILLNO->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BILLNO->getPlaceHolder()) ?>" value="<?= $Page->BILLNO->EditValue ?>"<?= $Page->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
    <div id="r_prc" class="form-group row">
        <label for="x_prc" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_prc"><?= $Page->prc->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->prc->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_prc" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->prc->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->prc->getPlaceHolder()) ?>" value="<?= $Page->prc->EditValue ?>"<?= $Page->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prc->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_PrName"><?= $Page->PrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_PrName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_BatchNo"><?= $Page->BatchNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_BatchNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <div id="r_ExpDate" class="form-group row">
        <label for="x_ExpDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_ExpDate"><?= $Page->ExpDate->caption() ?></span>
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
            <span id="el_view_pharmacy_movement_item_ExpDate" class="ew-search-field">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_pharmacy_movement_item_ExpDate" class="ew-search-field2 d-none">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_ExpDate" data-format="7" name="y_ExpDate" id="y_ExpDate" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue2 ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_movement_itemsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_movement_itemsearch", "y_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_MFRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->hsn->Visible) { // hsn ?>
    <div id="r_hsn" class="form-group row">
        <label for="x_hsn" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_hsn"><?= $Page->hsn->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_hsn" id="z_hsn" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->hsn->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_hsn" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->hsn->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_hsn" name="x_hsn" id="x_hsn" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->hsn->getPlaceHolder()) ?>" value="<?= $Page->hsn->EditValue ?>"<?= $Page->hsn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->hsn->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacy_movement_item_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_pharmacy_movement_item_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_pharmacy_movement_item" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
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
    ew.addEventHandlers("view_pharmacy_movement_item");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
