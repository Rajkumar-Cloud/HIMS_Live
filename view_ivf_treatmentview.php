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
$view_ivf_treatment_view = new view_ivf_treatment_view();

// Run the page
$view_ivf_treatment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ivf_treatmentview = currentForm = new ew.Form("fview_ivf_treatmentview", "view");

// Form_CustomValidate event
fview_ivf_treatmentview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatmentview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatmentview.lists["x_status1"] = <?php echo $view_ivf_treatment_view->status1->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_status1"].options = <?php echo JsonEncode($view_ivf_treatment_view->status1->lookupOptions()) ?>;
fview_ivf_treatmentview.lists["x_Male"] = <?php echo $view_ivf_treatment_view->Male->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_Male"].options = <?php echo JsonEncode($view_ivf_treatment_view->Male->lookupOptions()) ?>;
fview_ivf_treatmentview.lists["x_Female"] = <?php echo $view_ivf_treatment_view->Female->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_Female"].options = <?php echo JsonEncode($view_ivf_treatment_view->Female->lookupOptions()) ?>;
fview_ivf_treatmentview.lists["x_ReferedBy"] = <?php echo $view_ivf_treatment_view->ReferedBy->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_ReferedBy"].options = <?php echo JsonEncode($view_ivf_treatment_view->ReferedBy->lookupOptions()) ?>;
fview_ivf_treatmentview.lists["x_ARTCYCLE1"] = <?php echo $view_ivf_treatment_view->ARTCYCLE1->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_ARTCYCLE1"].options = <?php echo JsonEncode($view_ivf_treatment_view->ARTCYCLE1->options(FALSE, TRUE)) ?>;
fview_ivf_treatmentview.lists["x_RESULT1"] = <?php echo $view_ivf_treatment_view->RESULT1->Lookup->toClientList() ?>;
fview_ivf_treatmentview.lists["x_RESULT1"].options = <?php echo JsonEncode($view_ivf_treatment_view->RESULT1->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ivf_treatment_view->ExportOptions->render("body") ?>
<?php $view_ivf_treatment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ivf_treatment_view->showPageHeader(); ?>
<?php
$view_ivf_treatment_view->showMessage();
?>
<form name="fview_ivf_treatmentview" id="fview_ivf_treatmentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_treatment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ivf_treatment->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_id"><script id="tpc_view_ivf_treatment_id" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ivf_treatment->id->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_id" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_id">
<span<?php echo $view_ivf_treatment->id->viewAttributes() ?>>
<?php echo $view_ivf_treatment->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RIDNO"><script id="tpc_view_ivf_treatment_RIDNO" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_ivf_treatment->RIDNO->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_RIDNO" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_RIDNO">
<span<?php echo $view_ivf_treatment->RIDNO->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Name"><script id="tpc_view_ivf_treatment_Name" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $view_ivf_treatment->Name->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Name" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Name">
<span<?php echo $view_ivf_treatment->Name->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Age"><script id="tpc_view_ivf_treatment_Age" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_ivf_treatment->Age->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Age" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Age">
<span<?php echo $view_ivf_treatment->Age->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->treatment_status->Visible) { // treatment_status ?>
	<tr id="r_treatment_status">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_treatment_status"><script id="tpc_view_ivf_treatment_treatment_status" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->treatment_status->caption() ?></span></script></span></td>
		<td data-name="treatment_status"<?php echo $view_ivf_treatment->treatment_status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_treatment_status" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_treatment_status">
<span<?php echo $view_ivf_treatment->treatment_status->viewAttributes() ?>>
<?php echo $view_ivf_treatment->treatment_status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ARTCYCLE"><script id="tpc_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $view_ivf_treatment->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_ARTCYCLE" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_ARTCYCLE">
<span<?php echo $view_ivf_treatment->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RESULT"><script id="tpc_view_ivf_treatment_RESULT" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $view_ivf_treatment->RESULT->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_RESULT" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_RESULT">
<span<?php echo $view_ivf_treatment->RESULT->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_status"><script id="tpc_view_ivf_treatment_status" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_ivf_treatment->status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_status" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_status">
<span<?php echo $view_ivf_treatment->status->viewAttributes() ?>>
<?php echo $view_ivf_treatment->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_createdby"><script id="tpc_view_ivf_treatment_createdby" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ivf_treatment->createdby->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_createdby" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_createdby">
<span<?php echo $view_ivf_treatment->createdby->viewAttributes() ?>>
<?php echo $view_ivf_treatment->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_createddatetime"><script id="tpc_view_ivf_treatment_createddatetime" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ivf_treatment->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_createddatetime" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_createddatetime">
<span<?php echo $view_ivf_treatment->createddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_modifiedby"><script id="tpc_view_ivf_treatment_modifiedby" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ivf_treatment->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_modifiedby" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_modifiedby">
<span<?php echo $view_ivf_treatment->modifiedby->viewAttributes() ?>>
<?php echo $view_ivf_treatment->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_modifieddatetime"><script id="tpc_view_ivf_treatment_modifieddatetime" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ivf_treatment->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_modifieddatetime" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_modifieddatetime">
<span<?php echo $view_ivf_treatment->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<tr id="r_TreatmentStartDate">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatmentStartDate"><script id="tpc_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TreatmentStartDate->caption() ?></span></script></span></td>
		<td data-name="TreatmentStartDate"<?php echo $view_ivf_treatment->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TreatmentStartDate" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TreatmentStartDate">
<span<?php echo $view_ivf_treatment->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatmentStartDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<tr id="r_TreatementStopDate">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatementStopDate"><script id="tpc_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TreatementStopDate->caption() ?></span></script></span></td>
		<td data-name="TreatementStopDate"<?php echo $view_ivf_treatment->TreatementStopDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TreatementStopDate" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TreatementStopDate">
<span<?php echo $view_ivf_treatment->TreatementStopDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatementStopDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypePatient->Visible) { // TypePatient ?>
	<tr id="r_TypePatient">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TypePatient"><script id="tpc_view_ivf_treatment_TypePatient" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TypePatient->caption() ?></span></script></span></td>
		<td data-name="TypePatient"<?php echo $view_ivf_treatment->TypePatient->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TypePatient" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TypePatient">
<span<?php echo $view_ivf_treatment->TypePatient->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TypePatient->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Treatment"><script id="tpc_view_ivf_treatment_Treatment" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Treatment->caption() ?></span></script></span></td>
		<td data-name="Treatment"<?php echo $view_ivf_treatment->Treatment->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Treatment" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Treatment">
<span<?php echo $view_ivf_treatment->Treatment->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Treatment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
	<tr id="r_TreatmentTec">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatmentTec"><script id="tpc_view_ivf_treatment_TreatmentTec" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TreatmentTec->caption() ?></span></script></span></td>
		<td data-name="TreatmentTec"<?php echo $view_ivf_treatment->TreatmentTec->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TreatmentTec" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TreatmentTec">
<span<?php echo $view_ivf_treatment->TreatmentTec->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TreatmentTec->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<tr id="r_TypeOfCycle">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TypeOfCycle"><script id="tpc_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TypeOfCycle->caption() ?></span></script></span></td>
		<td data-name="TypeOfCycle"<?php echo $view_ivf_treatment->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TypeOfCycle" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TypeOfCycle">
<span<?php echo $view_ivf_treatment->TypeOfCycle->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TypeOfCycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
	<tr id="r_SpermOrgin">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_SpermOrgin"><script id="tpc_view_ivf_treatment_SpermOrgin" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->SpermOrgin->caption() ?></span></script></span></td>
		<td data-name="SpermOrgin"<?php echo $view_ivf_treatment->SpermOrgin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_SpermOrgin" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_SpermOrgin">
<span<?php echo $view_ivf_treatment->SpermOrgin->viewAttributes() ?>>
<?php echo $view_ivf_treatment->SpermOrgin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_State"><script id="tpc_view_ivf_treatment_State" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->State->caption() ?></span></script></span></td>
		<td data-name="State"<?php echo $view_ivf_treatment->State->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_State" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_State">
<span<?php echo $view_ivf_treatment->State->viewAttributes() ?>>
<?php echo $view_ivf_treatment->State->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Origin->Visible) { // Origin ?>
	<tr id="r_Origin">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Origin"><script id="tpc_view_ivf_treatment_Origin" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Origin->caption() ?></span></script></span></td>
		<td data-name="Origin"<?php echo $view_ivf_treatment->Origin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Origin" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Origin">
<span<?php echo $view_ivf_treatment->Origin->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Origin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->MACS->Visible) { // MACS ?>
	<tr id="r_MACS">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_MACS"><script id="tpc_view_ivf_treatment_MACS" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->MACS->caption() ?></span></script></span></td>
		<td data-name="MACS"<?php echo $view_ivf_treatment->MACS->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_MACS" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_MACS">
<span<?php echo $view_ivf_treatment->MACS->viewAttributes() ?>>
<?php echo $view_ivf_treatment->MACS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Technique->Visible) { // Technique ?>
	<tr id="r_Technique">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Technique"><script id="tpc_view_ivf_treatment_Technique" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Technique->caption() ?></span></script></span></td>
		<td data-name="Technique"<?php echo $view_ivf_treatment->Technique->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Technique" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Technique">
<span<?php echo $view_ivf_treatment->Technique->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Technique->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
	<tr id="r_PgdPlanning">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_PgdPlanning"><script id="tpc_view_ivf_treatment_PgdPlanning" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->PgdPlanning->caption() ?></span></script></span></td>
		<td data-name="PgdPlanning"<?php echo $view_ivf_treatment->PgdPlanning->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_PgdPlanning" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_PgdPlanning">
<span<?php echo $view_ivf_treatment->PgdPlanning->viewAttributes() ?>>
<?php echo $view_ivf_treatment->PgdPlanning->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->IMSI->Visible) { // IMSI ?>
	<tr id="r_IMSI">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_IMSI"><script id="tpc_view_ivf_treatment_IMSI" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->IMSI->caption() ?></span></script></span></td>
		<td data-name="IMSI"<?php echo $view_ivf_treatment->IMSI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_IMSI" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_IMSI">
<span<?php echo $view_ivf_treatment->IMSI->viewAttributes() ?>>
<?php echo $view_ivf_treatment->IMSI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
	<tr id="r_SequentialCulture">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_SequentialCulture"><script id="tpc_view_ivf_treatment_SequentialCulture" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->SequentialCulture->caption() ?></span></script></span></td>
		<td data-name="SequentialCulture"<?php echo $view_ivf_treatment->SequentialCulture->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_SequentialCulture" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_SequentialCulture">
<span<?php echo $view_ivf_treatment->SequentialCulture->viewAttributes() ?>>
<?php echo $view_ivf_treatment->SequentialCulture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TimeLapse->Visible) { // TimeLapse ?>
	<tr id="r_TimeLapse">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TimeLapse"><script id="tpc_view_ivf_treatment_TimeLapse" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->TimeLapse->caption() ?></span></script></span></td>
		<td data-name="TimeLapse"<?php echo $view_ivf_treatment->TimeLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_TimeLapse" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_TimeLapse">
<span<?php echo $view_ivf_treatment->TimeLapse->viewAttributes() ?>>
<?php echo $view_ivf_treatment->TimeLapse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->AH->Visible) { // AH ?>
	<tr id="r_AH">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_AH"><script id="tpc_view_ivf_treatment_AH" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->AH->caption() ?></span></script></span></td>
		<td data-name="AH"<?php echo $view_ivf_treatment->AH->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_AH" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_AH">
<span<?php echo $view_ivf_treatment->AH->viewAttributes() ?>>
<?php echo $view_ivf_treatment->AH->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Weight->Visible) { // Weight ?>
	<tr id="r_Weight">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Weight"><script id="tpc_view_ivf_treatment_Weight" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Weight->caption() ?></span></script></span></td>
		<td data-name="Weight"<?php echo $view_ivf_treatment->Weight->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Weight" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Weight">
<span<?php echo $view_ivf_treatment->Weight->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Weight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->BMI->Visible) { // BMI ?>
	<tr id="r_BMI">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_BMI"><script id="tpc_view_ivf_treatment_BMI" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->BMI->caption() ?></span></script></span></td>
		<td data-name="BMI"<?php echo $view_ivf_treatment->BMI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_BMI" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_BMI">
<span<?php echo $view_ivf_treatment->BMI->viewAttributes() ?>>
<?php echo $view_ivf_treatment->BMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->status1->Visible) { // status1 ?>
	<tr id="r_status1">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_status1"><script id="tpc_view_ivf_treatment_status1" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->status1->caption() ?></span></script></span></td>
		<td data-name="status1"<?php echo $view_ivf_treatment->status1->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_status1" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_status1">
<span<?php echo $view_ivf_treatment->status1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->status1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->id1->Visible) { // id1 ?>
	<tr id="r_id1">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_id1"><script id="tpc_view_ivf_treatment_id1" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->id1->caption() ?></span></script></span></td>
		<td data-name="id1"<?php echo $view_ivf_treatment->id1->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_id1" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_id1">
<span<?php echo $view_ivf_treatment->id1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->id1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
	<tr id="r_Male">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Male"><script id="tpc_view_ivf_treatment_Male" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Male->caption() ?></span></script></span></td>
		<td data-name="Male"<?php echo $view_ivf_treatment->Male->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Male" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Male">
<span<?php echo $view_ivf_treatment->Male->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Male->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
	<tr id="r_Female">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Female"><script id="tpc_view_ivf_treatment_Female" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->Female->caption() ?></span></script></span></td>
		<td data-name="Female"<?php echo $view_ivf_treatment->Female->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_Female" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_Female">
<span<?php echo $view_ivf_treatment->Female->viewAttributes() ?>>
<?php echo $view_ivf_treatment->Female->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->malepropic->Visible) { // malepropic ?>
	<tr id="r_malepropic">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_malepropic"><script id="tpc_view_ivf_treatment_malepropic" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->malepropic->caption() ?></span></script></span></td>
		<td data-name="malepropic"<?php echo $view_ivf_treatment->malepropic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_malepropic" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_malepropic">
<span>
<?php echo GetFileViewTag($view_ivf_treatment->malepropic, $view_ivf_treatment->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->femalepropic->Visible) { // femalepropic ?>
	<tr id="r_femalepropic">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_femalepropic"><script id="tpc_view_ivf_treatment_femalepropic" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->femalepropic->caption() ?></span></script></span></td>
		<td data-name="femalepropic"<?php echo $view_ivf_treatment->femalepropic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_femalepropic" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_femalepropic">
<span>
<?php echo GetFileViewTag($view_ivf_treatment->femalepropic, $view_ivf_treatment->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandEducation->Visible) { // HusbandEducation ?>
	<tr id="r_HusbandEducation">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HusbandEducation"><script id="tpc_view_ivf_treatment_HusbandEducation" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->HusbandEducation->caption() ?></span></script></span></td>
		<td data-name="HusbandEducation"<?php echo $view_ivf_treatment->HusbandEducation->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_HusbandEducation" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_HusbandEducation">
<span<?php echo $view_ivf_treatment->HusbandEducation->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeEducation->Visible) { // WifeEducation ?>
	<tr id="r_WifeEducation">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_WifeEducation"><script id="tpc_view_ivf_treatment_WifeEducation" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->WifeEducation->caption() ?></span></script></span></td>
		<td data-name="WifeEducation"<?php echo $view_ivf_treatment->WifeEducation->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_WifeEducation" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_WifeEducation">
<span<?php echo $view_ivf_treatment->WifeEducation->viewAttributes() ?>>
<?php echo $view_ivf_treatment->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<tr id="r_HusbandWorkHours">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HusbandWorkHours"><script id="tpc_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->HusbandWorkHours->caption() ?></span></script></span></td>
		<td data-name="HusbandWorkHours"<?php echo $view_ivf_treatment->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_HusbandWorkHours" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_HusbandWorkHours">
<span<?php echo $view_ivf_treatment->HusbandWorkHours->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<tr id="r_WifeWorkHours">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_WifeWorkHours"><script id="tpc_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->WifeWorkHours->caption() ?></span></script></span></td>
		<td data-name="WifeWorkHours"<?php echo $view_ivf_treatment->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_WifeWorkHours" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_WifeWorkHours">
<span<?php echo $view_ivf_treatment->WifeWorkHours->viewAttributes() ?>>
<?php echo $view_ivf_treatment->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->PatientLanguage->Visible) { // PatientLanguage ?>
	<tr id="r_PatientLanguage">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_PatientLanguage"><script id="tpc_view_ivf_treatment_PatientLanguage" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->PatientLanguage->caption() ?></span></script></span></td>
		<td data-name="PatientLanguage"<?php echo $view_ivf_treatment->PatientLanguage->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_PatientLanguage" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_PatientLanguage">
<span<?php echo $view_ivf_treatment->PatientLanguage->viewAttributes() ?>>
<?php echo $view_ivf_treatment->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferedBy->Visible) { // ReferedBy ?>
	<tr id="r_ReferedBy">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ReferedBy"><script id="tpc_view_ivf_treatment_ReferedBy" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->ReferedBy->caption() ?></span></script></span></td>
		<td data-name="ReferedBy"<?php echo $view_ivf_treatment->ReferedBy->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_ReferedBy" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_ReferedBy">
<span<?php echo $view_ivf_treatment->ReferedBy->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferPhNo->Visible) { // ReferPhNo ?>
	<tr id="r_ReferPhNo">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ReferPhNo"><script id="tpc_view_ivf_treatment_ReferPhNo" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->ReferPhNo->caption() ?></span></script></span></td>
		<td data-name="ReferPhNo"<?php echo $view_ivf_treatment->ReferPhNo->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_ReferPhNo" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_ReferPhNo">
<span<?php echo $view_ivf_treatment->ReferPhNo->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
	<tr id="r_ARTCYCLE1">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ARTCYCLE1"><script id="tpc_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->ARTCYCLE1->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE1"<?php echo $view_ivf_treatment->ARTCYCLE1->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_ARTCYCLE1" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_ARTCYCLE1">
<span<?php echo $view_ivf_treatment->ARTCYCLE1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->ARTCYCLE1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
	<tr id="r_RESULT1">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RESULT1"><script id="tpc_view_ivf_treatment_RESULT1" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->RESULT1->caption() ?></span></script></span></td>
		<td data-name="RESULT1"<?php echo $view_ivf_treatment->RESULT1->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_RESULT1" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_RESULT1">
<span<?php echo $view_ivf_treatment->RESULT1->viewAttributes() ?>>
<?php echo $view_ivf_treatment->RESULT1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_CoupleID"><script id="tpc_view_ivf_treatment_CoupleID" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->CoupleID->caption() ?></span></script></span></td>
		<td data-name="CoupleID"<?php echo $view_ivf_treatment->CoupleID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_CoupleID" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_CoupleID">
<span<?php echo $view_ivf_treatment->CoupleID->viewAttributes() ?>>
<?php echo $view_ivf_treatment->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ivf_treatment_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HospID"><script id="tpc_view_ivf_treatment_HospID" class="view_ivf_treatmentview" type="text/html"><span><?php echo $view_ivf_treatment->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ivf_treatment->HospID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_HospID" class="view_ivf_treatmentview" type="text/html">
<span id="el_view_ivf_treatment_HospID">
<span<?php echo $view_ivf_treatment->HospID->viewAttributes() ?>>
<?php echo $view_ivf_treatment->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ivf_treatmentview" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatmentview" type="text/html">
<div id="ct_view_ivf_treatment_view"><style>
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
$cid = $_GET["id"] ;
$IVFid = $_GET["id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$IVFid = $results[0]["RIDNO"];
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNO"]."'; ";
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
 $aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
?>	
<div style="width:100%">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		<td style="width:50%;">
			Couple ID : <?php echo $results[0]["CoupleID"]; ?>
			</td>
			<td  style="float:right;">
			<img src='<?php echo $aa; ?>' alt style="border: 0;">
			</td>
		 </tr>		 
	</tbody>
</table>
<div class="row">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		<td style="width:50%;">
<div class="col-md-12">
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
</td>
<td>
<div class="col-md-12">
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
</td>
		 </tr>		 
	</tbody>
</table>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
			<td style="width:50%;">
<?php
$ConsDoctor = $results[0]["Doctor"];
if($ConsDoctor != '')
{
	echo 'Consultant Name : ' . $ConsDoctor .'';
}
?>
</td>
		<td style="width:50%;">
<?php
$Refferrr = $results2[0]["ReferedByDr"];
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr .'';
}
?>
</td>
		 </tr>		 
	</tbody>
</table>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$embryosql = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."';";
$embryoRst = $dbhelper->ExecuteRows($embryosql);
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$oocytesql = "select * FROM ganeshkumar_bjhims.ivf_oocytedenudation where  TidNo ='".$cid."';";
$oocyteRst = $dbhelper->ExecuteRows($oocytesql);
$ETDatesqlICSiIVFDateTime = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."'  and ICSiIVFDateTime is not null;";
$ETDateRstICSiIVFDateTime = $dbhelper->ExecuteRows($ETDatesqlICSiIVFDateTime);
$ETDateEEICSiIVFDateTime  = $ETDateRstICSiIVFDateTime[0]["ICSiIVFDateTime"];
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">CHARACTERSTICS OF CYCLE</h3>
			</div>
			<div class="card-body">
<div class="row">
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:30%">ART Cycle</td>
				<td>:</td>
				<td>{{:ARTCYCLE}}</td>
		 </tr>
		 <tr>
		 		<td>Insemination Technique </td>
				<td>:</td>
				<td>{{:TreatmentTec}}</td>
		 </tr>
		 <tr>
		 	<td>Oocyte Origin</td>
			<td>:</td>
			<td><?php if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor"){ echo 'Donor' ; }else { echo $oocyteRst[0]["OocyteOrgin"];} ?></td>
		</tr>
<?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$oocyteRst[0]["donor"]."'; ";
$donors2 = $dbhelper->ExecuteRows($sql);
echo '<tr><td>Donor Age </td><td>:</td><td>'.$donors2[0]["Age"].'</td></tr>';
}
?>
	</tbody>
</table>
<table class="ew-table" style="width:50%;">
	 <tbody>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo 		'<tr>
				<td  style="width:30%">Sperm Origin </td>
				<td>:</td>
				 <td>'.$Page->SpermOrgin->CurrentValue.'</td>
		 </tr>';
}
?>		 
		 <tr>
		 <?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
 echo '<td>Date of Oocyte Pick Up</td>';
}else{
 echo '<td>Date of Insemination</td>';
}
		 ?>
				<td>:</td>
				<td><?php  if($ETDateEEICSiIVFDateTime != null){ echo date("d-m-Y", strtotime($ETDateEEICSiIVFDateTime)); }; ?></td>
		 </tr>
<?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$oocyteRst[0]["donor"]."'; ";
$donors2 = $dbhelper->ExecuteRows($sql);
echo '<tr><td>Donor Blood Group </td><td>:</td><td>'.$donors2[0]["blood_group"].'</td></tr>';
}
?>
	</tbody>
</table>
</div>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$oocytesql = "select * FROM ganeshkumar_bjhims.ivf_oocytedenudation where  TidNo ='".$cid."';";
$oocyteRst = $dbhelper->ExecuteRows($oocytesql);
$curl = $_GET['curl'];
$ocyteStagesql = "SELECT Day0OocyteStage, count(Day0OocyteStage) as CountMIIStage FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and DidNO='".$curl."' group by Day0OocyteStage;";
$ocyteStageRst = $dbhelper->ExecuteRows($ocyteStagesql);
$NoOfMI = 0;
$NoOfMII = 0;
$NoOfGV = 0;
$NoOfOthers = 0;
$length = count($ocyteStageRst);
for ($i = 0; $i < $length; $i++) {
  if( $ocyteStageRst[$i]["Day0OocyteStage"] == "MI")
  {
  		$NoOfMI = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "MII")
  {
  		$NoOfMII = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "GV")
  {
  		$NoOfGV = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "Others")
  {
  		$NoOfOthers = $ocyteStageRst[$i]["CountMIIStage"];
  }
}
$ocyteDay1PNsql = "SELECT  count(Day1PN) as Day1PN  FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and Day1PN = '2' ;";
$ocyteDay1PNt = $dbhelper->ExecuteRows($ocyteDay1PNsql);
$oDay1PNPNt = $ocyteDay1PNt[0]["Day1PN"];
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo '
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">FOLLICULAR RETRIEVAL</h3>
			</div>
			<div class="card-body">
<div class="row">
<table   class="" style="width:50%;">
	<tbody>
		<tr>'; 
	if(($oocyteRst[0]["OocyteOrgin"] == "Self+Donor") || ($oocyteRst[0]["OocyteOrgin"] == "Donor"))
			{
			echo 	'<td style="width:40%">Oocyte Received </td><td>:</td><td>'. $oocyteRst[0]["ExpFollicles"].'</td>';
			} else
			{
 echo 	'<td style="width:40%">Exp Follicles</td><td>:</td><td>'. $oocyteRst[0]["ExpFollicles"].'</td>';
			}
	echo	'</tr>
		<tr>
			<td style="width:40%">No. Of Oocytes Retrived</td>
			<td>:</td>
			<td>'. $oocyteRst[0]["NoOfOocytes"].'</td>
		</tr>
		 <tr>
			<td style="width:40%">No. Of MIIs</td>
			<td>:</td>
			<td>'. $NoOfMII.'</td>
		</tr>
		<tr>
			<td style="width:40%">No. of Fertilized</td>
			<td>:</td>
			<td>'. $oDay1PNPNt.'</td>
		</tr>
	</tbody>
</table>
<table   class="" style="width:50%;">
	<tbody>
		<tr>
			<td style="width:40%">No Of MIs</td>
			<td>:</td>
			<td>'. $NoOfMI.'</td>
		</tr>
		<tr>
			<td style="width:40%">No Of GV</td>
			<td>:</td>
			<td>'. $NoOfGV.'</td>
		</tr>
		 <tr>
			<td style="width:40%">Others</td>
			<td>:</td>
			<td>'. $NoOfOthers.'</td>
		</tr>
	</tbody>
</table>
	</div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>';
}
?>
<?php
 $rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$semenanasql = "select * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where  TidNo ='".$cid."';";
$semRst = $dbhelper->ExecuteRows($semenanasql);
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo '
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Sperm</h3>
			</div>
	<div class="card-body">
			<table  class="table table-striped ew-table ew-export-table"  align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Origin</td>
			<td>:</td>
			<td>'. $semRst[0]["SemenOrgin"].'</td>
		</tr>
		<tr>
			<td style="width:40%">Status</td>
			<td>:</td>
				<td>'. $semRst[0]["RequestSample"].'</td>
		</tr>
		<tr>
			<td style="width:40%">Sperm Date</td>
			<td>:</td>
				<td>'. date("d-m-Y", strtotime($semRst[0]["CollectionDate"])).'</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>';
}
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
$Errty = '
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spermiogram</h3>
			</div>
			<div class="card-body">
<table id="capacitationTable"   class="table table-striped ew-table ew-export-table"  align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
<thead id="capacitationTableHead">
		<tr style="background-color:#707B7C;color:white;">
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>';
				if($semRst[0]["Volume1"] != '')
				{
					$Errty .=  '<td id="PostCapacitation">Post Capacitation</td>';
				}
				if($semRst[0]["Volume2"] != '')
				{
					$Errty .=  '<td id="MaxCapacitation">MACS Capacitation</td>';
				}
		$Errty .= 	'<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Volume"].'</td>';
				if($semRst[0]["Volume1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Volume1"].'</td>';
				}
				if($semRst[0]["Volume2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Volume2"].'</td>';
				}
		$Errty .= 	'<td>&gt;=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Concentration"].'</td>';
				if($semRst[0]["Concentration1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Concentration1"].'</td>';
				}
				if($semRst[0]["Concentration2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Concentration2"].'</td>';
				}
		$Errty .= 	'<td>&gt;= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
			<td>:</td>';
				$Errty .=  '<td>'.number_format($semRst[0]["Total"],2).'</td>';
				if($semRst[0]["Total1"] != '')
				{
					$Errty .=  '<td>'. number_format($semRst[0]["Total1"],2).'</td>';
				}
				if($semRst[0]["Total2"] != '')
				{
					$Errty .=  '<td>'.number_format($semRst[0]["Total2"],2).'</td>';
				}
		$Errty .= 	'<td>&gt;=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility"].'</td>';
				if($semRst[0]["ProgressiveMotility1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility1"].'</td>';
				}
				if($semRst[0]["ProgressiveMotility2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility2"].'</td>';
				}
		$Errty .= 	'<td>&gt;=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile"].'</td>';
				if($semRst[0]["NonProgrssiveMotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile1"].'</td>';
				}
				if($semRst[0]["NonProgrssiveMotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile2"].'</td>';
				}
			$Errty .= '<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Immotile"].'</td>';
				if($semRst[0]["Immotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Immotile1"].'</td>';
				}
				if($semRst[0]["Immotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Immotile2"].'</td>';
				}
		$Errty .= 	'<td></td>
		</tr>
		<tr>
			<td>Total Motility (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile"].'</td>';
				if($semRst[0]["TotalProgrssiveMotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile1"].'</td>';
				}
				if($semRst[0]["TotalProgrssiveMotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile2"].'</td>';
				}
			$Errty .= '<td>&gt;=40% PR+NP</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>				
	</div>
</div>';
echo $Errty;
}
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$ETDatesql = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."'  and ETDate is not null;";
$ETDateRst = $dbhelper->ExecuteRows($ETDatesql);
$ETDateEE  = $ETDateRst[0]["ETDate"];
$TransferredCountsql = "select count(*) as TransferredCount FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."' and EndingState = 'Transferred';";
$TransferredCountRst = $dbhelper->ExecuteRows($TransferredCountsql);
$TransferredCount  = $TransferredCountRst[0]["TransferredCount"];
$FrozenCountsql = "select count(*) as TransferredCount FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."' and EndingState = 'Frozen';";
$FrozenCountRst = $dbhelper->ExecuteRows($FrozenCountsql);
$FrozenCount  = $FrozenCountRst[0]["TransferredCount"];
$ObserveCountsql = "SELECT count(*) as ObserveCount FROM ganeshkumar_bjhims.ivf_embryology_chart where TidNo='".$cid."'  and Day5Grade = 'Observe';";
$ObserveCountRst = $dbhelper->ExecuteRows($ObserveCountsql);
$ObserveCount  = $ObserveCountRst[0]["ObserveCount"];
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Summary of Embryo transfer( ET)</h3>
			</div>
			<div class="card-body">
<div class="row">
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:30%">Date of ET</td>
				<td>:</td>
				<td><?php  if($ETDateEE != null){ echo date("d-m-Y", strtotime($ETDateEE));} else {echo 'No Transfer';}; ?></td>
		 </tr>
  		  <tr>
  		  		<td></td>
				<td></td>
				<td></td>
		 </tr>
	</tbody>
</table>
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:50%">Number of Embryos Transferred</td>
				<td>:</td>
				 <td><?php echo $TransferredCount; ?></td>
		 </tr>
		 <tr>
				<td>Embryos Remaining</td>
				<td>:</td>
				 <td><?php echo $FrozenCount; ?></td>
		 </tr>
<?php
$curl = $_GET['curl'];
$ocyteStagesql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and DidNO='".$curl."'  and thawET='ET';";
$ocyteStageRst = $dbhelper->ExecuteRows($ocyteStagesql);
$rrOPR = "";
$length = count($ocyteStageRst);
for ($i = 0; $i < $length; $i++) {
	if($rrOPR != "")
	{
	   $rrOPR = $rrOPR . ', ';
	}
	$rrOPR = $rrOPR . $ocyteStageRst[$i]["Day0OocyteStage"];
}
	if($rrOPR != "")
	{
	   echo 	 '<tr><td>Day of Transfer </td><td>:</td><td>'. $rrOPR .'</td></tr>';
	}
?>
	</tbody>
</table>
</div>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Embryo Development Summary</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<tbody>
		<tr>
				<td style="width:16%">
					<span class="ew-cell">Embryo N0</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Day</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Cell Stage</span>
				</td>
				<td style="width:16%">
					<span class="ew-cell">Embryo Origin</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Grade</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">State</span>
				</td>
		 </tr>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
if($Page->ARTCYCLE->CurrentValue == "Frozen Embryo Transfer")
{
$sql = "select Day0sino,EndingDay,EndingCellStage,Day0SpOrgin,EndingGrade,thawET as EndingState  FROM ganeshkumar_bjhims.ivf_embryology_chart where Day0OocyteStage in ('MII','MI') and EndingState in ('Frozen','Transferred')  and thawET in ('Re Frozen','ET')  and  TidNo ='".$cid."';";
}else{
$sql = "select Day0sino,EndingDay,EndingCellStage,Day0SpOrgin,EndingGrade,EndingState FROM ganeshkumar_bjhims.ivf_embryology_chart where Day0OocyteStage in ('MII','MI') and EndingState in ('Frozen','Transferred') and  TidNo ='".$cid."';";
}
$resultst = $dbhelper->ExecuteRows($sql);
if($resultst != false)
{
	$$resultstRowCount = count($resultst);
			for ($x = 0; $x < $$resultstRowCount; $x++) {
			$rowhtml .=	'<tr><td><span class="ew-cell">'.$resultst[$x]["Day0sino"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["EndingDay"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["EndingCellStage"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["Day0SpOrgin"].'</span></td> <td><span class="ew-cell">'.$resultst[$x]["EndingGrade"].'</span></td> <td><span class="ew-cell">'.$resultst[$x]["EndingState"].'</span></td></tr>';
			}
}
echo $rowhtml;
?>		 
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Legend Cell Stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"></span>
				</td>
					<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">cleavage stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Day 3 embryos</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">BL : Blastocyst</span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">CM : Compacting Morula</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">CB : Cavitated Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">XB : Expanded Blastocyst</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">iHB : Hatching Blastocyst</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">HB : Hatched Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">EB : Early Blastocyst</span>
				 </td>
		 </tr>
	</tbody>
</table>
<?php
$tt = "ewbarcode.php?data=".$Page->RIDNO->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
<br><br><br><br>
<br><br><br><br>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell">Embryologist Signature</span>
				 </td>
				 <td>
					<span class="ew-cell">Consultants Signature</span>
				</td>
		 </tr>	 
	</tbody>
</table>
</div>
</div>
</script>
<?php
	if (in_array("ivf_semenanalysisreport", explode(",", $view_ivf_treatment->getCurrentDetailTable())) && $ivf_semenanalysisreport->DetailView) {
?>
<?php if ($view_ivf_treatment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_semenanalysisreportgrid.php" ?>
<?php } ?>
<?php
	if (in_array("ivf_oocytedenudation", explode(",", $view_ivf_treatment->getCurrentDetailTable())) && $ivf_oocytedenudation->DetailView) {
?>
<?php if ($view_ivf_treatment->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_oocytedenudation", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_oocytedenudationgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment->Rows) ?> };
ew.applyTemplate("tpd_view_ivf_treatmentview", "tpm_view_ivf_treatmentview", "view_ivf_treatmentview", "<?php echo $view_ivf_treatment->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ivf_treatmentview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ivf_treatment_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_view->terminate();
?>