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
$view_lab_services_auth_search = new view_lab_services_auth_search();

// Run the page
$view_lab_services_auth_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_auth_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_lab_services_auth_search->IsModal) { ?>
var fview_lab_services_authsearch = currentAdvancedSearchForm = new ew.Form("fview_lab_services_authsearch", "search");
<?php } else { ?>
var fview_lab_services_authsearch = currentForm = new ew.Form("fview_lab_services_authsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_lab_services_authsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_services_authsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_services_authsearch.lists["x_HospID"] = <?php echo $view_lab_services_auth_search->HospID->Lookup->toClientList() ?>;
fview_lab_services_authsearch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_auth_search->HospID->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fview_lab_services_authsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->SID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RealizationAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->RealizationAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->CId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->PatId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->DrID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_services_auth->BillStatus->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_services_auth_search->showPageHeader(); ?>
<?php
$view_lab_services_auth_search->showMessage();
?>
<form name="fview_lab_services_authsearch" id="fview_lab_services_authsearch" class="<?php echo $view_lab_services_auth_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_auth_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_auth_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services_auth">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_services_auth_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_lab_services_auth->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_id"><?php echo $view_lab_services_auth->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->id->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_id">
<input type="text" data-table="view_lab_services_auth" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_lab_services_auth->id->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->id->EditValue ?>"<?php echo $view_lab_services_auth->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->SID->Visible) { // SID ?>
	<div id="r_SID" class="form-group row">
		<label for="x_SID" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_SID"><?php echo $view_lab_services_auth->SID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SID" id="z_SID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->SID->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_SID">
<input type="text" data-table="view_lab_services_auth" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->SID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->SID->EditValue ?>"<?php echo $view_lab_services_auth->SID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Reception"><?php echo $view_lab_services_auth->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Reception->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Reception">
<input type="text" data-table="view_lab_services_auth" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Reception->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Reception->EditValue ?>"<?php echo $view_lab_services_auth->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatientId"><?php echo $view_lab_services_auth->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->PatientId->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_PatientId">
<input type="text" data-table="view_lab_services_auth" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PatientId->EditValue ?>"<?php echo $view_lab_services_auth->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_mrnno"><?php echo $view_lab_services_auth->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->mrnno->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_mrnno">
<input type="text" data-table="view_lab_services_auth" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->mrnno->EditValue ?>"<?php echo $view_lab_services_auth->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatientName"><?php echo $view_lab_services_auth->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->PatientName->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_PatientName">
<input type="text" data-table="view_lab_services_auth" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PatientName->EditValue ?>"<?php echo $view_lab_services_auth->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Age"><?php echo $view_lab_services_auth->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Age->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Age">
<input type="text" data-table="view_lab_services_auth" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Age->EditValue ?>"<?php echo $view_lab_services_auth->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Gender"><?php echo $view_lab_services_auth->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Gender->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Gender">
<input type="text" data-table="view_lab_services_auth" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Gender->EditValue ?>"<?php echo $view_lab_services_auth->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_profilePic"><?php echo $view_lab_services_auth->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->profilePic->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_profilePic">
<input type="text" data-table="view_lab_services_auth" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_lab_services_auth->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->profilePic->EditValue ?>"<?php echo $view_lab_services_auth->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Mobile"><?php echo $view_lab_services_auth->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Mobile->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Mobile">
<input type="text" data-table="view_lab_services_auth" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Mobile->EditValue ?>"<?php echo $view_lab_services_auth->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_IP_OP"><?php echo $view_lab_services_auth->IP_OP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->IP_OP->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_IP_OP">
<input type="text" data-table="view_lab_services_auth" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->IP_OP->EditValue ?>"<?php echo $view_lab_services_auth->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Doctor"><?php echo $view_lab_services_auth->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Doctor->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Doctor">
<input type="text" data-table="view_lab_services_auth" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Doctor->EditValue ?>"<?php echo $view_lab_services_auth->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_voucher_type"><?php echo $view_lab_services_auth->voucher_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->voucher_type->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_voucher_type">
<input type="text" data-table="view_lab_services_auth" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->voucher_type->EditValue ?>"<?php echo $view_lab_services_auth->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Details"><?php echo $view_lab_services_auth->Details->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Details" id="z_Details" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Details->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Details">
<input type="text" data-table="view_lab_services_auth" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Details->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Details->EditValue ?>"<?php echo $view_lab_services_auth->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_ModeofPayment"><?php echo $view_lab_services_auth->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_ModeofPayment">
<input type="text" data-table="view_lab_services_auth" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->ModeofPayment->EditValue ?>"<?php echo $view_lab_services_auth->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Amount"><?php echo $view_lab_services_auth->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Amount->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Amount">
<input type="text" data-table="view_lab_services_auth" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Amount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Amount->EditValue ?>"<?php echo $view_lab_services_auth->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_AnyDues"><?php echo $view_lab_services_auth->AnyDues->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->AnyDues->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_AnyDues">
<input type="text" data-table="view_lab_services_auth" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->AnyDues->EditValue ?>"<?php echo $view_lab_services_auth->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_createdby"><?php echo $view_lab_services_auth->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->createdby->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_createdby">
<input type="text" data-table="view_lab_services_auth" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->createdby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->createdby->EditValue ?>"<?php echo $view_lab_services_auth->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_createddatetime"><?php echo $view_lab_services_auth->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->createddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_createddatetime">
<input type="text" data-table="view_lab_services_auth" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_services_auth->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->createddatetime->EditValue ?>"<?php echo $view_lab_services_auth->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_services_auth->createddatetime->ReadOnly && !$view_lab_services_auth->createddatetime->Disabled && !isset($view_lab_services_auth->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_services_auth->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_services_authsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_modifiedby"><?php echo $view_lab_services_auth->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->modifiedby->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_modifiedby">
<input type="text" data-table="view_lab_services_auth" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->modifiedby->EditValue ?>"<?php echo $view_lab_services_auth->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_modifieddatetime"><?php echo $view_lab_services_auth->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_modifieddatetime">
<input type="text" data-table="view_lab_services_auth" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_lab_services_auth->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->modifieddatetime->EditValue ?>"<?php echo $view_lab_services_auth->modifieddatetime->editAttributes() ?>>
<?php if (!$view_lab_services_auth->modifieddatetime->ReadOnly && !$view_lab_services_auth->modifieddatetime->Disabled && !isset($view_lab_services_auth->modifieddatetime->EditAttrs["readonly"]) && !isset($view_lab_services_auth->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_services_authsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationAmount"><?php echo $view_lab_services_auth->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RealizationAmount">
<input type="text" data-table="view_lab_services_auth" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RealizationAmount->EditValue ?>"<?php echo $view_lab_services_auth->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationStatus"><?php echo $view_lab_services_auth->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RealizationStatus">
<input type="text" data-table="view_lab_services_auth" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RealizationStatus->EditValue ?>"<?php echo $view_lab_services_auth->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationRemarks"><?php echo $view_lab_services_auth->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RealizationRemarks">
<input type="text" data-table="view_lab_services_auth" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RealizationRemarks->EditValue ?>"<?php echo $view_lab_services_auth->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationBatchNo"><?php echo $view_lab_services_auth->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RealizationBatchNo">
<input type="text" data-table="view_lab_services_auth" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RealizationBatchNo->EditValue ?>"<?php echo $view_lab_services_auth->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationDate"><?php echo $view_lab_services_auth->RealizationDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RealizationDate->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RealizationDate">
<input type="text" data-table="view_lab_services_auth" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RealizationDate->EditValue ?>"<?php echo $view_lab_services_auth->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_HospID"><?php echo $view_lab_services_auth->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->HospID->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_services_auth" data-field="x_HospID" data-value-separator="<?php echo $view_lab_services_auth->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_services_auth->HospID->editAttributes() ?>>
		<?php echo $view_lab_services_auth->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_lab_services_auth->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RIDNO"><?php echo $view_lab_services_auth->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RIDNO->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RIDNO">
<input type="text" data-table="view_lab_services_auth" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RIDNO->EditValue ?>"<?php echo $view_lab_services_auth->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_TidNo"><?php echo $view_lab_services_auth->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->TidNo->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_TidNo">
<input type="text" data-table="view_lab_services_auth" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->TidNo->EditValue ?>"<?php echo $view_lab_services_auth->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_CId"><?php echo $view_lab_services_auth->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->CId->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_CId">
<input type="text" data-table="view_lab_services_auth" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->CId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->CId->EditValue ?>"<?php echo $view_lab_services_auth->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_PartnerName"><?php echo $view_lab_services_auth->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->PartnerName->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_PartnerName">
<input type="text" data-table="view_lab_services_auth" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PartnerName->EditValue ?>"<?php echo $view_lab_services_auth->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_PayerType"><?php echo $view_lab_services_auth->PayerType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->PayerType->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_PayerType">
<input type="text" data-table="view_lab_services_auth" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PayerType->EditValue ?>"<?php echo $view_lab_services_auth->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Dob"><?php echo $view_lab_services_auth->Dob->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dob" id="z_Dob" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Dob->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Dob">
<input type="text" data-table="view_lab_services_auth" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Dob->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Dob->EditValue ?>"<?php echo $view_lab_services_auth->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Currency"><?php echo $view_lab_services_auth->Currency->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Currency" id="z_Currency" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Currency->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Currency">
<input type="text" data-table="view_lab_services_auth" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Currency->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Currency->EditValue ?>"<?php echo $view_lab_services_auth->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_DiscountRemarks"><?php echo $view_lab_services_auth->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_DiscountRemarks">
<input type="text" data-table="view_lab_services_auth" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->DiscountRemarks->EditValue ?>"<?php echo $view_lab_services_auth->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_Remarks"><?php echo $view_lab_services_auth->Remarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->Remarks->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_Remarks">
<input type="text" data-table="view_lab_services_auth" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->Remarks->EditValue ?>"<?php echo $view_lab_services_auth->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatId"><?php echo $view_lab_services_auth->PatId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatId" id="z_PatId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->PatId->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_PatId">
<input type="text" data-table="view_lab_services_auth" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->PatId->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->PatId->EditValue ?>"<?php echo $view_lab_services_auth->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_DrDepartment"><?php echo $view_lab_services_auth->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->DrDepartment->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_DrDepartment">
<input type="text" data-table="view_lab_services_auth" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->DrDepartment->EditValue ?>"<?php echo $view_lab_services_auth->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_RefferedBy"><?php echo $view_lab_services_auth->RefferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->RefferedBy->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_RefferedBy">
<input type="text" data-table="view_lab_services_auth" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->RefferedBy->EditValue ?>"<?php echo $view_lab_services_auth->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_BillNumber"><?php echo $view_lab_services_auth->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->BillNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_BillNumber">
<input type="text" data-table="view_lab_services_auth" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->BillNumber->EditValue ?>"<?php echo $view_lab_services_auth->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_CardNumber"><?php echo $view_lab_services_auth->CardNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->CardNumber->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_CardNumber">
<input type="text" data-table="view_lab_services_auth" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->CardNumber->EditValue ?>"<?php echo $view_lab_services_auth->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_BankName"><?php echo $view_lab_services_auth->BankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BankName" id="z_BankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->BankName->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_BankName">
<input type="text" data-table="view_lab_services_auth" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->BankName->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->BankName->EditValue ?>"<?php echo $view_lab_services_auth->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_DrID"><?php echo $view_lab_services_auth->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->DrID->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_DrID">
<input type="text" data-table="view_lab_services_auth" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->DrID->EditValue ?>"<?php echo $view_lab_services_auth->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label for="x_LabTestReleased" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_LabTestReleased"><?php echo $view_lab_services_auth->LabTestReleased->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->LabTestReleased->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_LabTestReleased">
<input type="text" data-table="view_lab_services_auth" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_services_auth->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->LabTestReleased->EditValue ?>"<?php echo $view_lab_services_auth->LabTestReleased->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_services_auth->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_lab_services_auth_search->LeftColumnClass ?>"><span id="elh_view_lab_services_auth_BillStatus"><?php echo $view_lab_services_auth->BillStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillStatus" id="z_BillStatus" value="="></span>
		</label>
		<div class="<?php echo $view_lab_services_auth_search->RightColumnClass ?>"><div<?php echo $view_lab_services_auth->BillStatus->cellAttributes() ?>>
			<span id="el_view_lab_services_auth_BillStatus">
<input type="text" data-table="view_lab_services_auth" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_lab_services_auth->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_services_auth->BillStatus->EditValue ?>"<?php echo $view_lab_services_auth->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_services_auth_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_services_auth_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_services_auth_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_auth_search->terminate();
?>