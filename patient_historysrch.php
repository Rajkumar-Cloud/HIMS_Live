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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($patient_history_search->IsModal) { ?>
var fpatient_historysearch = currentAdvancedSearchForm = new ew.Form("fpatient_historysearch", "search");
<?php } else { ?>
var fpatient_historysearch = currentForm = new ew.Form("fpatient_historysearch", "search");
<?php } ?>

// Form_CustomValidate event
fpatient_historysearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historysearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_historysearch.lists["x_PatientSearch"] = <?php echo $patient_history_search->PatientSearch->Lookup->toClientList() ?>;
fpatient_historysearch.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_history_search->PatientSearch->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fpatient_historysearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_history->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatientId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_history->PatientId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_history->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_history->HospID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_history_search->showPageHeader(); ?>
<?php
$patient_history_search->showMessage();
?>
<form name="fpatient_historysearch" id="fpatient_historysearch" class="<?php echo $patient_history_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_history_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_history_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_history->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_id"><?php echo $patient_history->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->id->cellAttributes() ?>>
			<span id="el_patient_history_id">
<input type="text" data-table="patient_history" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_history->id->getPlaceHolder()) ?>" value="<?php echo $patient_history->id->EditValue ?>"<?php echo $patient_history->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_mrnno"><?php echo $patient_history->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->mrnno->cellAttributes() ?>>
			<span id="el_patient_history_mrnno">
<input type="text" data-table="patient_history" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_history->mrnno->EditValue ?>"<?php echo $patient_history->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientName"><?php echo $patient_history->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PatientName->cellAttributes() ?>>
			<span id="el_patient_history_PatientName">
<input type="text" data-table="patient_history" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientName->EditValue ?>"<?php echo $patient_history->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientId"><?php echo $patient_history->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="="></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PatientId->cellAttributes() ?>>
			<span id="el_patient_history_PatientId">
<input type="text" data-table="patient_history" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_history->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatientId->EditValue ?>"<?php echo $patient_history->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><?php echo $patient_history->MobileNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
			<span id="el_patient_history_MobileNumber">
<input type="text" data-table="patient_history" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_history->MobileNumber->EditValue ?>"<?php echo $patient_history->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<div id="r_MaritalHistory" class="form-group row">
		<label for="x_MaritalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><?php echo $patient_history->MaritalHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MaritalHistory" id="z_MaritalHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
			<span id="el_patient_history_MaritalHistory">
<input type="text" data-table="patient_history" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MaritalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->MaritalHistory->EditValue ?>"<?php echo $patient_history->MaritalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label for="x_MenstrualHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><?php echo $patient_history->MenstrualHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MenstrualHistory" id="z_MenstrualHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
			<span id="el_patient_history_MenstrualHistory">
<input type="text" data-table="patient_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->MenstrualHistory->EditValue ?>"<?php echo $patient_history->MenstrualHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<div id="r_ObstetricHistory" class="form-group row">
		<label for="x_ObstetricHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><?php echo $patient_history->ObstetricHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ObstetricHistory" id="z_ObstetricHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
			<span id="el_patient_history_ObstetricHistory">
<input type="text" data-table="patient_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->ObstetricHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->ObstetricHistory->EditValue ?>"<?php echo $patient_history->ObstetricHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<div id="r_MedicalHistory" class="form-group row">
		<label for="x_MedicalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><?php echo $patient_history->MedicalHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MedicalHistory" id="z_MedicalHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->MedicalHistory->cellAttributes() ?>>
			<span id="el_patient_history_MedicalHistory">
<input type="text" data-table="patient_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->MedicalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->MedicalHistory->EditValue ?>"<?php echo $patient_history->MedicalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label for="x_SurgicalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><?php echo $patient_history->SurgicalHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SurgicalHistory" id="z_SurgicalHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->SurgicalHistory->cellAttributes() ?>>
			<span id="el_patient_history_SurgicalHistory">
<input type="text" data-table="patient_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->SurgicalHistory->EditValue ?>"<?php echo $patient_history->SurgicalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label for="x_PastHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><?php echo $patient_history->PastHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PastHistory" id="z_PastHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PastHistory->cellAttributes() ?>>
			<span id="el_patient_history_PastHistory">
<input type="text" data-table="patient_history" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->PastHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->PastHistory->EditValue ?>"<?php echo $patient_history->PastHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<div id="r_TreatmentHistory" class="form-group row">
		<label for="x_TreatmentHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><?php echo $patient_history->TreatmentHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TreatmentHistory" id="z_TreatmentHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->TreatmentHistory->cellAttributes() ?>>
			<span id="el_patient_history_TreatmentHistory">
<input type="text" data-table="patient_history" data-field="x_TreatmentHistory" name="x_TreatmentHistory" id="x_TreatmentHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->TreatmentHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->TreatmentHistory->EditValue ?>"<?php echo $patient_history->TreatmentHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label for="x_FamilyHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><?php echo $patient_history->FamilyHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_FamilyHistory" id="z_FamilyHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->FamilyHistory->cellAttributes() ?>>
			<span id="el_patient_history_FamilyHistory">
<input type="text" data-table="patient_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->FamilyHistory->EditValue ?>"<?php echo $patient_history->FamilyHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Age"><?php echo $patient_history->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->Age->cellAttributes() ?>>
			<span id="el_patient_history_Age">
<input type="text" data-table="patient_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Age->getPlaceHolder()) ?>" value="<?php echo $patient_history->Age->EditValue ?>"<?php echo $patient_history->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Gender"><?php echo $patient_history->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->Gender->cellAttributes() ?>>
			<span id="el_patient_history_Gender">
<input type="text" data-table="patient_history" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_history->Gender->EditValue ?>"<?php echo $patient_history->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_profilePic"><?php echo $patient_history->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->profilePic->cellAttributes() ?>>
			<span id="el_patient_history_profilePic">
<input type="text" data-table="patient_history" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_history->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_history->profilePic->EditValue ?>"<?php echo $patient_history->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Complaints->Visible) { // Complaints ?>
	<div id="r_Complaints" class="form-group row">
		<label for="x_Complaints" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Complaints"><?php echo $patient_history->Complaints->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Complaints" id="z_Complaints" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->Complaints->cellAttributes() ?>>
			<span id="el_patient_history_Complaints">
<input type="text" data-table="patient_history" data-field="x_Complaints" name="x_Complaints" id="x_Complaints" size="35" placeholder="<?php echo HtmlEncode($patient_history->Complaints->getPlaceHolder()) ?>" value="<?php echo $patient_history->Complaints->EditValue ?>"<?php echo $patient_history->Complaints->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->illness->Visible) { // illness ?>
	<div id="r_illness" class="form-group row">
		<label for="x_illness" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_illness"><?php echo $patient_history->illness->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_illness" id="z_illness" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->illness->cellAttributes() ?>>
			<span id="el_patient_history_illness">
<input type="text" data-table="patient_history" data-field="x_illness" name="x_illness" id="x_illness" size="35" placeholder="<?php echo HtmlEncode($patient_history->illness->getPlaceHolder()) ?>" value="<?php echo $patient_history->illness->EditValue ?>"<?php echo $patient_history->illness->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PersonalHistory->Visible) { // PersonalHistory ?>
	<div id="r_PersonalHistory" class="form-group row">
		<label for="x_PersonalHistory" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><?php echo $patient_history->PersonalHistory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PersonalHistory" id="z_PersonalHistory" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PersonalHistory->cellAttributes() ?>>
			<span id="el_patient_history_PersonalHistory">
<input type="text" data-table="patient_history" data-field="x_PersonalHistory" name="x_PersonalHistory" id="x_PersonalHistory" size="35" placeholder="<?php echo HtmlEncode($patient_history->PersonalHistory->getPlaceHolder()) ?>" value="<?php echo $patient_history->PersonalHistory->EditValue ?>"<?php echo $patient_history->PersonalHistory->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label for="x_PatientSearch" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatientSearch"><?php echo $patient_history->PatientSearch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PatientSearch->cellAttributes() ?>>
			<span id="el_patient_history_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_history->PatientSearch->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_history->PatientSearch->AdvancedSearch->ViewValue) : $patient_history->PatientSearch->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_history->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_history->PatientSearch->ReadOnly || $patient_history->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_history->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_history" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_history->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_history->PatientSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_history->PatientSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_PatID"><?php echo $patient_history->PatID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatID" id="z_PatID" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->PatID->cellAttributes() ?>>
			<span id="el_patient_history_PatID">
<input type="text" data-table="patient_history" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_history->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_history->PatID->EditValue ?>"<?php echo $patient_history->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_Reception"><?php echo $patient_history->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->Reception->cellAttributes() ?>>
			<span id="el_patient_history_Reception">
<input type="text" data-table="patient_history" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_history->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_history->Reception->EditValue ?>"<?php echo $patient_history->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_history_search->LeftColumnClass ?>"><span id="elh_patient_history_HospID"><?php echo $patient_history->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $patient_history_search->RightColumnClass ?>"><div<?php echo $patient_history->HospID->cellAttributes() ?>>
			<span id="el_patient_history_HospID">
<input type="text" data-table="patient_history" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($patient_history->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_history->HospID->EditValue ?>"<?php echo $patient_history->HospID->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_history_search->terminate();
?>