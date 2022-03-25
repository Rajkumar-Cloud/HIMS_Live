<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabServicessSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_lab_servicesssearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_lab_servicesssearch = currentAdvancedSearchForm = new ew.Form("fview_lab_servicesssearch", "search");
    <?php } else { ?>
    fview_lab_servicesssearch = currentForm = new ew.Form("fview_lab_servicesssearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_lab_servicess")) ?>,
        fields = currentTable.fields;
    fview_lab_servicesssearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["SID", [ew.Validators.integer], fields.SID.isInvalid],
        ["Reception", [ew.Validators.integer], fields.Reception.isInvalid],
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
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [], fields.modifiedby.isInvalid],
        ["modifieddatetime", [ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [ew.Validators.float], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [], fields.RealizationDate.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["RIDNO", [ew.Validators.integer], fields.RIDNO.isInvalid],
        ["TidNo", [ew.Validators.integer], fields.TidNo.isInvalid],
        ["CId", [ew.Validators.integer], fields.CId.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PayerType", [], fields.PayerType.isInvalid],
        ["Dob", [], fields.Dob.isInvalid],
        ["Currency", [], fields.Currency.isInvalid],
        ["DiscountRemarks", [], fields.DiscountRemarks.isInvalid],
        ["Remarks", [], fields.Remarks.isInvalid],
        ["PatId", [ew.Validators.integer], fields.PatId.isInvalid],
        ["DrDepartment", [], fields.DrDepartment.isInvalid],
        ["RefferedBy", [], fields.RefferedBy.isInvalid],
        ["BillNumber", [], fields.BillNumber.isInvalid],
        ["CardNumber", [], fields.CardNumber.isInvalid],
        ["BankName", [], fields.BankName.isInvalid],
        ["DrID", [ew.Validators.integer], fields.DrID.isInvalid],
        ["LabTestReleased", [], fields.LabTestReleased.isInvalid],
        ["BillStatus", [ew.Validators.integer], fields.BillStatus.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_lab_servicesssearch.setInvalid();
    });

    // Validate form
    fview_lab_servicesssearch.validate = function () {
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
    fview_lab_servicesssearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_lab_servicesssearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_lab_servicesssearch.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    loadjs.done("fview_lab_servicesssearch");
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
<form name="fview_lab_servicesssearch" id="fview_lab_servicesssearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_servicess">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_lab_servicess_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SID->Visible) { // SID ?>
    <div id="r_SID" class="form-group row">
        <label for="x_SID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_SID"><?= $Page->SID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SID" id="z_SID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SID->cellAttributes() ?>>
            <span id="el_view_lab_servicess_SID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SID->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?= HtmlEncode($Page->SID->getPlaceHolder()) ?>" value="<?= $Page->SID->EditValue ?>"<?= $Page->SID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Reception"><?= $Page->Reception->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Reception" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_view_lab_servicess_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_mrnno"><?= $Page->mrnno->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
            <span id="el_view_lab_servicess_mrnno" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_lab_servicess_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label for="x_Age" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Age"><?= $Page->Age->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Age" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Gender"><?= $Page->Gender->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Gender" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_profilePic"><?= $Page->profilePic->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
            <span id="el_view_lab_servicess_profilePic" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Mobile"><?= $Page->Mobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Mobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_IP_OP"><?= $Page->IP_OP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
            <span id="el_view_lab_servicess_IP_OP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Doctor"><?= $Page->Doctor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Doctor" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_voucher_type"><?= $Page->voucher_type->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
            <span id="el_view_lab_servicess_voucher_type" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label for="x_Details" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Details"><?= $Page->Details->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Details" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
            <span id="el_view_lab_servicess_ModeofPayment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Amount"><?= $Page->Amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_AnyDues"><?= $Page->AnyDues->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
            <span id="el_view_lab_servicess_AnyDues" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_lab_servicess_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_view_lab_servicess_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_servicesssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_servicesssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_modifiedby"><?= $Page->modifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
            <span id="el_view_lab_servicess_modifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
            <span id="el_view_lab_servicess_modifieddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_servicesssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_servicesssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RealizationAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RealizationStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RealizationRemarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RealizationBatchNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationDate"><?= $Page->RealizationDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RealizationDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_lab_servicess_HospID" class="ew-search-field ew-search-field-single">
    <select
        id="x_HospID"
        name="x_HospID"
        class="form-control ew-select<?= $Page->HospID->isInvalidClass() ?>"
        data-select2-id="view_lab_servicess_x_HospID"
        data-table="view_lab_servicess"
        data-field="x_HospID"
        data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"
        <?= $Page->HospID->editAttributes() ?>>
        <?= $Page->HospID->selectOptionListHtml("x_HospID") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_lab_servicess_x_HospID']"),
        options = { name: "x_HospID", selectId: "view_lab_servicess_x_HospID", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_lab_servicess.fields.HospID.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RIDNO"><?= $Page->RIDNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RIDNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_TidNo"><?= $Page->TidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
            <span id="el_view_lab_servicess_TidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label for="x_CId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_CId"><?= $Page->CId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
            <span id="el_view_lab_servicess_CId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PartnerName"><?= $Page->PartnerName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
            <span id="el_view_lab_servicess_PartnerName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PayerType"><?= $Page->PayerType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
            <span id="el_view_lab_servicess_PayerType" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PayerType->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayerType->getPlaceHolder()) ?>" value="<?= $Page->PayerType->EditValue ?>"<?= $Page->PayerType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PayerType->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Dob"><?= $Page->Dob->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dob" id="z_Dob" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Dob" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Currency"><?= $Page->Currency->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Currency" id="z_Currency" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Currency" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
            <span id="el_view_lab_servicess_DiscountRemarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DiscountRemarks->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountRemarks->getPlaceHolder()) ?>" value="<?= $Page->DiscountRemarks->EditValue ?>"<?= $Page->DiscountRemarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DiscountRemarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Remarks"><?= $Page->Remarks->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
            <span id="el_view_lab_servicess_Remarks" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatId"><?= $Page->PatId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PatId" id="z_PatId" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
            <span id="el_view_lab_servicess_PatId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatId->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?= HtmlEncode($Page->PatId->getPlaceHolder()) ?>" value="<?= $Page->PatId->EditValue ?>"<?= $Page->PatId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DrDepartment"><?= $Page->DrDepartment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
            <span id="el_view_lab_servicess_DrDepartment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RefferedBy"><?= $Page->RefferedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
            <span id="el_view_lab_servicess_RefferedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RefferedBy->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefferedBy->getPlaceHolder()) ?>" value="<?= $Page->RefferedBy->EditValue ?>"<?= $Page->RefferedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RefferedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BillNumber"><?= $Page->BillNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
            <span id="el_view_lab_servicess_BillNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_CardNumber"><?= $Page->CardNumber->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
            <span id="el_view_lab_servicess_CardNumber" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BankName"><?= $Page->BankName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BankName" id="z_BankName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
            <span id="el_view_lab_servicess_BankName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DrID"><?= $Page->DrID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
            <span id="el_view_lab_servicess_DrID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
    <div id="r_LabTestReleased" class="form-group row">
        <label for="x_LabTestReleased" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_LabTestReleased"><?= $Page->LabTestReleased->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabTestReleased->cellAttributes() ?>>
            <span id="el_view_lab_servicess_LabTestReleased" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LabTestReleased->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTestReleased->getPlaceHolder()) ?>" value="<?= $Page->LabTestReleased->EditValue ?>"<?= $Page->LabTestReleased->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LabTestReleased->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BillStatus"><?= $Page->BillStatus->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillStatus" id="z_BillStatus" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
            <span id="el_view_lab_servicess_BillStatus" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="view_lab_servicess" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_lab_servicess");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
