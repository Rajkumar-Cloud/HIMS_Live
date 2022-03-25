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
<?php include_once "header.php"; ?>
<script>
var fpatient_opd_follow_upsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($patient_opd_follow_up_search->IsModal) { ?>
	fpatient_opd_follow_upsearch = currentAdvancedSearchForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
	<?php } else { ?>
	fpatient_opd_follow_upsearch = currentForm = new ew.Form("fpatient_opd_follow_upsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fpatient_opd_follow_upsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_NextReviewDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->NextReviewDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EDD");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->EDD->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->createdby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->modifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_LMP");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->LMP->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ICSIDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up_search->ICSIDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fpatient_opd_follow_upsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_opd_follow_upsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_opd_follow_upsearch.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_search->ICSIAdvised->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->ICSIAdvised->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upsearch.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_search->DeliveryRegistered->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->DeliveryRegistered->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upsearch.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_search->SerologyPositive->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->SerologyPositive->options(FALSE, TRUE)) ?>;
	fpatient_opd_follow_upsearch.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_search->Allergy->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_search->Allergy->lookupOptions()) ?>;
	fpatient_opd_follow_upsearch.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_opd_follow_upsearch.lists["x_status"] = <?php echo $patient_opd_follow_up_search->status->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_search->status->lookupOptions()) ?>;
	fpatient_opd_follow_upsearch.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_search->PatientSearch->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_search->PatientSearch->lookupOptions()) ?>;
	fpatient_opd_follow_upsearch.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_search->TemplateDrNotes->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_search->TemplateDrNotes->lookupOptions()) ?>;
	fpatient_opd_follow_upsearch.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_search->reportheader->Lookup->toClientList($patient_opd_follow_up_search) ?>;
	fpatient_opd_follow_upsearch.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_search->reportheader->options(FALSE, TRUE)) ?>;
	loadjs.done("fpatient_opd_follow_upsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_opd_follow_up_search->showPageHeader(); ?>
<?php
$patient_opd_follow_up_search->showMessage();
?>
<form name="fpatient_opd_follow_upsearch" id="fpatient_opd_follow_upsearch" class="<?php echo $patient_opd_follow_up_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_opd_follow_up_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><?php echo $patient_opd_follow_up_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->id->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_id" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->id->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->id->EditValue ?>"<?php echo $patient_opd_follow_up_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><?php echo $patient_opd_follow_up_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Reception->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Reception" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->Reception->EditValue ?>"<?php echo $patient_opd_follow_up_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label for="x_PatID" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><?php echo $patient_opd_follow_up_search->PatID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatID" id="z_PatID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->PatID->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatID" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->PatID->EditValue ?>"<?php echo $patient_opd_follow_up_search->PatID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><?php echo $patient_opd_follow_up_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->PatientId->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientId" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->PatientId->EditValue ?>"<?php echo $patient_opd_follow_up_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><?php echo $patient_opd_follow_up_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->PatientName->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientName" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label for="x_MobileNumber" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><?php echo $patient_opd_follow_up_search->MobileNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->MobileNumber->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_MobileNumber" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->MobileNumber->EditValue ?>"<?php echo $patient_opd_follow_up_search->MobileNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Telephone->Visible) { // Telephone ?>
	<div id="r_Telephone" class="form-group row">
		<label for="x_Telephone" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><?php echo $patient_opd_follow_up_search->Telephone->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Telephone" id="z_Telephone" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Telephone->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Telephone" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up_search->Telephone->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><?php echo $patient_opd_follow_up_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->mrnno->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_mrnno" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->mrnno->EditValue ?>"<?php echo $patient_opd_follow_up_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><?php echo $patient_opd_follow_up_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Age->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Age" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->Age->EditValue ?>"<?php echo $patient_opd_follow_up_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><?php echo $patient_opd_follow_up_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Gender->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Gender" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->Gender->EditValue ?>"<?php echo $patient_opd_follow_up_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><?php echo $patient_opd_follow_up_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->profilePic->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_profilePic" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->profilePic->EditValue ?>"<?php echo $patient_opd_follow_up_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><?php echo $patient_opd_follow_up_search->procedurenotes->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_procedurenotes" id="z_procedurenotes" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->procedurenotes->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_procedurenotes" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->procedurenotes->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->procedurenotes->EditValue ?>"<?php echo $patient_opd_follow_up_search->procedurenotes->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label for="x_NextReviewDate" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><?php echo $patient_opd_follow_up_search->NextReviewDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_NextReviewDate" id="z_NextReviewDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->NextReviewDate->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_NextReviewDate" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up_search->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->NextReviewDate->ReadOnly && !$patient_opd_follow_up_search->NextReviewDate->Disabled && !isset($patient_opd_follow_up_search->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><?php echo $patient_opd_follow_up_search->ICSIAdvised->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ICSIAdvised" id="z_ICSIAdvised" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->ICSIAdvised->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ICSIAdvised" class="ew-search-field">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up_search->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up_search->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_search->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><?php echo $patient_opd_follow_up_search->DeliveryRegistered->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeliveryRegistered" id="z_DeliveryRegistered" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->DeliveryRegistered->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_DeliveryRegistered" class="ew-search-field">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up_search->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up_search->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_search->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label for="x_EDD" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><?php echo $patient_opd_follow_up_search->EDD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EDD" id="z_EDD" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->EDD->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_EDD" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->EDD->EditValue ?>"<?php echo $patient_opd_follow_up_search->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->EDD->ReadOnly && !$patient_opd_follow_up_search->EDD->Disabled && !isset($patient_opd_follow_up_search->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><?php echo $patient_opd_follow_up_search->SerologyPositive->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SerologyPositive" id="z_SerologyPositive" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->SerologyPositive->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_SerologyPositive" class="ew-search-field">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up_search->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up_search->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_search->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><?php echo $patient_opd_follow_up_search->Allergy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Allergy" id="z_Allergy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Allergy->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Allergy" class="ew-search-field">
<?php
$onchange = $patient_opd_follow_up_search->Allergy->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_opd_follow_up_search->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up_search->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up_search->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up_search->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_opd_follow_up_search->Allergy->ReadOnly || $patient_opd_follow_up_search->Allergy->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up_search->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up_search->Allergy->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch"], function() {
	fpatient_opd_follow_upsearch.createAutoSuggest({"id":"x_Allergy","forceSelect":false});
});
</script>
<?php echo $patient_opd_follow_up_search->Allergy->Lookup->getParamTag($patient_opd_follow_up_search, "p_x_Allergy") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><?php echo $patient_opd_follow_up_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->status->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up_search->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_opd_follow_up_search->status->editAttributes() ?>>
			<?php echo $patient_opd_follow_up_search->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $patient_opd_follow_up_search->status->Lookup->getParamTag($patient_opd_follow_up_search, "p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><?php echo $patient_opd_follow_up_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->createdby->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_createdby" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->createdby->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->createdby->EditValue ?>"<?php echo $patient_opd_follow_up_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><?php echo $patient_opd_follow_up_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->createddatetime->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_createddatetime" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->createddatetime->EditValue ?>"<?php echo $patient_opd_follow_up_search->createddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->createddatetime->ReadOnly && !$patient_opd_follow_up_search->createddatetime->Disabled && !isset($patient_opd_follow_up_search->createddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><?php echo $patient_opd_follow_up_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->modifiedby->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_modifiedby" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->modifiedby->EditValue ?>"<?php echo $patient_opd_follow_up_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><?php echo $patient_opd_follow_up_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_modifieddatetime" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->modifieddatetime->EditValue ?>"<?php echo $patient_opd_follow_up_search->modifieddatetime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->modifieddatetime->ReadOnly && !$patient_opd_follow_up_search->modifieddatetime->Disabled && !isset($patient_opd_follow_up_search->modifieddatetime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label for="x_LMP" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><?php echo $patient_opd_follow_up_search->LMP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_LMP" id="z_LMP" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->LMP->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_LMP" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->LMP->EditValue ?>"<?php echo $patient_opd_follow_up_search->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->LMP->ReadOnly && !$patient_opd_follow_up_search->LMP->Disabled && !isset($patient_opd_follow_up_search->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label for="x_Procedure" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><?php echo $patient_opd_follow_up_search->Procedure->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->Procedure->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_Procedure" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="35" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->Procedure->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->Procedure->EditValue ?>"<?php echo $patient_opd_follow_up_search->Procedure->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label for="x_ProcedureDateTime" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><?php echo $patient_opd_follow_up_search->ProcedureDateTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProcedureDateTime" id="z_ProcedureDateTime" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->ProcedureDateTime->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ProcedureDateTime" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up_search->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up_search->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up_search->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label for="x_ICSIDate" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><?php echo $patient_opd_follow_up_search->ICSIDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ICSIDate" id="z_ICSIDate" value="=">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->ICSIDate->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_ICSIDate" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up_search->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up_search->ICSIDate->ReadOnly && !$patient_opd_follow_up_search->ICSIDate->Disabled && !isset($patient_opd_follow_up_search->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up_search->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_opd_follow_upsearch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label for="x_PatientSearch" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><?php echo $patient_opd_follow_up_search->PatientSearch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientSearch" id="z_PatientSearch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->PatientSearch->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_PatientSearch" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo EmptyValue(strval($patient_opd_follow_up_search->PatientSearch->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_opd_follow_up_search->PatientSearch->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up_search->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_opd_follow_up_search->PatientSearch->ReadOnly || $patient_opd_follow_up_search->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up_search->PatientSearch->Lookup->getParamTag($patient_opd_follow_up_search, "p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up_search->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_opd_follow_up_search->PatientSearch->AdvancedSearch->SearchValue ?>"<?php echo $patient_opd_follow_up_search->PatientSearch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><?php echo $patient_opd_follow_up_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->HospID->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_HospID" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->HospID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->HospID->EditValue ?>"<?php echo $patient_opd_follow_up_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->createdUserName->Visible) { // createdUserName ?>
	<div id="r_createdUserName" class="form-group row">
		<label for="x_createdUserName" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><?php echo $patient_opd_follow_up_search->createdUserName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdUserName" id="z_createdUserName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->createdUserName->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_createdUserName" class="ew-search-field">
<input type="text" data-table="patient_opd_follow_up" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up_search->createdUserName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up_search->createdUserName->EditValue ?>"<?php echo $patient_opd_follow_up_search->createdUserName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<div id="r_TemplateDrNotes" class="form-group row">
		<label for="x_TemplateDrNotes" class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><?php echo $patient_opd_follow_up_search->TemplateDrNotes->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TemplateDrNotes" id="z_TemplateDrNotes" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->TemplateDrNotes->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_TemplateDrNotes" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_TemplateDrNotes" data-value-separator="<?php echo $patient_opd_follow_up_search->TemplateDrNotes->displayValueSeparatorAttribute() ?>" id="x_TemplateDrNotes" name="x_TemplateDrNotes"<?php echo $patient_opd_follow_up_search->TemplateDrNotes->editAttributes() ?>>
			<?php echo $patient_opd_follow_up_search->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
		</select>
</div>
<?php echo $patient_opd_follow_up_search->TemplateDrNotes->Lookup->getParamTag($patient_opd_follow_up_search, "p_x_TemplateDrNotes") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up_search->reportheader->Visible) { // reportheader ?>
	<div id="r_reportheader" class="form-group row">
		<label class="<?php echo $patient_opd_follow_up_search->LeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><?php echo $patient_opd_follow_up_search->reportheader->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_reportheader" id="z_reportheader" value="LIKE">
</span>
		</label>
		<div class="<?php echo $patient_opd_follow_up_search->RightColumnClass ?>"><div <?php echo $patient_opd_follow_up_search->reportheader->cellAttributes() ?>>
			<span id="el_patient_opd_follow_up_reportheader" class="ew-search-field">
<div id="tp_x_reportheader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_reportheader" data-value-separator="<?php echo $patient_opd_follow_up_search->reportheader->displayValueSeparatorAttribute() ?>" name="x_reportheader[]" id="x_reportheader[]" value="{value}"<?php echo $patient_opd_follow_up_search->reportheader->editAttributes() ?>></div>
<div id="dsl_x_reportheader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up_search->reportheader->checkBoxListHtml(FALSE, "x_reportheader[]") ?>
</div></div>
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
$patient_opd_follow_up_search->terminate();
?>