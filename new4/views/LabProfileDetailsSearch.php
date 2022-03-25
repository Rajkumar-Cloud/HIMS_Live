<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabProfileDetailsSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var flab_profile_detailssearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    flab_profile_detailssearch = currentAdvancedSearchForm = new ew.Form("flab_profile_detailssearch", "search");
    <?php } else { ?>
    flab_profile_detailssearch = currentForm = new ew.Form("flab_profile_detailssearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_profile_details")) ?>,
        fields = currentTable.fields;
    flab_profile_detailssearch.addFields([
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["ProfileCode", [], fields.ProfileCode.isInvalid],
        ["SubProfileCode", [], fields.SubProfileCode.isInvalid],
        ["ProfileTestCode", [], fields.ProfileTestCode.isInvalid],
        ["ProfileSubTestCode", [], fields.ProfileSubTestCode.isInvalid],
        ["TestOrder", [ew.Validators.float], fields.TestOrder.isInvalid],
        ["TestAmount", [ew.Validators.float], fields.TestAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        flab_profile_detailssearch.setInvalid();
    });

    // Validate form
    flab_profile_detailssearch.validate = function () {
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
    flab_profile_detailssearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_profile_detailssearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    flab_profile_detailssearch.lists.SubProfileCode = <?= $Page->SubProfileCode->toClientList($Page) ?>;
    flab_profile_detailssearch.lists.ProfileTestCode = <?= $Page->ProfileTestCode->toClientList($Page) ?>;
    loadjs.done("flab_profile_detailssearch");
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
<form name="flab_profile_detailssearch" id="flab_profile_detailssearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_lab_profile_details_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <div id="r_ProfileCode" class="form-group row">
        <label for="x_ProfileCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?= $Page->ProfileCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileCode" id="z_ProfileCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileCode->cellAttributes() ?>>
            <span id="el_lab_profile_details_ProfileCode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->ProfileCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileCode->EditValue ?>"<?= $Page->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileCode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
    <div id="r_SubProfileCode" class="form-group row">
        <label for="x_SubProfileCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?= $Page->SubProfileCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SubProfileCode" id="z_SubProfileCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubProfileCode->cellAttributes() ?>>
            <span id="el_lab_profile_details_SubProfileCode" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SubProfileCode"><?= EmptyValue(strval($Page->SubProfileCode->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SubProfileCode->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SubProfileCode->ReadOnly || $Page->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SubProfileCode->getErrorMessage(false) ?></div>
<?= $Page->SubProfileCode->Lookup->getParamTag($Page, "p_x_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x_SubProfileCode" id="x_SubProfileCode" value="<?= $Page->SubProfileCode->AdvancedSearch->SearchValue ?>"<?= $Page->SubProfileCode->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
    <div id="r_ProfileTestCode" class="form-group row">
        <label for="x_ProfileTestCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?= $Page->ProfileTestCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileTestCode" id="z_ProfileTestCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileTestCode->cellAttributes() ?>>
            <span id="el_lab_profile_details_ProfileTestCode" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ProfileTestCode"><?= EmptyValue(strval($Page->ProfileTestCode->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ProfileTestCode->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ProfileTestCode->ReadOnly || $Page->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ProfileTestCode->getErrorMessage(false) ?></div>
<?= $Page->ProfileTestCode->Lookup->getParamTag($Page, "p_x_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x_ProfileTestCode" id="x_ProfileTestCode" value="<?= $Page->ProfileTestCode->AdvancedSearch->SearchValue ?>"<?= $Page->ProfileTestCode->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
    <div id="r_ProfileSubTestCode" class="form-group row">
        <label for="x_ProfileSubTestCode" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?= $Page->ProfileSubTestCode->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileSubTestCode" id="z_ProfileSubTestCode" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProfileSubTestCode->cellAttributes() ?>>
            <span id="el_lab_profile_details_ProfileSubTestCode" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Page->ProfileSubTestCode->EditValue ?>"<?= $Page->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProfileSubTestCode->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
    <div id="r_TestOrder" class="form-group row">
        <label for="x_TestOrder" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?= $Page->TestOrder->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TestOrder" id="z_TestOrder" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestOrder->cellAttributes() ?>>
            <span id="el_lab_profile_details_TestOrder" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?= HtmlEncode($Page->TestOrder->getPlaceHolder()) ?>" value="<?= $Page->TestOrder->EditValue ?>"<?= $Page->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestOrder->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
    <div id="r_TestAmount" class="form-group row">
        <label for="x_TestAmount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?= $Page->TestAmount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TestAmount" id="z_TestAmount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TestAmount->cellAttributes() ?>>
            <span id="el_lab_profile_details_TestAmount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?= HtmlEncode($Page->TestAmount->getPlaceHolder()) ?>" value="<?= $Page->TestAmount->EditValue ?>"<?= $Page->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestAmount->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("lab_profile_details");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
