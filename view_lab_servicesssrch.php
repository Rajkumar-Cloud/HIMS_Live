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
$view_lab_servicess_search = new view_lab_servicess_search();

// Run the page
$view_lab_servicess_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_servicess_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_lab_servicess_search->IsModal) { ?>
var fview_lab_servicesssearch = currentAdvancedSearchForm = new ew.Form("fview_lab_servicesssearch", "search");
<?php } else { ?>
var fview_lab_servicesssearch = currentForm = new ew.Form("fview_lab_servicesssearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_lab_servicesssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_servicesssearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_servicesssearch.lists["x_HospID"] = <?php echo $view_lab_servicess_search->HospID->Lookup->toClientList() ?>;
fview_lab_servicesssearch.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_servicess_search->HospID->lookupOptions()) ?>;

// Form object for search
// Validate function for search

fview_lab_servicesssearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->SID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RealizationAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->RealizationAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->CId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->PatId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->DrID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_servicess->BillStatus->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_servicess_search->showPageHeader(); ?>
<?php
$view_lab_servicess_search->showMessage();
?>
<form name="fview_lab_servicesssearch" id="fview_lab_servicesssearch" class="<?php echo $view_lab_servicess_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_servicess_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_servicess_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_servicess">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_servicess_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_lab_servicess->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_id"><?php echo $view_lab_servicess->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->id->cellAttributes() ?>>
			<span id="el_view_lab_servicess_id">
<input type="text" data-table="view_lab_servicess" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_lab_servicess->id->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->id->EditValue ?>"<?php echo $view_lab_servicess->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->SID->Visible) { // SID ?>
	<div id="r_SID" class="form-group row">
		<label for="x_SID" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_SID"><?php echo $view_lab_servicess->SID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SID" id="z_SID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->SID->cellAttributes() ?>>
			<span id="el_view_lab_servicess_SID">
<input type="text" data-table="view_lab_servicess" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->SID->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->SID->EditValue ?>"<?php echo $view_lab_servicess->SID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Reception"><?php echo $view_lab_servicess->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Reception->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Reception">
<input type="text" data-table="view_lab_servicess" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->Reception->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Reception->EditValue ?>"<?php echo $view_lab_servicess->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientId"><?php echo $view_lab_servicess->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->PatientId->cellAttributes() ?>>
			<span id="el_view_lab_servicess_PatientId">
<input type="text" data-table="view_lab_servicess" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->PatientId->EditValue ?>"<?php echo $view_lab_servicess->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_mrnno"><?php echo $view_lab_servicess->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->mrnno->cellAttributes() ?>>
			<span id="el_view_lab_servicess_mrnno">
<input type="text" data-table="view_lab_servicess" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->mrnno->EditValue ?>"<?php echo $view_lab_servicess->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatientName"><?php echo $view_lab_servicess->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->PatientName->cellAttributes() ?>>
			<span id="el_view_lab_servicess_PatientName">
<input type="text" data-table="view_lab_servicess" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->PatientName->EditValue ?>"<?php echo $view_lab_servicess->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Age"><?php echo $view_lab_servicess->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Age->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Age">
<input type="text" data-table="view_lab_servicess" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Age->EditValue ?>"<?php echo $view_lab_servicess->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Gender"><?php echo $view_lab_servicess->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Gender->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Gender">
<input type="text" data-table="view_lab_servicess" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Gender->EditValue ?>"<?php echo $view_lab_servicess->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_profilePic"><?php echo $view_lab_servicess->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->profilePic->cellAttributes() ?>>
			<span id="el_view_lab_servicess_profilePic">
<input type="text" data-table="view_lab_servicess" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_lab_servicess->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->profilePic->EditValue ?>"<?php echo $view_lab_servicess->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Mobile"><?php echo $view_lab_servicess->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Mobile->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Mobile">
<input type="text" data-table="view_lab_servicess" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Mobile->EditValue ?>"<?php echo $view_lab_servicess->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_IP_OP"><?php echo $view_lab_servicess->IP_OP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->IP_OP->cellAttributes() ?>>
			<span id="el_view_lab_servicess_IP_OP">
<input type="text" data-table="view_lab_servicess" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->IP_OP->EditValue ?>"<?php echo $view_lab_servicess->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Doctor"><?php echo $view_lab_servicess->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Doctor->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Doctor">
<input type="text" data-table="view_lab_servicess" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Doctor->EditValue ?>"<?php echo $view_lab_servicess->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_voucher_type"><?php echo $view_lab_servicess->voucher_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->voucher_type->cellAttributes() ?>>
			<span id="el_view_lab_servicess_voucher_type">
<input type="text" data-table="view_lab_servicess" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->voucher_type->EditValue ?>"<?php echo $view_lab_servicess->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Details"><?php echo $view_lab_servicess->Details->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Details" id="z_Details" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Details->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Details">
<input type="text" data-table="view_lab_servicess" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Details->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Details->EditValue ?>"<?php echo $view_lab_servicess->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_ModeofPayment"><?php echo $view_lab_servicess->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_lab_servicess_ModeofPayment">
<input type="text" data-table="view_lab_servicess" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->ModeofPayment->EditValue ?>"<?php echo $view_lab_servicess->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Amount"><?php echo $view_lab_servicess->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Amount->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Amount">
<input type="text" data-table="view_lab_servicess" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->Amount->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Amount->EditValue ?>"<?php echo $view_lab_servicess->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_AnyDues"><?php echo $view_lab_servicess->AnyDues->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->AnyDues->cellAttributes() ?>>
			<span id="el_view_lab_servicess_AnyDues">
<input type="text" data-table="view_lab_servicess" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->AnyDues->EditValue ?>"<?php echo $view_lab_servicess->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_createdby"><?php echo $view_lab_servicess->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->createdby->cellAttributes() ?>>
			<span id="el_view_lab_servicess_createdby">
<input type="text" data-table="view_lab_servicess" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->createdby->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->createdby->EditValue ?>"<?php echo $view_lab_servicess->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_createddatetime"><?php echo $view_lab_servicess->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->createddatetime->cellAttributes() ?>>
			<span id="el_view_lab_servicess_createddatetime">
<input type="text" data-table="view_lab_servicess" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_servicess->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->createddatetime->EditValue ?>"<?php echo $view_lab_servicess->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_servicess->createddatetime->ReadOnly && !$view_lab_servicess->createddatetime->Disabled && !isset($view_lab_servicess->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_servicess->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_servicesssearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_modifiedby"><?php echo $view_lab_servicess->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->modifiedby->cellAttributes() ?>>
			<span id="el_view_lab_servicess_modifiedby">
<input type="text" data-table="view_lab_servicess" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->modifiedby->EditValue ?>"<?php echo $view_lab_servicess->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_modifieddatetime"><?php echo $view_lab_servicess->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_lab_servicess_modifieddatetime">
<input type="text" data-table="view_lab_servicess" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_lab_servicess->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->modifieddatetime->EditValue ?>"<?php echo $view_lab_servicess->modifieddatetime->editAttributes() ?>>
<?php if (!$view_lab_servicess->modifieddatetime->ReadOnly && !$view_lab_servicess->modifieddatetime->Disabled && !isset($view_lab_servicess->modifieddatetime->EditAttrs["readonly"]) && !isset($view_lab_servicess->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_servicesssearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationAmount"><?php echo $view_lab_servicess->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RealizationAmount">
<input type="text" data-table="view_lab_servicess" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RealizationAmount->EditValue ?>"<?php echo $view_lab_servicess->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationStatus"><?php echo $view_lab_servicess->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RealizationStatus">
<input type="text" data-table="view_lab_servicess" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RealizationStatus->EditValue ?>"<?php echo $view_lab_servicess->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationRemarks"><?php echo $view_lab_servicess->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RealizationRemarks">
<input type="text" data-table="view_lab_servicess" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RealizationRemarks->EditValue ?>"<?php echo $view_lab_servicess->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationBatchNo"><?php echo $view_lab_servicess->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RealizationBatchNo">
<input type="text" data-table="view_lab_servicess" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RealizationBatchNo->EditValue ?>"<?php echo $view_lab_servicess->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RealizationDate"><?php echo $view_lab_servicess->RealizationDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RealizationDate->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RealizationDate">
<input type="text" data-table="view_lab_servicess" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RealizationDate->EditValue ?>"<?php echo $view_lab_servicess->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_HospID"><?php echo $view_lab_servicess->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->HospID->cellAttributes() ?>>
			<span id="el_view_lab_servicess_HospID">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_servicess" data-field="x_HospID" data-value-separator="<?php echo $view_lab_servicess->HospID->displayValueSeparatorAttribute() ?>" id="x_HospID" name="x_HospID"<?php echo $view_lab_servicess->HospID->editAttributes() ?>>
		<?php echo $view_lab_servicess->HospID->selectOptionListHtml("x_HospID") ?>
	</select>
</div>
<?php echo $view_lab_servicess->HospID->Lookup->getParamTag("p_x_HospID") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RIDNO"><?php echo $view_lab_servicess->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RIDNO->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RIDNO">
<input type="text" data-table="view_lab_servicess" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RIDNO->EditValue ?>"<?php echo $view_lab_servicess->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_TidNo"><?php echo $view_lab_servicess->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->TidNo->cellAttributes() ?>>
			<span id="el_view_lab_servicess_TidNo">
<input type="text" data-table="view_lab_servicess" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->TidNo->EditValue ?>"<?php echo $view_lab_servicess->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_CId"><?php echo $view_lab_servicess->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->CId->cellAttributes() ?>>
			<span id="el_view_lab_servicess_CId">
<input type="text" data-table="view_lab_servicess" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->CId->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->CId->EditValue ?>"<?php echo $view_lab_servicess->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PartnerName"><?php echo $view_lab_servicess->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->PartnerName->cellAttributes() ?>>
			<span id="el_view_lab_servicess_PartnerName">
<input type="text" data-table="view_lab_servicess" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->PartnerName->EditValue ?>"<?php echo $view_lab_servicess->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PayerType"><?php echo $view_lab_servicess->PayerType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->PayerType->cellAttributes() ?>>
			<span id="el_view_lab_servicess_PayerType">
<input type="text" data-table="view_lab_servicess" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->PayerType->EditValue ?>"<?php echo $view_lab_servicess->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Dob"><?php echo $view_lab_servicess->Dob->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dob" id="z_Dob" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Dob->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Dob">
<input type="text" data-table="view_lab_servicess" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Dob->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Dob->EditValue ?>"<?php echo $view_lab_servicess->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Currency"><?php echo $view_lab_servicess->Currency->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Currency" id="z_Currency" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Currency->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Currency">
<input type="text" data-table="view_lab_servicess" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Currency->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Currency->EditValue ?>"<?php echo $view_lab_servicess->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DiscountRemarks"><?php echo $view_lab_servicess->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_lab_servicess_DiscountRemarks">
<input type="text" data-table="view_lab_servicess" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->DiscountRemarks->EditValue ?>"<?php echo $view_lab_servicess->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_Remarks"><?php echo $view_lab_servicess->Remarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->Remarks->cellAttributes() ?>>
			<span id="el_view_lab_servicess_Remarks">
<input type="text" data-table="view_lab_servicess" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->Remarks->EditValue ?>"<?php echo $view_lab_servicess->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_PatId"><?php echo $view_lab_servicess->PatId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatId" id="z_PatId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->PatId->cellAttributes() ?>>
			<span id="el_view_lab_servicess_PatId">
<input type="text" data-table="view_lab_servicess" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->PatId->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->PatId->EditValue ?>"<?php echo $view_lab_servicess->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DrDepartment"><?php echo $view_lab_servicess->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->DrDepartment->cellAttributes() ?>>
			<span id="el_view_lab_servicess_DrDepartment">
<input type="text" data-table="view_lab_servicess" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->DrDepartment->EditValue ?>"<?php echo $view_lab_servicess->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_RefferedBy"><?php echo $view_lab_servicess->RefferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->RefferedBy->cellAttributes() ?>>
			<span id="el_view_lab_servicess_RefferedBy">
<input type="text" data-table="view_lab_servicess" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->RefferedBy->EditValue ?>"<?php echo $view_lab_servicess->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BillNumber"><?php echo $view_lab_servicess->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->BillNumber->cellAttributes() ?>>
			<span id="el_view_lab_servicess_BillNumber">
<input type="text" data-table="view_lab_servicess" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->BillNumber->EditValue ?>"<?php echo $view_lab_servicess->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_CardNumber"><?php echo $view_lab_servicess->CardNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->CardNumber->cellAttributes() ?>>
			<span id="el_view_lab_servicess_CardNumber">
<input type="text" data-table="view_lab_servicess" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->CardNumber->EditValue ?>"<?php echo $view_lab_servicess->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BankName"><?php echo $view_lab_servicess->BankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BankName" id="z_BankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->BankName->cellAttributes() ?>>
			<span id="el_view_lab_servicess_BankName">
<input type="text" data-table="view_lab_servicess" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->BankName->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->BankName->EditValue ?>"<?php echo $view_lab_servicess->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_DrID"><?php echo $view_lab_servicess->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->DrID->cellAttributes() ?>>
			<span id="el_view_lab_servicess_DrID">
<input type="text" data-table="view_lab_servicess" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->DrID->EditValue ?>"<?php echo $view_lab_servicess->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label for="x_LabTestReleased" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_LabTestReleased"><?php echo $view_lab_servicess->LabTestReleased->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->LabTestReleased->cellAttributes() ?>>
			<span id="el_view_lab_servicess_LabTestReleased">
<input type="text" data-table="view_lab_servicess" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_servicess->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->LabTestReleased->EditValue ?>"<?php echo $view_lab_servicess->LabTestReleased->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_servicess->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_lab_servicess_search->LeftColumnClass ?>"><span id="elh_view_lab_servicess_BillStatus"><?php echo $view_lab_servicess->BillStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillStatus" id="z_BillStatus" value="="></span>
		</label>
		<div class="<?php echo $view_lab_servicess_search->RightColumnClass ?>"><div<?php echo $view_lab_servicess->BillStatus->cellAttributes() ?>>
			<span id="el_view_lab_servicess_BillStatus">
<input type="text" data-table="view_lab_servicess" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_lab_servicess->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_servicess->BillStatus->EditValue ?>"<?php echo $view_lab_servicess->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_servicess_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_servicess_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_servicess_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_servicess_search->terminate();
?>