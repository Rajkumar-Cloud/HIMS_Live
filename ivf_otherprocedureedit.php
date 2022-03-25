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
$ivf_otherprocedure_edit = new ivf_otherprocedure_edit();

// Run the page
$ivf_otherprocedure_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_otherprocedureedit = currentForm = new ew.Form("fivf_otherprocedureedit", "edit");

// Validate form
fivf_otherprocedureedit.validate = function() {
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
		<?php if ($ivf_otherprocedure_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->id->caption(), $ivf_otherprocedure->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->RIDNO->caption(), $ivf_otherprocedure->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_otherprocedure_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Name->caption(), $ivf_otherprocedure->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Age->caption(), $ivf_otherprocedure->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->SEX->Required) { ?>
			elm = this.getElements("x" + infix + "_SEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->SEX->caption(), $ivf_otherprocedure->SEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Address->Required) { ?>
			elm = this.getElements("x" + infix + "_Address");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Address->caption(), $ivf_otherprocedure->Address->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->DateofAdmission->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofAdmission->caption(), $ivf_otherprocedure->DateofAdmission->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->DateofAdmission->errorMessage()) ?>");
		<?php if ($ivf_otherprocedure_edit->DateofProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofProcedure->caption(), $ivf_otherprocedure->DateofProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->DateofDischarge->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofDischarge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofDischarge->caption(), $ivf_otherprocedure->DateofDischarge->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Consultant->caption(), $ivf_otherprocedure->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Surgeon->caption(), $ivf_otherprocedure->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Anesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Anesthetist->caption(), $ivf_otherprocedure->Anesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->IdentificationMark->caption(), $ivf_otherprocedure->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->ProcedureDone->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->ProcedureDone->caption(), $ivf_otherprocedure->ProcedureDone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->PROVISIONALDIAGNOSIS->Required) { ?>
			elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption(), $ivf_otherprocedure->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Chiefcomplaints->Required) { ?>
			elm = this.getElements("x" + infix + "_Chiefcomplaints");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Chiefcomplaints->caption(), $ivf_otherprocedure->Chiefcomplaints->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->MaritallHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritallHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->MaritallHistory->caption(), $ivf_otherprocedure->MaritallHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->MenstrualHistory->caption(), $ivf_otherprocedure->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->SurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->SurgicalHistory->caption(), $ivf_otherprocedure->SurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->PastHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PastHistory->caption(), $ivf_otherprocedure->PastHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->FamilyHistory->caption(), $ivf_otherprocedure->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Temp->caption(), $ivf_otherprocedure->Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Pulse->caption(), $ivf_otherprocedure->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->BP->caption(), $ivf_otherprocedure->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->CNS->Required) { ?>
			elm = this.getElements("x" + infix + "_CNS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->CNS->caption(), $ivf_otherprocedure->CNS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->_RS->Required) { ?>
			elm = this.getElements("x" + infix + "__RS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->_RS->caption(), $ivf_otherprocedure->_RS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->CVS->caption(), $ivf_otherprocedure->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PA->caption(), $ivf_otherprocedure->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->InvestigationReport->Required) { ?>
			elm = this.getElements("x" + infix + "_InvestigationReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->InvestigationReport->caption(), $ivf_otherprocedure->InvestigationReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->FinalDiagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_FinalDiagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->FinalDiagnosis->caption(), $ivf_otherprocedure->FinalDiagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Treatment->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Treatment->caption(), $ivf_otherprocedure->Treatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->DetailOfOperation->Required) { ?>
			elm = this.getElements("x" + infix + "_DetailOfOperation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DetailOfOperation->caption(), $ivf_otherprocedure->DetailOfOperation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->FollowUpAdvice->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowUpAdvice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->FollowUpAdvice->caption(), $ivf_otherprocedure->FollowUpAdvice->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->FollowUpMedication->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowUpMedication");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->FollowUpMedication->caption(), $ivf_otherprocedure->FollowUpMedication->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->Plan->Required) { ?>
			elm = this.getElements("x" + infix + "_Plan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Plan->caption(), $ivf_otherprocedure->Plan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TempleteFinalDiagnosis->Required) { ?>
			elm = this.getElements("x" + infix + "_TempleteFinalDiagnosis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TempleteFinalDiagnosis->caption(), $ivf_otherprocedure->TempleteFinalDiagnosis->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TemplateTreatment->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateTreatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TemplateTreatment->caption(), $ivf_otherprocedure->TemplateTreatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TemplateOperation->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateOperation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TemplateOperation->caption(), $ivf_otherprocedure->TemplateOperation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TemplateFollowUpAdvice->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateFollowUpAdvice");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TemplateFollowUpAdvice->caption(), $ivf_otherprocedure->TemplateFollowUpAdvice->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TemplateFollowUpMedication->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateFollowUpMedication");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TemplateFollowUpMedication->caption(), $ivf_otherprocedure->TemplateFollowUpMedication->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TemplatePlan->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplatePlan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TemplatePlan->caption(), $ivf_otherprocedure->TemplatePlan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->QRCode->Required) { ?>
			elm = this.getElements("x" + infix + "_QRCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->QRCode->caption(), $ivf_otherprocedure->QRCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TidNo->caption(), $ivf_otherprocedure->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->TidNo->errorMessage()) ?>");

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
fivf_otherprocedureedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_otherprocedureedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_otherprocedureedit.lists["x_Name"] = <?php echo $ivf_otherprocedure_edit->Name->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->Name->lookupOptions()) ?>;
fivf_otherprocedureedit.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_otherprocedureedit.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_edit->Consultant->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->Consultant->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_edit->Surgeon->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->Surgeon->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_edit->Anesthetist->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->Anesthetist->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TempleteFinalDiagnosis"] = <?php echo $ivf_otherprocedure_edit->TempleteFinalDiagnosis->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TempleteFinalDiagnosis"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TempleteFinalDiagnosis->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TemplateTreatment"] = <?php echo $ivf_otherprocedure_edit->TemplateTreatment->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TemplateTreatment"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TemplateTreatment->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TemplateOperation"] = <?php echo $ivf_otherprocedure_edit->TemplateOperation->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TemplateOperation"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TemplateOperation->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TemplateFollowUpAdvice"] = <?php echo $ivf_otherprocedure_edit->TemplateFollowUpAdvice->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TemplateFollowUpAdvice"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TemplateFollowUpAdvice->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TemplateFollowUpMedication"] = <?php echo $ivf_otherprocedure_edit->TemplateFollowUpMedication->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TemplateFollowUpMedication"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TemplateFollowUpMedication->lookupOptions()) ?>;
fivf_otherprocedureedit.lists["x_TemplatePlan"] = <?php echo $ivf_otherprocedure_edit->TemplatePlan->Lookup->toClientList() ?>;
fivf_otherprocedureedit.lists["x_TemplatePlan"].options = <?php echo JsonEncode($ivf_otherprocedure_edit->TemplatePlan->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_otherprocedure_edit->showPageHeader(); ?>
<?php
$ivf_otherprocedure_edit->showMessage();
?>
<form name="fivf_otherprocedureedit" id="fivf_otherprocedureedit" class="<?php echo $ivf_otherprocedure_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_otherprocedure_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_otherprocedure_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_otherprocedure_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_otherprocedure_id" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_id" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->id->caption() ?><?php echo ($ivf_otherprocedure->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_id" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->CurrentValue) ?>">
<?php echo $ivf_otherprocedure->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_otherprocedure_RIDNO" for="x_RIDNO" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->RIDNO->caption() ?><?php echo ($ivf_otherprocedure->RIDNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_RIDNO">
<input type="text" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->RIDNO->EditValue ?>"<?php echo $ivf_otherprocedure->RIDNO->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_otherprocedure_Name" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Name" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Name->caption() ?><?php echo ($ivf_otherprocedure->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Name" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Name">
<?php
$wrkonchange = "" . trim(@$ivf_otherprocedure->Name->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_otherprocedure->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_Name" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_Name" id="sv_x_Name" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" data-value-separator="<?php echo $ivf_otherprocedure->Name->displayValueSeparatorAttribute() ?>" name="x_Name" id="x_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<?php echo $ivf_otherprocedure->Name->Lookup->getParamTag("p_x_Name") ?>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
fivf_otherprocedureedit.createAutoSuggest({"id":"x_Name","forceSelect":false});
</script>
<?php echo $ivf_otherprocedure->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_otherprocedure_Age" for="x_Age" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Age" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Age->caption() ?><?php echo ($ivf_otherprocedure->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Age->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Age" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Age">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Age->EditValue ?>"<?php echo $ivf_otherprocedure->Age->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->SEX->Visible) { // SEX ?>
	<div id="r_SEX" class="form-group row">
		<label id="elh_ivf_otherprocedure_SEX" for="x_SEX" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_SEX" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->SEX->caption() ?><?php echo ($ivf_otherprocedure->SEX->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->SEX->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SEX" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_SEX">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->SEX->EditValue ?>"<?php echo $ivf_otherprocedure->SEX->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->SEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_ivf_otherprocedure_Address" for="x_Address" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Address" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Address->caption() ?><?php echo ($ivf_otherprocedure->Address->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Address->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Address" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Address">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Address->EditValue ?>"<?php echo $ivf_otherprocedure->Address->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
	<div id="r_DateofAdmission" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofAdmission" for="x_DateofAdmission" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?><?php echo ($ivf_otherprocedure->DateofAdmission->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_DateofAdmission">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x_DateofAdmission" id="x_DateofAdmission" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofAdmission->EditValue ?>"<?php echo $ivf_otherprocedure->DateofAdmission->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofAdmission->ReadOnly && !$ivf_otherprocedure->DateofAdmission->Disabled && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_otherprocedure->DateofAdmission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
	<div id="r_DateofProcedure" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofProcedure" for="x_DateofProcedure" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?><?php echo ($ivf_otherprocedure->DateofProcedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_DateofProcedure">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x_DateofProcedure" id="x_DateofProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofProcedure->EditValue ?>"<?php echo $ivf_otherprocedure->DateofProcedure->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofProcedure->ReadOnly && !$ivf_otherprocedure->DateofProcedure->Disabled && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_otherprocedure->DateofProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
	<div id="r_DateofDischarge" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofDischarge" for="x_DateofDischarge" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?><?php echo ($ivf_otherprocedure->DateofDischarge->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_DateofDischarge">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x_DateofDischarge" id="x_DateofDischarge" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofDischarge->EditValue ?>"<?php echo $ivf_otherprocedure->DateofDischarge->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofDischarge->ReadOnly && !$ivf_otherprocedure->DateofDischarge->Disabled && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_otherprocedure->DateofDischarge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_otherprocedure_Consultant" for="x_Consultant" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Consultant" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Consultant->caption() ?><?php echo ($ivf_otherprocedure->Consultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Consultant" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Consultant" data-value-separator="<?php echo $ivf_otherprocedure->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $ivf_otherprocedure->Consultant->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Consultant->selectOptionListHtml("x_Consultant") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Consultant->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Consultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Consultant->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Consultant',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Consultant->Lookup->getParamTag("p_x_Consultant") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_ivf_otherprocedure_Surgeon" for="x_Surgeon" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Surgeon" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Surgeon->caption() ?><?php echo ($ivf_otherprocedure->Surgeon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Surgeon" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Surgeon" data-value-separator="<?php echo $ivf_otherprocedure->Surgeon->displayValueSeparatorAttribute() ?>" id="x_Surgeon" name="x_Surgeon"<?php echo $ivf_otherprocedure->Surgeon->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Surgeon->selectOptionListHtml("x_Surgeon") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Surgeon->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Surgeon" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Surgeon->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Surgeon',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Surgeon->Lookup->getParamTag("p_x_Surgeon") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_ivf_otherprocedure_Anesthetist" for="x_Anesthetist" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Anesthetist->caption() ?><?php echo ($ivf_otherprocedure->Anesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Anesthetist" data-value-separator="<?php echo $ivf_otherprocedure->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Anesthetist->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Anesthetist" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Anesthetist->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Anesthetist',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Anesthetist->Lookup->getParamTag("p_x_Anesthetist") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_ivf_otherprocedure_IdentificationMark" for="x_IdentificationMark" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?><?php echo ($ivf_otherprocedure->IdentificationMark->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_IdentificationMark">
<input type="text" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->IdentificationMark->EditValue ?>"<?php echo $ivf_otherprocedure->IdentificationMark->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
	<div id="r_ProcedureDone" class="form-group row">
		<label id="elh_ivf_otherprocedure_ProcedureDone" for="x_ProcedureDone" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?><?php echo ($ivf_otherprocedure->ProcedureDone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_ProcedureDone">
<input type="text" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x_ProcedureDone" id="x_ProcedureDone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->ProcedureDone->EditValue ?>"<?php echo $ivf_otherprocedure->ProcedureDone->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->ProcedureDone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
		<label id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?><?php echo ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<div id="r_Chiefcomplaints" class="form-group row">
		<label id="elh_ivf_otherprocedure_Chiefcomplaints" for="x_Chiefcomplaints" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?><?php echo ($ivf_otherprocedure->Chiefcomplaints->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Chiefcomplaints">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Chiefcomplaints->EditValue ?>"<?php echo $ivf_otherprocedure->Chiefcomplaints->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->Chiefcomplaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
	<div id="r_MaritallHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_MaritallHistory" for="x_MaritallHistory" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?><?php echo ($ivf_otherprocedure->MaritallHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_MaritallHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x_MaritallHistory" id="x_MaritallHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MaritallHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MaritallHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->MaritallHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?><?php echo ($ivf_otherprocedure->MenstrualHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_MenstrualHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MenstrualHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MenstrualHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?><?php echo ($ivf_otherprocedure->SurgicalHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_SurgicalHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->SurgicalHistory->EditValue ?>"<?php echo $ivf_otherprocedure->SurgicalHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_PastHistory" for="x_PastHistory" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PastHistory" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->PastHistory->caption() ?><?php echo ($ivf_otherprocedure->PastHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PastHistory" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_PastHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PastHistory->EditValue ?>"<?php echo $ivf_otherprocedure->PastHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->PastHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_FamilyHistory" for="x_FamilyHistory" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?><?php echo ($ivf_otherprocedure->FamilyHistory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_FamilyHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->FamilyHistory->EditValue ?>"<?php echo $ivf_otherprocedure->FamilyHistory->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
	<div id="r_Temp" class="form-group row">
		<label id="elh_ivf_otherprocedure_Temp" for="x_Temp" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Temp" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Temp->caption() ?><?php echo ($ivf_otherprocedure->Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Temp" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Temp">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Temp->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Temp->EditValue ?>"<?php echo $ivf_otherprocedure->Temp->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_ivf_otherprocedure_Pulse" for="x_Pulse" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Pulse" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Pulse->caption() ?><?php echo ($ivf_otherprocedure->Pulse->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Pulse" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Pulse">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Pulse->EditValue ?>"<?php echo $ivf_otherprocedure->Pulse->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_ivf_otherprocedure_BP" for="x_BP" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_BP" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->BP->caption() ?><?php echo ($ivf_otherprocedure->BP->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_BP" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_BP">
<input type="text" data-table="ivf_otherprocedure" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->BP->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->BP->EditValue ?>"<?php echo $ivf_otherprocedure->BP->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
	<div id="r_CNS" class="form-group row">
		<label id="elh_ivf_otherprocedure_CNS" for="x_CNS" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_CNS" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->CNS->caption() ?><?php echo ($ivf_otherprocedure->CNS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CNS" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_CNS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CNS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CNS->EditValue ?>"<?php echo $ivf_otherprocedure->CNS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->CNS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
	<div id="r__RS" class="form-group row">
		<label id="elh_ivf_otherprocedure__RS" for="x__RS" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure__RS" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->_RS->caption() ?><?php echo ($ivf_otherprocedure->_RS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure__RS" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure__RS">
<input type="text" data-table="ivf_otherprocedure" data-field="x__RS" name="x__RS" id="x__RS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->_RS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->_RS->EditValue ?>"<?php echo $ivf_otherprocedure->_RS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->_RS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_ivf_otherprocedure_CVS" for="x_CVS" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_CVS" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->CVS->caption() ?><?php echo ($ivf_otherprocedure->CVS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CVS" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_CVS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CVS->EditValue ?>"<?php echo $ivf_otherprocedure->CVS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_ivf_otherprocedure_PA" for="x_PA" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PA" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->PA->caption() ?><?php echo ($ivf_otherprocedure->PA->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PA" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_PA">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PA->EditValue ?>"<?php echo $ivf_otherprocedure->PA->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
	<div id="r_InvestigationReport" class="form-group row">
		<label id="elh_ivf_otherprocedure_InvestigationReport" for="x_InvestigationReport" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?><?php echo ($ivf_otherprocedure->InvestigationReport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x_InvestigationReport" id="x_InvestigationReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->InvestigationReport->editAttributes() ?>><?php echo $ivf_otherprocedure->InvestigationReport->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_otherprocedure->InvestigationReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<div id="r_FinalDiagnosis" class="form-group row">
		<label id="elh_ivf_otherprocedure_FinalDiagnosis" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FinalDiagnosis" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->FinalDiagnosis->caption() ?><?php echo ($ivf_otherprocedure->FinalDiagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FinalDiagnosis" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_FinalDiagnosis">
<?php AppendClass($ivf_otherprocedure->FinalDiagnosis->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FinalDiagnosis->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->FinalDiagnosis->editAttributes() ?>><?php echo $ivf_otherprocedure->FinalDiagnosis->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_FinalDiagnosis", 0, 0, <?php echo ($ivf_otherprocedure->FinalDiagnosis->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->FinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_ivf_otherprocedure_Treatment" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Treatment" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Treatment->caption() ?><?php echo ($ivf_otherprocedure->Treatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Treatment" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Treatment">
<?php AppendClass($ivf_otherprocedure->Treatment->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Treatment->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Treatment->editAttributes() ?>><?php echo $ivf_otherprocedure->Treatment->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_Treatment", 35, 4, <?php echo ($ivf_otherprocedure->Treatment->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->DetailOfOperation->Visible) { // DetailOfOperation ?>
	<div id="r_DetailOfOperation" class="form-group row">
		<label id="elh_ivf_otherprocedure_DetailOfOperation" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DetailOfOperation" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->DetailOfOperation->caption() ?><?php echo ($ivf_otherprocedure->DetailOfOperation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->DetailOfOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DetailOfOperation" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_DetailOfOperation">
<?php AppendClass($ivf_otherprocedure->DetailOfOperation->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_DetailOfOperation" name="x_DetailOfOperation" id="x_DetailOfOperation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DetailOfOperation->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->DetailOfOperation->editAttributes() ?>><?php echo $ivf_otherprocedure->DetailOfOperation->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_DetailOfOperation", 35, 4, <?php echo ($ivf_otherprocedure->DetailOfOperation->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->DetailOfOperation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
	<div id="r_FollowUpAdvice" class="form-group row">
		<label id="elh_ivf_otherprocedure_FollowUpAdvice" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FollowUpAdvice" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->FollowUpAdvice->caption() ?><?php echo ($ivf_otherprocedure->FollowUpAdvice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->FollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpAdvice" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_FollowUpAdvice">
<?php AppendClass($ivf_otherprocedure->FollowUpAdvice->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpAdvice" name="x_FollowUpAdvice" id="x_FollowUpAdvice" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FollowUpAdvice->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->FollowUpAdvice->editAttributes() ?>><?php echo $ivf_otherprocedure->FollowUpAdvice->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_FollowUpAdvice", 35, 4, <?php echo ($ivf_otherprocedure->FollowUpAdvice->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->FollowUpAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->FollowUpMedication->Visible) { // FollowUpMedication ?>
	<div id="r_FollowUpMedication" class="form-group row">
		<label id="elh_ivf_otherprocedure_FollowUpMedication" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FollowUpMedication" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->FollowUpMedication->caption() ?><?php echo ($ivf_otherprocedure->FollowUpMedication->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->FollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpMedication" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_FollowUpMedication">
<?php AppendClass($ivf_otherprocedure->FollowUpMedication->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpMedication" name="x_FollowUpMedication" id="x_FollowUpMedication" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FollowUpMedication->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->FollowUpMedication->editAttributes() ?>><?php echo $ivf_otherprocedure->FollowUpMedication->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_FollowUpMedication", 35, 4, <?php echo ($ivf_otherprocedure->FollowUpMedication->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->FollowUpMedication->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->Plan->Visible) { // Plan ?>
	<div id="r_Plan" class="form-group row">
		<label id="elh_ivf_otherprocedure_Plan" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Plan" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->Plan->caption() ?><?php echo ($ivf_otherprocedure->Plan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->Plan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Plan" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_Plan">
<?php AppendClass($ivf_otherprocedure->Plan->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Plan" name="x_Plan" id="x_Plan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Plan->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Plan->editAttributes() ?>><?php echo $ivf_otherprocedure->Plan->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_otherprocedureedit_js">
ew.createEditor("fivf_otherprocedureedit", "x_Plan", 35, 4, <?php echo ($ivf_otherprocedure->Plan->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_otherprocedure->Plan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
	<div id="r_TempleteFinalDiagnosis" class="form-group row">
		<label id="elh_ivf_otherprocedure_TempleteFinalDiagnosis" for="x_TempleteFinalDiagnosis" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->caption() ?><?php echo ($ivf_otherprocedure->TempleteFinalDiagnosis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<?php $ivf_otherprocedure->TempleteFinalDiagnosis->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TempleteFinalDiagnosis->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TempleteFinalDiagnosis" data-value-separator="<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->displayValueSeparatorAttribute() ?>" id="x_TempleteFinalDiagnosis" name="x_TempleteFinalDiagnosis"<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->selectOptionListHtml("x_TempleteFinalDiagnosis") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TempleteFinalDiagnosis->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TempleteFinalDiagnosis" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TempleteFinalDiagnosis->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TempleteFinalDiagnosis',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->Lookup->getParamTag("p_x_TempleteFinalDiagnosis") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateTreatment->Visible) { // TemplateTreatment ?>
	<div id="r_TemplateTreatment" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateTreatment" for="x_TemplateTreatment" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateTreatment" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateTreatment->caption() ?><?php echo ($ivf_otherprocedure->TemplateTreatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TemplateTreatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateTreatment" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TemplateTreatment">
<?php $ivf_otherprocedure->TemplateTreatment->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TemplateTreatment->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateTreatment" data-value-separator="<?php echo $ivf_otherprocedure->TemplateTreatment->displayValueSeparatorAttribute() ?>" id="x_TemplateTreatment" name="x_TemplateTreatment"<?php echo $ivf_otherprocedure->TemplateTreatment->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TemplateTreatment->selectOptionListHtml("x_TemplateTreatment") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TemplateTreatment->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateTreatment" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TemplateTreatment->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TemplateTreatment->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateTreatment',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TemplateTreatment->Lookup->getParamTag("p_x_TemplateTreatment") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TemplateTreatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateOperation->Visible) { // TemplateOperation ?>
	<div id="r_TemplateOperation" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateOperation" for="x_TemplateOperation" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateOperation" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateOperation->caption() ?><?php echo ($ivf_otherprocedure->TemplateOperation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TemplateOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateOperation" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TemplateOperation">
<?php $ivf_otherprocedure->TemplateOperation->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TemplateOperation->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateOperation" data-value-separator="<?php echo $ivf_otherprocedure->TemplateOperation->displayValueSeparatorAttribute() ?>" id="x_TemplateOperation" name="x_TemplateOperation"<?php echo $ivf_otherprocedure->TemplateOperation->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TemplateOperation->selectOptionListHtml("x_TemplateOperation") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TemplateOperation->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateOperation" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TemplateOperation->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TemplateOperation->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateOperation',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TemplateOperation->Lookup->getParamTag("p_x_TemplateOperation") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TemplateOperation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
	<div id="r_TemplateFollowUpAdvice" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateFollowUpAdvice" for="x_TemplateFollowUpAdvice" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->caption() ?><?php echo ($ivf_otherprocedure->TemplateFollowUpAdvice->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<?php $ivf_otherprocedure->TemplateFollowUpAdvice->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TemplateFollowUpAdvice->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateFollowUpAdvice" data-value-separator="<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpAdvice" name="x_TemplateFollowUpAdvice"<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->selectOptionListHtml("x_TemplateFollowUpAdvice") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TemplateFollowUpAdvice->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvice" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TemplateFollowUpAdvice->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvice',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->Lookup->getParamTag("p_x_TemplateFollowUpAdvice") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
	<div id="r_TemplateFollowUpMedication" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateFollowUpMedication" for="x_TemplateFollowUpMedication" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateFollowUpMedication" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateFollowUpMedication->caption() ?><?php echo ($ivf_otherprocedure->TemplateFollowUpMedication->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpMedication" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<?php $ivf_otherprocedure->TemplateFollowUpMedication->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TemplateFollowUpMedication->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateFollowUpMedication" data-value-separator="<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpMedication" name="x_TemplateFollowUpMedication"<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->selectOptionListHtml("x_TemplateFollowUpMedication") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TemplateFollowUpMedication->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpMedication" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TemplateFollowUpMedication->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpMedication',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->Lookup->getParamTag("p_x_TemplateFollowUpMedication") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplatePlan->Visible) { // TemplatePlan ?>
	<div id="r_TemplatePlan" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplatePlan" for="x_TemplatePlan" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplatePlan" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TemplatePlan->caption() ?><?php echo ($ivf_otherprocedure->TemplatePlan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TemplatePlan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplatePlan" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TemplatePlan">
<?php $ivf_otherprocedure->TemplatePlan->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_otherprocedure->TemplatePlan->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplatePlan" data-value-separator="<?php echo $ivf_otherprocedure->TemplatePlan->displayValueSeparatorAttribute() ?>" id="x_TemplatePlan" name="x_TemplatePlan"<?php echo $ivf_otherprocedure->TemplatePlan->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->TemplatePlan->selectOptionListHtml("x_TemplatePlan") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure->TemplatePlan->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlan" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->TemplatePlan->caption() ?>" data-title="<?php echo $ivf_otherprocedure->TemplatePlan->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlan',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->TemplatePlan->Lookup->getParamTag("p_x_TemplatePlan") ?>
</span>
</script>
<?php echo $ivf_otherprocedure->TemplatePlan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->QRCode->Visible) { // QRCode ?>
	<div id="r_QRCode" class="form-group row">
		<label id="elh_ivf_otherprocedure_QRCode" for="x_QRCode" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_QRCode" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->QRCode->caption() ?><?php echo ($ivf_otherprocedure->QRCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->QRCode->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_QRCode" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_QRCode">
<textarea data-table="ivf_otherprocedure" data-field="x_QRCode" name="x_QRCode" id="x_QRCode" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->QRCode->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->QRCode->editAttributes() ?>><?php echo $ivf_otherprocedure->QRCode->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_otherprocedure->QRCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_otherprocedure_TidNo" for="x_TidNo" class="<?php echo $ivf_otherprocedure_edit->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TidNo" class="ivf_otherprocedureedit" type="text/html"><span><?php echo $ivf_otherprocedure->TidNo->caption() ?><?php echo ($ivf_otherprocedure->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_otherprocedure_edit->RightColumnClass ?>"><div<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TidNo" class="ivf_otherprocedureedit" type="text/html">
<span id="el_ivf_otherprocedure_TidNo">
<input type="text" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->TidNo->EditValue ?>"<?php echo $ivf_otherprocedure->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_otherprocedure->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_otherprocedureedit" class="ew-custom-template"></div>
<script id="tpm_ivf_otherprocedureedit" type="text/html">
<div id="ct_ivf_otherprocedure_edit"><style>
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
{{include tmpl="#tpc_ivf_otherprocedure_RIDNO"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_RIDNO"/}}
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
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofAdmission"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_DateofAdmission"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofProcedure"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_DateofProcedure"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofDischarge"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_DateofDischarge"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_ProcedureDone"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_ProcedureDone"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Consultant"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_Consultant"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Surgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_Surgeon"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Anesthetist"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_Anesthetist"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_InvestigationReport"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_InvestigationReport"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TempleteFinalDiagnosis"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TempleteFinalDiagnosis"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FinalDiagnosis"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_FinalDiagnosis"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateTreatment"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TemplateTreatment"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Treatment"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_Treatment"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateOperation"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TemplateOperation"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DetailOfOperation"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_DetailOfOperation"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpAdvice"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TemplateFollowUpAdvice"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpAdvice"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_FollowUpAdvice"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpMedication"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TemplateFollowUpMedication"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpMedication"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_FollowUpMedication"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplatePlan"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_TemplatePlan"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Plan"/}}&nbsp;{{include tmpl="#tpx_ivf_otherprocedure_Plan"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$ivf_otherprocedure_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_otherprocedure_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_otherprocedure_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_otherprocedure->Rows) ?> };
ew.applyTemplate("tpd_ivf_otherprocedureedit", "tpm_ivf_otherprocedureedit", "ivf_otherprocedureedit", "<?php echo $ivf_otherprocedure->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_otherprocedureedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_otherprocedure_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_otherprocedure_edit->terminate();
?>