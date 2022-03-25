<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeaddetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leaddetailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_leaddetailsedit = currentForm = new ew.Form("fcrm_leaddetailsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leaddetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leaddetails)
        ew.vars.tables.crm_leaddetails = currentTable;
    fcrm_leaddetailsedit.addFields([
        ["leadid", [fields.leadid.visible && fields.leadid.required ? ew.Validators.required(fields.leadid.caption) : null, ew.Validators.integer], fields.leadid.isInvalid],
        ["lead_no", [fields.lead_no.visible && fields.lead_no.required ? ew.Validators.required(fields.lead_no.caption) : null], fields.lead_no.isInvalid],
        ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
        ["interest", [fields.interest.visible && fields.interest.required ? ew.Validators.required(fields.interest.caption) : null], fields.interest.isInvalid],
        ["firstname", [fields.firstname.visible && fields.firstname.required ? ew.Validators.required(fields.firstname.caption) : null], fields.firstname.isInvalid],
        ["salutation", [fields.salutation.visible && fields.salutation.required ? ew.Validators.required(fields.salutation.caption) : null], fields.salutation.isInvalid],
        ["lastname", [fields.lastname.visible && fields.lastname.required ? ew.Validators.required(fields.lastname.caption) : null], fields.lastname.isInvalid],
        ["company", [fields.company.visible && fields.company.required ? ew.Validators.required(fields.company.caption) : null], fields.company.isInvalid],
        ["annualrevenue", [fields.annualrevenue.visible && fields.annualrevenue.required ? ew.Validators.required(fields.annualrevenue.caption) : null, ew.Validators.float], fields.annualrevenue.isInvalid],
        ["industry", [fields.industry.visible && fields.industry.required ? ew.Validators.required(fields.industry.caption) : null], fields.industry.isInvalid],
        ["campaign", [fields.campaign.visible && fields.campaign.required ? ew.Validators.required(fields.campaign.caption) : null], fields.campaign.isInvalid],
        ["leadstatus", [fields.leadstatus.visible && fields.leadstatus.required ? ew.Validators.required(fields.leadstatus.caption) : null], fields.leadstatus.isInvalid],
        ["leadsource", [fields.leadsource.visible && fields.leadsource.required ? ew.Validators.required(fields.leadsource.caption) : null], fields.leadsource.isInvalid],
        ["converted", [fields.converted.visible && fields.converted.required ? ew.Validators.required(fields.converted.caption) : null, ew.Validators.integer], fields.converted.isInvalid],
        ["licencekeystatus", [fields.licencekeystatus.visible && fields.licencekeystatus.required ? ew.Validators.required(fields.licencekeystatus.caption) : null], fields.licencekeystatus.isInvalid],
        ["space", [fields.space.visible && fields.space.required ? ew.Validators.required(fields.space.caption) : null], fields.space.isInvalid],
        ["comments", [fields.comments.visible && fields.comments.required ? ew.Validators.required(fields.comments.caption) : null], fields.comments.isInvalid],
        ["priority", [fields.priority.visible && fields.priority.required ? ew.Validators.required(fields.priority.caption) : null], fields.priority.isInvalid],
        ["demorequest", [fields.demorequest.visible && fields.demorequest.required ? ew.Validators.required(fields.demorequest.caption) : null], fields.demorequest.isInvalid],
        ["partnercontact", [fields.partnercontact.visible && fields.partnercontact.required ? ew.Validators.required(fields.partnercontact.caption) : null], fields.partnercontact.isInvalid],
        ["productversion", [fields.productversion.visible && fields.productversion.required ? ew.Validators.required(fields.productversion.caption) : null], fields.productversion.isInvalid],
        ["product", [fields.product.visible && fields.product.required ? ew.Validators.required(fields.product.caption) : null], fields.product.isInvalid],
        ["maildate", [fields.maildate.visible && fields.maildate.required ? ew.Validators.required(fields.maildate.caption) : null, ew.Validators.datetime(0)], fields.maildate.isInvalid],
        ["nextstepdate", [fields.nextstepdate.visible && fields.nextstepdate.required ? ew.Validators.required(fields.nextstepdate.caption) : null, ew.Validators.datetime(0)], fields.nextstepdate.isInvalid],
        ["fundingsituation", [fields.fundingsituation.visible && fields.fundingsituation.required ? ew.Validators.required(fields.fundingsituation.caption) : null], fields.fundingsituation.isInvalid],
        ["purpose", [fields.purpose.visible && fields.purpose.required ? ew.Validators.required(fields.purpose.caption) : null], fields.purpose.isInvalid],
        ["evaluationstatus", [fields.evaluationstatus.visible && fields.evaluationstatus.required ? ew.Validators.required(fields.evaluationstatus.caption) : null], fields.evaluationstatus.isInvalid],
        ["transferdate", [fields.transferdate.visible && fields.transferdate.required ? ew.Validators.required(fields.transferdate.caption) : null, ew.Validators.datetime(0)], fields.transferdate.isInvalid],
        ["revenuetype", [fields.revenuetype.visible && fields.revenuetype.required ? ew.Validators.required(fields.revenuetype.caption) : null], fields.revenuetype.isInvalid],
        ["noofemployees", [fields.noofemployees.visible && fields.noofemployees.required ? ew.Validators.required(fields.noofemployees.caption) : null, ew.Validators.integer], fields.noofemployees.isInvalid],
        ["secondaryemail", [fields.secondaryemail.visible && fields.secondaryemail.required ? ew.Validators.required(fields.secondaryemail.caption) : null], fields.secondaryemail.isInvalid],
        ["noapprovalcalls", [fields.noapprovalcalls.visible && fields.noapprovalcalls.required ? ew.Validators.required(fields.noapprovalcalls.caption) : null, ew.Validators.integer], fields.noapprovalcalls.isInvalid],
        ["noapprovalemails", [fields.noapprovalemails.visible && fields.noapprovalemails.required ? ew.Validators.required(fields.noapprovalemails.caption) : null, ew.Validators.integer], fields.noapprovalemails.isInvalid],
        ["vat_id", [fields.vat_id.visible && fields.vat_id.required ? ew.Validators.required(fields.vat_id.caption) : null], fields.vat_id.isInvalid],
        ["registration_number_1", [fields.registration_number_1.visible && fields.registration_number_1.required ? ew.Validators.required(fields.registration_number_1.caption) : null], fields.registration_number_1.isInvalid],
        ["registration_number_2", [fields.registration_number_2.visible && fields.registration_number_2.required ? ew.Validators.required(fields.registration_number_2.caption) : null], fields.registration_number_2.isInvalid],
        ["verification", [fields.verification.visible && fields.verification.required ? ew.Validators.required(fields.verification.caption) : null], fields.verification.isInvalid],
        ["subindustry", [fields.subindustry.visible && fields.subindustry.required ? ew.Validators.required(fields.subindustry.caption) : null], fields.subindustry.isInvalid],
        ["atenttion", [fields.atenttion.visible && fields.atenttion.required ? ew.Validators.required(fields.atenttion.caption) : null], fields.atenttion.isInvalid],
        ["leads_relation", [fields.leads_relation.visible && fields.leads_relation.required ? ew.Validators.required(fields.leads_relation.caption) : null], fields.leads_relation.isInvalid],
        ["legal_form", [fields.legal_form.visible && fields.legal_form.required ? ew.Validators.required(fields.legal_form.caption) : null], fields.legal_form.isInvalid],
        ["sum_time", [fields.sum_time.visible && fields.sum_time.required ? ew.Validators.required(fields.sum_time.caption) : null, ew.Validators.float], fields.sum_time.isInvalid],
        ["active", [fields.active.visible && fields.active.required ? ew.Validators.required(fields.active.caption) : null, ew.Validators.integer], fields.active.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leaddetailsedit,
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
    fcrm_leaddetailsedit.validate = function () {
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
    fcrm_leaddetailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leaddetailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leaddetailsedit");
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
<form name="fcrm_leaddetailsedit" id="fcrm_leaddetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->leadid->Visible) { // leadid ?>
    <div id="r_leadid" class="form-group row">
        <label id="elh_crm_leaddetails_leadid" for="x_leadid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadid->caption() ?><?= $Page->leadid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadid->cellAttributes() ?>>
<input type="<?= $Page->leadid->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_leadid" name="x_leadid" id="x_leadid" size="30" placeholder="<?= HtmlEncode($Page->leadid->getPlaceHolder()) ?>" value="<?= $Page->leadid->EditValue ?>"<?= $Page->leadid->editAttributes() ?> aria-describedby="x_leadid_help">
<?= $Page->leadid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadid->getErrorMessage() ?></div>
<input type="hidden" data-table="crm_leaddetails" data-field="x_leadid" data-hidden="1" name="o_leadid" id="o_leadid" value="<?= HtmlEncode($Page->leadid->OldValue ?? $Page->leadid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->lead_no->Visible) { // lead_no ?>
    <div id="r_lead_no" class="form-group row">
        <label id="elh_crm_leaddetails_lead_no" for="x_lead_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->lead_no->caption() ?><?= $Page->lead_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->lead_no->cellAttributes() ?>>
<span id="el_crm_leaddetails_lead_no">
<input type="<?= $Page->lead_no->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_lead_no" name="x_lead_no" id="x_lead_no" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->lead_no->getPlaceHolder()) ?>" value="<?= $Page->lead_no->EditValue ?>"<?= $Page->lead_no->editAttributes() ?> aria-describedby="x_lead_no_help">
<?= $Page->lead_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->lead_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email" class="form-group row">
        <label id="elh_crm_leaddetails__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_email->cellAttributes() ?>>
<span id="el_crm_leaddetails__email">
<input type="<?= $Page->_email->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" value="<?= $Page->_email->EditValue ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->interest->Visible) { // interest ?>
    <div id="r_interest" class="form-group row">
        <label id="elh_crm_leaddetails_interest" for="x_interest" class="<?= $Page->LeftColumnClass ?>"><?= $Page->interest->caption() ?><?= $Page->interest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->interest->cellAttributes() ?>>
<span id="el_crm_leaddetails_interest">
<input type="<?= $Page->interest->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_interest" name="x_interest" id="x_interest" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->interest->getPlaceHolder()) ?>" value="<?= $Page->interest->EditValue ?>"<?= $Page->interest->editAttributes() ?> aria-describedby="x_interest_help">
<?= $Page->interest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->interest->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
    <div id="r_firstname" class="form-group row">
        <label id="elh_crm_leaddetails_firstname" for="x_firstname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->firstname->caption() ?><?= $Page->firstname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->firstname->cellAttributes() ?>>
<span id="el_crm_leaddetails_firstname">
<input type="<?= $Page->firstname->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_firstname" name="x_firstname" id="x_firstname" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->firstname->getPlaceHolder()) ?>" value="<?= $Page->firstname->EditValue ?>"<?= $Page->firstname->editAttributes() ?> aria-describedby="x_firstname_help">
<?= $Page->firstname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->firstname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
    <div id="r_salutation" class="form-group row">
        <label id="elh_crm_leaddetails_salutation" for="x_salutation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->salutation->caption() ?><?= $Page->salutation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->salutation->cellAttributes() ?>>
<span id="el_crm_leaddetails_salutation">
<input type="<?= $Page->salutation->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_salutation" name="x_salutation" id="x_salutation" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->salutation->getPlaceHolder()) ?>" value="<?= $Page->salutation->EditValue ?>"<?= $Page->salutation->editAttributes() ?> aria-describedby="x_salutation_help">
<?= $Page->salutation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->salutation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
    <div id="r_lastname" class="form-group row">
        <label id="elh_crm_leaddetails_lastname" for="x_lastname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->lastname->caption() ?><?= $Page->lastname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->lastname->cellAttributes() ?>>
<span id="el_crm_leaddetails_lastname">
<input type="<?= $Page->lastname->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_lastname" name="x_lastname" id="x_lastname" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->lastname->getPlaceHolder()) ?>" value="<?= $Page->lastname->EditValue ?>"<?= $Page->lastname->editAttributes() ?> aria-describedby="x_lastname_help">
<?= $Page->lastname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->lastname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
    <div id="r_company" class="form-group row">
        <label id="elh_crm_leaddetails_company" for="x_company" class="<?= $Page->LeftColumnClass ?>"><?= $Page->company->caption() ?><?= $Page->company->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->company->cellAttributes() ?>>
<span id="el_crm_leaddetails_company">
<input type="<?= $Page->company->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_company" name="x_company" id="x_company" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->company->getPlaceHolder()) ?>" value="<?= $Page->company->EditValue ?>"<?= $Page->company->editAttributes() ?> aria-describedby="x_company_help">
<?= $Page->company->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->company->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
    <div id="r_annualrevenue" class="form-group row">
        <label id="elh_crm_leaddetails_annualrevenue" for="x_annualrevenue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->annualrevenue->caption() ?><?= $Page->annualrevenue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->annualrevenue->cellAttributes() ?>>
<span id="el_crm_leaddetails_annualrevenue">
<input type="<?= $Page->annualrevenue->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_annualrevenue" name="x_annualrevenue" id="x_annualrevenue" size="30" placeholder="<?= HtmlEncode($Page->annualrevenue->getPlaceHolder()) ?>" value="<?= $Page->annualrevenue->EditValue ?>"<?= $Page->annualrevenue->editAttributes() ?> aria-describedby="x_annualrevenue_help">
<?= $Page->annualrevenue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->annualrevenue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <div id="r_industry" class="form-group row">
        <label id="elh_crm_leaddetails_industry" for="x_industry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->industry->caption() ?><?= $Page->industry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->industry->cellAttributes() ?>>
<span id="el_crm_leaddetails_industry">
<input type="<?= $Page->industry->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_industry" name="x_industry" id="x_industry" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->industry->getPlaceHolder()) ?>" value="<?= $Page->industry->EditValue ?>"<?= $Page->industry->editAttributes() ?> aria-describedby="x_industry_help">
<?= $Page->industry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->industry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->campaign->Visible) { // campaign ?>
    <div id="r_campaign" class="form-group row">
        <label id="elh_crm_leaddetails_campaign" for="x_campaign" class="<?= $Page->LeftColumnClass ?>"><?= $Page->campaign->caption() ?><?= $Page->campaign->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->campaign->cellAttributes() ?>>
<span id="el_crm_leaddetails_campaign">
<input type="<?= $Page->campaign->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_campaign" name="x_campaign" id="x_campaign" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->campaign->getPlaceHolder()) ?>" value="<?= $Page->campaign->EditValue ?>"<?= $Page->campaign->editAttributes() ?> aria-describedby="x_campaign_help">
<?= $Page->campaign->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->campaign->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
    <div id="r_leadstatus" class="form-group row">
        <label id="elh_crm_leaddetails_leadstatus" for="x_leadstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadstatus->caption() ?><?= $Page->leadstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadstatus">
<input type="<?= $Page->leadstatus->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_leadstatus" name="x_leadstatus" id="x_leadstatus" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->leadstatus->getPlaceHolder()) ?>" value="<?= $Page->leadstatus->EditValue ?>"<?= $Page->leadstatus->editAttributes() ?> aria-describedby="x_leadstatus_help">
<?= $Page->leadstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <div id="r_leadsource" class="form-group row">
        <label id="elh_crm_leaddetails_leadsource" for="x_leadsource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadsource->caption() ?><?= $Page->leadsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadsource">
<input type="<?= $Page->leadsource->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->leadsource->getPlaceHolder()) ?>" value="<?= $Page->leadsource->EditValue ?>"<?= $Page->leadsource->editAttributes() ?> aria-describedby="x_leadsource_help">
<?= $Page->leadsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadsource->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->converted->Visible) { // converted ?>
    <div id="r_converted" class="form-group row">
        <label id="elh_crm_leaddetails_converted" for="x_converted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->converted->caption() ?><?= $Page->converted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->converted->cellAttributes() ?>>
<span id="el_crm_leaddetails_converted">
<input type="<?= $Page->converted->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_converted" name="x_converted" id="x_converted" size="30" placeholder="<?= HtmlEncode($Page->converted->getPlaceHolder()) ?>" value="<?= $Page->converted->EditValue ?>"<?= $Page->converted->editAttributes() ?> aria-describedby="x_converted_help">
<?= $Page->converted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->converted->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
    <div id="r_licencekeystatus" class="form-group row">
        <label id="elh_crm_leaddetails_licencekeystatus" for="x_licencekeystatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->licencekeystatus->caption() ?><?= $Page->licencekeystatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->licencekeystatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_licencekeystatus">
<input type="<?= $Page->licencekeystatus->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_licencekeystatus" name="x_licencekeystatus" id="x_licencekeystatus" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->licencekeystatus->getPlaceHolder()) ?>" value="<?= $Page->licencekeystatus->EditValue ?>"<?= $Page->licencekeystatus->editAttributes() ?> aria-describedby="x_licencekeystatus_help">
<?= $Page->licencekeystatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->licencekeystatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->space->Visible) { // space ?>
    <div id="r_space" class="form-group row">
        <label id="elh_crm_leaddetails_space" for="x_space" class="<?= $Page->LeftColumnClass ?>"><?= $Page->space->caption() ?><?= $Page->space->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->space->cellAttributes() ?>>
<span id="el_crm_leaddetails_space">
<input type="<?= $Page->space->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_space" name="x_space" id="x_space" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->space->getPlaceHolder()) ?>" value="<?= $Page->space->EditValue ?>"<?= $Page->space->editAttributes() ?> aria-describedby="x_space_help">
<?= $Page->space->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->space->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->comments->Visible) { // comments ?>
    <div id="r_comments" class="form-group row">
        <label id="elh_crm_leaddetails_comments" for="x_comments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->comments->caption() ?><?= $Page->comments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->comments->cellAttributes() ?>>
<span id="el_crm_leaddetails_comments">
<textarea data-table="crm_leaddetails" data-field="x_comments" name="x_comments" id="x_comments" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->comments->getPlaceHolder()) ?>"<?= $Page->comments->editAttributes() ?> aria-describedby="x_comments_help"><?= $Page->comments->EditValue ?></textarea>
<?= $Page->comments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->comments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->priority->Visible) { // priority ?>
    <div id="r_priority" class="form-group row">
        <label id="elh_crm_leaddetails_priority" for="x_priority" class="<?= $Page->LeftColumnClass ?>"><?= $Page->priority->caption() ?><?= $Page->priority->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->priority->cellAttributes() ?>>
<span id="el_crm_leaddetails_priority">
<input type="<?= $Page->priority->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_priority" name="x_priority" id="x_priority" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->priority->getPlaceHolder()) ?>" value="<?= $Page->priority->EditValue ?>"<?= $Page->priority->editAttributes() ?> aria-describedby="x_priority_help">
<?= $Page->priority->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->priority->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->demorequest->Visible) { // demorequest ?>
    <div id="r_demorequest" class="form-group row">
        <label id="elh_crm_leaddetails_demorequest" for="x_demorequest" class="<?= $Page->LeftColumnClass ?>"><?= $Page->demorequest->caption() ?><?= $Page->demorequest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->demorequest->cellAttributes() ?>>
<span id="el_crm_leaddetails_demorequest">
<input type="<?= $Page->demorequest->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_demorequest" name="x_demorequest" id="x_demorequest" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->demorequest->getPlaceHolder()) ?>" value="<?= $Page->demorequest->EditValue ?>"<?= $Page->demorequest->editAttributes() ?> aria-describedby="x_demorequest_help">
<?= $Page->demorequest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->demorequest->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->partnercontact->Visible) { // partnercontact ?>
    <div id="r_partnercontact" class="form-group row">
        <label id="elh_crm_leaddetails_partnercontact" for="x_partnercontact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->partnercontact->caption() ?><?= $Page->partnercontact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->partnercontact->cellAttributes() ?>>
<span id="el_crm_leaddetails_partnercontact">
<input type="<?= $Page->partnercontact->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_partnercontact" name="x_partnercontact" id="x_partnercontact" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->partnercontact->getPlaceHolder()) ?>" value="<?= $Page->partnercontact->EditValue ?>"<?= $Page->partnercontact->editAttributes() ?> aria-describedby="x_partnercontact_help">
<?= $Page->partnercontact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->partnercontact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->productversion->Visible) { // productversion ?>
    <div id="r_productversion" class="form-group row">
        <label id="elh_crm_leaddetails_productversion" for="x_productversion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->productversion->caption() ?><?= $Page->productversion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->productversion->cellAttributes() ?>>
<span id="el_crm_leaddetails_productversion">
<input type="<?= $Page->productversion->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_productversion" name="x_productversion" id="x_productversion" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->productversion->getPlaceHolder()) ?>" value="<?= $Page->productversion->EditValue ?>"<?= $Page->productversion->editAttributes() ?> aria-describedby="x_productversion_help">
<?= $Page->productversion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->productversion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->product->Visible) { // product ?>
    <div id="r_product" class="form-group row">
        <label id="elh_crm_leaddetails_product" for="x_product" class="<?= $Page->LeftColumnClass ?>"><?= $Page->product->caption() ?><?= $Page->product->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->product->cellAttributes() ?>>
<span id="el_crm_leaddetails_product">
<input type="<?= $Page->product->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_product" name="x_product" id="x_product" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->product->getPlaceHolder()) ?>" value="<?= $Page->product->EditValue ?>"<?= $Page->product->editAttributes() ?> aria-describedby="x_product_help">
<?= $Page->product->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->product->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->maildate->Visible) { // maildate ?>
    <div id="r_maildate" class="form-group row">
        <label id="elh_crm_leaddetails_maildate" for="x_maildate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->maildate->caption() ?><?= $Page->maildate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->maildate->cellAttributes() ?>>
<span id="el_crm_leaddetails_maildate">
<input type="<?= $Page->maildate->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_maildate" name="x_maildate" id="x_maildate" placeholder="<?= HtmlEncode($Page->maildate->getPlaceHolder()) ?>" value="<?= $Page->maildate->EditValue ?>"<?= $Page->maildate->editAttributes() ?> aria-describedby="x_maildate_help">
<?= $Page->maildate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->maildate->getErrorMessage() ?></div>
<?php if (!$Page->maildate->ReadOnly && !$Page->maildate->Disabled && !isset($Page->maildate->EditAttrs["readonly"]) && !isset($Page->maildate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_leaddetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_leaddetailsedit", "x_maildate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
    <div id="r_nextstepdate" class="form-group row">
        <label id="elh_crm_leaddetails_nextstepdate" for="x_nextstepdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nextstepdate->caption() ?><?= $Page->nextstepdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nextstepdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_nextstepdate">
<input type="<?= $Page->nextstepdate->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_nextstepdate" name="x_nextstepdate" id="x_nextstepdate" placeholder="<?= HtmlEncode($Page->nextstepdate->getPlaceHolder()) ?>" value="<?= $Page->nextstepdate->EditValue ?>"<?= $Page->nextstepdate->editAttributes() ?> aria-describedby="x_nextstepdate_help">
<?= $Page->nextstepdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nextstepdate->getErrorMessage() ?></div>
<?php if (!$Page->nextstepdate->ReadOnly && !$Page->nextstepdate->Disabled && !isset($Page->nextstepdate->EditAttrs["readonly"]) && !isset($Page->nextstepdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_leaddetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_leaddetailsedit", "x_nextstepdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
    <div id="r_fundingsituation" class="form-group row">
        <label id="elh_crm_leaddetails_fundingsituation" for="x_fundingsituation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fundingsituation->caption() ?><?= $Page->fundingsituation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->fundingsituation->cellAttributes() ?>>
<span id="el_crm_leaddetails_fundingsituation">
<input type="<?= $Page->fundingsituation->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_fundingsituation" name="x_fundingsituation" id="x_fundingsituation" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->fundingsituation->getPlaceHolder()) ?>" value="<?= $Page->fundingsituation->EditValue ?>"<?= $Page->fundingsituation->editAttributes() ?> aria-describedby="x_fundingsituation_help">
<?= $Page->fundingsituation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fundingsituation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
    <div id="r_purpose" class="form-group row">
        <label id="elh_crm_leaddetails_purpose" for="x_purpose" class="<?= $Page->LeftColumnClass ?>"><?= $Page->purpose->caption() ?><?= $Page->purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->purpose->cellAttributes() ?>>
<span id="el_crm_leaddetails_purpose">
<input type="<?= $Page->purpose->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_purpose" name="x_purpose" id="x_purpose" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->purpose->getPlaceHolder()) ?>" value="<?= $Page->purpose->EditValue ?>"<?= $Page->purpose->editAttributes() ?> aria-describedby="x_purpose_help">
<?= $Page->purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->purpose->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
    <div id="r_evaluationstatus" class="form-group row">
        <label id="elh_crm_leaddetails_evaluationstatus" for="x_evaluationstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->evaluationstatus->caption() ?><?= $Page->evaluationstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->evaluationstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_evaluationstatus">
<input type="<?= $Page->evaluationstatus->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_evaluationstatus" name="x_evaluationstatus" id="x_evaluationstatus" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->evaluationstatus->getPlaceHolder()) ?>" value="<?= $Page->evaluationstatus->EditValue ?>"<?= $Page->evaluationstatus->editAttributes() ?> aria-describedby="x_evaluationstatus_help">
<?= $Page->evaluationstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->evaluationstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->transferdate->Visible) { // transferdate ?>
    <div id="r_transferdate" class="form-group row">
        <label id="elh_crm_leaddetails_transferdate" for="x_transferdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->transferdate->caption() ?><?= $Page->transferdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->transferdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_transferdate">
<input type="<?= $Page->transferdate->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_transferdate" name="x_transferdate" id="x_transferdate" placeholder="<?= HtmlEncode($Page->transferdate->getPlaceHolder()) ?>" value="<?= $Page->transferdate->EditValue ?>"<?= $Page->transferdate->editAttributes() ?> aria-describedby="x_transferdate_help">
<?= $Page->transferdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->transferdate->getErrorMessage() ?></div>
<?php if (!$Page->transferdate->ReadOnly && !$Page->transferdate->Disabled && !isset($Page->transferdate->EditAttrs["readonly"]) && !isset($Page->transferdate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_leaddetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_leaddetailsedit", "x_transferdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->revenuetype->Visible) { // revenuetype ?>
    <div id="r_revenuetype" class="form-group row">
        <label id="elh_crm_leaddetails_revenuetype" for="x_revenuetype" class="<?= $Page->LeftColumnClass ?>"><?= $Page->revenuetype->caption() ?><?= $Page->revenuetype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->revenuetype->cellAttributes() ?>>
<span id="el_crm_leaddetails_revenuetype">
<input type="<?= $Page->revenuetype->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_revenuetype" name="x_revenuetype" id="x_revenuetype" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->revenuetype->getPlaceHolder()) ?>" value="<?= $Page->revenuetype->EditValue ?>"<?= $Page->revenuetype->editAttributes() ?> aria-describedby="x_revenuetype_help">
<?= $Page->revenuetype->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->revenuetype->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->noofemployees->Visible) { // noofemployees ?>
    <div id="r_noofemployees" class="form-group row">
        <label id="elh_crm_leaddetails_noofemployees" for="x_noofemployees" class="<?= $Page->LeftColumnClass ?>"><?= $Page->noofemployees->caption() ?><?= $Page->noofemployees->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->noofemployees->cellAttributes() ?>>
<span id="el_crm_leaddetails_noofemployees">
<input type="<?= $Page->noofemployees->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_noofemployees" name="x_noofemployees" id="x_noofemployees" size="30" placeholder="<?= HtmlEncode($Page->noofemployees->getPlaceHolder()) ?>" value="<?= $Page->noofemployees->EditValue ?>"<?= $Page->noofemployees->editAttributes() ?> aria-describedby="x_noofemployees_help">
<?= $Page->noofemployees->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->noofemployees->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
    <div id="r_secondaryemail" class="form-group row">
        <label id="elh_crm_leaddetails_secondaryemail" for="x_secondaryemail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->secondaryemail->caption() ?><?= $Page->secondaryemail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->secondaryemail->cellAttributes() ?>>
<span id="el_crm_leaddetails_secondaryemail">
<input type="<?= $Page->secondaryemail->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_secondaryemail" name="x_secondaryemail" id="x_secondaryemail" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->secondaryemail->getPlaceHolder()) ?>" value="<?= $Page->secondaryemail->EditValue ?>"<?= $Page->secondaryemail->editAttributes() ?> aria-describedby="x_secondaryemail_help">
<?= $Page->secondaryemail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->secondaryemail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
    <div id="r_noapprovalcalls" class="form-group row">
        <label id="elh_crm_leaddetails_noapprovalcalls" for="x_noapprovalcalls" class="<?= $Page->LeftColumnClass ?>"><?= $Page->noapprovalcalls->caption() ?><?= $Page->noapprovalcalls->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->noapprovalcalls->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalcalls">
<input type="<?= $Page->noapprovalcalls->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_noapprovalcalls" name="x_noapprovalcalls" id="x_noapprovalcalls" size="30" placeholder="<?= HtmlEncode($Page->noapprovalcalls->getPlaceHolder()) ?>" value="<?= $Page->noapprovalcalls->EditValue ?>"<?= $Page->noapprovalcalls->editAttributes() ?> aria-describedby="x_noapprovalcalls_help">
<?= $Page->noapprovalcalls->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->noapprovalcalls->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
    <div id="r_noapprovalemails" class="form-group row">
        <label id="elh_crm_leaddetails_noapprovalemails" for="x_noapprovalemails" class="<?= $Page->LeftColumnClass ?>"><?= $Page->noapprovalemails->caption() ?><?= $Page->noapprovalemails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->noapprovalemails->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalemails">
<input type="<?= $Page->noapprovalemails->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_noapprovalemails" name="x_noapprovalemails" id="x_noapprovalemails" size="30" placeholder="<?= HtmlEncode($Page->noapprovalemails->getPlaceHolder()) ?>" value="<?= $Page->noapprovalemails->EditValue ?>"<?= $Page->noapprovalemails->editAttributes() ?> aria-describedby="x_noapprovalemails_help">
<?= $Page->noapprovalemails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->noapprovalemails->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vat_id->Visible) { // vat_id ?>
    <div id="r_vat_id" class="form-group row">
        <label id="elh_crm_leaddetails_vat_id" for="x_vat_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vat_id->caption() ?><?= $Page->vat_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vat_id->cellAttributes() ?>>
<span id="el_crm_leaddetails_vat_id">
<input type="<?= $Page->vat_id->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_vat_id" name="x_vat_id" id="x_vat_id" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->vat_id->getPlaceHolder()) ?>" value="<?= $Page->vat_id->EditValue ?>"<?= $Page->vat_id->editAttributes() ?> aria-describedby="x_vat_id_help">
<?= $Page->vat_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vat_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
    <div id="r_registration_number_1" class="form-group row">
        <label id="elh_crm_leaddetails_registration_number_1" for="x_registration_number_1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->registration_number_1->caption() ?><?= $Page->registration_number_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->registration_number_1->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_1">
<input type="<?= $Page->registration_number_1->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_registration_number_1" name="x_registration_number_1" id="x_registration_number_1" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->registration_number_1->getPlaceHolder()) ?>" value="<?= $Page->registration_number_1->EditValue ?>"<?= $Page->registration_number_1->editAttributes() ?> aria-describedby="x_registration_number_1_help">
<?= $Page->registration_number_1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->registration_number_1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
    <div id="r_registration_number_2" class="form-group row">
        <label id="elh_crm_leaddetails_registration_number_2" for="x_registration_number_2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->registration_number_2->caption() ?><?= $Page->registration_number_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->registration_number_2->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_2">
<input type="<?= $Page->registration_number_2->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_registration_number_2" name="x_registration_number_2" id="x_registration_number_2" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->registration_number_2->getPlaceHolder()) ?>" value="<?= $Page->registration_number_2->EditValue ?>"<?= $Page->registration_number_2->editAttributes() ?> aria-describedby="x_registration_number_2_help">
<?= $Page->registration_number_2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->registration_number_2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->verification->Visible) { // verification ?>
    <div id="r_verification" class="form-group row">
        <label id="elh_crm_leaddetails_verification" for="x_verification" class="<?= $Page->LeftColumnClass ?>"><?= $Page->verification->caption() ?><?= $Page->verification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->verification->cellAttributes() ?>>
<span id="el_crm_leaddetails_verification">
<textarea data-table="crm_leaddetails" data-field="x_verification" name="x_verification" id="x_verification" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->verification->getPlaceHolder()) ?>"<?= $Page->verification->editAttributes() ?> aria-describedby="x_verification_help"><?= $Page->verification->EditValue ?></textarea>
<?= $Page->verification->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->verification->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->subindustry->Visible) { // subindustry ?>
    <div id="r_subindustry" class="form-group row">
        <label id="elh_crm_leaddetails_subindustry" for="x_subindustry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->subindustry->caption() ?><?= $Page->subindustry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->subindustry->cellAttributes() ?>>
<span id="el_crm_leaddetails_subindustry">
<input type="<?= $Page->subindustry->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_subindustry" name="x_subindustry" id="x_subindustry" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->subindustry->getPlaceHolder()) ?>" value="<?= $Page->subindustry->EditValue ?>"<?= $Page->subindustry->editAttributes() ?> aria-describedby="x_subindustry_help">
<?= $Page->subindustry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->subindustry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->atenttion->Visible) { // atenttion ?>
    <div id="r_atenttion" class="form-group row">
        <label id="elh_crm_leaddetails_atenttion" for="x_atenttion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->atenttion->caption() ?><?= $Page->atenttion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->atenttion->cellAttributes() ?>>
<span id="el_crm_leaddetails_atenttion">
<textarea data-table="crm_leaddetails" data-field="x_atenttion" name="x_atenttion" id="x_atenttion" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->atenttion->getPlaceHolder()) ?>"<?= $Page->atenttion->editAttributes() ?> aria-describedby="x_atenttion_help"><?= $Page->atenttion->EditValue ?></textarea>
<?= $Page->atenttion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->atenttion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
    <div id="r_leads_relation" class="form-group row">
        <label id="elh_crm_leaddetails_leads_relation" for="x_leads_relation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leads_relation->caption() ?><?= $Page->leads_relation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el_crm_leaddetails_leads_relation">
<input type="<?= $Page->leads_relation->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_leads_relation" name="x_leads_relation" id="x_leads_relation" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->leads_relation->getPlaceHolder()) ?>" value="<?= $Page->leads_relation->EditValue ?>"<?= $Page->leads_relation->editAttributes() ?> aria-describedby="x_leads_relation_help">
<?= $Page->leads_relation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leads_relation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->legal_form->Visible) { // legal_form ?>
    <div id="r_legal_form" class="form-group row">
        <label id="elh_crm_leaddetails_legal_form" for="x_legal_form" class="<?= $Page->LeftColumnClass ?>"><?= $Page->legal_form->caption() ?><?= $Page->legal_form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->legal_form->cellAttributes() ?>>
<span id="el_crm_leaddetails_legal_form">
<input type="<?= $Page->legal_form->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_legal_form" name="x_legal_form" id="x_legal_form" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->legal_form->getPlaceHolder()) ?>" value="<?= $Page->legal_form->EditValue ?>"<?= $Page->legal_form->editAttributes() ?> aria-describedby="x_legal_form_help">
<?= $Page->legal_form->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->legal_form->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
    <div id="r_sum_time" class="form-group row">
        <label id="elh_crm_leaddetails_sum_time" for="x_sum_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sum_time->caption() ?><?= $Page->sum_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sum_time->cellAttributes() ?>>
<span id="el_crm_leaddetails_sum_time">
<input type="<?= $Page->sum_time->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_sum_time" name="x_sum_time" id="x_sum_time" size="30" placeholder="<?= HtmlEncode($Page->sum_time->getPlaceHolder()) ?>" value="<?= $Page->sum_time->EditValue ?>"<?= $Page->sum_time->editAttributes() ?> aria-describedby="x_sum_time_help">
<?= $Page->sum_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sum_time->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->active->Visible) { // active ?>
    <div id="r_active" class="form-group row">
        <label id="elh_crm_leaddetails_active" for="x_active" class="<?= $Page->LeftColumnClass ?>"><?= $Page->active->caption() ?><?= $Page->active->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->active->cellAttributes() ?>>
<span id="el_crm_leaddetails_active">
<input type="<?= $Page->active->getInputTextType() ?>" data-table="crm_leaddetails" data-field="x_active" name="x_active" id="x_active" size="30" placeholder="<?= HtmlEncode($Page->active->getPlaceHolder()) ?>" value="<?= $Page->active->EditValue ?>"<?= $Page->active->editAttributes() ?> aria-describedby="x_active_help">
<?= $Page->active->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->active->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("crm_leaddetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
