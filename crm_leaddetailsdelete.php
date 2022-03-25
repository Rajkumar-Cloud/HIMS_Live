<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$crm_leaddetails_delete = new crm_leaddetails_delete();

// Run the page
$crm_leaddetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leaddetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leaddetailsdelete = currentForm = new ew.Form("fcrm_leaddetailsdelete", "delete");

// Form_CustomValidate event
fcrm_leaddetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leaddetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leaddetails_delete->showPageHeader(); ?>
<?php
$crm_leaddetails_delete->showMessage();
?>
<form name="fcrm_leaddetailsdelete" id="fcrm_leaddetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leaddetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leaddetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leaddetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
		<th class="<?php echo $crm_leaddetails->leadid->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadid" class="crm_leaddetails_leadid"><?php echo $crm_leaddetails->leadid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
		<th class="<?php echo $crm_leaddetails->lead_no->headerCellClass() ?>"><span id="elh_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no"><?php echo $crm_leaddetails->lead_no->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->_email->Visible) { // email ?>
		<th class="<?php echo $crm_leaddetails->_email->headerCellClass() ?>"><span id="elh_crm_leaddetails__email" class="crm_leaddetails__email"><?php echo $crm_leaddetails->_email->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
		<th class="<?php echo $crm_leaddetails->interest->headerCellClass() ?>"><span id="elh_crm_leaddetails_interest" class="crm_leaddetails_interest"><?php echo $crm_leaddetails->interest->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
		<th class="<?php echo $crm_leaddetails->firstname->headerCellClass() ?>"><span id="elh_crm_leaddetails_firstname" class="crm_leaddetails_firstname"><?php echo $crm_leaddetails->firstname->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
		<th class="<?php echo $crm_leaddetails->salutation->headerCellClass() ?>"><span id="elh_crm_leaddetails_salutation" class="crm_leaddetails_salutation"><?php echo $crm_leaddetails->salutation->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
		<th class="<?php echo $crm_leaddetails->lastname->headerCellClass() ?>"><span id="elh_crm_leaddetails_lastname" class="crm_leaddetails_lastname"><?php echo $crm_leaddetails->lastname->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->company->Visible) { // company ?>
		<th class="<?php echo $crm_leaddetails->company->headerCellClass() ?>"><span id="elh_crm_leaddetails_company" class="crm_leaddetails_company"><?php echo $crm_leaddetails->company->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
		<th class="<?php echo $crm_leaddetails->annualrevenue->headerCellClass() ?>"><span id="elh_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue"><?php echo $crm_leaddetails->annualrevenue->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
		<th class="<?php echo $crm_leaddetails->industry->headerCellClass() ?>"><span id="elh_crm_leaddetails_industry" class="crm_leaddetails_industry"><?php echo $crm_leaddetails->industry->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
		<th class="<?php echo $crm_leaddetails->campaign->headerCellClass() ?>"><span id="elh_crm_leaddetails_campaign" class="crm_leaddetails_campaign"><?php echo $crm_leaddetails->campaign->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
		<th class="<?php echo $crm_leaddetails->leadstatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus"><?php echo $crm_leaddetails->leadstatus->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
		<th class="<?php echo $crm_leaddetails->leadsource->headerCellClass() ?>"><span id="elh_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource"><?php echo $crm_leaddetails->leadsource->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
		<th class="<?php echo $crm_leaddetails->converted->headerCellClass() ?>"><span id="elh_crm_leaddetails_converted" class="crm_leaddetails_converted"><?php echo $crm_leaddetails->converted->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
		<th class="<?php echo $crm_leaddetails->licencekeystatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus"><?php echo $crm_leaddetails->licencekeystatus->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->space->Visible) { // space ?>
		<th class="<?php echo $crm_leaddetails->space->headerCellClass() ?>"><span id="elh_crm_leaddetails_space" class="crm_leaddetails_space"><?php echo $crm_leaddetails->space->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
		<th class="<?php echo $crm_leaddetails->priority->headerCellClass() ?>"><span id="elh_crm_leaddetails_priority" class="crm_leaddetails_priority"><?php echo $crm_leaddetails->priority->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
		<th class="<?php echo $crm_leaddetails->demorequest->headerCellClass() ?>"><span id="elh_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest"><?php echo $crm_leaddetails->demorequest->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
		<th class="<?php echo $crm_leaddetails->partnercontact->headerCellClass() ?>"><span id="elh_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact"><?php echo $crm_leaddetails->partnercontact->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
		<th class="<?php echo $crm_leaddetails->productversion->headerCellClass() ?>"><span id="elh_crm_leaddetails_productversion" class="crm_leaddetails_productversion"><?php echo $crm_leaddetails->productversion->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->product->Visible) { // product ?>
		<th class="<?php echo $crm_leaddetails->product->headerCellClass() ?>"><span id="elh_crm_leaddetails_product" class="crm_leaddetails_product"><?php echo $crm_leaddetails->product->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
		<th class="<?php echo $crm_leaddetails->maildate->headerCellClass() ?>"><span id="elh_crm_leaddetails_maildate" class="crm_leaddetails_maildate"><?php echo $crm_leaddetails->maildate->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
		<th class="<?php echo $crm_leaddetails->nextstepdate->headerCellClass() ?>"><span id="elh_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate"><?php echo $crm_leaddetails->nextstepdate->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
		<th class="<?php echo $crm_leaddetails->fundingsituation->headerCellClass() ?>"><span id="elh_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation"><?php echo $crm_leaddetails->fundingsituation->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
		<th class="<?php echo $crm_leaddetails->purpose->headerCellClass() ?>"><span id="elh_crm_leaddetails_purpose" class="crm_leaddetails_purpose"><?php echo $crm_leaddetails->purpose->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
		<th class="<?php echo $crm_leaddetails->evaluationstatus->headerCellClass() ?>"><span id="elh_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus"><?php echo $crm_leaddetails->evaluationstatus->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
		<th class="<?php echo $crm_leaddetails->transferdate->headerCellClass() ?>"><span id="elh_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate"><?php echo $crm_leaddetails->transferdate->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
		<th class="<?php echo $crm_leaddetails->revenuetype->headerCellClass() ?>"><span id="elh_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype"><?php echo $crm_leaddetails->revenuetype->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
		<th class="<?php echo $crm_leaddetails->noofemployees->headerCellClass() ?>"><span id="elh_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees"><?php echo $crm_leaddetails->noofemployees->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
		<th class="<?php echo $crm_leaddetails->secondaryemail->headerCellClass() ?>"><span id="elh_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail"><?php echo $crm_leaddetails->secondaryemail->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
		<th class="<?php echo $crm_leaddetails->noapprovalcalls->headerCellClass() ?>"><span id="elh_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls"><?php echo $crm_leaddetails->noapprovalcalls->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
		<th class="<?php echo $crm_leaddetails->noapprovalemails->headerCellClass() ?>"><span id="elh_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails"><?php echo $crm_leaddetails->noapprovalemails->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
		<th class="<?php echo $crm_leaddetails->vat_id->headerCellClass() ?>"><span id="elh_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id"><?php echo $crm_leaddetails->vat_id->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
		<th class="<?php echo $crm_leaddetails->registration_number_1->headerCellClass() ?>"><span id="elh_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1"><?php echo $crm_leaddetails->registration_number_1->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
		<th class="<?php echo $crm_leaddetails->registration_number_2->headerCellClass() ?>"><span id="elh_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2"><?php echo $crm_leaddetails->registration_number_2->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
		<th class="<?php echo $crm_leaddetails->subindustry->headerCellClass() ?>"><span id="elh_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry"><?php echo $crm_leaddetails->subindustry->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
		<th class="<?php echo $crm_leaddetails->leads_relation->headerCellClass() ?>"><span id="elh_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation"><?php echo $crm_leaddetails->leads_relation->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
		<th class="<?php echo $crm_leaddetails->legal_form->headerCellClass() ?>"><span id="elh_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form"><?php echo $crm_leaddetails->legal_form->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
		<th class="<?php echo $crm_leaddetails->sum_time->headerCellClass() ?>"><span id="elh_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time"><?php echo $crm_leaddetails->sum_time->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leaddetails->active->Visible) { // active ?>
		<th class="<?php echo $crm_leaddetails->active->headerCellClass() ?>"><span id="elh_crm_leaddetails_active" class="crm_leaddetails_active"><?php echo $crm_leaddetails->active->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leaddetails_delete->RecCnt = 0;
$i = 0;
while (!$crm_leaddetails_delete->Recordset->EOF) {
	$crm_leaddetails_delete->RecCnt++;
	$crm_leaddetails_delete->RowCnt++;

	// Set row properties
	$crm_leaddetails->resetAttributes();
	$crm_leaddetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leaddetails_delete->loadRowValues($crm_leaddetails_delete->Recordset);

	// Render row
	$crm_leaddetails_delete->renderRow();
?>
	<tr<?php echo $crm_leaddetails->rowAttributes() ?>>
<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
		<td<?php echo $crm_leaddetails->leadid->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_leadid" class="crm_leaddetails_leadid">
<span<?php echo $crm_leaddetails->leadid->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
		<td<?php echo $crm_leaddetails->lead_no->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_lead_no" class="crm_leaddetails_lead_no">
<span<?php echo $crm_leaddetails->lead_no->viewAttributes() ?>>
<?php echo $crm_leaddetails->lead_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->_email->Visible) { // email ?>
		<td<?php echo $crm_leaddetails->_email->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails__email" class="crm_leaddetails__email">
<span<?php echo $crm_leaddetails->_email->viewAttributes() ?>>
<?php echo $crm_leaddetails->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
		<td<?php echo $crm_leaddetails->interest->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_interest" class="crm_leaddetails_interest">
<span<?php echo $crm_leaddetails->interest->viewAttributes() ?>>
<?php echo $crm_leaddetails->interest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
		<td<?php echo $crm_leaddetails->firstname->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_firstname" class="crm_leaddetails_firstname">
<span<?php echo $crm_leaddetails->firstname->viewAttributes() ?>>
<?php echo $crm_leaddetails->firstname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
		<td<?php echo $crm_leaddetails->salutation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_salutation" class="crm_leaddetails_salutation">
<span<?php echo $crm_leaddetails->salutation->viewAttributes() ?>>
<?php echo $crm_leaddetails->salutation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
		<td<?php echo $crm_leaddetails->lastname->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_lastname" class="crm_leaddetails_lastname">
<span<?php echo $crm_leaddetails->lastname->viewAttributes() ?>>
<?php echo $crm_leaddetails->lastname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->company->Visible) { // company ?>
		<td<?php echo $crm_leaddetails->company->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_company" class="crm_leaddetails_company">
<span<?php echo $crm_leaddetails->company->viewAttributes() ?>>
<?php echo $crm_leaddetails->company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
		<td<?php echo $crm_leaddetails->annualrevenue->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_annualrevenue" class="crm_leaddetails_annualrevenue">
<span<?php echo $crm_leaddetails->annualrevenue->viewAttributes() ?>>
<?php echo $crm_leaddetails->annualrevenue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
		<td<?php echo $crm_leaddetails->industry->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_industry" class="crm_leaddetails_industry">
<span<?php echo $crm_leaddetails->industry->viewAttributes() ?>>
<?php echo $crm_leaddetails->industry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
		<td<?php echo $crm_leaddetails->campaign->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_campaign" class="crm_leaddetails_campaign">
<span<?php echo $crm_leaddetails->campaign->viewAttributes() ?>>
<?php echo $crm_leaddetails->campaign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
		<td<?php echo $crm_leaddetails->leadstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_leadstatus" class="crm_leaddetails_leadstatus">
<span<?php echo $crm_leaddetails->leadstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
		<td<?php echo $crm_leaddetails->leadsource->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_leadsource" class="crm_leaddetails_leadsource">
<span<?php echo $crm_leaddetails->leadsource->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
		<td<?php echo $crm_leaddetails->converted->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_converted" class="crm_leaddetails_converted">
<span<?php echo $crm_leaddetails->converted->viewAttributes() ?>>
<?php echo $crm_leaddetails->converted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
		<td<?php echo $crm_leaddetails->licencekeystatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_licencekeystatus" class="crm_leaddetails_licencekeystatus">
<span<?php echo $crm_leaddetails->licencekeystatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->licencekeystatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->space->Visible) { // space ?>
		<td<?php echo $crm_leaddetails->space->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_space" class="crm_leaddetails_space">
<span<?php echo $crm_leaddetails->space->viewAttributes() ?>>
<?php echo $crm_leaddetails->space->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
		<td<?php echo $crm_leaddetails->priority->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_priority" class="crm_leaddetails_priority">
<span<?php echo $crm_leaddetails->priority->viewAttributes() ?>>
<?php echo $crm_leaddetails->priority->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
		<td<?php echo $crm_leaddetails->demorequest->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_demorequest" class="crm_leaddetails_demorequest">
<span<?php echo $crm_leaddetails->demorequest->viewAttributes() ?>>
<?php echo $crm_leaddetails->demorequest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
		<td<?php echo $crm_leaddetails->partnercontact->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_partnercontact" class="crm_leaddetails_partnercontact">
<span<?php echo $crm_leaddetails->partnercontact->viewAttributes() ?>>
<?php echo $crm_leaddetails->partnercontact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
		<td<?php echo $crm_leaddetails->productversion->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_productversion" class="crm_leaddetails_productversion">
<span<?php echo $crm_leaddetails->productversion->viewAttributes() ?>>
<?php echo $crm_leaddetails->productversion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->product->Visible) { // product ?>
		<td<?php echo $crm_leaddetails->product->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_product" class="crm_leaddetails_product">
<span<?php echo $crm_leaddetails->product->viewAttributes() ?>>
<?php echo $crm_leaddetails->product->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
		<td<?php echo $crm_leaddetails->maildate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_maildate" class="crm_leaddetails_maildate">
<span<?php echo $crm_leaddetails->maildate->viewAttributes() ?>>
<?php echo $crm_leaddetails->maildate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
		<td<?php echo $crm_leaddetails->nextstepdate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_nextstepdate" class="crm_leaddetails_nextstepdate">
<span<?php echo $crm_leaddetails->nextstepdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->nextstepdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
		<td<?php echo $crm_leaddetails->fundingsituation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_fundingsituation" class="crm_leaddetails_fundingsituation">
<span<?php echo $crm_leaddetails->fundingsituation->viewAttributes() ?>>
<?php echo $crm_leaddetails->fundingsituation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
		<td<?php echo $crm_leaddetails->purpose->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_purpose" class="crm_leaddetails_purpose">
<span<?php echo $crm_leaddetails->purpose->viewAttributes() ?>>
<?php echo $crm_leaddetails->purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
		<td<?php echo $crm_leaddetails->evaluationstatus->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_evaluationstatus" class="crm_leaddetails_evaluationstatus">
<span<?php echo $crm_leaddetails->evaluationstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->evaluationstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
		<td<?php echo $crm_leaddetails->transferdate->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_transferdate" class="crm_leaddetails_transferdate">
<span<?php echo $crm_leaddetails->transferdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->transferdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
		<td<?php echo $crm_leaddetails->revenuetype->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_revenuetype" class="crm_leaddetails_revenuetype">
<span<?php echo $crm_leaddetails->revenuetype->viewAttributes() ?>>
<?php echo $crm_leaddetails->revenuetype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
		<td<?php echo $crm_leaddetails->noofemployees->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_noofemployees" class="crm_leaddetails_noofemployees">
<span<?php echo $crm_leaddetails->noofemployees->viewAttributes() ?>>
<?php echo $crm_leaddetails->noofemployees->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
		<td<?php echo $crm_leaddetails->secondaryemail->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_secondaryemail" class="crm_leaddetails_secondaryemail">
<span<?php echo $crm_leaddetails->secondaryemail->viewAttributes() ?>>
<?php echo $crm_leaddetails->secondaryemail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
		<td<?php echo $crm_leaddetails->noapprovalcalls->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_noapprovalcalls" class="crm_leaddetails_noapprovalcalls">
<span<?php echo $crm_leaddetails->noapprovalcalls->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
		<td<?php echo $crm_leaddetails->noapprovalemails->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_noapprovalemails" class="crm_leaddetails_noapprovalemails">
<span<?php echo $crm_leaddetails->noapprovalemails->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalemails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
		<td<?php echo $crm_leaddetails->vat_id->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_vat_id" class="crm_leaddetails_vat_id">
<span<?php echo $crm_leaddetails->vat_id->viewAttributes() ?>>
<?php echo $crm_leaddetails->vat_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
		<td<?php echo $crm_leaddetails->registration_number_1->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_registration_number_1" class="crm_leaddetails_registration_number_1">
<span<?php echo $crm_leaddetails->registration_number_1->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
		<td<?php echo $crm_leaddetails->registration_number_2->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_registration_number_2" class="crm_leaddetails_registration_number_2">
<span<?php echo $crm_leaddetails->registration_number_2->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
		<td<?php echo $crm_leaddetails->subindustry->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_subindustry" class="crm_leaddetails_subindustry">
<span<?php echo $crm_leaddetails->subindustry->viewAttributes() ?>>
<?php echo $crm_leaddetails->subindustry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
		<td<?php echo $crm_leaddetails->leads_relation->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_leads_relation" class="crm_leaddetails_leads_relation">
<span<?php echo $crm_leaddetails->leads_relation->viewAttributes() ?>>
<?php echo $crm_leaddetails->leads_relation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
		<td<?php echo $crm_leaddetails->legal_form->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_legal_form" class="crm_leaddetails_legal_form">
<span<?php echo $crm_leaddetails->legal_form->viewAttributes() ?>>
<?php echo $crm_leaddetails->legal_form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
		<td<?php echo $crm_leaddetails->sum_time->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_sum_time" class="crm_leaddetails_sum_time">
<span<?php echo $crm_leaddetails->sum_time->viewAttributes() ?>>
<?php echo $crm_leaddetails->sum_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leaddetails->active->Visible) { // active ?>
		<td<?php echo $crm_leaddetails->active->cellAttributes() ?>>
<span id="el<?php echo $crm_leaddetails_delete->RowCnt ?>_crm_leaddetails_active" class="crm_leaddetails_active">
<span<?php echo $crm_leaddetails->active->viewAttributes() ?>>
<?php echo $crm_leaddetails->active->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leaddetails_delete->Recordset->moveNext();
}
$crm_leaddetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leaddetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leaddetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leaddetails_delete->terminate();
?>