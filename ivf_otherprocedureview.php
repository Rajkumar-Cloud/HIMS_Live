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
$ivf_otherprocedure_view = new ivf_otherprocedure_view();

// Run the page
$ivf_otherprocedure_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_otherprocedureview = currentForm = new ew.Form("fivf_otherprocedureview", "view");

// Form_CustomValidate event
fivf_otherprocedureview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_otherprocedureview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_otherprocedureview.lists["x_Name"] = <?php echo $ivf_otherprocedure_view->Name->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_view->Name->lookupOptions()) ?>;
fivf_otherprocedureview.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_otherprocedureview.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_view->Consultant->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_view->Consultant->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_view->Surgeon->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_view->Surgeon->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_view->Anesthetist->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_view->Anesthetist->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TempleteFinalDiagnosis"] = <?php echo $ivf_otherprocedure_view->TempleteFinalDiagnosis->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TempleteFinalDiagnosis"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TempleteFinalDiagnosis->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TemplateTreatment"] = <?php echo $ivf_otherprocedure_view->TemplateTreatment->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TemplateTreatment"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TemplateTreatment->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TemplateOperation"] = <?php echo $ivf_otherprocedure_view->TemplateOperation->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TemplateOperation"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TemplateOperation->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TemplateFollowUpAdvice"] = <?php echo $ivf_otherprocedure_view->TemplateFollowUpAdvice->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TemplateFollowUpAdvice"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TemplateFollowUpAdvice->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TemplateFollowUpMedication"] = <?php echo $ivf_otherprocedure_view->TemplateFollowUpMedication->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TemplateFollowUpMedication"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TemplateFollowUpMedication->lookupOptions()) ?>;
fivf_otherprocedureview.lists["x_TemplatePlan"] = <?php echo $ivf_otherprocedure_view->TemplatePlan->Lookup->toClientList() ?>;
fivf_otherprocedureview.lists["x_TemplatePlan"].options = <?php echo JsonEncode($ivf_otherprocedure_view->TemplatePlan->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_otherprocedure_view->ExportOptions->render("body") ?>
<?php $ivf_otherprocedure_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_otherprocedure_view->showPageHeader(); ?>
<?php
$ivf_otherprocedure_view->showMessage();
?>
<form name="fivf_otherprocedureview" id="fivf_otherprocedureview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_otherprocedure_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_otherprocedure_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_otherprocedure_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_id"><script id="tpc_ivf_otherprocedure_id" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_id" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_RIDNO"><script id="tpc_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<script id="orig_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html">
<?php echo $ivf_otherprocedure->RIDNO->getViewValue() ?>
</script><script id="tpx_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html">
<?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'EAN-13', 60) ?>
</script>
<script id="tpx_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>>{{include tmpl="#tpx_ivf_otherprocedure_RIDNO"/}}</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Name"><script id="tpc_ivf_otherprocedure_Name" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Name" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Age"><script id="tpc_ivf_otherprocedure_Age" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $ivf_otherprocedure->Age->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Age" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Age">
<span<?php echo $ivf_otherprocedure->Age->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->SEX->Visible) { // SEX ?>
	<tr id="r_SEX">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SEX"><script id="tpc_ivf_otherprocedure_SEX" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->SEX->caption() ?></span></script></span></td>
		<td data-name="SEX"<?php echo $ivf_otherprocedure->SEX->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SEX" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_SEX">
<span<?php echo $ivf_otherprocedure->SEX->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SEX->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Address"><script id="tpc_ivf_otherprocedure_Address" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Address->caption() ?></span></script></span></td>
		<td data-name="Address"<?php echo $ivf_otherprocedure->Address->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Address" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Address">
<span<?php echo $ivf_otherprocedure->Address->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Address->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
	<tr id="r_DateofAdmission">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofAdmission"><script id="tpc_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></span></script></span></td>
		<td data-name="DateofAdmission"<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofAdmission->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
	<tr id="r_DateofProcedure">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofProcedure"><script id="tpc_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></span></script></span></td>
		<td data-name="DateofProcedure"<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofProcedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
	<tr id="r_DateofDischarge">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofDischarge"><script id="tpc_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></span></script></span></td>
		<td data-name="DateofDischarge"<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofDischarge->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Consultant"><script id="tpc_ivf_otherprocedure_Consultant" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Consultant" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
	<tr id="r_Surgeon">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Surgeon"><script id="tpc_ivf_otherprocedure_Surgeon" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Surgeon->caption() ?></span></script></span></td>
		<td data-name="Surgeon"<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Surgeon" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Surgeon->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Anesthetist"><script id="tpc_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></span></script></span></td>
		<td data-name="Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_IdentificationMark"><script id="tpc_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></span></script></span></td>
		<td data-name="IdentificationMark"<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->IdentificationMark->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
	<tr id="r_ProcedureDone">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_ProcedureDone"><script id="tpc_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></span></script></span></td>
		<td data-name="ProcedureDone"<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->ProcedureDone->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<tr id="r_PROVISIONALDIAGNOSIS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><script id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></span></script></span></td>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<tr id="r_Chiefcomplaints">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints"><script id="tpc_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></span></script></span></td>
		<td data-name="Chiefcomplaints"<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Chiefcomplaints->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
	<tr id="r_MaritallHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MaritallHistory"><script id="tpc_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></span></script></span></td>
		<td data-name="MaritallHistory"<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MaritallHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory"><script id="tpc_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="MenstrualHistory"<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory"><script id="tpc_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></span></script></span></td>
		<td data-name="SurgicalHistory"<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SurgicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
	<tr id="r_PastHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PastHistory"><script id="tpc_ivf_otherprocedure_PastHistory" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->PastHistory->caption() ?></span></script></span></td>
		<td data-name="PastHistory"<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PastHistory" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PastHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FamilyHistory"><script id="tpc_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></span></script></span></td>
		<td data-name="FamilyHistory"<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
	<tr id="r_Temp">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Temp"><script id="tpc_ivf_otherprocedure_Temp" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Temp->caption() ?></span></script></span></td>
		<td data-name="Temp"<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Temp" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Temp->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Pulse"><script id="tpc_ivf_otherprocedure_Pulse" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Pulse->caption() ?></span></script></span></td>
		<td data-name="Pulse"<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Pulse" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Pulse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_BP"><script id="tpc_ivf_otherprocedure_BP" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->BP->caption() ?></span></script></span></td>
		<td data-name="BP"<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_BP" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->BP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
	<tr id="r_CNS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CNS"><script id="tpc_ivf_otherprocedure_CNS" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->CNS->caption() ?></span></script></span></td>
		<td data-name="CNS"<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CNS" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CNS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
	<tr id="r__RS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure__RS"><script id="tpc_ivf_otherprocedure__RS" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->_RS->caption() ?></span></script></span></td>
		<td data-name="_RS"<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure__RS" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->_RS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CVS"><script id="tpc_ivf_otherprocedure_CVS" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->CVS->caption() ?></span></script></span></td>
		<td data-name="CVS"<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_CVS" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CVS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PA"><script id="tpc_ivf_otherprocedure_PA" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->PA->caption() ?></span></script></span></td>
		<td data-name="PA"<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_PA" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
	<tr id="r_InvestigationReport">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_InvestigationReport"><script id="tpc_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></span></script></span></td>
		<td data-name="InvestigationReport"<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FinalDiagnosis"><script id="tpc_ivf_otherprocedure_FinalDiagnosis" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->FinalDiagnosis->caption() ?></span></script></span></td>
		<td data-name="FinalDiagnosis"<?php echo $ivf_otherprocedure->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FinalDiagnosis" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_FinalDiagnosis">
<span<?php echo $ivf_otherprocedure->FinalDiagnosis->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FinalDiagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Treatment"><script id="tpc_ivf_otherprocedure_Treatment" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Treatment->caption() ?></span></script></span></td>
		<td data-name="Treatment"<?php echo $ivf_otherprocedure->Treatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Treatment" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Treatment">
<span<?php echo $ivf_otherprocedure->Treatment->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Treatment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->DetailOfOperation->Visible) { // DetailOfOperation ?>
	<tr id="r_DetailOfOperation">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DetailOfOperation"><script id="tpc_ivf_otherprocedure_DetailOfOperation" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->DetailOfOperation->caption() ?></span></script></span></td>
		<td data-name="DetailOfOperation"<?php echo $ivf_otherprocedure->DetailOfOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_DetailOfOperation" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_DetailOfOperation">
<span<?php echo $ivf_otherprocedure->DetailOfOperation->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DetailOfOperation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
	<tr id="r_FollowUpAdvice">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpAdvice"><script id="tpc_ivf_otherprocedure_FollowUpAdvice" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->FollowUpAdvice->caption() ?></span></script></span></td>
		<td data-name="FollowUpAdvice"<?php echo $ivf_otherprocedure->FollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpAdvice" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_FollowUpAdvice">
<span<?php echo $ivf_otherprocedure->FollowUpAdvice->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FollowUpAdvice->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->FollowUpMedication->Visible) { // FollowUpMedication ?>
	<tr id="r_FollowUpMedication">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpMedication"><script id="tpc_ivf_otherprocedure_FollowUpMedication" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->FollowUpMedication->caption() ?></span></script></span></td>
		<td data-name="FollowUpMedication"<?php echo $ivf_otherprocedure->FollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_FollowUpMedication" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_FollowUpMedication">
<span<?php echo $ivf_otherprocedure->FollowUpMedication->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FollowUpMedication->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->Plan->Visible) { // Plan ?>
	<tr id="r_Plan">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Plan"><script id="tpc_ivf_otherprocedure_Plan" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->Plan->caption() ?></span></script></span></td>
		<td data-name="Plan"<?php echo $ivf_otherprocedure->Plan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_Plan" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_Plan">
<span<?php echo $ivf_otherprocedure->Plan->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Plan->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
	<tr id="r_TempleteFinalDiagnosis">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TempleteFinalDiagnosis"><script id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->caption() ?></span></script></span></td>
		<td data-name="TempleteFinalDiagnosis"<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<span<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TempleteFinalDiagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateTreatment->Visible) { // TemplateTreatment ?>
	<tr id="r_TemplateTreatment">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateTreatment"><script id="tpc_ivf_otherprocedure_TemplateTreatment" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateTreatment->caption() ?></span></script></span></td>
		<td data-name="TemplateTreatment"<?php echo $ivf_otherprocedure->TemplateTreatment->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateTreatment" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TemplateTreatment">
<span<?php echo $ivf_otherprocedure->TemplateTreatment->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TemplateTreatment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateOperation->Visible) { // TemplateOperation ?>
	<tr id="r_TemplateOperation">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateOperation"><script id="tpc_ivf_otherprocedure_TemplateOperation" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateOperation->caption() ?></span></script></span></td>
		<td data-name="TemplateOperation"<?php echo $ivf_otherprocedure->TemplateOperation->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateOperation" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TemplateOperation">
<span<?php echo $ivf_otherprocedure->TemplateOperation->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TemplateOperation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
	<tr id="r_TemplateFollowUpAdvice">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpAdvice"><script id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->caption() ?></span></script></span></td>
		<td data-name="TemplateFollowUpAdvice"<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<span<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TemplateFollowUpAdvice->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
	<tr id="r_TemplateFollowUpMedication">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpMedication"><script id="tpc_ivf_otherprocedure_TemplateFollowUpMedication" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TemplateFollowUpMedication->caption() ?></span></script></span></td>
		<td data-name="TemplateFollowUpMedication"<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplateFollowUpMedication" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<span<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TemplateFollowUpMedication->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TemplatePlan->Visible) { // TemplatePlan ?>
	<tr id="r_TemplatePlan">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplatePlan"><script id="tpc_ivf_otherprocedure_TemplatePlan" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TemplatePlan->caption() ?></span></script></span></td>
		<td data-name="TemplatePlan"<?php echo $ivf_otherprocedure->TemplatePlan->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TemplatePlan" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TemplatePlan">
<span<?php echo $ivf_otherprocedure->TemplatePlan->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TemplatePlan->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->QRCode->Visible) { // QRCode ?>
	<tr id="r_QRCode">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_QRCode"><script id="tpc_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->QRCode->caption() ?></span></script></span></td>
		<td data-name="QRCode"<?php echo $ivf_otherprocedure->QRCode->cellAttributes() ?>>
<script id="orig_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html">
<?php echo $ivf_otherprocedure->QRCode->getViewValue() ?>
</script><script id="tpx_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html">
<?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'QRCODE', 80) ?>
</script>
<script id="tpx_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_QRCode">
<span<?php echo $ivf_otherprocedure->QRCode->viewAttributes() ?>>{{include tmpl="#tpx_ivf_otherprocedure_QRCode"/}}</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_otherprocedure_view->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TidNo"><script id="tpc_ivf_otherprocedure_TidNo" class="ivf_otherprocedureview" type="text/html"><span><?php echo $ivf_otherprocedure->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_otherprocedure_TidNo" class="ivf_otherprocedureview" type="text/html">
<span id="el_ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_otherprocedureview" class="ew-custom-template"></div>
<script id="tpm_ivf_otherprocedureview" type="text/html">
<div id="ct_ivf_otherprocedure_view"><style>
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
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_otherprocedure->Rows) ?> };
ew.applyTemplate("tpd_ivf_otherprocedureview", "tpm_ivf_otherprocedureview", "ivf_otherprocedureview", "<?php echo $ivf_otherprocedure->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_otherprocedureview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_otherprocedure_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_otherprocedure_view->terminate();
?>