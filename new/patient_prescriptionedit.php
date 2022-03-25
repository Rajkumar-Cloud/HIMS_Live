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
<?php include_once "header.php"; ?>
<script>
var fpatient_prescriptionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_prescriptionedit = currentForm = new ew.Form("fpatient_prescriptionedit", "edit");

	// Validate form
	fpatient_prescriptionedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->id->caption(), $patient_prescription_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Reception->caption(), $patient_prescription_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->PatientId->caption(), $patient_prescription_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->PatientName->caption(), $patient_prescription_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Medicine->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Medicine->caption(), $patient_prescription_edit->Medicine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->M->caption(), $patient_prescription_edit->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->A->caption(), $patient_prescription_edit->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->N->Required) { ?>
				elm = this.getElements("x" + infix + "_N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->N->caption(), $patient_prescription_edit->N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->NoOfDays->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfDays");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->NoOfDays->caption(), $patient_prescription_edit->NoOfDays->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->PreRoute->Required) { ?>
				elm = this.getElements("x" + infix + "_PreRoute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->PreRoute->caption(), $patient_prescription_edit->PreRoute->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->TimeOfTaking->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeOfTaking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->TimeOfTaking->caption(), $patient_prescription_edit->TimeOfTaking->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Type->Required) { ?>
				elm = this.getElements("x" + infix + "_Type");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Type->caption(), $patient_prescription_edit->Type->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->mrnno->caption(), $patient_prescription_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Age->caption(), $patient_prescription_edit->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Gender->caption(), $patient_prescription_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->profilePic->Required) { ?>
				elm = this.getElements("x" + infix + "_profilePic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->profilePic->caption(), $patient_prescription_edit->profilePic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->Status->caption(), $patient_prescription_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->CreatedBy->caption(), $patient_prescription_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->CreateDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreateDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->CreateDateTime->caption(), $patient_prescription_edit->CreateDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->ModifiedBy->caption(), $patient_prescription_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_prescription_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_prescription_edit->ModifiedDateTime->caption(), $patient_prescription_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_prescriptionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_prescriptionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_prescriptionedit.lists["x_Medicine"] = <?php echo $patient_prescription_edit->Medicine->Lookup->toClientList($patient_prescription_edit) ?>;
	fpatient_prescriptionedit.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_edit->Medicine->lookupOptions()) ?>;
	fpatient_prescriptionedit.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionedit.lists["x_PreRoute"] = <?php echo $patient_prescription_edit->PreRoute->Lookup->toClientList($patient_prescription_edit) ?>;
	fpatient_prescriptionedit.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_edit->PreRoute->lookupOptions()) ?>;
	fpatient_prescriptionedit.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionedit.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_edit->TimeOfTaking->Lookup->toClientList($patient_prescription_edit) ?>;
	fpatient_prescriptionedit.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_edit->TimeOfTaking->lookupOptions()) ?>;
	fpatient_prescriptionedit.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_prescriptionedit.lists["x_Type"] = <?php echo $patient_prescription_edit->Type->Lookup->toClientList($patient_prescription_edit) ?>;
	fpatient_prescriptionedit.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_edit->Type->options(FALSE, TRUE)) ?>;
	fpatient_prescriptionedit.lists["x_Status"] = <?php echo $patient_prescription_edit->Status->Lookup->toClientList($patient_prescription_edit) ?>;
	fpatient_prescriptionedit.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_edit->Status->lookupOptions()) ?>;
	loadjs.done("fpatient_prescriptionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_prescription_edit->showPageHeader(); ?>
<?php
$patient_prescription_edit->showMessage();
?>
<form name="fpatient_prescriptionedit" id="fpatient_prescriptionedit" class="<?php echo $patient_prescription_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_edit->IsModal ?>">
<?php if ($patient_prescription->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_prescription_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_prescription_edit->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_prescription_edit->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($patient_prescription_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_prescription_id" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->id->caption() ?><?php echo $patient_prescription_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->id->cellAttributes() ?>>
<span id="el_patient_prescription_id">
<span<?php echo $patient_prescription_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_prescription_edit->id->CurrentValue) ?>">
<?php echo $patient_prescription_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_prescription_Reception" for="x_Reception" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Reception->caption() ?><?php echo $patient_prescription_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Reception->cellAttributes() ?>>
<span id="el_patient_prescription_Reception">
<span<?php echo $patient_prescription_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_edit->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_prescription_edit->Reception->CurrentValue) ?>">
<?php echo $patient_prescription_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_prescription_PatientId" for="x_PatientId" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->PatientId->caption() ?><?php echo $patient_prescription_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->PatientId->cellAttributes() ?>>
<span id="el_patient_prescription_PatientId">
<span<?php echo $patient_prescription_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_edit->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_prescription_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_prescription_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_prescription_PatientName" for="x_PatientName" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->PatientName->caption() ?><?php echo $patient_prescription_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->PatientName->cellAttributes() ?>>
<span id="el_patient_prescription_PatientName">
<input type="text" data-table="patient_prescription" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->PatientName->EditValue ?>"<?php echo $patient_prescription_edit->PatientName->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label id="elh_patient_prescription_Medicine" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Medicine->caption() ?><?php echo $patient_prescription_edit->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Medicine->cellAttributes() ?>>
<span id="el_patient_prescription_Medicine">
<?php
$onchange = $patient_prescription_edit->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_edit->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?php echo RemoveHtml($patient_prescription_edit->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_edit->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_edit->Medicine->getPlaceHolder()) ?>"<?php echo $patient_prescription_edit->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_prescription_edit->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_prescription_edit->Medicine->ReadOnly || $patient_prescription_edit->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_prescription_edit->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?php echo HtmlEncode($patient_prescription_edit->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptionedit"], function() {
	fpatient_prescriptionedit.createAutoSuggest({"id":"x_Medicine","forceSelect":false});
});
</script>
<?php echo $patient_prescription_edit->Medicine->Lookup->getParamTag($patient_prescription_edit, "p_x_Medicine") ?>
</span>
<?php echo $patient_prescription_edit->Medicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_patient_prescription_M" for="x_M" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->M->caption() ?><?php echo $patient_prescription_edit->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->M->cellAttributes() ?>>
<span id="el_patient_prescription_M">
<input type="text" data-table="patient_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_edit->M->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->M->EditValue ?>"<?php echo $patient_prescription_edit->M->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_patient_prescription_A" for="x_A" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->A->caption() ?><?php echo $patient_prescription_edit->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->A->cellAttributes() ?>>
<span id="el_patient_prescription_A">
<input type="text" data-table="patient_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_edit->A->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->A->EditValue ?>"<?php echo $patient_prescription_edit->A->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label id="elh_patient_prescription_N" for="x_N" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->N->caption() ?><?php echo $patient_prescription_edit->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->N->cellAttributes() ?>>
<span id="el_patient_prescription_N">
<input type="text" data-table="patient_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="30" placeholder="<?php echo HtmlEncode($patient_prescription_edit->N->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->N->EditValue ?>"<?php echo $patient_prescription_edit->N->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label id="elh_patient_prescription_NoOfDays" for="x_NoOfDays" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->NoOfDays->caption() ?><?php echo $patient_prescription_edit->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->NoOfDays->cellAttributes() ?>>
<span id="el_patient_prescription_NoOfDays">
<input type="text" data-table="patient_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->NoOfDays->EditValue ?>"<?php echo $patient_prescription_edit->NoOfDays->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->NoOfDays->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label id="elh_patient_prescription_PreRoute" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->PreRoute->caption() ?><?php echo $patient_prescription_edit->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->PreRoute->cellAttributes() ?>>
<span id="el_patient_prescription_PreRoute">
<?php
$onchange = $patient_prescription_edit->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_edit->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?php echo RemoveHtml($patient_prescription_edit->PreRoute->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_edit->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_edit->PreRoute->getPlaceHolder()) ?>"<?php echo $patient_prescription_edit->PreRoute->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$patient_prescription_edit->PreRoute->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_edit->PreRoute->caption() ?>" data-title="<?php echo $patient_prescription_edit->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-value-separator="<?php echo $patient_prescription_edit->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?php echo HtmlEncode($patient_prescription_edit->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptionedit"], function() {
	fpatient_prescriptionedit.createAutoSuggest({"id":"x_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"});
});
</script>
<?php echo $patient_prescription_edit->PreRoute->Lookup->getParamTag($patient_prescription_edit, "p_x_PreRoute") ?>
</span>
<?php echo $patient_prescription_edit->PreRoute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label id="elh_patient_prescription_TimeOfTaking" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->TimeOfTaking->caption() ?><?php echo $patient_prescription_edit->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->TimeOfTaking->cellAttributes() ?>>
<span id="el_patient_prescription_TimeOfTaking">
<?php
$onchange = $patient_prescription_edit->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_prescription_edit->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?php echo RemoveHtml($patient_prescription_edit->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?php echo HtmlEncode($patient_prescription_edit->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_prescription_edit->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $patient_prescription_edit->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$patient_prescription_edit->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $patient_prescription_edit->TimeOfTaking->caption() ?>" data-title="<?php echo $patient_prescription_edit->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $patient_prescription_edit->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?php echo HtmlEncode($patient_prescription_edit->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_prescriptionedit"], function() {
	fpatient_prescriptionedit.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"});
});
</script>
<?php echo $patient_prescription_edit->TimeOfTaking->Lookup->getParamTag($patient_prescription_edit, "p_x_TimeOfTaking") ?>
</span>
<?php echo $patient_prescription_edit->TimeOfTaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_patient_prescription_Type" for="x_Type" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Type->caption() ?><?php echo $patient_prescription_edit->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Type->cellAttributes() ?>>
<span id="el_patient_prescription_Type">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Type" data-value-separator="<?php echo $patient_prescription_edit->Type->displayValueSeparatorAttribute() ?>" id="x_Type" name="x_Type"<?php echo $patient_prescription_edit->Type->editAttributes() ?>>
			<?php echo $patient_prescription_edit->Type->selectOptionListHtml("x_Type") ?>
		</select>
</div>
</span>
<?php echo $patient_prescription_edit->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_prescription_mrnno" for="x_mrnno" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->mrnno->caption() ?><?php echo $patient_prescription_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->mrnno->cellAttributes() ?>>
<span id="el_patient_prescription_mrnno">
<span<?php echo $patient_prescription_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_prescription_edit->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_prescription_edit->mrnno->CurrentValue) ?>">
<?php echo $patient_prescription_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_patient_prescription_Age" for="x_Age" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Age->caption() ?><?php echo $patient_prescription_edit->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Age->cellAttributes() ?>>
<span id="el_patient_prescription_Age">
<input type="text" data-table="patient_prescription" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->Age->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->Age->EditValue ?>"<?php echo $patient_prescription_edit->Age->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_prescription_Gender" for="x_Gender" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Gender->caption() ?><?php echo $patient_prescription_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Gender->cellAttributes() ?>>
<span id="el_patient_prescription_Gender">
<input type="text" data-table="patient_prescription" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->Gender->EditValue ?>"<?php echo $patient_prescription_edit->Gender->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->profilePic->Visible) { // profilePic ?>
	<div id="r_profilePic" class="form-group row">
		<label id="elh_patient_prescription_profilePic" for="x_profilePic" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->profilePic->caption() ?><?php echo $patient_prescription_edit->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->profilePic->cellAttributes() ?>>
<span id="el_patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($patient_prescription_edit->profilePic->getPlaceHolder()) ?>"<?php echo $patient_prescription_edit->profilePic->editAttributes() ?>><?php echo $patient_prescription_edit->profilePic->EditValue ?></textarea>
</span>
<?php echo $patient_prescription_edit->profilePic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_patient_prescription_Status" for="x_Status" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->Status->caption() ?><?php echo $patient_prescription_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->Status->cellAttributes() ?>>
<span id="el_patient_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_prescription" data-field="x_Status" data-value-separator="<?php echo $patient_prescription_edit->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $patient_prescription_edit->Status->editAttributes() ?>>
			<?php echo $patient_prescription_edit->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
<?php echo $patient_prescription_edit->Status->Lookup->getParamTag($patient_prescription_edit, "p_x_Status") ?>
</span>
<?php echo $patient_prescription_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->CreatedBy->Visible) { // CreatedBy ?>
	<div id="r_CreatedBy" class="form-group row">
		<label id="elh_patient_prescription_CreatedBy" for="x_CreatedBy" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->CreatedBy->caption() ?><?php echo $patient_prescription_edit->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->CreatedBy->cellAttributes() ?>>
<span id="el_patient_prescription_CreatedBy">
<input type="text" data-table="patient_prescription" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->CreatedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->CreatedBy->EditValue ?>"<?php echo $patient_prescription_edit->CreatedBy->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->CreatedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->CreateDateTime->Visible) { // CreateDateTime ?>
	<div id="r_CreateDateTime" class="form-group row">
		<label id="elh_patient_prescription_CreateDateTime" for="x_CreateDateTime" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->CreateDateTime->caption() ?><?php echo $patient_prescription_edit->CreateDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->CreateDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_CreateDateTime">
<input type="text" data-table="patient_prescription" data-field="x_CreateDateTime" name="x_CreateDateTime" id="x_CreateDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->CreateDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->CreateDateTime->EditValue ?>"<?php echo $patient_prescription_edit->CreateDateTime->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->CreateDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->ModifiedBy->Visible) { // ModifiedBy ?>
	<div id="r_ModifiedBy" class="form-group row">
		<label id="elh_patient_prescription_ModifiedBy" for="x_ModifiedBy" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->ModifiedBy->caption() ?><?php echo $patient_prescription_edit->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedBy">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->ModifiedBy->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->ModifiedBy->EditValue ?>"<?php echo $patient_prescription_edit->ModifiedBy->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->ModifiedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_prescription_edit->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<div id="r_ModifiedDateTime" class="form-group row">
		<label id="elh_patient_prescription_ModifiedDateTime" for="x_ModifiedDateTime" class="<?php echo $patient_prescription_edit->LeftColumnClass ?>"><?php echo $patient_prescription_edit->ModifiedDateTime->caption() ?><?php echo $patient_prescription_edit->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $patient_prescription_edit->RightColumnClass ?>"><div <?php echo $patient_prescription_edit->ModifiedDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedDateTime">
<input type="text" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_prescription_edit->ModifiedDateTime->getPlaceHolder()) ?>" value="<?php echo $patient_prescription_edit->ModifiedDateTime->EditValue ?>"<?php echo $patient_prescription_edit->ModifiedDateTime->editAttributes() ?>>
</span>
<?php echo $patient_prescription_edit->ModifiedDateTime->CustomMsg ?></div></div>
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
$patient_prescription_edit->terminate();
?>