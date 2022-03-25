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
$patient_history_search = new patient_history_search();

// Run the page
$patient_history_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_historysearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($patient_history_search->IsModal) { ?>
	fpatient_historysearch = currentAdvancedSearchForm = new ew.Form("fpatient_historysearch", "search");
	<?php } else { ?>
	fpatient_historysearch = currentForm = new ew.Form("fpatient_historysearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpatient_historysearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_history_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PatientId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_history_search->PatientId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Reception");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_history_search->Reception->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_history_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_historysearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_historysearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_historysearch.lists["x_PatientSearch"] = <?php echo $patient_history_search->PatientSearch->Lookup->toClientList($patient_history_search) ?>;
	fpatient_historysearch.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_history_search->PatientSearch->lookupOptions()) ?>;
	loadjs.done("fpatient_historysearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_history_search->showPageHeader(); ?>
<?php
$patient_history_search->showMessage();
?>
<form name="fpatient_historysearch" id="fpatient_historysearch" class="<?php echo $patient_history_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_history_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_id"><?php echo $patient_history_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->id->cellAttributes() ?>>
			<span id="el_patient_history_id" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_history_search->id->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->id->EditValue ?>"<?php echo $patient_history_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_mrnno"><?php echo $patient_history_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->mrnno->cellAttributes() ?>>
			<span id="el_patient_history_mrnno" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->mrnno->EditValue ?>"<?php echo $patient_history_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientName"><?php echo $patient_history_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PatientName->cellAttributes() ?>>
			<span id="el_patient_history_PatientName" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->PatientName->EditValue ?>"<?php echo $patient_history_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientId"><?php echo $patient_history_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="=">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PatientId->cellAttributes() ?>>
			<span id="el_patient_history_PatientId" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->PatientId->EditValue ?>"<?php echo $patient_history_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><?php echo $patient_history_search->MobileNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->MobileNumber->cellAttributes() ?>>
			<span id="el_patient_history_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->MobileNumber->EditValue ?>"<?php echo $patient_history_search->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label for="x_MaritalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><?php echo $patient_history_search->MaritalHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MaritalHistory" id="z_MaritalHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->MaritalHistory->cellAttributes() ?>>
			<span id="el_patient_history_MaritalHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->MaritalHistory->EditValue ?>"<?php echo $patient_history_search->MaritalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label for="x_MenstrualHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><?php echo $patient_history_search->MenstrualHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MenstrualHistory" id="z_MenstrualHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->MenstrualHistory->cellAttributes() ?>>
			<span id="el_patient_history_MenstrualHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->MenstrualHistory->EditValue ?>"<?php echo $patient_history_search->MenstrualHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label for="x_ObstetricHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><?php echo $patient_history_search->ObstetricHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ObstetricHistory" id="z_ObstetricHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->ObstetricHistory->cellAttributes() ?>>
			<span id="el_patient_history_ObstetricHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->ObstetricHistory->EditValue ?>"<?php echo $patient_history_search->ObstetricHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label for="x_MedicalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><?php echo $patient_history_search->MedicalHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MedicalHistory" id="z_MedicalHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->MedicalHistory->cellAttributes() ?>>
			<span id="el_patient_history_MedicalHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->MedicalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->MedicalHistory->EditValue ?>"<?php echo $patient_history_search->MedicalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label for="x_SurgicalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><?php echo $patient_history_search->SurgicalHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SurgicalHistory" id="z_SurgicalHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->SurgicalHistory->cellAttributes() ?>>
			<span id="el_patient_history_SurgicalHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->SurgicalHistory->EditValue ?>"<?php echo $patient_history_search->SurgicalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label for="x_PastHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><?php echo $patient_history_search->PastHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PastHistory" id="z_PastHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PastHistory->cellAttributes() ?>>
			<span id="el_patient_history_PastHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->PastHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->PastHistory->EditValue ?>"<?php echo $patient_history_search->PastHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<div id="r_TreatmentHistory" class="form-group row">
		<label for="x_TreatmentHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><?php echo $patient_history_search->TreatmentHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TreatmentHistory" id="z_TreatmentHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->TreatmentHistory->cellAttributes() ?>>
			<span id="el_patient_history_TreatmentHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->TreatmentHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->TreatmentHistory->EditValue ?>"<?php echo $patient_history_search->TreatmentHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label for="x_FamilyHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><?php echo $patient_history_search->FamilyHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FamilyHistory" id="z_FamilyHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->FamilyHistory->cellAttributes() ?>>
			<span id="el_patient_history_FamilyHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->FamilyHistory->EditValue ?>"<?php echo $patient_history_search->FamilyHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Age"><?php echo $patient_history_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->Age->cellAttributes() ?>>
			<span id="el_patient_history_Age" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->Age->EditValue ?>"<?php echo $patient_history_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Gender"><?php echo $patient_history_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->Gender->cellAttributes() ?>>
			<span id="el_patient_history_Gender" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->Gender->EditValue ?>"<?php echo $patient_history_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_profilePic"><?php echo $patient_history_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->profilePic->cellAttributes() ?>>
			<span id="el_patient_history_profilePic" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->profilePic->EditValue ?>"<?php echo $patient_history_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->Complaints->Visible) { // Complaints ?>
	<div id="r_Complaints" class="form-group row">
		<label for="x_Complaints" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Complaints"><?php echo $patient_history_search->Complaints->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Complaints" id="z_Complaints" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->Complaints->cellAttributes() ?>>
			<span id="el_patient_history_Complaints" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->Complaints->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->Complaints->EditValue ?>"<?php echo $patient_history_search->Complaints->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->illness->Visible) { // illness ?>
	<div id="r_illness" class="form-group row">
		<label for="x_illness" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_illness"><?php echo $patient_history_search->illness->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_illness" id="z_illness" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->illness->cellAttributes() ?>>
			<span id="el_patient_history_illness" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->illness->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->illness->EditValue ?>"<?php echo $patient_history_search->illness->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PersonalHistory->Visible) { // PersonalHistory ?>
	<div id="r_PersonalHistory" class="form-group row">
		<label for="x_PersonalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><?php echo $patient_history_search->PersonalHistory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PersonalHistory" id="z_PersonalHistory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PersonalHistory->cellAttributes() ?>>
			<span id="el_patient_history_PersonalHistory" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history_search->PersonalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->PersonalHistory->EditValue ?>"<?php echo $patient_history_search->PersonalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label for="x_PatientSearch" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientSearch"><?php echo $patient_history_search->PatientSearch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PatientSearch->cellAttributes() ?>>
			<span id="el_patient_history_PatientSearch" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_history_search->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_history_search->PatientSearch->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_history_search->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_history_search->PatientSearch->ReadOnly || $patient_history_search->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_history_search->PatientSearch->Lookup->getParamTag($patient_history_search, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_history_search->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_history_search->PatientSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_history_search->PatientSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatID"><?php echo $patient_history_search->PatID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->PatID->cellAttributes() ?>>
			<span id="el_patient_history_PatID" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history_search->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->PatID->EditValue ?>"<?php echo $patient_history_search->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Reception"><?php echo $patient_history_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->Reception->cellAttributes() ?>>
			<span id="el_patient_history_Reception" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_history_search->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->Reception->EditValue ?>"<?php echo $patient_history_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_HospID"><?php echo $patient_history_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div <?php echo $patient_history_search->HospID->cellAttributes() ?>>
			<span id="el_patient_history_HospID" class="ew-search-field">
<input type="text" data-table="patient_history" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($patient_history_search->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_history_search->HospID->EditValue ?>"<?php echo $patient_history_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_history_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_history_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_history_search->showPageFooter();
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
$patient_history_search->terminate();
?>