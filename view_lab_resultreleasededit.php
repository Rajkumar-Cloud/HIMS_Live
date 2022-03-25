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
$view_lab_resultreleased_edit = new view_lab_resultreleased_edit();

// Run the page
$view_lab_resultreleased_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_resultreleased_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fview_lab_resultreleasededit = currentForm = new ew.Form("fview_lab_resultreleasededit", "edit");

// Validate form
fview_lab_resultreleasededit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($view_lab_resultreleased_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->id->caption(), $view_lab_resultreleased->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->PatID->caption(), $view_lab_resultreleased->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->PatID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->PatientName->caption(), $view_lab_resultreleased->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Age->caption(), $view_lab_resultreleased->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Gender->caption(), $view_lab_resultreleased->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->sid->Required) { ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->sid->caption(), $view_lab_resultreleased->sid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->sid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->ItemCode->Required) { ?>
			elm = this.getElements("x" + infix + "_ItemCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->ItemCode->caption(), $view_lab_resultreleased->ItemCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DEptCd->caption(), $view_lab_resultreleased->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Resulted->Required) { ?>
			elm = this.getElements("x" + infix + "_Resulted");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Resulted->caption(), $view_lab_resultreleased->Resulted->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Services->Required) { ?>
			elm = this.getElements("x" + infix + "_Services");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Services->caption(), $view_lab_resultreleased->Services->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->LabReport->caption(), $view_lab_resultreleased->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Pic1->caption(), $view_lab_resultreleased->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Pic2->caption(), $view_lab_resultreleased->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->TestUnit->Required) { ?>
			elm = this.getElements("x" + infix + "_TestUnit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->TestUnit->caption(), $view_lab_resultreleased->TestUnit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->RefValue->caption(), $view_lab_resultreleased->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Order->caption(), $view_lab_resultreleased->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->Order->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->Repeated->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Repeated->caption(), $view_lab_resultreleased->Repeated->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Vid->Required) { ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Vid->caption(), $view_lab_resultreleased->Vid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Vid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->Vid->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->invoiceId->Required) { ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->invoiceId->caption(), $view_lab_resultreleased->invoiceId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_invoiceId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->invoiceId->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->DrID->Required) { ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrID->caption(), $view_lab_resultreleased->DrID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DrID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->DrID->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->DrCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_DrCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrCODE->caption(), $view_lab_resultreleased->DrCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->DrName->caption(), $view_lab_resultreleased->DrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->Department->caption(), $view_lab_resultreleased->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_lab_resultreleased_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->createddatetime->caption(), $view_lab_resultreleased->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->createddatetime->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->status->caption(), $view_lab_resultreleased->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_lab_resultreleased->status->errorMessage()) ?>");
		<?php if ($view_lab_resultreleased_edit->TestType->Required) { ?>
			elm = this.getElements("x" + infix + "_TestType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_lab_resultreleased->TestType->caption(), $view_lab_resultreleased->TestType->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_lab_resultreleasededit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_resultreleasededit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_resultreleasededit.lists["x_TestUnit"] = <?php echo $view_lab_resultreleased_edit->TestUnit->Lookup->toClientList() ?>;
fview_lab_resultreleasededit.lists["x_TestUnit"].options = <?php echo JsonEncode($view_lab_resultreleased_edit->TestUnit->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_lab_resultreleased_edit->showPageHeader(); ?>
<?php
$view_lab_resultreleased_edit->showMessage();
?>
<form name="fview_lab_resultreleasededit" id="fview_lab_resultreleasededit" class="<?php echo $view_lab_resultreleased_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_resultreleased_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_resultreleased_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleased">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_resultreleased_edit->IsModal ?>">
<?php if ($view_lab_resultreleased->getCurrentMasterTable() == "view_lab_services") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_lab_services">
<input type="hidden" name="fk_id" value="<?php echo $view_lab_resultreleased->Vid->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($view_lab_resultreleased->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_view_lab_resultreleased_id" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->id->caption() ?><?php echo ($view_lab_resultreleased->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->id->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_id">
<span<?php echo $view_lab_resultreleased->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($view_lab_resultreleased->id->CurrentValue) ?>">
<?php echo $view_lab_resultreleased->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_view_lab_resultreleased_PatID" for="x_PatID" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->PatID->caption() ?><?php echo ($view_lab_resultreleased->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->PatID->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_PatID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatID->EditValue ?>"<?php echo $view_lab_resultreleased->PatID->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_lab_resultreleased_PatientName" for="x_PatientName" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->PatientName->caption() ?><?php echo ($view_lab_resultreleased->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->PatientName->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_PatientName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->PatientName->EditValue ?>"<?php echo $view_lab_resultreleased->PatientName->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_lab_resultreleased_Age" for="x_Age" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Age->caption() ?><?php echo ($view_lab_resultreleased->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Age->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Age">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Age->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Age->EditValue ?>"<?php echo $view_lab_resultreleased->Age->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_lab_resultreleased_Gender" for="x_Gender" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Gender->caption() ?><?php echo ($view_lab_resultreleased->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Gender->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Gender">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Gender->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Gender->EditValue ?>"<?php echo $view_lab_resultreleased->Gender->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->sid->Visible) { // sid ?>
	<div id="r_sid" class="form-group row">
		<label id="elh_view_lab_resultreleased_sid" for="x_sid" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->sid->caption() ?><?php echo ($view_lab_resultreleased->sid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->sid->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_sid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->sid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->sid->EditValue ?>"<?php echo $view_lab_resultreleased->sid->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->sid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->ItemCode->Visible) { // ItemCode ?>
	<div id="r_ItemCode" class="form-group row">
		<label id="elh_view_lab_resultreleased_ItemCode" for="x_ItemCode" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->ItemCode->caption() ?><?php echo ($view_lab_resultreleased->ItemCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->ItemCode->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_ItemCode">
<input type="text" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x_ItemCode" id="x_ItemCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->ItemCode->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->ItemCode->EditValue ?>"<?php echo $view_lab_resultreleased->ItemCode->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->ItemCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label id="elh_view_lab_resultreleased_DEptCd" for="x_DEptCd" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->DEptCd->caption() ?><?php echo ($view_lab_resultreleased->DEptCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->DEptCd->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DEptCd">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DEptCd->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DEptCd->EditValue ?>"<?php echo $view_lab_resultreleased->DEptCd->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Resulted->Visible) { // Resulted ?>
	<div id="r_Resulted" class="form-group row">
		<label id="elh_view_lab_resultreleased_Resulted" for="x_Resulted" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Resulted->caption() ?><?php echo ($view_lab_resultreleased->Resulted->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Resulted->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Resulted">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Resulted" name="x_Resulted" id="x_Resulted" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Resulted->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Resulted->EditValue ?>"<?php echo $view_lab_resultreleased->Resulted->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Resulted->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Services->Visible) { // Services ?>
	<div id="r_Services" class="form-group row">
		<label id="elh_view_lab_resultreleased_Services" for="x_Services" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Services->caption() ?><?php echo ($view_lab_resultreleased->Services->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Services->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Services">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Services" name="x_Services" id="x_Services" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Services->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Services->EditValue ?>"<?php echo $view_lab_resultreleased->Services->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Services->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label id="elh_view_lab_resultreleased_LabReport" for="x_LabReport" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->LabReport->caption() ?><?php echo ($view_lab_resultreleased->LabReport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->LabReport->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_LabReport">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->LabReport->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->LabReport->editAttributes() ?>><?php echo $view_lab_resultreleased->LabReport->EditValue ?></textarea>
</span>
<?php echo $view_lab_resultreleased->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label id="elh_view_lab_resultreleased_Pic1" for="x_Pic1" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Pic1->caption() ?><?php echo ($view_lab_resultreleased->Pic1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Pic1->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Pic1">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Pic1->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Pic1->EditValue ?>"<?php echo $view_lab_resultreleased->Pic1->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label id="elh_view_lab_resultreleased_Pic2" for="x_Pic2" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Pic2->caption() ?><?php echo ($view_lab_resultreleased->Pic2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Pic2->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Pic2">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Pic2->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Pic2->EditValue ?>"<?php echo $view_lab_resultreleased->Pic2->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->TestUnit->Visible) { // TestUnit ?>
	<div id="r_TestUnit" class="form-group row">
		<label id="elh_view_lab_resultreleased_TestUnit" for="x_TestUnit" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->TestUnit->caption() ?><?php echo ($view_lab_resultreleased->TestUnit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->TestUnit->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_TestUnit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-value-separator="<?php echo $view_lab_resultreleased->TestUnit->displayValueSeparatorAttribute() ?>" id="x_TestUnit" name="x_TestUnit"<?php echo $view_lab_resultreleased->TestUnit->editAttributes() ?>>
		<?php echo $view_lab_resultreleased->TestUnit->selectOptionListHtml("x_TestUnit") ?>
	</select>
</div>
<?php echo $view_lab_resultreleased->TestUnit->Lookup->getParamTag("p_x_TestUnit") ?>
</span>
<?php echo $view_lab_resultreleased->TestUnit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_view_lab_resultreleased_RefValue" for="x_RefValue" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->RefValue->caption() ?><?php echo ($view_lab_resultreleased->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->RefValue->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_RefValue">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->RefValue->getPlaceHolder()) ?>"<?php echo $view_lab_resultreleased->RefValue->editAttributes() ?>><?php echo $view_lab_resultreleased->RefValue->EditValue ?></textarea>
</span>
<?php echo $view_lab_resultreleased->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_view_lab_resultreleased_Order" for="x_Order" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Order->caption() ?><?php echo ($view_lab_resultreleased->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Order->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Order">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Order->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Order->EditValue ?>"<?php echo $view_lab_resultreleased->Order->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Repeated->Visible) { // Repeated ?>
	<div id="r_Repeated" class="form-group row">
		<label id="elh_view_lab_resultreleased_Repeated" for="x_Repeated" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Repeated->caption() ?><?php echo ($view_lab_resultreleased->Repeated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Repeated->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Repeated">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Repeated" name="x_Repeated" id="x_Repeated" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Repeated->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Repeated->EditValue ?>"<?php echo $view_lab_resultreleased->Repeated->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Repeated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Vid->Visible) { // Vid ?>
	<div id="r_Vid" class="form-group row">
		<label id="elh_view_lab_resultreleased_Vid" for="x_Vid" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Vid->caption() ?><?php echo ($view_lab_resultreleased->Vid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Vid->cellAttributes() ?>>
<?php if ($view_lab_resultreleased->Vid->getSessionValue() <> "") { ?>
<span id="el_view_lab_resultreleased_Vid">
<span<?php echo $view_lab_resultreleased->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($view_lab_resultreleased->Vid->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_Vid" name="x_Vid" value="<?php echo HtmlEncode($view_lab_resultreleased->Vid->CurrentValue) ?>">
<?php } else { ?>
<span id="el_view_lab_resultreleased_Vid">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Vid->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Vid->EditValue ?>"<?php echo $view_lab_resultreleased->Vid->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $view_lab_resultreleased->Vid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->invoiceId->Visible) { // invoiceId ?>
	<div id="r_invoiceId" class="form-group row">
		<label id="elh_view_lab_resultreleased_invoiceId" for="x_invoiceId" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->invoiceId->caption() ?><?php echo ($view_lab_resultreleased->invoiceId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->invoiceId->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_invoiceId">
<input type="text" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->invoiceId->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->invoiceId->EditValue ?>"<?php echo $view_lab_resultreleased->invoiceId->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->invoiceId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_view_lab_resultreleased_DrID" for="x_DrID" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->DrID->caption() ?><?php echo ($view_lab_resultreleased->DrID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->DrID->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrID">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrID->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrID->EditValue ?>"<?php echo $view_lab_resultreleased->DrID->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->DrCODE->Visible) { // DrCODE ?>
	<div id="r_DrCODE" class="form-group row">
		<label id="elh_view_lab_resultreleased_DrCODE" for="x_DrCODE" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->DrCODE->caption() ?><?php echo ($view_lab_resultreleased->DrCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->DrCODE->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrCODE">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x_DrCODE" id="x_DrCODE" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrCODE->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrCODE->EditValue ?>"<?php echo $view_lab_resultreleased->DrCODE->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->DrCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_view_lab_resultreleased_DrName" for="x_DrName" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->DrName->caption() ?><?php echo ($view_lab_resultreleased->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->DrName->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_DrName">
<input type="text" data-table="view_lab_resultreleased" data-field="x_DrName" name="x_DrName" id="x_DrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->DrName->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->DrName->EditValue ?>"<?php echo $view_lab_resultreleased->DrName->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_view_lab_resultreleased_Department" for="x_Department" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->Department->caption() ?><?php echo ($view_lab_resultreleased->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->Department->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_Department">
<input type="text" data-table="view_lab_resultreleased" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->Department->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->Department->EditValue ?>"<?php echo $view_lab_resultreleased->Department->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->createddatetime->Visible) { // createddatetime ?>
	<div id="r_createddatetime" class="form-group row">
		<label id="elh_view_lab_resultreleased_createddatetime" for="x_createddatetime" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->createddatetime->caption() ?><?php echo ($view_lab_resultreleased->createddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->createddatetime->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_createddatetime">
<input type="text" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->createddatetime->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->createddatetime->EditValue ?>"<?php echo $view_lab_resultreleased->createddatetime->editAttributes() ?>>
<?php if (!$view_lab_resultreleased->createddatetime->ReadOnly && !$view_lab_resultreleased->createddatetime->Disabled && !isset($view_lab_resultreleased->createddatetime->EditAttrs["readonly"]) && !isset($view_lab_resultreleased->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fview_lab_resultreleasededit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $view_lab_resultreleased->createddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_lab_resultreleased_status" for="x_status" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->status->caption() ?><?php echo ($view_lab_resultreleased->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->status->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_status">
<input type="text" data-table="view_lab_resultreleased" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->status->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->status->EditValue ?>"<?php echo $view_lab_resultreleased->status->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_lab_resultreleased->TestType->Visible) { // TestType ?>
	<div id="r_TestType" class="form-group row">
		<label id="elh_view_lab_resultreleased_TestType" for="x_TestType" class="<?php echo $view_lab_resultreleased_edit->LeftColumnClass ?>"><?php echo $view_lab_resultreleased->TestType->caption() ?><?php echo ($view_lab_resultreleased->TestType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_lab_resultreleased_edit->RightColumnClass ?>"><div<?php echo $view_lab_resultreleased->TestType->cellAttributes() ?>>
<span id="el_view_lab_resultreleased_TestType">
<input type="text" data-table="view_lab_resultreleased" data-field="x_TestType" name="x_TestType" id="x_TestType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_lab_resultreleased->TestType->getPlaceHolder()) ?>" value="<?php echo $view_lab_resultreleased->TestType->EditValue ?>"<?php echo $view_lab_resultreleased->TestType->editAttributes() ?>>
</span>
<?php echo $view_lab_resultreleased->TestType->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_lab_resultreleased_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_lab_resultreleased_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_lab_resultreleased_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_lab_resultreleased_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_lab_resultreleased_edit->terminate();
?>