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
$ivf_ovum_pick_up_chart_add = new ivf_ovum_pick_up_chart_add();

// Run the page
$ivf_ovum_pick_up_chart_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_ovum_pick_up_chartadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_ovum_pick_up_chartadd = currentForm = new ew.Form("fivf_ovum_pick_up_chartadd", "add");

	// Validate form
	fivf_ovum_pick_up_chartadd.validate = function() {
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
			<?php if ($ivf_ovum_pick_up_chart_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->RIDNo->caption(), $ivf_ovum_pick_up_chart_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_ovum_pick_up_chart_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Name->caption(), $ivf_ovum_pick_up_chart_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->ARTCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->ARTCycle->caption(), $ivf_ovum_pick_up_chart_add->ARTCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->Consultant->Required) { ?>
				elm = this.getElements("x" + infix + "_Consultant");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Consultant->caption(), $ivf_ovum_pick_up_chart_add->Consultant->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalDoseOfStimulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->caption(), $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->Protocol->Required) { ?>
				elm = this.getElements("x" + infix + "_Protocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Protocol->caption(), $ivf_ovum_pick_up_chart_add->Protocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->Required) { ?>
				elm = this.getElements("x" + infix + "_NumberOfDaysOfStimulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->caption(), $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TriggerDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_TriggerDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TriggerDateTime->caption(), $ivf_ovum_pick_up_chart_add->TriggerDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TriggerDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart_add->TriggerDateTime->errorMessage()) ?>");
			<?php if ($ivf_ovum_pick_up_chart_add->OPUDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_OPUDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->OPUDateTime->caption(), $ivf_ovum_pick_up_chart_add->OPUDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OPUDateTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart_add->OPUDateTime->errorMessage()) ?>");
			<?php if ($ivf_ovum_pick_up_chart_add->HoursAfterTrigger->Required) { ?>
				elm = this.getElements("x" + infix + "_HoursAfterTrigger");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->caption(), $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->SerumE2->Required) { ?>
				elm = this.getElements("x" + infix + "_SerumE2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->SerumE2->caption(), $ivf_ovum_pick_up_chart_add->SerumE2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->SerumP4->Required) { ?>
				elm = this.getElements("x" + infix + "_SerumP4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->SerumP4->caption(), $ivf_ovum_pick_up_chart_add->SerumP4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->FORT->Required) { ?>
				elm = this.getElements("x" + infix + "_FORT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->FORT->caption(), $ivf_ovum_pick_up_chart_add->FORT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->ExperctedOocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_ExperctedOocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->ExperctedOocytes->caption(), $ivf_ovum_pick_up_chart_add->ExperctedOocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfOocytesRetrieved");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->caption(), $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesRetreivalRate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->caption(), $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->Anesthesia->Required) { ?>
				elm = this.getElements("x" + infix + "_Anesthesia");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Anesthesia->caption(), $ivf_ovum_pick_up_chart_add->Anesthesia->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TrialCannulation->Required) { ?>
				elm = this.getElements("x" + infix + "_TrialCannulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TrialCannulation->caption(), $ivf_ovum_pick_up_chart_add->TrialCannulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->UCL->Required) { ?>
				elm = this.getElements("x" + infix + "_UCL");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->UCL->caption(), $ivf_ovum_pick_up_chart_add->UCL->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->Angle->Required) { ?>
				elm = this.getElements("x" + infix + "_Angle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Angle->caption(), $ivf_ovum_pick_up_chart_add->Angle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->EMS->Required) { ?>
				elm = this.getElements("x" + infix + "_EMS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->EMS->caption(), $ivf_ovum_pick_up_chart_add->EMS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->Cannulation->Required) { ?>
				elm = this.getElements("x" + infix + "_Cannulation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->Cannulation->caption(), $ivf_ovum_pick_up_chart_add->Cannulation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->ProcedureT->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcedureT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->ProcedureT->caption(), $ivf_ovum_pick_up_chart_add->ProcedureT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfOocytesRetrievedd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->caption(), $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->CourseInHospital->Required) { ?>
				elm = this.getElements("x" + infix + "_CourseInHospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->CourseInHospital->caption(), $ivf_ovum_pick_up_chart_add->CourseInHospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->DischargeAdvise->Required) { ?>
				elm = this.getElements("x" + infix + "_DischargeAdvise");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->DischargeAdvise->caption(), $ivf_ovum_pick_up_chart_add->DischargeAdvise->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->FollowUpAdvise->Required) { ?>
				elm = this.getElements("x" + infix + "_FollowUpAdvise");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->FollowUpAdvise->caption(), $ivf_ovum_pick_up_chart_add->FollowUpAdvise->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->PlanT->Required) { ?>
				elm = this.getElements("x" + infix + "_PlanT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->PlanT->caption(), $ivf_ovum_pick_up_chart_add->PlanT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->ReviewDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReviewDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->ReviewDate->caption(), $ivf_ovum_pick_up_chart_add->ReviewDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReviewDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart_add->ReviewDate->errorMessage()) ?>");
			<?php if ($ivf_ovum_pick_up_chart_add->ReviewDoctor->Required) { ?>
				elm = this.getElements("x" + infix + "_ReviewDoctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->ReviewDoctor->caption(), $ivf_ovum_pick_up_chart_add->ReviewDoctor->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TemplateProcedure->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateProcedure");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TemplateProcedure->caption(), $ivf_ovum_pick_up_chart_add->TemplateProcedure->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateCourseInHospital");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->caption(), $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateDischargeAdvise");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->caption(), $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFollowUpAdvise");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->caption(), $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_ovum_pick_up_chart_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart_add->TidNo->caption(), $ivf_ovum_pick_up_chart_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart_add->TidNo->errorMessage()) ?>");

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
	fivf_ovum_pick_up_chartadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_ovum_pick_up_chartadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_ovum_pick_up_chartadd.lists["x_Protocol"] = <?php echo $ivf_ovum_pick_up_chart_add->Protocol->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->Protocol->options(FALSE, TRUE)) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_Cannulation"] = <?php echo $ivf_ovum_pick_up_chart_add->Cannulation->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_Cannulation"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->Cannulation->options(FALSE, TRUE)) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_PlanT"] = <?php echo $ivf_ovum_pick_up_chart_add->PlanT->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_PlanT"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->PlanT->options(FALSE, TRUE)) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateProcedure"] = <?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateProcedure"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->TemplateProcedure->lookupOptions()) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateCourseInHospital"] = <?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateCourseInHospital"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->lookupOptions()) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateDischargeAdvise"] = <?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateDischargeAdvise"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->lookupOptions()) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateFollowUpAdvise"] = <?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->Lookup->toClientList($ivf_ovum_pick_up_chart_add) ?>;
	fivf_ovum_pick_up_chartadd.lists["x_TemplateFollowUpAdvise"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->lookupOptions()) ?>;
	loadjs.done("fivf_ovum_pick_up_chartadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_ovum_pick_up_chart_add->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_add->showMessage();
?>
<form name="fivf_ovum_pick_up_chartadd" id="fivf_ovum_pick_up_chartadd" class="<?php echo $ivf_ovum_pick_up_chart_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_ovum_pick_up_chart_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_ovum_pick_up_chart_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_RIDNo" for="x_RIDNo" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_RIDNo" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->RIDNo->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_RIDNo" type="text/html"><span id="el_ivf_ovum_pick_up_chart_RIDNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->RIDNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->RIDNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Name" for="x_Name" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Name" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Name->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Name->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Name" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Name">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->Name->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->Name->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->ARTCycle->Visible) { // ARTCycle ?>
	<div id="r_ARTCycle" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ARTCycle" for="x_ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ARTCycle" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ARTCycle" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->ARTCycle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Consultant->Visible) { // Consultant ?>
	<div id="r_Consultant" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Consultant" for="x_Consultant" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Consultant" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Consultant->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Consultant" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Consultant">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->Consultant->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->Consultant->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Consultant->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<div id="r_TotalDoseOfStimulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" for="x_TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x_TotalDoseOfStimulation" id="x_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TotalDoseOfStimulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Protocol->Visible) { // Protocol ?>
	<div id="r_Protocol" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Protocol" for="x_Protocol" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Protocol" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Protocol->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Protocol->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Protocol" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->Protocol->displayValueSeparatorAttribute() ?>" id="x_Protocol" name="x_Protocol"<?php echo $ivf_ovum_pick_up_chart_add->Protocol->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->Protocol->selectOptionListHtml("x_Protocol") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Protocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<div id="r_NumberOfDaysOfStimulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" for="x_NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x_NumberOfDaysOfStimulation" id="x_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->NumberOfDaysOfStimulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<div id="r_TriggerDateTime" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" for="x_TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TriggerDateTime" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TriggerDateTime" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x_TriggerDateTime" id="x_TriggerDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->TriggerDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart_add->TriggerDateTime->ReadOnly && !$ivf_ovum_pick_up_chart_add->TriggerDateTime->Disabled && !isset($ivf_ovum_pick_up_chart_add->TriggerDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart_add->TriggerDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_ovum_pick_up_chartadd", "x_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->TriggerDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->OPUDateTime->Visible) { // OPUDateTime ?>
	<div id="r_OPUDateTime" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_OPUDateTime" for="x_OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_OPUDateTime" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OPUDateTime" type="text/html"><span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x_OPUDateTime" id="x_OPUDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->OPUDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart_add->OPUDateTime->ReadOnly && !$ivf_ovum_pick_up_chart_add->OPUDateTime->Disabled && !isset($ivf_ovum_pick_up_chart_add->OPUDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart_add->OPUDateTime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_ovum_pick_up_chartadd", "x_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->OPUDateTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<div id="r_HoursAfterTrigger" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" for="x_HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger" type="text/html"><span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x_HoursAfterTrigger" id="x_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->HoursAfterTrigger->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->SerumE2->Visible) { // SerumE2 ?>
	<div id="r_SerumE2" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_SerumE2" for="x_SerumE2" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_SerumE2" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->SerumE2->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->SerumE2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->SerumE2->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumE2" type="text/html"><span id="el_ivf_ovum_pick_up_chart_SerumE2">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x_SerumE2" id="x_SerumE2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->SerumE2->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->SerumE2->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->SerumE2->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->SerumE2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->SerumP4->Visible) { // SerumP4 ?>
	<div id="r_SerumP4" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_SerumP4" for="x_SerumP4" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_SerumP4" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->SerumP4->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->SerumP4->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_SerumP4" type="text/html"><span id="el_ivf_ovum_pick_up_chart_SerumP4">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->SerumP4->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->SerumP4->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->SerumP4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->FORT->Visible) { // FORT ?>
	<div id="r_FORT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_FORT" for="x_FORT" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_FORT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->FORT->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->FORT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FORT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_FORT">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->FORT->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->FORT->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->FORT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<div id="r_ExperctedOocytes" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" for="x_ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x_ExperctedOocytes" id="x_ExperctedOocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->ExperctedOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->ExperctedOocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<div id="r_NoOfOocytesRetrieved" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" for="x_NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x_NoOfOocytesRetrieved" id="x_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrieved->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<div id="r_OocytesRetreivalRate" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" for="x_OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate" type="text/html"><span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x_OocytesRetreivalRate" id="x_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->OocytesRetreivalRate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Anesthesia->Visible) { // Anesthesia ?>
	<div id="r_Anesthesia" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Anesthesia" for="x_Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Anesthesia" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Anesthesia" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x_Anesthesia" id="x_Anesthesia" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->Anesthesia->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Anesthesia->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TrialCannulation->Visible) { // TrialCannulation ?>
	<div id="r_TrialCannulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TrialCannulation" for="x_TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TrialCannulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TrialCannulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->TrialCannulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TrialCannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->UCL->Visible) { // UCL ?>
	<div id="r_UCL" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_UCL" for="x_UCL" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_UCL" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->UCL->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->UCL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->UCL->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_UCL" type="text/html"><span id="el_ivf_ovum_pick_up_chart_UCL">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x_UCL" id="x_UCL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->UCL->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->UCL->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->UCL->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->UCL->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Angle->Visible) { // Angle ?>
	<div id="r_Angle" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Angle" for="x_Angle" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Angle" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Angle->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Angle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Angle->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Angle" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Angle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x_Angle" id="x_Angle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->Angle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->Angle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->Angle->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Angle->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->EMS->Visible) { // EMS ?>
	<div id="r_EMS" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_EMS" for="x_EMS" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_EMS" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->EMS->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->EMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->EMS->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_EMS" type="text/html"><span id="el_ivf_ovum_pick_up_chart_EMS">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x_EMS" id="x_EMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->EMS->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->EMS->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->EMS->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->EMS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->Cannulation->Visible) { // Cannulation ?>
	<div id="r_Cannulation" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_Cannulation" for="x_Cannulation" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_Cannulation" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->Cannulation->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->Cannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->Cannulation->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_Cannulation" type="text/html"><span id="el_ivf_ovum_pick_up_chart_Cannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->Cannulation->displayValueSeparatorAttribute() ?>" id="x_Cannulation" name="x_Cannulation"<?php echo $ivf_ovum_pick_up_chart_add->Cannulation->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->Cannulation->selectOptionListHtml("x_Cannulation") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->Cannulation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->ProcedureT->Visible) { // ProcedureT ?>
	<div id="r_ProcedureT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ProcedureT" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ProcedureT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ProcedureT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<?php $ivf_ovum_pick_up_chart_add->ProcedureT->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_ProcedureT" name="x_ProcedureT" id="x_ProcedureT" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->ProcedureT->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartadd", "x_ProcedureT", 35, 4, <?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->ProcedureT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<div id="r_NoOfOocytesRetrievedd" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" for="x_NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" type="text/html"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x_NoOfOocytesRetrievedd" id="x_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->NoOfOocytesRetrievedd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->CourseInHospital->Visible) { // CourseInHospital ?>
	<div id="r_CourseInHospital" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_CourseInHospital" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_CourseInHospital" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_CourseInHospital" type="text/html"><span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<?php $ivf_ovum_pick_up_chart_add->CourseInHospital->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_CourseInHospital" name="x_CourseInHospital" id="x_CourseInHospital" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->CourseInHospital->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartadd", "x_CourseInHospital", 35, 4, <?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->CourseInHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->DischargeAdvise->Visible) { // DischargeAdvise ?>
	<div id="r_DischargeAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_DischargeAdvise" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_DischargeAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_DischargeAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<?php $ivf_ovum_pick_up_chart_add->DischargeAdvise->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_DischargeAdvise" name="x_DischargeAdvise" id="x_DischargeAdvise" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->DischargeAdvise->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartadd", "x_DischargeAdvise", 35, 4, <?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->DischargeAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
	<div id="r_FollowUpAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<?php $ivf_ovum_pick_up_chart_add->FollowUpAdvise->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_FollowUpAdvise" name="x_FollowUpAdvise" id="x_FollowUpAdvise" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->FollowUpAdvise->getPlaceHolder()) ?>"<?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->editAttributes() ?>><?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->EditValue ?></textarea>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartadd", "x_FollowUpAdvise", 35, 4, <?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->ReadOnly || FALSE ? "true" : "false" ?>);
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->FollowUpAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->PlanT->Visible) { // PlanT ?>
	<div id="r_PlanT" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_PlanT" for="x_PlanT" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_PlanT" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->PlanT->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->PlanT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->PlanT->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_PlanT" type="text/html"><span id="el_ivf_ovum_pick_up_chart_PlanT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->PlanT->displayValueSeparatorAttribute() ?>" id="x_PlanT" name="x_PlanT"<?php echo $ivf_ovum_pick_up_chart_add->PlanT->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->PlanT->selectOptionListHtml("x_PlanT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->PlanT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->ReviewDate->Visible) { // ReviewDate ?>
	<div id="r_ReviewDate" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ReviewDate" for="x_ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDate" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDate" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart_add->ReviewDate->ReadOnly && !$ivf_ovum_pick_up_chart_add->ReviewDate->Disabled && !isset($ivf_ovum_pick_up_chart_add->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart_add->ReviewDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_ovum_pick_up_chartadd_js">
loadjs.ready(["fivf_ovum_pick_up_chartadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_ovum_pick_up_chartadd", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $ivf_ovum_pick_up_chart_add->ReviewDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<div id="r_ReviewDoctor" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_ReviewDoctor" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_ReviewDoctor" type="text/html"><span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->ReviewDoctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TemplateProcedure->Visible) { // TemplateProcedure ?>
	<div id="r_TemplateProcedure" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateProcedure" for="x_TemplateProcedure" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateProcedure" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateProcedure" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateProcedure">
<?php $ivf_ovum_pick_up_chart_add->TemplateProcedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateProcedure" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->displayValueSeparatorAttribute() ?>" id="x_TemplateProcedure" name="x_TemplateProcedure"<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->selectOptionListHtml("x_TemplateProcedure") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart_add->TemplateProcedure->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedure" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart_add->TemplateProcedure->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedure',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->Lookup->getParamTag($ivf_ovum_pick_up_chart_add, "p_x_TemplateProcedure") ?>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateProcedure->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->Visible) { // TemplateCourseInHospital ?>
	<div id="r_TemplateCourseInHospital" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateCourseInHospital" for="x_TemplateCourseInHospital" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateCourseInHospital">
<?php $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateCourseInHospital" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->displayValueSeparatorAttribute() ?>" id="x_TemplateCourseInHospital" name="x_TemplateCourseInHospital"<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->selectOptionListHtml("x_TemplateCourseInHospital") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateCourseInHospital" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateCourseInHospital',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->Lookup->getParamTag($ivf_ovum_pick_up_chart_add, "p_x_TemplateCourseInHospital") ?>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateCourseInHospital->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->Visible) { // TemplateDischargeAdvise ?>
	<div id="r_TemplateDischargeAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" for="x_TemplateDischargeAdvise" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateDischargeAdvise">
<?php $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateDischargeAdvise" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->displayValueSeparatorAttribute() ?>" id="x_TemplateDischargeAdvise" name="x_TemplateDischargeAdvise"<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->selectOptionListHtml("x_TemplateDischargeAdvise") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDischargeAdvise" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDischargeAdvise',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->Lookup->getParamTag($ivf_ovum_pick_up_chart_add, "p_x_TemplateDischargeAdvise") ?>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateDischargeAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->Visible) { // TemplateFollowUpAdvise ?>
	<div id="r_TemplateFollowUpAdvise" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" for="x_TemplateFollowUpAdvise" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise">
<?php $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_TemplateFollowUpAdvise" data-value-separator="<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->displayValueSeparatorAttribute() ?>" id="x_TemplateFollowUpAdvise" name="x_TemplateFollowUpAdvise"<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->editAttributes() ?>>
			<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->selectOptionListHtml("x_TemplateFollowUpAdvise") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvise" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->caption() ?>" data-title="<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvise',url:'ivf_mas_user_templateaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->Lookup->getParamTag($ivf_ovum_pick_up_chart_add, "p_x_TemplateFollowUpAdvise") ?>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TemplateFollowUpAdvise->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_ovum_pick_up_chart_TidNo" for="x_TidNo" class="<?php echo $ivf_ovum_pick_up_chart_add->LeftColumnClass ?>"><script id="tpc_ivf_ovum_pick_up_chart_TidNo" type="text/html"><?php echo $ivf_ovum_pick_up_chart_add->TidNo->caption() ?><?php echo $ivf_ovum_pick_up_chart_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_ovum_pick_up_chart_add->RightColumnClass ?>"><div <?php echo $ivf_ovum_pick_up_chart_add->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_ovum_pick_up_chart_TidNo" type="text/html"><span id="el_ivf_ovum_pick_up_chart_TidNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart_add->TidNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart_add->TidNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_ovum_pick_up_chart_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_ovum_pick_up_chartadd" class="ew-custom-template"></div>
<script id="tpm_ivf_ovum_pick_up_chartadd" type="text/html">
<div id="ct_ivf_ovum_pick_up_chart_add"><style>
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
{{include tmpl=~getTemplate("#tpx_RIDNO")/}}
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ARTCycle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ARTCycle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Consultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Consultant")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Protocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Protocol")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation")/}}</span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TriggerDateTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TriggerDateTime")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OPUDateTime"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_OPUDateTime")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumE2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_SerumE2")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FORT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_FORT")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_SerumP4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_SerumP4")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ExperctedOocytes")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Anesthesia"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Anesthesia")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_TrialCannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TrialCannulation")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_UCL"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_UCL")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Angle"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Angle")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_EMS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_EMS")/}}</span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_Cannulation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_Cannulation")/}}</span>
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
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateProcedure"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateProcedure")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ProcedureT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ProcedureT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_CourseInHospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_CourseInHospital")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_DischargeAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_DischargeAdvise")/}}</span>
				  </div>
				  <div class="ew-row">
				  {{include tmpl="#tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_FollowUpAdvise")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_PlanT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_PlanT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ReviewDate")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ovum_pick_up_chart_ReviewDoctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ovum_pick_up_chart_ReviewDoctor")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php if (!$ivf_ovum_pick_up_chart_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_ovum_pick_up_chart_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_ovum_pick_up_chart_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_ovum_pick_up_chart->Rows) ?> };
	ew.applyTemplate("tpd_ivf_ovum_pick_up_chartadd", "tpm_ivf_ovum_pick_up_chartadd", "ivf_ovum_pick_up_chartadd", "<?php echo $ivf_ovum_pick_up_chart->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_ovum_pick_up_chartadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_ovum_pick_up_chart_add->showPageFooter();
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
$ivf_ovum_pick_up_chart_add->terminate();
?>