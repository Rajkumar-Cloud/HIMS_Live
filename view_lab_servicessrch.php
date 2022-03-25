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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_lab_services_search->IsModal) { ?>
var fview_lab_servicessearch = currentAdvancedSearchForm = new ew.Form("fview_lab_servicessearch", "search");
<?php } else { ?>
var fview_lab_servicessearch = currentForm = new ew.Form("fview_lab_servicessearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_lab_servicessearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_servicessearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_servicessearch.lists["x_HospID"] = <?php echo $view_lab_services_search->HospID->Lookup->toClientList() ?>;
fview_lab_servicessearch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_search->HospID->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fview_lab_servicessearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->SID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RealizationAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->RealizationAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->CId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->PatId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->DrID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services->BillStatus->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_services_search->showPageHeader(); ?>
<?php
$view_lab_services_search->showMessage();
?>
<form name="fview_lab_servicessearch" id="fview_lab_servicessearch" class="<?php echo $view_lab_services_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_services_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_lab_services->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_id"><?php echo $view_lab_services->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->id->cellAttributes() ?>>
			<span id="el_view_lab_services_id">
<input type="text" data-table="view_lab_services" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_lab_services->id->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->id->EditValue ?>"<?php echo $view_lab_services->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->SID->Visible) { // SID ?>
	<div id="r_SID" class="form-group row">
		<label for="x_SID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_SID"><?php echo $view_lab_services->SID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SID" id="z_SID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->SID->cellAttributes() ?>>
			<span id="el_view_lab_services_SID">
<input type="text" data-table="view_lab_services" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->SID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->SID->EditValue ?>"<?php echo $view_lab_services->SID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Reception"><?php echo $view_lab_services->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Reception->cellAttributes() ?>>
			<span id="el_view_lab_services_Reception">
<input type="text" data-table="view_lab_services" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->Reception->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Reception->EditValue ?>"<?php echo $view_lab_services->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatientId"><?php echo $view_lab_services->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->PatientId->cellAttributes() ?>>
			<span id="el_view_lab_services_PatientId">
<input type="text" data-table="view_lab_services" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PatientId->EditValue ?>"<?php echo $view_lab_services->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_mrnno"><?php echo $view_lab_services->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->mrnno->cellAttributes() ?>>
			<span id="el_view_lab_services_mrnno">
<input type="text" data-table="view_lab_services" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->mrnno->EditValue ?>"<?php echo $view_lab_services->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatientName"><?php echo $view_lab_services->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->PatientName->cellAttributes() ?>>
			<span id="el_view_lab_services_PatientName">
<input type="text" data-table="view_lab_services" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PatientName->EditValue ?>"<?php echo $view_lab_services->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Age"><?php echo $view_lab_services->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Age->cellAttributes() ?>>
			<span id="el_view_lab_services_Age">
<input type="text" data-table="view_lab_services" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Age->EditValue ?>"<?php echo $view_lab_services->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Gender"><?php echo $view_lab_services->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Gender->cellAttributes() ?>>
			<span id="el_view_lab_services_Gender">
<input type="text" data-table="view_lab_services" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Gender->EditValue ?>"<?php echo $view_lab_services->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_profilePic"><?php echo $view_lab_services->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->profilePic->cellAttributes() ?>>
			<span id="el_view_lab_services_profilePic">
<input type="text" data-table="view_lab_services" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_lab_services->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->profilePic->EditValue ?>"<?php echo $view_lab_services->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Mobile"><?php echo $view_lab_services->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Mobile->cellAttributes() ?>>
			<span id="el_view_lab_services_Mobile">
<input type="text" data-table="view_lab_services" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Mobile->EditValue ?>"<?php echo $view_lab_services->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_IP_OP"><?php echo $view_lab_services->IP_OP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->IP_OP->cellAttributes() ?>>
			<span id="el_view_lab_services_IP_OP">
<input type="text" data-table="view_lab_services" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->IP_OP->EditValue ?>"<?php echo $view_lab_services->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Doctor"><?php echo $view_lab_services->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Doctor->cellAttributes() ?>>
			<span id="el_view_lab_services_Doctor">
<input type="text" data-table="view_lab_services" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Doctor->EditValue ?>"<?php echo $view_lab_services->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_voucher_type"><?php echo $view_lab_services->voucher_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->voucher_type->cellAttributes() ?>>
			<span id="el_view_lab_services_voucher_type">
<input type="text" data-table="view_lab_services" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->voucher_type->EditValue ?>"<?php echo $view_lab_services->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Details"><?php echo $view_lab_services->Details->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Details" id="z_Details" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Details->cellAttributes() ?>>
			<span id="el_view_lab_services_Details">
<input type="text" data-table="view_lab_services" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Details->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Details->EditValue ?>"<?php echo $view_lab_services->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_ModeofPayment"><?php echo $view_lab_services->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_lab_services_ModeofPayment">
<input type="text" data-table="view_lab_services" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->ModeofPayment->EditValue ?>"<?php echo $view_lab_services->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Amount"><?php echo $view_lab_services->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Amount->cellAttributes() ?>>
			<span id="el_view_lab_services_Amount">
<input type="text" data-table="view_lab_services" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->Amount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Amount->EditValue ?>"<?php echo $view_lab_services->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_AnyDues"><?php echo $view_lab_services->AnyDues->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->AnyDues->cellAttributes() ?>>
			<span id="el_view_lab_services_AnyDues">
<input type="text" data-table="view_lab_services" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->AnyDues->EditValue ?>"<?php echo $view_lab_services->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_createdby"><?php echo $view_lab_services->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->createdby->cellAttributes() ?>>
			<span id="el_view_lab_services_createdby">
<input type="text" data-table="view_lab_services" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->createdby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->createdby->EditValue ?>"<?php echo $view_lab_services->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_createddatetime"><?php echo $view_lab_services->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->createddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_createddatetime">
<input type="text" data-table="view_lab_services" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_services->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->createddatetime->EditValue ?>"<?php echo $view_lab_services->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_services->createddatetime->ReadOnly && !$view_lab_services->createddatetime->Disabled && !isset($view_lab_services->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_services->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_servicessearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_modifiedby"><?php echo $view_lab_services->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->modifiedby->cellAttributes() ?>>
			<span id="el_view_lab_services_modifiedby">
<input type="text" data-table="view_lab_services" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->modifiedby->EditValue ?>"<?php echo $view_lab_services->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_modifieddatetime"><?php echo $view_lab_services->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_modifieddatetime">
<input type="text" data-table="view_lab_services" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_lab_services->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->modifieddatetime->EditValue ?>"<?php echo $view_lab_services->modifieddatetime->editAttributes() ?>>
<?php if (!$view_lab_services->modifieddatetime->ReadOnly && !$view_lab_services->modifieddatetime->Disabled && !isset($view_lab_services->modifieddatetime->EditAttrs["readonly"]) && !isset($view_lab_services->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_servicessearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationAmount"><?php echo $view_lab_services->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationAmount">
<input type="text" data-table="view_lab_services" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RealizationAmount->EditValue ?>"<?php echo $view_lab_services->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationStatus"><?php echo $view_lab_services->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationStatus">
<input type="text" data-table="view_lab_services" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RealizationStatus->EditValue ?>"<?php echo $view_lab_services->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationRemarks"><?php echo $view_lab_services->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationRemarks">
<input type="text" data-table="view_lab_services" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RealizationRemarks->EditValue ?>"<?php echo $view_lab_services->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationBatchNo"><?php echo $view_lab_services->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationBatchNo">
<input type="text" data-table="view_lab_services" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RealizationBatchNo->EditValue ?>"<?php echo $view_lab_services->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RealizationDate"><?php echo $view_lab_services->RealizationDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RealizationDate->cellAttributes() ?>>
			<span id="el_view_lab_services_RealizationDate">
<input type="text" data-table="view_lab_services" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RealizationDate->EditValue ?>"<?php echo $view_lab_services->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_HospID"><?php echo $view_lab_services->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->HospID->cellAttributes() ?>>
			<span id="el_view_lab_services_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services->HospID->editAttributes() ?>>
		<?php echo $view_lab_services->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_lab_services->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RIDNO"><?php echo $view_lab_services->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RIDNO->cellAttributes() ?>>
			<span id="el_view_lab_services_RIDNO">
<input type="text" data-table="view_lab_services" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RIDNO->EditValue ?>"<?php echo $view_lab_services->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_TidNo"><?php echo $view_lab_services->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->TidNo->cellAttributes() ?>>
			<span id="el_view_lab_services_TidNo">
<input type="text" data-table="view_lab_services" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->TidNo->EditValue ?>"<?php echo $view_lab_services->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_CId"><?php echo $view_lab_services->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->CId->cellAttributes() ?>>
			<span id="el_view_lab_services_CId">
<input type="text" data-table="view_lab_services" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->CId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->CId->EditValue ?>"<?php echo $view_lab_services->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PartnerName"><?php echo $view_lab_services->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->PartnerName->cellAttributes() ?>>
			<span id="el_view_lab_services_PartnerName">
<input type="text" data-table="view_lab_services" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PartnerName->EditValue ?>"<?php echo $view_lab_services->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PayerType"><?php echo $view_lab_services->PayerType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->PayerType->cellAttributes() ?>>
			<span id="el_view_lab_services_PayerType">
<input type="text" data-table="view_lab_services" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PayerType->EditValue ?>"<?php echo $view_lab_services->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Dob"><?php echo $view_lab_services->Dob->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dob" id="z_Dob" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Dob->cellAttributes() ?>>
			<span id="el_view_lab_services_Dob">
<input type="text" data-table="view_lab_services" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Dob->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Dob->EditValue ?>"<?php echo $view_lab_services->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Currency"><?php echo $view_lab_services->Currency->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Currency" id="z_Currency" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Currency->cellAttributes() ?>>
			<span id="el_view_lab_services_Currency">
<input type="text" data-table="view_lab_services" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Currency->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Currency->EditValue ?>"<?php echo $view_lab_services->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DiscountRemarks"><?php echo $view_lab_services->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_DiscountRemarks">
<input type="text" data-table="view_lab_services" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->DiscountRemarks->EditValue ?>"<?php echo $view_lab_services->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_Remarks"><?php echo $view_lab_services->Remarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->Remarks->cellAttributes() ?>>
			<span id="el_view_lab_services_Remarks">
<input type="text" data-table="view_lab_services" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->Remarks->EditValue ?>"<?php echo $view_lab_services->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_PatId"><?php echo $view_lab_services->PatId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatId" id="z_PatId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->PatId->cellAttributes() ?>>
			<span id="el_view_lab_services_PatId">
<input type="text" data-table="view_lab_services" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->PatId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->PatId->EditValue ?>"<?php echo $view_lab_services->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DrDepartment"><?php echo $view_lab_services->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->DrDepartment->cellAttributes() ?>>
			<span id="el_view_lab_services_DrDepartment">
<input type="text" data-table="view_lab_services" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->DrDepartment->EditValue ?>"<?php echo $view_lab_services->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_RefferedBy"><?php echo $view_lab_services->RefferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->RefferedBy->cellAttributes() ?>>
			<span id="el_view_lab_services_RefferedBy">
<input type="text" data-table="view_lab_services" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->RefferedBy->EditValue ?>"<?php echo $view_lab_services->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BillNumber"><?php echo $view_lab_services->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->BillNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_BillNumber">
<input type="text" data-table="view_lab_services" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->BillNumber->EditValue ?>"<?php echo $view_lab_services->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_CardNumber"><?php echo $view_lab_services->CardNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->CardNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_CardNumber">
<input type="text" data-table="view_lab_services" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->CardNumber->EditValue ?>"<?php echo $view_lab_services->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BankName"><?php echo $view_lab_services->BankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BankName" id="z_BankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->BankName->cellAttributes() ?>>
			<span id="el_view_lab_services_BankName">
<input type="text" data-table="view_lab_services" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->BankName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->BankName->EditValue ?>"<?php echo $view_lab_services->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_DrID"><?php echo $view_lab_services->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->DrID->cellAttributes() ?>>
			<span id="el_view_lab_services_DrID">
<input type="text" data-table="view_lab_services" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->DrID->EditValue ?>"<?php echo $view_lab_services->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_BillStatus"><?php echo $view_lab_services->BillStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillStatus" id="z_BillStatus" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->BillStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_BillStatus">
<input type="text" data-table="view_lab_services" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_lab_services->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->BillStatus->EditValue ?>"<?php echo $view_lab_services->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label for="x_LabTestReleased" class="<?php echo $view_lab_services_search->LeftColumnClass ?>"><span id="elh_view_lab_services_LabTestReleased"><?php echo $view_lab_services->LabTestReleased->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_search->RightColumnClass ?>"><div<?php echo $view_lab_services->LabTestReleased->cellAttributes() ?>>
			<span id="el_view_lab_services_LabTestReleased">
<input type="text" data-table="view_lab_services" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services->LabTestReleased->EditValue ?>"<?php echo $view_lab_services->LabTestReleased->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_search->terminate();
?>