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
$ivf_outcome_delete = new ivf_outcome_delete();

// Run the page
$ivf_outcome_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_outcome_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_outcomedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_outcomedelete = currentForm = new ew.Form("fivf_outcomedelete", "delete");
	loadjs.done("fivf_outcomedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_outcome_delete->showPageHeader(); ?>
<?php
$ivf_outcome_delete->showMessage();
?>
<form name="fivf_outcomedelete" id="fivf_outcomedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_outcome_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_outcome_delete->id->Visible) { // id ?>
		<th class="<?php echo $ivf_outcome_delete->id->headerCellClass() ?>"><span id="elh_ivf_outcome_id" class="ivf_outcome_id"><?php echo $ivf_outcome_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_outcome_delete->RIDNO->headerCellClass() ?>"><span id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><?php echo $ivf_outcome_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_outcome_delete->Name->headerCellClass() ?>"><span id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><?php echo $ivf_outcome_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_outcome_delete->Age->headerCellClass() ?>"><span id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><?php echo $ivf_outcome_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $ivf_outcome_delete->treatment_status->headerCellClass() ?>"><span id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><?php echo $ivf_outcome_delete->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $ivf_outcome_delete->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><?php echo $ivf_outcome_delete->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $ivf_outcome_delete->RESULT->headerCellClass() ?>"><span id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><?php echo $ivf_outcome_delete->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->status->Visible) { // status ?>
		<th class="<?php echo $ivf_outcome_delete->status->headerCellClass() ?>"><span id="elh_ivf_outcome_status" class="ivf_outcome_status"><?php echo $ivf_outcome_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_outcome_delete->createdby->headerCellClass() ?>"><span id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><?php echo $ivf_outcome_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_outcome_delete->createddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><?php echo $ivf_outcome_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_outcome_delete->modifiedby->headerCellClass() ?>"><span id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><?php echo $ivf_outcome_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_outcome_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><?php echo $ivf_outcome_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->outcomeDate->Visible) { // outcomeDate ?>
		<th class="<?php echo $ivf_outcome_delete->outcomeDate->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><?php echo $ivf_outcome_delete->outcomeDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->outcomeDay->Visible) { // outcomeDay ?>
		<th class="<?php echo $ivf_outcome_delete->outcomeDay->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><?php echo $ivf_outcome_delete->outcomeDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->OPResult->Visible) { // OPResult ?>
		<th class="<?php echo $ivf_outcome_delete->OPResult->headerCellClass() ?>"><span id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><?php echo $ivf_outcome_delete->OPResult->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Gestation->Visible) { // Gestation ?>
		<th class="<?php echo $ivf_outcome_delete->Gestation->headerCellClass() ?>"><span id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><?php echo $ivf_outcome_delete->Gestation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<th class="<?php echo $ivf_outcome_delete->TransferdEmbryos->headerCellClass() ?>"><span id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><?php echo $ivf_outcome_delete->TransferdEmbryos->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<th class="<?php echo $ivf_outcome_delete->InitalOfSacs->headerCellClass() ?>"><span id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><?php echo $ivf_outcome_delete->InitalOfSacs->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<th class="<?php echo $ivf_outcome_delete->ImplimentationRate->headerCellClass() ?>"><span id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><?php echo $ivf_outcome_delete->ImplimentationRate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->EmbryoNo->Visible) { // EmbryoNo ?>
		<th class="<?php echo $ivf_outcome_delete->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><?php echo $ivf_outcome_delete->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<th class="<?php echo $ivf_outcome_delete->ExtrauterineSac->headerCellClass() ?>"><span id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><?php echo $ivf_outcome_delete->ExtrauterineSac->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<th class="<?php echo $ivf_outcome_delete->PregnancyMonozygotic->headerCellClass() ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><?php echo $ivf_outcome_delete->PregnancyMonozygotic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->TypeGestation->Visible) { // TypeGestation ?>
		<th class="<?php echo $ivf_outcome_delete->TypeGestation->headerCellClass() ?>"><span id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><?php echo $ivf_outcome_delete->TypeGestation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Urine->Visible) { // Urine ?>
		<th class="<?php echo $ivf_outcome_delete->Urine->headerCellClass() ?>"><span id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><?php echo $ivf_outcome_delete->Urine->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->PTdate->Visible) { // PTdate ?>
		<th class="<?php echo $ivf_outcome_delete->PTdate->headerCellClass() ?>"><span id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><?php echo $ivf_outcome_delete->PTdate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Reduced->Visible) { // Reduced ?>
		<th class="<?php echo $ivf_outcome_delete->Reduced->headerCellClass() ?>"><span id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><?php echo $ivf_outcome_delete->Reduced->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->INduced->Visible) { // INduced ?>
		<th class="<?php echo $ivf_outcome_delete->INduced->headerCellClass() ?>"><span id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><?php echo $ivf_outcome_delete->INduced->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->INducedDate->Visible) { // INducedDate ?>
		<th class="<?php echo $ivf_outcome_delete->INducedDate->headerCellClass() ?>"><span id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><?php echo $ivf_outcome_delete->INducedDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Miscarriage->Visible) { // Miscarriage ?>
		<th class="<?php echo $ivf_outcome_delete->Miscarriage->headerCellClass() ?>"><span id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><?php echo $ivf_outcome_delete->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Induced1->Visible) { // Induced1 ?>
		<th class="<?php echo $ivf_outcome_delete->Induced1->headerCellClass() ?>"><span id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><?php echo $ivf_outcome_delete->Induced1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $ivf_outcome_delete->Type->headerCellClass() ?>"><span id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><?php echo $ivf_outcome_delete->Type->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->IfClinical->Visible) { // IfClinical ?>
		<th class="<?php echo $ivf_outcome_delete->IfClinical->headerCellClass() ?>"><span id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><?php echo $ivf_outcome_delete->IfClinical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->GADate->Visible) { // GADate ?>
		<th class="<?php echo $ivf_outcome_delete->GADate->headerCellClass() ?>"><span id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><?php echo $ivf_outcome_delete->GADate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->GA->Visible) { // GA ?>
		<th class="<?php echo $ivf_outcome_delete->GA->headerCellClass() ?>"><span id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><?php echo $ivf_outcome_delete->GA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->FoetalDeath->Visible) { // FoetalDeath ?>
		<th class="<?php echo $ivf_outcome_delete->FoetalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><?php echo $ivf_outcome_delete->FoetalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<th class="<?php echo $ivf_outcome_delete->FerinatalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><?php echo $ivf_outcome_delete->FerinatalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_outcome_delete->TidNo->headerCellClass() ?>"><span id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><?php echo $ivf_outcome_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Ectopic->Visible) { // Ectopic ?>
		<th class="<?php echo $ivf_outcome_delete->Ectopic->headerCellClass() ?>"><span id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><?php echo $ivf_outcome_delete->Ectopic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome_delete->Extra->Visible) { // Extra ?>
		<th class="<?php echo $ivf_outcome_delete->Extra->headerCellClass() ?>"><span id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><?php echo $ivf_outcome_delete->Extra->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_outcome_delete->RecordCount = 0;
$i = 0;
while (!$ivf_outcome_delete->Recordset->EOF) {
	$ivf_outcome_delete->RecordCount++;
	$ivf_outcome_delete->RowCount++;

	// Set row properties
	$ivf_outcome->resetAttributes();
	$ivf_outcome->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_outcome_delete->loadRowValues($ivf_outcome_delete->Recordset);

	// Render row
	$ivf_outcome_delete->renderRow();
?>
	<tr <?php echo $ivf_outcome->rowAttributes() ?>>
<?php if ($ivf_outcome_delete->id->Visible) { // id ?>
		<td <?php echo $ivf_outcome_delete->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_id" class="ivf_outcome_id">
<span<?php echo $ivf_outcome_delete->id->viewAttributes() ?>><?php echo $ivf_outcome_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $ivf_outcome_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome_delete->RIDNO->viewAttributes() ?>><?php echo $ivf_outcome_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Name->Visible) { // Name ?>
		<td <?php echo $ivf_outcome_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Name" class="ivf_outcome_Name">
<span<?php echo $ivf_outcome_delete->Name->viewAttributes() ?>><?php echo $ivf_outcome_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Age->Visible) { // Age ?>
		<td <?php echo $ivf_outcome_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Age" class="ivf_outcome_Age">
<span<?php echo $ivf_outcome_delete->Age->viewAttributes() ?>><?php echo $ivf_outcome_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->treatment_status->Visible) { // treatment_status ?>
		<td <?php echo $ivf_outcome_delete->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome_delete->treatment_status->viewAttributes() ?>><?php echo $ivf_outcome_delete->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td <?php echo $ivf_outcome_delete->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome_delete->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_outcome_delete->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->RESULT->Visible) { // RESULT ?>
		<td <?php echo $ivf_outcome_delete->RESULT->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
<span<?php echo $ivf_outcome_delete->RESULT->viewAttributes() ?>><?php echo $ivf_outcome_delete->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->status->Visible) { // status ?>
		<td <?php echo $ivf_outcome_delete->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_status" class="ivf_outcome_status">
<span<?php echo $ivf_outcome_delete->status->viewAttributes() ?>><?php echo $ivf_outcome_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $ivf_outcome_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_createdby" class="ivf_outcome_createdby">
<span<?php echo $ivf_outcome_delete->createdby->viewAttributes() ?>><?php echo $ivf_outcome_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $ivf_outcome_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome_delete->createddatetime->viewAttributes() ?>><?php echo $ivf_outcome_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $ivf_outcome_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome_delete->modifiedby->viewAttributes() ?>><?php echo $ivf_outcome_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $ivf_outcome_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome_delete->modifieddatetime->viewAttributes() ?>><?php echo $ivf_outcome_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->outcomeDate->Visible) { // outcomeDate ?>
		<td <?php echo $ivf_outcome_delete->outcomeDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome_delete->outcomeDate->viewAttributes() ?>><?php echo $ivf_outcome_delete->outcomeDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->outcomeDay->Visible) { // outcomeDay ?>
		<td <?php echo $ivf_outcome_delete->outcomeDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome_delete->outcomeDay->viewAttributes() ?>><?php echo $ivf_outcome_delete->outcomeDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->OPResult->Visible) { // OPResult ?>
		<td <?php echo $ivf_outcome_delete->OPResult->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
<span<?php echo $ivf_outcome_delete->OPResult->viewAttributes() ?>><?php echo $ivf_outcome_delete->OPResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Gestation->Visible) { // Gestation ?>
		<td <?php echo $ivf_outcome_delete->Gestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
<span<?php echo $ivf_outcome_delete->Gestation->viewAttributes() ?>><?php echo $ivf_outcome_delete->Gestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td <?php echo $ivf_outcome_delete->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome_delete->TransferdEmbryos->viewAttributes() ?>><?php echo $ivf_outcome_delete->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td <?php echo $ivf_outcome_delete->InitalOfSacs->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome_delete->InitalOfSacs->viewAttributes() ?>><?php echo $ivf_outcome_delete->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td <?php echo $ivf_outcome_delete->ImplimentationRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome_delete->ImplimentationRate->viewAttributes() ?>><?php echo $ivf_outcome_delete->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->EmbryoNo->Visible) { // EmbryoNo ?>
		<td <?php echo $ivf_outcome_delete->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome_delete->EmbryoNo->viewAttributes() ?>><?php echo $ivf_outcome_delete->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td <?php echo $ivf_outcome_delete->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome_delete->ExtrauterineSac->viewAttributes() ?>><?php echo $ivf_outcome_delete->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td <?php echo $ivf_outcome_delete->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome_delete->PregnancyMonozygotic->viewAttributes() ?>><?php echo $ivf_outcome_delete->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->TypeGestation->Visible) { // TypeGestation ?>
		<td <?php echo $ivf_outcome_delete->TypeGestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome_delete->TypeGestation->viewAttributes() ?>><?php echo $ivf_outcome_delete->TypeGestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Urine->Visible) { // Urine ?>
		<td <?php echo $ivf_outcome_delete->Urine->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Urine" class="ivf_outcome_Urine">
<span<?php echo $ivf_outcome_delete->Urine->viewAttributes() ?>><?php echo $ivf_outcome_delete->Urine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->PTdate->Visible) { // PTdate ?>
		<td <?php echo $ivf_outcome_delete->PTdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
<span<?php echo $ivf_outcome_delete->PTdate->viewAttributes() ?>><?php echo $ivf_outcome_delete->PTdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Reduced->Visible) { // Reduced ?>
		<td <?php echo $ivf_outcome_delete->Reduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
<span<?php echo $ivf_outcome_delete->Reduced->viewAttributes() ?>><?php echo $ivf_outcome_delete->Reduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->INduced->Visible) { // INduced ?>
		<td <?php echo $ivf_outcome_delete->INduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_INduced" class="ivf_outcome_INduced">
<span<?php echo $ivf_outcome_delete->INduced->viewAttributes() ?>><?php echo $ivf_outcome_delete->INduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->INducedDate->Visible) { // INducedDate ?>
		<td <?php echo $ivf_outcome_delete->INducedDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome_delete->INducedDate->viewAttributes() ?>><?php echo $ivf_outcome_delete->INducedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Miscarriage->Visible) { // Miscarriage ?>
		<td <?php echo $ivf_outcome_delete->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome_delete->Miscarriage->viewAttributes() ?>><?php echo $ivf_outcome_delete->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Induced1->Visible) { // Induced1 ?>
		<td <?php echo $ivf_outcome_delete->Induced1->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
<span<?php echo $ivf_outcome_delete->Induced1->viewAttributes() ?>><?php echo $ivf_outcome_delete->Induced1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Type->Visible) { // Type ?>
		<td <?php echo $ivf_outcome_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Type" class="ivf_outcome_Type">
<span<?php echo $ivf_outcome_delete->Type->viewAttributes() ?>><?php echo $ivf_outcome_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->IfClinical->Visible) { // IfClinical ?>
		<td <?php echo $ivf_outcome_delete->IfClinical->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome_delete->IfClinical->viewAttributes() ?>><?php echo $ivf_outcome_delete->IfClinical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->GADate->Visible) { // GADate ?>
		<td <?php echo $ivf_outcome_delete->GADate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_GADate" class="ivf_outcome_GADate">
<span<?php echo $ivf_outcome_delete->GADate->viewAttributes() ?>><?php echo $ivf_outcome_delete->GADate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->GA->Visible) { // GA ?>
		<td <?php echo $ivf_outcome_delete->GA->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_GA" class="ivf_outcome_GA">
<span<?php echo $ivf_outcome_delete->GA->viewAttributes() ?>><?php echo $ivf_outcome_delete->GA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->FoetalDeath->Visible) { // FoetalDeath ?>
		<td <?php echo $ivf_outcome_delete->FoetalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome_delete->FoetalDeath->viewAttributes() ?>><?php echo $ivf_outcome_delete->FoetalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td <?php echo $ivf_outcome_delete->FerinatalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome_delete->FerinatalDeath->viewAttributes() ?>><?php echo $ivf_outcome_delete->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $ivf_outcome_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
<span<?php echo $ivf_outcome_delete->TidNo->viewAttributes() ?>><?php echo $ivf_outcome_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Ectopic->Visible) { // Ectopic ?>
		<td <?php echo $ivf_outcome_delete->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome_delete->Ectopic->viewAttributes() ?>><?php echo $ivf_outcome_delete->Ectopic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome_delete->Extra->Visible) { // Extra ?>
		<td <?php echo $ivf_outcome_delete->Extra->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCount ?>_ivf_outcome_Extra" class="ivf_outcome_Extra">
<span<?php echo $ivf_outcome_delete->Extra->viewAttributes() ?>><?php echo $ivf_outcome_delete->Extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_outcome_delete->Recordset->moveNext();
}
$ivf_outcome_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_outcome_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_outcome_delete->showPageFooter();
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
$ivf_outcome_delete->terminate();
?>