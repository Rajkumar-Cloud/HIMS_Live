<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacySuppliersEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_suppliersedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_suppliersedit = currentForm = new ew.Form("fpharmacy_suppliersedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pharmacy_suppliers.fields;
    fpharmacy_suppliersedit.addFields([
        ["Suppliercode", [fields.Suppliercode.required ? ew.Validators.required(fields.Suppliercode.caption) : null], fields.Suppliercode.isInvalid],
        ["Suppliername", [fields.Suppliername.required ? ew.Validators.required(fields.Suppliername.caption) : null], fields.Suppliername.isInvalid],
        ["Abbreviation", [fields.Abbreviation.required ? ew.Validators.required(fields.Abbreviation.caption) : null], fields.Abbreviation.isInvalid],
        ["Creationdate", [fields.Creationdate.required ? ew.Validators.required(fields.Creationdate.caption) : null, ew.Validators.datetime(0)], fields.Creationdate.isInvalid],
        ["Address1", [fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["Citycode", [fields.Citycode.required ? ew.Validators.required(fields.Citycode.caption) : null, ew.Validators.integer], fields.Citycode.isInvalid],
        ["State", [fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Tngstnumber", [fields.Tngstnumber.required ? ew.Validators.required(fields.Tngstnumber.caption) : null], fields.Tngstnumber.isInvalid],
        ["Phone", [fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["_Email", [fields._Email.required ? ew.Validators.required(fields._Email.caption) : null], fields._Email.isInvalid],
        ["Paymentmode", [fields.Paymentmode.required ? ew.Validators.required(fields.Paymentmode.caption) : null], fields.Paymentmode.isInvalid],
        ["Contactperson1", [fields.Contactperson1.required ? ew.Validators.required(fields.Contactperson1.caption) : null], fields.Contactperson1.isInvalid],
        ["CP1Address1", [fields.CP1Address1.required ? ew.Validators.required(fields.CP1Address1.caption) : null], fields.CP1Address1.isInvalid],
        ["CP1Address2", [fields.CP1Address2.required ? ew.Validators.required(fields.CP1Address2.caption) : null], fields.CP1Address2.isInvalid],
        ["CP1Address3", [fields.CP1Address3.required ? ew.Validators.required(fields.CP1Address3.caption) : null], fields.CP1Address3.isInvalid],
        ["CP1Citycode", [fields.CP1Citycode.required ? ew.Validators.required(fields.CP1Citycode.caption) : null, ew.Validators.integer], fields.CP1Citycode.isInvalid],
        ["CP1State", [fields.CP1State.required ? ew.Validators.required(fields.CP1State.caption) : null], fields.CP1State.isInvalid],
        ["CP1Pincode", [fields.CP1Pincode.required ? ew.Validators.required(fields.CP1Pincode.caption) : null], fields.CP1Pincode.isInvalid],
        ["CP1Designation", [fields.CP1Designation.required ? ew.Validators.required(fields.CP1Designation.caption) : null], fields.CP1Designation.isInvalid],
        ["CP1Phone", [fields.CP1Phone.required ? ew.Validators.required(fields.CP1Phone.caption) : null], fields.CP1Phone.isInvalid],
        ["CP1MobileNo", [fields.CP1MobileNo.required ? ew.Validators.required(fields.CP1MobileNo.caption) : null], fields.CP1MobileNo.isInvalid],
        ["CP1Fax", [fields.CP1Fax.required ? ew.Validators.required(fields.CP1Fax.caption) : null], fields.CP1Fax.isInvalid],
        ["CP1Email", [fields.CP1Email.required ? ew.Validators.required(fields.CP1Email.caption) : null], fields.CP1Email.isInvalid],
        ["Contactperson2", [fields.Contactperson2.required ? ew.Validators.required(fields.Contactperson2.caption) : null], fields.Contactperson2.isInvalid],
        ["CP2Address1", [fields.CP2Address1.required ? ew.Validators.required(fields.CP2Address1.caption) : null], fields.CP2Address1.isInvalid],
        ["CP2Address2", [fields.CP2Address2.required ? ew.Validators.required(fields.CP2Address2.caption) : null], fields.CP2Address2.isInvalid],
        ["CP2Address3", [fields.CP2Address3.required ? ew.Validators.required(fields.CP2Address3.caption) : null], fields.CP2Address3.isInvalid],
        ["CP2Citycode", [fields.CP2Citycode.required ? ew.Validators.required(fields.CP2Citycode.caption) : null, ew.Validators.integer], fields.CP2Citycode.isInvalid],
        ["CP2State", [fields.CP2State.required ? ew.Validators.required(fields.CP2State.caption) : null], fields.CP2State.isInvalid],
        ["CP2Pincode", [fields.CP2Pincode.required ? ew.Validators.required(fields.CP2Pincode.caption) : null], fields.CP2Pincode.isInvalid],
        ["CP2Designation", [fields.CP2Designation.required ? ew.Validators.required(fields.CP2Designation.caption) : null], fields.CP2Designation.isInvalid],
        ["CP2Phone", [fields.CP2Phone.required ? ew.Validators.required(fields.CP2Phone.caption) : null], fields.CP2Phone.isInvalid],
        ["CP2MobileNo", [fields.CP2MobileNo.required ? ew.Validators.required(fields.CP2MobileNo.caption) : null], fields.CP2MobileNo.isInvalid],
        ["CP2Fax", [fields.CP2Fax.required ? ew.Validators.required(fields.CP2Fax.caption) : null], fields.CP2Fax.isInvalid],
        ["CP2Email", [fields.CP2Email.required ? ew.Validators.required(fields.CP2Email.caption) : null], fields.CP2Email.isInvalid],
        ["Type", [fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["Creditterms", [fields.Creditterms.required ? ew.Validators.required(fields.Creditterms.caption) : null], fields.Creditterms.isInvalid],
        ["Remarks", [fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["Tinnumber", [fields.Tinnumber.required ? ew.Validators.required(fields.Tinnumber.caption) : null], fields.Tinnumber.isInvalid],
        ["Universalsuppliercode", [fields.Universalsuppliercode.required ? ew.Validators.required(fields.Universalsuppliercode.caption) : null], fields.Universalsuppliercode.isInvalid],
        ["Mobilenumber", [fields.Mobilenumber.required ? ew.Validators.required(fields.Mobilenumber.caption) : null], fields.Mobilenumber.isInvalid],
        ["PANNumber", [fields.PANNumber.required ? ew.Validators.required(fields.PANNumber.caption) : null], fields.PANNumber.isInvalid],
        ["SalesRepMobileNo", [fields.SalesRepMobileNo.required ? ew.Validators.required(fields.SalesRepMobileNo.caption) : null], fields.SalesRepMobileNo.isInvalid],
        ["GSTNumber", [fields.GSTNumber.required ? ew.Validators.required(fields.GSTNumber.caption) : null], fields.GSTNumber.isInvalid],
        ["TANNumber", [fields.TANNumber.required ? ew.Validators.required(fields.TANNumber.caption) : null], fields.TANNumber.isInvalid],
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_suppliersedit,
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
    fpharmacy_suppliersedit.validate = function () {
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
    fpharmacy_suppliersedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_suppliersedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_suppliersedit");
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
<form name="fpharmacy_suppliersedit" id="fpharmacy_suppliersedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
    <div id="r_Suppliercode" class="form-group row">
        <label id="elh_pharmacy_suppliers_Suppliercode" for="x_Suppliercode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Suppliercode->caption() ?><?= $Page->Suppliercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Suppliercode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Suppliercode">
<input type="<?= $Page->Suppliercode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Suppliercode" name="x_Suppliercode" id="x_Suppliercode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->Suppliercode->getPlaceHolder()) ?>" value="<?= $Page->Suppliercode->EditValue ?>"<?= $Page->Suppliercode->editAttributes() ?> aria-describedby="x_Suppliercode_help">
<?= $Page->Suppliercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Suppliercode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
    <div id="r_Suppliername" class="form-group row">
        <label id="elh_pharmacy_suppliers_Suppliername" for="x_Suppliername" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Suppliername->caption() ?><?= $Page->Suppliername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Suppliername->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Suppliername">
<input type="<?= $Page->Suppliername->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Suppliername" name="x_Suppliername" id="x_Suppliername" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Suppliername->getPlaceHolder()) ?>" value="<?= $Page->Suppliername->EditValue ?>"<?= $Page->Suppliername->editAttributes() ?> aria-describedby="x_Suppliername_help">
<?= $Page->Suppliername->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Suppliername->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
    <div id="r_Abbreviation" class="form-group row">
        <label id="elh_pharmacy_suppliers_Abbreviation" for="x_Abbreviation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abbreviation->caption() ?><?= $Page->Abbreviation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abbreviation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Abbreviation">
<input type="<?= $Page->Abbreviation->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Abbreviation" name="x_Abbreviation" id="x_Abbreviation" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->Abbreviation->getPlaceHolder()) ?>" value="<?= $Page->Abbreviation->EditValue ?>"<?= $Page->Abbreviation->editAttributes() ?> aria-describedby="x_Abbreviation_help">
<?= $Page->Abbreviation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abbreviation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
    <div id="r_Creationdate" class="form-group row">
        <label id="elh_pharmacy_suppliers_Creationdate" for="x_Creationdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Creationdate->caption() ?><?= $Page->Creationdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Creationdate">
<input type="<?= $Page->Creationdate->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?= HtmlEncode($Page->Creationdate->getPlaceHolder()) ?>" value="<?= $Page->Creationdate->EditValue ?>"<?= $Page->Creationdate->editAttributes() ?> aria-describedby="x_Creationdate_help">
<?= $Page->Creationdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Creationdate->getErrorMessage() ?></div>
<?php if (!$Page->Creationdate->ReadOnly && !$Page->Creationdate->Disabled && !isset($Page->Creationdate->EditAttrs["readonly"]) && !isset($Page->Creationdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_suppliersedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_suppliersedit", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label id="elh_pharmacy_suppliers_Address1" for="x_Address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address1">
<input type="<?= $Page->Address1->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help">
<?= $Page->Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label id="elh_pharmacy_suppliers_Address2" for="x_Address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address2">
<input type="<?= $Page->Address2->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help">
<?= $Page->Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label id="elh_pharmacy_suppliers_Address3" for="x_Address3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address3">
<input type="<?= $Page->Address3->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help">
<?= $Page->Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
    <div id="r_Citycode" class="form-group row">
        <label id="elh_pharmacy_suppliers_Citycode" for="x_Citycode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Citycode->caption() ?><?= $Page->Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Citycode">
<input type="<?= $Page->Citycode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Citycode" name="x_Citycode" id="x_Citycode" size="30" placeholder="<?= HtmlEncode($Page->Citycode->getPlaceHolder()) ?>" value="<?= $Page->Citycode->EditValue ?>"<?= $Page->Citycode->editAttributes() ?> aria-describedby="x_Citycode_help">
<?= $Page->Citycode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Citycode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_pharmacy_suppliers_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label id="elh_pharmacy_suppliers_Pincode" for="x_Pincode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Pincode">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
<?= $Page->Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
    <div id="r_Tngstnumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_Tngstnumber" for="x_Tngstnumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tngstnumber->caption() ?><?= $Page->Tngstnumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tngstnumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Tngstnumber">
<input type="<?= $Page->Tngstnumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Tngstnumber" name="x_Tngstnumber" id="x_Tngstnumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Tngstnumber->getPlaceHolder()) ?>" value="<?= $Page->Tngstnumber->EditValue ?>"<?= $Page->Tngstnumber->editAttributes() ?> aria-describedby="x_Tngstnumber_help">
<?= $Page->Tngstnumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tngstnumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label id="elh_pharmacy_suppliers_Phone" for="x_Phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Phone">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
<?= $Page->Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label id="elh_pharmacy_suppliers_Fax" for="x_Fax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Fax">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
<?= $Page->Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
    <div id="r__Email" class="form-group row">
        <label id="elh_pharmacy_suppliers__Email" for="x__Email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Email->caption() ?><?= $Page->_Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers__Email">
<input type="<?= $Page->_Email->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->_Email->getPlaceHolder()) ?>" value="<?= $Page->_Email->EditValue ?>"<?= $Page->_Email->editAttributes() ?> aria-describedby="x__Email_help">
<?= $Page->_Email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
    <div id="r_Paymentmode" class="form-group row">
        <label id="elh_pharmacy_suppliers_Paymentmode" for="x_Paymentmode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Paymentmode->caption() ?><?= $Page->Paymentmode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Paymentmode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Paymentmode">
<input type="<?= $Page->Paymentmode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Paymentmode" name="x_Paymentmode" id="x_Paymentmode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Paymentmode->getPlaceHolder()) ?>" value="<?= $Page->Paymentmode->EditValue ?>"<?= $Page->Paymentmode->editAttributes() ?> aria-describedby="x_Paymentmode_help">
<?= $Page->Paymentmode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Paymentmode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
    <div id="r_Contactperson1" class="form-group row">
        <label id="elh_pharmacy_suppliers_Contactperson1" for="x_Contactperson1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Contactperson1->caption() ?><?= $Page->Contactperson1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Contactperson1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Contactperson1">
<input type="<?= $Page->Contactperson1->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Contactperson1" name="x_Contactperson1" id="x_Contactperson1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Contactperson1->getPlaceHolder()) ?>" value="<?= $Page->Contactperson1->EditValue ?>"<?= $Page->Contactperson1->editAttributes() ?> aria-describedby="x_Contactperson1_help">
<?= $Page->Contactperson1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Contactperson1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
    <div id="r_CP1Address1" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Address1" for="x_CP1Address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Address1->caption() ?><?= $Page->CP1Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address1">
<input type="<?= $Page->CP1Address1->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Address1" name="x_CP1Address1" id="x_CP1Address1" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->CP1Address1->getPlaceHolder()) ?>" value="<?= $Page->CP1Address1->EditValue ?>"<?= $Page->CP1Address1->editAttributes() ?> aria-describedby="x_CP1Address1_help">
<?= $Page->CP1Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
    <div id="r_CP1Address2" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Address2" for="x_CP1Address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Address2->caption() ?><?= $Page->CP1Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address2">
<input type="<?= $Page->CP1Address2->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Address2" name="x_CP1Address2" id="x_CP1Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP1Address2->getPlaceHolder()) ?>" value="<?= $Page->CP1Address2->EditValue ?>"<?= $Page->CP1Address2->editAttributes() ?> aria-describedby="x_CP1Address2_help">
<?= $Page->CP1Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
    <div id="r_CP1Address3" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Address3" for="x_CP1Address3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Address3->caption() ?><?= $Page->CP1Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address3">
<input type="<?= $Page->CP1Address3->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Address3" name="x_CP1Address3" id="x_CP1Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP1Address3->getPlaceHolder()) ?>" value="<?= $Page->CP1Address3->EditValue ?>"<?= $Page->CP1Address3->editAttributes() ?> aria-describedby="x_CP1Address3_help">
<?= $Page->CP1Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Address3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
    <div id="r_CP1Citycode" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Citycode" for="x_CP1Citycode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Citycode->caption() ?><?= $Page->CP1Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Citycode">
<input type="<?= $Page->CP1Citycode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Citycode" name="x_CP1Citycode" id="x_CP1Citycode" size="30" placeholder="<?= HtmlEncode($Page->CP1Citycode->getPlaceHolder()) ?>" value="<?= $Page->CP1Citycode->EditValue ?>"<?= $Page->CP1Citycode->editAttributes() ?> aria-describedby="x_CP1Citycode_help">
<?= $Page->CP1Citycode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Citycode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
    <div id="r_CP1State" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1State" for="x_CP1State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1State->caption() ?><?= $Page->CP1State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1State">
<input type="<?= $Page->CP1State->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1State" name="x_CP1State" id="x_CP1State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1State->getPlaceHolder()) ?>" value="<?= $Page->CP1State->EditValue ?>"<?= $Page->CP1State->editAttributes() ?> aria-describedby="x_CP1State_help">
<?= $Page->CP1State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
    <div id="r_CP1Pincode" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Pincode" for="x_CP1Pincode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Pincode->caption() ?><?= $Page->CP1Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Pincode">
<input type="<?= $Page->CP1Pincode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Pincode" name="x_CP1Pincode" id="x_CP1Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->CP1Pincode->getPlaceHolder()) ?>" value="<?= $Page->CP1Pincode->EditValue ?>"<?= $Page->CP1Pincode->editAttributes() ?> aria-describedby="x_CP1Pincode_help">
<?= $Page->CP1Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Pincode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
    <div id="r_CP1Designation" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Designation" for="x_CP1Designation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Designation->caption() ?><?= $Page->CP1Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Designation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Designation">
<input type="<?= $Page->CP1Designation->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Designation" name="x_CP1Designation" id="x_CP1Designation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Designation->getPlaceHolder()) ?>" value="<?= $Page->CP1Designation->EditValue ?>"<?= $Page->CP1Designation->editAttributes() ?> aria-describedby="x_CP1Designation_help">
<?= $Page->CP1Designation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Designation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
    <div id="r_CP1Phone" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Phone" for="x_CP1Phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Phone->caption() ?><?= $Page->CP1Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Phone">
<input type="<?= $Page->CP1Phone->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Phone" name="x_CP1Phone" id="x_CP1Phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Phone->getPlaceHolder()) ?>" value="<?= $Page->CP1Phone->EditValue ?>"<?= $Page->CP1Phone->editAttributes() ?> aria-describedby="x_CP1Phone_help">
<?= $Page->CP1Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
    <div id="r_CP1MobileNo" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1MobileNo" for="x_CP1MobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1MobileNo->caption() ?><?= $Page->CP1MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1MobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1MobileNo">
<input type="<?= $Page->CP1MobileNo->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1MobileNo" name="x_CP1MobileNo" id="x_CP1MobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1MobileNo->getPlaceHolder()) ?>" value="<?= $Page->CP1MobileNo->EditValue ?>"<?= $Page->CP1MobileNo->editAttributes() ?> aria-describedby="x_CP1MobileNo_help">
<?= $Page->CP1MobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1MobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
    <div id="r_CP1Fax" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Fax" for="x_CP1Fax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Fax->caption() ?><?= $Page->CP1Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Fax">
<input type="<?= $Page->CP1Fax->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Fax" name="x_CP1Fax" id="x_CP1Fax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Fax->getPlaceHolder()) ?>" value="<?= $Page->CP1Fax->EditValue ?>"<?= $Page->CP1Fax->editAttributes() ?> aria-describedby="x_CP1Fax_help">
<?= $Page->CP1Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Fax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
    <div id="r_CP1Email" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP1Email" for="x_CP1Email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP1Email->caption() ?><?= $Page->CP1Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP1Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Email">
<input type="<?= $Page->CP1Email->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP1Email" name="x_CP1Email" id="x_CP1Email" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Email->getPlaceHolder()) ?>" value="<?= $Page->CP1Email->EditValue ?>"<?= $Page->CP1Email->editAttributes() ?> aria-describedby="x_CP1Email_help">
<?= $Page->CP1Email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP1Email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
    <div id="r_Contactperson2" class="form-group row">
        <label id="elh_pharmacy_suppliers_Contactperson2" for="x_Contactperson2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Contactperson2->caption() ?><?= $Page->Contactperson2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Contactperson2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Contactperson2">
<input type="<?= $Page->Contactperson2->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Contactperson2" name="x_Contactperson2" id="x_Contactperson2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Contactperson2->getPlaceHolder()) ?>" value="<?= $Page->Contactperson2->EditValue ?>"<?= $Page->Contactperson2->editAttributes() ?> aria-describedby="x_Contactperson2_help">
<?= $Page->Contactperson2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Contactperson2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
    <div id="r_CP2Address1" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Address1" for="x_CP2Address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Address1->caption() ?><?= $Page->CP2Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address1">
<input type="<?= $Page->CP2Address1->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Address1" name="x_CP2Address1" id="x_CP2Address1" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->CP2Address1->getPlaceHolder()) ?>" value="<?= $Page->CP2Address1->EditValue ?>"<?= $Page->CP2Address1->editAttributes() ?> aria-describedby="x_CP2Address1_help">
<?= $Page->CP2Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
    <div id="r_CP2Address2" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Address2" for="x_CP2Address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Address2->caption() ?><?= $Page->CP2Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address2">
<input type="<?= $Page->CP2Address2->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Address2" name="x_CP2Address2" id="x_CP2Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP2Address2->getPlaceHolder()) ?>" value="<?= $Page->CP2Address2->EditValue ?>"<?= $Page->CP2Address2->editAttributes() ?> aria-describedby="x_CP2Address2_help">
<?= $Page->CP2Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
    <div id="r_CP2Address3" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Address3" for="x_CP2Address3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Address3->caption() ?><?= $Page->CP2Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address3">
<input type="<?= $Page->CP2Address3->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Address3" name="x_CP2Address3" id="x_CP2Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP2Address3->getPlaceHolder()) ?>" value="<?= $Page->CP2Address3->EditValue ?>"<?= $Page->CP2Address3->editAttributes() ?> aria-describedby="x_CP2Address3_help">
<?= $Page->CP2Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Address3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
    <div id="r_CP2Citycode" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Citycode" for="x_CP2Citycode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Citycode->caption() ?><?= $Page->CP2Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Citycode">
<input type="<?= $Page->CP2Citycode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Citycode" name="x_CP2Citycode" id="x_CP2Citycode" size="30" placeholder="<?= HtmlEncode($Page->CP2Citycode->getPlaceHolder()) ?>" value="<?= $Page->CP2Citycode->EditValue ?>"<?= $Page->CP2Citycode->editAttributes() ?> aria-describedby="x_CP2Citycode_help">
<?= $Page->CP2Citycode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Citycode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
    <div id="r_CP2State" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2State" for="x_CP2State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2State->caption() ?><?= $Page->CP2State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2State">
<input type="<?= $Page->CP2State->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2State" name="x_CP2State" id="x_CP2State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2State->getPlaceHolder()) ?>" value="<?= $Page->CP2State->EditValue ?>"<?= $Page->CP2State->editAttributes() ?> aria-describedby="x_CP2State_help">
<?= $Page->CP2State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
    <div id="r_CP2Pincode" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Pincode" for="x_CP2Pincode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Pincode->caption() ?><?= $Page->CP2Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Pincode">
<input type="<?= $Page->CP2Pincode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Pincode" name="x_CP2Pincode" id="x_CP2Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->CP2Pincode->getPlaceHolder()) ?>" value="<?= $Page->CP2Pincode->EditValue ?>"<?= $Page->CP2Pincode->editAttributes() ?> aria-describedby="x_CP2Pincode_help">
<?= $Page->CP2Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Pincode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
    <div id="r_CP2Designation" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Designation" for="x_CP2Designation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Designation->caption() ?><?= $Page->CP2Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Designation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Designation">
<input type="<?= $Page->CP2Designation->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Designation" name="x_CP2Designation" id="x_CP2Designation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Designation->getPlaceHolder()) ?>" value="<?= $Page->CP2Designation->EditValue ?>"<?= $Page->CP2Designation->editAttributes() ?> aria-describedby="x_CP2Designation_help">
<?= $Page->CP2Designation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Designation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
    <div id="r_CP2Phone" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Phone" for="x_CP2Phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Phone->caption() ?><?= $Page->CP2Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Phone">
<input type="<?= $Page->CP2Phone->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Phone" name="x_CP2Phone" id="x_CP2Phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Phone->getPlaceHolder()) ?>" value="<?= $Page->CP2Phone->EditValue ?>"<?= $Page->CP2Phone->editAttributes() ?> aria-describedby="x_CP2Phone_help">
<?= $Page->CP2Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
    <div id="r_CP2MobileNo" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2MobileNo" for="x_CP2MobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2MobileNo->caption() ?><?= $Page->CP2MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2MobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2MobileNo">
<input type="<?= $Page->CP2MobileNo->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2MobileNo" name="x_CP2MobileNo" id="x_CP2MobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2MobileNo->getPlaceHolder()) ?>" value="<?= $Page->CP2MobileNo->EditValue ?>"<?= $Page->CP2MobileNo->editAttributes() ?> aria-describedby="x_CP2MobileNo_help">
<?= $Page->CP2MobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2MobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
    <div id="r_CP2Fax" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Fax" for="x_CP2Fax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Fax->caption() ?><?= $Page->CP2Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Fax">
<input type="<?= $Page->CP2Fax->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Fax" name="x_CP2Fax" id="x_CP2Fax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Fax->getPlaceHolder()) ?>" value="<?= $Page->CP2Fax->EditValue ?>"<?= $Page->CP2Fax->editAttributes() ?> aria-describedby="x_CP2Fax_help">
<?= $Page->CP2Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Fax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
    <div id="r_CP2Email" class="form-group row">
        <label id="elh_pharmacy_suppliers_CP2Email" for="x_CP2Email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CP2Email->caption() ?><?= $Page->CP2Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CP2Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Email">
<input type="<?= $Page->CP2Email->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_CP2Email" name="x_CP2Email" id="x_CP2Email" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Email->getPlaceHolder()) ?>" value="<?= $Page->CP2Email->EditValue ?>"<?= $Page->CP2Email->editAttributes() ?> aria-describedby="x_CP2Email_help">
<?= $Page->CP2Email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CP2Email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_pharmacy_suppliers_Type" for="x_Type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Type">
<input type="<?= $Page->Type->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>" value="<?= $Page->Type->EditValue ?>"<?= $Page->Type->editAttributes() ?> aria-describedby="x_Type_help">
<?= $Page->Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
    <div id="r_Creditterms" class="form-group row">
        <label id="elh_pharmacy_suppliers_Creditterms" for="x_Creditterms" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Creditterms->caption() ?><?= $Page->Creditterms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Creditterms->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Creditterms">
<input type="<?= $Page->Creditterms->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Creditterms" name="x_Creditterms" id="x_Creditterms" size="30" maxlength="120" placeholder="<?= HtmlEncode($Page->Creditterms->getPlaceHolder()) ?>" value="<?= $Page->Creditterms->EditValue ?>"<?= $Page->Creditterms->editAttributes() ?> aria-describedby="x_Creditterms_help">
<?= $Page->Creditterms->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Creditterms->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pharmacy_suppliers_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="120" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
    <div id="r_Tinnumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_Tinnumber" for="x_Tinnumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tinnumber->caption() ?><?= $Page->Tinnumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tinnumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Tinnumber">
<input type="<?= $Page->Tinnumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Tinnumber" name="x_Tinnumber" id="x_Tinnumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Tinnumber->getPlaceHolder()) ?>" value="<?= $Page->Tinnumber->EditValue ?>"<?= $Page->Tinnumber->editAttributes() ?> aria-describedby="x_Tinnumber_help">
<?= $Page->Tinnumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tinnumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
    <div id="r_Universalsuppliercode" class="form-group row">
        <label id="elh_pharmacy_suppliers_Universalsuppliercode" for="x_Universalsuppliercode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Universalsuppliercode->caption() ?><?= $Page->Universalsuppliercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Universalsuppliercode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Universalsuppliercode">
<input type="<?= $Page->Universalsuppliercode->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Universalsuppliercode" name="x_Universalsuppliercode" id="x_Universalsuppliercode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Universalsuppliercode->getPlaceHolder()) ?>" value="<?= $Page->Universalsuppliercode->EditValue ?>"<?= $Page->Universalsuppliercode->editAttributes() ?> aria-describedby="x_Universalsuppliercode_help">
<?= $Page->Universalsuppliercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Universalsuppliercode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
    <div id="r_Mobilenumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_Mobilenumber" for="x_Mobilenumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mobilenumber->caption() ?><?= $Page->Mobilenumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobilenumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Mobilenumber">
<input type="<?= $Page->Mobilenumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_Mobilenumber" name="x_Mobilenumber" id="x_Mobilenumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Mobilenumber->getPlaceHolder()) ?>" value="<?= $Page->Mobilenumber->EditValue ?>"<?= $Page->Mobilenumber->editAttributes() ?> aria-describedby="x_Mobilenumber_help">
<?= $Page->Mobilenumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobilenumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
    <div id="r_PANNumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_PANNumber" for="x_PANNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PANNumber->caption() ?><?= $Page->PANNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PANNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_PANNumber">
<input type="<?= $Page->PANNumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_PANNumber" name="x_PANNumber" id="x_PANNumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PANNumber->getPlaceHolder()) ?>" value="<?= $Page->PANNumber->EditValue ?>"<?= $Page->PANNumber->editAttributes() ?> aria-describedby="x_PANNumber_help">
<?= $Page->PANNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PANNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
    <div id="r_SalesRepMobileNo" class="form-group row">
        <label id="elh_pharmacy_suppliers_SalesRepMobileNo" for="x_SalesRepMobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalesRepMobileNo->caption() ?><?= $Page->SalesRepMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_SalesRepMobileNo">
<input type="<?= $Page->SalesRepMobileNo->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_SalesRepMobileNo" name="x_SalesRepMobileNo" id="x_SalesRepMobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SalesRepMobileNo->getPlaceHolder()) ?>" value="<?= $Page->SalesRepMobileNo->EditValue ?>"<?= $Page->SalesRepMobileNo->editAttributes() ?> aria-describedby="x_SalesRepMobileNo_help">
<?= $Page->SalesRepMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalesRepMobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
    <div id="r_GSTNumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_GSTNumber" for="x_GSTNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GSTNumber->caption() ?><?= $Page->GSTNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GSTNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_GSTNumber">
<input type="<?= $Page->GSTNumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_GSTNumber" name="x_GSTNumber" id="x_GSTNumber" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->GSTNumber->getPlaceHolder()) ?>" value="<?= $Page->GSTNumber->EditValue ?>"<?= $Page->GSTNumber->editAttributes() ?> aria-describedby="x_GSTNumber_help">
<?= $Page->GSTNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GSTNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
    <div id="r_TANNumber" class="form-group row">
        <label id="elh_pharmacy_suppliers_TANNumber" for="x_TANNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TANNumber->caption() ?><?= $Page->TANNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TANNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_TANNumber">
<input type="<?= $Page->TANNumber->getInputTextType() ?>" data-table="pharmacy_suppliers" data-field="x_TANNumber" name="x_TANNumber" id="x_TANNumber" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->TANNumber->getPlaceHolder()) ?>" value="<?= $Page->TANNumber->EditValue ?>"<?= $Page->TANNumber->editAttributes() ?> aria-describedby="x_TANNumber_help">
<?= $Page->TANNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TANNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_suppliers_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_suppliers" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("pharmacy_suppliers");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
