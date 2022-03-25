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
$crm_leaddetails_view = new crm_leaddetails_view();

// Run the page
$crm_leaddetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leaddetails_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leaddetailsview = currentForm = new ew.Form("fcrm_leaddetailsview", "view");

// Form_CustomValidate event
fcrm_leaddetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leaddetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leaddetails_view->ExportOptions->render("body") ?>
<?php $crm_leaddetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leaddetails_view->showPageHeader(); ?>
<?php
$crm_leaddetails_view->showMessage();
?>
<form name="fcrm_leaddetailsview" id="fcrm_leaddetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leaddetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leaddetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leaddetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
	<tr id="r_leadid">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadid"><?php echo $crm_leaddetails->leadid->caption() ?></span></td>
		<td data-name="leadid"<?php echo $crm_leaddetails->leadid->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadid">
<span<?php echo $crm_leaddetails->leadid->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
	<tr id="r_lead_no">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_lead_no"><?php echo $crm_leaddetails->lead_no->caption() ?></span></td>
		<td data-name="lead_no"<?php echo $crm_leaddetails->lead_no->cellAttributes() ?>>
<span id="el_crm_leaddetails_lead_no">
<span<?php echo $crm_leaddetails->lead_no->viewAttributes() ?>>
<?php echo $crm_leaddetails->lead_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->_email->Visible) { // email ?>
	<tr id="r__email">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails__email"><?php echo $crm_leaddetails->_email->caption() ?></span></td>
		<td data-name="_email"<?php echo $crm_leaddetails->_email->cellAttributes() ?>>
<span id="el_crm_leaddetails__email">
<span<?php echo $crm_leaddetails->_email->viewAttributes() ?>>
<?php echo $crm_leaddetails->_email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
	<tr id="r_interest">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_interest"><?php echo $crm_leaddetails->interest->caption() ?></span></td>
		<td data-name="interest"<?php echo $crm_leaddetails->interest->cellAttributes() ?>>
<span id="el_crm_leaddetails_interest">
<span<?php echo $crm_leaddetails->interest->viewAttributes() ?>>
<?php echo $crm_leaddetails->interest->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
	<tr id="r_firstname">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_firstname"><?php echo $crm_leaddetails->firstname->caption() ?></span></td>
		<td data-name="firstname"<?php echo $crm_leaddetails->firstname->cellAttributes() ?>>
<span id="el_crm_leaddetails_firstname">
<span<?php echo $crm_leaddetails->firstname->viewAttributes() ?>>
<?php echo $crm_leaddetails->firstname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
	<tr id="r_salutation">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_salutation"><?php echo $crm_leaddetails->salutation->caption() ?></span></td>
		<td data-name="salutation"<?php echo $crm_leaddetails->salutation->cellAttributes() ?>>
<span id="el_crm_leaddetails_salutation">
<span<?php echo $crm_leaddetails->salutation->viewAttributes() ?>>
<?php echo $crm_leaddetails->salutation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
	<tr id="r_lastname">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_lastname"><?php echo $crm_leaddetails->lastname->caption() ?></span></td>
		<td data-name="lastname"<?php echo $crm_leaddetails->lastname->cellAttributes() ?>>
<span id="el_crm_leaddetails_lastname">
<span<?php echo $crm_leaddetails->lastname->viewAttributes() ?>>
<?php echo $crm_leaddetails->lastname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->company->Visible) { // company ?>
	<tr id="r_company">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_company"><?php echo $crm_leaddetails->company->caption() ?></span></td>
		<td data-name="company"<?php echo $crm_leaddetails->company->cellAttributes() ?>>
<span id="el_crm_leaddetails_company">
<span<?php echo $crm_leaddetails->company->viewAttributes() ?>>
<?php echo $crm_leaddetails->company->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
	<tr id="r_annualrevenue">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_annualrevenue"><?php echo $crm_leaddetails->annualrevenue->caption() ?></span></td>
		<td data-name="annualrevenue"<?php echo $crm_leaddetails->annualrevenue->cellAttributes() ?>>
<span id="el_crm_leaddetails_annualrevenue">
<span<?php echo $crm_leaddetails->annualrevenue->viewAttributes() ?>>
<?php echo $crm_leaddetails->annualrevenue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
	<tr id="r_industry">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_industry"><?php echo $crm_leaddetails->industry->caption() ?></span></td>
		<td data-name="industry"<?php echo $crm_leaddetails->industry->cellAttributes() ?>>
<span id="el_crm_leaddetails_industry">
<span<?php echo $crm_leaddetails->industry->viewAttributes() ?>>
<?php echo $crm_leaddetails->industry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
	<tr id="r_campaign">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_campaign"><?php echo $crm_leaddetails->campaign->caption() ?></span></td>
		<td data-name="campaign"<?php echo $crm_leaddetails->campaign->cellAttributes() ?>>
<span id="el_crm_leaddetails_campaign">
<span<?php echo $crm_leaddetails->campaign->viewAttributes() ?>>
<?php echo $crm_leaddetails->campaign->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
	<tr id="r_leadstatus">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadstatus"><?php echo $crm_leaddetails->leadstatus->caption() ?></span></td>
		<td data-name="leadstatus"<?php echo $crm_leaddetails->leadstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadstatus">
<span<?php echo $crm_leaddetails->leadstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
	<tr id="r_leadsource">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leadsource"><?php echo $crm_leaddetails->leadsource->caption() ?></span></td>
		<td data-name="leadsource"<?php echo $crm_leaddetails->leadsource->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadsource">
<span<?php echo $crm_leaddetails->leadsource->viewAttributes() ?>>
<?php echo $crm_leaddetails->leadsource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
	<tr id="r_converted">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_converted"><?php echo $crm_leaddetails->converted->caption() ?></span></td>
		<td data-name="converted"<?php echo $crm_leaddetails->converted->cellAttributes() ?>>
<span id="el_crm_leaddetails_converted">
<span<?php echo $crm_leaddetails->converted->viewAttributes() ?>>
<?php echo $crm_leaddetails->converted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
	<tr id="r_licencekeystatus">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_licencekeystatus"><?php echo $crm_leaddetails->licencekeystatus->caption() ?></span></td>
		<td data-name="licencekeystatus"<?php echo $crm_leaddetails->licencekeystatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_licencekeystatus">
<span<?php echo $crm_leaddetails->licencekeystatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->licencekeystatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->space->Visible) { // space ?>
	<tr id="r_space">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_space"><?php echo $crm_leaddetails->space->caption() ?></span></td>
		<td data-name="space"<?php echo $crm_leaddetails->space->cellAttributes() ?>>
<span id="el_crm_leaddetails_space">
<span<?php echo $crm_leaddetails->space->viewAttributes() ?>>
<?php echo $crm_leaddetails->space->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->comments->Visible) { // comments ?>
	<tr id="r_comments">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_comments"><?php echo $crm_leaddetails->comments->caption() ?></span></td>
		<td data-name="comments"<?php echo $crm_leaddetails->comments->cellAttributes() ?>>
<span id="el_crm_leaddetails_comments">
<span<?php echo $crm_leaddetails->comments->viewAttributes() ?>>
<?php echo $crm_leaddetails->comments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
	<tr id="r_priority">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_priority"><?php echo $crm_leaddetails->priority->caption() ?></span></td>
		<td data-name="priority"<?php echo $crm_leaddetails->priority->cellAttributes() ?>>
<span id="el_crm_leaddetails_priority">
<span<?php echo $crm_leaddetails->priority->viewAttributes() ?>>
<?php echo $crm_leaddetails->priority->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
	<tr id="r_demorequest">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_demorequest"><?php echo $crm_leaddetails->demorequest->caption() ?></span></td>
		<td data-name="demorequest"<?php echo $crm_leaddetails->demorequest->cellAttributes() ?>>
<span id="el_crm_leaddetails_demorequest">
<span<?php echo $crm_leaddetails->demorequest->viewAttributes() ?>>
<?php echo $crm_leaddetails->demorequest->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
	<tr id="r_partnercontact">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_partnercontact"><?php echo $crm_leaddetails->partnercontact->caption() ?></span></td>
		<td data-name="partnercontact"<?php echo $crm_leaddetails->partnercontact->cellAttributes() ?>>
<span id="el_crm_leaddetails_partnercontact">
<span<?php echo $crm_leaddetails->partnercontact->viewAttributes() ?>>
<?php echo $crm_leaddetails->partnercontact->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
	<tr id="r_productversion">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_productversion"><?php echo $crm_leaddetails->productversion->caption() ?></span></td>
		<td data-name="productversion"<?php echo $crm_leaddetails->productversion->cellAttributes() ?>>
<span id="el_crm_leaddetails_productversion">
<span<?php echo $crm_leaddetails->productversion->viewAttributes() ?>>
<?php echo $crm_leaddetails->productversion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->product->Visible) { // product ?>
	<tr id="r_product">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_product"><?php echo $crm_leaddetails->product->caption() ?></span></td>
		<td data-name="product"<?php echo $crm_leaddetails->product->cellAttributes() ?>>
<span id="el_crm_leaddetails_product">
<span<?php echo $crm_leaddetails->product->viewAttributes() ?>>
<?php echo $crm_leaddetails->product->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
	<tr id="r_maildate">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_maildate"><?php echo $crm_leaddetails->maildate->caption() ?></span></td>
		<td data-name="maildate"<?php echo $crm_leaddetails->maildate->cellAttributes() ?>>
<span id="el_crm_leaddetails_maildate">
<span<?php echo $crm_leaddetails->maildate->viewAttributes() ?>>
<?php echo $crm_leaddetails->maildate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
	<tr id="r_nextstepdate">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_nextstepdate"><?php echo $crm_leaddetails->nextstepdate->caption() ?></span></td>
		<td data-name="nextstepdate"<?php echo $crm_leaddetails->nextstepdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_nextstepdate">
<span<?php echo $crm_leaddetails->nextstepdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->nextstepdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
	<tr id="r_fundingsituation">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_fundingsituation"><?php echo $crm_leaddetails->fundingsituation->caption() ?></span></td>
		<td data-name="fundingsituation"<?php echo $crm_leaddetails->fundingsituation->cellAttributes() ?>>
<span id="el_crm_leaddetails_fundingsituation">
<span<?php echo $crm_leaddetails->fundingsituation->viewAttributes() ?>>
<?php echo $crm_leaddetails->fundingsituation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
	<tr id="r_purpose">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_purpose"><?php echo $crm_leaddetails->purpose->caption() ?></span></td>
		<td data-name="purpose"<?php echo $crm_leaddetails->purpose->cellAttributes() ?>>
<span id="el_crm_leaddetails_purpose">
<span<?php echo $crm_leaddetails->purpose->viewAttributes() ?>>
<?php echo $crm_leaddetails->purpose->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
	<tr id="r_evaluationstatus">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_evaluationstatus"><?php echo $crm_leaddetails->evaluationstatus->caption() ?></span></td>
		<td data-name="evaluationstatus"<?php echo $crm_leaddetails->evaluationstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_evaluationstatus">
<span<?php echo $crm_leaddetails->evaluationstatus->viewAttributes() ?>>
<?php echo $crm_leaddetails->evaluationstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
	<tr id="r_transferdate">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_transferdate"><?php echo $crm_leaddetails->transferdate->caption() ?></span></td>
		<td data-name="transferdate"<?php echo $crm_leaddetails->transferdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_transferdate">
<span<?php echo $crm_leaddetails->transferdate->viewAttributes() ?>>
<?php echo $crm_leaddetails->transferdate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
	<tr id="r_revenuetype">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_revenuetype"><?php echo $crm_leaddetails->revenuetype->caption() ?></span></td>
		<td data-name="revenuetype"<?php echo $crm_leaddetails->revenuetype->cellAttributes() ?>>
<span id="el_crm_leaddetails_revenuetype">
<span<?php echo $crm_leaddetails->revenuetype->viewAttributes() ?>>
<?php echo $crm_leaddetails->revenuetype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
	<tr id="r_noofemployees">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noofemployees"><?php echo $crm_leaddetails->noofemployees->caption() ?></span></td>
		<td data-name="noofemployees"<?php echo $crm_leaddetails->noofemployees->cellAttributes() ?>>
<span id="el_crm_leaddetails_noofemployees">
<span<?php echo $crm_leaddetails->noofemployees->viewAttributes() ?>>
<?php echo $crm_leaddetails->noofemployees->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
	<tr id="r_secondaryemail">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_secondaryemail"><?php echo $crm_leaddetails->secondaryemail->caption() ?></span></td>
		<td data-name="secondaryemail"<?php echo $crm_leaddetails->secondaryemail->cellAttributes() ?>>
<span id="el_crm_leaddetails_secondaryemail">
<span<?php echo $crm_leaddetails->secondaryemail->viewAttributes() ?>>
<?php echo $crm_leaddetails->secondaryemail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
	<tr id="r_noapprovalcalls">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noapprovalcalls"><?php echo $crm_leaddetails->noapprovalcalls->caption() ?></span></td>
		<td data-name="noapprovalcalls"<?php echo $crm_leaddetails->noapprovalcalls->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalcalls">
<span<?php echo $crm_leaddetails->noapprovalcalls->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalcalls->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
	<tr id="r_noapprovalemails">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_noapprovalemails"><?php echo $crm_leaddetails->noapprovalemails->caption() ?></span></td>
		<td data-name="noapprovalemails"<?php echo $crm_leaddetails->noapprovalemails->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalemails">
<span<?php echo $crm_leaddetails->noapprovalemails->viewAttributes() ?>>
<?php echo $crm_leaddetails->noapprovalemails->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
	<tr id="r_vat_id">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_vat_id"><?php echo $crm_leaddetails->vat_id->caption() ?></span></td>
		<td data-name="vat_id"<?php echo $crm_leaddetails->vat_id->cellAttributes() ?>>
<span id="el_crm_leaddetails_vat_id">
<span<?php echo $crm_leaddetails->vat_id->viewAttributes() ?>>
<?php echo $crm_leaddetails->vat_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
	<tr id="r_registration_number_1">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_registration_number_1"><?php echo $crm_leaddetails->registration_number_1->caption() ?></span></td>
		<td data-name="registration_number_1"<?php echo $crm_leaddetails->registration_number_1->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_1">
<span<?php echo $crm_leaddetails->registration_number_1->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
	<tr id="r_registration_number_2">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_registration_number_2"><?php echo $crm_leaddetails->registration_number_2->caption() ?></span></td>
		<td data-name="registration_number_2"<?php echo $crm_leaddetails->registration_number_2->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_2">
<span<?php echo $crm_leaddetails->registration_number_2->viewAttributes() ?>>
<?php echo $crm_leaddetails->registration_number_2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->verification->Visible) { // verification ?>
	<tr id="r_verification">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_verification"><?php echo $crm_leaddetails->verification->caption() ?></span></td>
		<td data-name="verification"<?php echo $crm_leaddetails->verification->cellAttributes() ?>>
<span id="el_crm_leaddetails_verification">
<span<?php echo $crm_leaddetails->verification->viewAttributes() ?>>
<?php echo $crm_leaddetails->verification->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
	<tr id="r_subindustry">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_subindustry"><?php echo $crm_leaddetails->subindustry->caption() ?></span></td>
		<td data-name="subindustry"<?php echo $crm_leaddetails->subindustry->cellAttributes() ?>>
<span id="el_crm_leaddetails_subindustry">
<span<?php echo $crm_leaddetails->subindustry->viewAttributes() ?>>
<?php echo $crm_leaddetails->subindustry->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->atenttion->Visible) { // atenttion ?>
	<tr id="r_atenttion">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_atenttion"><?php echo $crm_leaddetails->atenttion->caption() ?></span></td>
		<td data-name="atenttion"<?php echo $crm_leaddetails->atenttion->cellAttributes() ?>>
<span id="el_crm_leaddetails_atenttion">
<span<?php echo $crm_leaddetails->atenttion->viewAttributes() ?>>
<?php echo $crm_leaddetails->atenttion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
	<tr id="r_leads_relation">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_leads_relation"><?php echo $crm_leaddetails->leads_relation->caption() ?></span></td>
		<td data-name="leads_relation"<?php echo $crm_leaddetails->leads_relation->cellAttributes() ?>>
<span id="el_crm_leaddetails_leads_relation">
<span<?php echo $crm_leaddetails->leads_relation->viewAttributes() ?>>
<?php echo $crm_leaddetails->leads_relation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
	<tr id="r_legal_form">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_legal_form"><?php echo $crm_leaddetails->legal_form->caption() ?></span></td>
		<td data-name="legal_form"<?php echo $crm_leaddetails->legal_form->cellAttributes() ?>>
<span id="el_crm_leaddetails_legal_form">
<span<?php echo $crm_leaddetails->legal_form->viewAttributes() ?>>
<?php echo $crm_leaddetails->legal_form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
	<tr id="r_sum_time">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_sum_time"><?php echo $crm_leaddetails->sum_time->caption() ?></span></td>
		<td data-name="sum_time"<?php echo $crm_leaddetails->sum_time->cellAttributes() ?>>
<span id="el_crm_leaddetails_sum_time">
<span<?php echo $crm_leaddetails->sum_time->viewAttributes() ?>>
<?php echo $crm_leaddetails->sum_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leaddetails->active->Visible) { // active ?>
	<tr id="r_active">
		<td class="<?php echo $crm_leaddetails_view->TableLeftColumnClass ?>"><span id="elh_crm_leaddetails_active"><?php echo $crm_leaddetails->active->caption() ?></span></td>
		<td data-name="active"<?php echo $crm_leaddetails->active->cellAttributes() ?>>
<span id="el_crm_leaddetails_active">
<span<?php echo $crm_leaddetails->active->viewAttributes() ?>>
<?php echo $crm_leaddetails->active->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leaddetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leaddetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leaddetails_view->terminate();
?>