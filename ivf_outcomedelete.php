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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_outcomedelete = currentForm = new ew.Form("fivf_outcomedelete", "delete");

// Form_CustomValidate event
fivf_outcomedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_outcomedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_outcomedelete.lists["x_Gestation"] = <?php echo $ivf_outcome_delete->Gestation->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Gestation"].options = <?php echo JsonEncode($ivf_outcome_delete->Gestation->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Urine"] = <?php echo $ivf_outcome_delete->Urine->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Urine"].options = <?php echo JsonEncode($ivf_outcome_delete->Urine->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Miscarriage"] = <?php echo $ivf_outcome_delete->Miscarriage->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Miscarriage"].options = <?php echo JsonEncode($ivf_outcome_delete->Miscarriage->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Induced1"] = <?php echo $ivf_outcome_delete->Induced1->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Induced1"].options = <?php echo JsonEncode($ivf_outcome_delete->Induced1->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Type"] = <?php echo $ivf_outcome_delete->Type->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Type"].options = <?php echo JsonEncode($ivf_outcome_delete->Type->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_FoetalDeath"] = <?php echo $ivf_outcome_delete->FoetalDeath->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_FoetalDeath"].options = <?php echo JsonEncode($ivf_outcome_delete->FoetalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_FerinatalDeath"] = <?php echo $ivf_outcome_delete->FerinatalDeath->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_FerinatalDeath"].options = <?php echo JsonEncode($ivf_outcome_delete->FerinatalDeath->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Ectopic"] = <?php echo $ivf_outcome_delete->Ectopic->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Ectopic"].options = <?php echo JsonEncode($ivf_outcome_delete->Ectopic->options(FALSE, TRUE)) ?>;
fivf_outcomedelete.lists["x_Extra"] = <?php echo $ivf_outcome_delete->Extra->Lookup->toClientList() ?>;
fivf_outcomedelete.lists["x_Extra"].options = <?php echo JsonEncode($ivf_outcome_delete->Extra->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_outcome_delete->showPageHeader(); ?>
<?php
$ivf_outcome_delete->showMessage();
?>
<form name="fivf_outcomedelete" id="fivf_outcomedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_outcome_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_outcome_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_outcome_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_outcome->id->Visible) { // id ?>
		<th class="<?php echo $ivf_outcome->id->headerCellClass() ?>"><span id="elh_ivf_outcome_id" class="ivf_outcome_id"><?php echo $ivf_outcome->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $ivf_outcome->RIDNO->headerCellClass() ?>"><span id="elh_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO"><?php echo $ivf_outcome->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_outcome->Name->headerCellClass() ?>"><span id="elh_ivf_outcome_Name" class="ivf_outcome_Name"><?php echo $ivf_outcome->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<th class="<?php echo $ivf_outcome->Age->headerCellClass() ?>"><span id="elh_ivf_outcome_Age" class="ivf_outcome_Age"><?php echo $ivf_outcome->Age->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<th class="<?php echo $ivf_outcome->treatment_status->headerCellClass() ?>"><span id="elh_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status"><?php echo $ivf_outcome->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<th class="<?php echo $ivf_outcome->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE"><?php echo $ivf_outcome->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<th class="<?php echo $ivf_outcome->RESULT->headerCellClass() ?>"><span id="elh_ivf_outcome_RESULT" class="ivf_outcome_RESULT"><?php echo $ivf_outcome->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
		<th class="<?php echo $ivf_outcome->status->headerCellClass() ?>"><span id="elh_ivf_outcome_status" class="ivf_outcome_status"><?php echo $ivf_outcome->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_outcome->createdby->headerCellClass() ?>"><span id="elh_ivf_outcome_createdby" class="ivf_outcome_createdby"><?php echo $ivf_outcome->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_outcome->createddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime"><?php echo $ivf_outcome->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_outcome->modifiedby->headerCellClass() ?>"><span id="elh_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby"><?php echo $ivf_outcome->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_outcome->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime"><?php echo $ivf_outcome->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<th class="<?php echo $ivf_outcome->outcomeDate->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate"><?php echo $ivf_outcome->outcomeDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<th class="<?php echo $ivf_outcome->outcomeDay->headerCellClass() ?>"><span id="elh_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay"><?php echo $ivf_outcome->outcomeDay->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<th class="<?php echo $ivf_outcome->OPResult->headerCellClass() ?>"><span id="elh_ivf_outcome_OPResult" class="ivf_outcome_OPResult"><?php echo $ivf_outcome->OPResult->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<th class="<?php echo $ivf_outcome->Gestation->headerCellClass() ?>"><span id="elh_ivf_outcome_Gestation" class="ivf_outcome_Gestation"><?php echo $ivf_outcome->Gestation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<th class="<?php echo $ivf_outcome->TransferdEmbryos->headerCellClass() ?>"><span id="elh_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos"><?php echo $ivf_outcome->TransferdEmbryos->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<th class="<?php echo $ivf_outcome->InitalOfSacs->headerCellClass() ?>"><span id="elh_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs"><?php echo $ivf_outcome->InitalOfSacs->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<th class="<?php echo $ivf_outcome->ImplimentationRate->headerCellClass() ?>"><span id="elh_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate"><?php echo $ivf_outcome->ImplimentationRate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<th class="<?php echo $ivf_outcome->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo"><?php echo $ivf_outcome->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<th class="<?php echo $ivf_outcome->ExtrauterineSac->headerCellClass() ?>"><span id="elh_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac"><?php echo $ivf_outcome->ExtrauterineSac->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<th class="<?php echo $ivf_outcome->PregnancyMonozygotic->headerCellClass() ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic"><?php echo $ivf_outcome->PregnancyMonozygotic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<th class="<?php echo $ivf_outcome->TypeGestation->headerCellClass() ?>"><span id="elh_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation"><?php echo $ivf_outcome->TypeGestation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<th class="<?php echo $ivf_outcome->Urine->headerCellClass() ?>"><span id="elh_ivf_outcome_Urine" class="ivf_outcome_Urine"><?php echo $ivf_outcome->Urine->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<th class="<?php echo $ivf_outcome->PTdate->headerCellClass() ?>"><span id="elh_ivf_outcome_PTdate" class="ivf_outcome_PTdate"><?php echo $ivf_outcome->PTdate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<th class="<?php echo $ivf_outcome->Reduced->headerCellClass() ?>"><span id="elh_ivf_outcome_Reduced" class="ivf_outcome_Reduced"><?php echo $ivf_outcome->Reduced->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<th class="<?php echo $ivf_outcome->INduced->headerCellClass() ?>"><span id="elh_ivf_outcome_INduced" class="ivf_outcome_INduced"><?php echo $ivf_outcome->INduced->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<th class="<?php echo $ivf_outcome->INducedDate->headerCellClass() ?>"><span id="elh_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate"><?php echo $ivf_outcome->INducedDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<th class="<?php echo $ivf_outcome->Miscarriage->headerCellClass() ?>"><span id="elh_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage"><?php echo $ivf_outcome->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<th class="<?php echo $ivf_outcome->Induced1->headerCellClass() ?>"><span id="elh_ivf_outcome_Induced1" class="ivf_outcome_Induced1"><?php echo $ivf_outcome->Induced1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<th class="<?php echo $ivf_outcome->Type->headerCellClass() ?>"><span id="elh_ivf_outcome_Type" class="ivf_outcome_Type"><?php echo $ivf_outcome->Type->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<th class="<?php echo $ivf_outcome->IfClinical->headerCellClass() ?>"><span id="elh_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical"><?php echo $ivf_outcome->IfClinical->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<th class="<?php echo $ivf_outcome->GADate->headerCellClass() ?>"><span id="elh_ivf_outcome_GADate" class="ivf_outcome_GADate"><?php echo $ivf_outcome->GADate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<th class="<?php echo $ivf_outcome->GA->headerCellClass() ?>"><span id="elh_ivf_outcome_GA" class="ivf_outcome_GA"><?php echo $ivf_outcome->GA->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<th class="<?php echo $ivf_outcome->FoetalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath"><?php echo $ivf_outcome->FoetalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<th class="<?php echo $ivf_outcome->FerinatalDeath->headerCellClass() ?>"><span id="elh_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath"><?php echo $ivf_outcome->FerinatalDeath->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_outcome->TidNo->headerCellClass() ?>"><span id="elh_ivf_outcome_TidNo" class="ivf_outcome_TidNo"><?php echo $ivf_outcome->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<th class="<?php echo $ivf_outcome->Ectopic->headerCellClass() ?>"><span id="elh_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic"><?php echo $ivf_outcome->Ectopic->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<th class="<?php echo $ivf_outcome->Extra->headerCellClass() ?>"><span id="elh_ivf_outcome_Extra" class="ivf_outcome_Extra"><?php echo $ivf_outcome->Extra->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<th class="<?php echo $ivf_outcome->Implantation->headerCellClass() ?>"><span id="elh_ivf_outcome_Implantation" class="ivf_outcome_Implantation"><?php echo $ivf_outcome->Implantation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<th class="<?php echo $ivf_outcome->DeliveryDate->headerCellClass() ?>"><span id="elh_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate"><?php echo $ivf_outcome->DeliveryDate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_outcome_delete->RecCnt = 0;
$i = 0;
while (!$ivf_outcome_delete->Recordset->EOF) {
	$ivf_outcome_delete->RecCnt++;
	$ivf_outcome_delete->RowCnt++;

	// Set row properties
	$ivf_outcome->resetAttributes();
	$ivf_outcome->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_outcome_delete->loadRowValues($ivf_outcome_delete->Recordset);

	// Render row
	$ivf_outcome_delete->renderRow();
?>
	<tr<?php echo $ivf_outcome->rowAttributes() ?>>
<?php if ($ivf_outcome->id->Visible) { // id ?>
		<td<?php echo $ivf_outcome->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_id" class="ivf_outcome_id">
<span<?php echo $ivf_outcome->id->viewAttributes() ?>>
<?php echo $ivf_outcome->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $ivf_outcome->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_RIDNO" class="ivf_outcome_RIDNO">
<span<?php echo $ivf_outcome->RIDNO->viewAttributes() ?>>
<?php echo $ivf_outcome->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Name->Visible) { // Name ?>
		<td<?php echo $ivf_outcome->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Name" class="ivf_outcome_Name">
<span<?php echo $ivf_outcome->Name->viewAttributes() ?>>
<?php echo $ivf_outcome->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Age->Visible) { // Age ?>
		<td<?php echo $ivf_outcome->Age->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Age" class="ivf_outcome_Age">
<span<?php echo $ivf_outcome->Age->viewAttributes() ?>>
<?php echo $ivf_outcome->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->treatment_status->Visible) { // treatment_status ?>
		<td<?php echo $ivf_outcome->treatment_status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_treatment_status" class="ivf_outcome_treatment_status">
<span<?php echo $ivf_outcome->treatment_status->viewAttributes() ?>>
<?php echo $ivf_outcome->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td<?php echo $ivf_outcome->ARTCYCLE->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_ARTCYCLE" class="ivf_outcome_ARTCYCLE">
<span<?php echo $ivf_outcome->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_outcome->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->RESULT->Visible) { // RESULT ?>
		<td<?php echo $ivf_outcome->RESULT->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_RESULT" class="ivf_outcome_RESULT">
<span<?php echo $ivf_outcome->RESULT->viewAttributes() ?>>
<?php echo $ivf_outcome->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->status->Visible) { // status ?>
		<td<?php echo $ivf_outcome->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_status" class="ivf_outcome_status">
<span<?php echo $ivf_outcome->status->viewAttributes() ?>>
<?php echo $ivf_outcome->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->createdby->Visible) { // createdby ?>
		<td<?php echo $ivf_outcome->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_createdby" class="ivf_outcome_createdby">
<span<?php echo $ivf_outcome->createdby->viewAttributes() ?>>
<?php echo $ivf_outcome->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $ivf_outcome->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_createddatetime" class="ivf_outcome_createddatetime">
<span<?php echo $ivf_outcome->createddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $ivf_outcome->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_modifiedby" class="ivf_outcome_modifiedby">
<span<?php echo $ivf_outcome->modifiedby->viewAttributes() ?>>
<?php echo $ivf_outcome->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $ivf_outcome->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_modifieddatetime" class="ivf_outcome_modifieddatetime">
<span<?php echo $ivf_outcome->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_outcome->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->outcomeDate->Visible) { // outcomeDate ?>
		<td<?php echo $ivf_outcome->outcomeDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_outcomeDate" class="ivf_outcome_outcomeDate">
<span<?php echo $ivf_outcome->outcomeDate->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->outcomeDay->Visible) { // outcomeDay ?>
		<td<?php echo $ivf_outcome->outcomeDay->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_outcomeDay" class="ivf_outcome_outcomeDay">
<span<?php echo $ivf_outcome->outcomeDay->viewAttributes() ?>>
<?php echo $ivf_outcome->outcomeDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->OPResult->Visible) { // OPResult ?>
		<td<?php echo $ivf_outcome->OPResult->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_OPResult" class="ivf_outcome_OPResult">
<span<?php echo $ivf_outcome->OPResult->viewAttributes() ?>>
<?php echo $ivf_outcome->OPResult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Gestation->Visible) { // Gestation ?>
		<td<?php echo $ivf_outcome->Gestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Gestation" class="ivf_outcome_Gestation">
<span<?php echo $ivf_outcome->Gestation->viewAttributes() ?>>
<?php echo $ivf_outcome->Gestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
		<td<?php echo $ivf_outcome->TransferdEmbryos->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_TransferdEmbryos" class="ivf_outcome_TransferdEmbryos">
<span<?php echo $ivf_outcome->TransferdEmbryos->viewAttributes() ?>>
<?php echo $ivf_outcome->TransferdEmbryos->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->InitalOfSacs->Visible) { // InitalOfSacs ?>
		<td<?php echo $ivf_outcome->InitalOfSacs->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_InitalOfSacs" class="ivf_outcome_InitalOfSacs">
<span<?php echo $ivf_outcome->InitalOfSacs->viewAttributes() ?>>
<?php echo $ivf_outcome->InitalOfSacs->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ImplimentationRate->Visible) { // ImplimentationRate ?>
		<td<?php echo $ivf_outcome->ImplimentationRate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_ImplimentationRate" class="ivf_outcome_ImplimentationRate">
<span<?php echo $ivf_outcome->ImplimentationRate->viewAttributes() ?>>
<?php echo $ivf_outcome->ImplimentationRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->EmbryoNo->Visible) { // EmbryoNo ?>
		<td<?php echo $ivf_outcome->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_EmbryoNo" class="ivf_outcome_EmbryoNo">
<span<?php echo $ivf_outcome->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_outcome->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
		<td<?php echo $ivf_outcome->ExtrauterineSac->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_ExtrauterineSac" class="ivf_outcome_ExtrauterineSac">
<span<?php echo $ivf_outcome->ExtrauterineSac->viewAttributes() ?>>
<?php echo $ivf_outcome->ExtrauterineSac->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
		<td<?php echo $ivf_outcome->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_PregnancyMonozygotic" class="ivf_outcome_PregnancyMonozygotic">
<span<?php echo $ivf_outcome->PregnancyMonozygotic->viewAttributes() ?>>
<?php echo $ivf_outcome->PregnancyMonozygotic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TypeGestation->Visible) { // TypeGestation ?>
		<td<?php echo $ivf_outcome->TypeGestation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_TypeGestation" class="ivf_outcome_TypeGestation">
<span<?php echo $ivf_outcome->TypeGestation->viewAttributes() ?>>
<?php echo $ivf_outcome->TypeGestation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Urine->Visible) { // Urine ?>
		<td<?php echo $ivf_outcome->Urine->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Urine" class="ivf_outcome_Urine">
<span<?php echo $ivf_outcome->Urine->viewAttributes() ?>>
<?php echo $ivf_outcome->Urine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->PTdate->Visible) { // PTdate ?>
		<td<?php echo $ivf_outcome->PTdate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_PTdate" class="ivf_outcome_PTdate">
<span<?php echo $ivf_outcome->PTdate->viewAttributes() ?>>
<?php echo $ivf_outcome->PTdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Reduced->Visible) { // Reduced ?>
		<td<?php echo $ivf_outcome->Reduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Reduced" class="ivf_outcome_Reduced">
<span<?php echo $ivf_outcome->Reduced->viewAttributes() ?>>
<?php echo $ivf_outcome->Reduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->INduced->Visible) { // INduced ?>
		<td<?php echo $ivf_outcome->INduced->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_INduced" class="ivf_outcome_INduced">
<span<?php echo $ivf_outcome->INduced->viewAttributes() ?>>
<?php echo $ivf_outcome->INduced->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->INducedDate->Visible) { // INducedDate ?>
		<td<?php echo $ivf_outcome->INducedDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_INducedDate" class="ivf_outcome_INducedDate">
<span<?php echo $ivf_outcome->INducedDate->viewAttributes() ?>>
<?php echo $ivf_outcome->INducedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Miscarriage->Visible) { // Miscarriage ?>
		<td<?php echo $ivf_outcome->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Miscarriage" class="ivf_outcome_Miscarriage">
<span<?php echo $ivf_outcome->Miscarriage->viewAttributes() ?>>
<?php echo $ivf_outcome->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Induced1->Visible) { // Induced1 ?>
		<td<?php echo $ivf_outcome->Induced1->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Induced1" class="ivf_outcome_Induced1">
<span<?php echo $ivf_outcome->Induced1->viewAttributes() ?>>
<?php echo $ivf_outcome->Induced1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Type->Visible) { // Type ?>
		<td<?php echo $ivf_outcome->Type->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Type" class="ivf_outcome_Type">
<span<?php echo $ivf_outcome->Type->viewAttributes() ?>>
<?php echo $ivf_outcome->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->IfClinical->Visible) { // IfClinical ?>
		<td<?php echo $ivf_outcome->IfClinical->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_IfClinical" class="ivf_outcome_IfClinical">
<span<?php echo $ivf_outcome->IfClinical->viewAttributes() ?>>
<?php echo $ivf_outcome->IfClinical->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->GADate->Visible) { // GADate ?>
		<td<?php echo $ivf_outcome->GADate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_GADate" class="ivf_outcome_GADate">
<span<?php echo $ivf_outcome->GADate->viewAttributes() ?>>
<?php echo $ivf_outcome->GADate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->GA->Visible) { // GA ?>
		<td<?php echo $ivf_outcome->GA->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_GA" class="ivf_outcome_GA">
<span<?php echo $ivf_outcome->GA->viewAttributes() ?>>
<?php echo $ivf_outcome->GA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->FoetalDeath->Visible) { // FoetalDeath ?>
		<td<?php echo $ivf_outcome->FoetalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_FoetalDeath" class="ivf_outcome_FoetalDeath">
<span<?php echo $ivf_outcome->FoetalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FoetalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->FerinatalDeath->Visible) { // FerinatalDeath ?>
		<td<?php echo $ivf_outcome->FerinatalDeath->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_FerinatalDeath" class="ivf_outcome_FerinatalDeath">
<span<?php echo $ivf_outcome->FerinatalDeath->viewAttributes() ?>>
<?php echo $ivf_outcome->FerinatalDeath->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_outcome->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_TidNo" class="ivf_outcome_TidNo">
<span<?php echo $ivf_outcome->TidNo->viewAttributes() ?>>
<?php echo $ivf_outcome->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Ectopic->Visible) { // Ectopic ?>
		<td<?php echo $ivf_outcome->Ectopic->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Ectopic" class="ivf_outcome_Ectopic">
<span<?php echo $ivf_outcome->Ectopic->viewAttributes() ?>>
<?php echo $ivf_outcome->Ectopic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Extra->Visible) { // Extra ?>
		<td<?php echo $ivf_outcome->Extra->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Extra" class="ivf_outcome_Extra">
<span<?php echo $ivf_outcome->Extra->viewAttributes() ?>>
<?php echo $ivf_outcome->Extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->Implantation->Visible) { // Implantation ?>
		<td<?php echo $ivf_outcome->Implantation->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_Implantation" class="ivf_outcome_Implantation">
<span<?php echo $ivf_outcome->Implantation->viewAttributes() ?>>
<?php echo $ivf_outcome->Implantation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_outcome->DeliveryDate->Visible) { // DeliveryDate ?>
		<td<?php echo $ivf_outcome->DeliveryDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_outcome_delete->RowCnt ?>_ivf_outcome_DeliveryDate" class="ivf_outcome_DeliveryDate">
<span<?php echo $ivf_outcome->DeliveryDate->viewAttributes() ?>>
<?php echo $ivf_outcome->DeliveryDate->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_outcome_delete->terminate();
?>