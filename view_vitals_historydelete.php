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
$view_vitals_history_delete = new view_vitals_history_delete();

// Run the page
$view_vitals_history_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_vitals_history_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_vitals_historydelete = currentForm = new ew.Form("fview_vitals_historydelete", "delete");

// Form_CustomValidate event
fview_vitals_historydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_vitals_historydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_vitals_historydelete.lists["x_MedicalHistory[]"] = <?php echo $view_vitals_history_delete->MedicalHistory->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($view_vitals_history_delete->MedicalHistory->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FBloodgroup"] = <?php echo $view_vitals_history_delete->FBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_delete->FBloodgroup->lookupOptions()) ?>;
fview_vitals_historydelete.lists["x_MBloodgroup"] = <?php echo $view_vitals_history_delete->MBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_delete->MBloodgroup->lookupOptions()) ?>;
fview_vitals_historydelete.lists["x_FBuild"] = <?php echo $view_vitals_history_delete->FBuild->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FBuild"].options = <?php echo JsonEncode($view_vitals_history_delete->FBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_MBuild"] = <?php echo $view_vitals_history_delete->MBuild->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MBuild"].options = <?php echo JsonEncode($view_vitals_history_delete->MBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FSkinColor"] = <?php echo $view_vitals_history_delete->FSkinColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FSkinColor"].options = <?php echo JsonEncode($view_vitals_history_delete->FSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_MSkinColor"] = <?php echo $view_vitals_history_delete->MSkinColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MSkinColor"].options = <?php echo JsonEncode($view_vitals_history_delete->MSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FEyesColor"] = <?php echo $view_vitals_history_delete->FEyesColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FEyesColor"].options = <?php echo JsonEncode($view_vitals_history_delete->FEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_MEyesColor"] = <?php echo $view_vitals_history_delete->MEyesColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MEyesColor"].options = <?php echo JsonEncode($view_vitals_history_delete->MEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FHairColor"] = <?php echo $view_vitals_history_delete->FHairColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FHairColor"].options = <?php echo JsonEncode($view_vitals_history_delete->FHairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_MhairColor"] = <?php echo $view_vitals_history_delete->MhairColor->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MhairColor"].options = <?php echo JsonEncode($view_vitals_history_delete->MhairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FhairTexture"] = <?php echo $view_vitals_history_delete->FhairTexture->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FhairTexture"].options = <?php echo JsonEncode($view_vitals_history_delete->FhairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_MHairTexture"] = <?php echo $view_vitals_history_delete->MHairTexture->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_MHairTexture"].options = <?php echo JsonEncode($view_vitals_history_delete->MHairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_FamilyHistory"] = <?php echo $view_vitals_history_delete->FamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_FamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_delete->FamilyHistory->lookupOptions()) ?>;
fview_vitals_historydelete.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historydelete.lists["x_Addictions[]"] = <?php echo $view_vitals_history_delete->Addictions->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_Addictions[]"].options = <?php echo JsonEncode($view_vitals_history_delete->Addictions->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_Medical"] = <?php echo $view_vitals_history_delete->Medical->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_Medical"].options = <?php echo JsonEncode($view_vitals_history_delete->Medical->options(FALSE, TRUE)) ?>;
fview_vitals_historydelete.lists["x_Surgical"] = <?php echo $view_vitals_history_delete->Surgical->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_Surgical"].options = <?php echo JsonEncode($view_vitals_history_delete->Surgical->lookupOptions()) ?>;
fview_vitals_historydelete.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historydelete.lists["x_CoitalHistory"] = <?php echo $view_vitals_history_delete->CoitalHistory->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_CoitalHistory"].options = <?php echo JsonEncode($view_vitals_history_delete->CoitalHistory->lookupOptions()) ?>;
fview_vitals_historydelete.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historydelete.lists["x_pFamilyHistory"] = <?php echo $view_vitals_history_delete->pFamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historydelete.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_delete->pFamilyHistory->lookupOptions()) ?>;
fview_vitals_historydelete.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_vitals_history_delete->showPageHeader(); ?>
<?php
$view_vitals_history_delete->showMessage();
?>
<form name="fview_vitals_historydelete" id="fview_vitals_historydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_vitals_history_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_vitals_history_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_vitals_history">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_vitals_history_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_vitals_history->id->Visible) { // id ?>
		<th class="<?php echo $view_vitals_history->id->headerCellClass() ?>"><span id="elh_view_vitals_history_id" class="view_vitals_history_id"><?php echo $view_vitals_history->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $view_vitals_history->RIDNO->headerCellClass() ?>"><span id="elh_view_vitals_history_RIDNO" class="view_vitals_history_RIDNO"><?php echo $view_vitals_history->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Name->Visible) { // Name ?>
		<th class="<?php echo $view_vitals_history->Name->headerCellClass() ?>"><span id="elh_view_vitals_history_Name" class="view_vitals_history_Name"><?php echo $view_vitals_history->Name->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Age->Visible) { // Age ?>
		<th class="<?php echo $view_vitals_history->Age->headerCellClass() ?>"><span id="elh_view_vitals_history_Age" class="view_vitals_history_Age"><?php echo $view_vitals_history->Age->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->SEX->Visible) { // SEX ?>
		<th class="<?php echo $view_vitals_history->SEX->headerCellClass() ?>"><span id="elh_view_vitals_history_SEX" class="view_vitals_history_SEX"><?php echo $view_vitals_history->SEX->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Religion->Visible) { // Religion ?>
		<th class="<?php echo $view_vitals_history->Religion->headerCellClass() ?>"><span id="elh_view_vitals_history_Religion" class="view_vitals_history_Religion"><?php echo $view_vitals_history->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Address->Visible) { // Address ?>
		<th class="<?php echo $view_vitals_history->Address->headerCellClass() ?>"><span id="elh_view_vitals_history_Address" class="view_vitals_history_Address"><?php echo $view_vitals_history->Address->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $view_vitals_history->IdentificationMark->headerCellClass() ?>"><span id="elh_view_vitals_history_IdentificationMark" class="view_vitals_history_IdentificationMark"><?php echo $view_vitals_history->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<th class="<?php echo $view_vitals_history->DoublewitnessName1->headerCellClass() ?>"><span id="elh_view_vitals_history_DoublewitnessName1" class="view_vitals_history_DoublewitnessName1"><?php echo $view_vitals_history->DoublewitnessName1->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<th class="<?php echo $view_vitals_history->DoublewitnessName2->headerCellClass() ?>"><span id="elh_view_vitals_history_DoublewitnessName2" class="view_vitals_history_DoublewitnessName2"><?php echo $view_vitals_history->DoublewitnessName2->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<th class="<?php echo $view_vitals_history->Chiefcomplaints->headerCellClass() ?>"><span id="elh_view_vitals_history_Chiefcomplaints" class="view_vitals_history_Chiefcomplaints"><?php echo $view_vitals_history->Chiefcomplaints->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $view_vitals_history->MenstrualHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_MenstrualHistory" class="view_vitals_history_MenstrualHistory"><?php echo $view_vitals_history->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $view_vitals_history->ObstetricHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_ObstetricHistory" class="view_vitals_history_ObstetricHistory"><?php echo $view_vitals_history->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<th class="<?php echo $view_vitals_history->MedicalHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_MedicalHistory" class="view_vitals_history_MedicalHistory"><?php echo $view_vitals_history->MedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<th class="<?php echo $view_vitals_history->SurgicalHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_SurgicalHistory" class="view_vitals_history_SurgicalHistory"><?php echo $view_vitals_history->SurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<th class="<?php echo $view_vitals_history->Generalexaminationpallor->headerCellClass() ?>"><span id="elh_view_vitals_history_Generalexaminationpallor" class="view_vitals_history_Generalexaminationpallor"><?php echo $view_vitals_history->Generalexaminationpallor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PR->Visible) { // PR ?>
		<th class="<?php echo $view_vitals_history->PR->headerCellClass() ?>"><span id="elh_view_vitals_history_PR" class="view_vitals_history_PR"><?php echo $view_vitals_history->PR->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->CVS->Visible) { // CVS ?>
		<th class="<?php echo $view_vitals_history->CVS->headerCellClass() ?>"><span id="elh_view_vitals_history_CVS" class="view_vitals_history_CVS"><?php echo $view_vitals_history->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PA->Visible) { // PA ?>
		<th class="<?php echo $view_vitals_history->PA->headerCellClass() ?>"><span id="elh_view_vitals_history_PA" class="view_vitals_history_PA"><?php echo $view_vitals_history->PA->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<th class="<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><span id="elh_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_history_PROVISIONALDIAGNOSIS"><?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Investigations->Visible) { // Investigations ?>
		<th class="<?php echo $view_vitals_history->Investigations->headerCellClass() ?>"><span id="elh_view_vitals_history_Investigations" class="view_vitals_history_Investigations"><?php echo $view_vitals_history->Investigations->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Fheight->Visible) { // Fheight ?>
		<th class="<?php echo $view_vitals_history->Fheight->headerCellClass() ?>"><span id="elh_view_vitals_history_Fheight" class="view_vitals_history_Fheight"><?php echo $view_vitals_history->Fheight->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Fweight->Visible) { // Fweight ?>
		<th class="<?php echo $view_vitals_history->Fweight->headerCellClass() ?>"><span id="elh_view_vitals_history_Fweight" class="view_vitals_history_Fweight"><?php echo $view_vitals_history->Fweight->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FBMI->Visible) { // FBMI ?>
		<th class="<?php echo $view_vitals_history->FBMI->headerCellClass() ?>"><span id="elh_view_vitals_history_FBMI" class="view_vitals_history_FBMI"><?php echo $view_vitals_history->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<th class="<?php echo $view_vitals_history->FBloodgroup->headerCellClass() ?>"><span id="elh_view_vitals_history_FBloodgroup" class="view_vitals_history_FBloodgroup"><?php echo $view_vitals_history->FBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Mheight->Visible) { // Mheight ?>
		<th class="<?php echo $view_vitals_history->Mheight->headerCellClass() ?>"><span id="elh_view_vitals_history_Mheight" class="view_vitals_history_Mheight"><?php echo $view_vitals_history->Mheight->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Mweight->Visible) { // Mweight ?>
		<th class="<?php echo $view_vitals_history->Mweight->headerCellClass() ?>"><span id="elh_view_vitals_history_Mweight" class="view_vitals_history_Mweight"><?php echo $view_vitals_history->Mweight->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MBMI->Visible) { // MBMI ?>
		<th class="<?php echo $view_vitals_history->MBMI->headerCellClass() ?>"><span id="elh_view_vitals_history_MBMI" class="view_vitals_history_MBMI"><?php echo $view_vitals_history->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<th class="<?php echo $view_vitals_history->MBloodgroup->headerCellClass() ?>"><span id="elh_view_vitals_history_MBloodgroup" class="view_vitals_history_MBloodgroup"><?php echo $view_vitals_history->MBloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FBuild->Visible) { // FBuild ?>
		<th class="<?php echo $view_vitals_history->FBuild->headerCellClass() ?>"><span id="elh_view_vitals_history_FBuild" class="view_vitals_history_FBuild"><?php echo $view_vitals_history->FBuild->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MBuild->Visible) { // MBuild ?>
		<th class="<?php echo $view_vitals_history->MBuild->headerCellClass() ?>"><span id="elh_view_vitals_history_MBuild" class="view_vitals_history_MBuild"><?php echo $view_vitals_history->MBuild->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<th class="<?php echo $view_vitals_history->FSkinColor->headerCellClass() ?>"><span id="elh_view_vitals_history_FSkinColor" class="view_vitals_history_FSkinColor"><?php echo $view_vitals_history->FSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<th class="<?php echo $view_vitals_history->MSkinColor->headerCellClass() ?>"><span id="elh_view_vitals_history_MSkinColor" class="view_vitals_history_MSkinColor"><?php echo $view_vitals_history->MSkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<th class="<?php echo $view_vitals_history->FEyesColor->headerCellClass() ?>"><span id="elh_view_vitals_history_FEyesColor" class="view_vitals_history_FEyesColor"><?php echo $view_vitals_history->FEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<th class="<?php echo $view_vitals_history->MEyesColor->headerCellClass() ?>"><span id="elh_view_vitals_history_MEyesColor" class="view_vitals_history_MEyesColor"><?php echo $view_vitals_history->MEyesColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<th class="<?php echo $view_vitals_history->FHairColor->headerCellClass() ?>"><span id="elh_view_vitals_history_FHairColor" class="view_vitals_history_FHairColor"><?php echo $view_vitals_history->FHairColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<th class="<?php echo $view_vitals_history->MhairColor->headerCellClass() ?>"><span id="elh_view_vitals_history_MhairColor" class="view_vitals_history_MhairColor"><?php echo $view_vitals_history->MhairColor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<th class="<?php echo $view_vitals_history->FhairTexture->headerCellClass() ?>"><span id="elh_view_vitals_history_FhairTexture" class="view_vitals_history_FhairTexture"><?php echo $view_vitals_history->FhairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<th class="<?php echo $view_vitals_history->MHairTexture->headerCellClass() ?>"><span id="elh_view_vitals_history_MHairTexture" class="view_vitals_history_MHairTexture"><?php echo $view_vitals_history->MHairTexture->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Fothers->Visible) { // Fothers ?>
		<th class="<?php echo $view_vitals_history->Fothers->headerCellClass() ?>"><span id="elh_view_vitals_history_Fothers" class="view_vitals_history_Fothers"><?php echo $view_vitals_history->Fothers->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Mothers->Visible) { // Mothers ?>
		<th class="<?php echo $view_vitals_history->Mothers->headerCellClass() ?>"><span id="elh_view_vitals_history_Mothers" class="view_vitals_history_Mothers"><?php echo $view_vitals_history->Mothers->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PGE->Visible) { // PGE ?>
		<th class="<?php echo $view_vitals_history->PGE->headerCellClass() ?>"><span id="elh_view_vitals_history_PGE" class="view_vitals_history_PGE"><?php echo $view_vitals_history->PGE->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PPR->Visible) { // PPR ?>
		<th class="<?php echo $view_vitals_history->PPR->headerCellClass() ?>"><span id="elh_view_vitals_history_PPR" class="view_vitals_history_PPR"><?php echo $view_vitals_history->PPR->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PBP->Visible) { // PBP ?>
		<th class="<?php echo $view_vitals_history->PBP->headerCellClass() ?>"><span id="elh_view_vitals_history_PBP" class="view_vitals_history_PBP"><?php echo $view_vitals_history->PBP->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Breast->Visible) { // Breast ?>
		<th class="<?php echo $view_vitals_history->Breast->headerCellClass() ?>"><span id="elh_view_vitals_history_Breast" class="view_vitals_history_Breast"><?php echo $view_vitals_history->Breast->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PPA->Visible) { // PPA ?>
		<th class="<?php echo $view_vitals_history->PPA->headerCellClass() ?>"><span id="elh_view_vitals_history_PPA" class="view_vitals_history_PPA"><?php echo $view_vitals_history->PPA->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PPSV->Visible) { // PPSV ?>
		<th class="<?php echo $view_vitals_history->PPSV->headerCellClass() ?>"><span id="elh_view_vitals_history_PPSV" class="view_vitals_history_PPSV"><?php echo $view_vitals_history->PPSV->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<th class="<?php echo $view_vitals_history->PPAPSMEAR->headerCellClass() ?>"><span id="elh_view_vitals_history_PPAPSMEAR" class="view_vitals_history_PPAPSMEAR"><?php echo $view_vitals_history->PPAPSMEAR->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<th class="<?php echo $view_vitals_history->PTHYROID->headerCellClass() ?>"><span id="elh_view_vitals_history_PTHYROID" class="view_vitals_history_PTHYROID"><?php echo $view_vitals_history->PTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<th class="<?php echo $view_vitals_history->MTHYROID->headerCellClass() ?>"><span id="elh_view_vitals_history_MTHYROID" class="view_vitals_history_MTHYROID"><?php echo $view_vitals_history->MTHYROID->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<th class="<?php echo $view_vitals_history->SecSexCharacters->headerCellClass() ?>"><span id="elh_view_vitals_history_SecSexCharacters" class="view_vitals_history_SecSexCharacters"><?php echo $view_vitals_history->SecSexCharacters->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<th class="<?php echo $view_vitals_history->PenisUM->headerCellClass() ?>"><span id="elh_view_vitals_history_PenisUM" class="view_vitals_history_PenisUM"><?php echo $view_vitals_history->PenisUM->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->VAS->Visible) { // VAS ?>
		<th class="<?php echo $view_vitals_history->VAS->headerCellClass() ?>"><span id="elh_view_vitals_history_VAS" class="view_vitals_history_VAS"><?php echo $view_vitals_history->VAS->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<th class="<?php echo $view_vitals_history->EPIDIDYMIS->headerCellClass() ?>"><span id="elh_view_vitals_history_EPIDIDYMIS" class="view_vitals_history_EPIDIDYMIS"><?php echo $view_vitals_history->EPIDIDYMIS->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<th class="<?php echo $view_vitals_history->Varicocele->headerCellClass() ?>"><span id="elh_view_vitals_history_Varicocele" class="view_vitals_history_Varicocele"><?php echo $view_vitals_history->Varicocele->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $view_vitals_history->FamilyHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_FamilyHistory" class="view_vitals_history_FamilyHistory"><?php echo $view_vitals_history->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Addictions->Visible) { // Addictions ?>
		<th class="<?php echo $view_vitals_history->Addictions->headerCellClass() ?>"><span id="elh_view_vitals_history_Addictions" class="view_vitals_history_Addictions"><?php echo $view_vitals_history->Addictions->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Medical->Visible) { // Medical ?>
		<th class="<?php echo $view_vitals_history->Medical->headerCellClass() ?>"><span id="elh_view_vitals_history_Medical" class="view_vitals_history_Medical"><?php echo $view_vitals_history->Medical->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->Surgical->Visible) { // Surgical ?>
		<th class="<?php echo $view_vitals_history->Surgical->headerCellClass() ?>"><span id="elh_view_vitals_history_Surgical" class="view_vitals_history_Surgical"><?php echo $view_vitals_history->Surgical->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<th class="<?php echo $view_vitals_history->CoitalHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_CoitalHistory" class="view_vitals_history_CoitalHistory"><?php echo $view_vitals_history->CoitalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<th class="<?php echo $view_vitals_history->MariedFor->headerCellClass() ?>"><span id="elh_view_vitals_history_MariedFor" class="view_vitals_history_MariedFor"><?php echo $view_vitals_history->MariedFor->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<th class="<?php echo $view_vitals_history->CMNCM->headerCellClass() ?>"><span id="elh_view_vitals_history_CMNCM" class="view_vitals_history_CMNCM"><?php echo $view_vitals_history->CMNCM->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $view_vitals_history->TidNo->headerCellClass() ?>"><span id="elh_view_vitals_history_TidNo" class="view_vitals_history_TidNo"><?php echo $view_vitals_history->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<th class="<?php echo $view_vitals_history->pFamilyHistory->headerCellClass() ?>"><span id="elh_view_vitals_history_pFamilyHistory" class="view_vitals_history_pFamilyHistory"><?php echo $view_vitals_history->pFamilyHistory->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_vitals_history_delete->RecCnt = 0;
$i = 0;
while (!$view_vitals_history_delete->Recordset->EOF) {
	$view_vitals_history_delete->RecCnt++;
	$view_vitals_history_delete->RowCnt++;

	// Set row properties
	$view_vitals_history->resetAttributes();
	$view_vitals_history->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_vitals_history_delete->loadRowValues($view_vitals_history_delete->Recordset);

	// Render row
	$view_vitals_history_delete->renderRow();
?>
	<tr<?php echo $view_vitals_history->rowAttributes() ?>>
<?php if ($view_vitals_history->id->Visible) { // id ?>
		<td<?php echo $view_vitals_history->id->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_id" class="view_vitals_history_id">
<span<?php echo $view_vitals_history->id->viewAttributes() ?>>
<?php echo $view_vitals_history->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $view_vitals_history->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_RIDNO" class="view_vitals_history_RIDNO">
<span<?php echo $view_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $view_vitals_history->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Name->Visible) { // Name ?>
		<td<?php echo $view_vitals_history->Name->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Name" class="view_vitals_history_Name">
<span<?php echo $view_vitals_history->Name->viewAttributes() ?>>
<?php echo $view_vitals_history->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Age->Visible) { // Age ?>
		<td<?php echo $view_vitals_history->Age->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Age" class="view_vitals_history_Age">
<span<?php echo $view_vitals_history->Age->viewAttributes() ?>>
<?php echo $view_vitals_history->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->SEX->Visible) { // SEX ?>
		<td<?php echo $view_vitals_history->SEX->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_SEX" class="view_vitals_history_SEX">
<span<?php echo $view_vitals_history->SEX->viewAttributes() ?>>
<?php echo $view_vitals_history->SEX->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Religion->Visible) { // Religion ?>
		<td<?php echo $view_vitals_history->Religion->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Religion" class="view_vitals_history_Religion">
<span<?php echo $view_vitals_history->Religion->viewAttributes() ?>>
<?php echo $view_vitals_history->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Address->Visible) { // Address ?>
		<td<?php echo $view_vitals_history->Address->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Address" class="view_vitals_history_Address">
<span<?php echo $view_vitals_history->Address->viewAttributes() ?>>
<?php echo $view_vitals_history->Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
		<td<?php echo $view_vitals_history->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_IdentificationMark" class="view_vitals_history_IdentificationMark">
<span<?php echo $view_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $view_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
		<td<?php echo $view_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_DoublewitnessName1" class="view_vitals_history_DoublewitnessName1">
<span<?php echo $view_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
		<td<?php echo $view_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_DoublewitnessName2" class="view_vitals_history_DoublewitnessName2">
<span<?php echo $view_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td<?php echo $view_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Chiefcomplaints" class="view_vitals_history_Chiefcomplaints">
<span<?php echo $view_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $view_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td<?php echo $view_vitals_history->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MenstrualHistory" class="view_vitals_history_MenstrualHistory">
<span<?php echo $view_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td<?php echo $view_vitals_history->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_ObstetricHistory" class="view_vitals_history_ObstetricHistory">
<span<?php echo $view_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
		<td<?php echo $view_vitals_history->MedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MedicalHistory" class="view_vitals_history_MedicalHistory">
<span<?php echo $view_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td<?php echo $view_vitals_history->SurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_SurgicalHistory" class="view_vitals_history_SurgicalHistory">
<span<?php echo $view_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
		<td<?php echo $view_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Generalexaminationpallor" class="view_vitals_history_Generalexaminationpallor">
<span<?php echo $view_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $view_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PR->Visible) { // PR ?>
		<td<?php echo $view_vitals_history->PR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PR" class="view_vitals_history_PR">
<span<?php echo $view_vitals_history->PR->viewAttributes() ?>>
<?php echo $view_vitals_history->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->CVS->Visible) { // CVS ?>
		<td<?php echo $view_vitals_history->CVS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_CVS" class="view_vitals_history_CVS">
<span<?php echo $view_vitals_history->CVS->viewAttributes() ?>>
<?php echo $view_vitals_history->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PA->Visible) { // PA ?>
		<td<?php echo $view_vitals_history->PA->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PA" class="view_vitals_history_PA">
<span<?php echo $view_vitals_history->PA->viewAttributes() ?>>
<?php echo $view_vitals_history->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Investigations->Visible) { // Investigations ?>
		<td<?php echo $view_vitals_history->Investigations->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Investigations" class="view_vitals_history_Investigations">
<span<?php echo $view_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $view_vitals_history->Investigations->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Fheight->Visible) { // Fheight ?>
		<td<?php echo $view_vitals_history->Fheight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Fheight" class="view_vitals_history_Fheight">
<span<?php echo $view_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Fweight->Visible) { // Fweight ?>
		<td<?php echo $view_vitals_history->Fweight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Fweight" class="view_vitals_history_Fweight">
<span<?php echo $view_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FBMI->Visible) { // FBMI ?>
		<td<?php echo $view_vitals_history->FBMI->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FBMI" class="view_vitals_history_FBMI">
<span<?php echo $view_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
		<td<?php echo $view_vitals_history->FBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FBloodgroup" class="view_vitals_history_FBloodgroup">
<span<?php echo $view_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Mheight->Visible) { // Mheight ?>
		<td<?php echo $view_vitals_history->Mheight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Mheight" class="view_vitals_history_Mheight">
<span<?php echo $view_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mheight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Mweight->Visible) { // Mweight ?>
		<td<?php echo $view_vitals_history->Mweight->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Mweight" class="view_vitals_history_Mweight">
<span<?php echo $view_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mweight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MBMI->Visible) { // MBMI ?>
		<td<?php echo $view_vitals_history->MBMI->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MBMI" class="view_vitals_history_MBMI">
<span<?php echo $view_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
		<td<?php echo $view_vitals_history->MBloodgroup->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MBloodgroup" class="view_vitals_history_MBloodgroup">
<span<?php echo $view_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FBuild->Visible) { // FBuild ?>
		<td<?php echo $view_vitals_history->FBuild->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FBuild" class="view_vitals_history_FBuild">
<span<?php echo $view_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->FBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MBuild->Visible) { // MBuild ?>
		<td<?php echo $view_vitals_history->MBuild->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MBuild" class="view_vitals_history_MBuild">
<span<?php echo $view_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->MBuild->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
		<td<?php echo $view_vitals_history->FSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FSkinColor" class="view_vitals_history_FSkinColor">
<span<?php echo $view_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
		<td<?php echo $view_vitals_history->MSkinColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MSkinColor" class="view_vitals_history_MSkinColor">
<span<?php echo $view_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
		<td<?php echo $view_vitals_history->FEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FEyesColor" class="view_vitals_history_FEyesColor">
<span<?php echo $view_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
		<td<?php echo $view_vitals_history->MEyesColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MEyesColor" class="view_vitals_history_MEyesColor">
<span<?php echo $view_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FHairColor->Visible) { // FHairColor ?>
		<td<?php echo $view_vitals_history->FHairColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FHairColor" class="view_vitals_history_FHairColor">
<span<?php echo $view_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FHairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MhairColor->Visible) { // MhairColor ?>
		<td<?php echo $view_vitals_history->MhairColor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MhairColor" class="view_vitals_history_MhairColor">
<span<?php echo $view_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MhairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
		<td<?php echo $view_vitals_history->FhairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FhairTexture" class="view_vitals_history_FhairTexture">
<span<?php echo $view_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
		<td<?php echo $view_vitals_history->MHairTexture->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MHairTexture" class="view_vitals_history_MHairTexture">
<span<?php echo $view_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Fothers->Visible) { // Fothers ?>
		<td<?php echo $view_vitals_history->Fothers->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Fothers" class="view_vitals_history_Fothers">
<span<?php echo $view_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Fothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Mothers->Visible) { // Mothers ?>
		<td<?php echo $view_vitals_history->Mothers->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Mothers" class="view_vitals_history_Mothers">
<span<?php echo $view_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Mothers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PGE->Visible) { // PGE ?>
		<td<?php echo $view_vitals_history->PGE->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PGE" class="view_vitals_history_PGE">
<span<?php echo $view_vitals_history->PGE->viewAttributes() ?>>
<?php echo $view_vitals_history->PGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PPR->Visible) { // PPR ?>
		<td<?php echo $view_vitals_history->PPR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PPR" class="view_vitals_history_PPR">
<span<?php echo $view_vitals_history->PPR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PBP->Visible) { // PBP ?>
		<td<?php echo $view_vitals_history->PBP->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PBP" class="view_vitals_history_PBP">
<span<?php echo $view_vitals_history->PBP->viewAttributes() ?>>
<?php echo $view_vitals_history->PBP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Breast->Visible) { // Breast ?>
		<td<?php echo $view_vitals_history->Breast->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Breast" class="view_vitals_history_Breast">
<span<?php echo $view_vitals_history->Breast->viewAttributes() ?>>
<?php echo $view_vitals_history->Breast->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PPA->Visible) { // PPA ?>
		<td<?php echo $view_vitals_history->PPA->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PPA" class="view_vitals_history_PPA">
<span<?php echo $view_vitals_history->PPA->viewAttributes() ?>>
<?php echo $view_vitals_history->PPA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PPSV->Visible) { // PPSV ?>
		<td<?php echo $view_vitals_history->PPSV->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PPSV" class="view_vitals_history_PPSV">
<span<?php echo $view_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $view_vitals_history->PPSV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
		<td<?php echo $view_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PPAPSMEAR" class="view_vitals_history_PPAPSMEAR">
<span<?php echo $view_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
		<td<?php echo $view_vitals_history->PTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PTHYROID" class="view_vitals_history_PTHYROID">
<span<?php echo $view_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
		<td<?php echo $view_vitals_history->MTHYROID->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MTHYROID" class="view_vitals_history_MTHYROID">
<span<?php echo $view_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
		<td<?php echo $view_vitals_history->SecSexCharacters->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_SecSexCharacters" class="view_vitals_history_SecSexCharacters">
<span<?php echo $view_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $view_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->PenisUM->Visible) { // PenisUM ?>
		<td<?php echo $view_vitals_history->PenisUM->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_PenisUM" class="view_vitals_history_PenisUM">
<span<?php echo $view_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $view_vitals_history->PenisUM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->VAS->Visible) { // VAS ?>
		<td<?php echo $view_vitals_history->VAS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_VAS" class="view_vitals_history_VAS">
<span<?php echo $view_vitals_history->VAS->viewAttributes() ?>>
<?php echo $view_vitals_history->VAS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
		<td<?php echo $view_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_EPIDIDYMIS" class="view_vitals_history_EPIDIDYMIS">
<span<?php echo $view_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $view_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Varicocele->Visible) { // Varicocele ?>
		<td<?php echo $view_vitals_history->Varicocele->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Varicocele" class="view_vitals_history_Varicocele">
<span<?php echo $view_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $view_vitals_history->Varicocele->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
		<td<?php echo $view_vitals_history->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_FamilyHistory" class="view_vitals_history_FamilyHistory">
<span<?php echo $view_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Addictions->Visible) { // Addictions ?>
		<td<?php echo $view_vitals_history->Addictions->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Addictions" class="view_vitals_history_Addictions">
<span<?php echo $view_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $view_vitals_history->Addictions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Medical->Visible) { // Medical ?>
		<td<?php echo $view_vitals_history->Medical->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Medical" class="view_vitals_history_Medical">
<span<?php echo $view_vitals_history->Medical->viewAttributes() ?>>
<?php echo $view_vitals_history->Medical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->Surgical->Visible) { // Surgical ?>
		<td<?php echo $view_vitals_history->Surgical->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_Surgical" class="view_vitals_history_Surgical">
<span<?php echo $view_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $view_vitals_history->Surgical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
		<td<?php echo $view_vitals_history->CoitalHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_CoitalHistory" class="view_vitals_history_CoitalHistory">
<span<?php echo $view_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->MariedFor->Visible) { // MariedFor ?>
		<td<?php echo $view_vitals_history->MariedFor->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_MariedFor" class="view_vitals_history_MariedFor">
<span<?php echo $view_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $view_vitals_history->MariedFor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->CMNCM->Visible) { // CMNCM ?>
		<td<?php echo $view_vitals_history->CMNCM->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_CMNCM" class="view_vitals_history_CMNCM">
<span<?php echo $view_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $view_vitals_history->CMNCM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->TidNo->Visible) { // TidNo ?>
		<td<?php echo $view_vitals_history->TidNo->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_TidNo" class="view_vitals_history_TidNo">
<span<?php echo $view_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $view_vitals_history->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
		<td<?php echo $view_vitals_history->pFamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $view_vitals_history_delete->RowCnt ?>_view_vitals_history_pFamilyHistory" class="view_vitals_history_pFamilyHistory">
<span<?php echo $view_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_vitals_history_delete->Recordset->moveNext();
}
$view_vitals_history_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_vitals_history_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_vitals_history_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_vitals_history_delete->terminate();
?>