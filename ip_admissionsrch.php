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
$ip_admission_search = new ip_admission_search();

// Run the page
$ip_admission_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($ip_admission_search->IsModal) { ?>
var fip_admissionsearch = currentAdvancedSearchForm = new ew.Form("fip_admissionsearch", "search");
<?php } else { ?>
var fip_admissionsearch = currentForm = new ew.Form("fip_admissionsearch", "search");
<?php } ?>

// Form_CustomValidate event
fip_admissionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fip_admissionsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fip_admissionsearch.lists["x_gender"] = <?php echo $ip_admission_search->gender->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_gender"].options = <?php echo JsonEncode($ip_admission_search->gender->lookupOptions()) ?>;
fip_admissionsearch.autoSuggests["x_gender"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fip_admissionsearch.lists["x_typeRegsisteration"] = <?php echo $ip_admission_search->typeRegsisteration->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_search->typeRegsisteration->lookupOptions()) ?>;
fip_admissionsearch.lists["x_PaymentCategory"] = <?php echo $ip_admission_search->PaymentCategory->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_search->PaymentCategory->lookupOptions()) ?>;
fip_admissionsearch.lists["x_physician_id"] = <?php echo $ip_admission_search->physician_id->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_search->physician_id->lookupOptions()) ?>;
fip_admissionsearch.lists["x_admission_consultant_id"] = <?php echo $ip_admission_search->admission_consultant_id->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_search->admission_consultant_id->lookupOptions()) ?>;
fip_admissionsearch.lists["x_leading_consultant_id"] = <?php echo $ip_admission_search->leading_consultant_id->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_leading_consultant_id"].options = <?php echo JsonEncode($ip_admission_search->leading_consultant_id->lookupOptions()) ?>;
fip_admissionsearch.lists["x_PaymentStatus"] = <?php echo $ip_admission_search->PaymentStatus->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_PaymentStatus"].options = <?php echo JsonEncode($ip_admission_search->PaymentStatus->lookupOptions()) ?>;
fip_admissionsearch.lists["x_status"] = <?php echo $ip_admission_search->status->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_status"].options = <?php echo JsonEncode($ip_admission_search->status->lookupOptions()) ?>;
fip_admissionsearch.lists["x_HospID"] = <?php echo $ip_admission_search->HospID->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_HospID"].options = <?php echo JsonEncode($ip_admission_search->HospID->lookupOptions()) ?>;
fip_admissionsearch.lists["x_ReferedByDr"] = <?php echo $ip_admission_search->ReferedByDr->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_ReferedByDr"].options = <?php echo JsonEncode($ip_admission_search->ReferedByDr->lookupOptions()) ?>;
fip_admissionsearch.lists["x_ReferA4TreatingConsultant"] = <?php echo $ip_admission_search->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($ip_admission_search->ReferA4TreatingConsultant->lookupOptions()) ?>;
fip_admissionsearch.lists["x_patient_id"] = <?php echo $ip_admission_search->patient_id->Lookup->toClientList() ?>;
fip_admissionsearch.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_search->patient_id->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fip_admissionsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_admission_date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->admission_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_release_date");
	if (elm && !ew.checkShortEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->release_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillClosingDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->BillClosingDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_bllcloseByDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->bllcloseByDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amound");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->Amound->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Cid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->Cid->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PartId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ip_admission->PartId->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ip_admission_search->showPageHeader(); ?>
<?php
$ip_admission_search->showMessage();
?>
<form name="fip_admissionsearch" id="fip_admissionsearch" class="<?php echo $ip_admission_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ip_admission_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ip_admission_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$ip_admission_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($ip_admission->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_id"><?php echo $ip_admission->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->id->cellAttributes() ?>>
			<span id="el_ip_admission_id">
<input type="text" data-table="ip_admission" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($ip_admission->id->getPlaceHolder()) ?>" value="<?php echo $ip_admission->id->EditValue ?>"<?php echo $ip_admission->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label for="x_mrnNo" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_mrnNo"><?php echo $ip_admission->mrnNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->mrnNo->cellAttributes() ?>>
			<span id="el_ip_admission_mrnNo">
<input type="text" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission->mrnNo->EditValue ?>"<?php echo $ip_admission->mrnNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PatientID"><?php echo $ip_admission->PatientID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PatientID->cellAttributes() ?>>
			<span id="el_ip_admission_PatientID">
<input type="text" data-table="ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->PatientID->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PatientID->EditValue ?>"<?php echo $ip_admission->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label for="x_patient_name" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_patient_name"><?php echo $ip_admission->patient_name->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->patient_name->cellAttributes() ?>>
			<span id="el_ip_admission_patient_name">
<input type="text" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $ip_admission->patient_name->EditValue ?>"<?php echo $ip_admission->patient_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label for="x_mobileno" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_mobileno"><?php echo $ip_admission->mobileno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->mobileno->cellAttributes() ?>>
			<span id="el_ip_admission_mobileno">
<input type="text" data-table="ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->mobileno->getPlaceHolder()) ?>" value="<?php echo $ip_admission->mobileno->EditValue ?>"<?php echo $ip_admission->mobileno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_gender"><?php echo $ip_admission->gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_gender" id="z_gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->gender->cellAttributes() ?>>
			<span id="el_ip_admission_gender">
<?php
$wrkonchange = "" . trim(@$ip_admission->gender->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ip_admission->gender->EditAttrs["onchange"] = "";
?>
<span id="as_x_gender" class="text-nowrap" style="z-index: 8940">
	<input type="text" class="form-control" name="sv_x_gender" id="sv_x_gender" value="<?php echo RemoveHtml($ip_admission->gender->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->gender->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ip_admission->gender->getPlaceHolder()) ?>"<?php echo $ip_admission->gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="ip_admission" data-field="x_gender" data-value-separator="<?php echo $ip_admission->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="<?php echo HtmlEncode($ip_admission->gender->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fip_admissionsearch.createAutoSuggest({"id":"x_gender","forceSelect":false});
</script>
<?php echo $ip_admission->gender->Lookup->getParamTag("p_x_gender") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label for="x_age" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_age"><?php echo $ip_admission->age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_age" id="z_age" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->age->cellAttributes() ?>>
			<span id="el_ip_admission_age">
<input type="text" data-table="ip_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->age->getPlaceHolder()) ?>" value="<?php echo $ip_admission->age->EditValue ?>"<?php echo $ip_admission->age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label for="x_typeRegsisteration" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_typeRegsisteration"><?php echo $ip_admission->typeRegsisteration->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->typeRegsisteration->cellAttributes() ?>>
			<span id="el_ip_admission_typeRegsisteration">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $ip_admission->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $ip_admission->typeRegsisteration->editAttributes() ?>>
		<?php echo $ip_admission->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
	</select>
</div>
<?php echo $ip_admission->typeRegsisteration->Lookup->getParamTag("p_x_typeRegsisteration") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label for="x_PaymentCategory" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PaymentCategory"><?php echo $ip_admission->PaymentCategory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PaymentCategory->cellAttributes() ?>>
			<span id="el_ip_admission_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $ip_admission->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $ip_admission->PaymentCategory->editAttributes() ?>>
		<?php echo $ip_admission->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
	</select>
</div>
<?php echo $ip_admission->PaymentCategory->Lookup->getParamTag("p_x_PaymentCategory") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label for="x_physician_id" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_physician_id"><?php echo $ip_admission->physician_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_physician_id" id="z_physician_id" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->physician_id->cellAttributes() ?>>
			<span id="el_ip_admission_physician_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_physician_id" data-value-separator="<?php echo $ip_admission->physician_id->displayValueSeparatorAttribute() ?>" id="x_physician_id" name="x_physician_id"<?php echo $ip_admission->physician_id->editAttributes() ?>>
		<?php echo $ip_admission->physician_id->selectOptionListHtml("x_physician_id") ?>
	</select>
</div>
<?php echo $ip_admission->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label for="x_admission_consultant_id" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_admission_consultant_id"><?php echo $ip_admission->admission_consultant_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->admission_consultant_id->cellAttributes() ?>>
			<span id="el_ip_admission_admission_consultant_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_admission_consultant_id" data-value-separator="<?php echo $ip_admission->admission_consultant_id->displayValueSeparatorAttribute() ?>" id="x_admission_consultant_id" name="x_admission_consultant_id"<?php echo $ip_admission->admission_consultant_id->editAttributes() ?>>
		<?php echo $ip_admission->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
	</select>
</div>
<?php echo $ip_admission->admission_consultant_id->Lookup->getParamTag("p_x_admission_consultant_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label for="x_leading_consultant_id" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_leading_consultant_id"><?php echo $ip_admission->leading_consultant_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_leading_consultant_id" id="z_leading_consultant_id" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->leading_consultant_id->cellAttributes() ?>>
			<span id="el_ip_admission_leading_consultant_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_leading_consultant_id" data-value-separator="<?php echo $ip_admission->leading_consultant_id->displayValueSeparatorAttribute() ?>" id="x_leading_consultant_id" name="x_leading_consultant_id"<?php echo $ip_admission->leading_consultant_id->editAttributes() ?>>
		<?php echo $ip_admission->leading_consultant_id->selectOptionListHtml("x_leading_consultant_id") ?>
	</select>
</div>
<?php echo $ip_admission->leading_consultant_id->Lookup->getParamTag("p_x_leading_consultant_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label for="x_cause" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_cause"><?php echo $ip_admission->cause->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_cause" id="z_cause" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->cause->cellAttributes() ?>>
			<span id="el_ip_admission_cause">
<input type="text" data-table="ip_admission" data-field="x_cause" name="x_cause" id="x_cause" size="35" placeholder="<?php echo HtmlEncode($ip_admission->cause->getPlaceHolder()) ?>" value="<?php echo $ip_admission->cause->EditValue ?>"<?php echo $ip_admission->cause->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label for="x_admission_date" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_admission_date"><?php echo $ip_admission->admission_date->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_admission_date" id="z_admission_date" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->admission_date->cellAttributes() ?>>
			<span id="el_ip_admission_admission_date">
<input type="text" data-table="ip_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($ip_admission->admission_date->getPlaceHolder()) ?>" value="<?php echo $ip_admission->admission_date->EditValue ?>"<?php echo $ip_admission->admission_date->editAttributes() ?>>
<?php if (!$ip_admission->admission_date->ReadOnly && !$ip_admission->admission_date->Disabled && !isset($ip_admission->admission_date->EditAttrs["readonly"]) && !isset($ip_admission->admission_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label for="x_release_date" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_release_date"><?php echo $ip_admission->release_date->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_release_date" id="z_release_date" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->release_date->cellAttributes() ?>>
			<span id="el_ip_admission_release_date">
<input type="text" data-table="ip_admission" data-field="x_release_date" data-format="17" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($ip_admission->release_date->getPlaceHolder()) ?>" value="<?php echo $ip_admission->release_date->EditValue ?>"<?php echo $ip_admission->release_date->editAttributes() ?>>
<?php if (!$ip_admission->release_date->ReadOnly && !$ip_admission->release_date->Disabled && !isset($ip_admission->release_date->EditAttrs["readonly"]) && !isset($ip_admission->release_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":17});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label for="x_PaymentStatus" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PaymentStatus"><?php echo $ip_admission->PaymentStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PaymentStatus" id="z_PaymentStatus" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PaymentStatus->cellAttributes() ?>>
			<span id="el_ip_admission_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $ip_admission->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $ip_admission->PaymentStatus->editAttributes() ?>>
		<?php echo $ip_admission->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
	</select>
</div>
<?php echo $ip_admission->PaymentStatus->Lookup->getParamTag("p_x_PaymentStatus") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_status"><?php echo $ip_admission->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->status->cellAttributes() ?>>
			<span id="el_ip_admission_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_status" data-value-separator="<?php echo $ip_admission->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ip_admission->status->editAttributes() ?>>
		<?php echo $ip_admission->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $ip_admission->status->Lookup->getParamTag("p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_createdby"><?php echo $ip_admission->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->createdby->cellAttributes() ?>>
			<span id="el_ip_admission_createdby">
<input type="text" data-table="ip_admission" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ip_admission->createdby->getPlaceHolder()) ?>" value="<?php echo $ip_admission->createdby->EditValue ?>"<?php echo $ip_admission->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_createddatetime"><?php echo $ip_admission->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->createddatetime->cellAttributes() ?>>
			<span id="el_ip_admission_createddatetime">
<input type="text" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ip_admission->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ip_admission->createddatetime->EditValue ?>"<?php echo $ip_admission->createddatetime->editAttributes() ?>>
<?php if (!$ip_admission->createddatetime->ReadOnly && !$ip_admission->createddatetime->Disabled && !isset($ip_admission->createddatetime->EditAttrs["readonly"]) && !isset($ip_admission->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_modifiedby"><?php echo $ip_admission->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->modifiedby->cellAttributes() ?>>
			<span id="el_ip_admission_modifiedby">
<input type="text" data-table="ip_admission" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ip_admission->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ip_admission->modifiedby->EditValue ?>"<?php echo $ip_admission->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_modifieddatetime"><?php echo $ip_admission->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->modifieddatetime->cellAttributes() ?>>
			<span id="el_ip_admission_modifieddatetime">
<input type="text" data-table="ip_admission" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ip_admission->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ip_admission->modifieddatetime->EditValue ?>"<?php echo $ip_admission->modifieddatetime->editAttributes() ?>>
<?php if (!$ip_admission->modifieddatetime->ReadOnly && !$ip_admission->modifieddatetime->Disabled && !isset($ip_admission->modifieddatetime->EditAttrs["readonly"]) && !isset($ip_admission->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_profilePic"><?php echo $ip_admission->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->profilePic->cellAttributes() ?>>
			<span id="el_ip_admission_profilePic">
<input type="text" data-table="ip_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($ip_admission->profilePic->getPlaceHolder()) ?>" value="<?php echo $ip_admission->profilePic->EditValue ?>"<?php echo $ip_admission->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_HospID"><?php echo $ip_admission->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->HospID->cellAttributes() ?>>
			<span id="el_ip_admission_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ip_admission" data-field="x_HospID" data-value-separator="<?php echo $ip_admission->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $ip_admission->HospID->editAttributes() ?>>
		<?php echo $ip_admission->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $ip_admission->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label for="x_DOB" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_DOB"><?php echo $ip_admission->DOB->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DOB" id="z_DOB" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->DOB->cellAttributes() ?>>
			<span id="el_ip_admission_DOB">
<input type="text" data-table="ip_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($ip_admission->DOB->getPlaceHolder()) ?>" value="<?php echo $ip_admission->DOB->EditValue ?>"<?php echo $ip_admission->DOB->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label for="x_ReferedByDr" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReferedByDr"><?php echo $ip_admission->ReferedByDr->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReferedByDr->cellAttributes() ?>>
			<span id="el_ip_admission_ReferedByDr">
<input type="text" data-table="ip_admission" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" placeholder="<?php echo HtmlEncode($ip_admission->ReferedByDr->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReferedByDr->EditValue ?>"<?php echo $ip_admission->ReferedByDr->editAttributes() ?>>
<?php echo $ip_admission->ReferedByDr->Lookup->getParamTag("p_x_ReferedByDr") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label for="x_ReferClinicname" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReferClinicname"><?php echo $ip_admission->ReferClinicname->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReferClinicname->cellAttributes() ?>>
			<span id="el_ip_admission_ReferClinicname">
<input type="text" data-table="ip_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReferClinicname->EditValue ?>"<?php echo $ip_admission->ReferClinicname->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label for="x_ReferCity" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReferCity"><?php echo $ip_admission->ReferCity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReferCity->cellAttributes() ?>>
			<span id="el_ip_admission_ReferCity">
<input type="text" data-table="ip_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ReferCity->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReferCity->EditValue ?>"<?php echo $ip_admission->ReferCity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label for="x_ReferMobileNo" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReferMobileNo"><?php echo $ip_admission->ReferMobileNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReferMobileNo->cellAttributes() ?>>
			<span id="el_ip_admission_ReferMobileNo">
<input type="text" data-table="ip_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReferMobileNo->EditValue ?>"<?php echo $ip_admission->ReferMobileNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label for="x_ReferA4TreatingConsultant" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant"><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
			<span id="el_ip_admission_ReferA4TreatingConsultant">
<input type="text" data-table="ip_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" placeholder="<?php echo HtmlEncode($ip_admission->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReferA4TreatingConsultant->EditValue ?>"<?php echo $ip_admission->ReferA4TreatingConsultant->editAttributes() ?>>
<?php echo $ip_admission->ReferA4TreatingConsultant->Lookup->getParamTag("p_x_ReferA4TreatingConsultant") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label for="x_PurposreReferredfor" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PurposreReferredfor"><?php echo $ip_admission->PurposreReferredfor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PurposreReferredfor->cellAttributes() ?>>
			<span id="el_ip_admission_PurposreReferredfor">
<input type="text" data-table="ip_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PurposreReferredfor->EditValue ?>"<?php echo $ip_admission->PurposreReferredfor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label for="x_BillClosing" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_BillClosing"><?php echo $ip_admission->BillClosing->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->BillClosing->cellAttributes() ?>>
			<span id="el_ip_admission_BillClosing">
<input type="text" data-table="ip_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->BillClosing->getPlaceHolder()) ?>" value="<?php echo $ip_admission->BillClosing->EditValue ?>"<?php echo $ip_admission->BillClosing->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label for="x_BillClosingDate" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_BillClosingDate"><?php echo $ip_admission->BillClosingDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillClosingDate" id="z_BillClosingDate" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->BillClosingDate->cellAttributes() ?>>
			<span id="el_ip_admission_BillClosingDate">
<input type="text" data-table="ip_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($ip_admission->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $ip_admission->BillClosingDate->EditValue ?>"<?php echo $ip_admission->BillClosingDate->editAttributes() ?>>
<?php if (!$ip_admission->BillClosingDate->ReadOnly && !$ip_admission->BillClosingDate->Disabled && !isset($ip_admission->BillClosingDate->EditAttrs["readonly"]) && !isset($ip_admission->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_BillNumber"><?php echo $ip_admission->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->BillNumber->cellAttributes() ?>>
			<span id="el_ip_admission_BillNumber">
<input type="text" data-table="ip_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->BillNumber->getPlaceHolder()) ?>" value="<?php echo $ip_admission->BillNumber->EditValue ?>"<?php echo $ip_admission->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label for="x_ClosingAmount" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ClosingAmount"><?php echo $ip_admission->ClosingAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ClosingAmount" id="z_ClosingAmount" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ClosingAmount->cellAttributes() ?>>
			<span id="el_ip_admission_ClosingAmount">
<input type="text" data-table="ip_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ClosingAmount->EditValue ?>"<?php echo $ip_admission->ClosingAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label for="x_ClosingType" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ClosingType"><?php echo $ip_admission->ClosingType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ClosingType" id="z_ClosingType" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ClosingType->cellAttributes() ?>>
			<span id="el_ip_admission_ClosingType">
<input type="text" data-table="ip_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ClosingType->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ClosingType->EditValue ?>"<?php echo $ip_admission->ClosingType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label for="x_BillAmount" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_BillAmount"><?php echo $ip_admission->BillAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillAmount" id="z_BillAmount" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->BillAmount->cellAttributes() ?>>
			<span id="el_ip_admission_BillAmount">
<input type="text" data-table="ip_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->BillAmount->getPlaceHolder()) ?>" value="<?php echo $ip_admission->BillAmount->EditValue ?>"<?php echo $ip_admission->BillAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label for="x_billclosedBy" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_billclosedBy"><?php echo $ip_admission->billclosedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_billclosedBy" id="z_billclosedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->billclosedBy->cellAttributes() ?>>
			<span id="el_ip_admission_billclosedBy">
<input type="text" data-table="ip_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $ip_admission->billclosedBy->EditValue ?>"<?php echo $ip_admission->billclosedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label for="x_bllcloseByDate" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_bllcloseByDate"><?php echo $ip_admission->bllcloseByDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_bllcloseByDate" id="z_bllcloseByDate" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->bllcloseByDate->cellAttributes() ?>>
			<span id="el_ip_admission_bllcloseByDate">
<input type="text" data-table="ip_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($ip_admission->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $ip_admission->bllcloseByDate->EditValue ?>"<?php echo $ip_admission->bllcloseByDate->editAttributes() ?>>
<?php if (!$ip_admission->bllcloseByDate->ReadOnly && !$ip_admission->bllcloseByDate->Disabled && !isset($ip_admission->bllcloseByDate->EditAttrs["readonly"]) && !isset($ip_admission->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fip_admissionsearch", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label for="x_ReportHeader" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_ReportHeader"><?php echo $ip_admission->ReportHeader->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->ReportHeader->cellAttributes() ?>>
			<span id="el_ip_admission_ReportHeader">
<input type="text" data-table="ip_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->ReportHeader->getPlaceHolder()) ?>" value="<?php echo $ip_admission->ReportHeader->EditValue ?>"<?php echo $ip_admission->ReportHeader->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label for="x_Procedure" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Procedure"><?php echo $ip_admission->Procedure->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Procedure->cellAttributes() ?>>
			<span id="el_ip_admission_Procedure">
<input type="text" data-table="ip_admission" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->Procedure->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Procedure->EditValue ?>"<?php echo $ip_admission->Procedure->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label for="x_Consultant" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Consultant"><?php echo $ip_admission->Consultant->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Consultant" id="z_Consultant" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Consultant->cellAttributes() ?>>
			<span id="el_ip_admission_Consultant">
<input type="text" data-table="ip_admission" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->Consultant->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Consultant->EditValue ?>"<?php echo $ip_admission->Consultant->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label for="x_Anesthetist" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Anesthetist"><?php echo $ip_admission->Anesthetist->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Anesthetist" id="z_Anesthetist" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Anesthetist->cellAttributes() ?>>
			<span id="el_ip_admission_Anesthetist">
<input type="text" data-table="ip_admission" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->Anesthetist->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Anesthetist->EditValue ?>"<?php echo $ip_admission->Anesthetist->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label for="x_Amound" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Amound"><?php echo $ip_admission->Amound->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amound" id="z_Amound" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Amound->cellAttributes() ?>>
			<span id="el_ip_admission_Amound">
<input type="text" data-table="ip_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?php echo HtmlEncode($ip_admission->Amound->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Amound->EditValue ?>"<?php echo $ip_admission->Amound->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label for="x_Package" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Package"><?php echo $ip_admission->Package->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Package" id="z_Package" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Package->cellAttributes() ?>>
			<span id="el_ip_admission_Package">
<input type="text" data-table="ip_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->Package->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Package->EditValue ?>"<?php echo $ip_admission->Package->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label for="x_patient_id" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_patient_id"><?php echo $ip_admission->patient_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_patient_id" id="z_patient_id" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->patient_id->cellAttributes() ?>>
			<span id="el_ip_admission_patient_id">
<input type="text" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?php echo HtmlEncode($ip_admission->patient_id->getPlaceHolder()) ?>" value="<?php echo $ip_admission->patient_id->EditValue ?>"<?php echo $ip_admission->patient_id->editAttributes() ?>>
<?php echo $ip_admission->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerID"><?php echo $ip_admission->PartnerID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PartnerID->cellAttributes() ?>>
			<span id="el_ip_admission_PartnerID">
<input type="text" data-table="ip_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PartnerID->EditValue ?>"<?php echo $ip_admission->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerName"><?php echo $ip_admission->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PartnerName->cellAttributes() ?>>
			<span id="el_ip_admission_PartnerName">
<input type="text" data-table="ip_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PartnerName->EditValue ?>"<?php echo $ip_admission->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label for="x_PartnerMobile" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PartnerMobile"><?php echo $ip_admission->PartnerMobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PartnerMobile->cellAttributes() ?>>
			<span id="el_ip_admission_PartnerMobile">
<input type="text" data-table="ip_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PartnerMobile->EditValue ?>"<?php echo $ip_admission->PartnerMobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label for="x_Cid" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Cid"><?php echo $ip_admission->Cid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Cid" id="z_Cid" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Cid->cellAttributes() ?>>
			<span id="el_ip_admission_Cid">
<input type="text" data-table="ip_admission" data-field="x_Cid" name="x_Cid" id="x_Cid" size="30" placeholder="<?php echo HtmlEncode($ip_admission->Cid->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Cid->EditValue ?>"<?php echo $ip_admission->Cid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label for="x_PartId" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_PartId"><?php echo $ip_admission->PartId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PartId" id="z_PartId" value="="></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->PartId->cellAttributes() ?>>
			<span id="el_ip_admission_PartId">
<input type="text" data-table="ip_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($ip_admission->PartId->getPlaceHolder()) ?>" value="<?php echo $ip_admission->PartId->EditValue ?>"<?php echo $ip_admission->PartId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label for="x_IDProof" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_IDProof"><?php echo $ip_admission->IDProof->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IDProof" id="z_IDProof" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->IDProof->cellAttributes() ?>>
			<span id="el_ip_admission_IDProof">
<input type="text" data-table="ip_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($ip_admission->IDProof->getPlaceHolder()) ?>" value="<?php echo $ip_admission->IDProof->EditValue ?>"<?php echo $ip_admission->IDProof->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label for="x_AdviceToOtherHospital" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_AdviceToOtherHospital"><?php echo $ip_admission->AdviceToOtherHospital->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AdviceToOtherHospital" id="z_AdviceToOtherHospital" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
			<span id="el_ip_admission_AdviceToOtherHospital">
<input type="text" data-table="ip_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ip_admission->AdviceToOtherHospital->getPlaceHolder()) ?>" value="<?php echo $ip_admission->AdviceToOtherHospital->EditValue ?>"<?php echo $ip_admission->AdviceToOtherHospital->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ip_admission->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label for="x_Reason" class="<?php echo $ip_admission_search->LeftColumnClass ?>"><span id="elh_ip_admission_Reason"><?php echo $ip_admission->Reason->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Reason" id="z_Reason" value="LIKE"></span>
		</label>
		<div class="<?php echo $ip_admission_search->RightColumnClass ?>"><div<?php echo $ip_admission->Reason->cellAttributes() ?>>
			<span id="el_ip_admission_Reason">
<input type="text" data-table="ip_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" size="35" placeholder="<?php echo HtmlEncode($ip_admission->Reason->getPlaceHolder()) ?>" value="<?php echo $ip_admission->Reason->EditValue ?>"<?php echo $ip_admission->Reason->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ip_admission_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ip_admission_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ip_admission_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ip_admission_search->terminate();
?>