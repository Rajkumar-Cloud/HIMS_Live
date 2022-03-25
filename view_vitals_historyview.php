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
$view_vitals_history_view = new view_vitals_history_view();

// Run the page
$view_vitals_history_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_vitals_history_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_vitals_history->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_vitals_historyview = currentForm = new ew.Form("fview_vitals_historyview", "view");

// Form_CustomValidate event
fview_vitals_historyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_vitals_historyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_vitals_historyview.lists["x_MedicalHistory[]"] = <?php echo $view_vitals_history_view->MedicalHistory->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MedicalHistory[]"].options = <?php echo JsonEncode($view_vitals_history_view->MedicalHistory->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FBloodgroup"] = <?php echo $view_vitals_history_view->FBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_view->FBloodgroup->lookupOptions()) ?>;
fview_vitals_historyview.lists["x_MBloodgroup"] = <?php echo $view_vitals_history_view->MBloodgroup->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MBloodgroup"].options = <?php echo JsonEncode($view_vitals_history_view->MBloodgroup->lookupOptions()) ?>;
fview_vitals_historyview.lists["x_FBuild"] = <?php echo $view_vitals_history_view->FBuild->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FBuild"].options = <?php echo JsonEncode($view_vitals_history_view->FBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_MBuild"] = <?php echo $view_vitals_history_view->MBuild->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MBuild"].options = <?php echo JsonEncode($view_vitals_history_view->MBuild->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FSkinColor"] = <?php echo $view_vitals_history_view->FSkinColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FSkinColor"].options = <?php echo JsonEncode($view_vitals_history_view->FSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_MSkinColor"] = <?php echo $view_vitals_history_view->MSkinColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MSkinColor"].options = <?php echo JsonEncode($view_vitals_history_view->MSkinColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FEyesColor"] = <?php echo $view_vitals_history_view->FEyesColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FEyesColor"].options = <?php echo JsonEncode($view_vitals_history_view->FEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_MEyesColor"] = <?php echo $view_vitals_history_view->MEyesColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MEyesColor"].options = <?php echo JsonEncode($view_vitals_history_view->MEyesColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FHairColor"] = <?php echo $view_vitals_history_view->FHairColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FHairColor"].options = <?php echo JsonEncode($view_vitals_history_view->FHairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_MhairColor"] = <?php echo $view_vitals_history_view->MhairColor->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MhairColor"].options = <?php echo JsonEncode($view_vitals_history_view->MhairColor->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FhairTexture"] = <?php echo $view_vitals_history_view->FhairTexture->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FhairTexture"].options = <?php echo JsonEncode($view_vitals_history_view->FhairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_MHairTexture"] = <?php echo $view_vitals_history_view->MHairTexture->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_MHairTexture"].options = <?php echo JsonEncode($view_vitals_history_view->MHairTexture->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_FamilyHistory"] = <?php echo $view_vitals_history_view->FamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_FamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_view->FamilyHistory->lookupOptions()) ?>;
fview_vitals_historyview.autoSuggests["x_FamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historyview.lists["x_Addictions[]"] = <?php echo $view_vitals_history_view->Addictions->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_Addictions[]"].options = <?php echo JsonEncode($view_vitals_history_view->Addictions->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_Medical"] = <?php echo $view_vitals_history_view->Medical->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_Medical"].options = <?php echo JsonEncode($view_vitals_history_view->Medical->options(FALSE, TRUE)) ?>;
fview_vitals_historyview.lists["x_Surgical"] = <?php echo $view_vitals_history_view->Surgical->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_Surgical"].options = <?php echo JsonEncode($view_vitals_history_view->Surgical->lookupOptions()) ?>;
fview_vitals_historyview.autoSuggests["x_Surgical"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historyview.lists["x_CoitalHistory"] = <?php echo $view_vitals_history_view->CoitalHistory->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_CoitalHistory"].options = <?php echo JsonEncode($view_vitals_history_view->CoitalHistory->lookupOptions()) ?>;
fview_vitals_historyview.autoSuggests["x_CoitalHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_vitals_historyview.lists["x_pFamilyHistory"] = <?php echo $view_vitals_history_view->pFamilyHistory->Lookup->toClientList() ?>;
fview_vitals_historyview.lists["x_pFamilyHistory"].options = <?php echo JsonEncode($view_vitals_history_view->pFamilyHistory->lookupOptions()) ?>;
fview_vitals_historyview.autoSuggests["x_pFamilyHistory"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_vitals_history->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_vitals_history_view->ExportOptions->render("body") ?>
<?php $view_vitals_history_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_vitals_history_view->showPageHeader(); ?>
<?php
$view_vitals_history_view->showMessage();
?>
<form name="fview_vitals_historyview" id="fview_vitals_historyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_vitals_history_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_vitals_history_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_vitals_history">
<input type="hidden" name="modal" value="<?php echo (int)$view_vitals_history_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_vitals_history->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_id"><script id="tpc_view_vitals_history_id" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_vitals_history->id->cellAttributes() ?>>
<script id="tpx_view_vitals_history_id" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_id">
<span<?php echo $view_vitals_history->id->viewAttributes() ?>>
<?php echo $view_vitals_history->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_RIDNO"><script id="tpc_view_vitals_history_RIDNO" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_vitals_history->RIDNO->cellAttributes() ?>>
<script id="tpx_view_vitals_history_RIDNO" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_RIDNO">
<span<?php echo $view_vitals_history->RIDNO->viewAttributes() ?>>
<?php echo $view_vitals_history->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Name"><script id="tpc_view_vitals_history_Name" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $view_vitals_history->Name->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Name" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Name">
<span<?php echo $view_vitals_history->Name->viewAttributes() ?>>
<?php echo $view_vitals_history->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Age"><script id="tpc_view_vitals_history_Age" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_vitals_history->Age->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Age" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Age">
<span<?php echo $view_vitals_history->Age->viewAttributes() ?>>
<?php echo $view_vitals_history->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->SEX->Visible) { // SEX ?>
	<tr id="r_SEX">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SEX"><script id="tpc_view_vitals_history_SEX" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->SEX->caption() ?></span></script></span></td>
		<td data-name="SEX"<?php echo $view_vitals_history->SEX->cellAttributes() ?>>
<script id="tpx_view_vitals_history_SEX" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_SEX">
<span<?php echo $view_vitals_history->SEX->viewAttributes() ?>>
<?php echo $view_vitals_history->SEX->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Religion"><script id="tpc_view_vitals_history_Religion" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Religion->caption() ?></span></script></span></td>
		<td data-name="Religion"<?php echo $view_vitals_history->Religion->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Religion" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Religion">
<span<?php echo $view_vitals_history->Religion->viewAttributes() ?>>
<?php echo $view_vitals_history->Religion->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Address->Visible) { // Address ?>
	<tr id="r_Address">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Address"><script id="tpc_view_vitals_history_Address" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Address->caption() ?></span></script></span></td>
		<td data-name="Address"<?php echo $view_vitals_history->Address->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Address" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Address">
<span<?php echo $view_vitals_history->Address->viewAttributes() ?>>
<?php echo $view_vitals_history->Address->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_IdentificationMark"><script id="tpc_view_vitals_history_IdentificationMark" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->IdentificationMark->caption() ?></span></script></span></td>
		<td data-name="IdentificationMark"<?php echo $view_vitals_history->IdentificationMark->cellAttributes() ?>>
<script id="tpx_view_vitals_history_IdentificationMark" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_IdentificationMark">
<span<?php echo $view_vitals_history->IdentificationMark->viewAttributes() ?>>
<?php echo $view_vitals_history->IdentificationMark->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
	<tr id="r_DoublewitnessName1">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_DoublewitnessName1"><script id="tpc_view_vitals_history_DoublewitnessName1" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->DoublewitnessName1->caption() ?></span></script></span></td>
		<td data-name="DoublewitnessName1"<?php echo $view_vitals_history->DoublewitnessName1->cellAttributes() ?>>
<script id="tpx_view_vitals_history_DoublewitnessName1" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_DoublewitnessName1">
<span<?php echo $view_vitals_history->DoublewitnessName1->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
	<tr id="r_DoublewitnessName2">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_DoublewitnessName2"><script id="tpc_view_vitals_history_DoublewitnessName2" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->DoublewitnessName2->caption() ?></span></script></span></td>
		<td data-name="DoublewitnessName2"<?php echo $view_vitals_history->DoublewitnessName2->cellAttributes() ?>>
<script id="tpx_view_vitals_history_DoublewitnessName2" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_DoublewitnessName2">
<span<?php echo $view_vitals_history->DoublewitnessName2->viewAttributes() ?>>
<?php echo $view_vitals_history->DoublewitnessName2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<tr id="r_Chiefcomplaints">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Chiefcomplaints"><script id="tpc_view_vitals_history_Chiefcomplaints" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Chiefcomplaints->caption() ?></span></script></span></td>
		<td data-name="Chiefcomplaints"<?php echo $view_vitals_history->Chiefcomplaints->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Chiefcomplaints" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Chiefcomplaints">
<span<?php echo $view_vitals_history->Chiefcomplaints->viewAttributes() ?>>
<?php echo $view_vitals_history->Chiefcomplaints->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MenstrualHistory"><script id="tpc_view_vitals_history_MenstrualHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="MenstrualHistory"<?php echo $view_vitals_history->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MenstrualHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MenstrualHistory">
<span<?php echo $view_vitals_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_ObstetricHistory"><script id="tpc_view_vitals_history_ObstetricHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->ObstetricHistory->caption() ?></span></script></span></td>
		<td data-name="ObstetricHistory"<?php echo $view_vitals_history->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_ObstetricHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_ObstetricHistory">
<span<?php echo $view_vitals_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->ObstetricHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<tr id="r_MedicalHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MedicalHistory"><script id="tpc_view_vitals_history_MedicalHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MedicalHistory->caption() ?></span></script></span></td>
		<td data-name="MedicalHistory"<?php echo $view_vitals_history->MedicalHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MedicalHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MedicalHistory">
<span<?php echo $view_vitals_history->MedicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->MedicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SurgicalHistory"><script id="tpc_view_vitals_history_SurgicalHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->SurgicalHistory->caption() ?></span></script></span></td>
		<td data-name="SurgicalHistory"<?php echo $view_vitals_history->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_SurgicalHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_SurgicalHistory">
<span<?php echo $view_vitals_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->SurgicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
	<tr id="r_Generalexaminationpallor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Generalexaminationpallor"><script id="tpc_view_vitals_history_Generalexaminationpallor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Generalexaminationpallor->caption() ?></span></script></span></td>
		<td data-name="Generalexaminationpallor"<?php echo $view_vitals_history->Generalexaminationpallor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Generalexaminationpallor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Generalexaminationpallor">
<span<?php echo $view_vitals_history->Generalexaminationpallor->viewAttributes() ?>>
<?php echo $view_vitals_history->Generalexaminationpallor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PR->Visible) { // PR ?>
	<tr id="r_PR">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PR"><script id="tpc_view_vitals_history_PR" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PR->caption() ?></span></script></span></td>
		<td data-name="PR"<?php echo $view_vitals_history->PR->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PR" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PR">
<span<?php echo $view_vitals_history->PR->viewAttributes() ?>>
<?php echo $view_vitals_history->PR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CVS"><script id="tpc_view_vitals_history_CVS" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->CVS->caption() ?></span></script></span></td>
		<td data-name="CVS"<?php echo $view_vitals_history->CVS->cellAttributes() ?>>
<script id="tpx_view_vitals_history_CVS" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_CVS">
<span<?php echo $view_vitals_history->CVS->viewAttributes() ?>>
<?php echo $view_vitals_history->CVS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PA"><script id="tpc_view_vitals_history_PA" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PA->caption() ?></span></script></span></td>
		<td data-name="PA"<?php echo $view_vitals_history->PA->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PA" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PA">
<span<?php echo $view_vitals_history->PA->viewAttributes() ?>>
<?php echo $view_vitals_history->PA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<tr id="r_PROVISIONALDIAGNOSIS">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PROVISIONALDIAGNOSIS"><script id="tpc_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->caption() ?></span></script></span></td>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PROVISIONALDIAGNOSIS" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PROVISIONALDIAGNOSIS">
<span<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $view_vitals_history->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Investigations->Visible) { // Investigations ?>
	<tr id="r_Investigations">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Investigations"><script id="tpc_view_vitals_history_Investigations" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Investigations->caption() ?></span></script></span></td>
		<td data-name="Investigations"<?php echo $view_vitals_history->Investigations->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Investigations" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Investigations">
<span<?php echo $view_vitals_history->Investigations->viewAttributes() ?>>
<?php echo $view_vitals_history->Investigations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Fheight->Visible) { // Fheight ?>
	<tr id="r_Fheight">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fheight"><script id="tpc_view_vitals_history_Fheight" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Fheight->caption() ?></span></script></span></td>
		<td data-name="Fheight"<?php echo $view_vitals_history->Fheight->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Fheight" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Fheight">
<span<?php echo $view_vitals_history->Fheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fheight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Fweight->Visible) { // Fweight ?>
	<tr id="r_Fweight">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fweight"><script id="tpc_view_vitals_history_Fweight" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Fweight->caption() ?></span></script></span></td>
		<td data-name="Fweight"<?php echo $view_vitals_history->Fweight->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Fweight" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Fweight">
<span<?php echo $view_vitals_history->Fweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Fweight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FBMI->Visible) { // FBMI ?>
	<tr id="r_FBMI">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBMI"><script id="tpc_view_vitals_history_FBMI" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FBMI->caption() ?></span></script></span></td>
		<td data-name="FBMI"<?php echo $view_vitals_history->FBMI->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FBMI" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FBMI">
<span<?php echo $view_vitals_history->FBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->FBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FBloodgroup->Visible) { // FBloodgroup ?>
	<tr id="r_FBloodgroup">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBloodgroup"><script id="tpc_view_vitals_history_FBloodgroup" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FBloodgroup->caption() ?></span></script></span></td>
		<td data-name="FBloodgroup"<?php echo $view_vitals_history->FBloodgroup->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FBloodgroup" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FBloodgroup">
<span<?php echo $view_vitals_history->FBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->FBloodgroup->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Mheight->Visible) { // Mheight ?>
	<tr id="r_Mheight">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mheight"><script id="tpc_view_vitals_history_Mheight" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Mheight->caption() ?></span></script></span></td>
		<td data-name="Mheight"<?php echo $view_vitals_history->Mheight->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Mheight" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Mheight">
<span<?php echo $view_vitals_history->Mheight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mheight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Mweight->Visible) { // Mweight ?>
	<tr id="r_Mweight">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mweight"><script id="tpc_view_vitals_history_Mweight" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Mweight->caption() ?></span></script></span></td>
		<td data-name="Mweight"<?php echo $view_vitals_history->Mweight->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Mweight" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Mweight">
<span<?php echo $view_vitals_history->Mweight->viewAttributes() ?>>
<?php echo $view_vitals_history->Mweight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MBMI->Visible) { // MBMI ?>
	<tr id="r_MBMI">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBMI"><script id="tpc_view_vitals_history_MBMI" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MBMI->caption() ?></span></script></span></td>
		<td data-name="MBMI"<?php echo $view_vitals_history->MBMI->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MBMI" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MBMI">
<span<?php echo $view_vitals_history->MBMI->viewAttributes() ?>>
<?php echo $view_vitals_history->MBMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MBloodgroup->Visible) { // MBloodgroup ?>
	<tr id="r_MBloodgroup">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBloodgroup"><script id="tpc_view_vitals_history_MBloodgroup" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MBloodgroup->caption() ?></span></script></span></td>
		<td data-name="MBloodgroup"<?php echo $view_vitals_history->MBloodgroup->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MBloodgroup" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MBloodgroup">
<span<?php echo $view_vitals_history->MBloodgroup->viewAttributes() ?>>
<?php echo $view_vitals_history->MBloodgroup->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FBuild->Visible) { // FBuild ?>
	<tr id="r_FBuild">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBuild"><script id="tpc_view_vitals_history_FBuild" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FBuild->caption() ?></span></script></span></td>
		<td data-name="FBuild"<?php echo $view_vitals_history->FBuild->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FBuild" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FBuild">
<span<?php echo $view_vitals_history->FBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->FBuild->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MBuild->Visible) { // MBuild ?>
	<tr id="r_MBuild">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBuild"><script id="tpc_view_vitals_history_MBuild" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MBuild->caption() ?></span></script></span></td>
		<td data-name="MBuild"<?php echo $view_vitals_history->MBuild->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MBuild" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MBuild">
<span<?php echo $view_vitals_history->MBuild->viewAttributes() ?>>
<?php echo $view_vitals_history->MBuild->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FSkinColor->Visible) { // FSkinColor ?>
	<tr id="r_FSkinColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FSkinColor"><script id="tpc_view_vitals_history_FSkinColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FSkinColor->caption() ?></span></script></span></td>
		<td data-name="FSkinColor"<?php echo $view_vitals_history->FSkinColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FSkinColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FSkinColor">
<span<?php echo $view_vitals_history->FSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FSkinColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MSkinColor->Visible) { // MSkinColor ?>
	<tr id="r_MSkinColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MSkinColor"><script id="tpc_view_vitals_history_MSkinColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MSkinColor->caption() ?></span></script></span></td>
		<td data-name="MSkinColor"<?php echo $view_vitals_history->MSkinColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MSkinColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MSkinColor">
<span<?php echo $view_vitals_history->MSkinColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MSkinColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FEyesColor->Visible) { // FEyesColor ?>
	<tr id="r_FEyesColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FEyesColor"><script id="tpc_view_vitals_history_FEyesColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FEyesColor->caption() ?></span></script></span></td>
		<td data-name="FEyesColor"<?php echo $view_vitals_history->FEyesColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FEyesColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FEyesColor">
<span<?php echo $view_vitals_history->FEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FEyesColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MEyesColor->Visible) { // MEyesColor ?>
	<tr id="r_MEyesColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MEyesColor"><script id="tpc_view_vitals_history_MEyesColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MEyesColor->caption() ?></span></script></span></td>
		<td data-name="MEyesColor"<?php echo $view_vitals_history->MEyesColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MEyesColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MEyesColor">
<span<?php echo $view_vitals_history->MEyesColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MEyesColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FHairColor->Visible) { // FHairColor ?>
	<tr id="r_FHairColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FHairColor"><script id="tpc_view_vitals_history_FHairColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FHairColor->caption() ?></span></script></span></td>
		<td data-name="FHairColor"<?php echo $view_vitals_history->FHairColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FHairColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FHairColor">
<span<?php echo $view_vitals_history->FHairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->FHairColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MhairColor->Visible) { // MhairColor ?>
	<tr id="r_MhairColor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MhairColor"><script id="tpc_view_vitals_history_MhairColor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MhairColor->caption() ?></span></script></span></td>
		<td data-name="MhairColor"<?php echo $view_vitals_history->MhairColor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MhairColor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MhairColor">
<span<?php echo $view_vitals_history->MhairColor->viewAttributes() ?>>
<?php echo $view_vitals_history->MhairColor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FhairTexture->Visible) { // FhairTexture ?>
	<tr id="r_FhairTexture">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FhairTexture"><script id="tpc_view_vitals_history_FhairTexture" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FhairTexture->caption() ?></span></script></span></td>
		<td data-name="FhairTexture"<?php echo $view_vitals_history->FhairTexture->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FhairTexture" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FhairTexture">
<span<?php echo $view_vitals_history->FhairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->FhairTexture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MHairTexture->Visible) { // MHairTexture ?>
	<tr id="r_MHairTexture">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MHairTexture"><script id="tpc_view_vitals_history_MHairTexture" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MHairTexture->caption() ?></span></script></span></td>
		<td data-name="MHairTexture"<?php echo $view_vitals_history->MHairTexture->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MHairTexture" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MHairTexture">
<span<?php echo $view_vitals_history->MHairTexture->viewAttributes() ?>>
<?php echo $view_vitals_history->MHairTexture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Fothers->Visible) { // Fothers ?>
	<tr id="r_Fothers">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fothers"><script id="tpc_view_vitals_history_Fothers" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Fothers->caption() ?></span></script></span></td>
		<td data-name="Fothers"<?php echo $view_vitals_history->Fothers->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Fothers" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Fothers">
<span<?php echo $view_vitals_history->Fothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Fothers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Mothers->Visible) { // Mothers ?>
	<tr id="r_Mothers">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mothers"><script id="tpc_view_vitals_history_Mothers" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Mothers->caption() ?></span></script></span></td>
		<td data-name="Mothers"<?php echo $view_vitals_history->Mothers->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Mothers" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Mothers">
<span<?php echo $view_vitals_history->Mothers->viewAttributes() ?>>
<?php echo $view_vitals_history->Mothers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PGE->Visible) { // PGE ?>
	<tr id="r_PGE">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PGE"><script id="tpc_view_vitals_history_PGE" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PGE->caption() ?></span></script></span></td>
		<td data-name="PGE"<?php echo $view_vitals_history->PGE->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PGE" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PGE">
<span<?php echo $view_vitals_history->PGE->viewAttributes() ?>>
<?php echo $view_vitals_history->PGE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PPR->Visible) { // PPR ?>
	<tr id="r_PPR">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPR"><script id="tpc_view_vitals_history_PPR" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PPR->caption() ?></span></script></span></td>
		<td data-name="PPR"<?php echo $view_vitals_history->PPR->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PPR" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PPR">
<span<?php echo $view_vitals_history->PPR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PBP->Visible) { // PBP ?>
	<tr id="r_PBP">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PBP"><script id="tpc_view_vitals_history_PBP" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PBP->caption() ?></span></script></span></td>
		<td data-name="PBP"<?php echo $view_vitals_history->PBP->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PBP" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PBP">
<span<?php echo $view_vitals_history->PBP->viewAttributes() ?>>
<?php echo $view_vitals_history->PBP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Breast->Visible) { // Breast ?>
	<tr id="r_Breast">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Breast"><script id="tpc_view_vitals_history_Breast" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Breast->caption() ?></span></script></span></td>
		<td data-name="Breast"<?php echo $view_vitals_history->Breast->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Breast" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Breast">
<span<?php echo $view_vitals_history->Breast->viewAttributes() ?>>
<?php echo $view_vitals_history->Breast->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PPA->Visible) { // PPA ?>
	<tr id="r_PPA">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPA"><script id="tpc_view_vitals_history_PPA" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PPA->caption() ?></span></script></span></td>
		<td data-name="PPA"<?php echo $view_vitals_history->PPA->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PPA" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PPA">
<span<?php echo $view_vitals_history->PPA->viewAttributes() ?>>
<?php echo $view_vitals_history->PPA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PPSV->Visible) { // PPSV ?>
	<tr id="r_PPSV">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPSV"><script id="tpc_view_vitals_history_PPSV" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PPSV->caption() ?></span></script></span></td>
		<td data-name="PPSV"<?php echo $view_vitals_history->PPSV->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PPSV" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PPSV">
<span<?php echo $view_vitals_history->PPSV->viewAttributes() ?>>
<?php echo $view_vitals_history->PPSV->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
	<tr id="r_PPAPSMEAR">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPAPSMEAR"><script id="tpc_view_vitals_history_PPAPSMEAR" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PPAPSMEAR->caption() ?></span></script></span></td>
		<td data-name="PPAPSMEAR"<?php echo $view_vitals_history->PPAPSMEAR->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PPAPSMEAR" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PPAPSMEAR">
<span<?php echo $view_vitals_history->PPAPSMEAR->viewAttributes() ?>>
<?php echo $view_vitals_history->PPAPSMEAR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PTHYROID->Visible) { // PTHYROID ?>
	<tr id="r_PTHYROID">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PTHYROID"><script id="tpc_view_vitals_history_PTHYROID" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PTHYROID->caption() ?></span></script></span></td>
		<td data-name="PTHYROID"<?php echo $view_vitals_history->PTHYROID->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PTHYROID" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PTHYROID">
<span<?php echo $view_vitals_history->PTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->PTHYROID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MTHYROID->Visible) { // MTHYROID ?>
	<tr id="r_MTHYROID">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MTHYROID"><script id="tpc_view_vitals_history_MTHYROID" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MTHYROID->caption() ?></span></script></span></td>
		<td data-name="MTHYROID"<?php echo $view_vitals_history->MTHYROID->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MTHYROID" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MTHYROID">
<span<?php echo $view_vitals_history->MTHYROID->viewAttributes() ?>>
<?php echo $view_vitals_history->MTHYROID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->SecSexCharacters->Visible) { // SecSexCharacters ?>
	<tr id="r_SecSexCharacters">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SecSexCharacters"><script id="tpc_view_vitals_history_SecSexCharacters" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->SecSexCharacters->caption() ?></span></script></span></td>
		<td data-name="SecSexCharacters"<?php echo $view_vitals_history->SecSexCharacters->cellAttributes() ?>>
<script id="tpx_view_vitals_history_SecSexCharacters" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_SecSexCharacters">
<span<?php echo $view_vitals_history->SecSexCharacters->viewAttributes() ?>>
<?php echo $view_vitals_history->SecSexCharacters->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PenisUM->Visible) { // PenisUM ?>
	<tr id="r_PenisUM">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PenisUM"><script id="tpc_view_vitals_history_PenisUM" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PenisUM->caption() ?></span></script></span></td>
		<td data-name="PenisUM"<?php echo $view_vitals_history->PenisUM->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PenisUM" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PenisUM">
<span<?php echo $view_vitals_history->PenisUM->viewAttributes() ?>>
<?php echo $view_vitals_history->PenisUM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->VAS->Visible) { // VAS ?>
	<tr id="r_VAS">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_VAS"><script id="tpc_view_vitals_history_VAS" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->VAS->caption() ?></span></script></span></td>
		<td data-name="VAS"<?php echo $view_vitals_history->VAS->cellAttributes() ?>>
<script id="tpx_view_vitals_history_VAS" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_VAS">
<span<?php echo $view_vitals_history->VAS->viewAttributes() ?>>
<?php echo $view_vitals_history->VAS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
	<tr id="r_EPIDIDYMIS">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_EPIDIDYMIS"><script id="tpc_view_vitals_history_EPIDIDYMIS" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->EPIDIDYMIS->caption() ?></span></script></span></td>
		<td data-name="EPIDIDYMIS"<?php echo $view_vitals_history->EPIDIDYMIS->cellAttributes() ?>>
<script id="tpx_view_vitals_history_EPIDIDYMIS" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_EPIDIDYMIS">
<span<?php echo $view_vitals_history->EPIDIDYMIS->viewAttributes() ?>>
<?php echo $view_vitals_history->EPIDIDYMIS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Varicocele->Visible) { // Varicocele ?>
	<tr id="r_Varicocele">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Varicocele"><script id="tpc_view_vitals_history_Varicocele" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Varicocele->caption() ?></span></script></span></td>
		<td data-name="Varicocele"<?php echo $view_vitals_history->Varicocele->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Varicocele" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Varicocele">
<span<?php echo $view_vitals_history->Varicocele->viewAttributes() ?>>
<?php echo $view_vitals_history->Varicocele->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
	<tr id="r_FertilityTreatmentHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FertilityTreatmentHistory"><script id="tpc_view_vitals_history_FertilityTreatmentHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FertilityTreatmentHistory->caption() ?></span></script></span></td>
		<td data-name="FertilityTreatmentHistory"<?php echo $view_vitals_history->FertilityTreatmentHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FertilityTreatmentHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FertilityTreatmentHistory">
<span<?php echo $view_vitals_history->FertilityTreatmentHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->FertilityTreatmentHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->SurgeryHistory->Visible) { // SurgeryHistory ?>
	<tr id="r_SurgeryHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SurgeryHistory"><script id="tpc_view_vitals_history_SurgeryHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->SurgeryHistory->caption() ?></span></script></span></td>
		<td data-name="SurgeryHistory"<?php echo $view_vitals_history->SurgeryHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_SurgeryHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_SurgeryHistory">
<span<?php echo $view_vitals_history->SurgeryHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->SurgeryHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FamilyHistory"><script id="tpc_view_vitals_history_FamilyHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->FamilyHistory->caption() ?></span></script></span></td>
		<td data-name="FamilyHistory"<?php echo $view_vitals_history->FamilyHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_FamilyHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_FamilyHistory">
<span<?php echo $view_vitals_history->FamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->FamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PInvestigations->Visible) { // PInvestigations ?>
	<tr id="r_PInvestigations">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PInvestigations"><script id="tpc_view_vitals_history_PInvestigations" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PInvestigations->caption() ?></span></script></span></td>
		<td data-name="PInvestigations"<?php echo $view_vitals_history->PInvestigations->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PInvestigations" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PInvestigations">
<span<?php echo $view_vitals_history->PInvestigations->viewAttributes() ?>>
<?php echo $view_vitals_history->PInvestigations->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Addictions->Visible) { // Addictions ?>
	<tr id="r_Addictions">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Addictions"><script id="tpc_view_vitals_history_Addictions" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Addictions->caption() ?></span></script></span></td>
		<td data-name="Addictions"<?php echo $view_vitals_history->Addictions->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Addictions" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Addictions">
<span<?php echo $view_vitals_history->Addictions->viewAttributes() ?>>
<?php echo $view_vitals_history->Addictions->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Medications->Visible) { // Medications ?>
	<tr id="r_Medications">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Medications"><script id="tpc_view_vitals_history_Medications" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Medications->caption() ?></span></script></span></td>
		<td data-name="Medications"<?php echo $view_vitals_history->Medications->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Medications" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Medications">
<span<?php echo $view_vitals_history->Medications->viewAttributes() ?>>
<?php echo $view_vitals_history->Medications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Medical->Visible) { // Medical ?>
	<tr id="r_Medical">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Medical"><script id="tpc_view_vitals_history_Medical" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Medical->caption() ?></span></script></span></td>
		<td data-name="Medical"<?php echo $view_vitals_history->Medical->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Medical" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Medical">
<span<?php echo $view_vitals_history->Medical->viewAttributes() ?>>
<?php echo $view_vitals_history->Medical->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->Surgical->Visible) { // Surgical ?>
	<tr id="r_Surgical">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Surgical"><script id="tpc_view_vitals_history_Surgical" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->Surgical->caption() ?></span></script></span></td>
		<td data-name="Surgical"<?php echo $view_vitals_history->Surgical->cellAttributes() ?>>
<script id="tpx_view_vitals_history_Surgical" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_Surgical">
<span<?php echo $view_vitals_history->Surgical->viewAttributes() ?>>
<?php echo $view_vitals_history->Surgical->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->CoitalHistory->Visible) { // CoitalHistory ?>
	<tr id="r_CoitalHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CoitalHistory"><script id="tpc_view_vitals_history_CoitalHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->CoitalHistory->caption() ?></span></script></span></td>
		<td data-name="CoitalHistory"<?php echo $view_vitals_history->CoitalHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_CoitalHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_CoitalHistory">
<span<?php echo $view_vitals_history->CoitalHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->CoitalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->SemenAnalysis->Visible) { // SemenAnalysis ?>
	<tr id="r_SemenAnalysis">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SemenAnalysis"><script id="tpc_view_vitals_history_SemenAnalysis" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->SemenAnalysis->caption() ?></span></script></span></td>
		<td data-name="SemenAnalysis"<?php echo $view_vitals_history->SemenAnalysis->cellAttributes() ?>>
<script id="tpx_view_vitals_history_SemenAnalysis" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_SemenAnalysis">
<span<?php echo $view_vitals_history->SemenAnalysis->viewAttributes() ?>>
<?php echo $view_vitals_history->SemenAnalysis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MInsvestications->Visible) { // MInsvestications ?>
	<tr id="r_MInsvestications">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MInsvestications"><script id="tpc_view_vitals_history_MInsvestications" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MInsvestications->caption() ?></span></script></span></td>
		<td data-name="MInsvestications"<?php echo $view_vitals_history->MInsvestications->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MInsvestications" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MInsvestications">
<span<?php echo $view_vitals_history->MInsvestications->viewAttributes() ?>>
<?php echo $view_vitals_history->MInsvestications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PImpression->Visible) { // PImpression ?>
	<tr id="r_PImpression">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PImpression"><script id="tpc_view_vitals_history_PImpression" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PImpression->caption() ?></span></script></span></td>
		<td data-name="PImpression"<?php echo $view_vitals_history->PImpression->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PImpression" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PImpression">
<span<?php echo $view_vitals_history->PImpression->viewAttributes() ?>>
<?php echo $view_vitals_history->PImpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MIMpression->Visible) { // MIMpression ?>
	<tr id="r_MIMpression">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MIMpression"><script id="tpc_view_vitals_history_MIMpression" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MIMpression->caption() ?></span></script></span></td>
		<td data-name="MIMpression"<?php echo $view_vitals_history->MIMpression->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MIMpression" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MIMpression">
<span<?php echo $view_vitals_history->MIMpression->viewAttributes() ?>>
<?php echo $view_vitals_history->MIMpression->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
	<tr id="r_PPlanOfManagement">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPlanOfManagement"><script id="tpc_view_vitals_history_PPlanOfManagement" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PPlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="PPlanOfManagement"<?php echo $view_vitals_history->PPlanOfManagement->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PPlanOfManagement" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PPlanOfManagement">
<span<?php echo $view_vitals_history->PPlanOfManagement->viewAttributes() ?>>
<?php echo $view_vitals_history->PPlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
	<tr id="r_MPlanOfManagement">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MPlanOfManagement"><script id="tpc_view_vitals_history_MPlanOfManagement" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MPlanOfManagement->caption() ?></span></script></span></td>
		<td data-name="MPlanOfManagement"<?php echo $view_vitals_history->MPlanOfManagement->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MPlanOfManagement" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MPlanOfManagement">
<span<?php echo $view_vitals_history->MPlanOfManagement->viewAttributes() ?>>
<?php echo $view_vitals_history->MPlanOfManagement->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->PReadMore->Visible) { // PReadMore ?>
	<tr id="r_PReadMore">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PReadMore"><script id="tpc_view_vitals_history_PReadMore" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->PReadMore->caption() ?></span></script></span></td>
		<td data-name="PReadMore"<?php echo $view_vitals_history->PReadMore->cellAttributes() ?>>
<script id="tpx_view_vitals_history_PReadMore" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_PReadMore">
<span<?php echo $view_vitals_history->PReadMore->viewAttributes() ?>>
<?php echo $view_vitals_history->PReadMore->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MReadMore->Visible) { // MReadMore ?>
	<tr id="r_MReadMore">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MReadMore"><script id="tpc_view_vitals_history_MReadMore" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MReadMore->caption() ?></span></script></span></td>
		<td data-name="MReadMore"<?php echo $view_vitals_history->MReadMore->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MReadMore" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MReadMore">
<span<?php echo $view_vitals_history->MReadMore->viewAttributes() ?>>
<?php echo $view_vitals_history->MReadMore->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->MariedFor->Visible) { // MariedFor ?>
	<tr id="r_MariedFor">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MariedFor"><script id="tpc_view_vitals_history_MariedFor" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->MariedFor->caption() ?></span></script></span></td>
		<td data-name="MariedFor"<?php echo $view_vitals_history->MariedFor->cellAttributes() ?>>
<script id="tpx_view_vitals_history_MariedFor" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_MariedFor">
<span<?php echo $view_vitals_history->MariedFor->viewAttributes() ?>>
<?php echo $view_vitals_history->MariedFor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->CMNCM->Visible) { // CMNCM ?>
	<tr id="r_CMNCM">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CMNCM"><script id="tpc_view_vitals_history_CMNCM" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->CMNCM->caption() ?></span></script></span></td>
		<td data-name="CMNCM"<?php echo $view_vitals_history->CMNCM->cellAttributes() ?>>
<script id="tpx_view_vitals_history_CMNCM" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_CMNCM">
<span<?php echo $view_vitals_history->CMNCM->viewAttributes() ?>>
<?php echo $view_vitals_history->CMNCM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_TidNo"><script id="tpc_view_vitals_history_TidNo" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_vitals_history->TidNo->cellAttributes() ?>>
<script id="tpx_view_vitals_history_TidNo" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_TidNo">
<span<?php echo $view_vitals_history->TidNo->viewAttributes() ?>>
<?php echo $view_vitals_history->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->pFamilyHistory->Visible) { // pFamilyHistory ?>
	<tr id="r_pFamilyHistory">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_pFamilyHistory"><script id="tpc_view_vitals_history_pFamilyHistory" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->pFamilyHistory->caption() ?></span></script></span></td>
		<td data-name="pFamilyHistory"<?php echo $view_vitals_history->pFamilyHistory->cellAttributes() ?>>
<script id="tpx_view_vitals_history_pFamilyHistory" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_pFamilyHistory">
<span<?php echo $view_vitals_history->pFamilyHistory->viewAttributes() ?>>
<?php echo $view_vitals_history->pFamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_vitals_history->pTemplateMedications->Visible) { // pTemplateMedications ?>
	<tr id="r_pTemplateMedications">
		<td class="<?php echo $view_vitals_history_view->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_pTemplateMedications"><script id="tpc_view_vitals_history_pTemplateMedications" class="view_vitals_historyview" type="text/html"><span><?php echo $view_vitals_history->pTemplateMedications->caption() ?></span></script></span></td>
		<td data-name="pTemplateMedications"<?php echo $view_vitals_history->pTemplateMedications->cellAttributes() ?>>
<script id="tpx_view_vitals_history_pTemplateMedications" class="view_vitals_historyview" type="text/html">
<span id="el_view_vitals_history_pTemplateMedications">
<span<?php echo $view_vitals_history->pTemplateMedications->viewAttributes() ?>>
<?php echo $view_vitals_history->pTemplateMedications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_vitals_historyview" class="ew-custom-template"></div>
<script id="tpm_view_vitals_historyview" type="text/html">
<div id="ct_view_vitals_history_view"><style>
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
{{include tmpl="#tpc_view_vitals_history_RIDNO"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_RIDNO"/}}
{{include tmpl="#tpc_view_vitals_history_Name"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Name"/}}
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
	$SaveUrl = "";
	$ViewUrl = "";
	$NextUrl = "";
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
			  				<tr><td>{{include tmpl="#tpc_view_vitals_history_Fheight"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Fheight"/}} Cm.</td><td>{{include tmpl="#tpc_view_vitals_history_Fweight"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Fweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_view_vitals_history_FBMI"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_IdentificationMark"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_IdentificationMark"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_FBuild"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_FSkinColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_FEyesColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_FHairColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FHairColor"/}}</span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_MHairTexture"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MHairTexture"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_Mothers"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Mothers"/}}</span>
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
			  				<tr><td>{{include tmpl="#tpc_view_vitals_history_Mheight"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Mheight"/}} Cm.</td><td>{{include tmpl="#tpc_view_vitals_history_Mweight"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Mweight"/}} Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6">{{include tmpl="#tpc_view_vitals_history_MBMI"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MBMI"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_Address"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Address"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_MBuild"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MBuild"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_MSkinColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MSkinColor"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_MEyesColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MEyesColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_MhairColor"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_MhairColor"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_FhairTexture"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_FhairTexture"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_vitals_history_Fothers"/}}&nbsp;{{include tmpl="#tpx_view_vitals_history_Fothers"/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_vitals_history->Rows) ?> };
ew.applyTemplate("tpd_view_vitals_historyview", "tpm_view_vitals_historyview", "view_vitals_historyview", "<?php echo $view_vitals_history->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_vitals_historyview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_vitals_history_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_vitals_history->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_vitals_history_view->terminate();
?>