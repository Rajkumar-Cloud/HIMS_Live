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
$ivf_ovum_pick_up_chart_edit = new ivf_ovum_pick_up_chart_edit();

// Run the page
$ivf_ovum_pick_up_chart_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_ovum_pick_up_chartedit = currentForm = new ew.Form("fivf_ovum_pick_up_chartedit", "edit");

// Validate form
fivf_ovum_pick_up_chartedit.validate = function() {
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
		<?php if ($ivf_ovum_pick_up_chart_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->id->caption(), $ivf_ovum_pick_up_chart->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->RIDNo->caption(), $ivf_ovum_pick_up_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Name->caption(), $ivf_ovum_pick_up_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ARTCycle->caption(), $ivf_ovum_pick_up_chart->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Consultant->caption(), $ivf_ovum_pick_up_chart->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TotalDoseOfStimulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalDoseOfStimulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption(), $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->Protocol->Required) { ?>
			elm = this.getElements("x" + infix + "_Protocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Protocol->caption(), $ivf_ovum_pick_up_chart->Protocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->NumberOfDaysOfStimulation->Required) { ?>
			elm = this.getElements("x" + infix + "_NumberOfDaysOfStimulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption(), $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TriggerDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_TriggerDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TriggerDateTime->caption(), $ivf_ovum_pick_up_chart->TriggerDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TriggerDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->TriggerDateTime->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_edit->OPUDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_OPUDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->OPUDateTime->caption(), $ivf_ovum_pick_up_chart->OPUDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OPUDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->OPUDateTime->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_edit->HoursAfterTrigger->Required) { ?>
			elm = this.getElements("x" + infix + "_HoursAfterTrigger");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption(), $ivf_ovum_pick_up_chart->HoursAfterTrigger->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->SerumE2->Required) { ?>
			elm = this.getElements("x" + infix + "_SerumE2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->SerumE2->caption(), $ivf_ovum_pick_up_chart->SerumE2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->SerumP4->Required) { ?>
			elm = this.getElements("x" + infix + "_SerumP4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->SerumP4->caption(), $ivf_ovum_pick_up_chart->SerumP4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->FORT->Required) { ?>
			elm = this.getElements("x" + infix + "_FORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->FORT->caption(), $ivf_ovum_pick_up_chart->FORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->ExperctedOocytes->Required) { ?>
			elm = this.getElements("x" + infix + "_ExperctedOocytes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ExperctedOocytes->caption(), $ivf_ovum_pick_up_chart->ExperctedOocytes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->NoOfOocytesRetrieved->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytesRetrieved");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption(), $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->OocytesRetreivalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesRetreivalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption(), $ivf_ovum_pick_up_chart->OocytesRetreivalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->Anesthesia->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthesia");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Anesthesia->caption(), $ivf_ovum_pick_up_chart->Anesthesia->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TrialCannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TrialCannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TrialCannulation->caption(), $ivf_ovum_pick_up_chart->TrialCannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->UCL->Required) { ?>
			elm = this.getElements("x" + infix + "_UCL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->UCL->caption(), $ivf_ovum_pick_up_chart->UCL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->Angle->Required) { ?>
			elm = this.getElements("x" + infix + "_Angle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Angle->caption(), $ivf_ovum_pick_up_chart->Angle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->EMS->Required) { ?>
			elm = this.getElements("x" + infix + "_EMS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->EMS->caption(), $ivf_ovum_pick_up_chart->EMS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->Cannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_Cannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Cannulation->caption(), $ivf_ovum_pick_up_chart->Cannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->ProcedureT->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ProcedureT->caption(), $ivf_ovum_pick_up_chart->ProcedureT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->NoOfOocytesRetrievedd->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytesRetrievedd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption(), $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->CourseInHospital->Required) { ?>
			elm = this.getElements("x" + infix + "_CourseInHospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->CourseInHospital->caption(), $ivf_ovum_pick_up_chart->CourseInHospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->DischargeAdvise->Required) { ?>
			elm = this.getElements("x" + infix + "_DischargeAdvise");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->DischargeAdvise->caption(), $ivf_ovum_pick_up_chart->DischargeAdvise->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->FollowUpAdvise->Required) { ?>
			elm = this.getElements("x" + infix + "_FollowUpAdvise");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->FollowUpAdvise->caption(), $ivf_ovum_pick_up_chart->FollowUpAdvise->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->PlanT->Required) { ?>
			elm = this.getElements("x" + infix + "_PlanT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->PlanT->caption(), $ivf_ovum_pick_up_chart->PlanT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->ReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ReviewDate->caption(), $ivf_ovum_pick_up_chart->ReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->ReviewDate->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_edit->ReviewDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDoctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ReviewDoctor->caption(), $ivf_ovum_pick_up_chart->ReviewDoctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TemplateProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TemplateProcedure->caption(), $ivf_ovum_pick_up_chart->TemplateProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TemplateCourseInHospital->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateCourseInHospital");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TemplateCourseInHospital->caption(), $ivf_ovum_pick_up_chart->TemplateCourseInHospital->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TemplateDischargeAdvise->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateDischargeAdvise");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->caption(), $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TemplateFollowUpAdvise->Required) { ?>
			elm = this.getElements("x" + infix + "_TemplateFollowUpAdvise");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->caption(), $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TidNo->caption(), $ivf_ovum_pick_up_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->TidNo->errorMessage()) ?>");

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
fivf_ovum_pick_up_chartedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_ovum_pick_up_chartedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_ovum_pick_up_chartedit.lists["x_Protocol"] = <?php echo $ivf_ovum_pick_up_chart_edit->Protocol->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->Protocol->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartedit.lists["x_Cannulation"] = <?php echo $ivf_ovum_pick_up_chart_edit->Cannulation->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_Cannulation"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->Cannulation->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartedit.lists["x_PlanT"] = <?php echo $ivf_ovum_pick_up_chart_edit->PlanT->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_PlanT"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->PlanT->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateProcedure"] = <?php echo $ivf_ovum_pick_up_chart_edit->TemplateProcedure->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateProcedure"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->TemplateProcedure->lookupOptions()) ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateCourseInHospital"] = <?php echo $ivf_ovum_pick_up_chart_edit->TemplateCourseInHospital->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateCourseInHospital"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->TemplateCourseInHospital->lookupOptions()) ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateDischargeAdvise"] = <?php echo $ivf_ovum_pick_up_chart_edit->TemplateDischargeAdvise->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateDischargeAdvise"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->TemplateDischargeAdvise->lookupOptions()) ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateFollowUpAdvise"] = <?php echo $ivf_ovum_pick_up_chart_edit->TemplateFollowUpAdvise->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartedit.lists["x_TemplateFollowUpAdvise"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_edit->TemplateFollowUpAdvise->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_ovum_pick_up_chart_edit->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_edit->showMessage();
?>
<form name="fivf_ovum_pick_up_chartedit" id="fivf_ovum_pick_up_chartedit" class="<?php echo $ivf_ovum_pick_up_chart_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_ovum_pick_up_chart_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_ovum_pick_up_chart_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_ovum_pick_up_chart_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_id" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->id->caption() ?><?php echo ($ivf_ovum_pick_up_chart->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->id->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->CurrentValue) ?>">
<?php echo $ivf_ovum_pick_up_chart->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?><?php echo ($ivf_ovum_pick_up_chart->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_RIDNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->RIDNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->RIDNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Name" for="x_Name" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Name->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Name">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Name->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Name->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?><?php echo ($ivf_ovum_pick_up_chart->ARTCycle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Consultant->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Consultant">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Consultant->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Consultant->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<div id="r_TotalDoseOfStimulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" for="x_TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x_TotalDoseOfStimulation" id="x_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
	<div id="r_Protocol" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Protocol" for="x_Protocol" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Protocol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Protocol->displayValueSeparatorAttribute() ?>" id="x_Protocol" name="x_Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Protocol->selectOptionListHtml("x_Protocol") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Protocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<div id="r_NumberOfDaysOfStimulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" for="x_NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?><?php echo ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x_NumberOfDaysOfStimulation" id="x_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<div id="r_TriggerDateTime" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" for="x_TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TriggerDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x_TriggerDateTime" id="x_TriggerDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->TriggerDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->TriggerDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
	<div id="r_OPUDateTime" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_OPUDateTime" for="x_OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?><?php echo ($ivf_ovum_pick_up_chart->OPUDateTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x_OPUDateTime" id="x_OPUDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->OPUDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->OPUDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<div id="r_HoursAfterTrigger" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" for="x_HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?><?php echo ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x_HoursAfterTrigger" id="x_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
	<div id="r_SerumE2" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_SerumE2" for="x_SerumE2" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?><?php echo ($ivf_ovum_pick_up_chart->SerumE2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->SerumE2->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_SerumE2">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x_SerumE2" id="x_SerumE2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumE2->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumE2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->SerumE2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
	<div id="r_SerumP4" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_SerumP4" for="x_SerumP4" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?><?php echo ($ivf_ovum_pick_up_chart->SerumP4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_SerumP4">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumP4->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumP4->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->SerumP4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
	<div id="r_FORT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_FORT" for="x_FORT" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?><?php echo ($ivf_ovum_pick_up_chart->FORT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->FORT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_FORT">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->FORT->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->FORT->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->FORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<div id="r_ExperctedOocytes" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" for="x_ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?><?php echo ($ivf_ovum_pick_up_chart->ExperctedOocytes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x_ExperctedOocytes" id="x_ExperctedOocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<div id="r_NoOfOocytesRetrieved" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" for="x_NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?><?php echo ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x_NoOfOocytesRetrieved" id="x_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<div id="r_OocytesRetreivalRate" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" for="x_OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?><?php echo ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x_OocytesRetreivalRate" id="x_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
	<div id="r_Anesthesia" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Anesthesia" for="x_Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Anesthesia->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Anesthesia->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x_Anesthesia" id="x_Anesthesia" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Anesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TrialCannulation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
	<div id="r_UCL" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_UCL" for="x_UCL" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?><?php echo ($ivf_ovum_pick_up_chart->UCL->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->UCL->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_UCL">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x_UCL" id="x_UCL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->UCL->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->UCL->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->UCL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
	<div id="r_Angle" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Angle" for="x_Angle" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Angle->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Angle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Angle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x_Angle" id="x_Angle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Angle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Angle->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Angle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
	<div id="r_EMS" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_EMS" for="x_EMS" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?><?php echo ($ivf_ovum_pick_up_chart->EMS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->EMS->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_EMS">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x_EMS" id="x_EMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->EMS->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->EMS->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->EMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
	<div id="r_Cannulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Cannulation" for="x_Cannulation" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?><?php echo ($ivf_ovum_pick_up_chart->Cannulation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->Cannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_Cannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Cannulation->displayValueSeparatorAttribute() ?>" id="x_Cannulation" name="x_Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Cannulation->selectOptionListHtml("x_Cannulation") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->Cannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ProcedureT->Visible) { // ProcedureT ?>
	<div id="r_ProcedureT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ProcedureT" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ProcedureT" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->ProcedureT->caption() ?><?php echo ($ivf_ovum_pick_up_chart->ProcedureT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->ProcedureT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ProcedureT" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<?php AppendClass($ivf_ovum_pick_up_chart->ProcedureT->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_ProcedureT" name="x_ProcedureT" id="x_ProcedureT" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ProcedureT->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart->ProcedureT->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart->ProcedureT->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createEditor("fivf_ovum_pick_up_chartedit", "x_ProcedureT", 35, 4, <?php echo ($ivf_ovum_pick_up_chart->ProcedureT->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_ovum_pick_up_chart->ProcedureT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<div id="r_NoOfOocytesRetrievedd" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" for="x_NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?><?php echo ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x_NoOfOocytesRetrievedd" id="x_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->CourseInHospital->Visible) { // CourseInHospital ?>
	<div id="r_CourseInHospital" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_CourseInHospital" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_CourseInHospital" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->CourseInHospital->caption() ?><?php echo ($ivf_ovum_pick_up_chart->CourseInHospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->CourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_CourseInHospital" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<?php AppendClass($ivf_ovum_pick_up_chart->CourseInHospital->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_CourseInHospital" name="x_CourseInHospital" id="x_CourseInHospital" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->CourseInHospital->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart->CourseInHospital->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart->CourseInHospital->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createEditor("fivf_ovum_pick_up_chartedit", "x_CourseInHospital", 35, 4, <?php echo ($ivf_ovum_pick_up_chart->CourseInHospital->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_ovum_pick_up_chart->CourseInHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->DischargeAdvise->Visible) { // DischargeAdvise ?>
	<div id="r_DischargeAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_DischargeAdvise" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_DischargeAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->DischargeAdvise->caption() ?><?php echo ($ivf_ovum_pick_up_chart->DischargeAdvise->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->DischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_DischargeAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<?php AppendClass($ivf_ovum_pick_up_chart->DischargeAdvise->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_DischargeAdvise" name="x_DischargeAdvise" id="x_DischargeAdvise" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->DischargeAdvise->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart->DischargeAdvise->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart->DischargeAdvise->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createEditor("fivf_ovum_pick_up_chartedit", "x_DischargeAdvise", 35, 4, <?php echo ($ivf_ovum_pick_up_chart->DischargeAdvise->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_ovum_pick_up_chart->DischargeAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
	<div id="r_FollowUpAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->FollowUpAdvise->caption() ?><?php echo ($ivf_ovum_pick_up_chart->FollowUpAdvise->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->FollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<?php AppendClass($ivf_ovum_pick_up_chart->FollowUpAdvise->EditAttrs["class"], "editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_FollowUpAdvise" name="x_FollowUpAdvise" id="x_FollowUpAdvise" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FollowUpAdvise->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart->FollowUpAdvise->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart->FollowUpAdvise->EditValue ?></textarea>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createEditor("fivf_ovum_pick_up_chartedit", "x_FollowUpAdvise", 35, 4, <?php echo ($ivf_ovum_pick_up_chart->FollowUpAdvise->ReadOnly || FALSE) ? "true" : "false" ?>);
</script>
<?php echo $ivf_ovum_pick_up_chart->FollowUpAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
	<div id="r_PlanT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_PlanT" for="x_PlanT" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?><?php echo ($ivf_ovum_pick_up_chart->PlanT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->PlanT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_PlanT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->PlanT->displayValueSeparatorAttribute() ?>" id="x_PlanT" name="x_PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->PlanT->selectOptionListHtml("x_PlanT") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->PlanT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
	<div id="r_ReviewDate" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ReviewDate" for="x_ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?><?php echo ($ivf_ovum_pick_up_chart->ReviewDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->ReviewDate->ReadOnly && !$ivf_ovum_pick_up_chart->ReviewDate->Disabled && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_ovum_pick_up_chartedit_js">
ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $ivf_ovum_pick_up_chart->ReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<div id="r_ReviewDoctor" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?><?php echo ($ivf_ovum_pick_up_chart->ReviewDoctor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TemplateProcedure->Visible) { // TemplateProcedure ?>
	<div id="r_TemplateProcedure" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateProcedure" for="x_TemplateProcedure" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateProcedure" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TemplateProcedure->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateProcedure" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TemplateProcedure">
<?php $ivf_ovum_pick_up_chart->TemplateProcedure->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_ovum_pick_up_chart->TemplateProcedure->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateProcedure" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->displayValueSeparatorAttribute() ?>" id="x_TemplateProcedure" name="x_TemplateProcedure"<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->selectOptionListHtml("x_TemplateProcedure") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart->TemplateProcedure->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedure" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart->TemplateProcedure->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedure',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->Lookup->getParamTag("p_x_TemplateProcedure") ?>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TemplateProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TemplateCourseInHospital->Visible) { // TemplateCourseInHospital ?>
	<div id="r_TemplateCourseInHospital" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateCourseInHospital" for="x_TemplateCourseInHospital" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TemplateCourseInHospital->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TemplateCourseInHospital">
<?php $ivf_ovum_pick_up_chart->TemplateCourseInHospital->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_ovum_pick_up_chart->TemplateCourseInHospital->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateCourseInHospital" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->displayValueSeparatorAttribute() ?>" id="x_TemplateCourseInHospital" name="x_TemplateCourseInHospital"<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->selectOptionListHtml("x_TemplateCourseInHospital") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart->TemplateCourseInHospital->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateCourseInHospital" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart->TemplateCourseInHospital->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateCourseInHospital',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->Lookup->getParamTag("p_x_TemplateCourseInHospital") ?>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TemplateCourseInHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TemplateDischargeAdvise->Visible) { // TemplateDischargeAdvise ?>
	<div id="r_TemplateDischargeAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" for="x_TemplateDischargeAdvise" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TemplateDischargeAdvise->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TemplateDischargeAdvise">
<?php $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_ovum_pick_up_chart->TemplateDischargeAdvise->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateDischargeAdvise" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->displayValueSeparatorAttribute() ?>" id="x_TemplateDischargeAdvise" name="x_TemplateDischargeAdvise"<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->selectOptionListHtml("x_TemplateDischargeAdvise") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart->TemplateDischargeAdvise->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDischargeAdvise" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDischargeAdvise',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->Lookup->getParamTag("p_x_TemplateDischargeAdvise") ?>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TemplateDischargeAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->Visible) { // TemplateFollowUpAdvise ?>
	<div id="r_TemplateFollowUpAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" for="x_TemplateFollowUpAdvise" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise">
<?php $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->EditAttrs["onchange"] = "ew.autoFill(this);" . @$ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->EditAttrs["onchange"]; ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateFollowUpAdvise" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpAdvise" name="x_TemplateFollowUpAdvise"<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->selectOptionListHtml("x_TemplateFollowUpAdvise") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvise" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvise',url:'ivf_mas_user_templateaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->Lookup->getParamTag("p_x_TemplateFollowUpAdvise") ?>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TemplateFollowUpAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_ovum_pick_up_chart_edit->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chartedit" type="text/html"><span><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?><?php echo ($ivf_ovum_pick_up_chart->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_edit->RightColumnClass ?>"><div<?php echo $ivf_ovum_pick_up_chart->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chartedit" type="text/html">
<span id="el_ivf_ovum_pick_up_chart_TidNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TidNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TidNo->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_ovum_pick_up_chart->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_ovum_pick_up_chartedit" class="ew-custom-template"></div>
<script id="tpm_ivf_ovum_pick_up_chartedit" type="text/html">
<div id="ct_ivf_ovum_pick_up_chart_edit"><style>
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
?>	
{{include tmpl="#tpx_RIDNO"/}}
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
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
				<a class="btn btn-app"  href="<?php echo $TrPlanurl; ?>">
				  <i class="fas fa-cart-plus"></i> Plan
				</a>
				<a class="btn btn-app" href="patientview.php?showdetail=&id=<?php echo $results2[0]["id"]; ?>">
				  <i class="fas fa-female"></i> Patient
				</a>
				<a class="btn btn-app"  href="patientview.php?showdetail=&id=<?php echo $results1[0]["id"]; ?>">
				  <i class="fas fa-male"></i> Partner
				</a>
				<a class="btn btn-app" href="<?php echo $VitalsHistoryUrl; ?>">
				  <span class="badge bg-warning"><?php echo $VitalsHistoryRowCount; ?></span>
				  <i class="fas fa-thermometer-full"></i> Vitals & History
				</a>
				<a class="btn btn-app" href="<?php echo $opurl; ?>">
				  <i class="fas fa-pencil-square-o"></i> OP
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
				<h3 class="card-title">Ovum Pick Up Chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ARTCycle"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_ARTCycle"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Consultant"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_Consultant"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Protocol"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_Protocol"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"/}}</span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TriggerDateTime"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TriggerDateTime"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OPUDateTime"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_OPUDateTime"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumE2"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_SerumE2"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FORT"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_FORT"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumP4"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_SerumP4"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_ExperctedOocytes"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Anesthesia"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_Anesthesia"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TrialCannulation"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TrialCannulation"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_UCL"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_UCL"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Angle"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_Angle"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_EMS"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_EMS"/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Cannulation"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_Cannulation"/}}</span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateProcedure"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TemplateProcedure"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ProcedureT"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_ProcedureT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_CourseInHospital"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_CourseInHospital"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_DischargeAdvise"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_DischargeAdvise"/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_FollowUpAdvise"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_PlanT"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_PlanT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDate"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_ReviewDate"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDoctor"/}}&nbsp;{{include tmpl="#tpx_ivf_ovum_pick_up_chart_ReviewDoctor"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php if (!$ivf_ovum_pick_up_chart_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_ovum_pick_up_chart_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_ovum_pick_up_chart_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_ovum_pick_up_chart->Rows) ?> };
ew.applyTemplate("tpd_ivf_ovum_pick_up_chartedit", "tpm_ivf_ovum_pick_up_chartedit", "ivf_ovum_pick_up_chartedit", "<?php echo $ivf_ovum_pick_up_chart->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_ovum_pick_up_chartedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_ovum_pick_up_chart_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_ovum_pick_up_chart_edit->terminate();
?>