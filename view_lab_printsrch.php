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
$view_lab_print_search = new view_lab_print_search();

// Run the page
$view_lab_print_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_print_search->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($view_lab_print_search->IsModal) { ?>
var fview_lab_printsearch = currentAdvancedSearchForm = new ew.Form("fview_lab_printsearch", "search");
<?php } else { ?>
var fview_lab_printsearch = currentForm = new ew.Form("fview_lab_printsearch", "search");
<?php } ?>

// Form_CustomValidate event
fview_lab_printsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_printsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search
// Validate function for search

fview_lab_printsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->SID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Reception");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->Reception->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_createddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->createddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_modifieddatetime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->modifieddatetime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RealizationAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->RealizationAmount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_HospID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->HospID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_RIDNO");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->RIDNO->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TidNo");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->TidNo->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_CId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->CId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PatId");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->PatId->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DrID");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->DrID->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_BillStatus");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($view_lab_print->BillStatus->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_print_search->showPageHeader(); ?>
<?php
$view_lab_print_search->showMessage();
?>
<form name="fview_lab_printsearch" id="fview_lab_printsearch" class="<?php echo $view_lab_print_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_print_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_print_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_print">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_print_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($view_lab_print->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_id"><?php echo $view_lab_print->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->id->cellAttributes() ?>>
			<span id="el_view_lab_print_id">
<input type="text" data-table="view_lab_print" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($view_lab_print->id->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->id->EditValue ?>"<?php echo $view_lab_print->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->SID->Visible) { // SID ?>
	<div id="r_SID" class="form-group row">
		<label for="x_SID" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_SID"><?php echo $view_lab_print->SID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SID" id="z_SID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->SID->cellAttributes() ?>>
			<span id="el_view_lab_print_SID">
<input type="text" data-table="view_lab_print" data-field="x_SID" name="x_SID" id="x_SID" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->SID->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->SID->EditValue ?>"<?php echo $view_lab_print->SID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label for="x_Reception" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Reception"><?php echo $view_lab_print->Reception->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Reception" id="z_Reception" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Reception->cellAttributes() ?>>
			<span id="el_view_lab_print_Reception">
<input type="text" data-table="view_lab_print" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->Reception->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Reception->EditValue ?>"<?php echo $view_lab_print->Reception->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label for="x_PatientId" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_PatientId"><?php echo $view_lab_print->PatientId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientId" id="z_PatientId" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->PatientId->cellAttributes() ?>>
			<span id="el_view_lab_print_PatientId">
<input type="text" data-table="view_lab_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PatientId->EditValue ?>"<?php echo $view_lab_print->PatientId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label for="x_mrnno" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_mrnno"><?php echo $view_lab_print->mrnno->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_mrnno" id="z_mrnno" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->mrnno->cellAttributes() ?>>
			<span id="el_view_lab_print_mrnno">
<input type="text" data-table="view_lab_print" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->mrnno->EditValue ?>"<?php echo $view_lab_print->mrnno->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label for="x_PatientName" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_PatientName"><?php echo $view_lab_print->PatientName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->PatientName->cellAttributes() ?>>
			<span id="el_view_lab_print_PatientName">
<input type="text" data-table="view_lab_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PatientName->EditValue ?>"<?php echo $view_lab_print->PatientName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label for="x_Age" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Age"><?php echo $view_lab_print->Age->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Age" id="z_Age" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Age->cellAttributes() ?>>
			<span id="el_view_lab_print_Age">
<input type="text" data-table="view_lab_print" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Age->EditValue ?>"<?php echo $view_lab_print->Age->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label for="x_Gender" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Gender"><?php echo $view_lab_print->Gender->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Gender" id="z_Gender" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Gender->cellAttributes() ?>>
			<span id="el_view_lab_print_Gender">
<input type="text" data-table="view_lab_print" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Gender->EditValue ?>"<?php echo $view_lab_print->Gender->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label for="x_profilePic" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_profilePic"><?php echo $view_lab_print->profilePic->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_profilePic" id="z_profilePic" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->profilePic->cellAttributes() ?>>
			<span id="el_view_lab_print_profilePic">
<input type="text" data-table="view_lab_print" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" size="35" placeholder="<?php echo HtmlEncode($view_lab_print->profilePic->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->profilePic->EditValue ?>"<?php echo $view_lab_print->profilePic->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
	<div id="r_Mobile" class="form-group row">
		<label for="x_Mobile" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Mobile"><?php echo $view_lab_print->Mobile->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Mobile" id="z_Mobile" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Mobile->cellAttributes() ?>>
			<span id="el_view_lab_print_Mobile">
<input type="text" data-table="view_lab_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Mobile->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Mobile->EditValue ?>"<?php echo $view_lab_print->Mobile->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->IP_OP->Visible) { // IP_OP ?>
	<div id="r_IP_OP" class="form-group row">
		<label for="x_IP_OP" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_IP_OP"><?php echo $view_lab_print->IP_OP->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_IP_OP" id="z_IP_OP" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->IP_OP->cellAttributes() ?>>
			<span id="el_view_lab_print_IP_OP">
<input type="text" data-table="view_lab_print" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->IP_OP->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->IP_OP->EditValue ?>"<?php echo $view_lab_print->IP_OP->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Doctor"><?php echo $view_lab_print->Doctor->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Doctor" id="z_Doctor" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Doctor->cellAttributes() ?>>
			<span id="el_view_lab_print_Doctor">
<input type="text" data-table="view_lab_print" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Doctor->EditValue ?>"<?php echo $view_lab_print->Doctor->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->voucher_type->Visible) { // voucher_type ?>
	<div id="r_voucher_type" class="form-group row">
		<label for="x_voucher_type" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_voucher_type"><?php echo $view_lab_print->voucher_type->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_voucher_type" id="z_voucher_type" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->voucher_type->cellAttributes() ?>>
			<span id="el_view_lab_print_voucher_type">
<input type="text" data-table="view_lab_print" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->voucher_type->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->voucher_type->EditValue ?>"<?php echo $view_lab_print->voucher_type->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Details->Visible) { // Details ?>
	<div id="r_Details" class="form-group row">
		<label for="x_Details" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Details"><?php echo $view_lab_print->Details->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Details" id="z_Details" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Details->cellAttributes() ?>>
			<span id="el_view_lab_print_Details">
<input type="text" data-table="view_lab_print" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Details->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Details->EditValue ?>"<?php echo $view_lab_print->Details->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->ModeofPayment->Visible) { // ModeofPayment ?>
	<div id="r_ModeofPayment" class="form-group row">
		<label for="x_ModeofPayment" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_ModeofPayment"><?php echo $view_lab_print->ModeofPayment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ModeofPayment" id="z_ModeofPayment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->ModeofPayment->cellAttributes() ?>>
			<span id="el_view_lab_print_ModeofPayment">
<input type="text" data-table="view_lab_print" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->ModeofPayment->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->ModeofPayment->EditValue ?>"<?php echo $view_lab_print->ModeofPayment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Amount"><?php echo $view_lab_print->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Amount->cellAttributes() ?>>
			<span id="el_view_lab_print_Amount">
<input type="text" data-table="view_lab_print" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->Amount->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Amount->EditValue ?>"<?php echo $view_lab_print->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->AnyDues->Visible) { // AnyDues ?>
	<div id="r_AnyDues" class="form-group row">
		<label for="x_AnyDues" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_AnyDues"><?php echo $view_lab_print->AnyDues->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AnyDues" id="z_AnyDues" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->AnyDues->cellAttributes() ?>>
			<span id="el_view_lab_print_AnyDues">
<input type="text" data-table="view_lab_print" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->AnyDues->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->AnyDues->EditValue ?>"<?php echo $view_lab_print->AnyDues->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->createdby->Visible) { // createdby ?>
	<div id="r_createdby" class="form-group row">
		<label for="x_createdby" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_createdby"><?php echo $view_lab_print->createdby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_createdby" id="z_createdby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->createdby->cellAttributes() ?>>
			<span id="el_view_lab_print_createdby">
<input type="text" data-table="view_lab_print" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->createdby->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->createdby->EditValue ?>"<?php echo $view_lab_print->createdby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label for="x_createddatetime" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_createddatetime"><?php echo $view_lab_print->createddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_createddatetime" id="z_createddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->createddatetime->cellAttributes() ?>>
			<span id="el_view_lab_print_createddatetime">
<input type="text" data-table="view_lab_print" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_print->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->createddatetime->EditValue ?>"<?php echo $view_lab_print->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_print->createddatetime->ReadOnly && !$view_lab_print->createddatetime->Disabled && !isset($view_lab_print->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_print->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_printsearch", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->modifiedby->Visible) { // modifiedby ?>
	<div id="r_modifiedby" class="form-group row">
		<label for="x_modifiedby" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_modifiedby"><?php echo $view_lab_print->modifiedby->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_modifiedby" id="z_modifiedby" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->modifiedby->cellAttributes() ?>>
			<span id="el_view_lab_print_modifiedby">
<input type="text" data-table="view_lab_print" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->modifiedby->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->modifiedby->EditValue ?>"<?php echo $view_lab_print->modifiedby->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->modifieddatetime->Visible) { // modifieddatetime ?>
	<div id="r_modifieddatetime" class="form-group row">
		<label for="x_modifieddatetime" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_modifieddatetime"><?php echo $view_lab_print->modifieddatetime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_modifieddatetime" id="z_modifieddatetime" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->modifieddatetime->cellAttributes() ?>>
			<span id="el_view_lab_print_modifieddatetime">
<input type="text" data-table="view_lab_print" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?php echo HtmlEncode($view_lab_print->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->modifieddatetime->EditValue ?>"<?php echo $view_lab_print->modifieddatetime->editAttributes() ?>>
<?php if (!$view_lab_print->modifieddatetime->ReadOnly && !$view_lab_print->modifieddatetime->Disabled && !isset($view_lab_print->modifieddatetime->EditAttrs["readonly"]) && !isset($view_lab_print->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_printsearch", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RealizationAmount->Visible) { // RealizationAmount ?>
	<div id="r_RealizationAmount" class="form-group row">
		<label for="x_RealizationAmount" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RealizationAmount"><?php echo $view_lab_print->RealizationAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RealizationAmount" id="z_RealizationAmount" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RealizationAmount->cellAttributes() ?>>
			<span id="el_view_lab_print_RealizationAmount">
<input type="text" data-table="view_lab_print" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->RealizationAmount->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RealizationAmount->EditValue ?>"<?php echo $view_lab_print->RealizationAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RealizationStatus->Visible) { // RealizationStatus ?>
	<div id="r_RealizationStatus" class="form-group row">
		<label for="x_RealizationStatus" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RealizationStatus"><?php echo $view_lab_print->RealizationStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationStatus" id="z_RealizationStatus" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RealizationStatus->cellAttributes() ?>>
			<span id="el_view_lab_print_RealizationStatus">
<input type="text" data-table="view_lab_print" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->RealizationStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RealizationStatus->EditValue ?>"<?php echo $view_lab_print->RealizationStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<div id="r_RealizationRemarks" class="form-group row">
		<label for="x_RealizationRemarks" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RealizationRemarks"><?php echo $view_lab_print->RealizationRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationRemarks" id="z_RealizationRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RealizationRemarks->cellAttributes() ?>>
			<span id="el_view_lab_print_RealizationRemarks">
<input type="text" data-table="view_lab_print" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->RealizationRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RealizationRemarks->EditValue ?>"<?php echo $view_lab_print->RealizationRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<div id="r_RealizationBatchNo" class="form-group row">
		<label for="x_RealizationBatchNo" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RealizationBatchNo"><?php echo $view_lab_print->RealizationBatchNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationBatchNo" id="z_RealizationBatchNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RealizationBatchNo->cellAttributes() ?>>
			<span id="el_view_lab_print_RealizationBatchNo">
<input type="text" data-table="view_lab_print" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->RealizationBatchNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RealizationBatchNo->EditValue ?>"<?php echo $view_lab_print->RealizationBatchNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RealizationDate->Visible) { // RealizationDate ?>
	<div id="r_RealizationDate" class="form-group row">
		<label for="x_RealizationDate" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RealizationDate"><?php echo $view_lab_print->RealizationDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RealizationDate" id="z_RealizationDate" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RealizationDate->cellAttributes() ?>>
			<span id="el_view_lab_print_RealizationDate">
<input type="text" data-table="view_lab_print" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->RealizationDate->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RealizationDate->EditValue ?>"<?php echo $view_lab_print->RealizationDate->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label for="x_HospID" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_HospID"><?php echo $view_lab_print->HospID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_HospID" id="z_HospID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->HospID->cellAttributes() ?>>
			<span id="el_view_lab_print_HospID">
<input type="text" data-table="view_lab_print" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->HospID->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->HospID->EditValue ?>"<?php echo $view_lab_print->HospID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label for="x_RIDNO" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RIDNO"><?php echo $view_lab_print->RIDNO->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_RIDNO" id="z_RIDNO" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RIDNO->cellAttributes() ?>>
			<span id="el_view_lab_print_RIDNO">
<input type="text" data-table="view_lab_print" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->RIDNO->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RIDNO->EditValue ?>"<?php echo $view_lab_print->RIDNO->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_TidNo"><?php echo $view_lab_print->TidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TidNo" id="z_TidNo" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->TidNo->cellAttributes() ?>>
			<span id="el_view_lab_print_TidNo">
<input type="text" data-table="view_lab_print" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->TidNo->EditValue ?>"<?php echo $view_lab_print->TidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->CId->Visible) { // CId ?>
	<div id="r_CId" class="form-group row">
		<label for="x_CId" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_CId"><?php echo $view_lab_print->CId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_CId" id="z_CId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->CId->cellAttributes() ?>>
			<span id="el_view_lab_print_CId">
<input type="text" data-table="view_lab_print" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->CId->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->CId->EditValue ?>"<?php echo $view_lab_print->CId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label for="x_PartnerName" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_PartnerName"><?php echo $view_lab_print->PartnerName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PartnerName" id="z_PartnerName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->PartnerName->cellAttributes() ?>>
			<span id="el_view_lab_print_PartnerName">
<input type="text" data-table="view_lab_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PartnerName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PartnerName->EditValue ?>"<?php echo $view_lab_print->PartnerName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->PayerType->Visible) { // PayerType ?>
	<div id="r_PayerType" class="form-group row">
		<label for="x_PayerType" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_PayerType"><?php echo $view_lab_print->PayerType->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PayerType" id="z_PayerType" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->PayerType->cellAttributes() ?>>
			<span id="el_view_lab_print_PayerType">
<input type="text" data-table="view_lab_print" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->PayerType->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PayerType->EditValue ?>"<?php echo $view_lab_print->PayerType->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Dob->Visible) { // Dob ?>
	<div id="r_Dob" class="form-group row">
		<label for="x_Dob" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Dob"><?php echo $view_lab_print->Dob->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dob" id="z_Dob" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Dob->cellAttributes() ?>>
			<span id="el_view_lab_print_Dob">
<input type="text" data-table="view_lab_print" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Dob->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Dob->EditValue ?>"<?php echo $view_lab_print->Dob->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Currency->Visible) { // Currency ?>
	<div id="r_Currency" class="form-group row">
		<label for="x_Currency" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Currency"><?php echo $view_lab_print->Currency->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Currency" id="z_Currency" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Currency->cellAttributes() ?>>
			<span id="el_view_lab_print_Currency">
<input type="text" data-table="view_lab_print" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Currency->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Currency->EditValue ?>"<?php echo $view_lab_print->Currency->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<div id="r_DiscountRemarks" class="form-group row">
		<label for="x_DiscountRemarks" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_DiscountRemarks"><?php echo $view_lab_print->DiscountRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DiscountRemarks" id="z_DiscountRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->DiscountRemarks->cellAttributes() ?>>
			<span id="el_view_lab_print_DiscountRemarks">
<input type="text" data-table="view_lab_print" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->DiscountRemarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->DiscountRemarks->EditValue ?>"<?php echo $view_lab_print->DiscountRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_Remarks"><?php echo $view_lab_print->Remarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->Remarks->cellAttributes() ?>>
			<span id="el_view_lab_print_Remarks">
<input type="text" data-table="view_lab_print" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->Remarks->EditValue ?>"<?php echo $view_lab_print->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label for="x_PatId" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_PatId"><?php echo $view_lab_print->PatId->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PatId" id="z_PatId" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->PatId->cellAttributes() ?>>
			<span id="el_view_lab_print_PatId">
<input type="text" data-table="view_lab_print" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->PatId->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->PatId->EditValue ?>"<?php echo $view_lab_print->PatId->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label for="x_DrDepartment" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_DrDepartment"><?php echo $view_lab_print->DrDepartment->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DrDepartment" id="z_DrDepartment" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->DrDepartment->cellAttributes() ?>>
			<span id="el_view_lab_print_DrDepartment">
<input type="text" data-table="view_lab_print" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->DrDepartment->EditValue ?>"<?php echo $view_lab_print->DrDepartment->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->RefferedBy->Visible) { // RefferedBy ?>
	<div id="r_RefferedBy" class="form-group row">
		<label for="x_RefferedBy" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_RefferedBy"><?php echo $view_lab_print->RefferedBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefferedBy" id="z_RefferedBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->RefferedBy->cellAttributes() ?>>
			<span id="el_view_lab_print_RefferedBy">
<input type="text" data-table="view_lab_print" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->RefferedBy->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->RefferedBy->EditValue ?>"<?php echo $view_lab_print->RefferedBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
	<div id="r_BillNumber" class="form-group row">
		<label for="x_BillNumber" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_BillNumber"><?php echo $view_lab_print->BillNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BillNumber" id="z_BillNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->BillNumber->cellAttributes() ?>>
			<span id="el_view_lab_print_BillNumber">
<input type="text" data-table="view_lab_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->BillNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->BillNumber->EditValue ?>"<?php echo $view_lab_print->BillNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->CardNumber->Visible) { // CardNumber ?>
	<div id="r_CardNumber" class="form-group row">
		<label for="x_CardNumber" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_CardNumber"><?php echo $view_lab_print->CardNumber->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_CardNumber" id="z_CardNumber" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->CardNumber->cellAttributes() ?>>
			<span id="el_view_lab_print_CardNumber">
<input type="text" data-table="view_lab_print" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->CardNumber->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->CardNumber->EditValue ?>"<?php echo $view_lab_print->CardNumber->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->BankName->Visible) { // BankName ?>
	<div id="r_BankName" class="form-group row">
		<label for="x_BankName" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_BankName"><?php echo $view_lab_print->BankName->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_BankName" id="z_BankName" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->BankName->cellAttributes() ?>>
			<span id="el_view_lab_print_BankName">
<input type="text" data-table="view_lab_print" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->BankName->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->BankName->EditValue ?>"<?php echo $view_lab_print->BankName->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label for="x_DrID" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_DrID"><?php echo $view_lab_print->DrID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DrID" id="z_DrID" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->DrID->cellAttributes() ?>>
			<span id="el_view_lab_print_DrID">
<input type="text" data-table="view_lab_print" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->DrID->EditValue ?>"<?php echo $view_lab_print->DrID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->BillStatus->Visible) { // BillStatus ?>
	<div id="r_BillStatus" class="form-group row">
		<label for="x_BillStatus" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_BillStatus"><?php echo $view_lab_print->BillStatus->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_BillStatus" id="z_BillStatus" value="="></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->BillStatus->cellAttributes() ?>>
			<span id="el_view_lab_print_BillStatus">
<input type="text" data-table="view_lab_print" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?php echo HtmlEncode($view_lab_print->BillStatus->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->BillStatus->EditValue ?>"<?php echo $view_lab_print->BillStatus->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($view_lab_print->LabTestReleased->Visible) { // LabTestReleased ?>
	<div id="r_LabTestReleased" class="form-group row">
		<label for="x_LabTestReleased" class="<?php echo $view_lab_print_search->LeftColumnClass ?>"><span id="elh_view_lab_print_LabTestReleased"><?php echo $view_lab_print->LabTestReleased->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabTestReleased" id="z_LabTestReleased" value="LIKE"></span>
		</label>
		<div class="<?php echo $view_lab_print_search->RightColumnClass ?>"><div<?php echo $view_lab_print->LabTestReleased->cellAttributes() ?>>
			<span id="el_view_lab_print_LabTestReleased">
<input type="text" data-table="view_lab_print" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_print->LabTestReleased->getPlaceHolder()) ?>" value="<?php echo $view_lab_print->LabTestReleased->EditValue ?>"<?php echo $view_lab_print->LabTestReleased->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_print_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_print_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_print_search->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_print_search->terminate();
?>