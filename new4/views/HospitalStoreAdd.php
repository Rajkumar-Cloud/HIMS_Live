<?php

namespace PHPMaker2021\HIMS;

// Page object
$HospitalStoreAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhospital_storeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fhospital_storeadd = currentForm = new ew.Form("fhospital_storeadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hospital_store")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hospital_store)
        ew.vars.tables.hospital_store = currentTable;
    fhospital_storeadd.addFields([
        ["logo", [fields.logo.visible && fields.logo.required ? ew.Validators.fileRequired(fields.logo.caption) : null], fields.logo.isInvalid],
        ["pharmacy", [fields.pharmacy.visible && fields.pharmacy.required ? ew.Validators.required(fields.pharmacy.caption) : null], fields.pharmacy.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["area", [fields.area.visible && fields.area.required ? ew.Validators.required(fields.area.caption) : null], fields.area.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["phone_no", [fields.phone_no.visible && fields.phone_no.required ? ew.Validators.required(fields.phone_no.caption) : null], fields.phone_no.isInvalid],
        ["PreFixCode", [fields.PreFixCode.visible && fields.PreFixCode.required ? ew.Validators.required(fields.PreFixCode.caption) : null], fields.PreFixCode.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["pharmacyGST", [fields.pharmacyGST.visible && fields.pharmacyGST.required ? ew.Validators.required(fields.pharmacyGST.caption) : null], fields.pharmacyGST.isInvalid],
        ["HospId", [fields.HospId.visible && fields.HospId.required ? ew.Validators.required(fields.HospId.caption) : null], fields.HospId.isInvalid],
        ["BranchID", [fields.BranchID.visible && fields.BranchID.required ? ew.Validators.required(fields.BranchID.caption) : null, ew.Validators.integer], fields.BranchID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhospital_storeadd,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fhospital_storeadd.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fhospital_storeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhospital_storeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhospital_storeadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fhospital_storeadd.lists.HospId = <?= $Page->HospId->toClientList($Page) ?>;
    loadjs.done("fhospital_storeadd");
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
<form name="fhospital_storeadd" id="fhospital_storeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->logo->Visible) { // logo ?>
    <div id="r_logo" class="form-group row">
        <label id="elh_hospital_store_logo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->logo->caption() ?><?= $Page->logo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->logo->cellAttributes() ?>>
<span id="el_hospital_store_logo">
<div id="fd_x_logo">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->logo->title() ?>" data-table="hospital_store" data-field="x_logo" name="x_logo" id="x_logo" lang="<?= CurrentLanguageID() ?>"<?= $Page->logo->editAttributes() ?><?= ($Page->logo->ReadOnly || $Page->logo->Disabled) ? " disabled" : "" ?> aria-describedby="x_logo_help">
        <label class="custom-file-label ew-file-label" for="x_logo"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->logo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->logo->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_logo" id= "fn_x_logo" value="<?= $Page->logo->Upload->FileName ?>">
<input type="hidden" name="fa_x_logo" id= "fa_x_logo" value="0">
<input type="hidden" name="fs_x_logo" id= "fs_x_logo" value="450">
<input type="hidden" name="fx_x_logo" id= "fx_x_logo" value="<?= $Page->logo->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_logo" id= "fm_x_logo" value="<?= $Page->logo->UploadMaxFileSize ?>">
</div>
<table id="ft_x_logo" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
    <div id="r_pharmacy" class="form-group row">
        <label id="elh_hospital_store_pharmacy" for="x_pharmacy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacy->caption() ?><?= $Page->pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el_hospital_store_pharmacy">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="hospital_store" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?> aria-describedby="x_pharmacy_help">
<?= $Page->pharmacy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label id="elh_hospital_store_street" for="x_street" class="<?= $Page->LeftColumnClass ?>"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
<span id="el_hospital_store_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="hospital_store" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?> aria-describedby="x_street_help">
<?= $Page->street->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <div id="r_area" class="form-group row">
        <label id="elh_hospital_store_area" for="x_area" class="<?= $Page->LeftColumnClass ?>"><?= $Page->area->caption() ?><?= $Page->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->area->cellAttributes() ?>>
<span id="el_hospital_store_area">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="hospital_store" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?> aria-describedby="x_area_help">
<?= $Page->area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label id="elh_hospital_store_town" for="x_town" class="<?= $Page->LeftColumnClass ?>"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
<span id="el_hospital_store_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="hospital_store" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?> aria-describedby="x_town_help">
<?= $Page->town->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_hospital_store_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<span id="el_hospital_store_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="hospital_store" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_hospital_store_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_hospital_store_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="hospital_store" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <div id="r_phone_no" class="form-group row">
        <label id="elh_hospital_store_phone_no" for="x_phone_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_no->caption() ?><?= $Page->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_hospital_store_phone_no">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="hospital_store" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?> aria-describedby="x_phone_no_help">
<?= $Page->phone_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreFixCode->Visible) { // PreFixCode ?>
    <div id="r_PreFixCode" class="form-group row">
        <label id="elh_hospital_store_PreFixCode" for="x_PreFixCode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreFixCode->caption() ?><?= $Page->PreFixCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreFixCode->cellAttributes() ?>>
<span id="el_hospital_store_PreFixCode">
<input type="<?= $Page->PreFixCode->getInputTextType() ?>" data-table="hospital_store" data-field="x_PreFixCode" name="x_PreFixCode" id="x_PreFixCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreFixCode->getPlaceHolder()) ?>" value="<?= $Page->PreFixCode->EditValue ?>"<?= $Page->PreFixCode->editAttributes() ?> aria-describedby="x_PreFixCode_help">
<?= $Page->PreFixCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreFixCode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hospital_store_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hospital_store_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="hospital_store_x_status"
        data-table="hospital_store"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='hospital_store_x_status']"),
        options = { name: "x_status", selectId: "hospital_store_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.hospital_store.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacyGST->Visible) { // pharmacyGST ?>
    <div id="r_pharmacyGST" class="form-group row">
        <label id="elh_hospital_store_pharmacyGST" for="x_pharmacyGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacyGST->caption() ?><?= $Page->pharmacyGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacyGST->cellAttributes() ?>>
<span id="el_hospital_store_pharmacyGST">
<input type="<?= $Page->pharmacyGST->getInputTextType() ?>" data-table="hospital_store" data-field="x_pharmacyGST" name="x_pharmacyGST" id="x_pharmacyGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacyGST->getPlaceHolder()) ?>" value="<?= $Page->pharmacyGST->EditValue ?>"<?= $Page->pharmacyGST->editAttributes() ?> aria-describedby="x_pharmacyGST_help">
<?= $Page->pharmacyGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacyGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospId->Visible) { // HospId ?>
    <div id="r_HospId" class="form-group row">
        <label id="elh_hospital_store_HospId" for="x_HospId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospId->caption() ?><?= $Page->HospId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospId->cellAttributes() ?>>
<span id="el_hospital_store_HospId">
    <select
        id="x_HospId"
        name="x_HospId"
        class="form-control ew-select<?= $Page->HospId->isInvalidClass() ?>"
        data-select2-id="hospital_store_x_HospId"
        data-table="hospital_store"
        data-field="x_HospId"
        data-value-separator="<?= $Page->HospId->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HospId->getPlaceHolder()) ?>"
        <?= $Page->HospId->editAttributes() ?>>
        <?= $Page->HospId->selectOptionListHtml("x_HospId") ?>
    </select>
    <?= $Page->HospId->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HospId->getErrorMessage() ?></div>
<?= $Page->HospId->Lookup->getParamTag($Page, "p_x_HospId") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='hospital_store_x_HospId']"),
        options = { name: "x_HospId", selectId: "hospital_store_x_HospId", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.hospital_store.fields.HospId.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
    <div id="r_BranchID" class="form-group row">
        <label id="elh_hospital_store_BranchID" for="x_BranchID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BranchID->caption() ?><?= $Page->BranchID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BranchID->cellAttributes() ?>>
<span id="el_hospital_store_BranchID">
<input type="<?= $Page->BranchID->getInputTextType() ?>" data-table="hospital_store" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?= HtmlEncode($Page->BranchID->getPlaceHolder()) ?>" value="<?= $Page->BranchID->EditValue ?>"<?= $Page->BranchID->editAttributes() ?> aria-describedby="x_BranchID_help">
<?= $Page->BranchID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BranchID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("hospital_store");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
