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
<?php include_once "header.php"; ?>
<?php if (!$ivf_outcome_view->isExport()) { ?>
<script>
var fivf_outcomeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_outcomeview = currentForm = new ew.Form("fivf_outcomeview", "view");
	loadjs.done("fivf_outcomeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_outcome_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_outcome_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_outcome_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_id"><script id="tpc_ivf_outcome_id" type="text/html"><?php echo $ivf_outcome_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_outcome_view->id->cellAttributes() ?>>
<script id="tpx_ivf_outcome_id" type="text/html"><span id="el_ivf_outcome_id">
<span<?php echo $ivf_outcome_view->id->viewAttributes() ?>><?php echo $ivf_outcome_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RIDNO"><script id="tpc_ivf_outcome_RIDNO" type="text/html"><?php echo $ivf_outcome_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $ivf_outcome_view->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RIDNO" type="text/html"><span id="el_ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_view->RIDNO->viewAttributes() ?>><?php echo $ivf_outcome_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Name"><script id="tpc_ivf_outcome_Name" type="text/html"><?php echo $ivf_outcome_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_outcome_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Name" type="text/html"><span id="el_ivf_outcome_Name">
<span<?php echo $ivf_outcome_view->Name->viewAttributes() ?>><?php echo $ivf_outcome_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Age"><script id="tpc_ivf_outcome_Age" type="text/html"><?php echo $ivf_outcome_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $ivf_outcome_view->Age->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Age" type="text/html"><span id="el_ivf_outcome_Age">
<span<?php echo $ivf_outcome_view->Age->viewAttributes() ?>><?php echo $ivf_outcome_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->treatment_status->Visible) { // treatment_status ?>
	<tr id="r_treatment_status">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_treatment_status"><script id="tpc_ivf_outcome_treatment_status" type="text/html"><?php echo $ivf_outcome_view->treatment_status->caption() ?></script></span></td>
		<td data-name="treatment_status" <?php echo $ivf_outcome_view->treatment_status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_treatment_status" type="text/html"><span id="el_ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome_view->treatment_status->viewAttributes() ?>><?php echo $ivf_outcome_view->treatment_status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ARTCYCLE"><script id="tpc_ivf_outcome_ARTCYCLE" type="text/html"><?php echo $ivf_outcome_view->ARTCYCLE->caption() ?></script></span></td>
		<td data-name="ARTCYCLE" <?php echo $ivf_outcome_view->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ARTCYCLE" type="text/html"><span id="el_ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome_view->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_outcome_view->ARTCYCLE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->RESULT->Visible) { // RESULT ?>
	<tr id="r_RESULT">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RESULT"><script id="tpc_ivf_outcome_RESULT" type="text/html"><?php echo $ivf_outcome_view->RESULT->caption() ?></script></span></td>
		<td data-name="RESULT" <?php echo $ivf_outcome_view->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_outcome_RESULT" type="text/html"><span id="el_ivf_outcome_RESULT">
<span<?php echo $ivf_outcome_view->RESULT->viewAttributes() ?>><?php echo $ivf_outcome_view->RESULT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_status"><script id="tpc_ivf_outcome_status" type="text/html"><?php echo $ivf_outcome_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $ivf_outcome_view->status->cellAttributes() ?>>
<script id="tpx_ivf_outcome_status" type="text/html"><span id="el_ivf_outcome_status">
<span<?php echo $ivf_outcome_view->status->viewAttributes() ?>><?php echo $ivf_outcome_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createdby"><script id="tpc_ivf_outcome_createdby" type="text/html"><?php echo $ivf_outcome_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $ivf_outcome_view->createdby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createdby" type="text/html"><span id="el_ivf_outcome_createdby">
<span<?php echo $ivf_outcome_view->createdby->viewAttributes() ?>><?php echo $ivf_outcome_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createddatetime"><script id="tpc_ivf_outcome_createddatetime" type="text/html"><?php echo $ivf_outcome_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $ivf_outcome_view->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_createddatetime" type="text/html"><span id="el_ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome_view->createddatetime->viewAttributes() ?>><?php echo $ivf_outcome_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifiedby"><script id="tpc_ivf_outcome_modifiedby" type="text/html"><?php echo $ivf_outcome_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $ivf_outcome_view->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifiedby" type="text/html"><span id="el_ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome_view->modifiedby->viewAttributes() ?>><?php echo $ivf_outcome_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifieddatetime"><script id="tpc_ivf_outcome_modifieddatetime" type="text/html"><?php echo $ivf_outcome_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $ivf_outcome_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_outcome_modifieddatetime" type="text/html"><span id="el_ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome_view->modifieddatetime->viewAttributes() ?>><?php echo $ivf_outcome_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->outcomeDate->Visible) { // outcomeDate ?>
	<tr id="r_outcomeDate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDate"><script id="tpc_ivf_outcome_outcomeDate" type="text/html"><?php echo $ivf_outcome_view->outcomeDate->caption() ?></script></span></td>
		<td data-name="outcomeDate" <?php echo $ivf_outcome_view->outcomeDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDate" type="text/html"><span id="el_ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome_view->outcomeDate->viewAttributes() ?>><?php echo $ivf_outcome_view->outcomeDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->outcomeDay->Visible) { // outcomeDay ?>
	<tr id="r_outcomeDay">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDay"><script id="tpc_ivf_outcome_outcomeDay" type="text/html"><?php echo $ivf_outcome_view->outcomeDay->caption() ?></script></span></td>
		<td data-name="outcomeDay" <?php echo $ivf_outcome_view->outcomeDay->cellAttributes() ?>>
<script id="tpx_ivf_outcome_outcomeDay" type="text/html"><span id="el_ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome_view->outcomeDay->viewAttributes() ?>><?php echo $ivf_outcome_view->outcomeDay->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->OPResult->Visible) { // OPResult ?>
	<tr id="r_OPResult">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_OPResult"><script id="tpc_ivf_outcome_OPResult" type="text/html"><?php echo $ivf_outcome_view->OPResult->caption() ?></script></span></td>
		<td data-name="OPResult" <?php echo $ivf_outcome_view->OPResult->cellAttributes() ?>>
<script id="tpx_ivf_outcome_OPResult" type="text/html"><span id="el_ivf_outcome_OPResult">
<span<?php echo $ivf_outcome_view->OPResult->viewAttributes() ?>><?php echo $ivf_outcome_view->OPResult->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Gestation->Visible) { // Gestation ?>
	<tr id="r_Gestation">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Gestation"><script id="tpc_ivf_outcome_Gestation" type="text/html"><?php echo $ivf_outcome_view->Gestation->caption() ?></script></span></td>
		<td data-name="Gestation" <?php echo $ivf_outcome_view->Gestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Gestation" type="text/html"><span id="el_ivf_outcome_Gestation">
<span<?php echo $ivf_outcome_view->Gestation->viewAttributes() ?>><?php echo $ivf_outcome_view->Gestation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
	<tr id="r_TransferdEmbryos">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TransferdEmbryos"><script id="tpc_ivf_outcome_TransferdEmbryos" type="text/html"><?php echo $ivf_outcome_view->TransferdEmbryos->caption() ?></script></span></td>
		<td data-name="TransferdEmbryos" <?php echo $ivf_outcome_view->TransferdEmbryos->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TransferdEmbryos" type="text/html"><span id="el_ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome_view->TransferdEmbryos->viewAttributes() ?>><?php echo $ivf_outcome_view->TransferdEmbryos->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->InitalOfSacs->Visible) { // InitalOfSacs ?>
	<tr id="r_InitalOfSacs">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_InitalOfSacs"><script id="tpc_ivf_outcome_InitalOfSacs" type="text/html"><?php echo $ivf_outcome_view->InitalOfSacs->caption() ?></script></span></td>
		<td data-name="InitalOfSacs" <?php echo $ivf_outcome_view->InitalOfSacs->cellAttributes() ?>>
<script id="tpx_ivf_outcome_InitalOfSacs" type="text/html"><span id="el_ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome_view->InitalOfSacs->viewAttributes() ?>><?php echo $ivf_outcome_view->InitalOfSacs->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->ImplimentationRate->Visible) { // ImplimentationRate ?>
	<tr id="r_ImplimentationRate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ImplimentationRate"><script id="tpc_ivf_outcome_ImplimentationRate" type="text/html"><?php echo $ivf_outcome_view->ImplimentationRate->caption() ?></script></span></td>
		<td data-name="ImplimentationRate" <?php echo $ivf_outcome_view->ImplimentationRate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ImplimentationRate" type="text/html"><span id="el_ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome_view->ImplimentationRate->viewAttributes() ?>><?php echo $ivf_outcome_view->ImplimentationRate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->EmbryoNo->Visible) { // EmbryoNo ?>
	<tr id="r_EmbryoNo">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_EmbryoNo"><script id="tpc_ivf_outcome_EmbryoNo" type="text/html"><?php echo $ivf_outcome_view->EmbryoNo->caption() ?></script></span></td>
		<td data-name="EmbryoNo" <?php echo $ivf_outcome_view->EmbryoNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_EmbryoNo" type="text/html"><span id="el_ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome_view->EmbryoNo->viewAttributes() ?>><?php echo $ivf_outcome_view->EmbryoNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
	<tr id="r_ExtrauterineSac">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ExtrauterineSac"><script id="tpc_ivf_outcome_ExtrauterineSac" type="text/html"><?php echo $ivf_outcome_view->ExtrauterineSac->caption() ?></script></span></td>
		<td data-name="ExtrauterineSac" <?php echo $ivf_outcome_view->ExtrauterineSac->cellAttributes() ?>>
<script id="tpx_ivf_outcome_ExtrauterineSac" type="text/html"><span id="el_ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome_view->ExtrauterineSac->viewAttributes() ?>><?php echo $ivf_outcome_view->ExtrauterineSac->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
	<tr id="r_PregnancyMonozygotic">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic"><script id="tpc_ivf_outcome_PregnancyMonozygotic" type="text/html"><?php echo $ivf_outcome_view->PregnancyMonozygotic->caption() ?></script></span></td>
		<td data-name="PregnancyMonozygotic" <?php echo $ivf_outcome_view->PregnancyMonozygotic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PregnancyMonozygotic" type="text/html"><span id="el_ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome_view->PregnancyMonozygotic->viewAttributes() ?>><?php echo $ivf_outcome_view->PregnancyMonozygotic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->TypeGestation->Visible) { // TypeGestation ?>
	<tr id="r_TypeGestation">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TypeGestation"><script id="tpc_ivf_outcome_TypeGestation" type="text/html"><?php echo $ivf_outcome_view->TypeGestation->caption() ?></script></span></td>
		<td data-name="TypeGestation" <?php echo $ivf_outcome_view->TypeGestation->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TypeGestation" type="text/html"><span id="el_ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome_view->TypeGestation->viewAttributes() ?>><?php echo $ivf_outcome_view->TypeGestation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Urine->Visible) { // Urine ?>
	<tr id="r_Urine">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Urine"><script id="tpc_ivf_outcome_Urine" type="text/html"><?php echo $ivf_outcome_view->Urine->caption() ?></script></span></td>
		<td data-name="Urine" <?php echo $ivf_outcome_view->Urine->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Urine" type="text/html"><span id="el_ivf_outcome_Urine">
<span<?php echo $ivf_outcome_view->Urine->viewAttributes() ?>><?php echo $ivf_outcome_view->Urine->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->PTdate->Visible) { // PTdate ?>
	<tr id="r_PTdate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PTdate"><script id="tpc_ivf_outcome_PTdate" type="text/html"><?php echo $ivf_outcome_view->PTdate->caption() ?></script></span></td>
		<td data-name="PTdate" <?php echo $ivf_outcome_view->PTdate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_PTdate" type="text/html"><span id="el_ivf_outcome_PTdate">
<span<?php echo $ivf_outcome_view->PTdate->viewAttributes() ?>><?php echo $ivf_outcome_view->PTdate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Reduced->Visible) { // Reduced ?>
	<tr id="r_Reduced">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Reduced"><script id="tpc_ivf_outcome_Reduced" type="text/html"><?php echo $ivf_outcome_view->Reduced->caption() ?></script></span></td>
		<td data-name="Reduced" <?php echo $ivf_outcome_view->Reduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Reduced" type="text/html"><span id="el_ivf_outcome_Reduced">
<span<?php echo $ivf_outcome_view->Reduced->viewAttributes() ?>><?php echo $ivf_outcome_view->Reduced->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->INduced->Visible) { // INduced ?>
	<tr id="r_INduced">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INduced"><script id="tpc_ivf_outcome_INduced" type="text/html"><?php echo $ivf_outcome_view->INduced->caption() ?></script></span></td>
		<td data-name="INduced" <?php echo $ivf_outcome_view->INduced->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INduced" type="text/html"><span id="el_ivf_outcome_INduced">
<span<?php echo $ivf_outcome_view->INduced->viewAttributes() ?>><?php echo $ivf_outcome_view->INduced->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->INducedDate->Visible) { // INducedDate ?>
	<tr id="r_INducedDate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INducedDate"><script id="tpc_ivf_outcome_INducedDate" type="text/html"><?php echo $ivf_outcome_view->INducedDate->caption() ?></script></span></td>
		<td data-name="INducedDate" <?php echo $ivf_outcome_view->INducedDate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_INducedDate" type="text/html"><span id="el_ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome_view->INducedDate->viewAttributes() ?>><?php echo $ivf_outcome_view->INducedDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Miscarriage->Visible) { // Miscarriage ?>
	<tr id="r_Miscarriage">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Miscarriage"><script id="tpc_ivf_outcome_Miscarriage" type="text/html"><?php echo $ivf_outcome_view->Miscarriage->caption() ?></script></span></td>
		<td data-name="Miscarriage" <?php echo $ivf_outcome_view->Miscarriage->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Miscarriage" type="text/html"><span id="el_ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome_view->Miscarriage->viewAttributes() ?>><?php echo $ivf_outcome_view->Miscarriage->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Induced1->Visible) { // Induced1 ?>
	<tr id="r_Induced1">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Induced1"><script id="tpc_ivf_outcome_Induced1" type="text/html"><?php echo $ivf_outcome_view->Induced1->caption() ?></script></span></td>
		<td data-name="Induced1" <?php echo $ivf_outcome_view->Induced1->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Induced1" type="text/html"><span id="el_ivf_outcome_Induced1">
<span<?php echo $ivf_outcome_view->Induced1->viewAttributes() ?>><?php echo $ivf_outcome_view->Induced1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Type"><script id="tpc_ivf_outcome_Type" type="text/html"><?php echo $ivf_outcome_view->Type->caption() ?></script></span></td>
		<td data-name="Type" <?php echo $ivf_outcome_view->Type->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Type" type="text/html"><span id="el_ivf_outcome_Type">
<span<?php echo $ivf_outcome_view->Type->viewAttributes() ?>><?php echo $ivf_outcome_view->Type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->IfClinical->Visible) { // IfClinical ?>
	<tr id="r_IfClinical">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_IfClinical"><script id="tpc_ivf_outcome_IfClinical" type="text/html"><?php echo $ivf_outcome_view->IfClinical->caption() ?></script></span></td>
		<td data-name="IfClinical" <?php echo $ivf_outcome_view->IfClinical->cellAttributes() ?>>
<script id="tpx_ivf_outcome_IfClinical" type="text/html"><span id="el_ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome_view->IfClinical->viewAttributes() ?>><?php echo $ivf_outcome_view->IfClinical->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->GADate->Visible) { // GADate ?>
	<tr id="r_GADate">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GADate"><script id="tpc_ivf_outcome_GADate" type="text/html"><?php echo $ivf_outcome_view->GADate->caption() ?></script></span></td>
		<td data-name="GADate" <?php echo $ivf_outcome_view->GADate->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GADate" type="text/html"><span id="el_ivf_outcome_GADate">
<span<?php echo $ivf_outcome_view->GADate->viewAttributes() ?>><?php echo $ivf_outcome_view->GADate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->GA->Visible) { // GA ?>
	<tr id="r_GA">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GA"><script id="tpc_ivf_outcome_GA" type="text/html"><?php echo $ivf_outcome_view->GA->caption() ?></script></span></td>
		<td data-name="GA" <?php echo $ivf_outcome_view->GA->cellAttributes() ?>>
<script id="tpx_ivf_outcome_GA" type="text/html"><span id="el_ivf_outcome_GA">
<span<?php echo $ivf_outcome_view->GA->viewAttributes() ?>><?php echo $ivf_outcome_view->GA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->FoetalDeath->Visible) { // FoetalDeath ?>
	<tr id="r_FoetalDeath">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FoetalDeath"><script id="tpc_ivf_outcome_FoetalDeath" type="text/html"><?php echo $ivf_outcome_view->FoetalDeath->caption() ?></script></span></td>
		<td data-name="FoetalDeath" <?php echo $ivf_outcome_view->FoetalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FoetalDeath" type="text/html"><span id="el_ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome_view->FoetalDeath->viewAttributes() ?>><?php echo $ivf_outcome_view->FoetalDeath->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->FerinatalDeath->Visible) { // FerinatalDeath ?>
	<tr id="r_FerinatalDeath">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FerinatalDeath"><script id="tpc_ivf_outcome_FerinatalDeath" type="text/html"><?php echo $ivf_outcome_view->FerinatalDeath->caption() ?></script></span></td>
		<td data-name="FerinatalDeath" <?php echo $ivf_outcome_view->FerinatalDeath->cellAttributes() ?>>
<script id="tpx_ivf_outcome_FerinatalDeath" type="text/html"><span id="el_ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome_view->FerinatalDeath->viewAttributes() ?>><?php echo $ivf_outcome_view->FerinatalDeath->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TidNo"><script id="tpc_ivf_outcome_TidNo" type="text/html"><?php echo $ivf_outcome_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_outcome_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_outcome_TidNo" type="text/html"><span id="el_ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_view->TidNo->viewAttributes() ?>><?php echo $ivf_outcome_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Ectopic->Visible) { // Ectopic ?>
	<tr id="r_Ectopic">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Ectopic"><script id="tpc_ivf_outcome_Ectopic" type="text/html"><?php echo $ivf_outcome_view->Ectopic->caption() ?></script></span></td>
		<td data-name="Ectopic" <?php echo $ivf_outcome_view->Ectopic->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Ectopic" type="text/html"><span id="el_ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome_view->Ectopic->viewAttributes() ?>><?php echo $ivf_outcome_view->Ectopic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_outcome_view->Extra->Visible) { // Extra ?>
	<tr id="r_Extra">
		<td class="<?php echo $ivf_outcome_view->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Extra"><script id="tpc_ivf_outcome_Extra" type="text/html"><?php echo $ivf_outcome_view->Extra->caption() ?></script></span></td>
		<td data-name="Extra" <?php echo $ivf_outcome_view->Extra->cellAttributes() ?>>
<script id="tpx_ivf_outcome_Extra" type="text/html"><span id="el_ivf_outcome_Extra">
<span<?php echo $ivf_outcome_view->Extra->viewAttributes() ?>><?php echo $ivf_outcome_view->Extra->getViewValue() ?></span>
</span></script>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_outcomeDate")/}}</span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_outcomeDay"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_outcomeDay")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_OPResult"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_OPResult")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Gestation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Gestation")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Ectopic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Ectopic")/}}</span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Extra"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Extra")/}}</span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_InitalOfSacs"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_InitalOfSacs")/}}</span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_ImplimentationRate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_ImplimentationRate")/}}</span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Miscarriage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Miscarriage")/}}</span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Induced1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Induced1")/}}</span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Type"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Type")/}}</span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GADate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_GADate")/}}</span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_GA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_GA")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_Urine"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_Urine")/}}</span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_outcome_PTdate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_outcome_PTdate")/}}</span>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_outcome->Rows) ?> };
	ew.applyTemplate("tpd_ivf_outcomeview", "tpm_ivf_outcomeview", "ivf_outcomeview", "<?php echo $ivf_outcome->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_outcomeview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_outcome_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_outcome_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_outcome_view->terminate();
?>