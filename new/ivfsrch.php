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
$ivf_search = new ivf_search();

// Run the page
$ivf_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivfsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($ivf_search->IsModal) { ?>
	fivfsearch = currentAdvancedSearchForm = new ew.Form("fivfsearch", "search");
	<?php } else { ?>
	fivfsearch = currentForm = new ew.Form("fivfsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fivfsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->createdby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifiedby");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->modifiedby->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($ivf_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fivfsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivfsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivfsearch.lists["x_Male"] = <?php echo $ivf_search->Male->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_Male"].options = <?php echo JsonEncode($ivf_search->Male->lookupOptions()) ?>;
	fivfsearch.lists["x_Female"] = <?php echo $ivf_search->Female->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_Female"].options = <?php echo JsonEncode($ivf_search->Female->lookupOptions()) ?>;
	fivfsearch.lists["x_status"] = <?php echo $ivf_search->status->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_status"].options = <?php echo JsonEncode($ivf_search->status->lookupOptions()) ?>;
	fivfsearch.lists["x_ReferedBy"] = <?php echo $ivf_search->ReferedBy->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_search->ReferedBy->lookupOptions()) ?>;
	fivfsearch.lists["x_ARTCYCLE"] = <?php echo $ivf_search->ARTCYCLE->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_search->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fivfsearch.lists["x_RESULT"] = <?php echo $ivf_search->RESULT->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_search->RESULT->options(FALSE, TRUE)) ?>;
	fivfsearch.lists["x_DrID"] = <?php echo $ivf_search->DrID->Lookup->toClientList($ivf_search) ?>;
	fivfsearch.lists["x_DrID"].options = <?php echo JsonEncode($ivf_search->DrID->lookupOptions()) ?>;
	loadjs.done("fivfsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_search->showPageHeader(); ?>
<?php
$ivf_search->showMessage();
?>
<form name="fivfsearch" id="fivfsearch" class="<?php echo $ivf_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($ivf_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_id"><?php echo $ivf_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->id->cellAttributes() ?>>
			<span id="el_ivf_id" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($ivf_search->id->getPlaceHolder()) ?>" value="<?php echo $ivf_search->id->EditValue ?>"<?php echo $ivf_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label for="x_Male" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Male"><?php echo $ivf_search->Male->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Male" id="z_Male" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->Male->cellAttributes() ?>>
			<span id="el_ivf_Male" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?php echo HtmlEncode($ivf_search->Male->getPlaceHolder()) ?>" value="<?php echo $ivf_search->Male->EditValue ?>"<?php echo $ivf_search->Male->editAttributes() ?>>
<?php echo $ivf_search->Male->Lookup->getParamTag($ivf_search, "p_x_Male") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label for="x_Female" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Female"><?php echo $ivf_search->Female->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Female" id="z_Female" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->Female->cellAttributes() ?>>
			<span id="el_ivf_Female" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?php echo HtmlEncode($ivf_search->Female->getPlaceHolder()) ?>" value="<?php echo $ivf_search->Female->EditValue ?>"<?php echo $ivf_search->Female->editAttributes() ?>>
<?php echo $ivf_search->Female->Lookup->getParamTag($ivf_search, "p_x_Female") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_status"><?php echo $ivf_search->status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->status->cellAttributes() ?>>
			<span id="el_ivf_status" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_status" data-value-separator="<?php echo $ivf_search->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf_search->status->editAttributes() ?>>
			<?php echo $ivf_search->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $ivf_search->status->Lookup->getParamTag($ivf_search, "p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_createdby"><?php echo $ivf_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->createdby->cellAttributes() ?>>
			<span id="el_ivf_createdby" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_search->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_search->createdby->EditValue ?>"<?php echo $ivf_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_createddatetime"><?php echo $ivf_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->createddatetime->cellAttributes() ?>>
			<span id="el_ivf_createddatetime" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ivf_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_search->createddatetime->EditValue ?>"<?php echo $ivf_search->createddatetime->editAttributes() ?>>
<?php if (!$ivf_search->createddatetime->ReadOnly && !$ivf_search->createddatetime->Disabled && !isset($ivf_search->createddatetime->EditAttrs["readonly"]) && !isset($ivf_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivfsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fivfsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_modifiedby"><?php echo $ivf_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->modifiedby->cellAttributes() ?>>
			<span id="el_ivf_modifiedby" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_search->modifiedby->EditValue ?>"<?php echo $ivf_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_modifieddatetime"><?php echo $ivf_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_ivf_modifieddatetime" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_search->modifieddatetime->EditValue ?>"<?php echo $ivf_search->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_search->modifieddatetime->ReadOnly && !$ivf_search->modifieddatetime->Disabled && !isset($ivf_search->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivfsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fivfsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_malepropic"><?php echo $ivf_search->malepropic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_malepropic" id="z_malepropic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->malepropic->cellAttributes() ?>>
			<span id="el_ivf_malepropic" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" placeholder="<?php echo HtmlEncode($ivf_search->malepropic->getPlaceHolder()) ?>" value="<?php echo $ivf_search->malepropic->EditValue ?>"<?php echo $ivf_search->malepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_femalepropic"><?php echo $ivf_search->femalepropic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_femalepropic" id="z_femalepropic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->femalepropic->cellAttributes() ?>>
			<span id="el_ivf_femalepropic" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" placeholder="<?php echo HtmlEncode($ivf_search->femalepropic->getPlaceHolder()) ?>" value="<?php echo $ivf_search->femalepropic->EditValue ?>"<?php echo $ivf_search->femalepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label for="x_HusbandEducation" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandEducation"><?php echo $ivf_search->HusbandEducation->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandEducation" id="z_HusbandEducation" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->HusbandEducation->cellAttributes() ?>>
			<span id="el_ivf_HusbandEducation" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_search->HusbandEducation->EditValue ?>"<?php echo $ivf_search->HusbandEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label for="x_WifeEducation" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeEducation"><?php echo $ivf_search->WifeEducation->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeEducation" id="z_WifeEducation" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->WifeEducation->cellAttributes() ?>>
			<span id="el_ivf_WifeEducation" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_search->WifeEducation->EditValue ?>"<?php echo $ivf_search->WifeEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label for="x_HusbandWorkHours" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandWorkHours"><?php echo $ivf_search->HusbandWorkHours->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandWorkHours" id="z_HusbandWorkHours" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->HusbandWorkHours->cellAttributes() ?>>
			<span id="el_ivf_HusbandWorkHours" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_search->HusbandWorkHours->EditValue ?>"<?php echo $ivf_search->HusbandWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label for="x_WifeWorkHours" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeWorkHours"><?php echo $ivf_search->WifeWorkHours->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeWorkHours" id="z_WifeWorkHours" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->WifeWorkHours->cellAttributes() ?>>
			<span id="el_ivf_WifeWorkHours" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_search->WifeWorkHours->EditValue ?>"<?php echo $ivf_search->WifeWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label for="x_PatientLanguage" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientLanguage"><?php echo $ivf_search->PatientLanguage->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientLanguage" id="z_PatientLanguage" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->PatientLanguage->cellAttributes() ?>>
			<span id="el_ivf_PatientLanguage" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $ivf_search->PatientLanguage->EditValue ?>"<?php echo $ivf_search->PatientLanguage->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label for="x_ReferedBy" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ReferedBy"><?php echo $ivf_search->ReferedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferedBy" id="z_ReferedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->ReferedBy->cellAttributes() ?>>
			<span id="el_ivf_ReferedBy" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_ReferedBy" name="x_ReferedBy" id="x_ReferedBy" size="30" placeholder="<?php echo HtmlEncode($ivf_search->ReferedBy->getPlaceHolder()) ?>" value="<?php echo $ivf_search->ReferedBy->EditValue ?>"<?php echo $ivf_search->ReferedBy->editAttributes() ?>>
<?php echo $ivf_search->ReferedBy->Lookup->getParamTag($ivf_search, "p_x_ReferedBy") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label for="x_ReferPhNo" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ReferPhNo"><?php echo $ivf_search->ReferPhNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReferPhNo" id="z_ReferPhNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->ReferPhNo->cellAttributes() ?>>
			<span id="el_ivf_ReferPhNo" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $ivf_search->ReferPhNo->EditValue ?>"<?php echo $ivf_search->ReferPhNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label for="x_WifeCell" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeCell"><?php echo $ivf_search->WifeCell->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->WifeCell->cellAttributes() ?>>
			<span id="el_ivf_WifeCell" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf_search->WifeCell->EditValue ?>"<?php echo $ivf_search->WifeCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label for="x_HusbandCell" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandCell"><?php echo $ivf_search->HusbandCell->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->HusbandCell->cellAttributes() ?>>
			<span id="el_ivf_HusbandCell" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf_search->HusbandCell->EditValue ?>"<?php echo $ivf_search->HusbandCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label for="x_WifeEmail" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeEmail"><?php echo $ivf_search->WifeEmail->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WifeEmail" id="z_WifeEmail" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->WifeEmail->cellAttributes() ?>>
			<span id="el_ivf_WifeEmail" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_search->WifeEmail->EditValue ?>"<?php echo $ivf_search->WifeEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label for="x_HusbandEmail" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandEmail"><?php echo $ivf_search->HusbandEmail->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandEmail" id="z_HusbandEmail" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->HusbandEmail->cellAttributes() ?>>
			<span id="el_ivf_HusbandEmail" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_search->HusbandEmail->EditValue ?>"<?php echo $ivf_search->HusbandEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label for="x_ARTCYCLE" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ARTCYCLE"><?php echo $ivf_search->ARTCYCLE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ARTCYCLE" id="z_ARTCYCLE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->ARTCYCLE->cellAttributes() ?>>
			<span id="el_ivf_ARTCYCLE" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_search->ARTCYCLE->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE" name="x_ARTCYCLE"<?php echo $ivf_search->ARTCYCLE->editAttributes() ?>>
			<?php echo $ivf_search->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label for="x_RESULT" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_RESULT"><?php echo $ivf_search->RESULT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESULT" id="z_RESULT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->RESULT->cellAttributes() ?>>
			<span id="el_ivf_RESULT" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_RESULT" data-value-separator="<?php echo $ivf_search->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf_search->RESULT->editAttributes() ?>>
			<?php echo $ivf_search->RESULT->selectOptionListHtml("x_RESULT") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->malepic->Visible) { // malepic ?>
	<div id="r_malepic" class="form-group row">
		<label for="x_malepic" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_malepic"><?php echo $ivf_search->malepic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_malepic" id="z_malepic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->malepic->cellAttributes() ?>>
			<span id="el_ivf_malepic" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" size="35" placeholder="<?php echo HtmlEncode($ivf_search->malepic->getPlaceHolder()) ?>" value="<?php echo $ivf_search->malepic->EditValue ?>"<?php echo $ivf_search->malepic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label for="x_femalepic" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_femalepic"><?php echo $ivf_search->femalepic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_femalepic" id="z_femalepic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->femalepic->cellAttributes() ?>>
			<span id="el_ivf_femalepic" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" size="35" placeholder="<?php echo HtmlEncode($ivf_search->femalepic->getPlaceHolder()) ?>" value="<?php echo $ivf_search->femalepic->EditValue ?>"<?php echo $ivf_search->femalepic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->Mgendar->Visible) { // Mgendar ?>
	<div id="r_Mgendar" class="form-group row">
		<label for="x_Mgendar" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Mgendar"><?php echo $ivf_search->Mgendar->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mgendar" id="z_Mgendar" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->Mgendar->cellAttributes() ?>>
			<span id="el_ivf_Mgendar" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" size="35" placeholder="<?php echo HtmlEncode($ivf_search->Mgendar->getPlaceHolder()) ?>" value="<?php echo $ivf_search->Mgendar->EditValue ?>"<?php echo $ivf_search->Mgendar->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->Fgendar->Visible) { // Fgendar ?>
	<div id="r_Fgendar" class="form-group row">
		<label for="x_Fgendar" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Fgendar"><?php echo $ivf_search->Fgendar->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Fgendar" id="z_Fgendar" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->Fgendar->cellAttributes() ?>>
			<span id="el_ivf_Fgendar" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" size="35" placeholder="<?php echo HtmlEncode($ivf_search->Fgendar->getPlaceHolder()) ?>" value="<?php echo $ivf_search->Fgendar->EditValue ?>"<?php echo $ivf_search->Fgendar->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label for="x_CoupleID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_CoupleID"><?php echo $ivf_search->CoupleID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->CoupleID->cellAttributes() ?>>
			<span id="el_ivf_CoupleID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf_search->CoupleID->EditValue ?>"<?php echo $ivf_search->CoupleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HospID"><?php echo $ivf_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->HospID->cellAttributes() ?>>
			<span id="el_ivf_HospID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($ivf_search->HospID->getPlaceHolder()) ?>" value="<?php echo $ivf_search->HospID->EditValue ?>"<?php echo $ivf_search->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientName"><?php echo $ivf_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->PatientName->cellAttributes() ?>>
			<span id="el_ivf_PatientName" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_search->PatientName->EditValue ?>"<?php echo $ivf_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientID"><?php echo $ivf_search->PatientID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->PatientID->cellAttributes() ?>>
			<span id="el_ivf_PatientID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf_search->PatientID->EditValue ?>"<?php echo $ivf_search->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PartnerName"><?php echo $ivf_search->PartnerName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->PartnerName->cellAttributes() ?>>
			<span id="el_ivf_PartnerName" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_search->PartnerName->EditValue ?>"<?php echo $ivf_search->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PartnerID"><?php echo $ivf_search->PartnerID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->PartnerID->cellAttributes() ?>>
			<span id="el_ivf_PartnerID" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_search->PartnerID->EditValue ?>"<?php echo $ivf_search->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_DrID"><?php echo $ivf_search->DrID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->DrID->cellAttributes() ?>>
			<span id="el_ivf_DrID" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($ivf_search->DrID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_search->DrID->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_search->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_search->DrID->ReadOnly || $ivf_search->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_search->DrID->Lookup->getParamTag($ivf_search, "p_x_DrID") ?>
<input type="hidden" data-table="ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_search->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $ivf_search->DrID->AdvancedSearch->SearchValue ?>"<?php echo $ivf_search->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_DrDepartment"><?php echo $ivf_search->DrDepartment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->DrDepartment->cellAttributes() ?>>
			<span id="el_ivf_DrDepartment" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $ivf_search->DrDepartment->EditValue ?>"<?php echo $ivf_search->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf_search->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Doctor"><?php echo $ivf_search->Doctor->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div <?php echo $ivf_search->Doctor->cellAttributes() ?>>
			<span id="el_ivf_Doctor" class="ew-search-field">
<input type="text" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_search->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf_search->Doctor->EditValue ?>"<?php echo $ivf_search->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_search->showPageFooter();
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
$ivf_search->terminate();
?>