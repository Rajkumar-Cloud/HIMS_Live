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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($ivf_search->IsModal) { ?>
var fivfsearch = currentAdvancedSearchForm = new ew.Form("fivfsearch", "search");
<?php } else { ?>
var fivfsearch = currentForm = new ew.Form("fivfsearch", "search");
<?php } ?>

// Form_CustomValidate event
fivfsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivfsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivfsearch.lists["x_Male"] = <?php echo $ivf_search->Male->Lookup->toClientList() ?>;
fivfsearch.lists["x_Male"].options = <?php echo JsonEncode($ivf_search->Male->lookupOptions()) ?>;
fivfsearch.lists["x_Female"] = <?php echo $ivf_search->Female->Lookup->toClientList() ?>;
fivfsearch.lists["x_Female"].options = <?php echo JsonEncode($ivf_search->Female->lookupOptions()) ?>;
fivfsearch.lists["x_status"] = <?php echo $ivf_search->status->Lookup->toClientList() ?>;
fivfsearch.lists["x_status"].options = <?php echo JsonEncode($ivf_search->status->lookupOptions()) ?>;
fivfsearch.lists["x_ReferedBy"] = <?php echo $ivf_search->ReferedBy->Lookup->toClientList() ?>;
fivfsearch.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_search->ReferedBy->lookupOptions()) ?>;
fivfsearch.lists["x_ARTCYCLE"] = <?php echo $ivf_search->ARTCYCLE->Lookup->toClientList() ?>;
fivfsearch.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_search->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivfsearch.lists["x_RESULT"] = <?php echo $ivf_search->RESULT->Lookup->toClientList() ?>;
fivfsearch.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_search->RESULT->options(FALSE, TRUE)) ?>;
fivfsearch.lists["x_DrID"] = <?php echo $ivf_search->DrID->Lookup->toClientList() ?>;
fivfsearch.lists["x_DrID"].options = <?php echo JsonEncode($ivf_search->DrID->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fivfsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($ivf->HospID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_search->showPageHeader(); ?>
<?php
$ivf_search->showMessage();
?>
<form name="fivfsearch" id="fivfsearch" class="<?php echo $ivf_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($ivf->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_id"><?php echo $ivf->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->id->cellAttributes() ?>>
			<span id="el_ivf_id">
<input type="text" data-table="ivf" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($ivf->id->getPlaceHolder()) ?>" value="<?php echo $ivf->id->EditValue ?>"<?php echo $ivf->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label for="x_Male" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Male"><?php echo $ivf->Male->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Male" id="z_Male" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->Male->cellAttributes() ?>>
			<span id="el_ivf_Male">
<input type="text" data-table="ivf" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?php echo HtmlEncode($ivf->Male->getPlaceHolder()) ?>" value="<?php echo $ivf->Male->EditValue ?>"<?php echo $ivf->Male->editAttributes() ?>>
<?php echo $ivf->Male->Lookup->getParamTag("p_x_Male") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label for="x_Female" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Female"><?php echo $ivf->Female->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Female" id="z_Female" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->Female->cellAttributes() ?>>
			<span id="el_ivf_Female">
<input type="text" data-table="ivf" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?php echo HtmlEncode($ivf->Female->getPlaceHolder()) ?>" value="<?php echo $ivf->Female->EditValue ?>"<?php echo $ivf->Female->editAttributes() ?>>
<?php echo $ivf->Female->Lookup->getParamTag("p_x_Female") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_status"><?php echo $ivf->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->status->cellAttributes() ?>>
			<span id="el_ivf_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_status" data-value-separator="<?php echo $ivf->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf->status->editAttributes() ?>>
		<?php echo $ivf->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $ivf->status->Lookup->getParamTag("p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_createdby"><?php echo $ivf->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->createdby->cellAttributes() ?>>
			<span id="el_ivf_createdby">
<input type="text" data-table="ivf" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf->createdby->EditValue ?>"<?php echo $ivf->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_createddatetime"><?php echo $ivf->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->createddatetime->cellAttributes() ?>>
			<span id="el_ivf_createddatetime">
<input type="text" data-table="ivf" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($ivf->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf->createddatetime->EditValue ?>"<?php echo $ivf->createddatetime->editAttributes() ?>>
<?php if (!$ivf->createddatetime->ReadOnly && !$ivf->createddatetime->Disabled && !isset($ivf->createddatetime->EditAttrs["readonly"]) && !isset($ivf->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivfsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_modifiedby"><?php echo $ivf->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->modifiedby->cellAttributes() ?>>
			<span id="el_ivf_modifiedby">
<input type="text" data-table="ivf" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf->modifiedby->EditValue ?>"<?php echo $ivf->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_modifieddatetime"><?php echo $ivf->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->modifieddatetime->cellAttributes() ?>>
			<span id="el_ivf_modifieddatetime">
<input type="text" data-table="ivf" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf->modifieddatetime->EditValue ?>"<?php echo $ivf->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf->modifieddatetime->ReadOnly && !$ivf->modifieddatetime->Disabled && !isset($ivf->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivfsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_malepropic"><?php echo $ivf->malepropic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_malepropic" id="z_malepropic" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->malepropic->cellAttributes() ?>>
			<span id="el_ivf_malepropic">
<input type="text" data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" placeholder="<?php echo HtmlEncode($ivf->malepropic->getPlaceHolder()) ?>" value="<?php echo $ivf->malepropic->EditValue ?>"<?php echo $ivf->malepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_femalepropic"><?php echo $ivf->femalepropic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_femalepropic" id="z_femalepropic" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->femalepropic->cellAttributes() ?>>
			<span id="el_ivf_femalepropic">
<input type="text" data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" placeholder="<?php echo HtmlEncode($ivf->femalepropic->getPlaceHolder()) ?>" value="<?php echo $ivf->femalepropic->EditValue ?>"<?php echo $ivf->femalepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label for="x_HusbandEducation" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandEducation"><?php echo $ivf->HusbandEducation->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandEducation" id="z_HusbandEducation" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
			<span id="el_ivf_HusbandEducation">
<input type="text" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandEducation->EditValue ?>"<?php echo $ivf->HusbandEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label for="x_WifeEducation" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeEducation"><?php echo $ivf->WifeEducation->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeEducation" id="z_WifeEducation" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->WifeEducation->cellAttributes() ?>>
			<span id="el_ivf_WifeEducation">
<input type="text" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeEducation->EditValue ?>"<?php echo $ivf->WifeEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label for="x_HusbandWorkHours" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandWorkHours"><?php echo $ivf->HusbandWorkHours->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandWorkHours" id="z_HusbandWorkHours" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
			<span id="el_ivf_HusbandWorkHours">
<input type="text" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandWorkHours->EditValue ?>"<?php echo $ivf->HusbandWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label for="x_WifeWorkHours" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeWorkHours"><?php echo $ivf->WifeWorkHours->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeWorkHours" id="z_WifeWorkHours" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
			<span id="el_ivf_WifeWorkHours">
<input type="text" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeWorkHours->EditValue ?>"<?php echo $ivf->WifeWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label for="x_PatientLanguage" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientLanguage"><?php echo $ivf->PatientLanguage->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientLanguage" id="z_PatientLanguage" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
			<span id="el_ivf_PatientLanguage">
<input type="text" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientLanguage->EditValue ?>"<?php echo $ivf->PatientLanguage->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label for="x_ReferedBy" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ReferedBy"><?php echo $ivf->ReferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferedBy" id="z_ReferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->ReferedBy->cellAttributes() ?>>
			<span id="el_ivf_ReferedBy">
<input type="text" data-table="ivf" data-field="x_ReferedBy" name="x_ReferedBy" id="x_ReferedBy" size="30" placeholder="<?php echo HtmlEncode($ivf->ReferedBy->getPlaceHolder()) ?>" value="<?php echo $ivf->ReferedBy->EditValue ?>"<?php echo $ivf->ReferedBy->editAttributes() ?>>
<?php echo $ivf->ReferedBy->Lookup->getParamTag("p_x_ReferedBy") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label for="x_ReferPhNo" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ReferPhNo"><?php echo $ivf->ReferPhNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferPhNo" id="z_ReferPhNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
			<span id="el_ivf_ReferPhNo">
<input type="text" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $ivf->ReferPhNo->EditValue ?>"<?php echo $ivf->ReferPhNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label for="x_WifeCell" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeCell"><?php echo $ivf->WifeCell->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->WifeCell->cellAttributes() ?>>
			<span id="el_ivf_WifeCell">
<input type="text" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeCell->EditValue ?>"<?php echo $ivf->WifeCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label for="x_HusbandCell" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandCell"><?php echo $ivf->HusbandCell->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->HusbandCell->cellAttributes() ?>>
			<span id="el_ivf_HusbandCell">
<input type="text" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandCell->EditValue ?>"<?php echo $ivf->HusbandCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label for="x_WifeEmail" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_WifeEmail"><?php echo $ivf->WifeEmail->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeEmail" id="z_WifeEmail" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->WifeEmail->cellAttributes() ?>>
			<span id="el_ivf_WifeEmail">
<input type="text" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $ivf->WifeEmail->EditValue ?>"<?php echo $ivf->WifeEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label for="x_HusbandEmail" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HusbandEmail"><?php echo $ivf->HusbandEmail->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandEmail" id="z_HusbandEmail" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
			<span id="el_ivf_HusbandEmail">
<input type="text" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $ivf->HusbandEmail->EditValue ?>"<?php echo $ivf->HusbandEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label for="x_ARTCYCLE" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_ARTCYCLE"><?php echo $ivf->ARTCYCLE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ARTCYCLE" id="z_ARTCYCLE" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
			<span id="el_ivf_ARTCYCLE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf->ARTCYCLE->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE" name="x_ARTCYCLE"<?php echo $ivf->ARTCYCLE->editAttributes() ?>>
		<?php echo $ivf->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label for="x_RESULT" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_RESULT"><?php echo $ivf->RESULT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESULT" id="z_RESULT" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->RESULT->cellAttributes() ?>>
			<span id="el_ivf_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_RESULT" data-value-separator="<?php echo $ivf->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf->RESULT->editAttributes() ?>>
		<?php echo $ivf->RESULT->selectOptionListHtml("x_RESULT") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->malepic->Visible) { // malepic ?>
	<div id="r_malepic" class="form-group row">
		<label for="x_malepic" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_malepic"><?php echo $ivf->malepic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_malepic" id="z_malepic" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->malepic->cellAttributes() ?>>
			<span id="el_ivf_malepic">
<input type="text" data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" size="35" placeholder="<?php echo HtmlEncode($ivf->malepic->getPlaceHolder()) ?>" value="<?php echo $ivf->malepic->EditValue ?>"<?php echo $ivf->malepic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label for="x_femalepic" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_femalepic"><?php echo $ivf->femalepic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_femalepic" id="z_femalepic" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->femalepic->cellAttributes() ?>>
			<span id="el_ivf_femalepic">
<input type="text" data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" size="35" placeholder="<?php echo HtmlEncode($ivf->femalepic->getPlaceHolder()) ?>" value="<?php echo $ivf->femalepic->EditValue ?>"<?php echo $ivf->femalepic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->Mgendar->Visible) { // Mgendar ?>
	<div id="r_Mgendar" class="form-group row">
		<label for="x_Mgendar" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Mgendar"><?php echo $ivf->Mgendar->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mgendar" id="z_Mgendar" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->Mgendar->cellAttributes() ?>>
			<span id="el_ivf_Mgendar">
<input type="text" data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" size="35" placeholder="<?php echo HtmlEncode($ivf->Mgendar->getPlaceHolder()) ?>" value="<?php echo $ivf->Mgendar->EditValue ?>"<?php echo $ivf->Mgendar->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->Fgendar->Visible) { // Fgendar ?>
	<div id="r_Fgendar" class="form-group row">
		<label for="x_Fgendar" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Fgendar"><?php echo $ivf->Fgendar->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Fgendar" id="z_Fgendar" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->Fgendar->cellAttributes() ?>>
			<span id="el_ivf_Fgendar">
<input type="text" data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" size="35" placeholder="<?php echo HtmlEncode($ivf->Fgendar->getPlaceHolder()) ?>" value="<?php echo $ivf->Fgendar->EditValue ?>"<?php echo $ivf->Fgendar->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label for="x_CoupleID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_CoupleID"><?php echo $ivf->CoupleID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->CoupleID->cellAttributes() ?>>
			<span id="el_ivf_CoupleID">
<input type="text" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf->CoupleID->EditValue ?>"<?php echo $ivf->CoupleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_HospID"><?php echo $ivf->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->HospID->cellAttributes() ?>>
			<span id="el_ivf_HospID">
<input type="text" data-table="ivf" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($ivf->HospID->getPlaceHolder()) ?>" value="<?php echo $ivf->HospID->EditValue ?>"<?php echo $ivf->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientName"><?php echo $ivf->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->PatientName->cellAttributes() ?>>
			<span id="el_ivf_PatientName">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientName->EditValue ?>"<?php echo $ivf->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PatientID"><?php echo $ivf->PatientID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->PatientID->cellAttributes() ?>>
			<span id="el_ivf_PatientID">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf->PatientID->EditValue ?>"<?php echo $ivf->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PartnerName"><?php echo $ivf->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->PartnerName->cellAttributes() ?>>
			<span id="el_ivf_PartnerName">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerName->EditValue ?>"<?php echo $ivf->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_PartnerID"><?php echo $ivf->PartnerID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->PartnerID->cellAttributes() ?>>
			<span id="el_ivf_PartnerID">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf->PartnerID->EditValue ?>"<?php echo $ivf->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_DrID"><?php echo $ivf->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->DrID->cellAttributes() ?>>
			<span id="el_ivf_DrID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($ivf->DrID->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf->DrID->AdvancedSearch->ViewValue) : $ivf->DrID->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf->DrID->ReadOnly || $ivf->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $ivf->DrID->AdvancedSearch->SearchValue ?>"<?php echo $ivf->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_DrDepartment"><?php echo $ivf->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->DrDepartment->cellAttributes() ?>>
			<span id="el_ivf_DrDepartment">
<input type="text" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $ivf->DrDepartment->EditValue ?>"<?php echo $ivf->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $ivf_search->LeftColumnClass ?>"><span id="elh_ivf_Doctor"><?php echo $ivf->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $ivf_search->RightColumnClass ?>"><div<?php echo $ivf->Doctor->cellAttributes() ?>>
			<span id="el_ivf_Doctor">
<input type="text" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf->Doctor->EditValue ?>"<?php echo $ivf->Doctor->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_search->terminate();
?>