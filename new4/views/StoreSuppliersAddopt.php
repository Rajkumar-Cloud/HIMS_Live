<?php

namespace PHPMaker2021\HIMS;

// Page object
$StoreSuppliersAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_suppliersaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fstore_suppliersaddopt = currentForm = new ew.Form("fstore_suppliersaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "store_suppliers")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.store_suppliers)
        ew.vars.tables.store_suppliers = currentTable;
    fstore_suppliersaddopt.addFields([
        ["Suppliercode", [fields.Suppliercode.visible && fields.Suppliercode.required ? ew.Validators.required(fields.Suppliercode.caption) : null], fields.Suppliercode.isInvalid],
        ["Suppliername", [fields.Suppliername.visible && fields.Suppliername.required ? ew.Validators.required(fields.Suppliername.caption) : null], fields.Suppliername.isInvalid],
        ["Abbreviation", [fields.Abbreviation.visible && fields.Abbreviation.required ? ew.Validators.required(fields.Abbreviation.caption) : null], fields.Abbreviation.isInvalid],
        ["Creationdate", [fields.Creationdate.visible && fields.Creationdate.required ? ew.Validators.required(fields.Creationdate.caption) : null, ew.Validators.datetime(0)], fields.Creationdate.isInvalid],
        ["Address1", [fields.Address1.visible && fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.visible && fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.visible && fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["Citycode", [fields.Citycode.visible && fields.Citycode.required ? ew.Validators.required(fields.Citycode.caption) : null, ew.Validators.integer], fields.Citycode.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.visible && fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Tngstnumber", [fields.Tngstnumber.visible && fields.Tngstnumber.required ? ew.Validators.required(fields.Tngstnumber.caption) : null], fields.Tngstnumber.isInvalid],
        ["Phone", [fields.Phone.visible && fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.visible && fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["_Email", [fields._Email.visible && fields._Email.required ? ew.Validators.required(fields._Email.caption) : null], fields._Email.isInvalid],
        ["Paymentmode", [fields.Paymentmode.visible && fields.Paymentmode.required ? ew.Validators.required(fields.Paymentmode.caption) : null], fields.Paymentmode.isInvalid],
        ["Contactperson1", [fields.Contactperson1.visible && fields.Contactperson1.required ? ew.Validators.required(fields.Contactperson1.caption) : null], fields.Contactperson1.isInvalid],
        ["CP1Address1", [fields.CP1Address1.visible && fields.CP1Address1.required ? ew.Validators.required(fields.CP1Address1.caption) : null], fields.CP1Address1.isInvalid],
        ["CP1Address2", [fields.CP1Address2.visible && fields.CP1Address2.required ? ew.Validators.required(fields.CP1Address2.caption) : null], fields.CP1Address2.isInvalid],
        ["CP1Address3", [fields.CP1Address3.visible && fields.CP1Address3.required ? ew.Validators.required(fields.CP1Address3.caption) : null], fields.CP1Address3.isInvalid],
        ["CP1Citycode", [fields.CP1Citycode.visible && fields.CP1Citycode.required ? ew.Validators.required(fields.CP1Citycode.caption) : null, ew.Validators.integer], fields.CP1Citycode.isInvalid],
        ["CP1State", [fields.CP1State.visible && fields.CP1State.required ? ew.Validators.required(fields.CP1State.caption) : null], fields.CP1State.isInvalid],
        ["CP1Pincode", [fields.CP1Pincode.visible && fields.CP1Pincode.required ? ew.Validators.required(fields.CP1Pincode.caption) : null], fields.CP1Pincode.isInvalid],
        ["CP1Designation", [fields.CP1Designation.visible && fields.CP1Designation.required ? ew.Validators.required(fields.CP1Designation.caption) : null], fields.CP1Designation.isInvalid],
        ["CP1Phone", [fields.CP1Phone.visible && fields.CP1Phone.required ? ew.Validators.required(fields.CP1Phone.caption) : null], fields.CP1Phone.isInvalid],
        ["CP1MobileNo", [fields.CP1MobileNo.visible && fields.CP1MobileNo.required ? ew.Validators.required(fields.CP1MobileNo.caption) : null], fields.CP1MobileNo.isInvalid],
        ["CP1Fax", [fields.CP1Fax.visible && fields.CP1Fax.required ? ew.Validators.required(fields.CP1Fax.caption) : null], fields.CP1Fax.isInvalid],
        ["CP1Email", [fields.CP1Email.visible && fields.CP1Email.required ? ew.Validators.required(fields.CP1Email.caption) : null], fields.CP1Email.isInvalid],
        ["Contactperson2", [fields.Contactperson2.visible && fields.Contactperson2.required ? ew.Validators.required(fields.Contactperson2.caption) : null], fields.Contactperson2.isInvalid],
        ["CP2Address1", [fields.CP2Address1.visible && fields.CP2Address1.required ? ew.Validators.required(fields.CP2Address1.caption) : null], fields.CP2Address1.isInvalid],
        ["CP2Address2", [fields.CP2Address2.visible && fields.CP2Address2.required ? ew.Validators.required(fields.CP2Address2.caption) : null], fields.CP2Address2.isInvalid],
        ["CP2Address3", [fields.CP2Address3.visible && fields.CP2Address3.required ? ew.Validators.required(fields.CP2Address3.caption) : null], fields.CP2Address3.isInvalid],
        ["CP2Citycode", [fields.CP2Citycode.visible && fields.CP2Citycode.required ? ew.Validators.required(fields.CP2Citycode.caption) : null, ew.Validators.integer], fields.CP2Citycode.isInvalid],
        ["CP2State", [fields.CP2State.visible && fields.CP2State.required ? ew.Validators.required(fields.CP2State.caption) : null], fields.CP2State.isInvalid],
        ["CP2Pincode", [fields.CP2Pincode.visible && fields.CP2Pincode.required ? ew.Validators.required(fields.CP2Pincode.caption) : null], fields.CP2Pincode.isInvalid],
        ["CP2Designation", [fields.CP2Designation.visible && fields.CP2Designation.required ? ew.Validators.required(fields.CP2Designation.caption) : null], fields.CP2Designation.isInvalid],
        ["CP2Phone", [fields.CP2Phone.visible && fields.CP2Phone.required ? ew.Validators.required(fields.CP2Phone.caption) : null], fields.CP2Phone.isInvalid],
        ["CP2MobileNo", [fields.CP2MobileNo.visible && fields.CP2MobileNo.required ? ew.Validators.required(fields.CP2MobileNo.caption) : null], fields.CP2MobileNo.isInvalid],
        ["CP2Fax", [fields.CP2Fax.visible && fields.CP2Fax.required ? ew.Validators.required(fields.CP2Fax.caption) : null], fields.CP2Fax.isInvalid],
        ["CP2Email", [fields.CP2Email.visible && fields.CP2Email.required ? ew.Validators.required(fields.CP2Email.caption) : null], fields.CP2Email.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["Creditterms", [fields.Creditterms.visible && fields.Creditterms.required ? ew.Validators.required(fields.Creditterms.caption) : null], fields.Creditterms.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["Tinnumber", [fields.Tinnumber.visible && fields.Tinnumber.required ? ew.Validators.required(fields.Tinnumber.caption) : null], fields.Tinnumber.isInvalid],
        ["Universalsuppliercode", [fields.Universalsuppliercode.visible && fields.Universalsuppliercode.required ? ew.Validators.required(fields.Universalsuppliercode.caption) : null], fields.Universalsuppliercode.isInvalid],
        ["Mobilenumber", [fields.Mobilenumber.visible && fields.Mobilenumber.required ? ew.Validators.required(fields.Mobilenumber.caption) : null], fields.Mobilenumber.isInvalid],
        ["PANNumber", [fields.PANNumber.visible && fields.PANNumber.required ? ew.Validators.required(fields.PANNumber.caption) : null], fields.PANNumber.isInvalid],
        ["SalesRepMobileNo", [fields.SalesRepMobileNo.visible && fields.SalesRepMobileNo.required ? ew.Validators.required(fields.SalesRepMobileNo.caption) : null], fields.SalesRepMobileNo.isInvalid],
        ["GSTNumber", [fields.GSTNumber.visible && fields.GSTNumber.required ? ew.Validators.required(fields.GSTNumber.caption) : null], fields.GSTNumber.isInvalid],
        ["TANNumber", [fields.TANNumber.visible && fields.TANNumber.required ? ew.Validators.required(fields.TANNumber.caption) : null], fields.TANNumber.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["BranchID", [fields.BranchID.visible && fields.BranchID.required ? ew.Validators.required(fields.BranchID.caption) : null, ew.Validators.integer], fields.BranchID.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null, ew.Validators.integer], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fstore_suppliersaddopt,
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
    fstore_suppliersaddopt.validate = function () {
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
        return true;
    }

    // Form_CustomValidate
    fstore_suppliersaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fstore_suppliersaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fstore_suppliersaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fstore_suppliersaddopt" id="fstore_suppliersaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="store_suppliers">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->Suppliercode->Visible) { // Suppliercode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Suppliercode"><?= $Page->Suppliercode->caption() ?><?= $Page->Suppliercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Suppliercode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Suppliercode" name="x_Suppliercode" id="x_Suppliercode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->Suppliercode->getPlaceHolder()) ?>" value="<?= $Page->Suppliercode->EditValue ?>"<?= $Page->Suppliercode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Suppliercode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Suppliername->Visible) { // Suppliername ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Suppliername"><?= $Page->Suppliername->caption() ?><?= $Page->Suppliername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Suppliername->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Suppliername" name="x_Suppliername" id="x_Suppliername" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->Suppliername->getPlaceHolder()) ?>" value="<?= $Page->Suppliername->EditValue ?>"<?= $Page->Suppliername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Suppliername->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Abbreviation->Visible) { // Abbreviation ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Abbreviation"><?= $Page->Abbreviation->caption() ?><?= $Page->Abbreviation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Abbreviation->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Abbreviation" name="x_Abbreviation" id="x_Abbreviation" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->Abbreviation->getPlaceHolder()) ?>" value="<?= $Page->Abbreviation->EditValue ?>"<?= $Page->Abbreviation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Abbreviation->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Creationdate->Visible) { // Creationdate ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Creationdate"><?= $Page->Creationdate->caption() ?><?= $Page->Creationdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Creationdate->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?= HtmlEncode($Page->Creationdate->getPlaceHolder()) ?>" value="<?= $Page->Creationdate->EditValue ?>"<?= $Page->Creationdate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Creationdate->getErrorMessage() ?></div>
<?php if (!$Page->Creationdate->ReadOnly && !$Page->Creationdate->Disabled && !isset($Page->Creationdate->EditAttrs["readonly"]) && !isset($Page->Creationdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_suppliersaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_suppliersaddopt", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Address1"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Address1->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Address2"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Address2->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Address3"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Address3->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Citycode->Visible) { // Citycode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Citycode"><?= $Page->Citycode->caption() ?><?= $Page->Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Citycode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Citycode" name="x_Citycode" id="x_Citycode" size="30" placeholder="<?= HtmlEncode($Page->Citycode->getPlaceHolder()) ?>" value="<?= $Page->Citycode->EditValue ?>"<?= $Page->Citycode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Citycode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="store_suppliers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Pincode"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Tngstnumber->Visible) { // Tngstnumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Tngstnumber"><?= $Page->Tngstnumber->caption() ?><?= $Page->Tngstnumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Tngstnumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Tngstnumber" name="x_Tngstnumber" id="x_Tngstnumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Tngstnumber->getPlaceHolder()) ?>" value="<?= $Page->Tngstnumber->EditValue ?>"<?= $Page->Tngstnumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tngstnumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Phone"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Fax"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->_Email->Visible) { // Email ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x__Email"><?= $Page->_Email->caption() ?><?= $Page->_Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->_Email->getInputTextType() ?>" data-table="store_suppliers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->_Email->getPlaceHolder()) ?>" value="<?= $Page->_Email->EditValue ?>"<?= $Page->_Email->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->_Email->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Paymentmode->Visible) { // Paymentmode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Paymentmode"><?= $Page->Paymentmode->caption() ?><?= $Page->Paymentmode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Paymentmode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Paymentmode" name="x_Paymentmode" id="x_Paymentmode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Paymentmode->getPlaceHolder()) ?>" value="<?= $Page->Paymentmode->EditValue ?>"<?= $Page->Paymentmode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Paymentmode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Contactperson1->Visible) { // Contactperson1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Contactperson1"><?= $Page->Contactperson1->caption() ?><?= $Page->Contactperson1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Contactperson1->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Contactperson1" name="x_Contactperson1" id="x_Contactperson1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Contactperson1->getPlaceHolder()) ?>" value="<?= $Page->Contactperson1->EditValue ?>"<?= $Page->Contactperson1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Contactperson1->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address1->Visible) { // CP1Address1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Address1"><?= $Page->CP1Address1->caption() ?><?= $Page->CP1Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Address1->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Address1" name="x_CP1Address1" id="x_CP1Address1" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->CP1Address1->getPlaceHolder()) ?>" value="<?= $Page->CP1Address1->EditValue ?>"<?= $Page->CP1Address1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Address1->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address2->Visible) { // CP1Address2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Address2"><?= $Page->CP1Address2->caption() ?><?= $Page->CP1Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Address2->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Address2" name="x_CP1Address2" id="x_CP1Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP1Address2->getPlaceHolder()) ?>" value="<?= $Page->CP1Address2->EditValue ?>"<?= $Page->CP1Address2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Address2->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Address3->Visible) { // CP1Address3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Address3"><?= $Page->CP1Address3->caption() ?><?= $Page->CP1Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Address3->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Address3" name="x_CP1Address3" id="x_CP1Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP1Address3->getPlaceHolder()) ?>" value="<?= $Page->CP1Address3->EditValue ?>"<?= $Page->CP1Address3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Address3->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Citycode->Visible) { // CP1Citycode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Citycode"><?= $Page->CP1Citycode->caption() ?><?= $Page->CP1Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Citycode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Citycode" name="x_CP1Citycode" id="x_CP1Citycode" size="30" placeholder="<?= HtmlEncode($Page->CP1Citycode->getPlaceHolder()) ?>" value="<?= $Page->CP1Citycode->EditValue ?>"<?= $Page->CP1Citycode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Citycode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1State->Visible) { // CP1State ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1State"><?= $Page->CP1State->caption() ?><?= $Page->CP1State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1State->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1State" name="x_CP1State" id="x_CP1State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1State->getPlaceHolder()) ?>" value="<?= $Page->CP1State->EditValue ?>"<?= $Page->CP1State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1State->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Pincode->Visible) { // CP1Pincode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Pincode"><?= $Page->CP1Pincode->caption() ?><?= $Page->CP1Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Pincode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Pincode" name="x_CP1Pincode" id="x_CP1Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->CP1Pincode->getPlaceHolder()) ?>" value="<?= $Page->CP1Pincode->EditValue ?>"<?= $Page->CP1Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Pincode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Designation->Visible) { // CP1Designation ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Designation"><?= $Page->CP1Designation->caption() ?><?= $Page->CP1Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Designation->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Designation" name="x_CP1Designation" id="x_CP1Designation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Designation->getPlaceHolder()) ?>" value="<?= $Page->CP1Designation->EditValue ?>"<?= $Page->CP1Designation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Designation->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Phone->Visible) { // CP1Phone ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Phone"><?= $Page->CP1Phone->caption() ?><?= $Page->CP1Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Phone->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Phone" name="x_CP1Phone" id="x_CP1Phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Phone->getPlaceHolder()) ?>" value="<?= $Page->CP1Phone->EditValue ?>"<?= $Page->CP1Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Phone->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1MobileNo->Visible) { // CP1MobileNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1MobileNo"><?= $Page->CP1MobileNo->caption() ?><?= $Page->CP1MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1MobileNo->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1MobileNo" name="x_CP1MobileNo" id="x_CP1MobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1MobileNo->getPlaceHolder()) ?>" value="<?= $Page->CP1MobileNo->EditValue ?>"<?= $Page->CP1MobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1MobileNo->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Fax->Visible) { // CP1Fax ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Fax"><?= $Page->CP1Fax->caption() ?><?= $Page->CP1Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Fax->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Fax" name="x_CP1Fax" id="x_CP1Fax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Fax->getPlaceHolder()) ?>" value="<?= $Page->CP1Fax->EditValue ?>"<?= $Page->CP1Fax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Fax->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP1Email->Visible) { // CP1Email ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP1Email"><?= $Page->CP1Email->caption() ?><?= $Page->CP1Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP1Email->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP1Email" name="x_CP1Email" id="x_CP1Email" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP1Email->getPlaceHolder()) ?>" value="<?= $Page->CP1Email->EditValue ?>"<?= $Page->CP1Email->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP1Email->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Contactperson2->Visible) { // Contactperson2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Contactperson2"><?= $Page->Contactperson2->caption() ?><?= $Page->Contactperson2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Contactperson2->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Contactperson2" name="x_Contactperson2" id="x_Contactperson2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Contactperson2->getPlaceHolder()) ?>" value="<?= $Page->Contactperson2->EditValue ?>"<?= $Page->Contactperson2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Contactperson2->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address1->Visible) { // CP2Address1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Address1"><?= $Page->CP2Address1->caption() ?><?= $Page->CP2Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Address1->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Address1" name="x_CP2Address1" id="x_CP2Address1" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->CP2Address1->getPlaceHolder()) ?>" value="<?= $Page->CP2Address1->EditValue ?>"<?= $Page->CP2Address1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Address1->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address2->Visible) { // CP2Address2 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Address2"><?= $Page->CP2Address2->caption() ?><?= $Page->CP2Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Address2->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Address2" name="x_CP2Address2" id="x_CP2Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP2Address2->getPlaceHolder()) ?>" value="<?= $Page->CP2Address2->EditValue ?>"<?= $Page->CP2Address2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Address2->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Address3->Visible) { // CP2Address3 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Address3"><?= $Page->CP2Address3->caption() ?><?= $Page->CP2Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Address3->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Address3" name="x_CP2Address3" id="x_CP2Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->CP2Address3->getPlaceHolder()) ?>" value="<?= $Page->CP2Address3->EditValue ?>"<?= $Page->CP2Address3->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Address3->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Citycode->Visible) { // CP2Citycode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Citycode"><?= $Page->CP2Citycode->caption() ?><?= $Page->CP2Citycode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Citycode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Citycode" name="x_CP2Citycode" id="x_CP2Citycode" size="30" placeholder="<?= HtmlEncode($Page->CP2Citycode->getPlaceHolder()) ?>" value="<?= $Page->CP2Citycode->EditValue ?>"<?= $Page->CP2Citycode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Citycode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2State->Visible) { // CP2State ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2State"><?= $Page->CP2State->caption() ?><?= $Page->CP2State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2State->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2State" name="x_CP2State" id="x_CP2State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2State->getPlaceHolder()) ?>" value="<?= $Page->CP2State->EditValue ?>"<?= $Page->CP2State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2State->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Pincode->Visible) { // CP2Pincode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Pincode"><?= $Page->CP2Pincode->caption() ?><?= $Page->CP2Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Pincode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Pincode" name="x_CP2Pincode" id="x_CP2Pincode" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->CP2Pincode->getPlaceHolder()) ?>" value="<?= $Page->CP2Pincode->EditValue ?>"<?= $Page->CP2Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Pincode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Designation->Visible) { // CP2Designation ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Designation"><?= $Page->CP2Designation->caption() ?><?= $Page->CP2Designation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Designation->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Designation" name="x_CP2Designation" id="x_CP2Designation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Designation->getPlaceHolder()) ?>" value="<?= $Page->CP2Designation->EditValue ?>"<?= $Page->CP2Designation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Designation->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Phone->Visible) { // CP2Phone ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Phone"><?= $Page->CP2Phone->caption() ?><?= $Page->CP2Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Phone->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Phone" name="x_CP2Phone" id="x_CP2Phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Phone->getPlaceHolder()) ?>" value="<?= $Page->CP2Phone->EditValue ?>"<?= $Page->CP2Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Phone->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2MobileNo->Visible) { // CP2MobileNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2MobileNo"><?= $Page->CP2MobileNo->caption() ?><?= $Page->CP2MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2MobileNo->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2MobileNo" name="x_CP2MobileNo" id="x_CP2MobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2MobileNo->getPlaceHolder()) ?>" value="<?= $Page->CP2MobileNo->EditValue ?>"<?= $Page->CP2MobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2MobileNo->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Fax->Visible) { // CP2Fax ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Fax"><?= $Page->CP2Fax->caption() ?><?= $Page->CP2Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Fax->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Fax" name="x_CP2Fax" id="x_CP2Fax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Fax->getPlaceHolder()) ?>" value="<?= $Page->CP2Fax->EditValue ?>"<?= $Page->CP2Fax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Fax->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->CP2Email->Visible) { // CP2Email ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_CP2Email"><?= $Page->CP2Email->caption() ?><?= $Page->CP2Email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->CP2Email->getInputTextType() ?>" data-table="store_suppliers" data-field="x_CP2Email" name="x_CP2Email" id="x_CP2Email" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CP2Email->getPlaceHolder()) ?>" value="<?= $Page->CP2Email->EditValue ?>"<?= $Page->CP2Email->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CP2Email->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Type"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Type->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>" value="<?= $Page->Type->EditValue ?>"<?= $Page->Type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Creditterms->Visible) { // Creditterms ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Creditterms"><?= $Page->Creditterms->caption() ?><?= $Page->Creditterms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Creditterms->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Creditterms" name="x_Creditterms" id="x_Creditterms" size="30" maxlength="120" placeholder="<?= HtmlEncode($Page->Creditterms->getPlaceHolder()) ?>" value="<?= $Page->Creditterms->EditValue ?>"<?= $Page->Creditterms->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Creditterms->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="120" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Tinnumber->Visible) { // Tinnumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Tinnumber"><?= $Page->Tinnumber->caption() ?><?= $Page->Tinnumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Tinnumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Tinnumber" name="x_Tinnumber" id="x_Tinnumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Tinnumber->getPlaceHolder()) ?>" value="<?= $Page->Tinnumber->EditValue ?>"<?= $Page->Tinnumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tinnumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Universalsuppliercode"><?= $Page->Universalsuppliercode->caption() ?><?= $Page->Universalsuppliercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Universalsuppliercode->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Universalsuppliercode" name="x_Universalsuppliercode" id="x_Universalsuppliercode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Universalsuppliercode->getPlaceHolder()) ?>" value="<?= $Page->Universalsuppliercode->EditValue ?>"<?= $Page->Universalsuppliercode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Universalsuppliercode->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Mobilenumber->Visible) { // Mobilenumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_Mobilenumber"><?= $Page->Mobilenumber->caption() ?><?= $Page->Mobilenumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->Mobilenumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_Mobilenumber" name="x_Mobilenumber" id="x_Mobilenumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Mobilenumber->getPlaceHolder()) ?>" value="<?= $Page->Mobilenumber->EditValue ?>"<?= $Page->Mobilenumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Mobilenumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PANNumber->Visible) { // PANNumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PANNumber"><?= $Page->PANNumber->caption() ?><?= $Page->PANNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PANNumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_PANNumber" name="x_PANNumber" id="x_PANNumber" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PANNumber->getPlaceHolder()) ?>" value="<?= $Page->PANNumber->EditValue ?>"<?= $Page->PANNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PANNumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SalesRepMobileNo"><?= $Page->SalesRepMobileNo->caption() ?><?= $Page->SalesRepMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SalesRepMobileNo->getInputTextType() ?>" data-table="store_suppliers" data-field="x_SalesRepMobileNo" name="x_SalesRepMobileNo" id="x_SalesRepMobileNo" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SalesRepMobileNo->getPlaceHolder()) ?>" value="<?= $Page->SalesRepMobileNo->EditValue ?>"<?= $Page->SalesRepMobileNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalesRepMobileNo->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->GSTNumber->Visible) { // GSTNumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_GSTNumber"><?= $Page->GSTNumber->caption() ?><?= $Page->GSTNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->GSTNumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_GSTNumber" name="x_GSTNumber" id="x_GSTNumber" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->GSTNumber->getPlaceHolder()) ?>" value="<?= $Page->GSTNumber->EditValue ?>"<?= $Page->GSTNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GSTNumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TANNumber->Visible) { // TANNumber ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TANNumber"><?= $Page->TANNumber->caption() ?><?= $Page->TANNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TANNumber->getInputTextType() ?>" data-table="store_suppliers" data-field="x_TANNumber" name="x_TANNumber" id="x_TANNumber" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->TANNumber->getPlaceHolder()) ?>" value="<?= $Page->TANNumber->EditValue ?>"<?= $Page->TANNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TANNumber->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_HospID"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="store_suppliers" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->BranchID->Visible) { // BranchID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_BranchID"><?= $Page->BranchID->caption() ?><?= $Page->BranchID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->BranchID->getInputTextType() ?>" data-table="store_suppliers" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?= HtmlEncode($Page->BranchID->getPlaceHolder()) ?>" value="<?= $Page->BranchID->EditValue ?>"<?= $Page->BranchID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BranchID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_StoreID"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->StoreID->getInputTextType() ?>" data-table="store_suppliers" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?= HtmlEncode($Page->StoreID->getPlaceHolder()) ?>" value="<?= $Page->StoreID->EditValue ?>"<?= $Page->StoreID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("store_suppliers");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
