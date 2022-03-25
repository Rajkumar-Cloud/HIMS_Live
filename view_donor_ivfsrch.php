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
$view_donor_ivf_search = new view_donor_ivf_search();

// Run the page
$view_donor_ivf_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_donor_ivf_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_donor_ivf_search->IsModal) { ?>
var fview_donor_ivfsearch = currentAdvancedSearchForm = new ew.Form("fview_donor_ivfsearch", "search");
<?php } else { ?>
var fview_donor_ivfsearch = currentForm = new ew.Form("fview_donor_ivfsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_donor_ivfsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_donor_ivfsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_donor_ivfsearch.lists["x_Female"] = <?php echo $view_donor_ivf_search->Female->Lookup->toClientList() ?>;
fview_donor_ivfsearch.lists["x_Female"].options = <?php echo JsonEncode($view_donor_ivf_search->Female->lookupOptions()) ?>;
fview_donor_ivfsearch.lists["x_status"] = <?php echo $view_donor_ivf_search->status->Lookup->toClientList() ?>;
fview_donor_ivfsearch.lists["x_status"].options = <?php echo JsonEncode($view_donor_ivf_search->status->lookupOptions()) ?>;
fview_donor_ivfsearch.lists["x_ReferedBy"] = <?php echo $view_donor_ivf_search->ReferedBy->Lookup->toClientList() ?>;
fview_donor_ivfsearch.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_donor_ivf_search->ReferedBy->lookupOptions()) ?>;
fview_donor_ivfsearch.lists["x_DrID"] = <?php echo $view_donor_ivf_search->DrID->Lookup->toClientList() ?>;
fview_donor_ivfsearch.lists["x_DrID"].options = <?php echo JsonEncode($view_donor_ivf_search->DrID->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fview_donor_ivfsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Male");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->Male->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->createdby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifiedby");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->modifiedby->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_donor_ivf->HospID->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_donor_ivf_search->showPageHeader(); ?>
<?php
$view_donor_ivf_search->showMessage();
?>
<form name="fview_donor_ivfsearch" id="fview_donor_ivfsearch" class="<?php echo $view_donor_ivf_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_donor_ivf_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_donor_ivf_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_donor_ivf">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_donor_ivf_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_donor_ivf->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_id"><?php echo $view_donor_ivf->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->id->cellAttributes() ?>>
			<span id="el_view_donor_ivf_id">
<input type="text" data-table="view_donor_ivf" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_donor_ivf->id->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->id->EditValue ?>"<?php echo $view_donor_ivf->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label for="x_Male" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Male"><?php echo $view_donor_ivf->Male->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Male" id="z_Male" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->Male->cellAttributes() ?>>
			<span id="el_view_donor_ivf_Male">
<input type="text" data-table="view_donor_ivf" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->Male->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->Male->EditValue ?>"<?php echo $view_donor_ivf->Male->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label for="x_Female" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Female"><?php echo $view_donor_ivf->Female->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Female" id="z_Female" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->Female->cellAttributes() ?>>
			<span id="el_view_donor_ivf_Female">
<input type="text" data-table="view_donor_ivf" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->Female->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->Female->EditValue ?>"<?php echo $view_donor_ivf->Female->editAttributes() ?>>
<?php echo $view_donor_ivf->Female->Lookup->getParamTag("p_x_Female") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label for="x_status" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_status"><?php echo $view_donor_ivf->status->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_status" id="z_status" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->status->cellAttributes() ?>>
			<span id="el_view_donor_ivf_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_donor_ivf" data-field="x_status" data-value-separator="<?php echo $view_donor_ivf->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $view_donor_ivf->status->editAttributes() ?>>
		<?php echo $view_donor_ivf->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $view_donor_ivf->status->Lookup->getParamTag("p_x_status") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_createdby"><?php echo $view_donor_ivf->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createdby" id="z_createdby" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->createdby->cellAttributes() ?>>
			<span id="el_view_donor_ivf_createdby">
<input type="text" data-table="view_donor_ivf" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->createdby->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->createdby->EditValue ?>"<?php echo $view_donor_ivf->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_createddatetime"><?php echo $view_donor_ivf->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->createddatetime->cellAttributes() ?>>
			<span id="el_view_donor_ivf_createddatetime">
<input type="text" data-table="view_donor_ivf" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_donor_ivf->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->createddatetime->EditValue ?>"<?php echo $view_donor_ivf->createddatetime->editAttributes() ?>>
<?php if (!$view_donor_ivf->createddatetime->ReadOnly && !$view_donor_ivf->createddatetime->Disabled && !isset($view_donor_ivf->createddatetime->EditAttrs["readonly"]) && !isset($view_donor_ivf->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_donor_ivfsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_modifiedby"><?php echo $view_donor_ivf->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->modifiedby->cellAttributes() ?>>
			<span id="el_view_donor_ivf_modifiedby">
<input type="text" data-table="view_donor_ivf" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->modifiedby->EditValue ?>"<?php echo $view_donor_ivf->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_modifieddatetime"><?php echo $view_donor_ivf->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_donor_ivf_modifieddatetime">
<input type="text" data-table="view_donor_ivf" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_donor_ivf->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->modifieddatetime->EditValue ?>"<?php echo $view_donor_ivf->modifieddatetime->editAttributes() ?>>
<?php if (!$view_donor_ivf->modifieddatetime->ReadOnly && !$view_donor_ivf->modifieddatetime->Disabled && !isset($view_donor_ivf->modifieddatetime->EditAttrs["readonly"]) && !isset($view_donor_ivf->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_donor_ivfsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_malepropic"><?php echo $view_donor_ivf->malepropic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_malepropic" id="z_malepropic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->malepropic->cellAttributes() ?>>
			<span id="el_view_donor_ivf_malepropic">
<input type="text" data-table="view_donor_ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" placeholder="<?php echo HtmlEncode($view_donor_ivf->malepropic->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->malepropic->EditValue ?>"<?php echo $view_donor_ivf->malepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepropic"><?php echo $view_donor_ivf->femalepropic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_femalepropic" id="z_femalepropic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->femalepropic->cellAttributes() ?>>
			<span id="el_view_donor_ivf_femalepropic">
<input type="text" data-table="view_donor_ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" placeholder="<?php echo HtmlEncode($view_donor_ivf->femalepropic->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->femalepropic->EditValue ?>"<?php echo $view_donor_ivf->femalepropic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label for="x_HusbandEducation" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEducation"><?php echo $view_donor_ivf->HusbandEducation->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandEducation" id="z_HusbandEducation" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
			<span id="el_view_donor_ivf_HusbandEducation">
<input type="text" data-table="view_donor_ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->HusbandEducation->EditValue ?>"<?php echo $view_donor_ivf->HusbandEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label for="x_WifeEducation" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEducation"><?php echo $view_donor_ivf->WifeEducation->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeEducation" id="z_WifeEducation" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->WifeEducation->cellAttributes() ?>>
			<span id="el_view_donor_ivf_WifeEducation">
<input type="text" data-table="view_donor_ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->WifeEducation->EditValue ?>"<?php echo $view_donor_ivf->WifeEducation->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label for="x_HusbandWorkHours" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandWorkHours"><?php echo $view_donor_ivf->HusbandWorkHours->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandWorkHours" id="z_HusbandWorkHours" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
			<span id="el_view_donor_ivf_HusbandWorkHours">
<input type="text" data-table="view_donor_ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->HusbandWorkHours->EditValue ?>"<?php echo $view_donor_ivf->HusbandWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label for="x_WifeWorkHours" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeWorkHours"><?php echo $view_donor_ivf->WifeWorkHours->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeWorkHours" id="z_WifeWorkHours" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
			<span id="el_view_donor_ivf_WifeWorkHours">
<input type="text" data-table="view_donor_ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->WifeWorkHours->EditValue ?>"<?php echo $view_donor_ivf->WifeWorkHours->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label for="x_PatientLanguage" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientLanguage"><?php echo $view_donor_ivf->PatientLanguage->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientLanguage" id="z_PatientLanguage" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
			<span id="el_view_donor_ivf_PatientLanguage">
<input type="text" data-table="view_donor_ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->PatientLanguage->EditValue ?>"<?php echo $view_donor_ivf->PatientLanguage->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label for="x_ReferedBy" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferedBy"><?php echo $view_donor_ivf->ReferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferedBy" id="z_ReferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->ReferedBy->cellAttributes() ?>>
			<span id="el_view_donor_ivf_ReferedBy">
<input type="text" data-table="view_donor_ivf" data-field="x_ReferedBy" name="x_ReferedBy" id="x_ReferedBy" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->ReferedBy->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->ReferedBy->EditValue ?>"<?php echo $view_donor_ivf->ReferedBy->editAttributes() ?>>
<?php echo $view_donor_ivf->ReferedBy->Lookup->getParamTag("p_x_ReferedBy") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label for="x_ReferPhNo" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ReferPhNo"><?php echo $view_donor_ivf->ReferPhNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReferPhNo" id="z_ReferPhNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
			<span id="el_view_donor_ivf_ReferPhNo">
<input type="text" data-table="view_donor_ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->ReferPhNo->EditValue ?>"<?php echo $view_donor_ivf->ReferPhNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label for="x_WifeCell" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeCell"><?php echo $view_donor_ivf->WifeCell->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeCell" id="z_WifeCell" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->WifeCell->cellAttributes() ?>>
			<span id="el_view_donor_ivf_WifeCell">
<input type="text" data-table="view_donor_ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->WifeCell->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->WifeCell->EditValue ?>"<?php echo $view_donor_ivf->WifeCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label for="x_HusbandCell" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandCell"><?php echo $view_donor_ivf->HusbandCell->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandCell" id="z_HusbandCell" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->HusbandCell->cellAttributes() ?>>
			<span id="el_view_donor_ivf_HusbandCell">
<input type="text" data-table="view_donor_ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->HusbandCell->EditValue ?>"<?php echo $view_donor_ivf->HusbandCell->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label for="x_WifeEmail" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_WifeEmail"><?php echo $view_donor_ivf->WifeEmail->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WifeEmail" id="z_WifeEmail" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->WifeEmail->cellAttributes() ?>>
			<span id="el_view_donor_ivf_WifeEmail">
<input type="text" data-table="view_donor_ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->WifeEmail->EditValue ?>"<?php echo $view_donor_ivf->WifeEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label for="x_HusbandEmail" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HusbandEmail"><?php echo $view_donor_ivf->HusbandEmail->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandEmail" id="z_HusbandEmail" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
			<span id="el_view_donor_ivf_HusbandEmail">
<input type="text" data-table="view_donor_ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->HusbandEmail->EditValue ?>"<?php echo $view_donor_ivf->HusbandEmail->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label for="x_ARTCYCLE" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_ARTCYCLE"><?php echo $view_donor_ivf->ARTCYCLE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ARTCYCLE" id="z_ARTCYCLE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
			<span id="el_view_donor_ivf_ARTCYCLE">
<input type="text" data-table="view_donor_ivf" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->ARTCYCLE->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->ARTCYCLE->EditValue ?>"<?php echo $view_donor_ivf->ARTCYCLE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label for="x_RESULT" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_RESULT"><?php echo $view_donor_ivf->RESULT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RESULT" id="z_RESULT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->RESULT->cellAttributes() ?>>
			<span id="el_view_donor_ivf_RESULT">
<input type="text" data-table="view_donor_ivf" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->RESULT->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->RESULT->EditValue ?>"<?php echo $view_donor_ivf->RESULT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label for="x_CoupleID" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_CoupleID"><?php echo $view_donor_ivf->CoupleID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CoupleID" id="z_CoupleID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->CoupleID->cellAttributes() ?>>
			<span id="el_view_donor_ivf_CoupleID">
<input type="text" data-table="view_donor_ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->CoupleID->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->CoupleID->EditValue ?>"<?php echo $view_donor_ivf->CoupleID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_HospID"><?php echo $view_donor_ivf->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->HospID->cellAttributes() ?>>
			<span id="el_view_donor_ivf_HospID">
<input type="text" data-table="view_donor_ivf" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_donor_ivf->HospID->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->HospID->EditValue ?>"<?php echo $view_donor_ivf->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientName"><?php echo $view_donor_ivf->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->PatientName->cellAttributes() ?>>
			<span id="el_view_donor_ivf_PatientName">
<input type="text" data-table="view_donor_ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->PatientName->EditValue ?>"<?php echo $view_donor_ivf->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PatientID"><?php echo $view_donor_ivf->PatientID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->PatientID->cellAttributes() ?>>
			<span id="el_view_donor_ivf_PatientID">
<input type="text" data-table="view_donor_ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->PatientID->EditValue ?>"<?php echo $view_donor_ivf->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerName"><?php echo $view_donor_ivf->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->PartnerName->cellAttributes() ?>>
			<span id="el_view_donor_ivf_PartnerName">
<input type="text" data-table="view_donor_ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->PartnerName->EditValue ?>"<?php echo $view_donor_ivf->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_PartnerID"><?php echo $view_donor_ivf->PartnerID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->PartnerID->cellAttributes() ?>>
			<span id="el_view_donor_ivf_PartnerID">
<input type="text" data-table="view_donor_ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->PartnerID->EditValue ?>"<?php echo $view_donor_ivf->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_DrID"><?php echo $view_donor_ivf->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->DrID->cellAttributes() ?>>
			<span id="el_view_donor_ivf_DrID">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo strval($view_donor_ivf->DrID->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_donor_ivf->DrID->AdvancedSearch->ViewValue) : $view_donor_ivf->DrID->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_donor_ivf->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_donor_ivf->DrID->ReadOnly || $view_donor_ivf->DrID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_donor_ivf->DrID->Lookup->getParamTag("p_x_DrID") ?>
<input type="hidden" data-table="view_donor_ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_donor_ivf->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $view_donor_ivf->DrID->AdvancedSearch->SearchValue ?>"<?php echo $view_donor_ivf->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_DrDepartment"><?php echo $view_donor_ivf->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->DrDepartment->cellAttributes() ?>>
			<span id="el_view_donor_ivf_DrDepartment">
<input type="text" data-table="view_donor_ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->DrDepartment->EditValue ?>"<?php echo $view_donor_ivf->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Doctor"><?php echo $view_donor_ivf->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->Doctor->cellAttributes() ?>>
			<span id="el_view_donor_ivf_Doctor">
<input type="text" data-table="view_donor_ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_donor_ivf->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->Doctor->EditValue ?>"<?php echo $view_donor_ivf->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label for="x_femalepic" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_femalepic"><?php echo $view_donor_ivf->femalepic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_femalepic" id="z_femalepic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->femalepic->cellAttributes() ?>>
			<span id="el_view_donor_ivf_femalepic">
<input type="text" data-table="view_donor_ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" size="35" placeholder="<?php echo HtmlEncode($view_donor_ivf->femalepic->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->femalepic->EditValue ?>"<?php echo $view_donor_ivf->femalepic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_donor_ivf->Fgender->Visible) { // Fgender ?>
	<div id="r_Fgender" class="form-group row">
		<label for="x_Fgender" class="<?php echo $view_donor_ivf_search->LeftColumnClass ?>"><span id="elh_view_donor_ivf_Fgender"><?php echo $view_donor_ivf->Fgender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Fgender" id="z_Fgender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_donor_ivf_search->RightColumnClass ?>"><div<?php echo $view_donor_ivf->Fgender->cellAttributes() ?>>
			<span id="el_view_donor_ivf_Fgender">
<input type="text" data-table="view_donor_ivf" data-field="x_Fgender" name="x_Fgender" id="x_Fgender" size="35" placeholder="<?php echo HtmlEncode($view_donor_ivf->Fgender->getPlaceHolder()) ?>" value="<?php echo $view_donor_ivf->Fgender->EditValue ?>"<?php echo $view_donor_ivf->Fgender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_donor_ivf_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_donor_ivf_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_donor_ivf_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_donor_ivf_search->terminate();
?>