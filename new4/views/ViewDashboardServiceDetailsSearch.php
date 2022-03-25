<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardServiceDetailsSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_dashboard_service_detailssearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_dashboard_service_detailssearch = currentAdvancedSearchForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
    <?php } else { ?>
    fview_dashboard_service_detailssearch = currentForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_service_details")) ?>,
        fields = currentTable.fields;
    fview_dashboard_service_detailssearch.addFields([
        ["PatientId", [], fields.PatientId.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["Services", [], fields.Services.isInvalid],
        ["amount", [ew.Validators.float], fields.amount.isInvalid],
        ["SubTotal", [ew.Validators.float], fields.SubTotal.isInvalid],
        ["createdby", [], fields.createdby.isInvalid],
        ["createddatetime", [ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["createdDate", [ew.Validators.datetime(7)], fields.createdDate.isInvalid],
        ["y_createdDate", [ew.Validators.between], false],
        ["DrName", [], fields.DrName.isInvalid],
        ["DRDepartment", [], fields.DRDepartment.isInvalid],
        ["ItemCode", [], fields.ItemCode.isInvalid],
        ["DEptCd", [], fields.DEptCd.isInvalid],
        ["CODE", [], fields.CODE.isInvalid],
        ["SERVICE", [], fields.SERVICE.isInvalid],
        ["SERVICE_TYPE", [], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [], fields.DEPARTMENT.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["vid", [ew.Validators.integer], fields.vid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_dashboard_service_detailssearch.setInvalid();
    });

    // Validate form
    fview_dashboard_service_detailssearch.validate = function () {
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
    fview_dashboard_service_detailssearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_service_detailssearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_service_detailssearch.lists.DrName = <?= $Page->DrName->toClientList($Page) ?>;
    fview_dashboard_service_detailssearch.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    loadjs.done("fview_dashboard_service_detailssearch");
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
<form name="fview_dashboard_service_detailssearch" id="fview_dashboard_service_detailssearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientId"><?= $Page->PatientId->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_PatientId" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_PatientName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <div id="r_Services" class="form-group row">
        <label for="x_Services" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_Services"><?= $Page->Services->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Services->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_Services" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Services->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" value="<?= $Page->Services->EditValue ?>"<?= $Page->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label for="x_amount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_amount"><?= $Page->amount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_amount" id="z_amount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_amount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <div id="r_SubTotal" class="form-group row">
        <label for="x_SubTotal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SubTotal"><?= $Page->SubTotal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SubTotal" id="z_SubTotal" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubTotal->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_SubTotal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdby"><?= $Page->createdby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_createdby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createddatetime"><?= $Page->createddatetime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_createddatetime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage(false) ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
    <div id="r_createdDate" class="form-group row">
        <label for="x_createdDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdDate"><?= $Page->createdDate->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdDate->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_createdDate" id="z_createdDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createdDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createdDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createdDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createdDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createdDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_dashboard_service_details_createdDate" class="ew-search-field">
<input type="<?= $Page->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?= HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?= $Page->createdDate->EditValue ?>"<?= $Page->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDate->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDate->ReadOnly && !$Page->createdDate->Disabled && !isset($Page->createdDate->EditAttrs["readonly"]) && !isset($Page->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_dashboard_service_details_createdDate" class="ew-search-field2 d-none">
<input type="<?= $Page->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?= HtmlEncode($Page->createdDate->getPlaceHolder()) ?>" value="<?= $Page->createdDate->EditValue2 ?>"<?= $Page->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createdDate->getErrorMessage(false) ?></div>
<?php if (!$Page->createdDate->ReadOnly && !$Page->createdDate->Disabled && !isset($Page->createdDate->EditAttrs["readonly"]) && !isset($Page->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailssearch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DrName"><?= $Page->DrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_DrName" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?= EmptyValue(strval($Page->DrName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrName->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrName->ReadOnly || $Page->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage(false) ?></div>
<?= $Page->DrName->Lookup->getParamTag($Page, "p_x_DrName") ?>
<input type="hidden" is="selection-list" data-table="view_dashboard_service_details" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?= $Page->DrName->AdvancedSearch->SearchValue ?>"<?= $Page->DrName->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
    <div id="r_DRDepartment" class="form-group row">
        <label for="x_DRDepartment" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DRDepartment"><?= $Page->DRDepartment->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRDepartment->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_DRDepartment" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DRDepartment->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DRDepartment->getPlaceHolder()) ?>" value="<?= $Page->DRDepartment->EditValue ?>"<?= $Page->DRDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DRDepartment->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <div id="r_ItemCode" class="form-group row">
        <label for="x_ItemCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_ItemCode"><?= $Page->ItemCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemCode->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_ItemCode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <div id="r_DEptCd" class="form-group row">
        <label for="x_DEptCd" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEptCd"><?= $Page->DEptCd->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEptCd->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_DEptCd" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_CODE"><?= $Page->CODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CODE" id="z_CODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_CODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <div id="r_SERVICE" class="form-group row">
        <label for="x_SERVICE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE"><?= $Page->SERVICE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_SERVICE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <div id="r_SERVICE_TYPE" class="form-group row">
        <label for="x_SERVICE_TYPE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE_TYPE"><?= $Page->SERVICE_TYPE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_SERVICE_TYPE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x_SERVICE_TYPE" id="x_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE_TYPE->EditValue ?>"<?= $Page->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <div id="r_DEPARTMENT" class="form-group row">
        <label for="x_DEPARTMENT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DEPARTMENT->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_DEPARTMENT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Page->DEPARTMENT->EditValue ?>"<?= $Page->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_HospID" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x_HospID" class="ew-auto-suggest">
    <input type="<?= $Page->HospID->getInputTextType() ?>" class="form-control" name="sv_x_HospID" id="sv_x_HospID" value="<?= RemoveHtml($Page->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"<?= $Page->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_details" data-field="x_HospID" data-input="sv_x_HospID" data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch"], function() {
    fview_dashboard_service_detailssearch.createAutoSuggest(Object.assign({"id":"x_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
    <div id="r_vid" class="form-group row">
        <label for="x_vid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_vid"><?= $Page->vid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_vid" id="z_vid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vid->cellAttributes() ?>>
            <span id="el_view_dashboard_service_details_vid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->vid->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_vid" name="x_vid" id="x_vid" size="30" placeholder="<?= HtmlEncode($Page->vid->getPlaceHolder()) ?>" value="<?= $Page->vid->EditValue ?>"<?= $Page->vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->vid->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_dashboard_service_details");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
