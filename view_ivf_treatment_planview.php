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
$view_ivf_treatment_plan_view = new view_ivf_treatment_plan_view();

// Run the page
$view_ivf_treatment_plan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_treatment_plan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ivf_treatment_planview = currentForm = new ew.Form("fview_ivf_treatment_planview", "view");

// Form_CustomValidate event
fview_ivf_treatment_planview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_treatment_planview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ivf_treatment_planview.lists["x_RIDNO"] = <?php echo $view_ivf_treatment_plan_view->RIDNO->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_RIDNO"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->RIDNO->lookupOptions()) ?>;
fview_ivf_treatment_planview.lists["x_treatment_status"] = <?php echo $view_ivf_treatment_plan_view->treatment_status->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_treatment_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->treatment_status->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_ARTCYCLE"] = <?php echo $view_ivf_treatment_plan_view->ARTCYCLE->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->ARTCYCLE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_RESULT"] = <?php echo $view_ivf_treatment_plan_view->RESULT->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_RESULT"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->RESULT->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_status"] = <?php echo $view_ivf_treatment_plan_view->status->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_status"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->status->lookupOptions()) ?>;
fview_ivf_treatment_planview.lists["x_Treatment"] = <?php echo $view_ivf_treatment_plan_view->Treatment->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_Treatment"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->Treatment->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_TypeOfCycle"] = <?php echo $view_ivf_treatment_plan_view->TypeOfCycle->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->TypeOfCycle->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_SpermOrgin"] = <?php echo $view_ivf_treatment_plan_view->SpermOrgin->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_SpermOrgin"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->SpermOrgin->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_State"] = <?php echo $view_ivf_treatment_plan_view->State->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_State"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->State->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_MACS"] = <?php echo $view_ivf_treatment_plan_view->MACS->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_MACS"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->MACS->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_PgdPlanning"] = <?php echo $view_ivf_treatment_plan_view->PgdPlanning->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_PgdPlanning"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->PgdPlanning->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_MaleIndications"] = <?php echo $view_ivf_treatment_plan_view->MaleIndications->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_MaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->MaleIndications->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_FemaleIndications"] = <?php echo $view_ivf_treatment_plan_view->FemaleIndications->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_FemaleIndications"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->FemaleIndications->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_Heterotopic"] = <?php echo $view_ivf_treatment_plan_view->Heterotopic->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_Heterotopic"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->Heterotopic->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_TransferDFE[]"] = <?php echo $view_ivf_treatment_plan_view->TransferDFE->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_TransferDFE[]"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->TransferDFE->options(FALSE, TRUE)) ?>;
fview_ivf_treatment_planview.lists["x_TineLapse"] = <?php echo $view_ivf_treatment_plan_view->TineLapse->Lookup->toClientList() ?>;
fview_ivf_treatment_planview.lists["x_TineLapse"].options = <?php echo JsonEncode($view_ivf_treatment_plan_view->TineLapse->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ivf_treatment_plan_view->ExportOptions->render("body") ?>
<?php $view_ivf_treatment_plan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ivf_treatment_plan_view->showPageHeader(); ?>
<?php
$view_ivf_treatment_plan_view->showMessage();
?>
<form name="fview_ivf_treatment_planview" id="fview_ivf_treatment_planview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_treatment_plan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_treatment_plan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_treatment_plan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ivf_treatment_plan->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_id"><script id="tpc_view_ivf_treatment_plan_id" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ivf_treatment_plan->id->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_id" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_id">
<span<?php echo $view_ivf_treatment_plan->id->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->CoupleID->Visible) { // CoupleID ?>
	<tr id="r_CoupleID">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_CoupleID"><script id="tpc_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->CoupleID->caption() ?></span></script></span></td>
		<td data-name="CoupleID"<?php echo $view_ivf_treatment_plan->CoupleID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_CoupleID" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_CoupleID">
<span<?php echo $view_ivf_treatment_plan->CoupleID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_PatientID"><script id="tpc_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_ivf_treatment_plan->PatientID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientID" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_PatientID">
<span<?php echo $view_ivf_treatment_plan->PatientID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_PatientName"><script id="tpc_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_ivf_treatment_plan->PatientName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PatientName" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_PatientName">
<span<?php echo $view_ivf_treatment_plan->PatientName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->WifeCell->Visible) { // WifeCell ?>
	<tr id="r_WifeCell">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_WifeCell"><script id="tpc_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->WifeCell->caption() ?></span></script></span></td>
		<td data-name="WifeCell"<?php echo $view_ivf_treatment_plan->WifeCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_WifeCell" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_WifeCell">
<span<?php echo $view_ivf_treatment_plan->WifeCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_PartnerID"><script id="tpc_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $view_ivf_treatment_plan->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerID" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_PartnerID">
<span<?php echo $view_ivf_treatment_plan->PartnerID->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_PartnerName"><script id="tpc_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_ivf_treatment_plan->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PartnerName" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_PartnerName">
<span<?php echo $view_ivf_treatment_plan->PartnerName->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->HusbandCell->Visible) { // HusbandCell ?>
	<tr id="r_HusbandCell">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_HusbandCell"><script id="tpc_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->HusbandCell->caption() ?></span></script></span></td>
		<td data-name="HusbandCell"<?php echo $view_ivf_treatment_plan->HusbandCell->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_HusbandCell" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_HusbandCell">
<span<?php echo $view_ivf_treatment_plan->HusbandCell->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_RIDNO"><script id="tpc_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_ivf_treatment_plan->RIDNO->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RIDNO" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_RIDNO">
<span<?php echo $view_ivf_treatment_plan->RIDNO->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Name"><script id="tpc_view_ivf_treatment_plan_Name" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $view_ivf_treatment_plan->Name->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Name" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Name">
<span<?php echo $view_ivf_treatment_plan->Name->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Age"><script id="tpc_view_ivf_treatment_plan_Age" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_ivf_treatment_plan->Age->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Age" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Age">
<span<?php echo $view_ivf_treatment_plan->Age->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<tr id="r_TreatmentStartDate">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TreatmentStartDate"><script id="tpc_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatmentStartDate->caption() ?></span></script></span></td>
		<td data-name="TreatmentStartDate"<?php echo $view_ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentStartDate" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $view_ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<tr id="r_treatment_status">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_treatment_status"><script id="tpc_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->treatment_status->caption() ?></span></script></span></td>
		<td data-name="treatment_status"<?php echo $view_ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_treatment_status" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_treatment_status">
<span<?php echo $view_ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_ARTCYCLE"><script id="tpc_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $view_ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_ARTCYCLE" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $view_ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_RESULT"><script id="tpc_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $view_ivf_treatment_plan->RESULT->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_RESULT" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_RESULT">
<span<?php echo $view_ivf_treatment_plan->RESULT->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_status"><script id="tpc_view_ivf_treatment_plan_status" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_ivf_treatment_plan->status->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_status" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_status">
<span<?php echo $view_ivf_treatment_plan->status->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_createdby"><script id="tpc_view_ivf_treatment_plan_createdby" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ivf_treatment_plan->createdby->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_createdby" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_createdby">
<span<?php echo $view_ivf_treatment_plan->createdby->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_createddatetime"><script id="tpc_view_ivf_treatment_plan_createddatetime" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ivf_treatment_plan->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_createddatetime" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_createddatetime">
<span<?php echo $view_ivf_treatment_plan->createddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_modifiedby"><script id="tpc_view_ivf_treatment_plan_modifiedby" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ivf_treatment_plan->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_modifiedby" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_modifiedby">
<span<?php echo $view_ivf_treatment_plan->modifiedby->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_modifieddatetime"><script id="tpc_view_ivf_treatment_plan_modifieddatetime" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ivf_treatment_plan->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_modifieddatetime" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_modifieddatetime">
<span<?php echo $view_ivf_treatment_plan->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatementStopDate->Visible) { // TreatementStopDate ?>
	<tr id="r_TreatementStopDate">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TreatementStopDate"><script id="tpc_view_ivf_treatment_plan_TreatementStopDate" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatementStopDate->caption() ?></span></script></span></td>
		<td data-name="TreatementStopDate"<?php echo $view_ivf_treatment_plan->TreatementStopDate->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatementStopDate" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatementStopDate">
<span<?php echo $view_ivf_treatment_plan->TreatementStopDate->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TreatementStopDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TypePatient->Visible) { // TypePatient ?>
	<tr id="r_TypePatient">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TypePatient"><script id="tpc_view_ivf_treatment_plan_TypePatient" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TypePatient->caption() ?></span></script></span></td>
		<td data-name="TypePatient"<?php echo $view_ivf_treatment_plan->TypePatient->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypePatient" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TypePatient">
<span<?php echo $view_ivf_treatment_plan->TypePatient->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TypePatient->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
	<tr id="r_Treatment">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Treatment"><script id="tpc_view_ivf_treatment_plan_Treatment" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Treatment->caption() ?></span></script></span></td>
		<td data-name="Treatment"<?php echo $view_ivf_treatment_plan->Treatment->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Treatment" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Treatment">
<span<?php echo $view_ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
	<tr id="r_TreatmentTec">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TreatmentTec"><script id="tpc_view_ivf_treatment_plan_TreatmentTec" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TreatmentTec->caption() ?></span></script></span></td>
		<td data-name="TreatmentTec"<?php echo $view_ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TreatmentTec" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TreatmentTec">
<span<?php echo $view_ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<tr id="r_TypeOfCycle">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TypeOfCycle"><script id="tpc_view_ivf_treatment_plan_TypeOfCycle" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TypeOfCycle->caption() ?></span></script></span></td>
		<td data-name="TypeOfCycle"<?php echo $view_ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TypeOfCycle" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TypeOfCycle">
<span<?php echo $view_ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
	<tr id="r_SpermOrgin">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_SpermOrgin"><script id="tpc_view_ivf_treatment_plan_SpermOrgin" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->SpermOrgin->caption() ?></span></script></span></td>
		<td data-name="SpermOrgin"<?php echo $view_ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SpermOrgin" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_SpermOrgin">
<span<?php echo $view_ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->State->Visible) { // State ?>
	<tr id="r_State">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_State"><script id="tpc_view_ivf_treatment_plan_State" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->State->caption() ?></span></script></span></td>
		<td data-name="State"<?php echo $view_ivf_treatment_plan->State->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_State" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_State">
<span<?php echo $view_ivf_treatment_plan->State->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->State->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Origin->Visible) { // Origin ?>
	<tr id="r_Origin">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Origin"><script id="tpc_view_ivf_treatment_plan_Origin" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Origin->caption() ?></span></script></span></td>
		<td data-name="Origin"<?php echo $view_ivf_treatment_plan->Origin->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Origin" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Origin">
<span<?php echo $view_ivf_treatment_plan->Origin->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Origin->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->MACS->Visible) { // MACS ?>
	<tr id="r_MACS">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_MACS"><script id="tpc_view_ivf_treatment_plan_MACS" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->MACS->caption() ?></span></script></span></td>
		<td data-name="MACS"<?php echo $view_ivf_treatment_plan->MACS->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MACS" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_MACS">
<span<?php echo $view_ivf_treatment_plan->MACS->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->MACS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Technique->Visible) { // Technique ?>
	<tr id="r_Technique">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Technique"><script id="tpc_view_ivf_treatment_plan_Technique" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Technique->caption() ?></span></script></span></td>
		<td data-name="Technique"<?php echo $view_ivf_treatment_plan->Technique->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Technique" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Technique">
<span<?php echo $view_ivf_treatment_plan->Technique->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Technique->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
	<tr id="r_PgdPlanning">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_PgdPlanning"><script id="tpc_view_ivf_treatment_plan_PgdPlanning" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->PgdPlanning->caption() ?></span></script></span></td>
		<td data-name="PgdPlanning"<?php echo $view_ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_PgdPlanning" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_PgdPlanning">
<span<?php echo $view_ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
	<tr id="r_IMSI">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_IMSI"><script id="tpc_view_ivf_treatment_plan_IMSI" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->IMSI->caption() ?></span></script></span></td>
		<td data-name="IMSI"<?php echo $view_ivf_treatment_plan->IMSI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_IMSI" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_IMSI">
<span<?php echo $view_ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
	<tr id="r_SequentialCulture">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_SequentialCulture"><script id="tpc_view_ivf_treatment_plan_SequentialCulture" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->SequentialCulture->caption() ?></span></script></span></td>
		<td data-name="SequentialCulture"<?php echo $view_ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCulture" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_SequentialCulture">
<span<?php echo $view_ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
	<tr id="r_TimeLapse">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TimeLapse"><script id="tpc_view_ivf_treatment_plan_TimeLapse" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TimeLapse->caption() ?></span></script></span></td>
		<td data-name="TimeLapse"<?php echo $view_ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TimeLapse" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TimeLapse">
<span<?php echo $view_ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->AH->Visible) { // AH ?>
	<tr id="r_AH">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_AH"><script id="tpc_view_ivf_treatment_plan_AH" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->AH->caption() ?></span></script></span></td>
		<td data-name="AH"<?php echo $view_ivf_treatment_plan->AH->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_AH" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_AH">
<span<?php echo $view_ivf_treatment_plan->AH->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->AH->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Weight->Visible) { // Weight ?>
	<tr id="r_Weight">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Weight"><script id="tpc_view_ivf_treatment_plan_Weight" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Weight->caption() ?></span></script></span></td>
		<td data-name="Weight"<?php echo $view_ivf_treatment_plan->Weight->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Weight" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Weight">
<span<?php echo $view_ivf_treatment_plan->Weight->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Weight->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->BMI->Visible) { // BMI ?>
	<tr id="r_BMI">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_BMI"><script id="tpc_view_ivf_treatment_plan_BMI" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->BMI->caption() ?></span></script></span></td>
		<td data-name="BMI"<?php echo $view_ivf_treatment_plan->BMI->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_BMI" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_BMI">
<span<?php echo $view_ivf_treatment_plan->BMI->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->BMI->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
	<tr id="r_MaleIndications">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_MaleIndications"><script id="tpc_view_ivf_treatment_plan_MaleIndications" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->MaleIndications->caption() ?></span></script></span></td>
		<td data-name="MaleIndications"<?php echo $view_ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_MaleIndications" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_MaleIndications">
<span<?php echo $view_ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
	<tr id="r_FemaleIndications">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_FemaleIndications"><script id="tpc_view_ivf_treatment_plan_FemaleIndications" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->FemaleIndications->caption() ?></span></script></span></td>
		<td data-name="FemaleIndications"<?php echo $view_ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_FemaleIndications" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_FemaleIndications">
<span<?php echo $view_ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->UseOfThe->Visible) { // UseOfThe ?>
	<tr id="r_UseOfThe">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_UseOfThe"><script id="tpc_view_ivf_treatment_plan_UseOfThe" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->UseOfThe->caption() ?></span></script></span></td>
		<td data-name="UseOfThe"<?php echo $view_ivf_treatment_plan->UseOfThe->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_UseOfThe" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_UseOfThe">
<span<?php echo $view_ivf_treatment_plan->UseOfThe->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->UseOfThe->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Ectopic->Visible) { // Ectopic ?>
	<tr id="r_Ectopic">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Ectopic"><script id="tpc_view_ivf_treatment_plan_Ectopic" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Ectopic->caption() ?></span></script></span></td>
		<td data-name="Ectopic"<?php echo $view_ivf_treatment_plan->Ectopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Ectopic" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Ectopic">
<span<?php echo $view_ivf_treatment_plan->Ectopic->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Ectopic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Heterotopic->Visible) { // Heterotopic ?>
	<tr id="r_Heterotopic">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Heterotopic"><script id="tpc_view_ivf_treatment_plan_Heterotopic" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Heterotopic->caption() ?></span></script></span></td>
		<td data-name="Heterotopic"<?php echo $view_ivf_treatment_plan->Heterotopic->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Heterotopic" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Heterotopic">
<span<?php echo $view_ivf_treatment_plan->Heterotopic->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Heterotopic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TransferDFE->Visible) { // TransferDFE ?>
	<tr id="r_TransferDFE">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TransferDFE"><script id="tpc_view_ivf_treatment_plan_TransferDFE" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TransferDFE->caption() ?></span></script></span></td>
		<td data-name="TransferDFE"<?php echo $view_ivf_treatment_plan->TransferDFE->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TransferDFE" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TransferDFE">
<span<?php echo $view_ivf_treatment_plan->TransferDFE->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TransferDFE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Evolutive->Visible) { // Evolutive ?>
	<tr id="r_Evolutive">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Evolutive"><script id="tpc_view_ivf_treatment_plan_Evolutive" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Evolutive->caption() ?></span></script></span></td>
		<td data-name="Evolutive"<?php echo $view_ivf_treatment_plan->Evolutive->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Evolutive" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Evolutive">
<span<?php echo $view_ivf_treatment_plan->Evolutive->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Evolutive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->Number->Visible) { // Number ?>
	<tr id="r_Number">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_Number"><script id="tpc_view_ivf_treatment_plan_Number" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->Number->caption() ?></span></script></span></td>
		<td data-name="Number"<?php echo $view_ivf_treatment_plan->Number->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_Number" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_Number">
<span<?php echo $view_ivf_treatment_plan->Number->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->Number->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->SequentialCult->Visible) { // SequentialCult ?>
	<tr id="r_SequentialCult">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_SequentialCult"><script id="tpc_view_ivf_treatment_plan_SequentialCult" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->SequentialCult->caption() ?></span></script></span></td>
		<td data-name="SequentialCult"<?php echo $view_ivf_treatment_plan->SequentialCult->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_SequentialCult" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_SequentialCult">
<span<?php echo $view_ivf_treatment_plan->SequentialCult->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->SequentialCult->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ivf_treatment_plan->TineLapse->Visible) { // TineLapse ?>
	<tr id="r_TineLapse">
		<td class="<?php echo $view_ivf_treatment_plan_view->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_plan_TineLapse"><script id="tpc_view_ivf_treatment_plan_TineLapse" class="view_ivf_treatment_planview" type="text/html"><span><?php echo $view_ivf_treatment_plan->TineLapse->caption() ?></span></script></span></td>
		<td data-name="TineLapse"<?php echo $view_ivf_treatment_plan->TineLapse->cellAttributes() ?>>
<script id="tpx_view_ivf_treatment_plan_TineLapse" class="view_ivf_treatment_planview" type="text/html">
<span id="el_view_ivf_treatment_plan_TineLapse">
<span<?php echo $view_ivf_treatment_plan->TineLapse->viewAttributes() ?>>
<?php echo $view_ivf_treatment_plan->TineLapse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ivf_treatment_planview" class="ew-custom-template"></div>
<script id="tpm_view_ivf_treatment_planview" type="text/html">
<div id="ct_view_ivf_treatment_plan_view"><style>
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
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
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
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
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
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
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
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
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
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' and TidNo='".$Page->id->CurrentValue."';";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
		if($ivfstimulationchart == false )
		{
		$ivfstimulationchartUrl =  "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid."&fk_Name=". $results[0]["Female"]."&fk_id=". $Page->id->CurrentValue."";
		}else{
			$ivfstimulationchartUrl =    "ivf_stimulation_chartview.php?showdetail=&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."&showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid."&fk_Name=". $results[0]["Female"]."&fk_id=". $Page->id->CurrentValue."";
		}
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_outcome where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' and TidNo='".$Page->id->CurrentValue."' ;";
	$ivfoutcome = $dbhelper->ExecuteRows($sql);
	$ivoutcomeRowCount = count($ivfoutcome);
	if($ivfoutcome == false){
		$ivfoutcomeurl =    "ivf_outcomeadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid. "&fk_Name=". $results[0]["Female"]. "&fk_id=". $Page->id->CurrentValue."";
		}else{
			$ivfoutcomeurl =    "ivf_outcomeview.php?showdetail=&id=".$ivfoutcome[$ivoutcomeRowCount-1]["id"]."&showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid. "&fk_Name=". $results[0]["Female"]. "&fk_id=". $Page->id->CurrentValue."";
	}
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
				  <i class="fas fa-futbol-o"></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfoutcomeurl; ?>">
				  <i class="fas fa-cubes"></i> Out Come
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfartsummaryUrl; ?>">
							 <?php echo $ivfartsummarycountwarn; ?>
				  <i class="fas fa-medkit"></i> ART Summary
				</a>
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Plan</h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td    style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_FemaleIndications"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_FemaleIndications"/}}</span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MaleIndications"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_MaleIndications"/}}</span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_ARTCYCLE"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_ARTCYCLE"/}}</span>
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
				<h3 class="card-title">Treatment</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td  id="Treatment"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Treatment"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Treatment"/}}</span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TreatmentTec"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TreatmentTec"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TypeOfCycle"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TypeOfCycle"/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SpermOrgin"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SpermOrgin"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_State"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_State"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Origin"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Origin"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_MACS"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_MACS"/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Technique"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Technique"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_PgdPlanning"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_PgdPlanning"/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_IMSI"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_IMSI"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCulture"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SequentialCulture"/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TimeLapse"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TimeLapse"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_AH"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_AH"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Weight"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Weight"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_BMI"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_BMI"/}}</span>
						</td>
						<td id="aaa"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="Ectopic"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Ectopic"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Ectopic"/}}</span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_UseOfThe"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_UseOfThe"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TransferDFE"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TransferDFE"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Evolutive"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Evolutive"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Number"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Number"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_SequentialCult"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_SequentialCult"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_TineLapse"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_TineLapse"/}}</span>
						</td>
												<td>
							<span class="ew-cell">{{include tmpl="#tpc_view_ivf_treatment_plan_Heterotopic"/}}&nbsp;{{include tmpl="#tpx_view_ivf_treatment_plan_Heterotopic"/}}</span>
						</td>
					</tr>				
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ivf_treatment_plan->Rows) ?> };
ew.applyTemplate("tpd_view_ivf_treatment_planview", "tpm_view_ivf_treatment_planview", "view_ivf_treatment_planview", "<?php echo $view_ivf_treatment_plan->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ivf_treatment_planview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ivf_treatment_plan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ivf_treatment_plan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
		function callstumilation() {
		var url =    'ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=<?php  echo $IVFid; ?>&fk_Name=<?php echo $results[0]["Female"]; ?>&fk_id=<?php echo $Page->id->CurrentValue; ?>';
			var jj = url;
			location.href = url;
		}

		function callsOutcome() {
		var url =    'ivf_outcomeadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=<?php  echo $IVFid; ?>&fk_Name=<?php echo $results[0]["Female"]; ?>&fk_id=<?php echo $Page->id->CurrentValue; ?>';
			var jj = url;
			location.href = url;
		}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ivf_treatment_plan_view->terminate();
?>