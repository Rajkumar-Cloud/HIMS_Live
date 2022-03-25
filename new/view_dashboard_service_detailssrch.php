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
<?php include_once "header.php"; ?>
<script>
var fview_dashboard_service_detailssearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_dashboard_service_details_search->IsModal) { ?>
	fview_dashboard_service_detailssearch = currentAdvancedSearchForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
	<?php } else { ?>
	fview_dashboard_service_detailssearch = currentForm = new ew.Form("fview_dashboard_service_detailssearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_dashboard_service_detailssearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SubTotal");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->SubTotal->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createdDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->createdDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->HospID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_vid");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_service_details_search->vid->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_service_detailssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_service_detailssearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_dashboard_service_detailssearch.lists["x_HospID"] = <?php echo $view_dashboard_service_details_search->HospID->Lookup->toClientList($view_dashboard_service_details_search) ?>;
	fview_dashboard_service_detailssearch.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_service_details_search->HospID->lookupOptions()) ?>;
	fview_dashboard_service_detailssearch.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_dashboard_service_detailssearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_dashboard_service_details_search->showPageHeader(); ?>
<?php
$view_dashboard_service_details_search->showMessage();
?>
<form name="fview_dashboard_service_detailssearch" id="fview_dashboard_service_detailssearch" class="<?php echo $view_dashboard_service_details_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_service_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_dashboard_service_details_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_dashboard_service_details_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientId"><?php echo $view_dashboard_service_details_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->PatientId->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_PatientId" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->PatientId->EditValue ?>"<?php echo $view_dashboard_service_details_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_PatientName"><?php echo $view_dashboard_service_details_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->PatientName->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_PatientName" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->PatientName->EditValue ?>"<?php echo $view_dashboard_service_details_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label for="x_Services" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_Services"><?php echo $view_dashboard_service_details_search->Services->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Services" id="z_Services" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->Services->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_Services" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->Services->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->Services->EditValue ?>"<?php echo $view_dashboard_service_details_search->Services->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->amount->Visible) { // amount ?>
	<div id="r_amount" class="form-group row">
		<label for="x_amount" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_amount"><?php echo $view_dashboard_service_details_search->amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_amount" id="z_amount" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->amount->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_amount" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->amount->EditValue ?>"<?php echo $view_dashboard_service_details_search->amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->SubTotal->Visible) { // SubTotal ?>
	<div id="r_SubTotal" class="form-group row">
		<label for="x_SubTotal" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SubTotal"><?php echo $view_dashboard_service_details_search->SubTotal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SubTotal" id="z_SubTotal" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->SubTotal->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SubTotal" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->SubTotal->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->SubTotal->EditValue ?>"<?php echo $view_dashboard_service_details_search->SubTotal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdby"><?php echo $view_dashboard_service_details_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->createdby->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_createdby" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->createdby->EditValue ?>"<?php echo $view_dashboard_service_details_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createddatetime"><?php echo $view_dashboard_service_details_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->createddatetime->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_createddatetime" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->createddatetime->EditValue ?>"<?php echo $view_dashboard_service_details_search->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_search->createddatetime->ReadOnly && !$view_dashboard_service_details_search->createddatetime->Disabled && !isset($view_dashboard_service_details_search->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->createdDate->Visible) { // createdDate ?>
	<div id="r_createdDate" class="form-group row">
		<label for="x_createdDate" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_createdDate"><?php echo $view_dashboard_service_details_search->createdDate->caption() ?></span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->createdDate->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_createdDate" id="z_createdDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_service_details_search->createdDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_dashboard_service_details_createdDate" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x_createdDate" id="x_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->createdDate->EditValue ?>"<?php echo $view_dashboard_service_details_search->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_search->createdDate->ReadOnly && !$view_dashboard_service_details_search->createdDate->Disabled && !isset($view_dashboard_service_details_search->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_search->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailssearch", "x_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_dashboard_service_details_createdDate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="y_createdDate" id="y_createdDate" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->createdDate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->createdDate->EditValue2 ?>"<?php echo $view_dashboard_service_details_search->createdDate->editAttributes() ?>>
<?php if (!$view_dashboard_service_details_search->createdDate->ReadOnly && !$view_dashboard_service_details_search->createdDate->Disabled && !isset($view_dashboard_service_details_search->createdDate->EditAttrs["readonly"]) && !isset($view_dashboard_service_details_search->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_service_detailssearch", "y_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label for="x_DrName" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DrName"><?php echo $view_dashboard_service_details_search->DrName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrName" id="z_DrName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->DrName->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DrName" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->DrName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->DrName->EditValue ?>"<?php echo $view_dashboard_service_details_search->DrName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->DRDepartment->Visible) { // DRDepartment ?>
	<div id="r_DRDepartment" class="form-group row">
		<label for="x_DRDepartment" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DRDepartment"><?php echo $view_dashboard_service_details_search->DRDepartment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRDepartment" id="z_DRDepartment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->DRDepartment->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DRDepartment" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x_DRDepartment" id="x_DRDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->DRDepartment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->DRDepartment->EditValue ?>"<?php echo $view_dashboard_service_details_search->DRDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label for="x_ItemCode" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_ItemCode"><?php echo $view_dashboard_service_details_search->ItemCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ItemCode" id="z_ItemCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->ItemCode->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_ItemCode" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->ItemCode->EditValue ?>"<?php echo $view_dashboard_service_details_search->ItemCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEptCd"><?php echo $view_dashboard_service_details_search->DEptCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->DEptCd->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DEptCd" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->DEptCd->EditValue ?>"<?php echo $view_dashboard_service_details_search->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->CODE->Visible) { // CODE ?>
	<div id="r_CODE" class="form-group row">
		<label for="x_CODE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_CODE"><?php echo $view_dashboard_service_details_search->CODE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CODE" id="z_CODE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->CODE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_CODE" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->CODE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->CODE->EditValue ?>"<?php echo $view_dashboard_service_details_search->CODE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->SERVICE->Visible) { // SERVICE ?>
	<div id="r_SERVICE" class="form-group row">
		<label for="x_SERVICE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE"><?php echo $view_dashboard_service_details_search->SERVICE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE" id="z_SERVICE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->SERVICE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SERVICE" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x_SERVICE" id="x_SERVICE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->SERVICE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->SERVICE->EditValue ?>"<?php echo $view_dashboard_service_details_search->SERVICE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
	<div id="r_SERVICE_TYPE" class="form-group row">
		<label for="x_SERVICE_TYPE" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_SERVICE_TYPE"><?php echo $view_dashboard_service_details_search->SERVICE_TYPE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->SERVICE_TYPE->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_SERVICE_TYPE" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x_SERVICE_TYPE" id="x_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->SERVICE_TYPE->EditValue ?>"<?php echo $view_dashboard_service_details_search->SERVICE_TYPE->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->DEPARTMENT->Visible) { // DEPARTMENT ?>
	<div id="r_DEPARTMENT" class="form-group row">
		<label for="x_DEPARTMENT" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_DEPARTMENT"><?php echo $view_dashboard_service_details_search->DEPARTMENT->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->DEPARTMENT->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_DEPARTMENT" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->DEPARTMENT->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->DEPARTMENT->EditValue ?>"<?php echo $view_dashboard_service_details_search->DEPARTMENT->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_HospID"><?php echo $view_dashboard_service_details_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->HospID->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_HospID" class="ew-search-field">
<?php
$onchange = $view_dashboard_service_details_search->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_service_details_search->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x_HospID">
	<input type="text" class="form-control" name="sv_x_HospID" id="sv_x_HospID" value="<?php echo RemoveHtml($view_dashboard_service_details_search->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_service_details_search->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_service_details_search->HospID->displayValueSeparatorAttribute() ?>" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_dashboard_service_details_search->HospID->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_service_detailssearch"], function() {
	fview_dashboard_service_detailssearch.createAutoSuggest({"id":"x_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_service_details_search->HospID->Lookup->getParamTag($view_dashboard_service_details_search, "p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_service_details_search->vid->Visible) { // vid ?>
	<div id="r_vid" class="form-group row">
		<label for="x_vid" class="<?php echo $view_dashboard_service_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_service_details_vid"><?php echo $view_dashboard_service_details_search->vid->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_vid" id="z_vid" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_service_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_service_details_search->vid->cellAttributes() ?>>
			<span id="el_view_dashboard_service_details_vid" class="ew-search-field">
<input type="text" data-table="view_dashboard_service_details" data-field="x_vid" name="x_vid" id="x_vid" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_service_details_search->vid->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_service_details_search->vid->EditValue ?>"<?php echo $view_dashboard_service_details_search->vid->editAttributes() ?>>
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
$view_dashboard_service_details_search->terminate();
?>