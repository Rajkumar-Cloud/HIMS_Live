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
$patient_opd_follow_up_search = new patient_opd_follow_up_search();

// Run the page
$patient_opd_follow_up_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($patient_opd_follow_up_search->IsModal) { ?>
var fpatient_opd_follow_upsearch = currentAdvancedSearchForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
<?php } else { ?>
var fpatient_opd_follow_upsearch = currentForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
<?php } ?>

// Form_CustomValidate event
fpatient_opd_follow_upsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_upsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_upsearch.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_search->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upsearch.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_search->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upsearch.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_search->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upsearch.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_search->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_search->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_upsearch.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_upsearch.lists["x_status"] = <?php echo $patient_opd_follow_up_search->status->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_search->status->lookupOptions()) ?>;
fpatient_opd_follow_upsearch.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_search->PatientSearch->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_search->PatientSearch->lookupOptions()) ?>;
fpatient_opd_follow_upsearch.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_search->TemplateDrNotes->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_search->TemplateDrNotes->lookupOptions()) ?>;
fpatient_opd_follow_upsearch.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_search->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upsearch.lists["x_DrName"] = <?php echo $patient_opd_follow_up_search->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_upsearch.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_search->DrName->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fpatient_opd_follow_upsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_NextReviewDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->NextReviewDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EDD");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->EDD->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_LMP");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->LMP->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ICSIDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->ICSIDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_opd_follow_up_search->showPageHeader(); ?>
<?php
$patient_opd_follow_up_search->showMessage();
?>
<form name="fpatient_opd_follow_upsearch" id="fpatient_opd_follow_upsearch" class="<?php echo $patient_opd_follow_up_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><?php echo $patient_opd_follow_up->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_id">
<input type="text" data-table="patient_opd_follow_up" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->id->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->id->EditValue ?>"<?php echo $patient_opd_follow_up->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><?php echo $patient_opd_follow_up->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Reception" id="z_Reception" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Reception->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Reception">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Reception->EditValue ?>"<?php echo $patient_opd_follow_up->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><?php echo $patient_opd_follow_up->PatID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatID" id="z_PatID" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatID->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatID">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatID->EditValue ?>"<?php echo $patient_opd_follow_up->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><?php echo $patient_opd_follow_up->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientId->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientId">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientId->EditValue ?>"<?php echo $patient_opd_follow_up->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><?php echo $patient_opd_follow_up->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><?php echo $patient_opd_follow_up->MobileNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_MobileNumber">
<input type="text" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->MobileNumber->EditValue ?>"<?php echo $patient_opd_follow_up->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<div id="r_Telephone" class="form-group row">
		<label for="x_Telephone" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><?php echo $patient_opd_follow_up->Telephone->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Telephone" id="z_Telephone" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Telephone->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Telephone">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up->Telephone->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><?php echo $patient_opd_follow_up->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->mrnno->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_mrnno">
<input type="text" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->mrnno->EditValue ?>"<?php echo $patient_opd_follow_up->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><?php echo $patient_opd_follow_up->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Age->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Age">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Age->EditValue ?>"<?php echo $patient_opd_follow_up->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><?php echo $patient_opd_follow_up->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Gender">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Gender->EditValue ?>"<?php echo $patient_opd_follow_up->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><?php echo $patient_opd_follow_up->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->profilePic->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_profilePic">
<input type="text" data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->profilePic->EditValue ?>"<?php echo $patient_opd_follow_up->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><?php echo $patient_opd_follow_up->procedurenotes->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_procedurenotes" id="z_procedurenotes" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->procedurenotes->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_procedurenotes">
<input type="text" data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->procedurenotes->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->procedurenotes->EditValue ?>"<?php echo $patient_opd_follow_up->procedurenotes->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label for="x_NextReviewDate" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_NextReviewDate" id="z_NextReviewDate" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ICSIAdvised" id="z_ICSIAdvised" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DeliveryRegistered" id="z_DeliveryRegistered" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label for="x_EDD" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><?php echo $patient_opd_follow_up->EDD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EDD" id="z_EDD" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SerologyPositive" id="z_SerologyPositive" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><?php echo $patient_opd_follow_up->Allergy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Allergy" id="z_Allergy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="text-nowrap" style="z-index: 8820">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_opd_follow_upsearch.createAutoSuggest({"id":"x_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x_Allergy") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><?php echo $patient_opd_follow_up->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><?php echo $patient_opd_follow_up->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->createdby->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_createdby">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createdby->EditValue ?>"<?php echo $patient_opd_follow_up->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_createddatetime" id="z_createddatetime" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($patient_opd_follow_up->createddatetime->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_patient_opd_follow_up_createddatetime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createddatetime->EditValue ?>"<?php echo $patient_opd_follow_up->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->createddatetime->ReadOnly && !$patient_opd_follow_up->createddatetime->Disabled && !isset($patient_opd_follow_up->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_createddatetime d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_patient_opd_follow_up_createddatetime" class="btw1_createddatetime d-none">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="y_createddatetime" id="y_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createddatetime->EditValue2 ?>"<?php echo $patient_opd_follow_up->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->createddatetime->ReadOnly && !$patient_opd_follow_up->createddatetime->Disabled && !isset($patient_opd_follow_up->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "y_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_modifiedby">
<input type="text" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->modifiedby->EditValue ?>"<?php echo $patient_opd_follow_up->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_modifieddatetime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->modifieddatetime->EditValue ?>"<?php echo $patient_opd_follow_up->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->modifieddatetime->ReadOnly && !$patient_opd_follow_up->modifieddatetime->Disabled && !isset($patient_opd_follow_up->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label for="x_LMP" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><?php echo $patient_opd_follow_up->LMP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_LMP" id="z_LMP" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label for="x_Procedure" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><?php echo $patient_opd_follow_up->Procedure->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Procedure->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Procedure">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Procedure->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Procedure->EditValue ?>"<?php echo $patient_opd_follow_up->Procedure->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label for="x_ProcedureDateTime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProcedureDateTime" id="z_ProcedureDateTime" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label for="x_ICSIDate" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ICSIDate" id="z_ICSIDate" value="="></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label for="x_PatientSearch" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><?php echo $patient_opd_follow_up->PatientSearch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientSearch->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientSearch">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_opd_follow_up->PatientSearch->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->PatientSearch->AdvancedSearch->ViewValue) : $patient_opd_follow_up->PatientSearch->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->PatientSearch->ReadOnly || $patient_opd_follow_up->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_opd_follow_up->PatientSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_opd_follow_up->PatientSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><?php echo $patient_opd_follow_up->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HospID" id="z_HospID" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->HospID->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_HospID">
<input type="text" data-table="patient_opd_follow_up" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->HospID->EditValue ?>"<?php echo $patient_opd_follow_up->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
	<div id="r_createdUserName" class="form-group row">
		<label for="x_createdUserName" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><?php echo $patient_opd_follow_up->createdUserName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdUserName" id="z_createdUserName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->createdUserName->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_createdUserName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->createdUserName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->createdUserName->EditValue ?>"<?php echo $patient_opd_follow_up->createdUserName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<div id="r_TemplateDrNotes" class="form-group row">
		<label for="x_TemplateDrNotes" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TemplateDrNotes" id="z_TemplateDrNotes" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->TemplateDrNotes->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_TemplateDrNotes">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_TemplateDrNotes" data-value-separator="<?php echo $patient_opd_follow_up->TemplateDrNotes->displayValueSeparatorAttribute() ?>" id="x_TemplateDrNotes" name="x_TemplateDrNotes"<?php echo $patient_opd_follow_up->TemplateDrNotes->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->TemplateDrNotes->Lookup->getParamTag("p_x_TemplateDrNotes") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
	<div id="r_reportheader" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><?php echo $patient_opd_follow_up->reportheader->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_reportheader" id="z_reportheader" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_reportheader">
<div id="tp_x_reportheader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_reportheader" data-value-separator="<?php echo $patient_opd_follow_up->reportheader->displayValueSeparatorAttribute() ?>" name="x_reportheader[]" id="x_reportheader[]" value="{value}"<?php echo $patient_opd_follow_up->reportheader->editAttributes() ?>></div>
<div id="dsl_x_reportheader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->reportheader->checkBoxListHtml(FALSE, "x_reportheader[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label for="x_Purpose" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Purpose"><?php echo $patient_opd_follow_up->Purpose->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Purpose" id="z_Purpose" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Purpose->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Purpose">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Purpose->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Purpose->EditValue ?>"<?php echo $patient_opd_follow_up->Purpose->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DrName"><?php echo $patient_opd_follow_up->DrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrName" id="z_DrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?php echo strval($patient_opd_follow_up->DrName->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->DrName->AdvancedSearch->ViewValue) : $patient_opd_follow_up->DrName->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->DrName->ReadOnly || $patient_opd_follow_up->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->DrName->Lookup->getParamTag("p_x_DrName") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?php echo $patient_opd_follow_up->DrName->AdvancedSearch->SearchValue ?>"<?php echo $patient_opd_follow_up->DrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_opd_follow_up_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_opd_follow_up_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_opd_follow_up_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_search->terminate();
?>