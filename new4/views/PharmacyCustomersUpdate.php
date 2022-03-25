<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyCustomersUpdate = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_customersupdate;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "update";
    fpharmacy_customersupdate = currentForm = new ew.Form("fpharmacy_customersupdate", "update");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_customers")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_customers)
        ew.vars.tables.pharmacy_customers = currentTable;
    fpharmacy_customersupdate.addFields([
        ["Customercode", [fields.Customercode.visible && fields.Customercode.required ? ew.Validators.required(fields.Customercode.caption) : null, ew.Validators.integer, ew.Validators.selected], fields.Customercode.isInvalid],
        ["Customername", [fields.Customername.visible && fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["Address1", [fields.Address1.visible && fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.visible && fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.visible && fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.visible && fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Phone", [fields.Phone.visible && fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.visible && fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["_Email", [fields._Email.visible && fields._Email.required ? ew.Validators.required(fields._Email.caption) : null], fields._Email.isInvalid],
        ["Ratetype", [fields.Ratetype.visible && fields.Ratetype.required ? ew.Validators.required(fields.Ratetype.caption) : null], fields.Ratetype.isInvalid],
        ["Creationdate", [fields.Creationdate.visible && fields.Creationdate.required ? ew.Validators.required(fields.Creationdate.caption) : null, ew.Validators.datetime(0), ew.Validators.selected], fields.Creationdate.isInvalid],
        ["ContactPerson", [fields.ContactPerson.visible && fields.ContactPerson.required ? ew.Validators.required(fields.ContactPerson.caption) : null], fields.ContactPerson.isInvalid],
        ["CPPhone", [fields.CPPhone.visible && fields.CPPhone.required ? ew.Validators.required(fields.CPPhone.caption) : null], fields.CPPhone.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_customersupdate,
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
    fpharmacy_customersupdate.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        if (!ew.updateSelected(fobj)) {
            ew.alert(ew.language.phrase("NoFieldSelected"));
            return false;
        }
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
    fpharmacy_customersupdate.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_customersupdate.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_customersupdate");
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
<form name="fpharmacy_customersupdate" id="fpharmacy_customersupdate" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_customers">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_pharmacy_customersupdate" class="ew-update-div"><!-- page -->
    <?php if (!$Page->isConfirm()) { // Confirm page ?>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?= $Language->phrase("UpdateSelectAll") ?></label>
    </div>
    <?php } ?>
<?php if ($Page->Customercode->Visible && (!$Page->isConfirm() || $Page->Customercode->multiUpdateSelected())) { // Customercode ?>
    <div id="r_Customercode" class="form-group row">
        <label for="x_Customercode" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Customercode" id="u_Customercode" class="custom-control-input ew-multi-select" value="1"<?= $Page->Customercode->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Customercode"><?= $Page->Customercode->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Customercode->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Customercode">
                <input type="<?= $Page->Customercode->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" placeholder="<?= HtmlEncode($Page->Customercode->getPlaceHolder()) ?>" value="<?= $Page->Customercode->EditValue ?>"<?= $Page->Customercode->editAttributes() ?> aria-describedby="x_Customercode_help">
                <?= $Page->Customercode->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Customercode->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible && (!$Page->isConfirm() || $Page->Customername->multiUpdateSelected())) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label for="x_Customername" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Customername" id="u_Customername" class="custom-control-input ew-multi-select" value="1"<?= $Page->Customername->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Customername"><?= $Page->Customername->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Customername->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Customername">
                <textarea data-table="pharmacy_customers" data-field="x_Customername" name="x_Customername" id="x_Customername" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>"<?= $Page->Customername->editAttributes() ?> aria-describedby="x_Customername_help"><?= $Page->Customername->EditValue ?></textarea>
                <?= $Page->Customername->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Customername->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible && (!$Page->isConfirm() || $Page->Address1->multiUpdateSelected())) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label for="x_Address1" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Address1" id="u_Address1" class="custom-control-input ew-multi-select" value="1"<?= $Page->Address1->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Address1"><?= $Page->Address1->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Address1->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Address1">
                <input type="<?= $Page->Address1->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help">
                <?= $Page->Address1->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible && (!$Page->isConfirm() || $Page->Address2->multiUpdateSelected())) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label for="x_Address2" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Address2" id="u_Address2" class="custom-control-input ew-multi-select" value="1"<?= $Page->Address2->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Address2"><?= $Page->Address2->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Address2->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Address2">
                <input type="<?= $Page->Address2->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help">
                <?= $Page->Address2->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible && (!$Page->isConfirm() || $Page->Address3->multiUpdateSelected())) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label for="x_Address3" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Address3" id="u_Address3" class="custom-control-input ew-multi-select" value="1"<?= $Page->Address3->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Address3"><?= $Page->Address3->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Address3->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Address3">
                <input type="<?= $Page->Address3->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help">
                <?= $Page->Address3->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible && (!$Page->isConfirm() || $Page->State->multiUpdateSelected())) { // State ?>
    <div id="r_State" class="form-group row">
        <label for="x_State" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_State" id="u_State" class="custom-control-input ew-multi-select" value="1"<?= $Page->State->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_State"><?= $Page->State->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->State->cellAttributes() ?>>
                <span id="el_pharmacy_customers_State">
                <input type="<?= $Page->State->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
                <?= $Page->State->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible && (!$Page->isConfirm() || $Page->Pincode->multiUpdateSelected())) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label for="x_Pincode" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Pincode" id="u_Pincode" class="custom-control-input ew-multi-select" value="1"<?= $Page->Pincode->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Pincode"><?= $Page->Pincode->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Pincode->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Pincode">
                <input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
                <?= $Page->Pincode->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible && (!$Page->isConfirm() || $Page->Phone->multiUpdateSelected())) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label for="x_Phone" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Phone" id="u_Phone" class="custom-control-input ew-multi-select" value="1"<?= $Page->Phone->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Phone"><?= $Page->Phone->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Phone->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Phone">
                <input type="<?= $Page->Phone->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
                <?= $Page->Phone->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible && (!$Page->isConfirm() || $Page->Fax->multiUpdateSelected())) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label for="x_Fax" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Fax" id="u_Fax" class="custom-control-input ew-multi-select" value="1"<?= $Page->Fax->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Fax"><?= $Page->Fax->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Fax->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Fax">
                <input type="<?= $Page->Fax->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
                <?= $Page->Fax->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->_Email->Visible && (!$Page->isConfirm() || $Page->_Email->multiUpdateSelected())) { // Email ?>
    <div id="r__Email" class="form-group row">
        <label for="x__Email" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u__Email" id="u__Email" class="custom-control-input ew-multi-select" value="1"<?= $Page->_Email->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u__Email"><?= $Page->_Email->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->_Email->cellAttributes() ?>>
                <span id="el_pharmacy_customers__Email">
                <input type="<?= $Page->_Email->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->_Email->getPlaceHolder()) ?>" value="<?= $Page->_Email->EditValue ?>"<?= $Page->_Email->editAttributes() ?> aria-describedby="x__Email_help">
                <?= $Page->_Email->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->_Email->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Ratetype->Visible && (!$Page->isConfirm() || $Page->Ratetype->multiUpdateSelected())) { // Ratetype ?>
    <div id="r_Ratetype" class="form-group row">
        <label for="x_Ratetype" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Ratetype" id="u_Ratetype" class="custom-control-input ew-multi-select" value="1"<?= $Page->Ratetype->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Ratetype"><?= $Page->Ratetype->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Ratetype->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Ratetype">
                <input type="<?= $Page->Ratetype->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Ratetype" name="x_Ratetype" id="x_Ratetype" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->Ratetype->getPlaceHolder()) ?>" value="<?= $Page->Ratetype->EditValue ?>"<?= $Page->Ratetype->editAttributes() ?> aria-describedby="x_Ratetype_help">
                <?= $Page->Ratetype->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Ratetype->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->Creationdate->Visible && (!$Page->isConfirm() || $Page->Creationdate->multiUpdateSelected())) { // Creationdate ?>
    <div id="r_Creationdate" class="form-group row">
        <label for="x_Creationdate" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_Creationdate" id="u_Creationdate" class="custom-control-input ew-multi-select" value="1"<?= $Page->Creationdate->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_Creationdate"><?= $Page->Creationdate->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->Creationdate->cellAttributes() ?>>
                <span id="el_pharmacy_customers_Creationdate">
                <input type="<?= $Page->Creationdate->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?= HtmlEncode($Page->Creationdate->getPlaceHolder()) ?>" value="<?= $Page->Creationdate->EditValue ?>"<?= $Page->Creationdate->editAttributes() ?> aria-describedby="x_Creationdate_help">
                <?= $Page->Creationdate->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->Creationdate->getErrorMessage() ?></div>
                <?php if (!$Page->Creationdate->ReadOnly && !$Page->Creationdate->Disabled && !isset($Page->Creationdate->EditAttrs["readonly"]) && !isset($Page->Creationdate->EditAttrs["disabled"])) { ?>
                <script>
                loadjs.ready(["fpharmacy_customersupdate", "datetimepicker"], function() {
                    ew.createDateTimePicker("fpharmacy_customersupdate", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
                });
                </script>
                <?php } ?>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->ContactPerson->Visible && (!$Page->isConfirm() || $Page->ContactPerson->multiUpdateSelected())) { // ContactPerson ?>
    <div id="r_ContactPerson" class="form-group row">
        <label for="x_ContactPerson" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_ContactPerson" id="u_ContactPerson" class="custom-control-input ew-multi-select" value="1"<?= $Page->ContactPerson->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_ContactPerson"><?= $Page->ContactPerson->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->ContactPerson->cellAttributes() ?>>
                <span id="el_pharmacy_customers_ContactPerson">
                <input type="<?= $Page->ContactPerson->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_ContactPerson" name="x_ContactPerson" id="x_ContactPerson" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->ContactPerson->getPlaceHolder()) ?>" value="<?= $Page->ContactPerson->EditValue ?>"<?= $Page->ContactPerson->editAttributes() ?> aria-describedby="x_ContactPerson_help">
                <?= $Page->ContactPerson->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->ContactPerson->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($Page->CPPhone->Visible && (!$Page->isConfirm() || $Page->CPPhone->multiUpdateSelected())) { // CPPhone ?>
    <div id="r_CPPhone" class="form-group row">
        <label for="x_CPPhone" class="<?= $Page->LeftColumnClass ?>">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="u_CPPhone" id="u_CPPhone" class="custom-control-input ew-multi-select" value="1"<?= $Page->CPPhone->multiUpdateSelected() ? " checked" : "" ?>>
                <label class="custom-control-label" for="u_CPPhone"><?= $Page->CPPhone->caption() ?></label>
            </div>
        </label>
        <div class="<?= $Page->RightColumnClass ?>">
            <div <?= $Page->CPPhone->cellAttributes() ?>>
                <span id="el_pharmacy_customers_CPPhone">
                <input type="<?= $Page->CPPhone->getInputTextType() ?>" data-table="pharmacy_customers" data-field="x_CPPhone" name="x_CPPhone" id="x_CPPhone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CPPhone->getPlaceHolder()) ?>" value="<?= $Page->CPPhone->EditValue ?>"<?= $Page->CPPhone->editAttributes() ?> aria-describedby="x_CPPhone_help">
                <?= $Page->CPPhone->getCustomMessage() ?>
                <div class="invalid-feedback"><?= $Page->CPPhone->getErrorMessage() ?></div>
                </span>
            </div>
        </div>
    </div>
<?php } ?>
</div><!-- /page -->
<?php if (!$Page->IsModal) { ?>
    <div class="form-group row"><!-- buttons .form-group -->
        <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("UpdateBtn") ?></button>
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
    ew.addEventHandlers("pharmacy_customers");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
