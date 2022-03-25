<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeaddetailsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fcrm_leaddetailsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fcrm_leaddetailsview = currentForm = new ew.Form("fcrm_leaddetailsview", "view");
    loadjs.done("fcrm_leaddetailsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.crm_leaddetails) ew.vars.tables.crm_leaddetails = <?= JsonEncode(GetClientVar("tables", "crm_leaddetails")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leaddetailsview" id="fcrm_leaddetailsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->leadid->Visible) { // leadid ?>
    <tr id="r_leadid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadid"><?= $Page->leadid->caption() ?></span></td>
        <td data-name="leadid" <?= $Page->leadid->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadid">
<span<?= $Page->leadid->viewAttributes() ?>>
<?= $Page->leadid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->lead_no->Visible) { // lead_no ?>
    <tr id="r_lead_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_lead_no"><?= $Page->lead_no->caption() ?></span></td>
        <td data-name="lead_no" <?= $Page->lead_no->cellAttributes() ?>>
<span id="el_crm_leaddetails_lead_no">
<span<?= $Page->lead_no->viewAttributes() ?>>
<?= $Page->lead_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <tr id="r__email">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails__email"><?= $Page->_email->caption() ?></span></td>
        <td data-name="_email" <?= $Page->_email->cellAttributes() ?>>
<span id="el_crm_leaddetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->interest->Visible) { // interest ?>
    <tr id="r_interest">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_interest"><?= $Page->interest->caption() ?></span></td>
        <td data-name="interest" <?= $Page->interest->cellAttributes() ?>>
<span id="el_crm_leaddetails_interest">
<span<?= $Page->interest->viewAttributes() ?>>
<?= $Page->interest->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
    <tr id="r_firstname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_firstname"><?= $Page->firstname->caption() ?></span></td>
        <td data-name="firstname" <?= $Page->firstname->cellAttributes() ?>>
<span id="el_crm_leaddetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
    <tr id="r_salutation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_salutation"><?= $Page->salutation->caption() ?></span></td>
        <td data-name="salutation" <?= $Page->salutation->cellAttributes() ?>>
<span id="el_crm_leaddetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
    <tr id="r_lastname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_lastname"><?= $Page->lastname->caption() ?></span></td>
        <td data-name="lastname" <?= $Page->lastname->cellAttributes() ?>>
<span id="el_crm_leaddetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
    <tr id="r_company">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_company"><?= $Page->company->caption() ?></span></td>
        <td data-name="company" <?= $Page->company->cellAttributes() ?>>
<span id="el_crm_leaddetails_company">
<span<?= $Page->company->viewAttributes() ?>>
<?= $Page->company->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
    <tr id="r_annualrevenue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_annualrevenue"><?= $Page->annualrevenue->caption() ?></span></td>
        <td data-name="annualrevenue" <?= $Page->annualrevenue->cellAttributes() ?>>
<span id="el_crm_leaddetails_annualrevenue">
<span<?= $Page->annualrevenue->viewAttributes() ?>>
<?= $Page->annualrevenue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
    <tr id="r_industry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_industry"><?= $Page->industry->caption() ?></span></td>
        <td data-name="industry" <?= $Page->industry->cellAttributes() ?>>
<span id="el_crm_leaddetails_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->campaign->Visible) { // campaign ?>
    <tr id="r_campaign">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_campaign"><?= $Page->campaign->caption() ?></span></td>
        <td data-name="campaign" <?= $Page->campaign->cellAttributes() ?>>
<span id="el_crm_leaddetails_campaign">
<span<?= $Page->campaign->viewAttributes() ?>>
<?= $Page->campaign->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
    <tr id="r_leadstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadstatus"><?= $Page->leadstatus->caption() ?></span></td>
        <td data-name="leadstatus" <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadstatus">
<span<?= $Page->leadstatus->viewAttributes() ?>>
<?= $Page->leadstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <tr id="r_leadsource">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadsource"><?= $Page->leadsource->caption() ?></span></td>
        <td data-name="leadsource" <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->converted->Visible) { // converted ?>
    <tr id="r_converted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_converted"><?= $Page->converted->caption() ?></span></td>
        <td data-name="converted" <?= $Page->converted->cellAttributes() ?>>
<span id="el_crm_leaddetails_converted">
<span<?= $Page->converted->viewAttributes() ?>>
<?= $Page->converted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
    <tr id="r_licencekeystatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_licencekeystatus"><?= $Page->licencekeystatus->caption() ?></span></td>
        <td data-name="licencekeystatus" <?= $Page->licencekeystatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_licencekeystatus">
<span<?= $Page->licencekeystatus->viewAttributes() ?>>
<?= $Page->licencekeystatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->space->Visible) { // space ?>
    <tr id="r_space">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_space"><?= $Page->space->caption() ?></span></td>
        <td data-name="space" <?= $Page->space->cellAttributes() ?>>
<span id="el_crm_leaddetails_space">
<span<?= $Page->space->viewAttributes() ?>>
<?= $Page->space->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->comments->Visible) { // comments ?>
    <tr id="r_comments">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_comments"><?= $Page->comments->caption() ?></span></td>
        <td data-name="comments" <?= $Page->comments->cellAttributes() ?>>
<span id="el_crm_leaddetails_comments">
<span<?= $Page->comments->viewAttributes() ?>>
<?= $Page->comments->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->priority->Visible) { // priority ?>
    <tr id="r_priority">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_priority"><?= $Page->priority->caption() ?></span></td>
        <td data-name="priority" <?= $Page->priority->cellAttributes() ?>>
<span id="el_crm_leaddetails_priority">
<span<?= $Page->priority->viewAttributes() ?>>
<?= $Page->priority->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->demorequest->Visible) { // demorequest ?>
    <tr id="r_demorequest">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_demorequest"><?= $Page->demorequest->caption() ?></span></td>
        <td data-name="demorequest" <?= $Page->demorequest->cellAttributes() ?>>
<span id="el_crm_leaddetails_demorequest">
<span<?= $Page->demorequest->viewAttributes() ?>>
<?= $Page->demorequest->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->partnercontact->Visible) { // partnercontact ?>
    <tr id="r_partnercontact">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_partnercontact"><?= $Page->partnercontact->caption() ?></span></td>
        <td data-name="partnercontact" <?= $Page->partnercontact->cellAttributes() ?>>
<span id="el_crm_leaddetails_partnercontact">
<span<?= $Page->partnercontact->viewAttributes() ?>>
<?= $Page->partnercontact->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->productversion->Visible) { // productversion ?>
    <tr id="r_productversion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_productversion"><?= $Page->productversion->caption() ?></span></td>
        <td data-name="productversion" <?= $Page->productversion->cellAttributes() ?>>
<span id="el_crm_leaddetails_productversion">
<span<?= $Page->productversion->viewAttributes() ?>>
<?= $Page->productversion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->product->Visible) { // product ?>
    <tr id="r_product">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_product"><?= $Page->product->caption() ?></span></td>
        <td data-name="product" <?= $Page->product->cellAttributes() ?>>
<span id="el_crm_leaddetails_product">
<span<?= $Page->product->viewAttributes() ?>>
<?= $Page->product->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->maildate->Visible) { // maildate ?>
    <tr id="r_maildate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_maildate"><?= $Page->maildate->caption() ?></span></td>
        <td data-name="maildate" <?= $Page->maildate->cellAttributes() ?>>
<span id="el_crm_leaddetails_maildate">
<span<?= $Page->maildate->viewAttributes() ?>>
<?= $Page->maildate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
    <tr id="r_nextstepdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_nextstepdate"><?= $Page->nextstepdate->caption() ?></span></td>
        <td data-name="nextstepdate" <?= $Page->nextstepdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_nextstepdate">
<span<?= $Page->nextstepdate->viewAttributes() ?>>
<?= $Page->nextstepdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
    <tr id="r_fundingsituation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_fundingsituation"><?= $Page->fundingsituation->caption() ?></span></td>
        <td data-name="fundingsituation" <?= $Page->fundingsituation->cellAttributes() ?>>
<span id="el_crm_leaddetails_fundingsituation">
<span<?= $Page->fundingsituation->viewAttributes() ?>>
<?= $Page->fundingsituation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
    <tr id="r_purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_purpose"><?= $Page->purpose->caption() ?></span></td>
        <td data-name="purpose" <?= $Page->purpose->cellAttributes() ?>>
<span id="el_crm_leaddetails_purpose">
<span<?= $Page->purpose->viewAttributes() ?>>
<?= $Page->purpose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
    <tr id="r_evaluationstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_evaluationstatus"><?= $Page->evaluationstatus->caption() ?></span></td>
        <td data-name="evaluationstatus" <?= $Page->evaluationstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_evaluationstatus">
<span<?= $Page->evaluationstatus->viewAttributes() ?>>
<?= $Page->evaluationstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->transferdate->Visible) { // transferdate ?>
    <tr id="r_transferdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_transferdate"><?= $Page->transferdate->caption() ?></span></td>
        <td data-name="transferdate" <?= $Page->transferdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_transferdate">
<span<?= $Page->transferdate->viewAttributes() ?>>
<?= $Page->transferdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->revenuetype->Visible) { // revenuetype ?>
    <tr id="r_revenuetype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_revenuetype"><?= $Page->revenuetype->caption() ?></span></td>
        <td data-name="revenuetype" <?= $Page->revenuetype->cellAttributes() ?>>
<span id="el_crm_leaddetails_revenuetype">
<span<?= $Page->revenuetype->viewAttributes() ?>>
<?= $Page->revenuetype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->noofemployees->Visible) { // noofemployees ?>
    <tr id="r_noofemployees">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noofemployees"><?= $Page->noofemployees->caption() ?></span></td>
        <td data-name="noofemployees" <?= $Page->noofemployees->cellAttributes() ?>>
<span id="el_crm_leaddetails_noofemployees">
<span<?= $Page->noofemployees->viewAttributes() ?>>
<?= $Page->noofemployees->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
    <tr id="r_secondaryemail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_secondaryemail"><?= $Page->secondaryemail->caption() ?></span></td>
        <td data-name="secondaryemail" <?= $Page->secondaryemail->cellAttributes() ?>>
<span id="el_crm_leaddetails_secondaryemail">
<span<?= $Page->secondaryemail->viewAttributes() ?>>
<?= $Page->secondaryemail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
    <tr id="r_noapprovalcalls">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noapprovalcalls"><?= $Page->noapprovalcalls->caption() ?></span></td>
        <td data-name="noapprovalcalls" <?= $Page->noapprovalcalls->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalcalls">
<span<?= $Page->noapprovalcalls->viewAttributes() ?>>
<?= $Page->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
    <tr id="r_noapprovalemails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noapprovalemails"><?= $Page->noapprovalemails->caption() ?></span></td>
        <td data-name="noapprovalemails" <?= $Page->noapprovalemails->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalemails">
<span<?= $Page->noapprovalemails->viewAttributes() ?>>
<?= $Page->noapprovalemails->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vat_id->Visible) { // vat_id ?>
    <tr id="r_vat_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_vat_id"><?= $Page->vat_id->caption() ?></span></td>
        <td data-name="vat_id" <?= $Page->vat_id->cellAttributes() ?>>
<span id="el_crm_leaddetails_vat_id">
<span<?= $Page->vat_id->viewAttributes() ?>>
<?= $Page->vat_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
    <tr id="r_registration_number_1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_registration_number_1"><?= $Page->registration_number_1->caption() ?></span></td>
        <td data-name="registration_number_1" <?= $Page->registration_number_1->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_1">
<span<?= $Page->registration_number_1->viewAttributes() ?>>
<?= $Page->registration_number_1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
    <tr id="r_registration_number_2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_registration_number_2"><?= $Page->registration_number_2->caption() ?></span></td>
        <td data-name="registration_number_2" <?= $Page->registration_number_2->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_2">
<span<?= $Page->registration_number_2->viewAttributes() ?>>
<?= $Page->registration_number_2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->verification->Visible) { // verification ?>
    <tr id="r_verification">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_verification"><?= $Page->verification->caption() ?></span></td>
        <td data-name="verification" <?= $Page->verification->cellAttributes() ?>>
<span id="el_crm_leaddetails_verification">
<span<?= $Page->verification->viewAttributes() ?>>
<?= $Page->verification->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->subindustry->Visible) { // subindustry ?>
    <tr id="r_subindustry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_subindustry"><?= $Page->subindustry->caption() ?></span></td>
        <td data-name="subindustry" <?= $Page->subindustry->cellAttributes() ?>>
<span id="el_crm_leaddetails_subindustry">
<span<?= $Page->subindustry->viewAttributes() ?>>
<?= $Page->subindustry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->atenttion->Visible) { // atenttion ?>
    <tr id="r_atenttion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_atenttion"><?= $Page->atenttion->caption() ?></span></td>
        <td data-name="atenttion" <?= $Page->atenttion->cellAttributes() ?>>
<span id="el_crm_leaddetails_atenttion">
<span<?= $Page->atenttion->viewAttributes() ?>>
<?= $Page->atenttion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
    <tr id="r_leads_relation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leads_relation"><?= $Page->leads_relation->caption() ?></span></td>
        <td data-name="leads_relation" <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el_crm_leaddetails_leads_relation">
<span<?= $Page->leads_relation->viewAttributes() ?>>
<?= $Page->leads_relation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->legal_form->Visible) { // legal_form ?>
    <tr id="r_legal_form">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_legal_form"><?= $Page->legal_form->caption() ?></span></td>
        <td data-name="legal_form" <?= $Page->legal_form->cellAttributes() ?>>
<span id="el_crm_leaddetails_legal_form">
<span<?= $Page->legal_form->viewAttributes() ?>>
<?= $Page->legal_form->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
    <tr id="r_sum_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_sum_time"><?= $Page->sum_time->caption() ?></span></td>
        <td data-name="sum_time" <?= $Page->sum_time->cellAttributes() ?>>
<span id="el_crm_leaddetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->active->Visible) { // active ?>
    <tr id="r_active">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_active"><?= $Page->active->caption() ?></span></td>
        <td data-name="active" <?= $Page->active->cellAttributes() ?>>
<span id="el_crm_leaddetails_active">
<span<?= $Page->active->viewAttributes() ?>>
<?= $Page->active->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
