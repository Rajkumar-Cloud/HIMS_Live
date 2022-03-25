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
$view_dashboard_collection_details_search = new view_dashboard_collection_details_search();

// Run the page
$view_dashboard_collection_details_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_collection_details_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_dashboard_collection_detailssearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_dashboard_collection_details_search->IsModal) { ?>
	fview_dashboard_collection_detailssearch = currentAdvancedSearchForm = new ew.Form("fview_dashboard_collection_detailssearch", "search");
	<?php } else { ?>
	fview_dashboard_collection_detailssearch = currentForm = new ew.Form("fview_dashboard_collection_detailssearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_dashboard_collection_detailssearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->createddate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->Amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_HospID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_dashboard_collection_details_search->HospID->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_dashboard_collection_detailssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_dashboard_collection_detailssearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_dashboard_collection_detailssearch.lists["x_HospID"] = <?php echo $view_dashboard_collection_details_search->HospID->Lookup->toClientList($view_dashboard_collection_details_search) ?>;
	fview_dashboard_collection_detailssearch.lists["x_HospID"].options = <?php echo JsonEncode($view_dashboard_collection_details_search->HospID->lookupOptions()) ?>;
	fview_dashboard_collection_detailssearch.autoSuggests["x_HospID"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fview_dashboard_collection_detailssearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_dashboard_collection_details_search->showPageHeader(); ?>
<?php
$view_dashboard_collection_details_search->showMessage();
?>
<form name="fview_dashboard_collection_detailssearch" id="fview_dashboard_collection_detailssearch" class="<?php echo $view_dashboard_collection_details_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_collection_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_dashboard_collection_details_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_dashboard_collection_details_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_id"><?php echo $view_dashboard_collection_details_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->id->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_id" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->id->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->id->EditValue ?>"<?php echo $view_dashboard_collection_details_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->createddate->Visible) { // createddate ?>
	<div id="r_createddate" class="form-group row">
		<label for="x_createddate" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createddate"><?php echo $view_dashboard_collection_details_search->createddate->caption() ?></span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->createddate->cellAttributes() ?>>
		<span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?php echo $Language->phrase("EQUAL") ?></option>
<option value="<>"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?php echo $Language->phrase("<>") ?></option>
<option value="<"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?php echo $Language->phrase("<") ?></option>
<option value="<="<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?php echo $Language->phrase("<=") ?></option>
<option value=">"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?php echo $Language->phrase(">") ?></option>
<option value=">="<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?php echo $Language->phrase(">=") ?></option>
<option value="IS NULL"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?php echo $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?php echo $view_dashboard_collection_details_search->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?php echo $Language->phrase("BETWEEN") ?></option>
</select>
</span>
			<span id="el_view_dashboard_collection_details_createddate" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x_createddate" id="x_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->createddate->EditValue ?>"<?php echo $view_dashboard_collection_details_search->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_search->createddate->ReadOnly && !$view_dashboard_collection_details_search->createddate->Disabled && !isset($view_dashboard_collection_details_search->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_search->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
			<span class="ew-search-and d-none"><label><?php echo $Language->phrase("AND") ?></label></span>
			<span id="el2_view_dashboard_collection_details_createddate" class="ew-search-field2 d-none">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddate" name="y_createddate" id="y_createddate" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->createddate->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->createddate->EditValue2 ?>"<?php echo $view_dashboard_collection_details_search->createddate->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_search->createddate->ReadOnly && !$view_dashboard_collection_details_search->createddate->Disabled && !isset($view_dashboard_collection_details_search->createddate->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_search->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->UserName->Visible) { // UserName ?>
	<div id="r_UserName" class="form-group row">
		<label for="x_UserName" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_UserName"><?php echo $view_dashboard_collection_details_search->UserName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UserName" id="z_UserName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->UserName->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_UserName" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_UserName" name="x_UserName" id="x_UserName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->UserName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->UserName->EditValue ?>"<?php echo $view_dashboard_collection_details_search->UserName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_BillNumber"><?php echo $view_dashboard_collection_details_search->BillNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->BillNumber->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_BillNumber" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->BillNumber->EditValue ?>"<?php echo $view_dashboard_collection_details_search->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label for="x_PatientID" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_PatientID"><?php echo $view_dashboard_collection_details_search->PatientID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->PatientID->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_PatientID" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->PatientID->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->PatientID->EditValue ?>"<?php echo $view_dashboard_collection_details_search->PatientID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_PatientName"><?php echo $view_dashboard_collection_details_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->PatientName->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_PatientName" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->PatientName->EditValue ?>"<?php echo $view_dashboard_collection_details_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Mobile"><?php echo $view_dashboard_collection_details_search->Mobile->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->Mobile->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_Mobile" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->Mobile->EditValue ?>"<?php echo $view_dashboard_collection_details_search->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_voucher_type"><?php echo $view_dashboard_collection_details_search->voucher_type->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->voucher_type->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_voucher_type" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->voucher_type->EditValue ?>"<?php echo $view_dashboard_collection_details_search->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Details"><?php echo $view_dashboard_collection_details_search->Details->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->Details->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_Details" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->Details->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->Details->EditValue ?>"<?php echo $view_dashboard_collection_details_search->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_ModeofPayment"><?php echo $view_dashboard_collection_details_search->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_ModeofPayment" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->ModeofPayment->EditValue ?>"<?php echo $view_dashboard_collection_details_search->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_Amount"><?php echo $view_dashboard_collection_details_search->Amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->Amount->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_Amount" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->Amount->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->Amount->EditValue ?>"<?php echo $view_dashboard_collection_details_search->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_AnyDues"><?php echo $view_dashboard_collection_details_search->AnyDues->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->AnyDues->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_AnyDues" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->AnyDues->EditValue ?>"<?php echo $view_dashboard_collection_details_search->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createdby"><?php echo $view_dashboard_collection_details_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->createdby->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_createdby" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->createdby->EditValue ?>"<?php echo $view_dashboard_collection_details_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_createddatetime"><?php echo $view_dashboard_collection_details_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->createddatetime->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_createddatetime" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->createddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_search->createddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_search->createddatetime->ReadOnly && !$view_dashboard_collection_details_search->createddatetime->Disabled && !isset($view_dashboard_collection_details_search->createddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_modifiedby"><?php echo $view_dashboard_collection_details_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->modifiedby->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_modifiedby" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->modifiedby->EditValue ?>"<?php echo $view_dashboard_collection_details_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_modifieddatetime"><?php echo $view_dashboard_collection_details_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_modifieddatetime" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->modifieddatetime->EditValue ?>"<?php echo $view_dashboard_collection_details_search->modifieddatetime->editAttributes() ?>>
<?php if (!$view_dashboard_collection_details_search->modifieddatetime->ReadOnly && !$view_dashboard_collection_details_search->modifieddatetime->Disabled && !isset($view_dashboard_collection_details_search->modifieddatetime->EditAttrs["readonly"]) && !isset($view_dashboard_collection_details_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_dashboard_collection_detailssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->BillType->Visible) { // BillType ?>
	<div id="r_BillType" class="form-group row">
		<label for="x_BillType" class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_BillType"><?php echo $view_dashboard_collection_details_search->BillType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillType" id="z_BillType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->BillType->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_BillType" class="ew-search-field">
<input type="text" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="8" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->BillType->getPlaceHolder()) ?>" value="<?php echo $view_dashboard_collection_details_search->BillType->EditValue ?>"<?php echo $view_dashboard_collection_details_search->BillType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_dashboard_collection_details_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label class="<?php echo $view_dashboard_collection_details_search->LeftColumnClass ?>"><span id="elh_view_dashboard_collection_details_HospID"><?php echo $view_dashboard_collection_details_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_dashboard_collection_details_search->RightColumnClass ?>"><div <?php echo $view_dashboard_collection_details_search->HospID->cellAttributes() ?>>
			<span id="el_view_dashboard_collection_details_HospID" class="ew-search-field">
<?php
$onchange = $view_dashboard_collection_details_search->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$view_dashboard_collection_details_search->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x_HospID">
	<input type="text" class="form-control" name="sv_x_HospID" id="sv_x_HospID" value="<?php echo RemoveHtml($view_dashboard_collection_details_search->HospID->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->HospID->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($view_dashboard_collection_details_search->HospID->getPlaceHolder()) ?>"<?php echo $view_dashboard_collection_details_search->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-value-separator="<?php echo $view_dashboard_collection_details_search->HospID->displayValueSeparatorAttribute() ?>" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($view_dashboard_collection_details_search->HospID->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fview_dashboard_collection_detailssearch"], function() {
	fview_dashboard_collection_detailssearch.createAutoSuggest({"id":"x_HospID","forceSelect":false});
});
</script>
<?php echo $view_dashboard_collection_details_search->HospID->Lookup->getParamTag($view_dashboard_collection_details_search, "p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_dashboard_collection_details_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_dashboard_collection_details_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_dashboard_collection_details_search->showPageFooter();
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
$view_dashboard_collection_details_search->terminate();
?>