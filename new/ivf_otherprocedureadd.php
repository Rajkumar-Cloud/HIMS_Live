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
$ivf_otherprocedure_add = new ivf_otherprocedure_add();

// Run the page
$ivf_otherprocedure_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_otherprocedureadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_otherprocedureadd = currentForm = new ew.Form("fivf_otherprocedureadd", "add");

	// Validate form
	fivf_otherprocedureadd.validate = function() {
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
			<?php if ($ivf_otherprocedure_add->RIDNO->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->RIDNO->caption(), $ivf_otherprocedure_add->RIDNO->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNO");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure_add->RIDNO->errorMessage()) ?>");
			<?php if ($ivf_otherprocedure_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Name->caption(), $ivf_otherprocedure_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Age->caption(), $ivf_otherprocedure_add->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->SEX->Required) { ?>
				elm = this.getElements("x" + infix + "_SEX");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->SEX->caption(), $ivf_otherprocedure_add->SEX->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Address->Required) { ?>
				elm = this.getElements("x" + infix + "_Address");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Address->caption(), $ivf_otherprocedure_add->Address->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->DateofAdmission->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofAdmission");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->DateofAdmission->caption(), $ivf_otherprocedure_add->DateofAdmission->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DateofAdmission");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure_add->DateofAdmission->errorMessage()) ?>");
			<?php if ($ivf_otherprocedure_add->DateofProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->DateofProcedure->caption(), $ivf_otherprocedure_add->DateofProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->DateofDischarge->Required) { ?>
				elm = this.getElements("x" + infix + "_DateofDischarge");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->DateofDischarge->caption(), $ivf_otherprocedure_add->DateofDischarge->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Consultant->caption(), $ivf_otherprocedure_add->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Surgeon->caption(), $ivf_otherprocedure_add->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Anesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Anesthetist->caption(), $ivf_otherprocedure_add->Anesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->IdentificationMark->Required) { ?>
				elm = this.getElements("x" + infix + "_IdentificationMark");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->IdentificationMark->caption(), $ivf_otherprocedure_add->IdentificationMark->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->ProcedureDone->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureDone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->ProcedureDone->caption(), $ivf_otherprocedure_add->ProcedureDone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->Required) { ?>
				elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->caption(), $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Chiefcomplaints->Required) { ?>
				elm = this.getElements("x" + infix + "_Chiefcomplaints");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Chiefcomplaints->caption(), $ivf_otherprocedure_add->Chiefcomplaints->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->MaritallHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MaritallHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->MaritallHistory->caption(), $ivf_otherprocedure_add->MaritallHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->MenstrualHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_MenstrualHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->MenstrualHistory->caption(), $ivf_otherprocedure_add->MenstrualHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->SurgicalHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_SurgicalHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->SurgicalHistory->caption(), $ivf_otherprocedure_add->SurgicalHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->PastHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_PastHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->PastHistory->caption(), $ivf_otherprocedure_add->PastHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->FamilyHistory->Required) { ?>
				elm = this.getElements("x" + infix + "_FamilyHistory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->FamilyHistory->caption(), $ivf_otherprocedure_add->FamilyHistory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Temp->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Temp->caption(), $ivf_otherprocedure_add->Temp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Pulse->Required) { ?>
				elm = this.getElements("x" + infix + "_Pulse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Pulse->caption(), $ivf_otherprocedure_add->Pulse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->BP->Required) { ?>
				elm = this.getElements("x" + infix + "_BP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->BP->caption(), $ivf_otherprocedure_add->BP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->CNS->Required) { ?>
				elm = this.getElements("x" + infix + "_CNS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->CNS->caption(), $ivf_otherprocedure_add->CNS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->_RS->Required) { ?>
				elm = this.getElements("x" + infix + "__RS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->_RS->caption(), $ivf_otherprocedure_add->_RS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->CVS->Required) { ?>
				elm = this.getElements("x" + infix + "_CVS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->CVS->caption(), $ivf_otherprocedure_add->CVS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->PA->Required) { ?>
				elm = this.getElements("x" + infix + "_PA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->PA->caption(), $ivf_otherprocedure_add->PA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->InvestigationReport->Required) { ?>
				elm = this.getElements("x" + infix + "_InvestigationReport");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->InvestigationReport->caption(), $ivf_otherprocedure_add->InvestigationReport->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->FinalDiagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_FinalDiagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->FinalDiagnosis->caption(), $ivf_otherprocedure_add->FinalDiagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Treatment->Required) { ?>
				elm = this.getElements("x" + infix + "_Treatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Treatment->caption(), $ivf_otherprocedure_add->Treatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->DetailOfOperation->Required) { ?>
				elm = this.getElements("x" + infix + "_DetailOfOperation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->DetailOfOperation->caption(), $ivf_otherprocedure_add->DetailOfOperation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->FollowUpAdvice->Required) { ?>
				elm = this.getElements("x" + infix + "_FollowUpAdvice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->FollowUpAdvice->caption(), $ivf_otherprocedure_add->FollowUpAdvice->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->FollowUpMedication->Required) { ?>
				elm = this.getElements("x" + infix + "_FollowUpMedication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->FollowUpMedication->caption(), $ivf_otherprocedure_add->FollowUpMedication->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->Plan->Required) { ?>
				elm = this.getElements("x" + infix + "_Plan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->Plan->caption(), $ivf_otherprocedure_add->Plan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TempleteFinalDiagnosis->Required) { ?>
				elm = this.getElements("x" + infix + "_TempleteFinalDiagnosis");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TempleteFinalDiagnosis->caption(), $ivf_otherprocedure_add->TempleteFinalDiagnosis->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TemplateTreatment->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateTreatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TemplateTreatment->caption(), $ivf_otherprocedure_add->TemplateTreatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TemplateOperation->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateOperation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TemplateOperation->caption(), $ivf_otherprocedure_add->TemplateOperation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TemplateFollowUpAdvice->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFollowUpAdvice");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TemplateFollowUpAdvice->caption(), $ivf_otherprocedure_add->TemplateFollowUpAdvice->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TemplateFollowUpMedication->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFollowUpMedication");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TemplateFollowUpMedication->caption(), $ivf_otherprocedure_add->TemplateFollowUpMedication->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TemplatePlan->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplatePlan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TemplatePlan->caption(), $ivf_otherprocedure_add->TemplatePlan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->QRCode->Required) { ?>
				elm = this.getElements("x" + infix + "_QRCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->QRCode->caption(), $ivf_otherprocedure_add->QRCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_otherprocedure_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure_add->TidNo->caption(), $ivf_otherprocedure_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure_add->TidNo->errorMessage()) ?>");

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
	fivf_otherprocedureadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_otherprocedureadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_otherprocedureadd.lists["x_Name"] = <?php echo $ivf_otherprocedure_add->Name->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_add->Name->lookupOptions()) ?>;
	fivf_otherprocedureadd.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fivf_otherprocedureadd.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_add->Consultant->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_add->Consultant->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_add->Surgeon->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_add->Surgeon->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_add->Anesthetist->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_add->Anesthetist->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TempleteFinalDiagnosis"] = <?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TempleteFinalDiagnosis"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TempleteFinalDiagnosis->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TemplateTreatment"] = <?php echo $ivf_otherprocedure_add->TemplateTreatment->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TemplateTreatment"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TemplateTreatment->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TemplateOperation"] = <?php echo $ivf_otherprocedure_add->TemplateOperation->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TemplateOperation"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TemplateOperation->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TemplateFollowUpAdvice"] = <?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TemplateFollowUpAdvice"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TemplateFollowUpAdvice->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TemplateFollowUpMedication"] = <?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TemplateFollowUpMedication"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TemplateFollowUpMedication->lookupOptions()) ?>;
	fivf_otherprocedureadd.lists["x_TemplatePlan"] = <?php echo $ivf_otherprocedure_add->TemplatePlan->Lookup->toClientList($ivf_otherprocedure_add) ?>;
	fivf_otherprocedureadd.lists["x_TemplatePlan"].options = <?php echo JsonEncode($ivf_otherprocedure_add->TemplatePlan->lookupOptions()) ?>;
	loadjs.done("fivf_otherprocedureadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_otherprocedure_add->showPageHeader(); ?>
<?php
$ivf_otherprocedure_add->showMessage();
?>
<form name="fivf_otherprocedureadd" id="fivf_otherprocedureadd" class="<?php echo $ivf_otherprocedure_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_otherprocedure_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_otherprocedure_add->RIDNO->Visible) { // RIDNO ?>
	<div id="r_RIDNO" class="form-group row">
		<label id="elh_ivf_otherprocedure_RIDNO" for="x_RIDNO" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_RIDNO" type="text/html"><?php echo $ivf_otherprocedure_add->RIDNO->caption() ?><?php echo $ivf_otherprocedure_add->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_RIDNO" type="text/html"><span id="el_ivf_otherprocedure_RIDNO">
<input type="text" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->RIDNO->EditValue ?>"<?php echo $ivf_otherprocedure_add->RIDNO->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->RIDNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_otherprocedure_Name" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Name" type="text/html"><?php echo $ivf_otherprocedure_add->Name->caption() ?><?php echo $ivf_otherprocedure_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Name->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Name" type="text/html"><span id="el_ivf_otherprocedure_Name">
<?php
$onchange = $ivf_otherprocedure_add->Name->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$ivf_otherprocedure_add->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_Name">
	<input type="text" class="form-control" name="sv_x_Name" id="sv_x_Name" value="<?php echo RemoveHtml($ivf_otherprocedure_add->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Name->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" data-value-separator="<?php echo $ivf_otherprocedure_add->Name->displayValueSeparatorAttribute() ?>" name="x_Name" id="x_Name" value="<?php echo HtmlEncode($ivf_otherprocedure_add->Name->CurrentValue) ?>"<?php echo $onchange ?>>
<?php echo $ivf_otherprocedure_add->Name->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_Name") ?>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd"], function() {
	fivf_otherprocedureadd.createAutoSuggest({"id":"x_Name","forceSelect":false});
});
</script>
<?php echo $ivf_otherprocedure_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_ivf_otherprocedure_Age" for="x_Age" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Age" type="text/html"><?php echo $ivf_otherprocedure_add->Age->caption() ?><?php echo $ivf_otherprocedure_add->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Age->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Age" type="text/html"><span id="el_ivf_otherprocedure_Age">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->Age->EditValue ?>"<?php echo $ivf_otherprocedure_add->Age->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->SEX->Visible) { // SEX ?>
	<div id="r_SEX" class="form-group row">
		<label id="elh_ivf_otherprocedure_SEX" for="x_SEX" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_SEX" type="text/html"><?php echo $ivf_otherprocedure_add->SEX->caption() ?><?php echo $ivf_otherprocedure_add->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->SEX->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SEX" type="text/html"><span id="el_ivf_otherprocedure_SEX">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->SEX->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->SEX->EditValue ?>"<?php echo $ivf_otherprocedure_add->SEX->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->SEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Address->Visible) { // Address ?>
	<div id="r_Address" class="form-group row">
		<label id="elh_ivf_otherprocedure_Address" for="x_Address" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Address" type="text/html"><?php echo $ivf_otherprocedure_add->Address->caption() ?><?php echo $ivf_otherprocedure_add->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Address->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Address" type="text/html"><span id="el_ivf_otherprocedure_Address">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Address->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->Address->EditValue ?>"<?php echo $ivf_otherprocedure_add->Address->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->Address->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->DateofAdmission->Visible) { // DateofAdmission ?>
	<div id="r_DateofAdmission" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofAdmission" for="x_DateofAdmission" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofAdmission" type="text/html"><?php echo $ivf_otherprocedure_add->DateofAdmission->caption() ?><?php echo $ivf_otherprocedure_add->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->DateofAdmission->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofAdmission" type="text/html"><span id="el_ivf_otherprocedure_DateofAdmission">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x_DateofAdmission" id="x_DateofAdmission" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->DateofAdmission->EditValue ?>"<?php echo $ivf_otherprocedure_add->DateofAdmission->editAttributes() ?>>
<?php if (!$ivf_otherprocedure_add->DateofAdmission->ReadOnly && !$ivf_otherprocedure_add->DateofAdmission->Disabled && !isset($ivf_otherprocedure_add->DateofAdmission->EditAttrs["readonly"]) && !isset($ivf_otherprocedure_add->DateofAdmission->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_otherprocedure_add->DateofAdmission->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->DateofProcedure->Visible) { // DateofProcedure ?>
	<div id="r_DateofProcedure" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofProcedure" for="x_DateofProcedure" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofProcedure" type="text/html"><?php echo $ivf_otherprocedure_add->DateofProcedure->caption() ?><?php echo $ivf_otherprocedure_add->DateofProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->DateofProcedure->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofProcedure" type="text/html"><span id="el_ivf_otherprocedure_DateofProcedure">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x_DateofProcedure" id="x_DateofProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->DateofProcedure->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->DateofProcedure->EditValue ?>"<?php echo $ivf_otherprocedure_add->DateofProcedure->editAttributes() ?>>
<?php if (!$ivf_otherprocedure_add->DateofProcedure->ReadOnly && !$ivf_otherprocedure_add->DateofProcedure->Disabled && !isset($ivf_otherprocedure_add->DateofProcedure->EditAttrs["readonly"]) && !isset($ivf_otherprocedure_add->DateofProcedure->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_otherprocedure_add->DateofProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->DateofDischarge->Visible) { // DateofDischarge ?>
	<div id="r_DateofDischarge" class="form-group row">
		<label id="elh_ivf_otherprocedure_DateofDischarge" for="x_DateofDischarge" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DateofDischarge" type="text/html"><?php echo $ivf_otherprocedure_add->DateofDischarge->caption() ?><?php echo $ivf_otherprocedure_add->DateofDischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->DateofDischarge->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofDischarge" type="text/html"><span id="el_ivf_otherprocedure_DateofDischarge">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x_DateofDischarge" id="x_DateofDischarge" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->DateofDischarge->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->DateofDischarge->EditValue ?>"<?php echo $ivf_otherprocedure_add->DateofDischarge->editAttributes() ?>>
<?php if (!$ivf_otherprocedure_add->DateofDischarge->ReadOnly && !$ivf_otherprocedure_add->DateofDischarge->Disabled && !isset($ivf_otherprocedure_add->DateofDischarge->EditAttrs["readonly"]) && !isset($ivf_otherprocedure_add->DateofDischarge->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_otherprocedure_add->DateofDischarge->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_otherprocedure_Consultant" for="x_Consultant" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Consultant" type="text/html"><?php echo $ivf_otherprocedure_add->Consultant->caption() ?><?php echo $ivf_otherprocedure_add->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Consultant" type="text/html"><span id="el_ivf_otherprocedure_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Consultant" data-value-separator="<?php echo $ivf_otherprocedure_add->Consultant->displayValueSeparatorAttribute() ?>" id="x_Consultant" name="x_Consultant"<?php echo $ivf_otherprocedure_add->Consultant->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->Consultant->selectOptionListHtml("x_Consultant") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure_add->Consultant->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Consultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->Consultant->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Consultant',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->Consultant->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_Consultant") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_ivf_otherprocedure_Surgeon" for="x_Surgeon" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Surgeon" type="text/html"><?php echo $ivf_otherprocedure_add->Surgeon->caption() ?><?php echo $ivf_otherprocedure_add->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Surgeon" type="text/html"><span id="el_ivf_otherprocedure_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Surgeon" data-value-separator="<?php echo $ivf_otherprocedure_add->Surgeon->displayValueSeparatorAttribute() ?>" id="x_Surgeon" name="x_Surgeon"<?php echo $ivf_otherprocedure_add->Surgeon->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->Surgeon->selectOptionListHtml("x_Surgeon") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure_add->Surgeon->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Surgeon" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->Surgeon->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Surgeon',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->Surgeon->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_Surgeon") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Anesthetist->Visible) { // Anesthetist ?>
	<div id="r_Anesthetist" class="form-group row">
		<label id="elh_ivf_otherprocedure_Anesthetist" for="x_Anesthetist" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Anesthetist" type="text/html"><?php echo $ivf_otherprocedure_add->Anesthetist->caption() ?><?php echo $ivf_otherprocedure_add->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Anesthetist->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Anesthetist" type="text/html"><span id="el_ivf_otherprocedure_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Anesthetist" data-value-separator="<?php echo $ivf_otherprocedure_add->Anesthetist->displayValueSeparatorAttribute() ?>" id="x_Anesthetist" name="x_Anesthetist"<?php echo $ivf_otherprocedure_add->Anesthetist->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure_add->Anesthetist->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Anesthetist" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->Anesthetist->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Anesthetist',url:'doctorsaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->Anesthetist->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_Anesthetist") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->Anesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->IdentificationMark->Visible) { // IdentificationMark ?>
	<div id="r_IdentificationMark" class="form-group row">
		<label id="elh_ivf_otherprocedure_IdentificationMark" for="x_IdentificationMark" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_IdentificationMark" type="text/html"><?php echo $ivf_otherprocedure_add->IdentificationMark->caption() ?><?php echo $ivf_otherprocedure_add->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_IdentificationMark" type="text/html"><span id="el_ivf_otherprocedure_IdentificationMark">
<input type="text" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->IdentificationMark->EditValue ?>"<?php echo $ivf_otherprocedure_add->IdentificationMark->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->IdentificationMark->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->ProcedureDone->Visible) { // ProcedureDone ?>
	<div id="r_ProcedureDone" class="form-group row">
		<label id="elh_ivf_otherprocedure_ProcedureDone" for="x_ProcedureDone" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_ProcedureDone" type="text/html"><?php echo $ivf_otherprocedure_add->ProcedureDone->caption() ?><?php echo $ivf_otherprocedure_add->ProcedureDone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->ProcedureDone->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_ProcedureDone" type="text/html"><span id="el_ivf_otherprocedure_ProcedureDone">
<input type="text" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x_ProcedureDone" id="x_ProcedureDone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->ProcedureDone->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->ProcedureDone->EditValue ?>"<?php echo $ivf_otherprocedure_add->ProcedureDone->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->ProcedureDone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
		<label id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS" type="text/html"><?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->caption() ?><?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS" type="text/html"><span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->PROVISIONALDIAGNOSIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<div id="r_Chiefcomplaints" class="form-group row">
		<label id="elh_ivf_otherprocedure_Chiefcomplaints" for="x_Chiefcomplaints" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Chiefcomplaints" type="text/html"><?php echo $ivf_otherprocedure_add->Chiefcomplaints->caption() ?><?php echo $ivf_otherprocedure_add->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Chiefcomplaints" type="text/html"><span id="el_ivf_otherprocedure_Chiefcomplaints">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Chiefcomplaints->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->Chiefcomplaints->EditValue ?>"<?php echo $ivf_otherprocedure_add->Chiefcomplaints->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->Chiefcomplaints->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->MaritallHistory->Visible) { // MaritallHistory ?>
	<div id="r_MaritallHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_MaritallHistory" for="x_MaritallHistory" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_MaritallHistory" type="text/html"><?php echo $ivf_otherprocedure_add->MaritallHistory->caption() ?><?php echo $ivf_otherprocedure_add->MaritallHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->MaritallHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MaritallHistory" type="text/html"><span id="el_ivf_otherprocedure_MaritallHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x_MaritallHistory" id="x_MaritallHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->MaritallHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->MaritallHistory->EditValue ?>"<?php echo $ivf_otherprocedure_add->MaritallHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->MaritallHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<div id="r_MenstrualHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_MenstrualHistory" for="x_MenstrualHistory" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_MenstrualHistory" type="text/html"><?php echo $ivf_otherprocedure_add->MenstrualHistory->caption() ?><?php echo $ivf_otherprocedure_add->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MenstrualHistory" type="text/html"><span id="el_ivf_otherprocedure_MenstrualHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->MenstrualHistory->EditValue ?>"<?php echo $ivf_otherprocedure_add->MenstrualHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->MenstrualHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<div id="r_SurgicalHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_SurgicalHistory" for="x_SurgicalHistory" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_SurgicalHistory" type="text/html"><?php echo $ivf_otherprocedure_add->SurgicalHistory->caption() ?><?php echo $ivf_otherprocedure_add->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SurgicalHistory" type="text/html"><span id="el_ivf_otherprocedure_SurgicalHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->SurgicalHistory->EditValue ?>"<?php echo $ivf_otherprocedure_add->SurgicalHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->SurgicalHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->PastHistory->Visible) { // PastHistory ?>
	<div id="r_PastHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_PastHistory" for="x_PastHistory" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PastHistory" type="text/html"><?php echo $ivf_otherprocedure_add->PastHistory->caption() ?><?php echo $ivf_otherprocedure_add->PastHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->PastHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PastHistory" type="text/html"><span id="el_ivf_otherprocedure_PastHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->PastHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->PastHistory->EditValue ?>"<?php echo $ivf_otherprocedure_add->PastHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->PastHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->FamilyHistory->Visible) { // FamilyHistory ?>
	<div id="r_FamilyHistory" class="form-group row">
		<label id="elh_ivf_otherprocedure_FamilyHistory" for="x_FamilyHistory" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FamilyHistory" type="text/html"><?php echo $ivf_otherprocedure_add->FamilyHistory->caption() ?><?php echo $ivf_otherprocedure_add->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FamilyHistory" type="text/html"><span id="el_ivf_otherprocedure_FamilyHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->FamilyHistory->EditValue ?>"<?php echo $ivf_otherprocedure_add->FamilyHistory->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->FamilyHistory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Temp->Visible) { // Temp ?>
	<div id="r_Temp" class="form-group row">
		<label id="elh_ivf_otherprocedure_Temp" for="x_Temp" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Temp" type="text/html"><?php echo $ivf_otherprocedure_add->Temp->caption() ?><?php echo $ivf_otherprocedure_add->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Temp->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Temp" type="text/html"><span id="el_ivf_otherprocedure_Temp">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Temp->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->Temp->EditValue ?>"<?php echo $ivf_otherprocedure_add->Temp->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Pulse->Visible) { // Pulse ?>
	<div id="r_Pulse" class="form-group row">
		<label id="elh_ivf_otherprocedure_Pulse" for="x_Pulse" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Pulse" type="text/html"><?php echo $ivf_otherprocedure_add->Pulse->caption() ?><?php echo $ivf_otherprocedure_add->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Pulse->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Pulse" type="text/html"><span id="el_ivf_otherprocedure_Pulse">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Pulse->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->Pulse->EditValue ?>"<?php echo $ivf_otherprocedure_add->Pulse->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->Pulse->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->BP->Visible) { // BP ?>
	<div id="r_BP" class="form-group row">
		<label id="elh_ivf_otherprocedure_BP" for="x_BP" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_BP" type="text/html"><?php echo $ivf_otherprocedure_add->BP->caption() ?><?php echo $ivf_otherprocedure_add->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->BP->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_BP" type="text/html"><span id="el_ivf_otherprocedure_BP">
<input type="text" data-table="ivf_otherprocedure" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->BP->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->BP->EditValue ?>"<?php echo $ivf_otherprocedure_add->BP->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->BP->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->CNS->Visible) { // CNS ?>
	<div id="r_CNS" class="form-group row">
		<label id="elh_ivf_otherprocedure_CNS" for="x_CNS" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_CNS" type="text/html"><?php echo $ivf_otherprocedure_add->CNS->caption() ?><?php echo $ivf_otherprocedure_add->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->CNS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CNS" type="text/html"><span id="el_ivf_otherprocedure_CNS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->CNS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->CNS->EditValue ?>"<?php echo $ivf_otherprocedure_add->CNS->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->CNS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->_RS->Visible) { // RS ?>
	<div id="r__RS" class="form-group row">
		<label id="elh_ivf_otherprocedure__RS" for="x__RS" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure__RS" type="text/html"><?php echo $ivf_otherprocedure_add->_RS->caption() ?><?php echo $ivf_otherprocedure_add->_RS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->_RS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure__RS" type="text/html"><span id="el_ivf_otherprocedure__RS">
<input type="text" data-table="ivf_otherprocedure" data-field="x__RS" name="x__RS" id="x__RS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->_RS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->_RS->EditValue ?>"<?php echo $ivf_otherprocedure_add->_RS->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->_RS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->CVS->Visible) { // CVS ?>
	<div id="r_CVS" class="form-group row">
		<label id="elh_ivf_otherprocedure_CVS" for="x_CVS" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_CVS" type="text/html"><?php echo $ivf_otherprocedure_add->CVS->caption() ?><?php echo $ivf_otherprocedure_add->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->CVS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CVS" type="text/html"><span id="el_ivf_otherprocedure_CVS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->CVS->EditValue ?>"<?php echo $ivf_otherprocedure_add->CVS->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->CVS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->PA->Visible) { // PA ?>
	<div id="r_PA" class="form-group row">
		<label id="elh_ivf_otherprocedure_PA" for="x_PA" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_PA" type="text/html"><?php echo $ivf_otherprocedure_add->PA->caption() ?><?php echo $ivf_otherprocedure_add->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->PA->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PA" type="text/html"><span id="el_ivf_otherprocedure_PA">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->PA->EditValue ?>"<?php echo $ivf_otherprocedure_add->PA->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->PA->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->InvestigationReport->Visible) { // InvestigationReport ?>
	<div id="r_InvestigationReport" class="form-group row">
		<label id="elh_ivf_otherprocedure_InvestigationReport" for="x_InvestigationReport" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_InvestigationReport" type="text/html"><?php echo $ivf_otherprocedure_add->InvestigationReport->caption() ?><?php echo $ivf_otherprocedure_add->InvestigationReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->InvestigationReport->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_InvestigationReport" type="text/html"><span id="el_ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x_InvestigationReport" id="x_InvestigationReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->InvestigationReport->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->InvestigationReport->editAttributes() ?>><?php echo $ivf_otherprocedure_add->InvestigationReport->EditValue ?></textarea>
</span></script>
<?php echo $ivf_otherprocedure_add->InvestigationReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<div id="r_FinalDiagnosis" class="form-group row">
		<label id="elh_ivf_otherprocedure_FinalDiagnosis" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FinalDiagnosis" type="text/html"><?php echo $ivf_otherprocedure_add->FinalDiagnosis->caption() ?><?php echo $ivf_otherprocedure_add->FinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FinalDiagnosis" type="text/html"><span id="el_ivf_otherprocedure_FinalDiagnosis">
<?php $ivf_otherprocedure_add->FinalDiagnosis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->FinalDiagnosis->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->FinalDiagnosis->editAttributes() ?>><?php echo $ivf_otherprocedure_add->FinalDiagnosis->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_FinalDiagnosis", 0, 0, <?php echo $ivf_otherprocedure_add->FinalDiagnosis->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->FinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_ivf_otherprocedure_Treatment" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Treatment" type="text/html"><?php echo $ivf_otherprocedure_add->Treatment->caption() ?><?php echo $ivf_otherprocedure_add->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Treatment" type="text/html"><span id="el_ivf_otherprocedure_Treatment">
<?php $ivf_otherprocedure_add->Treatment->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Treatment->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->Treatment->editAttributes() ?>><?php echo $ivf_otherprocedure_add->Treatment->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_Treatment", 35, 4, <?php echo $ivf_otherprocedure_add->Treatment->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->DetailOfOperation->Visible) { // DetailOfOperation ?>
	<div id="r_DetailOfOperation" class="form-group row">
		<label id="elh_ivf_otherprocedure_DetailOfOperation" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_DetailOfOperation" type="text/html"><?php echo $ivf_otherprocedure_add->DetailOfOperation->caption() ?><?php echo $ivf_otherprocedure_add->DetailOfOperation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->DetailOfOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DetailOfOperation" type="text/html"><span id="el_ivf_otherprocedure_DetailOfOperation">
<?php $ivf_otherprocedure_add->DetailOfOperation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_DetailOfOperation" name="x_DetailOfOperation" id="x_DetailOfOperation" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->DetailOfOperation->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->DetailOfOperation->editAttributes() ?>><?php echo $ivf_otherprocedure_add->DetailOfOperation->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_DetailOfOperation", 35, 4, <?php echo $ivf_otherprocedure_add->DetailOfOperation->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->DetailOfOperation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
	<div id="r_FollowUpAdvice" class="form-group row">
		<label id="elh_ivf_otherprocedure_FollowUpAdvice" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FollowUpAdvice" type="text/html"><?php echo $ivf_otherprocedure_add->FollowUpAdvice->caption() ?><?php echo $ivf_otherprocedure_add->FollowUpAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->FollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpAdvice" type="text/html"><span id="el_ivf_otherprocedure_FollowUpAdvice">
<?php $ivf_otherprocedure_add->FollowUpAdvice->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpAdvice" name="x_FollowUpAdvice" id="x_FollowUpAdvice" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->FollowUpAdvice->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->FollowUpAdvice->editAttributes() ?>><?php echo $ivf_otherprocedure_add->FollowUpAdvice->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_FollowUpAdvice", 35, 4, <?php echo $ivf_otherprocedure_add->FollowUpAdvice->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->FollowUpAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->FollowUpMedication->Visible) { // FollowUpMedication ?>
	<div id="r_FollowUpMedication" class="form-group row">
		<label id="elh_ivf_otherprocedure_FollowUpMedication" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_FollowUpMedication" type="text/html"><?php echo $ivf_otherprocedure_add->FollowUpMedication->caption() ?><?php echo $ivf_otherprocedure_add->FollowUpMedication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->FollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpMedication" type="text/html"><span id="el_ivf_otherprocedure_FollowUpMedication">
<?php $ivf_otherprocedure_add->FollowUpMedication->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpMedication" name="x_FollowUpMedication" id="x_FollowUpMedication" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->FollowUpMedication->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->FollowUpMedication->editAttributes() ?>><?php echo $ivf_otherprocedure_add->FollowUpMedication->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_FollowUpMedication", 35, 4, <?php echo $ivf_otherprocedure_add->FollowUpMedication->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->FollowUpMedication->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->Plan->Visible) { // Plan ?>
	<div id="r_Plan" class="form-group row">
		<label id="elh_ivf_otherprocedure_Plan" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_Plan" type="text/html"><?php echo $ivf_otherprocedure_add->Plan->caption() ?><?php echo $ivf_otherprocedure_add->Plan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->Plan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Plan" type="text/html"><span id="el_ivf_otherprocedure_Plan">
<?php $ivf_otherprocedure_add->Plan->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Plan" name="x_Plan" id="x_Plan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->Plan->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->Plan->editAttributes() ?>><?php echo $ivf_otherprocedure_add->Plan->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_otherprocedureadd_js">
loadjs.ready(["fivf_otherprocedureadd", "editor"], function() {
	ew.createEditor("fivf_otherprocedureadd", "x_Plan", 35, 4, <?php echo $ivf_otherprocedure_add->Plan->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_otherprocedure_add->Plan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
	<div id="r_TempleteFinalDiagnosis" class="form-group row">
		<label id="elh_ivf_otherprocedure_TempleteFinalDiagnosis" for="x_TempleteFinalDiagnosis" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis" type="text/html"><?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->caption() ?><?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis" type="text/html"><span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<?php $ivf_otherprocedure_add->TempleteFinalDiagnosis->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TempleteFinalDiagnosis" data-value-separator="<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->displayValueSeparatorAttribute() ?>" id="x_TempleteFinalDiagnosis" name="x_TempleteFinalDiagnosis"<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->selectOptionListHtml("x_TempleteFinalDiagnosis") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TempleteFinalDiagnosis->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TempleteFinalDiagnosis" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TempleteFinalDiagnosis->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TempleteFinalDiagnosis',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TempleteFinalDiagnosis") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TempleteFinalDiagnosis->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TemplateTreatment->Visible) { // TemplateTreatment ?>
	<div id="r_TemplateTreatment" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateTreatment" for="x_TemplateTreatment" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateTreatment" type="text/html"><?php echo $ivf_otherprocedure_add->TemplateTreatment->caption() ?><?php echo $ivf_otherprocedure_add->TemplateTreatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TemplateTreatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateTreatment" type="text/html"><span id="el_ivf_otherprocedure_TemplateTreatment">
<?php $ivf_otherprocedure_add->TemplateTreatment->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateTreatment" data-value-separator="<?php echo $ivf_otherprocedure_add->TemplateTreatment->displayValueSeparatorAttribute() ?>" id="x_TemplateTreatment" name="x_TemplateTreatment"<?php echo $ivf_otherprocedure_add->TemplateTreatment->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TemplateTreatment->selectOptionListHtml("x_TemplateTreatment") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TemplateTreatment->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateTreatment" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TemplateTreatment->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TemplateTreatment->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateTreatment',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TemplateTreatment->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TemplateTreatment") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TemplateTreatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TemplateOperation->Visible) { // TemplateOperation ?>
	<div id="r_TemplateOperation" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateOperation" for="x_TemplateOperation" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateOperation" type="text/html"><?php echo $ivf_otherprocedure_add->TemplateOperation->caption() ?><?php echo $ivf_otherprocedure_add->TemplateOperation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TemplateOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateOperation" type="text/html"><span id="el_ivf_otherprocedure_TemplateOperation">
<?php $ivf_otherprocedure_add->TemplateOperation->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateOperation" data-value-separator="<?php echo $ivf_otherprocedure_add->TemplateOperation->displayValueSeparatorAttribute() ?>" id="x_TemplateOperation" name="x_TemplateOperation"<?php echo $ivf_otherprocedure_add->TemplateOperation->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TemplateOperation->selectOptionListHtml("x_TemplateOperation") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TemplateOperation->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateOperation" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TemplateOperation->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TemplateOperation->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateOperation',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TemplateOperation->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TemplateOperation") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TemplateOperation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
	<div id="r_TemplateFollowUpAdvice" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateFollowUpAdvice" for="x_TemplateFollowUpAdvice" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice" type="text/html"><?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->caption() ?><?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice" type="text/html"><span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<?php $ivf_otherprocedure_add->TemplateFollowUpAdvice->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateFollowUpAdvice" data-value-separator="<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpAdvice" name="x_TemplateFollowUpAdvice"<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->selectOptionListHtml("x_TemplateFollowUpAdvice") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TemplateFollowUpAdvice->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvice" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TemplateFollowUpAdvice->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvice',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TemplateFollowUpAdvice") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TemplateFollowUpAdvice->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
	<div id="r_TemplateFollowUpMedication" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplateFollowUpMedication" for="x_TemplateFollowUpMedication" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplateFollowUpMedication" type="text/html"><?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->caption() ?><?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpMedication" type="text/html"><span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<?php $ivf_otherprocedure_add->TemplateFollowUpMedication->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplateFollowUpMedication" data-value-separator="<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpMedication" name="x_TemplateFollowUpMedication"<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->selectOptionListHtml("x_TemplateFollowUpMedication") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TemplateFollowUpMedication->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpMedication" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TemplateFollowUpMedication->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpMedication',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TemplateFollowUpMedication") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TemplateFollowUpMedication->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TemplatePlan->Visible) { // TemplatePlan ?>
	<div id="r_TemplatePlan" class="form-group row">
		<label id="elh_ivf_otherprocedure_TemplatePlan" for="x_TemplatePlan" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TemplatePlan" type="text/html"><?php echo $ivf_otherprocedure_add->TemplatePlan->caption() ?><?php echo $ivf_otherprocedure_add->TemplatePlan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TemplatePlan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplatePlan" type="text/html"><span id="el_ivf_otherprocedure_TemplatePlan">
<?php $ivf_otherprocedure_add->TemplatePlan->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_TemplatePlan" data-value-separator="<?php echo $ivf_otherprocedure_add->TemplatePlan->displayValueSeparatorAttribute() ?>" id="x_TemplatePlan" name="x_TemplatePlan"<?php echo $ivf_otherprocedure_add->TemplatePlan->editAttributes() ?>>
			<?php echo $ivf_otherprocedure_add->TemplatePlan->selectOptionListHtml("x_TemplatePlan") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_otherprocedure_add->TemplatePlan->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlan" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure_add->TemplatePlan->caption() ?>" data-title="<?php echo $ivf_otherprocedure_add->TemplatePlan->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlan',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_otherprocedure_add->TemplatePlan->Lookup->getParamTag($ivf_otherprocedure_add, "p_x_TemplatePlan") ?>
</span></script>
<?php echo $ivf_otherprocedure_add->TemplatePlan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->QRCode->Visible) { // QRCode ?>
	<div id="r_QRCode" class="form-group row">
		<label id="elh_ivf_otherprocedure_QRCode" for="x_QRCode" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_QRCode" type="text/html"><?php echo $ivf_otherprocedure_add->QRCode->caption() ?><?php echo $ivf_otherprocedure_add->QRCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->QRCode->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_QRCode" type="text/html"><span id="el_ivf_otherprocedure_QRCode">
<textarea data-table="ivf_otherprocedure" data-field="x_QRCode" name="x_QRCode" id="x_QRCode" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->QRCode->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure_add->QRCode->editAttributes() ?>><?php echo $ivf_otherprocedure_add->QRCode->EditValue ?></textarea>
</span></script>
<?php echo $ivf_otherprocedure_add->QRCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_otherprocedure_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_otherprocedure_TidNo" for="x_TidNo" class="<?php echo $ivf_otherprocedure_add->LeftColumnClass ?>"><script id="tpc_ivf_otherprocedure_TidNo" type="text/html"><?php echo $ivf_otherprocedure_add->TidNo->caption() ?><?php echo $ivf_otherprocedure_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_otherprocedure_add->RightColumnClass ?>"><div <?php echo $ivf_otherprocedure_add->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TidNo" type="text/html"><span id="el_ivf_otherprocedure_TidNo">
<input type="text" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure_add->TidNo->EditValue ?>"<?php echo $ivf_otherprocedure_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_otherprocedure_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_otherprocedureadd" class="ew-custom-template"></div>
<script id="tpm_ivf_otherprocedureadd" type="text/html">
<div id="ct_ivf_otherprocedure_add"><style>
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
{{include tmpl="#tpc_ivf_otherprocedure_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_RIDNO")/}}
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofAdmission"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofAdmission")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofProcedure")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DateofDischarge"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DateofDischarge")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_ProcedureDone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_ProcedureDone")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Consultant")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Surgeon")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Anesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Anesthetist")/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_InvestigationReport"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_InvestigationReport")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TempleteFinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TempleteFinalDiagnosis")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FinalDiagnosis")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateTreatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateTreatment")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Treatment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Treatment")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateOperation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateOperation")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_DetailOfOperation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_DetailOfOperation")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpAdvice"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateFollowUpAdvice")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpAdvice"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FollowUpAdvice")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplateFollowUpMedication"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplateFollowUpMedication")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_FollowUpMedication"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_FollowUpMedication")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_otherprocedure_TemplatePlan"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_TemplatePlan")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_otherprocedure_Plan"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_otherprocedure_Plan")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$ivf_otherprocedure_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_otherprocedure_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_otherprocedure_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_otherprocedure->Rows) ?> };
	ew.applyTemplate("tpd_ivf_otherprocedureadd", "tpm_ivf_otherprocedureadd", "ivf_otherprocedureadd", "<?php echo $ivf_otherprocedure->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_otherprocedureadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_otherprocedure_add->showPageFooter();
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
$ivf_otherprocedure_add->terminate();
?>