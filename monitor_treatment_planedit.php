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
$monitor_treatment_plan_edit = new monitor_treatment_plan_edit();

// Run the page
$monitor_treatment_plan_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$monitor_treatment_plan_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmonitor_treatment_planedit = currentForm = new ew.Form("fmonitor_treatment_planedit", "edit");

// Validate form
fmonitor_treatment_planedit.validate = function() {
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
		<?php if ($monitor_treatment_plan_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->id->caption(), $monitor_treatment_plan->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->PatId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->PatId->caption(), $monitor_treatment_plan->PatId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->PatientId->caption(), $monitor_treatment_plan->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->PatientName->caption(), $monitor_treatment_plan->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->Age->caption(), $monitor_treatment_plan->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->MobileNo->caption(), $monitor_treatment_plan->MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->ConsultantName->Required) { ?>
			elm = this.getElements("x" + infix + "_ConsultantName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->ConsultantName->caption(), $monitor_treatment_plan->ConsultantName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->RefDrName->Required) { ?>
			elm = this.getElements("x" + infix + "_RefDrName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->RefDrName->caption(), $monitor_treatment_plan->RefDrName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->RefDrMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RefDrMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->RefDrMobileNo->caption(), $monitor_treatment_plan->RefDrMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->NewVisitDate->Required) { ?>
			elm = this.getElements("x" + infix + "_NewVisitDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->NewVisitDate->caption(), $monitor_treatment_plan->NewVisitDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NewVisitDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->NewVisitDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->NewVisitYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_NewVisitYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->NewVisitYesNo->caption(), $monitor_treatment_plan->NewVisitYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->Treatment->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->Treatment->caption(), $monitor_treatment_plan->Treatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->IUIDoneDate1->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneDate1->caption(), $monitor_treatment_plan->IUIDoneDate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate1");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->IUIDoneDate1->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->IUIDoneYesNo1->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneYesNo1[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneYesNo1->caption(), $monitor_treatment_plan->IUIDoneYesNo1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->UPTTestDate1->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestDate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestDate1->caption(), $monitor_treatment_plan->UPTTestDate1->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UPTTestDate1");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->UPTTestDate1->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->UPTTestYesNo1->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestYesNo1[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestYesNo1->caption(), $monitor_treatment_plan->UPTTestYesNo1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->IUIDoneDate2->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneDate2->caption(), $monitor_treatment_plan->IUIDoneDate2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate2");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->IUIDoneDate2->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->IUIDoneYesNo2->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneYesNo2[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneYesNo2->caption(), $monitor_treatment_plan->IUIDoneYesNo2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->UPTTestDate2->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestDate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestDate2->caption(), $monitor_treatment_plan->UPTTestDate2->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UPTTestDate2");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->UPTTestDate2->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->UPTTestYesNo2->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestYesNo2[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestYesNo2->caption(), $monitor_treatment_plan->UPTTestYesNo2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->IUIDoneDate3->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneDate3->caption(), $monitor_treatment_plan->IUIDoneDate3->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate3");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->IUIDoneDate3->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->IUIDoneYesNo3->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneYesNo3[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneYesNo3->caption(), $monitor_treatment_plan->IUIDoneYesNo3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->UPTTestDate3->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestDate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestDate3->caption(), $monitor_treatment_plan->UPTTestDate3->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UPTTestDate3");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->UPTTestDate3->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->UPTTestYesNo3->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestYesNo3[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestYesNo3->caption(), $monitor_treatment_plan->UPTTestYesNo3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->IUIDoneDate4->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneDate4->caption(), $monitor_treatment_plan->IUIDoneDate4->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IUIDoneDate4");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->IUIDoneDate4->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->IUIDoneYesNo4->Required) { ?>
			elm = this.getElements("x" + infix + "_IUIDoneYesNo4[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IUIDoneYesNo4->caption(), $monitor_treatment_plan->IUIDoneYesNo4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->UPTTestDate4->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestDate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestDate4->caption(), $monitor_treatment_plan->UPTTestDate4->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_UPTTestDate4");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->UPTTestDate4->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->UPTTestYesNo4->Required) { ?>
			elm = this.getElements("x" + infix + "_UPTTestYesNo4[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->UPTTestYesNo4->caption(), $monitor_treatment_plan->UPTTestYesNo4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->IVFStimulationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_IVFStimulationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IVFStimulationDate->caption(), $monitor_treatment_plan->IVFStimulationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IVFStimulationDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->IVFStimulationDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->IVFStimulationYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_IVFStimulationYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->IVFStimulationYesNo->caption(), $monitor_treatment_plan->IVFStimulationYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->OPUDate->Required) { ?>
			elm = this.getElements("x" + infix + "_OPUDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->OPUDate->caption(), $monitor_treatment_plan->OPUDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OPUDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->OPUDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->OPUYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OPUYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->OPUYesNo->caption(), $monitor_treatment_plan->OPUYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->ETDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->ETDate->caption(), $monitor_treatment_plan->ETDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ETDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->ETDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->ETYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_ETYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->ETYesNo->caption(), $monitor_treatment_plan->ETYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->BetaHCGDate->Required) { ?>
			elm = this.getElements("x" + infix + "_BetaHCGDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->BetaHCGDate->caption(), $monitor_treatment_plan->BetaHCGDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BetaHCGDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->BetaHCGDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->BetaHCGYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_BetaHCGYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->BetaHCGYesNo->caption(), $monitor_treatment_plan->BetaHCGYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->FETDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FETDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->FETDate->caption(), $monitor_treatment_plan->FETDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FETDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->FETDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->FETYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_FETYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->FETYesNo->caption(), $monitor_treatment_plan->FETYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->FBetaHCGDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FBetaHCGDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->FBetaHCGDate->caption(), $monitor_treatment_plan->FBetaHCGDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FBetaHCGDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($monitor_treatment_plan->FBetaHCGDate->errorMessage()) ?>");
		<?php if ($monitor_treatment_plan_edit->FBetaHCGYesNo->Required) { ?>
			elm = this.getElements("x" + infix + "_FBetaHCGYesNo[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->FBetaHCGYesNo->caption(), $monitor_treatment_plan->FBetaHCGYesNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->createdby->caption(), $monitor_treatment_plan->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->createddatetime->caption(), $monitor_treatment_plan->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->modifiedby->caption(), $monitor_treatment_plan->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->modifieddatetime->caption(), $monitor_treatment_plan->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($monitor_treatment_plan_edit->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $monitor_treatment_plan->HospID->caption(), $monitor_treatment_plan->HospID->RequiredErrorMessage)) ?>");
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
fmonitor_treatment_planedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmonitor_treatment_planedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmonitor_treatment_planedit.lists["x_PatId"] = <?php echo $monitor_treatment_plan_edit->PatId->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_PatId"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->PatId->lookupOptions()) ?>;
fmonitor_treatment_planedit.lists["x_NewVisitYesNo[]"] = <?php echo $monitor_treatment_plan_edit->NewVisitYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_NewVisitYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->NewVisitYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_Treatment"] = <?php echo $monitor_treatment_plan_edit->Treatment->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_Treatment"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->Treatment->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo1[]"] = <?php echo $monitor_treatment_plan_edit->IUIDoneYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->IUIDoneYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo1[]"] = <?php echo $monitor_treatment_plan_edit->UPTTestYesNo1->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo1[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->UPTTestYesNo1->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo2[]"] = <?php echo $monitor_treatment_plan_edit->IUIDoneYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->IUIDoneYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo2[]"] = <?php echo $monitor_treatment_plan_edit->UPTTestYesNo2->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo2[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->UPTTestYesNo2->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo3[]"] = <?php echo $monitor_treatment_plan_edit->IUIDoneYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->IUIDoneYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo3[]"] = <?php echo $monitor_treatment_plan_edit->UPTTestYesNo3->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo3[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->UPTTestYesNo3->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo4[]"] = <?php echo $monitor_treatment_plan_edit->IUIDoneYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_IUIDoneYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->IUIDoneYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo4[]"] = <?php echo $monitor_treatment_plan_edit->UPTTestYesNo4->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_UPTTestYesNo4[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->UPTTestYesNo4->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_IVFStimulationYesNo[]"] = <?php echo $monitor_treatment_plan_edit->IVFStimulationYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_IVFStimulationYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->IVFStimulationYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_OPUYesNo[]"] = <?php echo $monitor_treatment_plan_edit->OPUYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_OPUYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->OPUYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_ETYesNo[]"] = <?php echo $monitor_treatment_plan_edit->ETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_ETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->ETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_BetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_edit->BetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_BetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->BetaHCGYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_FETYesNo[]"] = <?php echo $monitor_treatment_plan_edit->FETYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_FETYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->FETYesNo->options(FALSE, TRUE)) ?>;
fmonitor_treatment_planedit.lists["x_FBetaHCGYesNo[]"] = <?php echo $monitor_treatment_plan_edit->FBetaHCGYesNo->Lookup->toClientList() ?>;
fmonitor_treatment_planedit.lists["x_FBetaHCGYesNo[]"].options = <?php echo JsonEncode($monitor_treatment_plan_edit->FBetaHCGYesNo->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $monitor_treatment_plan_edit->showPageHeader(); ?>
<?php
$monitor_treatment_plan_edit->showMessage();
?>
<form name="fmonitor_treatment_planedit" id="fmonitor_treatment_planedit" class="<?php echo $monitor_treatment_plan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($monitor_treatment_plan_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $monitor_treatment_plan_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$monitor_treatment_plan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($monitor_treatment_plan->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_monitor_treatment_plan_id" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->id->caption() ?><?php echo ($monitor_treatment_plan->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->id->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_id">
<span<?php echo $monitor_treatment_plan->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($monitor_treatment_plan->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="monitor_treatment_plan" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($monitor_treatment_plan->id->CurrentValue) ?>">
<?php echo $monitor_treatment_plan->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->PatId->Visible) { // PatId ?>
	<div id="r_PatId" class="form-group row">
		<label id="elh_monitor_treatment_plan_PatId" for="x_PatId" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->PatId->caption() ?><?php echo ($monitor_treatment_plan->PatId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->PatId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatId">
<?php $monitor_treatment_plan->PatId->EditAttrs["onchange"] = "ew.autoFill(this);" . @$monitor_treatment_plan->PatId->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?php echo strval($monitor_treatment_plan->PatId->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($monitor_treatment_plan->PatId->ViewValue) : $monitor_treatment_plan->PatId->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($monitor_treatment_plan->PatId->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($monitor_treatment_plan->PatId->ReadOnly || $monitor_treatment_plan->PatId->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $monitor_treatment_plan->PatId->Lookup->getParamTag("p_x_PatId") ?>
<input type="hidden" data-table="monitor_treatment_plan" data-field="x_PatId" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $monitor_treatment_plan->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?php echo $monitor_treatment_plan->PatId->CurrentValue ?>"<?php echo $monitor_treatment_plan->PatId->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->PatId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_monitor_treatment_plan_PatientId" for="x_PatientId" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->PatientId->caption() ?><?php echo ($monitor_treatment_plan->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->PatientId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientId">
<input type="text" data-table="monitor_treatment_plan" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->PatientId->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->PatientId->EditValue ?>"<?php echo $monitor_treatment_plan->PatientId->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_monitor_treatment_plan_PatientName" for="x_PatientName" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->PatientName->caption() ?><?php echo ($monitor_treatment_plan->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->PatientName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientName">
<input type="text" data-table="monitor_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->PatientName->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->PatientName->EditValue ?>"<?php echo $monitor_treatment_plan->PatientName->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->Age->Visible) { // Age ?>
	<div id="r_Age" class="form-group row">
		<label id="elh_monitor_treatment_plan_Age" for="x_Age" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->Age->caption() ?><?php echo ($monitor_treatment_plan->Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->Age->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Age">
<input type="text" data-table="monitor_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->Age->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->Age->EditValue ?>"<?php echo $monitor_treatment_plan->Age->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->MobileNo->Visible) { // MobileNo ?>
	<div id="r_MobileNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_MobileNo" for="x_MobileNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->MobileNo->caption() ?><?php echo ($monitor_treatment_plan->MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->MobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_MobileNo">
<input type="text" data-table="monitor_treatment_plan" data-field="x_MobileNo" name="x_MobileNo" id="x_MobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->MobileNo->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->MobileNo->EditValue ?>"<?php echo $monitor_treatment_plan->MobileNo->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->ConsultantName->Visible) { // ConsultantName ?>
	<div id="r_ConsultantName" class="form-group row">
		<label id="elh_monitor_treatment_plan_ConsultantName" for="x_ConsultantName" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->ConsultantName->caption() ?><?php echo ($monitor_treatment_plan->ConsultantName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->ConsultantName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ConsultantName">
<input type="text" data-table="monitor_treatment_plan" data-field="x_ConsultantName" name="x_ConsultantName" id="x_ConsultantName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->ConsultantName->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->ConsultantName->EditValue ?>"<?php echo $monitor_treatment_plan->ConsultantName->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->ConsultantName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrName->Visible) { // RefDrName ?>
	<div id="r_RefDrName" class="form-group row">
		<label id="elh_monitor_treatment_plan_RefDrName" for="x_RefDrName" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->RefDrName->caption() ?><?php echo ($monitor_treatment_plan->RefDrName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->RefDrName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrName">
<input type="text" data-table="monitor_treatment_plan" data-field="x_RefDrName" name="x_RefDrName" id="x_RefDrName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->RefDrName->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->RefDrName->EditValue ?>"<?php echo $monitor_treatment_plan->RefDrName->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->RefDrName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
	<div id="r_RefDrMobileNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_RefDrMobileNo" for="x_RefDrMobileNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->RefDrMobileNo->caption() ?><?php echo ($monitor_treatment_plan->RefDrMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->RefDrMobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrMobileNo">
<input type="text" data-table="monitor_treatment_plan" data-field="x_RefDrMobileNo" name="x_RefDrMobileNo" id="x_RefDrMobileNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->RefDrMobileNo->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->RefDrMobileNo->EditValue ?>"<?php echo $monitor_treatment_plan->RefDrMobileNo->editAttributes() ?>>
</span>
<?php echo $monitor_treatment_plan->RefDrMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitDate->Visible) { // NewVisitDate ?>
	<div id="r_NewVisitDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_NewVisitDate" for="x_NewVisitDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->NewVisitDate->caption() ?><?php echo ($monitor_treatment_plan->NewVisitDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->NewVisitDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_NewVisitDate" data-format="7" name="x_NewVisitDate" id="x_NewVisitDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->NewVisitDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->NewVisitDate->EditValue ?>"<?php echo $monitor_treatment_plan->NewVisitDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->NewVisitDate->ReadOnly && !$monitor_treatment_plan->NewVisitDate->Disabled && !isset($monitor_treatment_plan->NewVisitDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->NewVisitDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_NewVisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->NewVisitDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
	<div id="r_NewVisitYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_NewVisitYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->NewVisitYesNo->caption() ?><?php echo ($monitor_treatment_plan->NewVisitYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->NewVisitYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitYesNo">
<div id="tp_x_NewVisitYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_NewVisitYesNo" data-value-separator="<?php echo $monitor_treatment_plan->NewVisitYesNo->displayValueSeparatorAttribute() ?>" name="x_NewVisitYesNo[]" id="x_NewVisitYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->NewVisitYesNo->editAttributes() ?>></div>
<div id="dsl_x_NewVisitYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->NewVisitYesNo->checkBoxListHtml(FALSE, "x_NewVisitYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->NewVisitYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->Treatment->Visible) { // Treatment ?>
	<div id="r_Treatment" class="form-group row">
		<label id="elh_monitor_treatment_plan_Treatment" for="x_Treatment" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->Treatment->caption() ?><?php echo ($monitor_treatment_plan->Treatment->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->Treatment->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="monitor_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $monitor_treatment_plan->Treatment->displayValueSeparatorAttribute() ?>" id="x_Treatment" name="x_Treatment"<?php echo $monitor_treatment_plan->Treatment->editAttributes() ?>>
		<?php echo $monitor_treatment_plan->Treatment->selectOptionListHtml("x_Treatment") ?>
	</select>
</div>
</span>
<?php echo $monitor_treatment_plan->Treatment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
	<div id="r_IUIDoneDate1" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneDate1" for="x_IUIDoneDate1" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneDate1->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneDate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate1">
<input type="text" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate1" data-format="7" name="x_IUIDoneDate1" id="x_IUIDoneDate1" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->IUIDoneDate1->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->IUIDoneDate1->EditValue ?>"<?php echo $monitor_treatment_plan->IUIDoneDate1->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->IUIDoneDate1->ReadOnly && !$monitor_treatment_plan->IUIDoneDate1->Disabled && !isset($monitor_treatment_plan->IUIDoneDate1->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->IUIDoneDate1->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_IUIDoneDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->IUIDoneDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
	<div id="r_IUIDoneYesNo1" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneYesNo1->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneYesNo1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<div id="tp_x_IUIDoneYesNo1" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo1" data-value-separator="<?php echo $monitor_treatment_plan->IUIDoneYesNo1->displayValueSeparatorAttribute() ?>" name="x_IUIDoneYesNo1[]" id="x_IUIDoneYesNo1[]" value="{value}"<?php echo $monitor_treatment_plan->IUIDoneYesNo1->editAttributes() ?>></div>
<div id="dsl_x_IUIDoneYesNo1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->IUIDoneYesNo1->checkBoxListHtml(FALSE, "x_IUIDoneYesNo1[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->IUIDoneYesNo1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate1->Visible) { // UPTTestDate1 ?>
	<div id="r_UPTTestDate1" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestDate1" for="x_UPTTestDate1" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestDate1->caption() ?><?php echo ($monitor_treatment_plan->UPTTestDate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate1">
<input type="text" data-table="monitor_treatment_plan" data-field="x_UPTTestDate1" data-format="7" name="x_UPTTestDate1" id="x_UPTTestDate1" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->UPTTestDate1->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->UPTTestDate1->EditValue ?>"<?php echo $monitor_treatment_plan->UPTTestDate1->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->UPTTestDate1->ReadOnly && !$monitor_treatment_plan->UPTTestDate1->Disabled && !isset($monitor_treatment_plan->UPTTestDate1->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->UPTTestDate1->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_UPTTestDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->UPTTestDate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
	<div id="r_UPTTestYesNo1" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestYesNo1" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestYesNo1->caption() ?><?php echo ($monitor_treatment_plan->UPTTestYesNo1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo1">
<div id="tp_x_UPTTestYesNo1" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo1" data-value-separator="<?php echo $monitor_treatment_plan->UPTTestYesNo1->displayValueSeparatorAttribute() ?>" name="x_UPTTestYesNo1[]" id="x_UPTTestYesNo1[]" value="{value}"<?php echo $monitor_treatment_plan->UPTTestYesNo1->editAttributes() ?>></div>
<div id="dsl_x_UPTTestYesNo1" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->UPTTestYesNo1->checkBoxListHtml(FALSE, "x_UPTTestYesNo1[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->UPTTestYesNo1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
	<div id="r_IUIDoneDate2" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneDate2" for="x_IUIDoneDate2" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneDate2->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneDate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate2">
<input type="text" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate2" data-format="7" name="x_IUIDoneDate2" id="x_IUIDoneDate2" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->IUIDoneDate2->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->IUIDoneDate2->EditValue ?>"<?php echo $monitor_treatment_plan->IUIDoneDate2->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->IUIDoneDate2->ReadOnly && !$monitor_treatment_plan->IUIDoneDate2->Disabled && !isset($monitor_treatment_plan->IUIDoneDate2->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->IUIDoneDate2->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_IUIDoneDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->IUIDoneDate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
	<div id="r_IUIDoneYesNo2" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneYesNo2->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneYesNo2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<div id="tp_x_IUIDoneYesNo2" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo2" data-value-separator="<?php echo $monitor_treatment_plan->IUIDoneYesNo2->displayValueSeparatorAttribute() ?>" name="x_IUIDoneYesNo2[]" id="x_IUIDoneYesNo2[]" value="{value}"<?php echo $monitor_treatment_plan->IUIDoneYesNo2->editAttributes() ?>></div>
<div id="dsl_x_IUIDoneYesNo2" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->IUIDoneYesNo2->checkBoxListHtml(FALSE, "x_IUIDoneYesNo2[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->IUIDoneYesNo2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate2->Visible) { // UPTTestDate2 ?>
	<div id="r_UPTTestDate2" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestDate2" for="x_UPTTestDate2" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestDate2->caption() ?><?php echo ($monitor_treatment_plan->UPTTestDate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate2">
<input type="text" data-table="monitor_treatment_plan" data-field="x_UPTTestDate2" data-format="7" name="x_UPTTestDate2" id="x_UPTTestDate2" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->UPTTestDate2->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->UPTTestDate2->EditValue ?>"<?php echo $monitor_treatment_plan->UPTTestDate2->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->UPTTestDate2->ReadOnly && !$monitor_treatment_plan->UPTTestDate2->Disabled && !isset($monitor_treatment_plan->UPTTestDate2->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->UPTTestDate2->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_UPTTestDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->UPTTestDate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
	<div id="r_UPTTestYesNo2" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestYesNo2" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestYesNo2->caption() ?><?php echo ($monitor_treatment_plan->UPTTestYesNo2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo2">
<div id="tp_x_UPTTestYesNo2" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo2" data-value-separator="<?php echo $monitor_treatment_plan->UPTTestYesNo2->displayValueSeparatorAttribute() ?>" name="x_UPTTestYesNo2[]" id="x_UPTTestYesNo2[]" value="{value}"<?php echo $monitor_treatment_plan->UPTTestYesNo2->editAttributes() ?>></div>
<div id="dsl_x_UPTTestYesNo2" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->UPTTestYesNo2->checkBoxListHtml(FALSE, "x_UPTTestYesNo2[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->UPTTestYesNo2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
	<div id="r_IUIDoneDate3" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneDate3" for="x_IUIDoneDate3" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneDate3->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneDate3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate3">
<input type="text" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate3" data-format="7" name="x_IUIDoneDate3" id="x_IUIDoneDate3" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->IUIDoneDate3->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->IUIDoneDate3->EditValue ?>"<?php echo $monitor_treatment_plan->IUIDoneDate3->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->IUIDoneDate3->ReadOnly && !$monitor_treatment_plan->IUIDoneDate3->Disabled && !isset($monitor_treatment_plan->IUIDoneDate3->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->IUIDoneDate3->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_IUIDoneDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->IUIDoneDate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
	<div id="r_IUIDoneYesNo3" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneYesNo3->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneYesNo3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<div id="tp_x_IUIDoneYesNo3" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo3" data-value-separator="<?php echo $monitor_treatment_plan->IUIDoneYesNo3->displayValueSeparatorAttribute() ?>" name="x_IUIDoneYesNo3[]" id="x_IUIDoneYesNo3[]" value="{value}"<?php echo $monitor_treatment_plan->IUIDoneYesNo3->editAttributes() ?>></div>
<div id="dsl_x_IUIDoneYesNo3" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->IUIDoneYesNo3->checkBoxListHtml(FALSE, "x_IUIDoneYesNo3[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->IUIDoneYesNo3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate3->Visible) { // UPTTestDate3 ?>
	<div id="r_UPTTestDate3" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestDate3" for="x_UPTTestDate3" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestDate3->caption() ?><?php echo ($monitor_treatment_plan->UPTTestDate3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate3">
<input type="text" data-table="monitor_treatment_plan" data-field="x_UPTTestDate3" data-format="7" name="x_UPTTestDate3" id="x_UPTTestDate3" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->UPTTestDate3->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->UPTTestDate3->EditValue ?>"<?php echo $monitor_treatment_plan->UPTTestDate3->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->UPTTestDate3->ReadOnly && !$monitor_treatment_plan->UPTTestDate3->Disabled && !isset($monitor_treatment_plan->UPTTestDate3->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->UPTTestDate3->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_UPTTestDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->UPTTestDate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
	<div id="r_UPTTestYesNo3" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestYesNo3" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestYesNo3->caption() ?><?php echo ($monitor_treatment_plan->UPTTestYesNo3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo3">
<div id="tp_x_UPTTestYesNo3" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo3" data-value-separator="<?php echo $monitor_treatment_plan->UPTTestYesNo3->displayValueSeparatorAttribute() ?>" name="x_UPTTestYesNo3[]" id="x_UPTTestYesNo3[]" value="{value}"<?php echo $monitor_treatment_plan->UPTTestYesNo3->editAttributes() ?>></div>
<div id="dsl_x_UPTTestYesNo3" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->UPTTestYesNo3->checkBoxListHtml(FALSE, "x_UPTTestYesNo3[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->UPTTestYesNo3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
	<div id="r_IUIDoneDate4" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneDate4" for="x_IUIDoneDate4" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneDate4->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneDate4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate4">
<input type="text" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate4" data-format="7" name="x_IUIDoneDate4" id="x_IUIDoneDate4" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->IUIDoneDate4->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->IUIDoneDate4->EditValue ?>"<?php echo $monitor_treatment_plan->IUIDoneDate4->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->IUIDoneDate4->ReadOnly && !$monitor_treatment_plan->IUIDoneDate4->Disabled && !isset($monitor_treatment_plan->IUIDoneDate4->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->IUIDoneDate4->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_IUIDoneDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->IUIDoneDate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
	<div id="r_IUIDoneYesNo4" class="form-group row">
		<label id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IUIDoneYesNo4->caption() ?><?php echo ($monitor_treatment_plan->IUIDoneYesNo4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<div id="tp_x_IUIDoneYesNo4" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo4" data-value-separator="<?php echo $monitor_treatment_plan->IUIDoneYesNo4->displayValueSeparatorAttribute() ?>" name="x_IUIDoneYesNo4[]" id="x_IUIDoneYesNo4[]" value="{value}"<?php echo $monitor_treatment_plan->IUIDoneYesNo4->editAttributes() ?>></div>
<div id="dsl_x_IUIDoneYesNo4" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->IUIDoneYesNo4->checkBoxListHtml(FALSE, "x_IUIDoneYesNo4[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->IUIDoneYesNo4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestDate4->Visible) { // UPTTestDate4 ?>
	<div id="r_UPTTestDate4" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestDate4" for="x_UPTTestDate4" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestDate4->caption() ?><?php echo ($monitor_treatment_plan->UPTTestDate4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate4">
<input type="text" data-table="monitor_treatment_plan" data-field="x_UPTTestDate4" data-format="7" name="x_UPTTestDate4" id="x_UPTTestDate4" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->UPTTestDate4->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->UPTTestDate4->EditValue ?>"<?php echo $monitor_treatment_plan->UPTTestDate4->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->UPTTestDate4->ReadOnly && !$monitor_treatment_plan->UPTTestDate4->Disabled && !isset($monitor_treatment_plan->UPTTestDate4->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->UPTTestDate4->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_UPTTestDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->UPTTestDate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
	<div id="r_UPTTestYesNo4" class="form-group row">
		<label id="elh_monitor_treatment_plan_UPTTestYesNo4" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->UPTTestYesNo4->caption() ?><?php echo ($monitor_treatment_plan->UPTTestYesNo4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->UPTTestYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo4">
<div id="tp_x_UPTTestYesNo4" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo4" data-value-separator="<?php echo $monitor_treatment_plan->UPTTestYesNo4->displayValueSeparatorAttribute() ?>" name="x_UPTTestYesNo4[]" id="x_UPTTestYesNo4[]" value="{value}"<?php echo $monitor_treatment_plan->UPTTestYesNo4->editAttributes() ?>></div>
<div id="dsl_x_UPTTestYesNo4" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->UPTTestYesNo4->checkBoxListHtml(FALSE, "x_UPTTestYesNo4[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->UPTTestYesNo4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
	<div id="r_IVFStimulationDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_IVFStimulationDate" for="x_IVFStimulationDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IVFStimulationDate->caption() ?><?php echo ($monitor_treatment_plan->IVFStimulationDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IVFStimulationDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_IVFStimulationDate" data-format="7" name="x_IVFStimulationDate" id="x_IVFStimulationDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->IVFStimulationDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->IVFStimulationDate->EditValue ?>"<?php echo $monitor_treatment_plan->IVFStimulationDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->IVFStimulationDate->ReadOnly && !$monitor_treatment_plan->IVFStimulationDate->Disabled && !isset($monitor_treatment_plan->IVFStimulationDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->IVFStimulationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_IVFStimulationDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->IVFStimulationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
	<div id="r_IVFStimulationYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->IVFStimulationYesNo->caption() ?><?php echo ($monitor_treatment_plan->IVFStimulationYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<div id="tp_x_IVFStimulationYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_IVFStimulationYesNo" data-value-separator="<?php echo $monitor_treatment_plan->IVFStimulationYesNo->displayValueSeparatorAttribute() ?>" name="x_IVFStimulationYesNo[]" id="x_IVFStimulationYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->IVFStimulationYesNo->editAttributes() ?>></div>
<div id="dsl_x_IVFStimulationYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->IVFStimulationYesNo->checkBoxListHtml(FALSE, "x_IVFStimulationYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->IVFStimulationYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUDate->Visible) { // OPUDate ?>
	<div id="r_OPUDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_OPUDate" for="x_OPUDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->OPUDate->caption() ?><?php echo ($monitor_treatment_plan->OPUDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->OPUDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_OPUDate" data-format="7" name="x_OPUDate" id="x_OPUDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->OPUDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->OPUDate->EditValue ?>"<?php echo $monitor_treatment_plan->OPUDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->OPUDate->ReadOnly && !$monitor_treatment_plan->OPUDate->Disabled && !isset($monitor_treatment_plan->OPUDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->OPUDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_OPUDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->OPUDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->OPUYesNo->Visible) { // OPUYesNo ?>
	<div id="r_OPUYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_OPUYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->OPUYesNo->caption() ?><?php echo ($monitor_treatment_plan->OPUYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->OPUYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUYesNo">
<div id="tp_x_OPUYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_OPUYesNo" data-value-separator="<?php echo $monitor_treatment_plan->OPUYesNo->displayValueSeparatorAttribute() ?>" name="x_OPUYesNo[]" id="x_OPUYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->OPUYesNo->editAttributes() ?>></div>
<div id="dsl_x_OPUYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->OPUYesNo->checkBoxListHtml(FALSE, "x_OPUYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->OPUYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->ETDate->Visible) { // ETDate ?>
	<div id="r_ETDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_ETDate" for="x_ETDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->ETDate->caption() ?><?php echo ($monitor_treatment_plan->ETDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->ETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_ETDate" data-format="7" name="x_ETDate" id="x_ETDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->ETDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->ETDate->EditValue ?>"<?php echo $monitor_treatment_plan->ETDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->ETDate->ReadOnly && !$monitor_treatment_plan->ETDate->Disabled && !isset($monitor_treatment_plan->ETDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->ETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->ETDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->ETYesNo->Visible) { // ETYesNo ?>
	<div id="r_ETYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_ETYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->ETYesNo->caption() ?><?php echo ($monitor_treatment_plan->ETYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->ETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETYesNo">
<div id="tp_x_ETYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_ETYesNo" data-value-separator="<?php echo $monitor_treatment_plan->ETYesNo->displayValueSeparatorAttribute() ?>" name="x_ETYesNo[]" id="x_ETYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->ETYesNo->editAttributes() ?>></div>
<div id="dsl_x_ETYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->ETYesNo->checkBoxListHtml(FALSE, "x_ETYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->ETYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGDate->Visible) { // BetaHCGDate ?>
	<div id="r_BetaHCGDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_BetaHCGDate" for="x_BetaHCGDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->BetaHCGDate->caption() ?><?php echo ($monitor_treatment_plan->BetaHCGDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->BetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_BetaHCGDate" data-format="7" name="x_BetaHCGDate" id="x_BetaHCGDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->BetaHCGDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->BetaHCGDate->EditValue ?>"<?php echo $monitor_treatment_plan->BetaHCGDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->BetaHCGDate->ReadOnly && !$monitor_treatment_plan->BetaHCGDate->Disabled && !isset($monitor_treatment_plan->BetaHCGDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->BetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_BetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->BetaHCGDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
	<div id="r_BetaHCGYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_BetaHCGYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->BetaHCGYesNo->caption() ?><?php echo ($monitor_treatment_plan->BetaHCGYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->BetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGYesNo">
<div id="tp_x_BetaHCGYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_BetaHCGYesNo" data-value-separator="<?php echo $monitor_treatment_plan->BetaHCGYesNo->displayValueSeparatorAttribute() ?>" name="x_BetaHCGYesNo[]" id="x_BetaHCGYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->BetaHCGYesNo->editAttributes() ?>></div>
<div id="dsl_x_BetaHCGYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->BetaHCGYesNo->checkBoxListHtml(FALSE, "x_BetaHCGYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->BetaHCGYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->FETDate->Visible) { // FETDate ?>
	<div id="r_FETDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_FETDate" for="x_FETDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->FETDate->caption() ?><?php echo ($monitor_treatment_plan->FETDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->FETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_FETDate" data-format="7" name="x_FETDate" id="x_FETDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->FETDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->FETDate->EditValue ?>"<?php echo $monitor_treatment_plan->FETDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->FETDate->ReadOnly && !$monitor_treatment_plan->FETDate->Disabled && !isset($monitor_treatment_plan->FETDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->FETDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_FETDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->FETDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->FETYesNo->Visible) { // FETYesNo ?>
	<div id="r_FETYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_FETYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->FETYesNo->caption() ?><?php echo ($monitor_treatment_plan->FETYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->FETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETYesNo">
<div id="tp_x_FETYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_FETYesNo" data-value-separator="<?php echo $monitor_treatment_plan->FETYesNo->displayValueSeparatorAttribute() ?>" name="x_FETYesNo[]" id="x_FETYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->FETYesNo->editAttributes() ?>></div>
<div id="dsl_x_FETYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->FETYesNo->checkBoxListHtml(FALSE, "x_FETYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->FETYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
	<div id="r_FBetaHCGDate" class="form-group row">
		<label id="elh_monitor_treatment_plan_FBetaHCGDate" for="x_FBetaHCGDate" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->FBetaHCGDate->caption() ?><?php echo ($monitor_treatment_plan->FBetaHCGDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->FBetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGDate">
<input type="text" data-table="monitor_treatment_plan" data-field="x_FBetaHCGDate" data-format="7" name="x_FBetaHCGDate" id="x_FBetaHCGDate" placeholder="<?php echo HtmlEncode($monitor_treatment_plan->FBetaHCGDate->getPlaceHolder()) ?>" value="<?php echo $monitor_treatment_plan->FBetaHCGDate->EditValue ?>"<?php echo $monitor_treatment_plan->FBetaHCGDate->editAttributes() ?>>
<?php if (!$monitor_treatment_plan->FBetaHCGDate->ReadOnly && !$monitor_treatment_plan->FBetaHCGDate->Disabled && !isset($monitor_treatment_plan->FBetaHCGDate->EditAttrs["readonly"]) && !isset($monitor_treatment_plan->FBetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fmonitor_treatment_planedit", "x_FBetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $monitor_treatment_plan->FBetaHCGDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($monitor_treatment_plan->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
	<div id="r_FBetaHCGYesNo" class="form-group row">
		<label id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="<?php echo $monitor_treatment_plan_edit->LeftColumnClass ?>"><?php echo $monitor_treatment_plan->FBetaHCGYesNo->caption() ?><?php echo ($monitor_treatment_plan->FBetaHCGYesNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $monitor_treatment_plan_edit->RightColumnClass ?>"><div<?php echo $monitor_treatment_plan->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<div id="tp_x_FBetaHCGYesNo" class="ew-template"><input type="checkbox" class="form-check-input" data-table="monitor_treatment_plan" data-field="x_FBetaHCGYesNo" data-value-separator="<?php echo $monitor_treatment_plan->FBetaHCGYesNo->displayValueSeparatorAttribute() ?>" name="x_FBetaHCGYesNo[]" id="x_FBetaHCGYesNo[]" value="{value}"<?php echo $monitor_treatment_plan->FBetaHCGYesNo->editAttributes() ?>></div>
<div id="dsl_x_FBetaHCGYesNo" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $monitor_treatment_plan->FBetaHCGYesNo->checkBoxListHtml(FALSE, "x_FBetaHCGYesNo[]") ?>
</div></div>
</span>
<?php echo $monitor_treatment_plan->FBetaHCGYesNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$monitor_treatment_plan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $monitor_treatment_plan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $monitor_treatment_plan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$monitor_treatment_plan_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$monitor_treatment_plan_edit->terminate();
?>