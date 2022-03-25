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
$ivf_outcome_view = new ivf_outcome_view();

// Run the page
$ivf_outcome_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_outcomeview = currentForm = new ew.Form("fivf_outcomeview", "view");

// Form_CustomValidate event
fivf_outcomeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_outcomeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_outcomeview.lists["x_Gestation"] = <?php echo $ivf_outcome_view->Gestation->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_view->Gestation->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Urine"] = <?php echo $ivf_outcome_view->Urine->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_view->Urine->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Miscarriage"] = <?php echo $ivf_outcome_view->Miscarriage->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_view->Miscarriage->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Induced1"] = <?php echo $ivf_outcome_view->Induced1->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_view->Induced1->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Type"] = <?php echo $ivf_outcome_view->Type->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_view->Type->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_view->FoetalDeath->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_view->FoetalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_view->FerinatalDeath->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_view->FerinatalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Ectopic"] = <?php echo $ivf_outcome_view->Ectopic->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_view->Ectopic->options(FALSE, TRUE)) ?>;
fivf_outcomeview.lists["x_Extra"] = <?php echo $ivf_outcome_view->Extra->Lookup->toClientList() ?>;
fivf_outcomeview.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_view->Extra->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_outcome->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_outcome_view->ExportOptions->render("body") ?>
<?php $ivf_outcome_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_outcome_view->showPageHeader(); ?>
<?php
$ivf_outcome_view->showMessage();
?>
<form name="fivf_outcomeview" id="fivf_outcomeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_outcome_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_outcome_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_outcome_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_outcome->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_id"><script id="tpc_ivf_outcome_id" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_outcome->id->cellAttributes() ?>>
<script id="tpx_ivf_outcome_id" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<?php echo $ivf_outcome->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RIDNO"><script id="tpc_ivf_outcome_RIDNO" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RIDNO" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<?php echo $ivf_outcome->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Name"><script id="tpc_ivf_outcome_Name" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Name" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<?php echo $ivf_outcome->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Age"><script id="tpc_ivf_outcome_Age" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Age" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Age">
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<?php echo $ivf_outcome->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
	<tr id="r_treatment_status">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_treatment_status"><script id="tpc_ivf_outcome_treatment_status" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->treatment_status->caption() ?></span></script></span></td>
		<td data-name="treatment_status"<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_treatment_status" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<?php echo $ivf_outcome->treatment_status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ARTCYCLE"><script id="tpc_ivf_outcome_ARTCYCLE" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->ARTCYCLE->caption() ?></span></script></span></td>
		<td data-name="ARTCYCLE"<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ARTCYCLE" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_outcome->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RESULT"><script id="tpc_ivf_outcome_RESULT" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->RESULT->caption() ?></span></script></span></td>
		<td data-name="RESULT"<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RESULT" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_RESULT">
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<?php echo $ivf_outcome->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_status"><script id="tpc_ivf_outcome_status" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $ivf_outcome->status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_status" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_status">
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<?php echo $ivf_outcome->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createdby"><script id="tpc_ivf_outcome_createdby" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createdby" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_createdby">
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<?php echo $ivf_outcome->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createddatetime"><script id="tpc_ivf_outcome_createddatetime" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createddatetime" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifiedby"><script id="tpc_ivf_outcome_modifiedby" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifiedby" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<?php echo $ivf_outcome->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifieddatetime"><script id="tpc_ivf_outcome_modifieddatetime" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifieddatetime" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
	<tr id="r_outcomeDate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDate"><script id="tpc_ivf_outcome_outcomeDate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->outcomeDate->caption() ?></span></script></span></td>
		<td data-name="outcomeDate"<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
	<tr id="r_outcomeDay">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDay"><script id="tpc_ivf_outcome_outcomeDay" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->outcomeDay->caption() ?></span></script></span></td>
		<td data-name="outcomeDay"<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDay" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDay->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
	<tr id="r_OPResult">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_OPResult"><script id="tpc_ivf_outcome_OPResult" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->OPResult->caption() ?></span></script></span></td>
		<td data-name="OPResult"<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<script id="tpx_ivf_outcome_OPResult" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_OPResult">
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<?php echo $ivf_outcome->OPResult->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
	<tr id="r_Gestation">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Gestation"><script id="tpc_ivf_outcome_Gestation" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Gestation->caption() ?></span></script></span></td>
		<td data-name="Gestation"<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Gestation" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Gestation">
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<?php echo $ivf_outcome->Gestation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<tr id="r_TransferdEmbryos">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TransferdEmbryos"><script id="tpc_ivf_outcome_TransferdEmbryos" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></span></script></span></td>
		<td data-name="TransferdEmbryos"<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TransferdEmbryos" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<?php echo $ivf_outcome->TransferdEmbryos->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<tr id="r_InitalOfSacs">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_InitalOfSacs"><script id="tpc_ivf_outcome_InitalOfSacs" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->InitalOfSacs->caption() ?></span></script></span></td>
		<td data-name="InitalOfSacs"<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<script id="tpx_ivf_outcome_InitalOfSacs" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<?php echo $ivf_outcome->InitalOfSacs->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<tr id="r_ImplimentationRate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ImplimentationRate"><script id="tpc_ivf_outcome_ImplimentationRate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->ImplimentationRate->caption() ?></span></script></span></td>
		<td data-name="ImplimentationRate"<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ImplimentationRate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<?php echo $ivf_outcome->ImplimentationRate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
	<tr id="r_EmbryoNo">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_EmbryoNo"><script id="tpc_ivf_outcome_EmbryoNo" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->EmbryoNo->caption() ?></span></script></span></td>
		<td data-name="EmbryoNo"<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_EmbryoNo" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_outcome->EmbryoNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<tr id="r_ExtrauterineSac">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ExtrauterineSac"><script id="tpc_ivf_outcome_ExtrauterineSac" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></span></script></span></td>
		<td data-name="ExtrauterineSac"<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ExtrauterineSac" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<?php echo $ivf_outcome->ExtrauterineSac->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<tr id="r_PregnancyMonozygotic">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic"><script id="tpc_ivf_outcome_PregnancyMonozygotic" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></span></script></span></td>
		<td data-name="PregnancyMonozygotic"<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PregnancyMonozygotic" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<?php echo $ivf_outcome->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
	<tr id="r_TypeGestation">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TypeGestation"><script id="tpc_ivf_outcome_TypeGestation" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->TypeGestation->caption() ?></span></script></span></td>
		<td data-name="TypeGestation"<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TypeGestation" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<?php echo $ivf_outcome->TypeGestation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
	<tr id="r_Urine">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Urine"><script id="tpc_ivf_outcome_Urine" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Urine->caption() ?></span></script></span></td>
		<td data-name="Urine"<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Urine" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Urine">
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<?php echo $ivf_outcome->Urine->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
	<tr id="r_PTdate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PTdate"><script id="tpc_ivf_outcome_PTdate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->PTdate->caption() ?></span></script></span></td>
		<td data-name="PTdate"<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PTdate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_PTdate">
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<?php echo $ivf_outcome->PTdate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
	<tr id="r_Reduced">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Reduced"><script id="tpc_ivf_outcome_Reduced" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Reduced->caption() ?></span></script></span></td>
		<td data-name="Reduced"<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Reduced" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Reduced">
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<?php echo $ivf_outcome->Reduced->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
	<tr id="r_INduced">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INduced"><script id="tpc_ivf_outcome_INduced" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->INduced->caption() ?></span></script></span></td>
		<td data-name="INduced"<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INduced" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_INduced">
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<?php echo $ivf_outcome->INduced->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
	<tr id="r_INducedDate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INducedDate"><script id="tpc_ivf_outcome_INducedDate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->INducedDate->caption() ?></span></script></span></td>
		<td data-name="INducedDate"<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INducedDate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<?php echo $ivf_outcome->INducedDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
	<tr id="r_Miscarriage">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Miscarriage"><script id="tpc_ivf_outcome_Miscarriage" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Miscarriage->caption() ?></span></script></span></td>
		<td data-name="Miscarriage"<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Miscarriage" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<?php echo $ivf_outcome->Miscarriage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
	<tr id="r_Induced1">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Induced1"><script id="tpc_ivf_outcome_Induced1" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Induced1->caption() ?></span></script></span></td>
		<td data-name="Induced1"<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Induced1" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Induced1">
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<?php echo $ivf_outcome->Induced1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Type"><script id="tpc_ivf_outcome_Type" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Type->caption() ?></span></script></span></td>
		<td data-name="Type"<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Type" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Type">
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<?php echo $ivf_outcome->Type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
	<tr id="r_IfClinical">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_IfClinical"><script id="tpc_ivf_outcome_IfClinical" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->IfClinical->caption() ?></span></script></span></td>
		<td data-name="IfClinical"<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<script id="tpx_ivf_outcome_IfClinical" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<?php echo $ivf_outcome->IfClinical->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
	<tr id="r_GADate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GADate"><script id="tpc_ivf_outcome_GADate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->GADate->caption() ?></span></script></span></td>
		<td data-name="GADate"<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GADate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_GADate">
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<?php echo $ivf_outcome->GADate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
	<tr id="r_GA">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GA"><script id="tpc_ivf_outcome_GA" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->GA->caption() ?></span></script></span></td>
		<td data-name="GA"<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GA" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_GA">
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<?php echo $ivf_outcome->GA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
	<tr id="r_FoetalDeath">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FoetalDeath"><script id="tpc_ivf_outcome_FoetalDeath" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->FoetalDeath->caption() ?></span></script></span></td>
		<td data-name="FoetalDeath"<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FoetalDeath" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FoetalDeath->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<tr id="r_FerinatalDeath">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FerinatalDeath"><script id="tpc_ivf_outcome_FerinatalDeath" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->FerinatalDeath->caption() ?></span></script></span></td>
		<td data-name="FerinatalDeath"<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FerinatalDeath" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FerinatalDeath->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TidNo"><script id="tpc_ivf_outcome_TidNo" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TidNo" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<?php echo $ivf_outcome->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
	<tr id="r_Ectopic">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Ectopic"><script id="tpc_ivf_outcome_Ectopic" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Ectopic->caption() ?></span></script></span></td>
		<td data-name="Ectopic"<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Ectopic" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<?php echo $ivf_outcome->Ectopic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
	<tr id="r_Extra">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Extra"><script id="tpc_ivf_outcome_Extra" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Extra->caption() ?></span></script></span></td>
		<td data-name="Extra"<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Extra" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Extra">
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<?php echo $ivf_outcome->Extra->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
	<tr id="r_Implantation">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Implantation"><script id="tpc_ivf_outcome_Implantation" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Implantation->caption() ?></span></script></span></td>
		<td data-name="Implantation"<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Implantation" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Implantation">
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<?php echo $ivf_outcome->Implantation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
	<tr id="r_DeliveryDate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_DeliveryDate"><script id="tpc_ivf_outcome_DeliveryDate" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->DeliveryDate->caption() ?></span></script></span></td>
		<td data-name="DeliveryDate"<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_DeliveryDate" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_DeliveryDate">
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<?php echo $ivf_outcome->DeliveryDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->BabyDetails->Visible) { // BabyDetails ?>
	<tr id="r_BabyDetails">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_BabyDetails"><script id="tpc_ivf_outcome_BabyDetails" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->BabyDetails->caption() ?></span></script></span></td>
		<td data-name="BabyDetails"<?php echo $ivf_outcome->BabyDetails->cellAttributes() ?>>
<script id="tpx_ivf_outcome_BabyDetails" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_BabyDetails">
<span<?php echo $ivf_outcome->BabyDetails->viewAttributes() ?>>
<?php echo $ivf_outcome->BabyDetails->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->LSCSNormal->Visible) { // LSCSNormal ?>
	<tr id="r_LSCSNormal">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_LSCSNormal"><script id="tpc_ivf_outcome_LSCSNormal" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->LSCSNormal->caption() ?></span></script></span></td>
		<td data-name="LSCSNormal"<?php echo $ivf_outcome->LSCSNormal->cellAttributes() ?>>
<script id="tpx_ivf_outcome_LSCSNormal" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_LSCSNormal">
<span<?php echo $ivf_outcome->LSCSNormal->viewAttributes() ?>>
<?php echo $ivf_outcome->LSCSNormal->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome->Notes->Visible) { // Notes ?>
	<tr id="r_Notes">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Notes"><script id="tpc_ivf_outcome_Notes" class="ivf_outcomeview" type="text/html"><span><?php echo $ivf_outcome->Notes->caption() ?></span></script></span></td>
		<td data-name="Notes"<?php echo $ivf_outcome->Notes->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Notes" class="ivf_outcomeview" type="text/html">
<span id="el_ivf_outcome_Notes">
<span<?php echo $ivf_outcome->Notes->viewAttributes() ?>>
<?php echo $ivf_outcome->Notes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_outcomeview" class="ew-custom-template"></div>
<script id="tpm_ivf_outcomeview" type="text/html">
<div id="ct_ivf_outcome_view"><style>
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
$Tid = $_GET["fk_RIDNO"];//
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$Tid."'; ";
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
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Out Come</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_outcomeDate"/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDay"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_outcomeDay"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_OPResult"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_OPResult"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Gestation"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Gestation"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Ectopic"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Ectopic"/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Extra"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Extra"/}}</span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_InitalOfSacs"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_InitalOfSacs"/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_ImplimentationRate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_ImplimentationRate"/}}</span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Miscarriage"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Miscarriage"/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Induced1"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Induced1"/}}</span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Type"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Type"/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GADate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_GADate"/}}</span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GA"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_GA"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Urine"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_Urine"/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_PTdate"/}}&nbsp;{{include tmpl="#tpx_ivf_outcome_PTdate"/}}</span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_outcome->Rows) ?> };
ew.applyTemplate("tpd_ivf_outcomeview", "tpm_ivf_outcomeview", "ivf_outcomeview", "<?php echo $ivf_outcome->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_outcomeview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_outcome_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_outcome->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_outcome_view->terminate();
?>