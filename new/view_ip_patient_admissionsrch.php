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
<?php include_once "header.php"; ?>
<script>
var fview_ip_patient_admissionsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_ip_patient_admission_search->IsModal) { ?>
	fview_ip_patient_admissionsearch = currentAdvancedSearchForm = new ew.Form("fview_ip_patient_admissionsearch", "search");
	<?php } else { ?>
	fview_ip_patient_admissionsearch = currentForm = new ew.Form("fview_ip_patient_admissionsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_ip_patient_admissionsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_admission_consultant_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->admission_consultant_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_leading_consultant_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->leading_consultant_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_admission_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->admission_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_release_date");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->release_date->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_status");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->status->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->createdby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->modifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillClosingDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->BillClosingDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_bllcloseByDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->bllcloseByDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Amound");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->Amound->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PartId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_ip_patient_admission_search->PartId->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_ip_patient_admissionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_ip_patient_admissionsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_ip_patient_admissionsearch.lists["x_typeRegsisteration"] = <?php echo $view_ip_patient_admission_search->typeRegsisteration->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($view_ip_patient_admission_search->typeRegsisteration->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_PaymentCategory"] = <?php echo $view_ip_patient_admission_search->PaymentCategory->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_patient_admission_search->PaymentCategory->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_search->PaymentStatus->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_search->PaymentStatus->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_HospID"] = <?php echo $view_ip_patient_admission_search->HospID->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_search->HospID->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_search->ReferedByDr->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_search->ReferedByDr->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_search->BillClosing->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->BillClosing->options(FALSE, TRUE)) ?>;
	fview_ip_patient_admissionsearch.lists["x_ReportHeader[]"] = <?php echo $view_ip_patient_admission_search->ReportHeader->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->ReportHeader->options(FALSE, TRUE)) ?>;
	fview_ip_patient_admissionsearch.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_search->Procedure->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Procedure->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_search->Consultant->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Consultant->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_search->Anesthetist->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Anesthetist->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_physician_id"] = <?php echo $view_ip_patient_admission_search->physician_id->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_physician_id"].options = <?php echo JsonEncode($view_ip_patient_admission_search->physician_id->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_patient_id"] = <?php echo $view_ip_patient_admission_search->patient_id->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_patient_id"].options = <?php echo JsonEncode($view_ip_patient_admission_search->patient_id->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_Cid"] = <?php echo $view_ip_patient_admission_search->Cid->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_search->Cid->lookupOptions()) ?>;
	fview_ip_patient_admissionsearch.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->Lookup->toClientList($view_ip_patient_admission_search) ?>;
	fview_ip_patient_admissionsearch.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_search->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_ip_patient_admissionsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_ip_patient_admission_search->showPageHeader(); ?>
<?php
$view_ip_patient_admission_search->showMessage();
?>
<form name="fview_ip_patient_admissionsearch" id="fview_ip_patient_admissionsearch" class="<?php echo $view_ip_patient_admission_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_ip_patient_admission_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_id"><?php echo $view_ip_patient_admission_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_id" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->id->EditValue ?>"<?php echo $view_ip_patient_admission_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->mrnNo->Visible) { // mrnNo ?>
	<div id="r_mrnNo" class="form-group row">
		<label for="x_mrnNo" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mrnNo"><?php echo $view_ip_patient_admission_search->mrnNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnNo" id="z_mrnNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->mrnNo->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_mrnNo" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->mrnNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->mrnNo->EditValue ?>"<?php echo $view_ip_patient_admission_search->mrnNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PatientID"><?php echo $view_ip_patient_admission_search->PatientID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PatientID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PatientID" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PatientID->EditValue ?>"<?php echo $view_ip_patient_admission_search->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->patient_name->Visible) { // patient_name ?>
	<div id="r_patient_name" class="form-group row">
		<label for="x_patient_name" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_name"><?php echo $view_ip_patient_admission_search->patient_name->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->patient_name->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_patient_name" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->patient_name->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->patient_name->EditValue ?>"<?php echo $view_ip_patient_admission_search->patient_name->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->mobileno->Visible) { // mobileno ?>
	<div id="r_mobileno" class="form-group row">
		<label for="x_mobileno" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mobileno"><?php echo $view_ip_patient_admission_search->mobileno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mobileno" id="z_mobileno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->mobileno->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_mobileno" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->mobileno->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->mobileno->EditValue ?>"<?php echo $view_ip_patient_admission_search->mobileno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_profilePic"><?php echo $view_ip_patient_admission_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->profilePic->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_profilePic" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->profilePic->EditValue ?>"<?php echo $view_ip_patient_admission_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->gender->Visible) { // gender ?>
	<div id="r_gender" class="form-group row">
		<label for="x_gender" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_gender"><?php echo $view_ip_patient_admission_search->gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_gender" id="z_gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->gender->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_gender" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->gender->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->gender->EditValue ?>"<?php echo $view_ip_patient_admission_search->gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->age->Visible) { // age ?>
	<div id="r_age" class="form-group row">
		<label for="x_age" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_age"><?php echo $view_ip_patient_admission_search->age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_age" id="z_age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->age->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_age" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->age->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->age->EditValue ?>"<?php echo $view_ip_patient_admission_search->age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Package->Visible) { // Package ?>
	<div id="r_Package" class="form-group row">
		<label for="x_Package" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Package"><?php echo $view_ip_patient_admission_search->Package->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Package" id="z_Package" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Package->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Package" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->Package->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->Package->EditValue ?>"<?php echo $view_ip_patient_admission_search->Package->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<div id="r_typeRegsisteration" class="form-group row">
		<label for="x_typeRegsisteration" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_typeRegsisteration"><?php echo $view_ip_patient_admission_search->typeRegsisteration->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->typeRegsisteration->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_typeRegsisteration" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_typeRegsisteration" data-value-separator="<?php echo $view_ip_patient_admission_search->typeRegsisteration->displayValueSeparatorAttribute() ?>" id="x_typeRegsisteration" name="x_typeRegsisteration"<?php echo $view_ip_patient_admission_search->typeRegsisteration->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->typeRegsisteration->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_typeRegsisteration") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PaymentCategory->Visible) { // PaymentCategory ?>
	<div id="r_PaymentCategory" class="form-group row">
		<label for="x_PaymentCategory" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentCategory"><?php echo $view_ip_patient_admission_search->PaymentCategory->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PaymentCategory" id="z_PaymentCategory" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PaymentCategory->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PaymentCategory" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentCategory" data-value-separator="<?php echo $view_ip_patient_admission_search->PaymentCategory->displayValueSeparatorAttribute() ?>" id="x_PaymentCategory" name="x_PaymentCategory"<?php echo $view_ip_patient_admission_search->PaymentCategory->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->PaymentCategory->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_PaymentCategory") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<div id="r_admission_consultant_id" class="form-group row">
		<label for="x_admission_consultant_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_consultant_id"><?php echo $view_ip_patient_admission_search->admission_consultant_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_admission_consultant_id" id="z_admission_consultant_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->admission_consultant_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_admission_consultant_id" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->admission_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->admission_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission_search->admission_consultant_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<div id="r_leading_consultant_id" class="form-group row">
		<label for="x_leading_consultant_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_leading_consultant_id"><?php echo $view_ip_patient_admission_search->leading_consultant_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_leading_consultant_id" id="z_leading_consultant_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->leading_consultant_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_leading_consultant_id" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->leading_consultant_id->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->leading_consultant_id->EditValue ?>"<?php echo $view_ip_patient_admission_search->leading_consultant_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->cause->Visible) { // cause ?>
	<div id="r_cause" class="form-group row">
		<label for="x_cause" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_cause"><?php echo $view_ip_patient_admission_search->cause->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_cause" id="z_cause" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->cause->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_cause" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_cause" name="x_cause" id="x_cause" size="35" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->cause->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->cause->EditValue ?>"<?php echo $view_ip_patient_admission_search->cause->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->admission_date->Visible) { // admission_date ?>
	<div id="r_admission_date" class="form-group row">
		<label for="x_admission_date" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_date"><?php echo $view_ip_patient_admission_search->admission_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_admission_date" id="z_admission_date" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->admission_date->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_admission_date" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->admission_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->admission_date->EditValue ?>"<?php echo $view_ip_patient_admission_search->admission_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->admission_date->ReadOnly && !$view_ip_patient_admission_search->admission_date->Disabled && !isset($view_ip_patient_admission_search->admission_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->release_date->Visible) { // release_date ?>
	<div id="r_release_date" class="form-group row">
		<label for="x_release_date" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_release_date"><?php echo $view_ip_patient_admission_search->release_date->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_release_date" id="z_release_date" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->release_date->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_release_date" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_release_date" data-format="11" name="x_release_date" id="x_release_date" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->release_date->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->release_date->EditValue ?>"<?php echo $view_ip_patient_admission_search->release_date->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->release_date->ReadOnly && !$view_ip_patient_admission_search->release_date->Disabled && !isset($view_ip_patient_admission_search->release_date->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label for="x_PaymentStatus" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentStatus"><?php echo $view_ip_patient_admission_search->PaymentStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PaymentStatus" id="z_PaymentStatus" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PaymentStatus->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PaymentStatus" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_PaymentStatus" data-value-separator="<?php echo $view_ip_patient_admission_search->PaymentStatus->displayValueSeparatorAttribute() ?>" id="x_PaymentStatus" name="x_PaymentStatus"<?php echo $view_ip_patient_admission_search->PaymentStatus->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->PaymentStatus->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_PaymentStatus") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_status"><?php echo $view_ip_patient_admission_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->status->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_status" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->status->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->status->EditValue ?>"<?php echo $view_ip_patient_admission_search->status->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createdby"><?php echo $view_ip_patient_admission_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->createdby->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_createdby" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->createdby->EditValue ?>"<?php echo $view_ip_patient_admission_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createddatetime"><?php echo $view_ip_patient_admission_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->createddatetime->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_createddatetime" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->createddatetime->EditValue ?>"<?php echo $view_ip_patient_admission_search->createddatetime->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->createddatetime->ReadOnly && !$view_ip_patient_admission_search->createddatetime->Disabled && !isset($view_ip_patient_admission_search->createddatetime->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifiedby"><?php echo $view_ip_patient_admission_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->modifiedby->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_modifiedby" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->modifiedby->EditValue ?>"<?php echo $view_ip_patient_admission_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifieddatetime"><?php echo $view_ip_patient_admission_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_modifieddatetime" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->modifieddatetime->EditValue ?>"<?php echo $view_ip_patient_admission_search->modifieddatetime->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->modifieddatetime->ReadOnly && !$view_ip_patient_admission_search->modifieddatetime->Disabled && !isset($view_ip_patient_admission_search->modifieddatetime->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_HospID"><?php echo $view_ip_patient_admission_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->HospID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_HospID" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_HospID" data-value-separator="<?php echo $view_ip_patient_admission_search->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_ip_patient_admission_search->HospID->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->HospID->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReferedByDr->Visible) { // ReferedByDr ?>
	<div id="r_ReferedByDr" class="form-group row">
		<label for="x_ReferedByDr" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferedByDr"><?php echo $view_ip_patient_admission_search->ReferedByDr->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedByDr" id="z_ReferedByDr" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReferedByDr->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferedByDr" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_ReferedByDr" data-value-separator="<?php echo $view_ip_patient_admission_search->ReferedByDr->displayValueSeparatorAttribute() ?>" id="x_ReferedByDr" name="x_ReferedByDr"<?php echo $view_ip_patient_admission_search->ReferedByDr->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->ReferedByDr->selectOptionListHtml("x_ReferedByDr") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->ReferedByDr->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_ReferedByDr") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReferClinicname->Visible) { // ReferClinicname ?>
	<div id="r_ReferClinicname" class="form-group row">
		<label for="x_ReferClinicname" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferClinicname"><?php echo $view_ip_patient_admission_search->ReferClinicname->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferClinicname" id="z_ReferClinicname" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReferClinicname->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferClinicname" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ReferClinicname->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ReferClinicname->EditValue ?>"<?php echo $view_ip_patient_admission_search->ReferClinicname->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReferCity->Visible) { // ReferCity ?>
	<div id="r_ReferCity" class="form-group row">
		<label for="x_ReferCity" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferCity"><?php echo $view_ip_patient_admission_search->ReferCity->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferCity" id="z_ReferCity" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReferCity->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferCity" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ReferCity->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ReferCity->EditValue ?>"<?php echo $view_ip_patient_admission_search->ReferCity->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<div id="r_ReferMobileNo" class="form-group row">
		<label for="x_ReferMobileNo" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferMobileNo"><?php echo $view_ip_patient_admission_search->ReferMobileNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferMobileNo" id="z_ReferMobileNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReferMobileNo->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferMobileNo" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ReferMobileNo->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ReferMobileNo->EditValue ?>"<?php echo $view_ip_patient_admission_search->ReferMobileNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<div id="r_ReferA4TreatingConsultant" class="form-group row">
		<label for="x_ReferA4TreatingConsultant" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferA4TreatingConsultant"><?php echo $view_ip_patient_admission_search->ReferA4TreatingConsultant->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferA4TreatingConsultant" id="z_ReferA4TreatingConsultant" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReferA4TreatingConsultant->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReferA4TreatingConsultant" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ReferA4TreatingConsultant->EditValue ?>"<?php echo $view_ip_patient_admission_search->ReferA4TreatingConsultant->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<div id="r_PurposreReferredfor" class="form-group row">
		<label for="x_PurposreReferredfor" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PurposreReferredfor"><?php echo $view_ip_patient_admission_search->PurposreReferredfor->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PurposreReferredfor" id="z_PurposreReferredfor" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PurposreReferredfor->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PurposreReferredfor" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PurposreReferredfor->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PurposreReferredfor->EditValue ?>"<?php echo $view_ip_patient_admission_search->PurposreReferredfor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->BillClosing->Visible) { // BillClosing ?>
	<div id="r_BillClosing" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosing"><?php echo $view_ip_patient_admission_search->BillClosing->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillClosing" id="z_BillClosing" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->BillClosing->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillClosing" class="ew-search-field">
<div id="tp_x_BillClosing" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_BillClosing" data-value-separator="<?php echo $view_ip_patient_admission_search->BillClosing->displayValueSeparatorAttribute() ?>" name="x_BillClosing[]" id="x_BillClosing[]" value="{value}"<?php echo $view_ip_patient_admission_search->BillClosing->editAttributes() ?>></div>
<div id="dsl_x_BillClosing" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_search->BillClosing->checkBoxListHtml(FALSE, "x_BillClosing[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->BillClosingDate->Visible) { // BillClosingDate ?>
	<div id="r_BillClosingDate" class="form-group row">
		<label for="x_BillClosingDate" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosingDate"><?php echo $view_ip_patient_admission_search->BillClosingDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillClosingDate" id="z_BillClosingDate" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->BillClosingDate->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillClosingDate" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->BillClosingDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->BillClosingDate->EditValue ?>"<?php echo $view_ip_patient_admission_search->BillClosingDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->BillClosingDate->ReadOnly && !$view_ip_patient_admission_search->BillClosingDate->Disabled && !isset($view_ip_patient_admission_search->BillClosingDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillNumber"><?php echo $view_ip_patient_admission_search->BillNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->BillNumber->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillNumber" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->BillNumber->EditValue ?>"<?php echo $view_ip_patient_admission_search->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ClosingAmount->Visible) { // ClosingAmount ?>
	<div id="r_ClosingAmount" class="form-group row">
		<label for="x_ClosingAmount" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingAmount"><?php echo $view_ip_patient_admission_search->ClosingAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClosingAmount" id="z_ClosingAmount" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ClosingAmount->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ClosingAmount" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ClosingAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ClosingAmount->EditValue ?>"<?php echo $view_ip_patient_admission_search->ClosingAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ClosingType->Visible) { // ClosingType ?>
	<div id="r_ClosingType" class="form-group row">
		<label for="x_ClosingType" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingType"><?php echo $view_ip_patient_admission_search->ClosingType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ClosingType" id="z_ClosingType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ClosingType->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ClosingType" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->ClosingType->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->ClosingType->EditValue ?>"<?php echo $view_ip_patient_admission_search->ClosingType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->BillAmount->Visible) { // BillAmount ?>
	<div id="r_BillAmount" class="form-group row">
		<label for="x_BillAmount" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillAmount"><?php echo $view_ip_patient_admission_search->BillAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillAmount" id="z_BillAmount" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->BillAmount->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_BillAmount" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->BillAmount->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->BillAmount->EditValue ?>"<?php echo $view_ip_patient_admission_search->BillAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->billclosedBy->Visible) { // billclosedBy ?>
	<div id="r_billclosedBy" class="form-group row">
		<label for="x_billclosedBy" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_billclosedBy"><?php echo $view_ip_patient_admission_search->billclosedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_billclosedBy" id="z_billclosedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->billclosedBy->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_billclosedBy" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->billclosedBy->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->billclosedBy->EditValue ?>"<?php echo $view_ip_patient_admission_search->billclosedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<div id="r_bllcloseByDate" class="form-group row">
		<label for="x_bllcloseByDate" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_bllcloseByDate"><?php echo $view_ip_patient_admission_search->bllcloseByDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_bllcloseByDate" id="z_bllcloseByDate" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->bllcloseByDate->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_bllcloseByDate" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->bllcloseByDate->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->bllcloseByDate->EditValue ?>"<?php echo $view_ip_patient_admission_search->bllcloseByDate->editAttributes() ?>>
<?php if (!$view_ip_patient_admission_search->bllcloseByDate->ReadOnly && !$view_ip_patient_admission_search->bllcloseByDate->Disabled && !isset($view_ip_patient_admission_search->bllcloseByDate->EditAttrs["readonly"]) && !isset($view_ip_patient_admission_search->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_ip_patient_admissionsearch", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->ReportHeader->Visible) { // ReportHeader ?>
	<div id="r_ReportHeader" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReportHeader"><?php echo $view_ip_patient_admission_search->ReportHeader->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReportHeader" id="z_ReportHeader" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->ReportHeader->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_ReportHeader" class="ew-search-field">
<div id="tp_x_ReportHeader" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_ReportHeader" data-value-separator="<?php echo $view_ip_patient_admission_search->ReportHeader->displayValueSeparatorAttribute() ?>" name="x_ReportHeader[]" id="x_ReportHeader[]" value="{value}"<?php echo $view_ip_patient_admission_search->ReportHeader->editAttributes() ?>></div>
<div id="dsl_x_ReportHeader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_search->ReportHeader->checkBoxListHtml(FALSE, "x_ReportHeader[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label for="x_Procedure" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Procedure"><?php echo $view_ip_patient_admission_search->Procedure->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Procedure" id="z_Procedure" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Procedure->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Procedure" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?php echo EmptyValue(strval($view_ip_patient_admission_search->Procedure->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_search->Procedure->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_search->Procedure->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_search->Procedure->ReadOnly || $view_ip_patient_admission_search->Procedure->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_search->Procedure->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_Procedure") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Procedure" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_search->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?php echo $view_ip_patient_admission_search->Procedure->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission_search->Procedure->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label for="x_Consultant" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Consultant"><?php echo $view_ip_patient_admission_search->Consultant->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Consultant" id="z_Consultant" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Consultant->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Consultant" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Consultant" data-value-separator="<?php echo $view_ip_patient_admission_search->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $view_ip_patient_admission_search->Consultant->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->Consultant->selectOptionListHtml("x_Consultant") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->Consultant->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_Consultant") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label for="x_Anesthetist" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Anesthetist"><?php echo $view_ip_patient_admission_search->Anesthetist->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Anesthetist" id="z_Anesthetist" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Anesthetist->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Anesthetist" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_ip_patient_admission" data-field="x_Anesthetist" data-value-separator="<?php echo $view_ip_patient_admission_search->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $view_ip_patient_admission_search->Anesthetist->editAttributes() ?>>
			<?php echo $view_ip_patient_admission_search->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
		</select>
</div>
<?php echo $view_ip_patient_admission_search->Anesthetist->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_Anesthetist") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Amound->Visible) { // Amound ?>
	<div id="r_Amound" class="form-group row">
		<label for="x_Amound" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Amound"><?php echo $view_ip_patient_admission_search->Amound->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Amound" id="z_Amound" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Amound->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Amound" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="12" maxlength="12" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->Amound->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->Amound->EditValue ?>"<?php echo $view_ip_patient_admission_search->Amound->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->physician_id->Visible) { // physician_id ?>
	<div id="r_physician_id" class="form-group row">
		<label for="x_physician_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_physician_id"><?php echo $view_ip_patient_admission_search->physician_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->physician_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_physician_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_physician_id"><?php echo EmptyValue(strval($view_ip_patient_admission_search->physician_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_search->physician_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_search->physician_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_search->physician_id->ReadOnly || $view_ip_patient_admission_search->physician_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_physician_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_search->physician_id->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_physician_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_physician_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_search->physician_id->displayValueSeparatorAttribute() ?>" name="x_physician_id" id="x_physician_id" value="<?php echo $view_ip_patient_admission_search->physician_id->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission_search->physician_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerID"><?php echo $view_ip_patient_admission_search->PartnerID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PartnerID->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerID" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PartnerID->EditValue ?>"<?php echo $view_ip_patient_admission_search->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerName"><?php echo $view_ip_patient_admission_search->PartnerName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PartnerName->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerName" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PartnerName->EditValue ?>"<?php echo $view_ip_patient_admission_search->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label for="x_PartnerMobile" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerMobile"><?php echo $view_ip_patient_admission_search->PartnerMobile->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PartnerMobile->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartnerMobile" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PartnerMobile->EditValue ?>"<?php echo $view_ip_patient_admission_search->PartnerMobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->patient_id->Visible) { // patient_id ?>
	<div id="r_patient_id" class="form-group row">
		<label for="x_patient_id" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_id"><?php echo $view_ip_patient_admission_search->patient_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_patient_id" id="z_patient_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->patient_id->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_patient_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?php echo EmptyValue(strval($view_ip_patient_admission_search->patient_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_search->patient_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_search->patient_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_search->patient_id->ReadOnly || $view_ip_patient_admission_search->patient_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_search->patient_id->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_patient_id") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_patient_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_search->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?php echo $view_ip_patient_admission_search->patient_id->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission_search->patient_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Cid->Visible) { // Cid ?>
	<div id="r_Cid" class="form-group row">
		<label for="x_Cid" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Cid"><?php echo $view_ip_patient_admission_search->Cid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Cid" id="z_Cid" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Cid->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Cid" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Cid"><?php echo EmptyValue(strval($view_ip_patient_admission_search->Cid->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $view_ip_patient_admission_search->Cid->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_ip_patient_admission_search->Cid->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($view_ip_patient_admission_search->Cid->ReadOnly || $view_ip_patient_admission_search->Cid->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Cid',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_ip_patient_admission_search->Cid->Lookup->getParamTag($view_ip_patient_admission_search, "p_x_Cid") ?>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_Cid" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_ip_patient_admission_search->Cid->displayValueSeparatorAttribute() ?>" name="x_Cid" id="x_Cid" value="<?php echo $view_ip_patient_admission_search->Cid->AdvancedSearch->SearchValue ?>"<?php echo $view_ip_patient_admission_search->Cid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->PartId->Visible) { // PartId ?>
	<div id="r_PartId" class="form-group row">
		<label for="x_PartId" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartId"><?php echo $view_ip_patient_admission_search->PartId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PartId" id="z_PartId" value="=">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->PartId->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_PartId" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->PartId->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->PartId->EditValue ?>"<?php echo $view_ip_patient_admission_search->PartId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->IDProof->Visible) { // IDProof ?>
	<div id="r_IDProof" class="form-group row">
		<label for="x_IDProof" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_IDProof"><?php echo $view_ip_patient_admission_search->IDProof->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IDProof" id="z_IDProof" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->IDProof->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_IDProof" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->IDProof->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->IDProof->EditValue ?>"<?php echo $view_ip_patient_admission_search->IDProof->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->DOB->Visible) { // DOB ?>
	<div id="r_DOB" class="form-group row">
		<label for="x_DOB" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_DOB"><?php echo $view_ip_patient_admission_search->DOB->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DOB" id="z_DOB" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->DOB->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_DOB" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->DOB->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->DOB->EditValue ?>"<?php echo $view_ip_patient_admission_search->DOB->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<div id="r_AdviceToOtherHospital" class="form-group row">
		<label class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital"><?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AdviceToOtherHospital" id="z_AdviceToOtherHospital" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_AdviceToOtherHospital" class="ew-search-field">
<div id="tp_x_AdviceToOtherHospital" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_AdviceToOtherHospital" data-value-separator="<?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->displayValueSeparatorAttribute() ?>" name="x_AdviceToOtherHospital[]" id="x_AdviceToOtherHospital[]" value="{value}"<?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->editAttributes() ?>></div>
<div id="dsl_x_AdviceToOtherHospital" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_ip_patient_admission_search->AdviceToOtherHospital->checkBoxListHtml(FALSE, "x_AdviceToOtherHospital[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_ip_patient_admission_search->Reason->Visible) { // Reason ?>
	<div id="r_Reason" class="form-group row">
		<label for="x_Reason" class="<?php echo $view_ip_patient_admission_search->LeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Reason"><?php echo $view_ip_patient_admission_search->Reason->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Reason" id="z_Reason" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_ip_patient_admission_search->RightColumnClass ?>"><div <?php echo $view_ip_patient_admission_search->Reason->cellAttributes() ?>>
			<span id="el_view_ip_patient_admission_Reason" class="ew-search-field">
<input type="text" data-table="view_ip_patient_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" size="35" placeholder="<?php echo HtmlEncode($view_ip_patient_admission_search->Reason->getPlaceHolder()) ?>" value="<?php echo $view_ip_patient_admission_search->Reason->EditValue ?>"<?php echo $view_ip_patient_admission_search->Reason->editAttributes() ?>>
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
$view_ip_patient_admission_search->terminate();
?>