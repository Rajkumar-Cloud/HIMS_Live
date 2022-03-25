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
$crm_leaddetails_edit = new crm_leaddetails_edit();

// Run the page
$crm_leaddetails_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leaddetails_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fcrm_leaddetailsedit = currentForm = new ew.Form("fcrm_leaddetailsedit", "edit");

// Validate form
fcrm_leaddetailsedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($crm_leaddetails_edit->leadid->Required) { ?>
			elm = this.getElements("x" + infix + "_leadid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->leadid->caption(), $crm_leaddetails->leadid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_leadid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->leadid->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->lead_no->Required) { ?>
			elm = this.getElements("x" + infix + "_lead_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->lead_no->caption(), $crm_leaddetails->lead_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->_email->caption(), $crm_leaddetails->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->interest->Required) { ?>
			elm = this.getElements("x" + infix + "_interest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->interest->caption(), $crm_leaddetails->interest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->firstname->Required) { ?>
			elm = this.getElements("x" + infix + "_firstname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->firstname->caption(), $crm_leaddetails->firstname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->salutation->Required) { ?>
			elm = this.getElements("x" + infix + "_salutation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->salutation->caption(), $crm_leaddetails->salutation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->lastname->Required) { ?>
			elm = this.getElements("x" + infix + "_lastname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->lastname->caption(), $crm_leaddetails->lastname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->company->Required) { ?>
			elm = this.getElements("x" + infix + "_company");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->company->caption(), $crm_leaddetails->company->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->annualrevenue->Required) { ?>
			elm = this.getElements("x" + infix + "_annualrevenue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->annualrevenue->caption(), $crm_leaddetails->annualrevenue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_annualrevenue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->annualrevenue->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->industry->Required) { ?>
			elm = this.getElements("x" + infix + "_industry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->industry->caption(), $crm_leaddetails->industry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->campaign->Required) { ?>
			elm = this.getElements("x" + infix + "_campaign");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->campaign->caption(), $crm_leaddetails->campaign->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->leadstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_leadstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->leadstatus->caption(), $crm_leaddetails->leadstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->leadsource->Required) { ?>
			elm = this.getElements("x" + infix + "_leadsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->leadsource->caption(), $crm_leaddetails->leadsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->converted->Required) { ?>
			elm = this.getElements("x" + infix + "_converted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->converted->caption(), $crm_leaddetails->converted->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_converted");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->converted->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->licencekeystatus->Required) { ?>
			elm = this.getElements("x" + infix + "_licencekeystatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->licencekeystatus->caption(), $crm_leaddetails->licencekeystatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->space->Required) { ?>
			elm = this.getElements("x" + infix + "_space");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->space->caption(), $crm_leaddetails->space->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->comments->Required) { ?>
			elm = this.getElements("x" + infix + "_comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->comments->caption(), $crm_leaddetails->comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->priority->Required) { ?>
			elm = this.getElements("x" + infix + "_priority");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->priority->caption(), $crm_leaddetails->priority->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->demorequest->Required) { ?>
			elm = this.getElements("x" + infix + "_demorequest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->demorequest->caption(), $crm_leaddetails->demorequest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->partnercontact->Required) { ?>
			elm = this.getElements("x" + infix + "_partnercontact");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->partnercontact->caption(), $crm_leaddetails->partnercontact->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->productversion->Required) { ?>
			elm = this.getElements("x" + infix + "_productversion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->productversion->caption(), $crm_leaddetails->productversion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->product->Required) { ?>
			elm = this.getElements("x" + infix + "_product");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->product->caption(), $crm_leaddetails->product->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->maildate->Required) { ?>
			elm = this.getElements("x" + infix + "_maildate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->maildate->caption(), $crm_leaddetails->maildate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_maildate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->maildate->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->nextstepdate->Required) { ?>
			elm = this.getElements("x" + infix + "_nextstepdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->nextstepdate->caption(), $crm_leaddetails->nextstepdate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_nextstepdate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->nextstepdate->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->fundingsituation->Required) { ?>
			elm = this.getElements("x" + infix + "_fundingsituation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->fundingsituation->caption(), $crm_leaddetails->fundingsituation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->purpose->caption(), $crm_leaddetails->purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->evaluationstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_evaluationstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->evaluationstatus->caption(), $crm_leaddetails->evaluationstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->transferdate->Required) { ?>
			elm = this.getElements("x" + infix + "_transferdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->transferdate->caption(), $crm_leaddetails->transferdate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_transferdate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->transferdate->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->revenuetype->Required) { ?>
			elm = this.getElements("x" + infix + "_revenuetype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->revenuetype->caption(), $crm_leaddetails->revenuetype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->noofemployees->Required) { ?>
			elm = this.getElements("x" + infix + "_noofemployees");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->noofemployees->caption(), $crm_leaddetails->noofemployees->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_noofemployees");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->noofemployees->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->secondaryemail->Required) { ?>
			elm = this.getElements("x" + infix + "_secondaryemail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->secondaryemail->caption(), $crm_leaddetails->secondaryemail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->noapprovalcalls->Required) { ?>
			elm = this.getElements("x" + infix + "_noapprovalcalls");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->noapprovalcalls->caption(), $crm_leaddetails->noapprovalcalls->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_noapprovalcalls");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->noapprovalcalls->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->noapprovalemails->Required) { ?>
			elm = this.getElements("x" + infix + "_noapprovalemails");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->noapprovalemails->caption(), $crm_leaddetails->noapprovalemails->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_noapprovalemails");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->noapprovalemails->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->vat_id->Required) { ?>
			elm = this.getElements("x" + infix + "_vat_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->vat_id->caption(), $crm_leaddetails->vat_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->registration_number_1->Required) { ?>
			elm = this.getElements("x" + infix + "_registration_number_1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->registration_number_1->caption(), $crm_leaddetails->registration_number_1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->registration_number_2->Required) { ?>
			elm = this.getElements("x" + infix + "_registration_number_2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->registration_number_2->caption(), $crm_leaddetails->registration_number_2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->verification->Required) { ?>
			elm = this.getElements("x" + infix + "_verification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->verification->caption(), $crm_leaddetails->verification->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->subindustry->Required) { ?>
			elm = this.getElements("x" + infix + "_subindustry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->subindustry->caption(), $crm_leaddetails->subindustry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->atenttion->Required) { ?>
			elm = this.getElements("x" + infix + "_atenttion");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->atenttion->caption(), $crm_leaddetails->atenttion->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->leads_relation->Required) { ?>
			elm = this.getElements("x" + infix + "_leads_relation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->leads_relation->caption(), $crm_leaddetails->leads_relation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->legal_form->Required) { ?>
			elm = this.getElements("x" + infix + "_legal_form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->legal_form->caption(), $crm_leaddetails->legal_form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_leaddetails_edit->sum_time->Required) { ?>
			elm = this.getElements("x" + infix + "_sum_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->sum_time->caption(), $crm_leaddetails->sum_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sum_time");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->sum_time->errorMessage()) ?>");
		<?php if ($crm_leaddetails_edit->active->Required) { ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_leaddetails->active->caption(), $crm_leaddetails->active->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_active");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_leaddetails->active->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fcrm_leaddetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leaddetailsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leaddetails_edit->showPageHeader(); ?>
<?php
$crm_leaddetails_edit->showMessage();
?>
<form name="fcrm_leaddetailsedit" id="fcrm_leaddetailsedit" class="<?php echo $crm_leaddetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leaddetails_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leaddetails_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leaddetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leaddetails_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($crm_leaddetails->leadid->Visible) { // leadid ?>
	<div id="r_leadid" class="form-group row">
		<label id="elh_crm_leaddetails_leadid" for="x_leadid" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->leadid->caption() ?><?php echo ($crm_leaddetails->leadid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->leadid->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadid">
<span<?php echo $crm_leaddetails->leadid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($crm_leaddetails->leadid->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="crm_leaddetails" data-field="x_leadid" name="x_leadid" id="x_leadid" value="<?php echo HtmlEncode($crm_leaddetails->leadid->CurrentValue) ?>">
<?php echo $crm_leaddetails->leadid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->lead_no->Visible) { // lead_no ?>
	<div id="r_lead_no" class="form-group row">
		<label id="elh_crm_leaddetails_lead_no" for="x_lead_no" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->lead_no->caption() ?><?php echo ($crm_leaddetails->lead_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->lead_no->cellAttributes() ?>>
<span id="el_crm_leaddetails_lead_no">
<input type="text" data-table="crm_leaddetails" data-field="x_lead_no" name="x_lead_no" id="x_lead_no" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leaddetails->lead_no->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->lead_no->EditValue ?>"<?php echo $crm_leaddetails->lead_no->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->lead_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_crm_leaddetails__email" for="x__email" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->_email->caption() ?><?php echo ($crm_leaddetails->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->_email->cellAttributes() ?>>
<span id="el_crm_leaddetails__email">
<input type="text" data-table="crm_leaddetails" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leaddetails->_email->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->_email->EditValue ?>"<?php echo $crm_leaddetails->_email->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->interest->Visible) { // interest ?>
	<div id="r_interest" class="form-group row">
		<label id="elh_crm_leaddetails_interest" for="x_interest" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->interest->caption() ?><?php echo ($crm_leaddetails->interest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->interest->cellAttributes() ?>>
<span id="el_crm_leaddetails_interest">
<input type="text" data-table="crm_leaddetails" data-field="x_interest" name="x_interest" id="x_interest" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->interest->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->interest->EditValue ?>"<?php echo $crm_leaddetails->interest->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->interest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->firstname->Visible) { // firstname ?>
	<div id="r_firstname" class="form-group row">
		<label id="elh_crm_leaddetails_firstname" for="x_firstname" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->firstname->caption() ?><?php echo ($crm_leaddetails->firstname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->firstname->cellAttributes() ?>>
<span id="el_crm_leaddetails_firstname">
<input type="text" data-table="crm_leaddetails" data-field="x_firstname" name="x_firstname" id="x_firstname" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($crm_leaddetails->firstname->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->firstname->EditValue ?>"<?php echo $crm_leaddetails->firstname->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->firstname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->salutation->Visible) { // salutation ?>
	<div id="r_salutation" class="form-group row">
		<label id="elh_crm_leaddetails_salutation" for="x_salutation" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->salutation->caption() ?><?php echo ($crm_leaddetails->salutation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->salutation->cellAttributes() ?>>
<span id="el_crm_leaddetails_salutation">
<input type="text" data-table="crm_leaddetails" data-field="x_salutation" name="x_salutation" id="x_salutation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_leaddetails->salutation->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->salutation->EditValue ?>"<?php echo $crm_leaddetails->salutation->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->salutation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->lastname->Visible) { // lastname ?>
	<div id="r_lastname" class="form-group row">
		<label id="elh_crm_leaddetails_lastname" for="x_lastname" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->lastname->caption() ?><?php echo ($crm_leaddetails->lastname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->lastname->cellAttributes() ?>>
<span id="el_crm_leaddetails_lastname">
<input type="text" data-table="crm_leaddetails" data-field="x_lastname" name="x_lastname" id="x_lastname" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($crm_leaddetails->lastname->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->lastname->EditValue ?>"<?php echo $crm_leaddetails->lastname->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->lastname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->company->Visible) { // company ?>
	<div id="r_company" class="form-group row">
		<label id="elh_crm_leaddetails_company" for="x_company" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->company->caption() ?><?php echo ($crm_leaddetails->company->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->company->cellAttributes() ?>>
<span id="el_crm_leaddetails_company">
<input type="text" data-table="crm_leaddetails" data-field="x_company" name="x_company" id="x_company" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leaddetails->company->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->company->EditValue ?>"<?php echo $crm_leaddetails->company->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->company->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->annualrevenue->Visible) { // annualrevenue ?>
	<div id="r_annualrevenue" class="form-group row">
		<label id="elh_crm_leaddetails_annualrevenue" for="x_annualrevenue" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->annualrevenue->caption() ?><?php echo ($crm_leaddetails->annualrevenue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->annualrevenue->cellAttributes() ?>>
<span id="el_crm_leaddetails_annualrevenue">
<input type="text" data-table="crm_leaddetails" data-field="x_annualrevenue" name="x_annualrevenue" id="x_annualrevenue" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->annualrevenue->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->annualrevenue->EditValue ?>"<?php echo $crm_leaddetails->annualrevenue->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->annualrevenue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->industry->Visible) { // industry ?>
	<div id="r_industry" class="form-group row">
		<label id="elh_crm_leaddetails_industry" for="x_industry" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->industry->caption() ?><?php echo ($crm_leaddetails->industry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->industry->cellAttributes() ?>>
<span id="el_crm_leaddetails_industry">
<input type="text" data-table="crm_leaddetails" data-field="x_industry" name="x_industry" id="x_industry" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_leaddetails->industry->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->industry->EditValue ?>"<?php echo $crm_leaddetails->industry->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->industry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->campaign->Visible) { // campaign ?>
	<div id="r_campaign" class="form-group row">
		<label id="elh_crm_leaddetails_campaign" for="x_campaign" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->campaign->caption() ?><?php echo ($crm_leaddetails->campaign->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->campaign->cellAttributes() ?>>
<span id="el_crm_leaddetails_campaign">
<input type="text" data-table="crm_leaddetails" data-field="x_campaign" name="x_campaign" id="x_campaign" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->campaign->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->campaign->EditValue ?>"<?php echo $crm_leaddetails->campaign->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->campaign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->leadstatus->Visible) { // leadstatus ?>
	<div id="r_leadstatus" class="form-group row">
		<label id="elh_crm_leaddetails_leadstatus" for="x_leadstatus" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->leadstatus->caption() ?><?php echo ($crm_leaddetails->leadstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->leadstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadstatus">
<input type="text" data-table="crm_leaddetails" data-field="x_leadstatus" name="x_leadstatus" id="x_leadstatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->leadstatus->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->leadstatus->EditValue ?>"<?php echo $crm_leaddetails->leadstatus->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->leadstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->leadsource->Visible) { // leadsource ?>
	<div id="r_leadsource" class="form-group row">
		<label id="elh_crm_leaddetails_leadsource" for="x_leadsource" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->leadsource->caption() ?><?php echo ($crm_leaddetails->leadsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->leadsource->cellAttributes() ?>>
<span id="el_crm_leaddetails_leadsource">
<input type="text" data-table="crm_leaddetails" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_leaddetails->leadsource->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->leadsource->EditValue ?>"<?php echo $crm_leaddetails->leadsource->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->leadsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->converted->Visible) { // converted ?>
	<div id="r_converted" class="form-group row">
		<label id="elh_crm_leaddetails_converted" for="x_converted" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->converted->caption() ?><?php echo ($crm_leaddetails->converted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->converted->cellAttributes() ?>>
<span id="el_crm_leaddetails_converted">
<input type="text" data-table="crm_leaddetails" data-field="x_converted" name="x_converted" id="x_converted" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->converted->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->converted->EditValue ?>"<?php echo $crm_leaddetails->converted->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->converted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->licencekeystatus->Visible) { // licencekeystatus ?>
	<div id="r_licencekeystatus" class="form-group row">
		<label id="elh_crm_leaddetails_licencekeystatus" for="x_licencekeystatus" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->licencekeystatus->caption() ?><?php echo ($crm_leaddetails->licencekeystatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->licencekeystatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_licencekeystatus">
<input type="text" data-table="crm_leaddetails" data-field="x_licencekeystatus" name="x_licencekeystatus" id="x_licencekeystatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->licencekeystatus->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->licencekeystatus->EditValue ?>"<?php echo $crm_leaddetails->licencekeystatus->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->licencekeystatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->space->Visible) { // space ?>
	<div id="r_space" class="form-group row">
		<label id="elh_crm_leaddetails_space" for="x_space" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->space->caption() ?><?php echo ($crm_leaddetails->space->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->space->cellAttributes() ?>>
<span id="el_crm_leaddetails_space">
<input type="text" data-table="crm_leaddetails" data-field="x_space" name="x_space" id="x_space" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($crm_leaddetails->space->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->space->EditValue ?>"<?php echo $crm_leaddetails->space->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->space->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->comments->Visible) { // comments ?>
	<div id="r_comments" class="form-group row">
		<label id="elh_crm_leaddetails_comments" for="x_comments" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->comments->caption() ?><?php echo ($crm_leaddetails->comments->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->comments->cellAttributes() ?>>
<span id="el_crm_leaddetails_comments">
<textarea data-table="crm_leaddetails" data-field="x_comments" name="x_comments" id="x_comments" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_leaddetails->comments->getPlaceHolder()) ?>"<?php echo $crm_leaddetails->comments->editAttributes() ?>><?php echo $crm_leaddetails->comments->EditValue ?></textarea>
</span>
<?php echo $crm_leaddetails->comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->priority->Visible) { // priority ?>
	<div id="r_priority" class="form-group row">
		<label id="elh_crm_leaddetails_priority" for="x_priority" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->priority->caption() ?><?php echo ($crm_leaddetails->priority->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->priority->cellAttributes() ?>>
<span id="el_crm_leaddetails_priority">
<input type="text" data-table="crm_leaddetails" data-field="x_priority" name="x_priority" id="x_priority" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->priority->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->priority->EditValue ?>"<?php echo $crm_leaddetails->priority->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->priority->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->demorequest->Visible) { // demorequest ?>
	<div id="r_demorequest" class="form-group row">
		<label id="elh_crm_leaddetails_demorequest" for="x_demorequest" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->demorequest->caption() ?><?php echo ($crm_leaddetails->demorequest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->demorequest->cellAttributes() ?>>
<span id="el_crm_leaddetails_demorequest">
<input type="text" data-table="crm_leaddetails" data-field="x_demorequest" name="x_demorequest" id="x_demorequest" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->demorequest->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->demorequest->EditValue ?>"<?php echo $crm_leaddetails->demorequest->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->demorequest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->partnercontact->Visible) { // partnercontact ?>
	<div id="r_partnercontact" class="form-group row">
		<label id="elh_crm_leaddetails_partnercontact" for="x_partnercontact" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->partnercontact->caption() ?><?php echo ($crm_leaddetails->partnercontact->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->partnercontact->cellAttributes() ?>>
<span id="el_crm_leaddetails_partnercontact">
<input type="text" data-table="crm_leaddetails" data-field="x_partnercontact" name="x_partnercontact" id="x_partnercontact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->partnercontact->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->partnercontact->EditValue ?>"<?php echo $crm_leaddetails->partnercontact->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->partnercontact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->productversion->Visible) { // productversion ?>
	<div id="r_productversion" class="form-group row">
		<label id="elh_crm_leaddetails_productversion" for="x_productversion" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->productversion->caption() ?><?php echo ($crm_leaddetails->productversion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->productversion->cellAttributes() ?>>
<span id="el_crm_leaddetails_productversion">
<input type="text" data-table="crm_leaddetails" data-field="x_productversion" name="x_productversion" id="x_productversion" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($crm_leaddetails->productversion->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->productversion->EditValue ?>"<?php echo $crm_leaddetails->productversion->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->productversion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->product->Visible) { // product ?>
	<div id="r_product" class="form-group row">
		<label id="elh_crm_leaddetails_product" for="x_product" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->product->caption() ?><?php echo ($crm_leaddetails->product->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->product->cellAttributes() ?>>
<span id="el_crm_leaddetails_product">
<input type="text" data-table="crm_leaddetails" data-field="x_product" name="x_product" id="x_product" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->product->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->product->EditValue ?>"<?php echo $crm_leaddetails->product->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->product->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->maildate->Visible) { // maildate ?>
	<div id="r_maildate" class="form-group row">
		<label id="elh_crm_leaddetails_maildate" for="x_maildate" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->maildate->caption() ?><?php echo ($crm_leaddetails->maildate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->maildate->cellAttributes() ?>>
<span id="el_crm_leaddetails_maildate">
<input type="text" data-table="crm_leaddetails" data-field="x_maildate" name="x_maildate" id="x_maildate" placeholder="<?php echo HtmlEncode($crm_leaddetails->maildate->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->maildate->EditValue ?>"<?php echo $crm_leaddetails->maildate->editAttributes() ?>>
<?php if (!$crm_leaddetails->maildate->ReadOnly && !$crm_leaddetails->maildate->Disabled && !isset($crm_leaddetails->maildate->EditAttrs["readonly"]) && !isset($crm_leaddetails->maildate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_leaddetailsedit", "x_maildate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_leaddetails->maildate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->nextstepdate->Visible) { // nextstepdate ?>
	<div id="r_nextstepdate" class="form-group row">
		<label id="elh_crm_leaddetails_nextstepdate" for="x_nextstepdate" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->nextstepdate->caption() ?><?php echo ($crm_leaddetails->nextstepdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->nextstepdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_nextstepdate">
<input type="text" data-table="crm_leaddetails" data-field="x_nextstepdate" name="x_nextstepdate" id="x_nextstepdate" placeholder="<?php echo HtmlEncode($crm_leaddetails->nextstepdate->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->nextstepdate->EditValue ?>"<?php echo $crm_leaddetails->nextstepdate->editAttributes() ?>>
<?php if (!$crm_leaddetails->nextstepdate->ReadOnly && !$crm_leaddetails->nextstepdate->Disabled && !isset($crm_leaddetails->nextstepdate->EditAttrs["readonly"]) && !isset($crm_leaddetails->nextstepdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_leaddetailsedit", "x_nextstepdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_leaddetails->nextstepdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->fundingsituation->Visible) { // fundingsituation ?>
	<div id="r_fundingsituation" class="form-group row">
		<label id="elh_crm_leaddetails_fundingsituation" for="x_fundingsituation" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->fundingsituation->caption() ?><?php echo ($crm_leaddetails->fundingsituation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->fundingsituation->cellAttributes() ?>>
<span id="el_crm_leaddetails_fundingsituation">
<input type="text" data-table="crm_leaddetails" data-field="x_fundingsituation" name="x_fundingsituation" id="x_fundingsituation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->fundingsituation->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->fundingsituation->EditValue ?>"<?php echo $crm_leaddetails->fundingsituation->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->fundingsituation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->purpose->Visible) { // purpose ?>
	<div id="r_purpose" class="form-group row">
		<label id="elh_crm_leaddetails_purpose" for="x_purpose" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->purpose->caption() ?><?php echo ($crm_leaddetails->purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->purpose->cellAttributes() ?>>
<span id="el_crm_leaddetails_purpose">
<input type="text" data-table="crm_leaddetails" data-field="x_purpose" name="x_purpose" id="x_purpose" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->purpose->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->purpose->EditValue ?>"<?php echo $crm_leaddetails->purpose->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->evaluationstatus->Visible) { // evaluationstatus ?>
	<div id="r_evaluationstatus" class="form-group row">
		<label id="elh_crm_leaddetails_evaluationstatus" for="x_evaluationstatus" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->evaluationstatus->caption() ?><?php echo ($crm_leaddetails->evaluationstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->evaluationstatus->cellAttributes() ?>>
<span id="el_crm_leaddetails_evaluationstatus">
<input type="text" data-table="crm_leaddetails" data-field="x_evaluationstatus" name="x_evaluationstatus" id="x_evaluationstatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->evaluationstatus->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->evaluationstatus->EditValue ?>"<?php echo $crm_leaddetails->evaluationstatus->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->evaluationstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->transferdate->Visible) { // transferdate ?>
	<div id="r_transferdate" class="form-group row">
		<label id="elh_crm_leaddetails_transferdate" for="x_transferdate" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->transferdate->caption() ?><?php echo ($crm_leaddetails->transferdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->transferdate->cellAttributes() ?>>
<span id="el_crm_leaddetails_transferdate">
<input type="text" data-table="crm_leaddetails" data-field="x_transferdate" name="x_transferdate" id="x_transferdate" placeholder="<?php echo HtmlEncode($crm_leaddetails->transferdate->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->transferdate->EditValue ?>"<?php echo $crm_leaddetails->transferdate->editAttributes() ?>>
<?php if (!$crm_leaddetails->transferdate->ReadOnly && !$crm_leaddetails->transferdate->Disabled && !isset($crm_leaddetails->transferdate->EditAttrs["readonly"]) && !isset($crm_leaddetails->transferdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fcrm_leaddetailsedit", "x_transferdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $crm_leaddetails->transferdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->revenuetype->Visible) { // revenuetype ?>
	<div id="r_revenuetype" class="form-group row">
		<label id="elh_crm_leaddetails_revenuetype" for="x_revenuetype" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->revenuetype->caption() ?><?php echo ($crm_leaddetails->revenuetype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->revenuetype->cellAttributes() ?>>
<span id="el_crm_leaddetails_revenuetype">
<input type="text" data-table="crm_leaddetails" data-field="x_revenuetype" name="x_revenuetype" id="x_revenuetype" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->revenuetype->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->revenuetype->EditValue ?>"<?php echo $crm_leaddetails->revenuetype->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->revenuetype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->noofemployees->Visible) { // noofemployees ?>
	<div id="r_noofemployees" class="form-group row">
		<label id="elh_crm_leaddetails_noofemployees" for="x_noofemployees" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->noofemployees->caption() ?><?php echo ($crm_leaddetails->noofemployees->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->noofemployees->cellAttributes() ?>>
<span id="el_crm_leaddetails_noofemployees">
<input type="text" data-table="crm_leaddetails" data-field="x_noofemployees" name="x_noofemployees" id="x_noofemployees" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->noofemployees->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->noofemployees->EditValue ?>"<?php echo $crm_leaddetails->noofemployees->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->noofemployees->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->secondaryemail->Visible) { // secondaryemail ?>
	<div id="r_secondaryemail" class="form-group row">
		<label id="elh_crm_leaddetails_secondaryemail" for="x_secondaryemail" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->secondaryemail->caption() ?><?php echo ($crm_leaddetails->secondaryemail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->secondaryemail->cellAttributes() ?>>
<span id="el_crm_leaddetails_secondaryemail">
<input type="text" data-table="crm_leaddetails" data-field="x_secondaryemail" name="x_secondaryemail" id="x_secondaryemail" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_leaddetails->secondaryemail->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->secondaryemail->EditValue ?>"<?php echo $crm_leaddetails->secondaryemail->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->secondaryemail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalcalls->Visible) { // noapprovalcalls ?>
	<div id="r_noapprovalcalls" class="form-group row">
		<label id="elh_crm_leaddetails_noapprovalcalls" for="x_noapprovalcalls" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->noapprovalcalls->caption() ?><?php echo ($crm_leaddetails->noapprovalcalls->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->noapprovalcalls->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalcalls">
<input type="text" data-table="crm_leaddetails" data-field="x_noapprovalcalls" name="x_noapprovalcalls" id="x_noapprovalcalls" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->noapprovalcalls->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->noapprovalcalls->EditValue ?>"<?php echo $crm_leaddetails->noapprovalcalls->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->noapprovalcalls->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->noapprovalemails->Visible) { // noapprovalemails ?>
	<div id="r_noapprovalemails" class="form-group row">
		<label id="elh_crm_leaddetails_noapprovalemails" for="x_noapprovalemails" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->noapprovalemails->caption() ?><?php echo ($crm_leaddetails->noapprovalemails->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->noapprovalemails->cellAttributes() ?>>
<span id="el_crm_leaddetails_noapprovalemails">
<input type="text" data-table="crm_leaddetails" data-field="x_noapprovalemails" name="x_noapprovalemails" id="x_noapprovalemails" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->noapprovalemails->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->noapprovalemails->EditValue ?>"<?php echo $crm_leaddetails->noapprovalemails->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->noapprovalemails->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->vat_id->Visible) { // vat_id ?>
	<div id="r_vat_id" class="form-group row">
		<label id="elh_crm_leaddetails_vat_id" for="x_vat_id" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->vat_id->caption() ?><?php echo ($crm_leaddetails->vat_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->vat_id->cellAttributes() ?>>
<span id="el_crm_leaddetails_vat_id">
<input type="text" data-table="crm_leaddetails" data-field="x_vat_id" name="x_vat_id" id="x_vat_id" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_leaddetails->vat_id->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->vat_id->EditValue ?>"<?php echo $crm_leaddetails->vat_id->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->vat_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_1->Visible) { // registration_number_1 ?>
	<div id="r_registration_number_1" class="form-group row">
		<label id="elh_crm_leaddetails_registration_number_1" for="x_registration_number_1" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->registration_number_1->caption() ?><?php echo ($crm_leaddetails->registration_number_1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->registration_number_1->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_1">
<input type="text" data-table="crm_leaddetails" data-field="x_registration_number_1" name="x_registration_number_1" id="x_registration_number_1" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->registration_number_1->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->registration_number_1->EditValue ?>"<?php echo $crm_leaddetails->registration_number_1->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->registration_number_1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->registration_number_2->Visible) { // registration_number_2 ?>
	<div id="r_registration_number_2" class="form-group row">
		<label id="elh_crm_leaddetails_registration_number_2" for="x_registration_number_2" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->registration_number_2->caption() ?><?php echo ($crm_leaddetails->registration_number_2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->registration_number_2->cellAttributes() ?>>
<span id="el_crm_leaddetails_registration_number_2">
<input type="text" data-table="crm_leaddetails" data-field="x_registration_number_2" name="x_registration_number_2" id="x_registration_number_2" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->registration_number_2->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->registration_number_2->EditValue ?>"<?php echo $crm_leaddetails->registration_number_2->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->registration_number_2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->verification->Visible) { // verification ?>
	<div id="r_verification" class="form-group row">
		<label id="elh_crm_leaddetails_verification" for="x_verification" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->verification->caption() ?><?php echo ($crm_leaddetails->verification->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->verification->cellAttributes() ?>>
<span id="el_crm_leaddetails_verification">
<textarea data-table="crm_leaddetails" data-field="x_verification" name="x_verification" id="x_verification" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_leaddetails->verification->getPlaceHolder()) ?>"<?php echo $crm_leaddetails->verification->editAttributes() ?>><?php echo $crm_leaddetails->verification->EditValue ?></textarea>
</span>
<?php echo $crm_leaddetails->verification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->subindustry->Visible) { // subindustry ?>
	<div id="r_subindustry" class="form-group row">
		<label id="elh_crm_leaddetails_subindustry" for="x_subindustry" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->subindustry->caption() ?><?php echo ($crm_leaddetails->subindustry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->subindustry->cellAttributes() ?>>
<span id="el_crm_leaddetails_subindustry">
<input type="text" data-table="crm_leaddetails" data-field="x_subindustry" name="x_subindustry" id="x_subindustry" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leaddetails->subindustry->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->subindustry->EditValue ?>"<?php echo $crm_leaddetails->subindustry->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->subindustry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->atenttion->Visible) { // atenttion ?>
	<div id="r_atenttion" class="form-group row">
		<label id="elh_crm_leaddetails_atenttion" for="x_atenttion" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->atenttion->caption() ?><?php echo ($crm_leaddetails->atenttion->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->atenttion->cellAttributes() ?>>
<span id="el_crm_leaddetails_atenttion">
<textarea data-table="crm_leaddetails" data-field="x_atenttion" name="x_atenttion" id="x_atenttion" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_leaddetails->atenttion->getPlaceHolder()) ?>"<?php echo $crm_leaddetails->atenttion->editAttributes() ?>><?php echo $crm_leaddetails->atenttion->EditValue ?></textarea>
</span>
<?php echo $crm_leaddetails->atenttion->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->leads_relation->Visible) { // leads_relation ?>
	<div id="r_leads_relation" class="form-group row">
		<label id="elh_crm_leaddetails_leads_relation" for="x_leads_relation" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->leads_relation->caption() ?><?php echo ($crm_leaddetails->leads_relation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->leads_relation->cellAttributes() ?>>
<span id="el_crm_leaddetails_leads_relation">
<input type="text" data-table="crm_leaddetails" data-field="x_leads_relation" name="x_leads_relation" id="x_leads_relation" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leaddetails->leads_relation->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->leads_relation->EditValue ?>"<?php echo $crm_leaddetails->leads_relation->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->leads_relation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->legal_form->Visible) { // legal_form ?>
	<div id="r_legal_form" class="form-group row">
		<label id="elh_crm_leaddetails_legal_form" for="x_legal_form" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->legal_form->caption() ?><?php echo ($crm_leaddetails->legal_form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->legal_form->cellAttributes() ?>>
<span id="el_crm_leaddetails_legal_form">
<input type="text" data-table="crm_leaddetails" data-field="x_legal_form" name="x_legal_form" id="x_legal_form" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_leaddetails->legal_form->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->legal_form->EditValue ?>"<?php echo $crm_leaddetails->legal_form->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->legal_form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->sum_time->Visible) { // sum_time ?>
	<div id="r_sum_time" class="form-group row">
		<label id="elh_crm_leaddetails_sum_time" for="x_sum_time" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->sum_time->caption() ?><?php echo ($crm_leaddetails->sum_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->sum_time->cellAttributes() ?>>
<span id="el_crm_leaddetails_sum_time">
<input type="text" data-table="crm_leaddetails" data-field="x_sum_time" name="x_sum_time" id="x_sum_time" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->sum_time->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->sum_time->EditValue ?>"<?php echo $crm_leaddetails->sum_time->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->sum_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_leaddetails->active->Visible) { // active ?>
	<div id="r_active" class="form-group row">
		<label id="elh_crm_leaddetails_active" for="x_active" class="<?php echo $crm_leaddetails_edit->LeftColumnClass ?>"><?php echo $crm_leaddetails->active->caption() ?><?php echo ($crm_leaddetails->active->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_leaddetails_edit->RightColumnClass ?>"><div<?php echo $crm_leaddetails->active->cellAttributes() ?>>
<span id="el_crm_leaddetails_active">
<input type="text" data-table="crm_leaddetails" data-field="x_active" name="x_active" id="x_active" size="30" placeholder="<?php echo HtmlEncode($crm_leaddetails->active->getPlaceHolder()) ?>" value="<?php echo $crm_leaddetails->active->EditValue ?>"<?php echo $crm_leaddetails->active->editAttributes() ?>>
</span>
<?php echo $crm_leaddetails->active->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_leaddetails_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_leaddetails_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leaddetails_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_leaddetails_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leaddetails_edit->terminate();
?>