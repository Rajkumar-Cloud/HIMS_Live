<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_search = new patient_search();

// Run the page
$patient_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatientsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($patient_search->IsModal) { ?>
	fpatientsearch = currentAdvancedSearchForm = new ew.Form("fpatientsearch", "search");
	<?php } else { ?>
	fpatientsearch = currentForm = new ew.Form("fpatientsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpatientsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_dob");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->dob->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->createdby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->modifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CouppleID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->CouppleID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_MaleID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->MaleID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_FemaleID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->FemaleID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_GroupID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_search->GroupID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatientsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatientsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatientsearch.lists["x_title"] = <?php echo $patient_search->title->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_title"].options = <?php echo JsonEncode($patient_search->title->lookupOptions()) ?>;
	fpatientsearch.lists["x_gender"] = <?php echo $patient_search->gender->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_gender"].options = <?php echo JsonEncode($patient_search->gender->lookupOptions()) ?>;
	fpatientsearch.lists["x_blood_group"] = <?php echo $patient_search->blood_group->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_blood_group"].options = <?php echo JsonEncode($patient_search->blood_group->lookupOptions()) ?>;
	fpatientsearch.lists["x_status"] = <?php echo $patient_search->status->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_status"].options = <?php echo JsonEncode($patient_search->status->lookupOptions()) ?>;
	fpatientsearch.lists["x_ReferedByDr"] = <?php echo $patient_search->ReferedByDr->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_search->ReferedByDr->lookupOptions()) ?>;
	fpatientsearch.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_search->ReferA4TreatingConsultant->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_search->ReferA4TreatingConsultant->lookupOptions()) ?>;
	fpatientsearch.lists["x_spouse_title"] = <?php echo $patient_search->spouse_title->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_search->spouse_title->lookupOptions()) ?>;
	fpatientsearch.lists["x_spouse_gender"] = <?php echo $patient_search->spouse_gender->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_search->spouse_gender->lookupOptions()) ?>;
	fpatientsearch.lists["x_spouse_blood_group"] = <?php echo $patient_search->spouse_blood_group->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_search->spouse_blood_group->lookupOptions()) ?>;
	fpatientsearch.lists["x_Maritalstatus"] = <?php echo $patient_search->Maritalstatus->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_search->Maritalstatus->lookupOptions()) ?>;
	fpatientsearch.lists["x_Business"] = <?php echo $patient_search->Business->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_Business"].options = <?php echo JsonEncode($patient_search->Business->lookupOptions()) ?>;
	fpatientsearch.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatientsearch.lists["x_Patient_Language"] = <?php echo $patient_search->Patient_Language->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_search->Patient_Language->lookupOptions()) ?>;
	fpatientsearch.lists["x_WhereDidYouHear[]"] = <?php echo $patient_search->WhereDidYouHear->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_search->WhereDidYouHear->lookupOptions()) ?>;
	fpatientsearch.lists["x_HospID"] = <?php echo $patient_search->HospID->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_HospID"].options = <?php echo JsonEncode($patient_search->HospID->lookupOptions()) ?>;
	fpatientsearch.lists["x_AppointmentSearch"] = <?php echo $patient_search->AppointmentSearch->Lookup->toClientList($patient_search) ?>;
	fpatientsearch.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_search->AppointmentSearch->lookupOptions()) ?>;
	loadjs.done("fpatientsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_search->showPageHeader(); ?>
<?php
$patient_search->showMessage();
?>
<form name="fpatientsearch" id="fpatientsearch" class="<?php echo $patient_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_id"><?php echo $patient_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->id->cellAttributes() ?>>
			<span id="el_patient_id" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_search->id->getPlaceHolder()) ?>" value="<?php echo $patient_search->id->EditValue ?>"<?php echo $patient_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_PatientID"><?php echo $patient_search->PatientID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->PatientID->cellAttributes() ?>>
			<span id="el_patient_PatientID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->PatientID->getPlaceHolder()) ?>" value="<?php echo $patient_search->PatientID->EditValue ?>"<?php echo $patient_search->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->title->Visible) { // title ?>
	<div id="r_title" class="form-group row">
		<label for="x_title" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_title"><?php echo $patient_search->title->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_title" id="z_title" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->title->cellAttributes() ?>>
			<span id="el_patient_title" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_title" data-value-separator="<?php echo $patient_search->title->displayValueSeparatorAttribute() ?>" id="x_title" name="x_title"<?php echo $patient_search->title->editAttributes() ?>>
			<?php echo $patient_search->title->selectOptionListHtml("x_title") ?>
		</select>
</div>
<?php echo $patient_search->title->Lookup->getParamTag($patient_search, "p_x_title") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->first_name->Visible) { // first_name ?>
	<div id="r_first_name" class="form-group row">
		<label for="x_first_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_first_name"><?php echo $patient_search->first_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_first_name" id="z_first_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->first_name->cellAttributes() ?>>
			<span id="el_patient_first_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_first_name" name="x_first_name" id="x_first_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->first_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->first_name->EditValue ?>"<?php echo $patient_search->first_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->middle_name->Visible) { // middle_name ?>
	<div id="r_middle_name" class="form-group row">
		<label for="x_middle_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_middle_name"><?php echo $patient_search->middle_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_middle_name" id="z_middle_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->middle_name->cellAttributes() ?>>
			<span id="el_patient_middle_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_middle_name" name="x_middle_name" id="x_middle_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_search->middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->middle_name->EditValue ?>"<?php echo $patient_search->middle_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->last_name->Visible) { // last_name ?>
	<div id="r_last_name" class="form-group row">
		<label for="x_last_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_last_name"><?php echo $patient_search->last_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_last_name" id="z_last_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->last_name->cellAttributes() ?>>
			<span id="el_patient_last_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_last_name" name="x_last_name" id="x_last_name" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->last_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->last_name->EditValue ?>"<?php echo $patient_search->last_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label for="x_gender" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_gender"><?php echo $patient_search->gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_gender" id="z_gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->gender->cellAttributes() ?>>
			<span id="el_patient_gender" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_gender" data-value-separator="<?php echo $patient_search->gender->displayValueSeparatorAttribute() ?>" id="x_gender" name="x_gender"<?php echo $patient_search->gender->editAttributes() ?>>
			<?php echo $patient_search->gender->selectOptionListHtml("x_gender") ?>
		</select>
</div>
<?php echo $patient_search->gender->Lookup->getParamTag($patient_search, "p_x_gender") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->dob->Visible) { // dob ?>
	<div id="r_dob" class="form-group row">
		<label for="x_dob" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_dob"><?php echo $patient_search->dob->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_dob" id="z_dob" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->dob->cellAttributes() ?>>
			<span id="el_patient_dob" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_dob" data-format="7" name="x_dob" id="x_dob" placeholder="<?php echo HtmlEncode($patient_search->dob->getPlaceHolder()) ?>" value="<?php echo $patient_search->dob->EditValue ?>"<?php echo $patient_search->dob->editAttributes() ?>>
<?php if (!$patient_search->dob->ReadOnly && !$patient_search->dob->Disabled && !isset($patient_search->dob->EditAttrs["readonly"]) && !isset($patient_search->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientsearch", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Age"><?php echo $patient_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Age->cellAttributes() ?>>
			<span id="el_patient_Age" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Age->getPlaceHolder()) ?>" value="<?php echo $patient_search->Age->EditValue ?>"<?php echo $patient_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->blood_group->Visible) { // blood_group ?>
	<div id="r_blood_group" class="form-group row">
		<label for="x_blood_group" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_blood_group"><?php echo $patient_search->blood_group->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_blood_group" id="z_blood_group" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->blood_group->cellAttributes() ?>>
			<span id="el_patient_blood_group" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_blood_group" data-value-separator="<?php echo $patient_search->blood_group->displayValueSeparatorAttribute() ?>" id="x_blood_group" name="x_blood_group"<?php echo $patient_search->blood_group->editAttributes() ?>>
			<?php echo $patient_search->blood_group->selectOptionListHtml("x_blood_group") ?>
		</select>
</div>
<?php echo $patient_search->blood_group->Lookup->getParamTag($patient_search, "p_x_blood_group") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->mobile_no->Visible) { // mobile_no ?>
	<div id="r_mobile_no" class="form-group row">
		<label for="x_mobile_no" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_mobile_no"><?php echo $patient_search->mobile_no->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobile_no" id="z_mobile_no" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->mobile_no->cellAttributes() ?>>
			<span id="el_patient_mobile_no" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_search->mobile_no->EditValue ?>"<?php echo $patient_search->mobile_no->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->description->Visible) { // description ?>
	<div id="r_description" class="form-group row">
		<label for="x_description" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_description"><?php echo $patient_search->description->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_description" id="z_description" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->description->cellAttributes() ?>>
			<span id="el_patient_description" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_description" name="x_description" id="x_description" placeholder="<?php echo HtmlEncode($patient_search->description->getPlaceHolder()) ?>" value="<?php echo $patient_search->description->EditValue ?>"<?php echo $patient_search->description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_status"><?php echo $patient_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->status->cellAttributes() ?>>
			<span id="el_patient_status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_status" data-value-separator="<?php echo $patient_search->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_search->status->editAttributes() ?>>
			<?php echo $patient_search->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_search->status->Lookup->getParamTag($patient_search, "p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_createdby"><?php echo $patient_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->createdby->cellAttributes() ?>>
			<span id="el_patient_createdby" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_search->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_search->createdby->EditValue ?>"<?php echo $patient_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_createddatetime"><?php echo $patient_search->createddatetime->caption() ?></span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->createddatetime->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_createddatetime" id="z_createddatetime" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $patient_search->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_patient_createddatetime" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_search->createddatetime->EditValue ?>"<?php echo $patient_search->createddatetime->editAttributes() ?>>
<?php if (!$patient_search->createddatetime->ReadOnly && !$patient_search->createddatetime->Disabled && !isset($patient_search->createddatetime->EditAttrs["readonly"]) && !isset($patient_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_patient_createddatetime" class="ew-search-field2 d-none">
<input type="text" data-table="patient" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($patient_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_search->createddatetime->EditValue2 ?>"<?php echo $patient_search->createddatetime->editAttributes() ?>>
<?php if (!$patient_search->createddatetime->ReadOnly && !$patient_search->createddatetime->Disabled && !isset($patient_search->createddatetime->EditAttrs["readonly"]) && !isset($patient_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientsearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_modifiedby"><?php echo $patient_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->modifiedby->cellAttributes() ?>>
			<span id="el_patient_modifiedby" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_search->modifiedby->EditValue ?>"<?php echo $patient_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><?php echo $patient_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_modifieddatetime" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_search->modifieddatetime->EditValue ?>"<?php echo $patient_search->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_search->modifieddatetime->ReadOnly && !$patient_search->modifieddatetime->Disabled && !isset($patient_search->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_profilePic"><?php echo $patient_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->profilePic->cellAttributes() ?>>
			<span id="el_patient_profilePic" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_search->profilePic->EditValue ?>"<?php echo $patient_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label for="x_IdentificationMark" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><?php echo $patient_search->IdentificationMark->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IdentificationMark" id="z_IdentificationMark" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->IdentificationMark->cellAttributes() ?>>
			<span id="el_patient_IdentificationMark" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $patient_search->IdentificationMark->EditValue ?>"<?php echo $patient_search->IdentificationMark->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Religion->Visible) { // Religion ?>
	<div id="r_Religion" class="form-group row">
		<label for="x_Religion" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Religion"><?php echo $patient_search->Religion->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Religion" id="z_Religion" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Religion->cellAttributes() ?>>
			<span id="el_patient_Religion" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Religion->getPlaceHolder()) ?>" value="<?php echo $patient_search->Religion->EditValue ?>"<?php echo $patient_search->Religion->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Nationality->Visible) { // Nationality ?>
	<div id="r_Nationality" class="form-group row">
		<label for="x_Nationality" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Nationality"><?php echo $patient_search->Nationality->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Nationality" id="z_Nationality" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Nationality->cellAttributes() ?>>
			<span id="el_patient_Nationality" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_Nationality" name="x_Nationality" id="x_Nationality" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Nationality->getPlaceHolder()) ?>" value="<?php echo $patient_search->Nationality->EditValue ?>"<?php echo $patient_search->Nationality->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label for="x_ReferedByDr" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><?php echo $patient_search->ReferedByDr->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ReferedByDr->cellAttributes() ?>>
			<span id="el_patient_ReferedByDr" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" placeholder="<?php echo HtmlEncode($patient_search->ReferedByDr->getPlaceHolder()) ?>" value="<?php echo $patient_search->ReferedByDr->EditValue ?>"<?php echo $patient_search->ReferedByDr->editAttributes() ?>>
<?php echo $patient_search->ReferedByDr->Lookup->getParamTag($patient_search, "p_x_ReferedByDr") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label for="x_ReferClinicname" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><?php echo $patient_search->ReferClinicname->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ReferClinicname->cellAttributes() ?>>
			<span id="el_patient_ReferClinicname" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $patient_search->ReferClinicname->EditValue ?>"<?php echo $patient_search->ReferClinicname->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label for="x_ReferCity" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ReferCity"><?php echo $patient_search->ReferCity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ReferCity->cellAttributes() ?>>
			<span id="el_patient_ReferCity" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->ReferCity->getPlaceHolder()) ?>" value="<?php echo $patient_search->ReferCity->EditValue ?>"<?php echo $patient_search->ReferCity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label for="x_ReferMobileNo" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><?php echo $patient_search->ReferMobileNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ReferMobileNo->cellAttributes() ?>>
			<span id="el_patient_ReferMobileNo" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $patient_search->ReferMobileNo->EditValue ?>"<?php echo $patient_search->ReferMobileNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label for="x_ReferA4TreatingConsultant" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><?php echo $patient_search->ReferA4TreatingConsultant->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ReferA4TreatingConsultant->cellAttributes() ?>>
			<span id="el_patient_ReferA4TreatingConsultant" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" placeholder="<?php echo HtmlEncode($patient_search->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $patient_search->ReferA4TreatingConsultant->EditValue ?>"<?php echo $patient_search->ReferA4TreatingConsultant->editAttributes() ?>>
<?php echo $patient_search->ReferA4TreatingConsultant->Lookup->getParamTag($patient_search, "p_x_ReferA4TreatingConsultant") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label for="x_PurposreReferredfor" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><?php echo $patient_search->PurposreReferredfor->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->PurposreReferredfor->cellAttributes() ?>>
			<span id="el_patient_PurposreReferredfor" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $patient_search->PurposreReferredfor->EditValue ?>"<?php echo $patient_search->PurposreReferredfor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_title->Visible) { // spouse_title ?>
	<div id="r_spouse_title" class="form-group row">
		<label for="x_spouse_title" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_title"><?php echo $patient_search->spouse_title->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_title" id="z_spouse_title" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_title->cellAttributes() ?>>
			<span id="el_patient_spouse_title" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_title" data-value-separator="<?php echo $patient_search->spouse_title->displayValueSeparatorAttribute() ?>" id="x_spouse_title" name="x_spouse_title"<?php echo $patient_search->spouse_title->editAttributes() ?>>
			<?php echo $patient_search->spouse_title->selectOptionListHtml("x_spouse_title") ?>
		</select>
</div>
<?php echo $patient_search->spouse_title->Lookup->getParamTag($patient_search, "p_x_spouse_title") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_first_name->Visible) { // spouse_first_name ?>
	<div id="r_spouse_first_name" class="form-group row">
		<label for="x_spouse_first_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><?php echo $patient_search->spouse_first_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_first_name" id="z_spouse_first_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_first_name->cellAttributes() ?>>
			<span id="el_patient_spouse_first_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_first_name" name="x_spouse_first_name" id="x_spouse_first_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_first_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_first_name->EditValue ?>"<?php echo $patient_search->spouse_first_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<div id="r_spouse_middle_name" class="form-group row">
		<label for="x_spouse_middle_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><?php echo $patient_search->spouse_middle_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_middle_name" id="z_spouse_middle_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_middle_name->cellAttributes() ?>>
			<span id="el_patient_spouse_middle_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_middle_name" name="x_spouse_middle_name" id="x_spouse_middle_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_middle_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_middle_name->EditValue ?>"<?php echo $patient_search->spouse_middle_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_last_name->Visible) { // spouse_last_name ?>
	<div id="r_spouse_last_name" class="form-group row">
		<label for="x_spouse_last_name" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><?php echo $patient_search->spouse_last_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_last_name" id="z_spouse_last_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_last_name->cellAttributes() ?>>
			<span id="el_patient_spouse_last_name" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_last_name" name="x_spouse_last_name" id="x_spouse_last_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_last_name->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_last_name->EditValue ?>"<?php echo $patient_search->spouse_last_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_gender->Visible) { // spouse_gender ?>
	<div id="r_spouse_gender" class="form-group row">
		<label for="x_spouse_gender" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_gender"><?php echo $patient_search->spouse_gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_gender" id="z_spouse_gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_gender->cellAttributes() ?>>
			<span id="el_patient_spouse_gender" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_gender" data-value-separator="<?php echo $patient_search->spouse_gender->displayValueSeparatorAttribute() ?>" id="x_spouse_gender" name="x_spouse_gender"<?php echo $patient_search->spouse_gender->editAttributes() ?>>
			<?php echo $patient_search->spouse_gender->selectOptionListHtml("x_spouse_gender") ?>
		</select>
</div>
<?php echo $patient_search->spouse_gender->Lookup->getParamTag($patient_search, "p_x_spouse_gender") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_dob->Visible) { // spouse_dob ?>
	<div id="r_spouse_dob" class="form-group row">
		<label for="x_spouse_dob" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_dob"><?php echo $patient_search->spouse_dob->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_dob" id="z_spouse_dob" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_dob->cellAttributes() ?>>
			<span id="el_patient_spouse_dob" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_dob" data-format="7" name="x_spouse_dob" id="x_spouse_dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_dob->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_dob->EditValue ?>"<?php echo $patient_search->spouse_dob->editAttributes() ?>>
<?php if (!$patient_search->spouse_dob->ReadOnly && !$patient_search->spouse_dob->Disabled && !isset($patient_search->spouse_dob->EditAttrs["readonly"]) && !isset($patient_search->spouse_dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatientsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatientsearch", "x_spouse_dob", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_Age->Visible) { // spouse_Age ?>
	<div id="r_spouse_Age" class="form-group row">
		<label for="x_spouse_Age" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_Age"><?php echo $patient_search->spouse_Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_Age" id="z_spouse_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_Age->cellAttributes() ?>>
			<span id="el_patient_spouse_Age" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_Age" name="x_spouse_Age" id="x_spouse_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_Age->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_Age->EditValue ?>"<?php echo $patient_search->spouse_Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<div id="r_spouse_blood_group" class="form-group row">
		<label for="x_spouse_blood_group" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><?php echo $patient_search->spouse_blood_group->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_blood_group" id="z_spouse_blood_group" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_blood_group->cellAttributes() ?>>
			<span id="el_patient_spouse_blood_group" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_spouse_blood_group" data-value-separator="<?php echo $patient_search->spouse_blood_group->displayValueSeparatorAttribute() ?>" id="x_spouse_blood_group" name="x_spouse_blood_group"<?php echo $patient_search->spouse_blood_group->editAttributes() ?>>
			<?php echo $patient_search->spouse_blood_group->selectOptionListHtml("x_spouse_blood_group") ?>
		</select>
</div>
<?php echo $patient_search->spouse_blood_group->Lookup->getParamTag($patient_search, "p_x_spouse_blood_group") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<div id="r_spouse_mobile_no" class="form-group row">
		<label for="x_spouse_mobile_no" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><?php echo $patient_search->spouse_mobile_no->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_mobile_no" id="z_spouse_mobile_no" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_mobile_no->cellAttributes() ?>>
			<span id="el_patient_spouse_mobile_no" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_mobile_no" name="x_spouse_mobile_no" id="x_spouse_mobile_no" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_mobile_no->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_mobile_no->EditValue ?>"<?php echo $patient_search->spouse_mobile_no->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Maritalstatus->Visible) { // Maritalstatus ?>
	<div id="r_Maritalstatus" class="form-group row">
		<label for="x_Maritalstatus" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><?php echo $patient_search->Maritalstatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Maritalstatus" id="z_Maritalstatus" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Maritalstatus->cellAttributes() ?>>
			<span id="el_patient_Maritalstatus" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Maritalstatus" data-value-separator="<?php echo $patient_search->Maritalstatus->displayValueSeparatorAttribute() ?>" id="x_Maritalstatus" name="x_Maritalstatus"<?php echo $patient_search->Maritalstatus->editAttributes() ?>>
			<?php echo $patient_search->Maritalstatus->selectOptionListHtml("x_Maritalstatus") ?>
		</select>
</div>
<?php echo $patient_search->Maritalstatus->Lookup->getParamTag($patient_search, "p_x_Maritalstatus") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Business->Visible) { // Business ?>
	<div id="r_Business" class="form-group row">
		<label class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Business"><?php echo $patient_search->Business->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Business" id="z_Business" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Business->cellAttributes() ?>>
			<span id="el_patient_Business" class="ew-search-field">
<?php
$onchange = $patient_search->Business->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_search->Business->EditAttrs["onchange"] = "";
?>
<span id="as_x_Business">
	<input type="text" class="form-control" name="sv_x_Business" id="sv_x_Business" value="<?php echo RemoveHtml($patient_search->Business->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Business->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_search->Business->getPlaceHolder()) ?>"<?php echo $patient_search->Business->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient" data-field="x_Business" data-value-separator="<?php echo $patient_search->Business->displayValueSeparatorAttribute() ?>" name="x_Business" id="x_Business" value="<?php echo HtmlEncode($patient_search->Business->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatientsearch"], function() {
	fpatientsearch.createAutoSuggest({"id":"x_Business","forceSelect":false});
});
</script>
<?php echo $patient_search->Business->Lookup->getParamTag($patient_search, "p_x_Business") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Patient_Language->Visible) { // Patient_Language ?>
	<div id="r_Patient_Language" class="form-group row">
		<label for="x_Patient_Language" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Patient_Language"><?php echo $patient_search->Patient_Language->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Patient_Language" id="z_Patient_Language" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Patient_Language->cellAttributes() ?>>
			<span id="el_patient_Patient_Language" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_Patient_Language" data-value-separator="<?php echo $patient_search->Patient_Language->displayValueSeparatorAttribute() ?>" id="x_Patient_Language" name="x_Patient_Language"<?php echo $patient_search->Patient_Language->editAttributes() ?>>
			<?php echo $patient_search->Patient_Language->selectOptionListHtml("x_Patient_Language") ?>
		</select>
</div>
<?php echo $patient_search->Patient_Language->Lookup->getParamTag($patient_search, "p_x_Patient_Language") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Passport->Visible) { // Passport ?>
	<div id="r_Passport" class="form-group row">
		<label for="x_Passport" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Passport"><?php echo $patient_search->Passport->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Passport" id="z_Passport" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Passport->cellAttributes() ?>>
			<span id="el_patient_Passport" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_Passport" name="x_Passport" id="x_Passport" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Passport->getPlaceHolder()) ?>" value="<?php echo $patient_search->Passport->EditValue ?>"<?php echo $patient_search->Passport->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->VisaNo->Visible) { // VisaNo ?>
	<div id="r_VisaNo" class="form-group row">
		<label for="x_VisaNo" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_VisaNo"><?php echo $patient_search->VisaNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_VisaNo" id="z_VisaNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->VisaNo->cellAttributes() ?>>
			<span id="el_patient_VisaNo" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_VisaNo" name="x_VisaNo" id="x_VisaNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->VisaNo->getPlaceHolder()) ?>" value="<?php echo $patient_search->VisaNo->EditValue ?>"<?php echo $patient_search->VisaNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<div id="r_ValidityOfVisa" class="form-group row">
		<label for="x_ValidityOfVisa" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><?php echo $patient_search->ValidityOfVisa->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ValidityOfVisa" id="z_ValidityOfVisa" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->ValidityOfVisa->cellAttributes() ?>>
			<span id="el_patient_ValidityOfVisa" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_ValidityOfVisa" name="x_ValidityOfVisa" id="x_ValidityOfVisa" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->ValidityOfVisa->getPlaceHolder()) ?>" value="<?php echo $patient_search->ValidityOfVisa->EditValue ?>"<?php echo $patient_search->ValidityOfVisa->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<div id="r_WhereDidYouHear" class="form-group row">
		<label class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><?php echo $patient_search->WhereDidYouHear->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhereDidYouHear" id="z_WhereDidYouHear" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->WhereDidYouHear->cellAttributes() ?>>
			<span id="el_patient_WhereDidYouHear" class="ew-search-field">
<div id="tp_x_WhereDidYouHear" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $patient_search->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x_WhereDidYouHear[]" id="x_WhereDidYouHear[]" value="{value}"<?php echo $patient_search->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_search->WhereDidYouHear->checkBoxListHtml(FALSE, "x_WhereDidYouHear[]") ?>
</div></div>
<?php echo $patient_search->WhereDidYouHear->Lookup->getParamTag($patient_search, "p_x_WhereDidYouHear") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_HospID"><?php echo $patient_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->HospID->cellAttributes() ?>>
			<span id="el_patient_HospID" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient" data-field="x_HospID" data-value-separator="<?php echo $patient_search->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $patient_search->HospID->editAttributes() ?>>
			<?php echo $patient_search->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $patient_search->HospID->Lookup->getParamTag($patient_search, "p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->street->Visible) { // street ?>
	<div id="r_street" class="form-group row">
		<label for="x_street" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_street"><?php echo $patient_search->street->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_street" id="z_street" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->street->cellAttributes() ?>>
			<span id="el_patient_street" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($patient_search->street->getPlaceHolder()) ?>" value="<?php echo $patient_search->street->EditValue ?>"<?php echo $patient_search->street->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->town->Visible) { // town ?>
	<div id="r_town" class="form-group row">
		<label for="x_town" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_town"><?php echo $patient_search->town->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_town" id="z_town" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->town->cellAttributes() ?>>
			<span id="el_patient_town" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_town" name="x_town" id="x_town" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->town->getPlaceHolder()) ?>" value="<?php echo $patient_search->town->EditValue ?>"<?php echo $patient_search->town->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->province->Visible) { // province ?>
	<div id="r_province" class="form-group row">
		<label for="x_province" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_province"><?php echo $patient_search->province->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_province" id="z_province" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->province->cellAttributes() ?>>
			<span id="el_patient_province" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->province->getPlaceHolder()) ?>" value="<?php echo $patient_search->province->EditValue ?>"<?php echo $patient_search->province->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->country->Visible) { // country ?>
	<div id="r_country" class="form-group row">
		<label for="x_country" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_country"><?php echo $patient_search->country->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_country" id="z_country" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->country->cellAttributes() ?>>
			<span id="el_patient_country" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_country" name="x_country" id="x_country" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->country->getPlaceHolder()) ?>" value="<?php echo $patient_search->country->EditValue ?>"<?php echo $patient_search->country->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->postal_code->Visible) { // postal_code ?>
	<div id="r_postal_code" class="form-group row">
		<label for="x_postal_code" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_postal_code"><?php echo $patient_search->postal_code->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_postal_code" id="z_postal_code" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->postal_code->cellAttributes() ?>>
			<span id="el_patient_postal_code" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->postal_code->getPlaceHolder()) ?>" value="<?php echo $patient_search->postal_code->EditValue ?>"<?php echo $patient_search->postal_code->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->PEmail->Visible) { // PEmail ?>
	<div id="r_PEmail" class="form-group row">
		<label for="x_PEmail" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_PEmail"><?php echo $patient_search->PEmail->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PEmail" id="z_PEmail" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->PEmail->cellAttributes() ?>>
			<span id="el_patient_PEmail" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PEmail" name="x_PEmail" id="x_PEmail" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->PEmail->getPlaceHolder()) ?>" value="<?php echo $patient_search->PEmail->EditValue ?>"<?php echo $patient_search->PEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<div id="r_PEmergencyContact" class="form-group row">
		<label for="x_PEmergencyContact" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><?php echo $patient_search->PEmergencyContact->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PEmergencyContact" id="z_PEmergencyContact" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->PEmergencyContact->cellAttributes() ?>>
			<span id="el_patient_PEmergencyContact" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_PEmergencyContact" name="x_PEmergencyContact" id="x_PEmergencyContact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($patient_search->PEmergencyContact->getPlaceHolder()) ?>" value="<?php echo $patient_search->PEmergencyContact->EditValue ?>"<?php echo $patient_search->PEmergencyContact->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->occupation->Visible) { // occupation ?>
	<div id="r_occupation" class="form-group row">
		<label for="x_occupation" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_occupation"><?php echo $patient_search->occupation->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_occupation" id="z_occupation" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->occupation->cellAttributes() ?>>
			<span id="el_patient_occupation" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_occupation" name="x_occupation" id="x_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->occupation->getPlaceHolder()) ?>" value="<?php echo $patient_search->occupation->EditValue ?>"<?php echo $patient_search->occupation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->spouse_occupation->Visible) { // spouse_occupation ?>
	<div id="r_spouse_occupation" class="form-group row">
		<label for="x_spouse_occupation" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><?php echo $patient_search->spouse_occupation->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_spouse_occupation" id="z_spouse_occupation" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->spouse_occupation->cellAttributes() ?>>
			<span id="el_patient_spouse_occupation" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_spouse_occupation" name="x_spouse_occupation" id="x_spouse_occupation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->spouse_occupation->getPlaceHolder()) ?>" value="<?php echo $patient_search->spouse_occupation->EditValue ?>"<?php echo $patient_search->spouse_occupation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->WhatsApp->Visible) { // WhatsApp ?>
	<div id="r_WhatsApp" class="form-group row">
		<label for="x_WhatsApp" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_WhatsApp"><?php echo $patient_search->WhatsApp->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WhatsApp" id="z_WhatsApp" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->WhatsApp->cellAttributes() ?>>
			<span id="el_patient_WhatsApp" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_WhatsApp" name="x_WhatsApp" id="x_WhatsApp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->WhatsApp->getPlaceHolder()) ?>" value="<?php echo $patient_search->WhatsApp->EditValue ?>"<?php echo $patient_search->WhatsApp->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->CouppleID->Visible) { // CouppleID ?>
	<div id="r_CouppleID" class="form-group row">
		<label for="x_CouppleID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_CouppleID"><?php echo $patient_search->CouppleID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CouppleID" id="z_CouppleID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->CouppleID->cellAttributes() ?>>
			<span id="el_patient_CouppleID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_CouppleID" name="x_CouppleID" id="x_CouppleID" size="30" placeholder="<?php echo HtmlEncode($patient_search->CouppleID->getPlaceHolder()) ?>" value="<?php echo $patient_search->CouppleID->EditValue ?>"<?php echo $patient_search->CouppleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->MaleID->Visible) { // MaleID ?>
	<div id="r_MaleID" class="form-group row">
		<label for="x_MaleID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_MaleID"><?php echo $patient_search->MaleID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_MaleID" id="z_MaleID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->MaleID->cellAttributes() ?>>
			<span id="el_patient_MaleID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_MaleID" name="x_MaleID" id="x_MaleID" size="30" placeholder="<?php echo HtmlEncode($patient_search->MaleID->getPlaceHolder()) ?>" value="<?php echo $patient_search->MaleID->EditValue ?>"<?php echo $patient_search->MaleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->FemaleID->Visible) { // FemaleID ?>
	<div id="r_FemaleID" class="form-group row">
		<label for="x_FemaleID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_FemaleID"><?php echo $patient_search->FemaleID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_FemaleID" id="z_FemaleID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->FemaleID->cellAttributes() ?>>
			<span id="el_patient_FemaleID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_FemaleID" name="x_FemaleID" id="x_FemaleID" size="30" placeholder="<?php echo HtmlEncode($patient_search->FemaleID->getPlaceHolder()) ?>" value="<?php echo $patient_search->FemaleID->EditValue ?>"<?php echo $patient_search->FemaleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->GroupID->Visible) { // GroupID ?>
	<div id="r_GroupID" class="form-group row">
		<label for="x_GroupID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_GroupID"><?php echo $patient_search->GroupID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_GroupID" id="z_GroupID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->GroupID->cellAttributes() ?>>
			<span id="el_patient_GroupID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?php echo HtmlEncode($patient_search->GroupID->getPlaceHolder()) ?>" value="<?php echo $patient_search->GroupID->EditValue ?>"<?php echo $patient_search->GroupID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->Relationship->Visible) { // Relationship ?>
	<div id="r_Relationship" class="form-group row">
		<label for="x_Relationship" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_Relationship"><?php echo $patient_search->Relationship->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Relationship" id="z_Relationship" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->Relationship->cellAttributes() ?>>
			<span id="el_patient_Relationship" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_Relationship" name="x_Relationship" id="x_Relationship" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->Relationship->getPlaceHolder()) ?>" value="<?php echo $patient_search->Relationship->EditValue ?>"<?php echo $patient_search->Relationship->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<div id="r_AppointmentSearch" class="form-group row">
		<label for="x_AppointmentSearch" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_AppointmentSearch"><?php echo $patient_search->AppointmentSearch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AppointmentSearch" id="z_AppointmentSearch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->AppointmentSearch->cellAttributes() ?>>
			<span id="el_patient_AppointmentSearch" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AppointmentSearch"><?php echo EmptyValue(strval($patient_search->AppointmentSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_search->AppointmentSearch->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_search->AppointmentSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_search->AppointmentSearch->ReadOnly || $patient_search->AppointmentSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_AppointmentSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_search->AppointmentSearch->Lookup->getParamTag($patient_search, "p_x_AppointmentSearch") ?>
<input type="hidden" data-table="patient" data-field="x_AppointmentSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_search->AppointmentSearch->displayValueSeparatorAttribute() ?>" name="x_AppointmentSearch" id="x_AppointmentSearch" value="<?php echo $patient_search->AppointmentSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_search->AppointmentSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_search->FacebookID->Visible) { // FacebookID ?>
	<div id="r_FacebookID" class="form-group row">
		<label for="x_FacebookID" class="<?php echo $patient_search->LeftColumnClass ?>"><span id="elh_patient_FacebookID"><?php echo $patient_search->FacebookID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FacebookID" id="z_FacebookID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_search->RightColumnClass ?>"><div <?php echo $patient_search->FacebookID->cellAttributes() ?>>
			<span id="el_patient_FacebookID" class="ew-search-field">
<input type="text" data-table="patient" data-field="x_FacebookID" name="x_FacebookID" id="x_FacebookID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_search->FacebookID->getPlaceHolder()) ?>" value="<?php echo $patient_search->FacebookID->EditValue ?>"<?php echo $patient_search->FacebookID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_search->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_search->terminate();
?>