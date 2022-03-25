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
$patient_vitals_search = new patient_vitals_search();

// Run the page
$patient_vitals_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_vitalssearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($patient_vitals_search->IsModal) { ?>
	fpatient_vitalssearch = currentAdvancedSearchForm = new ew.Form("fpatient_vitalssearch", "search");
	<?php } else { ?>
	fpatient_vitalssearch = currentForm = new ew.Form("fpatient_vitalssearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpatient_vitalssearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_vitals_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_vitals_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_vitals_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Reception");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_vitals_search->Reception->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_vitals_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_vitalssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_vitalssearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_vitalssearch.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_search->AnticoagulantifAny->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_search->AnticoagulantifAny->lookupOptions()) ?>;
	fpatient_vitalssearch.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_vitalssearch.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_search->GenericAllergies->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_search->GenericAllergies->lookupOptions()) ?>;
	fpatient_vitalssearch.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_search->GroupAllergies->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_search->GroupAllergies->lookupOptions()) ?>;
	fpatient_vitalssearch.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_search->clinicaldetails->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_search->clinicaldetails->lookupOptions()) ?>;
	fpatient_vitalssearch.lists["x_status"] = <?php echo $patient_vitals_search->status->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_search->status->lookupOptions()) ?>;
	fpatient_vitalssearch.lists["x_PatientSearch"] = <?php echo $patient_vitals_search->PatientSearch->Lookup->toClientList($patient_vitals_search) ?>;
	fpatient_vitalssearch.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_vitals_search->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_vitalssearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_vitals_search->showPageHeader(); ?>
<?php
$patient_vitals_search->showMessage();
?>
<form name="fpatient_vitalssearch" id="fpatient_vitalssearch" class="<?php echo $patient_vitals_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_vitals_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_vitals_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_id"><?php echo $patient_vitals_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->id->cellAttributes() ?>>
			<span id="el_patient_vitals_id" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_vitals_search->id->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->id->EditValue ?>"<?php echo $patient_vitals_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><?php echo $patient_vitals_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->mrnno->cellAttributes() ?>>
			<span id="el_patient_vitals_mrnno" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->mrnno->EditValue ?>"<?php echo $patient_vitals_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><?php echo $patient_vitals_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PatientName->cellAttributes() ?>>
			<span id="el_patient_vitals_PatientName" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PatientName->EditValue ?>"<?php echo $patient_vitals_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><?php echo $patient_vitals_search->PatID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PatID->cellAttributes() ?>>
			<span id="el_patient_vitals_PatID" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PatID->EditValue ?>"<?php echo $patient_vitals_search->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><?php echo $patient_vitals_search->MobileNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->MobileNumber->cellAttributes() ?>>
			<span id="el_patient_vitals_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->MobileNumber->EditValue ?>"<?php echo $patient_vitals_search->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><?php echo $patient_vitals_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->profilePic->cellAttributes() ?>>
			<span id="el_patient_vitals_profilePic" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($patient_vitals_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->profilePic->EditValue ?>"<?php echo $patient_vitals_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->HT->Visible) { // HT ?>
	<div id="r_HT" class="form-group row">
		<label for="x_HT" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_HT"><?php echo $patient_vitals_search->HT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HT" id="z_HT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->HT->cellAttributes() ?>>
			<span id="el_patient_vitals_HT" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x_HT" id="x_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_search->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->HT->EditValue ?>"<?php echo $patient_vitals_search->HT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->WT->Visible) { // WT ?>
	<div id="r_WT" class="form-group row">
		<label for="x_WT" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_WT"><?php echo $patient_vitals_search->WT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WT" id="z_WT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->WT->cellAttributes() ?>>
			<span id="el_patient_vitals_WT" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x_WT" id="x_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_search->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->WT->EditValue ?>"<?php echo $patient_vitals_search->WT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->SurfaceArea->Visible) { // SurfaceArea ?>
	<div id="r_SurfaceArea" class="form-group row">
		<label for="x_SurfaceArea" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><?php echo $patient_vitals_search->SurfaceArea->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SurfaceArea" id="z_SurfaceArea" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->SurfaceArea->cellAttributes() ?>>
			<span id="el_patient_vitals_SurfaceArea" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x_SurfaceArea" id="x_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->SurfaceArea->EditValue ?>"<?php echo $patient_vitals_search->SurfaceArea->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<div id="r_BodyMassIndex" class="form-group row">
		<label for="x_BodyMassIndex" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><?php echo $patient_vitals_search->BodyMassIndex->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BodyMassIndex" id="z_BodyMassIndex" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->BodyMassIndex->cellAttributes() ?>>
			<span id="el_patient_vitals_BodyMassIndex" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x_BodyMassIndex" id="x_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals_search->BodyMassIndex->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->ClinicalFindings->Visible) { // ClinicalFindings ?>
	<div id="r_ClinicalFindings" class="form-group row">
		<label for="x_ClinicalFindings" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><?php echo $patient_vitals_search->ClinicalFindings->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClinicalFindings" id="z_ClinicalFindings" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->ClinicalFindings->cellAttributes() ?>>
			<span id="el_patient_vitals_ClinicalFindings" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_ClinicalFindings" name="x_ClinicalFindings" id="x_ClinicalFindings" size="35" placeholder="<?php echo HtmlEncode($patient_vitals_search->ClinicalFindings->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->ClinicalFindings->EditValue ?>"<?php echo $patient_vitals_search->ClinicalFindings->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
	<div id="r_ClinicalDiagnosis" class="form-group row">
		<label for="x_ClinicalDiagnosis" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><?php echo $patient_vitals_search->ClinicalDiagnosis->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClinicalDiagnosis" id="z_ClinicalDiagnosis" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->ClinicalDiagnosis->cellAttributes() ?>>
			<span id="el_patient_vitals_ClinicalDiagnosis" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_ClinicalDiagnosis" name="x_ClinicalDiagnosis" id="x_ClinicalDiagnosis" size="35" placeholder="<?php echo HtmlEncode($patient_vitals_search->ClinicalDiagnosis->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->ClinicalDiagnosis->EditValue ?>"<?php echo $patient_vitals_search->ClinicalDiagnosis->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<div id="r_AnticoagulantifAny" class="form-group row">
		<label class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><?php echo $patient_vitals_search->AnticoagulantifAny->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnticoagulantifAny" id="z_AnticoagulantifAny" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->AnticoagulantifAny->cellAttributes() ?>>
			<span id="el_patient_vitals_AnticoagulantifAny" class="ew-search-field">
<?php
$onchange = $patient_vitals_search->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_vitals_search->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x_AnticoagulantifAny">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_AnticoagulantifAny" id="sv_x_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals_search->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals_search->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals_search->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_search->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_search->AnticoagulantifAny->ReadOnly || $patient_vitals_search->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_search->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x_AnticoagulantifAny" id="x_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_search->AnticoagulantifAny->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_vitalssearch"], function() {
	fpatient_vitalssearch.createAutoSuggest({"id":"x_AnticoagulantifAny","forceSelect":true});
});
</script>
<?php echo $patient_vitals_search->AnticoagulantifAny->Lookup->getParamTag($patient_vitals_search, "p_x_AnticoagulantifAny") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->FoodAllergies->Visible) { // FoodAllergies ?>
	<div id="r_FoodAllergies" class="form-group row">
		<label for="x_FoodAllergies" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><?php echo $patient_vitals_search->FoodAllergies->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FoodAllergies" id="z_FoodAllergies" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->FoodAllergies->cellAttributes() ?>>
			<span id="el_patient_vitals_FoodAllergies" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x_FoodAllergies" id="x_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->FoodAllergies->EditValue ?>"<?php echo $patient_vitals_search->FoodAllergies->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->GenericAllergies->Visible) { // GenericAllergies ?>
	<div id="r_GenericAllergies" class="form-group row">
		<label for="x_GenericAllergies" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><?php echo $patient_vitals_search->GenericAllergies->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GenericAllergies" id="z_GenericAllergies" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->GenericAllergies->cellAttributes() ?>>
			<span id="el_patient_vitals_GenericAllergies" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GenericAllergies"><?php echo EmptyValue(strval($patient_vitals_search->GenericAllergies->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_search->GenericAllergies->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_search->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_search->GenericAllergies->ReadOnly || $patient_vitals_search->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_search->GenericAllergies->Lookup->getParamTag($patient_vitals_search, "p_x_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_search->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x_GenericAllergies[]" id="x_GenericAllergies[]" value="<?php echo $patient_vitals_search->GenericAllergies->AdvancedSearch->SearchValue ?>"<?php echo $patient_vitals_search->GenericAllergies->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->GroupAllergies->Visible) { // GroupAllergies ?>
	<div id="r_GroupAllergies" class="form-group row">
		<label for="x_GroupAllergies" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><?php echo $patient_vitals_search->GroupAllergies->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GroupAllergies" id="z_GroupAllergies" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->GroupAllergies->cellAttributes() ?>>
			<span id="el_patient_vitals_GroupAllergies" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_GroupAllergies" name="x_GroupAllergies" id="x_GroupAllergies" size="30" placeholder="<?php echo HtmlEncode($patient_vitals_search->GroupAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->GroupAllergies->EditValue ?>"<?php echo $patient_vitals_search->GroupAllergies->editAttributes() ?>>
<?php echo $patient_vitals_search->GroupAllergies->Lookup->getParamTag($patient_vitals_search, "p_x_GroupAllergies") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->Temp->Visible) { // Temp ?>
	<div id="r_Temp" class="form-group row">
		<label for="x_Temp" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><?php echo $patient_vitals_search->Temp->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Temp" id="z_Temp" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->Temp->cellAttributes() ?>>
			<span id="el_patient_vitals_Temp" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->Temp->EditValue ?>"<?php echo $patient_vitals_search->Temp->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label for="x_Pulse" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><?php echo $patient_vitals_search->Pulse->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pulse" id="z_Pulse" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->Pulse->cellAttributes() ?>>
			<span id="el_patient_vitals_Pulse" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->Pulse->EditValue ?>"<?php echo $patient_vitals_search->Pulse->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label for="x_BP" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_BP"><?php echo $patient_vitals_search->BP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BP" id="z_BP" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->BP->cellAttributes() ?>>
			<span id="el_patient_vitals_BP" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->BP->EditValue ?>"<?php echo $patient_vitals_search->BP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PR->Visible) { // PR ?>
	<div id="r_PR" class="form-group row">
		<label for="x_PR" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PR"><?php echo $patient_vitals_search->PR->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PR" id="z_PR" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PR->cellAttributes() ?>>
			<span id="el_patient_vitals_PR" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PR->EditValue ?>"<?php echo $patient_vitals_search->PR->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->CNS->Visible) { // CNS ?>
	<div id="r_CNS" class="form-group row">
		<label for="x_CNS" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><?php echo $patient_vitals_search->CNS->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CNS" id="z_CNS" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->CNS->cellAttributes() ?>>
			<span id="el_patient_vitals_CNS" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->CNS->EditValue ?>"<?php echo $patient_vitals_search->CNS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->RSA->Visible) { // RSA ?>
	<div id="r_RSA" class="form-group row">
		<label for="x_RSA" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><?php echo $patient_vitals_search->RSA->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RSA" id="z_RSA" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->RSA->cellAttributes() ?>>
			<span id="el_patient_vitals_RSA" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x_RSA" id="x_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->RSA->EditValue ?>"<?php echo $patient_vitals_search->RSA->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label for="x_CVS" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><?php echo $patient_vitals_search->CVS->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CVS" id="z_CVS" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->CVS->cellAttributes() ?>>
			<span id="el_patient_vitals_CVS" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->CVS->EditValue ?>"<?php echo $patient_vitals_search->CVS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label for="x_PA" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PA"><?php echo $patient_vitals_search->PA->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PA" id="z_PA" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PA->cellAttributes() ?>>
			<span id="el_patient_vitals_PA" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PA->EditValue ?>"<?php echo $patient_vitals_search->PA->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PS->Visible) { // PS ?>
	<div id="r_PS" class="form-group row">
		<label for="x_PS" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PS"><?php echo $patient_vitals_search->PS->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PS" id="z_PS" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PS->cellAttributes() ?>>
			<span id="el_patient_vitals_PS" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x_PS" id="x_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PS->EditValue ?>"<?php echo $patient_vitals_search->PS->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PV->Visible) { // PV ?>
	<div id="r_PV" class="form-group row">
		<label for="x_PV" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PV"><?php echo $patient_vitals_search->PV->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PV" id="z_PV" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PV->cellAttributes() ?>>
			<span id="el_patient_vitals_PV" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x_PV" id="x_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PV->EditValue ?>"<?php echo $patient_vitals_search->PV->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->clinicaldetails->Visible) { // clinicaldetails ?>
	<div id="r_clinicaldetails" class="form-group row">
		<label class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><?php echo $patient_vitals_search->clinicaldetails->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_clinicaldetails" id="z_clinicaldetails" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->clinicaldetails->cellAttributes() ?>>
			<span id="el_patient_vitals_clinicaldetails" class="ew-search-field">
<div id="tp_x_clinicaldetails" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals_search->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x_clinicaldetails[]" id="x_clinicaldetails[]" value="{value}"<?php echo $patient_vitals_search->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals_search->clinicaldetails->checkBoxListHtml(FALSE, "x_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals_search->clinicaldetails->Lookup->getParamTag($patient_vitals_search, "p_x_clinicaldetails") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_status"><?php echo $patient_vitals_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->status->cellAttributes() ?>>
			<span id="el_patient_vitals_status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals_search->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_vitals_search->status->editAttributes() ?>>
			<?php echo $patient_vitals_search->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_vitals_search->status->Lookup->getParamTag($patient_vitals_search, "p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><?php echo $patient_vitals_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->createdby->cellAttributes() ?>>
			<span id="el_patient_vitals_createdby" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->createdby->EditValue ?>"<?php echo $patient_vitals_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><?php echo $patient_vitals_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->createddatetime->cellAttributes() ?>>
			<span id="el_patient_vitals_createddatetime" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_vitals_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->createddatetime->EditValue ?>"<?php echo $patient_vitals_search->createddatetime->editAttributes() ?>>
<?php if (!$patient_vitals_search->createddatetime->ReadOnly && !$patient_vitals_search->createddatetime->Disabled && !isset($patient_vitals_search->createddatetime->EditAttrs["readonly"]) && !isset($patient_vitals_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_vitalssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><?php echo $patient_vitals_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->modifiedby->cellAttributes() ?>>
			<span id="el_patient_vitals_modifiedby" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->modifiedby->EditValue ?>"<?php echo $patient_vitals_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><?php echo $patient_vitals_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_vitals_modifieddatetime" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_vitals_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->modifieddatetime->EditValue ?>"<?php echo $patient_vitals_search->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_vitals_search->modifieddatetime->ReadOnly && !$patient_vitals_search->modifieddatetime->Disabled && !isset($patient_vitals_search->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_vitals_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_vitalssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_vitalssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_Age"><?php echo $patient_vitals_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->Age->cellAttributes() ?>>
			<span id="el_patient_vitals_Age" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->Age->EditValue ?>"<?php echo $patient_vitals_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><?php echo $patient_vitals_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->Gender->cellAttributes() ?>>
			<span id="el_patient_vitals_Gender" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->Gender->EditValue ?>"<?php echo $patient_vitals_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label for="x_PatientSearch" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientSearch"><?php echo $patient_vitals_search->PatientSearch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PatientSearch->cellAttributes() ?>>
			<span id="el_patient_vitals_PatientSearch" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_vitals_search->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_search->PatientSearch->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_search->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_search->PatientSearch->ReadOnly || $patient_vitals_search->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_search->PatientSearch->Lookup->getParamTag($patient_vitals_search, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_search->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_vitals_search->PatientSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_vitals_search->PatientSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><?php echo $patient_vitals_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->PatientId->cellAttributes() ?>>
			<span id="el_patient_vitals_PatientId" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->PatientId->EditValue ?>"<?php echo $patient_vitals_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><?php echo $patient_vitals_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->Reception->cellAttributes() ?>>
			<span id="el_patient_vitals_Reception" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_vitals_search->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->Reception->EditValue ?>"<?php echo $patient_vitals_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_vitals_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_vitals_search->LeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><?php echo $patient_vitals_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_vitals_search->RightColumnClass ?>"><div <?php echo $patient_vitals_search->HospID->cellAttributes() ?>>
			<span id="el_patient_vitals_HospID" class="ew-search-field">
<input type="text" data-table="patient_vitals" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($patient_vitals_search->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_search->HospID->EditValue ?>"<?php echo $patient_vitals_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_vitals_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_vitals_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_vitals_search->showPageFooter();
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
$patient_vitals_search->terminate();
?>