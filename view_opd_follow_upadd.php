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
$view_opd_follow_up_add = new view_opd_follow_up_add();

// Run the page
$view_opd_follow_up_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_opd_follow_upadd = currentForm = new ew.Form("fview_opd_follow_upadd", "add");

// Validate form
fview_opd_follow_upadd.validate = function() {
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
		<?php if ($view_opd_follow_up_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Reception->caption(), $view_opd_follow_up->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->PatientId->caption(), $view_opd_follow_up->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->mrnno->caption(), $view_opd_follow_up->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->PatientName->caption(), $view_opd_follow_up->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->Telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_Telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Telephone->caption(), $view_opd_follow_up->Telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Age->caption(), $view_opd_follow_up->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Gender->caption(), $view_opd_follow_up->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->profilePic->caption(), $view_opd_follow_up->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->procedurenotes->Required) { ?>
			elm = this.getElements("x" + infix + "_procedurenotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->procedurenotes->caption(), $view_opd_follow_up->procedurenotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->NextReviewDate->caption(), $view_opd_follow_up->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->NextReviewDate->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->ICSIAdvised->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIAdvised[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->ICSIAdvised->caption(), $view_opd_follow_up->ICSIAdvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->DeliveryRegistered->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->DeliveryRegistered->caption(), $view_opd_follow_up->DeliveryRegistered->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->EDD->Required) { ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->EDD->caption(), $view_opd_follow_up->EDD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->EDD->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->SerologyPositive->Required) { ?>
			elm = this.getElements("x" + infix + "_SerologyPositive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->SerologyPositive->caption(), $view_opd_follow_up->SerologyPositive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->Allergy->Required) { ?>
			elm = this.getElements("x" + infix + "_Allergy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Allergy->caption(), $view_opd_follow_up->Allergy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->status->caption(), $view_opd_follow_up->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->status->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->createdby->caption(), $view_opd_follow_up->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->createddatetime->caption(), $view_opd_follow_up->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->LMP->caption(), $view_opd_follow_up->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->LMP->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->Procedure->caption(), $view_opd_follow_up->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_opd_follow_up_add->ProcedureDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->ProcedureDateTime->caption(), $view_opd_follow_up->ProcedureDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProcedureDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->ProcedureDateTime->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->ICSIDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->ICSIDate->caption(), $view_opd_follow_up->ICSIDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_opd_follow_up->ICSIDate->errorMessage()) ?>");
		<?php if ($view_opd_follow_up_add->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_opd_follow_up->RIDNo->caption(), $view_opd_follow_up->RIDNo->RequiredErrorMessage)) ?>");
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
fview_opd_follow_upadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_opd_follow_upadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_opd_follow_upadd.lists["x_ICSIAdvised[]"] = <?php echo $view_opd_follow_up_add->ICSIAdvised->Lookup->toClientList() ?>;
fview_opd_follow_upadd.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_opd_follow_up_add->ICSIAdvised->options(FALSE, TRUE)) ?>;
fview_opd_follow_upadd.lists["x_DeliveryRegistered[]"] = <?php echo $view_opd_follow_up_add->DeliveryRegistered->Lookup->toClientList() ?>;
fview_opd_follow_upadd.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($view_opd_follow_up_add->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fview_opd_follow_upadd.lists["x_SerologyPositive[]"] = <?php echo $view_opd_follow_up_add->SerologyPositive->Lookup->toClientList() ?>;
fview_opd_follow_upadd.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($view_opd_follow_up_add->SerologyPositive->options(FALSE, TRUE)) ?>;
fview_opd_follow_upadd.lists["x_Allergy"] = <?php echo $view_opd_follow_up_add->Allergy->Lookup->toClientList() ?>;
fview_opd_follow_upadd.lists["x_Allergy"].options = <?php echo JsonEncode($view_opd_follow_up_add->Allergy->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_opd_follow_up_add->showPageHeader(); ?>
<?php
$view_opd_follow_up_add->showMessage();
?>
<form name="fview_opd_follow_upadd" id="fview_opd_follow_upadd" class="<?php echo $view_opd_follow_up_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_opd_follow_up_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_opd_follow_up_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_opd_follow_up_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_view_opd_follow_up_Reception" for="x_Reception" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Reception" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Reception->caption() ?><?php echo ($view_opd_follow_up->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Reception->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Reception" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Reception">
<input type="text" data-table="view_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->Reception->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->Reception->EditValue ?>"<?php echo $view_opd_follow_up->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_view_opd_follow_up_PatientId" for="x_PatientId" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_PatientId" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->PatientId->caption() ?><?php echo ($view_opd_follow_up->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->PatientId->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_PatientId" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_PatientId">
<input type="text" data-table="view_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->PatientId->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->PatientId->EditValue ?>"<?php echo $view_opd_follow_up->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_view_opd_follow_up_mrnno" for="x_mrnno" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_mrnno" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->mrnno->caption() ?><?php echo ($view_opd_follow_up->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->mrnno->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_mrnno" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_mrnno">
<input type="text" data-table="view_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->mrnno->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->mrnno->EditValue ?>"<?php echo $view_opd_follow_up->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_view_opd_follow_up_PatientName" for="x_PatientName" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_PatientName" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->PatientName->caption() ?><?php echo ($view_opd_follow_up->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->PatientName->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_PatientName" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_PatientName">
<input type="text" data-table="view_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->PatientName->EditValue ?>"<?php echo $view_opd_follow_up->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<div id="r_Telephone" class="form-group row">
		<label id="elh_view_opd_follow_up_Telephone" for="x_Telephone" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Telephone" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Telephone->caption() ?><?php echo ($view_opd_follow_up->Telephone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Telephone->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Telephone" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Telephone">
<input type="text" data-table="view_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->Telephone->EditValue ?>"<?php echo $view_opd_follow_up->Telephone->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->Telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_view_opd_follow_up_Age" for="x_Age" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Age" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Age->caption() ?><?php echo ($view_opd_follow_up->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Age->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Age" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Age">
<input type="text" data-table="view_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->Age->EditValue ?>"<?php echo $view_opd_follow_up->Age->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_view_opd_follow_up_Gender" for="x_Gender" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Gender" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Gender->caption() ?><?php echo ($view_opd_follow_up->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Gender->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Gender" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Gender">
<input type="text" data-table="view_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->Gender->EditValue ?>"<?php echo $view_opd_follow_up->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_view_opd_follow_up_profilePic" for="x_profilePic" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_profilePic" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->profilePic->caption() ?><?php echo ($view_opd_follow_up->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->profilePic->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_profilePic" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_profilePic">
<textarea data-table="view_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up->profilePic->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up->profilePic->editAttributes() ?>><?php echo $view_opd_follow_up->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $view_opd_follow_up->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_view_opd_follow_up_procedurenotes" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_procedurenotes" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->procedurenotes->caption() ?><?php echo ($view_opd_follow_up->procedurenotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_procedurenotes" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_procedurenotes">
<?php AppendClass($view_opd_follow_up->procedurenotes->EditAttrs["class"], "editor"); ?>
<textarea data-table="view_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up->procedurenotes->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up->procedurenotes->editAttributes() ?>><?php echo $view_opd_follow_up->procedurenotes->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createEditor("fview_opd_follow_upadd", "x_procedurenotes", 35, 4, <?php echo ($view_opd_follow_up->procedurenotes->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $view_opd_follow_up->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_view_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_NextReviewDate" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->NextReviewDate->caption() ?><?php echo ($view_opd_follow_up->NextReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_NextReviewDate" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_NextReviewDate">
<input type="text" data-table="view_opd_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?php echo HtmlEncode($view_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $view_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$view_opd_follow_up->NextReviewDate->ReadOnly && !$view_opd_follow_up->NextReviewDate->Disabled && !isset($view_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($view_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createDateTimePicker("fview_opd_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_opd_follow_up->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label id="elh_view_opd_follow_up_ICSIAdvised" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?><?php echo ($view_opd_follow_up->ICSIAdvised->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $view_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $view_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
</script>
<?php echo $view_opd_follow_up->ICSIAdvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label id="elh_view_opd_follow_up_DeliveryRegistered" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?><?php echo ($view_opd_follow_up->DeliveryRegistered->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $view_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $view_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
</script>
<?php echo $view_opd_follow_up->DeliveryRegistered->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label id="elh_view_opd_follow_up_EDD" for="x_EDD" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_EDD" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->EDD->caption() ?><?php echo ($view_opd_follow_up->EDD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->EDD->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_EDD" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_EDD">
<input type="text" data-table="view_opd_follow_up" data-field="x_EDD" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($view_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->EDD->EditValue ?>"<?php echo $view_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$view_opd_follow_up->EDD->ReadOnly && !$view_opd_follow_up->EDD->Disabled && !isset($view_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($view_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createDateTimePicker("fview_opd_follow_upadd", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_opd_follow_up->EDD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label id="elh_view_opd_follow_up_SerologyPositive" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_SerologyPositive" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->SerologyPositive->caption() ?><?php echo ($view_opd_follow_up->SerologyPositive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_SerologyPositive" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="view_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $view_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $view_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
</script>
<?php echo $view_opd_follow_up->SerologyPositive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label id="elh_view_opd_follow_up_Allergy" for="x_Allergy" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Allergy" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Allergy->caption() ?><?php echo ($view_opd_follow_up->Allergy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Allergy->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Allergy" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Allergy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Allergy"><?php echo strval($view_opd_follow_up->Allergy->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($view_opd_follow_up->Allergy->ViewValue) : $view_opd_follow_up->Allergy->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($view_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($view_opd_follow_up->Allergy->ReadOnly || $view_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $view_opd_follow_up->Allergy->Lookup->getParamTag("p_x_Allergy") ?>
<input type="hidden" data-table="view_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $view_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo $view_opd_follow_up->Allergy->CurrentValue ?>"<?php echo $view_opd_follow_up->Allergy->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->Allergy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_view_opd_follow_up_status" for="x_status" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_status" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->status->caption() ?><?php echo ($view_opd_follow_up->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->status->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_status" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_status">
<input type="text" data-table="view_opd_follow_up" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($view_opd_follow_up->status->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->status->EditValue ?>"<?php echo $view_opd_follow_up->status->editAttributes() ?>>
</span>
</script>
<?php echo $view_opd_follow_up->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_view_opd_follow_up_LMP" for="x_LMP" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_LMP" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->LMP->caption() ?><?php echo ($view_opd_follow_up->LMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->LMP->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_LMP" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_LMP">
<input type="text" data-table="view_opd_follow_up" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($view_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->LMP->EditValue ?>"<?php echo $view_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$view_opd_follow_up->LMP->ReadOnly && !$view_opd_follow_up->LMP->Disabled && !isset($view_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($view_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createDateTimePicker("fview_opd_follow_upadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_opd_follow_up->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_view_opd_follow_up_Procedure" for="x_Procedure" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_Procedure" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->Procedure->caption() ?><?php echo ($view_opd_follow_up->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->Procedure->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_Procedure" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_Procedure">
<textarea data-table="view_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up->Procedure->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up->Procedure->editAttributes() ?>><?php echo $view_opd_follow_up->Procedure->EditValue ?></textarea>
</span>
</script>
<?php echo $view_opd_follow_up->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label id="elh_view_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?><?php echo ($view_opd_follow_up->ProcedureDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="view_opd_follow_up" data-field="x_ProcedureDateTime" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?php echo HtmlEncode($view_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $view_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$view_opd_follow_up->ProcedureDateTime->ReadOnly && !$view_opd_follow_up->ProcedureDateTime->Disabled && !isset($view_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($view_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createDateTimePicker("fview_opd_follow_upadd", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_opd_follow_up->ProcedureDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label id="elh_view_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_ICSIDate" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->ICSIDate->caption() ?><?php echo ($view_opd_follow_up->ICSIDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->ICSIDate->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_ICSIDate" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_ICSIDate">
<input type="text" data-table="view_opd_follow_up" data-field="x_ICSIDate" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($view_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $view_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $view_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$view_opd_follow_up->ICSIDate->ReadOnly && !$view_opd_follow_up->ICSIDate->Disabled && !isset($view_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($view_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="view_opd_follow_upadd_js">
ew.createDateTimePicker("fview_opd_follow_upadd", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $view_opd_follow_up->ICSIDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_opd_follow_up->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_view_opd_follow_up_RIDNo" for="x_RIDNo" class="<?php echo $view_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_view_opd_follow_up_RIDNo" class="view_opd_follow_upadd" type="text/html"><span><?php echo $view_opd_follow_up->RIDNo->caption() ?><?php echo ($view_opd_follow_up->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $view_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $view_opd_follow_up->RIDNo->cellAttributes() ?>>
<script id="tpx_view_opd_follow_up_RIDNo" class="view_opd_follow_upadd" type="text/html">
<span id="el_view_opd_follow_up_RIDNo">
<textarea data-table="view_opd_follow_up" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" cols="35" rows="4" placeholder="<?php echo HtmlEncode($view_opd_follow_up->RIDNo->getPlaceHolder()) ?>"<?php echo $view_opd_follow_up->RIDNo->editAttributes() ?>><?php echo $view_opd_follow_up->RIDNo->EditValue ?></textarea>
</span>
</script>
<?php echo $view_opd_follow_up->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_opd_follow_upadd" class="ew-custom-template"></div>
<script id="tpm_view_opd_follow_upadd" type="text/html">
<div id="ct_view_opd_follow_up_add"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app" href="patientview.php?showdetail=&id=<?php echo $results2[0]["id"]; ?>">
				  <i class="fas fa-female"></i> Patient
				</a>
				<a class="btn btn-app"  href="patientview.php?showdetail=&id=<?php echo $results1[0]["id"]; ?>">
				  <i class="fas fa-male"></i> Partner
				</a>
				<a class="btn btn-app" href="<?php echo $VitalsHistoryUrl; ?>">
				  <span class="badge bg-warning"><?php echo $$VitalsHistorywarn; ?></span>
				  <i class="fas fa-thermometer-full"></i> Vitals & History
				</a>
				<a class="btn btn-app" href="<?php echo $opurl; ?>">
				  <i class="fas fa-pencil-square-o"></i> OP
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfTreatmentwarnUrl; ?>">
					<i class="fas fa-sticky-note "></i> Treatment
				</a>	  
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
							<?php echo $ivfstimulationchartwarn; ?>
				  <i class="fas fa-sticky-note "></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfovumpickupchartUrl; ?>">
							<?php echo $ivfovumpickupchartwarn; ?>
				  <i class="fas fa-object-group"></i> Ovum Pick Up
				</a>
				<a class="btn btn-app"  href="<?php echo $ivf_et_chartUrl; ?>">
					<?php echo $Etcountwarn; ?>
				  <i class="fas fa-globe"></i> ET
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfsemenanalysisreportUrl; ?>">
							<?php echo $ivfsemenanalysisreportwarn; ?>
				  <i class="fas fa-puzzle-piece"></i> Semen Analysis
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfembryologychartlistUrl; ?>">
				  <i class="fas fa-bullseye"></i> Embryology 
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfotherprocedureUrl; ?>">
							<?php echo $ivfotherprocedurewarn; ?>
				  <i class="fas fa-life-ring"></i> Other Procedure
				</a>
				<a class="btn btn-app"  href="<?php echo $followupurl; ?>">
				  <i class="fas fa-map-marker"></i> Tracking
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfartsummaryUrl; ?>">
							 <?php echo $ivfartsummarycountwarn; ?>
				  <i class="fas fa-medkit"></i> Summary
				</a>
				<a class="btn btn-app"  href="<?php echo $patientserviceslistUrl; ?>">
				  <i class="fas fa-credit-card"></i> Billing
				</a>
				<a class="btn btn-app"  href="<?php echo $TrPlanurl; ?>">
				  <i class="fas fa-cart-plus"></i> Out Come
				</a>
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
<div class="row">
		 <div class="col-lg-8">
			<div class="card">             
			  <div class="card-body">
	   <div class="direct-chat-messages">
<?php
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where PatientId='".$results[0]["Female"]."' ORDER BY id DESC; ";
$results3 = $dbhelper->ExecuteRows($sql);
	   for ($i=0;$i< count($results3) ;$i++)
		{
	   $printd .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["createddatetime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["procedurenotes"].'
						</div>
					</div>';
		}
	   echo $printd;
?>
	   </div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
		<div class="col-lg-4">
			<div class="card">             
			  <div class="card-body">
	   <div class="direct-chat-messages">
<?php
for ($i=0;$i< count($results3) ;$i++)
{ 
	if($results3[$i]["ICSIAdvised"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["ICSIDate"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["ICSIAdvised"].'
						</div>
					</div>';
	}
	if($results3[$i]["EDD"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["EDD"].'</span>
						</div>
						<div class="direct-chat-text">
							EDD
						</div>
					</div>';
	}
	if($results3[$i]["LMP"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["LMP"].'</span>
						</div>
						<div class="direct-chat-text">
							LMP
						</div>
					</div>';
	}
	if($results3[$i]["ProcedureDateTime"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["ProcedureDateTime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["Procedure"].'
						</div>
					</div>';
	}
	if($results3[$i]["Allergy"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Allergy</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["Allergy"].'
						</div>
					</div>';
	}
	if($results3[$i]["SerologyPositive"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Serology Positive</span>
						</div>
						<div class="direct-chat-text">
							Serology Positive
						</div>
					</div>';
	}
}
echo $printda;
?>
	   </div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_view_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_procedurenotes"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  			  {{include tmpl="#tpc_view_opd_follow_up_ICSIAdvised"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_ICSIAdvised"/}} <br>
			  			  {{include tmpl="#tpc_view_opd_follow_up_ICSIDate"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_ICSIDate"/}} <br>
			  {{include tmpl="#tpc_view_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_NextReviewDate"/}} <br>
				{{include tmpl="#tpc_view_opd_follow_up_Procedure"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_Procedure"/}} <br>
				  {{include tmpl="#tpc_view_opd_follow_up_ProcedureDateTime"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_ProcedureDateTime"/}} <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			    {{include tmpl="#tpc_view_opd_follow_up_SerologyPositive"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_SerologyPositive"/}} <br>
				{{include tmpl="#tpc_view_opd_follow_up_Allergy"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_Allergy"/}} <br>
			    {{include tmpl="#tpc_view_opd_follow_up_DeliveryRegistered"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_DeliveryRegistered"/}} <br>
				{{include tmpl="#tpc_view_opd_follow_up_LMP"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_LMP"/}} <br>
				{{include tmpl="#tpc_view_opd_follow_up_EDD"/}}&nbsp;{{include tmpl="#tpx_view_opd_follow_up_EDD"/}} <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>
<?php if (!$view_opd_follow_up_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_opd_follow_up_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_opd_follow_up_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_opd_follow_up->Rows) ?> };
ew.applyTemplate("tpd_view_opd_follow_upadd", "tpm_view_opd_follow_upadd", "view_opd_follow_upadd", "<?php echo $view_opd_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_opd_follow_upadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_opd_follow_up_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_opd_follow_up_add->terminate();
?>