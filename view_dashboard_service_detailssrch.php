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
$view_dashboard_service_details_search = new view_dashboard_service_details_search();

// Run the page
$view_dashboard_service_details_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_service_details_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_dashboard_service_details_search->IsModal) { ?>
var fview_dashboard_service_detailssearch = currentAdvancedSearchForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
<?php } else { ?>
var fview_dashboard_service_detailssearch = currentForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_dashboard_service_detailssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_dashboard_service_detailssearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_dashboard_service_detailssearch.lists["x_DrName"] = <?php echo $view_dashboard_service_details_search->DrName->Lookup->toClientList() ?>;
fview_dashboard_service_detailssearch.lists["x_DrName"].options = <?php echo JsonEncode($view_dashboard_service_details_search->DrName->lookupOptions()) ?>;
fview_dashboard_service_detailssearch.lists["x_HospID"] = <?php echo $view_dashboard_service_details_search->HospID->Lookup->toClientList() ?>;
fview_dashboard_service_detailssearch.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_details_search->HospID->lookupOptions()) ?>;
fview_dashboard_service_detailssearch.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
// Validate function for search

fview_dashboard_service_detailssearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SubTotal");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->SubTotal->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createdDate");
	if (elm && !ew.checkEuroDate(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->createdDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_vid");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details->vid->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_dashboard_service_details_search->showPageHeader(); ?>
<?php
$view_dashboard_service_details_search->showMessage();
?>
<form name="fview_dashboard_service_detailssearch" id="fview_dashboard_service_detailssearch" class="<?php echo $view_dashboard_service_details_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_dashboard_service_details_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_dashboard_service_details_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_dashboard_service_details_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_dashboard_service_details->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientId"><?php echo $view_dashboard_service_details->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->PatientId->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_PatientId">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientName"><?php echo $view_dashboard_service_details->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->PatientName->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_PatientName">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label for="x_Services" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_Services"><?php echo $view_dashboard_service_details->Services->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Services" id="z_Services" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->Services->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_Services">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->Services->EditValue ?>"<?php echo $view_dashboard_service_details->Services->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label for="x_amount" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_amount"><?php echo $view_dashboard_service_details->amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_amount" id="z_amount" value="="></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->amount->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_amount">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->amount->EditValue ?>"<?php echo $view_dashboard_service_details->amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label for="x_SubTotal" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SubTotal"><?php echo $view_dashboard_service_details->SubTotal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SubTotal" id="z_SubTotal" value="="></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->SubTotal->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SubTotal">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details->SubTotal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdby"><?php echo $view_dashboard_service_details->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->createdby->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_createdby">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdby->EditValue ?>"<?php echo $view_dashboard_service_details->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createddatetime"><?php echo $view_dashboard_service_details->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->createddatetime->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_createddatetime">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createddatetime->ReadOnly && !$view_dashboard_service_details->createddatetime->Disabled && !isset($view_dashboard_service_details->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->createdDate->Visible) { // createdDate ?>
	<div id="r_createdDate" class="form-group row">
		<label for="x_createdDate" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdDate"><?php echo $view_dashboard_service_details->createdDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->createdDate->cellAttributes() ?>>
		<span class="ew-search-operator"><select name="z_createdDate" id="z_createdDate" class="form-control" onchange="ew.forms(this).searchOperatorChanged(this);"><option value="="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "=") ? " selected" : "" ?> ><?php echo $Language->phrase("EQUAL") ?></option><option value="<>"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<>") ? " selected" : "" ?> ><?php echo $Language->phrase("<>") ?></option><option value="<"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<") ? " selected" : "" ?> ><?php echo $Language->phrase("<") ?></option><option value="<="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "<=") ? " selected" : "" ?> ><?php echo $Language->phrase("<=") ?></option><option value=">"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == ">") ? " selected" : "" ?> ><?php echo $Language->phrase(">") ?></option><option value=">="<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == ">=") ? " selected" : "" ?> ><?php echo $Language->phrase(">=") ?></option><option value="IS NULL"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "IS NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NULL") ?></option><option value="IS NOT NULL"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL") ? " selected" : "" ?> ><?php echo $Language->phrase("IS NOT NULL") ?></option><option value="BETWEEN"<?php echo ($view_dashboard_service_details->createdDate->AdvancedSearch->SearchOperator == "BETWEEN") ? " selected" : "" ?> ><?php echo $Language->phrase("BETWEEN") ?></option></select></span>
			<span id="el_view_dashboard_service_details_createdDate">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
			<span class="ew-search-cond btw1_createdDate d-none"><label><?php echo $Language->Phrase("AND") ?></label></span>
			<span id="e2_view_dashboard_service_details_createdDate" class="btw1_createdDate d-none">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_details->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details->createdDate->ReadOnly && !$view_dashboard_service_details->createdDate->Disabled && !isset($view_dashboard_service_details->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details->createdDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_dashboard_service_detailssearch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DrName"><?php echo $view_dashboard_service_details->DrName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrName" id="z_DrName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->DrName->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?php echo strval($view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) : $view_dashboard_service_details->DrName->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_dashboard_service_details->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_dashboard_service_details->DrName->ReadOnly || $view_dashboard_service_details->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_dashboard_service_details->DrName->Lookup->getParamTag("p_x_DrName") ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_dashboard_service_details->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?php echo $view_dashboard_service_details->DrName->AdvancedSearch->SearchValue ?>"<?php echo $view_dashboard_service_details->DrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->DRDepartment->Visible) { // DRDepartment ?>
	<div id="r_DRDepartment" class="form-group row">
		<label for="x_DRDepartment" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DRDepartment"><?php echo $view_dashboard_service_details->DRDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->DRDepartment->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DRDepartment">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details->DRDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label for="x_ItemCode" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_ItemCode"><?php echo $view_dashboard_service_details->ItemCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->ItemCode->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_ItemCode">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details->ItemCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEptCd"><?php echo $view_dashboard_service_details->DEptCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->DEptCd->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DEptCd">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label for="x_CODE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_CODE"><?php echo $view_dashboard_service_details->CODE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CODE" id="z_CODE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->CODE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_CODE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->CODE->EditValue ?>"<?php echo $view_dashboard_service_details->CODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label for="x_SERVICE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE"><?php echo $view_dashboard_service_details->SERVICE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->SERVICE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SERVICE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label for="x_SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE_TYPE"><?php echo $view_dashboard_service_details->SERVICE_TYPE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->SERVICE_TYPE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SERVICE_TYPE">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x_SERVICE_TYPE" id="x_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details->SERVICE_TYPE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label for="x_DEPARTMENT" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEPARTMENT"><?php echo $view_dashboard_service_details->DEPARTMENT->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->DEPARTMENT->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DEPARTMENT">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details->DEPARTMENT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_HospID"><?php echo $view_dashboard_service_details->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->HospID->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_HospID">
<?php
$wrkonchange = "" . trim(@$view_dashboard_service_details->HospID->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$view_dashboard_service_details->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x_HospID" class="text-nowrap" style="z-index: 8830">
	<input type="text" class="form-control" name="sv_x_HospID" id="sv_x_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details->HospID->displayValueSeparatorAttribute() ?>" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details->HospID->AdvancedSearch->SearchValue) ?>"<?php echo $wrkonchange ?>>
<script>
fview_dashboard_service_detailssearch.createAutoSuggest({"id":"x_HospID","forceSelect":false});
</script>
<?php echo $view_dashboard_service_details->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details->vid->Visible) { // vid ?>
	<div id="r_vid" class="form-group row">
		<label for="x_vid" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_vid"><?php echo $view_dashboard_service_details->vid->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_vid" id="z_vid" value="="></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div<?php echo $view_dashboard_service_details->vid->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_vid">
<input type="text" data-table="view_dashboard_service_details" data-field="x_vid" name="x_vid" id="x_vid" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details->vid->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details->vid->EditValue ?>"<?php echo $view_dashboard_service_details->vid->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_dashboard_service_details_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_dashboard_service_details_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_dashboard_service_details_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_dashboard_service_details_search->terminate();
?>