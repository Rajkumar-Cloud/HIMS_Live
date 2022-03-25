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
$view_lab_services_search = new view_lab_services_search();

// Run the page
$view_lab_services_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_lab_servicessearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($view_lab_services_search->IsModal) { ?>
	fview_lab_servicessearch = currentAdvancedSearchForm = new ew.Form("fview_lab_servicessearch", "search");
	<?php } else { ?>
	fview_lab_servicessearch = currentForm = new ew.Form("fview_lab_servicessearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	fview_lab_servicessearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->SID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Reception");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->Reception->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->Amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_createddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->createddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_modifieddatetime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->modifieddatetime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RealizationAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->RealizationAmount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_RIDNO");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->RIDNO->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TidNo");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->TidNo->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_CId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->CId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PatId");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->PatId->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DrID");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->DrID->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_BillStatus");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($view_lab_services_search->BillStatus->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fview_lab_servicessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_lab_servicessearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_lab_servicessearch.lists["x_HospID"] = <?php echo $view_lab_services_search->HospID->Lookup->toClientList($view_lab_services_search) ?>;
	fview_lab_servicessearch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_search->HospID->lookupOptions()) ?>;
	loadjs.done("fview_lab_servicessearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_lab_services_search->showPageHeader(); ?>
<?php
$view_lab_services_search->showMessage();
?>
<form name="fview_lab_servicessearch" id="fview_lab_servicessearch" class="<?php echo $view_lab_services_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_services_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_lab_services_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_id"><?php echo $view_lab_services_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->id->cellAttributes() ?>>
			<span id="el_view_lab_services_id" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_lab_services_search->id->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->id->EditValue ?>"<?php echo $view_lab_services_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->SID->Visible) { // SID ?>
	<div id="r_SID" class="form-group row">
		<label for="x_SID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_SID"><?php echo $view_lab_services_search->SID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SID" id="z_SID" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->SID->cellAttributes() ?>>
			<span id="el_view_lab_services_SID" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->SID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->SID->EditValue ?>"<?php echo $view_lab_services_search->SID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Reception"><?php echo $view_lab_services_search->Reception->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Reception" id="z_Reception" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Reception->cellAttributes() ?>>
			<span id="el_view_lab_services_Reception" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->Reception->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Reception->EditValue ?>"<?php echo $view_lab_services_search->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatientId"><?php echo $view_lab_services_search->PatientId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->PatientId->cellAttributes() ?>>
			<span id="el_view_lab_services_PatientId" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->PatientId->EditValue ?>"<?php echo $view_lab_services_search->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_mrnno"><?php echo $view_lab_services_search->mrnno->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->mrnno->cellAttributes() ?>>
			<span id="el_view_lab_services_mrnno" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->mrnno->EditValue ?>"<?php echo $view_lab_services_search->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatientName"><?php echo $view_lab_services_search->PatientName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->PatientName->cellAttributes() ?>>
			<span id="el_view_lab_services_PatientName" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->PatientName->EditValue ?>"<?php echo $view_lab_services_search->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Age"><?php echo $view_lab_services_search->Age->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Age" id="z_Age" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Age->cellAttributes() ?>>
			<span id="el_view_lab_services_Age" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Age->EditValue ?>"<?php echo $view_lab_services_search->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Gender"><?php echo $view_lab_services_search->Gender->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Gender" id="z_Gender" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Gender->cellAttributes() ?>>
			<span id="el_view_lab_services_Gender" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Gender->EditValue ?>"<?php echo $view_lab_services_search->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_profilePic"><?php echo $view_lab_services_search->profilePic->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->profilePic->cellAttributes() ?>>
			<span id="el_view_lab_services_profilePic" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_lab_services_search->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->profilePic->EditValue ?>"<?php echo $view_lab_services_search->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Mobile"><?php echo $view_lab_services_search->Mobile->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Mobile->cellAttributes() ?>>
			<span id="el_view_lab_services_Mobile" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Mobile->EditValue ?>"<?php echo $view_lab_services_search->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_IP_OP"><?php echo $view_lab_services_search->IP_OP->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->IP_OP->cellAttributes() ?>>
			<span id="el_view_lab_services_IP_OP" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->IP_OP->EditValue ?>"<?php echo $view_lab_services_search->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Doctor"><?php echo $view_lab_services_search->Doctor->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Doctor->cellAttributes() ?>>
			<span id="el_view_lab_services_Doctor" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Doctor->EditValue ?>"<?php echo $view_lab_services_search->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_voucher_type"><?php echo $view_lab_services_search->voucher_type->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->voucher_type->cellAttributes() ?>>
			<span id="el_view_lab_services_voucher_type" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->voucher_type->EditValue ?>"<?php echo $view_lab_services_search->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Details"><?php echo $view_lab_services_search->Details->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Details" id="z_Details" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Details->cellAttributes() ?>>
			<span id="el_view_lab_services_Details" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Details->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Details->EditValue ?>"<?php echo $view_lab_services_search->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_ModeofPayment"><?php echo $view_lab_services_search->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_lab_services_ModeofPayment" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->ModeofPayment->EditValue ?>"<?php echo $view_lab_services_search->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Amount"><?php echo $view_lab_services_search->Amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Amount->cellAttributes() ?>>
			<span id="el_view_lab_services_Amount" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->Amount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Amount->EditValue ?>"<?php echo $view_lab_services_search->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_AnyDues"><?php echo $view_lab_services_search->AnyDues->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->AnyDues->cellAttributes() ?>>
			<span id="el_view_lab_services_AnyDues" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->AnyDues->EditValue ?>"<?php echo $view_lab_services_search->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_createdby"><?php echo $view_lab_services_search->createdby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_createdby" id="z_createdby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->createdby->cellAttributes() ?>>
			<span id="el_view_lab_services_createdby" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->createdby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->createdby->EditValue ?>"<?php echo $view_lab_services_search->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_createddatetime"><?php echo $view_lab_services_search->createddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_createddatetime" id="z_createddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->createddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_createddatetime" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_services_search->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->createddatetime->EditValue ?>"<?php echo $view_lab_services_search->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_services_search->createddatetime->ReadOnly && !$view_lab_services_search->createddatetime->Disabled && !isset($view_lab_services_search->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_services_search->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_servicessearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_modifiedby"><?php echo $view_lab_services_search->modifiedby->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->modifiedby->cellAttributes() ?>>
			<span id="el_view_lab_services_modifiedby" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->modifiedby->EditValue ?>"<?php echo $view_lab_services_search->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_modifieddatetime"><?php echo $view_lab_services_search->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_modifieddatetime" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_lab_services_search->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->modifieddatetime->EditValue ?>"<?php echo $view_lab_services_search->modifieddatetime->editAttributes() ?>>
<?php if (!$view_lab_services_search->modifieddatetime->ReadOnly && !$view_lab_services_search->modifieddatetime->Disabled && !isset($view_lab_services_search->modifieddatetime->EditAttrs["readonly"]) && !isset($view_lab_services_search->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_servicessearch", "datetimepicker"], function() {
	ew.createDateTimePicker("fview_lab_servicessearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationAmount"><?php echo $view_lab_services_search->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationAmount" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RealizationAmount->EditValue ?>"<?php echo $view_lab_services_search->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationStatus"><?php echo $view_lab_services_search->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationStatus" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RealizationStatus->EditValue ?>"<?php echo $view_lab_services_search->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationRemarks"><?php echo $view_lab_services_search->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationRemarks" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RealizationRemarks->EditValue ?>"<?php echo $view_lab_services_search->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationBatchNo"><?php echo $view_lab_services_search->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationBatchNo" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RealizationBatchNo->EditValue ?>"<?php echo $view_lab_services_search->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationDate"><?php echo $view_lab_services_search->RealizationDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RealizationDate->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationDate" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RealizationDate->EditValue ?>"<?php echo $view_lab_services_search->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_HospID"><?php echo $view_lab_services_search->HospID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->HospID->cellAttributes() ?>>
			<span id="el_view_lab_services_HospID" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services_search->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services_search->HospID->editAttributes() ?>>
			<?php echo $view_lab_services_search->HospID->selectOptionListHtml("x_HospID") ?>
		</select>
</div>
<?php echo $view_lab_services_search->HospID->Lookup->getParamTag($view_lab_services_search, "p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RIDNO"><?php echo $view_lab_services_search->RIDNO->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNO" id="z_RIDNO" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RIDNO->cellAttributes() ?>>
			<span id="el_view_lab_services_RIDNO" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RIDNO->EditValue ?>"<?php echo $view_lab_services_search->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_TidNo"><?php echo $view_lab_services_search->TidNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TidNo" id="z_TidNo" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->TidNo->cellAttributes() ?>>
			<span id="el_view_lab_services_TidNo" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->TidNo->EditValue ?>"<?php echo $view_lab_services_search->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_CId"><?php echo $view_lab_services_search->CId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_CId" id="z_CId" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->CId->cellAttributes() ?>>
			<span id="el_view_lab_services_CId" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->CId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->CId->EditValue ?>"<?php echo $view_lab_services_search->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PartnerName"><?php echo $view_lab_services_search->PartnerName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->PartnerName->cellAttributes() ?>>
			<span id="el_view_lab_services_PartnerName" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->PartnerName->EditValue ?>"<?php echo $view_lab_services_search->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PayerType"><?php echo $view_lab_services_search->PayerType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->PayerType->cellAttributes() ?>>
			<span id="el_view_lab_services_PayerType" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->PayerType->EditValue ?>"<?php echo $view_lab_services_search->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Dob"><?php echo $view_lab_services_search->Dob->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dob" id="z_Dob" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Dob->cellAttributes() ?>>
			<span id="el_view_lab_services_Dob" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Dob->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Dob->EditValue ?>"<?php echo $view_lab_services_search->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Currency"><?php echo $view_lab_services_search->Currency->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Currency" id="z_Currency" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Currency->cellAttributes() ?>>
			<span id="el_view_lab_services_Currency" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Currency->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Currency->EditValue ?>"<?php echo $view_lab_services_search->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DiscountRemarks"><?php echo $view_lab_services_search->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_DiscountRemarks" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->DiscountRemarks->EditValue ?>"<?php echo $view_lab_services_search->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Remarks"><?php echo $view_lab_services_search->Remarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->Remarks->cellAttributes() ?>>
			<span id="el_view_lab_services_Remarks" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->Remarks->EditValue ?>"<?php echo $view_lab_services_search->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatId"><?php echo $view_lab_services_search->PatId->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PatId" id="z_PatId" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->PatId->cellAttributes() ?>>
			<span id="el_view_lab_services_PatId" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->PatId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->PatId->EditValue ?>"<?php echo $view_lab_services_search->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DrDepartment"><?php echo $view_lab_services_search->DrDepartment->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->DrDepartment->cellAttributes() ?>>
			<span id="el_view_lab_services_DrDepartment" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->DrDepartment->EditValue ?>"<?php echo $view_lab_services_search->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RefferedBy"><?php echo $view_lab_services_search->RefferedBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->RefferedBy->cellAttributes() ?>>
			<span id="el_view_lab_services_RefferedBy" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->RefferedBy->EditValue ?>"<?php echo $view_lab_services_search->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BillNumber"><?php echo $view_lab_services_search->BillNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->BillNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_BillNumber" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->BillNumber->EditValue ?>"<?php echo $view_lab_services_search->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_CardNumber"><?php echo $view_lab_services_search->CardNumber->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->CardNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_CardNumber" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->CardNumber->EditValue ?>"<?php echo $view_lab_services_search->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BankName"><?php echo $view_lab_services_search->BankName->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BankName" id="z_BankName" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->BankName->cellAttributes() ?>>
			<span id="el_view_lab_services_BankName" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->BankName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->BankName->EditValue ?>"<?php echo $view_lab_services_search->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DrID"><?php echo $view_lab_services_search->DrID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DrID" id="z_DrID" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->DrID->cellAttributes() ?>>
			<span id="el_view_lab_services_DrID" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->DrID->EditValue ?>"<?php echo $view_lab_services_search->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BillStatus"><?php echo $view_lab_services_search->BillStatus->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_BillStatus" id="z_BillStatus" value="=">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->BillStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_BillStatus" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_search->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->BillStatus->EditValue ?>"<?php echo $view_lab_services_search->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_search->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label for="x_LabTestReleased" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_LabTestReleased"><?php echo $view_lab_services_search->LabTestReleased->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE">
</span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div <?php echo $view_lab_services_search->LabTestReleased->cellAttributes() ?>>
			<span id="el_view_lab_services_LabTestReleased" class="ew-search-field">
<input type="text" data-table="view_lab_services" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_search->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_search->LabTestReleased->EditValue ?>"<?php echo $view_lab_services_search->LabTestReleased->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_services_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_services_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_services_search->showPageFooter();
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
$view_lab_services_search->terminate();
?>