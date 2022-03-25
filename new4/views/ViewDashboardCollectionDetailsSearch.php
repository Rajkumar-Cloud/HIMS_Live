<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardCollectionDetailsSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_dashboard_collection_detailssearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_dashboard_collection_detailssearch = currentAdvancedSearchForm = new ew.Form("fview_dashboard_collection_detailssearch", "search");
    <?php } else { ?>
    fview_dashboard_collection_detailssearch = currentForm = new ew.Form("fview_dashboard_collection_detailssearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_collection_details")) ?>,
        fields = currentTable.fields;
    fview_dashboard_collection_detailssearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["createddate", [ew.Validators.datetime(0)], fields.createddate.isInvalid],
        ["y_createddate", [ew.Validators.between], false],
        ["_UserName", [], fields._UserName.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["voucher_type", [], fields.voucher_type.isInvalid],
        ["Details", [], fields.Details.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [], fields.AnyDues.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_dashboard_collection_detailssearch.setInvalid();
    });

    // Validate form
    fview_dashboard_collection_detailssearch.validate = function () {
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
    fview_dashboard_collection_detailssearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_collection_detailssearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_collection_detailssearch.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    loadjs.done("fview_dashboard_collection_detailssearch");
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
<form name="fview_dashboard_collection_detailssearch" id="fview_dashboard_collection_detailssearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_collection_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
    <div id="r_createddate" class="form-group row">
        <label for="x_createddate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createddate"><?= $Page->createddate->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddate->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_dashboard_collection_details_createddate" class="ew-search-field">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_dashboard_collection_details_createddate" class="ew-search-field2 d-none">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue2 ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <div id="r__UserName" class="form-group row">
        <label for="x__UserName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details__UserName"><?= $Page->_UserName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z__UserName" id="z__UserName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_UserName->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details__UserName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->_UserName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x__UserName" name="x__UserName" id="x__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_UserName->getPlaceHolder()) ?>" value="<?= $Page->_UserName->EditValue ?>"<?= $Page->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_UserName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_BillNumber"><?= $Page->BillNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_BillNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_PatientID"><?= $Page->PatientID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_PatientID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Mobile"><?= $Page->Mobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_Mobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_voucher_type"><?= $Page->voucher_type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_voucher_type" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label for="x_Details" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Details"><?= $Page->Details->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_Details" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_ModeofPayment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Amount"><?= $Page->Amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_Amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_AnyDues"><?= $Page->AnyDues->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_AnyDues" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label for="x_BillType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_BillType"><?= $Page->BillType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillType" id="z_BillType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_BillType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillType->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->BillType->getPlaceHolder()) ?>" value="<?= $Page->BillType->EditValue ?>"<?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_dashboard_collection_details_HospID" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x_HospID" class="ew-auto-suggest">
    <input type="<?= $Page->HospID->getInputTextType() ?>" class="form-control" name="sv_x_HospID" id="sv_x_HospID" value="<?= RemoveHtml($Page->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"<?= $Page->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_collection_details" data-field="x_HospID" data-input="sv_x_HospID" data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch"], function() {
    fview_dashboard_collection_detailssearch.createAutoSuggest(Object.assign({"id":"x_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_collection_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
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
    ew.addEventHandlers("view_dashboard_collection_details");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
