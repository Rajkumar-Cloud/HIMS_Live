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
$patient_prescription_edit = new patient_prescription_edit();

// Run the page
$patient_prescription_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpatient_prescriptionedit = currentForm = new ew.Form("fpatient_prescriptionedit", "edit");

// Validate form
fpatient_prescriptionedit.validate = function() {
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
		<?php if ($patient_prescription_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->id->caption(), $patient_prescription->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Reception->caption(), $patient_prescription->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientId->caption(), $patient_prescription->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientName->caption(), $patient_prescription->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Medicine->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Medicine->caption(), $patient_prescription->Medicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->M->caption(), $patient_prescription->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->A->caption(), $patient_prescription->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->N->Required) { ?>
			elm = this.getElements("x" + infix + "_N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->N->caption(), $patient_prescription->N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->NoOfDays->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfDays");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->NoOfDays->caption(), $patient_prescription->NoOfDays->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->PreRoute->Required) { ?>
			elm = this.getElements("x" + infix + "_PreRoute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PreRoute->caption(), $patient_prescription->PreRoute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->TimeOfTaking->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeOfTaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->TimeOfTaking->caption(), $patient_prescription->TimeOfTaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Type->caption(), $patient_prescription->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->mrnno->caption(), $patient_prescription->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Age->caption(), $patient_prescription->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Gender->caption(), $patient_prescription->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->profilePic->caption(), $patient_prescription->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Status->caption(), $patient_prescription->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreatedBy->caption(), $patient_prescription->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->CreateDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreateDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreateDateTime->caption(), $patient_prescription->CreateDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedBy->caption(), $patient_prescription->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_edit->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedDateTime->caption(), $patient_prescription->ModifiedDateTime->RequiredErrorMessage)) ?>");
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
fpatient_prescriptionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptionedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptionedit.lists["x_Medicine"] = <?php echo $patient_prescription_edit->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptionedit.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_edit->Medicine->lookupOptions()) ?>;
fpatient_prescriptionedit.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionedit.lists["x_PreRoute"] = <?php echo $patient_prescription_edit->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptionedit.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_edit->PreRoute->lookupOptions()) ?>;
fpatient_prescriptionedit.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionedit.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_edit->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptionedit.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_edit->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptionedit.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionedit.lists["x_Type"] = <?php echo $patient_prescription_edit->Type->Lookup->toClientList() ?>;
fpatient_prescriptionedit.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_edit->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptionedit.lists["x_Status"] = <?php echo $patient_prescription_edit->Status->Lookup->toClientList() ?>;
fpatient_prescriptionedit.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_edit->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_prescription_edit->showPageHeader(); ?>
<?php
$patient_prescription_edit->showMessage();
?>
<form name="fpatient_prescriptionedit" id="fpatient_prescriptionedit" class="<?php echo $patient_prescription_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_prescription_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_edit->IsModal ?>">
<?php if ($patient_prescription->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_prescription->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_prescription->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_prescription->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_prescription->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_prescription_id" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->id->caption() ?><?php echo ($patient_prescription->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->id->cellAttributes() ?>>
<span id="el_patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_prescription->id->CurrentValue) ?>">
<?php echo $patient_prescription->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_prescription_Reception" for="x_Reception" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Reception->caption() ?><?php echo ($patient_prescription->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<span id="el_patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php echo $patient_prescription->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_prescription_PatientId" for="x_PatientId" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->PatientId->caption() ?><?php echo ($patient_prescription->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<span id="el_patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php echo $patient_prescription->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_prescription_PatientName" for="x_PatientName" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->PatientName->caption() ?><?php echo ($patient_prescription->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<span id="el_patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_prescription->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label id="elh_patient_prescription_Medicine" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Medicine->caption() ?><?php echo ($patient_prescription->Medicine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<span id="el_patient_prescription_Medicine">
<?php
$wrkonchange = "" . trim(@$patient_prescription->Medicine->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine" class="text-nowrap" style="z-index: 8950">
	<div class="input-group mb-3">
		<input type="text" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?php echo RemoveHtml($patient_prescription->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo (($patient_prescription->Medicine->ReadOnly || $patient_prescription->Medicine->Disabled) ? " disabled" : "")?>><i class="fa fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?php echo HtmlEncode($patient_prescription->Medicine->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionedit.createAutoSuggest({"id":"x_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x_Medicine") ?>
</span>
<?php echo $patient_prescription->Medicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_patient_prescription_M" for="x_M" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->M->caption() ?><?php echo ($patient_prescription->M->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->M->cellAttributes() ?>>
<span id="el_patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
<?php echo $patient_prescription->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_patient_prescription_A" for="x_A" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->A->caption() ?><?php echo ($patient_prescription->A->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->A->cellAttributes() ?>>
<span id="el_patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
<?php echo $patient_prescription->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label id="elh_patient_prescription_N" for="x_N" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->N->caption() ?><?php echo ($patient_prescription->N->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->N->cellAttributes() ?>>
<span id="el_patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
<?php echo $patient_prescription->N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label id="elh_patient_prescription_NoOfDays" for="x_NoOfDays" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->NoOfDays->caption() ?><?php echo ($patient_prescription->NoOfDays->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<span id="el_patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
<?php echo $patient_prescription->NoOfDays->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label id="elh_patient_prescription_PreRoute" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->PreRoute->caption() ?><?php echo ($patient_prescription->PreRoute->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<span id="el_patient_prescription_PreRoute">
<?php
$wrkonchange = "" . trim(@$patient_prescription->PreRoute->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute" class="text-nowrap" style="z-index: 8900">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?php echo RemoveHtml($patient_prescription->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription->PreRoute->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription->PreRoute->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?php echo HtmlEncode($patient_prescription->PreRoute->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionedit.createAutoSuggest({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x_PreRoute") ?>
</span>
<?php echo $patient_prescription->PreRoute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label id="elh_patient_prescription_TimeOfTaking" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->TimeOfTaking->caption() ?><?php echo ($patient_prescription->TimeOfTaking->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<span id="el_patient_prescription_TimeOfTaking">
<?php
$wrkonchange = "" . trim(@$patient_prescription->TimeOfTaking->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$patient_prescription->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking" class="text-nowrap" style="z-index: 8890">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription->TimeOfTaking->editAttributes() ?>>
<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription->TimeOfTaking->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription->TimeOfTaking->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fpatient_prescriptionedit.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x_TimeOfTaking") ?>
</span>
<?php echo $patient_prescription->TimeOfTaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_patient_prescription_Type" for="x_Type" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Type->caption() ?><?php echo ($patient_prescription->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Type->cellAttributes() ?>>
<span id="el_patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x_Type") ?>
	</select>
</div>
</span>
<?php echo $patient_prescription->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_prescription_mrnno" for="x_mrnno" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->mrnno->caption() ?><?php echo ($patient_prescription->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<span id="el_patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php echo $patient_prescription->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_prescription_Age" for="x_Age" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Age->caption() ?><?php echo ($patient_prescription->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Age->cellAttributes() ?>>
<span id="el_patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
<?php echo $patient_prescription->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_prescription_Gender" for="x_Gender" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Gender->caption() ?><?php echo ($patient_prescription->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<span id="el_patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
<?php echo $patient_prescription->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_prescription_profilePic" for="x_profilePic" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->profilePic->caption() ?><?php echo ($patient_prescription->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<span id="el_patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_prescription->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_patient_prescription_Status" for="x_Status" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->Status->caption() ?><?php echo ($patient_prescription->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->Status->cellAttributes() ?>>
<span id="el_patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x_Status") ?>
</span>
<?php echo $patient_prescription->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_prescription_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->CreatedBy->caption() ?><?php echo ($patient_prescription->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<span id="el_patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
<?php echo $patient_prescription->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<div id="r_CreateDateTime" class="form-group row">
		<label id="elh_patient_prescription_CreateDateTime" for="x_CreateDateTime" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->CreateDateTime->caption() ?><?php echo ($patient_prescription->CreateDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
<?php echo $patient_prescription->CreateDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_prescription_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->ModifiedBy->caption() ?><?php echo ($patient_prescription->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $patient_prescription->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_patient_prescription_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription->ModifiedDateTime->caption() ?><?php echo ($patient_prescription->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
<?php echo $patient_prescription->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$patient_prescription_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_prescription_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_prescription_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$patient_prescription_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_edit->terminate();
?>