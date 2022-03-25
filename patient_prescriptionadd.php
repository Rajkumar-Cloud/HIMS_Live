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
$patient_prescription_add = new patient_prescription_add();

// Run the page
$patient_prescription_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_prescriptionadd = currentForm = new ew.Form("fpatient_prescriptionadd", "add");

// Validate form
fpatient_prescriptionadd.validate = function() {
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
		<?php if ($patient_prescription_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Reception->caption(), $patient_prescription->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_prescription->Reception->errorMessage()) ?>");
		<?php if ($patient_prescription_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientId->caption(), $patient_prescription->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_prescription->PatientId->errorMessage()) ?>");
		<?php if ($patient_prescription_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PatientName->caption(), $patient_prescription->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->Medicine->Required) { ?>
			elm = this.getElements("x" + infix + "_Medicine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Medicine->caption(), $patient_prescription->Medicine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->M->Required) { ?>
			elm = this.getElements("x" + infix + "_M");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->M->caption(), $patient_prescription->M->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->A->Required) { ?>
			elm = this.getElements("x" + infix + "_A");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->A->caption(), $patient_prescription->A->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->N->Required) { ?>
			elm = this.getElements("x" + infix + "_N");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->N->caption(), $patient_prescription->N->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->NoOfDays->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfDays");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->NoOfDays->caption(), $patient_prescription->NoOfDays->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->PreRoute->Required) { ?>
			elm = this.getElements("x" + infix + "_PreRoute");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->PreRoute->caption(), $patient_prescription->PreRoute->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->TimeOfTaking->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeOfTaking");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->TimeOfTaking->caption(), $patient_prescription->TimeOfTaking->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Type->caption(), $patient_prescription->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->mrnno->caption(), $patient_prescription->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Age->caption(), $patient_prescription->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Gender->caption(), $patient_prescription->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->profilePic->Required) { ?>
			elm = this.getElements("x" + infix + "_profilePic");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->profilePic->caption(), $patient_prescription->profilePic->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->Status->Required) { ?>
			elm = this.getElements("x" + infix + "_Status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->Status->caption(), $patient_prescription->Status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreatedBy->caption(), $patient_prescription->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->CreateDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreateDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->CreateDateTime->caption(), $patient_prescription->CreateDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription->ModifiedBy->caption(), $patient_prescription->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_prescription_add->ModifiedDateTime->Required) { ?>
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
fpatient_prescriptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptionadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptionadd.lists["x_Medicine"] = <?php echo $patient_prescription_add->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptionadd.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_add->Medicine->lookupOptions()) ?>;
fpatient_prescriptionadd.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionadd.lists["x_PreRoute"] = <?php echo $patient_prescription_add->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptionadd.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_add->PreRoute->lookupOptions()) ?>;
fpatient_prescriptionadd.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionadd.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_add->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptionadd.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_add->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptionadd.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionadd.lists["x_Type"] = <?php echo $patient_prescription_add->Type->Lookup->toClientList() ?>;
fpatient_prescriptionadd.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_add->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptionadd.lists["x_Status"] = <?php echo $patient_prescription_add->Status->Lookup->toClientList() ?>;
fpatient_prescriptionadd.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_add->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_prescription_add->showPageHeader(); ?>
<?php
$patient_prescription_add->showMessage();
?>
<form name="fpatient_prescriptionadd" id="fpatient_prescriptionadd" class="<?php echo $patient_prescription_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_prescription_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_add->IsModal ?>">
<?php if ($patient_prescription->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_prescription->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_prescription->PatientId->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_prescription->mrnno->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_prescription_Reception" for="x_Reception" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Reception" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Reception->caption() ?><?php echo ($patient_prescription->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<?php if ($patient_prescription->Reception->getSessionValue() <> "") { ?>
<script id="tpx_patient_prescription_Reception" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_prescription->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_prescription_Reception" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Reception">
<input type="text" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Reception->EditValue ?>"<?php echo $patient_prescription->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_prescription->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_prescription_PatientId" for="x_PatientId" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_PatientId" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->PatientId->caption() ?><?php echo ($patient_prescription->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<?php if ($patient_prescription->PatientId->getSessionValue() <> "") { ?>
<script id="tpx_patient_prescription_PatientId" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->PatientId->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?php echo HtmlEncode($patient_prescription->PatientId->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_prescription_PatientId" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_PatientId">
<input type="text" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_prescription->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientId->EditValue ?>"<?php echo $patient_prescription->PatientId->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_prescription->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_prescription_PatientName" for="x_PatientName" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_PatientName" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->PatientName->caption() ?><?php echo ($patient_prescription->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<script id="tpx_patient_prescription_PatientName" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->PatientName->EditValue ?>"<?php echo $patient_prescription->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label id="elh_patient_prescription_Medicine" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Medicine" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Medicine->caption() ?><?php echo ($patient_prescription->Medicine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<script id="tpx_patient_prescription_Medicine" class="patient_prescriptionadd" type="text/html">
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
<?php echo $patient_prescription->Medicine->Lookup->getParamTag("p_x_Medicine") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionadd_js">
fpatient_prescriptionadd.createAutoSuggest({"id":"x_Medicine","forceSelect":false});
</script>
<?php echo $patient_prescription->Medicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_patient_prescription_M" for="x_M" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_M" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->M->caption() ?><?php echo ($patient_prescription->M->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->M->cellAttributes() ?>>
<script id="tpx_patient_prescription_M" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->M->EditValue ?>"<?php echo $patient_prescription->M->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_patient_prescription_A" for="x_A" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_A" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->A->caption() ?><?php echo ($patient_prescription->A->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->A->cellAttributes() ?>>
<script id="tpx_patient_prescription_A" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->A->EditValue ?>"<?php echo $patient_prescription->A->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label id="elh_patient_prescription_N" for="x_N" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_N" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->N->caption() ?><?php echo ($patient_prescription->N->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->N->cellAttributes() ?>>
<script id="tpx_patient_prescription_N" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->N->EditValue ?>"<?php echo $patient_prescription->N->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label id="elh_patient_prescription_NoOfDays" for="x_NoOfDays" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_NoOfDays" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->NoOfDays->caption() ?><?php echo ($patient_prescription->NoOfDays->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<script id="tpx_patient_prescription_NoOfDays" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->NoOfDays->EditValue ?>"<?php echo $patient_prescription->NoOfDays->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->NoOfDays->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label id="elh_patient_prescription_PreRoute" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_PreRoute" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->PreRoute->caption() ?><?php echo ($patient_prescription->PreRoute->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<script id="tpx_patient_prescription_PreRoute" class="patient_prescriptionadd" type="text/html">
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
<?php echo $patient_prescription->PreRoute->Lookup->getParamTag("p_x_PreRoute") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionadd_js">
fpatient_prescriptionadd.createAutoSuggest({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
</script>
<?php echo $patient_prescription->PreRoute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label id="elh_patient_prescription_TimeOfTaking" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_TimeOfTaking" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->TimeOfTaking->caption() ?><?php echo ($patient_prescription->TimeOfTaking->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<script id="tpx_patient_prescription_TimeOfTaking" class="patient_prescriptionadd" type="text/html">
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
<?php echo $patient_prescription->TimeOfTaking->Lookup->getParamTag("p_x_TimeOfTaking") ?>
</span>
</script>
<script type="text/html" class="patient_prescriptionadd_js">
fpatient_prescriptionadd.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
</script>
<?php echo $patient_prescription->TimeOfTaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_patient_prescription_Type" for="x_Type" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Type" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Type->caption() ?><?php echo ($patient_prescription->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Type->cellAttributes() ?>>
<script id="tpx_patient_prescription_Type" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $patient_prescription->Type->editAttributes() ?>>
		<?php echo $patient_prescription->Type->selectOptionListHtml("x_Type") ?>
	</select>
</div>
</span>
</script>
<?php echo $patient_prescription->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_prescription_mrnno" for="x_mrnno" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_mrnno" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->mrnno->caption() ?><?php echo ($patient_prescription->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<?php if ($patient_prescription->mrnno->getSessionValue() <> "") { ?>
<script id="tpx_patient_prescription_mrnno" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_prescription->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_prescription->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_prescription_mrnno" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_mrnno">
<input type="text" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->mrnno->EditValue ?>"<?php echo $patient_prescription->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_prescription->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_prescription_Age" for="x_Age" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Age" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Age->caption() ?><?php echo ($patient_prescription->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Age->cellAttributes() ?>>
<script id="tpx_patient_prescription_Age" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Age->EditValue ?>"<?php echo $patient_prescription->Age->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_prescription_Gender" for="x_Gender" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Gender" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Gender->caption() ?><?php echo ($patient_prescription->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<script id="tpx_patient_prescription_Gender" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->Gender->EditValue ?>"<?php echo $patient_prescription->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_prescription_profilePic" for="x_profilePic" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_profilePic" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->profilePic->caption() ?><?php echo ($patient_prescription->profilePic->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<script id="tpx_patient_prescription_profilePic" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription->profilePic->editAttributes() ?>><?php echo $patient_prescription->profilePic->EditValue ?></textarea>
</span>
</script>
<?php echo $patient_prescription->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_patient_prescription_Status" for="x_Status" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_Status" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->Status->caption() ?><?php echo ($patient_prescription->Status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->Status->cellAttributes() ?>>
<script id="tpx_patient_prescription_Status" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $patient_prescription->Status->editAttributes() ?>>
		<?php echo $patient_prescription->Status->selectOptionListHtml("x_Status") ?>
	</select>
</div>
<?php echo $patient_prescription->Status->Lookup->getParamTag("p_x_Status") ?>
</span>
</script>
<?php echo $patient_prescription->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_prescription_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_CreatedBy" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->CreatedBy->caption() ?><?php echo ($patient_prescription->CreatedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<script id="tpx_patient_prescription_CreatedBy" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreatedBy->EditValue ?>"<?php echo $patient_prescription->CreatedBy->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<div id="r_CreateDateTime" class="form-group row">
		<label id="elh_patient_prescription_CreateDateTime" for="x_CreateDateTime" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_CreateDateTime" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->CreateDateTime->caption() ?><?php echo ($patient_prescription->CreateDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<script id="tpx_patient_prescription_CreateDateTime" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->CreateDateTime->EditValue ?>"<?php echo $patient_prescription->CreateDateTime->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->CreateDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_prescription_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_ModifiedBy" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->ModifiedBy->caption() ?><?php echo ($patient_prescription->ModifiedBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<script id="tpx_patient_prescription_ModifiedBy" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedBy->EditValue ?>"<?php echo $patient_prescription->ModifiedBy->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_patient_prescription_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $patient_prescription_add->LeftColumnClass ?>"><script id="tpc_patient_prescription_ModifiedDateTime" class="patient_prescriptionadd" type="text/html"><span><?php echo $patient_prescription->ModifiedDateTime->caption() ?><?php echo ($patient_prescription->ModifiedDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_prescription_add->RightColumnClass ?>"><div<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_patient_prescription_ModifiedDateTime" class="patient_prescriptionadd" type="text/html">
<span id="el_patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription->ModifiedDateTime->editAttributes() ?>>
</span>
</script>
<?php echo $patient_prescription->ModifiedDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_prescriptionadd" class="ew-custom-template"></div>
<script id="tpm_patient_prescriptionadd" type="text/html">
<div id="ct_patient_prescription_add"><style>
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
</style>
	<?php
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
	?>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_prescription_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h4 class="widget-user-desc"><span class="ew-cell">Patient Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2"  src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">{{include tmpl="#tpc_patient_prescription_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_mrnno"/}}</span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Gender : <?php echo $results1[0]["gender"]; ?></h5>
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
		  <tr>
	 <td>{{include tmpl="#tpc_patient_prescription_Medicine"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_Medicine"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_M"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_M"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_A"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_A"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_N"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_N"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_NoOfDays"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_NoOfDays"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_PreRoute"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_PreRoute"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_TimeOfTaking"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_TimeOfTaking"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_Type"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_Type"/}}</td>
	 <td>{{include tmpl="#tpc_patient_prescription_Status"/}}&nbsp;{{include tmpl="#tpx_patient_prescription_Status"/}}</td>
</tr>
</div>
</script>
<?php if (!$patient_prescription_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_prescription_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_prescription_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_prescription->Rows) ?> };
ew.applyTemplate("tpd_patient_prescriptionadd", "tpm_patient_prescriptionadd", "patient_prescriptionadd", "<?php echo $patient_prescription->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_prescriptionadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_prescription_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

 var c = document.getElementById("el_patient_prescription_profilePic").children;
 var d = c[0].children;
 var evalue = c[0].innerText;

 //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
</script>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_add->terminate();
?>