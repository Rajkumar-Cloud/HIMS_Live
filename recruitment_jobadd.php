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
$recruitment_job_add = new recruitment_job_add();

// Run the page
$recruitment_job_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_job_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var frecruitment_jobadd = currentForm = new ew.Form("frecruitment_jobadd", "add");

// Validate form
frecruitment_jobadd.validate = function() {
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
		<?php if ($recruitment_job_add->title->Required) { ?>
			elm = this.getElements("x" + infix + "_title");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->title->caption(), $recruitment_job->title->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->shortDescription->Required) { ?>
			elm = this.getElements("x" + infix + "_shortDescription");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->shortDescription->caption(), $recruitment_job->shortDescription->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->description->Required) { ?>
			elm = this.getElements("x" + infix + "_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->description->caption(), $recruitment_job->description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->requirements->Required) { ?>
			elm = this.getElements("x" + infix + "_requirements");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->requirements->caption(), $recruitment_job->requirements->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->benefits->Required) { ?>
			elm = this.getElements("x" + infix + "_benefits");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->benefits->caption(), $recruitment_job->benefits->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->country->Required) { ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->country->caption(), $recruitment_job->country->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_country");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->country->errorMessage()) ?>");
		<?php if ($recruitment_job_add->company->Required) { ?>
			elm = this.getElements("x" + infix + "_company");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->company->caption(), $recruitment_job->company->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_company");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->company->errorMessage()) ?>");
		<?php if ($recruitment_job_add->department->Required) { ?>
			elm = this.getElements("x" + infix + "_department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->department->caption(), $recruitment_job->department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->code->Required) { ?>
			elm = this.getElements("x" + infix + "_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->code->caption(), $recruitment_job->code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->employementType->Required) { ?>
			elm = this.getElements("x" + infix + "_employementType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->employementType->caption(), $recruitment_job->employementType->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employementType");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->employementType->errorMessage()) ?>");
		<?php if ($recruitment_job_add->industry->Required) { ?>
			elm = this.getElements("x" + infix + "_industry");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->industry->caption(), $recruitment_job->industry->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_industry");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->industry->errorMessage()) ?>");
		<?php if ($recruitment_job_add->experienceLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_experienceLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->experienceLevel->caption(), $recruitment_job->experienceLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_experienceLevel");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->experienceLevel->errorMessage()) ?>");
		<?php if ($recruitment_job_add->jobFunction->Required) { ?>
			elm = this.getElements("x" + infix + "_jobFunction");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->jobFunction->caption(), $recruitment_job->jobFunction->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_jobFunction");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->jobFunction->errorMessage()) ?>");
		<?php if ($recruitment_job_add->educationLevel->Required) { ?>
			elm = this.getElements("x" + infix + "_educationLevel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->educationLevel->caption(), $recruitment_job->educationLevel->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_educationLevel");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->educationLevel->errorMessage()) ?>");
		<?php if ($recruitment_job_add->currency->Required) { ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->currency->caption(), $recruitment_job->currency->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_currency");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->currency->errorMessage()) ?>");
		<?php if ($recruitment_job_add->showSalary->Required) { ?>
			elm = this.getElements("x" + infix + "_showSalary");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->showSalary->caption(), $recruitment_job->showSalary->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->salaryMin->Required) { ?>
			elm = this.getElements("x" + infix + "_salaryMin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->salaryMin->caption(), $recruitment_job->salaryMin->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_salaryMin");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->salaryMin->errorMessage()) ?>");
		<?php if ($recruitment_job_add->salaryMax->Required) { ?>
			elm = this.getElements("x" + infix + "_salaryMax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->salaryMax->caption(), $recruitment_job->salaryMax->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_salaryMax");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->salaryMax->errorMessage()) ?>");
		<?php if ($recruitment_job_add->keywords->Required) { ?>
			elm = this.getElements("x" + infix + "_keywords");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->keywords->caption(), $recruitment_job->keywords->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->status->caption(), $recruitment_job->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->closingDate->Required) { ?>
			elm = this.getElements("x" + infix + "_closingDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->closingDate->caption(), $recruitment_job->closingDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_closingDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->closingDate->errorMessage()) ?>");
		<?php if ($recruitment_job_add->attachment->Required) { ?>
			elm = this.getElements("x" + infix + "_attachment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->attachment->caption(), $recruitment_job->attachment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->display->Required) { ?>
			elm = this.getElements("x" + infix + "_display");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->display->caption(), $recruitment_job->display->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_job_add->postedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_postedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_job->postedBy->caption(), $recruitment_job->postedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_postedBy");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_job->postedBy->errorMessage()) ?>");

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
frecruitment_jobadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_jobadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
frecruitment_jobadd.lists["x_showSalary"] = <?php echo $recruitment_job_add->showSalary->Lookup->toClientList() ?>;
frecruitment_jobadd.lists["x_showSalary"].options = <?php echo JsonEncode($recruitment_job_add->showSalary->options(FALSE, TRUE)) ?>;
frecruitment_jobadd.lists["x_status"] = <?php echo $recruitment_job_add->status->Lookup->toClientList() ?>;
frecruitment_jobadd.lists["x_status"].options = <?php echo JsonEncode($recruitment_job_add->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_job_add->showPageHeader(); ?>
<?php
$recruitment_job_add->showMessage();
?>
<form name="frecruitment_jobadd" id="frecruitment_jobadd" class="<?php echo $recruitment_job_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_job_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_job_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_job">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_job_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($recruitment_job->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label id="elh_recruitment_job_title" for="x_title" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->title->caption() ?><?php echo ($recruitment_job->title->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->title->cellAttributes() ?>>
<span id="el_recruitment_job_title">
<input type="text" data-table="recruitment_job" data-field="x_title" name="x_title" id="x_title" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($recruitment_job->title->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->title->EditValue ?>"<?php echo $recruitment_job->title->editAttributes() ?>>
</span>
<?php echo $recruitment_job->title->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->shortDescription->Visible) { // shortDescription ?>
	<div id="r_shortDescription" class="form-group row">
		<label id="elh_recruitment_job_shortDescription" for="x_shortDescription" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->shortDescription->caption() ?><?php echo ($recruitment_job->shortDescription->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->shortDescription->cellAttributes() ?>>
<span id="el_recruitment_job_shortDescription">
<textarea data-table="recruitment_job" data-field="x_shortDescription" name="x_shortDescription" id="x_shortDescription" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_job->shortDescription->getPlaceHolder()) ?>"<?php echo $recruitment_job->shortDescription->editAttributes() ?>><?php echo $recruitment_job->shortDescription->EditValue ?></textarea>
</span>
<?php echo $recruitment_job->shortDescription->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label id="elh_recruitment_job_description" for="x_description" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->description->caption() ?><?php echo ($recruitment_job->description->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->description->cellAttributes() ?>>
<span id="el_recruitment_job_description">
<textarea data-table="recruitment_job" data-field="x_description" name="x_description" id="x_description" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_job->description->getPlaceHolder()) ?>"<?php echo $recruitment_job->description->editAttributes() ?>><?php echo $recruitment_job->description->EditValue ?></textarea>
</span>
<?php echo $recruitment_job->description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->requirements->Visible) { // requirements ?>
	<div id="r_requirements" class="form-group row">
		<label id="elh_recruitment_job_requirements" for="x_requirements" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->requirements->caption() ?><?php echo ($recruitment_job->requirements->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->requirements->cellAttributes() ?>>
<span id="el_recruitment_job_requirements">
<textarea data-table="recruitment_job" data-field="x_requirements" name="x_requirements" id="x_requirements" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_job->requirements->getPlaceHolder()) ?>"<?php echo $recruitment_job->requirements->editAttributes() ?>><?php echo $recruitment_job->requirements->EditValue ?></textarea>
</span>
<?php echo $recruitment_job->requirements->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->benefits->Visible) { // benefits ?>
	<div id="r_benefits" class="form-group row">
		<label id="elh_recruitment_job_benefits" for="x_benefits" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->benefits->caption() ?><?php echo ($recruitment_job->benefits->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->benefits->cellAttributes() ?>>
<span id="el_recruitment_job_benefits">
<textarea data-table="recruitment_job" data-field="x_benefits" name="x_benefits" id="x_benefits" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_job->benefits->getPlaceHolder()) ?>"<?php echo $recruitment_job->benefits->editAttributes() ?>><?php echo $recruitment_job->benefits->EditValue ?></textarea>
</span>
<?php echo $recruitment_job->benefits->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label id="elh_recruitment_job_country" for="x_country" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->country->caption() ?><?php echo ($recruitment_job->country->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->country->cellAttributes() ?>>
<span id="el_recruitment_job_country">
<input type="text" data-table="recruitment_job" data-field="x_country" name="x_country" id="x_country" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->country->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->country->EditValue ?>"<?php echo $recruitment_job->country->editAttributes() ?>>
</span>
<?php echo $recruitment_job->country->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->company->Visible) { // company ?>
	<div id="r_company" class="form-group row">
		<label id="elh_recruitment_job_company" for="x_company" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->company->caption() ?><?php echo ($recruitment_job->company->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->company->cellAttributes() ?>>
<span id="el_recruitment_job_company">
<input type="text" data-table="recruitment_job" data-field="x_company" name="x_company" id="x_company" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->company->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->company->EditValue ?>"<?php echo $recruitment_job->company->editAttributes() ?>>
</span>
<?php echo $recruitment_job->company->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->department->Visible) { // department ?>
	<div id="r_department" class="form-group row">
		<label id="elh_recruitment_job_department" for="x_department" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->department->caption() ?><?php echo ($recruitment_job->department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->department->cellAttributes() ?>>
<span id="el_recruitment_job_department">
<input type="text" data-table="recruitment_job" data-field="x_department" name="x_department" id="x_department" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_job->department->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->department->EditValue ?>"<?php echo $recruitment_job->department->editAttributes() ?>>
</span>
<?php echo $recruitment_job->department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->code->Visible) { // code ?>
	<div id="r_code" class="form-group row">
		<label id="elh_recruitment_job_code" for="x_code" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->code->caption() ?><?php echo ($recruitment_job->code->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->code->cellAttributes() ?>>
<span id="el_recruitment_job_code">
<input type="text" data-table="recruitment_job" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($recruitment_job->code->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->code->EditValue ?>"<?php echo $recruitment_job->code->editAttributes() ?>>
</span>
<?php echo $recruitment_job->code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->employementType->Visible) { // employementType ?>
	<div id="r_employementType" class="form-group row">
		<label id="elh_recruitment_job_employementType" for="x_employementType" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->employementType->caption() ?><?php echo ($recruitment_job->employementType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->employementType->cellAttributes() ?>>
<span id="el_recruitment_job_employementType">
<input type="text" data-table="recruitment_job" data-field="x_employementType" name="x_employementType" id="x_employementType" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->employementType->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->employementType->EditValue ?>"<?php echo $recruitment_job->employementType->editAttributes() ?>>
</span>
<?php echo $recruitment_job->employementType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->industry->Visible) { // industry ?>
	<div id="r_industry" class="form-group row">
		<label id="elh_recruitment_job_industry" for="x_industry" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->industry->caption() ?><?php echo ($recruitment_job->industry->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->industry->cellAttributes() ?>>
<span id="el_recruitment_job_industry">
<input type="text" data-table="recruitment_job" data-field="x_industry" name="x_industry" id="x_industry" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->industry->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->industry->EditValue ?>"<?php echo $recruitment_job->industry->editAttributes() ?>>
</span>
<?php echo $recruitment_job->industry->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->experienceLevel->Visible) { // experienceLevel ?>
	<div id="r_experienceLevel" class="form-group row">
		<label id="elh_recruitment_job_experienceLevel" for="x_experienceLevel" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->experienceLevel->caption() ?><?php echo ($recruitment_job->experienceLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->experienceLevel->cellAttributes() ?>>
<span id="el_recruitment_job_experienceLevel">
<input type="text" data-table="recruitment_job" data-field="x_experienceLevel" name="x_experienceLevel" id="x_experienceLevel" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->experienceLevel->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->experienceLevel->EditValue ?>"<?php echo $recruitment_job->experienceLevel->editAttributes() ?>>
</span>
<?php echo $recruitment_job->experienceLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->jobFunction->Visible) { // jobFunction ?>
	<div id="r_jobFunction" class="form-group row">
		<label id="elh_recruitment_job_jobFunction" for="x_jobFunction" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->jobFunction->caption() ?><?php echo ($recruitment_job->jobFunction->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->jobFunction->cellAttributes() ?>>
<span id="el_recruitment_job_jobFunction">
<input type="text" data-table="recruitment_job" data-field="x_jobFunction" name="x_jobFunction" id="x_jobFunction" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->jobFunction->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->jobFunction->EditValue ?>"<?php echo $recruitment_job->jobFunction->editAttributes() ?>>
</span>
<?php echo $recruitment_job->jobFunction->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->educationLevel->Visible) { // educationLevel ?>
	<div id="r_educationLevel" class="form-group row">
		<label id="elh_recruitment_job_educationLevel" for="x_educationLevel" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->educationLevel->caption() ?><?php echo ($recruitment_job->educationLevel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->educationLevel->cellAttributes() ?>>
<span id="el_recruitment_job_educationLevel">
<input type="text" data-table="recruitment_job" data-field="x_educationLevel" name="x_educationLevel" id="x_educationLevel" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->educationLevel->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->educationLevel->EditValue ?>"<?php echo $recruitment_job->educationLevel->editAttributes() ?>>
</span>
<?php echo $recruitment_job->educationLevel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->currency->Visible) { // currency ?>
	<div id="r_currency" class="form-group row">
		<label id="elh_recruitment_job_currency" for="x_currency" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->currency->caption() ?><?php echo ($recruitment_job->currency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->currency->cellAttributes() ?>>
<span id="el_recruitment_job_currency">
<input type="text" data-table="recruitment_job" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->currency->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->currency->EditValue ?>"<?php echo $recruitment_job->currency->editAttributes() ?>>
</span>
<?php echo $recruitment_job->currency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->showSalary->Visible) { // showSalary ?>
	<div id="r_showSalary" class="form-group row">
		<label id="elh_recruitment_job_showSalary" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->showSalary->caption() ?><?php echo ($recruitment_job->showSalary->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->showSalary->cellAttributes() ?>>
<span id="el_recruitment_job_showSalary">
<div id="tp_x_showSalary" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_job" data-field="x_showSalary" data-value-separator="<?php echo $recruitment_job->showSalary->displayValueSeparatorAttribute() ?>" name="x_showSalary" id="x_showSalary" value="{value}"<?php echo $recruitment_job->showSalary->editAttributes() ?>></div>
<div id="dsl_x_showSalary" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_job->showSalary->radioButtonListHtml(FALSE, "x_showSalary") ?>
</div></div>
</span>
<?php echo $recruitment_job->showSalary->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->salaryMin->Visible) { // salaryMin ?>
	<div id="r_salaryMin" class="form-group row">
		<label id="elh_recruitment_job_salaryMin" for="x_salaryMin" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->salaryMin->caption() ?><?php echo ($recruitment_job->salaryMin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->salaryMin->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMin">
<input type="text" data-table="recruitment_job" data-field="x_salaryMin" name="x_salaryMin" id="x_salaryMin" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->salaryMin->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->salaryMin->EditValue ?>"<?php echo $recruitment_job->salaryMin->editAttributes() ?>>
</span>
<?php echo $recruitment_job->salaryMin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->salaryMax->Visible) { // salaryMax ?>
	<div id="r_salaryMax" class="form-group row">
		<label id="elh_recruitment_job_salaryMax" for="x_salaryMax" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->salaryMax->caption() ?><?php echo ($recruitment_job->salaryMax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->salaryMax->cellAttributes() ?>>
<span id="el_recruitment_job_salaryMax">
<input type="text" data-table="recruitment_job" data-field="x_salaryMax" name="x_salaryMax" id="x_salaryMax" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->salaryMax->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->salaryMax->EditValue ?>"<?php echo $recruitment_job->salaryMax->editAttributes() ?>>
</span>
<?php echo $recruitment_job->salaryMax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->keywords->Visible) { // keywords ?>
	<div id="r_keywords" class="form-group row">
		<label id="elh_recruitment_job_keywords" for="x_keywords" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->keywords->caption() ?><?php echo ($recruitment_job->keywords->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->keywords->cellAttributes() ?>>
<span id="el_recruitment_job_keywords">
<textarea data-table="recruitment_job" data-field="x_keywords" name="x_keywords" id="x_keywords" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_job->keywords->getPlaceHolder()) ?>"<?php echo $recruitment_job->keywords->editAttributes() ?>><?php echo $recruitment_job->keywords->EditValue ?></textarea>
</span>
<?php echo $recruitment_job->keywords->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_recruitment_job_status" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->status->caption() ?><?php echo ($recruitment_job->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->status->cellAttributes() ?>>
<span id="el_recruitment_job_status">
<div id="tp_x_status" class="ew-template"><input type="radio" class="form-check-input" data-table="recruitment_job" data-field="x_status" data-value-separator="<?php echo $recruitment_job->status->displayValueSeparatorAttribute() ?>" name="x_status" id="x_status" value="{value}"<?php echo $recruitment_job->status->editAttributes() ?>></div>
<div id="dsl_x_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $recruitment_job->status->radioButtonListHtml(FALSE, "x_status") ?>
</div></div>
</span>
<?php echo $recruitment_job->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->closingDate->Visible) { // closingDate ?>
	<div id="r_closingDate" class="form-group row">
		<label id="elh_recruitment_job_closingDate" for="x_closingDate" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->closingDate->caption() ?><?php echo ($recruitment_job->closingDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->closingDate->cellAttributes() ?>>
<span id="el_recruitment_job_closingDate">
<input type="text" data-table="recruitment_job" data-field="x_closingDate" name="x_closingDate" id="x_closingDate" placeholder="<?php echo HtmlEncode($recruitment_job->closingDate->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->closingDate->EditValue ?>"<?php echo $recruitment_job->closingDate->editAttributes() ?>>
<?php if (!$recruitment_job->closingDate->ReadOnly && !$recruitment_job->closingDate->Disabled && !isset($recruitment_job->closingDate->EditAttrs["readonly"]) && !isset($recruitment_job->closingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_jobadd", "x_closingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_job->closingDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->attachment->Visible) { // attachment ?>
	<div id="r_attachment" class="form-group row">
		<label id="elh_recruitment_job_attachment" for="x_attachment" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->attachment->caption() ?><?php echo ($recruitment_job->attachment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->attachment->cellAttributes() ?>>
<span id="el_recruitment_job_attachment">
<input type="text" data-table="recruitment_job" data-field="x_attachment" name="x_attachment" id="x_attachment" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_job->attachment->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->attachment->EditValue ?>"<?php echo $recruitment_job->attachment->editAttributes() ?>>
</span>
<?php echo $recruitment_job->attachment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->display->Visible) { // display ?>
	<div id="r_display" class="form-group row">
		<label id="elh_recruitment_job_display" for="x_display" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->display->caption() ?><?php echo ($recruitment_job->display->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->display->cellAttributes() ?>>
<span id="el_recruitment_job_display">
<input type="text" data-table="recruitment_job" data-field="x_display" name="x_display" id="x_display" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($recruitment_job->display->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->display->EditValue ?>"<?php echo $recruitment_job->display->editAttributes() ?>>
</span>
<?php echo $recruitment_job->display->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_job->postedBy->Visible) { // postedBy ?>
	<div id="r_postedBy" class="form-group row">
		<label id="elh_recruitment_job_postedBy" for="x_postedBy" class="<?php echo $recruitment_job_add->LeftColumnClass ?>"><?php echo $recruitment_job->postedBy->caption() ?><?php echo ($recruitment_job->postedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_job_add->RightColumnClass ?>"><div<?php echo $recruitment_job->postedBy->cellAttributes() ?>>
<span id="el_recruitment_job_postedBy">
<input type="text" data-table="recruitment_job" data-field="x_postedBy" name="x_postedBy" id="x_postedBy" size="30" placeholder="<?php echo HtmlEncode($recruitment_job->postedBy->getPlaceHolder()) ?>" value="<?php echo $recruitment_job->postedBy->EditValue ?>"<?php echo $recruitment_job->postedBy->editAttributes() ?>>
</span>
<?php echo $recruitment_job->postedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recruitment_job_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recruitment_job_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_job_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recruitment_job_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_job_add->terminate();
?>