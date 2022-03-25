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
$recruitment_candidates_edit = new recruitment_candidates_edit();

// Run the page
$recruitment_candidates_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_candidates_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var frecruitment_candidatesedit = currentForm = new ew.Form("frecruitment_candidatesedit", "edit");

// Validate form
frecruitment_candidatesedit.validate = function() {
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
		<?php if ($recruitment_candidates_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->id->caption(), $recruitment_candidates->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->first_name->Required) { ?>
			elm = this.getElements("x" + infix + "_first_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->first_name->caption(), $recruitment_candidates->first_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->last_name->Required) { ?>
			elm = this.getElements("x" + infix + "_last_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->last_name->caption(), $recruitment_candidates->last_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->nationality->Required) { ?>
			elm = this.getElements("x" + infix + "_nationality");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->nationality->caption(), $recruitment_candidates->nationality->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_nationality");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->nationality->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->birthday->Required) { ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->birthday->caption(), $recruitment_candidates->birthday->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_birthday");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->birthday->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->gender->Required) { ?>
			elm = this.getElements("x" + infix + "_gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->gender->caption(), $recruitment_candidates->gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->marital_status->Required) { ?>
			elm = this.getElements("x" + infix + "_marital_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->marital_status->caption(), $recruitment_candidates->marital_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->address1->Required) { ?>
			elm = this.getElements("x" + infix + "_address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->address1->caption(), $recruitment_candidates->address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->address2->Required) { ?>
			elm = this.getElements("x" + infix + "_address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->address2->caption(), $recruitment_candidates->address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->city->Required) { ?>
			elm = this.getElements("x" + infix + "_city");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->city->caption(), $recruitment_candidates->city->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->country->caption(), $recruitment_candidates->country->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->province->Required) { ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->province->caption(), $recruitment_candidates->province->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_province");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->province->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->postal_code->Required) { ?>
			elm = this.getElements("x" + infix + "_postal_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->postal_code->caption(), $recruitment_candidates->postal_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->_email->Required) { ?>
			elm = this.getElements("x" + infix + "__email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->_email->caption(), $recruitment_candidates->_email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->home_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_home_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->home_phone->caption(), $recruitment_candidates->home_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->mobile_phone->Required) { ?>
			elm = this.getElements("x" + infix + "_mobile_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->mobile_phone->caption(), $recruitment_candidates->mobile_phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->cv_title->Required) { ?>
			elm = this.getElements("x" + infix + "_cv_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->cv_title->caption(), $recruitment_candidates->cv_title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->cv->Required) { ?>
			elm = this.getElements("x" + infix + "_cv");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->cv->caption(), $recruitment_candidates->cv->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->cvtext->Required) { ?>
			elm = this.getElements("x" + infix + "_cvtext");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->cvtext->caption(), $recruitment_candidates->cvtext->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->industry->Required) { ?>
			elm = this.getElements("x" + infix + "_industry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->industry->caption(), $recruitment_candidates->industry->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->profileImage->Required) { ?>
			elm = this.getElements("x" + infix + "_profileImage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->profileImage->caption(), $recruitment_candidates->profileImage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->head_line->Required) { ?>
			elm = this.getElements("x" + infix + "_head_line");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->head_line->caption(), $recruitment_candidates->head_line->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->objective->Required) { ?>
			elm = this.getElements("x" + infix + "_objective");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->objective->caption(), $recruitment_candidates->objective->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->work_history->Required) { ?>
			elm = this.getElements("x" + infix + "_work_history");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->work_history->caption(), $recruitment_candidates->work_history->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->education->Required) { ?>
			elm = this.getElements("x" + infix + "_education");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->education->caption(), $recruitment_candidates->education->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->skills->Required) { ?>
			elm = this.getElements("x" + infix + "_skills");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->skills->caption(), $recruitment_candidates->skills->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->referees->Required) { ?>
			elm = this.getElements("x" + infix + "_referees");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->referees->caption(), $recruitment_candidates->referees->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->linkedInUrl->Required) { ?>
			elm = this.getElements("x" + infix + "_linkedInUrl");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->linkedInUrl->caption(), $recruitment_candidates->linkedInUrl->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->linkedInData->Required) { ?>
			elm = this.getElements("x" + infix + "_linkedInData");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->linkedInData->caption(), $recruitment_candidates->linkedInData->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->totalYearsOfExperience->Required) { ?>
			elm = this.getElements("x" + infix + "_totalYearsOfExperience");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->totalYearsOfExperience->caption(), $recruitment_candidates->totalYearsOfExperience->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_totalYearsOfExperience");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->totalYearsOfExperience->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->totalMonthsOfExperience->Required) { ?>
			elm = this.getElements("x" + infix + "_totalMonthsOfExperience");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->totalMonthsOfExperience->caption(), $recruitment_candidates->totalMonthsOfExperience->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_totalMonthsOfExperience");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->totalMonthsOfExperience->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->htmlCVData->Required) { ?>
			elm = this.getElements("x" + infix + "_htmlCVData");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->htmlCVData->caption(), $recruitment_candidates->htmlCVData->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->generatedCVFile->Required) { ?>
			elm = this.getElements("x" + infix + "_generatedCVFile");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->generatedCVFile->caption(), $recruitment_candidates->generatedCVFile->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->created->caption(), $recruitment_candidates->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->created->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->updated->caption(), $recruitment_candidates->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->updated->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->expectedSalary->Required) { ?>
			elm = this.getElements("x" + infix + "_expectedSalary");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->expectedSalary->caption(), $recruitment_candidates->expectedSalary->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_expectedSalary");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->expectedSalary->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->preferedPositions->Required) { ?>
			elm = this.getElements("x" + infix + "_preferedPositions");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->preferedPositions->caption(), $recruitment_candidates->preferedPositions->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->preferedJobtype->Required) { ?>
			elm = this.getElements("x" + infix + "_preferedJobtype");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->preferedJobtype->caption(), $recruitment_candidates->preferedJobtype->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->preferedCountries->Required) { ?>
			elm = this.getElements("x" + infix + "_preferedCountries");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->preferedCountries->caption(), $recruitment_candidates->preferedCountries->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->tags->Required) { ?>
			elm = this.getElements("x" + infix + "_tags");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->tags->caption(), $recruitment_candidates->tags->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->notes->caption(), $recruitment_candidates->notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->calls->Required) { ?>
			elm = this.getElements("x" + infix + "_calls");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->calls->caption(), $recruitment_candidates->calls->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->age->Required) { ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->age->caption(), $recruitment_candidates->age->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_age");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_candidates->age->errorMessage()) ?>");
		<?php if ($recruitment_candidates_edit->hash->Required) { ?>
			elm = this.getElements("x" + infix + "_hash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->hash->caption(), $recruitment_candidates->hash->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->linkedInProfileLink->Required) { ?>
			elm = this.getElements("x" + infix + "_linkedInProfileLink");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->linkedInProfileLink->caption(), $recruitment_candidates->linkedInProfileLink->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->linkedInProfileId->Required) { ?>
			elm = this.getElements("x" + infix + "_linkedInProfileId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->linkedInProfileId->caption(), $recruitment_candidates->linkedInProfileId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->facebookProfileLink->Required) { ?>
			elm = this.getElements("x" + infix + "_facebookProfileLink");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->facebookProfileLink->caption(), $recruitment_candidates->facebookProfileLink->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->facebookProfileId->Required) { ?>
			elm = this.getElements("x" + infix + "_facebookProfileId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->facebookProfileId->caption(), $recruitment_candidates->facebookProfileId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->twitterProfileLink->Required) { ?>
			elm = this.getElements("x" + infix + "_twitterProfileLink");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->twitterProfileLink->caption(), $recruitment_candidates->twitterProfileLink->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->twitterProfileId->Required) { ?>
			elm = this.getElements("x" + infix + "_twitterProfileId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->twitterProfileId->caption(), $recruitment_candidates->twitterProfileId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->googleProfileLink->Required) { ?>
			elm = this.getElements("x" + infix + "_googleProfileLink");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->googleProfileLink->caption(), $recruitment_candidates->googleProfileLink->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_candidates_edit->googleProfileId->Required) { ?>
			elm = this.getElements("x" + infix + "_googleProfileId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_candidates->googleProfileId->caption(), $recruitment_candidates->googleProfileId->RequiredErrorMessage)) ?>");
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
frecruitment_candidatesedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_candidatesedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_candidatesedit.lists["x_gender"] = <?php echo $recruitment_candidates_edit->gender->Lookup->toClientList() ?>;
frecruitment_candidatesedit.lists["x_gender"].options = <?php echo JsonEncode($recruitment_candidates_edit->gender->options(FALSE, TRUE)) ?>;
frecruitment_candidatesedit.lists["x_marital_status"] = <?php echo $recruitment_candidates_edit->marital_status->Lookup->toClientList() ?>;
frecruitment_candidatesedit.lists["x_marital_status"].options = <?php echo JsonEncode($recruitment_candidates_edit->marital_status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_candidates_edit->showPageHeader(); ?>
<?php
$recruitment_candidates_edit->showMessage();
?>
<form name="frecruitment_candidatesedit" id="frecruitment_candidatesedit" class="<?php echo $recruitment_candidates_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_candidates_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_candidates_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_candidates">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_candidates_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($recruitment_candidates->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_recruitment_candidates_id" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->id->caption() ?><?php echo ($recruitment_candidates->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->id->cellAttributes() ?>>
<span id="el_recruitment_candidates_id">
<span<?php echo $recruitment_candidates->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($recruitment_candidates->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="recruitment_candidates" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($recruitment_candidates->id->CurrentValue) ?>">
<?php echo $recruitment_candidates->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label id="elh_recruitment_candidates_first_name" for="x_first_name" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->first_name->caption() ?><?php echo ($recruitment_candidates->first_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->first_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_first_name">
<input type="text" data-table="recruitment_candidates" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_candidates->first_name->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->first_name->EditValue ?>"<?php echo $recruitment_candidates->first_name->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->first_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label id="elh_recruitment_candidates_last_name" for="x_last_name" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->last_name->caption() ?><?php echo ($recruitment_candidates->last_name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->last_name->cellAttributes() ?>>
<span id="el_recruitment_candidates_last_name">
<input type="text" data-table="recruitment_candidates" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_candidates->last_name->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->last_name->EditValue ?>"<?php echo $recruitment_candidates->last_name->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->last_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->nationality->Visible) { // nationality ?>
	<div id="r_nationality" class="form-group row">
		<label id="elh_recruitment_candidates_nationality" for="x_nationality" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->nationality->caption() ?><?php echo ($recruitment_candidates->nationality->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->nationality->cellAttributes() ?>>
<span id="el_recruitment_candidates_nationality">
<input type="text" data-table="recruitment_candidates" data-field="x_nationality" name="x_nationality" id="x_nationality" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->nationality->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->nationality->EditValue ?>"<?php echo $recruitment_candidates->nationality->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->nationality->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->birthday->Visible) { // birthday ?>
	<div id="r_birthday" class="form-group row">
		<label id="elh_recruitment_candidates_birthday" for="x_birthday" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->birthday->caption() ?><?php echo ($recruitment_candidates->birthday->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->birthday->cellAttributes() ?>>
<span id="el_recruitment_candidates_birthday">
<input type="text" data-table="recruitment_candidates" data-field="x_birthday" name="x_birthday" id="x_birthday" placeholder="<?php echo HtmlEncode($recruitment_candidates->birthday->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->birthday->EditValue ?>"<?php echo $recruitment_candidates->birthday->editAttributes() ?>>
<?php if (!$recruitment_candidates->birthday->ReadOnly && !$recruitment_candidates->birthday->Disabled && !isset($recruitment_candidates->birthday->EditAttrs["readonly"]) && !isset($recruitment_candidates->birthday->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_candidatesedit", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_candidates->birthday->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label id="elh_recruitment_candidates_gender" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->gender->caption() ?><?php echo ($recruitment_candidates->gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->gender->cellAttributes() ?>>
<span id="el_recruitment_candidates_gender">
<div id="tp_x_gender" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_candidates" data-field="x_gender" data-value-separator="<?php echo $recruitment_candidates->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="{value}"<?php echo $recruitment_candidates->gender->editAttributes() ?>></div>
<div id="dsl_x_gender" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_candidates->gender->radioButtonListHtml(FALSE, "x_gender") ?>
</div></div>
</span>
<?php echo $recruitment_candidates->gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->marital_status->Visible) { // marital_status ?>
	<div id="r_marital_status" class="form-group row">
		<label id="elh_recruitment_candidates_marital_status" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->marital_status->caption() ?><?php echo ($recruitment_candidates->marital_status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->marital_status->cellAttributes() ?>>
<span id="el_recruitment_candidates_marital_status">
<div id="tp_x_marital_status" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_candidates" data-field="x_marital_status" data-value-separator="<?php echo $recruitment_candidates->marital_status->displayValueSeparatorAttribute() ?>" name="x_marital_status" id="x_marital_status" value="{value}"<?php echo $recruitment_candidates->marital_status->editAttributes() ?>></div>
<div id="dsl_x_marital_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_candidates->marital_status->radioButtonListHtml(FALSE, "x_marital_status") ?>
</div></div>
</span>
<?php echo $recruitment_candidates->marital_status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->address1->Visible) { // address1 ?>
	<div id="r_address1" class="form-group row">
		<label id="elh_recruitment_candidates_address1" for="x_address1" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->address1->caption() ?><?php echo ($recruitment_candidates->address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->address1->cellAttributes() ?>>
<span id="el_recruitment_candidates_address1">
<input type="text" data-table="recruitment_candidates" data-field="x_address1" name="x_address1" id="x_address1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_candidates->address1->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->address1->EditValue ?>"<?php echo $recruitment_candidates->address1->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->address2->Visible) { // address2 ?>
	<div id="r_address2" class="form-group row">
		<label id="elh_recruitment_candidates_address2" for="x_address2" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->address2->caption() ?><?php echo ($recruitment_candidates->address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->address2->cellAttributes() ?>>
<span id="el_recruitment_candidates_address2">
<input type="text" data-table="recruitment_candidates" data-field="x_address2" name="x_address2" id="x_address2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_candidates->address2->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->address2->EditValue ?>"<?php echo $recruitment_candidates->address2->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->city->Visible) { // city ?>
	<div id="r_city" class="form-group row">
		<label id="elh_recruitment_candidates_city" for="x_city" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->city->caption() ?><?php echo ($recruitment_candidates->city->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->city->cellAttributes() ?>>
<span id="el_recruitment_candidates_city">
<input type="text" data-table="recruitment_candidates" data-field="x_city" name="x_city" id="x_city" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($recruitment_candidates->city->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->city->EditValue ?>"<?php echo $recruitment_candidates->city->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->city->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_recruitment_candidates_country" for="x_country" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->country->caption() ?><?php echo ($recruitment_candidates->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->country->cellAttributes() ?>>
<span id="el_recruitment_candidates_country">
<input type="text" data-table="recruitment_candidates" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($recruitment_candidates->country->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->country->EditValue ?>"<?php echo $recruitment_candidates->country->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label id="elh_recruitment_candidates_province" for="x_province" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->province->caption() ?><?php echo ($recruitment_candidates->province->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->province->cellAttributes() ?>>
<span id="el_recruitment_candidates_province">
<input type="text" data-table="recruitment_candidates" data-field="x_province" name="x_province" id="x_province" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->province->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->province->EditValue ?>"<?php echo $recruitment_candidates->province->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->province->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label id="elh_recruitment_candidates_postal_code" for="x_postal_code" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->postal_code->caption() ?><?php echo ($recruitment_candidates->postal_code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->postal_code->cellAttributes() ?>>
<span id="el_recruitment_candidates_postal_code">
<input type="text" data-table="recruitment_candidates" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($recruitment_candidates->postal_code->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->postal_code->EditValue ?>"<?php echo $recruitment_candidates->postal_code->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->postal_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->_email->Visible) { // email ?>
	<div id="r__email" class="form-group row">
		<label id="elh_recruitment_candidates__email" for="x__email" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->_email->caption() ?><?php echo ($recruitment_candidates->_email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->_email->cellAttributes() ?>>
<span id="el_recruitment_candidates__email">
<input type="text" data-table="recruitment_candidates" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($recruitment_candidates->_email->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->_email->EditValue ?>"<?php echo $recruitment_candidates->_email->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->_email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->home_phone->Visible) { // home_phone ?>
	<div id="r_home_phone" class="form-group row">
		<label id="elh_recruitment_candidates_home_phone" for="x_home_phone" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->home_phone->caption() ?><?php echo ($recruitment_candidates->home_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->home_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_home_phone">
<input type="text" data-table="recruitment_candidates" data-field="x_home_phone" name="x_home_phone" id="x_home_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->home_phone->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->home_phone->EditValue ?>"<?php echo $recruitment_candidates->home_phone->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->home_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->mobile_phone->Visible) { // mobile_phone ?>
	<div id="r_mobile_phone" class="form-group row">
		<label id="elh_recruitment_candidates_mobile_phone" for="x_mobile_phone" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->mobile_phone->caption() ?><?php echo ($recruitment_candidates->mobile_phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->mobile_phone->cellAttributes() ?>>
<span id="el_recruitment_candidates_mobile_phone">
<input type="text" data-table="recruitment_candidates" data-field="x_mobile_phone" name="x_mobile_phone" id="x_mobile_phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->mobile_phone->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->mobile_phone->EditValue ?>"<?php echo $recruitment_candidates->mobile_phone->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->mobile_phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->cv_title->Visible) { // cv_title ?>
	<div id="r_cv_title" class="form-group row">
		<label id="elh_recruitment_candidates_cv_title" for="x_cv_title" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->cv_title->caption() ?><?php echo ($recruitment_candidates->cv_title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->cv_title->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv_title">
<input type="text" data-table="recruitment_candidates" data-field="x_cv_title" name="x_cv_title" id="x_cv_title" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($recruitment_candidates->cv_title->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->cv_title->EditValue ?>"<?php echo $recruitment_candidates->cv_title->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->cv_title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->cv->Visible) { // cv ?>
	<div id="r_cv" class="form-group row">
		<label id="elh_recruitment_candidates_cv" for="x_cv" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->cv->caption() ?><?php echo ($recruitment_candidates->cv->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->cv->cellAttributes() ?>>
<span id="el_recruitment_candidates_cv">
<input type="text" data-table="recruitment_candidates" data-field="x_cv" name="x_cv" id="x_cv" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($recruitment_candidates->cv->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->cv->EditValue ?>"<?php echo $recruitment_candidates->cv->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->cv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->cvtext->Visible) { // cvtext ?>
	<div id="r_cvtext" class="form-group row">
		<label id="elh_recruitment_candidates_cvtext" for="x_cvtext" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->cvtext->caption() ?><?php echo ($recruitment_candidates->cvtext->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->cvtext->cellAttributes() ?>>
<span id="el_recruitment_candidates_cvtext">
<textarea data-table="recruitment_candidates" data-field="x_cvtext" name="x_cvtext" id="x_cvtext" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->cvtext->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->cvtext->editAttributes() ?>><?php echo $recruitment_candidates->cvtext->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->cvtext->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->industry->Visible) { // industry ?>
	<div id="r_industry" class="form-group row">
		<label id="elh_recruitment_candidates_industry" for="x_industry" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->industry->caption() ?><?php echo ($recruitment_candidates->industry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->industry->cellAttributes() ?>>
<span id="el_recruitment_candidates_industry">
<textarea data-table="recruitment_candidates" data-field="x_industry" name="x_industry" id="x_industry" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->industry->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->industry->editAttributes() ?>><?php echo $recruitment_candidates->industry->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->industry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->profileImage->Visible) { // profileImage ?>
	<div id="r_profileImage" class="form-group row">
		<label id="elh_recruitment_candidates_profileImage" for="x_profileImage" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->profileImage->caption() ?><?php echo ($recruitment_candidates->profileImage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->profileImage->cellAttributes() ?>>
<span id="el_recruitment_candidates_profileImage">
<input type="text" data-table="recruitment_candidates" data-field="x_profileImage" name="x_profileImage" id="x_profileImage" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($recruitment_candidates->profileImage->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->profileImage->EditValue ?>"<?php echo $recruitment_candidates->profileImage->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->profileImage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->head_line->Visible) { // head_line ?>
	<div id="r_head_line" class="form-group row">
		<label id="elh_recruitment_candidates_head_line" for="x_head_line" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->head_line->caption() ?><?php echo ($recruitment_candidates->head_line->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->head_line->cellAttributes() ?>>
<span id="el_recruitment_candidates_head_line">
<textarea data-table="recruitment_candidates" data-field="x_head_line" name="x_head_line" id="x_head_line" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->head_line->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->head_line->editAttributes() ?>><?php echo $recruitment_candidates->head_line->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->head_line->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->objective->Visible) { // objective ?>
	<div id="r_objective" class="form-group row">
		<label id="elh_recruitment_candidates_objective" for="x_objective" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->objective->caption() ?><?php echo ($recruitment_candidates->objective->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->objective->cellAttributes() ?>>
<span id="el_recruitment_candidates_objective">
<textarea data-table="recruitment_candidates" data-field="x_objective" name="x_objective" id="x_objective" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->objective->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->objective->editAttributes() ?>><?php echo $recruitment_candidates->objective->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->objective->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->work_history->Visible) { // work_history ?>
	<div id="r_work_history" class="form-group row">
		<label id="elh_recruitment_candidates_work_history" for="x_work_history" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->work_history->caption() ?><?php echo ($recruitment_candidates->work_history->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->work_history->cellAttributes() ?>>
<span id="el_recruitment_candidates_work_history">
<textarea data-table="recruitment_candidates" data-field="x_work_history" name="x_work_history" id="x_work_history" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->work_history->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->work_history->editAttributes() ?>><?php echo $recruitment_candidates->work_history->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->work_history->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->education->Visible) { // education ?>
	<div id="r_education" class="form-group row">
		<label id="elh_recruitment_candidates_education" for="x_education" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->education->caption() ?><?php echo ($recruitment_candidates->education->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->education->cellAttributes() ?>>
<span id="el_recruitment_candidates_education">
<textarea data-table="recruitment_candidates" data-field="x_education" name="x_education" id="x_education" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->education->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->education->editAttributes() ?>><?php echo $recruitment_candidates->education->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->education->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->skills->Visible) { // skills ?>
	<div id="r_skills" class="form-group row">
		<label id="elh_recruitment_candidates_skills" for="x_skills" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->skills->caption() ?><?php echo ($recruitment_candidates->skills->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->skills->cellAttributes() ?>>
<span id="el_recruitment_candidates_skills">
<textarea data-table="recruitment_candidates" data-field="x_skills" name="x_skills" id="x_skills" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->skills->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->skills->editAttributes() ?>><?php echo $recruitment_candidates->skills->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->skills->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->referees->Visible) { // referees ?>
	<div id="r_referees" class="form-group row">
		<label id="elh_recruitment_candidates_referees" for="x_referees" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->referees->caption() ?><?php echo ($recruitment_candidates->referees->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->referees->cellAttributes() ?>>
<span id="el_recruitment_candidates_referees">
<textarea data-table="recruitment_candidates" data-field="x_referees" name="x_referees" id="x_referees" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->referees->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->referees->editAttributes() ?>><?php echo $recruitment_candidates->referees->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->referees->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->linkedInUrl->Visible) { // linkedInUrl ?>
	<div id="r_linkedInUrl" class="form-group row">
		<label id="elh_recruitment_candidates_linkedInUrl" for="x_linkedInUrl" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->linkedInUrl->caption() ?><?php echo ($recruitment_candidates->linkedInUrl->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->linkedInUrl->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInUrl">
<textarea data-table="recruitment_candidates" data-field="x_linkedInUrl" name="x_linkedInUrl" id="x_linkedInUrl" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->linkedInUrl->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->linkedInUrl->editAttributes() ?>><?php echo $recruitment_candidates->linkedInUrl->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->linkedInUrl->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->linkedInData->Visible) { // linkedInData ?>
	<div id="r_linkedInData" class="form-group row">
		<label id="elh_recruitment_candidates_linkedInData" for="x_linkedInData" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->linkedInData->caption() ?><?php echo ($recruitment_candidates->linkedInData->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->linkedInData->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInData">
<textarea data-table="recruitment_candidates" data-field="x_linkedInData" name="x_linkedInData" id="x_linkedInData" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->linkedInData->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->linkedInData->editAttributes() ?>><?php echo $recruitment_candidates->linkedInData->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->linkedInData->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->totalYearsOfExperience->Visible) { // totalYearsOfExperience ?>
	<div id="r_totalYearsOfExperience" class="form-group row">
		<label id="elh_recruitment_candidates_totalYearsOfExperience" for="x_totalYearsOfExperience" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->totalYearsOfExperience->caption() ?><?php echo ($recruitment_candidates->totalYearsOfExperience->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->totalYearsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalYearsOfExperience">
<input type="text" data-table="recruitment_candidates" data-field="x_totalYearsOfExperience" name="x_totalYearsOfExperience" id="x_totalYearsOfExperience" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->totalYearsOfExperience->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->totalYearsOfExperience->EditValue ?>"<?php echo $recruitment_candidates->totalYearsOfExperience->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->totalYearsOfExperience->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->totalMonthsOfExperience->Visible) { // totalMonthsOfExperience ?>
	<div id="r_totalMonthsOfExperience" class="form-group row">
		<label id="elh_recruitment_candidates_totalMonthsOfExperience" for="x_totalMonthsOfExperience" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->totalMonthsOfExperience->caption() ?><?php echo ($recruitment_candidates->totalMonthsOfExperience->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->totalMonthsOfExperience->cellAttributes() ?>>
<span id="el_recruitment_candidates_totalMonthsOfExperience">
<input type="text" data-table="recruitment_candidates" data-field="x_totalMonthsOfExperience" name="x_totalMonthsOfExperience" id="x_totalMonthsOfExperience" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->totalMonthsOfExperience->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->totalMonthsOfExperience->EditValue ?>"<?php echo $recruitment_candidates->totalMonthsOfExperience->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->totalMonthsOfExperience->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->htmlCVData->Visible) { // htmlCVData ?>
	<div id="r_htmlCVData" class="form-group row">
		<label id="elh_recruitment_candidates_htmlCVData" for="x_htmlCVData" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->htmlCVData->caption() ?><?php echo ($recruitment_candidates->htmlCVData->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->htmlCVData->cellAttributes() ?>>
<span id="el_recruitment_candidates_htmlCVData">
<textarea data-table="recruitment_candidates" data-field="x_htmlCVData" name="x_htmlCVData" id="x_htmlCVData" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->htmlCVData->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->htmlCVData->editAttributes() ?>><?php echo $recruitment_candidates->htmlCVData->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->htmlCVData->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->generatedCVFile->Visible) { // generatedCVFile ?>
	<div id="r_generatedCVFile" class="form-group row">
		<label id="elh_recruitment_candidates_generatedCVFile" for="x_generatedCVFile" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->generatedCVFile->caption() ?><?php echo ($recruitment_candidates->generatedCVFile->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->generatedCVFile->cellAttributes() ?>>
<span id="el_recruitment_candidates_generatedCVFile">
<input type="text" data-table="recruitment_candidates" data-field="x_generatedCVFile" name="x_generatedCVFile" id="x_generatedCVFile" size="30" maxlength="150" placeholder="<?php echo HtmlEncode($recruitment_candidates->generatedCVFile->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->generatedCVFile->EditValue ?>"<?php echo $recruitment_candidates->generatedCVFile->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->generatedCVFile->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_recruitment_candidates_created" for="x_created" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->created->caption() ?><?php echo ($recruitment_candidates->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->created->cellAttributes() ?>>
<span id="el_recruitment_candidates_created">
<input type="text" data-table="recruitment_candidates" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($recruitment_candidates->created->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->created->EditValue ?>"<?php echo $recruitment_candidates->created->editAttributes() ?>>
<?php if (!$recruitment_candidates->created->ReadOnly && !$recruitment_candidates->created->Disabled && !isset($recruitment_candidates->created->EditAttrs["readonly"]) && !isset($recruitment_candidates->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_candidatesedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_candidates->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_recruitment_candidates_updated" for="x_updated" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->updated->caption() ?><?php echo ($recruitment_candidates->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->updated->cellAttributes() ?>>
<span id="el_recruitment_candidates_updated">
<input type="text" data-table="recruitment_candidates" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($recruitment_candidates->updated->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->updated->EditValue ?>"<?php echo $recruitment_candidates->updated->editAttributes() ?>>
<?php if (!$recruitment_candidates->updated->ReadOnly && !$recruitment_candidates->updated->Disabled && !isset($recruitment_candidates->updated->EditAttrs["readonly"]) && !isset($recruitment_candidates->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_candidatesedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_candidates->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->expectedSalary->Visible) { // expectedSalary ?>
	<div id="r_expectedSalary" class="form-group row">
		<label id="elh_recruitment_candidates_expectedSalary" for="x_expectedSalary" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->expectedSalary->caption() ?><?php echo ($recruitment_candidates->expectedSalary->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->expectedSalary->cellAttributes() ?>>
<span id="el_recruitment_candidates_expectedSalary">
<input type="text" data-table="recruitment_candidates" data-field="x_expectedSalary" name="x_expectedSalary" id="x_expectedSalary" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->expectedSalary->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->expectedSalary->EditValue ?>"<?php echo $recruitment_candidates->expectedSalary->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->expectedSalary->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->preferedPositions->Visible) { // preferedPositions ?>
	<div id="r_preferedPositions" class="form-group row">
		<label id="elh_recruitment_candidates_preferedPositions" for="x_preferedPositions" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->preferedPositions->caption() ?><?php echo ($recruitment_candidates->preferedPositions->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->preferedPositions->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedPositions">
<textarea data-table="recruitment_candidates" data-field="x_preferedPositions" name="x_preferedPositions" id="x_preferedPositions" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->preferedPositions->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->preferedPositions->editAttributes() ?>><?php echo $recruitment_candidates->preferedPositions->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->preferedPositions->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->preferedJobtype->Visible) { // preferedJobtype ?>
	<div id="r_preferedJobtype" class="form-group row">
		<label id="elh_recruitment_candidates_preferedJobtype" for="x_preferedJobtype" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->preferedJobtype->caption() ?><?php echo ($recruitment_candidates->preferedJobtype->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->preferedJobtype->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedJobtype">
<input type="text" data-table="recruitment_candidates" data-field="x_preferedJobtype" name="x_preferedJobtype" id="x_preferedJobtype" size="30" maxlength="60" placeholder="<?php echo HtmlEncode($recruitment_candidates->preferedJobtype->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->preferedJobtype->EditValue ?>"<?php echo $recruitment_candidates->preferedJobtype->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->preferedJobtype->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->preferedCountries->Visible) { // preferedCountries ?>
	<div id="r_preferedCountries" class="form-group row">
		<label id="elh_recruitment_candidates_preferedCountries" for="x_preferedCountries" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->preferedCountries->caption() ?><?php echo ($recruitment_candidates->preferedCountries->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->preferedCountries->cellAttributes() ?>>
<span id="el_recruitment_candidates_preferedCountries">
<textarea data-table="recruitment_candidates" data-field="x_preferedCountries" name="x_preferedCountries" id="x_preferedCountries" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->preferedCountries->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->preferedCountries->editAttributes() ?>><?php echo $recruitment_candidates->preferedCountries->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->preferedCountries->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->tags->Visible) { // tags ?>
	<div id="r_tags" class="form-group row">
		<label id="elh_recruitment_candidates_tags" for="x_tags" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->tags->caption() ?><?php echo ($recruitment_candidates->tags->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->tags->cellAttributes() ?>>
<span id="el_recruitment_candidates_tags">
<textarea data-table="recruitment_candidates" data-field="x_tags" name="x_tags" id="x_tags" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->tags->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->tags->editAttributes() ?>><?php echo $recruitment_candidates->tags->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->tags->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_recruitment_candidates_notes" for="x_notes" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->notes->caption() ?><?php echo ($recruitment_candidates->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->notes->cellAttributes() ?>>
<span id="el_recruitment_candidates_notes">
<textarea data-table="recruitment_candidates" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->notes->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->notes->editAttributes() ?>><?php echo $recruitment_candidates->notes->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->calls->Visible) { // calls ?>
	<div id="r_calls" class="form-group row">
		<label id="elh_recruitment_candidates_calls" for="x_calls" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->calls->caption() ?><?php echo ($recruitment_candidates->calls->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->calls->cellAttributes() ?>>
<span id="el_recruitment_candidates_calls">
<textarea data-table="recruitment_candidates" data-field="x_calls" name="x_calls" id="x_calls" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_candidates->calls->getPlaceHolder()) ?>"<?php echo $recruitment_candidates->calls->editAttributes() ?>><?php echo $recruitment_candidates->calls->EditValue ?></textarea>
</span>
<?php echo $recruitment_candidates->calls->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label id="elh_recruitment_candidates_age" for="x_age" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->age->caption() ?><?php echo ($recruitment_candidates->age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->age->cellAttributes() ?>>
<span id="el_recruitment_candidates_age">
<input type="text" data-table="recruitment_candidates" data-field="x_age" name="x_age" id="x_age" size="30" placeholder="<?php echo HtmlEncode($recruitment_candidates->age->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->age->EditValue ?>"<?php echo $recruitment_candidates->age->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->hash->Visible) { // hash ?>
	<div id="r_hash" class="form-group row">
		<label id="elh_recruitment_candidates_hash" for="x_hash" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->hash->caption() ?><?php echo ($recruitment_candidates->hash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->hash->cellAttributes() ?>>
<span id="el_recruitment_candidates_hash">
<input type="text" data-table="recruitment_candidates" data-field="x_hash" name="x_hash" id="x_hash" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_candidates->hash->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->hash->EditValue ?>"<?php echo $recruitment_candidates->hash->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->hash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileLink->Visible) { // linkedInProfileLink ?>
	<div id="r_linkedInProfileLink" class="form-group row">
		<label id="elh_recruitment_candidates_linkedInProfileLink" for="x_linkedInProfileLink" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->linkedInProfileLink->caption() ?><?php echo ($recruitment_candidates->linkedInProfileLink->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->linkedInProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileLink">
<input type="text" data-table="recruitment_candidates" data-field="x_linkedInProfileLink" name="x_linkedInProfileLink" id="x_linkedInProfileLink" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($recruitment_candidates->linkedInProfileLink->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->linkedInProfileLink->EditValue ?>"<?php echo $recruitment_candidates->linkedInProfileLink->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->linkedInProfileLink->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->linkedInProfileId->Visible) { // linkedInProfileId ?>
	<div id="r_linkedInProfileId" class="form-group row">
		<label id="elh_recruitment_candidates_linkedInProfileId" for="x_linkedInProfileId" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->linkedInProfileId->caption() ?><?php echo ($recruitment_candidates->linkedInProfileId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->linkedInProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_linkedInProfileId">
<input type="text" data-table="recruitment_candidates" data-field="x_linkedInProfileId" name="x_linkedInProfileId" id="x_linkedInProfileId" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->linkedInProfileId->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->linkedInProfileId->EditValue ?>"<?php echo $recruitment_candidates->linkedInProfileId->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->linkedInProfileId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileLink->Visible) { // facebookProfileLink ?>
	<div id="r_facebookProfileLink" class="form-group row">
		<label id="elh_recruitment_candidates_facebookProfileLink" for="x_facebookProfileLink" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->facebookProfileLink->caption() ?><?php echo ($recruitment_candidates->facebookProfileLink->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->facebookProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileLink">
<input type="text" data-table="recruitment_candidates" data-field="x_facebookProfileLink" name="x_facebookProfileLink" id="x_facebookProfileLink" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($recruitment_candidates->facebookProfileLink->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->facebookProfileLink->EditValue ?>"<?php echo $recruitment_candidates->facebookProfileLink->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->facebookProfileLink->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->facebookProfileId->Visible) { // facebookProfileId ?>
	<div id="r_facebookProfileId" class="form-group row">
		<label id="elh_recruitment_candidates_facebookProfileId" for="x_facebookProfileId" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->facebookProfileId->caption() ?><?php echo ($recruitment_candidates->facebookProfileId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->facebookProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_facebookProfileId">
<input type="text" data-table="recruitment_candidates" data-field="x_facebookProfileId" name="x_facebookProfileId" id="x_facebookProfileId" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->facebookProfileId->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->facebookProfileId->EditValue ?>"<?php echo $recruitment_candidates->facebookProfileId->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->facebookProfileId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileLink->Visible) { // twitterProfileLink ?>
	<div id="r_twitterProfileLink" class="form-group row">
		<label id="elh_recruitment_candidates_twitterProfileLink" for="x_twitterProfileLink" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->twitterProfileLink->caption() ?><?php echo ($recruitment_candidates->twitterProfileLink->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->twitterProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileLink">
<input type="text" data-table="recruitment_candidates" data-field="x_twitterProfileLink" name="x_twitterProfileLink" id="x_twitterProfileLink" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($recruitment_candidates->twitterProfileLink->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->twitterProfileLink->EditValue ?>"<?php echo $recruitment_candidates->twitterProfileLink->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->twitterProfileLink->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->twitterProfileId->Visible) { // twitterProfileId ?>
	<div id="r_twitterProfileId" class="form-group row">
		<label id="elh_recruitment_candidates_twitterProfileId" for="x_twitterProfileId" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->twitterProfileId->caption() ?><?php echo ($recruitment_candidates->twitterProfileId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->twitterProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_twitterProfileId">
<input type="text" data-table="recruitment_candidates" data-field="x_twitterProfileId" name="x_twitterProfileId" id="x_twitterProfileId" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->twitterProfileId->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->twitterProfileId->EditValue ?>"<?php echo $recruitment_candidates->twitterProfileId->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->twitterProfileId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileLink->Visible) { // googleProfileLink ?>
	<div id="r_googleProfileLink" class="form-group row">
		<label id="elh_recruitment_candidates_googleProfileLink" for="x_googleProfileLink" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->googleProfileLink->caption() ?><?php echo ($recruitment_candidates->googleProfileLink->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->googleProfileLink->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileLink">
<input type="text" data-table="recruitment_candidates" data-field="x_googleProfileLink" name="x_googleProfileLink" id="x_googleProfileLink" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($recruitment_candidates->googleProfileLink->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->googleProfileLink->EditValue ?>"<?php echo $recruitment_candidates->googleProfileLink->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->googleProfileLink->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_candidates->googleProfileId->Visible) { // googleProfileId ?>
	<div id="r_googleProfileId" class="form-group row">
		<label id="elh_recruitment_candidates_googleProfileId" for="x_googleProfileId" class="<?php echo $recruitment_candidates_edit->LeftColumnClass ?>"><?php echo $recruitment_candidates->googleProfileId->caption() ?><?php echo ($recruitment_candidates->googleProfileId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_candidates_edit->RightColumnClass ?>"><div<?php echo $recruitment_candidates->googleProfileId->cellAttributes() ?>>
<span id="el_recruitment_candidates_googleProfileId">
<input type="text" data-table="recruitment_candidates" data-field="x_googleProfileId" name="x_googleProfileId" id="x_googleProfileId" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($recruitment_candidates->googleProfileId->getPlaceHolder()) ?>" value="<?php echo $recruitment_candidates->googleProfileId->EditValue ?>"<?php echo $recruitment_candidates->googleProfileId->editAttributes() ?>>
</span>
<?php echo $recruitment_candidates->googleProfileId->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recruitment_candidates_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recruitment_candidates_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_candidates_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recruitment_candidates_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_candidates_edit->terminate();
?>