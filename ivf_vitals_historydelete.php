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
$ivf_vitals_history_delete = new ivf_vitals_history_delete();

// Run the page
$ivf_vitals_history_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitals_history_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_vitals_historydelete = currentForm = new ew.Form("fivf_vitals_historydelete", "delete");

// Form_CustomValidate event
fivf_vitals_historydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitals_historydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitals_historydelete.lists["x_MedicalHistory[]"] = <?php echo $ivf_vitals_history_delete->MedicalHistory->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MedicalHistory->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FBloodgroup"] = <?php echo $ivf_vitals_history_delete->FBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FBloodgroup->lookupOptions()) ?>;
fivf_vitals_historydelete.lists["x_MBloodgroup"] = <?php echo $ivf_vitals_history_delete->MBloodgroup->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MBloodgroup"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MBloodgroup->lookupOptions()) ?>;
fivf_vitals_historydelete.lists["x_FBuild"] = <?php echo $ivf_vitals_history_delete->FBuild->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FBuild"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_MBuild"] = <?php echo $ivf_vitals_history_delete->MBuild->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MBuild"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MBuild->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FSkinColor"] = <?php echo $ivf_vitals_history_delete->FSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_MSkinColor"] = <?php echo $ivf_vitals_history_delete->MSkinColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MSkinColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MSkinColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FEyesColor"] = <?php echo $ivf_vitals_history_delete->FEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_MEyesColor"] = <?php echo $ivf_vitals_history_delete->MEyesColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MEyesColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MEyesColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FHairColor"] = <?php echo $ivf_vitals_history_delete->FHairColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FHairColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FHairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_MhairColor"] = <?php echo $ivf_vitals_history_delete->MhairColor->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MhairColor"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MhairColor->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FhairTexture"] = <?php echo $ivf_vitals_history_delete->FhairTexture->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FhairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FhairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_MHairTexture"] = <?php echo $ivf_vitals_history_delete->MHairTexture->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_MHairTexture"].options = <?php echo JsonEncode($ivf_vitals_history_delete->MHairTexture->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_FamilyHistory"] = <?php echo $ivf_vitals_history_delete->FamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_FamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_delete->FamilyHistory->lookupOptions()) ?>;
fivf_vitals_historydelete.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historydelete.lists["x_Addictions[]"] = <?php echo $ivf_vitals_history_delete->Addictions->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_Addictions[]"].options = <?php echo JsonEncode($ivf_vitals_history_delete->Addictions->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_Medical"] = <?php echo $ivf_vitals_history_delete->Medical->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_Medical"].options = <?php echo JsonEncode($ivf_vitals_history_delete->Medical->options(FALSE, TRUE)) ?>;
fivf_vitals_historydelete.lists["x_Surgical"] = <?php echo $ivf_vitals_history_delete->Surgical->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_Surgical"].options = <?php echo JsonEncode($ivf_vitals_history_delete->Surgical->lookupOptions()) ?>;
fivf_vitals_historydelete.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historydelete.lists["x_CoitalHistory"] = <?php echo $ivf_vitals_history_delete->CoitalHistory->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_CoitalHistory"].options = <?php echo JsonEncode($ivf_vitals_history_delete->CoitalHistory->lookupOptions()) ?>;
fivf_vitals_historydelete.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_vitals_historydelete.lists["x_pFamilyHistory"] = <?php echo $ivf_vitals_history_delete->pFamilyHistory->Lookup->toClientList() ?>;
fivf_vitals_historydelete.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($ivf_vitals_history_delete->pFamilyHistory->lookupOptions()) ?>;
fivf_vitals_historydelete.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_vitals_history_delete->showPageHeader(); ?>
<?php
$ivf_vitals_history_delete->showMessage();
?>
<form name="fivf_vitals_historydelete" id="fivf_vitals_historydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitals_history_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitals_history_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_vitals_history_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
		<th class="<?php echo $ivf_vitals_history->id->headerCellClass() ?>"><span id="elh_ivf_vitals_history_id" class="ivf_vitals_history_id"><?php echo $ivf_vitals_history->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_vitals_history->RIDNO->headerCellClass() ?>"><span id="elh_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO"><?php echo $ivf_vitals_history->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_vitals_history->Name->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Name" class="ivf_vitals_history_Name"><?php echo $ivf_vitals_history->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_vitals_history->Age->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Age" class="ivf_vitals_history_Age"><?php echo $ivf_vitals_history->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
		<th class="<?php echo $ivf_vitals_history->SEX->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX"><?php echo $ivf_vitals_history->SEX->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
		<th class="<?php echo $ivf_vitals_history->Religion->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion"><?php echo $ivf_vitals_history->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
		<th class="<?php echo $ivf_vitals_history->Address->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Address" class="ivf_vitals_history_Address"><?php echo $ivf_vitals_history->Address->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $ivf_vitals_history->IdentificationMark->headerCellClass() ?>"><span id="elh_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark"><?php echo $ivf_vitals_history->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName1->headerCellClass() ?>"><span id="elh_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1"><?php echo $ivf_vitals_history->DoublewitnessName1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<th class="<?php echo $ivf_vitals_history->DoublewitnessName2->headerCellClass() ?>"><span id="elh_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2"><?php echo $ivf_vitals_history->DoublewitnessName2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<th class="<?php echo $ivf_vitals_history->Chiefcomplaints->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints"><?php echo $ivf_vitals_history->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $ivf_vitals_history->MenstrualHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory"><?php echo $ivf_vitals_history->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $ivf_vitals_history->ObstetricHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory"><?php echo $ivf_vitals_history->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<th class="<?php echo $ivf_vitals_history->MedicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory"><?php echo $ivf_vitals_history->MedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<th class="<?php echo $ivf_vitals_history->SurgicalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory"><?php echo $ivf_vitals_history->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<th class="<?php echo $ivf_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor"><?php echo $ivf_vitals_history->Generalexaminationpallor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
		<th class="<?php echo $ivf_vitals_history->PR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PR" class="ivf_vitals_history_PR"><?php echo $ivf_vitals_history->PR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
		<th class="<?php echo $ivf_vitals_history->CVS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS"><?php echo $ivf_vitals_history->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
		<th class="<?php echo $ivf_vitals_history->PA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PA" class="ivf_vitals_history_PA"><?php echo $ivf_vitals_history->PA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<th class="<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS"><?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
		<th class="<?php echo $ivf_vitals_history->Investigations->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations"><?php echo $ivf_vitals_history->Investigations->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
		<th class="<?php echo $ivf_vitals_history->Fheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight"><?php echo $ivf_vitals_history->Fheight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
		<th class="<?php echo $ivf_vitals_history->Fweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight"><?php echo $ivf_vitals_history->Fweight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
		<th class="<?php echo $ivf_vitals_history->FBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI"><?php echo $ivf_vitals_history->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<th class="<?php echo $ivf_vitals_history->FBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup"><?php echo $ivf_vitals_history->FBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
		<th class="<?php echo $ivf_vitals_history->Mheight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight"><?php echo $ivf_vitals_history->Mheight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
		<th class="<?php echo $ivf_vitals_history->Mweight->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight"><?php echo $ivf_vitals_history->Mweight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
		<th class="<?php echo $ivf_vitals_history->MBMI->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI"><?php echo $ivf_vitals_history->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<th class="<?php echo $ivf_vitals_history->MBloodgroup->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup"><?php echo $ivf_vitals_history->MBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
		<th class="<?php echo $ivf_vitals_history->FBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild"><?php echo $ivf_vitals_history->FBuild->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
		<th class="<?php echo $ivf_vitals_history->MBuild->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild"><?php echo $ivf_vitals_history->MBuild->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<th class="<?php echo $ivf_vitals_history->FSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor"><?php echo $ivf_vitals_history->FSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<th class="<?php echo $ivf_vitals_history->MSkinColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor"><?php echo $ivf_vitals_history->MSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<th class="<?php echo $ivf_vitals_history->FEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor"><?php echo $ivf_vitals_history->FEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<th class="<?php echo $ivf_vitals_history->MEyesColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor"><?php echo $ivf_vitals_history->MEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<th class="<?php echo $ivf_vitals_history->FHairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor"><?php echo $ivf_vitals_history->FHairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<th class="<?php echo $ivf_vitals_history->MhairColor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor"><?php echo $ivf_vitals_history->MhairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<th class="<?php echo $ivf_vitals_history->FhairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture"><?php echo $ivf_vitals_history->FhairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<th class="<?php echo $ivf_vitals_history->MHairTexture->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture"><?php echo $ivf_vitals_history->MHairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
		<th class="<?php echo $ivf_vitals_history->Fothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers"><?php echo $ivf_vitals_history->Fothers->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
		<th class="<?php echo $ivf_vitals_history->Mothers->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers"><?php echo $ivf_vitals_history->Mothers->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
		<th class="<?php echo $ivf_vitals_history->PGE->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE"><?php echo $ivf_vitals_history->PGE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
		<th class="<?php echo $ivf_vitals_history->PPR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR"><?php echo $ivf_vitals_history->PPR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
		<th class="<?php echo $ivf_vitals_history->PBP->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP"><?php echo $ivf_vitals_history->PBP->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
		<th class="<?php echo $ivf_vitals_history->Breast->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast"><?php echo $ivf_vitals_history->Breast->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
		<th class="<?php echo $ivf_vitals_history->PPA->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA"><?php echo $ivf_vitals_history->PPA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
		<th class="<?php echo $ivf_vitals_history->PPSV->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV"><?php echo $ivf_vitals_history->PPSV->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<th class="<?php echo $ivf_vitals_history->PPAPSMEAR->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR"><?php echo $ivf_vitals_history->PPAPSMEAR->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<th class="<?php echo $ivf_vitals_history->PTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID"><?php echo $ivf_vitals_history->PTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<th class="<?php echo $ivf_vitals_history->MTHYROID->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID"><?php echo $ivf_vitals_history->MTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<th class="<?php echo $ivf_vitals_history->SecSexCharacters->headerCellClass() ?>"><span id="elh_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters"><?php echo $ivf_vitals_history->SecSexCharacters->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<th class="<?php echo $ivf_vitals_history->PenisUM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM"><?php echo $ivf_vitals_history->PenisUM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
		<th class="<?php echo $ivf_vitals_history->VAS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS"><?php echo $ivf_vitals_history->VAS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<th class="<?php echo $ivf_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS"><?php echo $ivf_vitals_history->EPIDIDYMIS->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<th class="<?php echo $ivf_vitals_history->Varicocele->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele"><?php echo $ivf_vitals_history->Varicocele->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $ivf_vitals_history->FamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory"><?php echo $ivf_vitals_history->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
		<th class="<?php echo $ivf_vitals_history->Addictions->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions"><?php echo $ivf_vitals_history->Addictions->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
		<th class="<?php echo $ivf_vitals_history->Medical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical"><?php echo $ivf_vitals_history->Medical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
		<th class="<?php echo $ivf_vitals_history->Surgical->headerCellClass() ?>"><span id="elh_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical"><?php echo $ivf_vitals_history->Surgical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<th class="<?php echo $ivf_vitals_history->CoitalHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory"><?php echo $ivf_vitals_history->CoitalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<th class="<?php echo $ivf_vitals_history->MariedFor->headerCellClass() ?>"><span id="elh_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor"><?php echo $ivf_vitals_history->MariedFor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<th class="<?php echo $ivf_vitals_history->CMNCM->headerCellClass() ?>"><span id="elh_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM"><?php echo $ivf_vitals_history->CMNCM->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_vitals_history->TidNo->headerCellClass() ?>"><span id="elh_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo"><?php echo $ivf_vitals_history->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<th class="<?php echo $ivf_vitals_history->pFamilyHistory->headerCellClass() ?>"><span id="elh_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory"><?php echo $ivf_vitals_history->pFamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTPO->Visible) { // AntiTPO ?>
		<th class="<?php echo $ivf_vitals_history->AntiTPO->headerCellClass() ?>"><span id="elh_ivf_vitals_history_AntiTPO" class="ivf_vitals_history_AntiTPO"><?php echo $ivf_vitals_history->AntiTPO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTG->Visible) { // AntiTG ?>
		<th class="<?php echo $ivf_vitals_history->AntiTG->headerCellClass() ?>"><span id="elh_ivf_vitals_history_AntiTG" class="ivf_vitals_history_AntiTG"><?php echo $ivf_vitals_history->AntiTG->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_vitals_history_delete->RecCnt = 0;
$i = 0;
while (!$ivf_vitals_history_delete->Recordset->EOF) {
	$ivf_vitals_history_delete->RecCnt++;
	$ivf_vitals_history_delete->RowCnt++;

	// Set row properties
	$ivf_vitals_history->resetAttributes();
	$ivf_vitals_history->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_vitals_history_delete->loadRowValues($ivf_vitals_history_delete->Recordset);

	// Render row
	$ivf_vitals_history_delete->renderRow();
?>
	<tr<?php echo $ivf_vitals_history->rowAttributes() ?>>
<?php if ($ivf_vitals_history->id->Visible) { // id ?>
		<td<?php echo $ivf_vitals_history->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_id" class="ivf_vitals_history_id">
<span<?php echo $ivf_vitals_history->id->viewAttributes() ?>>
<?php echo $ivf_vitals_history->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $ivf_vitals_history->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_RIDNO" class="ivf_vitals_history_RIDNO">
<span<?php echo $ivf_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Name->Visible) { // Name ?>
		<td<?php echo $ivf_vitals_history->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Name" class="ivf_vitals_history_Name">
<span<?php echo $ivf_vitals_history->Name->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Age->Visible) { // Age ?>
		<td<?php echo $ivf_vitals_history->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Age" class="ivf_vitals_history_Age">
<span<?php echo $ivf_vitals_history->Age->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SEX->Visible) { // SEX ?>
		<td<?php echo $ivf_vitals_history->SEX->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_SEX" class="ivf_vitals_history_SEX">
<span<?php echo $ivf_vitals_history->SEX->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Religion->Visible) { // Religion ?>
		<td<?php echo $ivf_vitals_history->Religion->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Religion" class="ivf_vitals_history_Religion">
<span<?php echo $ivf_vitals_history->Religion->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Address->Visible) { // Address ?>
		<td<?php echo $ivf_vitals_history->Address->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Address" class="ivf_vitals_history_Address">
<span<?php echo $ivf_vitals_history->Address->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<td<?php echo $ivf_vitals_history->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_IdentificationMark" class="ivf_vitals_history_IdentificationMark">
<span<?php echo $ivf_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td<?php echo $ivf_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_DoublewitnessName1" class="ivf_vitals_history_DoublewitnessName1">
<span<?php echo $ivf_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td<?php echo $ivf_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_DoublewitnessName2" class="ivf_vitals_history_DoublewitnessName2">
<span<?php echo $ivf_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $ivf_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td<?php echo $ivf_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Chiefcomplaints" class="ivf_vitals_history_Chiefcomplaints">
<span<?php echo $ivf_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td<?php echo $ivf_vitals_history->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MenstrualHistory" class="ivf_vitals_history_MenstrualHistory">
<span<?php echo $ivf_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td<?php echo $ivf_vitals_history->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_ObstetricHistory" class="ivf_vitals_history_ObstetricHistory">
<span<?php echo $ivf_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<td<?php echo $ivf_vitals_history->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MedicalHistory" class="ivf_vitals_history_MedicalHistory">
<span<?php echo $ivf_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td<?php echo $ivf_vitals_history->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_SurgicalHistory" class="ivf_vitals_history_SurgicalHistory">
<span<?php echo $ivf_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td<?php echo $ivf_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Generalexaminationpallor" class="ivf_vitals_history_Generalexaminationpallor">
<span<?php echo $ivf_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PR->Visible) { // PR ?>
		<td<?php echo $ivf_vitals_history->PR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PR" class="ivf_vitals_history_PR">
<span<?php echo $ivf_vitals_history->PR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CVS->Visible) { // CVS ?>
		<td<?php echo $ivf_vitals_history->CVS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_CVS" class="ivf_vitals_history_CVS">
<span<?php echo $ivf_vitals_history->CVS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PA->Visible) { // PA ?>
		<td<?php echo $ivf_vitals_history->PA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PA" class="ivf_vitals_history_PA">
<span<?php echo $ivf_vitals_history->PA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PROVISIONALDIAGNOSIS" class="ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Investigations->Visible) { // Investigations ?>
		<td<?php echo $ivf_vitals_history->Investigations->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Investigations" class="ivf_vitals_history_Investigations">
<span<?php echo $ivf_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Investigations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fheight->Visible) { // Fheight ?>
		<td<?php echo $ivf_vitals_history->Fheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Fheight" class="ivf_vitals_history_Fheight">
<span<?php echo $ivf_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fweight->Visible) { // Fweight ?>
		<td<?php echo $ivf_vitals_history->Fweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Fweight" class="ivf_vitals_history_Fweight">
<span<?php echo $ivf_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBMI->Visible) { // FBMI ?>
		<td<?php echo $ivf_vitals_history->FBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FBMI" class="ivf_vitals_history_FBMI">
<span<?php echo $ivf_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<td<?php echo $ivf_vitals_history->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FBloodgroup" class="ivf_vitals_history_FBloodgroup">
<span<?php echo $ivf_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mheight->Visible) { // Mheight ?>
		<td<?php echo $ivf_vitals_history->Mheight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Mheight" class="ivf_vitals_history_Mheight">
<span<?php echo $ivf_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mweight->Visible) { // Mweight ?>
		<td<?php echo $ivf_vitals_history->Mweight->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Mweight" class="ivf_vitals_history_Mweight">
<span<?php echo $ivf_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBMI->Visible) { // MBMI ?>
		<td<?php echo $ivf_vitals_history->MBMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MBMI" class="ivf_vitals_history_MBMI">
<span<?php echo $ivf_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<td<?php echo $ivf_vitals_history->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MBloodgroup" class="ivf_vitals_history_MBloodgroup">
<span<?php echo $ivf_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FBuild->Visible) { // FBuild ?>
		<td<?php echo $ivf_vitals_history->FBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FBuild" class="ivf_vitals_history_FBuild">
<span<?php echo $ivf_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MBuild->Visible) { // MBuild ?>
		<td<?php echo $ivf_vitals_history->MBuild->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MBuild" class="ivf_vitals_history_MBuild">
<span<?php echo $ivf_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<td<?php echo $ivf_vitals_history->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FSkinColor" class="ivf_vitals_history_FSkinColor">
<span<?php echo $ivf_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<td<?php echo $ivf_vitals_history->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MSkinColor" class="ivf_vitals_history_MSkinColor">
<span<?php echo $ivf_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<td<?php echo $ivf_vitals_history->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FEyesColor" class="ivf_vitals_history_FEyesColor">
<span<?php echo $ivf_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<td<?php echo $ivf_vitals_history->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MEyesColor" class="ivf_vitals_history_MEyesColor">
<span<?php echo $ivf_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<td<?php echo $ivf_vitals_history->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FHairColor" class="ivf_vitals_history_FHairColor">
<span<?php echo $ivf_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FHairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<td<?php echo $ivf_vitals_history->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MhairColor" class="ivf_vitals_history_MhairColor">
<span<?php echo $ivf_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MhairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<td<?php echo $ivf_vitals_history->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FhairTexture" class="ivf_vitals_history_FhairTexture">
<span<?php echo $ivf_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<td<?php echo $ivf_vitals_history->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MHairTexture" class="ivf_vitals_history_MHairTexture">
<span<?php echo $ivf_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Fothers->Visible) { // Fothers ?>
		<td<?php echo $ivf_vitals_history->Fothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Fothers" class="ivf_vitals_history_Fothers">
<span<?php echo $ivf_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Fothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Mothers->Visible) { // Mothers ?>
		<td<?php echo $ivf_vitals_history->Mothers->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Mothers" class="ivf_vitals_history_Mothers">
<span<?php echo $ivf_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Mothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PGE->Visible) { // PGE ?>
		<td<?php echo $ivf_vitals_history->PGE->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PGE" class="ivf_vitals_history_PGE">
<span<?php echo $ivf_vitals_history->PGE->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPR->Visible) { // PPR ?>
		<td<?php echo $ivf_vitals_history->PPR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PPR" class="ivf_vitals_history_PPR">
<span<?php echo $ivf_vitals_history->PPR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PBP->Visible) { // PBP ?>
		<td<?php echo $ivf_vitals_history->PBP->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PBP" class="ivf_vitals_history_PBP">
<span<?php echo $ivf_vitals_history->PBP->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PBP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Breast->Visible) { // Breast ?>
		<td<?php echo $ivf_vitals_history->Breast->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Breast" class="ivf_vitals_history_Breast">
<span<?php echo $ivf_vitals_history->Breast->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Breast->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPA->Visible) { // PPA ?>
		<td<?php echo $ivf_vitals_history->PPA->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PPA" class="ivf_vitals_history_PPA">
<span<?php echo $ivf_vitals_history->PPA->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPSV->Visible) { // PPSV ?>
		<td<?php echo $ivf_vitals_history->PPSV->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PPSV" class="ivf_vitals_history_PPSV">
<span<?php echo $ivf_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPSV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td<?php echo $ivf_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PPAPSMEAR" class="ivf_vitals_history_PPAPSMEAR">
<span<?php echo $ivf_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<td<?php echo $ivf_vitals_history->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PTHYROID" class="ivf_vitals_history_PTHYROID">
<span<?php echo $ivf_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<td<?php echo $ivf_vitals_history->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MTHYROID" class="ivf_vitals_history_MTHYROID">
<span<?php echo $ivf_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td<?php echo $ivf_vitals_history->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_SecSexCharacters" class="ivf_vitals_history_SecSexCharacters">
<span<?php echo $ivf_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $ivf_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<td<?php echo $ivf_vitals_history->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_PenisUM" class="ivf_vitals_history_PenisUM">
<span<?php echo $ivf_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->PenisUM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->VAS->Visible) { // VAS ?>
		<td<?php echo $ivf_vitals_history->VAS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_VAS" class="ivf_vitals_history_VAS">
<span<?php echo $ivf_vitals_history->VAS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->VAS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td<?php echo $ivf_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_EPIDIDYMIS" class="ivf_vitals_history_EPIDIDYMIS">
<span<?php echo $ivf_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $ivf_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<td<?php echo $ivf_vitals_history->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Varicocele" class="ivf_vitals_history_Varicocele">
<span<?php echo $ivf_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Varicocele->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<td<?php echo $ivf_vitals_history->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_FamilyHistory" class="ivf_vitals_history_FamilyHistory">
<span<?php echo $ivf_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Addictions->Visible) { // Addictions ?>
		<td<?php echo $ivf_vitals_history->Addictions->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Addictions" class="ivf_vitals_history_Addictions">
<span<?php echo $ivf_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Addictions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Medical->Visible) { // Medical ?>
		<td<?php echo $ivf_vitals_history->Medical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Medical" class="ivf_vitals_history_Medical">
<span<?php echo $ivf_vitals_history->Medical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Medical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->Surgical->Visible) { // Surgical ?>
		<td<?php echo $ivf_vitals_history->Surgical->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_Surgical" class="ivf_vitals_history_Surgical">
<span<?php echo $ivf_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $ivf_vitals_history->Surgical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<td<?php echo $ivf_vitals_history->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_CoitalHistory" class="ivf_vitals_history_CoitalHistory">
<span<?php echo $ivf_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<td<?php echo $ivf_vitals_history->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_MariedFor" class="ivf_vitals_history_MariedFor">
<span<?php echo $ivf_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $ivf_vitals_history->MariedFor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<td<?php echo $ivf_vitals_history->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_CMNCM" class="ivf_vitals_history_CMNCM">
<span<?php echo $ivf_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $ivf_vitals_history->CMNCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_vitals_history->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_TidNo" class="ivf_vitals_history_TidNo">
<span<?php echo $ivf_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $ivf_vitals_history->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td<?php echo $ivf_vitals_history->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_pFamilyHistory" class="ivf_vitals_history_pFamilyHistory">
<span<?php echo $ivf_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $ivf_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTPO->Visible) { // AntiTPO ?>
		<td<?php echo $ivf_vitals_history->AntiTPO->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_AntiTPO" class="ivf_vitals_history_AntiTPO">
<span<?php echo $ivf_vitals_history->AntiTPO->viewAttributes() ?>>
<?php echo $ivf_vitals_history->AntiTPO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitals_history->AntiTG->Visible) { // AntiTG ?>
		<td<?php echo $ivf_vitals_history->AntiTG->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitals_history_delete->RowCnt ?>_ivf_vitals_history_AntiTG" class="ivf_vitals_history_AntiTG">
<span<?php echo $ivf_vitals_history->AntiTG->viewAttributes() ?>>
<?php echo $ivf_vitals_history->AntiTG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_vitals_history_delete->Recordset->moveNext();
}
$ivf_vitals_history_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitals_history_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_vitals_history_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_vitals_history_delete->terminate();
?>