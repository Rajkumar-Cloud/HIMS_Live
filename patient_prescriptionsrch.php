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
$patient_prescription_search = new patient_prescription_search();

// Run the page
$patient_prescription_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($patient_prescription_search->IsModal) { ?>
var fpatient_prescriptionsearch = currentAdvancedSearchForm = new ew.Form("fpatient_prescriptionsearch", "search");
<?php } else { ?>
var fpatient_prescriptionsearch = currentForm = new ew.Form("fpatient_prescriptionsearch", "search");
<?php } ?>

// Form_CustomValidate event
fpatient_prescriptionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptionsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptionsearch.lists["x_Medicine"] = <?php echo $patient_prescription_search->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptionsearch.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_search->Medicine->lookupOptions()) ?>;
fpatient_prescriptionsearch.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionsearch.lists["x_PreRoute"] = <?php echo $patient_prescription_search->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptionsearch.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_search->PreRoute->lookupOptions()) ?>;
fpatient_prescriptionsearch.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionsearch.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_search->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptionsearch.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_search->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptionsearch.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionsearch.lists["x_Type"] = <?php echo $patient_prescription_search->Type->Lookup->toClientList() ?>;
fpatient_prescriptionsearch.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_search->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptionsearch.lists["x_Status"] = <?php echo $patient_prescription_search->Status->Lookup->toClientList() ?>;
fpatient_prescriptionsearch.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_search->Status->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fpatient_prescriptionsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_prescription->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_prescription->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatientId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($patient_prescription->PatientId->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_prescription_search->showPageHeader(); ?>
<?php
$patient_prescription_search->showMessage();
?>
<form name="fpatient_prescriptionsearch" id="fpatient_prescriptionsearch" class="<?php echo $patient_prescription_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_prescription_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($patient_prescription->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_id"><?php echo $patient_prescription->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->id->cellAttributes() ?>>
			<span id="el_patient_prescription_id">
<input type="text" data-table="patient_prescription" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($patient_prescription->id->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->id->EditValue ?>"<?php echo $patient_prescription->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Reception"><?php echo $patient_prescription->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Reception->cellAttributes() ?>>
			<span id="el_patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_PatientId"><?php echo $patient_prescription->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="="></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
			<span id="el_patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_PatientName"><?php echo $patient_prescription->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
			<span id="el_patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Medicine"><?php echo $patient_prescription->Medicine->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Medicine" id="z_Medicine" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
			<span id="el_patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine" class="text-nowrap" style="z-index: 8950">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionsearch.createAutoSuggest({"id":"x_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x_Medicine") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label for="x_M" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_M"><?php echo $patient_prescription->M->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_M" id="z_M" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->M->cellAttributes() ?>>
			<span id="el_patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label for="x_A" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_A"><?php echo $patient_prescription->A->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_A" id="z_A" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->A->cellAttributes() ?>>
			<span id="el_patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label for="x_N" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_N"><?php echo $patient_prescription->N->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_N" id="z_N" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->N->cellAttributes() ?>>
			<span id="el_patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label for="x_NoOfDays" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_NoOfDays"><?php echo $patient_prescription->NoOfDays->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NoOfDays" id="z_NoOfDays" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
			<span id="el_patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_PreRoute"><?php echo $patient_prescription->PreRoute->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PreRoute" id="z_PreRoute" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
			<span id="el_patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute" class="text-nowrap" style="z-index: 8900">
	<input type="text" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionsearch.createAutoSuggest({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x_PreRoute") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_TimeOfTaking"><?php echo $patient_prescription->TimeOfTaking->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TimeOfTaking" id="z_TimeOfTaking" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
			<span id="el_patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking" class="text-nowrap" style="z-index: 8890">
	<input type="text" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionsearch.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x_TimeOfTaking") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label for="x_Type" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Type"><?php echo $patient_prescription->Type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Type" id="z_Type" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Type->cellAttributes() ?>>
			<span id="el_patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x_Type") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_mrnno"><?php echo $patient_prescription->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
			<span id="el_patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Age"><?php echo $patient_prescription->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Age->cellAttributes() ?>>
			<span id="el_patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Gender"><?php echo $patient_prescription->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Gender->cellAttributes() ?>>
			<span id="el_patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_profilePic"><?php echo $patient_prescription->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
			<span id="el_patient_prescription_profilePic">
<input type="text" data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->profilePic->EditValue ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label for="x_Status" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_Status"><?php echo $patient_prescription->Status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Status" id="z_Status" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->Status->cellAttributes() ?>>
			<span id="el_patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x_Status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label for="x_CreatedBy" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_CreatedBy"><?php echo $patient_prescription->CreatedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
			<span id="el_patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<div id="r_CreateDateTime" class="form-group row">
		<label for="x_CreateDateTime" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_CreateDateTime"><?php echo $patient_prescription->CreateDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CreateDateTime" id="z_CreateDateTime" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
			<span id="el_patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label for="x_ModifiedBy" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedBy"><?php echo $patient_prescription->ModifiedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
			<span id="el_patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label for="x_ModifiedDateTime" class="<?php echo $patient_prescription_search->LeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedDateTime"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="LIKE"></span>
		</label>
		<div class="<?php echo $patient_prescription_search->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
			<span id="el_patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_prescription_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_prescription_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_prescription_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_search->terminate();
?>