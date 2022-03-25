<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_billing_vouchersearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_billing_vouchersearch = currentAdvancedSearchForm = new ew.Form("fview_billing_vouchersearch", "search");
    <?php } else { ?>
    fview_billing_vouchersearch = currentForm = new ew.Form("fview_billing_vouchersearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher")) ?>,
        fields = currentTable.fields;
    fview_billing_vouchersearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["createddatetime", [ew.Validators.datetime(7)], fields.createddatetime.isInvalid],
        ["y_createddatetime", [ew.Validators.between], false],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["Reception", [], fields.Reception.isInvalid],
        ["PatientId", [], fields.PatientId.isInvalid],
        ["mrnno", [], fields.mrnno.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Age", [], fields.Age.isInvalid],
        ["Gender", [], fields.Gender.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["Mobile", [], fields.Mobile.isInvalid],
        ["IP_OP", [], fields.IP_OP.isInvalid],
        ["Doctor", [], fields.Doctor.isInvalid],
        ["voucher_type", [], fields.voucher_type.isInvalid],
        ["Details", [], fields.Details.isInvalid],
        ["ModeofPayment", [], fields.ModeofPayment.isInvalid],
        ["Amount", [ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [], fields.AnyDues.isInvalid],
        ["DiscountAmount", [ew.Validators.float], fields.DiscountAmount.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [ew.Validators.float], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [], fields.RealizationDate.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["RIDNO", [ew.Validators.integer], fields.RIDNO.isInvalid],
        ["TidNo", [ew.Validators.integer], fields.TidNo.isInvalid],
        ["CId", [], fields.CId.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PayerType", [], fields.PayerType.isInvalid],
        ["Dob", [], fields.Dob.isInvalid],
        ["Currency", [], fields.Currency.isInvalid],
        ["DiscountRemarks", [], fields.DiscountRemarks.isInvalid],
        ["Remarks", [], fields.Remarks.isInvalid],
        ["PatId", [], fields.PatId.isInvalid],
        ["DrDepartment", [], fields.DrDepartment.isInvalid],
        ["RefferedBy", [], fields.RefferedBy.isInvalid],
        ["CardNumber", [], fields.CardNumber.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["DrID", [], fields.DrID.isInvalid],
        ["BillStatus", [ew.Validators.integer], fields.BillStatus.isInvalid],
        ["ReportHeader", [], fields.ReportHeader.isInvalid],
        ["_UserName", [], fields._UserName.isInvalid],
        ["AdjustmentAdvance", [], fields.AdjustmentAdvance.isInvalid],
        ["billing_vouchercol", [], fields.billing_vouchercol.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["ProcedureName", [], fields.ProcedureName.isInvalid],
        ["ProcedureAmount", [ew.Validators.float], fields.ProcedureAmount.isInvalid],
        ["IncludePackage", [], fields.IncludePackage.isInvalid],
        ["CancelBill", [], fields.CancelBill.isInvalid],
        ["CancelReason", [], fields.CancelReason.isInvalid],
        ["CancelModeOfPayment", [], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [], fields.CancelAmount.isInvalid],
        ["CancelBankName", [], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [], fields.LabTest.isInvalid],
        ["sid", [ew.Validators.integer], fields.sid.isInvalid],
        ["SidNo", [], fields.SidNo.isInvalid],
        ["createdDatettime", [ew.Validators.datetime(0)], fields.createdDatettime.isInvalid],
        ["BillClosing", [], fields.BillClosing.isInvalid],
        ["GoogleReviewID", [], fields.GoogleReviewID.isInvalid],
        ["CardType", [], fields.CardType.isInvalid],
        ["PharmacyBill", [], fields.PharmacyBill.isInvalid],
        ["cash", [ew.Validators.float], fields.cash.isInvalid],
        ["Card", [ew.Validators.float], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_billing_vouchersearch.setInvalid();
    });

    // Validate form
    fview_billing_vouchersearch.validate = function () {
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
    fview_billing_vouchersearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_vouchersearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_vouchersearch.lists.Reception = <?= $Page->Reception->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.CId = <?= $Page->CId->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.PatId = <?= $Page->PatId->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.RefferedBy = <?= $Page->RefferedBy->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.DrID = <?= $Page->DrID->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.AdjustmentAdvance = <?= $Page->AdjustmentAdvance->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.BillType = <?= $Page->BillType->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.IncludePackage = <?= $Page->IncludePackage->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.CancelBill = <?= $Page->CancelBill->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.BillClosing = <?= $Page->BillClosing->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.GoogleReviewID = <?= $Page->GoogleReviewID->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.CardType = <?= $Page->CardType->toClientList($Page) ?>;
    fview_billing_vouchersearch.lists.PharmacyBill = <?= $Page->PharmacyBill->toClientList($Page) ?>;
    loadjs.done("fview_billing_vouchersearch");
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
<form name="fview_billing_vouchersearch" id="fview_billing_vouchersearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_billing_voucher_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_billing_voucher_createddatetime" class="ew-search-field">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_vouchersearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_billing_voucher_createddatetime" class="ew-search-field2 d-none">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createddatetime" data-format="7" name="y_createddatetime" id="y_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue2 ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_vouchersearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
            <span id="el_view_billing_voucher_BillNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Reception" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?= EmptyValue(strval($Page->Reception->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Reception->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Reception->ReadOnly || $Page->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
<?= $Page->Reception->Lookup->getParamTag($Page, "p_x_Reception") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?= $Page->Reception->AdvancedSearch->SearchValue ?>"<?= $Page->Reception->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_view_billing_voucher_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_view_billing_voucher_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Mobile"><?= $Page->Mobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Mobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IP_OP"><?= $Page->IP_OP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
            <span id="el_view_billing_voucher_IP_OP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Doctor"><?= $Page->Doctor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Doctor" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_type"><?= $Page->voucher_type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
            <span id="el_view_billing_voucher_voucher_type" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label for="x_Details" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Details"><?= $Page->Details->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Details" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
            <span id="el_view_billing_voucher_ModeofPayment" class="ew-search-field ew-search-field-single">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x_ModeofPayment"
        data-table="view_billing_voucher"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Page->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Page->ModeofPayment->editAttributes() ?>>
        <?= $Page->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage(false) ?></div>
<?= $Page->ModeofPayment->Lookup->getParamTag($Page, "p_x_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "view_billing_voucher_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Amount"><?= $Page->Amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
            <span id="el_view_billing_voucher_AnyDues" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
    <div id="r_DiscountAmount" class="form-group row">
        <label for="x_DiscountAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DiscountAmount" id="z_DiscountAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountAmount->cellAttributes() ?>>
            <span id="el_view_billing_voucher_DiscountAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_billing_voucher_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_view_billing_voucher_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_view_billing_voucher_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_vouchersearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RealizationAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RealizationStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RealizationRemarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RealizationBatchNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RealizationDate"><?= $Page->RealizationDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RealizationDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_billing_voucher_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RIDNO"><?= $Page->RIDNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RIDNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_TidNo"><?= $Page->TidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
            <span id="el_view_billing_voucher_TidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label for="x_CId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CId"><?= $Page->CId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CId" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?= EmptyValue(strval($Page->CId->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->CId->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->CId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->CId->ReadOnly || $Page->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage(false) ?></div>
<?= $Page->CId->Lookup->getParamTag($Page, "p_x_CId") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?= $Page->CId->AdvancedSearch->SearchValue ?>"<?= $Page->CId->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PartnerName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PayerType"><?= $Page->PayerType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PayerType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PayerType->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayerType->getPlaceHolder()) ?>" value="<?= $Page->PayerType->EditValue ?>"<?= $Page->PayerType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PayerType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Dob"><?= $Page->Dob->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dob" id="z_Dob" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Dob" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Currency"><?= $Page->Currency->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Currency" id="z_Currency" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Currency" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
            <span id="el_view_billing_voucher_DiscountRemarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DiscountRemarks->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountRemarks->getPlaceHolder()) ?>" value="<?= $Page->DiscountRemarks->EditValue ?>"<?= $Page->DiscountRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountRemarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Remarks"><?= $Page->Remarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Remarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PatId"><?= $Page->PatId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatId" id="z_PatId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PatId" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?= EmptyValue(strval($Page->PatId->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatId->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatId->ReadOnly || $Page->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage(false) ?></div>
<?= $Page->PatId->Lookup->getParamTag($Page, "p_x_PatId") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher" data-field="x_PatId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?= $Page->PatId->AdvancedSearch->SearchValue ?>"<?= $Page->PatId->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrDepartment"><?= $Page->DrDepartment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
            <span id="el_view_billing_voucher_DrDepartment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_RefferedBy"><?= $Page->RefferedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
            <span id="el_view_billing_voucher_RefferedBy" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?= EmptyValue(strval($Page->RefferedBy->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RefferedBy->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RefferedBy->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RefferedBy->ReadOnly || $Page->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RefferedBy->getErrorMessage(false) ?></div>
<?= $Page->RefferedBy->Lookup->getParamTag($Page, "p_x_RefferedBy") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher" data-field="x_RefferedBy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?= $Page->RefferedBy->AdvancedSearch->SearchValue ?>"<?= $Page->RefferedBy->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CardNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BankName"><?= $Page->BankName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BankName" id="z_BankName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
            <span id="el_view_billing_voucher_BankName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_DrID"><?= $Page->DrID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
            <span id="el_view_billing_voucher_DrID" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?= EmptyValue(strval($Page->DrID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrID->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrID->ReadOnly || $Page->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage(false) ?></div>
<?= $Page->DrID->Lookup->getParamTag($Page, "p_x_DrID") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher" data-field="x_DrID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?= $Page->DrID->AdvancedSearch->SearchValue ?>"<?= $Page->DrID->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillStatus"><?= $Page->BillStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillStatus" id="z_BillStatus" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
            <span id="el_view_billing_voucher_BillStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ReportHeader"><?= $Page->ReportHeader->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
            <span id="el_view_billing_voucher_ReportHeader" class="ew-search-field ew-search-field-single">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ReportHeader[]"
    name="x_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ReportHeader"
    data-target="dsl_x_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <div id="r__UserName" class="form-group row">
        <label for="x__UserName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher__UserName"><?= $Page->_UserName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z__UserName" id="z__UserName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_UserName->cellAttributes() ?>>
            <span id="el_view_billing_voucher__UserName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->_UserName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x__UserName" name="x__UserName" id="x__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_UserName->getPlaceHolder()) ?>" value="<?= $Page->_UserName->EditValue ?>"<?= $Page->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_UserName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
    <div id="r_AdjustmentAdvance" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdjustmentAdvance" id="z_AdjustmentAdvance" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
            <span id="el_view_billing_voucher_AdjustmentAdvance" class="ew-search-field ew-search-field-single">
<template id="tp_x_AdjustmentAdvance">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance"<?= $Page->AdjustmentAdvance->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_AdjustmentAdvance" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_AdjustmentAdvance[]"
    name="x_AdjustmentAdvance[]"
    value="<?= HtmlEncode($Page->AdjustmentAdvance->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_AdjustmentAdvance"
    data-target="dsl_x_AdjustmentAdvance"
    data-repeatcolumn="5"
    class="form-control<?= $Page->AdjustmentAdvance->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_AdjustmentAdvance"
    data-value-separator="<?= $Page->AdjustmentAdvance->displayValueSeparatorAttribute() ?>"
    <?= $Page->AdjustmentAdvance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AdjustmentAdvance->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
    <div id="r_billing_vouchercol" class="form-group row">
        <label for="x_billing_vouchercol" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_billing_vouchercol" id="z_billing_vouchercol" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billing_vouchercol->cellAttributes() ?>>
            <span id="el_view_billing_voucher_billing_vouchercol" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->billing_vouchercol->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billing_vouchercol->getPlaceHolder()) ?>" value="<?= $Page->billing_vouchercol->EditValue ?>"<?= $Page->billing_vouchercol->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->billing_vouchercol->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillType"><?= $Page->BillType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillType" id="z_BillType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
            <span id="el_view_billing_voucher_BillType" class="ew-search-field ew-search-field-single">
<template id="tp_x_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType"<?= $Page->BillType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_BillType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_BillType"
    name="x_BillType"
    value="<?= HtmlEncode($Page->BillType->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_BillType"
    data-target="dsl_x_BillType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
    <div id="r_ProcedureName" class="form-group row">
        <label for="x_ProcedureName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureName"><?= $Page->ProcedureName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProcedureName" id="z_ProcedureName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureName->cellAttributes() ?>>
            <span id="el_view_billing_voucher_ProcedureName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProcedureName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureName->getPlaceHolder()) ?>" value="<?= $Page->ProcedureName->EditValue ?>"<?= $Page->ProcedureName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProcedureName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
    <div id="r_ProcedureAmount" class="form-group row">
        <label for="x_ProcedureAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ProcedureAmount" id="z_ProcedureAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureAmount->cellAttributes() ?>>
            <span id="el_view_billing_voucher_ProcedureAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProcedureAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?= HtmlEncode($Page->ProcedureAmount->getPlaceHolder()) ?>" value="<?= $Page->ProcedureAmount->EditValue ?>"<?= $Page->ProcedureAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProcedureAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
    <div id="r_IncludePackage" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_IncludePackage"><?= $Page->IncludePackage->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IncludePackage" id="z_IncludePackage" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IncludePackage->cellAttributes() ?>>
            <span id="el_view_billing_voucher_IncludePackage" class="ew-search-field ew-search-field-single">
<template id="tp_x_IncludePackage">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage"<?= $Page->IncludePackage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IncludePackage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IncludePackage[]"
    name="x_IncludePackage[]"
    value="<?= HtmlEncode($Page->IncludePackage->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IncludePackage"
    data-target="dsl_x_IncludePackage"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IncludePackage->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_IncludePackage"
    data-value-separator="<?= $Page->IncludePackage->displayValueSeparatorAttribute() ?>"
    <?= $Page->IncludePackage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IncludePackage->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
    <div id="r_CancelBill" class="form-group row">
        <label for="x_CancelBill" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBill"><?= $Page->CancelBill->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelBill" id="z_CancelBill" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBill->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelBill" class="ew-search-field ew-search-field-single">
    <select
        id="x_CancelBill"
        name="x_CancelBill"
        class="form-control ew-select<?= $Page->CancelBill->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_x_CancelBill"
        data-table="view_billing_voucher"
        data-field="x_CancelBill"
        data-value-separator="<?= $Page->CancelBill->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>"
        <?= $Page->CancelBill->editAttributes() ?>>
        <?= $Page->CancelBill->selectOptionListHtml("x_CancelBill") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_x_CancelBill']"),
        options = { name: "x_CancelBill", selectId: "view_billing_voucher_x_CancelBill", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_billing_voucher.fields.CancelBill.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher.fields.CancelBill.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
    <div id="r_CancelReason" class="form-group row">
        <label for="x_CancelReason" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelReason"><?= $Page->CancelReason->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelReason" id="z_CancelReason" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReason->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelReason" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CancelReason->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelReason->getPlaceHolder()) ?>" value="<?= $Page->CancelReason->EditValue ?>"<?= $Page->CancelReason->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelReason->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
    <div id="r_CancelModeOfPayment" class="form-group row">
        <label for="x_CancelModeOfPayment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelModeOfPayment" id="z_CancelModeOfPayment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelModeOfPayment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
    <div id="r_CancelAmount" class="form-group row">
        <label for="x_CancelAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelAmount"><?= $Page->CancelAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelAmount" id="z_CancelAmount" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAmount->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
    <div id="r_CancelBankName" class="form-group row">
        <label for="x_CancelBankName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelBankName"><?= $Page->CancelBankName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelBankName" id="z_CancelBankName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBankName->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelBankName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
    <div id="r_CancelTransactionNumber" class="form-group row">
        <label for="x_CancelTransactionNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CancelTransactionNumber" id="z_CancelTransactionNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CancelTransactionNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
    <div id="r_LabTest" class="form-group row">
        <label for="x_LabTest" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_LabTest"><?= $Page->LabTest->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabTest" id="z_LabTest" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabTest->cellAttributes() ?>>
            <span id="el_view_billing_voucher_LabTest" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <div id="r_sid" class="form-group row">
        <label for="x_sid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_sid"><?= $Page->sid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_sid" id="z_sid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sid->cellAttributes() ?>>
            <span id="el_view_billing_voucher_sid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <div id="r_SidNo" class="form-group row">
        <label for="x_SidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_SidNo"><?= $Page->SidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidNo->cellAttributes() ?>>
            <span id="el_view_billing_voucher_SidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
    <div id="r_createdDatettime" class="form-group row">
        <label for="x_createdDatettime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_createdDatettime"><?= $Page->createdDatettime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createdDatettime" id="z_createdDatettime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdDatettime->cellAttributes() ?>>
            <span id="el_view_billing_voucher_createdDatettime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdDatettime->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_createdDatettime" name="x_createdDatettime" id="x_createdDatettime" placeholder="<?= HtmlEncode($Page->createdDatettime->getPlaceHolder()) ?>" value="<?= $Page->createdDatettime->EditValue ?>"<?= $Page->createdDatettime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDatettime->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDatettime->ReadOnly && !$Page->createdDatettime->Disabled && !isset($Page->createdDatettime->EditAttrs["readonly"]) && !isset($Page->createdDatettime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_billing_vouchersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_billing_vouchersearch", "x_createdDatettime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_BillClosing"><?= $Page->BillClosing->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
            <span id="el_view_billing_voucher_BillClosing" class="ew-search-field ew-search-field-single">
<template id="tp_x_BillClosing">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing"<?= $Page->BillClosing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_BillClosing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_BillClosing[]"
    name="x_BillClosing[]"
    value="<?= HtmlEncode($Page->BillClosing->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_BillClosing"
    data-target="dsl_x_BillClosing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillClosing->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_BillClosing"
    data-value-separator="<?= $Page->BillClosing->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillClosing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
    <div id="r_GoogleReviewID" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_GoogleReviewID"><?= $Page->GoogleReviewID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GoogleReviewID" id="z_GoogleReviewID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GoogleReviewID->cellAttributes() ?>>
            <span id="el_view_billing_voucher_GoogleReviewID" class="ew-search-field ew-search-field-single">
<template id="tp_x_GoogleReviewID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID"<?= $Page->GoogleReviewID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_GoogleReviewID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_GoogleReviewID[]"
    name="x_GoogleReviewID[]"
    value="<?= HtmlEncode($Page->GoogleReviewID->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_GoogleReviewID"
    data-target="dsl_x_GoogleReviewID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->GoogleReviewID->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_GoogleReviewID"
    data-value-separator="<?= $Page->GoogleReviewID->displayValueSeparatorAttribute() ?>"
    <?= $Page->GoogleReviewID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GoogleReviewID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
    <div id="r_CardType" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_CardType"><?= $Page->CardType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CardType" id="z_CardType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardType->cellAttributes() ?>>
            <span id="el_view_billing_voucher_CardType" class="ew-search-field ew-search-field-single">
<template id="tp_x_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_billing_voucher" data-field="x_CardType" name="x_CardType" id="x_CardType"<?= $Page->CardType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_CardType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_CardType"
    name="x_CardType"
    value="<?= HtmlEncode($Page->CardType->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_CardType"
    data-target="dsl_x_CardType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CardType->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
    <div id="r_PharmacyBill" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_PharmacyBill"><?= $Page->PharmacyBill->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PharmacyBill" id="z_PharmacyBill" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PharmacyBill->cellAttributes() ?>>
            <span id="el_view_billing_voucher_PharmacyBill" class="ew-search-field ew-search-field-single">
<template id="tp_x_PharmacyBill">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher" data-field="x_PharmacyBill" name="x_PharmacyBill" id="x_PharmacyBill"<?= $Page->PharmacyBill->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PharmacyBill" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PharmacyBill[]"
    name="x_PharmacyBill[]"
    value="<?= HtmlEncode($Page->PharmacyBill->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_PharmacyBill"
    data-target="dsl_x_PharmacyBill"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PharmacyBill->isInvalidClass() ?>"
    data-table="view_billing_voucher"
    data-field="x_PharmacyBill"
    data-value-separator="<?= $Page->PharmacyBill->displayValueSeparatorAttribute() ?>"
    <?= $Page->PharmacyBill->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PharmacyBill->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->cash->Visible) { // cash ?>
    <div id="r_cash" class="form-group row">
        <label for="x_cash" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_cash"><?= $Page->cash->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_cash" id="z_cash" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cash->cellAttributes() ?>>
            <span id="el_view_billing_voucher_cash" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->cash->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_cash" name="x_cash" id="x_cash" size="30" placeholder="<?= HtmlEncode($Page->cash->getPlaceHolder()) ?>" value="<?= $Page->cash->EditValue ?>"<?= $Page->cash->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->cash->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label for="x_Card" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_billing_voucher_Card"><?= $Page->Card->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Card" id="z_Card" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
            <span id="el_view_billing_voucher_Card" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="view_billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_billing_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
