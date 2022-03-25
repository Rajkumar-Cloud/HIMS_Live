<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIuiExcelSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_iui_excelsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_iui_excelsearch = currentAdvancedSearchForm = new ew.Form("fview_iui_excelsearch", "search");
    <?php } else { ?>
    fview_iui_excelsearch = currentForm = new ew.Form("fview_iui_excelsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_iui_excel")) ?>,
        fields = currentTable.fields;
    fview_iui_excelsearch.addFields([
        ["NAME", [], fields.NAME.isInvalid],
        ["HUSBANDNAME", [], fields.HUSBANDNAME.isInvalid],
        ["CoupleID", [], fields.CoupleID.isInvalid],
        ["AGEWIFE", [], fields.AGEWIFE.isInvalid],
        ["AGEHUSBAND", [], fields.AGEHUSBAND.isInvalid],
        ["ANXIOUSTOCONCEIVEFOR", [], fields.ANXIOUSTOCONCEIVEFOR.isInvalid],
        ["AMHNGML", [], fields.AMHNGML.isInvalid],
        ["TUBAL_PATENCY", [], fields.TUBAL_PATENCY.isInvalid],
        ["HSG", [], fields.HSG.isInvalid],
        ["DHL", [], fields.DHL.isInvalid],
        ["UTERINE_PROBLEMS", [], fields.UTERINE_PROBLEMS.isInvalid],
        ["W_COMORBIDS", [], fields.W_COMORBIDS.isInvalid],
        ["H_COMORBIDS", [], fields.H_COMORBIDS.isInvalid],
        ["SEXUAL_DYSFUNCTION", [], fields.SEXUAL_DYSFUNCTION.isInvalid],
        ["PREVIUI", [], fields.PREVIUI.isInvalid],
        ["PREV_IVF", [], fields.PREV_IVF.isInvalid],
        ["TABLETS", [], fields.TABLETS.isInvalid],
        ["INJTYPE", [], fields.INJTYPE.isInvalid],
        ["LMP", [ew.Validators.datetime(0)], fields.LMP.isInvalid],
        ["TRIGGERR", [], fields.TRIGGERR.isInvalid],
        ["TRIGGERDATE", [ew.Validators.datetime(0)], fields.TRIGGERDATE.isInvalid],
        ["FOLLICLE_STATUS", [], fields.FOLLICLE_STATUS.isInvalid],
        ["NUMBER_OF_IUI", [], fields.NUMBER_OF_IUI.isInvalid],
        ["PROCEDURE", [], fields.PROCEDURE.isInvalid],
        ["LUTEAL_SUPPORT", [], fields.LUTEAL_SUPPORT.isInvalid],
        ["HDSAMPLE", [], fields.HDSAMPLE.isInvalid],
        ["DONORID", [ew.Validators.integer], fields.DONORID.isInvalid],
        ["PREG_TEST_DATE", [ew.Validators.datetime(7)], fields.PREG_TEST_DATE.isInvalid],
        ["y_PREG_TEST_DATE", [ew.Validators.between], false],
        ["COLLECTIONMETHOD", [], fields.COLLECTIONMETHOD.isInvalid],
        ["SAMPLESOURCE", [], fields.SAMPLESOURCE.isInvalid],
        ["SPECIFIC_PROBLEMS", [], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [], fields.IMSC_1.isInvalid],
        ["IMSC_2", [], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [], fields.TIME_FROM_PREP_TO_INSEM.isInvalid],
        ["SPECIFIC_MATERNAL_PROBLEMS", [], fields.SPECIFIC_MATERNAL_PROBLEMS.isInvalid],
        ["RESULTS", [], fields.RESULTS.isInvalid],
        ["ONGOING_PREG", [], fields.ONGOING_PREG.isInvalid],
        ["EDD_Date", [ew.Validators.datetime(0)], fields.EDD_Date.isInvalid],
        ["y_EDD_Date", [ew.Validators.between], false]
    ]);

    // Set invalid fields
    $(function() {
        fview_iui_excelsearch.setInvalid();
    });

    // Validate form
    fview_iui_excelsearch.validate = function () {
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
    fview_iui_excelsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_iui_excelsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fview_iui_excelsearch");
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
<form name="fview_iui_excelsearch" id="fview_iui_excelsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_iui_excel">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->NAME->Visible) { // NAME ?>
    <div id="r_NAME" class="form-group row">
        <label for="x_NAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_NAME"><?= $Page->NAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NAME" id="z_NAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NAME->cellAttributes() ?>>
            <span id="el_view_iui_excel_NAME" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NAME->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->NAME->getPlaceHolder()) ?>" value="<?= $Page->NAME->EditValue ?>"<?= $Page->NAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NAME->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HUSBANDNAME->Visible) { // HUSBAND NAME ?>
    <div id="r_HUSBANDNAME" class="form-group row">
        <label for="x_HUSBANDNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_HUSBANDNAME"><?= $Page->HUSBANDNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HUSBANDNAME" id="z_HUSBANDNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HUSBANDNAME->cellAttributes() ?>>
            <span id="el_view_iui_excel_HUSBANDNAME" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HUSBANDNAME->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_HUSBANDNAME" name="x_HUSBANDNAME" id="x_HUSBANDNAME" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HUSBANDNAME->getPlaceHolder()) ?>" value="<?= $Page->HUSBANDNAME->EditValue ?>"<?= $Page->HUSBANDNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HUSBANDNAME->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_CoupleID"><?= $Page->CoupleID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
            <span id="el_view_iui_excel_CoupleID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AGEWIFE->Visible) { // AGE  - WIFE ?>
    <div id="r_AGEWIFE" class="form-group row">
        <label for="x_AGEWIFE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_AGEWIFE"><?= $Page->AGEWIFE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AGEWIFE" id="z_AGEWIFE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AGEWIFE->cellAttributes() ?>>
            <span id="el_view_iui_excel_AGEWIFE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AGEWIFE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_AGEWIFE" name="x_AGEWIFE" id="x_AGEWIFE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AGEWIFE->getPlaceHolder()) ?>" value="<?= $Page->AGEWIFE->EditValue ?>"<?= $Page->AGEWIFE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AGEWIFE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AGEHUSBAND->Visible) { // AGE- HUSBAND ?>
    <div id="r_AGEHUSBAND" class="form-group row">
        <label for="x_AGEHUSBAND" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_AGEHUSBAND"><?= $Page->AGEHUSBAND->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AGEHUSBAND" id="z_AGEHUSBAND" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AGEHUSBAND->cellAttributes() ?>>
            <span id="el_view_iui_excel_AGEHUSBAND" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AGEHUSBAND->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_AGEHUSBAND" name="x_AGEHUSBAND" id="x_AGEHUSBAND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AGEHUSBAND->getPlaceHolder()) ?>" value="<?= $Page->AGEHUSBAND->EditValue ?>"<?= $Page->AGEHUSBAND->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AGEHUSBAND->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ANXIOUSTOCONCEIVEFOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
    <div id="r_ANXIOUSTOCONCEIVEFOR" class="form-group row">
        <label for="x_ANXIOUSTOCONCEIVEFOR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_ANXIOUSTOCONCEIVEFOR"><?= $Page->ANXIOUSTOCONCEIVEFOR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ANXIOUSTOCONCEIVEFOR" id="z_ANXIOUSTOCONCEIVEFOR" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANXIOUSTOCONCEIVEFOR->cellAttributes() ?>>
            <span id="el_view_iui_excel_ANXIOUSTOCONCEIVEFOR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ANXIOUSTOCONCEIVEFOR->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_ANXIOUSTOCONCEIVEFOR" name="x_ANXIOUSTOCONCEIVEFOR" id="x_ANXIOUSTOCONCEIVEFOR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANXIOUSTOCONCEIVEFOR->getPlaceHolder()) ?>" value="<?= $Page->ANXIOUSTOCONCEIVEFOR->EditValue ?>"<?= $Page->ANXIOUSTOCONCEIVEFOR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ANXIOUSTOCONCEIVEFOR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->AMHNGML->Visible) { // AMH ( NG/ML) ?>
    <div id="r_AMHNGML" class="form-group row">
        <label for="x_AMHNGML" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_AMHNGML"><?= $Page->AMHNGML->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AMHNGML" id="z_AMHNGML" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AMHNGML->cellAttributes() ?>>
            <span id="el_view_iui_excel_AMHNGML" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->AMHNGML->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_AMHNGML" name="x_AMHNGML" id="x_AMHNGML" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AMHNGML->getPlaceHolder()) ?>" value="<?= $Page->AMHNGML->EditValue ?>"<?= $Page->AMHNGML->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AMHNGML->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <div id="r_TUBAL_PATENCY" class="form-group row">
        <label for="x_TUBAL_PATENCY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TUBAL_PATENCY"><?= $Page->TUBAL_PATENCY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TUBAL_PATENCY" id="z_TUBAL_PATENCY" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
            <span id="el_view_iui_excel_TUBAL_PATENCY" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TUBAL_PATENCY->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TUBAL_PATENCY" name="x_TUBAL_PATENCY" id="x_TUBAL_PATENCY" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TUBAL_PATENCY->getPlaceHolder()) ?>" value="<?= $Page->TUBAL_PATENCY->EditValue ?>"<?= $Page->TUBAL_PATENCY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TUBAL_PATENCY->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <div id="r_HSG" class="form-group row">
        <label for="x_HSG" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_HSG"><?= $Page->HSG->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HSG" id="z_HSG" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSG->cellAttributes() ?>>
            <span id="el_view_iui_excel_HSG" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HSG->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_HSG" name="x_HSG" id="x_HSG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSG->getPlaceHolder()) ?>" value="<?= $Page->HSG->EditValue ?>"<?= $Page->HSG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSG->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <div id="r_DHL" class="form-group row">
        <label for="x_DHL" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_DHL"><?= $Page->DHL->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DHL" id="z_DHL" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DHL->cellAttributes() ?>>
            <span id="el_view_iui_excel_DHL" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DHL->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_DHL" name="x_DHL" id="x_DHL" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DHL->getPlaceHolder()) ?>" value="<?= $Page->DHL->EditValue ?>"<?= $Page->DHL->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DHL->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <div id="r_UTERINE_PROBLEMS" class="form-group row">
        <label for="x_UTERINE_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_UTERINE_PROBLEMS"><?= $Page->UTERINE_PROBLEMS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UTERINE_PROBLEMS" id="z_UTERINE_PROBLEMS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
            <span id="el_view_iui_excel_UTERINE_PROBLEMS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UTERINE_PROBLEMS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_UTERINE_PROBLEMS" name="x_UTERINE_PROBLEMS" id="x_UTERINE_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UTERINE_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->UTERINE_PROBLEMS->EditValue ?>"<?= $Page->UTERINE_PROBLEMS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UTERINE_PROBLEMS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <div id="r_W_COMORBIDS" class="form-group row">
        <label for="x_W_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_W_COMORBIDS"><?= $Page->W_COMORBIDS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_W_COMORBIDS" id="z_W_COMORBIDS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->W_COMORBIDS->cellAttributes() ?>>
            <span id="el_view_iui_excel_W_COMORBIDS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->W_COMORBIDS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_W_COMORBIDS" name="x_W_COMORBIDS" id="x_W_COMORBIDS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->W_COMORBIDS->getPlaceHolder()) ?>" value="<?= $Page->W_COMORBIDS->EditValue ?>"<?= $Page->W_COMORBIDS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->W_COMORBIDS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <div id="r_H_COMORBIDS" class="form-group row">
        <label for="x_H_COMORBIDS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_H_COMORBIDS"><?= $Page->H_COMORBIDS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_H_COMORBIDS" id="z_H_COMORBIDS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->H_COMORBIDS->cellAttributes() ?>>
            <span id="el_view_iui_excel_H_COMORBIDS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->H_COMORBIDS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_H_COMORBIDS" name="x_H_COMORBIDS" id="x_H_COMORBIDS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->H_COMORBIDS->getPlaceHolder()) ?>" value="<?= $Page->H_COMORBIDS->EditValue ?>"<?= $Page->H_COMORBIDS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->H_COMORBIDS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <div id="r_SEXUAL_DYSFUNCTION" class="form-group row">
        <label for="x_SEXUAL_DYSFUNCTION" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_SEXUAL_DYSFUNCTION"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SEXUAL_DYSFUNCTION" id="z_SEXUAL_DYSFUNCTION" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
            <span id="el_view_iui_excel_SEXUAL_DYSFUNCTION" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SEXUAL_DYSFUNCTION->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_SEXUAL_DYSFUNCTION" name="x_SEXUAL_DYSFUNCTION" id="x_SEXUAL_DYSFUNCTION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEXUAL_DYSFUNCTION->getPlaceHolder()) ?>" value="<?= $Page->SEXUAL_DYSFUNCTION->EditValue ?>"<?= $Page->SEXUAL_DYSFUNCTION->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SEXUAL_DYSFUNCTION->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PREVIUI->Visible) { // PREV IUI ?>
    <div id="r_PREVIUI" class="form-group row">
        <label for="x_PREVIUI" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREVIUI"><?= $Page->PREVIUI->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PREVIUI" id="z_PREVIUI" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PREVIUI->cellAttributes() ?>>
            <span id="el_view_iui_excel_PREVIUI" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PREVIUI->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREVIUI" name="x_PREVIUI" id="x_PREVIUI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PREVIUI->getPlaceHolder()) ?>" value="<?= $Page->PREVIUI->EditValue ?>"<?= $Page->PREVIUI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREVIUI->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PREV_IVF->Visible) { // PREV_IVF ?>
    <div id="r_PREV_IVF" class="form-group row">
        <label for="x_PREV_IVF" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREV_IVF"><?= $Page->PREV_IVF->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PREV_IVF" id="z_PREV_IVF" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PREV_IVF->cellAttributes() ?>>
            <span id="el_view_iui_excel_PREV_IVF" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PREV_IVF->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREV_IVF" name="x_PREV_IVF" id="x_PREV_IVF" size="35" placeholder="<?= HtmlEncode($Page->PREV_IVF->getPlaceHolder()) ?>" value="<?= $Page->PREV_IVF->EditValue ?>"<?= $Page->PREV_IVF->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREV_IVF->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <div id="r_TABLETS" class="form-group row">
        <label for="x_TABLETS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TABLETS"><?= $Page->TABLETS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TABLETS" id="z_TABLETS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TABLETS->cellAttributes() ?>>
            <span id="el_view_iui_excel_TABLETS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TABLETS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TABLETS" name="x_TABLETS" id="x_TABLETS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TABLETS->getPlaceHolder()) ?>" value="<?= $Page->TABLETS->EditValue ?>"<?= $Page->TABLETS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TABLETS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <div id="r_INJTYPE" class="form-group row">
        <label for="x_INJTYPE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_INJTYPE"><?= $Page->INJTYPE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_INJTYPE" id="z_INJTYPE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJTYPE->cellAttributes() ?>>
            <span id="el_view_iui_excel_INJTYPE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->INJTYPE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_INJTYPE" name="x_INJTYPE" id="x_INJTYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJTYPE->getPlaceHolder()) ?>" value="<?= $Page->INJTYPE->EditValue ?>"<?= $Page->INJTYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->INJTYPE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_LMP"><?= $Page->LMP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LMP" id="z_LMP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
            <span id="el_view_iui_excel_LMP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage(false) ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <div id="r_TRIGGERR" class="form-group row">
        <label for="x_TRIGGERR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TRIGGERR"><?= $Page->TRIGGERR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TRIGGERR" id="z_TRIGGERR" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERR->cellAttributes() ?>>
            <span id="el_view_iui_excel_TRIGGERR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TRIGGERR->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TRIGGERR" name="x_TRIGGERR" id="x_TRIGGERR" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->TRIGGERR->getPlaceHolder()) ?>" value="<?= $Page->TRIGGERR->EditValue ?>"<?= $Page->TRIGGERR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TRIGGERR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <div id="r_TRIGGERDATE" class="form-group row">
        <label for="x_TRIGGERDATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TRIGGERDATE"><?= $Page->TRIGGERDATE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TRIGGERDATE" id="z_TRIGGERDATE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TRIGGERDATE->cellAttributes() ?>>
            <span id="el_view_iui_excel_TRIGGERDATE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TRIGGERDATE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TRIGGERDATE" name="x_TRIGGERDATE" id="x_TRIGGERDATE" placeholder="<?= HtmlEncode($Page->TRIGGERDATE->getPlaceHolder()) ?>" value="<?= $Page->TRIGGERDATE->EditValue ?>"<?= $Page->TRIGGERDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TRIGGERDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->TRIGGERDATE->ReadOnly && !$Page->TRIGGERDATE->Disabled && !isset($Page->TRIGGERDATE->EditAttrs["readonly"]) && !isset($Page->TRIGGERDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "x_TRIGGERDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <div id="r_FOLLICLE_STATUS" class="form-group row">
        <label for="x_FOLLICLE_STATUS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_FOLLICLE_STATUS"><?= $Page->FOLLICLE_STATUS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FOLLICLE_STATUS" id="z_FOLLICLE_STATUS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
            <span id="el_view_iui_excel_FOLLICLE_STATUS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FOLLICLE_STATUS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_FOLLICLE_STATUS" name="x_FOLLICLE_STATUS" id="x_FOLLICLE_STATUS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FOLLICLE_STATUS->getPlaceHolder()) ?>" value="<?= $Page->FOLLICLE_STATUS->EditValue ?>"<?= $Page->FOLLICLE_STATUS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FOLLICLE_STATUS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <div id="r_NUMBER_OF_IUI" class="form-group row">
        <label for="x_NUMBER_OF_IUI" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_NUMBER_OF_IUI"><?= $Page->NUMBER_OF_IUI->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NUMBER_OF_IUI" id="z_NUMBER_OF_IUI" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
            <span id="el_view_iui_excel_NUMBER_OF_IUI" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NUMBER_OF_IUI->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_NUMBER_OF_IUI" name="x_NUMBER_OF_IUI" id="x_NUMBER_OF_IUI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NUMBER_OF_IUI->getPlaceHolder()) ?>" value="<?= $Page->NUMBER_OF_IUI->EditValue ?>"<?= $Page->NUMBER_OF_IUI->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NUMBER_OF_IUI->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <div id="r_PROCEDURE" class="form-group row">
        <label for="x_PROCEDURE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PROCEDURE" id="z_PROCEDURE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROCEDURE->cellAttributes() ?>>
            <span id="el_view_iui_excel_PROCEDURE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PROCEDURE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PROCEDURE" name="x_PROCEDURE" id="x_PROCEDURE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROCEDURE->getPlaceHolder()) ?>" value="<?= $Page->PROCEDURE->EditValue ?>"<?= $Page->PROCEDURE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PROCEDURE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <div id="r_LUTEAL_SUPPORT" class="form-group row">
        <label for="x_LUTEAL_SUPPORT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_LUTEAL_SUPPORT"><?= $Page->LUTEAL_SUPPORT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LUTEAL_SUPPORT" id="z_LUTEAL_SUPPORT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
            <span id="el_view_iui_excel_LUTEAL_SUPPORT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LUTEAL_SUPPORT->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_LUTEAL_SUPPORT" name="x_LUTEAL_SUPPORT" id="x_LUTEAL_SUPPORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LUTEAL_SUPPORT->getPlaceHolder()) ?>" value="<?= $Page->LUTEAL_SUPPORT->EditValue ?>"<?= $Page->LUTEAL_SUPPORT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LUTEAL_SUPPORT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HDSAMPLE->Visible) { // H/D SAMPLE ?>
    <div id="r_HDSAMPLE" class="form-group row">
        <label for="x_HDSAMPLE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_HDSAMPLE"><?= $Page->HDSAMPLE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HDSAMPLE" id="z_HDSAMPLE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HDSAMPLE->cellAttributes() ?>>
            <span id="el_view_iui_excel_HDSAMPLE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HDSAMPLE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_HDSAMPLE" name="x_HDSAMPLE" id="x_HDSAMPLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HDSAMPLE->getPlaceHolder()) ?>" value="<?= $Page->HDSAMPLE->EditValue ?>"<?= $Page->HDSAMPLE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HDSAMPLE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DONORID->Visible) { // DONOR - I.D ?>
    <div id="r_DONORID" class="form-group row">
        <label for="x_DONORID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_DONORID"><?= $Page->DONORID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DONORID" id="z_DONORID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DONORID->cellAttributes() ?>>
            <span id="el_view_iui_excel_DONORID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DONORID->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_DONORID" name="x_DONORID" id="x_DONORID" size="30" placeholder="<?= HtmlEncode($Page->DONORID->getPlaceHolder()) ?>" value="<?= $Page->DONORID->EditValue ?>"<?= $Page->DONORID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DONORID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <div id="r_PREG_TEST_DATE" class="form-group row">
        <label for="x_PREG_TEST_DATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></span>
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
            <span id="el_view_iui_excel_PREG_TEST_DATE" class="ew-search-field">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_iui_excel_PREG_TEST_DATE" class="ew-search-field2 d-none">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue2 ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage(false) ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->COLLECTIONMETHOD->Visible) { // COLLECTION  METHOD ?>
    <div id="r_COLLECTIONMETHOD" class="form-group row">
        <label for="x_COLLECTIONMETHOD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_COLLECTIONMETHOD"><?= $Page->COLLECTIONMETHOD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COLLECTIONMETHOD" id="z_COLLECTIONMETHOD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COLLECTIONMETHOD->cellAttributes() ?>>
            <span id="el_view_iui_excel_COLLECTIONMETHOD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->COLLECTIONMETHOD->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_COLLECTIONMETHOD" name="x_COLLECTIONMETHOD" id="x_COLLECTIONMETHOD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->COLLECTIONMETHOD->getPlaceHolder()) ?>" value="<?= $Page->COLLECTIONMETHOD->EditValue ?>"<?= $Page->COLLECTIONMETHOD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->COLLECTIONMETHOD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SAMPLESOURCE->Visible) { // SAMPLE SOURCE ?>
    <div id="r_SAMPLESOURCE" class="form-group row">
        <label for="x_SAMPLESOURCE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_SAMPLESOURCE"><?= $Page->SAMPLESOURCE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAMPLESOURCE" id="z_SAMPLESOURCE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SAMPLESOURCE->cellAttributes() ?>>
            <span id="el_view_iui_excel_SAMPLESOURCE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SAMPLESOURCE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_SAMPLESOURCE" name="x_SAMPLESOURCE" id="x_SAMPLESOURCE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SAMPLESOURCE->getPlaceHolder()) ?>" value="<?= $Page->SAMPLESOURCE->EditValue ?>"<?= $Page->SAMPLESOURCE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SAMPLESOURCE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <div id="r_SPECIFIC_PROBLEMS" class="form-group row">
        <label for="x_SPECIFIC_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SPECIFIC_PROBLEMS" id="z_SPECIFIC_PROBLEMS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
            <span id="el_view_iui_excel_SPECIFIC_PROBLEMS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SPECIFIC_PROBLEMS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS" id="x_SPECIFIC_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->SPECIFIC_PROBLEMS->EditValue ?>"<?= $Page->SPECIFIC_PROBLEMS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SPECIFIC_PROBLEMS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <div id="r_IMSC_1" class="form-group row">
        <label for="x_IMSC_1" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_IMSC_1"><?= $Page->IMSC_1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IMSC_1" id="z_IMSC_1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_1->cellAttributes() ?>>
            <span id="el_view_iui_excel_IMSC_1" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IMSC_1->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_1->getPlaceHolder()) ?>" value="<?= $Page->IMSC_1->EditValue ?>"<?= $Page->IMSC_1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IMSC_1->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <div id="r_IMSC_2" class="form-group row">
        <label for="x_IMSC_2" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_IMSC_2"><?= $Page->IMSC_2->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IMSC_2" id="z_IMSC_2" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_2->cellAttributes() ?>>
            <span id="el_view_iui_excel_IMSC_2" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IMSC_2->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_2->getPlaceHolder()) ?>" value="<?= $Page->IMSC_2->EditValue ?>"<?= $Page->IMSC_2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IMSC_2->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <div id="r_LIQUIFACTION_STORAGE" class="form-group row">
        <label for="x_LIQUIFACTION_STORAGE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LIQUIFACTION_STORAGE" id="z_LIQUIFACTION_STORAGE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
            <span id="el_view_iui_excel_LIQUIFACTION_STORAGE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LIQUIFACTION_STORAGE->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE" id="x_LIQUIFACTION_STORAGE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>" value="<?= $Page->LIQUIFACTION_STORAGE->EditValue ?>"<?= $Page->LIQUIFACTION_STORAGE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LIQUIFACTION_STORAGE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <div id="r_IUI_PREP_METHOD" class="form-group row">
        <label for="x_IUI_PREP_METHOD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IUI_PREP_METHOD" id="z_IUI_PREP_METHOD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
            <span id="el_view_iui_excel_IUI_PREP_METHOD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IUI_PREP_METHOD->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD" id="x_IUI_PREP_METHOD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUI_PREP_METHOD->getPlaceHolder()) ?>" value="<?= $Page->IUI_PREP_METHOD->EditValue ?>"<?= $Page->IUI_PREP_METHOD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IUI_PREP_METHOD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <div id="r_TIME_FROM_TRIGGER" class="form-group row">
        <label for="x_TIME_FROM_TRIGGER" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TIME_FROM_TRIGGER" id="z_TIME_FROM_TRIGGER" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
            <span id="el_view_iui_excel_TIME_FROM_TRIGGER" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TIME_FROM_TRIGGER->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER" id="x_TIME_FROM_TRIGGER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TIME_FROM_TRIGGER->getPlaceHolder()) ?>" value="<?= $Page->TIME_FROM_TRIGGER->EditValue ?>"<?= $Page->TIME_FROM_TRIGGER->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TIME_FROM_TRIGGER->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
        <label for="x_COLLECTION_TO_PREPARATION" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COLLECTION_TO_PREPARATION" id="z_COLLECTION_TO_PREPARATION" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
            <span id="el_view_iui_excel_COLLECTION_TO_PREPARATION" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->COLLECTION_TO_PREPARATION->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION" id="x_COLLECTION_TO_PREPARATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>" value="<?= $Page->COLLECTION_TO_PREPARATION->EditValue ?>"<?= $Page->COLLECTION_TO_PREPARATION->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->COLLECTION_TO_PREPARATION->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
        <label for="x_TIME_FROM_PREP_TO_INSEM" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TIME_FROM_PREP_TO_INSEM" id="z_TIME_FROM_PREP_TO_INSEM" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
            <span id="el_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TIME_FROM_PREP_TO_INSEM->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM" id="x_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?= $Page->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?= $Page->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TIME_FROM_PREP_TO_INSEM->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <div id="r_SPECIFIC_MATERNAL_PROBLEMS" class="form-group row">
        <label for="x_SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SPECIFIC_MATERNAL_PROBLEMS" id="z_SPECIFIC_MATERNAL_PROBLEMS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
            <span id="el_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_SPECIFIC_MATERNAL_PROBLEMS" name="x_SPECIFIC_MATERNAL_PROBLEMS" id="x_SPECIFIC_MATERNAL_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPECIFIC_MATERNAL_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->EditValue ?>"<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULTS->Visible) { // RESULTS ?>
    <div id="r_RESULTS" class="form-group row">
        <label for="x_RESULTS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_RESULTS"><?= $Page->RESULTS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESULTS" id="z_RESULTS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULTS->cellAttributes() ?>>
            <span id="el_view_iui_excel_RESULTS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RESULTS->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_RESULTS" name="x_RESULTS" id="x_RESULTS" size="35" placeholder="<?= HtmlEncode($Page->RESULTS->getPlaceHolder()) ?>" value="<?= $Page->RESULTS->EditValue ?>"<?= $Page->RESULTS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RESULTS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <div id="r_ONGOING_PREG" class="form-group row">
        <label for="x_ONGOING_PREG" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_ONGOING_PREG"><?= $Page->ONGOING_PREG->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ONGOING_PREG" id="z_ONGOING_PREG" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ONGOING_PREG->cellAttributes() ?>>
            <span id="el_view_iui_excel_ONGOING_PREG" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ONGOING_PREG->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_ONGOING_PREG" name="x_ONGOING_PREG" id="x_ONGOING_PREG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ONGOING_PREG->getPlaceHolder()) ?>" value="<?= $Page->ONGOING_PREG->EditValue ?>"<?= $Page->ONGOING_PREG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ONGOING_PREG->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <div id="r_EDD_Date" class="form-group row">
        <label for="x_EDD_Date" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_iui_excel_EDD_Date"><?= $Page->EDD_Date->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD_Date->cellAttributes() ?>>
        <span class="ew-search-operator">
<select name="z_EDD_Date" id="z_EDD_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->EDD_Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
            <span id="el_view_iui_excel_EDD_Date" class="ew-search-field">
<input type="<?= $Page->EDD_Date->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_EDD_Date" name="x_EDD_Date" id="x_EDD_Date" placeholder="<?= HtmlEncode($Page->EDD_Date->getPlaceHolder()) ?>" value="<?= $Page->EDD_Date->EditValue ?>"<?= $Page->EDD_Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD_Date->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD_Date->ReadOnly && !$Page->EDD_Date->Disabled && !isset($Page->EDD_Date->EditAttrs["readonly"]) && !isset($Page->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "x_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
            <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
            <span id="el2_view_iui_excel_EDD_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->EDD_Date->getInputTextType() ?>" data-table="view_iui_excel" data-field="x_EDD_Date" name="y_EDD_Date" id="y_EDD_Date" placeholder="<?= HtmlEncode($Page->EDD_Date->getPlaceHolder()) ?>" value="<?= $Page->EDD_Date->EditValue2 ?>"<?= $Page->EDD_Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EDD_Date->getErrorMessage(false) ?></div>
<?php if (!$Page->EDD_Date->ReadOnly && !$Page->EDD_Date->Disabled && !isset($Page->EDD_Date->EditAttrs["readonly"]) && !isset($Page->EDD_Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_iui_excelsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_iui_excelsearch", "y_EDD_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
    ew.addEventHandlers("view_iui_excel");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
