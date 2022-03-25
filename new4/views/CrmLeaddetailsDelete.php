<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeaddetailsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leaddetailsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leaddetailsdelete = currentForm = new ew.Form("fcrm_leaddetailsdelete", "delete");
    loadjs.done("fcrm_leaddetailsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leaddetails) ew.vars.tables.crm_leaddetails = <?= JsonEncode(GetClientVar("tables", "crm_leaddetails")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leaddetailsdelete" id="fcrm_leaddetailsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->leadid->Visible) { // leadid ?>
        <th class="<?= $Page->leadid->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadid" class="crm_leaddetails_leadid"><?= $Page->leadid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->lead_no->Visible) { // lead_no ?>
        <th class="<?= $Page->lead_no->headerCellClass() ?>"><span id="elh_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no"><?= $Page->lead_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <th class="<?= $Page->_email->headerCellClass() ?>"><span id="elh_crm_leaddetails__email" class="crm_leaddetails__email"><?= $Page->_email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->interest->Visible) { // interest ?>
        <th class="<?= $Page->interest->headerCellClass() ?>"><span id="elh_crm_leaddetails_interest" class="crm_leaddetails_interest"><?= $Page->interest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <th class="<?= $Page->firstname->headerCellClass() ?>"><span id="elh_crm_leaddetails_firstname" class="crm_leaddetails_firstname"><?= $Page->firstname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <th class="<?= $Page->salutation->headerCellClass() ?>"><span id="elh_crm_leaddetails_salutation" class="crm_leaddetails_salutation"><?= $Page->salutation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <th class="<?= $Page->lastname->headerCellClass() ?>"><span id="elh_crm_leaddetails_lastname" class="crm_leaddetails_lastname"><?= $Page->lastname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
        <th class="<?= $Page->company->headerCellClass() ?>"><span id="elh_crm_leaddetails_company" class="crm_leaddetails_company"><?= $Page->company->caption() ?></span></th>
<?php } ?>
<?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
        <th class="<?= $Page->annualrevenue->headerCellClass() ?>"><span id="elh_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue"><?= $Page->annualrevenue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
        <th class="<?= $Page->industry->headerCellClass() ?>"><span id="elh_crm_leaddetails_industry" class="crm_leaddetails_industry"><?= $Page->industry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->campaign->Visible) { // campaign ?>
        <th class="<?= $Page->campaign->headerCellClass() ?>"><span id="elh_crm_leaddetails_campaign" class="crm_leaddetails_campaign"><?= $Page->campaign->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <th class="<?= $Page->leadstatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus"><?= $Page->leadstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <th class="<?= $Page->leadsource->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource"><?= $Page->leadsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->converted->Visible) { // converted ?>
        <th class="<?= $Page->converted->headerCellClass() ?>"><span id="elh_crm_leaddetails_converted" class="crm_leaddetails_converted"><?= $Page->converted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
        <th class="<?= $Page->licencekeystatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus"><?= $Page->licencekeystatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->space->Visible) { // space ?>
        <th class="<?= $Page->space->headerCellClass() ?>"><span id="elh_crm_leaddetails_space" class="crm_leaddetails_space"><?= $Page->space->caption() ?></span></th>
<?php } ?>
<?php if ($Page->priority->Visible) { // priority ?>
        <th class="<?= $Page->priority->headerCellClass() ?>"><span id="elh_crm_leaddetails_priority" class="crm_leaddetails_priority"><?= $Page->priority->caption() ?></span></th>
<?php } ?>
<?php if ($Page->demorequest->Visible) { // demorequest ?>
        <th class="<?= $Page->demorequest->headerCellClass() ?>"><span id="elh_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest"><?= $Page->demorequest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->partnercontact->Visible) { // partnercontact ?>
        <th class="<?= $Page->partnercontact->headerCellClass() ?>"><span id="elh_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact"><?= $Page->partnercontact->caption() ?></span></th>
<?php } ?>
<?php if ($Page->productversion->Visible) { // productversion ?>
        <th class="<?= $Page->productversion->headerCellClass() ?>"><span id="elh_crm_leaddetails_productversion" class="crm_leaddetails_productversion"><?= $Page->productversion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->product->Visible) { // product ?>
        <th class="<?= $Page->product->headerCellClass() ?>"><span id="elh_crm_leaddetails_product" class="crm_leaddetails_product"><?= $Page->product->caption() ?></span></th>
<?php } ?>
<?php if ($Page->maildate->Visible) { // maildate ?>
        <th class="<?= $Page->maildate->headerCellClass() ?>"><span id="elh_crm_leaddetails_maildate" class="crm_leaddetails_maildate"><?= $Page->maildate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
        <th class="<?= $Page->nextstepdate->headerCellClass() ?>"><span id="elh_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate"><?= $Page->nextstepdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
        <th class="<?= $Page->fundingsituation->headerCellClass() ?>"><span id="elh_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation"><?= $Page->fundingsituation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
        <th class="<?= $Page->purpose->headerCellClass() ?>"><span id="elh_crm_leaddetails_purpose" class="crm_leaddetails_purpose"><?= $Page->purpose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
        <th class="<?= $Page->evaluationstatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus"><?= $Page->evaluationstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->transferdate->Visible) { // transferdate ?>
        <th class="<?= $Page->transferdate->headerCellClass() ?>"><span id="elh_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate"><?= $Page->transferdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->revenuetype->Visible) { // revenuetype ?>
        <th class="<?= $Page->revenuetype->headerCellClass() ?>"><span id="elh_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype"><?= $Page->revenuetype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->noofemployees->Visible) { // noofemployees ?>
        <th class="<?= $Page->noofemployees->headerCellClass() ?>"><span id="elh_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees"><?= $Page->noofemployees->caption() ?></span></th>
<?php } ?>
<?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
        <th class="<?= $Page->secondaryemail->headerCellClass() ?>"><span id="elh_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail"><?= $Page->secondaryemail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
        <th class="<?= $Page->noapprovalcalls->headerCellClass() ?>"><span id="elh_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls"><?= $Page->noapprovalcalls->caption() ?></span></th>
<?php } ?>
<?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
        <th class="<?= $Page->noapprovalemails->headerCellClass() ?>"><span id="elh_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails"><?= $Page->noapprovalemails->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vat_id->Visible) { // vat_id ?>
        <th class="<?= $Page->vat_id->headerCellClass() ?>"><span id="elh_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id"><?= $Page->vat_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
        <th class="<?= $Page->registration_number_1->headerCellClass() ?>"><span id="elh_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1"><?= $Page->registration_number_1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
        <th class="<?= $Page->registration_number_2->headerCellClass() ?>"><span id="elh_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2"><?= $Page->registration_number_2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->subindustry->Visible) { // subindustry ?>
        <th class="<?= $Page->subindustry->headerCellClass() ?>"><span id="elh_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry"><?= $Page->subindustry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <th class="<?= $Page->leads_relation->headerCellClass() ?>"><span id="elh_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation"><?= $Page->leads_relation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->legal_form->Visible) { // legal_form ?>
        <th class="<?= $Page->legal_form->headerCellClass() ?>"><span id="elh_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form"><?= $Page->legal_form->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <th class="<?= $Page->sum_time->headerCellClass() ?>"><span id="elh_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time"><?= $Page->sum_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->active->Visible) { // active ?>
        <th class="<?= $Page->active->headerCellClass() ?>"><span id="elh_crm_leaddetails_active" class="crm_leaddetails_active"><?= $Page->active->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->leadid->Visible) { // leadid ?>
        <td <?= $Page->leadid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadid" class="crm_leaddetails_leadid">
<span<?= $Page->leadid->viewAttributes() ?>>
<?= $Page->leadid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->lead_no->Visible) { // lead_no ?>
        <td <?= $Page->lead_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no">
<span<?= $Page->lead_no->viewAttributes() ?>>
<?= $Page->lead_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
        <td <?= $Page->_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails__email" class="crm_leaddetails__email">
<span<?= $Page->_email->viewAttributes() ?>>
<?= $Page->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->interest->Visible) { // interest ?>
        <td <?= $Page->interest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_interest" class="crm_leaddetails_interest">
<span<?= $Page->interest->viewAttributes() ?>>
<?= $Page->interest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
        <td <?= $Page->firstname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_firstname" class="crm_leaddetails_firstname">
<span<?= $Page->firstname->viewAttributes() ?>>
<?= $Page->firstname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
        <td <?= $Page->salutation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_salutation" class="crm_leaddetails_salutation">
<span<?= $Page->salutation->viewAttributes() ?>>
<?= $Page->salutation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
        <td <?= $Page->lastname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_lastname" class="crm_leaddetails_lastname">
<span<?= $Page->lastname->viewAttributes() ?>>
<?= $Page->lastname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->company->Visible) { // company ?>
        <td <?= $Page->company->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_company" class="crm_leaddetails_company">
<span<?= $Page->company->viewAttributes() ?>>
<?= $Page->company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->annualrevenue->Visible) { // annualrevenue ?>
        <td <?= $Page->annualrevenue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue">
<span<?= $Page->annualrevenue->viewAttributes() ?>>
<?= $Page->annualrevenue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->industry->Visible) { // industry ?>
        <td <?= $Page->industry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_industry" class="crm_leaddetails_industry">
<span<?= $Page->industry->viewAttributes() ?>>
<?= $Page->industry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->campaign->Visible) { // campaign ?>
        <td <?= $Page->campaign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_campaign" class="crm_leaddetails_campaign">
<span<?= $Page->campaign->viewAttributes() ?>>
<?= $Page->campaign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <td <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus">
<span<?= $Page->leadstatus->viewAttributes() ?>>
<?= $Page->leadstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <td <?= $Page->leadsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->converted->Visible) { // converted ?>
        <td <?= $Page->converted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_converted" class="crm_leaddetails_converted">
<span<?= $Page->converted->viewAttributes() ?>>
<?= $Page->converted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->licencekeystatus->Visible) { // licencekeystatus ?>
        <td <?= $Page->licencekeystatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus">
<span<?= $Page->licencekeystatus->viewAttributes() ?>>
<?= $Page->licencekeystatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->space->Visible) { // space ?>
        <td <?= $Page->space->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_space" class="crm_leaddetails_space">
<span<?= $Page->space->viewAttributes() ?>>
<?= $Page->space->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->priority->Visible) { // priority ?>
        <td <?= $Page->priority->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_priority" class="crm_leaddetails_priority">
<span<?= $Page->priority->viewAttributes() ?>>
<?= $Page->priority->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->demorequest->Visible) { // demorequest ?>
        <td <?= $Page->demorequest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest">
<span<?= $Page->demorequest->viewAttributes() ?>>
<?= $Page->demorequest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->partnercontact->Visible) { // partnercontact ?>
        <td <?= $Page->partnercontact->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact">
<span<?= $Page->partnercontact->viewAttributes() ?>>
<?= $Page->partnercontact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->productversion->Visible) { // productversion ?>
        <td <?= $Page->productversion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_productversion" class="crm_leaddetails_productversion">
<span<?= $Page->productversion->viewAttributes() ?>>
<?= $Page->productversion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->product->Visible) { // product ?>
        <td <?= $Page->product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_product" class="crm_leaddetails_product">
<span<?= $Page->product->viewAttributes() ?>>
<?= $Page->product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->maildate->Visible) { // maildate ?>
        <td <?= $Page->maildate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_maildate" class="crm_leaddetails_maildate">
<span<?= $Page->maildate->viewAttributes() ?>>
<?= $Page->maildate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nextstepdate->Visible) { // nextstepdate ?>
        <td <?= $Page->nextstepdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate">
<span<?= $Page->nextstepdate->viewAttributes() ?>>
<?= $Page->nextstepdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fundingsituation->Visible) { // fundingsituation ?>
        <td <?= $Page->fundingsituation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation">
<span<?= $Page->fundingsituation->viewAttributes() ?>>
<?= $Page->fundingsituation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
        <td <?= $Page->purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_purpose" class="crm_leaddetails_purpose">
<span<?= $Page->purpose->viewAttributes() ?>>
<?= $Page->purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->evaluationstatus->Visible) { // evaluationstatus ?>
        <td <?= $Page->evaluationstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus">
<span<?= $Page->evaluationstatus->viewAttributes() ?>>
<?= $Page->evaluationstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->transferdate->Visible) { // transferdate ?>
        <td <?= $Page->transferdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate">
<span<?= $Page->transferdate->viewAttributes() ?>>
<?= $Page->transferdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->revenuetype->Visible) { // revenuetype ?>
        <td <?= $Page->revenuetype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype">
<span<?= $Page->revenuetype->viewAttributes() ?>>
<?= $Page->revenuetype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->noofemployees->Visible) { // noofemployees ?>
        <td <?= $Page->noofemployees->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees">
<span<?= $Page->noofemployees->viewAttributes() ?>>
<?= $Page->noofemployees->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->secondaryemail->Visible) { // secondaryemail ?>
        <td <?= $Page->secondaryemail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail">
<span<?= $Page->secondaryemail->viewAttributes() ?>>
<?= $Page->secondaryemail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->noapprovalcalls->Visible) { // noapprovalcalls ?>
        <td <?= $Page->noapprovalcalls->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls">
<span<?= $Page->noapprovalcalls->viewAttributes() ?>>
<?= $Page->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->noapprovalemails->Visible) { // noapprovalemails ?>
        <td <?= $Page->noapprovalemails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails">
<span<?= $Page->noapprovalemails->viewAttributes() ?>>
<?= $Page->noapprovalemails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vat_id->Visible) { // vat_id ?>
        <td <?= $Page->vat_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id">
<span<?= $Page->vat_id->viewAttributes() ?>>
<?= $Page->vat_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->registration_number_1->Visible) { // registration_number_1 ?>
        <td <?= $Page->registration_number_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1">
<span<?= $Page->registration_number_1->viewAttributes() ?>>
<?= $Page->registration_number_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->registration_number_2->Visible) { // registration_number_2 ?>
        <td <?= $Page->registration_number_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2">
<span<?= $Page->registration_number_2->viewAttributes() ?>>
<?= $Page->registration_number_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->subindustry->Visible) { // subindustry ?>
        <td <?= $Page->subindustry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry">
<span<?= $Page->subindustry->viewAttributes() ?>>
<?= $Page->subindustry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <td <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation">
<span<?= $Page->leads_relation->viewAttributes() ?>>
<?= $Page->leads_relation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->legal_form->Visible) { // legal_form ?>
        <td <?= $Page->legal_form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form">
<span<?= $Page->legal_form->viewAttributes() ?>>
<?= $Page->legal_form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
        <td <?= $Page->sum_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time">
<span<?= $Page->sum_time->viewAttributes() ?>>
<?= $Page->sum_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->active->Visible) { // active ?>
        <td <?= $Page->active->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leaddetails_active" class="crm_leaddetails_active">
<span<?= $Page->active->viewAttributes() ?>>
<?= $Page->active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
