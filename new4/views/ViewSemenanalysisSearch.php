<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewSemenanalysisSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_semenanalysissearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_semenanalysissearch = currentAdvancedSearchForm = new ew.Form("fview_semenanalysissearch", "search");
    <?php } else { ?>
    fview_semenanalysissearch = currentForm = new ew.Form("fview_semenanalysissearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_semenanalysis")) ?>,
        fields = currentTable.fields;
    fview_semenanalysissearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["PaID", [], fields.PaID.isInvalid],
        ["PaName", [], fields.PaName.isInvalid],
        ["PaMobile", [], fields.PaMobile.isInvalid],
        ["PartnerID", [], fields.PartnerID.isInvalid],
        ["PartnerName", [], fields.PartnerName.isInvalid],
        ["PartnerMobile", [], fields.PartnerMobile.isInvalid],
        ["RIDNo", [], fields.RIDNo.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["HusbandName", [], fields.HusbandName.isInvalid],
        ["RequestDr", [], fields.RequestDr.isInvalid],
        ["CollectionDate", [ew.Validators.datetime(7)], fields.CollectionDate.isInvalid],
        ["ResultDate", [ew.Validators.datetime(7)], fields.ResultDate.isInvalid],
        ["RequestSample", [], fields.RequestSample.isInvalid],
        ["CollectionType", [], fields.CollectionType.isInvalid],
        ["CollectionMethod", [], fields.CollectionMethod.isInvalid],
        ["Medicationused", [], fields.Medicationused.isInvalid],
        ["DifficultiesinCollection", [], fields.DifficultiesinCollection.isInvalid],
        ["Volume", [], fields.Volume.isInvalid],
        ["pH", [], fields.pH.isInvalid],
        ["Timeofcollection", [], fields.Timeofcollection.isInvalid],
        ["Timeofexamination", [], fields.Timeofexamination.isInvalid],
        ["Concentration", [], fields.Concentration.isInvalid],
        ["Total", [], fields.Total.isInvalid],
        ["ProgressiveMotility", [], fields.ProgressiveMotility.isInvalid],
        ["NonProgrssiveMotile", [], fields.NonProgrssiveMotile.isInvalid],
        ["Immotile", [], fields.Immotile.isInvalid],
        ["TotalProgrssiveMotile", [], fields.TotalProgrssiveMotile.isInvalid],
        ["Appearance", [], fields.Appearance.isInvalid],
        ["Homogenosity", [], fields.Homogenosity.isInvalid],
        ["CompleteSample", [], fields.CompleteSample.isInvalid],
        ["Liquefactiontime", [], fields.Liquefactiontime.isInvalid],
        ["Normal", [], fields.Normal.isInvalid],
        ["Abnormal", [], fields.Abnormal.isInvalid],
        ["Headdefects", [], fields.Headdefects.isInvalid],
        ["MidpieceDefects", [], fields.MidpieceDefects.isInvalid],
        ["TailDefects", [], fields.TailDefects.isInvalid],
        ["NormalProgMotile", [], fields.NormalProgMotile.isInvalid],
        ["ImmatureForms", [], fields.ImmatureForms.isInvalid],
        ["Leucocytes", [], fields.Leucocytes.isInvalid],
        ["Agglutination", [], fields.Agglutination.isInvalid],
        ["Debris", [], fields.Debris.isInvalid],
        ["Diagnosis", [], fields.Diagnosis.isInvalid],
        ["Observations", [], fields.Observations.isInvalid],
        ["Signature", [], fields.Signature.isInvalid],
        ["SemenOrgin", [], fields.SemenOrgin.isInvalid],
        ["Donor", [], fields.Donor.isInvalid],
        ["DonorBloodgroup", [], fields.DonorBloodgroup.isInvalid],
        ["Tank", [], fields.Tank.isInvalid],
        ["Location", [], fields.Location.isInvalid],
        ["Volume1", [], fields.Volume1.isInvalid],
        ["Concentration1", [], fields.Concentration1.isInvalid],
        ["Total1", [], fields.Total1.isInvalid],
        ["ProgressiveMotility1", [], fields.ProgressiveMotility1.isInvalid],
        ["NonProgrssiveMotile1", [], fields.NonProgrssiveMotile1.isInvalid],
        ["Immotile1", [], fields.Immotile1.isInvalid],
        ["TotalProgrssiveMotile1", [], fields.TotalProgrssiveMotile1.isInvalid],
        ["TidNo", [ew.Validators.integer], fields.TidNo.isInvalid],
        ["Color", [], fields.Color.isInvalid],
        ["DoneBy", [], fields.DoneBy.isInvalid],
        ["Method", [], fields.Method.isInvalid],
        ["Abstinence", [], fields.Abstinence.isInvalid],
        ["ProcessedBy", [], fields.ProcessedBy.isInvalid],
        ["InseminationTime", [], fields.InseminationTime.isInvalid],
        ["InseminationBy", [], fields.InseminationBy.isInvalid],
        ["Big", [], fields.Big.isInvalid],
        ["Medium", [], fields.Medium.isInvalid],
        ["Small", [], fields.Small.isInvalid],
        ["NoHalo", [], fields.NoHalo.isInvalid],
        ["Fragmented", [], fields.Fragmented.isInvalid],
        ["NonFragmented", [], fields.NonFragmented.isInvalid],
        ["DFI", [], fields.DFI.isInvalid],
        ["IsueBy", [], fields.IsueBy.isInvalid],
        ["Volume2", [], fields.Volume2.isInvalid],
        ["Concentration2", [], fields.Concentration2.isInvalid],
        ["Total2", [], fields.Total2.isInvalid],
        ["ProgressiveMotility2", [], fields.ProgressiveMotility2.isInvalid],
        ["NonProgrssiveMotile2", [], fields.NonProgrssiveMotile2.isInvalid],
        ["Immotile2", [], fields.Immotile2.isInvalid],
        ["TotalProgrssiveMotile2", [], fields.TotalProgrssiveMotile2.isInvalid],
        ["IssuedBy", [], fields.IssuedBy.isInvalid],
        ["IssuedTo", [], fields.IssuedTo.isInvalid],
        ["MACS", [], fields.MACS.isInvalid],
        ["PREG_TEST_DATE", [ew.Validators.datetime(7)], fields.PREG_TEST_DATE.isInvalid],
        ["y_PREG_TEST_DATE", [ew.Validators.between], false],
        ["SPECIFIC_PROBLEMS", [], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [], fields.IMSC_1.isInvalid],
        ["IMSC_2", [], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [], fields.TIME_FROM_PREP_TO_INSEM.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_semenanalysissearch.setInvalid();
    });

    // Validate form
    fview_semenanalysissearch.validate = function () {
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
    fview_semenanalysissearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_semenanalysissearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_semenanalysissearch.lists.RIDNo = <?= $Page->RIDNo->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.PatientName = <?= $Page->PatientName->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.HusbandName = <?= $Page->HusbandName->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.RequestSample = <?= $Page->RequestSample->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.CollectionType = <?= $Page->CollectionType->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.CollectionMethod = <?= $Page->CollectionMethod->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.Medicationused = <?= $Page->Medicationused->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.DifficultiesinCollection = <?= $Page->DifficultiesinCollection->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.Homogenosity = <?= $Page->Homogenosity->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.CompleteSample = <?= $Page->CompleteSample->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.SemenOrgin = <?= $Page->SemenOrgin->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.Donor = <?= $Page->Donor->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.MACS = <?= $Page->MACS->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.SPECIFIC_PROBLEMS = <?= $Page->SPECIFIC_PROBLEMS->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.LIQUIFACTION_STORAGE = <?= $Page->LIQUIFACTION_STORAGE->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.IUI_PREP_METHOD = <?= $Page->IUI_PREP_METHOD->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.TIME_FROM_TRIGGER = <?= $Page->TIME_FROM_TRIGGER->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.COLLECTION_TO_PREPARATION = <?= $Page->COLLECTION_TO_PREPARATION->toClientList($Page) ?>;
    fview_semenanalysissearch.lists.TIME_FROM_PREP_TO_INSEM = <?= $Page->TIME_FROM_PREP_TO_INSEM->toClientList($Page) ?>;
    loadjs.done("fview_semenanalysissearch");
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
<form name="fview_semenanalysissearch" id="fview_semenanalysissearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_semenanalysis_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <div id="r_PaID" class="form-group row">
        <label for="x_PaID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaID"><?= $Page->PaID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaID" id="z_PaID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaID->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PaID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PaID->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaID->getPlaceHolder()) ?>" value="<?= $Page->PaID->EditValue ?>"<?= $Page->PaID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <div id="r_PaName" class="form-group row">
        <label for="x_PaName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaName"><?= $Page->PaName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaName" id="z_PaName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaName->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PaName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PaName->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaName->getPlaceHolder()) ?>" value="<?= $Page->PaName->EditValue ?>"<?= $Page->PaName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <div id="r_PaMobile" class="form-group row">
        <label for="x_PaMobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaMobile"><?= $Page->PaMobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaMobile" id="z_PaMobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaMobile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PaMobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PaMobile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaMobile->getPlaceHolder()) ?>" value="<?= $Page->PaMobile->EditValue ?>"<?= $Page->PaMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PaMobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerID"><?= $Page->PartnerID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PartnerID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerName"><?= $Page->PartnerName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PartnerName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PartnerMobile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RIDNo"><?= $Page->RIDNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNo" id="z_RIDNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
            <span id="el_view_semenanalysis_RIDNo" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNo"><?= EmptyValue(strval($Page->RIDNo->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RIDNo->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RIDNo->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RIDNo->ReadOnly || $Page->RIDNo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage(false) ?></div>
<?= $Page->RIDNo->Lookup->getParamTag($Page, "p_x_RIDNo") ?>
<input type="hidden" is="selection-list" data-table="view_semenanalysis" data-field="x_RIDNo" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RIDNo->displayValueSeparatorAttribute() ?>" name="x_RIDNo" id="x_RIDNo" value="<?= $Page->RIDNo->AdvancedSearch->SearchValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PatientName"><?= $Page->PatientName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
            <span id="el_view_semenanalysis_PatientName" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->PatientName->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PatientName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PatientName" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->PatientName->getInputTextType() ?>" class="form-control" name="sv_x_PatientName" id="sv_x_PatientName" value="<?= RemoveHtml($Page->PatientName->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>"<?= $Page->PatientName->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientName->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PatientName',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientName->ReadOnly || $Page->PatientName->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_semenanalysis" data-field="x_PatientName" data-input="sv_x_PatientName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientName->displayValueSeparatorAttribute() ?>" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_semenanalysissearch"], function() {
    fview_semenanalysissearch.createAutoSuggest(Object.assign({"id":"x_PatientName","forceSelect":false}, ew.vars.tables.view_semenanalysis.fields.PatientName.autoSuggestOptions));
});
</script>
<?= $Page->PatientName->Lookup->getParamTag($Page, "p_x_PatientName") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <div id="r_HusbandName" class="form-group row">
        <label for="x_HusbandName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_HusbandName"><?= $Page->HusbandName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandName->cellAttributes() ?>>
            <span id="el_view_semenanalysis_HusbandName" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HusbandName"><?= EmptyValue(strval($Page->HusbandName->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->HusbandName->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->HusbandName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->HusbandName->ReadOnly || $Page->HusbandName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HusbandName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->HusbandName->getErrorMessage(false) ?></div>
<?= $Page->HusbandName->Lookup->getParamTag($Page, "p_x_HusbandName") ?>
<input type="hidden" is="selection-list" data-table="view_semenanalysis" data-field="x_HusbandName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->HusbandName->displayValueSeparatorAttribute() ?>" name="x_HusbandName" id="x_HusbandName" value="<?= $Page->HusbandName->AdvancedSearch->SearchValue ?>"<?= $Page->HusbandName->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <div id="r_RequestDr" class="form-group row">
        <label for="x_RequestDr" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestDr"><?= $Page->RequestDr->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RequestDr" id="z_RequestDr" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestDr->cellAttributes() ?>>
            <span id="el_view_semenanalysis_RequestDr" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <div id="r_CollectionDate" class="form-group row">
        <label for="x_CollectionDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionDate"><?= $Page->CollectionDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CollectionDate" id="z_CollectionDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionDate->cellAttributes() ?>>
            <span id="el_view_semenanalysis_CollectionDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_CollectionDate" data-format="7" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysissearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysissearch", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ResultDate"><?= $Page->ResultDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ResultDate" id="z_ResultDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ResultDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ResultDate" data-format="7" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysissearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysissearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <div id="r_RequestSample" class="form-group row">
        <label for="x_RequestSample" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestSample"><?= $Page->RequestSample->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RequestSample" id="z_RequestSample" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestSample->cellAttributes() ?>>
            <span id="el_view_semenanalysis_RequestSample" class="ew-search-field ew-search-field-single">
    <select
        id="x_RequestSample"
        name="x_RequestSample"
        class="form-control ew-select<?= $Page->RequestSample->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_RequestSample"
        data-table="view_semenanalysis"
        data-field="x_RequestSample"
        data-value-separator="<?= $Page->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RequestSample->getPlaceHolder()) ?>"
        <?= $Page->RequestSample->editAttributes() ?>>
        <?= $Page->RequestSample->selectOptionListHtml("x_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->RequestSample->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_RequestSample']"),
        options = { name: "x_RequestSample", selectId: "view_semenanalysis_x_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <div id="r_CollectionType" class="form-group row">
        <label for="x_CollectionType" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionType"><?= $Page->CollectionType->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CollectionType" id="z_CollectionType" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionType->cellAttributes() ?>>
            <span id="el_view_semenanalysis_CollectionType" class="ew-search-field ew-search-field-single">
    <select
        id="x_CollectionType"
        name="x_CollectionType"
        class="form-control ew-select<?= $Page->CollectionType->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CollectionType"
        data-table="view_semenanalysis"
        data-field="x_CollectionType"
        data-value-separator="<?= $Page->CollectionType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CollectionType->getPlaceHolder()) ?>"
        <?= $Page->CollectionType->editAttributes() ?>>
        <?= $Page->CollectionType->selectOptionListHtml("x_CollectionType") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CollectionType->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CollectionType']"),
        options = { name: "x_CollectionType", selectId: "view_semenanalysis_x_CollectionType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CollectionType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CollectionType.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <div id="r_CollectionMethod" class="form-group row">
        <label for="x_CollectionMethod" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionMethod"><?= $Page->CollectionMethod->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CollectionMethod" id="z_CollectionMethod" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionMethod->cellAttributes() ?>>
            <span id="el_view_semenanalysis_CollectionMethod" class="ew-search-field ew-search-field-single">
    <select
        id="x_CollectionMethod"
        name="x_CollectionMethod"
        class="form-control ew-select<?= $Page->CollectionMethod->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CollectionMethod"
        data-table="view_semenanalysis"
        data-field="x_CollectionMethod"
        data-value-separator="<?= $Page->CollectionMethod->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CollectionMethod->getPlaceHolder()) ?>"
        <?= $Page->CollectionMethod->editAttributes() ?>>
        <?= $Page->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CollectionMethod->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CollectionMethod']"),
        options = { name: "x_CollectionMethod", selectId: "view_semenanalysis_x_CollectionMethod", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CollectionMethod.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CollectionMethod.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <div id="r_Medicationused" class="form-group row">
        <label for="x_Medicationused" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Medicationused"><?= $Page->Medicationused->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Medicationused" id="z_Medicationused" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicationused->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Medicationused" class="ew-search-field ew-search-field-single">
    <select
        id="x_Medicationused"
        name="x_Medicationused"
        class="form-control ew-select<?= $Page->Medicationused->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_Medicationused"
        data-table="view_semenanalysis"
        data-field="x_Medicationused"
        data-value-separator="<?= $Page->Medicationused->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Medicationused->getPlaceHolder()) ?>"
        <?= $Page->Medicationused->editAttributes() ?>>
        <?= $Page->Medicationused->selectOptionListHtml("x_Medicationused") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Medicationused->getErrorMessage(false) ?></div>
<?= $Page->Medicationused->Lookup->getParamTag($Page, "p_x_Medicationused") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_Medicationused']"),
        options = { name: "x_Medicationused", selectId: "view_semenanalysis_x_Medicationused", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.Medicationused.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <div id="r_DifficultiesinCollection" class="form-group row">
        <label for="x_DifficultiesinCollection" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DifficultiesinCollection"><?= $Page->DifficultiesinCollection->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DifficultiesinCollection" id="z_DifficultiesinCollection" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
            <span id="el_view_semenanalysis_DifficultiesinCollection" class="ew-search-field ew-search-field-single">
    <select
        id="x_DifficultiesinCollection"
        name="x_DifficultiesinCollection"
        class="form-control ew-select<?= $Page->DifficultiesinCollection->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_DifficultiesinCollection"
        data-table="view_semenanalysis"
        data-field="x_DifficultiesinCollection"
        data-value-separator="<?= $Page->DifficultiesinCollection->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DifficultiesinCollection->getPlaceHolder()) ?>"
        <?= $Page->DifficultiesinCollection->editAttributes() ?>>
        <?= $Page->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DifficultiesinCollection->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_DifficultiesinCollection']"),
        options = { name: "x_DifficultiesinCollection", selectId: "view_semenanalysis_x_DifficultiesinCollection", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.DifficultiesinCollection.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.DifficultiesinCollection.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume"><?= $Page->Volume->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Volume" id="z_Volume" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Volume" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <div id="r_pH" class="form-group row">
        <label for="x_pH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_pH"><?= $Page->pH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_pH" id="z_pH" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pH->cellAttributes() ?>>
            <span id="el_view_semenanalysis_pH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->pH->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_pH" name="x_pH" id="x_pH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pH->getPlaceHolder()) ?>" value="<?= $Page->pH->EditValue ?>"<?= $Page->pH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->pH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <div id="r_Timeofcollection" class="form-group row">
        <label for="x_Timeofcollection" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofcollection"><?= $Page->Timeofcollection->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Timeofcollection" id="z_Timeofcollection" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofcollection->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Timeofcollection" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Timeofcollection->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Page->Timeofcollection->EditValue ?>"<?= $Page->Timeofcollection->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Timeofcollection->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <div id="r_Timeofexamination" class="form-group row">
        <label for="x_Timeofexamination" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofexamination"><?= $Page->Timeofexamination->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Timeofexamination" id="z_Timeofexamination" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofexamination->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Timeofexamination" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Timeofexamination->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Page->Timeofexamination->EditValue ?>"<?= $Page->Timeofexamination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Timeofexamination->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <div id="r_Concentration" class="form-group row">
        <label for="x_Concentration" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration"><?= $Page->Concentration->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Concentration" id="z_Concentration" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Concentration" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Concentration->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration->getPlaceHolder()) ?>" value="<?= $Page->Concentration->EditValue ?>"<?= $Page->Concentration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Concentration->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <div id="r_Total" class="form-group row">
        <label for="x_Total" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total"><?= $Page->Total->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Total" id="z_Total" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Total" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Total->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total->getPlaceHolder()) ?>" value="<?= $Page->Total->EditValue ?>"<?= $Page->Total->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Total->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <div id="r_ProgressiveMotility" class="form-group row">
        <label for="x_ProgressiveMotility" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility"><?= $Page->ProgressiveMotility->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProgressiveMotility" id="z_ProgressiveMotility" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ProgressiveMotility" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProgressiveMotility->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility->EditValue ?>"<?= $Page->ProgressiveMotility->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <div id="r_NonProgrssiveMotile" class="form-group row">
        <label for="x_NonProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile"><?= $Page->NonProgrssiveMotile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NonProgrssiveMotile" id="z_NonProgrssiveMotile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NonProgrssiveMotile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NonProgrssiveMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile->EditValue ?>"<?= $Page->NonProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <div id="r_Immotile" class="form-group row">
        <label for="x_Immotile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile"><?= $Page->Immotile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Immotile" id="z_Immotile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Immotile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Immotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile->getPlaceHolder()) ?>" value="<?= $Page->Immotile->EditValue ?>"<?= $Page->Immotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Immotile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <div id="r_TotalProgrssiveMotile" class="form-group row">
        <label for="x_TotalProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile"><?= $Page->TotalProgrssiveMotile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TotalProgrssiveMotile" id="z_TotalProgrssiveMotile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TotalProgrssiveMotile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TotalProgrssiveMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile->EditValue ?>"<?= $Page->TotalProgrssiveMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <div id="r_Appearance" class="form-group row">
        <label for="x_Appearance" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Appearance"><?= $Page->Appearance->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Appearance" id="z_Appearance" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Appearance->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Appearance" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Appearance->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Appearance->getPlaceHolder()) ?>" value="<?= $Page->Appearance->EditValue ?>"<?= $Page->Appearance->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Appearance->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <div id="r_Homogenosity" class="form-group row">
        <label for="x_Homogenosity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Homogenosity"><?= $Page->Homogenosity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Homogenosity" id="z_Homogenosity" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Homogenosity->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Homogenosity" class="ew-search-field ew-search-field-single">
    <select
        id="x_Homogenosity"
        name="x_Homogenosity"
        class="form-control ew-select<?= $Page->Homogenosity->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_Homogenosity"
        data-table="view_semenanalysis"
        data-field="x_Homogenosity"
        data-value-separator="<?= $Page->Homogenosity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Homogenosity->getPlaceHolder()) ?>"
        <?= $Page->Homogenosity->editAttributes() ?>>
        <?= $Page->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Homogenosity->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_Homogenosity']"),
        options = { name: "x_Homogenosity", selectId: "view_semenanalysis_x_Homogenosity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.Homogenosity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.Homogenosity.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <div id="r_CompleteSample" class="form-group row">
        <label for="x_CompleteSample" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CompleteSample"><?= $Page->CompleteSample->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CompleteSample" id="z_CompleteSample" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CompleteSample->cellAttributes() ?>>
            <span id="el_view_semenanalysis_CompleteSample" class="ew-search-field ew-search-field-single">
    <select
        id="x_CompleteSample"
        name="x_CompleteSample"
        class="form-control ew-select<?= $Page->CompleteSample->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CompleteSample"
        data-table="view_semenanalysis"
        data-field="x_CompleteSample"
        data-value-separator="<?= $Page->CompleteSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CompleteSample->getPlaceHolder()) ?>"
        <?= $Page->CompleteSample->editAttributes() ?>>
        <?= $Page->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->CompleteSample->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CompleteSample']"),
        options = { name: "x_CompleteSample", selectId: "view_semenanalysis_x_CompleteSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CompleteSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CompleteSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <div id="r_Liquefactiontime" class="form-group row">
        <label for="x_Liquefactiontime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Liquefactiontime"><?= $Page->Liquefactiontime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Liquefactiontime" id="z_Liquefactiontime" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Liquefactiontime->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Liquefactiontime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Liquefactiontime->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Page->Liquefactiontime->EditValue ?>"<?= $Page->Liquefactiontime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Liquefactiontime->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <div id="r_Normal" class="form-group row">
        <label for="x_Normal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Normal"><?= $Page->Normal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Normal" id="z_Normal" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Normal->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Normal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Normal->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Normal->getPlaceHolder()) ?>" value="<?= $Page->Normal->EditValue ?>"<?= $Page->Normal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Normal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Abnormal"><?= $Page->Abnormal->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Abnormal" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <div id="r_Headdefects" class="form-group row">
        <label for="x_Headdefects" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Headdefects"><?= $Page->Headdefects->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Headdefects" id="z_Headdefects" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Headdefects->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Headdefects" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Headdefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Headdefects->getPlaceHolder()) ?>" value="<?= $Page->Headdefects->EditValue ?>"<?= $Page->Headdefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Headdefects->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <div id="r_MidpieceDefects" class="form-group row">
        <label for="x_MidpieceDefects" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_MidpieceDefects"><?= $Page->MidpieceDefects->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MidpieceDefects" id="z_MidpieceDefects" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MidpieceDefects->cellAttributes() ?>>
            <span id="el_view_semenanalysis_MidpieceDefects" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MidpieceDefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Page->MidpieceDefects->EditValue ?>"<?= $Page->MidpieceDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MidpieceDefects->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <div id="r_TailDefects" class="form-group row">
        <label for="x_TailDefects" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TailDefects"><?= $Page->TailDefects->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TailDefects" id="z_TailDefects" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TailDefects->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TailDefects" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TailDefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TailDefects->getPlaceHolder()) ?>" value="<?= $Page->TailDefects->EditValue ?>"<?= $Page->TailDefects->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TailDefects->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <div id="r_NormalProgMotile" class="form-group row">
        <label for="x_NormalProgMotile" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NormalProgMotile"><?= $Page->NormalProgMotile->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NormalProgMotile" id="z_NormalProgMotile" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NormalProgMotile->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NormalProgMotile" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NormalProgMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Page->NormalProgMotile->EditValue ?>"<?= $Page->NormalProgMotile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NormalProgMotile->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <div id="r_ImmatureForms" class="form-group row">
        <label for="x_ImmatureForms" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ImmatureForms"><?= $Page->ImmatureForms->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ImmatureForms" id="z_ImmatureForms" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImmatureForms->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ImmatureForms" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ImmatureForms->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Page->ImmatureForms->EditValue ?>"<?= $Page->ImmatureForms->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ImmatureForms->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <div id="r_Leucocytes" class="form-group row">
        <label for="x_Leucocytes" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Leucocytes"><?= $Page->Leucocytes->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Leucocytes" id="z_Leucocytes" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Leucocytes->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Leucocytes" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Leucocytes->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Leucocytes->getPlaceHolder()) ?>" value="<?= $Page->Leucocytes->EditValue ?>"<?= $Page->Leucocytes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Leucocytes->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <div id="r_Agglutination" class="form-group row">
        <label for="x_Agglutination" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Agglutination"><?= $Page->Agglutination->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Agglutination" id="z_Agglutination" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Agglutination->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Agglutination" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Agglutination->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Agglutination->getPlaceHolder()) ?>" value="<?= $Page->Agglutination->EditValue ?>"<?= $Page->Agglutination->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Agglutination->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <div id="r_Debris" class="form-group row">
        <label for="x_Debris" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Debris"><?= $Page->Debris->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Debris" id="z_Debris" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Debris->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Debris" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Debris->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Debris->getPlaceHolder()) ?>" value="<?= $Page->Debris->EditValue ?>"<?= $Page->Debris->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Debris->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <div id="r_Diagnosis" class="form-group row">
        <label for="x_Diagnosis" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Diagnosis"><?= $Page->Diagnosis->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Diagnosis" id="z_Diagnosis" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Diagnosis->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Diagnosis" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Diagnosis->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" placeholder="<?= HtmlEncode($Page->Diagnosis->getPlaceHolder()) ?>" value="<?= $Page->Diagnosis->EditValue ?>"<?= $Page->Diagnosis->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Diagnosis->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <div id="r_Observations" class="form-group row">
        <label for="x_Observations" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Observations"><?= $Page->Observations->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Observations" id="z_Observations" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Observations->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Observations" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Observations->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Observations" name="x_Observations" id="x_Observations" placeholder="<?= HtmlEncode($Page->Observations->getPlaceHolder()) ?>" value="<?= $Page->Observations->EditValue ?>"<?= $Page->Observations->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Observations->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <div id="r_Signature" class="form-group row">
        <label for="x_Signature" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Signature"><?= $Page->Signature->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Signature" id="z_Signature" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Signature->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Signature" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Signature->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Signature->getPlaceHolder()) ?>" value="<?= $Page->Signature->EditValue ?>"<?= $Page->Signature->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Signature->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <div id="r_SemenOrgin" class="form-group row">
        <label for="x_SemenOrgin" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_SemenOrgin"><?= $Page->SemenOrgin->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SemenOrgin" id="z_SemenOrgin" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenOrgin->cellAttributes() ?>>
            <span id="el_view_semenanalysis_SemenOrgin" class="ew-search-field ew-search-field-single">
    <select
        id="x_SemenOrgin"
        name="x_SemenOrgin"
        class="form-control ew-select<?= $Page->SemenOrgin->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_SemenOrgin"
        data-table="view_semenanalysis"
        data-field="x_SemenOrgin"
        data-value-separator="<?= $Page->SemenOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SemenOrgin->getPlaceHolder()) ?>"
        <?= $Page->SemenOrgin->editAttributes() ?>>
        <?= $Page->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SemenOrgin->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_SemenOrgin']"),
        options = { name: "x_SemenOrgin", selectId: "view_semenanalysis_x_SemenOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.SemenOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.SemenOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <div id="r_Donor" class="form-group row">
        <label for="x_Donor" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Donor"><?= $Page->Donor->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Donor" id="z_Donor" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Donor->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Donor" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?= EmptyValue(strval($Page->Donor->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Donor->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Donor->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Donor->ReadOnly || $Page->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Donor->getErrorMessage(false) ?></div>
<?= $Page->Donor->Lookup->getParamTag($Page, "p_x_Donor") ?>
<input type="hidden" is="selection-list" data-table="view_semenanalysis" data-field="x_Donor" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?= $Page->Donor->AdvancedSearch->SearchValue ?>"<?= $Page->Donor->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <div id="r_DonorBloodgroup" class="form-group row">
        <label for="x_DonorBloodgroup" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DonorBloodgroup"><?= $Page->DonorBloodgroup->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DonorBloodgroup" id="z_DonorBloodgroup" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DonorBloodgroup->cellAttributes() ?>>
            <span id="el_view_semenanalysis_DonorBloodgroup" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DonorBloodgroup->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Page->DonorBloodgroup->EditValue ?>"<?= $Page->DonorBloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DonorBloodgroup->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Tank"><?= $Page->Tank->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Tank" id="z_Tank" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Tank" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <div id="r_Location" class="form-group row">
        <label for="x_Location" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Location"><?= $Page->Location->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Location" id="z_Location" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Location->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Location" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Location->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Location->getPlaceHolder()) ?>" value="<?= $Page->Location->EditValue ?>"<?= $Page->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Location->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <div id="r_Volume1" class="form-group row">
        <label for="x_Volume1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume1"><?= $Page->Volume1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Volume1" id="z_Volume1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Volume1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Volume1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume1->getPlaceHolder()) ?>" value="<?= $Page->Volume1->EditValue ?>"<?= $Page->Volume1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Volume1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <div id="r_Concentration1" class="form-group row">
        <label for="x_Concentration1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration1"><?= $Page->Concentration1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Concentration1" id="z_Concentration1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Concentration1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Concentration1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration1->getPlaceHolder()) ?>" value="<?= $Page->Concentration1->EditValue ?>"<?= $Page->Concentration1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Concentration1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <div id="r_Total1" class="form-group row">
        <label for="x_Total1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total1"><?= $Page->Total1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Total1" id="z_Total1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Total1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Total1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total1->getPlaceHolder()) ?>" value="<?= $Page->Total1->EditValue ?>"<?= $Page->Total1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Total1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <div id="r_ProgressiveMotility1" class="form-group row">
        <label for="x_ProgressiveMotility1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility1"><?= $Page->ProgressiveMotility1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProgressiveMotility1" id="z_ProgressiveMotility1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ProgressiveMotility1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProgressiveMotility1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility1->EditValue ?>"<?= $Page->ProgressiveMotility1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <div id="r_NonProgrssiveMotile1" class="form-group row">
        <label for="x_NonProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile1"><?= $Page->NonProgrssiveMotile1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NonProgrssiveMotile1" id="z_NonProgrssiveMotile1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NonProgrssiveMotile1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NonProgrssiveMotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile1->EditValue ?>"<?= $Page->NonProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <div id="r_Immotile1" class="form-group row">
        <label for="x_Immotile1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile1"><?= $Page->Immotile1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Immotile1" id="z_Immotile1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Immotile1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Immotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile1->getPlaceHolder()) ?>" value="<?= $Page->Immotile1->EditValue ?>"<?= $Page->Immotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Immotile1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <div id="r_TotalProgrssiveMotile1" class="form-group row">
        <label for="x_TotalProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile1"><?= $Page->TotalProgrssiveMotile1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TotalProgrssiveMotile1" id="z_TotalProgrssiveMotile1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TotalProgrssiveMotile1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile1->EditValue ?>"<?= $Page->TotalProgrssiveMotile1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TidNo"><?= $Page->TidNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TidNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
    <div id="r_Color" class="form-group row">
        <label for="x_Color" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Color"><?= $Page->Color->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Color" id="z_Color" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Color->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Color" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Color->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Color->getPlaceHolder()) ?>" value="<?= $Page->Color->EditValue ?>"<?= $Page->Color->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Color->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <div id="r_DoneBy" class="form-group row">
        <label for="x_DoneBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DoneBy"><?= $Page->DoneBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoneBy" id="z_DoneBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoneBy->cellAttributes() ?>>
            <span id="el_view_semenanalysis_DoneBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DoneBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoneBy->getPlaceHolder()) ?>" value="<?= $Page->DoneBy->EditValue ?>"<?= $Page->DoneBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoneBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label for="x_Method" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Method"><?= $Page->Method->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Method" id="z_Method" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Method" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <div id="r_Abstinence" class="form-group row">
        <label for="x_Abstinence" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Abstinence"><?= $Page->Abstinence->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abstinence" id="z_Abstinence" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abstinence->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Abstinence" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Abstinence->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abstinence->getPlaceHolder()) ?>" value="<?= $Page->Abstinence->EditValue ?>"<?= $Page->Abstinence->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abstinence->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <div id="r_ProcessedBy" class="form-group row">
        <label for="x_ProcessedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProcessedBy"><?= $Page->ProcessedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProcessedBy" id="z_ProcessedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcessedBy->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ProcessedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProcessedBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Page->ProcessedBy->EditValue ?>"<?= $Page->ProcessedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProcessedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <div id="r_InseminationTime" class="form-group row">
        <label for="x_InseminationTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationTime"><?= $Page->InseminationTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_InseminationTime" id="z_InseminationTime" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationTime->cellAttributes() ?>>
            <span id="el_view_semenanalysis_InseminationTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->InseminationTime->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationTime->getPlaceHolder()) ?>" value="<?= $Page->InseminationTime->EditValue ?>"<?= $Page->InseminationTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminationTime->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <div id="r_InseminationBy" class="form-group row">
        <label for="x_InseminationBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationBy"><?= $Page->InseminationBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_InseminationBy" id="z_InseminationBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationBy->cellAttributes() ?>>
            <span id="el_view_semenanalysis_InseminationBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->InseminationBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationBy->getPlaceHolder()) ?>" value="<?= $Page->InseminationBy->EditValue ?>"<?= $Page->InseminationBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->InseminationBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <div id="r_Big" class="form-group row">
        <label for="x_Big" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Big"><?= $Page->Big->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Big" id="z_Big" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Big->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Big" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Big->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Big->getPlaceHolder()) ?>" value="<?= $Page->Big->EditValue ?>"<?= $Page->Big->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Big->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <div id="r_Medium" class="form-group row">
        <label for="x_Medium" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Medium"><?= $Page->Medium->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Medium" id="z_Medium" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medium->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Medium" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Medium->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medium->getPlaceHolder()) ?>" value="<?= $Page->Medium->EditValue ?>"<?= $Page->Medium->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Medium->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <div id="r_Small" class="form-group row">
        <label for="x_Small" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Small"><?= $Page->Small->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Small" id="z_Small" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Small->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Small" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Small->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Small->getPlaceHolder()) ?>" value="<?= $Page->Small->EditValue ?>"<?= $Page->Small->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Small->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <div id="r_NoHalo" class="form-group row">
        <label for="x_NoHalo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NoHalo"><?= $Page->NoHalo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoHalo" id="z_NoHalo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHalo->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NoHalo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NoHalo->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHalo->getPlaceHolder()) ?>" value="<?= $Page->NoHalo->EditValue ?>"<?= $Page->NoHalo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoHalo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <div id="r_Fragmented" class="form-group row">
        <label for="x_Fragmented" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Fragmented"><?= $Page->Fragmented->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Fragmented" id="z_Fragmented" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fragmented->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Fragmented" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Fragmented->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fragmented->getPlaceHolder()) ?>" value="<?= $Page->Fragmented->EditValue ?>"<?= $Page->Fragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Fragmented->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <div id="r_NonFragmented" class="form-group row">
        <label for="x_NonFragmented" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonFragmented"><?= $Page->NonFragmented->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NonFragmented" id="z_NonFragmented" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonFragmented->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NonFragmented" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NonFragmented->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonFragmented->getPlaceHolder()) ?>" value="<?= $Page->NonFragmented->EditValue ?>"<?= $Page->NonFragmented->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NonFragmented->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <div id="r_DFI" class="form-group row">
        <label for="x_DFI" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DFI"><?= $Page->DFI->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DFI" id="z_DFI" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DFI->cellAttributes() ?>>
            <span id="el_view_semenanalysis_DFI" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DFI->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DFI->getPlaceHolder()) ?>" value="<?= $Page->DFI->EditValue ?>"<?= $Page->DFI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DFI->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <div id="r_IsueBy" class="form-group row">
        <label for="x_IsueBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IsueBy"><?= $Page->IsueBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IsueBy" id="z_IsueBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsueBy->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IsueBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IsueBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IsueBy->getPlaceHolder()) ?>" value="<?= $Page->IsueBy->EditValue ?>"<?= $Page->IsueBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IsueBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <div id="r_Volume2" class="form-group row">
        <label for="x_Volume2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume2"><?= $Page->Volume2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Volume2" id="z_Volume2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Volume2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Volume2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume2->getPlaceHolder()) ?>" value="<?= $Page->Volume2->EditValue ?>"<?= $Page->Volume2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Volume2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <div id="r_Concentration2" class="form-group row">
        <label for="x_Concentration2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration2"><?= $Page->Concentration2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Concentration2" id="z_Concentration2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Concentration2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Concentration2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration2->getPlaceHolder()) ?>" value="<?= $Page->Concentration2->EditValue ?>"<?= $Page->Concentration2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Concentration2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <div id="r_Total2" class="form-group row">
        <label for="x_Total2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total2"><?= $Page->Total2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Total2" id="z_Total2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Total2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Total2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total2->getPlaceHolder()) ?>" value="<?= $Page->Total2->EditValue ?>"<?= $Page->Total2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Total2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <div id="r_ProgressiveMotility2" class="form-group row">
        <label for="x_ProgressiveMotility2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility2"><?= $Page->ProgressiveMotility2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProgressiveMotility2" id="z_ProgressiveMotility2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_ProgressiveMotility2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProgressiveMotility2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility2->EditValue ?>"<?= $Page->ProgressiveMotility2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <div id="r_NonProgrssiveMotile2" class="form-group row">
        <label for="x_NonProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile2"><?= $Page->NonProgrssiveMotile2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NonProgrssiveMotile2" id="z_NonProgrssiveMotile2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_NonProgrssiveMotile2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NonProgrssiveMotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile2->EditValue ?>"<?= $Page->NonProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <div id="r_Immotile2" class="form-group row">
        <label for="x_Immotile2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile2"><?= $Page->Immotile2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Immotile2" id="z_Immotile2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_Immotile2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Immotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile2->getPlaceHolder()) ?>" value="<?= $Page->Immotile2->EditValue ?>"<?= $Page->Immotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Immotile2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <div id="r_TotalProgrssiveMotile2" class="form-group row">
        <label for="x_TotalProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile2"><?= $Page->TotalProgrssiveMotile2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TotalProgrssiveMotile2" id="z_TotalProgrssiveMotile2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TotalProgrssiveMotile2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile2->EditValue ?>"<?= $Page->TotalProgrssiveMotile2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <div id="r_IssuedBy" class="form-group row">
        <label for="x_IssuedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedBy"><?= $Page->IssuedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IssuedBy" id="z_IssuedBy" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedBy->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IssuedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <div id="r_IssuedTo" class="form-group row">
        <label for="x_IssuedTo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedTo"><?= $Page->IssuedTo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IssuedTo" id="z_IssuedTo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedTo->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IssuedTo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IssuedTo->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>" value="<?= $Page->IssuedTo->EditValue ?>"<?= $Page->IssuedTo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <div id="r_MACS" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_MACS"><?= $Page->MACS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MACS" id="z_MACS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MACS->cellAttributes() ?>>
            <span id="el_view_semenanalysis_MACS" class="ew-search-field ew-search-field-single">
<template id="tp_x_MACS">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_semenanalysis" data-field="x_MACS" name="x_MACS" id="x_MACS"<?= $Page->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MACS[]"
    name="x_MACS[]"
    value="<?= HtmlEncode($Page->MACS->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_MACS"
    data-target="dsl_x_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MACS->isInvalidClass() ?>"
    data-table="view_semenanalysis"
    data-field="x_MACS"
    data-value-separator="<?= $Page->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Page->MACS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MACS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <div id="r_PREG_TEST_DATE" class="form-group row">
        <label for="x_PREG_TEST_DATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_semenanalysis_PREG_TEST_DATE" class="ew-search-field">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysissearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysissearch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_semenanalysis_PREG_TEST_DATE" class="ew-search-field2 d-none">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue2 ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysissearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysissearch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <div id="r_SPECIFIC_PROBLEMS" class="form-group row">
        <label for="x_SPECIFIC_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SPECIFIC_PROBLEMS" id="z_SPECIFIC_PROBLEMS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
            <span id="el_view_semenanalysis_SPECIFIC_PROBLEMS" class="ew-search-field ew-search-field-single">
    <select
        id="x_SPECIFIC_PROBLEMS"
        name="x_SPECIFIC_PROBLEMS"
        class="form-control ew-select<?= $Page->SPECIFIC_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_SPECIFIC_PROBLEMS"
        data-table="view_semenanalysis"
        data-field="x_SPECIFIC_PROBLEMS"
        data-value-separator="<?= $Page->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Page->SPECIFIC_PROBLEMS->editAttributes() ?>>
        <?= $Page->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SPECIFIC_PROBLEMS->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_SPECIFIC_PROBLEMS']"),
        options = { name: "x_SPECIFIC_PROBLEMS", selectId: "view_semenanalysis_x_SPECIFIC_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.SPECIFIC_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.SPECIFIC_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <div id="r_IMSC_1" class="form-group row">
        <label for="x_IMSC_1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_1"><?= $Page->IMSC_1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IMSC_1" id="z_IMSC_1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_1->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IMSC_1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IMSC_1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_1->getPlaceHolder()) ?>" value="<?= $Page->IMSC_1->EditValue ?>"<?= $Page->IMSC_1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IMSC_1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <div id="r_IMSC_2" class="form-group row">
        <label for="x_IMSC_2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_2"><?= $Page->IMSC_2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IMSC_2" id="z_IMSC_2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_2->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IMSC_2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IMSC_2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_2->getPlaceHolder()) ?>" value="<?= $Page->IMSC_2->EditValue ?>"<?= $Page->IMSC_2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IMSC_2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <div id="r_LIQUIFACTION_STORAGE" class="form-group row">
        <label for="x_LIQUIFACTION_STORAGE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LIQUIFACTION_STORAGE" id="z_LIQUIFACTION_STORAGE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
            <span id="el_view_semenanalysis_LIQUIFACTION_STORAGE" class="ew-search-field ew-search-field-single">
    <select
        id="x_LIQUIFACTION_STORAGE"
        name="x_LIQUIFACTION_STORAGE"
        class="form-control ew-select<?= $Page->LIQUIFACTION_STORAGE->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_LIQUIFACTION_STORAGE"
        data-table="view_semenanalysis"
        data-field="x_LIQUIFACTION_STORAGE"
        data-value-separator="<?= $Page->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>"
        <?= $Page->LIQUIFACTION_STORAGE->editAttributes() ?>>
        <?= $Page->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->LIQUIFACTION_STORAGE->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_LIQUIFACTION_STORAGE']"),
        options = { name: "x_LIQUIFACTION_STORAGE", selectId: "view_semenanalysis_x_LIQUIFACTION_STORAGE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.LIQUIFACTION_STORAGE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.LIQUIFACTION_STORAGE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <div id="r_IUI_PREP_METHOD" class="form-group row">
        <label for="x_IUI_PREP_METHOD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IUI_PREP_METHOD" id="z_IUI_PREP_METHOD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
            <span id="el_view_semenanalysis_IUI_PREP_METHOD" class="ew-search-field ew-search-field-single">
    <select
        id="x_IUI_PREP_METHOD"
        name="x_IUI_PREP_METHOD"
        class="form-control ew-select<?= $Page->IUI_PREP_METHOD->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_IUI_PREP_METHOD"
        data-table="view_semenanalysis"
        data-field="x_IUI_PREP_METHOD"
        data-value-separator="<?= $Page->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IUI_PREP_METHOD->getPlaceHolder()) ?>"
        <?= $Page->IUI_PREP_METHOD->editAttributes() ?>>
        <?= $Page->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->IUI_PREP_METHOD->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_IUI_PREP_METHOD']"),
        options = { name: "x_IUI_PREP_METHOD", selectId: "view_semenanalysis_x_IUI_PREP_METHOD", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.IUI_PREP_METHOD.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.IUI_PREP_METHOD.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <div id="r_TIME_FROM_TRIGGER" class="form-group row">
        <label for="x_TIME_FROM_TRIGGER" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TIME_FROM_TRIGGER" id="z_TIME_FROM_TRIGGER" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TIME_FROM_TRIGGER" class="ew-search-field ew-search-field-single">
    <select
        id="x_TIME_FROM_TRIGGER"
        name="x_TIME_FROM_TRIGGER"
        class="form-control ew-select<?= $Page->TIME_FROM_TRIGGER->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_TIME_FROM_TRIGGER"
        data-table="view_semenanalysis"
        data-field="x_TIME_FROM_TRIGGER"
        data-value-separator="<?= $Page->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TIME_FROM_TRIGGER->getPlaceHolder()) ?>"
        <?= $Page->TIME_FROM_TRIGGER->editAttributes() ?>>
        <?= $Page->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TIME_FROM_TRIGGER->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_TIME_FROM_TRIGGER']"),
        options = { name: "x_TIME_FROM_TRIGGER", selectId: "view_semenanalysis_x_TIME_FROM_TRIGGER", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.TIME_FROM_TRIGGER.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.TIME_FROM_TRIGGER.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
        <label for="x_COLLECTION_TO_PREPARATION" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COLLECTION_TO_PREPARATION" id="z_COLLECTION_TO_PREPARATION" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
            <span id="el_view_semenanalysis_COLLECTION_TO_PREPARATION" class="ew-search-field ew-search-field-single">
    <select
        id="x_COLLECTION_TO_PREPARATION"
        name="x_COLLECTION_TO_PREPARATION"
        class="form-control ew-select<?= $Page->COLLECTION_TO_PREPARATION->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_COLLECTION_TO_PREPARATION"
        data-table="view_semenanalysis"
        data-field="x_COLLECTION_TO_PREPARATION"
        data-value-separator="<?= $Page->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>"
        <?= $Page->COLLECTION_TO_PREPARATION->editAttributes() ?>>
        <?= $Page->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->COLLECTION_TO_PREPARATION->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_COLLECTION_TO_PREPARATION']"),
        options = { name: "x_COLLECTION_TO_PREPARATION", selectId: "view_semenanalysis_x_COLLECTION_TO_PREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.COLLECTION_TO_PREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.COLLECTION_TO_PREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
        <label for="x_TIME_FROM_PREP_TO_INSEM" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TIME_FROM_PREP_TO_INSEM" id="z_TIME_FROM_PREP_TO_INSEM" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
            <span id="el_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" class="ew-search-field ew-search-field-single">
    <select
        id="x_TIME_FROM_PREP_TO_INSEM"
        name="x_TIME_FROM_PREP_TO_INSEM"
        class="form-control ew-select<?= $Page->TIME_FROM_PREP_TO_INSEM->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM"
        data-table="view_semenanalysis"
        data-field="x_TIME_FROM_PREP_TO_INSEM"
        data-value-separator="<?= $Page->TIME_FROM_PREP_TO_INSEM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>"
        <?= $Page->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
        <?= $Page->TIME_FROM_PREP_TO_INSEM->selectOptionListHtml("x_TIME_FROM_PREP_TO_INSEM") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TIME_FROM_PREP_TO_INSEM->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM']"),
        options = { name: "x_TIME_FROM_PREP_TO_INSEM", selectId: "view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.TIME_FROM_PREP_TO_INSEM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.TIME_FROM_PREP_TO_INSEM.selectOptions);
    ew.createSelect(options);
});
</script>
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
    ew.addEventHandlers("view_semenanalysis");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
