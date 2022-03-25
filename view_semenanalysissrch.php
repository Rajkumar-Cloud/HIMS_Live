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
$view_semenanalysis_search = new view_semenanalysis_search();

// Run the page
$view_semenanalysis_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_semenanalysis_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_semenanalysis_search->IsModal) { ?>
var fview_semenanalysissearch = currentAdvancedSearchForm = new ew.Form("fview_semenanalysissearch", "search");
<?php } else { ?>
var fview_semenanalysissearch = currentForm = new ew.Form("fview_semenanalysissearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_semenanalysissearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_semenanalysissearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_semenanalysissearch.lists["x_RIDNo"] = <?php echo $view_semenanalysis_search->RIDNo->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_RIDNo"].options = <?php echo JsonEncode($view_semenanalysis_search->RIDNo->lookupOptions()) ?>;
fview_semenanalysissearch.lists["x_PatientName"] = <?php echo $view_semenanalysis_search->PatientName->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_PatientName"].options = <?php echo JsonEncode($view_semenanalysis_search->PatientName->lookupOptions()) ?>;
fview_semenanalysissearch.autoSuggests["x_PatientName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_semenanalysissearch.lists["x_HusbandName"] = <?php echo $view_semenanalysis_search->HusbandName->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_HusbandName"].options = <?php echo JsonEncode($view_semenanalysis_search->HusbandName->lookupOptions()) ?>;
fview_semenanalysissearch.lists["x_RequestSample"] = <?php echo $view_semenanalysis_search->RequestSample->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_RequestSample"].options = <?php echo JsonEncode($view_semenanalysis_search->RequestSample->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_CollectionType"] = <?php echo $view_semenanalysis_search->CollectionType->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_CollectionType"].options = <?php echo JsonEncode($view_semenanalysis_search->CollectionType->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_CollectionMethod"] = <?php echo $view_semenanalysis_search->CollectionMethod->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_CollectionMethod"].options = <?php echo JsonEncode($view_semenanalysis_search->CollectionMethod->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_Medicationused"] = <?php echo $view_semenanalysis_search->Medicationused->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_Medicationused"].options = <?php echo JsonEncode($view_semenanalysis_search->Medicationused->lookupOptions()) ?>;
fview_semenanalysissearch.lists["x_DifficultiesinCollection"] = <?php echo $view_semenanalysis_search->DifficultiesinCollection->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_DifficultiesinCollection"].options = <?php echo JsonEncode($view_semenanalysis_search->DifficultiesinCollection->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_Homogenosity"] = <?php echo $view_semenanalysis_search->Homogenosity->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_Homogenosity"].options = <?php echo JsonEncode($view_semenanalysis_search->Homogenosity->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_CompleteSample"] = <?php echo $view_semenanalysis_search->CompleteSample->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_CompleteSample"].options = <?php echo JsonEncode($view_semenanalysis_search->CompleteSample->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_SemenOrgin"] = <?php echo $view_semenanalysis_search->SemenOrgin->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_SemenOrgin"].options = <?php echo JsonEncode($view_semenanalysis_search->SemenOrgin->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_Donor"] = <?php echo $view_semenanalysis_search->Donor->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_Donor"].options = <?php echo JsonEncode($view_semenanalysis_search->Donor->lookupOptions()) ?>;
fview_semenanalysissearch.lists["x_MACS[]"] = <?php echo $view_semenanalysis_search->MACS->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_MACS[]"].options = <?php echo JsonEncode($view_semenanalysis_search->MACS->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_SPECIFIC_PROBLEMS"] = <?php echo $view_semenanalysis_search->SPECIFIC_PROBLEMS->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_SPECIFIC_PROBLEMS"].options = <?php echo JsonEncode($view_semenanalysis_search->SPECIFIC_PROBLEMS->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_LIQUIFACTION_STORAGE"] = <?php echo $view_semenanalysis_search->LIQUIFACTION_STORAGE->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_LIQUIFACTION_STORAGE"].options = <?php echo JsonEncode($view_semenanalysis_search->LIQUIFACTION_STORAGE->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_IUI_PREP_METHOD"] = <?php echo $view_semenanalysis_search->IUI_PREP_METHOD->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_IUI_PREP_METHOD"].options = <?php echo JsonEncode($view_semenanalysis_search->IUI_PREP_METHOD->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_TIME_FROM_TRIGGER"] = <?php echo $view_semenanalysis_search->TIME_FROM_TRIGGER->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_TIME_FROM_TRIGGER"].options = <?php echo JsonEncode($view_semenanalysis_search->TIME_FROM_TRIGGER->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_COLLECTION_TO_PREPARATION"] = <?php echo $view_semenanalysis_search->COLLECTION_TO_PREPARATION->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_COLLECTION_TO_PREPARATION"].options = <?php echo JsonEncode($view_semenanalysis_search->COLLECTION_TO_PREPARATION->options(FALSE, TRUE)) ?>;
fview_semenanalysissearch.lists["x_TIME_FROM_PREP_TO_INSEM"] = <?php echo $view_semenanalysis_search->TIME_FROM_PREP_TO_INSEM->Lookup->toClientList() ?>;
fview_semenanalysissearch.lists["x_TIME_FROM_PREP_TO_INSEM"].options = <?php echo JsonEncode($view_semenanalysis_search->TIME_FROM_PREP_TO_INSEM->options(FALSE, TRUE)) ?>;

// Form object for search
// Validate function for search

fview_semenanalysissearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CollectionDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->CollectionDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ResultDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->ResultDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PREG_TEST_DATE");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_semenanalysis->PREG_TEST_DATE->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_semenanalysis_search->showPageHeader(); ?>
<?php
$view_semenanalysis_search->showMessage();
?>
<form name="fview_semenanalysissearch" id="fview_semenanalysissearch" class="<?php echo $view_semenanalysis_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_semenanalysis_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_semenanalysis_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_semenanalysis_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_semenanalysis->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_id"><?php echo $view_semenanalysis->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->id->cellAttributes() ?>>
			<span id="el_view_semenanalysis_id">
<input type="text" data-table="view_semenanalysis" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_semenanalysis->id->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->id->EditValue ?>"<?php echo $view_semenanalysis->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PaID->Visible) { // PaID ?>
	<div id="r_PaID" class="form-group row">
		<label for="x_PaID" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaID"><?php echo $view_semenanalysis->PaID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaID" id="z_PaID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PaID->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PaID">
<input type="text" data-table="view_semenanalysis" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaID->EditValue ?>"<?php echo $view_semenanalysis->PaID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PaName->Visible) { // PaName ?>
	<div id="r_PaName" class="form-group row">
		<label for="x_PaName" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaName"><?php echo $view_semenanalysis->PaName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaName" id="z_PaName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PaName->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PaName">
<input type="text" data-table="view_semenanalysis" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaName->EditValue ?>"<?php echo $view_semenanalysis->PaName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PaMobile->Visible) { // PaMobile ?>
	<div id="r_PaMobile" class="form-group row">
		<label for="x_PaMobile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PaMobile"><?php echo $view_semenanalysis->PaMobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PaMobile" id="z_PaMobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PaMobile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PaMobile">
<input type="text" data-table="view_semenanalysis" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PaMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PaMobile->EditValue ?>"<?php echo $view_semenanalysis->PaMobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label for="x_PartnerID" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerID"><?php echo $view_semenanalysis->PartnerID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerID" id="z_PartnerID" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PartnerID->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PartnerID">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerID->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerID->EditValue ?>"<?php echo $view_semenanalysis->PartnerID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerName"><?php echo $view_semenanalysis->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PartnerName->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PartnerName">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerName->EditValue ?>"<?php echo $view_semenanalysis->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PartnerMobile->Visible) { // PartnerMobile ?>
	<div id="r_PartnerMobile" class="form-group row">
		<label for="x_PartnerMobile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PartnerMobile"><?php echo $view_semenanalysis->PartnerMobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerMobile" id="z_PartnerMobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PartnerMobile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PartnerMobile">
<input type="text" data-table="view_semenanalysis" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PartnerMobile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PartnerMobile->EditValue ?>"<?php echo $view_semenanalysis->PartnerMobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label for="x_RIDNo" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RIDNo"><?php echo $view_semenanalysis->RIDNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNo" id="z_RIDNo" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->RIDNo->cellAttributes() ?>>
			<span id="el_view_semenanalysis_RIDNo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNo"><?php echo strval($view_semenanalysis->RIDNo->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_semenanalysis->RIDNo->AdvancedSearch->ViewValue) : $view_semenanalysis->RIDNo->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis->RIDNo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_semenanalysis->RIDNo->ReadOnly || $view_semenanalysis->RIDNo->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNo',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis->RIDNo->Lookup->getParamTag("p_x_RIDNo") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_RIDNo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis->RIDNo->displayValueSeparatorAttribute() ?>" name="x_RIDNo" id="x_RIDNo" value="<?php echo $view_semenanalysis->RIDNo->AdvancedSearch->SearchValue ?>"<?php echo $view_semenanalysis->RIDNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PatientName"><?php echo $view_semenanalysis->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PatientName->cellAttributes() ?>>
			<span id="el_view_semenanalysis_PatientName">
<?php
$wrkonchange = "" . trim(@$view_semenanalysis->PatientName->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_semenanalysis->PatientName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PatientName" class="text-nowrap" style="z-index: 8910">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_PatientName" id="sv_x_PatientName" value="<?php echo RemoveHtml($view_semenanalysis->PatientName->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->PatientName->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_semenanalysis->PatientName->getPlaceHolder()) ?>"<?php echo $view_semenanalysis->PatientName->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis->PatientName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PatientName',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($view_semenanalysis->PatientName->ReadOnly || $view_semenanalysis->PatientName->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PatientName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis->PatientName->displayValueSeparatorAttribute() ?>" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($view_semenanalysis->PatientName->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_semenanalysissearch.createAutoSuggest({"id":"x_PatientName","forceSelect":false});
</script>
<?php echo $view_semenanalysis->PatientName->Lookup->getParamTag("p_x_PatientName") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->HusbandName->Visible) { // HusbandName ?>
	<div id="r_HusbandName" class="form-group row">
		<label for="x_HusbandName" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_HusbandName"><?php echo $view_semenanalysis->HusbandName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->HusbandName->cellAttributes() ?>>
			<span id="el_view_semenanalysis_HusbandName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HusbandName"><?php echo strval($view_semenanalysis->HusbandName->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_semenanalysis->HusbandName->AdvancedSearch->ViewValue) : $view_semenanalysis->HusbandName->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis->HusbandName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_semenanalysis->HusbandName->ReadOnly || $view_semenanalysis->HusbandName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_HusbandName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis->HusbandName->Lookup->getParamTag("p_x_HusbandName") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_HusbandName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis->HusbandName->displayValueSeparatorAttribute() ?>" name="x_HusbandName" id="x_HusbandName" value="<?php echo $view_semenanalysis->HusbandName->AdvancedSearch->SearchValue ?>"<?php echo $view_semenanalysis->HusbandName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->RequestDr->Visible) { // RequestDr ?>
	<div id="r_RequestDr" class="form-group row">
		<label for="x_RequestDr" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestDr"><?php echo $view_semenanalysis->RequestDr->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RequestDr" id="z_RequestDr" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->RequestDr->cellAttributes() ?>>
			<span id="el_view_semenanalysis_RequestDr">
<input type="text" data-table="view_semenanalysis" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->RequestDr->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->RequestDr->EditValue ?>"<?php echo $view_semenanalysis->RequestDr->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->CollectionDate->Visible) { // CollectionDate ?>
	<div id="r_CollectionDate" class="form-group row">
		<label for="x_CollectionDate" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionDate"><?php echo $view_semenanalysis->CollectionDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CollectionDate" id="z_CollectionDate" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->CollectionDate->cellAttributes() ?>>
			<span id="el_view_semenanalysis_CollectionDate">
<input type="text" data-table="view_semenanalysis" data-field="x_CollectionDate" data-format="7" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?php echo HtmlEncode($view_semenanalysis->CollectionDate->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->CollectionDate->EditValue ?>"<?php echo $view_semenanalysis->CollectionDate->editAttributes() ?>>
<?php if (!$view_semenanalysis->CollectionDate->ReadOnly && !$view_semenanalysis->CollectionDate->Disabled && !isset($view_semenanalysis->CollectionDate->EditAttrs["readonly"]) && !isset($view_semenanalysis->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysissearch", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ResultDate"><?php echo $view_semenanalysis->ResultDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ResultDate" id="z_ResultDate" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ResultDate->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ResultDate">
<input type="text" data-table="view_semenanalysis" data-field="x_ResultDate" data-format="7" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($view_semenanalysis->ResultDate->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ResultDate->EditValue ?>"<?php echo $view_semenanalysis->ResultDate->editAttributes() ?>>
<?php if (!$view_semenanalysis->ResultDate->ReadOnly && !$view_semenanalysis->ResultDate->Disabled && !isset($view_semenanalysis->ResultDate->EditAttrs["readonly"]) && !isset($view_semenanalysis->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysissearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->RequestSample->Visible) { // RequestSample ?>
	<div id="r_RequestSample" class="form-group row">
		<label for="x_RequestSample" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_RequestSample"><?php echo $view_semenanalysis->RequestSample->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RequestSample" id="z_RequestSample" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->RequestSample->cellAttributes() ?>>
			<span id="el_view_semenanalysis_RequestSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_RequestSample" data-value-separator="<?php echo $view_semenanalysis->RequestSample->displayValueSeparatorAttribute() ?>" id="x_RequestSample" name="x_RequestSample"<?php echo $view_semenanalysis->RequestSample->editAttributes() ?>>
		<?php echo $view_semenanalysis->RequestSample->selectOptionListHtml("x_RequestSample") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->CollectionType->Visible) { // CollectionType ?>
	<div id="r_CollectionType" class="form-group row">
		<label for="x_CollectionType" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionType"><?php echo $view_semenanalysis->CollectionType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CollectionType" id="z_CollectionType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->CollectionType->cellAttributes() ?>>
			<span id="el_view_semenanalysis_CollectionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CollectionType" data-value-separator="<?php echo $view_semenanalysis->CollectionType->displayValueSeparatorAttribute() ?>" id="x_CollectionType" name="x_CollectionType"<?php echo $view_semenanalysis->CollectionType->editAttributes() ?>>
		<?php echo $view_semenanalysis->CollectionType->selectOptionListHtml("x_CollectionType") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->CollectionMethod->Visible) { // CollectionMethod ?>
	<div id="r_CollectionMethod" class="form-group row">
		<label for="x_CollectionMethod" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CollectionMethod"><?php echo $view_semenanalysis->CollectionMethod->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CollectionMethod" id="z_CollectionMethod" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->CollectionMethod->cellAttributes() ?>>
			<span id="el_view_semenanalysis_CollectionMethod">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CollectionMethod" data-value-separator="<?php echo $view_semenanalysis->CollectionMethod->displayValueSeparatorAttribute() ?>" id="x_CollectionMethod" name="x_CollectionMethod"<?php echo $view_semenanalysis->CollectionMethod->editAttributes() ?>>
		<?php echo $view_semenanalysis->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Medicationused->Visible) { // Medicationused ?>
	<div id="r_Medicationused" class="form-group row">
		<label for="x_Medicationused" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Medicationused"><?php echo $view_semenanalysis->Medicationused->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Medicationused" id="z_Medicationused" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Medicationused->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Medicationused">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_Medicationused" data-value-separator="<?php echo $view_semenanalysis->Medicationused->displayValueSeparatorAttribute() ?>" id="x_Medicationused" name="x_Medicationused"<?php echo $view_semenanalysis->Medicationused->editAttributes() ?>>
		<?php echo $view_semenanalysis->Medicationused->selectOptionListHtml("x_Medicationused") ?>
	</select>
</div>
<?php echo $view_semenanalysis->Medicationused->Lookup->getParamTag("p_x_Medicationused") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
	<div id="r_DifficultiesinCollection" class="form-group row">
		<label for="x_DifficultiesinCollection" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DifficultiesinCollection"><?php echo $view_semenanalysis->DifficultiesinCollection->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DifficultiesinCollection" id="z_DifficultiesinCollection" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->DifficultiesinCollection->cellAttributes() ?>>
			<span id="el_view_semenanalysis_DifficultiesinCollection">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_DifficultiesinCollection" data-value-separator="<?php echo $view_semenanalysis->DifficultiesinCollection->displayValueSeparatorAttribute() ?>" id="x_DifficultiesinCollection" name="x_DifficultiesinCollection"<?php echo $view_semenanalysis->DifficultiesinCollection->editAttributes() ?>>
		<?php echo $view_semenanalysis->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Volume->Visible) { // Volume ?>
	<div id="r_Volume" class="form-group row">
		<label for="x_Volume" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume"><?php echo $view_semenanalysis->Volume->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Volume" id="z_Volume" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Volume->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Volume">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Volume->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Volume->EditValue ?>"<?php echo $view_semenanalysis->Volume->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->pH->Visible) { // pH ?>
	<div id="r_pH" class="form-group row">
		<label for="x_pH" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_pH"><?php echo $view_semenanalysis->pH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_pH" id="z_pH" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->pH->cellAttributes() ?>>
			<span id="el_view_semenanalysis_pH">
<input type="text" data-table="view_semenanalysis" data-field="x_pH" name="x_pH" id="x_pH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->pH->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->pH->EditValue ?>"<?php echo $view_semenanalysis->pH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Timeofcollection->Visible) { // Timeofcollection ?>
	<div id="r_Timeofcollection" class="form-group row">
		<label for="x_Timeofcollection" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofcollection"><?php echo $view_semenanalysis->Timeofcollection->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Timeofcollection" id="z_Timeofcollection" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Timeofcollection->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Timeofcollection">
<input type="text" data-table="view_semenanalysis" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Timeofcollection->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Timeofcollection->EditValue ?>"<?php echo $view_semenanalysis->Timeofcollection->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Timeofexamination->Visible) { // Timeofexamination ?>
	<div id="r_Timeofexamination" class="form-group row">
		<label for="x_Timeofexamination" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Timeofexamination"><?php echo $view_semenanalysis->Timeofexamination->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Timeofexamination" id="z_Timeofexamination" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Timeofexamination->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Timeofexamination">
<input type="text" data-table="view_semenanalysis" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Timeofexamination->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Timeofexamination->EditValue ?>"<?php echo $view_semenanalysis->Timeofexamination->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Concentration->Visible) { // Concentration ?>
	<div id="r_Concentration" class="form-group row">
		<label for="x_Concentration" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration"><?php echo $view_semenanalysis->Concentration->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Concentration" id="z_Concentration" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Concentration->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Concentration">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Concentration->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Concentration->EditValue ?>"<?php echo $view_semenanalysis->Concentration->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label for="x_Total" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total"><?php echo $view_semenanalysis->Total->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Total" id="z_Total" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Total->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Total">
<input type="text" data-table="view_semenanalysis" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Total->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Total->EditValue ?>"<?php echo $view_semenanalysis->Total->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
	<div id="r_ProgressiveMotility" class="form-group row">
		<label for="x_ProgressiveMotility" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility"><?php echo $view_semenanalysis->ProgressiveMotility->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProgressiveMotility" id="z_ProgressiveMotility" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ProgressiveMotility->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ProgressiveMotility">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->ProgressiveMotility->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ProgressiveMotility->EditValue ?>"<?php echo $view_semenanalysis->ProgressiveMotility->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
	<div id="r_NonProgrssiveMotile" class="form-group row">
		<label for="x_NonProgrssiveMotile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile"><?php echo $view_semenanalysis->NonProgrssiveMotile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NonProgrssiveMotile" id="z_NonProgrssiveMotile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NonProgrssiveMotile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NonProgrssiveMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NonProgrssiveMotile->EditValue ?>"<?php echo $view_semenanalysis->NonProgrssiveMotile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Immotile->Visible) { // Immotile ?>
	<div id="r_Immotile" class="form-group row">
		<label for="x_Immotile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile"><?php echo $view_semenanalysis->Immotile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Immotile" id="z_Immotile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Immotile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Immotile">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Immotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Immotile->EditValue ?>"<?php echo $view_semenanalysis->Immotile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
	<div id="r_TotalProgrssiveMotile" class="form-group row">
		<label for="x_TotalProgrssiveMotile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile"><?php echo $view_semenanalysis->TotalProgrssiveMotile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TotalProgrssiveMotile" id="z_TotalProgrssiveMotile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TotalProgrssiveMotile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TotalProgrssiveMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->TotalProgrssiveMotile->EditValue ?>"<?php echo $view_semenanalysis->TotalProgrssiveMotile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Appearance->Visible) { // Appearance ?>
	<div id="r_Appearance" class="form-group row">
		<label for="x_Appearance" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Appearance"><?php echo $view_semenanalysis->Appearance->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Appearance" id="z_Appearance" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Appearance->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Appearance">
<input type="text" data-table="view_semenanalysis" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Appearance->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Appearance->EditValue ?>"<?php echo $view_semenanalysis->Appearance->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Homogenosity->Visible) { // Homogenosity ?>
	<div id="r_Homogenosity" class="form-group row">
		<label for="x_Homogenosity" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Homogenosity"><?php echo $view_semenanalysis->Homogenosity->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Homogenosity" id="z_Homogenosity" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Homogenosity->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Homogenosity">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_Homogenosity" data-value-separator="<?php echo $view_semenanalysis->Homogenosity->displayValueSeparatorAttribute() ?>" id="x_Homogenosity" name="x_Homogenosity"<?php echo $view_semenanalysis->Homogenosity->editAttributes() ?>>
		<?php echo $view_semenanalysis->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->CompleteSample->Visible) { // CompleteSample ?>
	<div id="r_CompleteSample" class="form-group row">
		<label for="x_CompleteSample" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_CompleteSample"><?php echo $view_semenanalysis->CompleteSample->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CompleteSample" id="z_CompleteSample" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->CompleteSample->cellAttributes() ?>>
			<span id="el_view_semenanalysis_CompleteSample">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_CompleteSample" data-value-separator="<?php echo $view_semenanalysis->CompleteSample->displayValueSeparatorAttribute() ?>" id="x_CompleteSample" name="x_CompleteSample"<?php echo $view_semenanalysis->CompleteSample->editAttributes() ?>>
		<?php echo $view_semenanalysis->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Liquefactiontime->Visible) { // Liquefactiontime ?>
	<div id="r_Liquefactiontime" class="form-group row">
		<label for="x_Liquefactiontime" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Liquefactiontime"><?php echo $view_semenanalysis->Liquefactiontime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Liquefactiontime" id="z_Liquefactiontime" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Liquefactiontime->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Liquefactiontime">
<input type="text" data-table="view_semenanalysis" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Liquefactiontime->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Liquefactiontime->EditValue ?>"<?php echo $view_semenanalysis->Liquefactiontime->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Normal->Visible) { // Normal ?>
	<div id="r_Normal" class="form-group row">
		<label for="x_Normal" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Normal"><?php echo $view_semenanalysis->Normal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Normal" id="z_Normal" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Normal->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Normal">
<input type="text" data-table="view_semenanalysis" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Normal->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Normal->EditValue ?>"<?php echo $view_semenanalysis->Normal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Abnormal"><?php echo $view_semenanalysis->Abnormal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Abnormal->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Abnormal">
<input type="text" data-table="view_semenanalysis" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Abnormal->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Abnormal->EditValue ?>"<?php echo $view_semenanalysis->Abnormal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Headdefects->Visible) { // Headdefects ?>
	<div id="r_Headdefects" class="form-group row">
		<label for="x_Headdefects" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Headdefects"><?php echo $view_semenanalysis->Headdefects->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Headdefects" id="z_Headdefects" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Headdefects->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Headdefects">
<input type="text" data-table="view_semenanalysis" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Headdefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Headdefects->EditValue ?>"<?php echo $view_semenanalysis->Headdefects->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->MidpieceDefects->Visible) { // MidpieceDefects ?>
	<div id="r_MidpieceDefects" class="form-group row">
		<label for="x_MidpieceDefects" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_MidpieceDefects"><?php echo $view_semenanalysis->MidpieceDefects->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MidpieceDefects" id="z_MidpieceDefects" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->MidpieceDefects->cellAttributes() ?>>
			<span id="el_view_semenanalysis_MidpieceDefects">
<input type="text" data-table="view_semenanalysis" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->MidpieceDefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->MidpieceDefects->EditValue ?>"<?php echo $view_semenanalysis->MidpieceDefects->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TailDefects->Visible) { // TailDefects ?>
	<div id="r_TailDefects" class="form-group row">
		<label for="x_TailDefects" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TailDefects"><?php echo $view_semenanalysis->TailDefects->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TailDefects" id="z_TailDefects" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TailDefects->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TailDefects">
<input type="text" data-table="view_semenanalysis" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->TailDefects->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->TailDefects->EditValue ?>"<?php echo $view_semenanalysis->TailDefects->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NormalProgMotile->Visible) { // NormalProgMotile ?>
	<div id="r_NormalProgMotile" class="form-group row">
		<label for="x_NormalProgMotile" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NormalProgMotile"><?php echo $view_semenanalysis->NormalProgMotile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NormalProgMotile" id="z_NormalProgMotile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NormalProgMotile->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NormalProgMotile">
<input type="text" data-table="view_semenanalysis" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NormalProgMotile->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NormalProgMotile->EditValue ?>"<?php echo $view_semenanalysis->NormalProgMotile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ImmatureForms->Visible) { // ImmatureForms ?>
	<div id="r_ImmatureForms" class="form-group row">
		<label for="x_ImmatureForms" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ImmatureForms"><?php echo $view_semenanalysis->ImmatureForms->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ImmatureForms" id="z_ImmatureForms" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ImmatureForms->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ImmatureForms">
<input type="text" data-table="view_semenanalysis" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->ImmatureForms->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ImmatureForms->EditValue ?>"<?php echo $view_semenanalysis->ImmatureForms->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Leucocytes->Visible) { // Leucocytes ?>
	<div id="r_Leucocytes" class="form-group row">
		<label for="x_Leucocytes" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Leucocytes"><?php echo $view_semenanalysis->Leucocytes->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Leucocytes" id="z_Leucocytes" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Leucocytes->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Leucocytes">
<input type="text" data-table="view_semenanalysis" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Leucocytes->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Leucocytes->EditValue ?>"<?php echo $view_semenanalysis->Leucocytes->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Agglutination->Visible) { // Agglutination ?>
	<div id="r_Agglutination" class="form-group row">
		<label for="x_Agglutination" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Agglutination"><?php echo $view_semenanalysis->Agglutination->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Agglutination" id="z_Agglutination" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Agglutination->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Agglutination">
<input type="text" data-table="view_semenanalysis" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Agglutination->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Agglutination->EditValue ?>"<?php echo $view_semenanalysis->Agglutination->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Debris->Visible) { // Debris ?>
	<div id="r_Debris" class="form-group row">
		<label for="x_Debris" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Debris"><?php echo $view_semenanalysis->Debris->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Debris" id="z_Debris" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Debris->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Debris">
<input type="text" data-table="view_semenanalysis" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Debris->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Debris->EditValue ?>"<?php echo $view_semenanalysis->Debris->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Diagnosis->Visible) { // Diagnosis ?>
	<div id="r_Diagnosis" class="form-group row">
		<label for="x_Diagnosis" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Diagnosis"><?php echo $view_semenanalysis->Diagnosis->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Diagnosis" id="z_Diagnosis" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Diagnosis->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Diagnosis">
<input type="text" data-table="view_semenanalysis" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" placeholder="<?php echo HtmlEncode($view_semenanalysis->Diagnosis->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Diagnosis->EditValue ?>"<?php echo $view_semenanalysis->Diagnosis->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Observations->Visible) { // Observations ?>
	<div id="r_Observations" class="form-group row">
		<label for="x_Observations" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Observations"><?php echo $view_semenanalysis->Observations->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Observations" id="z_Observations" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Observations->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Observations">
<input type="text" data-table="view_semenanalysis" data-field="x_Observations" name="x_Observations" id="x_Observations" placeholder="<?php echo HtmlEncode($view_semenanalysis->Observations->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Observations->EditValue ?>"<?php echo $view_semenanalysis->Observations->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Signature->Visible) { // Signature ?>
	<div id="r_Signature" class="form-group row">
		<label for="x_Signature" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Signature"><?php echo $view_semenanalysis->Signature->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Signature" id="z_Signature" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Signature->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Signature">
<input type="text" data-table="view_semenanalysis" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Signature->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Signature->EditValue ?>"<?php echo $view_semenanalysis->Signature->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->SemenOrgin->Visible) { // SemenOrgin ?>
	<div id="r_SemenOrgin" class="form-group row">
		<label for="x_SemenOrgin" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_SemenOrgin"><?php echo $view_semenanalysis->SemenOrgin->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SemenOrgin" id="z_SemenOrgin" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->SemenOrgin->cellAttributes() ?>>
			<span id="el_view_semenanalysis_SemenOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_SemenOrgin" data-value-separator="<?php echo $view_semenanalysis->SemenOrgin->displayValueSeparatorAttribute() ?>" id="x_SemenOrgin" name="x_SemenOrgin"<?php echo $view_semenanalysis->SemenOrgin->editAttributes() ?>>
		<?php echo $view_semenanalysis->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Donor->Visible) { // Donor ?>
	<div id="r_Donor" class="form-group row">
		<label for="x_Donor" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Donor"><?php echo $view_semenanalysis->Donor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Donor" id="z_Donor" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Donor->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Donor">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?php echo strval($view_semenanalysis->Donor->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_semenanalysis->Donor->AdvancedSearch->ViewValue) : $view_semenanalysis->Donor->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_semenanalysis->Donor->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_semenanalysis->Donor->ReadOnly || $view_semenanalysis->Donor->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_semenanalysis->Donor->Lookup->getParamTag("p_x_Donor") ?>
<input type="hidden" data-table="view_semenanalysis" data-field="x_Donor" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_semenanalysis->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?php echo $view_semenanalysis->Donor->AdvancedSearch->SearchValue ?>"<?php echo $view_semenanalysis->Donor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
	<div id="r_DonorBloodgroup" class="form-group row">
		<label for="x_DonorBloodgroup" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DonorBloodgroup"><?php echo $view_semenanalysis->DonorBloodgroup->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DonorBloodgroup" id="z_DonorBloodgroup" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->DonorBloodgroup->cellAttributes() ?>>
			<span id="el_view_semenanalysis_DonorBloodgroup">
<input type="text" data-table="view_semenanalysis" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->DonorBloodgroup->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->DonorBloodgroup->EditValue ?>"<?php echo $view_semenanalysis->DonorBloodgroup->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label for="x_Tank" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Tank"><?php echo $view_semenanalysis->Tank->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Tank" id="z_Tank" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Tank->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Tank">
<input type="text" data-table="view_semenanalysis" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Tank->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Tank->EditValue ?>"<?php echo $view_semenanalysis->Tank->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Location->Visible) { // Location ?>
	<div id="r_Location" class="form-group row">
		<label for="x_Location" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Location"><?php echo $view_semenanalysis->Location->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Location" id="z_Location" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Location->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Location">
<input type="text" data-table="view_semenanalysis" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Location->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Location->EditValue ?>"<?php echo $view_semenanalysis->Location->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Volume1->Visible) { // Volume1 ?>
	<div id="r_Volume1" class="form-group row">
		<label for="x_Volume1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume1"><?php echo $view_semenanalysis->Volume1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Volume1" id="z_Volume1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Volume1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Volume1">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Volume1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Volume1->EditValue ?>"<?php echo $view_semenanalysis->Volume1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Concentration1->Visible) { // Concentration1 ?>
	<div id="r_Concentration1" class="form-group row">
		<label for="x_Concentration1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration1"><?php echo $view_semenanalysis->Concentration1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Concentration1" id="z_Concentration1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Concentration1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Concentration1">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Concentration1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Concentration1->EditValue ?>"<?php echo $view_semenanalysis->Concentration1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Total1->Visible) { // Total1 ?>
	<div id="r_Total1" class="form-group row">
		<label for="x_Total1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total1"><?php echo $view_semenanalysis->Total1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Total1" id="z_Total1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Total1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Total1">
<input type="text" data-table="view_semenanalysis" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Total1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Total1->EditValue ?>"<?php echo $view_semenanalysis->Total1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
	<div id="r_ProgressiveMotility1" class="form-group row">
		<label for="x_ProgressiveMotility1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility1"><?php echo $view_semenanalysis->ProgressiveMotility1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProgressiveMotility1" id="z_ProgressiveMotility1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ProgressiveMotility1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ProgressiveMotility1">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ProgressiveMotility1->EditValue ?>"<?php echo $view_semenanalysis->ProgressiveMotility1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
	<div id="r_NonProgrssiveMotile1" class="form-group row">
		<label for="x_NonProgrssiveMotile1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile1"><?php echo $view_semenanalysis->NonProgrssiveMotile1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NonProgrssiveMotile1" id="z_NonProgrssiveMotile1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NonProgrssiveMotile1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NonProgrssiveMotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NonProgrssiveMotile1->EditValue ?>"<?php echo $view_semenanalysis->NonProgrssiveMotile1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Immotile1->Visible) { // Immotile1 ?>
	<div id="r_Immotile1" class="form-group row">
		<label for="x_Immotile1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile1"><?php echo $view_semenanalysis->Immotile1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Immotile1" id="z_Immotile1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Immotile1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Immotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Immotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Immotile1->EditValue ?>"<?php echo $view_semenanalysis->Immotile1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
	<div id="r_TotalProgrssiveMotile1" class="form-group row">
		<label for="x_TotalProgrssiveMotile1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile1"><?php echo $view_semenanalysis->TotalProgrssiveMotile1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TotalProgrssiveMotile1" id="z_TotalProgrssiveMotile1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TotalProgrssiveMotile1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TotalProgrssiveMotile1">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->TotalProgrssiveMotile1->EditValue ?>"<?php echo $view_semenanalysis->TotalProgrssiveMotile1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TidNo"><?php echo $view_semenanalysis->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TidNo->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TidNo">
<input type="text" data-table="view_semenanalysis" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_semenanalysis->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->TidNo->EditValue ?>"<?php echo $view_semenanalysis->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Color->Visible) { // Color ?>
	<div id="r_Color" class="form-group row">
		<label for="x_Color" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Color"><?php echo $view_semenanalysis->Color->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Color" id="z_Color" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Color->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Color">
<input type="text" data-table="view_semenanalysis" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Color->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Color->EditValue ?>"<?php echo $view_semenanalysis->Color->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->DoneBy->Visible) { // DoneBy ?>
	<div id="r_DoneBy" class="form-group row">
		<label for="x_DoneBy" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DoneBy"><?php echo $view_semenanalysis->DoneBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DoneBy" id="z_DoneBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->DoneBy->cellAttributes() ?>>
			<span id="el_view_semenanalysis_DoneBy">
<input type="text" data-table="view_semenanalysis" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->DoneBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->DoneBy->EditValue ?>"<?php echo $view_semenanalysis->DoneBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Method"><?php echo $view_semenanalysis->Method->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Method" id="z_Method" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Method->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Method">
<input type="text" data-table="view_semenanalysis" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Method->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Method->EditValue ?>"<?php echo $view_semenanalysis->Method->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Abstinence->Visible) { // Abstinence ?>
	<div id="r_Abstinence" class="form-group row">
		<label for="x_Abstinence" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Abstinence"><?php echo $view_semenanalysis->Abstinence->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Abstinence" id="z_Abstinence" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Abstinence->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Abstinence">
<input type="text" data-table="view_semenanalysis" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Abstinence->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Abstinence->EditValue ?>"<?php echo $view_semenanalysis->Abstinence->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ProcessedBy->Visible) { // ProcessedBy ?>
	<div id="r_ProcessedBy" class="form-group row">
		<label for="x_ProcessedBy" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProcessedBy"><?php echo $view_semenanalysis->ProcessedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProcessedBy" id="z_ProcessedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ProcessedBy->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ProcessedBy">
<input type="text" data-table="view_semenanalysis" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->ProcessedBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ProcessedBy->EditValue ?>"<?php echo $view_semenanalysis->ProcessedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->InseminationTime->Visible) { // InseminationTime ?>
	<div id="r_InseminationTime" class="form-group row">
		<label for="x_InseminationTime" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationTime"><?php echo $view_semenanalysis->InseminationTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_InseminationTime" id="z_InseminationTime" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->InseminationTime->cellAttributes() ?>>
			<span id="el_view_semenanalysis_InseminationTime">
<input type="text" data-table="view_semenanalysis" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->InseminationTime->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->InseminationTime->EditValue ?>"<?php echo $view_semenanalysis->InseminationTime->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->InseminationBy->Visible) { // InseminationBy ?>
	<div id="r_InseminationBy" class="form-group row">
		<label for="x_InseminationBy" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_InseminationBy"><?php echo $view_semenanalysis->InseminationBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_InseminationBy" id="z_InseminationBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->InseminationBy->cellAttributes() ?>>
			<span id="el_view_semenanalysis_InseminationBy">
<input type="text" data-table="view_semenanalysis" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->InseminationBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->InseminationBy->EditValue ?>"<?php echo $view_semenanalysis->InseminationBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Big->Visible) { // Big ?>
	<div id="r_Big" class="form-group row">
		<label for="x_Big" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Big"><?php echo $view_semenanalysis->Big->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Big" id="z_Big" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Big->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Big">
<input type="text" data-table="view_semenanalysis" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Big->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Big->EditValue ?>"<?php echo $view_semenanalysis->Big->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Medium->Visible) { // Medium ?>
	<div id="r_Medium" class="form-group row">
		<label for="x_Medium" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Medium"><?php echo $view_semenanalysis->Medium->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Medium" id="z_Medium" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Medium->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Medium">
<input type="text" data-table="view_semenanalysis" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Medium->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Medium->EditValue ?>"<?php echo $view_semenanalysis->Medium->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Small->Visible) { // Small ?>
	<div id="r_Small" class="form-group row">
		<label for="x_Small" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Small"><?php echo $view_semenanalysis->Small->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Small" id="z_Small" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Small->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Small">
<input type="text" data-table="view_semenanalysis" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Small->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Small->EditValue ?>"<?php echo $view_semenanalysis->Small->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NoHalo->Visible) { // NoHalo ?>
	<div id="r_NoHalo" class="form-group row">
		<label for="x_NoHalo" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NoHalo"><?php echo $view_semenanalysis->NoHalo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NoHalo" id="z_NoHalo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NoHalo->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NoHalo">
<input type="text" data-table="view_semenanalysis" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NoHalo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NoHalo->EditValue ?>"<?php echo $view_semenanalysis->NoHalo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Fragmented->Visible) { // Fragmented ?>
	<div id="r_Fragmented" class="form-group row">
		<label for="x_Fragmented" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Fragmented"><?php echo $view_semenanalysis->Fragmented->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Fragmented" id="z_Fragmented" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Fragmented->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Fragmented">
<input type="text" data-table="view_semenanalysis" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Fragmented->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Fragmented->EditValue ?>"<?php echo $view_semenanalysis->Fragmented->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NonFragmented->Visible) { // NonFragmented ?>
	<div id="r_NonFragmented" class="form-group row">
		<label for="x_NonFragmented" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonFragmented"><?php echo $view_semenanalysis->NonFragmented->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NonFragmented" id="z_NonFragmented" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NonFragmented->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NonFragmented">
<input type="text" data-table="view_semenanalysis" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NonFragmented->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NonFragmented->EditValue ?>"<?php echo $view_semenanalysis->NonFragmented->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->DFI->Visible) { // DFI ?>
	<div id="r_DFI" class="form-group row">
		<label for="x_DFI" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_DFI"><?php echo $view_semenanalysis->DFI->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DFI" id="z_DFI" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->DFI->cellAttributes() ?>>
			<span id="el_view_semenanalysis_DFI">
<input type="text" data-table="view_semenanalysis" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->DFI->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->DFI->EditValue ?>"<?php echo $view_semenanalysis->DFI->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IsueBy->Visible) { // IsueBy ?>
	<div id="r_IsueBy" class="form-group row">
		<label for="x_IsueBy" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IsueBy"><?php echo $view_semenanalysis->IsueBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IsueBy" id="z_IsueBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IsueBy->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IsueBy">
<input type="text" data-table="view_semenanalysis" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->IsueBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->IsueBy->EditValue ?>"<?php echo $view_semenanalysis->IsueBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Volume2->Visible) { // Volume2 ?>
	<div id="r_Volume2" class="form-group row">
		<label for="x_Volume2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Volume2"><?php echo $view_semenanalysis->Volume2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Volume2" id="z_Volume2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Volume2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Volume2">
<input type="text" data-table="view_semenanalysis" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Volume2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Volume2->EditValue ?>"<?php echo $view_semenanalysis->Volume2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Concentration2->Visible) { // Concentration2 ?>
	<div id="r_Concentration2" class="form-group row">
		<label for="x_Concentration2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Concentration2"><?php echo $view_semenanalysis->Concentration2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Concentration2" id="z_Concentration2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Concentration2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Concentration2">
<input type="text" data-table="view_semenanalysis" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Concentration2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Concentration2->EditValue ?>"<?php echo $view_semenanalysis->Concentration2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Total2->Visible) { // Total2 ?>
	<div id="r_Total2" class="form-group row">
		<label for="x_Total2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Total2"><?php echo $view_semenanalysis->Total2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Total2" id="z_Total2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Total2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Total2">
<input type="text" data-table="view_semenanalysis" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Total2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Total2->EditValue ?>"<?php echo $view_semenanalysis->Total2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
	<div id="r_ProgressiveMotility2" class="form-group row">
		<label for="x_ProgressiveMotility2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_ProgressiveMotility2"><?php echo $view_semenanalysis->ProgressiveMotility2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProgressiveMotility2" id="z_ProgressiveMotility2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->ProgressiveMotility2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_ProgressiveMotility2">
<input type="text" data-table="view_semenanalysis" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->ProgressiveMotility2->EditValue ?>"<?php echo $view_semenanalysis->ProgressiveMotility2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
	<div id="r_NonProgrssiveMotile2" class="form-group row">
		<label for="x_NonProgrssiveMotile2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_NonProgrssiveMotile2"><?php echo $view_semenanalysis->NonProgrssiveMotile2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NonProgrssiveMotile2" id="z_NonProgrssiveMotile2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->NonProgrssiveMotile2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_NonProgrssiveMotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->NonProgrssiveMotile2->EditValue ?>"<?php echo $view_semenanalysis->NonProgrssiveMotile2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->Immotile2->Visible) { // Immotile2 ?>
	<div id="r_Immotile2" class="form-group row">
		<label for="x_Immotile2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_Immotile2"><?php echo $view_semenanalysis->Immotile2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Immotile2" id="z_Immotile2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->Immotile2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_Immotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->Immotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->Immotile2->EditValue ?>"<?php echo $view_semenanalysis->Immotile2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
	<div id="r_TotalProgrssiveMotile2" class="form-group row">
		<label for="x_TotalProgrssiveMotile2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TotalProgrssiveMotile2"><?php echo $view_semenanalysis->TotalProgrssiveMotile2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TotalProgrssiveMotile2" id="z_TotalProgrssiveMotile2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TotalProgrssiveMotile2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TotalProgrssiveMotile2">
<input type="text" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->TotalProgrssiveMotile2->EditValue ?>"<?php echo $view_semenanalysis->TotalProgrssiveMotile2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IssuedBy->Visible) { // IssuedBy ?>
	<div id="r_IssuedBy" class="form-group row">
		<label for="x_IssuedBy" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedBy"><?php echo $view_semenanalysis->IssuedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IssuedBy" id="z_IssuedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IssuedBy->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IssuedBy">
<input type="text" data-table="view_semenanalysis" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->IssuedBy->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->IssuedBy->EditValue ?>"<?php echo $view_semenanalysis->IssuedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IssuedTo->Visible) { // IssuedTo ?>
	<div id="r_IssuedTo" class="form-group row">
		<label for="x_IssuedTo" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IssuedTo"><?php echo $view_semenanalysis->IssuedTo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IssuedTo" id="z_IssuedTo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IssuedTo->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IssuedTo">
<input type="text" data-table="view_semenanalysis" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->IssuedTo->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->IssuedTo->EditValue ?>"<?php echo $view_semenanalysis->IssuedTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->MACS->Visible) { // MACS ?>
	<div id="r_MACS" class="form-group row">
		<label class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_MACS"><?php echo $view_semenanalysis->MACS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MACS" id="z_MACS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->MACS->cellAttributes() ?>>
			<span id="el_view_semenanalysis_MACS">
<div id="tp_x_MACS" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_semenanalysis" data-field="x_MACS" data-value-separator="<?php echo $view_semenanalysis->MACS->displayValueSeparatorAttribute() ?>" name="x_MACS[]" id="x_MACS[]" value="{value}"<?php echo $view_semenanalysis->MACS->editAttributes() ?>></div>
<div id="dsl_x_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_semenanalysis->MACS->checkBoxListHtml(FALSE, "x_MACS[]") ?>
</div></div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
	<div id="r_PREG_TEST_DATE" class="form-group row">
		<label for="x_PREG_TEST_DATE" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_PREG_TEST_DATE"><?php echo $view_semenanalysis->PREG_TEST_DATE->caption() ?></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->PREG_TEST_DATE->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_PREG_TEST_DATE" id="z_PREG_TEST_DATE" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_semenanalysis->PREG_TEST_DATE->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_semenanalysis_PREG_TEST_DATE">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PREG_TEST_DATE->EditValue ?>"<?php echo $view_semenanalysis->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysissearch", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_PREG_TEST_DATE d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_semenanalysis_PREG_TEST_DATE" class="btw1_PREG_TEST_DATE d-none">
<input type="text" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="y_PREG_TEST_DATE" id="y_PREG_TEST_DATE" placeholder="<?php echo HtmlEncode($view_semenanalysis->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->PREG_TEST_DATE->EditValue2 ?>"<?php echo $view_semenanalysis->PREG_TEST_DATE->editAttributes() ?>>
<?php if (!$view_semenanalysis->PREG_TEST_DATE->ReadOnly && !$view_semenanalysis->PREG_TEST_DATE->Disabled && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($view_semenanalysis->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_semenanalysissearch", "y_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
	<div id="r_SPECIFIC_PROBLEMS" class="form-group row">
		<label for="x_SPECIFIC_PROBLEMS" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_SPECIFIC_PROBLEMS"><?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SPECIFIC_PROBLEMS" id="z_SPECIFIC_PROBLEMS" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->cellAttributes() ?>>
			<span id="el_view_semenanalysis_SPECIFIC_PROBLEMS">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_SPECIFIC_PROBLEMS" data-value-separator="<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>" id="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS"<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->editAttributes() ?>>
		<?php echo $view_semenanalysis->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IMSC_1->Visible) { // IMSC_1 ?>
	<div id="r_IMSC_1" class="form-group row">
		<label for="x_IMSC_1" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_1"><?php echo $view_semenanalysis->IMSC_1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IMSC_1" id="z_IMSC_1" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IMSC_1->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IMSC_1">
<input type="text" data-table="view_semenanalysis" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->IMSC_1->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->IMSC_1->EditValue ?>"<?php echo $view_semenanalysis->IMSC_1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IMSC_2->Visible) { // IMSC_2 ?>
	<div id="r_IMSC_2" class="form-group row">
		<label for="x_IMSC_2" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IMSC_2"><?php echo $view_semenanalysis->IMSC_2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IMSC_2" id="z_IMSC_2" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IMSC_2->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IMSC_2">
<input type="text" data-table="view_semenanalysis" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_semenanalysis->IMSC_2->getPlaceHolder()) ?>" value="<?php echo $view_semenanalysis->IMSC_2->EditValue ?>"<?php echo $view_semenanalysis->IMSC_2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
	<div id="r_LIQUIFACTION_STORAGE" class="form-group row">
		<label for="x_LIQUIFACTION_STORAGE" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_LIQUIFACTION_STORAGE"><?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LIQUIFACTION_STORAGE" id="z_LIQUIFACTION_STORAGE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->cellAttributes() ?>>
			<span id="el_view_semenanalysis_LIQUIFACTION_STORAGE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_LIQUIFACTION_STORAGE" data-value-separator="<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>" id="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE"<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->editAttributes() ?>>
		<?php echo $view_semenanalysis->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
	<div id="r_IUI_PREP_METHOD" class="form-group row">
		<label for="x_IUI_PREP_METHOD" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_IUI_PREP_METHOD"><?php echo $view_semenanalysis->IUI_PREP_METHOD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IUI_PREP_METHOD" id="z_IUI_PREP_METHOD" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->IUI_PREP_METHOD->cellAttributes() ?>>
			<span id="el_view_semenanalysis_IUI_PREP_METHOD">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_IUI_PREP_METHOD" data-value-separator="<?php echo $view_semenanalysis->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>" id="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD"<?php echo $view_semenanalysis->IUI_PREP_METHOD->editAttributes() ?>>
		<?php echo $view_semenanalysis->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
	<div id="r_TIME_FROM_TRIGGER" class="form-group row">
		<label for="x_TIME_FROM_TRIGGER" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_TRIGGER"><?php echo $view_semenanalysis->TIME_FROM_TRIGGER->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TIME_FROM_TRIGGER" id="z_TIME_FROM_TRIGGER" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TIME_FROM_TRIGGER">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_TIME_FROM_TRIGGER" data-value-separator="<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER"<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->editAttributes() ?>>
		<?php echo $view_semenanalysis->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
	<div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
		<label for="x_COLLECTION_TO_PREPARATION" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION"><?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_COLLECTION_TO_PREPARATION" id="z_COLLECTION_TO_PREPARATION" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
			<span id="el_view_semenanalysis_COLLECTION_TO_PREPARATION">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_COLLECTION_TO_PREPARATION" data-value-separator="<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>" id="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION"<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->editAttributes() ?>>
		<?php echo $view_semenanalysis->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_semenanalysis->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
	<div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
		<label for="x_TIME_FROM_PREP_TO_INSEM" class="<?php echo $view_semenanalysis_search->LeftColumnClass ?>"><span id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TIME_FROM_PREP_TO_INSEM" id="z_TIME_FROM_PREP_TO_INSEM" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_semenanalysis_search->RightColumnClass ?>"><div<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
			<span id="el_view_semenanalysis_TIME_FROM_PREP_TO_INSEM">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_semenanalysis" data-field="x_TIME_FROM_PREP_TO_INSEM" data-value-separator="<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->displayValueSeparatorAttribute() ?>" id="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM"<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
		<?php echo $view_semenanalysis->TIME_FROM_PREP_TO_INSEM->selectOptionListHtml("x_TIME_FROM_PREP_TO_INSEM") ?>
	</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_semenanalysis_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_semenanalysis_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_semenanalysis_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_semenanalysis_search->terminate();
?>