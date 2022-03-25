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
$crm_contactdetails_add = new crm_contactdetails_add();

// Run the page
$crm_contactdetails_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_contactdetails_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fcrm_contactdetailsadd = currentForm = new ew.Form("fcrm_contactdetailsadd", "add");

// Validate form
fcrm_contactdetailsadd.validate = function() {
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
		<?php if ($crm_contactdetails_add->contactid->Required) { ?>
			elm = this.getElements("x" + infix + "_contactid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->contactid->caption(), $crm_contactdetails->contactid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_contactid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->contactid->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->contact_no->Required) { ?>
			elm = this.getElements("x" + infix + "_contact_no");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->contact_no->caption(), $crm_contactdetails->contact_no->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->parentid->Required) { ?>
			elm = this.getElements("x" + infix + "_parentid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->parentid->caption(), $crm_contactdetails->parentid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_parentid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->parentid->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->salutation->Required) { ?>
			elm = this.getElements("x" + infix + "_salutation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->salutation->caption(), $crm_contactdetails->salutation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->firstname->Required) { ?>
			elm = this.getElements("x" + infix + "_firstname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->firstname->caption(), $crm_contactdetails->firstname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->lastname->Required) { ?>
			elm = this.getElements("x" + infix + "_lastname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->lastname->caption(), $crm_contactdetails->lastname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->_email->caption(), $crm_contactdetails->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->phone->Required) { ?>
			elm = this.getElements("x" + infix + "_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->phone->caption(), $crm_contactdetails->phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->mobile->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->mobile->caption(), $crm_contactdetails->mobile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->reportsto->Required) { ?>
			elm = this.getElements("x" + infix + "_reportsto");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->reportsto->caption(), $crm_contactdetails->reportsto->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_reportsto");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->reportsto->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->training->Required) { ?>
			elm = this.getElements("x" + infix + "_training");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->training->caption(), $crm_contactdetails->training->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->usertype->Required) { ?>
			elm = this.getElements("x" + infix + "_usertype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->usertype->caption(), $crm_contactdetails->usertype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->contacttype->Required) { ?>
			elm = this.getElements("x" + infix + "_contacttype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->contacttype->caption(), $crm_contactdetails->contacttype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->otheremail->Required) { ?>
			elm = this.getElements("x" + infix + "_otheremail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->otheremail->caption(), $crm_contactdetails->otheremail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->donotcall->Required) { ?>
			elm = this.getElements("x" + infix + "_donotcall");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->donotcall->caption(), $crm_contactdetails->donotcall->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_donotcall");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->donotcall->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->emailoptout->Required) { ?>
			elm = this.getElements("x" + infix + "_emailoptout");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->emailoptout->caption(), $crm_contactdetails->emailoptout->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_emailoptout");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->emailoptout->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->imagename->Required) { ?>
			elm = this.getElements("x" + infix + "_imagename");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->imagename->caption(), $crm_contactdetails->imagename->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->isconvertedfromlead->Required) { ?>
			elm = this.getElements("x" + infix + "_isconvertedfromlead");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->isconvertedfromlead->caption(), $crm_contactdetails->isconvertedfromlead->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_isconvertedfromlead");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->isconvertedfromlead->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->verification->Required) { ?>
			elm = this.getElements("x" + infix + "_verification");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->verification->caption(), $crm_contactdetails->verification->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->secondary_email->Required) { ?>
			elm = this.getElements("x" + infix + "_secondary_email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->secondary_email->caption(), $crm_contactdetails->secondary_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->notifilanguage->Required) { ?>
			elm = this.getElements("x" + infix + "_notifilanguage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->notifilanguage->caption(), $crm_contactdetails->notifilanguage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->contactstatus->Required) { ?>
			elm = this.getElements("x" + infix + "_contactstatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->contactstatus->caption(), $crm_contactdetails->contactstatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->dav_status->Required) { ?>
			elm = this.getElements("x" + infix + "_dav_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->dav_status->caption(), $crm_contactdetails->dav_status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_dav_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->dav_status->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->jobtitle->Required) { ?>
			elm = this.getElements("x" + infix + "_jobtitle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->jobtitle->caption(), $crm_contactdetails->jobtitle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->decision_maker->Required) { ?>
			elm = this.getElements("x" + infix + "_decision_maker");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->decision_maker->caption(), $crm_contactdetails->decision_maker->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_decision_maker");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->decision_maker->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->sum_time->Required) { ?>
			elm = this.getElements("x" + infix + "_sum_time");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->sum_time->caption(), $crm_contactdetails->sum_time->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sum_time");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($crm_contactdetails->sum_time->errorMessage()) ?>");
		<?php if ($crm_contactdetails_add->phone_extra->Required) { ?>
			elm = this.getElements("x" + infix + "_phone_extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->phone_extra->caption(), $crm_contactdetails->phone_extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->mobile_extra->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_extra");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->mobile_extra->caption(), $crm_contactdetails->mobile_extra->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->approvals->Required) { ?>
			elm = this.getElements("x" + infix + "_approvals");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->approvals->caption(), $crm_contactdetails->approvals->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($crm_contactdetails_add->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $crm_contactdetails->gender->caption(), $crm_contactdetails->gender->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fcrm_contactdetailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_contactdetailsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_contactdetails_add->showPageHeader(); ?>
<?php
$crm_contactdetails_add->showMessage();
?>
<form name="fcrm_contactdetailsadd" id="fcrm_contactdetailsadd" class="<?php echo $crm_contactdetails_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_contactdetails_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_contactdetails_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$crm_contactdetails_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($crm_contactdetails->contactid->Visible) { // contactid ?>
	<div id="r_contactid" class="form-group row">
		<label id="elh_crm_contactdetails_contactid" for="x_contactid" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->contactid->caption() ?><?php echo ($crm_contactdetails->contactid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->contactid->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactid">
<input type="text" data-table="crm_contactdetails" data-field="x_contactid" name="x_contactid" id="x_contactid" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->contactid->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->contactid->EditValue ?>"<?php echo $crm_contactdetails->contactid->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->contactid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->contact_no->Visible) { // contact_no ?>
	<div id="r_contact_no" class="form-group row">
		<label id="elh_crm_contactdetails_contact_no" for="x_contact_no" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->contact_no->caption() ?><?php echo ($crm_contactdetails->contact_no->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->contact_no->cellAttributes() ?>>
<span id="el_crm_contactdetails_contact_no">
<input type="text" data-table="crm_contactdetails" data-field="x_contact_no" name="x_contact_no" id="x_contact_no" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->contact_no->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->contact_no->EditValue ?>"<?php echo $crm_contactdetails->contact_no->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->contact_no->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->parentid->Visible) { // parentid ?>
	<div id="r_parentid" class="form-group row">
		<label id="elh_crm_contactdetails_parentid" for="x_parentid" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->parentid->caption() ?><?php echo ($crm_contactdetails->parentid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->parentid->cellAttributes() ?>>
<span id="el_crm_contactdetails_parentid">
<input type="text" data-table="crm_contactdetails" data-field="x_parentid" name="x_parentid" id="x_parentid" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->parentid->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->parentid->EditValue ?>"<?php echo $crm_contactdetails->parentid->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->parentid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->salutation->Visible) { // salutation ?>
	<div id="r_salutation" class="form-group row">
		<label id="elh_crm_contactdetails_salutation" for="x_salutation" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->salutation->caption() ?><?php echo ($crm_contactdetails->salutation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->salutation->cellAttributes() ?>>
<span id="el_crm_contactdetails_salutation">
<input type="text" data-table="crm_contactdetails" data-field="x_salutation" name="x_salutation" id="x_salutation" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($crm_contactdetails->salutation->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->salutation->EditValue ?>"<?php echo $crm_contactdetails->salutation->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->salutation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->firstname->Visible) { // firstname ?>
	<div id="r_firstname" class="form-group row">
		<label id="elh_crm_contactdetails_firstname" for="x_firstname" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->firstname->caption() ?><?php echo ($crm_contactdetails->firstname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->firstname->cellAttributes() ?>>
<span id="el_crm_contactdetails_firstname">
<input type="text" data-table="crm_contactdetails" data-field="x_firstname" name="x_firstname" id="x_firstname" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($crm_contactdetails->firstname->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->firstname->EditValue ?>"<?php echo $crm_contactdetails->firstname->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->firstname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->lastname->Visible) { // lastname ?>
	<div id="r_lastname" class="form-group row">
		<label id="elh_crm_contactdetails_lastname" for="x_lastname" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->lastname->caption() ?><?php echo ($crm_contactdetails->lastname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->lastname->cellAttributes() ?>>
<span id="el_crm_contactdetails_lastname">
<input type="text" data-table="crm_contactdetails" data-field="x_lastname" name="x_lastname" id="x_lastname" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($crm_contactdetails->lastname->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->lastname->EditValue ?>"<?php echo $crm_contactdetails->lastname->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->lastname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_crm_contactdetails__email" for="x__email" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->_email->caption() ?><?php echo ($crm_contactdetails->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->_email->cellAttributes() ?>>
<span id="el_crm_contactdetails__email">
<input type="text" data-table="crm_contactdetails" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->_email->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->_email->EditValue ?>"<?php echo $crm_contactdetails->_email->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->phone->Visible) { // phone ?>
	<div id="r_phone" class="form-group row">
		<label id="elh_crm_contactdetails_phone" for="x_phone" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->phone->caption() ?><?php echo ($crm_contactdetails->phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->phone->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone">
<input type="text" data-table="crm_contactdetails" data-field="x_phone" name="x_phone" id="x_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_contactdetails->phone->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->phone->EditValue ?>"<?php echo $crm_contactdetails->phone->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->mobile->Visible) { // mobile ?>
	<div id="r_mobile" class="form-group row">
		<label id="elh_crm_contactdetails_mobile" for="x_mobile" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->mobile->caption() ?><?php echo ($crm_contactdetails->mobile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->mobile->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile">
<input type="text" data-table="crm_contactdetails" data-field="x_mobile" name="x_mobile" id="x_mobile" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_contactdetails->mobile->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->mobile->EditValue ?>"<?php echo $crm_contactdetails->mobile->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->mobile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->reportsto->Visible) { // reportsto ?>
	<div id="r_reportsto" class="form-group row">
		<label id="elh_crm_contactdetails_reportsto" for="x_reportsto" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->reportsto->caption() ?><?php echo ($crm_contactdetails->reportsto->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->reportsto->cellAttributes() ?>>
<span id="el_crm_contactdetails_reportsto">
<input type="text" data-table="crm_contactdetails" data-field="x_reportsto" name="x_reportsto" id="x_reportsto" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->reportsto->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->reportsto->EditValue ?>"<?php echo $crm_contactdetails->reportsto->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->reportsto->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->training->Visible) { // training ?>
	<div id="r_training" class="form-group row">
		<label id="elh_crm_contactdetails_training" for="x_training" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->training->caption() ?><?php echo ($crm_contactdetails->training->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->training->cellAttributes() ?>>
<span id="el_crm_contactdetails_training">
<input type="text" data-table="crm_contactdetails" data-field="x_training" name="x_training" id="x_training" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_contactdetails->training->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->training->EditValue ?>"<?php echo $crm_contactdetails->training->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->training->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->usertype->Visible) { // usertype ?>
	<div id="r_usertype" class="form-group row">
		<label id="elh_crm_contactdetails_usertype" for="x_usertype" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->usertype->caption() ?><?php echo ($crm_contactdetails->usertype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->usertype->cellAttributes() ?>>
<span id="el_crm_contactdetails_usertype">
<input type="text" data-table="crm_contactdetails" data-field="x_usertype" name="x_usertype" id="x_usertype" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_contactdetails->usertype->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->usertype->EditValue ?>"<?php echo $crm_contactdetails->usertype->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->usertype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->contacttype->Visible) { // contacttype ?>
	<div id="r_contacttype" class="form-group row">
		<label id="elh_crm_contactdetails_contacttype" for="x_contacttype" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->contacttype->caption() ?><?php echo ($crm_contactdetails->contacttype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->contacttype->cellAttributes() ?>>
<span id="el_crm_contactdetails_contacttype">
<input type="text" data-table="crm_contactdetails" data-field="x_contacttype" name="x_contacttype" id="x_contacttype" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($crm_contactdetails->contacttype->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->contacttype->EditValue ?>"<?php echo $crm_contactdetails->contacttype->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->contacttype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->otheremail->Visible) { // otheremail ?>
	<div id="r_otheremail" class="form-group row">
		<label id="elh_crm_contactdetails_otheremail" for="x_otheremail" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->otheremail->caption() ?><?php echo ($crm_contactdetails->otheremail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->otheremail->cellAttributes() ?>>
<span id="el_crm_contactdetails_otheremail">
<input type="text" data-table="crm_contactdetails" data-field="x_otheremail" name="x_otheremail" id="x_otheremail" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->otheremail->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->otheremail->EditValue ?>"<?php echo $crm_contactdetails->otheremail->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->otheremail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->donotcall->Visible) { // donotcall ?>
	<div id="r_donotcall" class="form-group row">
		<label id="elh_crm_contactdetails_donotcall" for="x_donotcall" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->donotcall->caption() ?><?php echo ($crm_contactdetails->donotcall->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->donotcall->cellAttributes() ?>>
<span id="el_crm_contactdetails_donotcall">
<input type="text" data-table="crm_contactdetails" data-field="x_donotcall" name="x_donotcall" id="x_donotcall" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->donotcall->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->donotcall->EditValue ?>"<?php echo $crm_contactdetails->donotcall->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->donotcall->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->emailoptout->Visible) { // emailoptout ?>
	<div id="r_emailoptout" class="form-group row">
		<label id="elh_crm_contactdetails_emailoptout" for="x_emailoptout" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->emailoptout->caption() ?><?php echo ($crm_contactdetails->emailoptout->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->emailoptout->cellAttributes() ?>>
<span id="el_crm_contactdetails_emailoptout">
<input type="text" data-table="crm_contactdetails" data-field="x_emailoptout" name="x_emailoptout" id="x_emailoptout" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->emailoptout->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->emailoptout->EditValue ?>"<?php echo $crm_contactdetails->emailoptout->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->emailoptout->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->imagename->Visible) { // imagename ?>
	<div id="r_imagename" class="form-group row">
		<label id="elh_crm_contactdetails_imagename" for="x_imagename" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->imagename->caption() ?><?php echo ($crm_contactdetails->imagename->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->imagename->cellAttributes() ?>>
<span id="el_crm_contactdetails_imagename">
<textarea data-table="crm_contactdetails" data-field="x_imagename" name="x_imagename" id="x_imagename" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_contactdetails->imagename->getPlaceHolder()) ?>"<?php echo $crm_contactdetails->imagename->editAttributes() ?>><?php echo $crm_contactdetails->imagename->EditValue ?></textarea>
</span>
<?php echo $crm_contactdetails->imagename->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
	<div id="r_isconvertedfromlead" class="form-group row">
		<label id="elh_crm_contactdetails_isconvertedfromlead" for="x_isconvertedfromlead" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->isconvertedfromlead->caption() ?><?php echo ($crm_contactdetails->isconvertedfromlead->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->isconvertedfromlead->cellAttributes() ?>>
<span id="el_crm_contactdetails_isconvertedfromlead">
<input type="text" data-table="crm_contactdetails" data-field="x_isconvertedfromlead" name="x_isconvertedfromlead" id="x_isconvertedfromlead" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->isconvertedfromlead->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->isconvertedfromlead->EditValue ?>"<?php echo $crm_contactdetails->isconvertedfromlead->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->isconvertedfromlead->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->verification->Visible) { // verification ?>
	<div id="r_verification" class="form-group row">
		<label id="elh_crm_contactdetails_verification" for="x_verification" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->verification->caption() ?><?php echo ($crm_contactdetails->verification->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->verification->cellAttributes() ?>>
<span id="el_crm_contactdetails_verification">
<textarea data-table="crm_contactdetails" data-field="x_verification" name="x_verification" id="x_verification" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_contactdetails->verification->getPlaceHolder()) ?>"<?php echo $crm_contactdetails->verification->editAttributes() ?>><?php echo $crm_contactdetails->verification->EditValue ?></textarea>
</span>
<?php echo $crm_contactdetails->verification->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->secondary_email->Visible) { // secondary_email ?>
	<div id="r_secondary_email" class="form-group row">
		<label id="elh_crm_contactdetails_secondary_email" for="x_secondary_email" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->secondary_email->caption() ?><?php echo ($crm_contactdetails->secondary_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->secondary_email->cellAttributes() ?>>
<span id="el_crm_contactdetails_secondary_email">
<input type="text" data-table="crm_contactdetails" data-field="x_secondary_email" name="x_secondary_email" id="x_secondary_email" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->secondary_email->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->secondary_email->EditValue ?>"<?php echo $crm_contactdetails->secondary_email->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->secondary_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->notifilanguage->Visible) { // notifilanguage ?>
	<div id="r_notifilanguage" class="form-group row">
		<label id="elh_crm_contactdetails_notifilanguage" for="x_notifilanguage" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->notifilanguage->caption() ?><?php echo ($crm_contactdetails->notifilanguage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->notifilanguage->cellAttributes() ?>>
<span id="el_crm_contactdetails_notifilanguage">
<input type="text" data-table="crm_contactdetails" data-field="x_notifilanguage" name="x_notifilanguage" id="x_notifilanguage" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->notifilanguage->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->notifilanguage->EditValue ?>"<?php echo $crm_contactdetails->notifilanguage->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->notifilanguage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->contactstatus->Visible) { // contactstatus ?>
	<div id="r_contactstatus" class="form-group row">
		<label id="elh_crm_contactdetails_contactstatus" for="x_contactstatus" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->contactstatus->caption() ?><?php echo ($crm_contactdetails->contactstatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->contactstatus->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactstatus">
<input type="text" data-table="crm_contactdetails" data-field="x_contactstatus" name="x_contactstatus" id="x_contactstatus" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_contactdetails->contactstatus->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->contactstatus->EditValue ?>"<?php echo $crm_contactdetails->contactstatus->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->contactstatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->dav_status->Visible) { // dav_status ?>
	<div id="r_dav_status" class="form-group row">
		<label id="elh_crm_contactdetails_dav_status" for="x_dav_status" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->dav_status->caption() ?><?php echo ($crm_contactdetails->dav_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->dav_status->cellAttributes() ?>>
<span id="el_crm_contactdetails_dav_status">
<input type="text" data-table="crm_contactdetails" data-field="x_dav_status" name="x_dav_status" id="x_dav_status" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->dav_status->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->dav_status->EditValue ?>"<?php echo $crm_contactdetails->dav_status->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->dav_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->jobtitle->Visible) { // jobtitle ?>
	<div id="r_jobtitle" class="form-group row">
		<label id="elh_crm_contactdetails_jobtitle" for="x_jobtitle" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->jobtitle->caption() ?><?php echo ($crm_contactdetails->jobtitle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->jobtitle->cellAttributes() ?>>
<span id="el_crm_contactdetails_jobtitle">
<input type="text" data-table="crm_contactdetails" data-field="x_jobtitle" name="x_jobtitle" id="x_jobtitle" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->jobtitle->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->jobtitle->EditValue ?>"<?php echo $crm_contactdetails->jobtitle->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->jobtitle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->decision_maker->Visible) { // decision_maker ?>
	<div id="r_decision_maker" class="form-group row">
		<label id="elh_crm_contactdetails_decision_maker" for="x_decision_maker" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->decision_maker->caption() ?><?php echo ($crm_contactdetails->decision_maker->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->decision_maker->cellAttributes() ?>>
<span id="el_crm_contactdetails_decision_maker">
<input type="text" data-table="crm_contactdetails" data-field="x_decision_maker" name="x_decision_maker" id="x_decision_maker" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->decision_maker->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->decision_maker->EditValue ?>"<?php echo $crm_contactdetails->decision_maker->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->decision_maker->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->sum_time->Visible) { // sum_time ?>
	<div id="r_sum_time" class="form-group row">
		<label id="elh_crm_contactdetails_sum_time" for="x_sum_time" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->sum_time->caption() ?><?php echo ($crm_contactdetails->sum_time->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->sum_time->cellAttributes() ?>>
<span id="el_crm_contactdetails_sum_time">
<input type="text" data-table="crm_contactdetails" data-field="x_sum_time" name="x_sum_time" id="x_sum_time" size="30" placeholder="<?php echo HtmlEncode($crm_contactdetails->sum_time->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->sum_time->EditValue ?>"<?php echo $crm_contactdetails->sum_time->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->sum_time->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->phone_extra->Visible) { // phone_extra ?>
	<div id="r_phone_extra" class="form-group row">
		<label id="elh_crm_contactdetails_phone_extra" for="x_phone_extra" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->phone_extra->caption() ?><?php echo ($crm_contactdetails->phone_extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->phone_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone_extra">
<input type="text" data-table="crm_contactdetails" data-field="x_phone_extra" name="x_phone_extra" id="x_phone_extra" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->phone_extra->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->phone_extra->EditValue ?>"<?php echo $crm_contactdetails->phone_extra->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->phone_extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->mobile_extra->Visible) { // mobile_extra ?>
	<div id="r_mobile_extra" class="form-group row">
		<label id="elh_crm_contactdetails_mobile_extra" for="x_mobile_extra" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->mobile_extra->caption() ?><?php echo ($crm_contactdetails->mobile_extra->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->mobile_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile_extra">
<input type="text" data-table="crm_contactdetails" data-field="x_mobile_extra" name="x_mobile_extra" id="x_mobile_extra" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($crm_contactdetails->mobile_extra->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->mobile_extra->EditValue ?>"<?php echo $crm_contactdetails->mobile_extra->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->mobile_extra->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->approvals->Visible) { // approvals ?>
	<div id="r_approvals" class="form-group row">
		<label id="elh_crm_contactdetails_approvals" for="x_approvals" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->approvals->caption() ?><?php echo ($crm_contactdetails->approvals->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->approvals->cellAttributes() ?>>
<span id="el_crm_contactdetails_approvals">
<textarea data-table="crm_contactdetails" data-field="x_approvals" name="x_approvals" id="x_approvals" cols="35" rows="4" placeholder="<?php echo HtmlEncode($crm_contactdetails->approvals->getPlaceHolder()) ?>"<?php echo $crm_contactdetails->approvals->editAttributes() ?>><?php echo $crm_contactdetails->approvals->EditValue ?></textarea>
</span>
<?php echo $crm_contactdetails->approvals->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($crm_contactdetails->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_crm_contactdetails_gender" for="x_gender" class="<?php echo $crm_contactdetails_add->LeftColumnClass ?>"><?php echo $crm_contactdetails->gender->caption() ?><?php echo ($crm_contactdetails->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $crm_contactdetails_add->RightColumnClass ?>"><div<?php echo $crm_contactdetails->gender->cellAttributes() ?>>
<span id="el_crm_contactdetails_gender">
<input type="text" data-table="crm_contactdetails" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($crm_contactdetails->gender->getPlaceHolder()) ?>" value="<?php echo $crm_contactdetails->gender->EditValue ?>"<?php echo $crm_contactdetails->gender->editAttributes() ?>>
</span>
<?php echo $crm_contactdetails->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$crm_contactdetails_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $crm_contactdetails_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_contactdetails_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$crm_contactdetails_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_contactdetails_add->terminate();
?>