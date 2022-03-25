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
$view_ip_patient_admission_search = new view_ip_patient_admission_search();

// Run the page
$view_ip_patient_admission_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_ip_patient_admission_search->IsModal) { ?>
var fview_ip_patient_admissionsearch = currentAdvancedSearchForm = new ew.Form("fview_ip_patient_admissionsearch", "search");
<?php } else { ?>
var fview_ip_patient_admissionsearch = currentForm = new ew.Form("fview_ip_patient_admissionsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_ip_patient_admissionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissionsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_patient_admissionsearch.lists["x_typeRegsisteration"] = <?php echo $view_ip_patient_admission_search->typeRegsisteration->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($view_ip_patient_admission_search->typeRegsisteration->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_PaymentCategory"] = <?php echo $view_ip_patient_admission_search->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_patient_admission_search->PaymentCategory->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_search->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_search->PaymentStatus->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_HospID"] = <?php echo $view_ip_patient_admission_search->HospID->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_search->HospID->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_search->ReferedByDr->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_search->ReferedByDr->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_search->BillClosing->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionsearch.lists["x_ReportHeader[]"] = <?php echo $view_ip_patient_admission_search->ReportHeader->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionsearch.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_search->Procedure->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Procedure->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_search->Consultant->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Consultant->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_search->Anesthetist->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Anesthetist->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_physician_id"] = <?php echo $view_ip_patient_admission_search->physician_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_physician_id"].options = <?php echo JsonEncode($view_ip_patient_admission_search->physician_id->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_patient_id"] = <?php echo $view_ip_patient_admission_search->patient_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_patient_id"].options = <?php echo JsonEncode($view_ip_patient_admission_search->patient_id->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_Cid"] = <?php echo $view_ip_patient_admission_search->Cid->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Cid->lookupOptions()) ?>;
fview_ip_patient_admissionsearch.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->Lookup->toClientList() ?>;
fview_ip_patient_admissionsearch.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

fview_ip_patient_admissionsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_admission_consultant_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->admission_consultant_id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_leading_consultant_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->leading_consultant_id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_admission_date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->admission_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_release_date");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->release_date->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_status");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->status->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillClosingDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->BillClosingDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_bllcloseByDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->bllcloseByDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amound");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->Amound->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PartId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission->PartId->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ip_patient_admission_search->showPageHeader(); ?>
<?php
$view_ip_patient_admission_search->showMessage();
?>
<form name="fview_ip_patient_admissionsearch" id="fview_ip_patient_admissionsearch" class="<?php echo $view_ip_patient_admission_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_patient_admission_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_patient_admission_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_id"><?php echo $view_ip_patient_admission->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->id->EditValue ?>"<?php echo $view_ip_patient_admission->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label for="x_mrnNo" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mrnNo"><?php echo $view_ip_patient_admission->mrnNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->mrnNo->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_mrnNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission->mrnNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PatientID"><?php echo $view_ip_patient_admission->PatientID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PatientID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PatientID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label for="x_patient_name" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_name"><?php echo $view_ip_patient_admission->patient_name->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->patient_name->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_patient_name">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission->patient_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label for="x_mobileno" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mobileno"><?php echo $view_ip_patient_admission->mobileno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->mobileno->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_mobileno">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission->mobileno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_profilePic"><?php echo $view_ip_patient_admission->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->profilePic->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_profilePic">
<input type="text" data-table="view_ip_patient_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->profilePic->EditValue ?>"<?php echo $view_ip_patient_admission->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label for="x_gender" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_gender"><?php echo $view_ip_patient_admission->gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_gender" id="z_gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->gender->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_gender">
<input type="text" data-table="view_ip_patient_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->gender->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->gender->EditValue ?>"<?php echo $view_ip_patient_admission->gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label for="x_age" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_age"><?php echo $view_ip_patient_admission->age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_age" id="z_age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->age->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_age">
<input type="text" data-table="view_ip_patient_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->age->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->age->EditValue ?>"<?php echo $view_ip_patient_admission->age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label for="x_Package" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Package"><?php echo $view_ip_patient_admission->Package->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Package" id="z_Package" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Package->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Package">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->Package->EditValue ?>"<?php echo $view_ip_patient_admission->Package->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label for="x_typeRegsisteration" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_typeRegsisteration"><?php echo $view_ip_patient_admission->typeRegsisteration->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->typeRegsisteration->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_typeRegsisteration">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $view_ip_patient_admission->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $view_ip_patient_admission->typeRegsisteration->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->typeRegsisteration->Lookup->getParamTag("p_x_typeRegsisteration") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label for="x_PaymentCategory" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentCategory"><?php echo $view_ip_patient_admission->PaymentCategory->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PaymentCategory->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PaymentCategory">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_patient_admission->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_patient_admission->PaymentCategory->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->PaymentCategory->Lookup->getParamTag("p_x_PaymentCategory") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label for="x_admission_consultant_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_consultant_id"><?php echo $view_ip_patient_admission->admission_consultant_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->admission_consultant_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_admission_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->admission_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->admission_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission->admission_consultant_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label for="x_leading_consultant_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_leading_consultant_id"><?php echo $view_ip_patient_admission->leading_consultant_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_leading_consultant_id" id="z_leading_consultant_id" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->leading_consultant_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_leading_consultant_id">
<input type="text" data-table="view_ip_patient_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->leading_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->leading_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission->leading_consultant_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label for="x_cause" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_cause"><?php echo $view_ip_patient_admission->cause->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_cause" id="z_cause" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->cause->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_cause">
<input type="text" data-table="view_ip_patient_admission" data-field="x_cause" name="x_cause" id="x_cause" size="35" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->cause->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->cause->EditValue ?>"<?php echo $view_ip_patient_admission->cause->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label for="x_admission_date" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_date"><?php echo $view_ip_patient_admission->admission_date->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_admission_date" id="z_admission_date" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->admission_date->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_admission_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->admission_date->EditValue ?>"<?php echo $view_ip_patient_admission->admission_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->admission_date->ReadOnly && !$view_ip_patient_admission->admission_date->Disabled && !isset($view_ip_patient_admission->admission_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->admission_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label for="x_release_date" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_release_date"><?php echo $view_ip_patient_admission->release_date->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_release_date" id="z_release_date" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->release_date->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_release_date">
<input type="text" data-table="view_ip_patient_admission" data-field="x_release_date" data-format="11" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->release_date->EditValue ?>"<?php echo $view_ip_patient_admission->release_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->release_date->ReadOnly && !$view_ip_patient_admission->release_date->Disabled && !isset($view_ip_patient_admission->release_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->release_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label for="x_PaymentStatus" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentStatus"><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PaymentStatus" id="z_PaymentStatus" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PaymentStatus->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PaymentStatus">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_patient_admission->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_patient_admission->PaymentStatus->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->PaymentStatus->Lookup->getParamTag("p_x_PaymentStatus") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_status"><?php echo $view_ip_patient_admission->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->status->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_status">
<input type="text" data-table="view_ip_patient_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->status->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->status->EditValue ?>"<?php echo $view_ip_patient_admission->status->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createdby"><?php echo $view_ip_patient_admission->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->createdby->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_createdby">
<input type="text" data-table="view_ip_patient_admission" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->createdby->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->createdby->EditValue ?>"<?php echo $view_ip_patient_admission->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createddatetime"><?php echo $view_ip_patient_admission->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->createddatetime->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_createddatetime">
<input type="text" data-table="view_ip_patient_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->createddatetime->EditValue ?>"<?php echo $view_ip_patient_admission->createddatetime->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->createddatetime->ReadOnly && !$view_ip_patient_admission->createddatetime->Disabled && !isset($view_ip_patient_admission->createddatetime->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifiedby"><?php echo $view_ip_patient_admission->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->modifiedby->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_modifiedby">
<input type="text" data-table="view_ip_patient_admission" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->modifiedby->EditValue ?>"<?php echo $view_ip_patient_admission->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifieddatetime"><?php echo $view_ip_patient_admission->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_modifieddatetime">
<input type="text" data-table="view_ip_patient_admission" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->modifieddatetime->EditValue ?>"<?php echo $view_ip_patient_admission->modifieddatetime->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->modifieddatetime->ReadOnly && !$view_ip_patient_admission->modifieddatetime->Disabled && !isset($view_ip_patient_admission->modifieddatetime->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_HospID"><?php echo $view_ip_patient_admission->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HospID" id="z_HospID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->HospID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_HospID" data-value-separator="<?php echo $view_ip_patient_admission->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_ip_patient_admission->HospID->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label for="x_ReferedByDr" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferedByDr"><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferedByDr->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferedByDr">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?php echo strval($view_ip_patient_admission->ReferedByDr->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->ReferedByDr->AdvancedSearch->ViewValue) : $view_ip_patient_admission->ReferedByDr->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->ReferedByDr->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->ReferedByDr->ReadOnly || $view_ip_patient_admission->ReferedByDr->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->ReferedByDr->Lookup->getParamTag("p_x_ReferedByDr") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_ReferedByDr" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?php echo $view_ip_patient_admission->ReferedByDr->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission->ReferedByDr->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label for="x_ReferClinicname" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferClinicname"><?php echo $view_ip_patient_admission->ReferClinicname->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferClinicname->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferClinicname">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferClinicname->EditValue ?>"<?php echo $view_ip_patient_admission->ReferClinicname->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label for="x_ReferCity" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferCity"><?php echo $view_ip_patient_admission->ReferCity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferCity->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferCity">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferCity->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferCity->EditValue ?>"<?php echo $view_ip_patient_admission->ReferCity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label for="x_ReferMobileNo" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferMobileNo"><?php echo $view_ip_patient_admission->ReferMobileNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferMobileNo->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferMobileNo">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferMobileNo->EditValue ?>"<?php echo $view_ip_patient_admission->ReferMobileNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferA4TreatingConsultant"><?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label for="x_PurposreReferredfor" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PurposreReferredfor"><?php echo $view_ip_patient_admission->PurposreReferredfor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PurposreReferredfor->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PurposreReferredfor">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PurposreReferredfor->EditValue ?>"<?php echo $view_ip_patient_admission->PurposreReferredfor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosing"><?php echo $view_ip_patient_admission->BillClosing->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillClosing->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillClosing">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_patient_admission->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_ip_patient_admission->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label for="x_BillClosingDate" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosingDate"><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillClosingDate" id="z_BillClosingDate" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillClosingDate->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillClosingDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillClosingDate->EditValue ?>"<?php echo $view_ip_patient_admission->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->BillClosingDate->ReadOnly && !$view_ip_patient_admission->BillClosingDate->Disabled && !isset($view_ip_patient_admission->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillNumber"><?php echo $view_ip_patient_admission->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillNumber->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillNumber">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillNumber->EditValue ?>"<?php echo $view_ip_patient_admission->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label for="x_ClosingAmount" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingAmount"><?php echo $view_ip_patient_admission->ClosingAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ClosingAmount" id="z_ClosingAmount" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ClosingAmount->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ClosingAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ClosingAmount->EditValue ?>"<?php echo $view_ip_patient_admission->ClosingAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label for="x_ClosingType" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingType"><?php echo $view_ip_patient_admission->ClosingType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ClosingType" id="z_ClosingType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ClosingType->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ClosingType">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->ClosingType->EditValue ?>"<?php echo $view_ip_patient_admission->ClosingType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label for="x_BillAmount" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillAmount"><?php echo $view_ip_patient_admission->BillAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillAmount" id="z_BillAmount" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->BillAmount->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillAmount">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->BillAmount->EditValue ?>"<?php echo $view_ip_patient_admission->BillAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label for="x_billclosedBy" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_billclosedBy"><?php echo $view_ip_patient_admission->billclosedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_billclosedBy" id="z_billclosedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->billclosedBy->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_billclosedBy">
<input type="text" data-table="view_ip_patient_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->billclosedBy->EditValue ?>"<?php echo $view_ip_patient_admission->billclosedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label for="x_bllcloseByDate" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_bllcloseByDate"><?php echo $view_ip_patient_admission->bllcloseByDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_bllcloseByDate" id="z_bllcloseByDate" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->bllcloseByDate->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_bllcloseByDate">
<input type="text" data-table="view_ip_patient_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->bllcloseByDate->EditValue ?>"<?php echo $view_ip_patient_admission->bllcloseByDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission->bllcloseByDate->ReadOnly && !$view_ip_patient_admission->bllcloseByDate->Disabled && !isset($view_ip_patient_admission->bllcloseByDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReportHeader"><?php echo $view_ip_patient_admission->ReportHeader->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->ReportHeader->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReportHeader">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_patient_admission->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_patient_admission->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label for="x_Procedure" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Procedure"><?php echo $view_ip_patient_admission->Procedure->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Procedure->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Procedure">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo strval($view_ip_patient_admission->Procedure->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->Procedure->AdvancedSearch->ViewValue) : $view_ip_patient_admission->Procedure->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->Procedure->ReadOnly || $view_ip_patient_admission->Procedure->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->Procedure->Lookup->getParamTag("p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_patient_admission->Procedure->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission->Procedure->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label for="x_Consultant" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Consultant"><?php echo $view_ip_patient_admission->Consultant->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Consultant" id="z_Consultant" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Consultant->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Consultant" data-value-separator="<?php echo $view_ip_patient_admission->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $view_ip_patient_admission->Consultant->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->Consultant->selectOptionListHtml("x_Consultant") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->Consultant->Lookup->getParamTag("p_x_Consultant") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label for="x_Anesthetist" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Anesthetist"><?php echo $view_ip_patient_admission->Anesthetist->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Anesthetist" id="z_Anesthetist" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Anesthetist->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Anesthetist" data-value-separator="<?php echo $view_ip_patient_admission->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $view_ip_patient_admission->Anesthetist->editAttributes() ?>>
		<?php echo $view_ip_patient_admission->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
	</select>
</div>
<?php echo $view_ip_patient_admission->Anesthetist->Lookup->getParamTag("p_x_Anesthetist") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label for="x_Amound" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Amound"><?php echo $view_ip_patient_admission->Amound->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amound" id="z_Amound" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Amound->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Amound">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->Amound->EditValue ?>"<?php echo $view_ip_patient_admission->Amound->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label for="x_physician_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_physician_id"><?php echo $view_ip_patient_admission->physician_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_physician_id" id="z_physician_id" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->physician_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_physician_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_physician_id"><?php echo strval($view_ip_patient_admission->physician_id->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->physician_id->AdvancedSearch->ViewValue) : $view_ip_patient_admission->physician_id->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->physician_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->physician_id->ReadOnly || $view_ip_patient_admission->physician_id->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_physician_id',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->physician_id->Lookup->getParamTag("p_x_physician_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_physician_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->physician_id->displayValueSeparatorAttribute() ?>" name="x_physician_id" id="x_physician_id" value="<?php echo $view_ip_patient_admission->physician_id->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission->physician_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerID"><?php echo $view_ip_patient_admission->PartnerID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerID">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerID->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerName"><?php echo $view_ip_patient_admission->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerName->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerName">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerName->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label for="x_PartnerMobile" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerMobile"><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartnerMobile->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerMobile">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartnerMobile->EditValue ?>"<?php echo $view_ip_patient_admission->PartnerMobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label for="x_patient_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_id"><?php echo $view_ip_patient_admission->patient_id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_patient_id" id="z_patient_id" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->patient_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_patient_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo strval($view_ip_patient_admission->patient_id->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->patient_id->AdvancedSearch->ViewValue) : $view_ip_patient_admission->patient_id->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->patient_id->ReadOnly || $view_ip_patient_admission->patient_id->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->patient_id->Lookup->getParamTag("p_x_patient_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo $view_ip_patient_admission->patient_id->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission->patient_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label for="x_Cid" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Cid"><?php echo $view_ip_patient_admission->Cid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Cid" id="z_Cid" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Cid->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Cid">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Cid"><?php echo strval($view_ip_patient_admission->Cid->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_ip_patient_admission->Cid->AdvancedSearch->ViewValue) : $view_ip_patient_admission->Cid->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission->Cid->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_ip_patient_admission->Cid->ReadOnly || $view_ip_patient_admission->Cid->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Cid',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission->Cid->Lookup->getParamTag("p_x_Cid") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Cid" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission->Cid->displayValueSeparatorAttribute() ?>" name="x_Cid" id="x_Cid" value="<?php echo $view_ip_patient_admission->Cid->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission->Cid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label for="x_PartId" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartId"><?php echo $view_ip_patient_admission->PartId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PartId" id="z_PartId" value="="></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->PartId->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartId">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->PartId->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->PartId->EditValue ?>"<?php echo $view_ip_patient_admission->PartId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label for="x_IDProof" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_IDProof"><?php echo $view_ip_patient_admission->IDProof->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IDProof" id="z_IDProof" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->IDProof->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_IDProof">
<input type="text" data-table="view_ip_patient_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->IDProof->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->IDProof->EditValue ?>"<?php echo $view_ip_patient_admission->IDProof->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label for="x_DOB" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_DOB"><?php echo $view_ip_patient_admission->DOB->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DOB" id="z_DOB" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->DOB->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_DOB">
<input type="text" data-table="view_ip_patient_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->DOB->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->DOB->EditValue ?>"<?php echo $view_ip_patient_admission->DOB->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital"><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AdviceToOtherHospital" id="z_AdviceToOtherHospital" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->AdviceToOtherHospital->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<div id="tp_x_AdviceToOtherHospital" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_ip_patient_admission" data-field="x_AdviceToOtherHospital" data-value-separator="<?php echo $view_ip_patient_admission->AdviceToOtherHospital->displayValueSeparatorAttribute() ?>" name="x_AdviceToOtherHospital[]" id="x_AdviceToOtherHospital[]" value="{value}"<?php echo $view_ip_patient_admission->AdviceToOtherHospital->editAttributes() ?>></div>
<div id="dsl_x_AdviceToOtherHospital" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->checkBoxListHtml(FALSE, "x_AdviceToOtherHospital[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label for="x_Reason" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Reason"><?php echo $view_ip_patient_admission->Reason->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Reason" id="z_Reason" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div<?php echo $view_ip_patient_admission->Reason->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Reason">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" size="35" placeholder="<?php echo HtmlEncode($view_ip_patient_admission->Reason->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission->Reason->EditValue ?>"<?php echo $view_ip_patient_admission->Reason->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_ip_patient_admission_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ip_patient_admission_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_ip_patient_admission_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ip_patient_admission_search->terminate();
?>