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
$patient_opd_follow_up_add = new patient_opd_follow_up_add();

// Run the page
$patient_opd_follow_up_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_opd_follow_upadd = currentForm = new ew.Form("fpatient_opd_follow_upadd", "add");

// Validate form
fpatient_opd_follow_upadd.validate = function() {
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
		<?php if ($patient_opd_follow_up_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Reception->caption(), $patient_opd_follow_up->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatID->caption(), $patient_opd_follow_up->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientId->caption(), $patient_opd_follow_up->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientName->caption(), $patient_opd_follow_up->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->MobileNumber->caption(), $patient_opd_follow_up->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->Telephone->Required) { ?>
			elm = this.getElements("x" + infix + "_Telephone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Telephone->caption(), $patient_opd_follow_up->Telephone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->mrnno->caption(), $patient_opd_follow_up->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Age->caption(), $patient_opd_follow_up->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Gender->caption(), $patient_opd_follow_up->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->profilePic->caption(), $patient_opd_follow_up->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->procedurenotes->Required) { ?>
			elm = this.getElements("x" + infix + "_procedurenotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->procedurenotes->caption(), $patient_opd_follow_up->procedurenotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->NextReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->NextReviewDate->caption(), $patient_opd_follow_up->NextReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NextReviewDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->NextReviewDate->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_add->ICSIAdvised->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIAdvised[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIAdvised->caption(), $patient_opd_follow_up->ICSIAdvised->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->DeliveryRegistered->Required) { ?>
			elm = this.getElements("x" + infix + "_DeliveryRegistered[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->DeliveryRegistered->caption(), $patient_opd_follow_up->DeliveryRegistered->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->EDD->Required) { ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->EDD->caption(), $patient_opd_follow_up->EDD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDD");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->EDD->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_add->SerologyPositive->Required) { ?>
			elm = this.getElements("x" + infix + "_SerologyPositive[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->SerologyPositive->caption(), $patient_opd_follow_up->SerologyPositive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->Allergy->Required) { ?>
			elm = this.getElements("x" + infix + "_Allergy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Allergy->caption(), $patient_opd_follow_up->Allergy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->status->caption(), $patient_opd_follow_up->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->createdby->caption(), $patient_opd_follow_up->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->createddatetime->caption(), $patient_opd_follow_up->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->LMP->Required) { ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->LMP->caption(), $patient_opd_follow_up->LMP->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LMP");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->LMP->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_add->Procedure->Required) { ?>
			elm = this.getElements("x" + infix + "_Procedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Procedure->caption(), $patient_opd_follow_up->Procedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->ProcedureDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ProcedureDateTime->caption(), $patient_opd_follow_up->ProcedureDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->ICSIDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->ICSIDate->caption(), $patient_opd_follow_up->ICSIDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ICSIDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_opd_follow_up->ICSIDate->errorMessage()) ?>");
		<?php if ($patient_opd_follow_up_add->PatientSearch->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientSearch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->PatientSearch->caption(), $patient_opd_follow_up->PatientSearch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->HospID->caption(), $patient_opd_follow_up->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->createdUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_createdUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->createdUserName->caption(), $patient_opd_follow_up->createdUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->TemplateDrNotes->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateDrNotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->TemplateDrNotes->caption(), $patient_opd_follow_up->TemplateDrNotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->reportheader->Required) { ?>
			elm = this.getElements("x" + infix + "_reportheader[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->reportheader->caption(), $patient_opd_follow_up->reportheader->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->Purpose->caption(), $patient_opd_follow_up->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_opd_follow_up_add->DrName->Required) { ?>
			elm = this.getElements("x" + infix + "_DrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_opd_follow_up->DrName->caption(), $patient_opd_follow_up->DrName->RequiredErrorMessage)) ?>");
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
fpatient_opd_follow_upadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_upadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_upadd.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_add->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_add->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upadd.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_add->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_add->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upadd.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_add->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_add->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upadd.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_add->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_add->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_upadd.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_upadd.lists["x_status"] = <?php echo $patient_opd_follow_up_add->status->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_add->status->lookupOptions()) ?>;
fpatient_opd_follow_upadd.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_add->PatientSearch->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_add->PatientSearch->lookupOptions()) ?>;
fpatient_opd_follow_upadd.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_add->TemplateDrNotes->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_add->TemplateDrNotes->lookupOptions()) ?>;
fpatient_opd_follow_upadd.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_add->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_add->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upadd.lists["x_DrName"] = <?php echo $patient_opd_follow_up_add->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_upadd.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_add->DrName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_opd_follow_up_add->showPageHeader(); ?>
<?php
$patient_opd_follow_up_add->showMessage();
?>
<form name="fpatient_opd_follow_upadd" id="fpatient_opd_follow_upadd" class="<?php echo $patient_opd_follow_up_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_opd_follow_up_Reception" for="x_Reception" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Reception" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Reception->caption() ?><?php echo ($patient_opd_follow_up->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Reception->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Reception" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Reception">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Reception->EditValue ?>"<?php echo $patient_opd_follow_up->Reception->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatID" for="x_PatID" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatID" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->PatID->caption() ?><?php echo ($patient_opd_follow_up->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatID->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatID" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_PatID">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatID->EditValue ?>"<?php echo $patient_opd_follow_up->PatID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatientId" for="x_PatientId" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatientId" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->PatientId->caption() ?><?php echo ($patient_opd_follow_up->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientId->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientId" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_PatientId">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientId->EditValue ?>"<?php echo $patient_opd_follow_up->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatientName" for="x_PatientName" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatientName" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->PatientName->caption() ?><?php echo ($patient_opd_follow_up->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientName" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_PatientName">
<input type="text" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->PatientName->EditValue ?>"<?php echo $patient_opd_follow_up->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_opd_follow_up_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->MobileNumber->caption() ?><?php echo ($patient_opd_follow_up->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_MobileNumber">
<input type="text" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->MobileNumber->EditValue ?>"<?php echo $patient_opd_follow_up->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<div id="r_Telephone" class="form-group row">
		<label id="elh_patient_opd_follow_up_Telephone" for="x_Telephone" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Telephone" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Telephone->caption() ?><?php echo ($patient_opd_follow_up->Telephone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Telephone->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Telephone" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Telephone">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Telephone->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Telephone->EditValue ?>"<?php echo $patient_opd_follow_up->Telephone->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->Telephone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_opd_follow_up_mrnno" for="x_mrnno" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_mrnno" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->mrnno->caption() ?><?php echo ($patient_opd_follow_up->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->mrnno->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_mrnno" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_mrnno">
<input type="text" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->mrnno->EditValue ?>"<?php echo $patient_opd_follow_up->mrnno->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_opd_follow_up_Age" for="x_Age" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Age" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Age->caption() ?><?php echo ($patient_opd_follow_up->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Age->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Age" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Age">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Age->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Age->EditValue ?>"<?php echo $patient_opd_follow_up->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_opd_follow_up_Gender" for="x_Gender" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Gender" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Gender->caption() ?><?php echo ($patient_opd_follow_up->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Gender" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Gender">
<input type="text" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->Gender->EditValue ?>"<?php echo $patient_opd_follow_up->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_opd_follow_up_profilePic" for="x_profilePic" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_profilePic" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->profilePic->caption() ?><?php echo ($patient_opd_follow_up->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->profilePic->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_profilePic" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_profilePic">
<textarea data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->profilePic->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->profilePic->editAttributes() ?>><?php echo $patient_opd_follow_up->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_opd_follow_up->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<div id="r_procedurenotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_procedurenotes" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->procedurenotes->caption() ?><?php echo ($patient_opd_follow_up->procedurenotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_procedurenotes">
<?php AppendClass($patient_opd_follow_up->procedurenotes->EditAttrs["class"], "editor"); ?>
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="22" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->procedurenotes->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->procedurenotes->editAttributes() ?>><?php echo $patient_opd_follow_up->procedurenotes->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createEditor("fpatient_opd_follow_upadd", "x_procedurenotes", 35, 22, <?php echo ($patient_opd_follow_up->procedurenotes->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $patient_opd_follow_up->procedurenotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<div id="r_NextReviewDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?><?php echo ($patient_opd_follow_up->NextReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_NextReviewDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->NextReviewDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->NextReviewDate->EditValue ?>"<?php echo $patient_opd_follow_up->NextReviewDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->NextReviewDate->ReadOnly && !$patient_opd_follow_up->NextReviewDate->Disabled && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->NextReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->NextReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<div id="r_ICSIAdvised" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIAdvised" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?><?php echo ($patient_opd_follow_up->ICSIAdvised->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_ICSIAdvised">
<div id="tp_x_ICSIAdvised" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" data-value-separator="<?php echo $patient_opd_follow_up->ICSIAdvised->displayValueSeparatorAttribute() ?>" name="x_ICSIAdvised[]" id="x_ICSIAdvised[]" value="{value}"<?php echo $patient_opd_follow_up->ICSIAdvised->editAttributes() ?>></div>
<div id="dsl_x_ICSIAdvised" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->ICSIAdvised->checkBoxListHtml(FALSE, "x_ICSIAdvised[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->ICSIAdvised->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<div id="r_DeliveryRegistered" class="form-group row">
		<label id="elh_patient_opd_follow_up_DeliveryRegistered" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?><?php echo ($patient_opd_follow_up->DeliveryRegistered->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<div id="tp_x_DeliveryRegistered" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" data-value-separator="<?php echo $patient_opd_follow_up->DeliveryRegistered->displayValueSeparatorAttribute() ?>" name="x_DeliveryRegistered[]" id="x_DeliveryRegistered[]" value="{value}"<?php echo $patient_opd_follow_up->DeliveryRegistered->editAttributes() ?>></div>
<div id="dsl_x_DeliveryRegistered" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->DeliveryRegistered->checkBoxListHtml(FALSE, "x_DeliveryRegistered[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->DeliveryRegistered->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<div id="r_EDD" class="form-group row">
		<label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_EDD" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->EDD->caption() ?><?php echo ($patient_opd_follow_up->EDD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_EDD" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_EDD">
<input type="text" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->EDD->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->EDD->EditValue ?>"<?php echo $patient_opd_follow_up->EDD->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->EDD->ReadOnly && !$patient_opd_follow_up->EDD->Disabled && !isset($patient_opd_follow_up->EDD->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->EDD->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->EDD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<div id="r_SerologyPositive" class="form-group row">
		<label id="elh_patient_opd_follow_up_SerologyPositive" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?><?php echo ($patient_opd_follow_up->SerologyPositive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_SerologyPositive">
<div id="tp_x_SerologyPositive" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" data-value-separator="<?php echo $patient_opd_follow_up->SerologyPositive->displayValueSeparatorAttribute() ?>" name="x_SerologyPositive[]" id="x_SerologyPositive[]" value="{value}"<?php echo $patient_opd_follow_up->SerologyPositive->editAttributes() ?>></div>
<div id="dsl_x_SerologyPositive" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->SerologyPositive->checkBoxListHtml(FALSE, "x_SerologyPositive[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->SerologyPositive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<div id="r_Allergy" class="form-group row">
		<label id="elh_patient_opd_follow_up_Allergy" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Allergy" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Allergy->caption() ?><?php echo ($patient_opd_follow_up->Allergy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Allergy" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Allergy">
<?php
$wrkonchange = "" . trim(@$patient_opd_follow_up->Allergy->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_opd_follow_up->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="text-nowrap" style="z-index: 8820">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?php echo RemoveHtml($patient_opd_follow_up->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Allergy->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->Allergy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->Allergy->ReadOnly || $patient_opd_follow_up->Allergy->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_Allergy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?php echo HtmlEncode($patient_opd_follow_up->Allergy->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $patient_opd_follow_up->Allergy->Lookup->getParamTag("p_x_Allergy") ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
fpatient_opd_follow_upadd.createAutoSuggest({"id":"x_Allergy","forceSelect":false});
</script>
<?php echo $patient_opd_follow_up->Allergy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_opd_follow_up_status" for="x_status" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_status" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->status->caption() ?><?php echo ($patient_opd_follow_up->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_status" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_status" data-value-separator="<?php echo $patient_opd_follow_up->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $patient_opd_follow_up->status->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->status->selectOptionListHtml("x_status") ?>
	</select>
</div>
<?php echo $patient_opd_follow_up->status->Lookup->getParamTag("p_x_status") ?>
</span>
</script>
<?php echo $patient_opd_follow_up->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<div id="r_LMP" class="form-group row">
		<label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_LMP" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->LMP->caption() ?><?php echo ($patient_opd_follow_up->LMP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_LMP" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_LMP">
<input type="text" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->LMP->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->LMP->EditValue ?>"<?php echo $patient_opd_follow_up->LMP->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->LMP->ReadOnly && !$patient_opd_follow_up->LMP->Disabled && !isset($patient_opd_follow_up->LMP->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->LMP->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->LMP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<div id="r_Procedure" class="form-group row">
		<label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Procedure" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Procedure->caption() ?><?php echo ($patient_opd_follow_up->Procedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Procedure->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Procedure" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Procedure->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Procedure->editAttributes() ?>><?php echo $patient_opd_follow_up->Procedure->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_opd_follow_up->Procedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<div id="r_ProcedureDateTime" class="form-group row">
		<label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?><?php echo ($patient_opd_follow_up->ProcedureDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ProcedureDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ProcedureDateTime->EditValue ?>"<?php echo $patient_opd_follow_up->ProcedureDateTime->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ProcedureDateTime->ReadOnly && !$patient_opd_follow_up->ProcedureDateTime->Disabled && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $patient_opd_follow_up->ProcedureDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<div id="r_ICSIDate" class="form-group row">
		<label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIDate->caption() ?><?php echo ($patient_opd_follow_up->ICSIDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_ICSIDate">
<input type="text" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->ICSIDate->getPlaceHolder()) ?>" value="<?php echo $patient_opd_follow_up->ICSIDate->EditValue ?>"<?php echo $patient_opd_follow_up->ICSIDate->editAttributes() ?>>
<?php if (!$patient_opd_follow_up->ICSIDate->ReadOnly && !$patient_opd_follow_up->ICSIDate->Disabled && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["readonly"]) && !isset($patient_opd_follow_up->ICSIDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_opd_follow_upadd_js">
ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php echo $patient_opd_follow_up->ICSIDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<div id="r_PatientSearch" class="form-group row">
		<label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->PatientSearch->caption() ?><?php echo ($patient_opd_follow_up->PatientSearch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_PatientSearch">
<?php $patient_opd_follow_up->PatientSearch->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_opd_follow_up->PatientSearch->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?php echo strval($patient_opd_follow_up->PatientSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->PatientSearch->ViewValue) : $patient_opd_follow_up->PatientSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->PatientSearch->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->PatientSearch->ReadOnly || $patient_opd_follow_up->PatientSearch->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->PatientSearch->Lookup->getParamTag("p_x_PatientSearch") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?php echo $patient_opd_follow_up->PatientSearch->CurrentValue ?>"<?php echo $patient_opd_follow_up->PatientSearch->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->PatientSearch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<div id="r_TemplateDrNotes" class="form-group row">
		<label id="elh_patient_opd_follow_up_TemplateDrNotes" for="x_TemplateDrNotes" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?><?php echo ($patient_opd_follow_up->TemplateDrNotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->TemplateDrNotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_TemplateDrNotes">
<?php $patient_opd_follow_up->TemplateDrNotes->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_opd_follow_up->TemplateDrNotes->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_opd_follow_up" data-field="x_TemplateDrNotes" data-value-separator="<?php echo $patient_opd_follow_up->TemplateDrNotes->displayValueSeparatorAttribute() ?>" id="x_TemplateDrNotes" name="x_TemplateDrNotes"<?php echo $patient_opd_follow_up->TemplateDrNotes->editAttributes() ?>>
		<?php echo $patient_opd_follow_up->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$patient_opd_follow_up->TemplateDrNotes->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDrNotes" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_opd_follow_up->TemplateDrNotes->caption() ?>" data-title="<?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDrNotes',url:'mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $patient_opd_follow_up->TemplateDrNotes->Lookup->getParamTag("p_x_TemplateDrNotes") ?>
</span>
</script>
<?php echo $patient_opd_follow_up->TemplateDrNotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
	<div id="r_reportheader" class="form-group row">
		<label id="elh_patient_opd_follow_up_reportheader" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_reportheader" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->reportheader->caption() ?><?php echo ($patient_opd_follow_up->reportheader->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_reportheader" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_reportheader">
<div id="tp_x_reportheader" class="ew-template"><input type="checkbox" class="form-check-input" data-table="patient_opd_follow_up" data-field="x_reportheader" data-value-separator="<?php echo $patient_opd_follow_up->reportheader->displayValueSeparatorAttribute() ?>" name="x_reportheader[]" id="x_reportheader[]" value="{value}"<?php echo $patient_opd_follow_up->reportheader->editAttributes() ?>></div>
<div id="dsl_x_reportheader" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_opd_follow_up->reportheader->checkBoxListHtml(FALSE, "x_reportheader[]") ?>
</div></div>
</span>
</script>
<?php echo $patient_opd_follow_up->reportheader->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->Purpose->Visible) { // Purpose ?>
	<div id="r_Purpose" class="form-group row">
		<label id="elh_patient_opd_follow_up_Purpose" for="x_Purpose" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_Purpose" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->Purpose->caption() ?><?php echo ($patient_opd_follow_up->Purpose->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->Purpose->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Purpose" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_Purpose">
<textarea data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_opd_follow_up->Purpose->getPlaceHolder()) ?>"<?php echo $patient_opd_follow_up->Purpose->editAttributes() ?>><?php echo $patient_opd_follow_up->Purpose->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_opd_follow_up->Purpose->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
	<div id="r_DrName" class="form-group row">
		<label id="elh_patient_opd_follow_up_DrName" for="x_DrName" class="<?php echo $patient_opd_follow_up_add->LeftColumnClass ?>"><script id="tpc_patient_opd_follow_up_DrName" class="patient_opd_follow_upadd" type="text/html"><span><?php echo $patient_opd_follow_up->DrName->caption() ?><?php echo ($patient_opd_follow_up->DrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_opd_follow_up_add->RightColumnClass ?>"><div<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DrName" class="patient_opd_follow_upadd" type="text/html">
<span id="el_patient_opd_follow_up_DrName">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?php echo strval($patient_opd_follow_up->DrName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_opd_follow_up->DrName->ViewValue) : $patient_opd_follow_up->DrName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_opd_follow_up->DrName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_opd_follow_up->DrName->ReadOnly || $patient_opd_follow_up->DrName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_opd_follow_up->DrName->Lookup->getParamTag("p_x_DrName") ?>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_DrName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_opd_follow_up->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?php echo $patient_opd_follow_up->DrName->CurrentValue ?>"<?php echo $patient_opd_follow_up->DrName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_opd_follow_up->DrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_opd_follow_upadd" class="ew-custom-template"></div>
<script id="tpm_patient_opd_follow_upadd" type="text/html">
<div id="ct_patient_opd_follow_up_add"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
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
{{include tmpl="#tpc_patient_opd_follow_up_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientSearch"/}}	
{{include tmpl="#tpc_patient_opd_follow_up_reportheader"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_reportheader"/}}
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr;
}
?>
<div hidden class="row">
{{include tmpl="#tpc_patient_opd_follow_up_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Reception"/}}
{{include tmpl="#tpc_patient_opd_follow_up_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientId"/}}
{{include tmpl="#tpc_patient_opd_follow_up_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_mrnno"/}}
{{include tmpl="#tpc_patient_opd_follow_up_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatientName"/}}
{{include tmpl="#tpc_patient_opd_follow_up_Age"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Age"/}}
{{include tmpl="#tpc_patient_opd_follow_up_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Gender"/}}
{{include tmpl="#tpc_patient_opd_follow_up_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_profilePic"/}}
{{include tmpl="#tpc_patient_opd_follow_up_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_PatID"/}}
{{include tmpl="#tpc_patient_opd_follow_up_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_MobileNumber"/}}
</div>
<div class="row">
		 <div class="col-lg-8">
			<div class="card">             
			  <div class="card-body">
				<div id="iidprocedurenotes" class="direct-chat-messages">
				</div>
					  </div>
					</div>
					<!-- /.card -->              
				</div>
				<div class="col-lg-4">
					<div class="card">             
					  <div class="card-body">
			   <div id="iidICSIDate" class="direct-chat-messages">
				</div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
{{include tmpl="#tpc_patient_opd_follow_up_TemplateDrNotes"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_TemplateDrNotes"/}}
</div>		  
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_procedurenotes"/}}
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
			  <div class="row">
			  <div class="col-lg-4">
			  		{{include tmpl="#tpc_patient_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_NextReviewDate"/}}
			  </div>
			  <div class="col-lg-4">
			   		{{include tmpl="#tpc_patient_opd_follow_up_Purpose"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Purpose"/}}
			   </div>
			   <div class="col-lg-4">
			   		{{include tmpl="#tpc_patient_opd_follow_up_DrName"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_DrName"/}}
			   </div>
			   </div>
			   <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Procedure"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Procedure"/}} <br>
			      {{include tmpl="#tpc_patient_opd_follow_up_ProcedureDateTime"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ProcedureDateTime"/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_SerologyPositive"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_SerologyPositive"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_Allergy"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_Allergy"/}} <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIAdvised"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ICSIAdvised"/}} <br>
			  			  {{include tmpl="#tpc_patient_opd_follow_up_ICSIDate"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_ICSIDate"/}} <br>
			   {{include tmpl="#tpc_patient_opd_follow_up_DeliveryRegistered"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_DeliveryRegistered"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_LMP"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_LMP"/}} <br>
			    {{include tmpl="#tpc_patient_opd_follow_up_EDD"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_EDD"/}} <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>
<?php
	if (in_array("patient_an_registration", explode(",", $patient_opd_follow_up->getCurrentDetailTable())) && $patient_an_registration->DetailAdd) {
?>
<?php if ($patient_opd_follow_up->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_an_registrationgrid.php" ?>
<?php } ?>
<?php if (!$patient_opd_follow_up_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_opd_follow_up_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_opd_follow_up_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_opd_follow_up->Rows) ?> };
ew.applyTemplate("tpd_patient_opd_follow_upadd", "tpm_patient_opd_follow_upadd", "patient_opd_follow_upadd", "<?php echo $patient_opd_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_opd_follow_upadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_opd_follow_up_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_add->terminate();
?>