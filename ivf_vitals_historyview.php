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
$ivf_vitals_history_view = new ivf_vitals_history_view();

// Run the page
$ivf_vitals_history_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_vitals_historyview = currentForm = new ew.Form("fivf_vitals_historyview", "view");

// Form_CustomValidate event
fivf_vitals_historyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitals_historyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitals_historyview.lists["x_MedicalHistory[]"] = <?php echo $ivf_vitals_history_view->MedicalHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($ivf_vitals_history_view->MedicalHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FBloodgroup"] = <?php echo $ivf_vitals_history_view->FBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_view->FBloodgroup->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_MBloodgroup"] = <?php echo $ivf_vitals_history_view->MBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_view->MBloodgroup->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_FBuild"] = <?php echo $ivf_vitals_history_view->FBuild->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FBuild"].options = <?php echo JsonEncode($ivf_vitals_history_view->FBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_MBuild"] = <?php echo $ivf_vitals_history_view->MBuild->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MBuild"].options = <?php echo JsonEncode($ivf_vitals_history_view->MBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FSkinColor"] = <?php echo $ivf_vitals_history_view->FSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->FSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_MSkinColor"] = <?php echo $ivf_vitals_history_view->MSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->MSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FEyesColor"] = <?php echo $ivf_vitals_history_view->FEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->FEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_MEyesColor"] = <?php echo $ivf_vitals_history_view->MEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->MEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FHairColor"] = <?php echo $ivf_vitals_history_view->FHairColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FHairColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->FHairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_MhairColor"] = <?php echo $ivf_vitals_history_view->MhairColor->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MhairColor"].options = <?php echo JsonEncode($ivf_vitals_history_view->MhairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FhairTexture"] = <?php echo $ivf_vitals_history_view->FhairTexture->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FhairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_view->FhairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_MHairTexture"] = <?php echo $ivf_vitals_history_view->MHairTexture->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MHairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_view->MHairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_FamilyHistory"] = <?php echo $ivf_vitals_history_view->FamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_FamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->FamilyHistory->lookupOptions()) ?>;
fivf_vitals_historyview.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyview.lists["x_Addictions[]"] = <?php echo $ivf_vitals_history_view->Addictions->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_Addictions[]"].options = <?php echo JsonEncode($ivf_vitals_history_view->Addictions->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_Medical"] = <?php echo $ivf_vitals_history_view->Medical->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_Medical"].options = <?php echo JsonEncode($ivf_vitals_history_view->Medical->options(FALSE, TRUE)) ?>;
fivf_vitals_historyview.lists["x_Surgical"] = <?php echo $ivf_vitals_history_view->Surgical->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_Surgical"].options = <?php echo JsonEncode($ivf_vitals_history_view->Surgical->lookupOptions()) ?>;
fivf_vitals_historyview.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyview.lists["x_CoitalHistory"] = <?php echo $ivf_vitals_history_view->CoitalHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_CoitalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->CoitalHistory->lookupOptions()) ?>;
fivf_vitals_historyview.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historyview.lists["x_TemplateMenstrualHistory"] = <?php echo $ivf_vitals_history_view->TemplateMenstrualHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateMenstrualHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateMenstrualHistory->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateObstetricHistory"] = <?php echo $ivf_vitals_history_view->TemplateObstetricHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateObstetricHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateObstetricHistory->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateFertilityTreatmentHistory"] = <?php echo $ivf_vitals_history_view->TemplateFertilityTreatmentHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateFertilityTreatmentHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateFertilityTreatmentHistory->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateSurgeryHistory"] = <?php echo $ivf_vitals_history_view->TemplateSurgeryHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateSurgeryHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateSurgeryHistory->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateFInvestigations"] = <?php echo $ivf_vitals_history_view->TemplateFInvestigations->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateFInvestigations"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateFInvestigations->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplatePlanOfManagement"] = <?php echo $ivf_vitals_history_view->TemplatePlanOfManagement->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplatePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplatePlanOfManagement->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplatePImpression"] = <?php echo $ivf_vitals_history_view->TemplatePImpression->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplatePImpression"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplatePImpression->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateMedications"] = <?php echo $ivf_vitals_history_view->TemplateMedications->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateMedications"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateMedications->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateSemenAnalysis"] = <?php echo $ivf_vitals_history_view->TemplateSemenAnalysis->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateSemenAnalysis"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateSemenAnalysis->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_MaleInsvestications"] = <?php echo $ivf_vitals_history_view->MaleInsvestications->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_MaleInsvestications"].options = <?php echo JsonEncode($ivf_vitals_history_view->MaleInsvestications->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateMIMpression"] = <?php echo $ivf_vitals_history_view->TemplateMIMpression->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateMIMpression"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateMIMpression->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_TemplateMalePlanOfManagement"] = <?php echo $ivf_vitals_history_view->TemplateMalePlanOfManagement->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_TemplateMalePlanOfManagement"].options = <?php echo JsonEncode($ivf_vitals_history_view->TemplateMalePlanOfManagement->lookupOptions()) ?>;
fivf_vitals_historyview.lists["x_pFamilyHistory"] = <?php echo $ivf_vitals_history_view->pFamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historyview.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_view->pFamilyHistory->lookupOptions()) ?>;
fivf_vitals_historyview.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_vitals_history_view->ExportOptions->render("body") ?>
<?php $ivf_vitals_history_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_vitals_history_view->showPageHeader(); ?>
<?php
$ivf_vitals_history_view->showMessage();
?>
<form name="fivf_vitals_historyview" id="fivf_vitals_historyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitals_history_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitals_history_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitals_history_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_id"><script id="tpc_ivf_vitals_history_id" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_vitals_history->id->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_id" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<?php echo $ivf_vitals_history->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_RIDNO"><script id="tpc_ivf_vitals_history_RIDNO" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $ivf_vitals_history->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_RIDNO" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Name"><script id="tpc_ivf_vitals_history_Name" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_vitals_history->Name->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Name" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Age"><script id="tpc_ivf_vitals_history_Age" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $ivf_vitals_history->Age->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Age" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history->Age->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
	<tr id="r_SEX">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SEX"><script id="tpc_ivf_vitals_history_SEX" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->SEX->caption() ?></span></script></span></td>
		<td data-name="SEX"<?php echo $ivf_vitals_history->SEX->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SEX" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history->SEX->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SEX->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Religion"><script id="tpc_ivf_vitals_history_Religion" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Religion->caption() ?></span></script></span></td>
		<td data-name="Religion"<?php echo $ivf_vitals_history->Religion->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Religion" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history->Religion->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Religion->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Address"><script id="tpc_ivf_vitals_history_Address" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Address->caption() ?></span></script></span></td>
		<td data-name="Address"<?php echo $ivf_vitals_history->Address->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Address" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history->Address->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Address->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_IdentificationMark"><script id="tpc_ivf_vitals_history_IdentificationMark" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></span></script></span></td>
		<td data-name="IdentificationMark"<?php echo $ivf_vitals_history->IdentificationMark->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_IdentificationMark" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<tr id="r_DoublewitnessName1">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName1"><script id="tpc_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></span></script></span></td>
		<td data-name="DoublewitnessName1"<?php echo $ivf_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<tr id="r_DoublewitnessName2">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName2"><script id="tpc_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></span></script></span></td>
		<td data-name="DoublewitnessName2"<?php echo $ivf_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<tr id="r_Chiefcomplaints">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Chiefcomplaints"><script id="tpc_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></span></script></span></td>
		<td data-name="Chiefcomplaints"<?php echo $ivf_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MenstrualHistory"><script id="tpc_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="MenstrualHistory"<?php echo $ivf_vitals_history->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_ObstetricHistory"><script id="tpc_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></span></script></span></td>
		<td data-name="ObstetricHistory"<?php echo $ivf_vitals_history->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<tr id="r_MedicalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MedicalHistory"><script id="tpc_ivf_vitals_history_MedicalHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></span></script></span></td>
		<td data-name="MedicalHistory"<?php echo $ivf_vitals_history->MedicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MedicalHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgicalHistory"><script id="tpc_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></span></script></span></td>
		<td data-name="SurgicalHistory"<?php echo $ivf_vitals_history->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<tr id="r_Generalexaminationpallor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor"><script id="tpc_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></span></script></span></td>
		<td data-name="Generalexaminationpallor"<?php echo $ivf_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
	<tr id="r_PR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PR"><script id="tpc_ivf_vitals_history_PR" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PR->caption() ?></span></script></span></td>
		<td data-name="PR"<?php echo $ivf_vitals_history->PR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PR" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history->PR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CVS"><script id="tpc_ivf_vitals_history_CVS" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->CVS->caption() ?></span></script></span></td>
		<td data-name="CVS"<?php echo $ivf_vitals_history->CVS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CVS" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history->CVS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CVS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PA"><script id="tpc_ivf_vitals_history_PA" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PA->caption() ?></span></script></span></td>
		<td data-name="PA"<?php echo $ivf_vitals_history->PA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PA" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history->PA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<tr id="r_PROVISIONALDIAGNOSIS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS"><script id="tpc_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span></script></span></td>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
	<tr id="r_Investigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Investigations"><script id="tpc_ivf_vitals_history_Investigations" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Investigations->caption() ?></span></script></span></td>
		<td data-name="Investigations"<?php echo $ivf_vitals_history->Investigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Investigations" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Investigations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
	<tr id="r_Fheight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fheight"><script id="tpc_ivf_vitals_history_Fheight" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Fheight->caption() ?></span></script></span></td>
		<td data-name="Fheight"<?php echo $ivf_vitals_history->Fheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fheight" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fheight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
	<tr id="r_Fweight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fweight"><script id="tpc_ivf_vitals_history_Fweight" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Fweight->caption() ?></span></script></span></td>
		<td data-name="Fweight"<?php echo $ivf_vitals_history->Fweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fweight" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fweight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
	<tr id="r_FBMI">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBMI"><script id="tpc_ivf_vitals_history_FBMI" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FBMI->caption() ?></span></script></span></td>
		<td data-name="FBMI"<?php echo $ivf_vitals_history->FBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBMI" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<tr id="r_FBloodgroup">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBloodgroup"><script id="tpc_ivf_vitals_history_FBloodgroup" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></span></script></span></td>
		<td data-name="FBloodgroup"<?php echo $ivf_vitals_history->FBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBloodgroup" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
	<tr id="r_Mheight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mheight"><script id="tpc_ivf_vitals_history_Mheight" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Mheight->caption() ?></span></script></span></td>
		<td data-name="Mheight"<?php echo $ivf_vitals_history->Mheight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mheight" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mheight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
	<tr id="r_Mweight">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mweight"><script id="tpc_ivf_vitals_history_Mweight" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Mweight->caption() ?></span></script></span></td>
		<td data-name="Mweight"<?php echo $ivf_vitals_history->Mweight->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mweight" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mweight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
	<tr id="r_MBMI">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBMI"><script id="tpc_ivf_vitals_history_MBMI" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MBMI->caption() ?></span></script></span></td>
		<td data-name="MBMI"<?php echo $ivf_vitals_history->MBMI->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBMI" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<tr id="r_MBloodgroup">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBloodgroup"><script id="tpc_ivf_vitals_history_MBloodgroup" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></span></script></span></td>
		<td data-name="MBloodgroup"<?php echo $ivf_vitals_history->MBloodgroup->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBloodgroup" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
	<tr id="r_FBuild">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBuild"><script id="tpc_ivf_vitals_history_FBuild" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FBuild->caption() ?></span></script></span></td>
		<td data-name="FBuild"<?php echo $ivf_vitals_history->FBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FBuild" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBuild->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
	<tr id="r_MBuild">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBuild"><script id="tpc_ivf_vitals_history_MBuild" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MBuild->caption() ?></span></script></span></td>
		<td data-name="MBuild"<?php echo $ivf_vitals_history->MBuild->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MBuild" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBuild->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<tr id="r_FSkinColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FSkinColor"><script id="tpc_ivf_vitals_history_FSkinColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FSkinColor->caption() ?></span></script></span></td>
		<td data-name="FSkinColor"<?php echo $ivf_vitals_history->FSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FSkinColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<tr id="r_MSkinColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MSkinColor"><script id="tpc_ivf_vitals_history_MSkinColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MSkinColor->caption() ?></span></script></span></td>
		<td data-name="MSkinColor"<?php echo $ivf_vitals_history->MSkinColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MSkinColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<tr id="r_FEyesColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FEyesColor"><script id="tpc_ivf_vitals_history_FEyesColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FEyesColor->caption() ?></span></script></span></td>
		<td data-name="FEyesColor"<?php echo $ivf_vitals_history->FEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FEyesColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<tr id="r_MEyesColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MEyesColor"><script id="tpc_ivf_vitals_history_MEyesColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MEyesColor->caption() ?></span></script></span></td>
		<td data-name="MEyesColor"<?php echo $ivf_vitals_history->MEyesColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MEyesColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<tr id="r_FHairColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FHairColor"><script id="tpc_ivf_vitals_history_FHairColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FHairColor->caption() ?></span></script></span></td>
		<td data-name="FHairColor"<?php echo $ivf_vitals_history->FHairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FHairColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FHairColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<tr id="r_MhairColor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MhairColor"><script id="tpc_ivf_vitals_history_MhairColor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MhairColor->caption() ?></span></script></span></td>
		<td data-name="MhairColor"<?php echo $ivf_vitals_history->MhairColor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MhairColor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MhairColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<tr id="r_FhairTexture">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FhairTexture"><script id="tpc_ivf_vitals_history_FhairTexture" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FhairTexture->caption() ?></span></script></span></td>
		<td data-name="FhairTexture"<?php echo $ivf_vitals_history->FhairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FhairTexture" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<tr id="r_MHairTexture">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MHairTexture"><script id="tpc_ivf_vitals_history_MHairTexture" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MHairTexture->caption() ?></span></script></span></td>
		<td data-name="MHairTexture"<?php echo $ivf_vitals_history->MHairTexture->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MHairTexture" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
	<tr id="r_Fothers">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fothers"><script id="tpc_ivf_vitals_history_Fothers" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Fothers->caption() ?></span></script></span></td>
		<td data-name="Fothers"<?php echo $ivf_vitals_history->Fothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Fothers" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fothers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
	<tr id="r_Mothers">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mothers"><script id="tpc_ivf_vitals_history_Mothers" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Mothers->caption() ?></span></script></span></td>
		<td data-name="Mothers"<?php echo $ivf_vitals_history->Mothers->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Mothers" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mothers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
	<tr id="r_PGE">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PGE"><script id="tpc_ivf_vitals_history_PGE" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PGE->caption() ?></span></script></span></td>
		<td data-name="PGE"<?php echo $ivf_vitals_history->PGE->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PGE" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history->PGE->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PGE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
	<tr id="r_PPR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPR"><script id="tpc_ivf_vitals_history_PPR" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PPR->caption() ?></span></script></span></td>
		<td data-name="PPR"<?php echo $ivf_vitals_history->PPR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPR" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history->PPR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
	<tr id="r_PBP">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PBP"><script id="tpc_ivf_vitals_history_PBP" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PBP->caption() ?></span></script></span></td>
		<td data-name="PBP"<?php echo $ivf_vitals_history->PBP->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PBP" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history->PBP->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PBP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
	<tr id="r_Breast">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Breast"><script id="tpc_ivf_vitals_history_Breast" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Breast->caption() ?></span></script></span></td>
		<td data-name="Breast"<?php echo $ivf_vitals_history->Breast->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Breast" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history->Breast->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Breast->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
	<tr id="r_PPA">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPA"><script id="tpc_ivf_vitals_history_PPA" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PPA->caption() ?></span></script></span></td>
		<td data-name="PPA"<?php echo $ivf_vitals_history->PPA->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPA" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history->PPA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
	<tr id="r_PPSV">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPSV"><script id="tpc_ivf_vitals_history_PPSV" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PPSV->caption() ?></span></script></span></td>
		<td data-name="PPSV"<?php echo $ivf_vitals_history->PPSV->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPSV" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPSV->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<tr id="r_PPAPSMEAR">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR"><script id="tpc_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></span></script></span></td>
		<td data-name="PPAPSMEAR"<?php echo $ivf_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<tr id="r_PTHYROID">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PTHYROID"><script id="tpc_ivf_vitals_history_PTHYROID" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PTHYROID->caption() ?></span></script></span></td>
		<td data-name="PTHYROID"<?php echo $ivf_vitals_history->PTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PTHYROID" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<tr id="r_MTHYROID">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MTHYROID"><script id="tpc_ivf_vitals_history_MTHYROID" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MTHYROID->caption() ?></span></script></span></td>
		<td data-name="MTHYROID"<?php echo $ivf_vitals_history->MTHYROID->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MTHYROID" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<tr id="r_SecSexCharacters">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SecSexCharacters"><script id="tpc_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></span></script></span></td>
		<td data-name="SecSexCharacters"<?php echo $ivf_vitals_history->SecSexCharacters->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<tr id="r_PenisUM">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PenisUM"><script id="tpc_ivf_vitals_history_PenisUM" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PenisUM->caption() ?></span></script></span></td>
		<td data-name="PenisUM"<?php echo $ivf_vitals_history->PenisUM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PenisUM" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PenisUM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
	<tr id="r_VAS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_VAS"><script id="tpc_ivf_vitals_history_VAS" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->VAS->caption() ?></span></script></span></td>
		<td data-name="VAS"<?php echo $ivf_vitals_history->VAS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_VAS" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history->VAS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->VAS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<tr id="r_EPIDIDYMIS">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS"><script id="tpc_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></span></script></span></td>
		<td data-name="EPIDIDYMIS"<?php echo $ivf_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<tr id="r_Varicocele">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Varicocele"><script id="tpc_ivf_vitals_history_Varicocele" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Varicocele->caption() ?></span></script></span></td>
		<td data-name="Varicocele"<?php echo $ivf_vitals_history->Varicocele->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Varicocele" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Varicocele->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
	<tr id="r_FertilityTreatmentHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FertilityTreatmentHistory"><script id="tpc_ivf_vitals_history_FertilityTreatmentHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FertilityTreatmentHistory->caption() ?></span></script></span></td>
		<td data-name="FertilityTreatmentHistory"<?php echo $ivf_vitals_history->FertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FertilityTreatmentHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<span<?php echo $ivf_vitals_history->FertilityTreatmentHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FertilityTreatmentHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->SurgeryHistory->Visible) { // SurgeryHistory ?>
	<tr id="r_SurgeryHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgeryHistory"><script id="tpc_ivf_vitals_history_SurgeryHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->SurgeryHistory->caption() ?></span></script></span></td>
		<td data-name="SurgeryHistory"<?php echo $ivf_vitals_history->SurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SurgeryHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_SurgeryHistory">
<span<?php echo $ivf_vitals_history->SurgeryHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SurgeryHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FamilyHistory"><script id="tpc_ivf_vitals_history_FamilyHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></span></script></span></td>
		<td data-name="FamilyHistory"<?php echo $ivf_vitals_history->FamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_FamilyHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PInvestigations->Visible) { // PInvestigations ?>
	<tr id="r_PInvestigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PInvestigations"><script id="tpc_ivf_vitals_history_PInvestigations" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PInvestigations->caption() ?></span></script></span></td>
		<td data-name="PInvestigations"<?php echo $ivf_vitals_history->PInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PInvestigations" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PInvestigations">
<span<?php echo $ivf_vitals_history->PInvestigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PInvestigations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
	<tr id="r_Addictions">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Addictions"><script id="tpc_ivf_vitals_history_Addictions" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Addictions->caption() ?></span></script></span></td>
		<td data-name="Addictions"<?php echo $ivf_vitals_history->Addictions->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Addictions" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Addictions->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Medications->Visible) { // Medications ?>
	<tr id="r_Medications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medications"><script id="tpc_ivf_vitals_history_Medications" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Medications->caption() ?></span></script></span></td>
		<td data-name="Medications"<?php echo $ivf_vitals_history->Medications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medications" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Medications">
<span<?php echo $ivf_vitals_history->Medications->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Medications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
	<tr id="r_Medical">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medical"><script id="tpc_ivf_vitals_history_Medical" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Medical->caption() ?></span></script></span></td>
		<td data-name="Medical"<?php echo $ivf_vitals_history->Medical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Medical" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history->Medical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Medical->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
	<tr id="r_Surgical">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Surgical"><script id="tpc_ivf_vitals_history_Surgical" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->Surgical->caption() ?></span></script></span></td>
		<td data-name="Surgical"<?php echo $ivf_vitals_history->Surgical->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_Surgical" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Surgical->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<tr id="r_CoitalHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CoitalHistory"><script id="tpc_ivf_vitals_history_CoitalHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></span></script></span></td>
		<td data-name="CoitalHistory"<?php echo $ivf_vitals_history->CoitalHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CoitalHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->SemenAnalysis->Visible) { // SemenAnalysis ?>
	<tr id="r_SemenAnalysis">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SemenAnalysis"><script id="tpc_ivf_vitals_history_SemenAnalysis" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->SemenAnalysis->caption() ?></span></script></span></td>
		<td data-name="SemenAnalysis"<?php echo $ivf_vitals_history->SemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_SemenAnalysis" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_SemenAnalysis">
<span<?php echo $ivf_vitals_history->SemenAnalysis->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SemenAnalysis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MInsvestications->Visible) { // MInsvestications ?>
	<tr id="r_MInsvestications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MInsvestications"><script id="tpc_ivf_vitals_history_MInsvestications" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MInsvestications->caption() ?></span></script></span></td>
		<td data-name="MInsvestications"<?php echo $ivf_vitals_history->MInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MInsvestications" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MInsvestications">
<span<?php echo $ivf_vitals_history->MInsvestications->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MInsvestications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PImpression->Visible) { // PImpression ?>
	<tr id="r_PImpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PImpression"><script id="tpc_ivf_vitals_history_PImpression" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PImpression->caption() ?></span></script></span></td>
		<td data-name="PImpression"<?php echo $ivf_vitals_history->PImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PImpression" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PImpression">
<span<?php echo $ivf_vitals_history->PImpression->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PImpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MIMpression->Visible) { // MIMpression ?>
	<tr id="r_MIMpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MIMpression"><script id="tpc_ivf_vitals_history_MIMpression" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MIMpression->caption() ?></span></script></span></td>
		<td data-name="MIMpression"<?php echo $ivf_vitals_history->MIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MIMpression" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MIMpression">
<span<?php echo $ivf_vitals_history->MIMpression->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MIMpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
	<tr id="r_PPlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPlanOfManagement"><script id="tpc_ivf_vitals_history_PPlanOfManagement" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PPlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="PPlanOfManagement"<?php echo $ivf_vitals_history->PPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PPlanOfManagement" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PPlanOfManagement">
<span<?php echo $ivf_vitals_history->PPlanOfManagement->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
	<tr id="r_MPlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MPlanOfManagement"><script id="tpc_ivf_vitals_history_MPlanOfManagement" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MPlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="MPlanOfManagement"<?php echo $ivf_vitals_history->MPlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MPlanOfManagement" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MPlanOfManagement">
<span<?php echo $ivf_vitals_history->MPlanOfManagement->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MPlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->PReadMore->Visible) { // PReadMore ?>
	<tr id="r_PReadMore">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PReadMore"><script id="tpc_ivf_vitals_history_PReadMore" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->PReadMore->caption() ?></span></script></span></td>
		<td data-name="PReadMore"<?php echo $ivf_vitals_history->PReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_PReadMore" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_PReadMore">
<span<?php echo $ivf_vitals_history->PReadMore->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PReadMore->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MReadMore->Visible) { // MReadMore ?>
	<tr id="r_MReadMore">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MReadMore"><script id="tpc_ivf_vitals_history_MReadMore" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MReadMore->caption() ?></span></script></span></td>
		<td data-name="MReadMore"<?php echo $ivf_vitals_history->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MReadMore" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MReadMore">
<span<?php echo $ivf_vitals_history->MReadMore->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MReadMore->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<tr id="r_MariedFor">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MariedFor"><script id="tpc_ivf_vitals_history_MariedFor" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MariedFor->caption() ?></span></script></span></td>
		<td data-name="MariedFor"<?php echo $ivf_vitals_history->MariedFor->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MariedFor" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MariedFor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<tr id="r_CMNCM">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CMNCM"><script id="tpc_ivf_vitals_history_CMNCM" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->CMNCM->caption() ?></span></script></span></td>
		<td data-name="CMNCM"<?php echo $ivf_vitals_history->CMNCM->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_CMNCM" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CMNCM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMenstrualHistory->Visible) { // TemplateMenstrualHistory ?>
	<tr id="r_TemplateMenstrualHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMenstrualHistory"><script id="tpc_ivf_vitals_history_TemplateMenstrualHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="TemplateMenstrualHistory"<?php echo $ivf_vitals_history->TemplateMenstrualHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMenstrualHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateMenstrualHistory">
<span<?php echo $ivf_vitals_history->TemplateMenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateMenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateObstetricHistory->Visible) { // TemplateObstetricHistory ?>
	<tr id="r_TemplateObstetricHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateObstetricHistory"><script id="tpc_ivf_vitals_history_TemplateObstetricHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateObstetricHistory->caption() ?></span></script></span></td>
		<td data-name="TemplateObstetricHistory"<?php echo $ivf_vitals_history->TemplateObstetricHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateObstetricHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateObstetricHistory">
<span<?php echo $ivf_vitals_history->TemplateObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateObstetricHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateFertilityTreatmentHistory->Visible) { // TemplateFertilityTreatmentHistory ?>
	<tr id="r_TemplateFertilityTreatmentHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateFertilityTreatmentHistory"><script id="tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->caption() ?></span></script></span></td>
		<td data-name="TemplateFertilityTreatmentHistory"<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateFertilityTreatmentHistory">
<span<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateFertilityTreatmentHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateSurgeryHistory->Visible) { // TemplateSurgeryHistory ?>
	<tr id="r_TemplateSurgeryHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateSurgeryHistory"><script id="tpc_ivf_vitals_history_TemplateSurgeryHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateSurgeryHistory->caption() ?></span></script></span></td>
		<td data-name="TemplateSurgeryHistory"<?php echo $ivf_vitals_history->TemplateSurgeryHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSurgeryHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateSurgeryHistory">
<span<?php echo $ivf_vitals_history->TemplateSurgeryHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateSurgeryHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateFInvestigations->Visible) { // TemplateFInvestigations ?>
	<tr id="r_TemplateFInvestigations">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateFInvestigations"><script id="tpc_ivf_vitals_history_TemplateFInvestigations" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateFInvestigations->caption() ?></span></script></span></td>
		<td data-name="TemplateFInvestigations"<?php echo $ivf_vitals_history->TemplateFInvestigations->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateFInvestigations" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateFInvestigations">
<span<?php echo $ivf_vitals_history->TemplateFInvestigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateFInvestigations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplatePlanOfManagement->Visible) { // TemplatePlanOfManagement ?>
	<tr id="r_TemplatePlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplatePlanOfManagement"><script id="tpc_ivf_vitals_history_TemplatePlanOfManagement" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplatePlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="TemplatePlanOfManagement"<?php echo $ivf_vitals_history->TemplatePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePlanOfManagement" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplatePlanOfManagement">
<span<?php echo $ivf_vitals_history->TemplatePlanOfManagement->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplatePlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplatePImpression->Visible) { // TemplatePImpression ?>
	<tr id="r_TemplatePImpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplatePImpression"><script id="tpc_ivf_vitals_history_TemplatePImpression" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplatePImpression->caption() ?></span></script></span></td>
		<td data-name="TemplatePImpression"<?php echo $ivf_vitals_history->TemplatePImpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplatePImpression" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplatePImpression">
<span<?php echo $ivf_vitals_history->TemplatePImpression->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplatePImpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMedications->Visible) { // TemplateMedications ?>
	<tr id="r_TemplateMedications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMedications"><script id="tpc_ivf_vitals_history_TemplateMedications" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMedications->caption() ?></span></script></span></td>
		<td data-name="TemplateMedications"<?php echo $ivf_vitals_history->TemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMedications" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateMedications">
<span<?php echo $ivf_vitals_history->TemplateMedications->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateMedications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateSemenAnalysis->Visible) { // TemplateSemenAnalysis ?>
	<tr id="r_TemplateSemenAnalysis">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateSemenAnalysis"><script id="tpc_ivf_vitals_history_TemplateSemenAnalysis" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateSemenAnalysis->caption() ?></span></script></span></td>
		<td data-name="TemplateSemenAnalysis"<?php echo $ivf_vitals_history->TemplateSemenAnalysis->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateSemenAnalysis" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateSemenAnalysis">
<span<?php echo $ivf_vitals_history->TemplateSemenAnalysis->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateSemenAnalysis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->MaleInsvestications->Visible) { // MaleInsvestications ?>
	<tr id="r_MaleInsvestications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MaleInsvestications"><script id="tpc_ivf_vitals_history_MaleInsvestications" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->MaleInsvestications->caption() ?></span></script></span></td>
		<td data-name="MaleInsvestications"<?php echo $ivf_vitals_history->MaleInsvestications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_MaleInsvestications" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_MaleInsvestications">
<span<?php echo $ivf_vitals_history->MaleInsvestications->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MaleInsvestications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMIMpression->Visible) { // TemplateMIMpression ?>
	<tr id="r_TemplateMIMpression">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMIMpression"><script id="tpc_ivf_vitals_history_TemplateMIMpression" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMIMpression->caption() ?></span></script></span></td>
		<td data-name="TemplateMIMpression"<?php echo $ivf_vitals_history->TemplateMIMpression->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMIMpression" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateMIMpression">
<span<?php echo $ivf_vitals_history->TemplateMIMpression->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateMIMpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TemplateMalePlanOfManagement->Visible) { // TemplateMalePlanOfManagement ?>
	<tr id="r_TemplateMalePlanOfManagement">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TemplateMalePlanOfManagement"><script id="tpc_ivf_vitals_history_TemplateMalePlanOfManagement" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="TemplateMalePlanOfManagement"<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TemplateMalePlanOfManagement" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TemplateMalePlanOfManagement">
<span<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TemplateMalePlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TidNo"><script id="tpc_ivf_vitals_history_TidNo" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_vitals_history->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_TidNo" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<tr id="r_pFamilyHistory">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pFamilyHistory"><script id="tpc_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></span></script></span></td>
		<td data-name="pFamilyHistory"<?php echo $ivf_vitals_history->pFamilyHistory->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->pTemplateMedications->Visible) { // pTemplateMedications ?>
	<tr id="r_pTemplateMedications">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pTemplateMedications"><script id="tpc_ivf_vitals_history_pTemplateMedications" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->pTemplateMedications->caption() ?></span></script></span></td>
		<td data-name="pTemplateMedications"<?php echo $ivf_vitals_history->pTemplateMedications->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_pTemplateMedications" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_pTemplateMedications">
<span<?php echo $ivf_vitals_history->pTemplateMedications->viewAttributes() ?>>
<?php echo $ivf_vitals_history->pTemplateMedications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTPO->Visible) { // AntiTPO ?>
	<tr id="r_AntiTPO">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_AntiTPO"><script id="tpc_ivf_vitals_history_AntiTPO" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->AntiTPO->caption() ?></span></script></span></td>
		<td data-name="AntiTPO"<?php echo $ivf_vitals_history->AntiTPO->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_AntiTPO" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_AntiTPO">
<span<?php echo $ivf_vitals_history->AntiTPO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->AntiTPO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTG->Visible) { // AntiTG ?>
	<tr id="r_AntiTG">
		<td class="<?php echo $ivf_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_AntiTG"><script id="tpc_ivf_vitals_history_AntiTG" class="ivf_vitals_historyview" type="text/html"><span><?php echo $ivf_vitals_history->AntiTG->caption() ?></span></script></span></td>
		<td data-name="AntiTG"<?php echo $ivf_vitals_history->AntiTG->cellAttributes() ?>>
<script id="tpx_ivf_vitals_history_AntiTG" class="ivf_vitals_historyview" type="text/html">
<span id="el_ivf_vitals_history_AntiTG">
<span<?php echo $ivf_vitals_history->AntiTG->viewAttributes() ?>>
<?php echo $ivf_vitals_history->AntiTG->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_vitals_historyview" class="ew-custom-template"></div>
<script id="tpm_ivf_vitals_historyview" type="text/html">
<div id="ct_ivf_vitals_history_view"><style>
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
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($IVFid == null)
{
	$sqla = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where id='".$Iid."'";
	$resultsa = $dbhelper->ExecuteRows($sqla);
	$IVFid = $resultsa[0]["RIDNO"];
	$cid = $resultsa[0]["Name"];
}
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
<div id="divCheckbox" style="display: none;">
{{include tmpl="#tpc_ivf_vitals_history_RIDNO"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_RIDNO"/}}
{{include tmpl="#tpc_ivf_vitals_history_Name"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Name"/}}
</div>
<input type="hidden" id="ivfRIDNO" name="ivfRIDNO" value="<?php echo $IVFid; ?>">
<input type="hidden" id="ivfName" name="ivfName" value="<?php echo $results[0]["Female"]; ?>">
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
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
</br>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
				 	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Fheight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fheight"/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Fweight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_FBMI"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_IdentificationMark"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_IdentificationMark"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FBuild"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FSkinColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FEyesColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FHairColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FHairColor"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MHairTexture"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MHairTexture"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Mothers"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mothers"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td>{{include tmpl="#tpc_ivf_vitals_history_Mheight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mheight"/}} Cm.</td><td>{{include tmpl="#tpc_ivf_vitals_history_Mweight"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Mweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MBMI"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Address"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Address"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MBuild"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MSkinColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MEyesColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MhairColor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MhairColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FhairTexture"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FhairTexture"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Fothers"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Fothers"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MariedFor"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MariedFor"/}}</span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CMNCM"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_CMNCM"/}}</span>
				  </div>
{{include tmpl="#tpc_ivf_vitals_history_Chiefcomplaints"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Chiefcomplaints"/}}
  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_CoitalHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_CoitalHistory"/}}</span>
				  </div>
				  				 <div class="ew-row">
				 {{include tmpl="#tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FertilityTreatmentHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FertilityTreatmentHistory"/}}</span>
				  </div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
			 		{{include tmpl="#tpc_ivf_vitals_history_TemplateMenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateMenstrualHistory"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MenstrualHistory"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateObstetricHistory"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_ObstetricHistory"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MedicalHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MedicalHistory"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateSurgeryHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateSurgeryHistory"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SurgeryHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SurgeryHistory"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_FamilyHistory"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateFInvestigations"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateFInvestigations"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PInvestigations"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PInvestigations"/}}</span>
				  </div>
					<div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMedications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateMedications"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pTemplateMedications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_pTemplateMedications"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Addictions"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Addictions"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medical"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Medical"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Surgical"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Surgical"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_pFamilyHistory"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_pFamilyHistory"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateSemenAnalysis"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateSemenAnalysis"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SemenAnalysis"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SemenAnalysis"/}}</span>
				  </div>
				    <div class="ew-row">
				    {{include tmpl="#tpc_ivf_vitals_history_MaleInsvestications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MaleInsvestications"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MInsvestications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MInsvestications"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMedications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateMedications"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Medications"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Medications"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PGE"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PGE"/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PPR"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPR"/}}</span>
					<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_PBP"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PBP"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Breast"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Breast"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPA"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPA"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPSV"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPSV"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPAPSMEAR"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPAPSMEAR"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PTHYROID"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PTHYROID"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell col-6">{{include tmpl="#tpc_ivf_vitals_history_MTHYROID"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MTHYROID"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_SecSexCharacters"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_SecSexCharacters"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PenisUM"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PenisUM"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_VAS"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_VAS"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_EPIDIDYMIS"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_EPIDIDYMIS"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_Varicocele"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_Varicocele"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
			 		{{include tmpl="#tpc_ivf_vitals_history_TemplatePImpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplatePImpression"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PImpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PImpression"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplatePlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplatePlanOfManagement"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PPlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PPlanOfManagement"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_PReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_PReadMore"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
				{{include tmpl="#tpc_ivf_vitals_history_TemplateMIMpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateMIMpression"/}}
						<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MIMpression"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MIMpression"/}}</span>
				  </div>
				   <div class="ew-row">
				   {{include tmpl="#tpc_ivf_vitals_history_TemplateMalePlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_TemplateMalePlanOfManagement"/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MPlanOfManagement"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MPlanOfManagement"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_vitals_history_MReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_vitals_history_MReadMore"/}}</span>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_vitals_history->Rows) ?> };
ew.applyTemplate("tpd_ivf_vitals_historyview", "tpm_ivf_vitals_historyview", "ivf_vitals_historyview", "<?php echo $ivf_vitals_history->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_vitals_historyview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_vitals_history_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitals_history->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("x_Fweight").style.width = "80px";
 document.getElementById("x_Fheight").style.width = "80px";
 document.getElementById("x_Mweight").style.width = "80px";
 document.getElementById("x_Mheight").style.width = "80px";
   $("#x_Fweight").change(function(){
		calculateBmi();
	});
	$("#x_Fheight").change(function(){
		calculateBmi();
	});

	function calculateBmi() {
		var weight = document.getElementById("x_Fweight").value
		var height = document.getElementById("x_Fheight").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}

			//document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_FBMI").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}
	   $("#x_Mweight").change(function(){
		calculateBmiM();
	});
	$("#x_Mheight").change(function(){
		calculateBmiM();
	});

	function calculateBmiM() {
		var weight = document.getElementById("x_Mweight").value
		var height = document.getElementById("x_Mheight").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}

			//document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_MBMI").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_vitals_history_view->terminate();
?>